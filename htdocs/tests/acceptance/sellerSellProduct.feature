Feature: sellerSellProduct.feature
  In order to make money
  As a seller
  I need to sell a product

  Scenario: try sellerSellProduct.feature
  Given I am logged in as a seller
  And I am on the page "http://localhost/Product/create"
  When I fill the field "name" with "Test Product"
  And I fill the field "product_description" with "Test Description"
  And I fill the field "product_price" with "10"
  And I fill the field "product_quantity" with "3"
  And I click the button "create"
  Then I should be on the page "http://localhost/Product/index/5"
  And I should see "Test Product"
