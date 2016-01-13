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
-- Table structure for `ccb_unactived_surveys`
-- ----------------------------
DROP TABLE IF EXISTS `ccb_unactived_surveys`;
CREATE TABLE `ccb_unactived_surveys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(30) DEFAULT NULL,
  `q01` tinyint(3) unsigned DEFAULT '0',
  `q02` tinyint(3) unsigned DEFAULT '0',
  `q03` tinyint(3) unsigned DEFAULT '0',
  `q04` tinyint(3) unsigned DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
