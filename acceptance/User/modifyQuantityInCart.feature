Feature: Modify Product Quantity in Cart (User)
  In order to modify product quantity in cart
  As a user
  I need to have this product in my shopping cart so I can modify its quantity

  Scenario: try modify product quantity in cart
  Given I have a product in my shopping cart
  When I access my shopping cart and see the product quantity
  And click on the + or - signs next to the quantity indicator
  Then the quantity of the product in the cart changes
