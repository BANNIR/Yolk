Feature: modifyProfile
  In order to modify my profile information
  As a user
  I need to go to my profile and click Edit Profile in order to be able to modify my information

  Scenario: try modifyProfile
  Given I am logged in as a user
  When I am on the page "http://localhost/Consumer/update/10"
  And enter "constant" in the "first_name" field
  And I press the "action" button
  Then I should see "constant" in the page "http://localhost/Consumer/index/10"
