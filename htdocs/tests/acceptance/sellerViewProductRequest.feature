Feature: sellerViewProductRequest.feature
  In order to provide good service
  As a seller
  I need to view my requests

  Scenario: try sellerViewProductRequest.feature
  Given I am logged in as a seller
  And I am on the page "http://localhost/Seller/index/12"
  When I click on the hyperlink "requests"
  Then I should be on page "http://localhost/Request/sellerIndex/5"
  And I should see "request: pending"
