<?php
App::uses('AppController', 'Controller');
/**
 * SswPageStatuses Controller
 *
 * @property SswPageStatus $SswPageStatus
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 */
class SswPageStatusesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SswPageStatus->recursive = 0;
		$this->set('sswPageStatuses', $this->Paginator->paginate());
		if ($this->isJsonOrXmlExt()){
			$this->set('_serialize', array_keys($this->viewVars));
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SswPageStatus->exists($id)) {
			throw new NotFoundException(__('Invalid ssw page status'));
		}
		$options = array('conditions' => array('SswPageStatus.' . $this->SswPageStatus->primaryKey => $id));
		$this->set('sswPageStatus', $this->SswPageStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SswPageStatus->create();
			if ($this->SswPageStatus->save($this->request->data)) {
				return $this->flash(__('The ssw page status has been saved.'), array('action' => 'index'));
			}
		}
		$suishiwens = $this->SswPageStatus->Suishiwen->find('list');
		$this->set(compact('suishiwens'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SswPageStatus->exists($id)) {
			throw new NotFoundException(__('Invalid ssw page status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SswPageStatus->save($this->request->data)) {
				return $this->flash(__('The ssw page status has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('SswPageStatus.' . $this->SswPageStatus->primaryKey => $id));
			$this->request->data = $this->SswPageStatus->find('first', $options);
		}
		$suishiwens = $this->SswPageStatus->Suishiwen->find('list');
		$this->set(compact('suishiwens'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SswPageStatus->id = $id;
		if (!$this->SswPageStatus->exists()) {
			throw new NotFoundException(__('Invalid ssw page status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SswPageStatus->delete()) {
			return $this->flash(__('The ssw page status has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The ssw page status could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
