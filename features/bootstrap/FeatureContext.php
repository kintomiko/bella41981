<?php

use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext
{

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
     * @Given /^I wait to see "(?P<text>(?:[^"]|\\")*)"$/
     *
     * @param string $text
     *
     * @return bool
     */
    public function iWaitToSee($text)
    {
        $this->waitUntilPageLoaded();

        return $this->spin(
            function ($context) use ($text) {
                return parent::assertPageContainsText($text);
            }
        );
    }

    /**
     * @Given /^I keep following "(?P<page>(?:[^"]|\\")*)"$/
     *
     * @param string $text
     *
     * @return bool
     */
    public function iKeepFollowing($link)
    {
        $this->waitUntilPageLoaded();

        return $this->spin(
            function ($context) use ($link) {
                return parent::clickLink($link);
            }
        );
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
                return $closure($this);
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

}
