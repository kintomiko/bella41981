# features/search.feature
Feature: Activity

  @javascript
  Scenario: 炒鸡管理员登陆之后能看到活动管理
    Given I log in with username: "sadmin" and password: "123123"
    And I am on "/club"
    When I keep following "活动管理"
    Then I wait to see "活动审批"
    And I wait to see "全部活动"
    And I wait to see "我的活动"

  @javascript
  Scenario: 管理员登陆之后能看到活动管理
    Given I log in with username: "admin" and password: "123123"
    And I am on "/club"
    When I keep following "活动管理"
    Then I wait to see "全部活动"
    And I wait to see "我的活动"

  @javascript
  Scenario: 会员登陆之后能看到活动管理
    Given I log in with username: "user" and password: "123123"
    And I am on "/club"
    When I keep following "活动管理"
    Then I wait to see "全部活动"
    And I wait to see "我的活动"