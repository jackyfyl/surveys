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
-- Table structure for `surveys`
-- ----------------------------
DROP TABLE IF EXISTS `surveys`;
CREATE TABLE `surveys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `wxopenid` varchar(56) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` varchar(30) DEFAULT '',
  `user_agent` varchar(256) DEFAULT NULL,
  `q01` varchar(50) DEFAULT '0',
  `q02` varchar(50) DEFAULT '0',
  `q03` varchar(50) DEFAULT '0',
  `q04` varchar(50) DEFAULT '0',
  `q05` varchar(50) DEFAULT '0',
  `q06` varchar(50) DEFAULT '0',
  `q07` varchar(50) DEFAULT '0',
  `q08` varchar(50) DEFAULT '0',
  `q09` varchar(50) DEFAULT '0',
  `q10` varchar(50) DEFAULT '0',
  `q11` varchar(50) DEFAULT '0',
  `q12` varchar(50) DEFAULT '0',
  `q13` varchar(50) DEFAULT '0',
  `q14` varchar(50) DEFAULT '0',
  `q15` varchar(50) DEFAULT '0',
  `q16` varchar(50) DEFAULT '0',
  `q17` varchar(50) DEFAULT '0',
  `q18` varchar(50) DEFAULT '0',
  `q19` varchar(50) DEFAULT '0',
  `q20` varchar(50) DEFAULT '0',
  `q21` varchar(50) DEFAULT '0',
  `q22` varchar(50) DEFAULT '0',
  `q23` varchar(50) DEFAULT '0',
  `q24` varchar(50) DEFAULT '0',
  `q25` varchar(50) DEFAULT '0',
  `q26` varchar(50) DEFAULT '0',
  `q27` varchar(50) DEFAULT '0',
  `q28` varchar(50) DEFAULT '0',
  `q29` varchar(50) DEFAULT '0',
  `q30` varchar(50) DEFAULT '0',
  `q31` varchar(50) DEFAULT '0',
  `q32` varchar(50) DEFAULT '0',
  `q33` varchar(50) DEFAULT '0',
  `q34` varchar(50) DEFAULT '0',
  `q35` varchar(50) DEFAULT '0',
  `q36` varchar(50) DEFAULT '0',
  `q37` varchar(50) DEFAULT '0',
  `q38` varchar(50) DEFAULT '0',
  `q39` varchar(50) DEFAULT '0',
  `q40` varchar(50) DEFAULT '0',
  `q41` varchar(50) DEFAULT '0',
  `q42` varchar(50) DEFAULT '0',
  `q43` varchar(50) DEFAULT '0',
  `q44` varchar(50) DEFAULT '0',
  `q45` varchar(50) DEFAULT '0',
  `q46` varchar(50) DEFAULT '0',
  `q47` varchar(50) DEFAULT '0',
  `q48` varchar(50) DEFAULT '0',
  `q49` varchar(50) DEFAULT '0',
  `q50` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
