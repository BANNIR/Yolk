Feature: sellerProfileCreate.feature
  In order to make a profile
  As a seller
  I need to enter the information for the profile

  Scenario: try sellerProfileCreate.feature
  Given I am logged in as a seller
  And I am on page "http://localhost/Seller/create/12"
  When I enter "Seller Co." in the field "name"
  And I press the button "action"
  Then I should be on page "http://localhost/Seller/index/12"

