Feature: 普通用户的基本活动管理功能

  Background:
    Given I log in with username: "user" and password: "123123"

  @mink:user
  Scenario: 会员能使用活动管理
    Given I am on "/club"
    When I follow "活动管理"
    And I should see "我的活动"

  @mink:user
  Scenario: 会员能发起活动
    Given I am on "/club"
    When I follow "活动管理"
    And I follow "我的活动"
    Then I should see "发起活动"

  @mink:user
  Scenario: 会员填入恰当信息,能成功发起活动
    Given I am on "/"
    And I follow "发起活动"
    When I fill in the following:
      | title        | 测试活动     |
      | credit       | 10         |
      | max_part     | 10         |
      | min_part     | 5          |
      | grade        | 1          |
      | start_on     | 2016-11-10 |
      | end_on       | 2016-11-11 |
      | reg_start_on | 2016-11-1  |
      | reg_end_on   | 2016-11-9  |
      | location     | 北京天安门   |
      | desc         | 烧烤        |
    And I select "北京" from "province_code"
    And I press "保 存"
    Then I should see "添加成功" in popup

  @mink:user
  Scenario: 会员发起活动后,能看到自己发起的活动
    Given I am on "/club"
    And I follow "活动管理"
    When I follow "我的活动"
    Then I should see "测试活动"

  @mink:user
  Scenario: 会员发起活动后,活动不会被发布到全部活动
    Given I am on "/"
    Then I should not see "测试活动"