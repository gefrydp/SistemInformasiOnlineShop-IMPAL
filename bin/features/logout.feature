Feature: Logout
  In order to end login
  As a logged-in user
  I want to end using web 

  Scenario: End using account
    Given i finish all transactions
    When I click logout button
    Then I should be logged out