<?php
App::uses('AppController', 'Controller');
/**
 * Surveys Controller
 *
 * @property Survey $Survey
 * @property PaginatorComponent $Paginator
 */
class SurveysController extends AppController {

	public $components = array('Paginator', 'RequestHandler', 'Session');

	public function index() {
		$this->Survey->recursive = 0;
		$this->set('surveys', $this->Paginator->paginate());
		if ($this->isJsonOrXmlExt()){
			$this->set('_serialize', array_keys($this->viewVars));
		}
	}

	public function beforeFilter() {
		header("Access-Control-Allow-Origin: *");
	}

	public function view($id = null) {
		if (!$this->Survey->exists($id)) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$options = array('conditions' => array('Survey.' . $this->Survey->primaryKey => $id));
		$this->set('survey', $this->Survey->find('first', $options));
		if ($this->isJsonOrXmlExt()){
			$this->set('_serialize', array_keys($this->viewVars));
		}
	}

	public function add() {
		debug($this->request->data);
		if ($this->request->is('post')) {
			$this->Survey->create();
			if ($this->Survey->save($this->request->data)) {
				if ($this->isJsonOrXmlExt()){
					$this->set('id', $this->Survey->id);
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				} else {
					$this->Session->setFlash(__('The survey has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				if ($this->isJsonOrXmlExt()){
					$this->set('error', 'The survey could not be saved. Please, try again.');
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				}
				else {
					$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
				}
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Survey->exists($id)) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$this->request->data[$this->modelClass]['id'] = $id;
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Survey->save($this->request->data)) {
				if ($this->isJsonOrXmlExt()){
					$this->set('result', 'success');
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				} else {
					$this->Session->setFlash(__('The survey has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				if ($this->isJsonOrXmlExt()){
					$this->set('error', 'The survey could not be saved. Please, try again.');
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				}
				else {
					$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
				}
			}
		} else {
			$options = array('conditions' => array('Survey.' . $this->Survey->primaryKey => $id));
			$this->request->data = $this->Survey->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->Survey->id = $id;
		if (!$this->Survey->exists()) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Survey->delete()) {
			if ($this->isJsonOrXmlExt()){
				$this->set('result', 'success');
				$this->set('_serialize', array_keys($this->viewVars));
				return;
			} else {
				$this->Session->setFlash(__('The survey has been deleted.'));
			}
		} else {
			if ($this->isJsonOrXmlExt()){
				$this->set('error', 'The survey could not be deleted. Please, try again.');
				$this->set('_serialize', array_keys($this->viewVars));
				return;
			} else {
				$this->Session->setFlash(__('The survey could not be deleted. Please, try again.'));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function addwithbingo() {
		if ($this->request->is('post')) {
			// check survey_validation
			$user_name_column = 'q01';
			$survey_name_column = 'userid';
			$surveyname = $this->request->data['Survey'][$survey_name_column];
			$user_name = $this->request->data['Survey'][$user_name_column];
			$finished_name = 'q48';

			$this->loadModel("SurveyValidation");
			$valid_user = $this->SurveyValidation->exists_one($surveyname, $user_name_column, $user_name);
			//$this->set($sql, $this->SurveyValidation->getDataSource()->getLog(false, false));
			//$this->set('count', $valid_user);
			if (!$valid_user) {
				if ($this->isJsonOrXmlExt()){
					$this->set('error', 'user is invalid.');
					$this->set($user_name_column, $user_name);
					$this->set($survey_name_column, $surveyname);
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				} else {
					$this->Session->setFlash(__('user is invalid.'));
				}
			}

			$conditions = array($survey_name_column => $surveyname, $user_name_column => $user_name, $finished_name => '1' );
			$this->set($survey_name_column, $surveyname);
			$this->set($user_name_column, $user_name);
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

			$this->Survey->create();
			if ($this->Survey->save($this->request->data)) {

				// check if finished
				if (isset($this->request->data['Survey'][$finished_name])) {
					$finished = $this->request->data['Survey'][$finished_name];
				}
				else
				{
					$finished = false;
				}

				$this->set('finished', $finished);
				//
				if ($finished == 1) {
					$id = $this->Survey->id;
					$conditions = array($survey_name_column => $surveyname, 'id <=' => $id, $finished_name => '1');
					$order = $this->Survey->find('count', array('conditions' => $conditions));
					$this->set('order', $order);

					$this->loadModel('BingoNumber');
					$count = $this->BingoNumber->find('count', array('conditions' => array('bingo_number' => $order) ));
					if ($count > 0) {
						// Bingo！
						$bingo_column = 'q50';
						$this->Survey->set($bingo_column, 1);
						$this->Survey->save();
						$this->set('bingo', 1);
					}
				}


				if ($this->isJsonOrXmlExt()){
					$this->set('id', $this->Survey->id);
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				} else {
					$this->Session->setFlash(__('The survey has been saved.'));
					//return $this->redirect(array('action' => 'index'));
				}
			} else {
				if ($this->isJsonOrXmlExt()){
					$this->set('error', 'The survey could not be saved. Please, try again.');
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				}
				else {
					$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
				}
			}
		}
	}

	public function editwithbingo($id = null) {
		if (!$this->Survey->exists($id)) {
			throw new NotFoundException(__('Invalid survey'));
		}

		$this->request->data[$this->modelClass]['id'] = $id;
		if ($this->request->is(array('post', 'put'))) {
			// check survey_validation
			$user_name_column = 'q01';
			$survey_name_column = 'userid';
			$surveyname = $this->request->data['Survey'][$survey_name_column];
			$user_name = $this->request->data['Survey'][$user_name_column];
			$finished_name = 'q48';

			$this->loadModel("SurveyValidation");
			$valid_user = $this->SurveyValidation->exists_one($surveyname, $user_name_column, $user_name);
			if (!$valid_user) {
				if ($this->isJsonOrXmlExt()){
					$this->set('error', 'user is invalid.');
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				} else {
					$this->Session->setFlash(__('user is invalid.'));
				}
			}

			$old_user_name = $this->Survey->read($user_name_column);
			if ($old_user_name != $surveyname) {
				$conditions = array($survey_name_column => $surveyname,
					$user_name_column => $user_name,
					'id <>' => $id,
					$finished_name => '1');
				$this->set($survey_name_column, $surveyname);
				$this->set($user_name_column, $user_name);
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
			}

			if ($this->Survey->save($this->request->data)) {

				// check if finished
				if (isset($this->request->data['Survey'][$finished_name])) {
					$finished = $this->request->data['Survey'][$finished_name];
				}
				else
				{
					$finished = false;
				}

				$this->set('finished', $finished);
				//
				if ($finished == 1) {
					$id = $this->Survey->id;
					$conditions = array($survey_name_column => $surveyname, 'id <=' => $id, $finished_name => '1');
					$order = $this->Survey->find('count', array('conditions' => $conditions));
					$this->set('order', $order);

					$this->loadModel('BingoNumber');
					$count = $this->BingoNumber->find('count', array('conditions' => array('bingo_number' => $order) ));
					if ($count > 0) {
						// Bingo！
						$bingo_column = 'q50';
						$this->Survey->set($bingo_column, 1);
						$this->Survey->save();
						$this->set('bingo', 1);
					}
				}


				if ($this->isJsonOrXmlExt()){
					$this->set('id', $this->Survey->id);
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				} else {
					$this->Session->setFlash(__('The survey has been saved.'));
					//return $this->redirect(array('action' => 'index'));
				}
			} else {
				if ($this->isJsonOrXmlExt()){
					$this->set('error', 'The survey could not be saved. Please, try again.');
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				}
				else {
					$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
				}
			}
		}
	}



}
