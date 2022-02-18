Feature: See Product Details 
  In order to see the product details
  As a user
  I need to be able to access the catalog and the product
 
  Scenario: try seeing product details
  Given I can see a product after searching for one in the searchbar (as long as it exists)
  When I click on its name
  Then I see the product's details
