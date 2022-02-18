Feature: Search Catalog
  In order to search the product catalog
  As a user
  I need to input the name in the searchbar (form)

  Scenario: try searching for a product that exists
  Given I am on the page of the store
  When I enter the product's name into the searchbar 
  And press "Enter"
  Then I see the product and its details

  Scenario: try searching for a product that doesn't exist
  Given I am on the page of the store
  When I enter the product's name into the searchbar 
  And press "Enter"
  Then I see a message "Product does not exist"
  
