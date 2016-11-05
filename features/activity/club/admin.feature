Feature: 管理员的活动管理功能

  Background:
    Given I log in with username: "admin" and password: "123123"

  @mink:admin
  Scenario: 管理员登陆我的海岸,能使用活动管理
    Given I am on "/club"
    When I follow "活动管理"
    Then I should see "全部活动"
    And I should see "我的活动"