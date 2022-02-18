Feature: Mark product as shipped, and add tracking information (Seller)
  In order to mark product as shipped, and add tracking information
  As a seller
  I need to access the sold page
  And press on update button 

  Scenario: try shipProduct
    Given I am logged in as a seller
    When I go to the sold page
    And I press on update button
    And I input a string in the trackingInformation field
    Then the sold product updates
    And the user who bought the product sees the string 
