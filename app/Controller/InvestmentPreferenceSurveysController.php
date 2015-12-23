<?php
App::uses('AppController', 'Controller');

class InvestmentPreferenceSurveysController extends AppController {

	public $components = array('Paginator', 'Session', 'RequestHandler');

	public function index() {
		$this->InvestmentPreferenceSurvey->recursive = 0;
		$this->set('investmentPreferenceSurveys', $this->Paginator->paginate());
		if ($this->isJsonOrXmlExt()){
			$this->set('_serialize', array_keys($this->viewVars));
		}
	}

	public function view($id = null) {
		if (!$this->InvestmentPreferenceSurvey->exists($id)) {
			throw new NotFoundException(__('Invalid investment preference survey'));
		}
		$options = array('conditions' => array('InvestmentPreferenceSurvey.' . $this->InvestmentPreferenceSurvey->primaryKey => $id));
		$this->set('investmentPreferenceSurvey', $this->InvestmentPreferenceSurvey->find('first', $options));
		if ($this->isJsonOrXmlExt()){
			$this->set('_serialize', array_keys($this->viewVars));
		}
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$data['InvestmentPreferenceSurvey']['userid'] = $this->request->data[0];
			$data['InvestmentPreferenceSurvey']['wxopenid'] = $this->request->data[1];
			$data['InvestmentPreferenceSurvey']['q01'] = isset($this->request->data[2])?$this->request->data[2]:0;
			$data['InvestmentPreferenceSurvey']['q02'] = isset($this->request->data[3])?$this->request->data[3]:0;
			$data['InvestmentPreferenceSurvey']['q03'] = isset($this->request->data[4])?$this->request->data[4]:0;
			$data['InvestmentPreferenceSurvey']['q04'] = isset($this->request->data[5])?$this->request->data[5]:0;
			$data['InvestmentPreferenceSurvey']['q05'] = isset($this->request->data[6])?$this->request->data[6]:0;
			$data['InvestmentPreferenceSurvey']['q06'] = isset($this->request->data[7])?$this->request->data[7]:0;
			$data['InvestmentPreferenceSurvey']['q07'] = isset($this->request->data[8])?$this->request->data[8]:0;
			$data['InvestmentPreferenceSurvey']['q08'] = isset($this->request->data[9])?$this->request->data[9]:0;
			$data['InvestmentPreferenceSurvey']['q09'] = isset($this->request->data[10])?$this->request->data[10]:0;
			$data['InvestmentPreferenceSurvey']['q10'] = isset($this->request->data[11])?$this->request->data[11]:0;
			$data['InvestmentPreferenceSurvey']['q11'] = isset($this->request->data[12])?$this->request->data[12]:0;
			$data['InvestmentPreferenceSurvey']['q12'] = isset($this->request->data[13])?$this->request->data[13]:0;
			$data['InvestmentPreferenceSurvey']['q13'] = isset($this->request->data[14])?$this->request->data[14]:0;
			$data['InvestmentPreferenceSurvey']['q14'] = isset($this->request->data[15])?$this->request->data[15]:0;
			$data['InvestmentPreferenceSurvey']['q15'] = isset($this->request->data[16])?$this->request->data[16]:0;
			$data['InvestmentPreferenceSurvey']['q16'] = isset($this->request->data[17])?$this->request->data[17]:0;
			$data['InvestmentPreferenceSurvey']['q17'] = isset($this->request->data[18])?$this->request->data[18]:0;
			$data['InvestmentPreferenceSurvey']['q18'] = isset($this->request->data[19])?$this->request->data[19]:0;
			$data['InvestmentPreferenceSurvey']['q19'] = isset($this->request->data[20])?$this->request->data[20]:0;
			$data['InvestmentPreferenceSurvey']['q20'] = isset($this->request->data[21])?$this->request->data[21]:0;
		
			$this->InvestmentPreferenceSurvey->create();
			if ($this->InvestmentPreferenceSurvey->save($data)) {
				$this->set('result', 'success');
				$this->set('id', $this->InvestmentPreferenceSurvey->id);
			} else {
				$this->set('result', 'error');
			}
			if ($this->isJsonOrXmlExt()){
				$this->set('_serialize', array_keys($this->viewVars));
			}
			else {
			}
			return;
		}
		else{
			if ($this->isJsonOrXmlExt()){
				$this->set('_serialize', array_keys($this->viewVars));
			}
			else {
			}
		}
	}

	
}
