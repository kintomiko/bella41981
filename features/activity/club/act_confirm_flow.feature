
 Feature: 活动积分发放需达成以下规则:

   @mink:user0
   Scenario: 活动参与者可以邀请除组织者外的5个参与者为其确认
     Given I log in with username: "user0" and password: "123123"
     And I am on "/club"
     And I follow "活动管理"
     And I follow "我的活动"
     When I follow "确认测试活动"
     Then I should see "邀请确认"
     And I follow "邀请确认"
     And I check "user1"
     And I check "user2"
     And I check "user3"
     And I check "user4"
     And I check "user5"
     And I follow "确定邀请"
     And I should see "成功" in popup


   @mink:user1
   Scenario: 活动参与者(user1)被邀请确认后会收到消息,消息里有确认页面链接进行确认
     Given I log in with username: "user1" and password: "123123"
     And I am on "/club"
     And I follow "消息"
     And I should see "来自user0的确认邀请"
     And I follow "来自user0的确认邀请"
     When I follow "点击链接帮其确认"
     Then I fill in "comment" with "是个好人"
     And I follow "确定"
     And I should see "成功确认"

   @mink:user2
   Scenario: 活动参与者(user2)被邀请确认后会收到消息,消息里有确认页面链接进行确认
     Given I log in with username: "user2" and password: "123123"
     And I am on "/club"
     And I follow "消息"
     And I should see "来自user0的确认邀请"
     And I follow "来自user0的确认邀请"
     When I follow "点击链接帮其确认"
     Then I fill in "comment" with "是个好人"
     And I follow "确定"
     And I should see "成功确认"

   @mink:user3
   Scenario: 活动参与者(user3)被邀请确认后会收到消息,消息里有确认页面链接进行确认
     Given I log in with username: "user3" and password: "123123"
     And I am on "/club"
     And I follow "消息"
     And I should see "来自user0的确认邀请"
     And I follow "来自user0的确认邀请"
     When I follow "点击链接帮其确认"
     Then I fill in "comment" with "是个好人"
     And I follow "确定"
     And I should see "成功确认"

   @mink:user0
   Scenario: 活动参与者(user0)收到三个确认之后,活动状态变为已确认,并获得参与活动积分
     Given I am on "/club"
     And I follow "活动管理"
     And I follow "我的活动"
     When I follow "确认测试活动"
     Then I should see "已确认" in the row with "user0"
     And I am on "/club"
     And I should see "5/12"

   @mink:starter
   Scenario: 活动参与者如果有一半以上(含一半)的人变为确认状态,活动发起者得到积分
     Given "user1" "123123" invite "user2" "user3" "user4" "user5" confirm for "确认测试活动"
     And "user2" "123123" invite "user1" "user3" "user4" "user5" confirm for "确认测试活动"
     And "user3" "123123" invite "user1" "user2" "user4" "user5" confirm for "确认测试活动"
     And "user4" "123123" invite "user1" "user2" "user3" "user5" confirm for "确认测试活动"
     When "user1" confirm "user2" "user3" "user4"
     And "user2" confirm "user1" "user3" "user4"
     And "user3" confirm "user1" "user2" "user4"
     And "user4" confirm "user1" "user2" "user3"
     Then I am on "/club"
     And I should see "13/108"