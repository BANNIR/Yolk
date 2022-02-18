Feature: Logout (User)
  In order to enhance my privacy and account security
  As a user
  I need to be able to logout of my account

  Scenario: try logging out
  Given I am already logged in the website
  When I click on my name in any page
  And I can see the "Log out" button
  Then I can see the message "You have logged out successfully!" and I will be redirected to the "Home Page"
