Feature: See Product Return Request (Seller)
  In order to see the product return request
  As a seller
  I need to open the return tab in the request page

  Scenario: try seeProductReturnRequest
    Given I am logged in as a seller
    When I open the product return request page
    And a user is requesting a product return
    Then I it diplayed in a list
