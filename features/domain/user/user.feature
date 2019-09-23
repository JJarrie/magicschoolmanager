Feature: User

  Background:
    Given the registered users:
      | Firstname      | Lastname       | Username | Password            | Role       |
      | Administrateur | Administrateur | Admin    | secretPasswordAdmin | ROLE_ADMIN |
      | Alice          | Smith          | ASmith   | secretPasswordAlice | ROLE_USER  |

  Scenario: Create an User
    Given the creation's user infos:
      | Firstname | Lastname | Username | Password       | Role      |
      | Jeremy    | Jarrie   | JJarrie  | secretPassword | ROLE_USER |
    When I create a user with this infos
    Then I can find it by his username
    And the finded user has this infos:
      | Firstname | Lastname | Username | Password       | Role      |
      | Jeremy    | Jarrie   | JJarrie  | secretPassword | ROLE_USER |

  Scenario: Successed login
    Given the log's information:
      | Username | Password            |
      | Admin    | secretPasswordAdmin |
    When I try to login
    Then I am successed logged

  Scenario: Failed login
    Given the log's information:
      | Username | Password           |
      | Admin    | wrongPasswordAdmin |
    When I try to login
    Then I am not successed logged
