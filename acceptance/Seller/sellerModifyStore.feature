Feature: Modify Store (Seller)
  In order to modify the store
  As a seller
  I need to press the modify botton

  Scenario: try sellerModifyStore
    Given I am logged in as a seller
    When I press the modify button
    And I change the information
    And I press the submit button
    Then the store description changes