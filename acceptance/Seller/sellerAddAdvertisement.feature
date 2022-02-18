Feature: Add Advertisement (Seller)
  In order to add an adverstisement
  As a seller
  I need to fill out an advertisement form

  Scenario: try sellerAddAdvertisement
    Given I am logged in as a seller
    When I click the ad button
    Then a form will appear
    When I press the submit button
    Then the users will be able to see it
