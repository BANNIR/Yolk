Feature: sellerRegister
  In order to register
  As a seller
  I need to fill in the form

  Scenario: try sellerRegister
  Given I am on the page "http://localhost/Account/register"
  When I fill in the field "email" with "sell@sell.com"
  And I fill in the field "username" with "sel"
  And I fill in the field "password" with "sel"
  And I fill in the field "password_confirm" with "sel"
  And I select the option "isSeller"
  And I click the button "register"
  Then I should be on the page "http://localhost/Account/login"
