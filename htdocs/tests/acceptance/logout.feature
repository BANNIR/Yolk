Feature: logout
  In order to logout
  As a user
  I need to click on the logout button

  Scenario: try logout
  Given I am logged in
  When I click on the hyperlink "logout"
  Then  I should be on the page "http://localhost/Account/index"
