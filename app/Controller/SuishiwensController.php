<?php
App::import('Vendor', 'Classes/PHPExcel');
// require_once(__DIR__ . '/../Vendor/Classes/PHPExcel.php');
//require_once(__DIR__ . '/../Vendor/Classes/PHPExcel/Writer/Excel2007.php');

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

	public function dashboard($page_id = null) {
	// check ssw_page_status data row
	$this->loadModel('SswPageStatus');
	$found = $this->SswPageStatus->findByPageId($page_id);
	if (empty($found)) {
		// create a new object
		$this->SswPageStatus->create();
		$this->SswPageStatus->set('page_id', $page_id);
		$page_status = 'online';
		$this->SswPageStatus->set('status', $page_status);
		$this->SswPageStatus->save();
	}
	else {
		// read ssw_page_status
		$page_status = $found['SswPageStatus']['status'];
	}
	$this->set('page_status', $page_status);
	
	// statistic
	$count_all= $this->Suishiwen->find('count',
		array(
			'conditions' =>
				 array('page_id' => $page_id)
		)
	);
	$this->set('count_all', $count_all);

	$count_finished = $this->Suishiwen->find('count',
		array(
			'conditions' =>
				array('page_id' => $page_id,
					'bFinished' => '1'
				)
			)
	);

	$this->set('count_finished', $count_finished);

	$count_unfinished = $this->Suishiwen->find('count',
		array(
			'conditions' =>
				 array('page_id' => $page_id,
					'bFinished' => '0'
				)
			)
	);
	$this->set('count_unfinished', $count_unfinished);

	// Other data
	$this->set('page_id', $page_id);

	// link to download

	}

	public function download_rawdata($page_id = null) {
		if (!$this->Suishiwen->findByPageId($page_id)) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'Hello')
		->setCellValue('B2', 'world!')
		->setCellValue('C1', 'Hello')
		->setCellValue('D2', 'world!');

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A4', 'Miscellaneous glyphs')
		->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

		// Save Excel 2007 file
		//debug("Write to Excel2007 format");
		$callStartTime = microtime(true);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		Configure::write('debug', 0);
		$this->layout = 'blank';
		$this->render('blank');

	   header("Content-Type: application/force-download"); 
	   header("Content-Type: application/octet-stream"); 
	   header("Content-Type: application/download"); 
	   header('Content-Disposition:inline;filename="data.xlsx"'); 
	   header("Content-Transfer-Encoding: binary"); 
	   header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	   header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
	   header("Pragma: no-cache");

		$objWriter->save('php://output');
		CakeResponse::download('php://output');
	}
}
