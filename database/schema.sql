-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2016 年 10 月 18 日 13:34
-- 服务器版本: 5.6.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: 
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

-- --------------------------------------------------------

--
-- 表的结构 `t_message`
--

CREATE TABLE IF NOT EXISTS `t_message` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TYPE` int(4) DEFAULT NULL,
  `CONTENT` varchar(255) DEFAULT NULL,
  `OTHERID` bigint(20) DEFAULT NULL,
  `TO` bigint(20) DEFAULT NULL,
  `FROM` bigint(20) DEFAULT NULL,
  `STATUS` int(4) DEFAULT NULL,
  `CREATETIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7600 ;

-- --------------------------------------------------------

--
-- 表的结构 `t_number`
--

CREATE TABLE IF NOT EXISTS `t_number` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NUMBER` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- 表的结构 `t_operate`
--

CREATE TABLE IF NOT EXISTS `t_operate` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) DEFAULT NULL,
  `CONTENT` varchar(255) DEFAULT NULL,
  `OBJ` varchar(100) DEFAULT NULL,
  `CREATEDATE` datetime DEFAULT NULL,
  `STATUS` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2290 ;

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

-- --------------------------------------------------------

--
-- 表的结构 `t_signed`
--

CREATE TABLE IF NOT EXISTS `t_signed` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14481 ;

-- --------------------------------------------------------

--
-- 表的结构 `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `AUTHORITY` varchar(50) NOT NULL COMMENT '0:超级管理员 1：管理员 2：普通用户',
  `NICKNAME` varchar(100) NOT NULL,
  `REALNAME` varchar(20) DEFAULT NULL,
  `BIRTHDAY` date DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `QQ` varchar(20) DEFAULT NULL,
  `SINA` varchar(30) DEFAULT NULL,
  `CODE` varchar(20) DEFAULT NULL,
  `PROVINCE_CODE` varchar(10) DEFAULT NULL,
  `SEX` int(10) DEFAULT NULL,
  `IN_DATE` datetime DEFAULT NULL,
  `CREATE_TIME` datetime DEFAULT NULL,
  `BAIDU` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `STATUS` int(4) DEFAULT NULL,
  `REMARK` varchar(200) DEFAULT NULL,
  `PROVINCE_AUTH` varchar(255) DEFAULT NULL,
  `GRADE` int(11) DEFAULT NULL,
  `CREDIT` int(11) DEFAULT NULL,
  `TOTALCREDIT` int(11) DEFAULT NULL,
  `SIGNED` int(11) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2096 ;
