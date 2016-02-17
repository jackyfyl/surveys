<?php
App::uses('AppModel', 'Model');
/**
 * SurveyValidation Model
 *
 */
class SurveyValidation extends AppModel {

	public function find_one($surveyname, $valid_value) {
		$options = array('conditions' =>
			array(
				'surveyname' => $surveyname,
				'OR' => array(
					'cellphone' => $valid_value,
					'verifycode' => $valid_value,
					),
			),
			'limit' => 1,
		);
		$result = $this->find('first', $options);
		return $result;
	}

}
