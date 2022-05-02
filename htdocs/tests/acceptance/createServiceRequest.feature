Feature: createServiceRequest
  In order to create a service request
  As a user 
  I need to go to my profile page and access the "Create Service Request" button to create any request

  Scenario: try createServiceRequest
  Given I am logged in as a user
  And I am on page "http://localhost/Request/create/15"
  When I write "help me" in the "request_description" field 
  And I press the button "request_create"
  Then I see "request: pending" in the page "http://localhost/Request/index/6"