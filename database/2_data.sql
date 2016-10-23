-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2016 年 10 月 20 日 18:22
-- 服务器版本: 5.6.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: ``
--

-- --------------------------------------------------------

--
-- 表的结构 `t_cash`
--

CREATE TABLE IF NOT EXISTS `t_cash` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `PRODUCT_ID` bigint(20) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  `OPERATE_ID` bigint(20) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `CREATETIME` datetime DEFAULT NULL,
  `UPDATETIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `t_cash`
--


-- --------------------------------------------------------

--
-- 表的结构 `t_grade`
--

CREATE TABLE IF NOT EXISTS `t_grade` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CREDIT` int(11) DEFAULT NULL,
  `GRADE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `t_grade`
--

INSERT INTO `t_grade` (`ID`, `CREDIT`, `GRADE`) VALUES
(1, 0, 1),
(2, 12, 2),
(3, 108, 3),
(4, 388, 4),
(5, 712, 5),
(6, 926, 6),
(7, 1981, 7);

-- --------------------------------------------------------

--
-- 表的结构 `t_menu`
--

CREATE TABLE IF NOT EXISTS `t_menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARENT` int(11) DEFAULT NULL,
  `NAME` varchar(20) DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL,
  `ORDER` int(11) DEFAULT NULL,
  `ICON` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `t_menu`
--

INSERT INTO `t_menu` (`ID`, `PARENT`, `NAME`, `URL`, `ORDER`, `ICON`) VALUES
(1, NULL, '成员管理', NULL, 4, 'fa-users'),
(2, 1, '会员管理', 'club/userList', 1, NULL),
(3, 1, '会员审批', 'club/approvalList', 2, NULL),
(4, 6, '管理员列表', 'club/adminList', 1, NULL),
(5, NULL, '个人资料', 'club/userInfo', 1, 'fa-user'),
(6, NULL, '系统管理', NULL, 6, 'fa-gears'),
(7, 6, '操作记录', 'club/operateList', 3, NULL),
(8, 6, '公告管理', 'club/annoList', 2, NULL),
(9, NULL, '兑换记录', 'club/cashList', 2, 'fa-shopping-cart'),
(10, NULL, '兑换管理', 'club/cashAdmin', 3, 'fa-truck'),
(11, NULL, '信息展示', NULL, 5, 'fa-dropbox'),
(12, 11, '商品管理', 'club/productList', 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_number`
--

CREATE TABLE IF NOT EXISTS `t_number` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NUMBER` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `t_number`
--

INSERT INTO `t_number` (`ID`, `NUMBER`) VALUES
(11, '0712'),
(12, '0926'),
(13, '1981');

-- --------------------------------------------------------

--
-- 表的结构 `t_product`
--

CREATE TABLE IF NOT EXISTS `t_product` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) DEFAULT NULL,
  `GRADE` int(11) DEFAULT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `TAOBAO` varchar(255) DEFAULT NULL,
  `IMAGEURL` varchar(255) DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `COUNT` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT '0',
  `DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `t_product`
--

