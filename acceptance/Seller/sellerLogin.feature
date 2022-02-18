Feature: Login (Seller)
  In order to Login
  As a seller
  I need to enter the correct information

  Scenario: try sellerLogin
    Given I am not logged in
    When I am in the login page
    And I enter the correct username and password
    Then I am redirected to the home page
