-- phpMyAdmin SQL Dump
-- version 3.5.1-rc1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 06 月 20 日 16:28
-- 服务器版本: 5.5.28
-- PHP 版本: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `sanwang`
--

-- --------------------------------------------------------

--
-- 表的结构 `fcw_ad`
--

CREATE TABLE IF NOT EXISTS `fcw_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `type1` char(10) DEFAULT NULL,
  `jpggif` char(15) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `adbh` char(30) DEFAULT NULL,
  `txt` text,
  `sj` datetime DEFAULT NULL,
  `aurl` varchar(230) DEFAULT NULL,
  `sm` varchar(250) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `aw` int(11) DEFAULT NULL,
  `ah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `fcw_ad`
--

INSERT INTO `fcw_ad` (`id`, `bh`, `type1`, `jpggif`, `tit`, `adbh`, `txt`, `sj`, `aurl`, `sm`, `xh`, `aw`, `ah`) VALUES
(1, '1529475414ad84', '图片', 'jpg', '第一张广告', 'MT01', '', '2018-06-20 14:16:54', 'http://', NULL, 1, 0, 0),
(2, '1529475421ad47', '图片', 'jpg', '第二张广告', 'MT01', '', '2018-06-20 14:17:01', 'http://', NULL, 2, 0, 0),
(3, '1529475806ad59', '图片', 'gif', '关于我们大图', 'MT02', '', '2018-06-20 14:23:26', 'http://', NULL, 1, 0, 0),
(4, '1529477896ad75', '图片', 'jpg', '投资指南切换图片', 'MT03', '', '2018-06-20 14:58:16', 'http://', NULL, 1, 0, 0),
(5, '1529484598ad48', '图片', 'jpg', '房产考察底部图片广告', 'MT04', '', '2018-06-20 16:49:58', 'http://', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_admin`
--

CREATE TABLE IF NOT EXISTS `fcw_admin` (
  `adminuid` char(50) DEFAULT NULL,
  `adminpwd` char(50) DEFAULT NULL,
  `qx` varchar(250) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fcw_admin`
--

INSERT INTO `fcw_admin` (`adminuid`, `adminpwd`, `qx`, `id`, `uname`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', ',0,', 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_adsx`
--

CREATE TABLE IF NOT EXISTS `fcw_adsx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type1` char(30) DEFAULT NULL,
  `snum` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=201 ;

--
-- 转存表中的数据 `fcw_adsx`
--

INSERT INTO `fcw_adsx` (`id`, `type1`, `snum`, `money1`) VALUES
(191, 'fang', 10, 1),
(192, 'fang', 50, 5),
(193, 'fang', 100, 10),
(194, 'fang', 200, 20),
(195, 'fang', 300, 30),
(196, 'fang', 400, 40),
(197, 'fang', 500, 50),
(198, 'fang', 600, 60),
(199, 'fang', 800, 80),
(200, 'fang', 1000, 100);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_adzd`
--

CREATE TABLE IF NOT EXISTS `fcw_adzd` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type1` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=492 ;

--
-- 转存表中的数据 `fcw_adzd`
--

INSERT INTO `fcw_adzd` (`id`, `type1`, `xh`, `money1`) VALUES
(412, 'chushou', 1, 10),
(413, 'chushou', 2, 9.5),
(414, 'chushou', 3, 9),
(415, 'chushou', 4, 8.5),
(416, 'chushou', 5, 8),
(417, 'chushou', 6, 7.5),
(418, 'chushou', 7, 7),
(419, 'chushou', 8, 6.5),
(420, 'chushou', 9, 6),
(421, 'chushou', 10, 5.5),
(422, 'chushou', 11, 5),
(423, 'chushou', 12, 4.5),
(424, 'chushou', 13, 4),
(425, 'chushou', 14, 3.5),
(426, 'chushou', 15, 3),
(427, 'chushou', 16, 2.5),
(428, 'chushou', 17, 2),
(429, 'chushou', 18, 1.5),
(430, 'chushou', 19, 1),
(431, 'chushou', 20, 0.5),
(432, 'chuzu', 1, 5),
(433, 'chuzu', 2, 4.8),
(434, 'chuzu', 3, 4.6),
(435, 'chuzu', 4, 4.5),
(436, 'chuzu', 5, 4),
(437, 'chuzu', 6, 3.8),
(438, 'chuzu', 7, 3.7),
(439, 'chuzu', 8, 3.5),
(440, 'chuzu', 9, 3.3),
(441, 'chuzu', 10, 3.1),
(442, 'chuzu', 11, 2.9),
(443, 'chuzu', 12, 2.8),
(444, 'chuzu', 13, 2.6),
(445, 'chuzu', 14, 2.4),
(446, 'chuzu', 15, 2.2),
(447, 'chuzu', 16, 2),
(448, 'chuzu', 17, 1.8),
(449, 'chuzu', 18, 1),
(450, 'chuzu', 19, 0.5),
(451, 'chuzu', 20, 0.3),
(452, 'qiugou', 1, 10),
(453, 'qiugou', 2, 9.5),
(454, 'qiugou', 3, 9),
(455, 'qiugou', 4, 8.5),
(456, 'qiugou', 5, 8),
(457, 'qiugou', 6, 7.5),
(458, 'qiugou', 7, 7),
(459, 'qiugou', 8, 6.5),
(460, 'qiugou', 9, 6),
(461, 'qiugou', 10, 5.5),
(462, 'qiugou', 11, 5),
(463, 'qiugou', 12, 4.5),
(464, 'qiugou', 13, 4),
(465, 'qiugou', 14, 3.5),
(466, 'qiugou', 15, 3),
(467, 'qiugou', 16, 2.5),
(468, 'qiugou', 17, 2),
(469, 'qiugou', 18, 1.5),
(470, 'qiugou', 19, 1),
(471, 'qiugou', 20, 0.4),
(472, 'qiuzu', 1, 5),
(473, 'qiuzu', 2, 4.6),
(474, 'qiuzu', 3, 4.4),
(475, 'qiuzu', 4, 4.2),
(476, 'qiuzu', 5, 4),
(477, 'qiuzu', 6, 3.7),
(478, 'qiuzu', 7, 3.5),
(479, 'qiuzu', 8, 3.3),
(480, 'qiuzu', 9, 2.9),
(481, 'qiuzu', 10, 2.7),
(482, 'qiuzu', 11, 2.4),
(483, 'qiuzu', 12, 2.1),
(484, 'qiuzu', 13, 1.8),
(485, 'qiuzu', 14, 1.4),
(486, 'qiuzu', 15, 1.2),
(487, 'qiuzu', 16, 1.1),
(488, 'qiuzu', 17, 1),
(489, 'qiuzu', 18, 0.8),
(490, 'qiuzu', 19, 0.5),
(491, 'qiuzu', 20, 0.3);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_area`
--

CREATE TABLE IF NOT EXISTS `fcw_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `name2` char(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `py` char(1) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `zb` char(50) DEFAULT NULL,
  `ifhot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fcw_area`
--

INSERT INTO `fcw_area` (`id`, `name1`, `name2`, `admin`, `py`, `xh`, `sj`, `zb`, `ifhot`) VALUES
(1, '泰国', NULL, 1, 'T', 1, '2018-06-20 17:20:10', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_bslx`
--

CREATE TABLE IF NOT EXISTS `fcw_bslx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `fcw_bslx`
--

INSERT INTO `fcw_bslx` (`id`, `name1`, `xh`, `sj`) VALUES
(1, '独立别墅', 1, '2014-10-09 11:11:00'),
(2, '双拼别墅', 2, '2014-10-09 11:10:46'),
(3, '联排别墅', 3, '2014-10-09 11:11:03');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_cflist`
--

CREATE TABLE IF NOT EXISTS `fcw_cflist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `ifok` int(10) DEFAULT NULL,
  `type1` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_chongfa`
--

CREATE TABLE IF NOT EXISTS `fcw_chongfa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `ty1id` int(10) DEFAULT NULL,
  `sj1` int(10) DEFAULT NULL,
  `sj2` int(10) DEFAULT NULL,
  `xh` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_clear`
--

CREATE TABLE IF NOT EXISTS `fcw_clear` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `tp` varchar(250) DEFAULT NULL,
  `type1` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_control`
--

CREATE TABLE IF NOT EXISTS `fcw_control` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `webareav` char(50) DEFAULT NULL,
  `webnamev` char(50) DEFAULT NULL,
  `webqq` varchar(200) DEFAULT NULL,
  `webtelv` varchar(200) DEFAULT NULL,
  `weburlv` varchar(200) DEFAULT NULL,
  `beian` char(40) DEFAULT NULL,
  `webtit` varchar(200) DEFAULT NULL,
  `webkey` varchar(200) DEFAULT NULL,
  `webdes` varchar(250) DEFAULT NULL,
  `webtongji` text,
  `userfb` char(3) DEFAULT NULL,
  `userfy` char(3) DEFAULT NULL,
  `jjrfb` char(3) DEFAULT NULL,
  `jjrfy` char(3) DEFAULT NULL,
  `jiafb` char(10) DEFAULT NULL,
  `jialook` char(10) DEFAULT NULL,
  `fkfb` char(10) DEFAULT NULL,
  `fklook` char(10) DEFAULT NULL,
  `zjfb` char(10) DEFAULT NULL,
  `zjfy` char(10) DEFAULT NULL,
  `jcfb` char(10) DEFAULT NULL,
  `jcfy` char(10) DEFAULT NULL,
  `websyposv` int(11) DEFAULT NULL,
  `mailname` char(50) DEFAULT NULL,
  `mailsmtp` char(50) DEFAULT NULL,
  `mailpwd` char(50) DEFAULT NULL,
  `maildk` char(10) DEFAULT NULL,
  `partner` char(50) DEFAULT NULL,
  `zftype` int(11) DEFAULT NULL,
  `security_code` char(50) DEFAULT NULL,
  `seller_email` char(50) DEFAULT NULL,
  `tenpay1` char(50) DEFAULT NULL,
  `tenpay2` char(50) DEFAULT NULL,
  `dkjf` int(11) DEFAULT NULL,
  `jfmoney` int(11) DEFAULT NULL,
  `ifqq` char(6) DEFAULT NULL,
  `zb` char(50) DEFAULT NULL,
  `zbdj` int(11) DEFAULT NULL,
  `qqappid` varchar(250) DEFAULT NULL,
  `qqappkey` varchar(250) DEFAULT NULL,
  `smsfun` text,
  `LPSELMv` varchar(250) DEFAULT NULL,
  `LPSELMJv` varchar(250) DEFAULT NULL,
  `XQSELMv` varchar(250) DEFAULT NULL,
  `ESFSELMv` varchar(250) DEFAULT NULL,
  `ESFSEMJv` varchar(250) DEFAULT NULL,
  `ZFSELMv` varchar(250) DEFAULT NULL,
  `ZFSEMJv` varchar(250) DEFAULT NULL,
  `QGSELMv` varchar(250) DEFAULT NULL,
  `QZSELMv` varchar(250) DEFAULT NULL,
  `LPFXSELMv` varchar(250) DEFAULT NULL,
  `ifjia` int(11) DEFAULT NULL,
  `regmob` int(11) DEFAULT NULL,
  `sermode` int(10) DEFAULT NULL,
  `LCSEL` char(50) DEFAULT NULL,
  `nowmb` char(50) DEFAULT NULL,
  `fangmot` int(10) DEFAULT NULL,
  `adminmail` varchar(100) DEFAULT NULL,
  `ifwap` int(10) DEFAULT NULL,
  `smsmode` int(10) DEFAULT NULL,
  `wxpay` varchar(250) DEFAULT NULL,
  `ifuc` int(10) DEFAULT NULL,
  `wxlogin` varchar(240) DEFAULT NULL,
  `weixin` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fcw_control`
--

INSERT INTO `fcw_control` (`id`, `webareav`, `webnamev`, `webqq`, `webtelv`, `weburlv`, `beian`, `webtit`, `webkey`, `webdes`, `webtongji`, `userfb`, `userfy`, `jjrfb`, `jjrfy`, `jiafb`, `jialook`, `fkfb`, `fklook`, `zjfb`, `zjfy`, `jcfb`, `jcfy`, `websyposv`, `mailname`, `mailsmtp`, `mailpwd`, `maildk`, `partner`, `zftype`, `security_code`, `seller_email`, `tenpay1`, `tenpay2`, `dkjf`, `jfmoney`, `ifqq`, `zb`, `zbdj`, `qqappid`, `qqappkey`, `smsfun`, `LPSELMv`, `LPSELMJv`, `XQSELMv`, `ESFSELMv`, `ESFSEMJv`, `ZFSELMv`, `ZFSEMJv`, `QGSELMv`, `QZSELMv`, `LPFXSELMv`, `ifjia`, `regmob`, `sermode`, `LCSEL`, `nowmb`, `fangmot`, `adminmail`, `ifwap`, `smsmode`, `wxpay`, `ifuc`, `wxlogin`, `weixin`) VALUES
(1, '泰国', '普吉置业', '3320003537*源码购买,2403653050*源码咨询,2468437512*客服鸯鸯', '0577-67068160', 'http://127.0.0.1/', '浙ICP备123456789号', '普吉置业', '', '', '', 'on', 'off', 'on', 'off', 'on', 'off', 'on', 'off', 'on', 'off', 'on', 'off', 5, 'fcw@yj99.cn', 'smtp.exmail.qq.com', 'x123456', '25', '', 0, '', '199243290@qq.com', '', '', 10, 100, 'off', '116.404269,39.915599', 15, '', '', '', '10000,15000,20000,25000,30000', '50,80,100,120,150,200', '10000,15000,20000,25000,30000', '50,70,100,150,200,300', '50,80,100,120,150,200', '500,1000,1500,2000,3000', '30,50,70,90,110,150,200', '50,70,100,150,200,300', '500,1000,1500,2000,3000', '1000,2000,3000,4000,5000,6000,8000,10000,15000', 1, 0, 0, NULL, 'default', NULL, '', NULL, NULL, NULL, NULL, NULL, '小泰-vipthailand');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_daikuan`
--

CREATE TABLE IF NOT EXISTS `fcw_daikuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `dkje` char(50) DEFAULT NULL,
  `dkyt` char(50) DEFAULT NULL,
  `dkqx` char(50) DEFAULT NULL,
  `zsxm` char(50) DEFAULT NULL,
  `sfzh` char(50) DEFAULT NULL,
  `qqhm` char(50) DEFAULT NULL,
  `xl` char(50) DEFAULT NULL,
  `hyzk` char(50) DEFAULT NULL,
  `zy` char(50) DEFAULT NULL,
  `mot` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_dingdang`
--

CREATE TABLE IF NOT EXISTS `fcw_dingdang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `ddbh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `ddzt` char(50) DEFAULT NULL,
  `alipayzt` char(50) DEFAULT NULL,
  `bz` text,
  `ifok` int(11) DEFAULT NULL,
  `wxddbh` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_ditie`
--

CREATE TABLE IF NOT EXISTS `fcw_ditie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_djl`
--

CREATE TABLE IF NOT EXISTS `fcw_djl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `admin` char(5) DEFAULT NULL,
  `bhid` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_fang`
--

CREATE TABLE IF NOT EXISTS `fcw_fang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `fangbh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(40) DEFAULT NULL,
  `type1` char(10) DEFAULT NULL,
  `fbty` int(11) DEFAULT NULL,
  `mot` char(50) DEFAULT NULL,
  `lxr` char(50) DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `wylx` char(20) DEFAULT NULL,
  `wytsid` varchar(200) DEFAULT NULL,
  `mj` float DEFAULT NULL,
  `mj1` float DEFAULT NULL,
  `mj2` float DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `money2` float DEFAULT NULL,
  `xq` char(50) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` text,
  `hx1` int(11) DEFAULT NULL,
  `hx2` int(11) DEFAULT NULL,
  `hx3` int(11) DEFAULT NULL,
  `hx4` int(11) DEFAULT NULL,
  `hx5` int(11) DEFAULT NULL,
  `lc1` int(11) DEFAULT NULL,
  `lc2` int(11) DEFAULT NULL,
  `jgdw` char(30) DEFAULT NULL,
  `zxqkid` int(11) DEFAULT NULL,
  `cxid` int(11) DEFAULT NULL,
  `jznd` int(11) DEFAULT NULL,
  `pz` varchar(250) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `ditieid` varchar(250) DEFAULT NULL,
  `gongjiaoid` varchar(250) DEFAULT NULL,
  `fadd` varchar(200) DEFAULT NULL,
  `ifok` int(11) DEFAULT NULL,
  `ifxj` int(11) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `ztsm` char(50) DEFAULT NULL,
  `czfs` int(11) DEFAULT NULL,
  `fkfs` char(20) DEFAULT NULL,
  `lxid` int(11) DEFAULT NULL,
  `jbid` int(11) DEFAULT NULL,
  `mytj` int(11) DEFAULT NULL,
  `zjuid` char(50) DEFAULT NULL,
  `cq` char(50) DEFAULT NULL,
  `zdxh` int(11) DEFAULT NULL,
  `zddq` datetime DEFAULT NULL,
  `schoolid` varchar(250) DEFAULT NULL,
  `iftj` int(10) DEFAULT NULL,
  `fbsj` datetime DEFAULT NULL,
  `video` text,
  `jiejing` text,
  `money3` float DEFAULT NULL,
  `fdname` char(50) DEFAULT NULL,
  `fdmot` char(50) DEFAULT NULL,
  `hylx` int(10) DEFAULT NULL,
  `vrurl` text,
  `ld1` char(50) DEFAULT NULL,
  `ld2` char(50) DEFAULT NULL,
  `ld3` char(50) DEFAULT NULL,
  `xqzb` char(50) DEFAULT NULL,
  `xqzb1` char(50) DEFAULT NULL,
  `xqzb2` char(50) DEFAULT NULL,
  `hylx2` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_fanggj`
--

CREATE TABLE IF NOT EXISTS `fcw_fanggj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `zjuserid` int(10) DEFAULT NULL,
  `type1` char(50) DEFAULT NULL,
  `fangbh` char(50) DEFAULT NULL,
  `mybh` char(50) DEFAULT NULL,
  `fbuserid` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `txt` text,
  `uip` char(50) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_fav`
--

CREATE TABLE IF NOT EXISTS `fcw_fav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sj` datetime DEFAULT NULL,
  `fangbh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `fangtype` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_fckc`
--

CREATE TABLE IF NOT EXISTS `fcw_fckc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tit` varchar(250) DEFAULT NULL,
  `tit1` varchar(250) DEFAULT NULL,
  `txt` longtext,
  `djl` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `fcw_fckc`
--

INSERT INTO `fcw_fckc` (`id`, `tit`, `tit1`, `txt`, `djl`, `sj`, `lastsj`, `uip`, `bh`, `zt`) VALUES
(2, '四天三夜·倾情之旅', '普吉岛享受一夏', '', 36, '2018-06-20 16:27:00', '2018-06-20 16:27:00', '127.0.0.1', '1529483220kc9', 0),
(3, '五天四夜·暖冬之旅', '海岛避寒冬 / 这里温度28℃', '', 78, '2018-06-20 16:31:29', '2018-06-20 16:31:29', '127.0.0.1', '1529483489kc46', 0),
(4, '私人定制·随心之旅', '可私人定制专属专制行程', '', 139, '2018-06-20 16:32:00', '2018-06-20 16:32:00', '127.0.0.1', '1529483520kc93', 0),
(6, NULL, NULL, NULL, 26, '2018-06-20 17:03:36', '2018-06-20 17:03:36', '127.0.0.1', '1529485416kc4', 99);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_fwcx`
--

CREATE TABLE IF NOT EXISTS `fcw_fwcx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(20) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `fcw_fwcx`
--

INSERT INTO `fcw_fwcx` (`id`, `name1`, `xh`, `sj`) VALUES
(13, '南北', 1, '2014-06-16 21:18:00'),
(14, '东西', 2, '2014-06-16 21:18:05'),
(15, '南', 3, '2014-06-16 21:18:10'),
(16, '北', 4, '2014-06-16 21:18:13'),
(17, '东', 5, '2014-06-16 21:18:20'),
(18, '西', 6, '2014-06-16 21:18:23'),
(19, '东南', 7, '2014-06-16 21:18:29'),
(20, '西南', 8, '2014-06-16 21:18:32');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_fwlc`
--

CREATE TABLE IF NOT EXISTS `fcw_fwlc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `fcw_fwlc`
--

INSERT INTO `fcw_fwlc` (`id`, `name1`, `xh`, `sj`) VALUES
(1, '多层', 1, '2014-12-02 11:00:29'),
(2, '高层', 2, '2014-12-02 11:00:34'),
(3, '跃层', 3, '2014-12-02 11:00:39');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_fxtg`
--

CREATE TABLE IF NOT EXISTS `fcw_fxtg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tit` varchar(200) DEFAULT NULL,
  `tit1` varchar(250) DEFAULT NULL,
  `txt` longtext,
  `djl` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fcw_fxtg`
--

INSERT INTO `fcw_fxtg` (`id`, `tit`, `tit1`, `txt`, `djl`, `sj`, `lastsj`, `uip`, `bh`, `admin`, `zt`) VALUES
(1, '普吉岛——四天三夜倾情之旅', '普吉岛(Phuket Island)，位于泰国南部马来半岛西海岸外的安达曼海(Andaman Sea)，是泰国最大的海岛，也是泰国最小的一个府。', '<p>adsfasdf</p>', 144, '2018-06-20 19:00:09', '2018-06-20 19:00:09', '127.0.0.1', '1529492409kc41', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_fz`
--

CREATE TABLE IF NOT EXISTS `fcw_fz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `furl` varchar(250) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_gongjiao`
--

CREATE TABLE IF NOT EXISTS `fcw_gongjiao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_help`
--

CREATE TABLE IF NOT EXISTS `fcw_help` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `ty1id` int(11) DEFAULT NULL,
  `ty2id` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` longtext,
  `sj` datetime DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `wkey` varchar(250) DEFAULT NULL,
  `wdes` text,
  `djl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_helptype`
--

CREATE TABLE IF NOT EXISTS `fcw_helptype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sj` datetime DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `name1` char(50) DEFAULT NULL,
  `name2` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_hetong`
--

CREATE TABLE IF NOT EXISTS `fcw_hetong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `zjuserid` int(10) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `htbh` char(50) DEFAULT NULL,
  `jy` char(50) DEFAULT NULL,
  `fadd` varchar(250) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `money2` float DEFAULT NULL,
  `yzxm` char(50) DEFAULT NULL,
  `yzmot` char(50) DEFAULT NULL,
  `yztel` char(50) DEFAULT NULL,
  `yzsfz` char(50) DEFAULT NULL,
  `yzadd` varchar(250) DEFAULT NULL,
  `fcz` varchar(250) DEFAULT NULL,
  `qyr` datetime DEFAULT NULL,
  `yt` char(50) DEFAULT NULL,
  `mj` float DEFAULT NULL,
  `khxm` char(50) DEFAULT NULL,
  `khmot` char(50) DEFAULT NULL,
  `khtel` char(50) DEFAULT NULL,
  `khadd` varchar(250) DEFAULT NULL,
  `khsfz` char(50) DEFAULT NULL,
  `fjtk` text,
  `bz` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_htcaiwu`
--

CREATE TABLE IF NOT EXISTS `fcw_htcaiwu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `zjuserid` int(10) DEFAULT NULL,
  `htbh` char(50) DEFAULT NULL,
  `mybh` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `type1` char(50) DEFAULT NULL,
  `sf` char(50) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `money1ok` float DEFAULT NULL,
  `ff` char(50) DEFAULT NULL,
  `money2` float DEFAULT NULL,
  `money2ok` float DEFAULT NULL,
  `txt` text,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_htyjfc`
--

CREATE TABLE IF NOT EXISTS `fcw_htyjfc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `zjuserid` int(10) DEFAULT NULL,
  `htbh` char(50) DEFAULT NULL,
  `mybh` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `yg` char(50) DEFAULT NULL,
  `yggs` char(50) DEFAULT NULL,
  `fcbl` float DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `money1ok` float DEFAULT NULL,
  `txt` text,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_huxing`
--

CREATE TABLE IF NOT EXISTS `fcw_huxing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `mj` float DEFAULT NULL,
  `hx1` int(11) DEFAULT NULL,
  `hx2` int(11) DEFAULT NULL,
  `hx3` int(11) DEFAULT NULL,
  `hx4` int(11) DEFAULT NULL,
  `hx5` int(11) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `cx` int(11) DEFAULT NULL,
  `zxqkid` int(11) DEFAULT NULL,
  `fwlcid` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `iftj` int(10) DEFAULT NULL,
  `vrurl` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `fcw_huxing`
--

INSERT INTO `fcw_huxing` (`id`, `uid`, `tit`, `mj`, `hx1`, `hx2`, `hx3`, `hx4`, `hx5`, `xh`, `sj`, `xqbh`, `bh`, `cx`, `zxqkid`, `fwlcid`, `money1`, `djl`, `areaid`, `areaids`, `zt`, `iftj`, `vrurl`) VALUES
(1, 'loupan', '五期13#E-E反户型3室2厅2卫1厨', 0, 0, 0, 0, 0, 0, NULL, '2018-06-20 20:05:22', '1529486500lp1', '1529496322j1', 0, 0, 0, 0, 1, 1, 0, 0, 0, ''),
(2, 'loupan', '五期13#A-A反户型1室2厅1卫1厨', 0, 0, 0, 0, 0, 0, NULL, '2018-06-20 20:06:23', '1529486500lp1', '1529496383j1', 0, 0, 0, 0, 1, 1, 0, 0, 0, ''),
(3, 'loupan', '五期13#B-B反户型1室2厅1卫1厨', 0, 0, 0, 0, 0, 0, NULL, '2018-06-20 20:06:47', '1529486500lp1', '1529496407j1', 0, 0, 0, 0, 1, 1, 0, 0, 0, ''),
(4, 'loupan', '13#D-D反户型', 0, 0, 0, 0, 0, 0, NULL, '2018-06-20 20:07:03', '1529486500lp1', '1529496423j1', 0, 0, 0, 0, 1, 1, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jfrecord`
--

CREATE TABLE IF NOT EXISTS `fcw_jfrecord` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `jf` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jgzs`
--

CREATE TABLE IF NOT EXISTS `fcw_jgzs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(10) DEFAULT NULL,
  `areaid` int(10) DEFAULT NULL,
  `money1` char(30) DEFAULT NULL,
  `mon` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jia_jc`
--

CREATE TABLE IF NOT EXISTS `fcw_jia_jc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `type1id` int(11) DEFAULT NULL,
  `type2id` int(11) DEFAULT NULL,
  `type3id` int(11) DEFAULT NULL,
  `mytype1id` int(11) DEFAULT NULL,
  `mytype2id` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` text,
  `djl` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `wkey` varchar(250) DEFAULT NULL,
  `wdes` varchar(250) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `ifxj` int(11) DEFAULT NULL,
  `mytj` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `buyurl` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jia_jctype`
--

CREATE TABLE IF NOT EXISTS `fcw_jia_jctype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` int(11) DEFAULT NULL,
  `type1` char(50) DEFAULT NULL,
  `type2` char(50) DEFAULT NULL,
  `type3` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jia_myjctype`
--

CREATE TABLE IF NOT EXISTS `fcw_jia_myjctype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `type1` char(50) DEFAULT NULL,
  `type2` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jia_photo`
--

CREATE TABLE IF NOT EXISTS `fcw_jia_photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `type1id` int(11) DEFAULT NULL,
  `typesx` varchar(250) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` text,
  `zjuid` char(50) DEFAULT NULL,
  `mj` float DEFAULT NULL,
  `ifxj` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `vrurl` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jia_phototype`
--

CREATE TABLE IF NOT EXISTS `fcw_jia_phototype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` int(11) DEFAULT NULL,
  `type1` char(50) DEFAULT NULL,
  `type2` char(50) DEFAULT NULL,
  `type3` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jia_zb`
--

CREATE TABLE IF NOT EXISTS `fcw_jia_zb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lxr` char(30) DEFAULT NULL,
  `mot` char(35) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `ys` char(50) DEFAULT NULL,
  `txt` text,
  `zt` int(11) DEFAULT NULL,
  `gsid` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jia_zx`
--

CREATE TABLE IF NOT EXISTS `fcw_jia_zx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type1id` int(11) DEFAULT NULL,
  `type2id` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` text,
  `djl` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `zze` char(50) DEFAULT NULL,
  `ly` char(50) DEFAULT NULL,
  `lyurl` varchar(250) DEFAULT NULL,
  `wkey` varchar(250) DEFAULT NULL,
  `wdes` varchar(250) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `iftp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jia_zxtype`
--

CREATE TABLE IF NOT EXISTS `fcw_jia_zxtype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` int(11) DEFAULT NULL,
  `type1` char(30) DEFAULT NULL,
  `type2` char(30) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_jubao`
--

CREATE TABLE IF NOT EXISTS `fcw_jubao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sj` datetime DEFAULT NULL,
  `fangbh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `txt` text,
  `uip` char(50) DEFAULT NULL,
  `lxmot` char(50) DEFAULT NULL,
  `fangtype` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_kanfang`
--

CREATE TABLE IF NOT EXISTS `fcw_kanfang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `uid` varchar(230) DEFAULT NULL,
  `xqbh` varchar(250) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` text,
  `endsj` datetime DEFAULT NULL,
  `bmzt` int(11) DEFAULT NULL,
  `hg` text,
  `zt` int(11) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `iftj` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_kanfanguser`
--

CREATE TABLE IF NOT EXISTS `fcw_kanfanguser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `kfbh` char(50) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  `bmuid` char(50) DEFAULT NULL,
  `mot` char(30) DEFAULT NULL,
  `uname` char(20) DEFAULT NULL,
  `txt` text,
  `sj` datetime DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_kehu`
--

CREATE TABLE IF NOT EXISTS `fcw_kehu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `zjuserid` int(10) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `kh` char(50) DEFAULT NULL,
  `lxr` char(50) DEFAULT NULL,
  `sfz` char(50) DEFAULT NULL,
  `xzz` varchar(250) DEFAULT NULL,
  `mot` varchar(250) DEFAULT NULL,
  `dj` char(50) DEFAULT NULL,
  `yx` varchar(250) DEFAULT NULL,
  `txt` text,
  `jy` char(50) DEFAULT NULL,
  `jyzt` char(50) DEFAULT NULL,
  `fadd` varchar(250) DEFAULT NULL,
  `hx1` int(10) DEFAULT NULL,
  `hx2` int(10) DEFAULT NULL,
  `hx3` int(10) DEFAULT NULL,
  `hx4` int(10) DEFAULT NULL,
  `mj1` float DEFAULT NULL,
  `mj2` float DEFAULT NULL,
  `wtsj` datetime DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `money2` float DEFAULT NULL,
  `ly` char(50) DEFAULT NULL,
  `yt` char(50) DEFAULT NULL,
  `lc` char(50) DEFAULT NULL,
  `lx` char(50) DEFAULT NULL,
  `cx` int(10) DEFAULT NULL,
  `zx` int(10) DEFAULT NULL,
  `fk` varchar(250) DEFAULT NULL,
  `pt` varchar(250) DEFAULT NULL,
  `fy` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_kehugj`
--

CREATE TABLE IF NOT EXISTS `fcw_kehugj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `zjuserid` int(10) DEFAULT NULL,
  `khbh` char(50) DEFAULT NULL,
  `mybh` char(50) DEFAULT NULL,
  `fbuserid` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `txt` text,
  `uip` char(50) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_loginlog`
--

CREATE TABLE IF NOT EXISTS `fcw_loginlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` int(11) NOT NULL,
  `uid` char(50) NOT NULL,
  `sj` datetime NOT NULL,
  `uip` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_loupanfxkh`
--

CREATE TABLE IF NOT EXISTS `fcw_loupanfxkh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  `name1` char(50) DEFAULT NULL,
  `usex` char(10) DEFAULT NULL,
  `mot` char(35) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `jd` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `uid1` char(50) DEFAULT NULL,
  `uid2` char(50) DEFAULT NULL,
  `uid3` char(50) DEFAULT NULL,
  `yj1` float DEFAULT NULL,
  `yj2` float DEFAULT NULL,
  `yj3` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `ifmoney` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_loupanjob`
--

CREATE TABLE IF NOT EXISTS `fcw_loupanjob` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `tit` char(50) DEFAULT NULL,
  `dy` char(50) DEFAULT NULL,
  `zprs` char(30) DEFAULT NULL,
  `txt` text,
  `mot` char(50) DEFAULT NULL,
  `lxr` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_loupanmsg`
--

CREATE TABLE IF NOT EXISTS `fcw_loupanmsg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  `msguid` char(50) DEFAULT NULL,
  `uname` char(50) DEFAULT NULL,
  `mot` char(50) DEFAULT NULL,
  `txt1` text,
  `txt2` text,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_moneyrecord`
--

CREATE TABLE IF NOT EXISTS `fcw_moneyrecord` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `moneynum` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_news`
--

CREATE TABLE IF NOT EXISTS `fcw_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type1id` int(11) DEFAULT NULL,
  `type2id` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` longtext,
  `djl` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `iftj` int(11) DEFAULT NULL,
  `indextop` int(11) DEFAULT NULL,
  `ifjc` int(11) DEFAULT NULL,
  `titys` char(10) DEFAULT NULL,
  `zze` char(40) DEFAULT NULL,
  `ly` char(50) DEFAULT NULL,
  `lyurl` varchar(250) DEFAULT NULL,
  `wkey` varchar(250) DEFAULT NULL,
  `wdes` text,
  `zt` int(11) DEFAULT NULL,
  `iftp` int(11) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `fcw_news`
--

INSERT INTO `fcw_news` (`id`, `type1id`, `type2id`, `tit`, `txt`, `djl`, `sj`, `lastsj`, `uip`, `bh`, `iftj`, `indextop`, `ifjc`, `titys`, `zze`, `ly`, `lyurl`, `wkey`, `wdes`, `zt`, `iftp`, `xqbh`) VALUES
(1, 55, 0, '干货｜办理泰国签证最全攻略指南！', '', 94, '2018-06-20 15:03:23', '2018-06-20 15:03:23', '127.0.0.1', '1529478203n64', 1, 0, 0, '#333', '', '新华网', '', '干货｜办理泰国签证最全攻略指南！', '', 0, 1, ''),
(2, 55, 0, '开眼界｜泰国地契、合同、房产证长啥样？', '<p>东南亚地区近几年经济发展迅速，其中泰国的表现尤其出色。泰国2017年第四季度的经济增速为4年来的新高，出口增幅甚至高达两位数。近期，开泰研究中心展望2018年泰国经济有望增长4.5%，预测区间为2-7%，支持因素主要来自世界经济和贸易的复苏等。据彭博咨询（Bloomberg）的调查和九位经济学家估计，泰国国内生产总值（GDP）较上年同期增长了3.8%，数据显示这将是2013年第一季度以来的最快增速。</p><p><img src="http://127.0.0.1/config/ueditor/php/upload1/20180620/15294789003902.jpg" title="1.jpg"/></p>', 133, '2018-06-20 15:09:19', '2018-06-20 15:09:19', '127.0.0.1', '1529478559n74', 1, 0, 0, '#333', '', '新华网', '', '开眼界｜泰国地契、合同、房产证长啥样？', '东南亚地区近几年经济发展迅速，其中泰国的表现尤其出色。泰国2017年第四季度的经济增速为4年来的新高，出口增幅甚至高达两位数。近期，开泰研究中心展望2018年泰国经济有望增长4.5%，预测区间为2-7%，支持因素主要来自世界经济和贸易的复', 0, 1, ''),
(3, 58, 0, '租赁产权的二手交易受法律保护么？', '<p>受保护，租赁产区也在土地局进行登记备案，且持有产权证明，在持有期间内是和永久产权一样受法律保护的。具体条款参阅泰王国民商法典第五百三十七条 第五百七十一条。</p>', 39, '2018-06-20 15:43:15', '2018-06-20 15:43:15', '127.0.0.1', '1529480595n91', 1, 0, 0, '#333', '', '新华网', '', '租赁产权的二手交易受法律保护么？', '受保护，租赁产区也在土地局进行登记备案，且持有产权证明，在持有期间内是和永久产权一样受法律保护的。具体条款参阅泰王国民商法典第五百三十七条 第五百七十一条。', 0, 0, ''),
(4, 58, 0, '每 30 年续约一次都必须是租赁产权业主本 人去么，因故无法前去怎么办？', '<p>需要本人前往，如果本人不能前往可以在泰国驻中国领事馆开具委托公证文件，委托给受委托人办理。如业主身故，可由合法继承人持法律相关文件如遗嘱或继承关系证明文件去办理续签手续。</p>', 108, '2018-06-20 15:43:36', '2018-06-20 15:43:36', '127.0.0.1', '1529480616n65', 1, 0, 0, '#333', '', '新华网', '', '每 30 年续约一次都必须是租赁产权业主本 人去么，因故无法前去怎么办？', '需要本人前往，如果本人不能前往可以在泰国驻中国领事馆开具委托公证文件，委托给受委托人办理。如业主身故，可由合法继承人持法律相关文件如遗嘱或继承关系证明文件去办理续签手续。', 0, 0, ''),
(5, 58, 0, 'Q: 在 90 年期间，假设开发商不存在了，业主 该找谁续签，合同是否还有法律效应?', '<p>租赁产权购买协议有条款约定，包含 2 个 30 年的续签，共计 90 年，如果发展商不存在了，可以申请土地局续签协议。</p>', 181, '2018-06-20 15:43:53', '2018-06-20 15:43:53', '127.0.0.1', '1529480633n4', 1, 0, 0, '#333', '', '新华网', '', 'Q: 在 90 年期间，假设开发商不存在了，业主 该找谁续签，合同是否还有法律效应?', 'A: 租赁产权购买协议有条款约定，包含 2 个 30 年的续签，共计 90 年，如果发展商不存在了，可以申请土地局续签协议。', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_newstype`
--

CREATE TABLE IF NOT EXISTS `fcw_newstype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(10) DEFAULT NULL,
  `name2` char(10) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `xswz` char(50) DEFAULT NULL,
  `xstype` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- 转存表中的数据 `fcw_newstype`
--

INSERT INTO `fcw_newstype` (`id`, `name1`, `name2`, `admin`, `xh`, `sj`, `xswz`, `xstype`) VALUES
(55, '投资指南', NULL, 1, 1, '2018-06-20 14:54:34', '', 'font'),
(56, '最新动态', NULL, 1, 2, '2018-06-20 14:54:40', '', 'font'),
(57, '房产政策', NULL, 1, 3, '2018-06-20 14:54:44', '', 'font'),
(58, '房产问答', NULL, 1, 4, '2018-06-20 15:42:01', '', 'font');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_onecontrol`
--

CREATE TABLE IF NOT EXISTS `fcw_onecontrol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sj` datetime DEFAULT NULL,
  `tyid` int(11) DEFAULT NULL,
  `txt` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `fcw_onecontrol`
--

INSERT INTO `fcw_onecontrol` (`id`, `sj`, `tyid`, `txt`) VALUES
(1, '2018-06-20 14:29:14', 1, '<p>深圳市普吉置业咨询有限公司坐落在深圳市福田区金田路2030号卓越世纪中心，是泰国地产开发商VIP THAILAND在国内开发的首家分公司，并于国内设立北京、佛山、成都分公司打造两岸五地高效专业的管理团队。为了向来自世界各地的客户提供专业和优质的服务，我们建立了多种语言的专业团队和国际化旅游团队，为客户提供接待，旅游，购房等一站式服务。</p>'),
(2, '2018-06-20 14:30:05', 2, '<p><img src="http://127.0.0.1/config/ueditor/php/upload1/20180620/15294762041454.png" title="1.png"/></p>'),
(3, '2018-06-20 14:30:32', 3, '<p><img src="http://fcwt6.yj99.cn/config/ueditor/php/upload1/20140918/14110304696628.gif" title="1.gif"/>从2017年开始，每年将保持在泰国至少两个在建酒店项目，2016年开始，已经准备布局在曼谷，芭堤雅苏梅岛等地进行地产酒店开发。VIPTHAILAND品牌立足普吉，走向全泰国。建立自身客户生态系统，包括土地买卖，项目设计，地产开发，酒店管理及客户服务等全方位为世界各国客户提供居住，旅游，度假服务。</p>'),
(4, '2018-06-20 14:31:02', 4, '<p>泰国品质房地产开发商—VIPTHAILAND携手普吉岛专业酒店管理团队，建立酒店品牌Mercury Hotel，采用国际领先酒店管理体系、为购房业主提供物业包租托管服务、酒店服务与家政管家服务，为业主实现稳健收益的同时，也将专业细致打理托管的物业，为您经营普吉岛的第二家园。</p><p><img src="http://127.0.0.1/config/ueditor/php/upload1/20180620/15294762596736.jpg" title="1.jpg"/></p>'),
(5, '2018-06-20 14:38:15', 5, '<p><strong>泰国总部 / （+66）082-535-6699</strong></p><p>83/87 Moo.2, T.Rawai, A.Mueang ,Phuket 83130, THAILAND</p><p><br/></p><p><strong>深圳分公司 / 4008-036-089</strong></p><p>深圳市福田区上梅林中康路卓越城1期2号楼703</p><p><br/></p><p><strong>北京分公司 / 4008-988-987</strong></p><p>北京市朝阳区东三环北路甲26号博瑞大厦A座F211-商铺</p><p><br/></p><p><strong>佛山分公司 / 0757-86796105</strong></p><p>佛山桂城桂平中路65号鸿晖都市产业新城1幢607室</p><p><br/></p><p><strong>成都分公司 / 4001-652-520</strong></p><p>四川自由贸易试验区成都市高新区环球中心E2区1-3-709</p>'),
(6, '2018-06-20 15:25:48', 6, '<p>关注泰国房地产市场</p><p>找到符合自己需求的房产</p><p>赴泰实地考察房产和收取楼盘信息</p><p>选中房产后，交定金并签预定协议</p><p>签购房合同并交首付</p><p>办理房产过户</p><p>入住或出租</p>'),
(7, '2018-06-20 15:32:10', 7, '<p>过户费：2%，一般由买卖双方各承担1%；</p><p>维修基金：一般在400-600泰铢/平方米（视开发商和不同项目而定）。</p>'),
(8, '2018-06-20 15:29:49', 8, '<p>物业管理费：40-60泰铢/月/平方米</p><p>个人所得税：预计在租金收入的5%</p>'),
(9, '2018-06-20 15:34:02', 9, '<p>物业管过户费：约2%，一般买卖双方各付一半（可协商）</p><p>印花税：约0.5%（一般由卖方支付）；</p><p>特种商业税：约3.3%（一般由卖方支付，若业主持有房产超过5年则免）</p>'),
(10, '2018-06-20 19:17:13', 10, '<p>投资热线：<strong>（深圳）4008-036-089 &nbsp; (北京) 4008-988-987</strong></p><p>联系地址：深圳市福田区金田路2030号卓越世纪中心3号楼B座1517-1549室</p><p>Copyright 2016 all rights 版权所有·VIP THAILND粤ICP备16034657号-4</p><p><br/></p>');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_peitao`
--

CREATE TABLE IF NOT EXISTS `fcw_peitao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `cswy` varchar(250) DEFAULT NULL,
  `czwy` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `fcw_peitao`
--

INSERT INTO `fcw_peitao` (`id`, `name1`, `xh`, `sj`, `cswy`, `czwy`) VALUES
(6, '公园', 1, '2014-06-21 20:10:37', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(7, '菜场', 2, '2014-06-21 20:12:44', 'xcf公寓xcf别墅xcf商铺xcf平房xcf', 'xcf公寓xcf别墅xcf商铺xcf平房xcf短租房/日租房xcf'),
(8, '公交车站', 3, '2014-06-21 20:17:23', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(9, '停车场', 4, '2014-06-21 20:18:00', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(10, '银行', 5, '2014-06-21 20:18:49', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(11, '医院', 6, '2014-06-21 20:20:04', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(12, '幼儿园', 7, '2014-06-21 20:20:27', 'xcf公寓xcf别墅xcf平房xcf', 'xcf公寓xcf别墅xcf平房xcf短租房/日租房xcf'),
(13, '小学', 8, '2014-06-21 20:20:41', 'xcf公寓xcf别墅xcf平房xcf', 'xcf公寓xcf别墅xcf平房xcf短租房/日租房xcf'),
(14, '中学', 9, '2014-06-21 20:20:57', 'xcf公寓xcf别墅xcf平房xcf', 'xcf公寓xcf别墅xcf平房xcf短租房/日租房xcf'),
(15, '超市', 10, '2014-06-21 20:21:12', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(16, '饭店', 11, '2014-06-21 20:21:40', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(17, '厨房', 12, '2014-06-21 20:22:11', 'xcf公寓xcf别墅xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf厂房xcf平房xcf旅馆/酒店xcf'),
(18, '卫生间', 13, '2014-06-21 20:22:33', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(19, '家具', 14, '2014-06-21 20:22:44', 'xcf公寓xcf别墅xcf平房xcf', 'xcf公寓xcf别墅xcf平房xcf短租房/日租房xcf'),
(20, '电话', 15, '2014-06-21 20:23:02', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(21, '洗衣机', 16, '2014-06-21 20:23:15', 'xcf公寓xcf别墅xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(22, '热水器', 17, '2014-06-21 20:23:30', 'xcf公寓xcf别墅xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf短租房/日租房xcf旅馆/酒店xcf'),
(23, '空调', 18, '2014-06-21 20:23:49', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(24, '冰箱', 19, '2014-06-21 20:24:01', 'xcf公寓xcf别墅xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(25, '床', 20, '2014-06-21 20:24:45', 'xcf公寓xcf别墅xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf平房xcf旅馆/酒店xcf'),
(26, '煤气', 21, '2014-06-21 20:24:56', 'xcf公寓xcf别墅xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(27, '暖气', 22, '2014-06-21 20:25:10', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(28, '宽带', 23, '2014-06-21 20:25:32', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf'),
(29, '有线电视接入', 24, '2014-06-21 20:25:52', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_pmlx`
--

CREATE TABLE IF NOT EXISTS `fcw_pmlx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `fcw_pmlx`
--

INSERT INTO `fcw_pmlx` (`id`, `name1`, `xh`, `sj`) VALUES
(4, '店铺', 1, '2014-06-16 21:30:39'),
(5, '摊位', 2, '2014-06-16 21:30:43'),
(6, '柜台', 3, '2014-06-16 21:30:47');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_school`
--

CREATE TABLE IF NOT EXISTS `fcw_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `name2` char(50) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `py` char(50) DEFAULT NULL,
  `xh` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `zb` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_shangquan`
--

CREATE TABLE IF NOT EXISTS `fcw_shangquan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `areaid` int(10) DEFAULT NULL,
  `tit` char(50) DEFAULT NULL,
  `txt` text,
  `bh` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `py` char(10) DEFAULT NULL,
  `djl` int(10) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_smsmail`
--

CREATE TABLE IF NOT EXISTS `fcw_smsmail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `toadd` char(50) DEFAULT NULL,
  `txt` text,
  `sj` datetime DEFAULT NULL,
  `xzid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_smsmb`
--

CREATE TABLE IF NOT EXISTS `fcw_smsmb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mybh` char(50) DEFAULT NULL,
  `txt` varchar(250) DEFAULT NULL,
  `mbid` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_sphy`
--

CREATE TABLE IF NOT EXISTS `fcw_sphy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `xh` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `name2` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_splx`
--

CREATE TABLE IF NOT EXISTS `fcw_splx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `fcw_splx`
--

INSERT INTO `fcw_splx` (`id`, `name1`, `xh`, `sj`) VALUES
(7, '住宅底商', 1, '2014-06-16 21:27:35'),
(8, '商业街商铺', 2, '2014-06-16 21:27:44'),
(9, '临街门面', 3, '2014-06-16 21:27:47'),
(10, '写字楼配套底商', 4, '2014-06-16 21:27:53'),
(11, '购物中心/百货', 5, '2014-06-16 21:28:07'),
(12, '其他', 6, '2014-06-16 21:27:59');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_tejia`
--

CREATE TABLE IF NOT EXISTS `fcw_tejia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `mj` float DEFAULT NULL,
  `mj1` float DEFAULT NULL,
  `yj` float DEFAULT NULL,
  `zj` float DEFAULT NULL,
  `hx1` int(10) DEFAULT NULL,
  `hx2` int(10) DEFAULT NULL,
  `hx3` int(10) DEFAULT NULL,
  `hx4` int(10) DEFAULT NULL,
  `hx5` int(10) DEFAULT NULL,
  `tj` float DEFAULT NULL,
  `zj1` float DEFAULT NULL,
  `fh` varchar(250) DEFAULT NULL,
  `txt` text,
  `sj` datetime DEFAULT NULL,
  `areaid` int(10) DEFAULT NULL,
  `areaids` int(10) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_tixian`
--

CREATE TABLE IF NOT EXISTS `fcw_tixian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `txyh` char(50) DEFAULT NULL,
  `txname` char(50) DEFAULT NULL,
  `txzh` char(50) DEFAULT NULL,
  `txkhh` char(50) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `sm` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_tp`
--

CREATE TABLE IF NOT EXISTS `fcw_tp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `tp` varchar(250) DEFAULT NULL,
  `type1` char(20) DEFAULT NULL,
  `iffm` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `ty1id` int(11) DEFAULT NULL,
  `ty2id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `fcw_tp`
--

INSERT INTO `fcw_tp` (`id`, `bh`, `tp`, `type1`, `iffm`, `sj`, `uid`, `xh`, `ty1id`, `ty2id`) VALUES
(1, '1529478203n64', 'upload/news/20180620/1529478203n64/0405584001529478209tp.jpg', '资讯', 1, '2018-06-20 15:03:29', '', 1, NULL, NULL),
(2, '1529478559n74', 'upload/news/20180620/1529478559n74/0894859001529478563tp.jpg', '资讯', 1, '2018-06-20 15:09:23', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_tzlb`
--

CREATE TABLE IF NOT EXISTS `fcw_tzlb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tit` varchar(250) DEFAULT NULL,
  `tit1` varchar(250) DEFAULT NULL,
  `gs` char(50) DEFAULT NULL,
  `yy` char(50) DEFAULT NULL,
  `txt` longtext,
  `djl` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `hz` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `fcw_tzlb`
--

INSERT INTO `fcw_tzlb` (`id`, `tit`, `tit1`, `gs`, `yy`, `txt`, `djl`, `sj`, `lastsj`, `uip`, `bh`, `zt`, `hz`) VALUES
(5, 'Phuket_泰国投资手册', '开发商礼包', 'PDF', '中文', '', 132, '2018-06-20 16:58:52', '2018-06-20 16:58:52', '127.0.0.1', '1529485132tz35', 0, 'jpg');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_update`
--

CREATE TABLE IF NOT EXISTS `fcw_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_user`
--

CREATE TABLE IF NOT EXISTS `fcw_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `pwd` char(50) DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `uname` char(20) DEFAULT NULL,
  `nc` char(30) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `ifemail` int(11) DEFAULT NULL,
  `utel` char(50) DEFAULT NULL,
  `mot` char(50) DEFAULT NULL,
  `ifmot` int(11) DEFAULT NULL,
  `qq` varchar(200) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `uadd` varchar(200) DEFAULT NULL,
  `company` char(50) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `jf` int(11) DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `txt` text,
  `seokey` char(50) DEFAULT NULL,
  `seoms` varchar(250) DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `qx` char(50) DEFAULT NULL,
  `sfz` char(50) DEFAULT NULL,
  `sfzrz` int(11) DEFAULT NULL,
  `sfzrzsm` varchar(250) DEFAULT NULL,
  `yyzz` char(50) DEFAULT NULL,
  `yyzzrz` int(11) DEFAULT NULL,
  `yyzzrzsm` varchar(250) DEFAULT NULL,
  `zjuid` char(50) DEFAULT NULL,
  `indexpm` int(11) DEFAULT NULL,
  `getpwd` char(50) DEFAULT NULL,
  `bdmot` char(10) DEFAULT NULL,
  `bdemail` char(10) DEFAULT NULL,
  `openid` char(50) DEFAULT NULL,
  `ifqq` int(11) DEFAULT NULL,
  `tjuid` char(50) DEFAULT NULL,
  `adminczsj` datetime DEFAULT NULL,
  `sxnum` int(11) DEFAULT NULL,
  `txyh` char(30) DEFAULT NULL,
  `txname` char(50) DEFAULT NULL,
  `txzh` char(50) DEFAULT NULL,
  `txkhh` char(50) DEFAULT NULL,
  `zfmm` char(50) DEFAULT NULL,
  `zb` char(50) DEFAULT NULL,
  `zbdj` int(11) DEFAULT NULL,
  `regmob` int(11) DEFAULT NULL,
  `userdj` int(10) DEFAULT NULL,
  `userdjdq` datetime DEFAULT NULL,
  `wxopenid` varchar(240) DEFAULT NULL,
  `unionid` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fcw_user`
--

INSERT INTO `fcw_user` (`id`, `uid`, `pwd`, `usertype`, `sj`, `uip`, `uname`, `nc`, `email`, `ifemail`, `utel`, `mot`, `ifmot`, `qq`, `areaid`, `areaids`, `uadd`, `company`, `money1`, `jf`, `djl`, `txt`, `seokey`, `seoms`, `lastsj`, `qx`, `sfz`, `sfzrz`, `sfzrzsm`, `yyzz`, `yyzzrz`, `yyzzrzsm`, `zjuid`, `indexpm`, `getpwd`, `bdmot`, `bdemail`, `openid`, `ifqq`, `tjuid`, `adminczsj`, `sxnum`, `txyh`, `txname`, `txzh`, `txkhh`, `zfmm`, `zb`, `zbdj`, `regmob`, `userdj`, `userdjdq`, `wxopenid`, `unionid`) VALUES
(1, 'loupan', '76f421ef6ff8fd4249323045ddae4ac5970ee13c', 5, '2018-06-20 17:19:59', '127.0.0.1', NULL, 'loupan', '123456@qq.com', NULL, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, ',9,', NULL, 3, NULL, NULL, 3, NULL, NULL, 0, NULL, NULL, NULL, '', 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, '76f421ef6ff8fd4249323045ddae4ac5970ee13c', NULL, NULL, NULL, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_userdj`
--

CREATE TABLE IF NOT EXISTS `fcw_userdj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xh` int(10) DEFAULT NULL,
  `name1` char(50) DEFAULT NULL,
  `money1` int(10) DEFAULT NULL,
  `fysx` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `fyfb` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fcw_userdj`
--

INSERT INTO `fcw_userdj` (`id`, `xh`, `name1`, `money1`, `fysx`, `sj`, `fyfb`) VALUES
(1, 1, '普通会员', 0, 0, '2018-01-31 21:23:34', 10);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_userdjsx`
--

CREATE TABLE IF NOT EXISTS `fcw_userdjsx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `sj` date DEFAULT NULL,
  `sxnum` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fcw_userdjsx`
--

INSERT INTO `fcw_userdjsx` (`id`, `userid`, `sj`, `sxnum`) VALUES
(1, 1, '2018-06-20', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_weituo`
--

CREATE TABLE IF NOT EXISTS `fcw_weituo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(40) DEFAULT NULL,
  `mot` char(40) DEFAULT NULL,
  `pwd` char(50) DEFAULT NULL,
  `type1` char(50) DEFAULT NULL,
  `wylx` char(50) DEFAULT NULL,
  `add1` varchar(250) DEFAULT NULL,
  `mj` char(50) DEFAULT NULL,
  `money1` char(50) DEFAULT NULL,
  `lxr` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `jgdw` char(15) DEFAULT NULL,
  `areaid` int(10) DEFAULT NULL,
  `hylx` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_weituozhao`
--

CREATE TABLE IF NOT EXISTS `fcw_weituozhao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `mot` char(50) DEFAULT NULL,
  `pwd` char(10) DEFAULT NULL,
  `type1` char(10) DEFAULT NULL,
  `txt` text,
  `sj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `areaid` int(10) DEFAULT NULL,
  `hylx` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_wylx`
--

CREATE TABLE IF NOT EXISTS `fcw_wylx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(20) DEFAULT NULL,
  `name2` char(20) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `ifuse` char(3) DEFAULT NULL,
  `ifsys` int(11) DEFAULT NULL,
  `xs` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `fcw_wylx`
--

INSERT INTO `fcw_wylx` (`id`, `name1`, `name2`, `xh`, `sj`, `ifuse`, `ifsys`, `xs`) VALUES
(10, '公寓', '公寓/住宅', 1, '2014-06-25 12:10:53', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,loupan,'),
(11, '别墅', '别墅', 2, '2014-06-25 12:10:56', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,loupan,'),
(12, '写字楼', '写字楼', 3, '2014-06-25 12:10:59', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,loupan,'),
(13, '商铺', '商铺', 4, '2014-06-25 12:11:05', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,loupan,zhuanrang,'),
(14, '厂房', '厂房', 5, '2014-06-22 17:07:40', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,'),
(18, '车库/车位', '车库车位', 6, '2014-06-22 17:07:44', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,'),
(19, '平房', '平房', 7, '2014-06-22 17:07:48', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,'),
(22, '短租房/日租房', '短租房/日租房', 8, '2014-06-22 17:07:52', 'on', 1, ',chuzu,qiuzu,'),
(23, '土地', '土地', 9, '2014-06-22 17:07:55', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,'),
(24, '旅馆/酒店', '旅馆/酒店', 10, '2014-06-22 17:08:00', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,zhuanrang,'),
(25, '仓库', '仓库', 11, '2014-06-22 17:08:04', 'on', 1, ',chushou,chuzu,qiugou,qiuzu,zhuanrang,'),
(26, '住宅', '住宅', 0, '2018-01-31 21:28:13', 'on', 1, ',chushou,chuzu,loupan,');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_wyts`
--

CREATE TABLE IF NOT EXISTS `fcw_wyts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(20) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `cswy` varchar(250) DEFAULT NULL,
  `czwy` varchar(250) DEFAULT NULL,
  `lpwy` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `fcw_wyts`
--

INSERT INTO `fcw_wyts` (`id`, `name1`, `xh`, `sj`, `cswy`, `czwy`, `lpwy`) VALUES
(1, '免中介费', 1, '2014-06-21 20:43:43', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf车库/车位xcf平房xcf土地xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf车库/车位xcf平房xcf短租房/日租房xcf土地xcf旅馆/酒店xcf', NULL),
(2, '可注册办公', 2, '2014-06-21 20:44:00', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf', NULL),
(3, '学校周边', 3, '2014-06-21 20:44:16', 'xcf公寓xcf别墅xcf商铺xcf车库/车位xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf商铺xcf车库/车位xcf平房xcf短租房/日租房xcf旅馆/酒店xcf', NULL),
(4, '随时看房', 4, '2014-06-21 20:44:30', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf车库/车位xcf平房xcf土地xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf车库/车位xcf平房xcf短租房/日租房xcf土地xcf旅馆/酒店xcf', NULL),
(5, '不限购', 5, '2014-06-21 20:44:35', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf车库/车位xcf平房xcf土地xcf旅馆/酒店xcf', 'xcf', NULL),
(6, '房产证满五年', 6, '2014-06-21 20:44:55', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf车库/车位xcf平房xcf土地xcf旅馆/酒店xcf', 'xcf', NULL),
(7, '业主唯一住房', 7, '2014-08-03 15:33:34', 'xcf公寓xcf别墅xcf平房xcf', 'xcf', NULL),
(8, '学区房', 8, '2014-06-21 20:45:09', 'xcf公寓xcf别墅xcf平房xcf', 'xcf公寓xcf别墅xcf平房xcf短租房/日租房xcf', NULL),
(9, '地铁房', 9, '2014-06-21 20:45:24', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf旅馆/酒店xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf旅馆/酒店xcf', NULL),
(10, '小户型', 10, '2014-06-21 20:45:39', 'xcf公寓xcf平房xcf', 'xcf公寓xcf平房xcf', NULL),
(11, '复式', 11, '2014-06-21 20:45:49', 'xcf公寓xcf别墅xcf', 'xcf公寓xcf别墅xcf', NULL),
(12, '商住两用', 12, '2014-06-21 20:46:02', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf', 'xcf公寓xcf别墅xcf写字楼xcf商铺xcf厂房xcf平房xcf短租房/日租房xcf', NULL),
(13, '经济住宅', 13, '2014-11-26 14:57:21', 'xcf', 'xcf', 'xcf楼盘xcf'),
(14, '海景房', 14, '2014-11-26 14:57:32', 'xcf', 'xcf', 'xcf楼盘xcf'),
(15, '养老房', 15, '2014-11-26 14:57:38', 'xcf', 'xcf', 'xcf楼盘xcf'),
(16, '精装修房', 16, '2014-11-26 14:57:45', 'xcf', 'xcf', 'xcf楼盘xcf'),
(17, '轻轨沿线', 17, '2014-11-26 14:57:55', 'xcf', 'xcf', 'xcf楼盘xcf'),
(18, '品牌开发商', 18, '2014-11-26 14:58:02', 'xcf', 'xcf', 'xcf楼盘xcf'),
(19, '投资地产', 19, '2014-11-26 14:58:08', 'xcf', 'xcf', 'xcf楼盘xcf'),
(20, '旅游地产', 20, '2014-11-26 14:58:13', 'xcf', 'xcf', 'xcf楼盘xcf'),
(21, '商业地产', 21, '2014-11-26 14:58:20', 'xcf', 'xcf', 'xcf楼盘xcf'),
(22, '水景地产', 22, '2014-11-26 14:58:27', 'xcf', 'xcf', 'xcf楼盘xcf'),
(23, '生态宜居房', 23, '2014-11-26 14:58:37', 'xcf', 'xcf', 'xcf楼盘xcf'),
(24, '多层洋房', 24, '2014-11-26 14:58:44', 'xcf', 'xcf', 'xcf楼盘xcf');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_xq`
--

CREATE TABLE IF NOT EXISTS `fcw_xq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `xq` char(50) DEFAULT NULL,
  `xqzb` char(50) DEFAULT NULL,
  `zbdj` int(11) DEFAULT NULL,
  `py` char(2) DEFAULT NULL,
  `xqadd` char(50) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `wylx` varchar(250) DEFAULT NULL,
  `wytsid` varchar(250) DEFAULT NULL,
  `cq` char(50) DEFAULT NULL,
  `kfs` char(50) DEFAULT NULL,
  `jzlb` char(50) DEFAULT NULL,
  `zdmj` char(50) DEFAULT NULL,
  `jzmj` char(50) DEFAULT NULL,
  `zhs` char(50) DEFAULT NULL,
  `rjl` char(50) DEFAULT NULL,
  `lhl` char(50) DEFAULT NULL,
  `wyf` char(50) DEFAULT NULL,
  `wygs` char(50) DEFAULT NULL,
  `wsfw` char(50) DEFAULT NULL,
  `xqrk` varchar(250) DEFAULT NULL,
  `tcw` text,
  `zb` text,
  `txt` text,
  `jtzk` text,
  `tpvideo` char(20) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `sltel` char(50) DEFAULT NULL,
  `sladd` varchar(200) DEFAULT NULL,
  `kpsj` char(50) DEFAULT NULL,
  `rzsj` char(50) DEFAULT NULL,
  `ysxkz` char(50) DEFAULT NULL,
  `lpzt` int(11) DEFAULT NULL,
  `wkey` varchar(250) DEFAULT NULL,
  `wdes` text,
  `zt` int(11) DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `ifxj` int(11) DEFAULT NULL,
  `ifmsg` char(3) DEFAULT NULL,
  `iftj` int(11) DEFAULT NULL,
  `cjurl` varchar(250) DEFAULT NULL,
  `iffx` int(11) DEFAULT NULL,
  `fxend` datetime DEFAULT NULL,
  `fxty` int(11) DEFAULT NULL,
  `fxmoney1` float DEFAULT NULL,
  `fxmoney2` float DEFAULT NULL,
  `fxmoney3` float DEFAULT NULL,
  `fxuid` char(50) DEFAULT NULL,
  `tjly` varchar(250) DEFAULT NULL,
  `fxmoney` float DEFAULT NULL,
  `fxmoneyg` float DEFAULT NULL,
  `fxtxt` text,
  `xsxh` int(11) DEFAULT NULL,
  `xqzb1` char(30) DEFAULT '',
  `xqzb2` char(30) DEFAULT '',
  `zygw` char(50) DEFAULT NULL,
  `sqid` int(10) DEFAULT NULL,
  `ditieid` varchar(250) DEFAULT NULL,
  `gjid` varchar(250) DEFAULT NULL,
  `pyall` char(40) DEFAULT NULL,
  `vrurl` text,
  `ld1` char(50) DEFAULT NULL,
  `ld2` char(50) DEFAULT NULL,
  `zj` char(50) DEFAULT NULL,
  `sfbl` char(50) DEFAULT NULL,
  `njzj` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fcw_xq`
--

INSERT INTO `fcw_xq` (`id`, `bh`, `uid`, `sj`, `xq`, `xqzb`, `zbdj`, `py`, `xqadd`, `areaid`, `areaids`, `money1`, `wylx`, `wytsid`, `cq`, `kfs`, `jzlb`, `zdmj`, `jzmj`, `zhs`, `rjl`, `lhl`, `wyf`, `wygs`, `wsfw`, `xqrk`, `tcw`, `zb`, `txt`, `jtzk`, `tpvideo`, `admin`, `sltel`, `sladd`, `kpsj`, `rzsj`, `ysxkz`, `lpzt`, `wkey`, `wdes`, `zt`, `djl`, `ifxj`, `ifmsg`, `iftj`, `cjurl`, `iffx`, `fxend`, `fxty`, `fxmoney1`, `fxmoney2`, `fxmoney3`, `fxuid`, `tjly`, `fxmoney`, `fxmoneyg`, `fxtxt`, `xsxh`, `xqzb1`, `xqzb2`, `zygw`, `sqid`, `ditieid`, `gjid`, `pyall`, `vrurl`, `ld1`, `ld2`, `zj`, `sfbl`, `njzj`) VALUES
(1, '1529486500lp1', 'loupan', '2018-06-20 17:21:40', '水星之城', '116.530175,39.964945', 15, 's', '距离拉威海滩仅400米', 1, 0, 21000, 'xcf', 'xcf13xcf14xcf15xcf16xcf', '', '', '塔楼、高层，叠排别墅、联排别墅', '16800', '31926', '553', '1.9', '45%', '', '', '', '', '', '<div>选择房屋户型和房号</div>\r\n<div>支付定金50,000 泰铢</div>\r\n<div>签订合同15天内，支付首付20%</div>\r\n<div>基础施工完成支付30%</div>\r\n<div>主体框架完成支付30%</div>\r\n<div>办理过户登记，支付尾款20%<br />\r\n<br />\r\n<img src="../ckeditor/attached/20180620110612_14020.png" alt="" border="0" /><br />\r\n<br />\r\n<img src="../ckeditor/attached/20180620110620_43445.png" alt="" border="0" /><br />\r\n<br />\r\n<div>* 以300万泰铢为例。</div>\r\n<div>* 此结果仅供参考，实际费用请咨询普吉置业顾问</div>\r\n<br />\r\n</div>', '<b>在世界旅游岛悠享无边的蓝</b><br />\r\nVIP MERCURY水星之城，占地16800㎡，由8栋的高品质酒店式公寓与1栋多功能豪华酒店大堂 构成。整体将以星级酒店式水准进行规划，其中大堂将包含多个商务区、服务区、休息区等功能板块，产品选材用料皆使用国际主流品牌，将把新东南亚建筑风格与普吉当地特点相结合，巧妙利用地形，营造丰富的空间布局和天际轮廓线，每一处细节都经过精心考量，演绎着海岛的蓝天、大海与林境的秀美。<br />\r\n<img src="../ckeditor/attached/20180620110629_66969.jpg" alt="" border="0" /><br />\r\n<br />\r\n<b>一生幸福的岛三面环海的家</b><br />\r\nVIP MERCURY水星之城位于泰国普吉岛南端，拉威海滩以北，奈汉海滩以东，择址于三海之间、半山之上，蓝天碧海环绕，青翠林境围合，环境优美，气候宜人。而VIP Mercury水星之城本身的景观设计也极具特色，整个水系景观穿插于VIP MERCURY水星之城之中，结合半山地特征，运用折线与弧线手法，在水系的深浅变化中丰富居住体验，将VIP MERCURY水星之城打造成普吉岛酒店公寓名片。<br />\r\n<br />\r\n<img src="../ckeditor/attached/20180620110611_12655.jpg" alt="" border="0" /><br />\r\n<br />\r\nVIP MERCURY水星之城位于泰国普吉岛南端，拉威海滩以北，奈汉海滩以东，择址于三海之间、半山之上，蓝天碧海环绕，青翠林境围合，环境优美，气候宜人。而VIP Mercury水星之城本身的景观设计也极具特色，整个水系景观穿插于VIP MERCURY水星之城之中，结', '', NULL, 2, '', '', '', '', '', 0, '', '', 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '由8栋的高品质酒店式公寓与1栋多功能豪华酒店大堂构成。', NULL, NULL, NULL, 9999, '116.530175', '39.964945', '', NULL, NULL, NULL, 'sxzc', '', NULL, NULL, '200万', '20%', '%6/7%');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_xqnews`
--

CREATE TABLE IF NOT EXISTS `fcw_xqnews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `txt` text,
  `bh` char(50) DEFAULT NULL,
  `ifjc` int(11) DEFAULT NULL,
  `titys` char(10) DEFAULT NULL,
  `wdes` varchar(250) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `bj` char(50) DEFAULT NULL,
  `ly` varchar(250) DEFAULT NULL,
  `lyurl` varchar(250) DEFAULT NULL,
  `fcw_xqnews` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_xqphoto`
--

CREATE TABLE IF NOT EXISTS `fcw_xqphoto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `bh` varchar(200) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `tyid` int(11) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `iffm` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `fcw_xqphoto`
--

INSERT INTO `fcw_xqphoto` (`id`, `uid`, `xqbh`, `sj`, `tit`, `djl`, `bh`, `zt`, `tyid`, `areaid`, `areaids`, `iffm`) VALUES
(1, 'loupan', '1529486500lp1', '2018-06-20 20:20:28', '水星之城 / VIP MERCURY CONDOMINIUM样板间', 1, '0131392001529497228tp1', 0, 5, 1, 0, 0),
(2, 'loupan', '1529486500lp1', '2018-06-20 20:20:28', '水星之城 / VIP MERCURY CONDOMINIUM样板间', 1, '0407371001529497228tp1', 0, 5, 1, 0, 0),
(3, 'loupan', '1529486500lp1', '2018-06-20 20:20:28', '水星之城 / VIP MERCURY CONDOMINIUM样板间', 1, '0609615001529497228tp1', 0, 5, 1, 0, 0),
(4, 'loupan', '1529486500lp1', '2018-06-20 20:20:28', '水星之城 / VIP MERCURY CONDOMINIUM样板间', 1, '0799874001529497228tp1', 0, 5, 1, 0, 0),
(5, 'loupan', '1529486500lp1', '2018-06-20 20:20:28', '水星之城 / VIP MERCURY CONDOMINIUM样板间', 1, '0965158001529497228tp1', 0, 5, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `fcw_xqvideo`
--

CREATE TABLE IF NOT EXISTS `fcw_xqvideo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(50) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `tit` varchar(200) DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `iftj` int(11) DEFAULT NULL,
  `txt` text,
  `ifjc` int(11) DEFAULT NULL,
  `titys` char(10) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `areaids` int(11) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `indextj` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_xzljb`
--

CREATE TABLE IF NOT EXISTS `fcw_xzljb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `fcw_xzljb`
--

INSERT INTO `fcw_xzljb` (`id`, `name1`, `xh`, `sj`) VALUES
(4, '甲级', 1, '2014-06-16 21:25:29'),
(5, '乙级', 2, '2014-06-16 21:25:14'),
(6, '丙级', 3, '2014-06-16 21:25:23');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_xzllx`
--

CREATE TABLE IF NOT EXISTS `fcw_xzllx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `fcw_xzllx`
--

INSERT INTO `fcw_xzllx` (`id`, `name1`, `xh`, `sj`) VALUES
(6, '纯写字楼', 1, '2014-06-16 21:22:47'),
(7, '商住楼', 2, '2014-06-16 21:22:50'),
(8, '商业综合体楼', 3, '2014-06-16 21:22:54'),
(9, '酒店写字楼', 4, '2014-06-16 21:22:58');

-- --------------------------------------------------------

--
-- 表的结构 `fcw_yuyue`
--

CREATE TABLE IF NOT EXISTS `fcw_yuyue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `uid` char(50) DEFAULT NULL,
  `fangbh` char(50) DEFAULT NULL,
  `mot` char(50) DEFAULT NULL,
  `qq` char(50) DEFAULT NULL,
  `txt` text,
  `ty` char(10) DEFAULT NULL,
  `xqbh` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_yzm`
--

CREATE TABLE IF NOT EXISTS `fcw_yzm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tit` char(50) DEFAULT NULL,
  `yzm` char(10) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fcw_zxqk`
--

CREATE TABLE IF NOT EXISTS `fcw_zxqk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(15) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `fcw_zxqk`
--

INSERT INTO `fcw_zxqk` (`id`, `name1`, `xh`, `sj`) VALUES
(5, '毛坯', 1, '2014-06-17 08:09:13'),
(6, '简装修', 2, '2014-06-17 08:09:43'),
(7, '精装修', 0, '2014-12-02 10:51:21'),
(8, '豪华装修', 4, '2014-06-17 08:09:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
