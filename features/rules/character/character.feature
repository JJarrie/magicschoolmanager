Feature: Character

  Scenario: Create a character
    Given a character's name "Oliver"
    When I create a character
    Then I have a character
