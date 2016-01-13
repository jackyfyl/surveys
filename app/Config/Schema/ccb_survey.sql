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
-- Table structure for `ccb_survey`
-- ----------------------------
DROP TABLE IF EXISTS `ccb_survey`;
CREATE TABLE `ccb_survey` (
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
  `q20` tinyint(3) unsigned DEFAULT '0',
  `q21` tinyint(3) unsigned DEFAULT '0',
  `q22` tinyint(3) unsigned DEFAULT '0',
  `q23` tinyint(3) unsigned DEFAULT '0',
  `q24` tinyint(3) unsigned DEFAULT '0',
  `q25` tinyint(3) unsigned DEFAULT '0',
  `q26` tinyint(3) unsigned DEFAULT '0',
  `q27` tinyint(3) unsigned DEFAULT '0',
  `q28` tinyint(3) unsigned DEFAULT '0',
  `q29` tinyint(3) unsigned DEFAULT '0',
  `q30` tinyint(3) unsigned DEFAULT '0',
  `q31` tinyint(3) unsigned DEFAULT '0',
  `q32` tinyint(3) unsigned DEFAULT '0',
  `q33` tinyint(3) unsigned DEFAULT '0',
  `q34` tinyint(3) unsigned DEFAULT '0',
  `q35` tinyint(3) unsigned DEFAULT '0',
  `q36` tinyint(3) unsigned DEFAULT '0',
  `cid` varchar(30) DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
