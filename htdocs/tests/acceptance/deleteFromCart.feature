Feature: deleteFromCart
  In order to delete a product from my shopping cart
  As a user
  I need to click on the delete button next to the product in my cart to delete the product from the cart

  Scenario: try deleteFromCart
  Given I am logged in as a user
  When I am on the page "http://localhost/Cart/index/7"
  And I press the hyperlink "delete"
  Then I should see "No items in cart!" in the page "http://localhost/Cart/index/7"
