-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 04 月 20 日 17:20
-- 服务器版本: 5.1.69
-- PHP 版本: 5.2.17p1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ptop`
--

-- --------------------------------------------------------

--
-- 表的结构 `ac_access`
--

CREATE TABLE IF NOT EXISTS `ac_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `g` varchar(20) NOT NULL COMMENT '项目',
  `m` varchar(20) NOT NULL COMMENT '模块',
  `a` varchar(20) NOT NULL COMMENT '方法',
  KEY `groupId` (`role_id`),
  KEY `gma` (`g`,`m`,`a`,`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ac_access`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_account`
--

CREATE TABLE IF NOT EXISTS `ac_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `account_id` varchar(20) NOT NULL COMMENT '交易号',
  `type` tinyint(1) NOT NULL COMMENT '0手动1线上2线下',
  `bank_name` varchar(200) NOT NULL COMMENT '银行名称',
  `money` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '充值金额',
  `money_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值手续费 ',
  `money_actual` decimal(20,2) DEFAULT '0.00' COMMENT '实际到账金额',
  `state` tinyint(1) NOT NULL COMMENT '0审核1成功2失败',
  `create_time` varchar(25) NOT NULL COMMENT '充值时间',
  `create_ip` varchar(12) NOT NULL COMMENT '充值ip',
  `time` varchar(20) NOT NULL COMMENT '审核时间',
  `admin_user` varchar(22) NOT NULL COMMENT '审核会员',
  `remarks` varchar(500) NOT NULL COMMENT '审核备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='充值表' AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `ac_account`
--

INSERT INTO `ac_account` (`id`, `uid`, `user_name`, `account_id`, `type`, `bank_name`, `money`, `money_fee`, `money_actual`, `state`, `create_time`, `create_ip`, `time`, `admin_user`, `remarks`) VALUES
(1, 3, 'test', '16578945678455', 2, '郑州支行', 1000.00, 0.00, 1000.00, 2, '2015-01-22 16:44:02', '127.0.0.1', '2015-01-24 17:39:05', 'admin', '充值失败'),
(2, 3, 'test', '45657485857845865', 2, '郑州支行', 100.00, 0.00, 100.00, 1, '2015-01-24 17:47:59', '127.0.0.1', '2015-01-24 18:45:21', 'admin', '充值成功'),
(3, 3, 'test', 'st5657485857845865', 2, '郑州支行', 100.00, 10.00, 90.00, 1, '2015-01-24 18:46:48', '127.0.0.1', '2015-01-24 18:48:22', 'admin', '充值成功'),
(4, 3, 'test', '55887495754', 2, '郑州支行', 100.00, 0.00, 100.00, 1, '2015-01-26 09:50:23', '127.0.0.1', '2015-01-26 10:48:53', 'admin', '充值成功aa'),
(5, 3, 'test', '55887495754', 2, '郑州支行', 100.00, 10.00, 90.00, 1, '2015-01-26 10:49:35', '127.0.0.1', '2015-01-26 11:57:53', 'admin', '通过'),
(6, 3, 'test', '4165784654', 2, '郑州支行', 100.00, 0.00, 100.00, 2, '2015-01-26 14:04:05', '127.0.0.1', '2015-01-26 14:56:28', 'admin', '失败了'),
(7, 3, 'test', '4165784654', 2, '郑州支行', 1000.00, 20.00, 980.00, 1, '2015-01-26 14:05:19', '127.0.0.1', '2015-01-26 14:55:39', 'admin', '成功了'),
(8, 3, 'test', '23423142314231', 2, '郑州支行', 20000.00, 0.00, 20000.00, 1, '2015-01-29 15:01:26', '127.0.0.1', '2015-01-29 15:01:47', 'admin', '成功'),
(9, 7, 'ac371', '1111', 2, '郑州支行', 20000.00, 950.00, 19050.00, 1, '2015-01-29 15:03:14', '127.0.0.1', '2015-01-29 15:03:44', 'admin', '成功'),
(10, 3, 'test', '', 2, '', 100.00, 0.00, 100.00, 0, '2015-01-29 16:37:05', '127.0.0.1', '', '', '系统充值：用户充值'),
(11, 3, 'test', '', 2, '', 9.90, 0.00, 9.90, 0, '2015-01-29 16:40:58', '127.0.0.1', '', '', '系统充值：fdsafasd'),
(12, 3, 'test', '457891464', 2, '郑州支行', 3000.00, 0.00, 3000.00, 0, '2015-02-09 17:03:45', '127.0.0.1', '', '', ''),
(13, 3, 'test', '123456781456asdfasdf', 2, '郑州支行', 3000.00, 0.00, 3000.00, 0, '2015-02-11 15:05:11', '127.0.0.1', '', '', ''),
(14, 3, 'test', '123456781456asdfasdf', 2, '郑州支行', 3000.00, 0.00, 3000.00, 0, '2015-02-11 15:12:11', '127.0.0.1', '', '', ''),
(15, 3, 'test', 'dsafdasfdas12345478', 2, '郑州支行', 30000.00, 0.00, 30000.00, 0, '2015-02-11 15:12:46', '127.0.0.1', '', '', ''),
(16, 3, 'test', '12345678789fdasfdas', 2, '郑州支行', 300000.00, 0.00, 300000.00, 0, '2015-02-11 15:16:25', '127.0.0.1', '', '', ''),
(17, 3, 'test', 'dasfdasf123456', 2, '郑州支行', 300000.00, 0.00, 300000.00, 0, '2015-02-11 15:20:39', '127.0.0.1', '', '', ''),
(18, 3, 'test', '1234567894564', 2, '郑州支行', 300000.00, 0.00, 300000.00, 0, '2015-02-11 15:21:17', '127.0.0.1', '', '', ''),
(19, 3, 'test', 'dasfasdfadsfsda13245', 2, '郑州支行', 65000.00, 0.00, 65000.00, 0, '2015-02-12 10:36:48', '127.0.0.1', '', '', ''),
(20, 3, 'test', '123456', 2, '郑州支行', 10000.00, 50.00, 9950.00, 0, '2015-02-25 14:39:37', '127.0.0.1', '', '', ''),
(21, 3, 'test', '123456', 2, '郑州支行', 10000.00, 50.00, 9950.00, 1, '2015-02-25 14:40:11', '127.0.0.1', '2015-02-25 14:46:33', 'admin', ''),
(22, 13, 'wuhaofz502', '456789416345678456', 2, '郑州支行', 50000.00, 50.00, 49950.00, 0, '2015-03-14 13:47:00', '218.29.89.21', '', '', ''),
(23, 17, 'wwww', '123456789', 2, '郑州支行', 10000.00, 50.00, 9950.00, 1, '2015-03-14 14:25:45', '218.29.89.21', '2015-03-14 14:27:43', 'admin', '审核备注'),
(24, 21, 'acac', '111111111', 2, '郑州支行', 10000000.00, 50.00, 9999950.00, 1, '2015-03-14 15:50:45', '218.29.89.21', '2015-03-14 15:51:39', 'admin', '111111'),
(25, 54, 'rain', '', 2, '', 20000.00, 0.00, 20000.00, 1, '2015-04-17 16:04:26', '106.42.250.1', '2015-04-17 16:06:21', 'admin', '系统充值：线下充值');

-- --------------------------------------------------------

--
-- 表的结构 `ac_ad`
--

CREATE TABLE IF NOT EXISTS `ac_ad` (
  `ad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `ad_name` varchar(255) NOT NULL,
  `ad_content` text,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  PRIMARY KEY (`ad_id`),
  KEY `ad_name` (`ad_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ac_ad`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_admin_log`
--

CREATE TABLE IF NOT EXISTS `ac_admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `actionname` varchar(200) NOT NULL,
  `page` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- 转存表中的数据 `ac_admin_log`
--

INSERT INTO `ac_admin_log` (`id`, `uid`, `actionname`, `page`, `time`, `ip`) VALUES
(1, 1, '添加test贷款信息', 'Loan/Loanlistadmin/add_two', 1424841239, '127.0.0.1'),
(2, 1, '审核1的标', 'Loan/Fristadmin/fristaudit', 1424841790, '127.0.0.1'),
(3, 1, '通过满标复审审核并放款ID:1的标', 'Loan/Fulladmin/fullaudit', 1424843690, '127.0.0.1'),
(4, 1, '充值手续费: 会员test 充值10000.00元    手续费为50.00元', 'User/Account/review', 1424846793, '127.0.0.1'),
(5, 1, '修改积分设置', 'Admin/Level/index', 1425963683, '218.29.89.218'),
(6, 1, '修改积分设置', 'Admin/Integral/index', 1425963684, '218.29.89.218'),
(7, 1, '修改积分设置', 'Admin/Integral/index', 1426046340, '218.29.89.218'),
(8, 1, '修改积分设置', 'Admin/Level/index', 1426046393, '218.29.89.218'),
(9, 1, '修改积分设置', 'Admin/Integral/index', 1426054489, '218.29.89.218'),
(10, 1, '修改积分设置', 'Admin/Integral/index', 1426059563, '218.29.89.218'),
(11, 1, '修改积分设置', 'Admin/Level/index', 1426059569, '218.29.89.218'),
(12, 1, '添加test贷款信息', 'Loan/Loanlistadmin/add_two', 1426296381, '218.29.89.218'),
(13, 1, '添加test贷款信息', 'Loan/Loanlistadmin/add_two', 1426296527, '218.29.89.218'),
(14, 1, '添加wuhaofz502贷款信息', 'Loan/Loanlistadmin/add_two', 1426297751, '218.29.89.218'),
(15, 1, '添加z4231贷款信息', 'Loan/Loanlistadmin/add_two', 1426297946, '218.29.89.218'),
(16, 1, '添加hjh1贷款信息', 'Loan/Loanlistadmin/add_two', 1426299033, '218.29.89.218'),
(17, 1, '添加test123贷款信息', 'Loan/Loanlistadmin/add_two', 1426299149, '218.29.89.218'),
(18, 1, '添加rrr贷款信息', 'Loan/Loanlistadmin/add_two', 1426299214, '218.29.89.218'),
(19, 1, '审核2的标', 'Loan/Fristadmin/fristaudit', 1426302053, '218.29.89.218'),
(20, 1, '审核4的标', 'Loan/Fristadmin/fristaudit', 1426302075, '218.29.89.218'),
(21, 1, '审核6的标', 'Loan/Fristadmin/fristaudit', 1426302085, '218.29.89.218'),
(22, 1, '审核3的标', 'Loan/Fristadmin/fristaudit', 1426302136, '218.29.89.218'),
(23, 1, '审核5的标', 'Loan/Fristadmin/fristaudit', 1426302148, '218.29.89.218'),
(24, 1, '审核7的标', 'Loan/Fristadmin/fristaudit', 1426302196, '218.29.89.218'),
(25, 1, '审核8的标', 'Loan/Fristadmin/fristaudit', 1426302217, '218.29.89.218'),
(26, 1, '充值手续费: 会员wwww 充值10000.00元    手续费为50.00元', 'User/Account/review', 1426314463, '218.29.89.218'),
(27, 1, '修改积分设置', 'Admin/Level/index', 1426317723, '218.29.89.218'),
(28, 1, '删除字段', 'User/Reviewtypeadmin/delfield', 1426317760, '218.29.89.218'),
(29, 1, '修改用户:test 房产资料资料审核通过', 'User/Reviewadmin/review', 1426317893, '218.29.89.218'),
(30, 1, '修改用户:test 车辆信息资料审核通过', 'User/Reviewadmin/review', 1426318126, '218.29.89.218'),
(31, 1, '添加test贷款信息', 'Loan/Loanlistadmin/add_two', 1426318937, '218.29.89.218'),
(32, 1, '审核9的标', 'Loan/Fristadmin/fristaudit', 1426319159, '218.29.89.218'),
(33, 1, '充值手续费: 会员acac 充值10000000.00元    手续费为50.00元', 'User/Account/review', 1426319499, '218.29.89.218'),
(34, 1, '通过满标复审审核并放款ID:9的标', 'Loan/Fulladmin/fullaudit', 1426319648, '218.29.89.218'),
(35, 1, '修改用户:wwww 实名认证认证通过', 'User/Auditadmin/review', 1426320102, '218.29.89.218'),
(36, 1, '修改积分设置', 'Admin/Level/index', 1426328679, '218.29.89.218'),
(37, 1, '修改积分设置', 'Admin/Integral/index', 1427248599, '1.193.125.100'),
(38, 1, '修改积分设置', 'Admin/Level/index', 1427250868, '1.193.125.100'),
(39, 1, '添加test贷款信息', 'Loan/Loanlistadmin/add_two', 1428928133, '101.36.78.9'),
(40, 1, '审核10的标', 'Loan/Fristadmin/fristaudit', 1428928223, '101.36.78.9'),
(41, 1, '添加test贷款信息', 'Loan/Loanlistadmin/add_two', 1428931836, '115.60.194.219'),
(42, 1, '审核11的标', 'Loan/Fristadmin/fristaudit', 1428974579, '218.29.89.218'),
(43, 1, '修改积分设置', 'Admin/Integral/index', 1429097399, '171.8.229.198'),
(44, 1, '修改积分设置', 'Admin/Level/index', 1429097407, '171.8.229.198'),
(45, 1, '审核16的标', 'Loan/Fristadmin/fristaudit', 1429100565, '111.161.17.10'),
(46, 1, '审核17的标', 'Loan/Fristadmin/fristaudit', 1429100666, '111.161.17.10'),
(47, 1, '审核18的标', 'Loan/Fristadmin/fristaudit', 1429113678, '111.161.17.10'),
(48, 1, '添加fskfjk贷款信息', 'Loan/Loanlistadmin/add_two', 1429113766, '111.161.17.10'),
(49, 1, '审核21的标', 'Loan/Fristadmin/fristaudit', 1429237800, '123.149.223.203'),
(50, 1, '系统调整资金: admin管理员修改rainbow 会员账户金额。         变动金额为80000元 。变动原因： 充值 ', 'User/Account/account_edit', 1429237970, '123.149.223.203'),
(51, 1, '通过满标复审审核并放款ID:21的标', 'Loan/Fulladmin/fullaudit', 1429238977, '123.149.223.203'),
(52, 1, '修改用户:rain 实名认证认证通过', 'User/Auditadmin/review', 1429239670, '123.149.223.203'),
(53, 1, 'rain用户提现:提现审核操作失败', 'User/Account/cash_review', 1429257565, '106.42.250.126'),
(54, 1, 'rain用户提现:提现审核操作失败', 'User/Account/cash_review', 1429257601, '106.42.250.126'),
(55, 1, 'rain用户提现:提现审核操作失败', 'User/Account/cash_review', 1429257602, '106.42.250.126'),
(56, 1, '管理员充值: 管理员给会员rain 充值20000元', 'User/Account/account_recharge_new', 1429257866, '106.42.250.126'),
(57, 1, '会员充值:rain 充值 20000.00元 审核成功', 'User/Account/review', 1429257981, '106.42.250.126');

-- --------------------------------------------------------

--
-- 表的结构 `ac_asset`
--

CREATE TABLE IF NOT EXISTS `ac_asset` (
  `aid` bigint(20) NOT NULL AUTO_INCREMENT,
  `unique` varchar(14) NOT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `filepath` varchar(200) NOT NULL,
  `uploadtime` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `meta` text,
  `suffix` varchar(50) DEFAULT NULL,
  `download_times` int(6) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ac_asset`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_comments`
--

CREATE TABLE IF NOT EXISTS `ac_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_table` varchar(100) NOT NULL COMMENT '评论内容所在表，不带表前缀',
  `post_id` int(11) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL COMMENT '原文地址',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发表评论的用户id',
  `to_uid` int(11) NOT NULL DEFAULT '0' COMMENT '被评论的用户id',
  `full_name` varchar(50) DEFAULT NULL COMMENT '评论者昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '评论者邮箱',
  `createtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text NOT NULL COMMENT '评论内容',
  `type` smallint(1) NOT NULL DEFAULT '1' COMMENT '评论类型；1实名评论',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复的评论id',
  `path` varchar(500) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '状态，1已审核，0未审核',
  PRIMARY KEY (`id`),
  KEY `comment_post_ID` (`post_id`),
  KEY `comment_approved_date_gmt` (`status`),
  KEY `comment_parent` (`parentid`),
  KEY `table_id_status` (`post_table`,`post_id`,`status`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ac_comments`
--

INSERT INTO `ac_comments` (`id`, `post_table`, `post_id`, `url`, `uid`, `to_uid`, `full_name`, `email`, `createtime`, `content`, `type`, `parentid`, `path`, `status`) VALUES
(1, 'posts', 3, '://', 3, 0, 'test', 'hi@imqiyu.com', '2015-01-20 16:48:08', '短发散发', 1, 0, '0-1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ac_common_action_log`
--

CREATE TABLE IF NOT EXISTS `ac_common_action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` bigint(20) DEFAULT '0' COMMENT '用户id',
  `object` varchar(100) DEFAULT NULL COMMENT '访问对象的id,格式：不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录',
  `action` varchar(50) DEFAULT NULL COMMENT '操作名称；格式规定为：应用名+控制器+操作名；也可自己定义格式只要不发生冲突且惟一；',
  `count` int(11) DEFAULT '0' COMMENT '访问次数',
  `last_time` int(11) DEFAULT '0' COMMENT '最后访问的时间戳',
  `ip` varchar(15) DEFAULT NULL COMMENT '访问者最后访问ip',
  PRIMARY KEY (`id`),
  KEY `user_object_action` (`user`,`object`,`action`),
  KEY `user_object_action_ip` (`user`,`object`,`action`,`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=264 ;

--
-- 转存表中的数据 `ac_common_action_log`
--

INSERT INTO `ac_common_action_log` (`id`, `user`, `object`, `action`, `count`, `last_time`, `ip`) VALUES
(1, 0, 'posts2', 'Portal-Article-index', 5, 1421723788, '127.0.0.1'),
(2, 0, 'posts1', 'Portal-Article-index', 8, 1421720578, '127.0.0.1'),
(3, 0, 'posts9', 'Portal-Article-index', 58, 1423709039, '127.0.0.1'),
(4, 0, 'posts', 'Portal-Article-index', 3, 1422847328, '127.0.0.1'),
(5, 0, 'posts16', 'Portal-Article-index', 17, 1423709044, '127.0.0.1'),
(6, 0, 'posts15', 'Portal-Article-index', 26, 1423709042, '127.0.0.1'),
(7, 0, 'posts13', 'Portal-Article-index', 8, 1423123156, '127.0.0.1'),
(8, 0, 'posts10', 'Portal-Article-index', 22, 1424837064, '127.0.0.1'),
(9, 0, 'posts11', 'Portal-Article-index', 11, 1424837068, '127.0.0.1'),
(10, 0, 'posts12', 'Portal-Article-index', 18, 1424837067, '127.0.0.1'),
(11, 0, 'posts17', 'Portal-Article-index', 16, 1423713467, '127.0.0.1'),
(12, 0, 'posts25', 'Portal-Article-index', 4, 1421825700, '127.0.0.1'),
(13, 0, 'posts23', 'Portal-Article-index', 7, 1421895984, '127.0.0.1'),
(14, 0, 'posts22', 'Portal-Article-index', 2, 1421825687, '127.0.0.1'),
(15, 3, 'posts10', 'Portal-Article-index', 3, 1423736209, '127.0.0.1'),
(16, 0, 'posts24', 'Portal-Article-index', 4, 1421895985, '127.0.0.1'),
(17, 0, 'posts21', 'Portal-Article-index', 2, 1421895974, '127.0.0.1'),
(18, 7, 'posts', 'Portal-Article-index', 3, 1422089282, '127.0.0.1'),
(19, 7, 'posts14', 'Portal-Article-index', 3, 1422239620, '127.0.0.1'),
(20, 7, 'posts9', 'Portal-Article-index', 5, 1422239818, '127.0.0.1'),
(21, 7, 'posts16', 'Portal-Article-index', 4, 1422094526, '127.0.0.1'),
(22, 7, 'posts15', 'Portal-Article-index', 4, 1422239624, '127.0.0.1'),
(23, 7, 'posts17', 'Portal-Article-index', 3, 1422094536, '127.0.0.1'),
(24, 7, 'posts10', 'Portal-Article-index', 1, 1422094516, '127.0.0.1'),
(25, 7, 'posts12', 'Portal-Article-index', 1, 1422094519, '127.0.0.1'),
(26, 7, 'posts11', 'Portal-Article-index', 2, 1422239626, '127.0.0.1'),
(27, 7, 'posts13', 'Portal-Article-index', 1, 1422094524, '127.0.0.1'),
(28, 7, 'posts18', 'Portal-Article-index', 1, 1422094531, '127.0.0.1'),
(29, 3, 'posts14', 'Portal-Article-index', 1, 1422094654, '127.0.0.1'),
(30, 3, 'posts17', 'Portal-Article-index', 1, 1422094660, '127.0.0.1'),
(31, 3, 'posts16', 'Portal-Article-index', 2, 1423709044, '127.0.0.1'),
(32, 3, 'posts11', 'Portal-Article-index', 1, 1422094667, '127.0.0.1'),
(33, 3, 'posts12', 'Portal-Article-index', 1, 1422094669, '127.0.0.1'),
(34, 0, 'posts14', 'Portal-Article-index', 8, 1423117836, '127.0.0.1'),
(35, 0, 'posts18', 'Portal-Article-index', 4, 1422263815, '127.0.0.1'),
(36, 3, 'posts9', 'Portal-Article-index', 3, 1423709039, '127.0.0.1'),
(37, 3, 'posts', 'Portal-Article-index', 5, 1424841794, '127.0.0.1'),
(38, 3, 'posts25', 'Portal-Article-index', 1, 1422529157, '127.0.0.1'),
(39, 3, 'posts26', 'Portal-Article-index', 1, 1422529160, '127.0.0.1'),
(40, 6, 'posts22', 'Portal-Article-index', 1, 1423109093, '127.0.0.1'),
(41, 6, 'posts24', 'Portal-Article-index', 1, 1423109097, '127.0.0.1'),
(42, 6, 'posts17', 'Portal-Article-index', 2, 1423109144, '127.0.0.1'),
(43, 3, 'posts15', 'Portal-Article-index', 1, 1423709042, '127.0.0.1'),
(44, 0, 'posts26', 'Portal-Article-index', 1, 1425367656, '123.149.216.213'),
(45, 0, 'posts27', 'Portal-Article-index', 2, 1425370544, '123.149.216.213'),
(46, 0, 'posts29', 'Portal-Article-index', 3, 1425370527, '123.149.216.213'),
(47, 0, 'posts28', 'Portal-Article-index', 1, 1425370516, '123.149.216.213'),
(48, 0, 'posts25', 'Portal-Article-index', 1, 1425370548, '123.149.216.213'),
(49, 0, 'posts9', 'Portal-Article-index', 2, 1425384042, '123.14.56.220'),
(50, 0, 'posts15', 'Portal-Article-index', 1, 1425384045, '123.14.56.220'),
(51, 0, 'posts11', 'Portal-Article-index', 2, 1425384213, '123.14.56.220'),
(52, 0, 'posts9', 'Portal-Article-index', 1, 1425384289, '125.47.112.221'),
(53, 0, 'posts15', 'Portal-Article-index', 1, 1425384303, '125.47.112.221'),
(54, 0, 'posts16', 'Portal-Article-index', 1, 1425384307, '125.47.112.221'),
(55, 0, 'posts23', 'Portal-Article-index', 6, 1427245995, '218.29.89.218'),
(56, 0, 'posts29', 'Portal-Article-index', 4, 1426053137, '218.29.89.218'),
(57, 0, 'posts29', 'Portal-Article-index', 1, 1425457629, '111.206.36.142'),
(58, 0, 'posts10', 'Portal-Article-index', 25, 1426476802, '218.29.89.218'),
(59, 0, 'posts11', 'Portal-Article-index', 15, 1427247719, '218.29.89.218'),
(60, 0, 'posts11', 'Portal-Article-index', 1, 1425457669, '111.206.36.142'),
(61, 0, 'posts12', 'Portal-Article-index', 16, 1427247722, '218.29.89.218'),
(62, 0, 'posts12', 'Portal-Article-index', 1, 1425457671, '111.206.36.133'),
(63, 0, 'posts13', 'Portal-Article-index', 17, 1427247723, '218.29.89.218'),
(64, 0, 'posts13', 'Portal-Article-index', 1, 1425457674, '111.206.36.7'),
(65, 0, 'posts17', 'Portal-Article-index', 11, 1427248081, '218.29.89.218'),
(66, 0, 'posts17', 'Portal-Article-index', 1, 1425457677, '111.206.36.140'),
(67, 0, 'posts9', 'Portal-Article-index', 19, 1427248072, '218.29.89.218'),
(68, 0, 'posts15', 'Portal-Article-index', 26, 1427247485, '218.29.89.218'),
(69, 0, 'posts15', 'Portal-Article-index', 1, 1425457684, '111.206.36.133'),
(70, 0, 'posts16', 'Portal-Article-index', 20, 1427247677, '218.29.89.218'),
(71, 0, 'posts16', 'Portal-Article-index', 1, 1425457686, '111.206.36.7'),
(72, 0, 'posts27', 'Portal-Article-index', 4, 1426238185, '218.29.89.218'),
(73, 0, 'posts23', 'Portal-Article-index', 1, 1426049591, '115.239.212.138'),
(74, 0, 'posts28', 'Portal-Article-index', 2, 1426053136, '218.29.89.218'),
(75, 0, 'posts14', 'Portal-Article-index', 7, 1427247193, '218.29.89.218'),
(76, 0, 'posts18', 'Portal-Article-index', 9, 1426643899, '218.29.89.218'),
(77, 0, 'posts21', 'Portal-Article-index', 5, 1428551117, '218.29.89.218'),
(78, 0, 'posts22', 'Portal-Article-index', 4, 1427247189, '218.29.89.218'),
(79, 0, 'posts24', 'Portal-Article-index', 3, 1426237023, '218.29.89.218'),
(80, 0, 'posts25', 'Portal-Article-index', 3, 1426237044, '218.29.89.218'),
(81, 0, 'posts26', 'Portal-Article-index', 3, 1426237029, '218.29.89.218'),
(82, 3, 'posts10', 'Portal-Article-index', 2, 1426056102, '218.29.89.218'),
(83, 3, 'posts29', 'Portal-Article-index', 12, 1426232165, '218.29.89.218'),
(84, 3, 'posts9', 'Portal-Article-index', 39, 1426060980, '218.29.89.218'),
(85, 3, 'posts18', 'Portal-Article-index', 1, 1426059372, '218.29.89.218'),
(86, 3, 'posts11', 'Portal-Article-index', 2, 1426060893, '218.29.89.218'),
(87, 3, 'posts26', 'Portal-Article-index', 2, 1426061122, '218.29.89.218'),
(88, 3, 'posts17', 'Portal-Article-index', 1, 1426229764, '218.29.89.218'),
(89, 3, 'posts28', 'Portal-Article-index', 7, 1426232163, '218.29.89.218'),
(90, 0, 'posts17', 'Portal-Article-index', 1, 1426230412, '180.153.163.189'),
(91, 0, 'posts28', 'Portal-Article-index', 1, 1426230439, '180.153.114.199'),
(92, 0, 'posts29', 'Portal-Article-index', 1, 1426230442, '180.153.206.24'),
(93, 0, 'posts10', 'Portal-Article-index', 1, 1426233892, '180.153.206.18'),
(94, 0, 'posts12', 'Portal-Article-index', 1, 1426233941, '180.153.201.217'),
(95, 0, 'posts13', 'Portal-Article-index', 1, 1426234697, '101.226.33.203'),
(96, 0, 'posts11', 'Portal-Article-index', 1, 1426234699, '101.226.33.218'),
(97, 0, 'posts16', 'Portal-Article-index', 1, 1426236343, '180.153.201.64'),
(98, 0, 'posts15', 'Portal-Article-index', 1, 1426237151, '180.153.205.254'),
(99, 0, 'posts14', 'Portal-Article-index', 1, 1426237650, '101.226.65.105'),
(100, 0, 'posts18', 'Portal-Article-index', 1, 1426237654, '101.226.102.97'),
(101, 0, 'posts21', 'Portal-Article-index', 1, 1426237827, '101.226.33.228'),
(102, 0, 'posts22', 'Portal-Article-index', 1, 1426237827, '112.64.235.89'),
(103, 0, 'posts23', 'Portal-Article-index', 1, 1426237831, '112.64.235.250'),
(104, 0, 'posts24', 'Portal-Article-index', 1, 1426237835, '180.153.206.26'),
(105, 0, 'posts26', 'Portal-Article-index', 1, 1426237840, '180.153.206.24'),
(106, 0, 'posts27', 'Portal-Article-index', 1, 1426238994, '101.226.65.107'),
(107, 17, 'posts10', 'Portal-Article-index', 1, 1426316251, '218.29.89.218'),
(108, 0, 'posts10', 'Portal-Article-index', 1, 1426477614, '180.153.206.24'),
(109, 0, 'posts16', 'Portal-Article-index', 1, 1426497894, '61.240.144.32'),
(110, 3, 'posts9', 'Portal-Article-index', 1, 1426553352, '1.192.121.104'),
(111, 3, 'posts14', 'Portal-Article-index', 1, 1426553355, '1.192.121.104'),
(112, 3, 'posts18', 'Portal-Article-index', 1, 1426553357, '1.192.121.104'),
(113, 3, 'posts17', 'Portal-Article-index', 1, 1426553358, '1.192.121.104'),
(114, 3, 'posts13', 'Portal-Article-index', 1, 1426553360, '1.192.121.104'),
(115, 0, 'posts14', 'Portal-Article-index', 1, 1426620786, '220.181.108.182'),
(116, 0, 'posts26', 'Portal-Article-index', 1, 1426622786, '123.125.71.19'),
(117, 0, 'posts16', 'Portal-Article-index', 1, 1426624786, '123.125.71.32'),
(118, 0, 'posts16', 'Portal-Article-index', 1, 1426625038, '123.125.71.51'),
(119, 0, 'posts16', 'Portal-Article-index', 1, 1426625038, '123.125.71.21'),
(120, 0, 'posts12', 'Portal-Article-index', 1, 1426626787, '220.181.108.117'),
(121, 0, 'posts28', 'Portal-Article-index', 1, 1426628786, '220.181.108.106'),
(122, 0, 'posts28', 'Portal-Article-index', 1, 1426629076, '123.125.71.29'),
(123, 0, 'posts28', 'Portal-Article-index', 1, 1426629076, '123.125.71.54'),
(124, 0, 'posts22', 'Portal-Article-index', 1, 1426632787, '123.125.71.93'),
(125, 0, 'posts21', 'Portal-Article-index', 1, 1426634787, '220.181.108.94'),
(126, 0, 'posts18', 'Portal-Article-index', 1, 1426636787, '220.181.108.80'),
(127, 0, 'posts13', 'Portal-Article-index', 1, 1426640787, '220.181.108.87'),
(128, 0, 'posts25', 'Portal-Article-index', 1, 1426642787, '220.181.108.154'),
(129, 0, 'posts11', 'Portal-Article-index', 1, 1426644787, '123.125.71.98'),
(130, 0, 'posts15', 'Portal-Article-index', 1, 1426646787, '123.125.71.76'),
(131, 0, 'posts15', 'Portal-Article-index', 1, 1426647135, '123.125.71.24'),
(132, 0, 'posts15', 'Portal-Article-index', 1, 1426647135, '123.125.71.14'),
(133, 0, 'posts29', 'Portal-Article-index', 1, 1426648787, '123.125.71.84'),
(134, 0, 'posts29', 'Portal-Article-index', 1, 1426648996, '123.125.71.58'),
(135, 0, 'posts29', 'Portal-Article-index', 1, 1426648996, '123.125.71.19'),
(136, 0, 'posts23', 'Portal-Article-index', 1, 1426652787, '220.181.108.151'),
(137, 0, 'posts23', 'Portal-Article-index', 1, 1426653088, '123.125.71.49'),
(138, 0, 'posts23', 'Portal-Article-index', 1, 1426653088, '123.125.71.30'),
(139, 0, 'posts27', 'Portal-Article-index', 1, 1426656787, '123.125.71.87'),
(140, 0, 'posts27', 'Portal-Article-index', 3, 1427543311, '123.125.71.13'),
(141, 0, 'posts10', 'Portal-Article-index', 1, 1426658787, '123.125.71.108'),
(142, 0, 'posts10', 'Portal-Article-index', 1, 1426659130, '123.125.71.19'),
(143, 0, 'posts10', 'Portal-Article-index', 1, 1426659130, '123.125.71.46'),
(144, 0, 'posts1', 'Portal-Article-index', 3, 1427247455, '218.29.89.218'),
(145, 0, 'posts2', 'Portal-Article-index', 2, 1426672511, '218.29.89.218'),
(146, 0, 'posts15', 'Portal-Article-index', 1, 1426660475, '221.204.14.28'),
(147, 0, 'posts16', 'Portal-Article-index', 1, 1426660494, '221.204.14.28'),
(148, 0, 'posts9', 'Portal-Article-index', 1, 1426660500, '221.204.14.28'),
(149, 0, 'posts14', 'Portal-Article-index', 1, 1426660505, '221.204.14.28'),
(150, 0, 'posts17', 'Portal-Article-index', 1, 1426666787, '220.181.108.82'),
(151, 0, 'posts9', 'Portal-Article-index', 1, 1426668787, '123.125.71.15'),
(152, 0, 'posts24', 'Portal-Article-index', 1, 1426670787, '220.181.108.106'),
(153, 0, 'posts16', 'Portal-Article-index', 1, 1426964961, '123.125.71.117'),
(154, 0, 'posts11', 'Portal-Article-index', 1, 1426966961, '123.125.71.111'),
(155, 0, 'posts26', 'Portal-Article-index', 1, 1427026337, '123.125.71.115'),
(156, 0, 'posts14', 'Portal-Article-index', 1, 1427028337, '123.125.71.28'),
(157, 0, 'posts12', 'Portal-Article-index', 1, 1427153695, '220.181.108.122'),
(158, 0, 'posts18', 'Portal-Article-index', 1, 1427188593, '123.125.71.39'),
(159, 0, 'posts18', 'Portal-Article-index', 1, 1427188821, '123.125.71.28'),
(160, 0, 'posts18', 'Portal-Article-index', 1, 1427188821, '123.125.71.49'),
(161, 0, 'posts', 'Portal-Article-index', 1, 1427190593, '123.125.71.99'),
(162, 0, 'posts9', 'Portal-Article-index', 1, 1427255873, '115.60.49.188'),
(163, 0, 'posts9', 'Portal-Article-index', 1, 1427255873, '180.153.214.180'),
(164, 0, 'posts23', 'Portal-Article-index', 1, 1427255932, '115.60.49.188'),
(165, 0, 'posts23', 'Portal-Article-index', 1, 1427255932, '112.64.235.89'),
(166, 0, 'posts18', 'Portal-Article-index', 1, 1427275300, '220.181.108.91'),
(167, 0, 'posts24', 'Portal-Article-index', 1, 1427317627, '123.125.71.27'),
(168, 0, 'posts16', 'Portal-Article-index', 1, 1427372948, '123.125.71.18'),
(169, 0, 'posts22', 'Portal-Article-index', 1, 1427405174, '123.125.71.45'),
(170, 0, 'posts25', 'Portal-Article-index', 1, 1427421778, '123.125.71.83'),
(171, 0, 'posts12', 'Portal-Article-index', 1, 1427440884, '123.125.71.27'),
(172, 0, 'posts27', 'Portal-Article-index', 1, 1427543011, '220.181.108.141'),
(173, 0, 'posts27', 'Portal-Article-index', 1, 1427543311, '123.125.71.22'),
(174, 0, 'posts21', 'Portal-Article-index', 1, 1427549011, '220.181.108.123'),
(175, 0, 'posts17', 'Portal-Article-index', 1, 1427553011, '123.125.71.90'),
(176, 0, 'posts17', 'Portal-Article-index', 1, 1427553328, '123.125.71.60'),
(177, 0, 'posts17', 'Portal-Article-index', 1, 1427553328, '123.125.71.25'),
(178, 0, 'posts11', 'Portal-Article-index', 1, 1427555011, '123.125.71.113'),
(179, 0, 'posts11', 'Portal-Article-index', 1, 1427555416, '123.125.71.38'),
(180, 0, 'posts11', 'Portal-Article-index', 1, 1427555416, '123.125.71.42'),
(181, 0, 'posts29', 'Portal-Article-index', 1, 1427557011, '123.125.71.52'),
(182, 0, 'posts26', 'Portal-Article-index', 1, 1427559011, '123.125.71.27'),
(183, 0, 'posts15', 'Portal-Article-index', 1, 1427561011, '123.125.71.43'),
(184, 0, 'posts12', 'Portal-Article-index', 1, 1427563011, '123.125.71.43'),
(185, 0, 'posts9', 'Portal-Article-index', 1, 1427565011, '220.181.108.158'),
(186, 0, 'posts24', 'Portal-Article-index', 1, 1427565865, '123.125.71.113'),
(187, 0, 'posts13', 'Portal-Article-index', 1, 1427567011, '123.125.71.81'),
(188, 0, 'posts13', 'Portal-Article-index', 1, 1427567280, '123.125.71.31'),
(189, 0, 'posts13', 'Portal-Article-index', 1, 1427567280, '123.125.71.36'),
(190, 0, 'posts28', 'Portal-Article-index', 1, 1427567865, '220.181.108.138'),
(191, 0, 'posts14', 'Portal-Article-index', 1, 1427571011, '220.181.108.143'),
(192, 0, 'posts16', 'Portal-Article-index', 1, 1427573011, '123.125.71.100'),
(193, 0, 'posts23', 'Portal-Article-index', 1, 1427575011, '220.181.108.109'),
(194, 0, 'posts23', 'Portal-Article-index', 1, 1427575282, '123.125.71.23'),
(195, 0, 'posts23', 'Portal-Article-index', 1, 1427575282, '123.125.71.21'),
(196, 0, 'posts18', 'Portal-Article-index', 1, 1427577011, '220.181.108.158'),
(197, 0, 'posts22', 'Portal-Article-index', 1, 1427579011, '220.181.108.91'),
(198, 0, 'posts22', 'Portal-Article-index', 1, 1427579326, '123.125.71.36'),
(199, 0, 'posts22', 'Portal-Article-index', 1, 1427579326, '123.125.71.16'),
(200, 0, 'posts24', 'Portal-Article-index', 1, 1427581011, '123.125.71.17'),
(201, 0, 'posts24', 'Portal-Article-index', 1, 1427581316, '123.125.71.55'),
(202, 0, 'posts24', 'Portal-Article-index', 1, 1427581317, '123.125.71.54'),
(203, 0, 'posts10', 'Portal-Article-index', 1, 1427583011, '220.181.108.149'),
(204, 0, 'posts28', 'Portal-Article-index', 1, 1427589011, '220.181.108.104'),
(205, 0, 'posts28', 'Portal-Article-index', 1, 1427589237, '123.125.71.25'),
(206, 0, 'posts28', 'Portal-Article-index', 1, 1427589237, '123.125.71.58'),
(207, 0, 'posts25', 'Portal-Article-index', 1, 1427591011, '220.181.108.143'),
(208, 0, 'posts25', 'Portal-Article-index', 1, 1427596187, '220.181.108.187'),
(209, 0, 'posts25', 'Portal-Article-index', 1, 1427596459, '123.125.71.16'),
(210, 0, 'posts25', 'Portal-Article-index', 1, 1427596459, '123.125.71.15'),
(211, 0, 'posts21', 'Portal-Article-index', 1, 1427678373, '123.125.71.30'),
(212, 0, 'posts21', 'Portal-Article-index', 1, 1427678964, '123.125.71.44'),
(213, 0, 'posts21', 'Portal-Article-index', 1, 1427678964, '123.125.71.58'),
(214, 0, 'posts25', 'Portal-Article-index', 1, 1427697862, '220.181.108.170'),
(215, 0, 'posts25', 'Portal-Article-index', 1, 1427698185, '123.125.71.19'),
(216, 0, 'posts25', 'Portal-Article-index', 1, 1427698185, '123.125.71.22'),
(217, 0, 'posts25', 'Portal-Article-index', 1, 1427798747, '220.181.108.96'),
(218, 0, 'posts1', 'Portal-Article-index', 1, 1428193683, '220.181.108.184'),
(219, 0, 'posts2', 'Portal-Article-index', 1, 1428205683, '123.125.71.112'),
(220, 0, 'posts2', 'Portal-Article-index', 1, 1428206027, '123.125.71.52'),
(221, 0, 'posts2', 'Portal-Article-index', 1, 1428206027, '123.125.71.42'),
(222, 0, 'posts12', 'Portal-Article-index', 1, 1428224732, '220.181.108.142'),
(223, 0, 'posts21', 'Portal-Article-index', 1, 1428287390, '123.125.71.72'),
(224, 0, 'posts', 'Portal-Article-index', 1, 1428289390, '220.181.108.78'),
(225, 0, 'posts', 'Portal-Article-index', 1, 1428289932, '123.125.71.28'),
(226, 0, 'posts', 'Portal-Article-index', 1, 1428289932, '123.125.71.17'),
(227, 0, 'posts12', 'Portal-Article-index', 1, 1428396749, '220.181.108.168'),
(228, 0, 'posts12', 'Portal-Article-index', 1, 1428397134, '123.125.71.28'),
(229, 0, 'posts12', 'Portal-Article-index', 1, 1428397135, '123.125.71.60'),
(230, 0, 'posts21', 'Portal-Article-index', 1, 1428417032, '123.125.71.75'),
(231, 0, 'posts26', 'Portal-Article-index', 1, 1428538124, '220.181.108.160'),
(232, 0, 'posts26', 'Portal-Article-index', 1, 1428538453, '123.125.71.54'),
(233, 0, 'posts26', 'Portal-Article-index', 1, 1428538453, '123.125.71.50'),
(234, 0, 'posts11', 'Portal-Article-index', 1, 1428547663, '220.181.108.149'),
(235, 0, 'posts1', 'Portal-Article-index', 1, 1428551853, '1.192.121.104'),
(236, 0, 'posts10', 'Portal-Article-index', 1, 1428568783, '1.192.121.104'),
(237, 0, 'posts11', 'Portal-Article-index', 2, 1429167791, '1.192.121.104'),
(238, 0, 'posts12', 'Portal-Article-index', 2, 1429167793, '1.192.121.104'),
(239, 0, 'posts13', 'Portal-Article-index', 1, 1428568787, '1.192.121.104'),
(240, 0, 'posts24', 'Portal-Article-index', 1, 1428568834, '1.192.121.104'),
(241, 0, 'posts9', 'Portal-Article-index', 1, 1428938795, '115.60.194.219'),
(242, 0, 'posts10', 'Portal-Article-index', 1, 1428938807, '115.60.194.219'),
(243, 53, 'posts16', 'Portal-Article-index', 1, 1429061753, '171.8.222.217'),
(244, 0, 'posts16', 'Portal-Article-index', 1, 1429061753, '101.226.66.179'),
(245, 0, 'posts1', 'Portal-Article-index', 1, 1429114795, '115.60.193.218'),
(246, 0, 'posts25', 'Portal-Article-index', 1, 1429167781, '1.192.121.104'),
(247, 0, 'posts27', 'Portal-Article-index', 1, 1429167784, '1.192.121.104'),
(248, 0, 'posts15', 'Portal-Article-index', 1, 1429167786, '1.192.121.104'),
(249, 0, 'posts9', 'Portal-Article-index', 1, 1429168831, '1.192.121.104'),
(250, 0, 'posts29', 'Portal-Article-index', 1, 1429169356, '1.192.121.104'),
(251, 0, 'posts28', 'Portal-Article-index', 1, 1429169597, '1.192.121.104'),
(252, 0, 'posts9', 'Portal-Article-index', 1, 1429170954, '1.192.16.254'),
(253, 0, 'posts15', 'Portal-Article-index', 2, 1429173716, '1.192.16.254'),
(254, 0, 'posts9', 'Portal-Article-index', 1, 1429171766, '112.64.235.252'),
(255, 0, 'posts15', 'Portal-Article-index', 1, 1429171794, '180.153.206.27'),
(256, 55, 'posts1', 'Portal-Article-index', 1, 1429238104, '123.149.223.203'),
(257, 0, 'posts1', 'Portal-Article-index', 1, 1429238795, '101.226.66.173'),
(258, 54, 'posts1', 'Portal-Article-index', 1, 1429259281, '1.192.121.104'),
(259, 0, 'posts9', 'Portal-Article-index', 1, 1429436394, '123.157.76.83'),
(260, 0, 'posts21', 'Portal-Article-index', 1, 1429437977, '123.157.76.83'),
(261, 0, 'posts26', 'Portal-Article-index', 1, 1429437984, '123.157.76.83'),
(262, 0, 'posts18', 'Portal-Article-index', 1, 1429437993, '123.157.76.83'),
(263, 0, 'posts27', 'Portal-Article-index', 1, 1429437999, '123.157.76.83');

-- --------------------------------------------------------

--
-- 表的结构 `ac_data_field`
--

CREATE TABLE IF NOT EXISTS `ac_data_field` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `field` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prompt` varchar(200) NOT NULL COMMENT '说明',
  `attribute` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `length` smallint(4) NOT NULL,
  `option_value` varchar(300) NOT NULL COMMENT '选项值',
  `default` varchar(300) NOT NULL COMMENT '默认值',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户可查看的权限 0无限制',
  `listorder` tinyint(4) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`),
  KEY `m_id` (`m_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `ac_data_field`
--

INSERT INTO `ac_data_field` (`id`, `m_id`, `field`, `name`, `prompt`, `attribute`, `type`, `length`, `option_value`, `default`, `level`, `listorder`) VALUES
(11, 6, 'sex', '男女', '', 'varchar', 'radio', 2, '', '男|男*\n女|女*\n保密|保密*', 0, 255),
(9, 6, 'price', '价格', '', 'float', 'text', 9, '', '', 4, 255),
(10, 6, 'instructions', '说明', '', 'varchar', 'textarea', 200, '', '', 4, 255),
(7, 6, 'brand', '品牌', '', 'varchar', 'text', 15, '', '', 0, 1),
(8, 6, 'Purchase', '购车日期', '', 'int', 'date', 11, '', '', 0, 3),
(12, 6, 'duoxuan', '多选框', '', 'varchar', 'checkbox', 1, 'a', 'a|A*\nB|B*\nC|C*', 0, 255),
(14, 6, 'tutu', '证明', '', 'varchar', 'thumb', 250, '', '', 0, 255),
(16, 6, 'sys_img', '图片', '', 'varchar', 'thumb', 250, '', '', 0, 255),
(17, 7, 'sys_img', '图片', '', 'varchar', 'thumb', 250, '', '', 0, 255),
(18, 6, 'sys_shuoming', '说明', '', 'varchar', 'textarea', 200, '', '', 5, 255),
(19, 7, 'sys_shuoming', '说明', '', 'varchar', 'textarea', 200, '', '', 0, 255),
(20, 9, 'sys_img', '图片', '', 'varchar', 'thumb', 250, '', '', 0, 255),
(21, 9, 'sys_shuoming', '说明', '', 'varchar', 'textarea', 200, '', '', 0, 255),
(24, 9, 'aaadss', '什么', '什么也不提示', 'varchar', 'checkbox', 300, '', '1|我们', 4, 255);

-- --------------------------------------------------------

--
-- 表的结构 `ac_data_model`
--

CREATE TABLE IF NOT EXISTS `ac_data_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT 'model名字',
  `through` tinyint(4) NOT NULL COMMENT '通过提醒ID',
  `notthrough` tinyint(4) NOT NULL COMMENT '未通过提醒ID',
  `menu` mediumint(11) unsigned NOT NULL DEFAULT '0',
  `source` int(11) NOT NULL COMMENT '通过审核后建立的积分',
  PRIMARY KEY (`id`),
  KEY `menu` (`menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `ac_data_model`
--

INSERT INTO `ac_data_model` (`id`, `name`, `through`, `notthrough`, `menu`, `source`) VALUES
(6, '房产资料', 3, 4, 603, 1001),
(7, '车辆信息', 3, 4, 604, 120),
(9, '测试类型', 1, 2, 610, 100);

-- --------------------------------------------------------

--
-- 表的结构 `ac_data_table_0`
--

CREATE TABLE IF NOT EXISTS `ac_data_table_0` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `sys_img` varchar(300) NOT NULL,
  `sys_lodata` int(11) NOT NULL DEFAULT '0' COMMENT '上传时间',
  `sys_audata` int(11) NOT NULL DEFAULT '0' COMMENT '认证时间',
  `sys_updata` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sys_state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0待审核1通过2没有通过',
  `audit_id` int(11) NOT NULL DEFAULT '0' COMMENT '认证操作人ID',
  `user_login` varchar(60) NOT NULL DEFAULT '0' COMMENT '用户登录名称',
  `sys_shuoming` varchar(200) NOT NULL COMMENT '用户留言',
  `sys_remark` varchar(200) NOT NULL COMMENT '管理备注',
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  KEY `user_login` (`user_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ac_data_table_0`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_data_table_6`
--

CREATE TABLE IF NOT EXISTS `ac_data_table_6` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) unsigned NOT NULL,
  `sys_img` varchar(300) NOT NULL,
  `sys_lodata` int(11) NOT NULL,
  `sys_audata` int(11) NOT NULL,
  `sys_updata` int(11) NOT NULL,
  `sys_state` tinyint(1) unsigned NOT NULL COMMENT '0待审核1通过2没有通过',
  `audit_id` int(11) NOT NULL,
  `brand` varchar(15) NOT NULL,
  `purchase` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `instructions` varchar(200) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `duoxuan` varchar(1) NOT NULL,
  `tutu` varchar(250) NOT NULL,
  `user_login` varchar(60) NOT NULL,
  `sys_shuoming` varchar(200) NOT NULL,
  `sys_remark` varchar(200) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `sys_shuoming1` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  KEY `user_login` (`user_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ac_data_table_6`
--

INSERT INTO `ac_data_table_6` (`id`, `u_id`, `sys_img`, `sys_lodata`, `sys_audata`, `sys_updata`, `sys_state`, `audit_id`, `brand`, `purchase`, `price`, `instructions`, `sex`, `duoxuan`, `tutu`, `user_login`, `sys_shuoming`, `sys_remark`, `img1`, `sys_shuoming1`) VALUES
(2, 3, 'http://d.hiphotos.baidu.com/zhidao/pic/item/562c11dfa9ec8a13e028c4c0f603918fa0ecc0e4.jpg', 1426317848, 1426317892, 1426317892, 1, 1, '品牌', 0, 100000, ' 说明说明说明说明说明说明说明说明', '男', 'a', 'http://d.hiphotos.baidu.com/zhidao/pic/item/562c11dfa9ec8a13e028c4c0f603918fa0ecc0e4.jpg', 'test', '你哦拉德芳斯是', '', '', ''),
(3, 46, 'http://img5.imgtn.bdimg.com/it/u=2149796787,842171726&fm=116&gp=0.jpg', 1426478416, 0, 0, 0, 0, '雕牌', 0, 20000, '测试说明', '男', 'a', 'http://img5.imgtn.bdimg.com/it/u=2149796787,842171726&fm=116&gp=0.jpg', 'testzl1', ' 图片', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `ac_data_table_7`
--

CREATE TABLE IF NOT EXISTS `ac_data_table_7` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) unsigned NOT NULL DEFAULT '0',
  `sys_img` varchar(300) NOT NULL,
  `sys_lodata` int(11) NOT NULL DEFAULT '0',
  `sys_audata` int(11) NOT NULL DEFAULT '0',
  `sys_updata` int(11) NOT NULL DEFAULT '0',
  `sys_state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0待审核1通过2没有通过',
  `audit_id` int(11) NOT NULL DEFAULT '0',
  `user_login` varchar(60) NOT NULL,
  `sys_remark` varchar(200) NOT NULL,
  `sys_shuoming` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  KEY `user_login` (`user_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ac_data_table_7`
--

INSERT INTO `ac_data_table_7` (`id`, `u_id`, `sys_img`, `sys_lodata`, `sys_audata`, `sys_updata`, `sys_state`, `audit_id`, `user_login`, `sys_remark`, `sys_shuoming`) VALUES
(2, 3, '', 1419655522, 1421979847, 1421979847, 1, 1, 'Z4231', '', ''),
(3, 7, '/data/upload/54c20299f0c14.jpg', 1422000587, 0, 1422000798, 0, 1, 'ac371', '', 'aaaa '),
(4, 3, 'http://d.hiphotos.baidu.com/zhidao/pic/item/562c11dfa9ec8a13e028c4c0f603918fa0ecc0e4.jpg', 1426318081, 1426318124, 1426318124, 1, 1, 'test', '', ' 对方萨拉降幅达四方第三方');

-- --------------------------------------------------------

--
-- 表的结构 `ac_data_table_9`
--

CREATE TABLE IF NOT EXISTS `ac_data_table_9` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `sys_img` varchar(300) NOT NULL,
  `sys_lodata` int(11) NOT NULL DEFAULT '0' COMMENT '上传时间',
  `sys_audata` int(11) NOT NULL DEFAULT '0' COMMENT '认证时间',
  `sys_updata` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sys_state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0待审核1通过2没有通过',
  `audit_id` int(11) NOT NULL DEFAULT '0' COMMENT '认证操作人ID',
  `user_login` varchar(60) NOT NULL DEFAULT '0' COMMENT '用户登录名称',
  `sys_shuoming` varchar(200) NOT NULL COMMENT '用户留言',
  `sys_remark` varchar(200) NOT NULL COMMENT '管理备注',
  `aaadss` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  KEY `user_login` (`user_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `ac_data_table_9`
--

INSERT INTO `ac_data_table_9` (`id`, `u_id`, `sys_img`, `sys_lodata`, `sys_audata`, `sys_updata`, `sys_state`, `audit_id`, `user_login`, `sys_shuoming`, `sys_remark`, `aaadss`) VALUES
(5, 3, 'http://img5.imgtn.bdimg.com/it/u=747474479,3247936386&fm=21&gp=0.jpg', 1421312457, 1422088152, 1422088152, 1, 1, 'test', ' 测试费 ', '', '1'),
(8, 13, '/data/upload/5503a79f0d2ad.jpg', 1426302888, 0, 0, 0, 0, 'wuhaofz502', ' 哈哈哈  ', '', '1');

-- --------------------------------------------------------

--
-- 表的结构 `ac_guestbook`
--

CREATE TABLE IF NOT EXISTS `ac_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL COMMENT '留言者姓名',
  `email` varchar(100) NOT NULL COMMENT '留言者邮箱',
  `title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `msg` text NOT NULL COMMENT '留言内容',
  `createtime` datetime NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ac_guestbook`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_integral_config`
--

CREATE TABLE IF NOT EXISTS `ac_integral_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL COMMENT '变量值',
  `remark` varchar(50) NOT NULL COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `ac_integral_config`
--

INSERT INTO `ac_integral_config` (`id`, `value`, `remark`) VALUES
(1, 10, '用户注册获得的积分'),
(2, 10, '手机认证获得的积分'),
(3, 10, '实名认证获得的积分'),
(4, 10, '邮箱认证获得的积分'),
(5, 10, '现场认证获得的积分'),
(6, 10, '视频认证获得的积分'),
(7, 20, '个人详细信息完善'),
(8, 1, '还清借款信用积分（期）'),
(9, 100, '还完所有贷款期数'),
(10, -10, '普通逾期扣除积分(期)'),
(11, -100, '严重逾期扣除积分(期)');

-- --------------------------------------------------------

--
-- 表的结构 `ac_integral_log`
--

CREATE TABLE IF NOT EXISTS `ac_integral_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `o_id` int(10) unsigned NOT NULL COMMENT '操作人ID',
  `action_name` varchar(50) NOT NULL,
  `source` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`,`o_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- 转存表中的数据 `ac_integral_log`
--

INSERT INTO `ac_integral_log` (`id`, `u_id`, `o_id`, `action_name`, `source`, `time`, `ip`) VALUES
(1, 3, 1, '会员注册赠送', 1555, 1419223825, '127.0.0.1'),
(2, 3, 1, '系统管理操作', 1000, 1419224044, '127.0.0.1'),
(3, 3, 1, '送你的呵呵', 1000, 1419224073, '127.0.0.1'),
(4, 3, 1, '送你的呵呵', -1000, 1419224223, '127.0.0.1'),
(5, 3, 1, '送你的呵呵', -1000, 1419224244, '127.0.0.1'),
(6, 3, 1, '车辆信息资料审核通过', 120, 1419665001, '127.0.0.1'),
(7, 3, 1, '车辆信息资料审核通过', 120, 1419665087, '127.0.0.1'),
(8, 3, 1, '车辆信息资料审核通过', 120, 1419665230, '127.0.0.1'),
(9, 3, 1, '车辆信息资料审核通过', 120, 1419665351, '127.0.0.1'),
(10, 3, 1, '车辆信息资料审核通过', 120, 1419665536, '127.0.0.1'),
(11, 3, 1, '车辆信息资料审核通过', 120, 1419666788, '127.0.0.1'),
(12, 3, 1, '房产资料资料审核通过', 1001, 1419666952, '127.0.0.1'),
(13, 3, 1, '车辆信息资料审核通过', 120, 1419818152, '127.0.0.1'),
(14, 3, 1, '车辆信息资料审核通过', 120, 1419843707, '127.0.0.1'),
(15, 3, 1, '房产资料资料审核通过', 1001, 1419843794, '127.0.0.1'),
(16, 3, 1, '实名认证获得的积分', 10, 1421376692, '127.0.0.1'),
(17, 3, 1, '实名认证获得的积分', 10, 1421378893, '127.0.0.1'),
(18, 3, 1, '实名认证获得的积分', 10, 1421380492, '127.0.0.1'),
(19, 3, 1, '实名认证获得的积分', 10, 1421380640, '127.0.0.1'),
(20, 3, 1, '实名认证获得的积分', 10, 1421380741, '127.0.0.1'),
(21, 3, 1, '实名认证获得的积分', 10, 1421380876, '127.0.0.1'),
(22, 3, 1, '实名认证获得的积分', 10, 1421380910, '127.0.0.1'),
(23, 3, 1, '实名认证获得的积分', 10, 1421385557, '127.0.0.1'),
(24, 3, 1, '实名认证获得的积分', 10, 1421385673, '127.0.0.1'),
(25, 3, 1, '视频认证获得的积分', 10, 1421389082, '127.0.0.1'),
(26, 3, 1, '视频认证获得的积分', 10, 1421389319, '127.0.0.1'),
(27, 3, 1, '实名认证获得的积分', 10, 1421389382, '127.0.0.1'),
(28, 3, 1, '手机认证获得的积分', 10, 1421390443, '127.0.0.1'),
(29, 3, 1, '实名认证获得的积分', 10, 1421650652, '127.0.0.1'),
(30, 3, 1, '视频认证获得的积分', 10, 1421723265, '127.0.0.1'),
(31, 3, 1, '手机认证获得的积分', 10, 1421813080, '127.0.0.1'),
(32, 3, 1, '车辆信息资料审核通过', 120, 1421979847, '127.0.0.1'),
(33, 3, 1, '视频认证获得的积分', 10, 1421979886, '127.0.0.1'),
(34, 3, 1, '视频认证获得的积分', 10, 1421980479, '127.0.0.1'),
(35, 3, 1, '视频认证获得的积分', 10, 1421980509, '127.0.0.1'),
(36, 3, 1, '视频认证获得的积分', 10, 1421980900, '127.0.0.1'),
(37, 3, 1, '测试类型资料审核通过', 100, 1422088152, '127.0.0.1'),
(38, 3, 1, '实名认证获得的积分', 10, 1422337294, '127.0.0.1'),
(39, 3, 1, '还清借款信用积分（期）', 1, 1423279291, '127.0.0.1'),
(40, 3, 1, '还完所有贷款期数', 100, 1423279291, '127.0.0.1'),
(41, 3, 1, '还清借款信用积分（期）', 1, 1423296032, '127.0.0.1'),
(42, 3, 1, '还清借款信用积分（期）', 1, 1423296033, '127.0.0.1'),
(43, 3, 1, '还清借款信用积分（期）', 1, 1423296033, '127.0.0.1'),
(44, 3, 1, '还清借款信用积分（期）', 1, 1423296033, '127.0.0.1'),
(45, 3, 1, '还清借款信用积分（期）', 1, 1423296033, '127.0.0.1'),
(46, 3, 1, '还清借款信用积分（期）', 1, 1423296033, '127.0.0.1'),
(47, 3, 1, '还清借款信用积分（期）', 1, 1423296033, '127.0.0.1'),
(48, 3, 1, '还清借款信用积分（期）', 1, 1423296034, '127.0.0.1'),
(49, 3, 1, '还清借款信用积分（期）', 1, 1423296034, '127.0.0.1'),
(50, 3, 1, '还清借款信用积分（期）', 1, 1423296034, '127.0.0.1'),
(51, 3, 1, '还清借款信用积分（期）', 1, 1423296034, '127.0.0.1'),
(52, 3, 1, '还清借款信用积分（期）', 1, 1423296034, '127.0.0.1'),
(53, 3, 1, '还清借款信用积分（期）', 1, 1423296034, '127.0.0.1'),
(54, 3, 1, '还清借款信用积分（期）', 1, 1423296034, '127.0.0.1'),
(55, 3, 1, '还清借款信用积分（期）', 1, 1423296034, '127.0.0.1'),
(56, 3, 1, '还清借款信用积分（期）', 1, 1423296034, '127.0.0.1'),
(57, 3, 1, '还清借款信用积分（期）', 1, 1423296035, '127.0.0.1'),
(58, 3, 1, '还清借款信用积分（期）', 1, 1423296035, '127.0.0.1'),
(59, 3, 1, '还清借款信用积分（期）', 1, 1423296035, '127.0.0.1'),
(60, 3, 1, '还清借款信用积分（期）', 1, 1423296035, '127.0.0.1'),
(61, 3, 1, '还完所有贷款期数', 100, 1423296035, '127.0.0.1'),
(62, 3, 1, '还清借款信用积分（期）', 1, 1423373636, '127.0.0.1'),
(63, 3, 1, '还清借款信用积分（期）', 1, 1423373636, '127.0.0.1'),
(64, 3, 1, '还清借款信用积分（期）', 1, 1423373636, '127.0.0.1'),
(65, 3, 1, '还清借款信用积分（期）', 1, 1423373748, '127.0.0.1'),
(66, 3, 1, '还完所有贷款期数', 100, 1423385151, '127.0.0.1'),
(67, 3, 1, '普通逾期扣除积分(期)', -10, 1427260853, '127.0.0.1'),
(68, 3, 1, '普通逾期扣除积分(期)', -10, 1429941966, '127.0.0.1'),
(69, 3, 1, '还完所有贷款期数', 100, 1424769608, '127.0.0.1'),
(70, 3, 1, '现场认证获得的积分', 10, 1424834181, '127.0.0.1'),
(71, 3, 1, '还清借款信用积分（期）', 1, 1424844738, '127.0.0.1'),
(72, 3, 1, '还清借款信用积分（期）', 1, 1424844943, '127.0.0.1'),
(73, 3, 1, '还清借款信用积分（期）', 1, 1424844943, '127.0.0.1'),
(74, 3, 1, '还清借款信用积分（期）', 1, 1424846017, '127.0.0.1'),
(75, 3, 1, '还清借款信用积分（期）', 1, 1424846200, '127.0.0.1'),
(76, 3, 1, '还清借款信用积分（期）', 1, 1426054398, '218.29.89.218'),
(77, 3, 1, '房产资料资料审核通过', 1001, 1426317892, '218.29.89.218'),
(78, 3, 1, '车辆信息资料审核通过', 120, 1426318124, '218.29.89.218'),
(79, 17, 1, '实名认证获得的积分', 10, 1426320102, '218.29.89.218'),
(80, 3, 1, '还清借款信用积分（期）', 1, 1426324903, '218.29.89.218'),
(81, 3, 1, '还清借款信用积分（期）', 1, 1426324903, '218.29.89.218'),
(82, 54, 1, '实名认证获得的积分', 10, 1429239670, '123.149.223.203');

-- --------------------------------------------------------

--
-- 表的结构 `ac_links`
--

CREATE TABLE IF NOT EXISTS `ac_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `link_image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `link_target` varchar(25) NOT NULL DEFAULT '_blank' COMMENT '友情链接打开方式',
  `link_description` text NOT NULL COMMENT '友情链接描述',
  `link_status` int(2) NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `link_rel` varchar(255) DEFAULT '',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ac_links`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_loan`
--

CREATE TABLE IF NOT EXISTS `ac_loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userdata` varchar(350) NOT NULL COMMENT '用户要展示的信息，不包括认证只是资料哦',
  `name` text NOT NULL COMMENT '借款名称',
  `sub_name` varchar(255) NOT NULL COMMENT '缩略么',
  `cate_id` int(11) NOT NULL COMMENT '标的类型',
  `agency_id` smallint(11) unsigned NOT NULL DEFAULT '0' COMMENT '担保机构（标识ID）',
  `user_id` int(11) NOT NULL COMMENT '借款人（标识ID）',
  `description` text NOT NULL COMMENT '简介',
  `is_effect` tinyint(1) NOT NULL COMMENT ' 有效性控制',
  `is_delete` tinyint(1) NOT NULL COMMENT '删除标识',
  `listorder` tinyint(3) unsigned NOT NULL COMMENT '排序  大->小',
  `type_id` int(11) NOT NULL COMMENT '借款用途（标识id）',
  `is_hot` tinyint(1) NOT NULL COMMENT '是否热门',
  `is_new` tinyint(1) NOT NULL COMMENT '是否最新',
  `is_best` tinyint(1) NOT NULL COMMENT '是否最佳',
  `borrow_amount` decimal(10,0) NOT NULL COMMENT '借款总额',
  `min_loan_money` decimal(10,0) NOT NULL DEFAULT '50' COMMENT '最底投标额度',
  `max_loan_money` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '最高投标额度',
  `repay_time` int(11) NOT NULL COMMENT '借款时间',
  `repay_nper` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '还款总期数',
  `rate` decimal(10,2) NOT NULL COMMENT '年利率',
  `deadline` tinyint(1) unsigned NOT NULL COMMENT '招标时间',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `is_recommend` tinyint(1) NOT NULL COMMENT '是否推荐',
  `buy_count` int(11) NOT NULL COMMENT '投标人数',
  `load_money` decimal(20,2) NOT NULL COMMENT '已投标多少',
  `repay_money` decimal(20,4) NOT NULL COMMENT '还了多少！本+息的钱数',
  `repay_count` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '还款次数',
  `start_time` int(11) NOT NULL COMMENT '开始招标日期',
  `success_time` int(11) NOT NULL COMMENT '成功日期',
  `repay_start_time` int(11) NOT NULL COMMENT '开始还款日',
  `last_repay_time` int(11) NOT NULL COMMENT '最后一次还款日 记录提前还款用的',
  `next_repay_time` int(11) NOT NULL COMMENT '下次还款日',
  `bad_time` int(11) NOT NULL COMMENT '流标时间',
  `deal_status` tinyint(4) NOT NULL COMMENT '             // 0 待审核	1审核通过	2审核失败	3用户取消	4流标	5满标待审核		6满标审核失败	7还款中	8逾期中	9已完成',
  `enddate` int(11) NOT NULL COMMENT '筹标结束日期',
  `publish_wait` tinyint(1) NOT NULL COMMENT '是否发布 1：待发布 2已发布',
  `is_send_bad_msg` tinyint(1) NOT NULL COMMENT '是否已发送流标通知',
  `is_send_success_msg` tinyint(1) NOT NULL COMMENT '是否已经发送成功通知',
  `send_half_msg_time` int(11) NOT NULL COMMENT '发送投标过半的通知时间',
  `send_three_msg_time` int(11) NOT NULL COMMENT '发送三天内需还款的通知时间',
  `is_send_half_msg` tinyint(1) NOT NULL COMMENT '是否已发送招标过半通知',
  `is_has_loans` tinyint(1) NOT NULL COMMENT '是否已经放款给招标人',
  `loantype` varchar(30) NOT NULL COMMENT '根据repay_type的value生成',
  `warrant` tinyint(1) NOT NULL COMMENT '担保范围 0:无  1:本金 2:本金及利息',
  `risk_rank` tinyint(1) NOT NULL DEFAULT '0' COMMENT '风险等级',
  `user_login` varchar(50) NOT NULL COMMENT '用户登录帐号',
  `firstaudit` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '初审审核人',
  `fullaudit` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '满标审核人',
  `firstauditmark` varchar(250) NOT NULL COMMENT '初审备注',
  `fullauditmark` varchar(250) NOT NULL COMMENT '复审备注',
  `firstaudittime` int(11) NOT NULL COMMENT '初审时间',
  `fullaudittime` int(11) NOT NULL COMMENT '满标审核时间',
  PRIMARY KEY (`id`),
  KEY `cate_id` (`cate_id`),
  KEY `sort` (`listorder`),
  KEY `create_time` (`create_time`),
  KEY `update_time` (`update_time`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `idx_1` (`user_id`,`publish_wait`),
  KEY `idx_0` (`deal_status`,`user_id`,`publish_wait`),
  KEY `user_login` (`user_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `ac_loan`
--

INSERT INTO `ac_loan` (`id`, `userdata`, `name`, `sub_name`, `cate_id`, `agency_id`, `user_id`, `description`, `is_effect`, `is_delete`, `listorder`, `type_id`, `is_hot`, `is_new`, `is_best`, `borrow_amount`, `min_loan_money`, `max_loan_money`, `repay_time`, `repay_nper`, `rate`, `deadline`, `create_time`, `update_time`, `is_recommend`, `buy_count`, `load_money`, `repay_money`, `repay_count`, `start_time`, `success_time`, `repay_start_time`, `last_repay_time`, `next_repay_time`, `bad_time`, `deal_status`, `enddate`, `publish_wait`, `is_send_bad_msg`, `is_send_success_msg`, `send_half_msg_time`, `send_three_msg_time`, `is_send_half_msg`, `is_has_loans`, `loantype`, `warrant`, `risk_rank`, `user_login`, `firstaudit`, `fullaudit`, `firstauditmark`, `fullauditmark`, `firstaudittime`, `fullaudittime`) VALUES
(1, 'a:2:{i:9;s:12:"测试类型";i:7;s:12:"车辆信息";}', '提前还款标测试', '提前还款标测试', 3, 0, 3, '', 0, 0, 255, 1, 0, 0, 0, 10000, 50, 0, 12, 12, 10.00, 10, 1424841239, 0, 1, 4, 10000.00, 5274.9600, 6, 1424841720, 1424842174, 1424843640, 0, 1443160440, 0, 7, 1425705720, 0, 0, 1, 1424842048, 0, 1, 1, 'principalInterestEqual', 0, 0, 'test', 1, 1, '爱爱爱', '	确认时间开始的起算，如 设置为 2014.1.1 即第一次还款日为：2014.2.1，确认时间不要设置为29,30,31号', 1424841790, 1424843690),
(2, 'a:2:{i:9;s:12:"测试类型";i:7;s:12:"车辆信息";}', '短期周转', '周转', 3, 0, 3, '', 0, 0, 255, 1, 0, 0, 0, 50000, 50, 0, 12, 12, 10.00, 7, 1426296381, 0, 0, 1, 1000.00, 0.0000, 0, 1426301940, 0, 0, 0, 0, 1426920470, 4, 1426906740, 0, 1, 0, 0, 0, 0, 0, 'averagecCapital', 0, 0, 'test', 1, 0, '', '', 1426302053, 0),
(3, 'N;', '3个月到期本息', '3个月到期', 4, 0, 3, '', 0, 0, 255, 1, 0, 0, 0, 100000, 50, 0, 3, 1, 10.00, 10, 1426296527, 0, 0, 0, 0.00, 0.0000, 0, 1426302060, 0, 0, 0, 0, 1427180264, 4, 1427166060, 0, 1, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, 'test', 1, 0, '', '', 1426302136, 0),
(4, 'N;', '3个月到期本息', '3月到期', 4, 0, 13, '', 0, 0, 255, 1, 0, 0, 0, 70000, 50, 0, 3, 1, 10.00, 8, 1426297751, 0, 0, 0, 0.00, 0.0000, 0, 1426302000, 0, 0, 0, 0, 1427002759, 4, 1426993200, 0, 1, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, 'wuhaofz502', 1, 0, '', '', 1426302075, 0),
(5, 'N;', '3个月到期本息', '3月到期', 4, 0, 11, '', 0, 0, 255, 10, 0, 0, 0, 40000, 50, 0, 3, 1, 10.00, 6, 1426297946, 0, 0, 0, 0.00, 0.0000, 0, 1426302060, 0, 0, 0, 0, 1426833549, 4, 1426820460, 0, 1, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, 'z4231', 1, 0, '', '', 1426302148, 0),
(6, 'N;', '3个月到期本息', '3月到期', 4, 0, 10, '', 0, 0, 255, 6, 0, 0, 0, 10000, 50, 0, 3, 1, 10.00, 10, 1426299033, 0, 0, 0, 0.00, 0.0000, 0, 1426302000, 0, 0, 0, 0, 1427180264, 4, 1427166000, 0, 1, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, 'hjh1', 1, 0, '', '', 1426302085, 0),
(7, 'N;', '3个月到期本息', '到期还款', 4, 0, 12, '', 0, 0, 255, 10, 0, 0, 0, 30000, 50, 0, 3, 1, 10.00, 5, 1426299149, 0, 0, 0, 0.00, 0.0000, 0, 1426302120, 0, 0, 0, 0, 1426746755, 4, 1426734120, 0, 1, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, 'test123', 1, 0, '', '', 1426302196, 0),
(8, 'N;', '3个月到期本息', '到期还款', 4, 0, 6, '', 0, 0, 255, 4, 0, 0, 0, 60000, 50, 0, 3, 1, 10.00, 10, 1426299214, 0, 0, 1, 3000.00, 0.0000, 0, 1426302120, 0, 0, 0, 0, 1427180264, 4, 1427166120, 0, 1, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, 'rrr', 1, 0, '', '', 1426302217, 0),
(9, 'a:2:{i:7;s:12:"车辆信息";i:6;s:12:"房产资料";}', 'testtest', 'testtest', 5, 2, 3, '借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述借款描述', 0, 0, 255, 2, 0, 0, 0, 10000, 50, 0, 5, 5, 10.00, 7, 1426318937, 0, 1, 3, 10000.00, 4100.5600, 2, 1426319040, 1426319574, 1426319580, 0, 1434268380, 0, 7, 1426923840, 0, 0, 1, 1426319544, 0, 1, 1, 'principalInterestEqual', 1, 1, 'test', 1, 1, '审核备审核备审核备审核备审核备', 'nssdgfdgdf', 1426319159, 1426319648),
(10, 'a:3:{i:7;s:12:"车辆信息";i:6;s:12:"房产资料";i:9;s:12:"测试类型";}', '这是我的借款标题', '这是我的借款标题', 5, 0, 3, '这是我的借款标题这是我的借款标题这是我的借款标题这是我的借款标题这是我的借款标题这是我的借款标题这是我的借款标题这是我的借款标题这是我的借款标题', 0, 0, 255, 3, 0, 0, 0, 10000, 50, 0, 3, 3, 10.00, 7, 1428928133, 0, 1, 0, 0.00, 0.0000, 0, 1428928860, 0, 0, 0, 0, 0, 1, 1429533660, 0, 0, 0, 0, 0, 0, 0, 'principalInterestEqual', 0, 0, 'test', 1, 0, 'BBBBBB', '', 1428928223, 0),
(11, 'N;', '3个月到期本息', '3个月到期本息', 4, 0, 48, '3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息3个月到期本息', 0, 0, 255, 6, 0, 0, 0, 10000, 50, 0, 3, 1, 20.00, 10, 1428931141, 0, 0, 0, 0.00, 0.0000, 0, 1429061640, 0, 0, 0, 0, 0, 1, 1429925640, 0, 0, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, '', 1, 0, '范德萨', '', 1428974579, 0),
(12, 'a:2:{i:7;s:12:"车辆信息";i:6;s:12:"房产资料";}', '测试会员信息', '测试', 4, 2, 3, '发的规范的施工反倒是', 0, 0, 255, 1, 0, 0, 0, 10000, 100, 0, 3, 1, 10.00, 5, 1428931836, 0, 0, 0, 0.00, 0.0000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 2, 0, 'test', 0, 0, '', '', 0, 0),
(13, 'N;', '短期周转20万', '短期周转20万', 4, 0, 54, '短期周转20万短期周转20万短期周转20万短期周转20万短期周转20万', 0, 0, 255, 1, 0, 0, 0, 160000, 1000, 0, 3, 1, 10.00, 10, 1429096257, 0, 0, 0, 0.00, 0.0000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 2, 0, '', 0, 0, '', '', 0, 0),
(14, 'N;', '禾tttttt', 'xdfxdfdxfg', 4, 0, 54, 'cfthcfjfyj', 0, 0, 255, 1, 0, 0, 0, 57000, 50, 0, 3, 1, 12.00, 10, 1429096538, 0, 0, 0, 0.00, 0.0000, 0, 0, 0, 0, 0, 0, 1429097337, 4, 0, 0, 1, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, '', 0, 0, '', '', 0, 0),
(15, 'N;', 'yyyyy', 'uuuuu', 4, 0, 55, 'ffffhhhhffffhhhhffffhhhhffffhhhh', 0, 0, 255, 1, 0, 0, 0, 60000, 50, 0, 3, 1, 10.00, 10, 1429096842, 0, 0, 0, 0.00, 0.0000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 2, 0, '', 0, 0, '', '', 0, 0),
(21, 'N;', 'ttt', 'yyy', 4, 0, 54, 'wewetrwertwesdfsdfsdfsdfsdf', 0, 0, 255, 1, 0, 0, 0, 45600, 50, 0, 3, 1, 12.00, 10, 1429237760, 0, 1, 3, 45600.00, 0.0000, 0, 1429238460, 1429238811, 1429239600, 0, 1437102000, 0, 7, 1430102460, 0, 0, 1, 1429238658, 0, 1, 1, 'sanyuedaoqibenxi', 2, 0, 'rain', 1, 1, '', '审核通过 ', 1429237800, 1429238977),
(20, 'N;', 'fdsafdsa', 'fdsafdsafdsa', 4, 0, 51, 'fdsafdasssdf', 0, 0, 255, 1, 0, 0, 0, 100000, 50, 0, 3, 1, 11.00, 5, 1429196247, 0, 0, 0, 0.00, 0.0000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, 'hjh', 0, 0, '', '', 0, 0),
(19, 'N;', 'fsadfsd', 'fsdfds', 4, 0, 56, '', 0, 0, 255, 1, 0, 0, 0, 600, 50, 0, 3, 1, 10.00, 10, 1429113766, 0, 0, 0, 0.00, 0.0000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'sanyuedaoqibenxi', 0, 0, 'fskfjk', 0, 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_agency`
--

CREATE TABLE IF NOT EXISTS `ac_loan_agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '机构名称',
  `brief` text NOT NULL COMMENT '担保方介绍',
  `content` longtext NOT NULL COMMENT '内容',
  `is_effect` tinyint(1) NOT NULL COMMENT '有效性标识',
  `listorder` smallint(6) unsigned NOT NULL,
  `short_name` varchar(100) NOT NULL COMMENT '缩略名',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `site` varchar(100) NOT NULL COMMENT '网站',
  `logo` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ac_loan_agency`
--

INSERT INTO `ac_loan_agency` (`id`, `name`, `brief`, `content`, `is_effect`, `listorder`, `short_name`, `address`, `site`, `logo`) VALUES
(1, '本站担保', '保方介绍:保方介绍:保方介绍:保方介绍:保方介绍:保方介绍:保方介绍:', '&lt;p&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;/p&gt;', 0, 200, '本站担保', '鞋码电路228号', 'http://www.ac371.cn', ''),
(2, '担保机构而', '担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍担保方介绍', '&lt;p&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;担保方介绍&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;担保&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;方介绍&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;担保方介绍&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;担保方介&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;绍&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;担保方介绍&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;担保方介绍&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: &amp;#39;Microsoft YaHei&amp;#39;, Lato, &amp;#39;Helvetica Neue&amp;#39;, Helvetica, Arial, sans-serif; font-size: 14.4444446563721px; font-weight: bold; line-height: 20px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;内容&lt;/span&gt;&lt;/p&gt;', 1, 255, '担保机构而', '担保机构而地址', 'www.baidu.com', '/data/upload/54b32ce25a541.jpg'),
(3, 'AAAAAAA', 'AAAAAAAAAAAAAAAAAAAA', '<p>&lt;p&gt;fdsafsdfafdsafdsaaaaaaaaaaaaaaaaaaafdsa&lt;/p&gt;</p><p>魂牵梦萦基本面</p><p><span style="background-color: rgb(255, 255, 0);">魂牵梦萦</span></p><p><span style="background-color: rgb(255, 255, 0);">AAAAAAAAAAA</span>工<br/></p>', 1, 0, 'AAAAAAAA', 'AAAAAAAAAAAAA', 'AAAAAAAAAAAA', '/ptop/data/upload/54d05e42ae027.png');

-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_apply`
--

CREATE TABLE IF NOT EXISTS `ac_loan_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(13) NOT NULL DEFAULT '' COMMENT '会员名称',
  `money` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '贷款钱 单位:万元',
  `loan_type` tinyint(2) NOT NULL COMMENT '借款用途',
  `Inform` tinyint(1) NOT NULL COMMENT '家属告知 1告知',
  `real_name` varchar(100) NOT NULL COMMENT '真实姓名',
  `phone` varchar(11) NOT NULL COMMENT '手机号码',
  `email` varchar(50) NOT NULL COMMENT '电子邮箱',
  `Idcard` varchar(18) NOT NULL COMMENT '身份证号',
  `education` varchar(100) NOT NULL COMMENT '最高学历',
  `marriage` varchar(20) NOT NULL COMMENT '婚姻情况',
  `credit` tinyint(1) NOT NULL COMMENT '有无可使用的信用卡 1有',
  `loan` tinyint(1) NOT NULL COMMENT '有无成功银行贷款 1有',
  `native_place` varchar(200) NOT NULL COMMENT '居住城市',
  `city_time` varchar(20) NOT NULL COMMENT '城市起始居住时间',
  `place_type` varchar(100) NOT NULL COMMENT '居住类型',
  `place_time` varchar(20) NOT NULL COMMENT '住宅起始居住时间',
  `work_type` tinyint(1) NOT NULL COMMENT '工作类型  1上班族',
  `work_time` varchar(20) NOT NULL COMMENT '起始时间',
  `income_type` varchar(100) NOT NULL COMMENT '收入类型',
  `card_income` decimal(20,2) NOT NULL COMMENT '每月税后银行卡收入',
  `montyly_income` decimal(20,2) NOT NULL COMMENT '每月税后现金收入',
  `house_property` tinyint(1) NOT NULL COMMENT '房产情况  1有',
  `house_loan` tinyint(1) NOT NULL COMMENT '房屋贷款  1有',
  `status` tinyint(1) NOT NULL COMMENT '0未查看  1查看 2已处理',
  `admin_name` varchar(50) NOT NULL COMMENT '处理人',
  `remarks` varchar(500) NOT NULL COMMENT '备注',
  `handle_time` varchar(25) NOT NULL COMMENT '处理时间',
  `time` varchar(20) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `ac_loan_apply`
--

INSERT INTO `ac_loan_apply` (`id`, `uid`, `user_name`, `money`, `loan_type`, `Inform`, `real_name`, `phone`, `email`, `Idcard`, `education`, `marriage`, `credit`, `loan`, `native_place`, `city_time`, `place_type`, `place_time`, `work_type`, `work_time`, `income_type`, `card_income`, `montyly_income`, `house_property`, `house_loan`, `status`, `admin_name`, `remarks`, `handle_time`, `time`) VALUES
(4, 0, '', 30.00, 3, 1, 'fdsafdsa', '15038509029', '997465573@qq.com', '411522199001012454', '大专', '离异', 0, 1, '上海市|上海市|静安区', '2015-02-11', '租用', '2015-02-28', 1, '2015-02-02', '仅现金收入', 7945.00, 45784.00, 1, 0, 1, 'admin', 'dsfsdafasd', '2015-02-12 11:24:14', '2015-02-12 11:23:25'),
(5, 0, '', 12.00, 3, 1, '胡大大', '15038509029', '99745664@qq.com', '411522199001012454', '硕士及以上', '已婚', 0, 1, '上海市|上海市|长宁区', '2015-12-1', '自购无贷款', '2015-12-1', 1, '2015-12-1', '仅现金收入', 14.00, 32.00, 1, 1, 0, '', '', '', '2015-03-14 11:44:28'),
(6, 0, '', 12.00, 3, 1, '胡大大', '15038509029', '997465573@qq.com', '411522199001012454', '硕士及以上', '未婚', 1, 1, '天津市|天津市|南开区', '2015-12-1', '自购无贷款', '2015-12-1', 1, '2015-12-1', '仅现金收入', 14.00, 32.00, 1, 1, 0, '', '', '', '2015-03-14 11:45:19'),
(7, 0, '', 15.00, 3, 1, '胡大大', '15038509029', '997465573@qq.com', '411522199001012454', '硕士及以上', '已婚', 1, 1, '天津市|天津市|南开区', '2015-12-1', '自购有贷款', '2015-12-1', 1, '2015-12-1', '仅银行卡收入', 14.00, 32.00, 1, 1, 0, '', '', '', '2015-03-14 13:22:26'),
(8, 3, 'test', 20.00, 5, 1, '王小久', '15803789587', '393689989@qq.com', '410411198809205515', '硕士及以上', '未婚', 1, 1, '福建省|南平市|武夷山市', '2015-3-5', '自购有贷款', '2015-5-6', 1, '2015-10-6', '仅银行卡收入', 20000.00, 10000.00, 1, 1, 1, 'admin', '', '2015-03-14 15:36:26', '2015-03-14 15:31:59'),
(9, 54, 'rain', 20.00, 1, 1, '刘女士', '15936217900', '707308252@qq.com', '411282198204025525', '硕士及以上', '已婚', 0, 0, '河南省|郑州市|金水区', '10', '自购无贷款', '2007', 1, '2003', '部分银行卡部分现金收入', 3000.00, 3000.00, 1, 0, 2, 'admin', '', '2015-04-15 18:53:22', '2015-04-15 18:52:30');

-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_cate`
--

CREATE TABLE IF NOT EXISTS `ac_loan_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL COMMENT '分类名称',
  `introduction` varchar(500) NOT NULL COMMENT '说明',
  `terms_id` mediumint(9) NOT NULL COMMENT '绑定的文章ID',
  `borrowing_time_longest` tinyint(4) NOT NULL DEFAULT '0' COMMENT '借款最长日期',
  `borrowing_time_shortest` tinyint(4) NOT NULL DEFAULT '0' COMMENT '借款最短日期:',
  `deadline` tinyint(4) NOT NULL COMMENT '筹标期限:',
  `amount` decimal(13,2) NOT NULL COMMENT '借款金额上限:',
  `payback` varchar(300) NOT NULL COMMENT '还款方式',
  `audit` varchar(300) NOT NULL COMMENT '认证状态',
  `review` varchar(500) NOT NULL COMMENT '必要申请资料',
  `listorder` smallint(6) NOT NULL DEFAULT '255' COMMENT '排序',
  `borrow_success_fee` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '成交服务费',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ac_loan_cate`
--

INSERT INTO `ac_loan_cate` (`id`, `cat_name`, `introduction`, `terms_id`, `borrowing_time_longest`, `borrowing_time_shortest`, `deadline`, `amount`, `payback`, `audit`, `review`, `listorder`, `borrow_success_fee`) VALUES
(1, '秒杀标', '秒杀标秒杀标秒杀标秒杀标秒杀标秒杀标秒杀标', 1, 24, 16, 127, 10000.00, 'a:2:{s:22:"principalInterestEqual";s:12:"等额本息";s:15:"averagecCapital";s:12:"等额本金";}', 'a:3:{i:1;s:12:"手机认证";i:2;s:12:"邮箱认证";i:4;s:12:"视频认证";}', 'a:2:{i:6;s:12:"房产资料";i:9;s:12:"测试类型";}', 250, 0),
(5, '质押标', '质押标v质押标质押标质押标质押标', 2, 36, 1, 7, 700000.00, 'a:2:{s:22:"principalInterestEqual";s:12:"等额本息";s:15:"averagecCapital";s:12:"等额本金";}', 'a:4:{i:1;s:12:"手机认证";i:3;s:12:"实名认证";i:4;s:12:"视频认证";i:5;s:12:"现场认证";}', 'a:1:{i:6;s:12:"房产资料";}', 249, 0),
(3, '信用贷款', '信用贷款信用贷款信用贷款', 1, 25, 12, 10, 222222.00, 'a:2:{s:22:"principalInterestEqual";s:12:"等额本息";s:15:"averagecCapital";s:12:"等额本金";}', 'a:1:{i:4;s:12:"视频认证";}', 'a:2:{i:7;s:12:"车辆信息";i:9;s:12:"测试类型";}', 255, 0),
(4, '3个月到期本息', '3个月到期本息3个月到期本息', 1, 3, 3, 10, 200000.00, 'a:1:{s:16:"sanyuedaoqibenxi";s:19:"3个月到期本息";}', 'a:0:{}', 'a:0:{}', 255, 5);

-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_inrepay_repay`
--

CREATE TABLE IF NOT EXISTS `ac_loan_inrepay_repay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL COMMENT '借款（标识性ID）',
  `user_id` int(11) NOT NULL COMMENT '借款人（标识性ID）',
  `repay_money` decimal(10,0) NOT NULL COMMENT '替换还款多少',
  `manage_money` decimal(20,4) NOT NULL COMMENT '管理费',
  `impose_money` decimal(20,4) NOT NULL COMMENT '罚息',
  `repay_time` int(11) NOT NULL COMMENT '在哪一期提前还款',
  `true_repay_time` int(11) NOT NULL COMMENT '还款时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ac_loan_inrepay_repay`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_load`
--

CREATE TABLE IF NOT EXISTS `ac_loan_load` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) unsigned NOT NULL COMMENT '借款ID',
  `user_id` int(11) unsigned NOT NULL COMMENT '投标人ID',
  `user_login` varchar(50) NOT NULL COMMENT '用户名',
  `money` decimal(20,2) unsigned NOT NULL COMMENT '投标金额',
  `create_time` int(11) NOT NULL COMMENT '投标时间',
  `is_repay` tinyint(1) NOT NULL COMMENT '流标是否已返还',
  `is_rebate` tinyint(1) NOT NULL COMMENT '是否已返利',
  `is_auto` tinyint(1) NOT NULL COMMENT '是否为自动投标 0:收到 1:自动',
  PRIMARY KEY (`id`),
  KEY `deal_id` (`loan_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- 转存表中的数据 `ac_loan_load`
--

INSERT INTO `ac_loan_load` (`id`, `loan_id`, `user_id`, `user_login`, `money`, `create_time`, `is_repay`, `is_rebate`, `is_auto`) VALUES
(42, 1, 7, 'ac371', 1000.00, 1424842017, 0, 0, 0),
(43, 1, 7, 'ac371', 1000.00, 1424842028, 0, 0, 0),
(44, 1, 7, 'ac371', 5000.00, 1424842047, 0, 0, 0),
(45, 1, 7, 'ac371', 3000.00, 1424842173, 0, 0, 0),
(46, 2, 17, 'wwww', 1000.00, 1426314543, 1, 0, 0),
(47, 9, 21, 'acac', 5000.00, 1426319531, 0, 0, 0),
(48, 9, 21, 'acac', 3000.00, 1426319543, 0, 0, 0),
(49, 9, 21, 'acac', 2000.00, 1426319574, 0, 0, 0),
(50, 8, 21, 'acac', 3000.00, 1426322761, 1, 0, 0),
(51, 21, 55, 'rainbow', 40000.00, 1429238658, 0, 0, 0),
(52, 21, 55, 'rainbow', 3000.00, 1429238765, 0, 0, 0),
(53, 21, 55, 'rainbow', 2600.00, 1429238811, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_load_repay`
--

CREATE TABLE IF NOT EXISTS `ac_loan_load_repay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL COMMENT '借款（标识ID）',
  `user_id` int(11) NOT NULL COMMENT '投标人（标识ID）',
  `self_money` decimal(20,4) NOT NULL COMMENT '本金',
  `repay_money` decimal(20,4) NOT NULL COMMENT '还款金额',
  `manage_money` decimal(20,4) NOT NULL COMMENT '管理费',
  `impose_money` decimal(20,4) NOT NULL COMMENT '罚息',
  `repay_time` int(11) NOT NULL COMMENT '还款日',
  `true_repay_time` int(11) NOT NULL COMMENT '实际还款时间',
  `status` int(11) NOT NULL COMMENT '0提前，1准时，2逾期，3严重逾期',
  `is_site_repay` tinyint(1) NOT NULL COMMENT '是否垫付',
  `l_key` int(11) NOT NULL DEFAULT '0' COMMENT '还的是第几期',
  `u_key` int(11) NOT NULL DEFAULT '0' COMMENT '还的是第几个投标人',
  PRIMARY KEY (`id`),
  KEY `idx_0` (`loan_id`,`user_id`,`l_key`,`u_key`),
  KEY `idx_1` (`user_id`,`status`),
  KEY `idx_2` (`loan_id`,`user_id`,`repay_time`,`l_key`,`u_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `ac_loan_load_repay`
--

INSERT INTO `ac_loan_load_repay` (`id`, `loan_id`, `user_id`, `self_money`, `repay_money`, `manage_money`, `impose_money`, `repay_time`, `true_repay_time`, `status`, `is_site_repay`, `l_key`, `u_key`) VALUES
(1, 1, 7, 79.5826, 87.9159, 0.0833, 0.0000, 1427262840, 1424844737, 0, 0, 0, 0),
(2, 1, 7, 79.5826, 87.9159, 0.0833, 0.0000, 1427262840, 1424844737, 0, 0, 0, 1),
(3, 1, 7, 397.9128, 439.5794, 0.4167, 0.0000, 1427262840, 1424844737, 0, 0, 0, 2),
(4, 1, 7, 238.7477, 263.7477, 0.2500, 0.0000, 1427262840, 1424844737, 0, 0, 0, 3),
(5, 1, 7, 80.2457, 87.9159, 0.0767, 0.0000, 1429941240, 1424844943, 0, 0, 1, 0),
(6, 1, 7, 80.9145, 87.9159, 0.0700, 0.0000, 1432533240, 1424844943, 0, 0, 2, 0),
(7, 1, 7, 80.2457, 87.9159, 0.0767, 0.0000, 1429941240, 1424844943, 0, 0, 1, 1),
(8, 1, 7, 80.9145, 87.9159, 0.0700, 0.0000, 1432533240, 1424844943, 0, 0, 2, 1),
(9, 1, 7, 401.2287, 439.5794, 0.3835, 0.0000, 1429941240, 1424844943, 0, 0, 1, 2),
(10, 1, 7, 404.5723, 439.5794, 0.3501, 0.0000, 1432533240, 1424844943, 0, 0, 2, 2),
(11, 1, 7, 240.7372, 263.7477, 0.2301, 0.0000, 1429941240, 1424844943, 0, 0, 1, 3),
(12, 1, 7, 242.7434, 263.7477, 0.2100, 0.0000, 1432533240, 1424844943, 0, 0, 2, 3),
(13, 1, 7, 81.5887, 87.9159, 0.0633, 0.0000, 1435211640, 1424846017, 0, 0, 3, 0),
(14, 1, 7, 81.5887, 87.9159, 0.0633, 0.0000, 1435211640, 1424846017, 0, 0, 3, 1),
(15, 1, 7, 407.9437, 439.5794, 0.3164, 0.0000, 1435211640, 1424846017, 0, 0, 3, 2),
(16, 1, 7, 244.7662, 263.7477, 0.1898, 0.0000, 1435211640, 1424846017, 0, 0, 3, 3),
(17, 1, 7, 82.2686, 87.9159, 0.0565, 0.0000, 1437803640, 1424846200, 0, 0, 4, 0),
(18, 1, 7, 82.2686, 87.9159, 0.0565, 0.0000, 1437803640, 1424846200, 0, 0, 4, 1),
(19, 1, 7, 411.3432, 439.5794, 0.2824, 0.0000, 1437803640, 1424846200, 0, 0, 4, 2),
(20, 1, 7, 246.8059, 263.7477, 0.1694, 0.0000, 1437803640, 1424846200, 0, 0, 4, 3),
(21, 1, 7, 82.9542, 87.9159, 0.0496, 0.0000, 1440482040, 1426054398, 0, 0, 5, 0),
(22, 1, 7, 82.9542, 87.9159, 0.0496, 0.0000, 1440482040, 1426054398, 0, 0, 5, 1),
(23, 1, 7, 414.7711, 439.5794, 0.2481, 0.0000, 1440482040, 1426054398, 0, 0, 5, 2),
(24, 1, 7, 248.8627, 263.7477, 0.1488, 0.0000, 1440482040, 1426054398, 0, 0, 5, 3),
(25, 9, 21, 983.4716, 1025.1383, 0.4167, 0.0000, 1428997980, 1426324903, 0, 0, 0, 0),
(26, 9, 21, 991.6672, 1025.1383, 0.3347, 0.0000, 1431589980, 1426324903, 0, 0, 1, 0),
(27, 9, 21, 590.0830, 615.0830, 0.2500, 0.0000, 1428997980, 1426324903, 0, 0, 0, 1),
(28, 9, 21, 595.0003, 615.0830, 0.2008, 0.0000, 1431589980, 1426324903, 0, 0, 1, 1),
(29, 9, 21, 393.3887, 410.0553, 0.1667, 0.0000, 1428997980, 1426324903, 0, 0, 0, 2),
(30, 9, 21, 396.6669, 410.0553, 0.1339, 0.0000, 1431589980, 1426324903, 0, 0, 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_load_transfer`
--

CREATE TABLE IF NOT EXISTS `ac_loan_load_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL COMMENT '所投的标',
  `load_id` int(11) NOT NULL COMMENT '债权ID',
  `user_id` int(11) NOT NULL COMMENT '债权人ID',
  `transfer_amount` decimal(20,4) NOT NULL COMMENT '转让价格',
  `load_money` decimal(20,4) NOT NULL COMMENT '投标金额',
  `last_repay_time` int(11) NOT NULL COMMENT '最后还款日期',
  `near_repay_time` int(11) NOT NULL COMMENT '下次还款日',
  `transfer_number` int(11) NOT NULL COMMENT '转让期数',
  `t_user_id` int(11) NOT NULL COMMENT '承接人',
  `transfer_time` int(11) NOT NULL COMMENT '承接时间',
  `create_time` int(11) NOT NULL COMMENT '发布时间',
  `status` tinyint(1) NOT NULL COMMENT '转让状态，0取消 1开始',
  `callback_count` int(11) NOT NULL COMMENT '撤回次数',
  PRIMARY KEY (`id`),
  KEY `idx_0` (`loan_id`,`user_id`) USING BTREE,
  KEY `idx_1` (`loan_id`,`user_id`,`status`),
  KEY `idx_2` (`id`,`transfer_amount`,`create_time`),
  KEY `idx_3` (`loan_id`,`status`,`t_user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='债权转让' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ac_loan_load_transfer`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_log`
--

CREATE TABLE IF NOT EXISTS `ac_loan_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `l_id` int(11) unsigned NOT NULL COMMENT '标ID',
  `uid` int(11) unsigned NOT NULL COMMENT '执行者ID',
  `time` int(11) unsigned NOT NULL COMMENT '时间',
  `actionname` varchar(150) NOT NULL COMMENT '事件',
  `ip` varchar(20) NOT NULL,
  `page` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `l_id` (`l_id`,`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `ac_loan_log`
--

INSERT INTO `ac_loan_log` (`id`, `l_id`, `uid`, `time`, `actionname`, `ip`, `page`) VALUES
(1, 1, 3, 1424841239, '创建标', '127.0.0.1', 'Loan/Loanlistadmin/add_two'),
(2, 1, 3, 1424841790, '通过初次审核', '127.0.0.1', 'Loan/Fristadmin/fristaudit'),
(3, 1, 7, 1424842048, '用户ac371进行投标致使招标金额过半', '127.0.0.1', 'Loan/Index/bid'),
(4, 1, 7, 1424842174, '用户ac371进行投标致使满标', '127.0.0.1', 'Loan/Index/bid'),
(5, 1, 3, 1424843691, '通过满标复审审核并放款', '127.0.0.1', 'Loan/Fulladmin/fullaudit'),
(6, 1, 3, 1424844737, '标:1,期:1,偿还本息879.16', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(7, 1, 3, 1424844737, '用户支付:1期还款本息:879.16管理费:200逾期费用0', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(8, 1, 3, 1424844943, '标:1,期:2,偿还本息879.16', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(9, 1, 3, 1424844943, '用户支付:2期还款本息:879.16管理费:200逾期费用0', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(10, 1, 3, 1424844943, '标:1,期:3,偿还本息879.16', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(11, 1, 3, 1424844943, '用户支付:3期还款本息:879.16管理费:200逾期费用0', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(12, 1, 3, 1424846017, '标:1,期:4,偿还本息879.16', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(13, 1, 3, 1424846017, '用户支付:4期还款本息:879.16管理费:200逾期费用0', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(14, 1, 3, 1424846200, '标:1,期:5,偿还本息879.16', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(15, 1, 3, 1424846200, '用户支付:5期还款本息:879.16管理费:200逾期费用0', '127.0.0.1', 'User/Deal/repay_borrow_money'),
(16, 1, 3, 1426054398, '标:1,期:6,偿还本息879.16', '218.29.89.218', 'User/Deal/repay_borrow_money'),
(17, 1, 3, 1426054398, '用户支付:6期还款本息:879.16管理费:200逾期费用0', '218.29.89.218', 'User/Deal/repay_borrow_money'),
(18, 2, 0, 1426296381, '创建标', '218.29.89.218', 'Loan/Loanlistadmin/add_two'),
(19, 3, 0, 1426296527, '创建标', '218.29.89.218', 'Loan/Loanlistadmin/add_two'),
(20, 4, 0, 1426297751, '创建标', '218.29.89.218', 'Loan/Loanlistadmin/add_two'),
(21, 5, 0, 1426297946, '创建标', '218.29.89.218', 'Loan/Loanlistadmin/add_two'),
(22, 6, 13, 1426299033, '创建标', '218.29.89.218', 'Loan/Loanlistadmin/add_two'),
(23, 7, 13, 1426299149, '创建标', '218.29.89.218', 'Loan/Loanlistadmin/add_two'),
(24, 8, 13, 1426299214, '创建标', '218.29.89.218', 'Loan/Loanlistadmin/add_two'),
(25, 2, 13, 1426302053, '通过初次审核', '218.29.89.218', 'Loan/Fristadmin/fristaudit'),
(26, 4, 13, 1426302075, '通过初次审核', '218.29.89.218', 'Loan/Fristadmin/fristaudit'),
(27, 6, 13, 1426302085, '通过初次审核', '218.29.89.218', 'Loan/Fristadmin/fristaudit'),
(28, 3, 13, 1426302136, '通过初次审核', '218.29.89.218', 'Loan/Fristadmin/fristaudit'),
(29, 5, 13, 1426302148, '通过初次审核', '218.29.89.218', 'Loan/Fristadmin/fristaudit'),
(30, 7, 13, 1426302196, '通过初次审核', '218.29.89.218', 'Loan/Fristadmin/fristaudit'),
(31, 8, 13, 1426302217, '通过初次审核', '218.29.89.218', 'Loan/Fristadmin/fristaudit'),
(32, 2, 17, 1426314543, '用户投标,金额:1000', '218.29.89.218', 'Loan/Index/bid'),
(33, 9, 3, 1426318937, '创建标', '218.29.89.218', 'Loan/Loanlistadmin/add_two'),
(34, 9, 3, 1426319159, '通过初次审核', '218.29.89.218', 'Loan/Fristadmin/fristaudit'),
(35, 9, 21, 1426319531, '用户投标,金额:5000', '218.29.89.218', 'Loan/Index/bid'),
(36, 9, 21, 1426319544, '用户acac进行投标致使招标金额过半', '218.29.89.218', 'Loan/Index/bid'),
(37, 9, 21, 1426319544, '用户投标,金额:3000', '218.29.89.218', 'Loan/Index/bid'),
(38, 9, 21, 1426319574, '用户acac进行投标致使满标', '218.29.89.218', 'Loan/Index/bid'),
(39, 9, 21, 1426319574, '用户投标,金额:2000', '218.29.89.218', 'Loan/Index/bid'),
(40, 9, 21, 1426319648, '通过满标复审审核并放款', '218.29.89.218', 'Loan/Fulladmin/fullaudit'),
(41, 8, 21, 1426322761, '用户投标,金额:3000', '218.29.89.218', 'Loan/Index/bid'),
(42, 9, 3, 1426324903, '标:9,期:1,偿还本息2050.28', '218.29.89.218', 'User/Deal/repay_borrow_money'),
(43, 9, 3, 1426324903, '用户支付:1期还款本息:2050.28管理费:200逾期费用0', '218.29.89.218', 'User/Deal/repay_borrow_money'),
(44, 9, 3, 1426324903, '标:9,期:2,偿还本息2050.28', '218.29.89.218', 'User/Deal/repay_borrow_money'),
(45, 9, 3, 1426324903, '用户支付:2期还款本息:2050.28管理费:200逾期费用0', '218.29.89.218', 'User/Deal/repay_borrow_money'),
(46, 10, 3, 1428928133, '创建标', '101.36.78.9', 'Loan/Loanlistadmin/add_two'),
(47, 10, 3, 1428928223, '通过初次审核', '101.36.78.9', 'Loan/Fristadmin/fristaudit'),
(48, 11, 48, 1428931141, '创建标', '101.36.78.9', 'Loan/Borrow/apply'),
(49, 12, 0, 1428931836, '创建标', '115.60.194.219', 'Loan/Loanlistadmin/add_two'),
(50, 11, 0, 1428974579, '通过初次审核', '218.29.89.218', 'Loan/Fristadmin/fristaudit'),
(51, 13, 54, 1429096257, '创建标', '171.8.229.198', 'Loan/Borrow/apply'),
(52, 14, 54, 1429096538, '创建标', '171.8.229.198', 'Loan/Borrow/apply'),
(53, 15, 55, 1429096842, '创建标', '171.8.229.198', 'Loan/Borrow/apply'),
(54, 16, 56, 1429100479, '创建标', '111.161.17.10', 'Loan/Borrow/apply'),
(55, 16, 56, 1429100565, '通过初次审核', '111.161.17.10', 'Loan/Fristadmin/fristaudit'),
(56, 17, 56, 1429100639, '创建标', '111.161.17.10', 'Loan/Borrow/apply'),
(57, 17, 56, 1429100666, '通过初次审核', '111.161.17.10', 'Loan/Fristadmin/fristaudit'),
(58, 18, 56, 1429101366, '创建标', '111.161.17.10', 'Loan/Borrow/apply'),
(59, 18, 0, 1429113678, '通过初次审核', '111.161.17.10', 'Loan/Fristadmin/fristaudit'),
(60, 19, 0, 1429113766, '创建标', '111.161.17.10', 'Loan/Loanlistadmin/add_two'),
(61, 20, 51, 1429196247, '创建标', '115.60.198.0', 'Loan/Borrow/apply'),
(62, 21, 54, 1429237760, '创建标', '123.149.223.203', 'Loan/Borrow/apply'),
(63, 21, 54, 1429237800, '通过初次审核', '123.149.223.203', 'Loan/Fristadmin/fristaudit'),
(64, 21, 55, 1429238658, '用户rainbow进行投标致使招标金额过半', '123.149.223.203', 'Loan/Index/bid'),
(65, 21, 55, 1429238658, '用户投标,金额:40000', '123.149.223.203', 'Loan/Index/bid'),
(66, 21, 55, 1429238765, '用户投标,金额:3000', '123.149.223.203', 'Loan/Index/bid'),
(67, 21, 55, 1429238811, '用户rainbow进行投标致使满标', '123.149.223.203', 'Loan/Index/bid'),
(68, 21, 55, 1429238811, '用户投标,金额:2600', '123.149.223.203', 'Loan/Index/bid'),
(69, 21, 0, 1429238977, '通过满标复审审核并放款', '123.149.223.203', 'Loan/Fulladmin/fullaudit');

-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_message`
--

CREATE TABLE IF NOT EXISTS `ac_loan_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '留言标题',
  `content` text NOT NULL COMMENT '留言内容',
  `create_time` int(11) NOT NULL COMMENT '留言时间',
  `update_time` int(11) NOT NULL COMMENT '回复时间',
  `admin_reply` text NOT NULL COMMENT '管理员回复内容',
  `admin_id` int(11) NOT NULL COMMENT '回复管理员ID',
  `rel_table` varchar(255) NOT NULL COMMENT '相关的数据表/模块（如借款留言deal）',
  `rel_id` int(11) NOT NULL COMMENT '相关留言的数据ID',
  `user_id` int(11) NOT NULL COMMENT '留言会员ID',
  `pid` int(11) NOT NULL COMMENT '弃用',
  `is_effect` tinyint(1) NOT NULL COMMENT '有效性标识（自动生效的留言自动为1），审核生效的留言为0',
  PRIMARY KEY (`id`),
  KEY `idx_0` (`user_id`,`is_effect`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ac_loan_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_repay`
--

CREATE TABLE IF NOT EXISTS `ac_loan_repay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL COMMENT '借款ID',
  `user_id` int(11) NOT NULL COMMENT '借款人',
  `repay_money` decimal(20,4) NOT NULL COMMENT '还款金额',
  `manage_money` decimal(20,4) NOT NULL COMMENT '管理费',
  `impose_money` decimal(20,4) NOT NULL COMMENT '罚息',
  `repay_time` int(11) NOT NULL COMMENT '还款时间',
  `true_repay_time` int(11) NOT NULL COMMENT '真实的还款时间',
  `status` tinyint(1) NOT NULL COMMENT '0提前,1准时还款，2逾期还款 3严重逾期  前台在这基础上+1',
  `l_key` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_0` (`user_id`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `ac_loan_repay`
--

INSERT INTO `ac_loan_repay` (`id`, `loan_id`, `user_id`, `repay_money`, `manage_money`, `impose_money`, `repay_time`, `true_repay_time`, `status`, `l_key`) VALUES
(1, 1, 3, 879.1600, 200.0000, 0.0000, 1427262840, 1424844737, 0, 1),
(2, 1, 3, 879.1600, 200.0000, 0.0000, 1429941240, 1424844943, 0, 2),
(3, 1, 3, 879.1600, 200.0000, 0.0000, 1432533240, 1424844943, 0, 3),
(4, 1, 3, 879.1600, 200.0000, 0.0000, 1435211640, 1424846017, 0, 4),
(5, 1, 3, 879.1600, 200.0000, 0.0000, 1437803640, 1424846200, 0, 5),
(6, 1, 3, 879.1600, 200.0000, 0.0000, 1440482040, 1426054398, 0, 6),
(7, 9, 3, 2050.2800, 200.0000, 0.0000, 1428997980, 1426324903, 0, 1),
(8, 9, 3, 2050.2800, 200.0000, 0.0000, 1431589980, 1426324903, 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_repay_type`
--

CREATE TABLE IF NOT EXISTS `ac_loan_repay_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '名称',
  `value` varchar(30) NOT NULL COMMENT '类名',
  PRIMARY KEY (`id`),
  UNIQUE KEY `value` (`value`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ac_loan_repay_type`
--

INSERT INTO `ac_loan_repay_type` (`id`, `name`, `value`) VALUES
(1, '等额本息', 'principalInterestEqual'),
(2, '等额本金', 'averagecCapital'),
(3, '3个月到期本息', 'sanyuedaoqibenxi');

-- --------------------------------------------------------

--
-- 表的结构 `ac_loan_type`
--

CREATE TABLE IF NOT EXISTS `ac_loan_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(25) NOT NULL COMMENT '类型名称',
  `listorder` tinyint(4) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_name` (`t_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `ac_loan_type`
--

INSERT INTO `ac_loan_type` (`id`, `t_name`, `listorder`) VALUES
(1, ' 短期周转', 255),
(2, '购房借款', 255),
(3, '装修借款', 255),
(4, '个人消费', 255),
(5, '婚礼筹备', 255),
(6, '教育培训', 200),
(7, '汽车消费', 13),
(8, '投资创业', 255),
(9, '医疗支出', 255),
(10, '其他借款', 255);

-- --------------------------------------------------------

--
-- 表的结构 `ac_menu`
--

CREATE TABLE IF NOT EXISTS `ac_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL COMMENT '控制器',
  `action` char(20) NOT NULL COMMENT '操作名称',
  `data` char(50) NOT NULL COMMENT '额外参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单类型  1：权限认证+菜单；0：只作为菜单',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态，1显示，0不显示',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `icon` varchar(50) DEFAULT NULL COMMENT '菜单图标',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `parentid` (`parentid`),
  KEY `model` (`model`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=627 ;

--
-- 转存表中的数据 `ac_menu`
--

INSERT INTO `ac_menu` (`id`, `parentid`, `app`, `model`, `action`, `data`, `type`, `status`, `name`, `icon`, `remark`, `listorder`) VALUES
(239, 0, 'Admin', 'Setting', 'default', '', 0, 1, '设置', 'cogs', '', 0),
(51, 0, 'Admin', 'Content', 'default', '', 0, 1, '内容管理', 'th', '', 10),
(245, 51, 'Portal', 'AdminTerm', 'index', '', 0, 1, '分类管理', '', '', 2),
(299, 260, 'Api', 'Oauthadmin', 'setting', '', 1, 1, '第三方登陆', 'leaf', '', 4),
(252, 239, 'Admin', 'Setting', 'userdefault', '', 0, 1, '个人信息', '', '', 0),
(253, 252, 'Admin', 'User', 'userinfo', '', 1, 1, '修改信息', '', '', 0),
(254, 252, 'Admin', 'Setting', 'password', '', 1, 1, '修改密码', '', '', 0),
(260, 0, 'Admin', 'Extension', 'default', '', 0, 1, '扩展工具', 'cloud', '', 30),
(262, 260, 'Admin', 'Slide', 'default', '', 1, 1, '幻灯片', '', '', 1),
(264, 262, 'Admin', 'Slide', 'index', '', 1, 1, '幻灯片管理', '', '', 0),
(265, 260, 'Admin', 'Ad', 'index', '', 1, 1, '网站广告', '', '', 2),
(268, 262, 'Admin', 'Slidecat', 'index', '', 1, 1, '幻灯片分类', '', '', 0),
(270, 260, 'Admin', 'Link', 'index', '', 0, 1, '友情链接', '', '', 3),
(277, 51, 'Portal', 'AdminPage', 'index', '', 1, 1, '页面管理', '', '', 3),
(301, 300, 'Portal', 'AdminPage', 'recyclebin', '', 1, 1, '页面回收', '', '', 1),
(302, 300, 'Portal', 'AdminPost', 'recyclebin', '', 1, 1, '文章回收', '', '', 0),
(300, 51, 'Admin', 'Recycle', 'default', '', 1, 1, '回收站', '', '', 4),
(284, 239, 'Admin', 'Setting', 'site', '', 1, 1, '网站信息', '', '', 0),
(285, 51, 'Portal', 'AdminPost', 'index', '', 1, 1, '文章管理', '', '', 1),
(286, 0, 'User', 'Indexadmin', 'default', '', 1, 1, '用户管理', 'group', '', 0),
(287, 289, 'User', 'Indexadmin', 'index', '', 1, 1, '本站用户', 'leaf', '', 0),
(288, 289, 'User', 'Oauthadmin', 'index', '', 1, 0, '第三方用户', 'leaf', '', 0),
(289, 286, 'User', 'Indexadmin', 'default1', '', 1, 1, '用户组', '', '', 0),
(290, 286, 'User', 'Indexadmin', 'default3', '', 1, 1, '管理组', '', '', 0),
(291, 290, 'Admin', 'Rbac', 'index', '', 1, 1, '角色管理', '', '', 0),
(292, 290, 'Admin', 'User', 'index', '', 1, 1, '管理员', '', '', 0),
(293, 0, 'Admin', 'Menu', 'default', '', 1, 1, '菜单管理', 'list', '', 0),
(294, 293, 'Admin', 'Navcat', 'default1', '', 1, 1, '前台菜单', '', '', 0),
(295, 294, 'Admin', 'Nav', 'index', '', 1, 1, '菜单管理', '', '', 0),
(296, 294, 'Admin', 'Navcat', 'index', '', 1, 1, '菜单分类', '', '', 0),
(297, 293, 'Admin', 'Menu', 'index', '', 1, 1, '后台菜单', '', '', 0),
(298, 239, 'Admin', 'Setting', 'clearcache', '', 1, 1, '清除缓存', '', '', 1),
(319, 260, 'Admin', 'Backup', 'default', '', 1, 1, '备份管理', '', '', 0),
(480, 292, 'Admin', 'User', 'delete', '', 1, 0, '删除管理员', '', '', 1000),
(479, 292, 'Admin', 'User', 'edit', '', 1, 0, '管理员编辑', '', '', 1000),
(478, 292, 'Admin', 'User', 'add', '', 1, 0, '管理员添加', '', '', 1000),
(477, 245, 'Portal', 'AdminTerm', 'delete', '', 1, 0, '删除分类', '', '', 1000),
(476, 245, 'Portal', 'AdminTerm', 'edit', '', 1, 0, '编辑分类', '', '', 1000),
(475, 245, 'Portal', 'AdminTerm', 'add', '', 1, 0, '添加分类', '', '', 1000),
(474, 268, 'Admin', 'Slidecat', 'delete', '', 1, 0, '删除分类', '', '', 1000),
(473, 268, 'Admin', 'Slidecat', 'edit', '', 1, 0, '编辑分类', '', '', 1000),
(472, 268, 'Admin', 'Slidecat', 'add', '', 1, 0, '添加分类', '', '', 1000),
(471, 264, 'Admin', 'Slide', 'delete', '', 1, 0, '删除幻灯片', '', '', 1000),
(470, 264, 'Admin', 'Slide', 'edit', '', 1, 0, '编辑幻灯片', '', '', 1000),
(469, 264, 'Admin', 'Slide', 'add', '', 1, 0, '添加幻灯片', '', '', 1000),
(467, 291, 'Admin', 'Rbac', 'member', '', 1, 0, '成员管理', '', '', 1000),
(465, 291, 'Admin', 'Rbac', 'authorize', '', 1, 0, '权限设置', '', '', 1000),
(464, 291, 'Admin', 'Rbac', 'roleedit', '', 1, 0, '编辑角色', '', '', 1000),
(463, 291, 'Admin', 'Rbac', 'roledelete', '', 1, 1, '删除角色', '', '', 1000),
(462, 291, 'Admin', 'Rbac', 'roleadd', '', 1, 1, '添加角色', '', '', 1000),
(458, 302, 'Portal', 'AdminPost', 'restore', '', 1, 0, '文章还原', '', '', 1000),
(457, 302, 'Portal', 'AdminPost', 'clean', '', 1, 0, '彻底删除', '', '', 1000),
(456, 285, 'Portal', 'AdminPost', 'move', '', 1, 0, '批量移动', '', '', 1000),
(455, 285, 'Portal', 'AdminPost', 'check', '', 1, 0, '文章审核', '', '', 1000),
(454, 285, 'Portal', 'AdminPost', 'delete', '', 1, 0, '删除文章', '', '', 1000),
(452, 285, 'Portal', 'AdminPost', 'edit', '', 1, 0, '编辑文章', '', '', 1000),
(451, 285, 'Portal', 'AdminPost', 'add', '', 1, 0, '添加文章', '', '', 1000),
(450, 301, 'Portal', 'AdminPage', 'clean', '', 1, 0, '彻底删除', '', '', 1000),
(449, 301, 'Portal', 'AdminPage', 'restore', '', 1, 0, '页面还原', '', '', 1000),
(448, 277, 'Portal', 'AdminPage', 'delete', '', 1, 0, '删除页面', '', '', 1000),
(446, 277, 'Portal', 'AdminPage', 'edit', '', 1, 0, '编辑页面', '', '', 1000),
(445, 277, 'Portal', 'AdminPage', 'add', '', 1, 0, '添加页面', '', '', 1000),
(444, 296, 'Admin', 'Navcat', 'delete', '', 1, 0, '删除分类', '', '', 1000),
(443, 296, 'Admin', 'Navcat', 'edit', '', 1, 0, '编辑分类', '', '', 1000),
(442, 296, 'Admin', 'Navcat', 'add', '', 1, 0, '添加分类', '', '', 1000),
(441, 295, 'Admin', 'Nav', 'delete', '', 1, 0, '删除菜单', '', '', 1000),
(440, 295, 'Admin', 'Nav', 'edit', '', 1, 0, '编辑菜单', '', '', 1000),
(439, 295, 'Admin', 'Nav', 'add', '', 1, 0, '添加菜单', '', '', 1000),
(436, 297, 'Admin', 'Menu', 'export_menu', '', 1, 0, '菜单备份', '', '', 1000),
(434, 297, 'Admin', 'Menu', 'edit', '', 1, 0, '编辑菜单', '', '', 1000),
(433, 297, 'Admin', 'Menu', 'delete', '', 1, 0, '删除菜单', '', '', 1000),
(432, 297, 'Admin', 'Menu', 'lists', '', 1, 0, '所有菜单', '', '', 1000),
(430, 270, 'Admin', 'Link', 'delete', '', 1, 0, '删除友情链接', '', '', 1000),
(429, 270, 'Admin', 'Link', 'edit', '', 1, 0, '编辑友情链接', '', '', 1000),
(428, 270, 'Admin', 'Link', 'add', '', 1, 0, '添加友情链接', '', '', 1000),
(424, 319, 'Admin', 'Backup', 'download', '', 1, 0, '下载备份', '', '', 1000),
(423, 319, 'Admin', 'Backup', 'del_backup', '', 1, 0, '删除备份', '', '', 1000),
(422, 319, 'Admin', 'Backup', 'import', '', 1, 0, '数据备份导入', '', '', 1000),
(421, 319, 'Admin', 'Backup', 'restore', '', 1, 1, '数据还原', '', '', 0),
(420, 265, 'Admin', 'Ad', 'delete', '', 1, 0, '删除广告', '', '', 1000),
(419, 265, 'Admin', 'Ad', 'edit', '', 1, 0, '编辑广告', '', '', 1000),
(418, 265, 'Admin', 'Ad', 'add', '', 1, 0, '添加广告', '', '', 1000),
(496, 319, 'Admin', 'Backup', 'index', '', 1, 1, '数据备份', '', '', 0),
(497, 418, 'Admin', 'Ad', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(498, 419, 'Admin', 'Ad', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(499, 428, 'Admin', 'Link', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(500, 429, 'Admin', 'Link', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(501, 536, 'Admin', 'Menu', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(502, 434, 'Admin', 'Menu', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(503, 439, 'Admin', 'Nav', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(504, 440, 'Admin', 'Nav', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(505, 442, 'Admin', 'Navcat', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(506, 443, 'Admin', 'Navcat', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(507, 445, 'Portal', 'AdminPage', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(508, 446, 'Portal', 'AdminPage', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(509, 451, 'Portal', 'AdminPost', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(510, 452, 'Portal', 'AdminPost', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(511, 462, 'Admin', 'Rbac', 'roleadd_post', '', 1, 0, '提交添加', '', '', 0),
(512, 464, 'Admin', 'Rbac', 'roleedit_post', '', 1, 0, '提交编辑', '', '', 0),
(513, 465, 'Admin', 'Rbac', 'authorize_post', '', 1, 0, '提交设置', '', '', 0),
(514, 284, 'Admin', 'Setting', 'site_post', '', 1, 0, '提交修改', '', '', 0),
(515, 254, 'Admin', 'Setting', 'password_post', '', 1, 0, '提交修改', '', '', 0),
(516, 469, 'Admin', 'Slide', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(517, 470, 'Admin', 'Slide', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(518, 472, 'Admin', 'Slidecat', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(519, 473, 'Admin', 'Slidecat', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(520, 475, 'Portal', 'AdminTerm', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(521, 476, 'Portal', 'AdminTerm', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(522, 478, 'Admin', 'User', 'add_post', '', 1, 0, '添加提交', '', '', 0),
(523, 479, 'Admin', 'User', 'edit_post', '', 1, 0, '编辑提交', '', '', 0),
(524, 253, 'Admin', 'User', 'userinfo_post', '', 1, 0, '修改信息提交', '', '', 0),
(525, 299, 'Api', 'Oauthadmin', 'setting_post', '', 1, 0, '提交设置', '', '', 0),
(526, 533, 'Admin', 'Mailer', 'index', '', 1, 1, 'SMTP配置', '', '', 0),
(527, 526, 'Admin', 'Mailer', 'index_post', '', 1, 0, '提交配置', '', '', 0),
(528, 533, 'Admin', 'Mailer', 'active_list', '', 1, 1, '邮件模板', '', '', 0),
(529, 528, 'Admin', 'Mailer', 'active_post', '', 1, 0, '提交模板', '', '', 0),
(533, 239, 'Admin', 'Mailer', 'default', '', 1, 1, '邮箱配置', '', '', 0),
(536, 297, 'Admin', 'Menu', 'add', '', 1, 0, '添加菜单', '', '', 0),
(546, 496, 'Admin', 'Backup', 'index_post', '', 1, 0, '提交数据备份', '', '', 0),
(547, 270, 'Admin', 'Link', 'listorders', '', 1, 0, '友情链接排序', '', '', 0),
(548, 297, 'Admin', 'Menu', 'listorders', '', 1, 0, '后台菜单排序', '', '', 0),
(549, 295, 'Admin', 'Nav', 'listorders', '', 1, 0, '前台导航排序', '', '', 0),
(550, 277, 'Portal', 'AdminPage', 'listorders', '', 1, 0, '页面排序', '', '', 0),
(551, 285, 'Portal', 'AdminPost', 'listorders', '', 1, 0, '文章排序', '', '', 0),
(552, 264, 'Admin', 'Slide', 'listorders', '', 1, 0, '幻灯片排序', '', '', 0),
(553, 245, 'Portal', 'AdminTerm', 'listorders', '', 1, 0, '文章分类排序', '', '', 0),
(554, 51, 'Api', 'Guestbookadmin', 'index', '', 1, 1, '所有留言', '', '', 0),
(555, 554, 'Api', 'Guestbookadmin', 'delete', '', 1, 0, '删除网站留言', '', '', 0),
(557, 51, 'Comment', 'Commentadmin', 'index', '', 1, 1, '评论管理', '', '', 0),
(559, 557, 'Comment', 'Commentadmin', 'delete', '', 1, 0, '删除评论', '', '', 0),
(560, 557, 'Comment', 'Commentadmin', 'check', '', 1, 0, '评论审核', '', '', 0),
(561, 287, 'User', 'Indexadmin', 'ban', '', 1, 0, '拉黑会员', '', '', 0),
(562, 287, 'User', 'Indexadmin', 'cancelban', '', 1, 0, '启用会员', '', '', 0),
(563, 288, 'User', 'Oauthadmin', 'delete', '', 1, 0, '第三方用户解绑', '', '', 0),
(564, 284, 'Admin', 'Route', 'index', '', 1, 0, '路由列表', '', '', 0),
(565, 284, 'Admin', 'Route', 'add', '', 1, 0, '路由添加', '', '', 0),
(566, 565, 'Admin', 'Route', 'add_post', '', 1, 0, '路由添加提交', '', '', 0),
(567, 284, 'Admin', 'Route', 'edit', '', 1, 0, '路由编辑', '', '', 0),
(568, 567, 'Admin', 'Route', 'edit_post', '', 1, 0, '路由编辑提交', '', '', 0),
(569, 284, 'Admin', 'Route', 'delete', '', 1, 0, '路由删除', '', '', 0),
(572, 284, 'Admin', 'Route', 'ban', '', 1, 0, '路由禁止', '', '', 0),
(573, 284, 'Admin', 'Route', 'open', '', 1, 0, '路由启用', '', '', 0),
(574, 284, 'Admin', 'Route', 'listorders', '', 1, 0, '路由排序', '', '', 0),
(575, 239, 'Admin', 'Param', 'index', '', 1, 1, '系统参数', '', '', 0),
(579, 289, 'Admin', 'User', 'adduser', '', 1, 1, '添加用户', '', '', 0),
(580, 239, 'Admin', 'Sms', 'default', '', 1, 1, '短信配置', '', '', 0),
(581, 580, 'Admin', 'Sms', 'index', '', 1, 1, '帐号配置', '', '', 0),
(582, 580, 'Admin', 'Sms', 'active_list', '', 1, 1, '短信模版', '', '', 0),
(583, 239, 'Admin', 'Remind', 'index', '', 1, 1, '提醒设置', '', '', 0),
(584, 239, 'Admin', 'Pay', 'default', '', 1, 1, '支付设置', '', '', 0),
(585, 584, 'Admin', 'Pay', 'linebank', '', 1, 1, '线下银行', '', '', 0),
(586, 584, 'Admin', 'Pay', 'online', '', 1, 1, '网上银行', '', '', 0),
(587, 0, 'Admin', 'Loan', 'default', '', 1, 1, '借款管理', 'list-alt', '', 0),
(588, 0, 'User', 'account', 'default', '', 1, 1, '资金管理', 'money', '', 0),
(589, 0, 'User', 'Auditadmin', 'default', '', 1, 1, '认证管理', 'user-md', '', 0),
(590, 0, 'Admin', 'Reviewadmin', 'default', '', 1, 1, '资料审核', 'slideshare', '', 0),
(591, 239, 'Admin', 'message', 'default', '', 1, 1, '站内信设置', '', '', 0),
(592, 591, 'Admin', 'message', 'index', '', 1, 1, '帐号配置', '', '', 0),
(593, 591, 'Admin', 'message', 'active_list', '', 1, 1, '消息模版', '', '', 0),
(594, 239, 'Admin', 'integral', 'index', '', 1, 1, '积分设置', '', '', 0),
(595, 589, 'user', 'Auditadmin', 'index', '', 1, 1, '认证列表', '', '', 0),
(596, 589, 'User', 'Auditadmin', 'autonym', '', 1, 1, '实名认证', '', '', 0),
(597, 589, 'User', 'Auditadmin', 'video', '', 1, 1, '视频认证', '', '', 0),
(598, 589, 'User', 'Auditadmin', 'scene', '', 1, 1, '现场认证', '', '', 0),
(599, 589, 'User', 'Auditadmin', 'phone', '', 1, 1, '手机认证', '', '', 0),
(600, 239, 'User', 'Reviewtypeadmin', 'setting', '', 1, 1, '资料设置', '', '', 0),
(601, 239, 'Admin', 'Level', 'index', '', 1, 1, '等级设置', '', '', 0),
(603, 590, 'User', 'Reviewadmin', 'index', 'mid=6', 1, 1, '房产资料', NULL, '', 0),
(604, 590, 'User', 'Reviewadmin', 'index', 'mid=7', 1, 1, '车辆信息', NULL, '', 0),
(605, 608, 'Loan', 'Indexadmin', 'index', '', 1, 1, '贷款类型', '', '', 0),
(606, 608, 'Loan', 'Typeadmin', 'index', '', 1, 1, '贷款分类', '', '', 0),
(607, 608, 'Loan', 'Agencyadmin', 'index', '', 1, 1, '机构管理', '', '', 0),
(608, 239, 'Admin', 'Loan', 'index', '', 1, 1, '借款设置', '', '', 0),
(609, 587, 'Loan', 'Loanlistadmin', 'index', '', 1, 1, '借款列表', '', '', 0),
(610, 590, 'User', 'Reviewadmin', 'index', 'mid=9', 1, 1, '测试类型', NULL, '', 0),
(611, 587, 'Loan', 'Fristadmin', 'index', 'deal_status=0', 1, 1, '初审借款', '', '', 0),
(612, 587, 'Loan', 'Fulladmin', 'index', 'deal_status=5', 1, 1, '满标借款', '', '', 0),
(613, 587, 'Loan', 'Transferadmin', 'index', 'deal_status=1', 1, 1, '股权转让', '', '', 0),
(615, 588, 'User', 'Account', 'index', '', 1, 1, '资金账号管理', '', '', 0),
(616, 588, 'User', 'Account', 'account_log', '', 1, 1, '资金记录', '', '', 0),
(617, 588, 'User', 'Account', 'account_bank', '', 1, 1, '账号管理', '', '', 0),
(618, 588, 'User', 'Account', 'account_recharge', '', 1, 1, '充值管理', '', '', 0),
(619, 588, 'User', 'Account', 'account_cash', '', 1, 1, '提现管理', '', '', 0),
(620, 588, 'User', 'Account', 'account_recharge_new', '', 1, 1, '添加充值', '', '', 0),
(621, 587, 'Loan', 'Repayadmin', 'index', 'status=1', 1, 1, '还款管理', '', '', 0),
(622, 587, 'Loan', 'Fristadmin', 'applylist', '', 1, 1, '申请列表', '', '', 0),
(623, 260, 'Admin', 'Log', 'default1', '', 1, 1, '日志', '', '', 0),
(624, 623, 'Admin', 'Log', 'userlog', '', 1, 1, '会员日志', '', '', 0),
(625, 623, 'Admin', 'Log', 'adminlog', '', 1, 1, '管理员日志', '', '', 0),
(626, 623, 'Admin', 'Log', 'moneylog', '', 1, 1, '钱操作日志', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ac_message`
--

CREATE TABLE IF NOT EXISTS `ac_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mes_title` varchar(250) NOT NULL,
  `mes_from` int(11) unsigned NOT NULL,
  `mes_to` int(11) unsigned NOT NULL,
  `mes_content` varchar(500) NOT NULL,
  `post_time` int(11) unsigned NOT NULL,
  `target_id` int(11) unsigned NOT NULL,
  `mes_type` tinyint(1) unsigned NOT NULL COMMENT '1(话题评论),2(话题回复),3(话题收藏),4(喜欢),10系统消息,11站内信',
  `mes_status` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '0删除1一读2未读',
  PRIMARY KEY (`id`),
  KEY `mes_from` (`mes_from`,`mes_to`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=331 ;

--
-- 转存表中的数据 `ac_message`
--

INSERT INTO `ac_message` (`id`, `mes_title`, `mes_from`, `mes_to`, `mes_content`, `post_time`, `target_id`, `mes_type`, `mes_status`) VALUES
(51, '贷款初审', 1, 3, '您好test您的款测试的贷款通过初次审核\n2015-01-24 15:31:02查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=7', 1422084663, 0, 10, 2),
(52, '满标待审核放款', 1, 3, '', 1422085241, 0, 10, 2),
(53, '贷款初审', 1, 3, '您好test您的请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;2015-01-24 15:59:38代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;的贷款通过初次审核\n2015-01-24 15:59:38查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1422086380, 0, 10, 2),
(54, '满标待审核放款', 1, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;2015-01-24 16:00:15代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;代替"贷款名称";2015-01-24 16:00:15代替"满标时间";http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替"贷款展示网址";', 1422086415, 0, 10, 2),
(55, '贷款初审', 1, 3, '您好test您的测试信息11的贷款通过初次审核\n2015-01-24 16:30:15查看http://127.0.0.1/ptop/index.php?g=Loan&m=index&a=deal&id=9', 1422088216, 0, 10, 2),
(56, '满标复审审核状态更改', 1, 3, '"test"="用户","款测试"="标名称","通过满标复审审核并放款"="状态","2015-01-26 15:50:24"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=7"="网址111"', 1422258626, 0, 10, 2),
(57, '满标复审审核状态更改', 1, 3, '"test"="用户","请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;2015-01-26 16:31:42代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;"="标名称","通过满标复审审核并放款"="状态","2015-01-26 16:31:42"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8"="网址111"', 1422261104, 0, 10, 2),
(58, '贷款初审', 1, 3, '您好test您的测试满标审核的的贷款通过初次审核\n2015-01-26 16:49:24查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=11', 1422262170, 0, 10, 2),
(59, '满标待审核放款', 1, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";测试满标审核的代替"贷款名称";2015-01-26 16:58:50代替"满标时间";http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=11代替"贷款展示网址";', 1422262730, 0, 10, 2),
(60, '满标复审审核状态更改', 1, 3, '"test"="用户","测试满标审核的"="标名称","通过满标复审审核并放款"="状态","2015-01-26 17:04:14"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=11"="网址111"', 1422263056, 0, 10, 2),
(61, '贷款初审', 1, 3, '您好test您的测试满标审核的的贷款通过初次审核\n2015-01-26 17:17:17查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12', 1422263840, 0, 10, 2),
(62, '满标待审核放款', 1, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";测试满标审核的代替"贷款名称";2015-01-26 17:19:57代替"满标时间";http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12代替"贷款展示网址";', 1422263997, 0, 10, 2),
(63, '满标复审审核状态更改', 1, 3, '"test"="用户","测试满标审核的"="标名称","通过满标复审审核并放款"="状态","2015-01-26 17:40:13"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12"="网址111"', 1422265217, 0, 10, 2),
(64, '贷款初审', 1, 3, '您好test您的测试回款的贷款通过初次审核\n2015-01-26 17:48:20查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=13', 1422265700, 0, 10, 2),
(65, '满标待审核放款', 1, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";测试回款代替"贷款名称";2015-01-26 17:58:05代替"满标时间";http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=13代替"贷款展示网址";', 1422266285, 0, 10, 1),
(66, '满标复审审核状态更改', 1, 3, '"test"="用户","测试回款"="标名称","没有通过满标复审审核"="状态","2015-01-26 18:00:05"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=13"="网址111"', 1422266407, 0, 10, 1),
(69, '贷款初审', 1, 3, '您好test您的又见信用标的贷款通过初次审核\n2015-01-29 14:50:42查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=14', 1422514249, 0, 10, 1),
(70, '满标待审核放款', 1, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";又见信用标代替"贷款名称";2015-01-29 15:06:20代替"满标时间";http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=14代替"贷款展示网址";', 1422515181, 0, 10, 1),
(71, '满标复审审核状态更改', 1, 3, '"test"="用户","又见信用标"="标名称","通过满标复审审核并放款"="状态","2015-01-29 15:09:07"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=14"="网址111"', 1422515350, 0, 10, 1),
(72, '', 3, 7, '测试信息可以删除', 1422524224, 0, 11, 2),
(73, '', 3, 7, '给你发送信息。你能看到吗', 1422525195, 0, 11, 2),
(74, '', 7, 3, '收到了。………………', 1422525285, 0, 11, 2),
(75, '', 7, 3, '嗨。你好呀', 1422525919, 0, 11, 2),
(76, '', 7, 3, '不是吧，哪里算错了吗', 1422525952, 0, 11, 2),
(77, '', 7, 3, '在发一条信息', 1422526597, 0, 11, 2),
(78, '', 7, 6, '测试信息，你能收到吗', 1422528682, 0, 11, 2),
(79, '', 7, 4, '这个是测试的 ', 1422528711, 0, 11, 2),
(80, '', 7, 4, '这个是测试的 ', 1422528714, 0, 11, 2),
(81, '', 7, 6, '收到请回话', 1422528738, 0, 11, 2),
(83, '', 3, 7, 'dffgsdaf', 1422529050, 0, 11, 2),
(84, '', 3, 7, 'fdsafdsafsdsaf', 1422529068, 0, 11, 2),
(85, '', 3, 7, 'fdsafdsafsdsaf', 1422529076, 0, 11, 2),
(86, '贷款初审', 1, 7, '您好ac371您的测试3个月到期本息的哦的贷款通过初次审核\n2015-01-30 10:27:44查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=16', 1422584867, 0, 10, 2),
(87, '贷款初审', 1, 3, '您好test您的3割月 的测试的贷款通过初次审核\n2015-01-30 10:29:40查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=17', 1422584982, 0, 10, 2),
(88, '满标待审核放款', 1, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";3割月 的测试代替"贷款名称";2015-01-30 11:00:07代替"满标时间";http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=17代替"贷款展示网址";', 1422586807, 0, 10, 1),
(89, '满标复审审核状态更改', 1, 3, '"test"="用户","3割月 的测试"="标名称","通过满标复审审核并放款"="状态","2015-01-30 11:01:42"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=17"="网址111"', 1422586903, 0, 10, 1),
(90, '债券转让成功', 1, 7, '	请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,2015年02月03日 16:34代替"转让时间";2代替"转让债权ID";/index.php?g=loan&m=index&a=t_details&id=2代替"债权网址";21代替"投标ID";2000.0000代替"转让价格";', 1422952477, 0, 10, 2),
(91, '债券转让成功', 1, 7, '	请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,2015年02月03日 16:42代替"转让时间";1代替"转让债权ID";/index.php?g=loan&m=index&a=t_details&id=1代替"债权网址";24代替"投标ID";500.0000代替"转让价格";', 1422952929, 0, 10, 2),
(92, '站内信', 4, 3, 'ggggggg', 1423030719, 0, 11, 2),
(93, '站内信', 4, 3, 'ggggg', 1423030795, 0, 11, 2),
(94, '站内信', 4, 3, 'ddd ', 1423030988, 0, 11, 2),
(95, '站内信', 4, 3, 'ggggg', 1423030994, 0, 11, 2),
(96, '借款已还款完毕', 1, 3, '"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=17"="网址","3割月 的测试"="标名称","1,139.25元"="金额","2015年02月07日"="日期"', 1423279291, 0, 10, 2),
(97, '借款已还款完毕', 1, 3, '"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=11"="网址","测试满标审核的"="标名称","7,449.00元"="金额","2015年02月07日"="日期"', 1423296035, 0, 10, 2),
(98, '借款人还款', 1, 6, '', 1423296036, 0, 10, 2),
(99, '借款人还款', 1, 6, '', 1423296036, 0, 10, 2),
(100, '借款人还款', 1, 6, '', 1423296036, 0, 10, 2),
(101, '借款人还款', 1, 6, '', 1423296037, 0, 10, 2),
(102, '借款人还款', 1, 6, '', 1423296037, 0, 10, 2),
(103, '借款人还款', 1, 6, '', 1423296037, 0, 10, 2),
(104, '借款人还款', 1, 6, '', 1423296037, 0, 10, 2),
(105, '借款人还款', 1, 6, '', 1423296037, 0, 10, 2),
(106, '借款人还款', 1, 6, '', 1423296037, 0, 10, 2),
(107, '借款人还款', 1, 6, '', 1423296038, 0, 10, 2),
(108, '借款人还款', 1, 6, '', 1423296038, 0, 10, 2),
(109, '借款人还款', 1, 6, '', 1423296038, 0, 10, 2),
(110, '借款人还款', 1, 6, '', 1423296038, 0, 10, 2),
(111, '借款人还款', 1, 6, '', 1423296039, 0, 10, 2),
(112, '借款人还款', 1, 6, '', 1423296039, 0, 10, 2),
(113, '借款人还款', 1, 6, '', 1423296039, 0, 10, 2),
(114, '借款人还款', 1, 6, '', 1423296039, 0, 10, 2),
(115, '借款人还款', 1, 6, '', 1423296040, 0, 10, 2),
(116, '借款人还款', 1, 6, '', 1423296040, 0, 10, 2),
(117, '借款人还款完毕', 1, 6, '', 1423296040, 0, 10, 2),
(118, '借款人还款', 1, 6, '', 1423296040, 0, 10, 2),
(119, '借款人还款', 1, 6, '', 1423296041, 0, 10, 2),
(120, '借款人还款', 1, 6, '', 1423296041, 0, 10, 2),
(121, '借款人还款', 1, 6, '', 1423296041, 0, 10, 2),
(122, '借款人还款', 1, 6, '', 1423296042, 0, 10, 2),
(123, '借款人还款', 1, 6, '', 1423296042, 0, 10, 2),
(124, '借款人还款', 1, 6, '', 1423296042, 0, 10, 2),
(125, '借款人还款', 1, 6, '', 1423296043, 0, 10, 2),
(126, '借款人还款', 1, 6, '', 1423296043, 0, 10, 2),
(127, '借款人还款', 1, 6, '', 1423296043, 0, 10, 2),
(128, '借款人还款', 1, 6, '', 1423296043, 0, 10, 2),
(129, '借款人还款', 1, 6, '', 1423296043, 0, 10, 2),
(130, '借款人还款', 1, 6, '', 1423296044, 0, 10, 2),
(131, '借款人还款', 1, 6, '', 1423296044, 0, 10, 2),
(132, '借款人还款', 1, 6, '', 1423296044, 0, 10, 2),
(133, '借款人还款', 1, 6, '', 1423296044, 0, 10, 2),
(134, '借款人还款', 1, 6, '', 1423296044, 0, 10, 2),
(135, '借款人还款', 1, 6, '', 1423296045, 0, 10, 2),
(136, '借款人还款', 1, 6, '', 1423296045, 0, 10, 2),
(137, '借款人还款完毕', 1, 6, '', 1423296045, 0, 10, 2),
(138, '借款人还款', 1, 6, '', 1423296045, 0, 10, 2),
(139, '借款人还款', 1, 6, '', 1423296047, 0, 10, 2),
(140, '借款人还款', 1, 6, '', 1423296047, 0, 10, 2),
(141, '借款人还款', 1, 6, '', 1423296047, 0, 10, 2),
(142, '借款人还款', 1, 6, '', 1423296047, 0, 10, 2),
(143, '借款人还款', 1, 6, '', 1423296047, 0, 10, 2),
(144, '借款人还款', 1, 6, '', 1423296048, 0, 10, 2),
(145, '借款人还款', 1, 6, '', 1423296048, 0, 10, 2),
(146, '借款人还款', 1, 6, '', 1423296048, 0, 10, 2),
(147, '借款人还款', 1, 6, '', 1423296048, 0, 10, 2),
(148, '借款人还款', 1, 6, '', 1423296048, 0, 10, 2),
(149, '借款人还款', 1, 6, '', 1423296049, 0, 10, 2),
(150, '借款人还款', 1, 6, '', 1423296049, 0, 10, 2),
(151, '借款人还款', 1, 6, '', 1423296049, 0, 10, 2),
(152, '借款人还款', 1, 6, '', 1423296049, 0, 10, 2),
(153, '借款人还款', 1, 6, '', 1423296049, 0, 10, 2),
(154, '借款人还款', 1, 6, '', 1423296049, 0, 10, 2),
(155, '借款人还款', 1, 6, '', 1423296050, 0, 10, 2),
(156, '借款人还款', 1, 6, '', 1423296050, 0, 10, 2),
(157, '借款人还款完毕', 1, 6, '', 1423296050, 0, 10, 2),
(158, '借款人还款', 1, 6, '', 1423296050, 0, 10, 2),
(159, '借款人还款', 1, 6, '', 1423296050, 0, 10, 2),
(160, '借款人还款', 1, 6, '', 1423296051, 0, 10, 2),
(161, '借款人还款', 1, 6, '', 1423296051, 0, 10, 2),
(162, '借款人还款', 1, 6, '', 1423296051, 0, 10, 2),
(163, '借款人还款', 1, 6, '', 1423296051, 0, 10, 2),
(164, '借款人还款', 1, 6, '', 1423296051, 0, 10, 2),
(165, '借款人还款', 1, 6, '', 1423296052, 0, 10, 2),
(166, '借款人还款', 1, 6, '', 1423296052, 0, 10, 2),
(167, '借款人还款', 1, 6, '', 1423296052, 0, 10, 2),
(168, '借款人还款', 1, 6, '', 1423296052, 0, 10, 2),
(169, '借款人还款', 1, 6, '', 1423296052, 0, 10, 2),
(170, '借款人还款', 1, 6, '', 1423296053, 0, 10, 2),
(171, '借款人还款', 1, 6, '', 1423296053, 0, 10, 2),
(172, '借款人还款', 1, 6, '', 1423296053, 0, 10, 2),
(173, '借款人还款', 1, 6, '', 1423296053, 0, 10, 2),
(174, '借款人还款', 1, 6, '', 1423296053, 0, 10, 2),
(175, '借款人还款', 1, 6, '', 1423296054, 0, 10, 2),
(176, '借款人还款', 1, 6, '', 1423296054, 0, 10, 2),
(177, '借款人还款完毕', 1, 6, '', 1423296054, 0, 10, 2),
(178, '借款人还款', 1, 7, '', 1423296054, 0, 10, 2),
(179, '借款人还款', 1, 7, '', 1423296055, 0, 10, 2),
(180, '借款人还款', 1, 7, '', 1423296055, 0, 10, 2),
(181, '借款人还款', 1, 7, '', 1423296055, 0, 10, 2),
(182, '借款人还款', 1, 7, '', 1423296055, 0, 10, 2),
(183, '借款人还款', 1, 7, '', 1423296055, 0, 10, 2),
(184, '借款人还款', 1, 7, '', 1423296056, 0, 10, 2),
(185, '借款人还款', 1, 7, '', 1423296056, 0, 10, 2),
(186, '借款人还款', 1, 7, '', 1423296056, 0, 10, 2),
(187, '借款人还款', 1, 7, '', 1423296056, 0, 10, 2),
(188, '借款人还款', 1, 7, '', 1423296056, 0, 10, 2),
(189, '借款人还款', 1, 7, '', 1423296056, 0, 10, 2),
(190, '借款人还款', 1, 7, '', 1423296057, 0, 10, 2),
(191, '借款人还款', 1, 7, '', 1423296057, 0, 10, 2),
(192, '借款人还款', 1, 7, '', 1423296057, 0, 10, 2),
(193, '借款人还款', 1, 7, '', 1423296057, 0, 10, 2),
(194, '借款人还款', 1, 7, '', 1423296057, 0, 10, 2),
(195, '借款人还款', 1, 7, '', 1423296058, 0, 10, 2),
(196, '借款人还款', 1, 7, '', 1423296058, 0, 10, 2),
(197, '借款人还款完毕', 1, 7, '', 1423296058, 0, 10, 2),
(198, '还款成功', 1, 3, '', 1423373640, 0, 10, 2),
(199, '借款人还款', 1, 7, '', 1423373640, 0, 10, 2),
(200, '借款人还款', 1, 7, '', 1423373640, 0, 10, 2),
(201, '借款人还款', 1, 7, '', 1423373641, 0, 10, 2),
(202, '借款人还款', 1, 7, '', 1423373641, 0, 10, 2),
(203, '借款人还款', 1, 7, '', 1423373641, 0, 10, 2),
(204, '借款人还款', 1, 7, '', 1423373641, 0, 10, 2),
(205, '还款成功', 1, 3, '', 1423373749, 0, 10, 2),
(206, '借款人还款', 1, 7, '', 1423373749, 0, 10, 2),
(207, '借款人还款', 1, 7, '', 1423373749, 0, 10, 2),
(208, '提前还款成功', 1, 3, '您好用户，您的广告歌，提前还款成功，本次还款本息0，管理费2，违约金0，查看网址http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1423385151, 0, 10, 2),
(209, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424835418, 0, 10, 2),
(210, '三天内需还款通知', 1, 3, '您好用户，您的标测试满标审核的，本次还款日期2015-02-26 17:40，需要还款金额￥272.45元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12', 1424835461, 0, 10, 2),
(211, '还款成功', 1, 3, '', 1424841102, 0, 10, 2),
(212, '借款人还款', 1, 6, '', 1424841102, 0, 10, 2),
(213, '借款人还款', 1, 7, '', 1424841103, 0, 10, 2),
(214, '借款人还款', 1, 7, '', 1424841104, 0, 10, 2),
(215, '借款人还款', 1, 6, '', 1424841104, 0, 10, 2),
(216, '借款人还款', 1, 7, '', 1424841104, 0, 10, 2),
(217, '借款人还款', 1, 7, '', 1424841104, 0, 10, 2),
(218, '贷款初审', 1, 3, '您好test您的f''f''f''f 的贷款没有通过初次审核\n2015-02-25 13:13:18查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=10', 1424841199, 0, 10, 2),
(219, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1427260801, 0, 10, 2),
(220, '还款成功', 1, 3, '', 1427260819, 0, 10, 2),
(221, '借款人还款', 1, 6, '', 1427260819, 0, 10, 2),
(222, '借款人还款', 1, 7, '', 1427260819, 0, 10, 2),
(223, '借款人还款', 1, 7, '', 1427260819, 0, 10, 2),
(224, '借款人还款', 1, 6, '', 1427260820, 0, 10, 2),
(225, '借款人还款', 1, 7, '', 1427260820, 0, 10, 2),
(226, '借款人还款', 1, 7, '', 1427260820, 0, 10, 2),
(227, '还款成功', 1, 3, '', 1427260853, 0, 10, 1),
(228, '借款人还款', 1, 7, '', 1427260854, 0, 10, 2),
(229, '借款人还款', 1, 7, '', 1427260854, 0, 10, 2),
(230, '借款人还款', 1, 7, '', 1427260854, 0, 10, 2),
(231, '三天内需还款通知', 1, 3, '您好用户，您的标测试满标审核的，本次还款日期2015-04-26 17:40，需要还款金额￥272.45元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12', 1429941870, 0, 10, 1),
(232, '还款成功', 1, 3, '', 1429941966, 0, 10, 1),
(233, '借款人还款', 1, 7, '', 1429941967, 0, 10, 2),
(234, '借款人还款', 1, 7, '', 1429941967, 0, 10, 2),
(235, '借款人还款', 1, 7, '', 1429941968, 0, 10, 2),
(236, '贷款初审', 1, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-11-12 09:36:52查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=19', 1447292214, 0, 10, 1),
(237, '贷款初审', 1, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-11-12 09:39:26查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=23', 1447292367, 0, 10, 1),
(238, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424750129, 0, 10, 2),
(239, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424750140, 0, 10, 2),
(240, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424750148, 0, 10, 2),
(241, '流标提醒', 1, 3, '"测试信息11"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=9"="网址","2015-02-24 13:57"="流标时间"', 1424757465, 0, 10, 2),
(242, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424757466, 0, 10, 2),
(243, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424757477, 0, 10, 2),
(244, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424757479, 0, 10, 2),
(245, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424757543, 0, 10, 2),
(246, '流标提醒', 1, 3, '"42343"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=2"="网址","2015-02-24 14:05"="流标时间"', 1424757937, 0, 10, 2),
(247, '流标提醒', 1, 3, '"简短名称22"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=4"="网址","2015-02-24 14:05"="流标时间"', 1424757937, 0, 10, 2),
(248, '流标提醒', 1, 3, '"信贷借款测试哦"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=6"="网址","2015-02-24 14:05"="流标时间"', 1424757938, 0, 10, 2),
(249, '流标提醒', 1, 7, '"测试3个月到期本息的哦"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=16"="网址","2015-02-24 14:05"="流标时间"', 1424757938, 0, 10, 2),
(250, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424757938, 0, 10, 2),
(251, '三天内需还款通知', 1, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1424758097, 0, 10, 2),
(252, '贷款初审', 1, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-02-24 15:00:14查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=20', 1424761216, 0, 10, 2),
(253, '贷款初审', 1, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-02-24 15:01:19查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=21', 1424761280, 0, 10, 2),
(254, '贷款初审', 1, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-02-24 15:08:47查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=22', 1424761728, 0, 10, 2),
(255, '流标提醒', 1, 3, '"魂牵梦萦"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=22"="网址","2015-02-24 15:15"="流标时间"', 1424762102, 0, 10, 2),
(256, '提前还款成功', 1, 3, '您好用户，您的贷款测试333，提前还款成功，本次还款本息20558.531746032，管理费500，违约金202.38，查看网址http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=7', 1424769608, 0, 10, 2),
(257, '借款人还款', 1, 7, '', 1424769609, 0, 10, 2),
(258, '借款人还款', 1, 7, '', 1424769609, 0, 10, 2),
(259, '借款人还款', 1, 7, '', 1424769609, 0, 10, 2),
(260, '借款人还款', 1, 7, '', 1424769610, 0, 10, 2),
(261, '借款人还款完毕', 1, 7, '', 1424769610, 0, 10, 2),
(262, '借款人还款', 1, 7, '', 1424769611, 0, 10, 2),
(263, '借款人还款', 1, 7, '', 1424769611, 0, 10, 2),
(264, '借款人还款', 1, 7, '', 1424769611, 0, 10, 2),
(265, '借款人还款', 1, 7, '', 1424769612, 0, 10, 2),
(266, '借款人还款完毕', 1, 7, '', 1424769612, 0, 10, 2),
(267, '贷款初审', 1, 3, '您好test您的提前还款标测试的贷款通过初次审核\n2015-02-25 13:23:10查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1', 1424841793, 0, 10, 2),
(268, '满标待审核放款', 1, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";提前还款标测试代替"贷款名称";2015-02-25 13:29:34代替"满标时间";http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1代替"贷款展示网址";', 1424842174, 0, 10, 2),
(269, '满标复审审核状态更改', 1, 3, '"test"="用户","提前还款标测试"="标名称","通过满标复审审核并放款"="状态","2015-02-25 13:54:51"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1"="网址111"', 1424843693, 0, 10, 2),
(270, '还款成功', 1, 3, '', 1424844740, 0, 10, 1),
(271, '借款人还款', 1, 7, '', 1424844741, 0, 10, 2),
(272, '借款人还款', 1, 7, '', 1424844741, 0, 10, 2),
(273, '借款人还款', 1, 7, '', 1424844741, 0, 10, 2),
(274, '借款人还款', 1, 7, '', 1424844742, 0, 10, 2),
(275, '还款成功', 1, 3, '', 1424844944, 0, 10, 2),
(276, '借款人还款', 1, 7, '', 1424844944, 0, 10, 2),
(277, '借款人还款', 1, 7, '', 1424844944, 0, 10, 2),
(278, '借款人还款', 1, 7, '', 1424844944, 0, 10, 2),
(279, '借款人还款', 1, 7, '', 1424844945, 0, 10, 2),
(280, '借款人还款', 1, 7, '', 1424844945, 0, 10, 2),
(281, '借款人还款', 1, 7, '', 1424844945, 0, 10, 2),
(282, '借款人还款', 1, 7, '', 1424844945, 0, 10, 2),
(283, '借款人还款', 1, 7, '', 1424844946, 0, 10, 2),
(284, '还款成功', 1, 3, '', 1424846020, 0, 10, 2),
(285, '借款人还款', 1, 7, '', 1424846020, 0, 10, 2),
(286, '借款人还款', 1, 7, '', 1424846021, 0, 10, 2),
(287, '借款人还款', 1, 7, '', 1424846021, 0, 10, 2),
(288, '借款人还款', 1, 7, '', 1424846021, 0, 10, 2),
(289, '还款成功', 1, 3, '', 1424846201, 0, 10, 1),
(290, '借款人还款', 1, 7, '', 1424846201, 0, 10, 2),
(291, '借款人还款', 1, 7, '', 1424846201, 0, 10, 2),
(292, '借款人还款', 1, 7, '', 1424846202, 0, 10, 2),
(293, '借款人还款', 1, 7, '', 1424846202, 0, 10, 2),
(294, '还款成功', 1, 3, '', 1426054399, 0, 10, 2),
(295, '借款人还款', 1, 7, '', 1426054400, 0, 10, 2),
(296, '借款人还款', 1, 7, '', 1426054400, 0, 10, 2),
(297, '借款人还款', 1, 7, '', 1426054400, 0, 10, 2),
(298, '借款人还款', 1, 7, '', 1426054400, 0, 10, 2),
(299, '贷款初审', 1, 3, '您好test您的周转的贷款通过初次审核\n2015-03-14 11:00:53查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=2', 1426302056, 0, 10, 2),
(300, '贷款初审', 1, 13, '您好wuhaofz502您的3月到期的贷款通过初次审核\n2015-03-14 11:01:15查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=4', 1426302078, 0, 10, 2),
(301, '贷款初审', 1, 10, '您好hjh1您的3月到期的贷款通过初次审核\n2015-03-14 11:01:25查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=6', 1426302085, 0, 10, 2),
(302, '贷款初审', 1, 3, '您好test您的3个月到期的贷款通过初次审核\n2015-03-14 11:02:16查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=3', 1426302137, 0, 10, 2),
(303, '贷款初审', 1, 12, '您好test123您的到期还款的贷款通过初次审核\n2015-03-14 11:03:16查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=7', 1426302209, 0, 10, 2),
(304, '贷款初审', 1, 6, '您好rrr您的到期还款的贷款通过初次审核\n2015-03-14 11:03:37查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=8', 1426302219, 0, 10, 2),
(305, '贷款初审', 1, 3, '您好test您的testtest的贷款通过初次审核\n2015-03-14 15:45:59查看http://ptp.ac371.cn/index.php/loan/index/deal/id/9', 1426319161, 0, 10, 2),
(306, '满标待审核放款', 1, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";testtest代替"贷款名称";2015-03-14 15:52:54代替"满标时间";http://ptp.ac371.cn/index.php/loan/index/deal/id/9代替"贷款展示网址";', 1426319574, 0, 10, 2),
(307, '满标复审审核状态更改', 1, 3, '"test"="用户","testtest"="标名称","通过满标复审审核并放款"="状态","2015-03-14 15:54:08"="审核时间","http://ptp.ac371.cn/index.php/loan/index/deal/id/9"="网址111"', 1426319649, 0, 10, 2),
(308, '还款成功', 1, 3, '', 1426324904, 0, 10, 2),
(309, '借款人还款', 1, 21, '', 1426324904, 0, 10, 2),
(310, '借款人还款', 1, 21, '', 1426324904, 0, 10, 2),
(311, '借款人还款', 1, 21, '', 1426324904, 0, 10, 2),
(312, '借款人还款', 1, 21, '', 1426324904, 0, 10, 2),
(313, '借款人还款', 1, 21, '', 1426324904, 0, 10, 2),
(314, '借款人还款', 1, 21, '', 1426324904, 0, 10, 2),
(315, '流标提醒', 1, 12, '"到期还款"="标名称"],"http://p2p.ac371.com/index.php/loan/index/deal/id/7"="网址","2015-03-19 14:32"="流标时间"', 1426746755, 0, 10, 2),
(316, '流标提醒', 1, 11, '"3月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/5"="网址","2015-03-20 14:39"="流标时间"', 1426833551, 0, 10, 2),
(317, '流标提醒', 1, 3, '"周转"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/2"="网址","2015-03-21 14:47"="流标时间"', 1426920472, 0, 10, 2),
(318, '流标提醒', 1, 13, '"3月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/4"="网址","2015-03-22 13:39"="流标时间"', 1427002760, 0, 10, 2),
(319, '流标提醒', 1, 3, '"3个月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/3"="网址","2015-03-24 14:57"="流标时间"', 1427180265, 0, 10, 2),
(320, '流标提醒', 1, 6, '"到期还款"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/8"="网址","2015-03-24 14:57"="流标时间"', 1427180265, 0, 10, 2),
(321, '流标提醒', 1, 10, '"3月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/6"="网址","2015-03-24 14:57"="流标时间"', 1427180265, 0, 10, 2),
(322, '贷款初审', 1, 3, '您好test您的这是我的借款标题的贷款通过初次审核\n2015-04-13 20:30:23查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/10', 1428928225, 0, 10, 2),
(323, '贷款初审', 1, 48, '您好您的3个月到期本息的贷款通过初次审核\n2015-04-14 09:22:59查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/11', 1428974580, 0, 10, 2),
(324, '流标提醒', 1, 54, '"xdfxdfdxfg"="标名称"],"http://ptop.imqiyu.com/index.php/loan/index/deal/id/14"="网址","2015-04-15 19:28"="流标时间"', 1429097338, 0, 10, 2),
(325, '贷款初审', 1, 56, '您好您的不能审核吗不能审核吗的贷款通过初次审核\n2015-04-15 20:22:45查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/16', 1429100566, 0, 10, 2),
(326, '贷款初审', 1, 56, '您好您的个月到期本个月到期本的贷款通过初次审核\n2015-04-15 20:24:26查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/17', 1429100666, 0, 10, 2),
(327, '贷款初审', 1, 56, '您好您的tttttt的贷款通过初次审核\n2015-04-16 00:01:18查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/18', 1429113679, 0, 10, 2),
(328, '贷款初审', 1, 54, '您好rain您的yyy的贷款通过初次审核\n2015-04-17 10:30:00查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/21', 1429237800, 0, 10, 2),
(329, '满标待审核放款', 1, 54, '请用慧谷创投代替网站名称,http:p2p.ac371.cn替代网站域名,rain代替"贷款用户名";yyy代替"贷款名称";2015-04-17 10:46:51代替"满标时间";http://ptop.imqiyu.com/index.php/loan/index/deal/id/21代替"贷款展示网址";', 1429238811, 0, 10, 2),
(330, '满标复审审核状态更改', 1, 54, '"rain"="用户","yyy"="标名称","通过满标复审审核并放款"="状态","2015-04-17 10:49:37"="审核时间","http://ptop.imqiyu.com/index.php/loan/index/deal/id/21"="网址111"', 1429238978, 0, 10, 2);

-- --------------------------------------------------------

--
-- 表的结构 `ac_message_log`
--

CREATE TABLE IF NOT EXISTS `ac_message_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mes_to` int(11) unsigned NOT NULL COMMENT '发给谁',
  `content` varchar(3000) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `isok` enum('0','1') NOT NULL DEFAULT '1',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mes_from` int(10) unsigned NOT NULL COMMENT '谁发的',
  PRIMARY KEY (`id`),
  KEY `to` (`mes_to`),
  KEY `mes_from` (`mes_from`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=746 ;

--
-- 转存表中的数据 `ac_message_log`
--

INSERT INTO `ac_message_log` (`id`, `mes_to`, `content`, `type`, `isok`, `add_time`, `mes_from`) VALUES
(1, 3, '', 1, '1', '2015-02-07 16:00:05', 1),
(2, 3, '', 2, '0', '2015-02-07 16:00:05', 1),
(3, 3, '"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=11"="网址","测试满标审核的"="标名称","7,449.00元"="金额","2015年02月07日"="日期"', 3, '1', '2015-02-07 16:00:05', 1),
(4, 6, '', 1, '1', '2015-02-07 16:00:05', 1),
(5, 6, '', 2, '0', '2015-02-07 16:00:05', 1),
(6, 6, '', 3, '1', '2015-02-07 16:00:05', 1),
(7, 6, '', 1, '1', '2015-02-07 16:00:06', 1),
(8, 6, '', 2, '0', '2015-02-07 16:00:06', 1),
(9, 6, '', 3, '1', '2015-02-07 16:00:06', 1),
(10, 6, '', 1, '1', '2015-02-07 16:00:06', 1),
(11, 6, '', 2, '0', '2015-02-07 16:00:06', 1),
(12, 6, '', 3, '1', '2015-02-07 16:00:06', 1),
(13, 6, '', 1, '1', '2015-02-07 16:00:06', 1),
(14, 6, '', 2, '0', '2015-02-07 16:00:06', 1),
(15, 6, '', 3, '1', '2015-02-07 16:00:06', 1),
(16, 6, '', 1, '1', '2015-02-07 16:00:06', 1),
(17, 6, '', 2, '0', '2015-02-07 16:00:06', 1),
(18, 6, '', 3, '1', '2015-02-07 16:00:06', 1),
(19, 6, '', 1, '1', '2015-02-07 16:00:06', 1),
(20, 6, '', 2, '0', '2015-02-07 16:00:06', 1),
(21, 6, '', 3, '1', '2015-02-07 16:00:06', 1),
(22, 6, '', 1, '1', '2015-02-07 16:00:07', 1),
(23, 6, '', 2, '0', '2015-02-07 16:00:07', 1),
(24, 6, '', 3, '1', '2015-02-07 16:00:07', 1),
(25, 6, '', 1, '1', '2015-02-07 16:00:07', 1),
(26, 6, '', 2, '0', '2015-02-07 16:00:07', 1),
(27, 6, '', 3, '1', '2015-02-07 16:00:07', 1),
(28, 6, '', 1, '1', '2015-02-07 16:00:07', 1),
(29, 6, '', 2, '0', '2015-02-07 16:00:07', 1),
(30, 6, '', 3, '1', '2015-02-07 16:00:07', 1),
(31, 6, '', 1, '1', '2015-02-07 16:00:07', 1),
(32, 6, '', 2, '0', '2015-02-07 16:00:07', 1),
(33, 6, '', 3, '1', '2015-02-07 16:00:07', 1),
(34, 6, '', 1, '1', '2015-02-07 16:00:07', 1),
(35, 6, '', 2, '0', '2015-02-07 16:00:07', 1),
(36, 6, '', 3, '1', '2015-02-07 16:00:07', 1),
(37, 6, '', 1, '1', '2015-02-07 16:00:08', 1),
(38, 6, '', 2, '0', '2015-02-07 16:00:08', 1),
(39, 6, '', 3, '1', '2015-02-07 16:00:08', 1),
(40, 6, '', 1, '1', '2015-02-07 16:00:08', 1),
(41, 6, '', 2, '0', '2015-02-07 16:00:08', 1),
(42, 6, '', 3, '1', '2015-02-07 16:00:08', 1),
(43, 6, '', 1, '1', '2015-02-07 16:00:08', 1),
(44, 6, '', 2, '0', '2015-02-07 16:00:08', 1),
(45, 6, '', 3, '1', '2015-02-07 16:00:08', 1),
(46, 6, '', 1, '1', '2015-02-07 16:00:08', 1),
(47, 6, '', 2, '0', '2015-02-07 16:00:08', 1),
(48, 6, '', 3, '1', '2015-02-07 16:00:08', 1),
(49, 6, '', 1, '1', '2015-02-07 16:00:09', 1),
(50, 6, '', 2, '0', '2015-02-07 16:00:09', 1),
(51, 6, '', 3, '1', '2015-02-07 16:00:09', 1),
(52, 6, '', 1, '1', '2015-02-07 16:00:09', 1),
(53, 6, '', 2, '0', '2015-02-07 16:00:09', 1),
(54, 6, '', 3, '1', '2015-02-07 16:00:09', 1),
(55, 6, '', 1, '1', '2015-02-07 16:00:09', 1),
(56, 6, '', 2, '0', '2015-02-07 16:00:09', 1),
(57, 6, '', 3, '1', '2015-02-07 16:00:09', 1),
(58, 6, '', 1, '1', '2015-02-07 16:00:09', 1),
(59, 6, '', 2, '0', '2015-02-07 16:00:09', 1),
(60, 6, '', 3, '1', '2015-02-07 16:00:09', 1),
(61, 6, '', 1, '1', '2015-02-07 16:00:10', 1),
(62, 6, '', 2, '0', '2015-02-07 16:00:10', 1),
(63, 6, '', 3, '1', '2015-02-07 16:00:10', 1),
(64, 6, '', 1, '1', '2015-02-07 16:00:10', 1),
(65, 6, '', 2, '0', '2015-02-07 16:00:10', 1),
(66, 6, '', 3, '1', '2015-02-07 16:00:10', 1),
(67, 6, '', 1, '1', '2015-02-07 16:00:11', 1),
(68, 6, '', 2, '0', '2015-02-07 16:00:11', 1),
(69, 6, '', 3, '1', '2015-02-07 16:00:11', 1),
(70, 6, '', 1, '1', '2015-02-07 16:00:11', 1),
(71, 6, '', 2, '0', '2015-02-07 16:00:11', 1),
(72, 6, '', 3, '1', '2015-02-07 16:00:11', 1),
(73, 6, '', 1, '1', '2015-02-07 16:00:11', 1),
(74, 6, '', 2, '0', '2015-02-07 16:00:11', 1),
(75, 6, '', 3, '1', '2015-02-07 16:00:11', 1),
(76, 6, '', 1, '1', '2015-02-07 16:00:11', 1),
(77, 6, '', 2, '0', '2015-02-07 16:00:11', 1),
(78, 6, '', 3, '1', '2015-02-07 16:00:11', 1),
(79, 6, '', 1, '1', '2015-02-07 16:00:11', 1),
(80, 6, '', 2, '0', '2015-02-07 16:00:11', 1),
(81, 6, '', 3, '1', '2015-02-07 16:00:11', 1),
(82, 6, '', 1, '1', '2015-02-07 16:00:11', 1),
(83, 6, '', 2, '0', '2015-02-07 16:00:11', 1),
(84, 6, '', 3, '1', '2015-02-07 16:00:12', 1),
(85, 6, '', 1, '1', '2015-02-07 16:00:12', 1),
(86, 6, '', 2, '0', '2015-02-07 16:00:12', 1),
(87, 6, '', 3, '1', '2015-02-07 16:00:12', 1),
(88, 6, '', 1, '1', '2015-02-07 16:00:12', 1),
(89, 6, '', 2, '0', '2015-02-07 16:00:12', 1),
(90, 6, '', 3, '1', '2015-02-07 16:00:12', 1),
(91, 6, '', 1, '1', '2015-02-07 16:00:12', 1),
(92, 6, '', 2, '0', '2015-02-07 16:00:12', 1),
(93, 6, '', 3, '1', '2015-02-07 16:00:12', 1),
(94, 6, '', 1, '1', '2015-02-07 16:00:13', 1),
(95, 6, '', 2, '0', '2015-02-07 16:00:13', 1),
(96, 6, '', 3, '1', '2015-02-07 16:00:13', 1),
(97, 6, '', 1, '1', '2015-02-07 16:00:13', 1),
(98, 6, '', 2, '0', '2015-02-07 16:00:13', 1),
(99, 6, '', 3, '1', '2015-02-07 16:00:13', 1),
(100, 6, '', 1, '1', '2015-02-07 16:00:13', 1),
(101, 6, '', 2, '0', '2015-02-07 16:00:13', 1),
(102, 6, '', 3, '1', '2015-02-07 16:00:13', 1),
(103, 6, '', 1, '1', '2015-02-07 16:00:13', 1),
(104, 6, '', 2, '0', '2015-02-07 16:00:13', 1),
(105, 6, '', 3, '1', '2015-02-07 16:00:13', 1),
(106, 6, '', 1, '1', '2015-02-07 16:00:13', 1),
(107, 6, '', 2, '0', '2015-02-07 16:00:13', 1),
(108, 6, '', 3, '1', '2015-02-07 16:00:13', 1),
(109, 6, '', 1, '1', '2015-02-07 16:00:14', 1),
(110, 6, '', 2, '0', '2015-02-07 16:00:14', 1),
(111, 6, '', 3, '1', '2015-02-07 16:00:14', 1),
(112, 6, '', 1, '1', '2015-02-07 16:00:14', 1),
(113, 6, '', 2, '0', '2015-02-07 16:00:14', 1),
(114, 6, '', 3, '1', '2015-02-07 16:00:14', 1),
(115, 6, '', 1, '1', '2015-02-07 16:00:14', 1),
(116, 6, '', 2, '0', '2015-02-07 16:00:14', 1),
(117, 6, '', 3, '1', '2015-02-07 16:00:14', 1),
(118, 6, '', 1, '1', '2015-02-07 16:00:14', 1),
(119, 6, '', 2, '0', '2015-02-07 16:00:14', 1),
(120, 6, '', 3, '1', '2015-02-07 16:00:14', 1),
(121, 6, '', 1, '1', '2015-02-07 16:00:14', 1),
(122, 6, '', 2, '0', '2015-02-07 16:00:14', 1),
(123, 6, '', 3, '1', '2015-02-07 16:00:14', 1),
(124, 6, '', 1, '1', '2015-02-07 16:00:15', 1),
(125, 6, '', 2, '0', '2015-02-07 16:00:15', 1),
(126, 6, '', 3, '1', '2015-02-07 16:00:15', 1),
(127, 6, '', 1, '1', '2015-02-07 16:00:16', 1),
(128, 6, '', 2, '0', '2015-02-07 16:00:16', 1),
(129, 6, '', 3, '1', '2015-02-07 16:00:16', 1),
(130, 6, '', 1, '1', '2015-02-07 16:00:16', 1),
(131, 6, '', 2, '0', '2015-02-07 16:00:16', 1),
(132, 6, '', 3, '1', '2015-02-07 16:00:16', 1),
(133, 6, '', 1, '1', '2015-02-07 16:00:16', 1),
(134, 6, '', 2, '0', '2015-02-07 16:00:16', 1),
(135, 6, '', 3, '1', '2015-02-07 16:00:17', 1),
(136, 6, '', 1, '1', '2015-02-07 16:00:17', 1),
(137, 6, '', 2, '0', '2015-02-07 16:00:17', 1),
(138, 6, '', 3, '1', '2015-02-07 16:00:17', 1),
(139, 6, '', 1, '1', '2015-02-07 16:00:17', 1),
(140, 6, '', 2, '0', '2015-02-07 16:00:17', 1),
(141, 6, '', 3, '1', '2015-02-07 16:00:17', 1),
(142, 6, '', 1, '1', '2015-02-07 16:00:17', 1),
(143, 6, '', 2, '0', '2015-02-07 16:00:17', 1),
(144, 6, '', 3, '1', '2015-02-07 16:00:17', 1),
(145, 6, '', 1, '1', '2015-02-07 16:00:17', 1),
(146, 6, '', 2, '0', '2015-02-07 16:00:17', 1),
(147, 6, '', 3, '1', '2015-02-07 16:00:17', 1),
(148, 6, '', 1, '1', '2015-02-07 16:00:17', 1),
(149, 6, '', 2, '0', '2015-02-07 16:00:17', 1),
(150, 6, '', 3, '1', '2015-02-07 16:00:18', 1),
(151, 6, '', 1, '1', '2015-02-07 16:00:18', 1),
(152, 6, '', 2, '0', '2015-02-07 16:00:18', 1),
(153, 6, '', 3, '1', '2015-02-07 16:00:18', 1),
(154, 6, '', 1, '1', '2015-02-07 16:00:18', 1),
(155, 6, '', 2, '0', '2015-02-07 16:00:18', 1),
(156, 6, '', 3, '1', '2015-02-07 16:00:18', 1),
(157, 6, '', 1, '1', '2015-02-07 16:00:18', 1),
(158, 6, '', 2, '0', '2015-02-07 16:00:18', 1),
(159, 6, '', 3, '1', '2015-02-07 16:00:18', 1),
(160, 6, '', 1, '1', '2015-02-07 16:00:18', 1),
(161, 6, '', 2, '0', '2015-02-07 16:00:18', 1),
(162, 6, '', 3, '1', '2015-02-07 16:00:18', 1),
(163, 6, '', 1, '1', '2015-02-07 16:00:18', 1),
(164, 6, '', 2, '0', '2015-02-07 16:00:18', 1),
(165, 6, '', 3, '1', '2015-02-07 16:00:18', 1),
(166, 6, '', 1, '1', '2015-02-07 16:00:19', 1),
(167, 6, '', 2, '0', '2015-02-07 16:00:19', 1),
(168, 6, '', 3, '1', '2015-02-07 16:00:19', 1),
(169, 6, '', 1, '1', '2015-02-07 16:00:19', 1),
(170, 6, '', 2, '0', '2015-02-07 16:00:19', 1),
(171, 6, '', 3, '1', '2015-02-07 16:00:19', 1),
(172, 6, '', 1, '1', '2015-02-07 16:00:19', 1),
(173, 6, '', 2, '0', '2015-02-07 16:00:19', 1),
(174, 6, '', 3, '1', '2015-02-07 16:00:19', 1),
(175, 6, '', 1, '1', '2015-02-07 16:00:19', 1),
(176, 6, '', 2, '0', '2015-02-07 16:00:19', 1),
(177, 6, '', 3, '1', '2015-02-07 16:00:19', 1),
(178, 6, '', 1, '1', '2015-02-07 16:00:19', 1),
(179, 6, '', 2, '0', '2015-02-07 16:00:19', 1),
(180, 6, '', 3, '1', '2015-02-07 16:00:19', 1),
(181, 6, '', 1, '1', '2015-02-07 16:00:19', 1),
(182, 6, '', 2, '0', '2015-02-07 16:00:19', 1),
(183, 6, '', 3, '1', '2015-02-07 16:00:19', 1),
(184, 6, '', 1, '1', '2015-02-07 16:00:20', 1),
(185, 6, '', 2, '0', '2015-02-07 16:00:20', 1),
(186, 6, '', 3, '1', '2015-02-07 16:00:20', 1),
(187, 6, '', 1, '1', '2015-02-07 16:00:20', 1),
(188, 6, '', 2, '0', '2015-02-07 16:00:20', 1),
(189, 6, '', 3, '1', '2015-02-07 16:00:20', 1),
(190, 6, '', 1, '1', '2015-02-07 16:00:20', 1),
(191, 6, '', 2, '0', '2015-02-07 16:00:20', 1),
(192, 6, '', 3, '1', '2015-02-07 16:00:20', 1),
(193, 6, '', 1, '1', '2015-02-07 16:00:20', 1),
(194, 6, '', 2, '0', '2015-02-07 16:00:20', 1),
(195, 6, '', 3, '1', '2015-02-07 16:00:20', 1),
(196, 6, '', 1, '1', '2015-02-07 16:00:20', 1),
(197, 6, '', 2, '0', '2015-02-07 16:00:20', 1),
(198, 6, '', 3, '1', '2015-02-07 16:00:20', 1),
(199, 6, '', 1, '1', '2015-02-07 16:00:21', 1),
(200, 6, '', 2, '0', '2015-02-07 16:00:21', 1),
(201, 6, '', 3, '1', '2015-02-07 16:00:21', 1),
(202, 6, '', 1, '1', '2015-02-07 16:00:21', 1),
(203, 6, '', 2, '0', '2015-02-07 16:00:21', 1),
(204, 6, '', 3, '1', '2015-02-07 16:00:21', 1),
(205, 6, '', 1, '1', '2015-02-07 16:00:21', 1),
(206, 6, '', 2, '0', '2015-02-07 16:00:21', 1),
(207, 6, '', 3, '1', '2015-02-07 16:00:21', 1),
(208, 6, '', 1, '1', '2015-02-07 16:00:21', 1),
(209, 6, '', 2, '0', '2015-02-07 16:00:21', 1),
(210, 6, '', 3, '1', '2015-02-07 16:00:21', 1),
(211, 6, '', 1, '1', '2015-02-07 16:00:22', 1),
(212, 6, '', 2, '0', '2015-02-07 16:00:22', 1),
(213, 6, '', 3, '1', '2015-02-07 16:00:22', 1),
(214, 6, '', 1, '1', '2015-02-07 16:00:22', 1),
(215, 6, '', 2, '0', '2015-02-07 16:00:22', 1),
(216, 6, '', 3, '1', '2015-02-07 16:00:22', 1),
(217, 6, '', 1, '1', '2015-02-07 16:00:22', 1),
(218, 6, '', 2, '0', '2015-02-07 16:00:22', 1),
(219, 6, '', 3, '1', '2015-02-07 16:00:22', 1),
(220, 6, '', 1, '1', '2015-02-07 16:00:22', 1),
(221, 6, '', 2, '0', '2015-02-07 16:00:22', 1),
(222, 6, '', 3, '1', '2015-02-07 16:00:22', 1),
(223, 6, '', 1, '1', '2015-02-07 16:00:22', 1),
(224, 6, '', 2, '0', '2015-02-07 16:00:22', 1),
(225, 6, '', 3, '1', '2015-02-07 16:00:22', 1),
(226, 6, '', 1, '1', '2015-02-07 16:00:23', 1),
(227, 6, '', 2, '0', '2015-02-07 16:00:23', 1),
(228, 6, '', 3, '1', '2015-02-07 16:00:23', 1),
(229, 6, '', 1, '1', '2015-02-07 16:00:23', 1),
(230, 6, '', 2, '0', '2015-02-07 16:00:23', 1),
(231, 6, '', 3, '1', '2015-02-07 16:00:23', 1),
(232, 6, '', 1, '1', '2015-02-07 16:00:23', 1),
(233, 6, '', 2, '0', '2015-02-07 16:00:23', 1),
(234, 6, '', 3, '1', '2015-02-07 16:00:23', 1),
(235, 6, '', 1, '1', '2015-02-07 16:00:23', 1),
(236, 6, '', 2, '0', '2015-02-07 16:00:23', 1),
(237, 6, '', 3, '1', '2015-02-07 16:00:23', 1),
(238, 6, '', 1, '1', '2015-02-07 16:00:23', 1),
(239, 6, '', 2, '0', '2015-02-07 16:00:23', 1),
(240, 6, '', 3, '1', '2015-02-07 16:00:23', 1),
(241, 6, '', 1, '1', '2015-02-07 16:00:24', 1),
(242, 6, '', 2, '0', '2015-02-07 16:00:24', 1),
(243, 6, '', 3, '1', '2015-02-07 16:00:24', 1),
(244, 7, '', 1, '1', '2015-02-07 16:00:24', 1),
(245, 7, '', 2, '0', '2015-02-07 16:00:24', 1),
(246, 7, '', 3, '1', '2015-02-07 16:00:24', 1),
(247, 7, '', 1, '1', '2015-02-07 16:00:24', 1),
(248, 7, '', 2, '0', '2015-02-07 16:00:24', 1),
(249, 7, '', 3, '1', '2015-02-07 16:00:24', 1),
(250, 7, '', 1, '1', '2015-02-07 16:00:24', 1),
(251, 7, '', 2, '0', '2015-02-07 16:00:24', 1),
(252, 7, '', 3, '1', '2015-02-07 16:00:24', 1),
(253, 7, '', 1, '1', '2015-02-07 16:00:25', 1),
(254, 7, '', 2, '0', '2015-02-07 16:00:25', 1),
(255, 7, '', 3, '1', '2015-02-07 16:00:25', 1),
(256, 7, '', 1, '1', '2015-02-07 16:00:25', 1),
(257, 7, '', 2, '0', '2015-02-07 16:00:25', 1),
(258, 7, '', 3, '1', '2015-02-07 16:00:25', 1),
(259, 7, '', 1, '1', '2015-02-07 16:00:25', 1),
(260, 7, '', 2, '0', '2015-02-07 16:00:25', 1),
(261, 7, '', 3, '1', '2015-02-07 16:00:25', 1),
(262, 7, '', 1, '1', '2015-02-07 16:00:25', 1),
(263, 7, '', 2, '0', '2015-02-07 16:00:25', 1),
(264, 7, '', 3, '1', '2015-02-07 16:00:25', 1),
(265, 7, '', 1, '1', '2015-02-07 16:00:25', 1),
(266, 7, '', 2, '0', '2015-02-07 16:00:25', 1),
(267, 7, '', 3, '1', '2015-02-07 16:00:25', 1),
(268, 7, '', 1, '1', '2015-02-07 16:00:25', 1),
(269, 7, '', 2, '0', '2015-02-07 16:00:25', 1),
(270, 7, '', 3, '1', '2015-02-07 16:00:25', 1),
(271, 7, '', 1, '1', '2015-02-07 16:00:26', 1),
(272, 7, '', 2, '0', '2015-02-07 16:00:26', 1),
(273, 7, '', 3, '1', '2015-02-07 16:00:26', 1),
(274, 7, '', 1, '1', '2015-02-07 16:00:26', 1),
(275, 7, '', 2, '0', '2015-02-07 16:00:26', 1),
(276, 7, '', 3, '1', '2015-02-07 16:00:26', 1),
(277, 7, '', 1, '1', '2015-02-07 16:00:26', 1),
(278, 7, '', 2, '0', '2015-02-07 16:00:26', 1),
(279, 7, '', 3, '1', '2015-02-07 16:00:26', 1),
(280, 7, '', 1, '1', '2015-02-07 16:00:26', 1),
(281, 7, '', 2, '0', '2015-02-07 16:00:26', 1),
(282, 7, '', 3, '1', '2015-02-07 16:00:26', 1),
(283, 7, '', 1, '1', '2015-02-07 16:00:26', 1),
(284, 7, '', 2, '0', '2015-02-07 16:00:26', 1),
(285, 7, '', 3, '1', '2015-02-07 16:00:26', 1),
(286, 7, '', 1, '1', '2015-02-07 16:00:26', 1),
(287, 7, '', 2, '0', '2015-02-07 16:00:26', 1),
(288, 7, '', 3, '1', '2015-02-07 16:00:26', 1),
(289, 7, '', 1, '1', '2015-02-07 16:00:27', 1),
(290, 7, '', 2, '0', '2015-02-07 16:00:27', 1),
(291, 7, '', 3, '1', '2015-02-07 16:00:27', 1),
(292, 7, '', 1, '1', '2015-02-07 16:00:27', 1),
(293, 7, '', 2, '0', '2015-02-07 16:00:27', 1),
(294, 7, '', 3, '1', '2015-02-07 16:00:27', 1),
(295, 7, '', 1, '1', '2015-02-07 16:00:27', 1),
(296, 7, '', 2, '0', '2015-02-07 16:00:27', 1),
(297, 7, '', 3, '1', '2015-02-07 16:00:27', 1),
(298, 7, '', 1, '1', '2015-02-07 16:00:27', 1),
(299, 7, '', 2, '0', '2015-02-07 16:00:27', 1),
(300, 7, '', 3, '1', '2015-02-07 16:00:27', 1),
(301, 7, '', 1, '1', '2015-02-07 16:00:28', 1),
(302, 7, '', 2, '0', '2015-02-07 16:00:28', 1),
(303, 7, '', 3, '1', '2015-02-07 16:00:28', 1),
(304, 3, '', 1, '1', '2015-02-08 13:33:28', 1),
(305, 3, '<p>您好!您的款测试本期已经还款成功，还款金额:6,202.38元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=7</p><p>下期还款日期：2015年02月08日，下期还款金额:2015年05月26日</p>', 2, '1', '2015-02-08 13:33:30', 1),
(306, 3, '', 3, '1', '2015-02-08 13:33:30', 1),
(307, 7, '', 1, '1', '2015-02-08 13:33:31', 1),
(308, 7, '', 2, '0', '2015-02-08 13:33:31', 1),
(309, 7, '', 3, '1', '2015-02-08 13:33:31', 1),
(310, 7, '', 1, '1', '2015-02-08 13:33:31', 1),
(311, 7, '', 2, '0', '2015-02-08 13:33:31', 1),
(312, 7, '', 3, '1', '2015-02-08 13:33:31', 1),
(313, 7, '', 1, '1', '2015-02-08 13:33:31', 1),
(314, 7, '', 2, '0', '2015-02-08 13:33:31', 1),
(315, 7, '', 3, '1', '2015-02-08 13:33:31', 1),
(316, 7, '', 1, '1', '2015-02-08 13:33:32', 1),
(317, 7, '', 2, '0', '2015-02-08 13:33:32', 1),
(318, 7, '', 3, '1', '2015-02-08 13:33:32', 1),
(319, 7, '', 1, '1', '2015-02-08 13:33:32', 1),
(320, 7, '', 2, '0', '2015-02-08 13:33:32', 1),
(321, 7, '', 3, '1', '2015-02-08 13:33:32', 1),
(322, 7, '', 1, '1', '2015-02-08 13:33:32', 1),
(323, 7, '', 2, '0', '2015-02-08 13:33:32', 1),
(324, 7, '', 3, '1', '2015-02-08 13:33:32', 1),
(325, 3, '', 1, '1', '2015-02-08 13:35:19', 1),
(326, 3, '<p>您好!您的款测试本期已经还款成功，还款金额:2,029.76元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=7</p><p>下期还款日期：2015年02月08日，下期还款金额:2015年06月26日</p>', 2, '1', '2015-02-08 13:35:19', 1),
(327, 3, '', 3, '1', '2015-02-08 13:35:19', 1),
(328, 7, '', 1, '1', '2015-02-08 13:35:20', 1),
(329, 7, '', 2, '0', '2015-02-08 13:35:20', 1),
(330, 7, '', 3, '1', '2015-02-08 13:35:20', 1),
(331, 7, '', 1, '1', '2015-02-08 13:35:20', 1),
(332, 7, '', 2, '0', '2015-02-08 13:35:20', 1),
(333, 7, '', 3, '1', '2015-02-08 13:35:20', 1),
(334, 3, '您好用户，您的广告歌，提前还款成功，本次还款本息0，管理费2，违约金0，查看网址http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 1, '0', '2015-02-08 16:45:22', 1),
(335, 3, '您好用户，您的广告歌，提前还款成功，本次还款本息0，管理费2，违约金0，查看网址http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-08 16:45:22', 1),
(336, 3, '您的验证码为：80672,请务泄漏，如需帮助请直接联系管理员', 1, '1', '2015-02-09 13:42:17', 1),
(337, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '0', '2015-02-10 11:36:25', 1),
(338, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-10 11:36:29', 1),
(339, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-10 11:36:29', 1),
(340, 3, '您好用户，您的标测试满标审核的，本次还款日期2015-02-26 17:40，需要还款金额￥272.45元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12\n', 1, '1', '2015-02-10 11:37:11', 1),
(341, 3, '<p>您好用户，您的标测试满标审核的，本次还款日期2015-02-26 17:40，需要还款金额￥272.45元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12</p>', 2, '0', '2015-02-10 11:37:12', 1),
(342, 3, '您好用户，您的标测试满标审核的，本次还款日期2015-02-26 17:40，需要还款金额￥272.45元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12', 3, '1', '2015-02-10 11:37:12', 1),
(343, 3, '', 1, '1', '2015-02-10 13:11:10', 1),
(344, 3, '<p>您好!您的测试满标审核的本期已经还款成功，还款金额:372.45元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12</p><p>下期还款日期：2015年02月25日，下期还款金额:2015年03月26日</p>', 2, '1', '2015-02-10 13:11:12', 1),
(345, 3, '', 3, '1', '2015-02-10 13:11:12', 1),
(346, 6, '', 1, '1', '2015-02-10 13:11:13', 1),
(347, 6, '', 2, '0', '2015-02-10 13:11:13', 1),
(348, 6, '', 3, '1', '2015-02-10 13:11:13', 1),
(349, 7, '', 1, '1', '2015-02-10 13:11:14', 1),
(350, 7, '', 2, '0', '2015-02-10 13:11:14', 1),
(351, 7, '', 3, '1', '2015-02-10 13:11:14', 1),
(352, 7, '', 1, '1', '2015-02-10 13:11:14', 1),
(353, 7, '', 2, '0', '2015-02-10 13:11:14', 1),
(354, 7, '', 3, '1', '2015-02-10 13:11:14', 1),
(355, 6, '', 1, '1', '2015-02-10 13:11:14', 1),
(356, 6, '', 2, '0', '2015-02-10 13:11:14', 1),
(357, 6, '', 3, '1', '2015-02-10 13:11:15', 1),
(358, 7, '', 1, '1', '2015-02-10 13:11:15', 1),
(359, 7, '', 2, '0', '2015-02-10 13:11:15', 1),
(360, 7, '', 3, '1', '2015-02-10 13:11:15', 1),
(361, 7, '', 1, '1', '2015-02-10 13:11:15', 1),
(362, 7, '', 2, '0', '2015-02-10 13:11:15', 1),
(363, 7, '', 3, '1', '2015-02-10 13:11:15', 1),
(364, 3, '您好test您的f''f''f''f 的贷款没有通过初次审核\n2015-02-25 13:13:18查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=10', 1, '1', '2015-02-10 13:12:49', 1),
(365, 3, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替&quot;用户名&quot;;f''f''f''f 代替&quot;贷款简短名称&quot;;没有通过初次审核代替&quot;通过初次审核&quot;;2015-02-25 13:13:18代替&quot;时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=10代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-02-10 13:12:49', 1),
(366, 3, '您好test您的f''f''f''f 的贷款没有通过初次审核\n2015-02-25 13:13:18查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=10', 3, '1', '2015-02-10 13:12:49', 1),
(367, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-10 13:19:32', 1),
(368, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-10 13:19:33', 1),
(369, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-10 13:19:33', 1),
(370, 3, '', 1, '1', '2015-02-10 13:19:49', 1),
(371, 3, '<p>您好!您的测试满标审核的本期已经还款成功，还款金额:372.45元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12</p><p>下期还款日期：2015年03月25日，下期还款金额:2015年04月26日</p>', 2, '1', '2015-02-10 13:19:50', 1),
(372, 3, '', 3, '1', '2015-02-10 13:19:50', 1),
(373, 6, '', 1, '1', '2015-02-10 13:19:50', 1),
(374, 6, '', 2, '0', '2015-02-10 13:19:50', 1),
(375, 6, '', 3, '1', '2015-02-10 13:19:50', 1),
(376, 7, '', 1, '1', '2015-02-10 13:19:50', 1),
(377, 7, '', 2, '0', '2015-02-10 13:19:50', 1),
(378, 7, '', 3, '1', '2015-02-10 13:19:50', 1),
(379, 7, '', 1, '1', '2015-02-10 13:19:51', 1),
(380, 7, '', 2, '0', '2015-02-10 13:19:51', 1),
(381, 7, '', 3, '1', '2015-02-10 13:19:51', 1),
(382, 6, '', 1, '1', '2015-02-10 13:19:51', 1),
(383, 6, '', 2, '0', '2015-02-10 13:19:51', 1),
(384, 6, '', 3, '1', '2015-02-10 13:19:51', 1),
(385, 7, '', 1, '1', '2015-02-10 13:19:51', 1),
(386, 7, '', 2, '0', '2015-02-10 13:19:51', 1),
(387, 7, '', 3, '1', '2015-02-10 13:19:51', 1),
(388, 7, '', 1, '1', '2015-02-10 13:19:52', 1),
(389, 7, '', 2, '0', '2015-02-10 13:19:52', 1),
(390, 7, '', 3, '1', '2015-02-10 13:19:52', 1),
(391, 3, '', 1, '1', '2015-02-10 13:20:24', 1),
(392, 3, '<p>您好!您的又见信用标本期已经还款成功，还款金额:1,205.76元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=14</p><p>下期还款日期：2015年03月25日，下期还款金额:2015年04月01日</p>', 2, '1', '2015-02-10 13:20:25', 1),
(393, 3, '', 3, '1', '2015-02-10 13:20:25', 1),
(394, 7, '', 1, '1', '2015-02-10 13:20:25', 1),
(395, 7, '', 2, '0', '2015-02-10 13:20:25', 1),
(396, 7, '', 3, '1', '2015-02-10 13:20:25', 1),
(397, 7, '', 1, '1', '2015-02-10 13:20:25', 1),
(398, 7, '', 2, '0', '2015-02-10 13:20:25', 1),
(399, 7, '', 3, '1', '2015-02-10 13:20:25', 1),
(400, 7, '', 1, '1', '2015-02-10 13:20:25', 1),
(401, 7, '', 2, '0', '2015-02-10 13:20:25', 1),
(402, 7, '', 3, '1', '2015-02-10 13:20:25', 1),
(403, 3, '您好用户，您的标测试满标审核的，本次还款日期2015-04-26 17:40，需要还款金额￥272.45元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12\n', 1, '1', '2015-02-10 14:04:00', 1),
(404, 3, '<p>您好用户，您的标测试满标审核的，本次还款日期2015-04-26 17:40，需要还款金额￥272.45元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12</p>', 2, '0', '2015-02-10 14:04:02', 1),
(405, 3, '您好用户，您的标测试满标审核的，本次还款日期2015-04-26 17:40，需要还款金额￥272.45元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=12', 3, '1', '2015-02-10 14:04:02', 1),
(406, 3, '', 1, '1', '2015-02-10 14:05:38', 1),
(407, 3, '<p>您好!您的又见信用标本期已经还款成功，还款金额:1,205.76元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=14</p><p>下期还款日期：2015年04月25日，下期还款金额:2015年05月01日</p>', 2, '0', '2015-02-10 14:05:39', 1),
(408, 3, '', 3, '1', '2015-02-10 14:05:39', 1),
(409, 7, '', 1, '1', '2015-02-10 14:05:39', 1),
(410, 7, '', 2, '0', '2015-02-10 14:05:39', 1),
(411, 7, '', 3, '1', '2015-02-10 14:05:39', 1),
(412, 7, '', 1, '1', '2015-02-10 14:05:40', 1),
(413, 7, '', 2, '0', '2015-02-10 14:05:40', 1),
(414, 7, '', 3, '1', '2015-02-10 14:05:40', 1),
(415, 7, '', 1, '1', '2015-02-10 14:05:40', 1),
(416, 7, '', 2, '0', '2015-02-10 14:05:40', 1),
(417, 7, '', 3, '1', '2015-02-10 14:05:40', 1),
(418, 3, '您的验证码为：47626,请务泄漏，如需帮助请直接联系管理员', 1, '1', '2015-02-11 17:45:54', 1),
(419, 3, '您的验证码为：87714,请务泄漏，如需帮助请直接联系管理员', 1, '1', '2015-02-11 17:51:35', 1),
(420, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-11-12 09:36:52查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=19', 1, '1', '2015-02-12 09:36:23', 1),
(421, 3, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替&quot;用户名&quot;;魂牵梦萦代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-11-12 09:36:52代替&quot;时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=19代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-02-12 09:36:26', 1),
(422, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-11-12 09:36:52查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=19', 3, '1', '2015-02-12 09:36:26', 1),
(423, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-11-12 09:39:26查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=23', 1, '1', '2015-02-12 09:38:58', 1),
(424, 3, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替&quot;用户名&quot;;魂牵梦萦代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-11-12 09:39:26代替&quot;时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=23代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-02-12 09:38:58', 1),
(425, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-11-12 09:39:26查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=23', 3, '1', '2015-02-12 09:38:58', 1),
(426, 3, '您的验证码为：40430,请务泄漏，如需帮助请直接联系管理员', 1, '1', '2015-02-12 10:26:40', 1),
(427, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-12 11:55:02', 1),
(428, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-12 11:55:04', 1),
(429, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-12 11:55:04', 1),
(430, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-12 11:55:15', 1),
(431, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-12 11:55:15', 1),
(432, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-12 11:55:15', 1),
(433, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-12 11:55:22', 1),
(434, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-12 11:55:23', 1),
(435, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-12 11:55:23', 1),
(436, 3, '"测试信息11"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=9"="网址","2015-02-24 13:57"="流标时间"', 1, '1', '2015-02-12 13:57:18', 1),
(437, 3, '<p>&quot;测试信息11&quot;=&quot;标名称&quot;],&quot;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=9&quot;=&quot;网址&quot;,&quot;2015-02-24 13:57&quot;=&quot;流标时间&quot;</p>', 2, '1', '2015-02-12 13:57:20', 1),
(438, 3, '"测试信息11"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=9"="网址","2015-02-24 13:57"="流标时间"', 3, '1', '2015-02-12 13:57:20', 1),
(439, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-12 13:57:20', 1),
(440, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '1', '2015-02-12 13:57:21', 1),
(441, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-12 13:57:21', 1),
(442, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-12 13:57:32', 1),
(443, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-12 13:57:32', 1),
(444, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-12 13:57:32', 1),
(445, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-12 13:57:34', 1),
(446, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-12 13:57:34', 1),
(447, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-12 13:57:34', 1),
(448, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-12 13:58:38', 1),
(449, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-12 13:58:38', 1),
(450, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-12 13:58:38', 1),
(451, 3, '"42343"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=2"="网址","2015-02-24 14:05"="流标时间"', 1, '1', '2015-02-12 14:05:12', 1),
(452, 3, '<p>&quot;42343&quot;=&quot;标名称&quot;],&quot;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=2&quot;=&quot;网址&quot;,&quot;2015-02-24 14:05&quot;=&quot;流标时间&quot;</p>', 2, '1', '2015-02-12 14:05:12', 1),
(453, 3, '"42343"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=2"="网址","2015-02-24 14:05"="流标时间"', 3, '1', '2015-02-12 14:05:12', 1),
(454, 3, '"简短名称22"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=4"="网址","2015-02-24 14:05"="流标时间"', 1, '1', '2015-02-12 14:05:12', 1),
(455, 3, '<p>&quot;简短名称22&quot;=&quot;标名称&quot;],&quot;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=4&quot;=&quot;网址&quot;,&quot;2015-02-24 14:05&quot;=&quot;流标时间&quot;</p>', 2, '1', '2015-02-12 14:05:12', 1),
(456, 3, '"简短名称22"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=4"="网址","2015-02-24 14:05"="流标时间"', 3, '1', '2015-02-12 14:05:12', 1),
(457, 3, '"信贷借款测试哦"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=6"="网址","2015-02-24 14:05"="流标时间"', 1, '1', '2015-02-12 14:05:12', 1),
(458, 3, '<p>&quot;信贷借款测试哦&quot;=&quot;标名称&quot;],&quot;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=6&quot;=&quot;网址&quot;,&quot;2015-02-24 14:05&quot;=&quot;流标时间&quot;</p>', 2, '1', '2015-02-12 14:05:13', 1),
(459, 3, '"信贷借款测试哦"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=6"="网址","2015-02-24 14:05"="流标时间"', 3, '1', '2015-02-12 14:05:13', 1),
(460, 7, '"测试3个月到期本息的哦"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=16"="网址","2015-02-24 14:05"="流标时间"', 1, '1', '2015-02-12 14:05:13', 1),
(461, 7, '<p>&quot;测试3个月到期本息的哦&quot;=&quot;标名称&quot;],&quot;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=16&quot;=&quot;网址&quot;,&quot;2015-02-24 14:05&quot;=&quot;流标时间&quot;</p>', 2, '0', '2015-02-12 14:05:13', 1),
(462, 7, '"测试3个月到期本息的哦"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=16"="网址","2015-02-24 14:05"="流标时间"', 3, '1', '2015-02-12 14:05:13', 1),
(463, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-12 14:05:13', 1),
(464, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-12 14:05:14', 1),
(465, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-12 14:05:14', 1),
(466, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8\n', 1, '1', '2015-02-12 14:07:50', 1),
(467, 3, '<p>您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8</p>', 2, '0', '2015-02-12 14:07:52', 1),
(468, 3, '您好用户，您的标请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,#username#代替&quot;贷款用户名&quot;;#loanname#代替&quot;贷款名称&quot;;#time#代替&quot;满标时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8代替&quot;贷款展示网址&quot;;，本次还款日期2015-02-26 16:31，需要还款金额￥0.00元，查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-02-12 14:07:52', 1),
(469, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-02-24 15:00:14查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=20', 1, '1', '2015-02-12 14:59:49', 1),
(470, 3, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替&quot;用户名&quot;;魂牵梦萦代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-02-24 15:00:14代替&quot;时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=20代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-02-12 14:59:51', 1),
(471, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-02-24 15:00:14查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=20', 3, '1', '2015-02-12 14:59:51', 1),
(472, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-02-24 15:01:19查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=21', 1, '1', '2015-02-12 15:00:54', 1),
(473, 3, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替&quot;用户名&quot;;魂牵梦萦代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-02-24 15:01:19代替&quot;时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=21代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-02-12 15:00:55', 1),
(474, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-02-24 15:01:19查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=21', 3, '1', '2015-02-12 15:00:55', 1),
(475, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-02-24 15:08:47查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=22', 1, '1', '2015-02-12 15:08:22', 1),
(476, 3, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替&quot;用户名&quot;;魂牵梦萦代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-02-24 15:08:47代替&quot;时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=22代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-02-12 15:08:22', 1),
(477, 3, '您好test您的魂牵梦萦的贷款通过初次审核\n2015-02-24 15:08:47查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=22', 3, '1', '2015-02-12 15:08:23', 1),
(478, 3, '"魂牵梦萦"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=22"="网址","2015-02-24 15:15"="流标时间"', 1, '1', '2015-02-12 15:14:36', 1),
(479, 3, '<p>&quot;魂牵梦萦&quot;=&quot;标名称&quot;],&quot;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=22&quot;=&quot;网址&quot;,&quot;2015-02-24 15:15&quot;=&quot;流标时间&quot;</p>', 2, '1', '2015-02-12 15:14:37', 1),
(480, 3, '"魂牵梦萦"="标名称"],"http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=22"="网址","2015-02-24 15:15"="流标时间"', 3, '1', '2015-02-12 15:14:37', 1),
(481, 3, '您好用户，您的贷款测试333，提前还款成功，本次还款本息20558.531746032，管理费500，违约金202.38，查看网址http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=7', 1, '1', '2015-02-12 17:19:44', 1),
(482, 3, '您好用户，您的贷款测试333，提前还款成功，本次还款本息20558.531746032，管理费500，违约金202.38，查看网址http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=7', 3, '1', '2015-02-12 17:19:44', 1),
(483, 7, '', 1, '1', '2015-02-12 17:19:44', 1),
(484, 7, '', 2, '0', '2015-02-12 17:19:44', 1),
(485, 7, '', 3, '1', '2015-02-12 17:19:44', 1),
(486, 7, '', 1, '1', '2015-02-12 17:19:44', 1),
(487, 7, '', 2, '0', '2015-02-12 17:19:44', 1),
(488, 7, '', 3, '1', '2015-02-12 17:19:44', 1),
(489, 7, '', 1, '1', '2015-02-12 17:19:45', 1),
(490, 7, '', 2, '0', '2015-02-12 17:19:45', 1),
(491, 7, '', 3, '1', '2015-02-12 17:19:45', 1),
(492, 7, '', 1, '1', '2015-02-12 17:19:45', 1),
(493, 7, '', 2, '0', '2015-02-12 17:19:45', 1),
(494, 7, '', 3, '1', '2015-02-12 17:19:45', 1),
(495, 7, '', 1, '1', '2015-02-12 17:19:45', 1),
(496, 7, '', 2, '0', '2015-02-12 17:19:45', 1),
(497, 7, '', 3, '1', '2015-02-12 17:19:45', 1),
(498, 7, '', 1, '1', '2015-02-12 17:19:46', 1),
(499, 7, '', 2, '0', '2015-02-12 17:19:46', 1),
(500, 7, '', 3, '1', '2015-02-12 17:19:46', 1),
(501, 7, '', 1, '1', '2015-02-12 17:19:46', 1),
(502, 7, '', 2, '0', '2015-02-12 17:19:46', 1),
(503, 7, '', 3, '1', '2015-02-12 17:19:46', 1),
(504, 7, '', 1, '1', '2015-02-12 17:19:46', 1),
(505, 7, '', 2, '0', '2015-02-12 17:19:46', 1),
(506, 7, '', 3, '1', '2015-02-12 17:19:46', 1),
(507, 7, '', 1, '1', '2015-02-12 17:19:46', 1),
(508, 7, '', 2, '0', '2015-02-12 17:19:47', 1),
(509, 7, '', 3, '1', '2015-02-12 17:19:47', 1),
(510, 7, '', 1, '1', '2015-02-12 17:19:47', 1);
INSERT INTO `ac_message_log` (`id`, `mes_to`, `content`, `type`, `isok`, `add_time`, `mes_from`) VALUES
(511, 7, '', 2, '0', '2015-02-12 17:19:47', 1),
(512, 7, '', 3, '1', '2015-02-12 17:19:47', 1),
(513, 3, '', 2, '0', '2015-02-13 11:15:56', 1),
(514, 3, '您好test您的提前还款标测试的贷款通过初次审核\n2015-02-25 13:23:10查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1', 1, '0', '2015-02-13 13:22:45', 1),
(515, 3, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替&quot;用户名&quot;;提前还款标测试代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-02-25 13:23:10代替&quot;时间&quot;;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-02-13 13:22:48', 1),
(516, 3, '您好test您的提前还款标测试的贷款通过初次审核\n2015-02-25 13:23:10查看http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1', 3, '1', '2015-02-13 13:22:48', 1),
(517, 3, '您好，test，\n您的提前还款标测试标于2015-02-25 13:27:27已经投标过半。\n详情请点击这个连接http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1', 1, '0', '2015-02-13 13:27:02', 1),
(518, 3, '<p>您好，test，</p><p>您的提前还款标测试标于2015-02-25 13:27:27已经投标过半。</p><p>详情请点击这个连接http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1</p><p><span style="color: rgb(255, 183, 82); font-family: &#39;Microsoft YaHei&#39;, Lato, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);"><br/></span></p>', 2, '1', '2015-02-13 13:27:03', 1),
(519, 3, '', 2, '0', '2015-02-13 13:29:08', 1),
(520, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";提前还款标测试代替"贷款名称";2015-02-25 13:29:34代替"满标时间";http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1代替"贷款展示网址";', 3, '1', '2015-02-13 13:29:08', 1),
(521, 3, '"test"="用户","提前还款标测试"="标名称","通过满标复审审核并放款"="状态","2015-02-25 13:54:51"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1"="网址"', 1, '1', '2015-02-13 13:54:26', 1),
(522, 3, '<p>&quot;test&quot;=&quot;用户&quot;,&quot;提前还款标测试&quot;=&quot;标名称&quot;,&quot;通过满标复审审核并放款&quot;=&quot;状态&quot;,&quot;2015-02-25 13:54:51&quot;=&quot;审核时间&quot;,&quot;http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1&quot;=&quot;网址&quot;</p>', 2, '1', '2015-02-13 13:54:28', 1),
(523, 3, '"test"="用户","提前还款标测试"="标名称","通过满标复审审核并放款"="状态","2015-02-25 13:54:51"="审核时间","http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1"="网址111"', 3, '1', '2015-02-13 13:54:28', 1),
(524, 3, '', 1, '1', '2015-02-13 14:11:52', 1),
(525, 3, '<p>您好!您的提前还款标测试本期已经还款成功，还款金额:1,079.16元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1</p><p>下期还款日期：2015年02月25日，下期还款金额:2015年04月25日</p>', 2, '1', '2015-02-13 14:11:55', 1),
(526, 3, '', 3, '1', '2015-02-13 14:11:55', 1),
(527, 7, '', 1, '1', '2015-02-13 14:11:55', 1),
(528, 7, '', 2, '0', '2015-02-13 14:11:55', 1),
(529, 7, '', 3, '1', '2015-02-13 14:11:55', 1),
(530, 7, '', 1, '1', '2015-02-13 14:11:56', 1),
(531, 7, '', 2, '0', '2015-02-13 14:11:56', 1),
(532, 7, '', 3, '1', '2015-02-13 14:11:56', 1),
(533, 7, '', 1, '1', '2015-02-13 14:11:56', 1),
(534, 7, '', 2, '0', '2015-02-13 14:11:56', 1),
(535, 7, '', 3, '1', '2015-02-13 14:11:56', 1),
(536, 7, '', 1, '1', '2015-02-13 14:11:56', 1),
(537, 7, '', 2, '0', '2015-02-13 14:11:56', 1),
(538, 7, '', 3, '1', '2015-02-13 14:11:56', 1),
(539, 3, '', 1, '1', '2015-02-13 14:15:18', 1),
(540, 3, '<p>您好!您的提前还款标测试本期已经还款成功，还款金额:2,158.32元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1</p><p>下期还款日期：2015年02月25日，下期还款金额:2015年06月25日</p>', 2, '1', '2015-02-13 14:15:18', 1),
(541, 3, '', 3, '1', '2015-02-13 14:15:18', 1),
(542, 7, '', 1, '1', '2015-02-13 14:15:19', 1),
(543, 7, '', 2, '0', '2015-02-13 14:15:19', 1),
(544, 7, '', 3, '1', '2015-02-13 14:15:19', 1),
(545, 7, '', 1, '1', '2015-02-13 14:15:19', 1),
(546, 7, '', 2, '0', '2015-02-13 14:15:19', 1),
(547, 7, '', 3, '1', '2015-02-13 14:15:19', 1),
(548, 7, '', 1, '1', '2015-02-13 14:15:19', 1),
(549, 7, '', 2, '0', '2015-02-13 14:15:19', 1),
(550, 7, '', 3, '1', '2015-02-13 14:15:19', 1),
(551, 7, '', 1, '1', '2015-02-13 14:15:19', 1),
(552, 7, '', 2, '0', '2015-02-13 14:15:19', 1),
(553, 7, '', 3, '1', '2015-02-13 14:15:19', 1),
(554, 7, '', 1, '1', '2015-02-13 14:15:19', 1),
(555, 7, '', 2, '0', '2015-02-13 14:15:19', 1),
(556, 7, '', 3, '1', '2015-02-13 14:15:20', 1),
(557, 7, '', 1, '1', '2015-02-13 14:15:20', 1),
(558, 7, '', 2, '0', '2015-02-13 14:15:20', 1),
(559, 7, '', 3, '1', '2015-02-13 14:15:20', 1),
(560, 7, '', 1, '1', '2015-02-13 14:15:20', 1),
(561, 7, '', 2, '0', '2015-02-13 14:15:20', 1),
(562, 7, '', 3, '1', '2015-02-13 14:15:20', 1),
(563, 7, '', 1, '1', '2015-02-13 14:15:21', 1),
(564, 7, '', 2, '0', '2015-02-13 14:15:21', 1),
(565, 7, '', 3, '1', '2015-02-13 14:15:21', 1),
(566, 3, '', 1, '1', '2015-02-13 14:33:12', 1),
(567, 3, '<p>您好!您的提前还款标测试本期已经还款成功，还款金额:1,079.16元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1</p><p>下期还款日期：2015年02月25日，下期还款金额:2015年07月25日</p>', 2, '1', '2015-02-13 14:33:15', 1),
(568, 3, '', 3, '1', '2015-02-13 14:33:15', 1),
(569, 7, '', 1, '1', '2015-02-13 14:33:15', 1),
(570, 7, '', 2, '0', '2015-02-13 14:33:15', 1),
(571, 7, '', 3, '1', '2015-02-13 14:33:15', 1),
(572, 7, '', 1, '1', '2015-02-13 14:33:15', 1),
(573, 7, '', 2, '0', '2015-02-13 14:33:15', 1),
(574, 7, '', 3, '1', '2015-02-13 14:33:15', 1),
(575, 7, '', 1, '1', '2015-02-13 14:33:15', 1),
(576, 7, '', 2, '0', '2015-02-13 14:33:15', 1),
(577, 7, '', 3, '1', '2015-02-13 14:33:15', 1),
(578, 7, '', 1, '1', '2015-02-13 14:33:16', 1),
(579, 7, '', 2, '0', '2015-02-13 14:33:16', 1),
(580, 7, '', 3, '1', '2015-02-13 14:33:16', 1),
(581, 3, '', 1, '1', '2015-02-13 14:36:15', 1),
(582, 3, '<p>您好!您的提前还款标测试本期已经还款成功，还款金额:1,079.16元,查看网址:http://www.ptop.com/index.php?g=Loan&m=index&a=deal&id=1</p><p>下期还款日期：2015年02月25日，下期还款金额:2015年08月25日</p>', 2, '1', '2015-02-13 14:36:15', 1),
(583, 3, '', 3, '1', '2015-02-13 14:36:15', 1),
(584, 7, '', 1, '1', '2015-02-13 14:36:16', 1),
(585, 7, '', 2, '0', '2015-02-13 14:36:16', 1),
(586, 7, '', 3, '1', '2015-02-13 14:36:16', 1),
(587, 7, '', 1, '1', '2015-02-13 14:36:16', 1),
(588, 7, '', 2, '0', '2015-02-13 14:36:16', 1),
(589, 7, '', 3, '1', '2015-02-13 14:36:16', 1),
(590, 7, '', 1, '1', '2015-02-13 14:36:16', 1),
(591, 7, '', 2, '0', '2015-02-13 14:36:16', 1),
(592, 7, '', 3, '1', '2015-02-13 14:36:16', 1),
(593, 7, '', 1, '1', '2015-02-13 14:36:17', 1),
(594, 7, '', 2, '0', '2015-02-13 14:36:17', 1),
(595, 7, '', 3, '1', '2015-02-13 14:36:17', 1),
(596, 3, '', 1, '1', '2015-03-11 14:13:18', 1),
(597, 3, '<p>您好!您的提前还款标测试本期已经还款成功，还款金额:1,079.16元,查看网址:http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=1</p><p>下期还款日期：2015年03月11日，下期还款金额:2015年09月25日</p>', 2, '1', '2015-03-11 14:13:19', 1),
(598, 3, '', 3, '1', '2015-03-11 14:13:19', 1),
(599, 7, '', 1, '1', '2015-03-11 14:13:20', 1),
(600, 7, '', 2, '0', '2015-03-11 14:13:20', 1),
(601, 7, '', 3, '1', '2015-03-11 14:13:20', 1),
(602, 7, '', 1, '1', '2015-03-11 14:13:20', 1),
(603, 7, '', 2, '0', '2015-03-11 14:13:20', 1),
(604, 7, '', 3, '1', '2015-03-11 14:13:20', 1),
(605, 7, '', 1, '1', '2015-03-11 14:13:20', 1),
(606, 7, '', 2, '0', '2015-03-11 14:13:20', 1),
(607, 7, '', 3, '1', '2015-03-11 14:13:20', 1),
(608, 7, '', 1, '1', '2015-03-11 14:13:20', 1),
(609, 7, '', 2, '0', '2015-03-11 14:13:20', 1),
(610, 7, '', 3, '1', '2015-03-11 14:13:20', 1),
(611, 3, '您好test您的周转的贷款通过初次审核\n2015-03-14 11:00:53查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=2', 1, '1', '2015-03-14 11:00:54', 1),
(612, 3, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替&quot;用户名&quot;;周转代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-03-14 11:00:53代替&quot;时间&quot;;http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=2代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-03-14 11:00:56', 1),
(613, 3, '您好test您的周转的贷款通过初次审核\n2015-03-14 11:00:53查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=2', 3, '1', '2015-03-14 11:00:56', 1),
(614, 13, '您好wuhaofz502您的3月到期的贷款通过初次审核\n2015-03-14 11:01:15查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=4', 1, '1', '2015-03-14 11:01:15', 1),
(615, 13, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,wuhaofz502代替&quot;用户名&quot;;3月到期代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-03-14 11:01:15代替&quot;时间&quot;;http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=4代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-03-14 11:01:18', 1),
(616, 13, '您好wuhaofz502您的3月到期的贷款通过初次审核\n2015-03-14 11:01:15查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=4', 3, '1', '2015-03-14 11:01:18', 1),
(617, 10, '您好hjh1您的3月到期的贷款通过初次审核\n2015-03-14 11:01:25查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=6', 1, '1', '2015-03-14 11:01:25', 1),
(618, 10, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,hjh1代替&quot;用户名&quot;;3月到期代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-03-14 11:01:25代替&quot;时间&quot;;http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=6代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-03-14 11:01:25', 1),
(619, 10, '您好hjh1您的3月到期的贷款通过初次审核\n2015-03-14 11:01:25查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=6', 3, '1', '2015-03-14 11:01:25', 1),
(620, 3, '您好test您的3个月到期的贷款通过初次审核\n2015-03-14 11:02:16查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=3', 1, '1', '2015-03-14 11:02:16', 1),
(621, 3, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替&quot;用户名&quot;;3个月到期代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-03-14 11:02:16代替&quot;时间&quot;;http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=3代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-03-14 11:02:17', 1),
(622, 3, '您好test您的3个月到期的贷款通过初次审核\n2015-03-14 11:02:16查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=3', 3, '1', '2015-03-14 11:02:17', 1),
(623, 12, '您好test123您的到期还款的贷款通过初次审核\n2015-03-14 11:03:16查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=7', 1, '1', '2015-03-14 11:03:27', 1),
(624, 12, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test123代替&quot;用户名&quot;;到期还款代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-03-14 11:03:16代替&quot;时间&quot;;http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=7代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-03-14 11:03:29', 1),
(625, 12, '您好test123您的到期还款的贷款通过初次审核\n2015-03-14 11:03:16查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=7', 3, '1', '2015-03-14 11:03:29', 1),
(626, 6, '您好rrr您的到期还款的贷款通过初次审核\n2015-03-14 11:03:37查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=8', 1, '1', '2015-03-14 11:03:38', 1),
(627, 6, '<table cellpadding="2" cellspacing="2" width="100%"><tbody><tr class="firstRow"><td><span style="color: rgb(255, 183, 82);">请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,rrr代替&quot;用户名&quot;;到期还款代替&quot;贷款简短名称&quot;;通过初次审核代替&quot;通过初次审核&quot;;2015-03-14 11:03:37代替&quot;时间&quot;;http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=8代替&quot;查看地址&quot;;<br/><br/></span></td></tr></tbody></table><p><br/></p>', 2, '1', '2015-03-14 11:03:39', 1),
(628, 6, '您好rrr您的到期还款的贷款通过初次审核\n2015-03-14 11:03:37查看http://ptp.ac371.cn/index.php?g=Loan&m=index&a=deal&id=8', 3, '1', '2015-03-14 11:03:39', 1),
(629, 20, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">mmll123，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/244138b1f1fe6d9b1fe1793a10e34874" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/244138b1f1fe6d9b1fe1793a10e34874</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 15:09:51', 1),
(630, 3, '你好#name#你的#type#审核已经通过', 1, '1', '2015-03-14 15:24:53', 1),
(631, 3, '你好#name#你的#type#审核已经通过', 1, '1', '2015-03-14 15:28:46', 1),
(632, 3, '您好test您的testtest的贷款通过初次审核\n2015-03-14 15:45:59查看http://ptp.ac371.cn/index.php/loan/index/deal/id/9', 1, '1', '2015-03-14 15:46:01', 1),
(633, 3, '您好test您的testtest的贷款通过初次审核\n2015-03-14 15:45:59查看http://ptp.ac371.cn/index.php/loan/index/deal/id/9', 3, '1', '2015-03-14 15:46:01', 1),
(634, 21, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">acac，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/94af48e74d983a2b715f499aade019a6" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/94af48e74d983a2b715f499aade019a6</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 15:47:41', 1),
(635, 3, '您好，test，\n您的testtest标于2015-03-14 15:52:23已经投标过半。\n详情请点击这个连接http://ptp.ac371.cn/index.php/loan/index/deal/id/9', 1, '1', '2015-03-14 15:52:24', 1),
(636, 3, '请用奥晨网贷代替网站名称,http://www.ptop.com/替代网站域名,test代替"贷款用户名";testtest代替"贷款名称";2015-03-14 15:52:54代替"满标时间";http://ptp.ac371.cn/index.php/loan/index/deal/id/9代替"贷款展示网址";', 3, '1', '2015-03-14 15:52:54', 1),
(637, 3, '"test"="用户","testtest"="标名称","通过满标复审审核并放款"="状态","2015-03-14 15:54:08"="审核时间","http://ptp.ac371.cn/index.php/loan/index/deal/id/9"="网址"', 1, '1', '2015-03-14 15:54:09', 1),
(638, 3, '"test"="用户","testtest"="标名称","通过满标复审审核并放款"="状态","2015-03-14 15:54:08"="审核时间","http://ptp.ac371.cn/index.php/loan/index/deal/id/9"="网址111"', 3, '1', '2015-03-14 15:54:09', 1),
(639, 22, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">dddd，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/82ca28bc6bd0839aa45264780c9fdcb3" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/82ca28bc6bd0839aa45264780c9fdcb3</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 16:04:27', 1),
(640, 23, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">ddddd，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/2098c39f1450d043a8f9a98566b82d88" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/2098c39f1450d043a8f9a98566b82d88</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '0', '2015-03-14 16:11:09', 1),
(641, 24, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">ppp，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/34b2b38ffc9b121cff6df5ed667b3dd8" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/34b2b38ffc9b121cff6df5ed667b3dd8</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 16:14:49', 1),
(642, 25, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">pppp，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/0af5321585e6c168fcf7cd4baa88a3e6" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/0af5321585e6c168fcf7cd4baa88a3e6</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 16:31:54', 1),
(643, 26, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">qqq，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/adced4f5f4e23ec42b96ff1a68c51974" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/adced4f5f4e23ec42b96ff1a68c51974</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 16:33:41', 1),
(644, 27, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">qqqq，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/4a01d9c3ff83e169387669f663885907" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/4a01d9c3ff83e169387669f663885907</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 16:34:49', 1),
(645, 32, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">gggg，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/1a462b4f1d186cfb19ff495f0e2a1adf" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/1a462b4f1d186cfb19ff495f0e2a1adf</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 16:47:22', 1),
(646, 35, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">ccc，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="<a href=http://ptp.ac371.cn/index.php/user/register/active/hash/53ea9b39ce06a083da535da831b21154>请点击激活邮箱</a>" target="_self"><a href=http://ptp.ac371.cn/index.php/user/register/active/hash/53ea9b39ce06a083da535da831b21154>请点击激活邮箱</a></a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 17:12:23', 1),
(647, 3, '', 1, '1', '2015-03-14 17:21:44', 1),
(648, 3, '', 3, '1', '2015-03-14 17:21:44', 1),
(649, 21, '', 1, '1', '2015-03-14 17:21:44', 1),
(650, 21, '', 3, '1', '2015-03-14 17:21:44', 1),
(651, 21, '', 1, '1', '2015-03-14 17:21:44', 1),
(652, 21, '', 3, '1', '2015-03-14 17:21:44', 1),
(653, 21, '', 1, '1', '2015-03-14 17:21:44', 1),
(654, 21, '', 3, '1', '2015-03-14 17:21:44', 1),
(655, 21, '', 1, '1', '2015-03-14 17:21:44', 1),
(656, 21, '', 3, '1', '2015-03-14 17:21:44', 1),
(657, 21, '', 1, '1', '2015-03-14 17:21:44', 1),
(658, 21, '', 3, '1', '2015-03-14 17:21:44', 1),
(659, 21, '', 1, '1', '2015-03-14 17:21:44', 1),
(660, 21, '', 3, '1', '2015-03-14 17:21:44', 1),
(661, 36, '<a href=http://ptp.ac371.cn/index.php/user/register/active/hash/07a2872375eae15362848fa9f8f9d004>请点击激活邮箱</a>', 2, '1', '2015-03-14 17:22:48', 1),
(662, 37, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">ffgg，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="<a href=''''>请点击激活邮箱</a>" target="_self"><a href=''''>请点击激活邮箱</a></a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 17:32:40', 1),
(663, 38, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">1234，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/8f3f9434e4409986836e283b258e0db2" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/8f3f9434e4409986836e283b258e0db2</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 17:35:54', 1),
(664, 39, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">qqq，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/1bde8a38b6ae382b6ca7cd23fa9739a3" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/1bde8a38b6ae382b6ca7cd23fa9739a3</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 17:38:46', 1),
(665, 40, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hhhh，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="/index.php/user/register/active/hash/cf6b2e652075cf83a96e24f7572298d7" target="_self">/index.php/user/register/active/hash/cf6b2e652075cf83a96e24f7572298d7</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 17:41:42', 1),
(666, 41, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">eeee，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://http://ptp.ac371.cn/index.php/user/register/active/hash/0e8c51b6cd8f8fde0e3cc7a7f61e6485" target="_self">http://http://ptp.ac371.cn/index.php/user/register/active/hash/0e8c51b6cd8f8fde0e3cc7a7f61e6485</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 17:44:55', 1),
(667, 42, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">bbb，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/48b01e720753524168a54cb78176996e" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/48b01e720753524168a54cb78176996e</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 17:46:34', 1),
(668, 43, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">kkk，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/e85ddffa88bc9b328079b68353f54b9e/wo/aaa" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/e85ddffa88bc9b328079b68353f54b9e/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 18:00:20', 1),
(669, 44, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">errr，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/778d9665e7f0dbdf64815ae5e588bbe4/wo/aaa" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/778d9665e7f0dbdf64815ae5e588bbe4/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-14 19:00:14', 1),
(670, 45, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">testzl，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/b9ccb75f293c2aeea7848ae48a5b289d/wo/aaa" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/b9ccb75f293c2aeea7848ae48a5b289d/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-16 11:50:30', 1),
(671, 46, '<p>本邮件来自<a href="http://http://www.ptop.com/">奥晨网贷</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">testzl1，您好。</span>如果您是奥晨网贷的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptp.ac371.cn/index.php/user/register/active/hash/2bf466219629c18767a6ee15981a952b/wo/aaa" target="_self">http://ptp.ac371.cn/index.php/user/register/active/hash/2bf466219629c18767a6ee15981a952b/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 奥晨网贷 管理团队.</p>', 2, '1', '2015-03-16 11:56:10', 1),
(672, 12, '"到期还款"="标名称"],"http://p2p.ac371.com/index.php/loan/index/deal/id/7"="网址","2015-03-19 14:32"="流标时间"', 1, '1', '2015-03-19 14:32:35', 1),
(673, 12, '"到期还款"="标名称"],"http://p2p.ac371.com/index.php/loan/index/deal/id/7"="网址","2015-03-19 14:32"="流标时间"', 3, '1', '2015-03-19 14:32:35', 1),
(674, 11, '"3月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/5"="网址","2015-03-20 14:39"="流标时间"', 1, '1', '2015-03-20 14:39:11', 1),
(675, 11, '"3月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/5"="网址","2015-03-20 14:39"="流标时间"', 3, '1', '2015-03-20 14:39:11', 1),
(676, 3, '"周转"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/2"="网址","2015-03-21 14:47"="流标时间"', 1, '1', '2015-03-21 14:47:52', 1),
(677, 3, '"周转"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/2"="网址","2015-03-21 14:47"="流标时间"', 3, '1', '2015-03-21 14:47:52', 1),
(678, 13, '"3月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/4"="网址","2015-03-22 13:39"="流标时间"', 1, '1', '2015-03-22 13:39:20', 1),
(679, 13, '"3月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/4"="网址","2015-03-22 13:39"="流标时间"', 3, '1', '2015-03-22 13:39:20', 1),
(680, 3, '"3个月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/3"="网址","2015-03-24 14:57"="流标时间"', 1, '1', '2015-03-24 14:57:45', 1),
(681, 3, '"3个月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/3"="网址","2015-03-24 14:57"="流标时间"', 3, '1', '2015-03-24 14:57:45', 1),
(682, 6, '"到期还款"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/8"="网址","2015-03-24 14:57"="流标时间"', 1, '1', '2015-03-24 14:57:45', 1),
(683, 6, '"到期还款"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/8"="网址","2015-03-24 14:57"="流标时间"', 3, '1', '2015-03-24 14:57:45', 1),
(684, 10, '"3月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/6"="网址","2015-03-24 14:57"="流标时间"', 1, '1', '2015-03-24 14:57:45', 1),
(685, 10, '"3月到期"="标名称"],"http://ptp.ac371.com/index.php/loan/index/deal/id/6"="网址","2015-03-24 14:57"="流标时间"', 3, '1', '2015-03-24 14:57:45', 1),
(686, 47, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">省服协，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://p2p.ac371.cn/index.php/user/register/active/hash/2086579734c5f3ec6a7919d12e8e2ea0/wo/aaa" target="_self">http://p2p.ac371.cn/index.php/user/register/active/hash/2086579734c5f3ec6a7919d12e8e2ea0/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-03-25 11:59:50', 1),
(687, 3, '您好test您的这是我的借款标题的贷款通过初次审核\n2015-04-13 20:30:23查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/10', 1, '1', '2015-04-13 20:30:25', 1),
(688, 3, '您好test您的这是我的借款标题的贷款通过初次审核\n2015-04-13 20:30:23查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/10', 3, '1', '2015-04-13 20:30:25', 1),
(689, 48, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">zhaozhaozhao，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/fc751c9c3c826adf1fa2d6f1b8d80336/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/fc751c9c3c826adf1fa2d6f1b8d80336/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-13 20:39:10', 1),
(690, 49, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">yyy，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/5bb6e0df27fc21bc6640068ab19b5726/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/5bb6e0df27fc21bc6640068ab19b5726/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-13 21:07:14', 1),
(691, 50, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/75d6d970caf8f4e3b69b7910cb171ce5/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/75d6d970caf8f4e3b69b7910cb171ce5/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-13 21:49:01', 1),
(692, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/136ce2500339350c9936d6ba8b4adf86/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/136ce2500339350c9936d6ba8b4adf86/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-13 23:11:47', 1);
INSERT INTO `ac_message_log` (`id`, `mes_to`, `content`, `type`, `isok`, `add_time`, `mes_from`) VALUES
(693, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/3b7779f0fb208ffe1cd87f2b748b91b2/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/3b7779f0fb208ffe1cd87f2b748b91b2/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-13 23:19:15', 1),
(694, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/af9c6b2f671155b8f8ed8d9dc9639ba5/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/af9c6b2f671155b8f8ed8d9dc9639ba5/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-13 23:52:24', 1),
(695, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/746f371cc314cefb9e4eecadd676d0ef/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/746f371cc314cefb9e4eecadd676d0ef/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-13 23:57:04', 1),
(696, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/0a47e4afc52264a2bc8b67f1565d16ef/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/0a47e4afc52264a2bc8b67f1565d16ef/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:19:00', 1),
(697, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/05e5896fe8c93ba2634778f0460a8792/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/05e5896fe8c93ba2634778f0460a8792/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:20:07', 1),
(698, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/c546a8dd5f188f4e00768a599c0309c0/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/c546a8dd5f188f4e00768a599c0309c0/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:21:05', 1),
(699, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/938c1446d1af01ce7bb64f2210267573/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/938c1446d1af01ce7bb64f2210267573/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:21:49', 1),
(700, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/8ebde362a59b3508fd3f701d3cc93caa/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/8ebde362a59b3508fd3f701d3cc93caa/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:22:09', 1),
(701, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/0e5595d588a7dacff1d2a4dbaa2a97d2/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/0e5595d588a7dacff1d2a4dbaa2a97d2/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:23:53', 1),
(702, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/35010b525e21dd5a5f0cc5a54f26868a/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/35010b525e21dd5a5f0cc5a54f26868a/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:27:54', 1),
(703, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/f134d443a5c8f0187aea4e77831e7d6a/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/f134d443a5c8f0187aea4e77831e7d6a/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:28:38', 1),
(704, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/1932b78e3f7d9dda2a2c24287b5affa8/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/1932b78e3f7d9dda2a2c24287b5affa8/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:29:37', 1),
(705, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/e9078b9f6510c47d0c39b782feed4a01/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/e9078b9f6510c47d0c39b782feed4a01/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:30:57', 1),
(706, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/36774fd9c3fb77b8afe919542bd1b493/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/36774fd9c3fb77b8afe919542bd1b493/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:42:08', 1),
(707, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/912ebe1d85791fcd144f0a41fc1da081/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/912ebe1d85791fcd144f0a41fc1da081/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:43:07', 1),
(708, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/39f7fcc56f148a089daa67f16eee6b55/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/39f7fcc56f148a089daa67f16eee6b55/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:43:39', 1),
(709, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/8b392a563f183863ec82afbf0ad6a77d/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/8b392a563f183863ec82afbf0ad6a77d/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:43:45', 1),
(710, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/42af3014495f9aa99553bedf996a4107/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/42af3014495f9aa99553bedf996a4107/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:43:58', 1),
(711, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/6513a148c422c89f1371119a1bbfec41/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/6513a148c422c89f1371119a1bbfec41/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:44:06', 1),
(712, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/4067473a79d2e35f647b6f88b1618fa5/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/4067473a79d2e35f647b6f88b1618fa5/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:44:57', 1),
(713, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/e139b70e48b7737c9ffac178d8e4f489/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/e139b70e48b7737c9ffac178d8e4f489/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:45:05', 1),
(714, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/a25204d0e4fdf1b57500f6aa9c1d2e17/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/a25204d0e4fdf1b57500f6aa9c1d2e17/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:45:32', 1),
(715, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/8862290c93a24b64a5edccf61991b024/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/8862290c93a24b64a5edccf61991b024/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:46:16', 1),
(716, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/44bb12b8ce495cf9b66743411c496dc8/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/44bb12b8ce495cf9b66743411c496dc8/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:46:31', 1),
(717, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/bd25261cd24a12d2af50a986080db5cd/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/bd25261cd24a12d2af50a986080db5cd/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:46:40', 1),
(718, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/cc8c89b3cabe7fd19cc1de17cc73ee53/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/cc8c89b3cabe7fd19cc1de17cc73ee53/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '0', '2015-04-14 00:46:46', 1),
(719, 52, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">rrrc，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/a5b6dc053662e36cbd54871fb213e0ce/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/a5b6dc053662e36cbd54871fb213e0ce/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:47:23', 1),
(720, 52, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">rrrc，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/1430243f395b44289b47c3a2b898515e/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/1430243f395b44289b47c3a2b898515e/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:47:48', 1),
(721, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/bd6b2e4831f929b83a9230371a09e5c0/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/bd6b2e4831f929b83a9230371a09e5c0/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-14 00:49:36', 1),
(722, 48, '您好您的3个月到期本息的贷款通过初次审核\n2015-04-14 09:22:59查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/11', 1, '1', '2015-04-14 09:23:00', 1),
(723, 48, '您好您的3个月到期本息的贷款通过初次审核\n2015-04-14 09:22:59查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/11', 3, '1', '2015-04-14 09:23:00', 1),
(724, 53, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">zzhxhs，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/8a5fc51540c9311f7bac0151cf97e72f/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/8a5fc51540c9311f7bac0151cf97e72f/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-15 09:35:24', 1),
(725, 53, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">zzhxhs，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/519f668e4c51dc39be8a874d919f2178/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/519f668e4c51dc39be8a874d919f2178/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-15 09:39:14', 1),
(726, 53, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">zzhxhs，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/cba54ba9f7c9694efe9a7cee5925c58f/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/cba54ba9f7c9694efe9a7cee5925c58f/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-15 09:43:43', 1),
(727, 54, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">rain，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/362716fe4e40106ec52322247484b894/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/362716fe4e40106ec52322247484b894/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-15 10:25:48', 1),
(728, 55, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">rainbow，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/610bf09606d40d64a03ab6a70dc20a48/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/610bf09606d40d64a03ab6a70dc20a48/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-15 19:19:19', 1),
(729, 54, '"xdfxdfdxfg"="标名称"],"http://ptop.imqiyu.com/index.php/loan/index/deal/id/14"="网址","2015-04-15 19:28"="流标时间"', 1, '1', '2015-04-15 19:28:58', 1),
(730, 54, '"xdfxdfdxfg"="标名称"],"http://ptop.imqiyu.com/index.php/loan/index/deal/id/14"="网址","2015-04-15 19:28"="流标时间"', 3, '1', '2015-04-15 19:28:58', 1),
(731, 56, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">fskfjk，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/40716f4b4cd7c3288c4b1693bc7516d2/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/40716f4b4cd7c3288c4b1693bc7516d2/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-15 20:20:36', 1),
(732, 56, '您好您的不能审核吗不能审核吗的贷款通过初次审核\n2015-04-15 20:22:45查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/16', 1, '1', '2015-04-15 20:22:46', 1),
(733, 56, '您好您的不能审核吗不能审核吗的贷款通过初次审核\n2015-04-15 20:22:45查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/16', 3, '1', '2015-04-15 20:22:46', 1),
(734, 56, '您好您的个月到期本个月到期本的贷款通过初次审核\n2015-04-15 20:24:26查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/17', 1, '1', '2015-04-15 20:24:26', 1),
(735, 56, '您好您的个月到期本个月到期本的贷款通过初次审核\n2015-04-15 20:24:26查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/17', 3, '1', '2015-04-15 20:24:26', 1),
(736, 56, '您好您的tttttt的贷款通过初次审核\n2015-04-16 00:01:18查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/18', 1, '1', '2015-04-16 00:01:19', 1),
(737, 56, '您好您的tttttt的贷款通过初次审核\n2015-04-16 00:01:18查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/18', 3, '1', '2015-04-16 00:01:19', 1),
(738, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/ccb3499a66d716ac7d3f3dbb04954ca1/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/ccb3499a66d716ac7d3f3dbb04954ca1/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-16 15:50:59', 1),
(739, 51, '<p>本邮件来自<a href="http://http:p2p.ac371.cn">慧谷创投</a><br/><br/>&nbsp; &nbsp;<strong>---------------</strong><br/>&nbsp; &nbsp;<strong>帐号激活说明</strong><br/>&nbsp; &nbsp;<strong>---------------</strong><br/><br/>&nbsp; &nbsp; 尊敬的<span style="FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)">hjh，您好。</span>如果您是慧谷创投的新用户，或在修改您的注册Email时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br/>&nbsp; &nbsp; 您只需点击下面的链接即可激活您的帐号：<br/>&nbsp; &nbsp; <a title="" href="http://ptop.imqiyu.com/index.php/user/register/active/hash/eb97f36922c1d1fe6f27a0367d209a56/wo/aaa" target="_self">http://ptop.imqiyu.com/index.php/user/register/active/hash/eb97f36922c1d1fe6f27a0367d209a56/wo/aaa</a><br/>&nbsp; &nbsp; (如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br/>&nbsp; &nbsp; 感谢您的访问，祝您使用愉快！<br/><br/>&nbsp; &nbsp; 此致<br/>&nbsp; &nbsp; 慧谷创投 管理团队.</p>', 2, '1', '2015-04-16 15:52:01', 1),
(740, 54, '您好rain您的yyy的贷款通过初次审核\n2015-04-17 10:30:00查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/21', 1, '1', '2015-04-17 10:30:00', 1),
(741, 54, '您好rain您的yyy的贷款通过初次审核\n2015-04-17 10:30:00查看http://ptop.imqiyu.com/index.php/loan/index/deal/id/21', 3, '1', '2015-04-17 10:30:00', 1),
(742, 54, '您好，rain，\n您的yyy标于2015-04-17 10:44:18已经投标过半。\n详情请点击这个连接http://ptop.imqiyu.com/index.php/loan/index/deal/id/21', 1, '1', '2015-04-17 10:44:18', 1),
(743, 54, '请用慧谷创投代替网站名称,http:p2p.ac371.cn替代网站域名,rain代替"贷款用户名";yyy代替"贷款名称";2015-04-17 10:46:51代替"满标时间";http://ptop.imqiyu.com/index.php/loan/index/deal/id/21代替"贷款展示网址";', 3, '1', '2015-04-17 10:46:51', 1),
(744, 54, '"rain"="用户","yyy"="标名称","通过满标复审审核并放款"="状态","2015-04-17 10:49:37"="审核时间","http://ptop.imqiyu.com/index.php/loan/index/deal/id/21"="网址"', 1, '1', '2015-04-17 10:49:38', 1),
(745, 54, '"rain"="用户","yyy"="标名称","通过满标复审审核并放款"="状态","2015-04-17 10:49:37"="审核时间","http://ptop.imqiyu.com/index.php/loan/index/deal/id/21"="网址111"', 3, '1', '2015-04-17 10:49:38', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ac_money`
--

CREATE TABLE IF NOT EXISTS `ac_money` (
  `topupfees` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT '已用免费充值额度',
  `withdrawalfrees` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT '已用免费提现额度',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `total_money` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '总钱数',
  `available_funds` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '可用资金',
  `freeze_funds` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '冻结资金',
  `due_in` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '待收资金',
  `stay_still` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '待还资金=本金+利息 没有加管理费',
  `stay_interest` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '待收利息',
  `make_interest` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '已赚利息',
  `make_reward` decimal(15,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '已赚奖励',
  `overdue` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '逾期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- 转存表中的数据 `ac_money`
--

INSERT INTO `ac_money` (`topupfees`, `withdrawalfrees`, `id`, `uid`, `total_money`, `available_funds`, `freeze_funds`, `due_in`, `stay_still`, `stay_interest`, `make_interest`, `make_reward`, `overdue`) VALUES
(0.00, 0.00, 1, 1, 4035.50, 4035.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 2, 2, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(1000.00, -20000.00, 3, 3, 18974.48, 18874.48, 100.00, 0.00, 11425.77, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 4, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 5, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 6, 7, 45271.02, 45271.02, 0.00, 5124.47, 0.00, 150.50, 399.41, 0.00, 0.00),
(0.00, 0.00, 7, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 8, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 9, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 10, 14, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 12, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 13, 16, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(1000.00, 0.00, 14, 17, 9950.00, 9950.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 15, 18, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 16, 19, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 17, 20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(1000.00, 0.00, 18, 21, 9994049.06, 9994049.06, 0.00, 6049.72, 0.00, 101.10, 150.28, 0.00, 0.00),
(0.00, 0.00, 19, 22, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 20, 23, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 21, 24, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 40, 43, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 41, 44, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 42, 45, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 43, 46, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 44, 47, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 45, 48, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 46, 49, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 47, 50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 48, 51, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 49, 52, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 50, 53, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(1000.00, -43320.00, 51, 54, 20000.00, 20000.00, 0.00, 0.00, 46968.00, 0.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 52, 55, 34400.00, 34400.00, 0.00, 45600.00, 0.00, 1368.00, 0.00, 0.00, 0.00),
(0.00, 0.00, 53, 56, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- 表的结构 `ac_money_error_log`
--

CREATE TABLE IF NOT EXISTS `ac_money_error_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `actionname` varchar(300) NOT NULL,
  `page` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0带查看1查看过2是处理过',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `ac_money_error_log`
--

INSERT INTO `ac_money_error_log` (`id`, `uid`, `actionname`, `page`, `time`, `ip`, `state`) VALUES
(1, 13, 'wuhaofz502', 'User/Account/review', 1426312120, '218.29.89.218', 0),
(2, 13, 'wuhaofz502', 'User/Account/review', 1426312133, '218.29.89.218', 0),
(3, 13, 'wuhaofz502', 'User/Account/review', 1426312153, '218.29.89.218', 0),
(4, 13, 'wuhaofz502', 'User/Account/review', 1426312902, '218.29.89.218', 0),
(5, 13, 'wuhaofz502', 'User/Account/review', 1426317934, '218.29.89.218', 0),
(6, 54, 'rain用户提现:系统收取提现手续费操作失败', 'User/Account/cash_review', 1429257466, '106.42.250.126', 0),
(7, 54, 'rain用户提现:系统收取提现手续费操作失败', 'User/Account/cash_review', 1429257470, '106.42.250.126', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ac_money_log`
--

CREATE TABLE IF NOT EXISTS `ac_money_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '当前帐号',
  `type` tinyint(1) NOT NULL COMMENT '1充值 2冻结 3支付 4提现 5收款',
  `actionname` varchar(40) NOT NULL,
  `total_money` decimal(20,2) NOT NULL,
  `available_funds` decimal(20,2) NOT NULL,
  `freeze_funds` decimal(20,2) NOT NULL,
  `operation` decimal(20,2) NOT NULL,
  `counterparty` varchar(16) NOT NULL COMMENT '对方帐号',
  `time` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- 转存表中的数据 `ac_money_log`
--

INSERT INTO `ac_money_log` (`id`, `uid`, `type`, `actionname`, `total_money`, `available_funds`, `freeze_funds`, `operation`, `counterparty`, `time`, `ip`) VALUES
(1, 7, 2, '编号ID1的投标,冻结资金:1000', 50000.00, 49000.00, 1000.00, -1000.00, '平台', 1424842017, '127.0.0.1'),
(2, 7, 2, '编号ID1的投标,冻结资金:1000', 50000.00, 48000.00, 2000.00, -1000.00, '平台', 1424842028, '127.0.0.1'),
(3, 7, 2, '编号ID1的投标,冻结资金:5000', 50000.00, 43000.00, 7000.00, -5000.00, '平台', 1424842047, '127.0.0.1'),
(4, 7, 2, '编号ID1的投标,冻结资金:3000', 50000.00, 40000.00, 10000.00, -3000.00, '平台', 1424842173, '127.0.0.1'),
(5, 7, 3, '支付标号id:1的投标资金1000.00', 49000.00, 40000.00, 9000.00, -1000.00, '平台', 1424843690, '127.0.0.1'),
(6, 7, 3, '支付标号id:1的投标资金1000.00', 48000.00, 40000.00, 8000.00, -1000.00, '平台', 1424843690, '127.0.0.1'),
(7, 7, 3, '支付标号id:1的投标资金5000.00', 43000.00, 40000.00, 3000.00, -5000.00, '平台', 1424843690, '127.0.0.1'),
(8, 7, 3, '支付标号id:1的投标资金3000.00', 40000.00, 40000.00, 0.00, -3000.00, '平台', 1424843690, '127.0.0.1'),
(9, 3, 6, '标号ID:1审核成功系统放款10000.00', 10000.00, 10000.00, 0.00, 10000.00, '平台', 1424843690, '127.0.0.1'),
(10, 3, 3, '标:1,期:1,偿还本息', 9120.84, 9120.84, 0.00, -879.16, '平台', 1424844737, '127.0.0.1'),
(11, 3, 7, '标:1,期:1,支付管理费用', 8920.84, 8920.84, 0.00, -200.00, '平台', 1424844737, '127.0.0.1'),
(12, 7, 5, '标:1,期:1回报本息', 40087.92, 40087.92, 0.00, 87.92, '平台', 1424844741, '127.0.0.1'),
(13, 7, 7, '标:1,期:1管理费', 40087.84, 40087.84, 0.00, -0.08, '平台', 1424844741, '127.0.0.1'),
(14, 7, 5, '标:1,期:1回报本息', 40175.76, 40175.76, 0.00, 87.92, '平台', 1424844741, '127.0.0.1'),
(15, 7, 7, '标:1,期:1管理费', 40175.68, 40175.68, 0.00, -0.08, '平台', 1424844741, '127.0.0.1'),
(16, 7, 5, '标:1,期:1回报本息', 40615.26, 40615.26, 0.00, 439.58, '平台', 1424844741, '127.0.0.1'),
(17, 7, 7, '标:1,期:1管理费', 40614.84, 40614.84, 0.00, -0.42, '平台', 1424844741, '127.0.0.1'),
(18, 7, 5, '标:1,期:1回报本息', 40878.59, 40878.59, 0.00, 263.75, '平台', 1424844741, '127.0.0.1'),
(19, 7, 7, '标:1,期:1管理费', 40878.34, 40878.34, 0.00, -0.25, '平台', 1424844741, '127.0.0.1'),
(20, 3, 3, '标:1,期:2,偿还本息', 8041.68, 8041.68, 0.00, -879.16, '平台', 1424844943, '127.0.0.1'),
(21, 3, 7, '标:1,期:2,支付管理费用', 7841.68, 7841.68, 0.00, -200.00, '平台', 1424844943, '127.0.0.1'),
(22, 3, 3, '标:1,期:3,偿还本息', 6962.52, 6962.52, 0.00, -879.16, '平台', 1424844943, '127.0.0.1'),
(23, 3, 7, '标:1,期:3,支付管理费用', 6762.52, 6762.52, 0.00, -200.00, '平台', 1424844943, '127.0.0.1'),
(24, 7, 5, '标:1,期:2回报本息', 40966.26, 40966.26, 0.00, 87.92, '平台', 1424844944, '127.0.0.1'),
(25, 7, 7, '标:1,期:2管理费', 40966.18, 40966.18, 0.00, -0.08, '平台', 1424844944, '127.0.0.1'),
(26, 7, 5, '标:1,期:3回报本息', 41054.10, 41054.10, 0.00, 87.92, '平台', 1424844944, '127.0.0.1'),
(27, 7, 7, '标:1,期:3管理费', 41054.03, 41054.03, 0.00, -0.07, '平台', 1424844944, '127.0.0.1'),
(28, 7, 5, '标:1,期:2回报本息', 41141.95, 41141.95, 0.00, 87.92, '平台', 1424844944, '127.0.0.1'),
(29, 7, 7, '标:1,期:2管理费', 41141.87, 41141.87, 0.00, -0.08, '平台', 1424844944, '127.0.0.1'),
(30, 7, 5, '标:1,期:3回报本息', 41229.79, 41229.79, 0.00, 87.92, '平台', 1424844945, '127.0.0.1'),
(31, 7, 7, '标:1,期:3管理费', 41229.72, 41229.72, 0.00, -0.07, '平台', 1424844945, '127.0.0.1'),
(32, 7, 5, '标:1,期:2回报本息', 41669.30, 41669.30, 0.00, 439.58, '平台', 1424844945, '127.0.0.1'),
(33, 7, 7, '标:1,期:2管理费', 41668.92, 41668.92, 0.00, -0.38, '平台', 1424844945, '127.0.0.1'),
(34, 7, 5, '标:1,期:3回报本息', 42108.50, 42108.50, 0.00, 439.58, '平台', 1424844945, '127.0.0.1'),
(35, 7, 7, '标:1,期:3管理费', 42108.15, 42108.15, 0.00, -0.35, '平台', 1424844945, '127.0.0.1'),
(36, 7, 5, '标:1,期:2回报本息', 42371.90, 42371.90, 0.00, 263.75, '平台', 1424844945, '127.0.0.1'),
(37, 7, 7, '标:1,期:2管理费', 42371.67, 42371.67, 0.00, -0.23, '平台', 1424844945, '127.0.0.1'),
(38, 7, 5, '标:1,期:3回报本息', 42635.42, 42635.42, 0.00, 263.75, '平台', 1424844945, '127.0.0.1'),
(39, 7, 7, '标:1,期:3管理费', 42635.21, 42635.21, 0.00, -0.21, '平台', 1424844945, '127.0.0.1'),
(40, 3, 3, '标:1,期:4,偿还本息', 5883.36, 5883.36, 0.00, -879.16, '平台', 1424846017, '127.0.0.1'),
(41, 3, 7, '标:1,期:4,支付管理费用', 5683.36, 5683.36, 0.00, -200.00, '平台', 1424846017, '127.0.0.1'),
(42, 7, 5, '标:1,期:4回报本息', 42723.13, 42723.13, 0.00, 87.92, '平台', 1424846020, '127.0.0.1'),
(43, 7, 7, '标:1,期:4管理费', 42723.07, 42723.07, 0.00, -0.06, '平台', 1424846020, '127.0.0.1'),
(44, 7, 5, '标:1,期:4回报本息', 42810.99, 42810.99, 0.00, 87.92, '平台', 1424846020, '127.0.0.1'),
(45, 7, 7, '标:1,期:4管理费', 42810.93, 42810.93, 0.00, -0.06, '平台', 1424846020, '127.0.0.1'),
(46, 7, 5, '标:1,期:4回报本息', 43250.51, 43250.51, 0.00, 439.58, '平台', 1424846021, '127.0.0.1'),
(47, 7, 7, '标:1,期:4管理费', 43250.19, 43250.19, 0.00, -0.32, '平台', 1424846021, '127.0.0.1'),
(48, 7, 5, '标:1,期:4回报本息', 43513.94, 43513.94, 0.00, 263.75, '平台', 1424846021, '127.0.0.1'),
(49, 7, 7, '标:1,期:4管理费', 43513.75, 43513.75, 0.00, -0.19, '平台', 1424846021, '127.0.0.1'),
(50, 3, 3, '标:1,期:5,偿还本息', 4804.20, 4804.20, 0.00, -879.16, '平台', 1424846200, '127.0.0.1'),
(51, 3, 7, '标:1,期:5,支付管理费用', 4604.20, 4604.20, 0.00, -200.00, '平台', 1424846200, '127.0.0.1'),
(52, 7, 5, '标:1,期:5回报本息', 43601.67, 43601.67, 0.00, 87.92, '平台', 1424846201, '127.0.0.1'),
(53, 7, 7, '标:1,期:5管理费', 43601.61, 43601.61, 0.00, -0.06, '平台', 1424846201, '127.0.0.1'),
(54, 7, 5, '标:1,期:5回报本息', 43689.53, 43689.53, 0.00, 87.92, '平台', 1424846201, '127.0.0.1'),
(55, 7, 7, '标:1,期:5管理费', 43689.47, 43689.47, 0.00, -0.06, '平台', 1424846201, '127.0.0.1'),
(56, 7, 5, '标:1,期:5回报本息', 44129.05, 44129.05, 0.00, 439.58, '平台', 1424846201, '127.0.0.1'),
(57, 7, 7, '标:1,期:5管理费', 44128.77, 44128.77, 0.00, -0.28, '平台', 1424846202, '127.0.0.1'),
(58, 7, 5, '标:1,期:5回报本息', 44392.52, 44392.52, 0.00, 263.75, '平台', 1424846202, '127.0.0.1'),
(59, 7, 7, '标:1,期:5管理费', 44392.35, 44392.35, 0.00, -0.17, '平台', 1424846202, '127.0.0.1'),
(60, 3, 7, '充值手续费', 14554.20, 14554.20, 0.00, -50.00, '平台', 1424846793, '127.0.0.1'),
(61, 3, 3, '标:1,期:6,偿还本息', 13675.04, 13675.04, 0.00, -879.16, '平台', 1426054398, '218.29.89.218'),
(62, 3, 7, '标:1,期:6,支付管理费用', 13475.04, 13475.04, 0.00, -200.00, '平台', 1426054398, '218.29.89.218'),
(63, 7, 5, '标:1,期:6回报本息', 44480.27, 44480.27, 0.00, 87.92, '平台', 1426054399, '218.29.89.218'),
(64, 7, 7, '标:1,期:6管理费', 44480.22, 44480.22, 0.00, -0.05, '平台', 1426054399, '218.29.89.218'),
(65, 7, 5, '标:1,期:6回报本息', 44568.14, 44568.14, 0.00, 87.92, '平台', 1426054400, '218.29.89.218'),
(66, 7, 7, '标:1,期:6管理费', 44568.09, 44568.09, 0.00, -0.05, '平台', 1426054400, '218.29.89.218'),
(67, 7, 5, '标:1,期:6回报本息', 45007.67, 45007.67, 0.00, 439.58, '平台', 1426054400, '218.29.89.218'),
(68, 7, 7, '标:1,期:6管理费', 45007.42, 45007.42, 0.00, -0.25, '平台', 1426054400, '218.29.89.218'),
(69, 7, 5, '标:1,期:6回报本息', 45271.17, 45271.17, 0.00, 263.75, '平台', 1426054400, '218.29.89.218'),
(70, 7, 7, '标:1,期:6管理费', 45271.02, 45271.02, 0.00, -0.15, '平台', 1426054400, '218.29.89.218'),
(71, 17, 7, '充值手续费', 9950.00, 9950.00, 0.00, -50.00, '平台', 1426314463, '218.29.89.218'),
(72, 17, 2, '编号ID2的投标,冻结资金:1000', 9950.00, 8950.00, 1000.00, -1000.00, '平台', 1426314543, '218.29.89.218'),
(73, 21, 7, '充值手续费', 9999950.00, 9999950.00, 0.00, -50.00, '平台', 1426319499, '218.29.89.218'),
(74, 21, 2, '编号ID9的投标,冻结资金:5000', 9999950.00, 9994950.00, 5000.00, -5000.00, '平台', 1426319531, '218.29.89.218'),
(75, 21, 2, '编号ID9的投标,冻结资金:3000', 9999950.00, 9991950.00, 8000.00, -3000.00, '平台', 1426319543, '218.29.89.218'),
(76, 21, 2, '编号ID9的投标,冻结资金:2000', 9999950.00, 9989950.00, 10000.00, -2000.00, '平台', 1426319574, '218.29.89.218'),
(77, 21, 3, '支付标号id:9的投标资金5000.00', 9994950.00, 9989950.00, 5000.00, -5000.00, '平台', 1426319648, '218.29.89.218'),
(78, 21, 3, '支付标号id:9的投标资金3000.00', 9991950.00, 9989950.00, 2000.00, -3000.00, '平台', 1426319648, '218.29.89.218'),
(79, 21, 3, '支付标号id:9的投标资金2000.00', 9989950.00, 9989950.00, 0.00, -2000.00, '平台', 1426319648, '218.29.89.218'),
(80, 3, 6, '标号ID:9审核成功系统放款10000.00', 23475.04, 23475.04, 0.00, 10000.00, '平台', 1426319648, '218.29.89.218'),
(81, 21, 2, '编号ID8的投标,冻结资金:3000', 9989950.00, 9986950.00, 3000.00, -3000.00, '平台', 1426322761, '218.29.89.218'),
(82, 3, 3, '标:9,期:1,偿还本息', 21424.76, 21424.76, 0.00, -2050.28, '平台', 1426324903, '218.29.89.218'),
(83, 3, 7, '标:9,期:1,支付管理费用', 21224.76, 21224.76, 0.00, -200.00, '平台', 1426324903, '218.29.89.218'),
(84, 3, 3, '标:9,期:2,偿还本息', 19174.48, 19174.48, 0.00, -2050.28, '平台', 1426324903, '218.29.89.218'),
(85, 3, 7, '标:9,期:2,支付管理费用', 18974.48, 18974.48, 0.00, -200.00, '平台', 1426324903, '218.29.89.218'),
(86, 21, 5, '标:9,期:1回报本息', 9990975.14, 9987975.14, 3000.00, 1025.14, '平台', 1426324904, '218.29.89.218'),
(87, 21, 7, '标:9,期:1管理费', 9990974.72, 9987974.72, 3000.00, -0.42, '平台', 1426324904, '218.29.89.218'),
(88, 21, 5, '标:9,期:2回报本息', 9991999.86, 9988999.86, 3000.00, 1025.14, '平台', 1426324904, '218.29.89.218'),
(89, 21, 7, '标:9,期:2管理费', 9991999.53, 9988999.53, 3000.00, -0.33, '平台', 1426324904, '218.29.89.218'),
(90, 21, 5, '标:9,期:1回报本息', 9992614.61, 9989614.61, 3000.00, 615.08, '平台', 1426324904, '218.29.89.218'),
(91, 21, 7, '标:9,期:1管理费', 9992614.36, 9989614.36, 3000.00, -0.25, '平台', 1426324904, '218.29.89.218'),
(92, 21, 5, '标:9,期:2回报本息', 9993229.44, 9990229.44, 3000.00, 615.08, '平台', 1426324904, '218.29.89.218'),
(93, 21, 7, '标:9,期:2管理费', 9993229.24, 9990229.24, 3000.00, -0.20, '平台', 1426324904, '218.29.89.218'),
(94, 21, 5, '标:9,期:1回报本息', 9993639.30, 9990639.30, 3000.00, 410.06, '平台', 1426324904, '218.29.89.218'),
(95, 21, 7, '标:9,期:1管理费', 9993639.13, 9990639.13, 3000.00, -0.17, '平台', 1426324904, '218.29.89.218'),
(96, 21, 5, '标:9,期:2回报本息', 9994049.19, 9991049.19, 3000.00, 410.06, '平台', 1426324904, '218.29.89.218'),
(97, 21, 7, '标:9,期:2管理费', 9994049.06, 9991049.06, 3000.00, -0.13, '平台', 1426324904, '218.29.89.218'),
(98, 17, 8, '标号id:2流标,恢复冻结资金1000.00', 9950.00, 9950.00, 0.00, 1000.00, '平台', 1426920470, '183.136.133.44'),
(99, 21, 8, '标号id:8流标,恢复冻结资金3000.00', 9994049.06, 9994049.06, 0.00, 3000.00, '平台', 1427180265, '61.240.144.32'),
(100, 55, 2, '编号ID21的投标,冻结资金:40000', 80000.00, 40000.00, 40000.00, -40000.00, '平台', 1429238658, '123.149.223.203'),
(101, 55, 2, '编号ID21的投标,冻结资金:3000', 80000.00, 37000.00, 43000.00, -3000.00, '平台', 1429238765, '123.149.223.203'),
(102, 55, 2, '编号ID21的投标,冻结资金:2600', 80000.00, 34400.00, 45600.00, -2600.00, '平台', 1429238811, '123.149.223.203'),
(103, 55, 3, '支付标号id:21的投标资金40000.00', 40000.00, 34400.00, 5600.00, -40000.00, '平台', 1429238977, '123.149.223.203'),
(104, 55, 3, '支付标号id:21的投标资金3000.00', 37000.00, 34400.00, 2600.00, -3000.00, '平台', 1429238977, '123.149.223.203'),
(105, 55, 3, '支付标号id:21的投标资金2600.00', 34400.00, 34400.00, 0.00, -2600.00, '平台', 1429238977, '123.149.223.203'),
(106, 54, 6, '标号ID:21审核成功系统放款45600.00', 45600.00, 45600.00, 0.00, 45600.00, '平台', 1429238977, '123.149.223.203'),
(107, 54, 7, '标号ID:21成交手续费2280', 47880.00, 43320.00, 0.00, -2280.00, '平台', 1429238977, '123.149.223.203'),
(108, 3, 2, '用户申请提现', 18974.48, 18874.48, 100.00, -100.00, '平台', 1429240363, '218.29.89.218'),
(109, 54, 2, '用户申请提现', 47880.00, 43220.00, 100.00, -100.00, '平台', 1429255951, '218.29.89.218'),
(110, 54, 2, '用户申请提现', 47880.00, 43120.00, 200.00, -100.00, '平台', 1429256591, '218.29.89.218'),
(111, 54, 2, '用户申请提现', 47880.00, 0.00, 43320.00, -43120.00, '平台', 1429257393, '106.42.250.126'),
(112, 54, 1, '用户充值', 20000.00, 20000.00, 0.00, 20000.00, '平台', 1429257981, '106.42.250.126');

-- --------------------------------------------------------

--
-- 表的结构 `ac_money_sys_log`
--

CREATE TABLE IF NOT EXISTS `ac_money_sys_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '当前帐号',
  `type` tinyint(1) NOT NULL COMMENT '1手续费',
  `actionname` varchar(40) NOT NULL,
  `total_money` decimal(20,2) NOT NULL,
  `available_funds` decimal(20,2) NOT NULL,
  `operation` decimal(20,2) NOT NULL,
  `counterparty` int(11) NOT NULL COMMENT '对方帐号',
  `time` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `ac_money_sys_log`
--

INSERT INTO `ac_money_sys_log` (`id`, `uid`, `type`, `actionname`, `total_money`, `available_funds`, `operation`, `counterparty`, `time`, `ip`) VALUES
(1, 0, 3, '标:1,期:1,借款管理费', 200.00, 200.00, 200.00, 3, 1424844737, '127.0.0.1'),
(2, 0, 1, '用户7,标:1,期:1管理费', 200.08, 200.08, 0.08, 7, 1424844741, '127.0.0.1'),
(3, 0, 1, '用户7,标:1,期:1管理费', 200.16, 200.16, 0.08, 7, 1424844741, '127.0.0.1'),
(4, 0, 1, '用户7,标:1,期:1管理费', 200.58, 200.58, 0.42, 7, 1424844741, '127.0.0.1'),
(5, 0, 1, '用户7,标:1,期:1管理费', 200.83, 200.83, 0.25, 7, 1424844741, '127.0.0.1'),
(6, 0, 3, '标:1,期:2,借款管理费', 400.83, 400.83, 200.00, 3, 1424844943, '127.0.0.1'),
(7, 0, 3, '标:1,期:3,借款管理费', 600.83, 600.83, 200.00, 3, 1424844943, '127.0.0.1'),
(8, 0, 1, '用户7,标:1,期:2管理费', 600.91, 600.91, 0.08, 7, 1424844944, '127.0.0.1'),
(9, 0, 1, '用户7,标:1,期:3管理费', 600.98, 600.98, 0.07, 7, 1424844944, '127.0.0.1'),
(10, 0, 1, '用户7,标:1,期:2管理费', 601.06, 601.06, 0.08, 7, 1424844944, '127.0.0.1'),
(11, 0, 1, '用户7,标:1,期:3管理费', 601.13, 601.13, 0.07, 7, 1424844945, '127.0.0.1'),
(12, 0, 1, '用户7,标:1,期:2管理费', 601.51, 601.51, 0.38, 7, 1424844945, '127.0.0.1'),
(13, 0, 1, '用户7,标:1,期:3管理费', 601.86, 601.86, 0.35, 7, 1424844945, '127.0.0.1'),
(14, 0, 1, '用户7,标:1,期:2管理费', 602.09, 602.09, 0.23, 7, 1424844945, '127.0.0.1'),
(15, 0, 1, '用户7,标:1,期:3管理费', 602.30, 602.30, 0.21, 7, 1424844946, '127.0.0.1'),
(16, 0, 3, '标:1,期:4,借款管理费', 802.30, 802.30, 200.00, 3, 1424846017, '127.0.0.1'),
(17, 0, 1, '用户7,标:1,期:4管理费', 802.36, 802.36, 0.06, 7, 1424846020, '127.0.0.1'),
(18, 0, 1, '用户7,标:1,期:4管理费', 802.42, 802.42, 0.06, 7, 1424846020, '127.0.0.1'),
(19, 0, 1, '用户7,标:1,期:4管理费', 802.74, 802.74, 0.32, 7, 1424846021, '127.0.0.1'),
(20, 0, 1, '用户7,标:1,期:4管理费', 802.93, 802.93, 0.19, 7, 1424846021, '127.0.0.1'),
(21, 0, 3, '标:1,期:5,借款管理费', 1002.93, 1002.93, 200.00, 3, 1424846200, '127.0.0.1'),
(22, 0, 1, '用户7,标:1,期:5管理费', 1002.99, 1002.99, 0.06, 7, 1424846201, '127.0.0.1'),
(23, 0, 1, '用户7,标:1,期:5管理费', 1003.05, 1003.05, 0.06, 7, 1424846201, '127.0.0.1'),
(24, 0, 1, '用户7,标:1,期:5管理费', 1003.33, 1003.33, 0.28, 7, 1424846202, '127.0.0.1'),
(25, 0, 1, '用户7,标:1,期:5管理费', 1003.50, 1003.50, 0.17, 7, 1424846202, '127.0.0.1'),
(26, 1, 7, '系统收取充值手续费', 1053.50, 1053.50, 50.00, 3, 1424846793, '127.0.0.1'),
(27, 0, 3, '标:1,期:6,借款管理费', 1253.50, 1253.50, 200.00, 3, 1426054398, '218.29.89.218'),
(28, 0, 1, '用户7,标:1,期:6管理费', 1253.55, 1253.55, 0.05, 7, 1426054399, '218.29.89.218'),
(29, 0, 1, '用户7,标:1,期:6管理费', 1253.60, 1253.60, 0.05, 7, 1426054400, '218.29.89.218'),
(30, 0, 1, '用户7,标:1,期:6管理费', 1253.85, 1253.85, 0.25, 7, 1426054400, '218.29.89.218'),
(31, 0, 1, '用户7,标:1,期:6管理费', 1254.00, 1254.00, 0.15, 7, 1426054400, '218.29.89.218'),
(32, 1, 7, '系统收取充值手续费', 1304.00, 1304.00, 50.00, 17, 1426314463, '218.29.89.218'),
(33, 1, 7, '系统收取充值手续费', 1354.00, 1354.00, 50.00, 21, 1426319499, '218.29.89.218'),
(34, 0, 3, '标:9,期:1,借款管理费', 1554.00, 1554.00, 200.00, 3, 1426324903, '218.29.89.218'),
(35, 0, 3, '标:9,期:2,借款管理费', 1754.00, 1754.00, 200.00, 3, 1426324903, '218.29.89.218'),
(36, 0, 1, '用户21,标:9,期:1管理费', 1754.42, 1754.42, 0.42, 21, 1426324904, '218.29.89.218'),
(37, 0, 1, '用户21,标:9,期:2管理费', 1754.75, 1754.75, 0.33, 21, 1426324904, '218.29.89.218'),
(38, 0, 1, '用户21,标:9,期:1管理费', 1755.00, 1755.00, 0.25, 21, 1426324904, '218.29.89.218'),
(39, 0, 1, '用户21,标:9,期:2管理费', 1755.20, 1755.20, 0.20, 21, 1426324904, '218.29.89.218'),
(40, 0, 1, '用户21,标:9,期:1管理费', 1755.37, 1755.37, 0.17, 21, 1426324904, '218.29.89.218'),
(41, 0, 1, '用户21,标:9,期:2管理费', 1755.50, 1755.50, 0.13, 21, 1426324904, '218.29.89.218'),
(42, 0, 1, '成交服务费', 4035.50, 4035.50, 2280.00, 54, 1429238977, '123.149.223.203');

-- --------------------------------------------------------

--
-- 表的结构 `ac_nav`
--

CREATE TABLE IF NOT EXISTS `ac_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `target` varchar(50) DEFAULT NULL,
  `href` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `listorder` int(6) DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ac_nav`
--

INSERT INTO `ac_nav` (`id`, `cid`, `parentid`, `label`, `target`, `href`, `icon`, `status`, `listorder`, `path`) VALUES
(1, 1, 0, '首页', '', 'home', '', 1, 0, '0-1'),
(2, 1, 0, '列表演示', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"1";}}', '', 1, 0, '0-2'),
(3, 1, 0, '瀑布流', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"2";}}', '', 1, 0, '0-3');

-- --------------------------------------------------------

--
-- 表的结构 `ac_nav_cat`
--

CREATE TABLE IF NOT EXISTS `ac_nav_cat` (
  `navcid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `remark` text,
  PRIMARY KEY (`navcid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ac_nav_cat`
--

INSERT INTO `ac_nav_cat` (`navcid`, `name`, `active`, `remark`) VALUES
(1, '主导航', 1, '主导航');

-- --------------------------------------------------------

--
-- 表的结构 `ac_oauth_user`
--

CREATE TABLE IF NOT EXISTS `ac_oauth_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `from` varchar(20) NOT NULL COMMENT '用户来源key',
  `name` varchar(30) NOT NULL COMMENT '第三方昵称',
  `head_img` varchar(200) NOT NULL COMMENT '头像',
  `uid` int(20) NOT NULL COMMENT '关联的本站用户id',
  `create_time` datetime NOT NULL COMMENT '绑定时间',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `login_times` int(6) NOT NULL COMMENT '登录次数',
  `status` tinyint(2) NOT NULL,
  `access_token` varchar(60) NOT NULL,
  `expires_date` int(12) NOT NULL COMMENT 'access_token过期时间',
  `openid` varchar(40) NOT NULL COMMENT '第三方用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ac_oauth_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_options`
--

CREATE TABLE IF NOT EXISTS `ac_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ac_options`
--

INSERT INTO `ac_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'member_email_active', '{"title":"ThinkCMF\\u90ae\\u4ef6\\u6fc0\\u6d3b\\u901a\\u77e5.","template":"<p>\\u672c\\u90ae\\u4ef6\\u6765\\u81ea<a href=\\"http:\\/\\/www.thinkcmf.com\\">ThinkCMF<\\/a><br\\/><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/>&nbsp; &nbsp;<strong>\\u5e10\\u53f7\\u6fc0\\u6d3b\\u8bf4\\u660e<\\/strong><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/><br\\/>&nbsp; &nbsp; \\u5c0a\\u656c\\u7684<span style=\\"FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)\\">#username#\\uff0c\\u60a8\\u597d\\u3002<\\/span>\\u5982\\u679c\\u60a8\\u662fThinkCMF\\u7684\\u65b0\\u7528\\u6237\\uff0c\\u6216\\u5728\\u4fee\\u6539\\u60a8\\u7684\\u6ce8\\u518cEmail\\u65f6\\u4f7f\\u7528\\u4e86\\u672c\\u5730\\u5740\\uff0c\\u6211\\u4eec\\u9700\\u8981\\u5bf9\\u60a8\\u7684\\u5730\\u5740\\u6709\\u6548\\u6027\\u8fdb\\u884c\\u9a8c\\u8bc1\\u4ee5\\u907f\\u514d\\u5783\\u573e\\u90ae\\u4ef6\\u6216\\u5730\\u5740\\u88ab\\u6ee5\\u7528\\u3002<br\\/>&nbsp; &nbsp; \\u60a8\\u53ea\\u9700\\u70b9\\u51fb\\u4e0b\\u9762\\u7684\\u94fe\\u63a5\\u5373\\u53ef\\u6fc0\\u6d3b\\u60a8\\u7684\\u5e10\\u53f7\\uff1a<br\\/>&nbsp; &nbsp; <a title=\\"\\" href=\\"http:\\/\\/#link#\\" target=\\"_self\\">http:\\/\\/#link#<\\/a><br\\/>&nbsp; &nbsp; (\\u5982\\u679c\\u4e0a\\u9762\\u4e0d\\u662f\\u94fe\\u63a5\\u5f62\\u5f0f\\uff0c\\u8bf7\\u5c06\\u8be5\\u5730\\u5740\\u624b\\u5de5\\u7c98\\u8d34\\u5230\\u6d4f\\u89c8\\u5668\\u5730\\u5740\\u680f\\u518d\\u8bbf\\u95ee)<br\\/>&nbsp; &nbsp; \\u611f\\u8c22\\u60a8\\u7684\\u8bbf\\u95ee\\uff0c\\u795d\\u60a8\\u4f7f\\u7528\\u6109\\u5feb\\uff01<br\\/><br\\/>&nbsp; &nbsp; \\u6b64\\u81f4<br\\/>&nbsp; &nbsp; ThinkCMF \\u7ba1\\u7406\\u56e2\\u961f.<\\/p>"}', 1),
(2, 'site_options', '{"site_name":"\\u6167\\u8c37\\u521b\\u6295","site_host":"http:p2p.ac371.cn","site_root":"\\/","site_tpl":"simplebootx","site_adminstyle":"bluesky","site_icp":"","site_admin_email":"fdsf@dffd.hb","site_tongji":"","site_copyright":"","site_seo_title":"\\u6167\\u8c37\\u521b\\u6295","site_seo_keywords":"\\u7f51\\u8d37\\uff0c\\u6167\\u8c37\\u521b\\u6295\\uff0c\\u521b\\u6295","site_seo_description":"\\u7f51\\u8d37\\uff0c\\u6167\\u8c37\\u521b\\u6295\\uff0c\\u521b\\u6295","urlmode":"1","html_suffix":""}', 1),
(3, 'cmf_settings', '{"banned_usernames":""}', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ac_param`
--

CREATE TABLE IF NOT EXISTS `ac_param` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` tinyint(1) unsigned NOT NULL,
  `var_name` varchar(40) NOT NULL,
  `value` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT ' 1文本域 2布尔 3 文件域  ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `ac_param`
--

INSERT INTO `ac_param` (`id`, `cate_id`, `var_name`, `value`, `remark`, `type`) VALUES
(1, 1, 'sys_topUpFees', '1000', '充值免费额度(元)(0为没有充值手续费)', 1),
(2, 2, 'sys_loans_lowest_apr', '10', '借款最低利率（%）', 1),
(3, 2, 'sys_loans_highest_apr', '20', '借款最高利率（%）', 1),
(4, 1, 'sys_topUpPoundage', '5', '充值手续费(%)', 1),
(5, 1, 'sys_topUpPoundage_highest', '50', '充值手续费上限(元)', 1),
(6, 1, 'sys_topUpPoundage_lowest', '1', '充值手续费下限(元)', 1),
(7, 1, 'sys_withdrawalsFees', '1000', '提现免费额度(元)', 1),
(8, 1, 'sys_withdrawalsPoundage_highest', '50', '提现手续费上限(元)', 1),
(9, 1, 'sys_withdrawalsPoundage_lowest', '1', '提现手续费下限(元)', 1),
(10, 2, 'sys_borrow_success_fee', '1', '用户借款成交费(本金%)', 1),
(11, 2, 'sys_borrow_manage_fee', '2', '用户借款管理费（期/贷款总额%)', 1),
(12, 2, 'sys_borrow_interest_fee', '1', '用户投资利息管理费(管理费=每期利息X利息管理费%)', 1),
(13, 3, 'sys_tenderMultiplicand', '50', '投标金额的被乘数（元）', 1),
(14, 2, 'sys_overdue', '0.1', '逾期管理费费率1-30天(逾期管理费总额 = 逾期本息总额×对应逾期管理费率%×逾期天数)', 1),
(15, 2, 'sys_overdues', '0.5', '逾期30天后的管理费(逾期管理费总额 = 逾期本息总额×对应逾期管理费率%×逾期天数)', 1),
(16, 3, 'sys_refundDue', '5', '还款到期提前提醒天数', 1),
(17, 2, 'sys_penaltyint', '0.5', '逾期罚息利率1-30天(罚息总额 = 逾期本息总额×对应罚息利率%×逾期天数)', 1),
(18, 2, 'sys_penaltyints', '0.5', '逾期30天后的罚息利率(罚息总额 = 逾期本息总额×对应罚息利率%×逾期天数)', 1),
(19, 2, 'sys_equity_transfer', '0', '债权转让管理费(管理费 = 转让金额×管理费率%)', 1),
(20, 2, 'sys_advance_repay', '1', '提前还款补偿利率(补偿金额 = 剩余本金×补偿利率%)', 1),
(21, 1, 'sys_withdrawalsPoundage', '5', '提现手续费(%)', 1),
(22, 3, 'sys_loadThanHalf', '1', '投标金额超过一半是否通知', 2),
(23, 3, 'sys_withdrawalSMSvalidation', '1', '提现是否短信验证', 2),
(24, 3, 'sys_comments_code', '0', '贷款留言是否启用验证码', 2);

-- --------------------------------------------------------

--
-- 表的结构 `ac_param_cate`
--

CREATE TABLE IF NOT EXISTS `ac_param_cate` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ac_param_cate`
--

INSERT INTO `ac_param_cate` (`id`, `name`) VALUES
(1, '资金费用'),
(2, '借款费用'),
(3, '其它参数');

-- --------------------------------------------------------

--
-- 表的结构 `ac_pay_config`
--

CREATE TABLE IF NOT EXISTS `ac_pay_config` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `value` varchar(25) NOT NULL,
  `config` varchar(300) NOT NULL,
  `param` varchar(500) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT '1在线2线下',
  `state` tinyint(1) unsigned NOT NULL COMMENT '0停用1启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `ac_pay_config`
--

INSERT INTO `ac_pay_config` (`id`, `name`, `value`, `config`, `param`, `logo`, `type`, `state`) VALUES
(1, '支付宝', 'alipay', 'a:3:{s:5:"email";s:17:"chenf003@yahoo.cn";s:3:"key";s:3:"aaa";s:7:"partner";s:16:"2088101000137799";}', 'a:3:{s:5:"email";s:18:"收款账号邮箱";s:3:"key";s:42:"加密key，开通支付宝账户后给予";s:7:"partner";s:65:"合作者ID，支付宝有该配置，开通易宝账户后给予";}', '', 1, 1),
(2, '财付通', 'tenpay', 'a:2:{s:3:"key";s:32:"e82573dc7e6136ba414f2e2affbe39fa";s:7:"partner";s:10:"1900000113";}', 'a:2:{s:3:"key";s:42:"加密key，开通财付通账户后给予";s:7:"partner";s:68:"合作者ID，财付通有该配置，开通财付通账户后给予";}', '', 1, 1),
(3, '快钱', 'kuaiqian', '', 'a:2:{s:3:"key";s:39:"加密key，开通快钱账户后给予";s:7:"partner";s:62:"合作者ID，快钱有该配置，开通快钱账户后给予";}', '', 1, 1),
(4, '易付宝', 'yeepay', '', 'a:2:{s:3:"key";s:39:"加密key，开通易宝账户后给予";s:7:"partner";s:41:"合作者ID，开通易宝账户后给予";}', '', 1, 1),
(5, '银联', 'unionpay', 'a:2:{s:3:"key";s:7:"1234568";s:7:"partner";s:6:"884422";}', 'a:2:{s:3:"key";s:39:"加密key，开通银联账户后给予";s:7:"partner";s:41:"合作者ID，开通银联账户后给予";}', '', 1, 1),
(6, '支付宝wap', 'aliwappay', '', 'a:3:{s:5:"email";s:18:"收款账号邮箱";s:3:"key";s:42:"加密key，开通支付宝账户后给予";s:7:"partner";s:65:"合作者ID，支付宝有该配置，开通易宝账户后给予";}', '', 1, 1),
(7, '华夏银行', '', 'a:3:{s:7:"subname";s:12:"郑州支行";s:8:"receiver";s:7:"晴天2";s:7:"account";s:15:"444444444444444";}', 'a:3:{s:7:"subname";s:12:"支行名称";s:8:"receiver";s:15:"收款人姓名";s:7:"account";s:15:"收款人帐号";}', '', 2, 1),
(8, '招商银行', '', 'a:3:{s:7:"subname";s:12:"郑州支行";s:8:"receiver";s:6:"帐户";s:7:"account";s:0:"";}', 'a:3:{s:7:"subname";s:12:"支行名称";s:8:"receiver";s:15:"收款人姓名";s:7:"account";s:15:"收款人帐号";}', '', 2, 1),
(9, '建设银行', '', 'a:3:{s:7:"subname";s:12:"郑州支行";s:8:"receiver";s:6:"张彬";s:7:"account";s:14:"44444444444444";}', 'a:3:{s:7:"subname";s:12:"支行名称";s:8:"receiver";s:15:"收款人姓名";s:7:"account";s:15:"收款人帐号";}', '', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ac_pay_log`
--

CREATE TABLE IF NOT EXISTS `ac_pay_log` (
  `out_trade_no` varchar(100) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '充值状态0等待支付1支付成功',
  `callback` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `param` varchar(300) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `userid` int(11) NOT NULL COMMENT '充值用户的ID ',
  `paytype` varchar(50) NOT NULL COMMENT '充值方式',
  PRIMARY KEY (`out_trade_no`),
  KEY `userid` (`userid`,`paytype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ac_pay_log`
--

INSERT INTO `ac_pay_log` (`out_trade_no`, `money`, `status`, `callback`, `url`, `param`, `create_time`, `update_time`, `userid`, `paytype`) VALUES
('F1212005535825d', 0.01, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212005535825d";s:6:"userid";s:1:"3";}', 1421820055, 1421820055, 3, '2'),
('F1212009143195d', 100.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212009143195d";s:6:"userid";s:1:"3";}', 1421820091, 1421820091, 3, '1'),
('F1212010194759d', 100.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212010194759d";s:6:"userid";s:1:"3";}', 1421820102, 1421820102, 3, '5'),
('F1212010633567d', 100.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212010633567d";s:6:"userid";s:1:"3";}', 1421820106, 1421820106, 3, '5'),
('F1212013160553d', 100.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212013160553d";s:6:"userid";s:1:"3";}', 1421820131, 1421820131, 3, '5'),
('F1212013797495d', 100.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212013797495d";s:6:"userid";s:1:"3";}', 1421820138, 1421820138, 3, '5'),
('F1212014171911d', 100.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212014171911d";s:6:"userid";s:1:"3";}', 1421820141, 1421820141, 3, '5'),
('F1212014538331d', 100.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212014538331d";s:6:"userid";s:1:"3";}', 1421820145, 1421820145, 3, '5'),
('F1212014977603d', 100.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212014977603d";s:6:"userid";s:1:"3";}', 1421820149, 1421820149, 3, '2'),
('F1212036648391d', 100.00, 0, 'User/Money/pay', '/ptop/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212036648391d";s:6:"userid";s:1:"3";}', 1421820366, 1421820366, 3, '1'),
('F1212085656091d', 200.00, 0, 'User/Money/pay', '/ptop/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212085656091d";s:6:"userid";s:1:"3";}', 1421820856, 1421820856, 3, '5'),
('F1212087439954d', 200.00, 0, 'User/Money/pay', '/ptop/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1212087439954d";s:6:"userid";s:1:"3";}', 1421820874, 1421820874, 3, '1'),
('F1220597685022d', 0.00, 0, 'User/Money/pay', '/ptop/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1220597685022d";s:6:"userid";s:1:"3";}', 1421905976, 1421905976, 3, '2'),
('F1220599547438d', 20.00, 0, 'User/Money/pay', '/ptop/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1220599547438d";s:6:"userid";s:1:"3";}', 1421905995, 1421905995, 3, '1'),
('F1220600263021d', 20.00, 0, 'User/Money/pay', '/ptop/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1220600263021d";s:6:"userid";s:1:"3";}', 1421906002, 1421906002, 3, '2'),
('F1220752074395d', 34.00, 0, 'User/Money/pay', '/ptop/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F1220752074395d";s:6:"userid";s:1:"3";}', 1421907520, 1421907520, 3, '2'),
('F3043664477227d', 200.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F3043664477227d";s:6:"userid";s:1:"3";}', 1425436644, 1425436644, 3, '1'),
('F3043665355512d', 200.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F3043665355512d";s:6:"userid";s:1:"3";}', 1425436653, 1425436653, 3, '2'),
('F3043674685870d', 200.00, 0, 'User/Money/pay', '/index.php?g=User&m=Money&a=index', 'a:2:{s:12:"out_trade_no";s:15:"F3043674685870d";s:6:"userid";s:1:"3";}', 1425436746, 1425436746, 3, '5'),
('F4175916105479d', 10000.00, 0, 'User/Money/pay', '/index.php/user/money/index', 'a:2:{s:12:"out_trade_no";s:15:"F4175916105479d";s:6:"userid";s:2:"54";}', 1429259161, 1429259161, 54, '2');

-- --------------------------------------------------------

--
-- 表的结构 `ac_posts`
--

CREATE TABLE IF NOT EXISTS `ac_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned DEFAULT '0' COMMENT '发表者id',
  `post_keywords` varchar(150) NOT NULL COMMENT 'seo keywords',
  `post_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'post创建日期，永久不变，一般不显示给用户',
  `post_content` longtext COMMENT 'post内容',
  `post_title` text COMMENT 'post标题',
  `post_excerpt` text COMMENT 'post摘要',
  `post_status` int(2) DEFAULT '1' COMMENT 'post状态，1已审核，0未审核',
  `comment_status` int(2) DEFAULT '1' COMMENT '评论状态，1允许，0不允许',
  `post_modified` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'post更新时间，可在前台修改，显示给用户',
  `post_content_filtered` longtext,
  `post_parent` bigint(20) unsigned DEFAULT '0' COMMENT 'post的父级post id,表示post层级关系',
  `post_type` int(2) DEFAULT NULL,
  `post_mime_type` varchar(100) DEFAULT '',
  `comment_count` bigint(20) DEFAULT '0',
  `smeta` text COMMENT 'post的扩展字段，保存相关扩展属性，如缩略图；格式为json',
  `post_hits` int(11) DEFAULT '0' COMMENT 'post点击数，查看数',
  `post_like` int(11) DEFAULT '0' COMMENT 'post赞数',
  `istop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶 1置顶； 0不置顶',
  `recommended` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐 1推荐 0不推荐',
  PRIMARY KEY (`id`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`id`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_date` (`post_date`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `ac_posts`
--

INSERT INTO `ac_posts` (`id`, `post_author`, `post_keywords`, `post_date`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `post_modified`, `post_content_filtered`, `post_parent`, `post_type`, `post_mime_type`, `comment_count`, `smeta`, `post_hits`, `post_like`, `istop`, `recommended`) VALUES
(1, 1, '', '2014-12-29 12:38:26', '<p style="margin-top: 0px;margin-bottom: 10px;font-family: &#39;Microsoft YaHei&#39;, &#39;Lucida Sans Unicode&#39;, &#39;Myriad Pro&#39;, &#39;Hiragino Sans GB&#39;, &#39;Heiti SC&#39;, Verdana, simsun;font-size: 13px;line-height: 20px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体">秒还标为一种娱乐庆祝送钱的标。</span></p><p style="margin-top: 0px;margin-bottom: 10px;font-family: &#39;Microsoft YaHei&#39;, &#39;Lucida Sans Unicode&#39;, &#39;Myriad Pro&#39;, &#39;Hiragino Sans GB&#39;, &#39;Heiti SC&#39;, Verdana, simsun;font-size: 13px;line-height: 20px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体">秒还标标满后，系统自动审核通过，发标人瞬间返还本金及利息。</span></p><p><span style="font-family: &#39;Microsoft YaHei&#39;, &#39;Lucida Sans Unicode&#39;, &#39;Myriad Pro&#39;, &#39;Hiragino Sans GB&#39;, &#39;Heiti SC&#39;, Verdana, simsun;font-size: 13px;line-height: 20px;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体"><span style="color: rgb(51, 51, 51);font-size: 12px"><span style="color: rgb(229, 51, 51)">考虑到秒还标，全部是系统自动处理，请会员谨慎发布秒还标</span><span style="color: rgb(229, 51, 51)">。</span></span></span></span></p><p><br/></p>', '秒还借款标介绍', '秒还借款标介绍', 1, 1, '2014-12-29 12:37:44', NULL, 0, NULL, '', 0, '{"thumb":""}', 8, 0, 0, 0),
(2, 1, '质押标介绍', '2014-12-29 16:46:16', '<p>质押标介绍</p>', '质押标介绍', '质押标介绍', 1, 1, '2014-12-29 16:45:54', NULL, 0, NULL, '', 0, '{"thumb":""}', 4, 0, 0, 0),
(3, 1, 'nihao', '2015-01-20 10:25:28', '<p>dfsafsdafsdf<br/></p>', '测试', 'dsfdsafsdaf sdafdsaf', 0, 1, '2015-01-20 10:24:59', NULL, 0, 2, '', 1, '{"thumb":"","template":"page"}', 0, 0, 0, 0),
(4, 1, '单页面', '2015-01-20 16:11:42', '<p>范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是</p>', '单页', '没i哦几度翻三番撒旦法的萨芬范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f范德萨发达省份第三方但是f', 0, 1, '2015-01-20 15:22:49', NULL, 0, 2, '', 0, '{"thumb":"","template":"page"}', 0, 0, 0, 0),
(5, 1, '多数发达省份岁地方', '2015-01-20 16:33:06', '<p>艾丝凡的萨芬打算范德萨忿忿地说豆腐干A程序包规范化热点的股份代号才vbf这个发犯嘀咕 <br/></p>', '测试2', '第三方苏打粉撒旦法苏打粉的萨芬', 0, 1, '2015-01-20 16:32:35', NULL, 0, 2, '', 0, '{"thumb":"","template":"article"}', 0, 0, 0, 0),
(6, 1, '分的说法', '2015-01-13 16:33:26', '<p>真是当方式放量快速大幅达拉斯分送达法律撒旦法倒萨<br/></p>', '关于我们', '大法师发生的发大水范德萨', 0, 1, '2015-01-20 16:33:08', NULL, 0, 2, '', 0, '{"thumb":"","template":"contact"}', 0, 0, 0, 0),
(7, 1, '发达省份', '2015-01-20 18:27:32', '<p>搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面搜素页面</p>', '搜素页面', '搜素页面搜素页面搜素搜素页面搜素页面搜素页面搜素页面页面搜素页面搜素页面搜素页面', 0, 1, '2015-01-20 18:27:08', NULL, 0, 2, '', 0, '{"thumb":"","template":"search"}', 0, 0, 0, 0),
(8, 1, '页面', '2015-01-20 18:30:01', '<p>阿萨德法撒旦发达省份阿斯蒂芬<br/></p>', '列表页面', '发大水法但说无妨打算大师傅阿萨德发大水法撒旦法', 0, 1, '2015-01-20 18:29:31', NULL, 0, 2, '', 0, '{"thumb":"","template":"list"}', 0, 0, 0, 0),
(9, 1, '公司简介', '2015-01-21 10:46:25', '<p><span style="color: rgb(89, 89, 89);">p2p 信贷为有资金需求和理财需求的个人搭建了一个公平、透明、稳定、高效的网络互动平台。用户可以在p2p信贷上获得信用评级、发布借 款请求满足个人的资金需要；也可以把自己的闲余资金通过人人贷出借给信用良好有资金需求的个人，在获得良好的资金回报率的同时帮助了他人。<br/><br/><strong>p2p信贷缘起</strong><br/><br/>随 着互联网用户的普及、技术的进步与货币数字化的迅速发展，2005年在英国首次出现个人对个人（P2P）的网络信贷服务平台。这种模式由于使借贷双方互惠 双赢，加上其高效便捷的操作方式、个性化的利率定价机制，推出后得到广泛的认可和关注，迅速在其他国家复制。我们团队看到了这种模式将对中国民间信贷及小 额贷款行业带来深远积极的影响。我们决定结合中国的社会信用状况，利用可靠的信用审核模型和先进的技术，创建了适合中国的P2P小额信贷网络平台—— p2p信贷。<br/><br/><strong>社会意义</strong><br/><br/>P2P小额贷款是一种将非常小额度的贷款聚集起来借贷给有资金需求人群的一种商业模型。它的社会价值主要体现在满足个人资金需求、发展个人信用体系和提高社会闲散资金利用率三个方面：<br/>1）在中国，银行对个人信用贷款的条件要求很高，个人从银行系统融资面临很多困难,P2P小额贷款为需要资金的人提供了新的融资渠道。<br/>2）P2P小额贷款主要是以个人信用评价为基础的贷款，它的发展有助于个人体现自身的信用价值，提高社会个人信用体系的建设。<br/>3）P2P小额贷款扩宽了个人投资的渠道，加大了资金的流动，提高了社会闲散资金的使用率，促进了经济的发展。<br/>P2P网络借贷平台的出现，不仅仅是一个创新的商业模式, 它更为缩小社会贫富差距、创造就业、实现经济长期发展、社会和谐作出了重大贡献。<br/><br/><strong>p2p信贷的愿景</strong><br/><br/>我们坚信，随着时代的进步，中国社会的信用体系必将逐步完善，而技术的革新，也必将使民间借贷的模式发生革命性的变化。我们期待在这次进步的浪潮中，走在时代的前端，打造出中国最诚信可靠的P2P网络借贷平台，成为一家卓越的、实现巨大社会价值的企业。<br/></span><br/></p>', '公司简介', '公司的相关介绍', 1, 1, '2015-01-21 10:44:54', NULL, 0, NULL, '', 0, '{"thumb":""}', 18, 0, 0, 0),
(10, 1, '问题', '2015-01-21 11:53:09', '<p>\r\n    <span style="color: rgb(89, 89, 89);"><strong>什么是信用借款标？</strong><br/></span>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89);">信用借款标是指有资金需求的借款者，提出借款申请，由河南贷官方根据借款者提供的资料进行严格审核，平台将根据申请人的实际情况给予申请人一定额度的信用授信，借款者可以在平台循环发布借款信息，但其借款额度总额不可超过其授信额度的标种。</span>\r\n</p>\r\n<p>\r\n    <br/>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89);"><strong>什么是担保借款标？</strong></span><br/><span style="color: rgb(89, 89, 89);"></span>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89);">担保借款标显示标记“担”，是指借款人通过第三方担保的形式进行借款的标，第三方担保必须是在河南贷平台有足够的净资产或者河南贷平台认可、拥有相应担保能力的机构或个人，每笔担保标都需事先签订借款人、担保方、河南贷平台三方协议后方可发布，担保标是一种相对安全系数很高的借款标，因增加了担保方费用，所以利率方面适度降低，适合大笔资金需求，用户可以借助担保方提高借款成功率。</span>\r\n</p>\r\n<p>\r\n    <br/>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89);"><strong>什么是流转借资标？</strong><br/></span>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89);">流转借资标是指债权人将手中优质的债权转让给其他有投资意愿的投资人，并且承诺在一定期限内回购该债权的投资品种。在投资人受让债权的期限内，投资人本金及\r\n收益的安全由河南贷提供连带担保，在投资人受让债权届满时，河南贷担保债权人如约回购债权，投资人从而获益。 \r\n如借款人到期还款出现困难，由网站24小时垫付本息，债权转让为河南贷网站所有.</span><br/><span style="color: rgb(89, 89, 89);">流转借资标优势：投资人即刻申购即刻生效，无资金空档期，使投资人的资金获得最佳收益。</span>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89);"></span><br/>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89);"><br/></span>\r\n</p>', '常见问题', '常见问题 ', 1, 1, '2015-01-21 11:52:24', NULL, 0, NULL, '', 0, '{"thumb":""}', 14, 0, 0, 0),
(11, 1, '平台原理', '2015-01-21 11:53:57', '<p>		p2p信贷统平台机制	</p><p>p2p信贷为有资金需求和理财需求的个人搭建了一个公平、透明、稳定、\r\n高效的网络互动平台。用户可以在p2p信贷上获得信用评级、发布借款请求满足个人的资金需要；也可以把自己的闲余资金通过p2p信贷出借给信用良好有资金\r\n需求的个人，在获得良好的资金回报率的同时帮助了他人。</p><p><br/></p>', '平台原理', '平台原理', 1, 1, '2015-01-21 11:53:25', NULL, 0, NULL, '', 0, '{"thumb":""}', 15, 0, 0, 0),
(12, 1, '如何借款', '2015-01-21 13:29:35', '<p><span style="color: rgb(89, 89, 89);">暂无消息</span><br/></p>', '如何借款', '如何借款', 1, 1, '2015-01-21 13:26:51', NULL, 0, NULL, '', 0, '{"thumb":""}', 15, 0, 0, 0),
(13, 1, 'p2p信贷费率', '2015-01-21 13:29:57', '<p>\r\n    <span style="color: rgb(89, 89, 89); font-family: arial,helvetica,sans-serif;"><strong><span style="font-family: arial,helvetica,sans-serif; color: rgb(89, 89, 89);">借款人费用</span></strong></span> \r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89);">1、借款费用</span>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89);">平台收取的服务费将全部用于河南贷的本金保障计划，每月向借款人收取其借款本金的0.5%作为借款管理费（秒还标不收取管理费；净值标收取金额的0.1%）</span>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89); font-family: arial,helvetica,sans-serif;">2、充值提现费用</span>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89); font-family: arial,helvetica,sans-serif;"><span style="color: rgb(89, 89, 89); white-space: normal;">线上充值以第三方接口说明为准，线下充值手续费全免，充多少到账多少。</span><span style="color: rgb(89, 89, 89);white-space: normal; font-size: 8pt;"><br/></span><span style="color: rgb(89, 89, 89);">提现费用（由第三方支付接口），当借款人要求提现，借款资金转至指定银行账户时，会发生转账费用，第三方支付平台将按5万元（含）以下3元/笔标准收取相关费用。（净值标提现除外）</span></span>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89); font-family: arial,helvetica,sans-serif;"><span style="color: rgb(89, 89, 89); white-space: normal;">借款人线上充值以第三方接口说明为准，线下充值手续费全免，充多少到账多少。</span><span style="font-family: arial,helvetica,sans-serif; color: rgb(89, 89, 89);  white-space: normal;">当借款人要求提现，将借款资金转至指定银行账户时，会发生转账费用，第三方支付平台将按以下标准收取相关费用，自充值之日起于5日之内(满5日精确到分秒）提现的将收取金额的千分之一为手续费，充值之日起于5日之外提现的将维持5万元（含）以下3元/笔的提现规则。</span></span>\r\n</p>\r\n\r\n<p>\r\n  <br/>\r\n</p>\r\n<p>\r\n    <span style="font-family: arial,helvetica,sans-serif; color: rgb(89, 89, 89);"><strong><span style="font-family: arial,helvetica,sans-serif;">投资人费用</span></strong></span>\r\n</p>\r\n<p>\r\n    <span style="color: rgb(89, 89, 89); font-family: arial,helvetica,sans-serif; white-space: normal;">1、充值费用<br/>线上充值以第三方接口说明为准，线下充值手续费全免，充多少到账多少。<br/>2、提现费用<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当用户要求提现，将借款资金转至指定银行账户时，会发生转账费用，第三方支付平台将按以下标准收取相关费用，用户自充值之日起于5日之内(满5日精确到分秒）提现的将收取金额的千分之一为手续费，充值之日起于5日之外提现的将维持5万元（含）以下3元/笔的提现规则。</span>\r\n</p>\r\n<p>\r\n    <span style="font-family: arial,helvetica,sans-serif; color: rgb(89, 89, 89);">3、投资管理费</span>\r\n</p>\r\n<p>\r\n    <span style="font-family: arial,helvetica,sans-serif; color: rgb(89, 89, 89);">平台免收投资者所得利息的管理费，但投资人所得利息由投资人自行缴纳所得税。</span>\r\n</p>\r\n<p>\r\n    <br/>\r\n</p>', 'p2p信贷费率', 'p2p信贷费率', 1, 1, '2015-01-21 13:29:41', NULL, 0, NULL, '', 0, '{"thumb":""}', 11, 0, 0, 0),
(14, 1, '政策法规', '2015-01-21 13:30:51', '<p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:18pt;"><span style="color:#666666;font-size:14px;font-weight:bold;">关于民间借贷的简介：</span><span style="color:#666666;font-size:9pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">民\r\n间借贷是指自然人之间、自然人与法人之间、自然人与其它组织之间借贷。民间借贷是《民法通则》中一种民事法律行为，行为人在具有完全民事行为能力（即年满\r\n18周岁，且不存在足以影响自身行为的精神疾病的情形）、意思表示真实，借款合同符合法律、行政法规规定，则该借款合同完全受到《合同法》等法律的保护。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">民间借贷是一种直接融资渠道,银行借贷则是一种间接融资渠道。民间借贷是民间资本的一种投资渠道,是民间金融的一种形式。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《合同法》第二十三章“居间合同”中明确规定，居间人提供贷款合同订立的媒介服务，可依法向委托方收取相应的报酬。因此贷款服务机构的存在和服务费的收取都是符合法律规定并受法律保护的</span><span style="font-family:Arial;color:#666666;font-size:12pt;">。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《合\r\n同法》第211条也规定了：“自然人之间的借款合同约定支付利息的,借款的利率不得违反国家有关限制借款利率的规定”。同时根据1991年《最高人民法院\r\n关于人民法院审理借贷案件的若干意见》的有关规定：民间借贷的利息可适当高于银行利率,但最高不得超过同期银行贷款利率的4倍,超出部分的利息法律不予保\r\n护。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">可见，民间借款时有其合法性依据的，在规定范围内是收到法律保护的。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:18pt;"><span style="color:#666666;font-size:14px;font-weight:bold;">关于民间借贷相关问题的法律规定：</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">1、利息</span><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《中\r\n华人民共和国合同法》第二百一十一条规定：“自然人之间的借款合同约定支付利息的,借款的利率不得违反国家有关限制借款利率的规定。”同时根据最高人民法\r\n院《关于人民法院审理借贷案件的若干意见》的有关规定：“民间借贷的利率可以适当高于银行的利率,但最高不得超过银行同类贷款利率的四倍(包含利率本\r\n数)。”本条同时规定：“自然人之间的借款合同对支付利息没有约定或约定不明确的,视为不支付利息。”如果公民之间的借款没有约定利息,贷款方就无权收取\r\n利息。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">关\r\n于支付利息的期限,“借款者应当按照约定的期限支付利息”。而现实生活中,公民之间的借款往往没有约定得如此明确。根据《合同法》的有关规定,借贷双方可\r\n以达成补充协议,如果双方最终仍不能确定支付利息的期限的,根据《合同法》第二百零五条规定：“借款期间不满一年的,应当在返还借款时一并支付,借款期间\r\n一年以上的,应当在每届满一年时支付,剩余期间不满一年的,应当在返还借款时一并支付”。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">2、借款期限</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《合同法》第六十二条规定：“履行期限不明确的,债务人可以随时履行,债权人也可以随时要求履行,但应当给对方必要的准备时间”。所以,如果公民之间的借贷没有约定还款日期,借款方可以随时还款,贷款方可以随时要求还款。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">3.&nbsp;诉讼时效</span><span style="font-family:楷体_GB2312;font-size:10.5pt;">（</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">诉\r\n讼时效是指民事权利受到侵害的权利人在法定的时效期间内不行使权利，当时效期间届满时，人民法院对权利人的权利不再进行保护的制度。在法律规定的诉讼时效\r\n期间内，权利人提出请求的，人民法院就强制义务人履行所承担的义务。而在法定的诉讼时效期间届满之后，权利人行使请求权的，人民法院就不再予以保护。值得\r\n注意的是，诉讼时效届满后，义务人虽可拒绝履行其义务，权利人请求权的行使仅发生障碍，权利本身及请求权并不消灭。当事人超过诉讼时效后起诉的，人民法院\r\n应当受理。受理后查明无中止，中断，延长事由的，判决驳回其诉讼请求。</span><span style="font-family:楷体_GB2312;font-size:10.5pt;">）</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《民\r\n法通则》对借款纠纷规定了2年的诉讼时效,但这里所指的2年并不是简单地从借款日起计算,而是从知道或应当知道权利被侵害起计算。《民法通则》第一百四十\r\n一条规定：“诉讼时效因提起诉讼,当事人一方提出要求或者同意履行义务而中断,从中断时起,诉讼时效期间重新计算。”是否已超过诉讼时效还应视具体情况而\r\n定</span><span style="color:#666666;font-size:9pt;">。</span><span style="color:#666666;font-size:9pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">中华人民共和国司法部</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">出台了</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《关于办理</span><a href="http://www.66law.cn/topic2010/mjjdht/" style="text-decoration:none;color:#000000;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">民间借贷合同</span></a><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">公证的意见》</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">、</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">最高人民法院关于人民法院审理借贷案件的若干意见</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">等也对民间借贷问题进行了完善和补，使民间借贷更加规范。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">订立借款合同采取的担保方式的相关问题：</span><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">借\r\n款合同作为单务合同,贷款人将借款支付给借款者后,其风险都是由贷款人承担。为了保证债权的实现,减少借款的风险,近些年来,我国金融机构在信贷业务中越\r\n来越多地采用担保的方式。根据《担保法》的规定,在借款合同中贷款人可以要求借款者采取以下担保方式：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">保证</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">是指保证人与贷款人约定,当借款者不履行债务时,保证人按照约定履行债务、承担责任的行为。保证的方式主要有两种：&nbsp;</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">(1)连带责任保证,即贷款人和保证人约定,借款者在借款期限届满没有履行债务的,贷款人可以要求借款者履行债务,也可以要求保证人在其保证范围内承担保证责任。&nbsp;</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">(2)一般保证,即贷款人和保证人约定,在借款者经审判或者仲裁,并就借款者财产强制执行仍不能履行债务时,保证人承担保证责任。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">抵押</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">是指借款者或者第三人不转移财产的占有,将该财产作为债权的担保。在借款者不履行债务时,贷款人有权依法将该财产折价或者以拍卖、变卖该财产的价款优先受偿。抵押物的范围应当是依法可以转让的财产,抵押合同应当办理登记,抵押合同自登记之日起生效。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">质押</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">包\r\n括动产质押和权利质押。动产质押是指借款者或者第三人将其动产移交贷款人占有,以该财产作为债权的担保,借款者不履行债务时,贷款人有权以该财产折价或者\r\n以拍卖、变卖的价款优先受偿。权利质押是指转让所有权以外的财产权作为质押的担保方式。以下权利可以设定质押：汇票、支票、本票、债券、存款单、仓单、提\r\n单；依法可以转让的股份、股票；依法可以转让的商标专用权、专利权、著作权中的财产权等权利。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">根据合同法第198条的规定,订立借款合同,贷款人可以要求借款者提供担保,担保依照《中华人民共和国担保法》的规定。因此,金融机构借款的,当事人应当按照有关规定确定担保的方式。至于自然人之间借款,当事人可以依据实际情况对担保问题作出约定。</span></p><p><br/></p>', '政策法规', '政策法规', 1, 1, '2015-01-21 13:30:12', NULL, 0, NULL, '', 0, '{"thumb":""}', 10, 0, 0, 0),
(15, 1, '联系我们', '2015-01-21 13:31:42', '<p><span style="color: rgb(89, 89, 89);">平台专注于您的资产增值</span></p><p><span style=" color: rgb(89, 89, 89);">服务热线：0371-56000066</span></p><p><span style=" color: rgb(89, 89, 89);">官方QQ群：88888888</span></p><p><span style=" color: rgb(89, 89, 89);">公司网站：http://www.ac371.cn</span></p><p><span style="color: rgb(89, 89, 89);">公司地址：河南省郑州市经三路农科路</span></p>', '联系我们', '联系我们', 1, 1, '2015-01-21 13:31:28', NULL, 0, NULL, '', 0, '{"thumb":""}', 16, 0, 0, 0),
(16, 1, '免责条款', '2015-01-21 13:32:11', '<p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:18pt;"><span style="color:#666666;font-size:14px;font-weight:bold;">关于民间借贷的简介：</span><span style="color:#666666;font-size:9pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">民\r\n间借贷是指自然人之间、自然人与法人之间、自然人与其它组织之间借贷。民间借贷是《民法通则》中一种民事法律行为，行为人在具有完全民事行为能力（即年满\r\n18周岁，且不存在足以影响自身行为的精神疾病的情形）、意思表示真实，借款合同符合法律、行政法规规定，则该借款合同完全受到《合同法》等法律的保护。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">民间借贷是一种直接融资渠道,银行借贷则是一种间接融资渠道。民间借贷是民间资本的一种投资渠道,是民间金融的一种形式。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《合同法》第二十三章“居间合同”中明确规定，居间人提供贷款合同订立的媒介服务，可依法向委托方收取相应的报酬。因此贷款服务机构的存在和服务费的收取都是符合法律规定并受法律保护的</span><span style="font-family:Arial;color:#666666;font-size:12pt;">。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《合\r\n同法》第211条也规定了：“自然人之间的借款合同约定支付利息的,借款的利率不得违反国家有关限制借款利率的规定”。同时根据1991年《最高人民法院\r\n关于人民法院审理借贷案件的若干意见》的有关规定：民间借贷的利息可适当高于银行利率,但最高不得超过同期银行贷款利率的4倍,超出部分的利息法律不予保\r\n护。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">可见，民间借款时有其合法性依据的，在规定范围内是收到法律保护的。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:18pt;"><span style="color:#666666;font-size:14px;font-weight:bold;">关于民间借贷相关问题的法律规定：</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">1、利息</span><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《中\r\n华人民共和国合同法》第二百一十一条规定：“自然人之间的借款合同约定支付利息的,借款的利率不得违反国家有关限制借款利率的规定。”同时根据最高人民法\r\n院《关于人民法院审理借贷案件的若干意见》的有关规定：“民间借贷的利率可以适当高于银行的利率,但最高不得超过银行同类贷款利率的四倍(包含利率本\r\n数)。”本条同时规定：“自然人之间的借款合同对支付利息没有约定或约定不明确的,视为不支付利息。”如果公民之间的借款没有约定利息,贷款方就无权收取\r\n利息。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">关\r\n于支付利息的期限,“借款者应当按照约定的期限支付利息”。而现实生活中,公民之间的借款往往没有约定得如此明确。根据《合同法》的有关规定,借贷双方可\r\n以达成补充协议,如果双方最终仍不能确定支付利息的期限的,根据《合同法》第二百零五条规定：“借款期间不满一年的,应当在返还借款时一并支付,借款期间\r\n一年以上的,应当在每届满一年时支付,剩余期间不满一年的,应当在返还借款时一并支付”。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">2、借款期限</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《合同法》第六十二条规定：“履行期限不明确的,债务人可以随时履行,债权人也可以随时要求履行,但应当给对方必要的准备时间”。所以,如果公民之间的借贷没有约定还款日期,借款方可以随时还款,贷款方可以随时要求还款。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">3.&nbsp;诉讼时效</span><span style="font-family:楷体_GB2312;font-size:10.5pt;">（</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">诉\r\n讼时效是指民事权利受到侵害的权利人在法定的时效期间内不行使权利，当时效期间届满时，人民法院对权利人的权利不再进行保护的制度。在法律规定的诉讼时效\r\n期间内，权利人提出请求的，人民法院就强制义务人履行所承担的义务。而在法定的诉讼时效期间届满之后，权利人行使请求权的，人民法院就不再予以保护。值得\r\n注意的是，诉讼时效届满后，义务人虽可拒绝履行其义务，权利人请求权的行使仅发生障碍，权利本身及请求权并不消灭。当事人超过诉讼时效后起诉的，人民法院\r\n应当受理。受理后查明无中止，中断，延长事由的，判决驳回其诉讼请求。</span><span style="font-family:楷体_GB2312;font-size:10.5pt;">）</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《民\r\n法通则》对借款纠纷规定了2年的诉讼时效,但这里所指的2年并不是简单地从借款日起计算,而是从知道或应当知道权利被侵害起计算。《民法通则》第一百四十\r\n一条规定：“诉讼时效因提起诉讼,当事人一方提出要求或者同意履行义务而中断,从中断时起,诉讼时效期间重新计算。”是否已超过诉讼时效还应视具体情况而\r\n定</span><span style="color:#666666;font-size:9pt;">。</span><span style="color:#666666;font-size:9pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">中华人民共和国司法部</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">出台了</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">《关于办理</span><a href="http://www.66law.cn/topic2010/mjjdht/" style="text-decoration:none;color:#000000;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">民间借贷合同</span></a><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">公证的意见》</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">、</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">最高人民法院关于人民法院审理借贷案件的若干意见</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">等也对民间借贷问题进行了完善和补，使民间借贷更加规范。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">订立借款合同采取的担保方式的相关问题：</span><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">借\r\n款合同作为单务合同,贷款人将借款支付给借款者后,其风险都是由贷款人承担。为了保证债权的实现,减少借款的风险,近些年来,我国金融机构在信贷业务中越\r\n来越多地采用担保的方式。根据《担保法》的规定,在借款合同中贷款人可以要求借款者采取以下担保方式：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">保证</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">是指保证人与贷款人约定,当借款者不履行债务时,保证人按照约定履行债务、承担责任的行为。保证的方式主要有两种：&nbsp;</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">(1)连带责任保证,即贷款人和保证人约定,借款者在借款期限届满没有履行债务的,贷款人可以要求借款者履行债务,也可以要求保证人在其保证范围内承担保证责任。&nbsp;</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">(2)一般保证,即贷款人和保证人约定,在借款者经审判或者仲裁,并就借款者财产强制执行仍不能履行债务时,保证人承担保证责任。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">抵押</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">是指借款者或者第三人不转移财产的占有,将该财产作为债权的担保。在借款者不履行债务时,贷款人有权依法将该财产折价或者以拍卖、变卖该财产的价款优先受偿。抵押物的范围应当是依法可以转让的财产,抵押合同应当办理登记,抵押合同自登记之日起生效。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#EA8C32;font-size:10.5pt;">质押</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">包\r\n括动产质押和权利质押。动产质押是指借款者或者第三人将其动产移交贷款人占有,以该财产作为债权的担保,借款者不履行债务时,贷款人有权以该财产折价或者\r\n以拍卖、变卖的价款优先受偿。权利质押是指转让所有权以外的财产权作为质押的担保方式。以下权利可以设定质押：汇票、支票、本票、债券、存款单、仓单、提\r\n单；依法可以转让的股份、股票；依法可以转让的商标专用权、专利权、著作权中的财产权等权利。</span><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;"></span></p><p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:20px;font-family:宋体;white-space:normal;background-color:#FCFBFB;text-indent:21pt;"><span style="font-family:楷体_GB2312;color:#666666;font-size:10.5pt;">根据合同法第198条的规定,订立借款合同,贷款人可以要求借款者提供担保,担保依照《中华人民共和国担保法》的规定。因此,金融机构借款的,当事人应当按照有关规定确定担保的方式。至于自然人之间借款,当事人可以依据实际情况对担保问题作出约定。</span></p><p><br/></p>', '免责条款', '免责条款', 1, 1, '2015-01-21 13:31:54', NULL, 0, NULL, '', 0, '{"thumb":""}', 17, 0, 0, 0),
(17, 1, '咨询热点', '2015-01-21 13:32:51', '<p><span style="color: rgb(89, 89, 89);">暂无消息</span></p>', '咨询热点', '咨询热点', 1, 1, '2015-01-21 13:32:39', NULL, 0, NULL, '', 0, '{"thumb":""}', 13, 0, 0, 0),
(18, 1, '隐私保护', '2015-01-21 14:11:19', '<p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">经过对比几大网络借贷平台以及众贷网倒闭的启示，平台网站把引入优质借款人放在公司的核心竞争力上。唯有大量的优质借款人的存在，才能保证网站的盈利，才是对投资者资金安全的最大保障。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">第一、借款者的半径范围原则圈定在郑州。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">第二、平台的大股东将联系河南各地知名典当行，汽车中介公司，优质企业，依托河南民间资本投资服务中心，开发吸引介绍河南各地优质小微企业，做河南的资金流动拆借平台。严格控制贷款额度，倡导小额贷款模式，定位中小微企业资金服务商。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">第三、利率的严格控制，高风险高收益，借款者如果利率过高，会削弱其盈利能力，长而久之，必将导致风险。利率是把双刃剑。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">第四．多平台借款者，网站婉拒，鼓励投资者告之平台网站。</span> \r\n	</p><p><br/></p>', '隐私保护', '隐私保护', 1, 1, '2015-01-21 14:11:07', NULL, 0, NULL, '', 0, '{"thumb":""}', 13, 0, 0, 0),
(19, 1, '避免私下交易', '2015-01-21 15:20:27', '<p>p2p信贷系统建议用户避免尝试私下交易。私下交易的约束力极低，不受《合同法》的保护，造成逾期的风险非常高，同时您的个人信息将有可能被泄漏，存在遭遇诈骗甚至受到严重犯罪侵害的隐患。 <br/></p>', '避免私下交易', 'p2p信贷系统建议用户避免尝试私下交易。私下交易的约束力极低，不受《合同法》的保护，造成逾期的风险非常高，同时您的个人信息将有可能被泄漏，存在遭遇诈骗甚至受到严重犯罪侵害的隐患。 ', 0, 1, '2015-01-21 15:19:33', NULL, 0, 2, '', 0, '{"thumb":"","template":"page"}', 0, 0, 0, 0);
INSERT INTO `ac_posts` (`id`, `post_author`, `post_keywords`, `post_date`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `post_modified`, `post_content_filtered`, `post_parent`, `post_type`, `post_mime_type`, `comment_count`, `smeta`, `post_hits`, `post_like`, `istop`, `recommended`) VALUES
(20, 1, '五大重要守则 ', '2015-01-21 15:20:56', '<p>\r\n		</p><h3>安全补丁更新：</h3><p>些常用的计算机软件的保安漏洞可被病毒作者和黑客利用，来进入那些未安装安全补丁程序的计算机，盗取资料。一旦发现这种情况，软件出版商便会推出安全补丁程序来堵塞这些漏洞。您可定期浏览软件出版商的网站，对操作系统和应用软件进行安全补丁更新。</p><h3>防病毒软件：</h3><p>安装防病毒软件，定期更新软件及安装最新的病毒定义文件，有效保障计算机免受病毒侵袭。</p><h3>个人防火墙：</h3><p>安装防火墙，帮助保护您的计算机系统不会在连接互联网时受到侵袭，可阻止资料在未经您授权下传入或传出您的计算机。</p><h3>反间谍程序：</h3><p>间谍软件可运行在用户计算机上用以监测及收集用户上网信息的程序，能够监测和搜集用户的上网信息，比如获取您输入的个人信息，包括密码、电话号码、\r\n信用卡帐号及身份证号码。间谍软件往往作为某些服务的「免费」下载程序的一部分下载到个人计算机中，或在未经您同意或知晓的情况下被下载到您的计算机中。\r\n我们强烈建议您安装并使用较有信誉的反间谍软件产品以保护您的计算机免受间谍软件的侵害。</p><h3>密码设置注意事项：</h3><p>密码是取得您的网上户口数据的钥匙，因此您必须紧记将密码妥为保密。密码可以是任何字符，包括数字、字母、特殊字符等。长度在6～16位之间，区分\r\n英文字母大小写。密码最好是包含字母、数字、特殊字符的组合，不要设置成常用数字，如：生日、电话号码等，也不要设为一个单词。密码的位数应该超过六位，\r\n经常修改密码，并为重要服务例如网上理财服务设置独立的密码。</p><p>		</p><p><br/></p>', '五大重要守则 ', '\r\n安全补丁更新：\r\n\r\n些常用的计算机软件的保安漏洞可被病毒作者和黑客利用，来进入那些未安装安全补丁程序的计算机，盗取资料。一旦发现这种情况，软件出版商便会推出安全补丁程序来堵塞这些漏洞。您可定期浏览软件出版商的网站，对操作系统和应用软件进行安全补丁更新。\r\n防病毒软件：\r\n\r\n安装防病毒软件，定期更新软件及安装最新的病毒定义文件，有效保障计算机免受病毒侵袭。\r\n个人防火墙：\r\n\r\n安装防火墙，帮助保护您的计算机系统不会在连接互联网时受到侵袭，可阻止资料在未经您授权下传入或传出您的计算机。\r\n反间谍程序：\r\n\r\n间谍软件可运行在用户计算机上用以监测及收集用户上网信息的程序，能够监测和搜集用户的上网信息，比如获取您输入的个人信息，包括密码、电话号码、信用卡帐号及身份证号码。间谍软件往往作为某些服务的「免费」下载程序的一部分下载到个人计算机中，或在未经您同意或知晓的情况下被下载到您的计算机中。我们强烈建议您安装并使用较有信誉的反间谍软件产品以保护您的计算机免受间谍软件的侵害。\r\n密码设置注意事项：\r\n\r\n密码是取得您的网上户口数据的钥匙，因此您必须紧记将密码妥为保密。密码可以是任何字符，包括数字、字母、特殊字符等。长度在6～16位之间，区分英文字母大小写。密码最好是包含字母、数字、特殊字符的组合，不要设置成常用数字，如：生日、电话号码等，也不要设为一个单词。密码的位数应该超过六位，经常修改密码，并为重要服务例如网上理财服务设置独立的密码。\r\n', 0, 1, '2015-01-21 15:20:43', NULL, 0, 2, '', 0, '{"thumb":"","template":"page"}', 0, 0, 0, 0),
(21, 1, '避免私下交易 ', '2015-01-21 15:24:16', '<p>p2p信贷系统建议用户避免尝试私下交易。私下交易的约束力极低，不受《合同法》的保护，造成逾期的风险非常高，同时您的个人信息将有可能被泄漏，存在遭遇诈骗甚至受到严重犯罪侵害的隐患。</p>', '避免私下交易 ', 'p2p信贷系统建议用户避免尝试私下交易。私下交易的约束力极低，不受《合同法》的保护，造成逾期的风险非常高，同时您的个人信息将有可能被泄漏，存在遭遇诈骗甚至受到严重犯罪侵害的隐患。 ', 1, 1, '2015-01-21 15:23:50', NULL, 0, NULL, '', 0, '{"thumb":""}', 11, 0, 0, 0),
(22, 1, '五大重要守则 ', '2015-01-21 15:24:44', '<p>\r\n		</p><h3>安全补丁更新：</h3><p>些常用的计算机软件的保安漏洞可被病毒作者和黑客利用，来进入那些未安装安全补丁程序的计算机，盗取资料。一旦发现这种情况，软件出版商便会推出安全补丁程序来堵塞这些漏洞。您可定期浏览软件出版商的网站，对操作系统和应用软件进行安全补丁更新。</p><h3>防病毒软件：</h3><p>安装防病毒软件，定期更新软件及安装最新的病毒定义文件，有效保障计算机免受病毒侵袭。</p><h3>个人防火墙：</h3><p>安装防火墙，帮助保护您的计算机系统不会在连接互联网时受到侵袭，可阻止资料在未经您授权下传入或传出您的计算机。</p><h3>反间谍程序：</h3><p>间谍软件可运行在用户计算机上用以监测及收集用户上网信息的程序，能够监测和搜集用户的上网信息，比如获取您输入的个人信息，包括密码、电话号码、\r\n信用卡帐号及身份证号码。间谍软件往往作为某些服务的「免费」下载程序的一部分下载到个人计算机中，或在未经您同意或知晓的情况下被下载到您的计算机中。\r\n我们强烈建议您安装并使用较有信誉的反间谍软件产品以保护您的计算机免受间谍软件的侵害。</p><h3>密码设置注意事项：</h3><p>密码是取得您的网上户口数据的钥匙，因此您必须紧记将密码妥为保密。密码可以是任何字符，包括数字、字母、特殊字符等。长度在6～16位之间，区分\r\n英文字母大小写。密码最好是包含字母、数字、特殊字符的组合，不要设置成常用数字，如：生日、电话号码等，也不要设为一个单词。密码的位数应该超过六位，\r\n经常修改密码，并为重要服务例如网上理财服务设置独立的密码。</p><p>		</p><p><br/></p>', '五大重要守则 ', '\r\n安全补丁更新：\r\n\r\n些常用的计算机软件的保安漏洞可被病毒作者和黑客利用，来进入那些未安装安全补丁程序的计算机，盗取资料。一旦发现这种情况，软件出版商便会推出安全补丁程序来堵塞这些漏洞。您可定期浏览软件出版商的网站，对操作系统和应用软件进行安全补丁更新。\r\n防病毒软件：\r\n\r\n安装防病毒软件，定期更新软件及安装最新的病毒定义文件，有效保障计算机免受病毒侵袭。\r\n个人防火墙：\r\n\r\n安装防火墙，帮助保护您的计算机系统不会在连接互联网时受到侵袭，可阻止资料在未经您授权下传入或传出您的计算机。\r\n反间谍程序：\r\n\r\n间谍软件可运行在用户计算机上用以监测及收集用户上网信息的程序，能够监测和搜集用户的上网信息，比如获取您输入的个人信息，包括密码、电话号码、信用卡帐号及身份证号码。间谍软件往往作为某些服务的「免费」下载程序的一部分下载到个人计算机中，或在未经您同意或知晓的情况下被下载到您的计算机中。我们强烈建议您安装并使用较有信誉的反间谍软件产品以保护您的计算机免受间谍软件的侵害。\r\n密码设置注意事项：\r\n\r\n密码是取得您的网上户口数据的钥匙，因此您必须紧记将密码妥为保密。密码可以是任何字符，包括数字、字母、特殊字符等。长度在6～16位之间，区分英文字母大小写。密码最好是包含字母、数字、特殊字符的组合，不要设置成常用数字，如：生日、电话号码等，也不要设为一个单词。密码的位数应该超过六位，经常修改密码，并为重要服务例如网上理财服务设置独立的密码。\r\n', 1, 1, '2015-01-21 15:24:20', NULL, 0, NULL, '', 0, '{"thumb":""}', 9, 0, 0, 0),
(23, 1, '完善的贷中贷后管理 ', '2015-01-21 15:25:14', '<p>\r\n		</p><p>贷中审查：<br/>贷中审核人员会对借款中客户资料的有效期、资料属性及客户的还款状态进行实时监控，对客户信息变动进行更新。保持与客户的畅通联系，避免失去联系导致借款产生风险。对异常客户转入贷后管理系统。</p><p>贷后管理：<br/>如果用户逾期未归还贷款，贷后管理部门将第一时间通过短信、电话等方式提醒用户进行还款，如果用户在5天内还未归还当期借款，p2p信贷将会联系该用户的\r\n紧急联系人、直系亲属、单位等督促用户尽快还款。如果用户仍未还款，交由专业的高级催收团队与第三方专业机构合作进行包括上门等一系列的催收工作，直至采\r\n取法律手段。</p><p>		</p><p><br/></p>', '完善的贷中贷后管理 ', '完善的贷中贷后管理', 1, 1, '2015-01-21 15:24:56', NULL, 0, NULL, '', 0, '{"thumb":""}', 12, 0, 0, 0),
(24, 1, '严格的贷前审核 ', '2015-01-21 15:25:44', '<p>贷前审核：<br/>在客户提出借款申请后，p2p信贷系统会对客户的基本资料进行分析。通过网络、电话及其他可以掌握的有效渠道进行详实、仔细的调查。避免不良客户的欺诈风\r\n险。在资料信息核实完成后，根据个人信用风险分析系统进行评估，由经验丰富的贷款审核人员进行双重审核确认后最终决定批核结果。</p>', '严格的贷前审核 ', '严格的贷前审核 ', 1, 1, '2015-01-21 15:25:18', NULL, 0, NULL, '', 0, '{"thumb":""}', 11, 0, 0, 0),
(25, 1, '', '2015-01-21 15:26:13', '<p>\r\n		</p><h3>我们有哪些措施保障您的隐私安全</h3><ul class=" list-paddingleft-2" id="anquanli"><li><p>p2p信贷系统严格遵守国家相关法律法规，对用户的隐私信息进行严格的保护。</p></li><li><p>我们采用业界最先进的加密技术，用户的注册信息、账户收支信息都已进行高强度的加密处理，不会被不法分子窃取到。</p></li><li><p>p2p信贷系统设有严格的安全系统，未经允许的员工不可获取您的相关信息。</p></li><li><p>p2p信贷系统绝不会将您的账户信息、银行信息以任何形式透露给第三方。</p></li></ul><h3>个人信息安全：</h3><p>p2p信贷系统是一个实名认证平台，p2p信贷系统会保证用户信息隐私的安全，用户在平台上交流的过程中，也要时刻注意保护个人隐私，截图注意覆盖个人信息，不要透露真实姓名与住址等，以防个人信息被盗取造成损失。</p><p>		</p><p><br/></p>', '隐私保护 ', '\r\n我们有哪些措施保障您的隐私安全\r\n\r\n    p2p信贷系统严格遵守国家相关法律法规，对用户的隐私信息进行严格的保护。\r\n    我们采用业界最先进的加密技术，用户的注册信息、账户收支信息都已进行高强度的加密处理，不会被不法分子窃取到。\r\n    p2p信贷系统设有严格的安全系统，未经允许的员工不可获取您的相关信息。\r\n    p2p信贷系统绝不会将您的账户信息、银行信息以任何形式透露给第三方。\r\n\r\n个人信息安全：\r\n\r\np2p信贷系统是一个实名认证平台，p2p信贷系统会保证用户信息隐私的安全，用户在平台上交流的过程中，也要时刻注意保护个人隐私，截图注意覆盖个人信息，不要透露真实姓名与住址等，以防个人信息被盗取造成损失。\r\n', 1, 1, '2015-01-21 15:25:48', NULL, 0, NULL, '', 0, '{"thumb":""}', 15, 0, 0, 0),
(26, 1, '账户安全 ', '2015-01-21 15:26:46', '<p><br/></p><h3>第三方资金托管</h3><p>p2p信贷目前对客户交易资金的保管完全按照&quot;专户专款专用&quot;的标准模式进行运作，客户在p2p信贷的交易资金是可以完全放心的。</p><ul id="anquan_step" class="clearfix list-paddingleft-2"><li><p><a href="http://127.0.0.1/ptp/#zha_stpe1">第 1 步：牢记p2p信贷系统官方网址，警惕欺诈网站</a></p></li><li><p><a href="http://127.0.0.1/ptp/#zha_stpe2">第 2 步：用邮箱注册一个p2p信贷系统账号</a></p></li><li><p><a href="http://127.0.0.1/ptp/#zha_stpe3">第 3 步：设置高强度的&quot;登录密码&quot;</a></p></li><li><p><a href="http://127.0.0.1/ptp/#zha_stpe4">第 4 步：多给电脑杀毒</a></p></li></ul><h3 id="zha_stpe1">第 1 步：牢记p2p信贷官方网址，警惕欺诈网站</h3><p>请牢记p2p信贷的官方网址是http://www.ac371.com，不要点击来历不明的链接访问p2p信贷。您可将p2p信贷的官网链接添加到浏览器的收藏夹中，以便您的下次登录。</p><h3 id="zha_stpe2">第 2 步：用邮箱注册一个p2p信贷系统账号</h3><p>您可以用一个常用的电子邮箱注册一个p2p信贷账号，您将用该邮箱接收来自p2p信贷的验证、提醒等重要通知邮件。</p><h3 id="zha_stpe3">第 3 步：设置高强度的&quot;登录密码&quot;</h3><p>什么是高强度的登录密码，怎么设置会更安全？您在密码设置时，最好使用数字和字母混合，不要使用纯数字或纯字母。强烈建议不要把&quot;登录密码&quot;设置成生日、姓名拼音或是邮箱名，这些都是容易被他人猜到的形式。</p><h3 id="zha_stpe4">第 4 步：多给电脑杀毒</h3><p>及时更新操作系统补丁，升级新版浏览器，安装反病毒软件和防火墙并保持更新；避免在网吧等公共场所使用网上银行，不要打开来历不明的电子邮件等。</p><p>电脑中毒会怎么样？ 如果电脑一直中毒，病毒会容易获取您的账户信息。</p><p>电脑怎么杀毒？ 我们推荐支付宝安全联盟，联盟提供了很多免费的杀毒软件下载。</p><p><br/></p><p><br/></p>', '账户安全 ', '账户安全 ', 1, 1, '2015-01-21 15:26:24', NULL, 0, NULL, '', 0, '{"thumb":""}', 12, 0, 0, 0),
(27, 1, '本金保障计划 ', '2015-01-21 15:29:08', '<p><br/></p><h3 style="border-bottom:medium none;border-left:medium none;border-top:medium none;border-right:medium none;">什么是本金保障计划？</h3><p>本金保障指当理财人（借出者）投资的借款出现严重逾期时（即逾期超过30天），p2p信贷系统将向理财人垫付此笔借款未归还的剩余出借本金或本息（具体情况视投资标的类型的具体垫付规则为准），从而为理财人营造一个安全的投资环境，保证投资人的本金安全。</p><h3 style="border-bottom:medium none;border-left:medium none;border-top:medium none;border-right:medium none;">理财人（出借者）需要向p2p信贷系统支付本金保障计划服务的费用吗？</h3><p>当前理财人无需支付任何费用，通过身份认证成为借出者即可享受此服务。</p><h3 style="border-bottom:medium none;border-left:medium none;border-top:medium none;border-right:medium none;">如果我投资的借款发生逾期了，p2p信贷系统如何赔付？</h3><p>当您投资的借款发生逾期30天后，p2p信贷风险备用金账户会在一个工作日内将此笔借款的应赔付金额自动充入您的p2p信贷账户中（具体情况视投资标的类型的具体垫付规则为准）。</p><h3 style="border-bottom:medium none;border-left:medium none;border-top:medium none;border-right:medium none;">我在p2p信贷上的所有理财投资是否都适用p2p信贷本金保障计划？</h3><p>是的，每项投资的具体垫付规则视投资标的具体类型而定。</p><p>风险备用金账户规则</p><p>“风险备用金账户”是指为p2p信贷系统所服务的所有理财人的共同利益考虑、以p2p信贷名义单独开设并由其管理的一个专款专用账户。</p><h3 style="border-bottom:medium none;border-left:medium none;border-top:medium none;border-right:medium none;">“风险备用金账户”资金来源：</h3><p>“风险备用金账户”资金当前全部来源于p2p信贷系统根据其与借款人签署的协议向其所服务的借款人所收取的服务费（以下简称“服务费”），p2p信\r\n贷系统在依协议向借款人收取服务费的同时，将在收取的服务费中按照贷款产品类型及借款人的信用等级等信息计提风险备用金（详见《p2p信贷系统风险备用金\r\n账户—产品垫付规则明细表》）。计提的风险备用金将存放入“风险备用金账户”进行专户管理。各产品类型及信用等级等所对应的风险备用金的计提标准和方式由\r\np2p信贷制定并解释，p2p信贷有权根据实际业务需要对相关内容进行调整，如作修改，p2p信贷将及时进行披露。</p><h3 style="border-bottom:medium none;border-left:medium none;border-top:medium none;border-right:medium none;">“风险备用金账户”资金用途：</h3><p>“风险备用金账户”资金将专门用于在一定限额内弥补p2p信贷所服务的理财人（债权人）由于借款人（债务人）的违约所遭受的本金或本息的损失（具体\r\n赔付金额以所投资的产品类型的垫付规则为准），即当借款人（债务人）逾期还款超过30日时，p2p信贷将按照“风险备用金账户”资金使用规则从该账户中提\r\n取相应资金用于偿付理财人（债权人）应收取的本金或本息金额（不同产品的垫付范围请参考《p2p信贷系统风险备用金账户—产品垫付规则明细表》）（以下统\r\n一简称“逾期应收赔付金额”）。</p><h3 style="border-bottom:medium none;border-left:medium none;border-top:medium none;border-right:medium none;">“风险备用金账户”资金使用规则：</h3><p>“风险备用金账户”资金使用遵循以下规则：<br/>1、违约偿付规则，即当借款人（债务人）逾期还款超过30 日时，方才从“风险备用金账户”资金中抽取相应资金偿付理财人（债权人）逾期应收赔付金额。<br/>2、时间顺序规则，即“风险备用金账户”资金对理财人（债权人）逾期应收赔付金额的偿付按照该债权发生的时间顺序进行偿付分配，先偿付时间发生在前的债权，后偿付时间发生在后的债权。<br/>3、债权比例规则， \r\n“风险备用金账户”资金对同一借款协议下的不同理财人（债权人）逾期应收赔付金额的偿付按照各债权金额占同协议内发生的债权总额的比例进行偿付分配；或，\r\n当“风险备用金账户”资金当期余额不足以支付当期（每月为一期）所有应享受该账户的理财人所对应的逾期赔付金额时，则当期应享受该账户的理财人按照各自对\r\n应的逾期应收赔付金额占当期所有理财人对应的逾期应收赔付总额的比例进行偿付分配。<br/>4、有限偿付规则，即“风险备用金账户”资金对理财人（债权人）逾期应收赔付的偿付以该账户的资金总额为限，当该账户余额为零时，自动停止对理财人逾期应收赔付金额的偿付，直到该账户获得新的风险备用金。<br/>5、收益转移规则，即当理财人享有了“风险备用金帐户”对某笔逾期债权赔付金额的足额偿付后，该债权对应的借款人其后为该笔债权所偿还的本金、利息及罚息\r\n归属“风险备用金账户”；如债权有抵押、质押及其他担保的，则平台代借款人处置抵押质押物的所得等也归属“风险备用金账户”。<br/>6、金额上限规则，即当“风险备用金帐户”内金额超过当时平台上所有债权本金金额的10%时，p2p借贷系统有权将超出部分转出该账户，转出部分归p2p借贷系统所有。<br/></p><h3 style="border-bottom:medium none;border-left:medium none;border-top:medium none;border-right:medium none;">“风险备用金账户”资金管理原则：</h3><p>p2p信贷将审慎管理“风险备用金账户”资金，并就账户及资金使用情况对理财人进行定期（按季度/月）披露。具体披露方式及解释权归p2p信贷所有。</p><h3 style="border-bottom:medium none;border-left:medium none;border-top:medium none;border-right:medium none;">附表：《p2p信贷风险备用金账户—产品垫付规则明细表》</h3><p style="position:relative;text-align:center;"><img alt="" src="http://127.0.0.1/ptp/public/images/aq/benjinhelp.jpg" border="0"/></p><p class="b">注：信用认证标中与部分渠道合作的产品风险金计提标准不适用上表规则，将根据合作渠道的具体情形单独设定。2</p><p><br/></p><p><br/></p>', '本金保障计划 ', '本金保障计划 ', 1, 1, '2015-01-21 15:28:44', NULL, 0, NULL, '', 0, '{"thumb":""}', 9, 0, 0, 0),
(28, 1, '网站公告', '2015-03-03 16:13:49', '<p><span style="color: rgb(89, 89, 89);">尊敬的用户：</span></p><p><br/></p><p><span style="color: rgb(89, 89, 89);">&nbsp; &nbsp; 依据《国务院办公厅关于2015年部分节假日安排的通知》，现公布河南贷2015年春节放假及值班安排如下：</span></p><p><br/></p><p><span style="color: rgb(89, 89, 89);">一、放假时间</span></p><p><span style="color: rgb(89, 89, 89);">&nbsp; &nbsp; 2015年2月14日至2月24日，共10天</span></p><p><span style="color: rgb(89, 89, 89);">二、放假期间工作安排</span></p><p><span style="color: rgb(89, 89, 89);">&nbsp; 1、充值</span></p><p><span style="color: rgb(89, 89, 89);">&nbsp; &nbsp; &nbsp;线上充值正常；线下充值成功后请及时联系客服QQ</span></p><p><span style="color: rgb(89, 89, 89);">&nbsp; 2、提现</span></p><p><span style="color: rgb(89, 89, 89);">&nbsp; &nbsp;&nbsp; 2月25日12点至2月2日28点不处理提现，其它时间正常处理提现</span></p><p><span style="color: rgb(89, 89, 89);">&nbsp; 3、春节节假期间不进行还款通知，请妥善安排好您的资金，避免逾期。</span></p><p><span style="color: rgb(89, 89, 89);">&nbsp; &nbsp; &nbsp;温馨提示：请大家提前做好相关安排。给您造成的不便，敬请谅解。</span></p><p><br/></p><p><span style="color: rgb(89, 89, 89);">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 感谢您的一路陪伴</span></p><p><br/></p><p><span style="color: rgb(89, 89, 89);">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; p2p网贷运营中心</span></p><p><span style="color: rgb(89, 89, 89);">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2015.02.10</span></p><p><br/></p>', '网站公告', '网站公告', 1, 1, '2015-03-03 16:13:29', NULL, 0, NULL, '', 0, '{"thumb":""}', 12, 0, 0, 1),
(29, 1, '通知', '2015-03-03 16:14:45', '<p><span style="font-size: 16px; color: rgb(89, 89, 89); font-family: 微软雅黑,Microsoft YaHei;"><span style="color: rgb(89, 89, 89); font-size: 16px;">尊敬的用户：</span></span></p><p><br/></p><p><span style="font-size: 16px; color: rgb(89, 89, 89); font-family: 微软雅黑,Microsoft YaHei;"><span style="font-size: 16px; color: rgb(255, 0, 0); font-family: 宋体,SimSun;">&nbsp; &nbsp; <span style="font-size: 16px; color: rgb(255, 0, 0); font-family: 微软雅黑,Microsoft YaHei;"><span style="font-size: 16px; color: rgb(89, 89, 89);">为了给各位投资人打造一个完善的借贷平台，p2p网贷平台部分功能仍需测试， 上线时间另通知，望相互告知。如有疑问请致电网站服务热线0371-55518240或咨询客服。</span><span style="font-size: 16px; color: rgb(0, 0, 0);">&nbsp;</span></span></span></span></p><p><span style="font-size: 16px; color: rgb(89, 89, 89); font-family: 微软雅黑,Microsoft YaHei;"><span style="color: rgb(89, 89, 89); font-size: 16px;">特此通知!</span></span></p><p><br/></p><p><br/></p><p><span style="font-family: 微软雅黑,Microsoft YaHei;"><span style="font-family: 微软雅黑,Microsoft YaHei; font-size: 16px; color: rgb(89, 89, 89);"><span style="font-size: 16px; color: rgb(255, 0, 0); font-family: 宋体,SimSun;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span><span style="font-family: 微软雅黑,Microsoft YaHei; font-size: 16px; color: rgb(0, 0, 0);"><span style="font-size: 16px; color: rgb(255, 0, 0); font-family: 宋体,SimSun;"> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <span style="font-size: 16px; color: rgb(89, 89, 89); font-family: 微软雅黑,Microsoft YaHei;">p2p网贷运营中心</span></span></span></span></p><p><span style="font-size: 16px; color: rgb(89, 89, 89); font-family: 微软雅黑,Microsoft YaHei;"><span style="font-size: 16px; color: rgb(255, 0, 0); font-family: 宋体,SimSun;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="font-size: 16px; color: rgb(0, 0, 0); font-family: 微软雅黑,Microsoft YaHei;">&nbsp;<span style="font-size: 16px; color: rgb(89, 89, 89);">2014年12月20号</span></span></span></span></p><p><br/></p>', '通知', '通知', 1, 1, '2015-03-03 16:13:54', NULL, 0, NULL, '', 0, '{"thumb":""}', 10, 0, 0, 1),
(30, 1, '', '2015-03-13 15:51:36', '<p style="text-align:left;"><span style="color: rgb(89, 89, 89);"><strong><span style="font-size: 18px;">如何充值</span></strong><span style="font-size: 18px;">：</span></span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">1、选择在线充值，只需开通网上银行，点击首页-我的账户-充值-用户就可以充值了。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">2、选择线下充值，自行选择网站公布的公司银行账号，通过网上银行转账的方式进行打款。到，您也可以银行柜台进行汇款，保留流水单号。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">3、打款业务办理完后，到线下充值页面填写交易编号，交易时间，交易金额等信息，确认提交。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">4、等待网站审核人员对该笔充值进行审核。可联系网站财务</span></p><p><br/></p>', '如何充值', '如何充值', 1, 1, '2015-03-13 15:47:55', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(31, 1, '', '2015-03-13 15:53:58', '<p style="text-align:left;"><span style="color: rgb(89, 89, 89);"><strong><span style="font-size: 18px;">如何充值</span></strong><span style="font-size: 18px;">：</span></span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">1、选择在线充值，只需开通网上银行，点击首页-我的账户-充值-用户就可以充值了。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">2、选择线下充值，自行选择网站公布的公司银行账号，通过网上银行转账的方式进行打款。到，您也可以银行柜台进行汇款，保留流水单号。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">3、打款业务办理完后，到线下充值页面填写交易编号，交易时间，交易金额等信息，确认提交。</span></p><p style="text-align:left;"><span style="font-size: 16px; color: rgb(89, 89, 89);">4、等待网站审核人员对该笔充值进行审核。可联系网站财务</span></p><p><br/></p>', '如何充值', '如何充值', 1, 1, '2015-03-13 15:53:32', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ac_remind`
--

CREATE TABLE IF NOT EXISTS `ac_remind` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(3000) NOT NULL COMMENT '邮件模版',
  `sms` varchar(140) NOT NULL COMMENT '短信模版',
  `message` varchar(500) NOT NULL COMMENT '站内信模版',
  `param` varchar(250) NOT NULL COMMENT '参数',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `ac_remind`
--

INSERT INTO `ac_remind` (`id`, `email`, `sms`, `message`, `param`, `title`, `state`) VALUES
(1, '', '', '', '{"\\"#user#\\"":"\\u201c\\u7528\\u6237\\u540d\\u201d","\\"#modelname#\\"":"\\u201c\\u8ba4\\u8bc1\\u540d\\u79f0\\u201d"}', '认证通过', 0),
(2, '', '', '', '{"\\"#name#\\"":"\\"\\u7528\\u6237\\u540d\\u79f0\\""}', '认证没有通过', 0),
(3, '', '你好#name#你的#type#审核已经通过', '请用#SITE_NAME#代替网站名称,#SITE_HOST#替代网站域名,"#user#"代替>"用户名";"#modelname#"代替>"资料类型";', '{"\\"#user#\\"":"\\"\\u7528\\u6237\\u540d\\"","\\"#modelname#\\"":"\\"\\u8d44\\u6599\\u7c7b\\u578b\\""}', '资料审核通过', 1),
(4, '', '你好#user#你的#modelname#审核没有通过！', '	请用#SITE_NAME#代替网站名称,#SITE_HOST#替代网站域名,"#user#"代替"用户名";"#modelname#";', '{"\\"#user#\\"":"\\"\\u7528\\u6237\\u540d\\";\\"#modelname#\\""}', '资料审核没有通过', 0),
(5, '"<table cellpadding=\\"2\\" cellspacing=\\"2\\" width=\\"100%\\"><tbody><tr class=\\"firstRow\\"><td><span style=\\"color: rgb(255, 183, 82);\\">\\u8bf7\\u7528#SITE_NAME#\\u4ee3\\u66ff\\u7f51\\u7ad9\\u540d\\u79f0,#SITE_HOST#\\u66ff\\u4ee3\\u7f51\\u7ad9\\u57df\\u540d,#user_login#\\u4ee3\\u66ff&quot;\\u7528\\u6237\\u540d&quot;;#sub_name#\\u4ee3\\u66ff&quot;\\u8d37\\u6b3e\\u7b80\\u77ed\\u540d\\u79f0&quot;;#state#\\u4ee3\\u66ff&quot;\\u901a\\u8fc7\\u521d\\u6b21\\u5ba1\\u6838&quot;;#time#\\u4ee3\\u66ff&quot;\\u65f6\\u95f4&quot;;#url#\\u4ee3\\u66ff&quot;\\u67e5\\u770b\\u5730\\u5740&quot;;<br\\/><br\\/><\\/span><\\/td><\\/tr><\\/tbody><\\/table><p><br\\/><\\/p>"', '您好#user_login#您的#sub_name#的贷款#state#\n#time#查看#url#', '您好#user_login#您的#sub_name#的贷款#state#\n#time#查看#url#', '{"#user_login#":"\\"\\u7528\\u6237\\u540d\\"","#sub_name#":"\\"\\u8d37\\u6b3e\\u7b80\\u77ed\\u540d\\u79f0\\"","#state#":"\\"\\u901a\\u8fc7\\u521d\\u6b21\\u5ba1\\u6838\\"","#time#":"\\"\\u65f6\\u95f4\\"","#url#":"\\"\\u67e5\\u770b\\u5730\\u5740\\""}', '贷款初审', 5),
(6, '"<p>\\u60a8\\u597d\\uff0c#username#\\uff0c<\\/p><p>\\u60a8\\u7684#loanname#\\u6807\\u4e8e#time#\\u5df2\\u7ecf\\u6295\\u6807\\u8fc7\\u534a\\u3002<\\/p><p>\\u8be6\\u60c5\\u8bf7\\u70b9\\u51fb\\u8fd9\\u4e2a\\u8fde\\u63a5#url#<\\/p><p><span style=\\"color: rgb(255, 183, 82); font-family: &#39;Microsoft YaHei&#39;, Lato, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\\"><br\\/><\\/span><\\/p>"', '您好，#username#，\n您的#loanname#标于#time#已经投标过半。\n详情请点击这个连接#url#', '', '{"#username#":"  \\"\\u7528\\u6237\\u540d\\"","#loanname#":" \\"\\u6807\\u540d\\u79f0\\"","#time#":" \\"\\u65f6\\u95f4\\"","#url#":" \\"\\u6807\\u8fde\\u63a5\\""}', '投标过半通知', 1),
(7, '', '请用#SITE_NAME#代替网站名称,#SITE_HOST#替代网站域名,#username#代替"贷款用户名";#loanname#代替"贷款名称";#time#代替"满标时间";#url#代替"贷款展示网址";', '请用#SITE_NAME#代替网站名称,#SITE_HOST#替代网站域名,#username#代替"贷款用户名";#loanname#代替"贷款名称";#time#代替"满标时间";#url#代替"贷款展示网址";', '{"#username#":"\\"\\u8d37\\u6b3e\\u7528\\u6237\\u540d\\"","#loanname#":"\\"\\u8d37\\u6b3e\\u540d\\u79f0\\"","#time#":"\\"\\u6ee1\\u6807\\u65f6\\u95f4\\"","#url#":"\\"\\u8d37\\u6b3e\\u5c55\\u793a\\u7f51\\u5740\\""}', '满标待审核放款', 4),
(8, '"<p>&quot;#user_login#&quot;=&quot;\\u7528\\u6237&quot;,&quot;#sub_name#&quot;=&quot;\\u6807\\u540d\\u79f0&quot;,&quot;#state#&quot;=&quot;\\u72b6\\u6001&quot;,&quot;#time#&quot;=&quot;\\u5ba1\\u6838\\u65f6\\u95f4&quot;,&quot;#url#&quot;=&quot;\\u7f51\\u5740&quot;<\\/p>"', '"#user_login#"="用户","#sub_name#"="标名称","#state#"="状态","#time#"="审核时间","#url#"="网址"', '"#user_login#"="用户","#sub_name#"="标名称","#state#"="状态","#time#"="审核时间","#url#"="网址111"', '{"#user_login#":"\\"\\u7528\\u6237\\"","#sub_name#":"\\"\\u6807\\u540d\\u79f0\\"","#state#":"\\"\\u72b6\\u6001\\"","#time#":"\\"\\u5ba1\\u6838\\u65f6\\u95f4\\"","#url#":"\\"\\u7f51\\u5740\\""}', '满标复审审核状态更改', 5),
(9, '"<table cellpadding=\\"2\\" cellspacing=\\"2\\" width=\\"100%\\"><tbody><tr class=\\"firstRow\\"><td><span style=\\"color: rgb(255, 183, 82);\\">\\u8bf7\\u7528#SITE_NAME#\\u4ee3\\u66ff\\u7f51\\u7ad9\\u540d\\u79f0,#SITE_HOST#\\u66ff\\u4ee3\\u7f51\\u7ad9\\u57df\\u540d,#transfer_time#\\u4ee3\\u66ff&quot;\\u8f6c\\u8ba9\\u65f6\\u95f4&quot;;#transfer_id#\\u4ee3\\u66ff&quot;\\u8f6c\\u8ba9\\u503a\\u6743ID&quot;;#url#\\u4ee3\\u66ff&quot;\\u503a\\u6743\\u7f51\\u5740&quot;;#loan_id#\\u4ee3\\u66ff&quot;\\u6295\\u6807ID&quot;;#transfer_amount#\\u4ee3\\u66ff&quot;\\u8f6c\\u8ba9\\u4ef7\\u683c&quot;;<\\/span><\\/td><\\/tr><\\/tbody><\\/table><p><br\\/><\\/p>"', '	请用#SITE_NAME#代替网站名称,#SITE_HOST#替代网站域名,#transfer_time#代替"转让时间";#transfer_id#代替"转让债权ID";#url#代替"债权网址";#loan_id#代替"投标ID";#transfer_amount#代替"转', '	请用#SITE_NAME#代替网站名称,#SITE_HOST#替代网站域名,#transfer_time#代替"转让时间";#transfer_id#代替"转让债权ID";#url#代替"债权网址";#loan_id#代替"投标ID";#transfer_amount#代替"转让价格";', '{"#transfer_time#":"\\"\\u8f6c\\u8ba9\\u65f6\\u95f4\\"","#transfer_id#":"\\"\\u8f6c\\u8ba9\\u503a\\u6743ID\\"","#url#":"\\"\\u503a\\u6743\\u7f51\\u5740\\"","#loan_id#":"\\"\\u6295\\u6807ID\\"","#transfer_amount#":"\\"\\u8f6c\\u8ba9\\u4ef7\\u683c\\""}', '债券转让成功', 5),
(10, '"<p>\\u60a8\\u597d!\\u60a8\\u7684#name#\\u672c\\u671f\\u5df2\\u7ecf\\u8fd8\\u6b3e\\u6210\\u529f\\uff0c\\u8fd8\\u6b3e\\u91d1\\u989d:#moeny#,\\u67e5\\u770b\\u7f51\\u5740:#url#<\\/p><p>\\u4e0b\\u671f\\u8fd8\\u6b3e\\u65e5\\u671f\\uff1a#next_repay_date#\\uff0c\\u4e0b\\u671f\\u8fd8\\u6b3e\\u91d1\\u989d:#next_repay_moeny#<\\/p>"', '', '', '{"#url#":"\\"\\u7f51\\u5740\\"","#name#":"\\"\\u6807\\u540d\\u79f0\\"","#moeny#":"\\"\\u91d1\\u989d\\"","#next_repay_date#":"\\"\\u4e0b\\u6b21\\u8fd8\\u6b3e\\u65e5\\u671f\\"","#next_repay_moeny#":"\\"\\u4e0b\\u6b21\\u8fd8\\u6b3e\\u7684\\u94b1\\u6570\\""}', '还款成功', 5),
(11, '', '', '"#url#"="网址","#name#"="标名称","#moeny#"="金额","#date#"="日期"', '{"#url#":"\\"\\u7f51\\u5740\\"","#name#":"\\"\\u6807\\u540d\\u79f0\\"","#moeny#":"\\"\\u91d1\\u989d\\"","#date#":"\\"\\u65e5\\u671f\\""}', '借款已还款完毕', 5),
(12, '', '', '', '{"#url#":"\\"\\u6807\\u7684\\u7f51\\u5740\\"","#loan_name#":"\\"\\u6807\\u540d\\u79f0\\"","#money#":"\\"\\u672c\\u6b21\\u94b1\\u6570\\"","#next_time#":"\\"\\u4e0b\\u671f\\u8fd8\\u6b3e\\u65f6\\u95f4\\"","#next_money#":"\\"\\u4e0b\\u671f\\u8fd8\\u6b3e\\u7684\\u94b1\\u6570\\""}', '借款人还款', 5),
(13, '', '', '', '{"#url#":"\\"\\u6807\\u7684\\u7f51\\u5740\\"","#loan_name#":"\\"\\u6807\\u540d\\u79f0\\"","#money#":"\\"\\u672c\\u6b21\\u94b1\\u6570\\"","all_repay_money":"\\"\\u672c\\u6b21\\u6295\\u6807\\u5171\\u83b7\\u5f97\\u6536\\u76ca\\"","all_impose_money":"\\"\\u8fdd\\u7ea6\\u91d1\\""}', '借款人还款完毕', 5),
(14, '"<p>\\u60a8\\u597d\\u7528\\u6237\\uff0c\\u60a8\\u7684#name#\\uff0c\\u63d0\\u524d\\u8fd8\\u6b3e\\u6210\\u529f\\uff0c\\u672c\\u6b21\\u8fd8\\u6b3e\\u672c\\u606f#money#\\uff0c\\u7ba1\\u7406\\u8d39#month_manage_money#\\uff0c\\u8fdd\\u7ea6\\u91d1#impose_money#\\uff0c\\u67e5\\u770b\\u7f51\\u5740#url#<\\/p>"', '您好用户，您的#name#，提前还款成功，本次还款本息#money#，管理费#month_manage_money#，违约金#impose_money#，查看网址#url#', '您好用户，您的#name#，提前还款成功，本次还款本息#money#，管理费#month_manage_money#，违约金#impose_money#，查看网址#url#', '{"#url#":"\\"\\u6807\\u7f51\\u5740\\"","#name#":"\\"\\u6807\\u540d\\u79f0\\"","#money#":"\\"\\u672c\\u606f\\"","#month_manage_money#":"\\"\\u7ba1\\u7406\\u8d39\\"","#impose_money#":"\\"\\u8fdd\\u7ea6\\u91d1\\""}', '提前还款成功', 5),
(15, '"<p>\\u60a8\\u597d\\u7528\\u6237\\uff0c\\u60a8\\u7684\\u6807#loan_name#\\uff0c\\u672c\\u6b21\\u8fd8\\u6b3e\\u65e5\\u671f#repay_date#\\uff0c\\u9700\\u8981\\u8fd8\\u6b3e\\u91d1\\u989d#money#\\u5143\\uff0c\\u67e5\\u770b\\u7f51\\u5740:#url#<\\/p>"', '您好用户，您的标#loan_name#，本次还款日期#repay_date#，需要还款金额#money#元，查看网址:#url#\n', '您好用户，您的标#loan_name#，本次还款日期#repay_date#，需要还款金额#money#元，查看网址:#url#', '{"#loan_name#":"\\"\\u6807\\u540d\\u79f0\\"","#url#":"\\"\\u7f51\\u5740\\"","#repay_date#":"\\"\\u672c\\u6b21\\u8fd8\\u6b3e\\u65e5\\u671f\\"","#money#":"\\"\\u9700\\u8981\\u6362\\u91d1\\u989d\\""}', '三天内需还款通知', 5),
(16, '"<p>&quot;#loan_name#&quot;=&quot;\\u6807\\u540d\\u79f0&quot;],&quot;#url#&quot;=&quot;\\u7f51\\u5740&quot;,&quot;#time#&quot;=&quot;\\u6d41\\u6807\\u65f6\\u95f4&quot;<\\/p>"', '"#loan_name#"="标名称"],"#url#"="网址","#time#"="流标时间"', '"#loan_name#"="标名称"],"#url#"="网址","#time#"="流标时间"', '{"#loan_name#":"\\"\\u6807\\u540d\\u79f0\\"]","#url#":"\\"\\u7f51\\u5740\\"","#time#":"\\"\\u6d41\\u6807\\u65f6\\u95f4\\""}', '流标提醒', 5);

-- --------------------------------------------------------

--
-- 表的结构 `ac_role`
--

CREATE TABLE IF NOT EXISTS `ac_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '角色名称',
  `pid` smallint(6) DEFAULT NULL COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段',
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `ac_role`
--

INSERT INTO `ac_role` (`id`, `name`, `pid`, `status`, `remark`, `create_time`, `update_time`, `listorder`) VALUES
(1, '超级管理员', 0, 1, '拥有网站最高管理员权限！', 1329633709, 1329633709, 0),
(2, '胡大大', NULL, 1, 'sdf', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ac_role_user`
--

CREATE TABLE IF NOT EXISTS `ac_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ac_role_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_route`
--

CREATE TABLE IF NOT EXISTS `ac_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id',
  `full_url` varchar(255) DEFAULT NULL COMMENT '完整url， 如：portal/list/index?id=1',
  `url` varchar(255) DEFAULT NULL COMMENT '实际显示的url',
  `listorder` int(5) DEFAULT '0' COMMENT '排序，优先级，越小优先级越高',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1：启用 ;0：不启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ac_route`
--


-- --------------------------------------------------------

--
-- 表的结构 `ac_slide`
--

CREATE TABLE IF NOT EXISTS `ac_slide` (
  `slide_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slide_cid` bigint(20) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_pic` varchar(255) DEFAULT NULL,
  `slide_url` varchar(255) DEFAULT NULL,
  `slide_des` varchar(255) DEFAULT NULL,
  `slide_content` text,
  `slide_status` int(2) NOT NULL DEFAULT '1',
  `listorder` int(10) DEFAULT '0',
  PRIMARY KEY (`slide_id`),
  KEY `slide_cid` (`slide_cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ac_slide`
--

INSERT INTO `ac_slide` (`slide_id`, `slide_cid`, `slide_name`, `slide_pic`, `slide_url`, `slide_des`, `slide_content`, `slide_status`, `listorder`) VALUES
(1, 1, '第一张图', '5507bd3743cac.png', '', '士大夫大师', '', 1, 0),
(2, 1, '第二章图', '5507bd55cfe43.png', '', '发达省份', '', 1, 0),
(3, 1, '第三张图', '5507bdbc2310f.png', '', '发达省份', '', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ac_slide_cat`
--

CREATE TABLE IF NOT EXISTS `ac_slide_cat` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_idname` varchar(255) NOT NULL,
  `cat_remark` text,
  `cat_status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`),
  KEY `cat_idname` (`cat_idname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ac_slide_cat`
--

INSERT INTO `ac_slide_cat` (`cid`, `cat_name`, `cat_idname`, `cat_remark`, `cat_status`) VALUES
(1, '首页轮播图', 'index', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ac_terms`
--

CREATE TABLE IF NOT EXISTS `ac_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `slug` varchar(200) DEFAULT '',
  `taxonomy` varchar(32) DEFAULT NULL COMMENT '分类类型',
  `description` longtext COMMENT '分类描述',
  `parent` bigint(20) unsigned DEFAULT '0' COMMENT '分类父id',
  `count` bigint(20) DEFAULT '0' COMMENT '分类文章数',
  `path` varchar(500) DEFAULT NULL COMMENT '分类层级关系路径',
  `seo_title` varchar(500) DEFAULT NULL,
  `seo_keywords` varchar(500) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `list_tpl` varchar(50) DEFAULT NULL COMMENT '分类列表模板',
  `one_tpl` varchar(50) DEFAULT NULL COMMENT '分类文章页模板',
  `listorder` int(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布',
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `ac_terms`
--

INSERT INTO `ac_terms` (`term_id`, `name`, `slug`, `taxonomy`, `description`, `parent`, `count`, `path`, `seo_title`, `seo_keywords`, `seo_description`, `list_tpl`, `one_tpl`, `listorder`, `status`) VALUES
(1, '借款标介绍', '', 'article', '', 0, 0, '0-1', '', '', '', 'list', 'article', 0, 1),
(7, '使用帮助', '', 'article', '帮助介绍', 0, 0, '0-7', '', '', '', 'list', 'article', 0, 1),
(6, '关于我们', '', 'article', '介绍', 0, 0, '0-6', '', '', '', 'list', 'article', 0, 1),
(8, '了解更多', '', 'article', '更多的介绍', 0, 0, '0-8', '', '', '', 'list', 'article', 0, 1),
(9, '安全保护', '', 'article', '安全保护', 0, 0, '0-9', '', '', '', 'list', 'article', 0, 1),
(10, '其他', '', 'article', '', 0, 0, '0-10', '', '', '', 'list', 'page', 0, 1),
(11, '网站公告', '', 'article', '网站公告信息', 0, 0, '0-11', '', '', '', 'list', 'article', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ac_term_relationships`
--

CREATE TABLE IF NOT EXISTS `ac_term_relationships` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'posts表里文章id',
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布',
  PRIMARY KEY (`tid`),
  KEY `term_taxonomy_id` (`term_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `ac_term_relationships`
--

INSERT INTO `ac_term_relationships` (`tid`, `object_id`, `term_id`, `listorder`, `status`) VALUES
(1, 1, 1, 0, 1),
(2, 2, 1, 0, 1),
(3, 9, 6, 0, 1),
(4, 10, 7, 0, 1),
(5, 11, 7, 0, 1),
(6, 12, 7, 0, 1),
(7, 13, 7, 0, 1),
(8, 14, 9, 0, 1),
(9, 15, 6, 0, 1),
(10, 16, 6, 0, 1),
(11, 17, 8, 0, 1),
(12, 18, 9, 0, 1),
(13, 21, 10, 0, 1),
(14, 22, 10, 0, 1),
(15, 23, 10, 0, 1),
(16, 24, 10, 0, 1),
(17, 25, 10, 0, 1),
(18, 26, 10, 0, 1),
(19, 27, 10, 0, 1),
(20, 28, 11, 0, 1),
(21, 29, 11, 0, 1),
(22, 30, 12, 0, 0),
(23, 31, 13, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ac_users`
--

CREATE TABLE IF NOT EXISTS `ac_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_phone` char(11) NOT NULL COMMENT '用户手机',
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；ac_password加密',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '用户美名',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `user_url` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `role_id` smallint(6) DEFAULT NULL COMMENT '用户角色id',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `user_type` smallint(1) DEFAULT '1' COMMENT '用户类型，1:admin ;2:会员',
  `datamark` varchar(300) NOT NULL COMMENT '资料认证的标识',
  `auditamark` varchar(300) NOT NULL COMMENT '认证标识',
  `payment_pass` varchar(64) NOT NULL COMMENT '支付密码',
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `phone` (`user_phone`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `ac_users`
--

INSERT INTO `ac_users` (`id`, `user_phone`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `avatar`, `sex`, `birthday`, `signature`, `last_login_ip`, `last_login_time`, `create_time`, `user_activation_key`, `user_status`, `role_id`, `score`, `user_type`, `datamark`, `auditamark`, `payment_pass`) VALUES
(1, '', 'admin', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'admin', 'fdsf@dffd.hb', '', '54b9de437f060.jpg', 0, NULL, NULL, '106.42.250.126', '2015-04-17 15:56:56', '2014-12-16 03:00:56', '', 1, 1, 0, 1, '', '', ''),
(3, '15235654874', 'test', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'test', 'hi@imqiyu.com', '', '54cb1d2f528a9.png', 0, NULL, NULL, '218.29.89.218', '2015-04-17 10:41:33', '2014-12-17 10:08:40', '', 1, NULL, 4936, 2, 'a:3:{i:7;s:12:"车辆信息";i:6;s:12:"房产资料";i:9;s:12:"测试类型";}', 'a:4:{i:5;s:12:"现场认证";i:3;s:12:"实名认证";i:4;s:12:"视频认证";i:1;s:12:"手机认证";}', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258'),
(4, '15038509206', 'ttt', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'ttt', '9974@qq.com', '', NULL, 0, NULL, NULL, '127.0.0.1', '2015-02-04 14:18:30', '2015-01-20 16:45:29', '814e36a5aa25aefbca23929d09f1a42e', 2, NULL, 0, 2, '', '', ''),
(6, '15035898745', 'rrr', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'rrr', '2663432715@qq.com', '', NULL, 0, NULL, NULL, '127.0.0.1', '2015-02-05 09:54:40', '2015-01-20 17:48:04', 'cc0b22ebe5ac255f0b98b241efc1adf1', 1, NULL, 0, 2, '', '', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258'),
(7, '13592423253', 'ac371', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'ac371', '2685700274@qq.com', '', NULL, 0, NULL, NULL, '127.0.0.1', '2015-02-25 13:18:34', '2015-01-23 15:38:04', 'c28c483d0acd8b30a9aa58a6aa6d9bf8', 1, NULL, 0, 2, '', '', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258'),
(10, '15038509029', 'hjh1', 'ba1e5d5fe7693d9188577cc9bfe9291ac66b5cc872b78258', 'hjh1', '99752@qq.com', '', NULL, 0, NULL, NULL, '', '0000-00-00 00:00:00', '2015-01-31 18:49:01', '', 1, NULL, 0, 2, '', '', ''),
(9, '15038509026', 'hjhuser', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', '', '123456@qq.com', '', NULL, 0, NULL, NULL, '127.0.0.1', '2015-02-12 14:07:15', '0000-00-00 00:00:00', '', 1, NULL, 0, 2, '', '', ''),
(11, '13592423253', 'z4231', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'z4231', 'z4231@163.com', '', NULL, 0, NULL, NULL, '1.192.121.104', '2015-03-06 08:43:38', '2015-03-06 08:43:38', '', 1, NULL, 0, 2, '', '', ''),
(12, '13803757895', 'test123', 'ba1e5d5fe769dc483e80a7a0bd9ef71d8cf9736739248258', 'test123', '3936899891@qq.com', '', NULL, 0, NULL, NULL, '218.29.89.218', '2015-03-11 14:08:28', '2015-03-11 14:08:28', '', 1, NULL, 0, 2, '', '', ''),
(13, '15903673953', 'wuhaofz502', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'wuhaofz502', '969245275@qq.com', '', NULL, 0, NULL, NULL, '218.29.89.218', '2015-03-14 13:43:06', '2015-03-14 09:40:32', '', 1, NULL, 0, 2, '', '', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258'),
(47, '13526884748', '省服协', 'ba1e5d5fe76976c7411305dbfd66c61bded2c75acfb48258', '省服协', '100285847@qq.com', '', NULL, 0, NULL, NULL, '115.60.49.188', '2015-03-25 11:59:47', '2015-03-25 11:59:47', '', 1, NULL, 0, 2, '', '', ''),
(46, '13803757895', 'testzl1', 'ba1e5d5fe769dc483e80a7a0bd9ef71d8cf9736739248258', 'testzl1', 'zldyx_123@163.com', '', NULL, 0, NULL, NULL, '218.29.89.218', '2015-03-16 11:57:36', '2015-03-16 11:56:09', '', 1, NULL, 0, 2, '', '', ''),
(45, '13803757895', 'testzl', 'ba1e5d5fe769dc483e80a7a0bd9ef71d8cf9736739248258', 'testzl', 'zkdyx_123@163.com', '', NULL, 0, NULL, NULL, '218.29.89.218', '2015-03-16 11:52:52', '2015-03-16 11:50:28', 'b9ccb75f293c2aeea7848ae48a5b289d', 2, NULL, 0, 2, '', '', ''),
(44, '15038509029', 'errr', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'errr', '393689989@qq.com', '', NULL, 0, NULL, NULL, '218.29.89.218', '2015-03-14 19:00:13', '2015-03-14 19:00:13', '', 1, NULL, 0, 2, '', '', ''),
(48, '13592423253', 'zhaozhaozhao', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'zhaozhaozhao', 'pay@imqiyu.com', '', NULL, 0, NULL, NULL, '101.36.78.9', '2015-04-13 20:39:09', '2015-04-13 20:39:09', '', 1, NULL, 0, 2, '', '', ''),
(51, '15638117710', 'hjh', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'hjh', '997465573@qq.com', '', NULL, 0, NULL, NULL, '115.60.198.0', '2015-04-16 22:56:20', '2015-04-13 23:11:46', '', 1, NULL, 0, 2, '', '', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258'),
(52, '15638117710', 'rrrc', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'rrrc', '997465573@qq.com', '', NULL, 0, NULL, NULL, '115.60.194.219', '2015-04-14 00:47:38', '2015-04-14 00:47:22', '1430243f395b44289b47c3a2b898515e', 2, NULL, 0, 2, '', '', ''),
(53, '13017660342', 'zzhxhs', 'ba1e5d5fe7693b4883add9bf1afbf1087dc2de3ebbb58258', 'zzhxhs', 'zzhxhs@126.com', '', NULL, 0, NULL, NULL, '171.8.222.217', '2015-04-15 09:39:50', '2015-04-15 09:35:22', '', 1, NULL, 0, 2, '', '', ''),
(54, '15936217900', 'rain', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'rain', '707308252@qq.com', '', '553076f7d7842.png', 0, NULL, NULL, '1.192.121.104', '2015-04-17 16:23:34', '2015-04-15 10:25:46', '', 1, NULL, 10, 2, '', 'a:1:{i:3;s:12:"实名认证";}', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258'),
(55, '15936217900', 'rainbow', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'rainbow', '837474170@qq.com', '', NULL, 0, NULL, NULL, '123.149.223.203', '2015-04-17 10:50:59', '2015-04-15 19:19:17', '', 1, NULL, 0, 2, '', '', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258'),
(56, '13592423253', 'fskfjk', 'ba1e5d5fe769e10adc3949ba59abbe56e057f20f883e8258', 'fskfjk', 'buy@imqiyu.com', '', NULL, 0, NULL, NULL, '111.161.17.10', '2015-04-15 20:35:21', '2015-04-15 20:20:34', '', 1, NULL, 0, 2, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `ac_user_bank`
--

CREATE TABLE IF NOT EXISTS `ac_user_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '提s现人（标识ID）',
  `user_name` varchar(150) NOT NULL,
  `bank_name` varchar(200) NOT NULL COMMENT '银行名称',
  `bankcard` varchar(30) NOT NULL COMMENT '卡号',
  `real_name` varchar(20) NOT NULL COMMENT '姓名',
  `region_lv1` varchar(100) NOT NULL,
  `region_lv2` varchar(100) NOT NULL,
  `region_lv3` varchar(100) NOT NULL,
  `region_lv4` varchar(100) NOT NULL,
  `bankzone` varchar(255) NOT NULL COMMENT '开户网点',
  `create_time` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `bank_id` (`bank_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `ac_user_bank`
--

INSERT INTO `ac_user_bank` (`id`, `user_id`, `user_name`, `bank_name`, `bankcard`, `real_name`, `region_lv1`, `region_lv2`, `region_lv3`, `region_lv4`, `bankzone`, `create_time`) VALUES
(5, 3, 'test', '华夏银行', '4353465475678686755', '赵玉', '', '上海市', '上海市', '长宁区', 'fsdafdsafdsttfsda', '1422434313'),
(6, 3, 'test', '招商银行', '234231432143214231', '赵玉', '中国', '天津市', '天津市', '河西区', 'fdsafdsafsda', '1422495893'),
(7, 3, 'test', '农村商业银行', '12345678946578425', '赵玉', '中国', '上海市', '上海市', '杨浦区', 'sdafsdfdsafsa', '1423445765'),
(8, 3, 'test', '中国建设银行', '123456498', '赵玉', '中国', '天津市', '天津市', '河西区', '', '1423460311'),
(9, 3, 'test', '招商银行', '1345678546', '赵玉', '中国', '重庆市', '重庆市', '九龙坡区', '', '1423460418'),
(10, 3, 'test', '中国建设银行', '123456498', '赵玉', '中国', '天津市', '天津市', '河西区', '', '1423472035'),
(11, 54, 'rain', '中国工商银行', '123456789', '刘女士', '中国', '河南省', '郑州市', '金水区', 'rrr', '1429239728');

-- --------------------------------------------------------

--
-- 表的结构 `ac_user_carry`
--

CREATE TABLE IF NOT EXISTS `ac_user_carry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '提现人（标识ID）',
  `user_name` varchar(150) NOT NULL,
  `money` decimal(10,0) NOT NULL COMMENT '提现金额',
  `fee` decimal(10,0) NOT NULL COMMENT '手续费',
  `bank_name` varchar(150) NOT NULL COMMENT '银行ID',
  `bankcard` varchar(30) NOT NULL COMMENT '开好',
  `create_time` int(11) NOT NULL COMMENT '提交日期',
  `status` tinyint(1) NOT NULL COMMENT '0未处理，1成功，2失败',
  `msg` text NOT NULL COMMENT '操作通知内容',
  `descs` text NOT NULL COMMENT '备注',
  `real_name` varchar(30) NOT NULL COMMENT '姓名',
  `region_lv1` varchar(100) NOT NULL COMMENT '国ID',
  `region_lv2` varchar(100) NOT NULL COMMENT '省ID',
  `region_lv3` varchar(100) NOT NULL COMMENT '市ID',
  `region_lv4` varchar(100) NOT NULL COMMENT '区ID',
  `bankzone` varchar(255) NOT NULL COMMENT '开户网点',
  `admin_user` varchar(100) NOT NULL,
  `time` varchar(25) NOT NULL COMMENT '审核时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `ac_user_carry`
--

INSERT INTO `ac_user_carry` (`id`, `user_id`, `user_name`, `money`, `fee`, `bank_name`, `bankcard`, `create_time`, `status`, `msg`, `descs`, `real_name`, `region_lv1`, `region_lv2`, `region_lv3`, `region_lv4`, `bankzone`, `admin_user`, `time`) VALUES
(2, 3, 'test', 4000, 50, '中国建设银行', '43534654756786867', 1422411532, 1, '', 'chenggong', '赵玉', '中国', '江西省', '南昌市', '西湖区', 'fsdafdsafds', 'admin', '2015-01-28 15:16:47'),
(3, 3, 'test', 100, 5, '中国建设银行', '43534654756786867', 1422430558, 2, '', 'shibai', '赵玉', '', '江西省', '南昌市', '西湖区', 'fsdafdsafds', 'admin', '2015-01-28 15:38:18'),
(4, 3, 'test', 100, 5, '中国建设银行', '43534654756786867', 1422434313, 1, '', '', '赵玉', '', '江西省', '南昌市', '西湖区', 'fsdafdsafds', 'admin', '2015-02-12 10:32:40'),
(5, 3, 'test', 100, 5, '中国建设银行', '43534654756786867', 1422434559, 0, '', '', '赵玉', '', '江西省', '南昌市', '西湖区', 'fsdafdsafds', '', ''),
(6, 3, 'test', 1000, 0, '中国建设银行', '123456498', 1423708182, 0, '', '', '赵玉', '中国', '天津市', '天津市', '河西区', '', '', ''),
(7, 3, 'test', 100, 0, '华夏银行', '4353465475678686755', 1429240363, 0, '', '', '赵玉', '', '上海市', '上海市', '长宁区', 'fsdafdsafdsttfsda', '', ''),
(8, 54, 'rain', 0, 0, '中国工商银行', '123456789', 1429254557, 0, '', '', '刘女士', '中国', '河南省', '郑州市', '金水区', 'rrr', '', ''),
(9, 54, 'rain', 100, 0, '中国工商银行', '123456789', 1429255951, 0, '', '', '刘女士', '中国', '河南省', '郑州市', '金水区', 'rrr', '', ''),
(10, 54, 'rain', 100, 0, '中国工商银行', '123456789', 1429256591, 1, '', '财务赵静打款100元', '刘女士', '中国', '河南省', '郑州市', '金水区', 'rrr', 'admin', '2015-04-17 16:00:02'),
(11, 54, 'rain', 43120, 0, '中国工商银行', '123456789', 1429257393, 1, '', '已经打款', '刘女士', '中国', '河南省', '郑州市', '金水区', 'rrr', 'admin', '2015-04-17 15:57:50');

-- --------------------------------------------------------

--
-- 表的结构 `ac_user_favorites`
--

CREATE TABLE IF NOT EXISTS `ac_user_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '收藏内容的标题',
  `url` varchar(255) DEFAULT NULL COMMENT '收藏内容的原文地址，不带域名',
  `description` varchar(500) DEFAULT '' COMMENT '收藏内容的描述',
  `table` varchar(50) DEFAULT NULL COMMENT '收藏实体以前所在表，不带前缀',
  `object_id` int(11) DEFAULT NULL COMMENT '收藏内容原来的主键id',
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ac_user_favorites`
--

INSERT INTO `ac_user_favorites` (`id`, `uid`, `title`, `url`, `description`, `table`, `object_id`, `createtime`) VALUES
(2, 3, '魂牵梦萦地', 'http://www.ptop.com/index.php?g=Loan&amp;m=index&amp;a=deal&amp;id=22', 'undefined', 'loan', 22, 1430031972),
(3, 3, 'fsdafasd', 'http://www.ptop.com/index.php?g=Loan&amp;m=index&amp;a=deal&amp;id=24', 'undefined', 'loan', 24, 1430031989),
(6, 21, 'testtest', 'http://ptp.ac371.cn/index.php/loan/index/deal/id/9', 'undefined', 'loan', 9, 1426319794),
(5, 3, '提前还款标测试', 'http://ptp.ac371.cn/index.php?g=Loan&amp;m=index&amp;a=deal&amp;id=1', 'undefined', 'loan', 1, 1426054111);

-- --------------------------------------------------------

--
-- 表的结构 `ac_user_info`
--

CREATE TABLE IF NOT EXISTS `ac_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(13) NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '性别  1男 2女',
  `national` varchar(50) NOT NULL DEFAULT '' COMMENT '民族',
  `born` varchar(12) NOT NULL COMMENT '出生',
  `idcard` varchar(18) NOT NULL,
  `idcard_img` varchar(100) NOT NULL,
  `native_place` varchar(200) NOT NULL DEFAULT '' COMMENT '籍贯',
  `location` varchar(23) NOT NULL COMMENT '现居住地址',
  `marriage` varchar(20) NOT NULL COMMENT '婚姻状况',
  `education` varchar(150) NOT NULL COMMENT '最高学历',
  `monthly_income` tinyint(2) NOT NULL,
  `housing` tinyint(1) NOT NULL,
  `buy_cars` tinyint(1) NOT NULL,
  `university` varchar(200) NOT NULL COMMENT '毕业院校',
  `company` varchar(15) NOT NULL,
  `qq` varchar(12) NOT NULL,
  `bank` smallint(3) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `bank_account` varchar(19) NOT NULL,
  `fixed_line` varchar(15) NOT NULL,
  `cellphone` varchar(11) NOT NULL,
  `assure` int(11) unsigned NOT NULL,
  `wechat` varchar(255) NOT NULL,
  `certification` tinyint(1) NOT NULL,
  `email_audit` tinyint(1) NOT NULL DEFAULT '1',
  `cellphone_audit` tinyint(1) NOT NULL,
  `video_audit` tinyint(1) NOT NULL COMMENT '0未认证1认证通过2审核中3审核未通过',
  `site_audit` tinyint(1) NOT NULL COMMENT '现场认证',
  `wechat_audit` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `ac_user_info`
--

INSERT INTO `ac_user_info` (`id`, `uid`, `name`, `gender`, `national`, `born`, `idcard`, `idcard_img`, `native_place`, `location`, `marriage`, `education`, `monthly_income`, `housing`, `buy_cars`, `university`, `company`, `qq`, `bank`, `bank_name`, `bank_account`, `fixed_line`, `cellphone`, `assure`, `wechat`, `certification`, `email_audit`, `cellphone_audit`, `video_audit`, `site_audit`, `wechat_audit`) VALUES
(1, 1, '', 0, '0', '', '', '', '', '', '0', '0', 0, 0, 0, '0', '', '', 0, '', '', '', '', 0, '', 0, 0, 1, 0, 1, 0),
(2, 3, '赵玉', 1, '回族', '1988-01-17', '411522199001012454', '/ptop/data/upload/54b7937f0a120.jpg,/ptop/data/upload/54b79393df254.jpg', '河南省,南阳市,城关镇', '郑州市 金水区ttttttttttt', '未婚', '研究生或以上', 0, 1, 1, '河南大学', '', '', 0, '', '', '', '15038509025', 0, '', 0, 2, 1, 1, 1, 1),
(10, 17, '胡大大', 1, '', '2015-02-24', '411522199001012454', '', '安徽省,六安市,寿县', '时代复分三大范德萨阿斯蒂芬范德萨', '未婚', '高中或以下', 0, 0, 0, '范德萨分', '', '', 0, '', '', '', '15038509029', 0, '', 0, 0, 0, 0, 0, 1),
(11, 54, '刘女士', 2, '', '1982-04-02', '411282198204025525', '', '河南省,郑州市,金水区', '文博西路', '已婚', '研究生或以上', 0, 1, 1, '', '', '', 0, '', '', '', '15936217900', 0, '', 0, 0, 0, 0, 0, 1),
(12, 51, '张晓光', 1, '', '1996-04-09', '411522199008055414', '', '山东省,泰安市,岱岳区', '发的萨芬发大水范德萨', '离异', '高中或以下', 0, 0, 0, '发到发大水', '', '', 0, '', '', '', '15038506595', 0, '', 0, 1, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `ac_user_level`
--

CREATE TABLE IF NOT EXISTS `ac_user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `img` varchar(200) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `ac_user_level`
--

INSERT INTO `ac_user_level` (`id`, `name`, `img`, `min`, `max`) VALUES
(1, 'HR', '/data/upload/Level/54cc4141349fe.png', 0, 99),
(2, 'E', '/data/upload/Level/54cc41ec9daea.png', 100, 109),
(3, 'D', '/data/upload/Level/54cc422007245.png', 110, 119),
(4, 'C', '/data/upload/Level/54cc42464f787.png', 120, 129),
(5, 'B', '/data/upload/Level/54cc42dd220cd.png', 130, 144),
(6, 'A', '/data/upload/Level/54cc42f0a6a98.png', 145, 159),
(7, 'AA', '/data/upload/Level/54cc43042014a.png', 160, 50000);

-- --------------------------------------------------------

--
-- 表的结构 `ac_user_log`
--

CREATE TABLE IF NOT EXISTS `ac_user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `actionname` varchar(200) NOT NULL,
  `page` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `ac_user_log`
--

INSERT INTO `ac_user_log` (`id`, `uid`, `actionname`, `page`, `time`, `ip`) VALUES
(1, 3, '标：1还款', 'User/Deal/repay_borrow_money', 1424846202, '127.0.0.1'),
(2, 3, '充值手续费：test用户您好    充值10000.00元    手续费为50.00元', 'User/Account/review', 1424846793, '127.0.0.1'),
(3, 3, '标：1还款', 'User/Deal/repay_borrow_money', 1426054400, '218.29.89.218'),
(4, 17, '充值手续费：wwww用户您好    充值10000.00元    手续费为50.00元', 'User/Account/review', 1426314463, '218.29.89.218'),
(5, 17, '用户投标,标ID:2,金额:1000', 'Loan/Index/bid', 1426314543, '218.29.89.218'),
(6, 21, '充值手续费：acac用户您好    充值10000000.00元    手续费为50.00元', 'User/Account/review', 1426319499, '218.29.89.218'),
(7, 21, '用户投标,标ID:9,金额:5000', 'Loan/Index/bid', 1426319531, '218.29.89.218'),
(8, 21, '用户投标,标ID:9,金额:3000', 'Loan/Index/bid', 1426319544, '218.29.89.218'),
(9, 21, '用户投标,标ID:9,金额:2000', 'Loan/Index/bid', 1426319574, '218.29.89.218'),
(10, 21, '用户投标,标ID:8,金额:3000', 'Loan/Index/bid', 1426322761, '218.29.89.218'),
(11, 3, '标：9还款', 'User/Deal/repay_borrow_money', 1426324904, '218.29.89.218'),
(12, 48, '贷款申请提交成功，待审核！', 'Loan/Borrow/apply', 1428931141, '101.36.78.9'),
(13, 54, '贷款申请提交成功，待审核！', 'Loan/Borrow/apply', 1429096257, '171.8.229.198'),
(14, 54, '贷款申请提交成功，待审核！', 'Loan/Borrow/apply', 1429096538, '171.8.229.198'),
(15, 55, '贷款申请提交成功，待审核！', 'Loan/Borrow/apply', 1429096842, '171.8.229.198'),
(16, 56, '贷款申请提交成功，待审核！', 'Loan/Borrow/apply', 1429100479, '111.161.17.10'),
(17, 56, '贷款申请提交成功，待审核！', 'Loan/Borrow/apply', 1429100639, '111.161.17.10'),
(18, 56, '贷款申请提交成功，待审核！', 'Loan/Borrow/apply', 1429101366, '111.161.17.10'),
(19, 51, '贷款申请提交成功，待审核！', 'Loan/Borrow/apply', 1429196247, '115.60.198.0'),
(20, 54, '贷款申请提交成功，待审核！', 'Loan/Borrow/apply', 1429237760, '123.149.223.203'),
(21, 54, '系统调整资金：rainbow用户您好    admin管理员修改了您的账户金额。   变动金额为80000元 。变动原因： 充值 ', 'User/Account/account_edit', 1429237970, '123.149.223.203'),
(22, 55, '用户投标,标ID:21,金额:40000', 'Loan/Index/bid', 1429238658, '123.149.223.203'),
(23, 55, '用户投标,标ID:21,金额:3000', 'Loan/Index/bid', 1429238765, '123.149.223.203'),
(24, 55, '用户投标,标ID:21,金额:2600', 'Loan/Index/bid', 1429238811, '123.149.223.203'),
(25, 54, '充值：rain用户您好    20000.00元充值成功', 'User/Account/review', 1429257981, '106.42.250.126');

-- --------------------------------------------------------

--
-- 表的结构 `ac_user_work`
--

CREATE TABLE IF NOT EXISTS `ac_user_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `office` varchar(200) NOT NULL COMMENT '单位名称',
  `jobtype` varchar(100) NOT NULL COMMENT '职业状态',
  `work_city` varchar(200) NOT NULL COMMENT '工作城市',
  `officetype` varchar(150) NOT NULL COMMENT '公司类别',
  `officedomain` varchar(150) NOT NULL COMMENT '公司行业',
  `officecale` varchar(50) NOT NULL COMMENT '公司规模',
  `position` varchar(150) NOT NULL COMMENT '职位',
  `salary` varchar(50) NOT NULL COMMENT '月收入',
  `workyears` varchar(70) NOT NULL COMMENT '在现单位工作年限',
  `workphone` varchar(15) NOT NULL COMMENT '公司电话',
  `workemail` varchar(25) NOT NULL COMMENT '工作邮箱',
  `officeaddress` varchar(250) NOT NULL COMMENT '公司地址',
  `urgentcontact` varchar(50) NOT NULL COMMENT '姓名1',
  `urgentrelation` varchar(50) NOT NULL COMMENT '关系1',
  `urgentmobile` int(11) NOT NULL COMMENT '手机1',
  `urgentcontact2` varchar(50) NOT NULL COMMENT '姓名2',
  `urgentrelation2` varchar(50) NOT NULL COMMENT '关系2',
  `urgentmobile2` int(11) NOT NULL COMMENT '手机2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ac_user_work`
--

INSERT INTO `ac_user_work` (`id`, `uid`, `office`, `jobtype`, `work_city`, `officetype`, `officedomain`, `officecale`, `position`, `salary`, `workyears`, `workphone`, `workemail`, `officeaddress`, `urgentcontact`, `urgentrelation`, `urgentmobile`, `urgentcontact2`, `urgentrelation2`, `urgentmobile2`) VALUES
(1, 3, '光大公司ttt', '私营企业主', '天津市,天津市,南开区', '世界500强（包括合资企业及下级单位）', 'IT', '500人以上', '程序员', '1001-2000元', '5年以上', '0376-8272222', '9974@qq.com', '北京市', '老胡', '父亲', 2147483647, '老妈', '妈', 2147483647),
(2, 9, '发达省份', '工薪阶层', '北京市,北京市,崇文区', '事业单位', 'IT', '10人以下', '撒旦发生大', '20000-50000元', '3-5年（含）', '0371-3868789', '3936859989@qq.com', 'dfasf费大幅', '大师傅', '撒旦法', 2147483647, '倒萨发送到', '大法师', 2147483647),
(3, 17, '范德萨', '网络商家', '天津市,天津市,河西区', '地方国资委直属企业', '政府机关', '10-100人', '富士达', '2000-5000元', '1-3年（含）', '0371-82722222', '9974557@qq.com', 'fasdf dfsa fsda ', 'fdsa', 'fdsa ', 2147483647, '发的是', 'fdsa', 2147483647),
(4, 54, '宏源盛智', '工薪阶层', '河南省,郑州市,金水区', '一般民营企业', 'IT', '10-100人', '技术总监', '2000-5000元', '5年以上', '0371-55823450', '707308252@qq.com', '文博西路', '郑先生', '夫妻', 2147483647, '刘先生 ', '父女', 2147483647);
