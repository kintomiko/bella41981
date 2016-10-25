<?php

use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Hook\Scope\AfterStepScope;
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
        $this->waitAllAjaxEventComplete();
        $this->fillField("username", $username);
        $this->fillField("password", $password);
        $this->pressButton("登录");
        $this->waitAllAjaxEventComplete();
    }

    /** @AfterStep */
    public function afterStep(AfterStepScope $scope)
    {
        $this->waitAllAjaxEventComplete();
    }

    protected function waitAllAjaxEventComplete(){
        $this->getSession()->wait(60000, '(0 === jQuery.active)');
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

    use APopupDictionary;

}
