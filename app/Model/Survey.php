<?php
App::uses('AppModel', 'Model');
/**
 * Survey Model
 *
 */
class Survey extends AppModel {
	private	$survey_name_column = 'userid';
	
	public function is_submit($surveyname, $cellphone, $verifycode, $finished_name) {
		$conditions = array($this->survey_name_column => $surveyname, 
			'OR' => array(
					$this->user_name_column => $cellphone,
					$this->user_name_column => $verifycode,
				)
			$finished_name => '1' );
		$this->set($this->survey_name_column, $surveyname);
		$this->set($this->user_name_column, $user_name);
		$count = $this->Survey->find('count', array('conditions' => $conditions));
		if ($count > 0) {
			if ($this->isJsonOrXmlExt()){
				$this->set('error', 'user exists.');
				$this->set('_serialize', array_keys($this->viewVars));
				return;
			} else {
				$this->Session->setFlash(__('user exists.'));
			}
		}



		return $result;	

	}

}
