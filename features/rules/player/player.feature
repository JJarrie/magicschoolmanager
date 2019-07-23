Feature: Player

  Scenario: Create a player
    Given a player's name "Franck"
    When I create a player
    Then I have a player
    And the player has the correct name
