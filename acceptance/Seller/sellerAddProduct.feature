Feature: Add Product (Seller)
  In order to add a product
  As a seller
  I need to press the addAProduct button

  Scenario: try sellerAddProduct
    Given I am logged in as a seller
    And the product is unique
    When I go to my store page
    And I click addAProduct button
    Then the product gets added next to the rest