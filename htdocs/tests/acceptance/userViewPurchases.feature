Feature: userViewPurchases
  In order to view purchases
  As a user
  I need to access my account and press the "Bought Items" button

  Scenario: try userViewPurchases
  Given I am logged in as a user
  And I am on the page "http://localhost/Consumer/index/10"
  When I press the hyperlink "purchases"
  Then I should be on the page "http://localhost/Consumer/purchases/10"
