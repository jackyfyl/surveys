SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bingo_numbers`
-- ----------------------------
DROP TABLE IF EXISTS `bingo_numbers`;
CREATE TABLE `bingo_numbers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bingo_number` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
