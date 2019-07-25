Feature: User

  Scenario: Create an User
    Given the creation's user infos:
      | Firstname | Lastname | Username | Password       | Role      |
      | Jeremy    | Jarrie   | Gagnar   | secretPassword | ROLE_USER |
    When I create a user with this infos
    Then I can find it by his username
    And the finded user has this infos:
      | Firstname | Lastname | Username | Password       | Role      |
      | Jeremy    | Jarrie   | Gagnar   | secretPassword | ROLE_USER |
