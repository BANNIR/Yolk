Feature: Add Product To Cart (User)
  In order to add product to cart
  As a user
  I need to be able to select the quantity of the product I desire to add 

  Scenario: try adding product to cart
  Given I am logged into my account
  When I select a given quantity of the product I want to purchase
  And click on the "Buy Now" button
  Then I will see the product and its quantity in the shopping cart
