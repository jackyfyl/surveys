/*
Source Server         : guanshan
Source Server Version : 50543
Source Host           : 121.41.122.182:3306
Source Database       : creditcard_survey

Target Server Type    : MYSQL
Target Server Version : 50543
File Encoding         : 65001
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `investment_preference_survey`
-- ----------------------------
DROP TABLE IF EXISTS `investment_preference_survey`;
CREATE TABLE `investment_preference_survey` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q01` tinyint(3) unsigned DEFAULT '0',
  `q02` tinyint(3) unsigned DEFAULT '0',
  `q03` tinyint(3) unsigned DEFAULT '0',
  `q04` tinyint(3) unsigned DEFAULT '0',
  `q05` tinyint(3) unsigned DEFAULT '0',
  `q06` tinyint(3) unsigned DEFAULT '0',
  `q07` tinyint(3) unsigned DEFAULT '0',
  `q08` tinyint(3) unsigned DEFAULT '0',
  `q09` tinyint(3) unsigned DEFAULT '0',
  `q10` tinyint(3) unsigned DEFAULT '0',
  `q11` tinyint(3) unsigned DEFAULT '0',
  `q12` tinyint(3) unsigned DEFAULT '0',
  `q13` tinyint(3) unsigned DEFAULT '0',
  `q14` tinyint(3) unsigned DEFAULT '0',
  `q15` tinyint(3) unsigned DEFAULT '0',
  `q16` tinyint(3) unsigned DEFAULT '0',
  `q17` tinyint(3) unsigned DEFAULT '0',
  `q18` tinyint(3) unsigned DEFAULT '0',
  `q19` tinyint(3) unsigned DEFAULT '0',
  `q20` varchar(256) DEFAULT NULL,
  `userid` varchar(30) DEFAULT '',
  `wxopenid` varchar(56) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
