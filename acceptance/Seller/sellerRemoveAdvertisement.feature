Feature: Remove Advertisement (Seller)
  In order to remove an advertisement
  As a seller
  I need to press the remove button

  Scenario: try sellerRemoveAdvertisement
    Given I am logged in as a seller
    When I am on the all advertisement page
    And I press on a advertisement
    And I press the remove button
    Then the adverstisement gets deleted
    And users won't be able to see it
