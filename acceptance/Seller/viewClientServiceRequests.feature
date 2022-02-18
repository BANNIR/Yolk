Feature: View Client Service Requests (Seller)
  In order to view client service requests
  As a seller
  I need to go to the service tab in the request page

  Scenario: try viewClientServiceRequests
    Given I am logged in as a seller
    When I am on the request page
    And I open the service tab
    Then I see all the Service requests I recieved
