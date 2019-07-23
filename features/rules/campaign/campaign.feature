Feature: Campaign

  Scenario: Create a campaign
    Given a period "Far past"
    When I create a campaign
    Then I have a campaign
