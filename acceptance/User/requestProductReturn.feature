Feature: Request Return of Product (User)
  In order to request a return of purchased product
  As a user
  I need to go to my profile page, access the "Bought Items" page and I have the possibility of demanding a return of a product

  Scenario: try request return of product
  Given I have bought a product already
  When I go to my profile page, access the "Bought Items" page
  And click "Request Product Return"
  Then I can send a message to the seller
