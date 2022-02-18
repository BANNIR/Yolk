Feature: Respond to Client Service Requests (Seller)
  In order to respond to a message left by a user
  As a seller
  I need to view the message and press the reply button

  Scenario: try respondClientServiceRequests
    Given I am logged in as a seller
    When I press the reply button
    Then the reply screen opens
    And I can write a message and send it to the user 
