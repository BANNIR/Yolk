Feature: End Service Request (User)
  In order to end a service request
  As a user 
  I need to go to my profile page and access the "Created Service Requests" button to delete any request

  Scenario: try creating a service request
  Given I am logged in
  When I click my name and go to my profile page
  And I can see and access the "Created Service Requests" button
  Then I can see any requests I have created, and click the "End" button, to remove any requests.
