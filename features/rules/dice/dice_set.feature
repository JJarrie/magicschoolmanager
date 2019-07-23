Feature: Dice

  Scenario: I roll a D4
    Given a dice with 4 faces
    When I roll it
    Then I have a result
    And it's greather or equals to 1
    And it's lower or equals to 4

  Scenario: I roll a D6
    Given a dice with 6 faces
    When I roll it
    Then I have a result
    And it's greather or equals to 1
    And it's lower or equals to 6

  Scenario: I roll a D8
    Given a dice with 8 faces
    When I roll it
    Then I have a result
    And it's greather or equals to 1
    And it's lower or equals to 8

  Scenario: I roll a D10
    Given a dice with 10 faces
    When I roll it
    Then I have a result
    And it's greather or equals to 1
    And it's lower or equals to 10

  Scenario: I roll a D12
    Given a dice with 12 faces
    When I roll it
    Then I have a result
    And it's greather or equals to 1
    And it's lower or equals to 12

  Scenario: I roll a D20
    Given a dice with 20 faces
    When I roll it
    Then I have a result
    And it's greather or equals to 1
    And it's lower or equals to 20
