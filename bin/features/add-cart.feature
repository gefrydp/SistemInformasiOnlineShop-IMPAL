Feature: Add-Cart
  In order to buy products
  As a customer
  I need to be able to put interesting products into a basket

  Scenario: Buying a single product
    Given there is a jacket in list
    When I add the jacket to the cart
    Then I should have 1 product in the cart
    And the overall cart price should be appears