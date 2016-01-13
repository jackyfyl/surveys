<?php
App::uses('AppModel', 'Model');
/**
 * SurveyValidation Model
 *
 */
class SurveyValidation extends AppModel {

public function exists_one($surveyname, $q_name, $valid_value) {
	$options = array('conditions' => 
		array(
			'surveyname' => $surveyname,
			'q_name' => $q_name,
			'valid_value' => $valid_value,
		)
	);
	$result = $this->find('count', $options);
	if ($result == 0) {
		return false;	
	}
	else {
		return true;
	}
}

}
