Feature: Login (User)
  In order to be able to use the functionality of the website reserved to users who login
  As any person that can access the website
  I need to be able to login the website

  Scenario: try logging in correctly
  Given I have registered an account for username "john1234", with password "12345"
  When I log in with "john1234", with "12345"
  Then I see the "Home Page"

  Scenario: try logging in incorrectly
  Given I have registered an account for username "john1234", with password "12345"
  When I log in with username "john123" and password "asfdnk"
  Then I see the "Incorrect username/password combination!"