INSERT INTO `t_product` (`ID`, `NAME`, `GRADE`, `DESCRIPTION`, `TAOBAO`, `IMAGEURL`, `STOCK`, `COUNT`, `STATUS`, `DATE`) VALUES
(1, '姚贝娜后援会会服', 610, '后援会红色会服，兑换后请联系网店客服下单，邮费需自付', 'https://item.taobao.com/item.htm?spm=a230r.1.14.8.kjnlss&id=531394927972&ns=1&abbucket=4#detail', 'https://gd2.alicdn.com/bao/uploaded/i2/760815319/TB2ChRQoFXXXXXIXFXXXXXXXXXX_!!760815319.jpg', 9999, 0, 1, '2016-06-01 00:00:00'),
(2, '定制扑克牌', 610, '限量版粉丝自制扑克', 'https://item.taobao.com/item.htm?spm=a1z10.3-c.w4002-14153656877.37.Tl65by&id=533888282929', 'https://img.alicdn.com/imgextra/i2/760815319/TB27ae1qVXXXXXkXXXXXXXXXXXX_!!760815319.jpg', 5, 0, 1, '2016-06-26 09:50:08'),
(3, '《二分之一的我》亲笔签名专辑', 7120, '《二分之一的我》贝娜亲笔签名专辑', 'https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-14153656864.10.2FMEZD&id=533948936537', 'https://img.alicdn.com/imgextra/i4/760815319/TB2EEapqVXXXXX0XpXXXXXXXXXX_!!760815319.jpg', 1, 0, 1, '2016-05-30 13:45:19'),
(4, '广汽丰田致炫CD', 6100, '绝版藏品！广汽丰田白色致炫主题曲Beautiful Light！', 'https://item.taobao.com/item.htm?spm=2013.1.w4023-14153656871.13.7X8Em9&id=533824199339', 'https://img.alicdn.com/imgextra/i4/760815319/TB2iUWNqVXXXXaLXXXXXXXXXXXX_!!760815319.jpg', 1, 0, 1, '2016-06-26 09:47:08'),
(5, '《依爱》CD', 5200, '绝版藏品！镇江白蛇传景区发布', 'https://item.taobao.com/item.htm?spm=2013.1.w4023-14153656871.16.7X8Em9&id=533824387964', 'https://img.alicdn.com/imgextra/i1/760815319/TB2Lkp_qVXXXXcbXpXXXXXXXXXX_!!760815319.jpg', 1, 0, 1, '2016-06-26 09:48:54'),
(6, '姚贝娜亲笔签名照', 9260, '稀有签名照珍藏', 'https://item.taobao.com/item.htm?spm=a1z10.3-c.w4002-14153656877.40.Tl65by&id=533915589541', 'https://img.alicdn.com/imgextra/i3/760815319/TB2afB7qVXXXXcnXpXXXXXXXXXX_!!760815319.jpg', 1, 0, 1, '2016-06-26 09:52:00'),
(7, '石门峰同款姚贝娜雕像（小）', 7120, '雕像高：18CM    湖北美术学院孙绍群教授作品', 'https://item.taobao.com/item.htm?spm=a1z10.3-c.w4002-14153656877.43.Tl65by&id=533915977365', 'https://img.alicdn.com/imgextra/i1/760815319/TB2dX1WqVXXXXXOXXXXXXXXXXXX_!!760815319.jpg', 5, 0, 1, '2016-06-26 09:53:09'),
(8, '来不及（仅包装无CD) ', 6100, '绝版藏品！贝娜早期EP 仅包装壳哦', 'https://item.taobao.com/item.htm?spm=a1z10.3-c.w4002-14153656877.46.Tl65by&id=533917017045', 'https://img.alicdn.com/imgextra/i4/760815319/TB2UeqjqVXXXXa2XpXXXXXXXXXX_!!760815319.jpg', 2, 0, 1, '2016-06-26 09:54:24'),
(9, '石门峰同款姚贝娜雕像（大）', 9260, '雕像高：30CM    为湖北美术学院孙绍群教授作品', 'https://item.taobao.com/item.htm?spm=a1z10.3-c.w4002-14153656877.49.Tl65by&id=533947020786', 'https://img.alicdn.com/imgextra/i2/760815319/TB2vA9zqVXXXXbZXXXXXXXXXXXX_!!760815319.jpg', 3, 0, 1, '2016-06-26 09:55:17'),
(10, '《我爱这片蓝色海洋》（CD）', 1981, '此件展品收录了贝娜海政时期部分歌曲', 'https://item.taobao.com/item.htm?spm=a1z10.3-c.w4002-14153656877.55.Tl65by&id=533949716954', 'https://img.alicdn.com/imgextra/i3/760815319/TB2oYCJqVXXXXbsXXXXXXXXXXXX_!!760815319.jpg', 1, 0, 1, '2016-06-26 09:56:27');

-- --------------------------------------------------------

--
-- 表的结构 `t_province`
--

