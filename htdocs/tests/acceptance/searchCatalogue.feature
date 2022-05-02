Feature: searchCatalogue
  In order to search the product catalog
  As a user
  I need to input the name in the searchbar

  Scenario: try searchCatalogue

  Given I am logged in as a user
  And I am on the page "http://localhost/Catalog/index"
  When I input "Another baguette" in the searchbar
  Then I should see "Another baguette" in the search results
