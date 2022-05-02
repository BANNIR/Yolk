Feature: checkoutOrder
  In order to checkout
  As a customer
  I need to have a cart filled with at least a product

  Scenario: try checkoutOrder
  Given I am logged in as a user
  Given I am on page "https://localhost/Cart/index/7"
  And I have a product in my cart
  When I click on "checkout"
  Then I should be on page "https://localhost/Checkout/index"