CREATE TABLE IF NOT EXISTS `t_province` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `CODE` varchar(10) NOT NULL,
  `STATUS` int(4) DEFAULT NULL,
  `QQ` int(11) DEFAULT NULL,
  `NUM` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `t_province`
--

INSERT INTO `t_province` (`ID`, `NAME`, `CODE`, `STATUS`, `QQ`, `NUM`) VALUES
(1, '北京', '11', 1, 331969868, 110077),
(2, '天津', '12', 1, 337014972, 120043),
(3, '河北', '13', 1, 165593554, 130094),
(4, '山西', '14', 1, 188249214, 140054),
(5, '内蒙古', '15', 1, 347128751, 150027),
(6, '辽宁', '21', 1, 44609295, 210063),
(7, '吉林', '22', 1, 303854136, 220043),
(8, '黑龙江', '23', 1, 333284420, 230053),
(9, '上海', '31', 1, 253327745, 310046),
(10, '江苏', '32', 1, 142586906, 320095),
(11, '浙江', '33', 1, 333101189, 330110),
(12, '安徽', '34', 1, 81432808, 340082),
(13, '福建', '35', 1, 234652066, 350084),
(14, '江西', '36', 1, 333286012, 360069),
(15, '山东', '37', 1, 299519391, 370107),
(16, '河南', '41', 1, 257395637, 410079),
(17, '湖北', '42', 1, 138684908, 420147),
(18, '湖南', '43', 1, 197526852, 430063),
(19, '广东', '44', 1, 194683945, 440178),
(20, '广西', '45', 1, 217025669, 450034),
(21, '海南', '46', 0, NULL, 460017),
(22, '重庆', '50', 1, 193244077, 500049),
(23, '四川', '51', 1, 241590830, 510106),
(24, '贵州', '52', 1, 313877994, 520019),
(25, '云南', '53', 1, 207761974, 530038),
(26, '西藏', '54', 0, NULL, 540010),
(27, '陕西', '61', 1, 96515108, 610064),
(28, '甘肃', '62', 1, 398468558, 620032),
(29, '青海', '63', 0, NULL, 630011),
(30, '宁夏', '64', 0, NULL, 640012),
(31, '新疆', '65', 1, 292580602, 650018),
(32, '台湾', '71', 1, 318223383, 710029),
(33, '港澳', '83', 0, NULL, 830020),
(34, '海外', '90', 0, NULL, 900027);

-- --------------------------------------------------------

--
-- 表的结构 `t_role`
--

CREATE TABLE IF NOT EXISTS `t_role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) DEFAULT NULL,
  `CODE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `t_role`
--

INSERT INTO `t_role` (`ID`, `NAME`, `CODE`) VALUES
(1, '超级管理员', '0'),
(2, '后援会管理员', '1'),
(3, '会员', '2'),
(4, '淘宝客服', '3');

-- --------------------------------------------------------

--
-- 表的结构 `t_role_menu`
--

CREATE TABLE IF NOT EXISTS `t_role_menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE_CODE` int(11) DEFAULT NULL,
  `MENU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `t_role_menu`
--

INSERT INTO `t_role_menu` (`ID`, `ROLE_CODE`, `MENU_ID`) VALUES
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
(11, 0, 12);

insert into t_user (USER_ID, NAME, PASSWORD, AUTHORITY, NICKNAME, STATUS, GRADE, CREDIT, TOTALCREDIT) values (1, 'sadmin', '123123', 0, 'sadmin', 1, 3, 300, 300);
insert into t_user (USER_ID, NAME, PASSWORD, AUTHORITY, NICKNAME, STATUS, GRADE, CREDIT, TOTALCREDIT) values (2, 'admin', '123123', 1, 'admin', 1, 3, 300, 300);
insert into t_user (USER_ID, NAME, PASSWORD, AUTHORITY, NICKNAME, STATUS, GRADE, CREDIT, TOTALCREDIT) values (3, 'user', '123123', 2, 'user', 1, 3, 300, 300);
