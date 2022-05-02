Feature: sellerViewReturns.feature
  In order to accept returns of faulty products
  As a seller
  I need to view my return requests

  Scenario: try sellerViewReturns.feature
  Given I am logged in as a seller
  And am on page "http://localhost/Seller/index/12"
  When I click on the hyperlink "return"
  Then I should be on page "http://localhost/ProductReturn/sellerIndex/5"
  And I should see "Request: Pending"
