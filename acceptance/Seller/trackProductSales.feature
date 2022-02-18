Feature: Track Product Sales (Seller)
  In order to track the product sales
  As a user
  I need to press the trackSales button

  Scenario: try trackProductSales
    Given I am logged in as a seller
    When I am in my profile page
    And I press the trackSales button
    Then I am redirected to the trackSales page
    And I see all the information

