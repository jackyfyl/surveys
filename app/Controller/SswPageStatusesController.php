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
	public $components = array('Paginator', 'RequestHandler', 'Session');

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
		if ($this->isJsonOrXmlExt()){
			$this->set('_serialize', array_keys($this->viewVars));
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->log($this->request->data);

		if ($this->request->is('post')) {
			$this->SswPageStatus->create();
			if ($this->SswPageStatus->save($this->request->data)) {
				if ($this->isJsonOrXmlExt()){
					$this->set('id', $this->SswPageStatus->id);
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				} else {
					$this->Session->setFlash(__('The data has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				if ($this->isJsonOrXmlExt()){
					$this->set('error', 'The data could not be saved. Please, try again.');
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				}
				else {
					$this->Session->setFlash(__('The data could not be saved. Please, try again.'));
				}
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
		if (!$this->SswPageStatus->exists($id)) {
			throw new NotFoundException(__('Invalid data'));
		}
		$this->request->data[$this->modelClass]['id'] = $id;
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SswPageStatus->save($this->request->data)) {
				if ($this->isJsonOrXmlExt()){
					$this->set('result', 'success');
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				} else {
	                if (!empty($this->request->data['redirect'])) {
	                    return $this->redirect($this->request->data['redirect']);
					}
					else {
						$this->Session->setFlash(__('The data has been saved.'));
						return $this->redirect(array('action' => 'index'));
					}
				}
			} else {
				if ($this->isJsonOrXmlExt()){
					$this->set('error', 'The data could not be saved. Please, try again.');
					$this->set('_serialize', array_keys($this->viewVars));
					return;
				}
				else {
					$this->Session->setFlash(__('The data could not be saved. Please, try again.'));
				}
			}
		} else {
			$options = array('conditions' => array('SswPageStatus.' . $this->SswPageStatus->primaryKey => $id));
			$this->request->data = $this->SswPageStatus->find('first', $options);
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
		$this->SswPageStatus->id = $id;
		if (!$this->SswPageStatus->exists()) {
			throw new NotFoundException(__('Invalid data'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SswPageStatus->delete()) {
			if ($this->isJsonOrXmlExt()){
				$this->set('result', 'success');
				$this->set('_serialize', array_keys($this->viewVars));
				return;
			} else {
				$this->Session->setFlash(__('The data has been deleted.'));
			}
		} else {
			if ($this->isJsonOrXmlExt()){
				$this->set('error', 'The data could not be deleted. Please, try again.');
				$this->set('_serialize', array_keys($this->viewVars));
				return;
			} else {
				$this->Session->setFlash(__('The data could not be deleted. Please, try again.'));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}
}
