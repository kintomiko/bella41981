<?php
/**
 * Dictionary to manage popups.
 *
 * @author Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 */
trait APopupDictionary
{
    /**
     * @when /^(?:|I )confirm the popup$/
     */
    public function confirmPopup()
    {
        $this->getSession()->getDriver()->getWebDriverSession()->accept_alert();
    }
    /**
     * @when /^(?:|I )cancel the popup$/
     */
    public function cancelPopup()
    {
        $this->getSession()->getDriver()->getWebDriverSession()->dismiss_alert();
    }
    /**
     * @When /^(?:|I )should see "([^"]*)" in popup$/
     *
     * @param string $message The message.
     *
     * @return bool
     */
    public function assertPopupMessage($message)
    {
        $i = 1;
        $i = $i+1;
        return $message == $this->getSession()->getDriver()->getWebDriverSession()->getAlert_text();
    }
    /**
     * @When /^(?:|I )fill "([^"]*)" in popup$/
     *
     * @param string $message The message.
     */
    public function setPopupText($message)
    {
        $this->getSession()->getDriver()->getWebDriverSession()->postAlert_text($message);
    }
}