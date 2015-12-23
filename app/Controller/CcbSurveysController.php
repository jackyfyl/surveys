<?php
App::uses('AppController', 'Controller');
/**
 * CcbSurveys Controller
 *
 * @property CcbSurvey $CcbSurvey
 * @property PaginatorComponent $Paginator
 */
class CcbSurveysController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CcbSurvey->recursive = 0;
		$this->set('ccbSurveys', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CcbSurvey->exists($id)) {
			throw new NotFoundException(__('Invalid ccb survey'));
		}
		$options = array('conditions' => array('CcbSurvey.' . $this->CcbSurvey->primaryKey => $id));
		$this->set('ccbSurvey', $this->CcbSurvey->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->log($this->request->data);
			
			$data['CcbSurvey']['cid'] = $this->request->data[0];
			$data['CcbSurvey']['q01'] = $this->request->data[1];
			$data['CcbSurvey']['q02'] = $this->request->data[2];
			$data['CcbSurvey']['q03'] = $this->request->data[3];
			$data['CcbSurvey']['q04'] = $this->request->data[4];
			$data['CcbSurvey']['q05'] = $this->request->data[5];
			$data['CcbSurvey']['q06'] = $this->request->data[6];
			$data['CcbSurvey']['q07'] = $this->request->data[7];
			$data['CcbSurvey']['q08'] = $this->request->data[8];
			$data['CcbSurvey']['q09'] = $this->request->data[9];
			$data['CcbSurvey']['q10'] = $this->request->data[10];
			$data['CcbSurvey']['q11'] = $this->request->data[11];
			$data['CcbSurvey']['q12'] = $this->request->data[12];
			$data['CcbSurvey']['q13'] = $this->request->data[13];
			$data['CcbSurvey']['q14'] = $this->request->data[14];
			$data['CcbSurvey']['q15'] = $this->request->data[15];
			$data['CcbSurvey']['q16'] = $this->request->data[16];
			$data['CcbSurvey']['q17'] = $this->request->data[17];
			$data['CcbSurvey']['q18'] = $this->request->data[18];
			$data['CcbSurvey']['q19'] = $this->request->data[19];
			$data['CcbSurvey']['q20'] = $this->request->data[20];
			$data['CcbSurvey']['q21'] = $this->request->data[21];
			$data['CcbSurvey']['q22'] = $this->request->data[22];
			$data['CcbSurvey']['q23'] = $this->request->data[23];
			$data['CcbSurvey']['q24'] = $this->request->data[24];
			$data['CcbSurvey']['q25'] = $this->request->data[25];
			$data['CcbSurvey']['q26'] = $this->request->data[26];
			$data['CcbSurvey']['q27'] = $this->request->data[27];
			$data['CcbSurvey']['q28'] = $this->request->data[28];
			$data['CcbSurvey']['q29'] = $this->request->data[29];
			$data['CcbSurvey']['q30'] = $this->request->data[30];
			$data['CcbSurvey']['q31'] = $this->request->data[31];
			$data['CcbSurvey']['q32'] = $this->request->data[32];
			$data['CcbSurvey']['q33'] = $this->request->data[33];
			$data['CcbSurvey']['q34'] = $this->request->data[34];
			$data['CcbSurvey']['q35'] = $this->request->data[35];
			$data['CcbSurvey']['q36'] = $this->request->data[36];

			$this->CcbSurvey->create();
			if ($this->CcbSurvey->save($data)) {
				return $this->flash(__('The ccb survey has been saved.'), array('action' => 'index'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CcbSurvey->exists($id)) {
			throw new NotFoundException(__('Invalid ccb survey'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CcbSurvey->save($this->request->data)) {
				return $this->flash(__('The ccb survey has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('CcbSurvey.' . $this->CcbSurvey->primaryKey => $id));
			$this->request->data = $this->CcbSurvey->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CcbSurvey->id = $id;
		if (!$this->CcbSurvey->exists()) {
			throw new NotFoundException(__('Invalid ccb survey'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CcbSurvey->delete()) {
			return $this->flash(__('The ccb survey has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The ccb survey could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
