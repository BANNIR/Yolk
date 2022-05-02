<?php

// use \app\core\TokenAuth6238;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    //add to cart

     /**
     * @Given I am logged in As a user
     */
    public function iAmLoggedInAsAUser()
    {
        $this->amOnPage('Account/index/');
        $this->fillField('username', 'con');
        $this->fillField('password', 'con');
        $this->click('action');
        $this->amOnPage('https://localhost/Account/setup2fa/');
        $this->click('cancel');
        $this->amOnPage("/Main/index");
    }

    /**
     * @When I am on the page :arg1
     */
    public function iAmOnThePage($arg1)
    {
        $this->amOnPage($arg1);
    }

   /**
    * @When I press the button :arg1
    */
    public function iPressTheButton($arg1)
    {
        $this->click($arg1);
    }

   /**
    * @Then I should see the product added to cart
    */
    public function iShouldSeeTheProductAddedToCart()
    {
        $this->amOnPage('https://localhost/Cart/index/2');
        $this->see('The amazing baguette');
    }


    //checkout

    /**
     * @Given I am logged in as a user
     */
    public function iAmLoggedInAsAUser2()
    {
        $this->iAmLoggedInAsAUser();
    }

   /**
    * @Given I am on page :arg1
    */
    public function iAmOnPage($arg1)
    {
        $this->amOnPage($arg1);
    }

   /**
    * @Given I have a product in my cart
    */
    public function iHaveAProductInMyCart()
    {
        $this->see('The amazing baguette');
    }

   /**
    * @When I click on :arg1
    */
    public function iClickOn($arg1)
    {
        $this->click($arg1);
    }

   /**
    * @Then I should be on page :arg1
    */
    public function iShouldBeOnPage($arg1)
    {
        $this->amOnPage($arg1);
    }

    //create service request

    /**
     * @When I write :arg1 in the :arg2 field
     */
    public function iWriteInTheField($arg1, $arg2)
    {
        $this->fillField($arg2, $arg1);
    }

    /**
     * @Then I see :arg1 in the page :arg2
     */
    public function iSeeInThePage($arg1, $arg2)
    {
        $this->amOnPage($arg2);
        $this->see($arg1);
    }

    //delete from cart

    /**
     * @When I press the hyperlink :arg1
     */
    public function iPressTheHyperlink($arg1)
    {
        $this->click(['name' => $arg1]);
    }

   /**
     * @Then I should see :arg1 in the page :arg2
     */
    public function iShouldSeeInThePage($arg1, $arg2)
    {
        $this->amOnPage($arg2);
        $this->see($arg1);
    }

    //update profile
    /**
     * @When enter :arg1 in the :arg2 field
     */
    public function enterInTheField($arg1, $arg2)
    {
        $this->fillField($arg2, $arg1);
    }

    /**
     * @When I press the :arg1 button
     */
    public function iPressTheButton2($arg1)
    {
        $this->click($arg1);
    }

    //modify quantity of cart

    /**
     * @Given I have an item in the cart
     */
    public function iHaveAnItemInTheCart()
    {
        $this->amOnPage('http://localhost/Cart/index/10');
        $this->see('The amazing baguette');
    }

   /**
    * @When I enter :arg1 in the field :arg2
    */
    public function iEnterInTheField($arg1, $arg2)
    {
        $this->fillField($arg2, $arg1);
    }

   /**
    * @When click the button :arg1
    */
    public function clickTheButton($arg1)
    {
        $this->click($arg1);
    }

    //request product return
    /**
     * @Then I should see :arg1 on the page :arg2
     */
    public function iShouldSeeOnThePage($arg1, $arg2)
    {
        $this->amOnPage($arg2);
        $this->see($arg1);
    }

    // search catalogue

     /**
     * @When I input :arg1 in the searchbar
     */
    public function iInputInTheSearchbar($arg1)
    {
        $this->fillField('bar', $arg1);
        $this->click('search');
    }

   /**
    * @Then I should see :arg1 in the search results
    */
    public function iShouldSeeInTheSearchResults($arg1)
    {
        $this->see($arg1);
    }

    //see product details

    /**
     * @When I click on the hyperlink :arg1
     */
    public function iClickOnTheHyperlink($arg1)
    {
        $this->click(['name' => $arg1]);
    }

   /**
    * @Then I should be on the page :arg1
    */
    public function iShouldBeOnThePage($arg1)
    {
        $this->amOnPage($arg1);
    }

    //login as a user

    /**
     * @When I fill in the username field with :arg1
     */
    public function iFillInTheUsernameFieldWith($arg1)
    {
        $this->fillField('username', 'con');
        
    }

   /**
    * @When password field with :arg1
    */
    public function passwordFieldWith($arg1)
    {
        $this->fillField('password', 'con');
        
    }

   /**
    * @When I click the button :arg1
    */
    public function iClickTheButton($arg1)
    {
        $this->click($arg1);
    }

    //user registration

     /**
     * @When I fill in the field :arg1 with :arg2
     */
    public function iFillInTheFieldWith($arg1, $arg2)
    {
        $this->fillField($arg1, $arg2);
    }

    // user view purchases

    //logout

    /**
     * @Given I am logged in
     */
    public function iAmLoggedIn()
    {
       $this->iAmLoggedInAsAUser();
    }

    //seller register
    /**
     * @When I select the option :arg1
     */
    public function iSelectTheOption($arg1)
    {
        $this->selectOption('choice', $arg1);
    }

    //seller login

    //seller profile creation

     /**
     * @Given I am logged in as a seller
     */
    public function iAmLoggedInAsASeller()
    {
        $this->amOnPage('Account/index/');
        $this->fillField('username', 'sel');
        $this->fillField('password', 'sel');
        $this->click('action');
        $this->amOnPage('https://localhost/Account/setup2fa/');
        $this->click('cancel');
        $this->amOnPage("/Main/index");
    }

    //seller add a product
    /**
     * @When I fill the field :arg1 with :arg2
     */
    public function iFillTheFieldWith($arg1, $arg2)
    {
        $this->fillField($arg1, $arg2);
    }

   /**
    * @Then I should see :arg1
    */
    public function iShouldSee($arg1)
    {
        $this->see($arg1);
    }

    //seller view requests

    /**
     * @Given am on page :arg1
     */
    public function amOnPage($arg1)
    {
        $this->amOnPage($arg1);
    }
}
