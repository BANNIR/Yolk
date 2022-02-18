Feature: Modify Product (Seller)
  In order to modify a product
  As a seller
  I need to press the modify button and change the information

  Scenario: try sellerModifyProduct
    Given I am logged in as a seller
    When I press the modify button
    And I change the information
    And i press the submit button
    Then the product information changes
