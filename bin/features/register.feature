Feature: Registration
  In order to make account for transactions
  As a customer and admin
  I need to input some data that required in web

  Scenario: Create Account
    Given i click daftar button
    When I type all data that required
    Then I click daftar
    And the data should be stored to database
    Then i successfully have an account