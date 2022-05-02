Feature: sellerUpdateProducts.feature
  In order to correct the products
  As a seller
  I need to be able to update the information on them

  Scenario: try sellerUpdateProducts.feature
  Given I am logged in as a seller
  And I am on page "http://localhost/Product/update/24"
  When I fill the field "product_description" with "new description"
  And I press the button "update"
  Then I should be on page "http://localhost/Product/index/5"
  And I should see "new description" 
