Feature: userRegister
   In order to be able to use the full functionality of the website
  As a any person that can access the website
  I need to be able to register to the website

  Scenario: try userRegister
  Given I am on the page "http://localhost/Account/register"
  When I fill in the field "email" with "test@test.com"
  And I fill in the field "username" with "test"
  And I fill in the field "password" with "test"
  And I fill in the field "password_confirm" with "test"
  And I click the button "register"
  Then I should be on the page "http://localhost/Account/login"
