Feature: 炒鸡管理员的基本活动管理功能

  Background:
    Given I log in with username: "sadmin" and password: "123123"

  @mink:sadmin
  Scenario: 炒鸡管理员登陆我的海岸,能使用活动管理
    Given I am on "/club"
    When I follow "活动管理"
    Then I should see "活动审批"
    And I should see "全部活动"
    And I should see "我的活动"