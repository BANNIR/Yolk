Feature: Register (User)
  In order to be able to use the full functionality of the website
  As a any person that can access the website
  I need to be able to register to the website

  Scenario: try registering to the website
  Given I can see and click the "Register" button
  When I enter the appropriate forms
  And click "Register!"
  Then I am logged in automatically and redirected to the "Home Page"
