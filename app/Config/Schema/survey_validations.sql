SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `survey_validations`
-- ----------------------------
DROP TABLE IF EXISTS `survey_validations`;
CREATE TABLE `survey_validations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surveyname` varchar(50) NOT NULL,
  `cellphone` varchar(20) NOT NULL,
  `verifycode` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
