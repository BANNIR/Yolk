Feature: userLogin
  In order to be able to use the functionality of the website reserved to users who login
  As any person that can access the website
  I need to be able to login the website


  Scenario: try userLogin
  Given I am on the page "http://localhost/Account/index"
  When I fill in the username field with "con"
  And password field with "con"
  And I click the button "action"
  Then I should be on the page "http://localhost/Account/setup2fa"
