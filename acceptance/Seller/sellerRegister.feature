Feature: Register (Seller)
  In order to register
  As a seller
  I need to press the "register as a seller" radiobutton

  Scenario: try sellerRegister
    Given I am logged out
    When I am on the register page
    And I press the "register as a seller" radiobutton
    And I input a valid username and password
    Then I will be logged in
    And I will be redirected to the home page