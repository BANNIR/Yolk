Feature: requestProductReturn
  In order to request a return of purchased product
  As a user
  I need to go to purchases page and press the refund button

  Scenario: try requestProductReturn
  Given I am logged in as a user
  And I am on page "http://localhost/ProductReturn/create/15"
  When I press the button "return_create"
  Then I should see "request: pending" on the page "http://localhost/ProductReturn/index/6"
  
