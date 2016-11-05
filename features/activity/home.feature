Feature: 非会员用户的基本活动管理功能

  @javascript
  Scenario: 非会员用户能在首页看到所有活动
    Given I am on "/"
    Then I should see "全部活动"