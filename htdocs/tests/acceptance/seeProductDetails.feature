Feature: seeProductDetails
  In order to see the product details
  As a user
  I need to be able to access the catalog and the product

  Scenario: try seeProductDetails
  Given I am logged in as a user
  And I am on the page "http://localhost/Catalog/index"
  When I click on the hyperlink "product"
  Then I should be on the page "http://localhost/Product/page/15"
