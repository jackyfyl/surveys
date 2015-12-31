<?php
App::uses('AppController', 'Controller');
/**
 * Suishiwens Controller
 *
 * @Property Suishiwen $Suishiwen
 * @property PaginatorComponent $Paginator
 */
class SuishiwensController extends AppController {

	public $components = array('Paginator', 'RequestHandler', 'Session');

	public function index() {
		$this->Suishiwen->recursive = 0;
		$this->set('suishiwens', $this->Paginator->paginate());
		if ($this->isJsonOrXmlExt()){
			$this->set('_serialize', array_keys($this->viewVars));
		}
	}
	
	public function beforeFilter() {
		header("Access-Control-Allow-Origin: *");
	}

	public function view($id = null) {
		if (!$this->Suishiwen->exists($id)) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$options = array('conditions' => array('Suishiwen.' . $this->Suishiwen->primaryKey => $id));
		$this->set('survey', $this->Suishiwen->find('first', $options));
		if ($this->isJsonOrXmlExt()){
			$this->set('_serialize', array_keys($this->viewVars));
		}
	}

	public function add() {
		$this->log($this->request->data);

		if ($this->request->is('post')) {
			$this->Suishiwen->create();
			if ($this->Suishiwen->save($this->request->data)) {
				if ($this->isJsonOrXmlExt()){
					$this->set('id', $this->Suishiwen->id);
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
		if (!$this->Suishiwen->exists($id)) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$this->request->data[$this->modelClass]['id'] = $id;
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Suishiwen->save($this->request->data)) {
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
			$options = array('conditions' => array('Suishiwen.' . $this->Suishiwen->primaryKey => $id));
			$this->request->data = $this->Suishiwen->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->Suishiwen->id = $id;
		if (!$this->Suishiwen->exists()) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Suishiwen->delete()) {
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
}
