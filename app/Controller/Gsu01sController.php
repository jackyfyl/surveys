<?php
App::uses('AppController', 'Controller');
class Gsu01sController extends AppController {

	public $components = array('Paginator');

	public function index() {
        throw new NotFoundException();
        return;
		$this->Gsu01->recursive = 0;
		$this->set('gsu01s', $this->Paginator->paginate());
	}

	public function add($emp_id) {
    	$this->layout = 'gsu01';
		if ($this->request->is('post')) {
			$this->request->data['Gsu01']['emp_id'] = $emp_id;
			$this->Gsu01->create();
			if ($this->Gsu01->save($this->request->data)) {
				//return $this->flash(__('The gsu01 has been saved.'), array('action' => 'index'));
                return $this->redirect(array('action' => 'finish'));
			}
		}
	}

    public function finish() {
	    $this->layout = 'finish';
	    //$this->set('title_for_layout', '高露洁调查');
    }
}

