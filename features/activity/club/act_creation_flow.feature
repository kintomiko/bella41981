Feature: 活动创建声明周期

  @mink:user
  Scenario: 会员填入恰当信息,能成功发起活动
    Given  I log in with username: "user" and password: "123123"
    And I am on "/"
    And I should not see "活动声明周期测试"
    And I follow "发起活动"
    When I fill in the following:
      | title        | 活动声明周期测试     |
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

  @mink:sadmin
  Scenario: 管理员能够审批上面的"活动声明周期测试"
    Given I log in with username: "sadmin" and password: "123123"
    And I am on "/club"
    When I follow "活动管理"
    And I follow "活动审批"
    And I should see "活动声明周期测试"
    And I click "审批" in the row with "活动声明周期测试"
    Then I should see "通过审批"
    And I should see "审批失败"
    And I follow "通过审批"
    And I should see "审批通过,活动已发布到首页"

  @mink:participant
  Scenario: 会员能看见审批通过的活动
    Given I log in with username: "participant" and password: "123123"
    And I am on "/"
    And I should see "活动声明周期测试"
    When I follow "活动声明周期测试"
    And I should see "参加活动"
    Then I follow "参加活动"
    And I should see "参加活动成功"