<?php

use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        date_default_timezone_set("PRC");
    }

    public function wait($time = 10000, $condition = null)
    {
        if (!$this->getSession()->getDriver() instanceof Selenium2Driver) {
            return;
        }
        $start = microtime(true);
        $end = $start + $time / 1000.0;
        if ($condition === null) {
            $defaultCondition = true;
            $conditions = [
                "document.readyState == 'complete'",           // Page is ready
                "typeof $ != 'undefined'",                     // jQuery is loaded
                "!$.active",                                   // No ajax request is active
                "$('#page').css('display') == 'block'",        // Page is displayed (no progress bar)
                "$('.loading-mask').css('display') == 'none'", // Page is not loading (no black mask loading page)
                "$('.jstree-loading').length == 0",            // Jstree has finished loading
            ];
            $condition = implode(' && ', $conditions);
        } else {
            $defaultCondition = false;
        }
        // Make sure the AJAX calls are fired up before checking the condition
        $this->getSession()->wait(100, false);
        $this->getSession()->wait($time, $condition);
        // Check if we reached the timeout unless the condition is false to explicitly wait the specified time
        if ($condition !== false && microtime(true) > $end) {
            if ($defaultCondition) {
                foreach ($conditions as $condition) {
                    $result = $this->getSession()->evaluateScript($condition);
                    if (!$result) {
                        throw new BehaviorException(
                            sprintf(
                                'Timeout of %d reached when checking on "%s"',
                                $time,
                                $condition
                            )
                        );
                    }
                }
            } else {
                throw new BehaviorException(sprintf('Timeout of %d reached when checking on %s', $time, $condition));
            }
        }
    }

    /**
     * login the club
     * Example: Given I log in with username: "kin" and password: "123123"
     *
     * @Given /^(?:|I )log in with username: "(?P<username>[^"]+)" and password: "(?P<password>[^"]+)"$/
     */
    public function iLoginClub($username, $password){
        $this->visit("/club/login");
        $this->fillField("username", $username);
        $this->fillField("password", $password);
        $this->pressButton("登录");
        $this->getSession()->wait(1000);
    }

    /**
     *
     * @Given /^(?:|I )wait for "(?P<timespan>[^"]+)" secs$/
     */
    public function iWait($timespan){
        $this->getSession()->wait(((int)$timespan)*1000);
    }

    /**
     * This function prevents Behat form failing a tests if the HTML is not loaded yet.
     * Behat with Selenium often executes tests faster thant Selenium is able to retreive
     * the HTML causing false negatives.
     *
     * Use this for all test cases that depend on a presence of some elements on the
     * website.
     *
     * Pass an anonymous function containing your normal test as an argument.
     * The function needs to return a boolean.
     *
     * @see http://docs.behat.org/cookbook/using_spin_functions.html
     *
     * @param \Closure $closure
     * @param int      $tries
     *
     * @return bool
     *
     * @throws \Exception|UnsupportedTestException
     * @throws \Exception
     */
    public function spin($closure, $tries = 30)
    {
        for ($i = 0; $i < $tries; $i++) {
            try {
                if ($result = $closure($this)) {
                    if (!is_bool($result)) {
                        throw new UnsupportedTestException(
                            'The spinned callback needs to return true on success or throw an Exception'
                        );
                    }

                    return true;
                }
            } catch (UnsupportedTestException $e) {
                // If the test is unsupported, we quit
                throw $e;
            } catch (\Exception $e) {
                // do nothing to continue the loop
            }

            usleep(300000);
        }

        $backtrace = debug_backtrace();
        throw new \Exception(
            "Timeout thrown by " . $backtrace[1]['class'] . "::" . $backtrace[1]['function'] . "()\n" .
            "With the following arguments: " . print_r($backtrace[1]['args'], true)
        );
    }
    /**
     * @Given /^I wait to see "(?P<text>(?:[^"]|\\")*)"$/
     *
     * @param string $text
     *
     * @return bool
     */
    public function iWaitToSee($text)
    {
        return $this->assertPageContainsText($text);
    }
    /**
     * Overrides MinkContext method by adding a spin
     *
     * {@inheritdoc}
     */
    public function assertPageContainsText($text)
    {
        $this->waitUntilPageLoaded();

        return $this->spin(
            function ($context) use ($text) {
                $context->assertSession()->pageTextContains($context->fixStepArgument($text));
                return true;
            }
        );
    }

    /**
     * This methods makes Selenium2 wait until the body element is present.
     * This supposes that the html is loaded (even if it's not 100% reliable).
     *
     * @return bool
     */
    protected function waitUntilPageLoaded()
    {
        $this->spin(
            function ($context) {
                $context->assertSession()->elementExists('xpath', '//body');
                return true;
            }
        );
    }

}
