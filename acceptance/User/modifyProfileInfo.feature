Feature: Modify Profile Information (User)
  In order to modify my profile information
  As a user
  I need to go to my profile and click Edit Profile in order to be able to modify my information

  Scenario: try modifying profile information
  Given I have an account registered to the website
  When I login
  And click on the my name, and then on the Edit Profile button
  Then I see my current information, and forms, where I can use the forms to modify my profile information
