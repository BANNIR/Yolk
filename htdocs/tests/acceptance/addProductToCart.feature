Feature: addProductToCart
  In order to add a product to cart
  As a user
  I need to to be able to press the button to add a product to cart

  Scenario: try addProductToCart
  Given I am logged in As a user
  When I am on the page "https://localhost/Product/page/15"
  And I press the button "cart"
  Then I should see the product added to cart
