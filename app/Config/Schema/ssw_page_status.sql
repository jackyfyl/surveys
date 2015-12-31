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
-- Table structure for `ssw_page_status`
-- ----------------------------
DROP TABLE IF EXISTS `ssw_page_status`;
CREATE TABLE `ssw_page_status` (
  `page_id` varchar(56) NOT NULL DEFAULT '',
  `status` enum('offline','online') DEFAULT 'online',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

