Feature: Login
  In order to make transactions
  As a customer and admin
  I need to type user account that i have created

  Scenario: Login as Customer
    Given there is a Login button
    When I type username and password
    Then I should have a notification that tell the success login or not
    When notification tell success login
    Then I success login as Customer
    And I can make transactions

  Scenario: Login as Admin
    Given there is a Login button
    When I type username and password
    Then I should have a notification that tell the success login or not
    When notification tell success login
    Then I success login as Admin
    And can make transactions