Feature: Period

  Scenario: Create a period
    Given a name "Passé lointain"
    When I create a period with this name
    Then I have a period with this name
