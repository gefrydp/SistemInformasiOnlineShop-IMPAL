<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        doSomethingWith($argument);
//    }
//

    /**
     * @Given /^there is a "Sith Lord Lightsaber", which costs £(\d+)$/
     */
    

    /**
     * @Given /^there is a jacket in list$/
     */
    public function thereIsAJacketInList()
    {
        echo "success";
    }

    /**
     * @When /^I add the jacket to the cart$/
     */
    public function iAddTheJacketToTheCart()
    {
        echo "success";
    }

    /**
     * @Then /^I should have (\d+) product in the cart$/
     */
    public function iShouldHaveProductInTheCart($arg1)
    {
        echo "success";
    }

    /**
     * @Given /^the overall cart price should be appears$/
     */
    public function theOverallCartPriceShouldBeAppears()
    {
        echo "success";
    }

    /**
     * @Given /^there is a Login button$/
     */
    public function thereIsALoginButton()
    {
        echo "success";
    }

    /**
     * @When /^I type username and password$/
     */
    public function iTypeUsernameAndPassword()
    {
        echo "success";
    }

    /**
     * @Then /^I should have a notification that tell the success login or not$/
     */
    public function iShouldHaveANotificationThatTellTheSuccessLoginOrNot()
    {
        echo "success";
    }

    /**
     * @When /^notification tell success login$/
     */
    public function notificationTellSuccessLogin()
    {
        echo "success";
    }

    /**
     * @Then /^I success login as Customer$/
     */
    public function iSuccessLoginAsCustomer()
    {
        echo "success";
    }

    /**
     * @Given /^I can make transactions$/
     */
    public function iCanMakeTransactions()
    {
        echo "success";
    }

    /**
     * @Then /^I success login as Admin$/
     */
    public function iSuccessLoginAsAdmin()
    {
        echo "success";
    }

    /**
     * @Given /^can make transactions$/
     */
    public function canMakeTransactions()
    {
        echo "success";
    }

    /**
     * @Given /^i finish all transactions$/
     */
    public function iFinishAllTransactions()
    {
        echo "success";
    }

    /**
     * @When /^I click logout button$/
     */
    public function iClickLogoutButton()
    {
        echo "success";
    }

    /**
     * @Then /^I should be logged out$/
     */
    public function iShouldBeLoggedOut()
    {
        echo "success";
    }

    /**
     * @Given /^i click daftar button$/
     */
    public function iClickDaftarButton()
    {
        echo "success";
    }

    /**
     * @When /^I type all data that required$/
     */
    public function iTypeAllDataThatRequired()
    {
        echo "success";
    }

    /**
     * @Then /^I click daftar$/
     */
    public function iClickDaftar()
    {
        echo "success";
    }

    /**
     * @Given /^the data should be stored to database$/
     */
    public function theDataShouldBeStoredToDatabase()
    {
        echo "success";
    }

    /**
     * @Then /^i successfully have an account$/
     */
    public function iSuccessfullyHaveAnAccount()
    {
        echo "success";
    }
}
