<?php
App::uses('AppController', 'Controller');

class CcbUnactivedSurveyController extends AppController {

	public $components = array('Paginator');

	public function index() {
		$this->CcbUnactivedSurvey->recursive = 0;
		$this->set('CcbUnactivedSurveys', $this->Paginator->paginate());
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->log($this->request->data);
			
			$data['CcbUnactivedSurvey']['cid'] = $this->request->data[0];
			$data['CcbUnactivedSurvey']['q01'] = $this->request->data[1];
			$data['CcbUnactivedSurvey']['q02'] = $this->request->data[2];
			$data['CcbUnactivedSurvey']['q03'] = $this->request->data[3];
			$data['CcbUnactivedSurvey']['q04'] = $this->request->data[4];

			$this->CcbUnactivedSurvey->create();
			if ($this->CcbUnactivedSurvey->save($data)) {
				return $this->flash(__('The survey has been saved.'), array('action' => 'index'));
			}
		}
	}

}
