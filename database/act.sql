DELETE FROM t_menu;

INSERT INTO `t_menu` (`ID`, `PARENT`, `NAME`, `URL`, `ORDER`, `ICON`)
VALUES
  (1, NULL, '成员管理', NULL, 5, 'fa-users'),
  (2, 1, '会员管理', 'club/userList', 1, NULL),
  (3, 1, '会员审批', 'club/approvalList', 2, NULL),
  (4, 6, '管理员列表', 'club/adminList', 1, NULL),
  (5, NULL, '个人资料', 'club/userInfo', 2, 'fa-user'),
  (6, NULL, '系统管理', NULL, 7, 'fa-gears'),
  (7, 6, '操作记录', 'club/operateList', 3, NULL),
  (8, 6, '公告管理', 'club/annoList', 2, NULL),
  (9, NULL, '兑换记录', 'club/cashList', 3, 'fa-shopping-cart'),
  (10, NULL, '兑换管理', 'club/cashAdmin', 4, 'fa-truck'),
  (11, NULL, '信息展示', NULL, 6, 'fa-dropbox'),
  (12, 11, '商品管理', 'club/productList', 1, NULL),
  (13, NULL, '活动管理', '', 1, 'fa-users'),
  (14, 13, '全部活动', 'club/actList', 1, NULL),
  (15, 13, '活动审批', 'club/approveActList', 1, NULL),
  (16, 13, '我的活动', 'club/myAct', 2, NULL);

DELETE FROM t_role_menu;
INSERT INTO `t_role_menu` (`ID`, `ROLE_CODE`, `MENU_ID`)
VALUES
  (1, 0, 4),
  (2, 1, 1),
  (3, 1, 2),
  (4, 1, 3),
  (5, 2, 5),
  (6, 0, 6),
  (7, 0, 7),
  (8, 3, 10),
  (9, 2, 9),
  (10, 0, 11),
  (11, 0, 12),
  (12, 2, 14),
  (13, 2, 13),
  (14, 1, 13),
  (15, 1, 14),
  (16, 0, 13),
  (17, 0, 15),
  (18, 2, 16),
  (19, 1, 16),
  (20, 0, 16),
  (21, 0, 14);

DROP TABLE IF EXISTS t_act;
CREATE TABLE `t_act` (
	`ID` bigint(20) NOT NULL AUTO_INCREMENT,
	`STARTER_ID` bigint(20) NOT NULL,
	`PROVINCE_CODE` varchar(255) DEFAULT NULL,
	`GRADE` int(11) DEFAULT NULL,
	`LOCATION` varchar(255) DEFAULT NULL,
	`START_ON` datetime DEFAULT NULL,
	`END_ON` datetime DEFAULT NULL,
  `REG_START_ON` datetime DEFAULT NULL,
  `REG_END_ON` datetime DEFAULT NULL,
	`TITLE` varchar(255) NOT NULL,
	`DESC` varchar(1024) DEFAULT NULL,
	`CREDIT` int(11) DEFAULT NULL,
	`STATUS` int(11) DEFAULT 0,
	`MAX_PART` int(11) DEFAULT 0,
  `MIN_PART` int(11) DEFAULT 0,
	`CUR_PART`int(11) DEFAULT 0,
	PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS t_act_part;
CREATE TABLE `t_act_part` (
	`ID` bigint(20) NOT NULL AUTO_INCREMENT,
	`ACT_ID` bigint(20) NOT NULL,
	`USER_ID` bigint(20) NOT NULL,
	`STATUS` int(11) DEFAULT 0,
	PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS t_act_img;
CREATE TABLE `t_act_img` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ACT_ID` bigint(20) NOT NULL,
  `URL` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;