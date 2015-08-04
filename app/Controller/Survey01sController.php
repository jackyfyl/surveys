<?php
App::uses('AppController', 'Controller');

class Survey01sController extends AppController {

    public $components = array('Paginator');

    public function index() {
	$this->Survey01->recursive = 0;
	$this->set('survey01s', $this->Paginator->paginate());
    }

    public function add($x0, $client_id) {
	$this->layout = 'survey01';
	switch($x0){
	    case 1:
		$this->render('x0_1');
		$this->request->data['Survey01']['x0_1'] = 1;
		break;
	    case 2:
		$this->render('x0_2');
		$this->request->data['Survey01']['x0_2'] = 1;
		break;
	    case 3:
		$this->render('x0_3');
		$this->request->data['Survey01']['x0_3'] = 1;
		break;
	    case 4:
		$this->render('x0_4');
		$this->request->data['Survey01']['x0_4'] = 1;
		break;
	    case 5:
		$this->render('x0_5');
		$this->request->data['Survey01']['x0_5'] = 1;
		break;
	    case 6:
		$this->render('x0_6');
		$this->request->data['Survey01']['x0_6'] = 1;
		break;
	    case 7:
		$this->render('x0_7');
		$this->request->data['Survey01']['x0_7'] = 1;
		break;
	    case 8:
		$this->render('x0_8');
		$this->request->data['Survey01']['x0_8'] = 1;
		break;
	    default:
		throw new NotFoundException();
		break;
	}
	    
	$this->request->data['Survey01']['client_id'] = $client_id;
	if ($this->request->is('post')) {
	    $this->Survey01->create();
	    if ($this->Survey01->save($this->request->data)) {
		//return $this->redirect();
		return $this->redirect(array('action' => 'finish'));
		//return $this->flash(__('The survey01 has been saved.'), array('action' => 'finish'));
	    }
	}
    }
    
    public function finish() {
	    $this->layout = 'finish';
    }

}

