Feature: Create Service Request (User)
  In order to create a service request
  As a user 
  I need to go to my profile page and access the "Create Service Request" button to create any request

  Scenario: try creating a service request
  Given I am logged in
  When I click my name and go to my profile page
  And I can see and access the "Create Service Request" button
  Then I can fill out the forms and click "Send" to create the request
