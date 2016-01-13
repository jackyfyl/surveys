SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `survey_validations`
-- ----------------------------
DROP TABLE IF EXISTS `survey_validations`;
CREATE TABLE `survey_validations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surveyname` varchar(50) NOT NULL,
  `q_name` varchar(5) NOT NULL,
  `valid_value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
