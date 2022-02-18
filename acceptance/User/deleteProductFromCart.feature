Feature: Delete Product from Cart (User)
  In order to delete a product from my shopping cart
  As a user
  I need to click on the delete button next to the product in my cart to delete the product from the cart

  Scenario: try delete product from cart
  Given I have a product in my shopping cart
  When I click on the "Delete" button next to that product
  Then I see "Product Removed From Shopping Cart"
