Feature: Ancestry

  Scenario Outline: Create an valid ancestry
    Given a name <ancestry_name>
    And a breeding world <breeding_world>
    When I create an ancestry
    Then I have an ancestry
    And I have corrects informations into this
    Examples:
      | ancestry_name | breeding_world |
      | muggle_born   | muggle_world   |
      | pure_born     | wizard_world   |
      | half_blood    | muggle_world   |
      | half_born     | wizard_world   |
