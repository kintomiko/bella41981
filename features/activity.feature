# features/search.feature
Feature: Activity

  @javascript
  Scenario: 会员登陆之后能看到活动管理
    Given I log in with username: "sadmin" and password: "123123"
    And I am on "/club"
    When I wait for "1" secs
    And I follow "活动管理"
    Then I wait to see "全部活动"
    And I wait to see "我的活动"