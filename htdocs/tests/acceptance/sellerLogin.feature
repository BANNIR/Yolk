Feature: sellerLogin.feature
  In order to sell products
  As a seller
  I need to login

  Scenario: try sellerLogin.feature
  Given I am on the page "http://localhost/Account/index"
  When I fill in the username field with "sel"
  And password field with "sel"
  And I click the button "action"
  Then I should be on the page "http://localhost/Account/setup2fa"
