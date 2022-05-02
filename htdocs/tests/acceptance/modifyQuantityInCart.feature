Feature: modifyQuantityInCart
  In order to modify product quantity in cart
  As a user
  I need to update the quantity of a product in cart

  Scenario: try modifyQuantityInCart
  Given I am logged in as a user
  And I have an item in the cart
  And I am on the page "http://localhost/Cart/index/10"
  When I press the hyperlink "update"
  And I enter "2" in the field "quantity"
  And click the button "update"
  Then I should see "2" in the page "http://localhost/Cart/index/10"
