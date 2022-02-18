Feature: Logout (Seller)
  In order to logout
  As a seller
  I need to press the logout button

  Scenario: try sellerLogout
    Given I am logged in as a seller
    When I press the logout button
    Then the session ends
    And I get redirected to the home page
