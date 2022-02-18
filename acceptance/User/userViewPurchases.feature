Feature: View Purchases (User)
  In order to view purchases
  As a user
  I need to access my account and spot the "Bought Items" button

  Scenario: try view purchases
  Given I am logged in
  When I click on my name
  And click on the "Bought Items" button
  Then I see all the products I have purchased
