Feature: Checkout Order (User)
  In order to checkout order
  As a user
  I need to have a cart filled with at least a product and be able to purchase the products

  Scenario: try checkout order
  Given I have a cart with at least one product
  When I click on the 'Checkout' button
  Then I will have to fill out the details needed for the order, and when successful, I see "Product Ordered Successfully!"
