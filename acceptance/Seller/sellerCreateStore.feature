Feature: Create Store (Seller)
  In order to create a store
  As a seller
  I need to press the createStore button

  Scenario: try sellerCreateStore
    Given I am logged in as a seller
    When I go to my profile page
    And I press the createStore button
    Then I can start selling products
