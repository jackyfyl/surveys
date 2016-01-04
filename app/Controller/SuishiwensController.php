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
		// receive data
		$data = $this->Suishiwen->findAllByPageId($page_id);
		if(count($data) == 0) {
			$this->Session->setFlash('没有数据');
			return $this->redirect(array('action' => 'dashboard'));
		}

		$objPHPExcel = new PHPExcel();

		$column_name = array();
		for ($i=1; $i <= 26; $i++) {
			$column_name[$i] = chr(64 + $i);
		}
		for ($i=27; $i <= 52; $i++) {
			$column_name[$i] = 'A'.chr(64 - 26 + $i);
		}
		for ($i=53; $i <= 78; $i++) {
			$column_name[$i] = 'B'.chr(64 - 26 * 2 + $i);
		}

		$obj = $objPHPExcel->setActiveSheetIndex(0);
		$obj->setCellValue('A1', 'page_id');
		$obj->setCellValue('B1', 'page_name');
		$obj->setCellValue('C1', 'start_time');
		$obj->setCellValue('D1', 'end_time');
		$obj->setCellValue('E1', 'bfinished');
		$obj->setCellValue('F1', 'userid');

		for ($i = 7, $j = 1; $i <= 56; $i++, $j = $j + 2) {
			$obj->setCellValue($column_name[$i].'1', $data[0]['Suishiwen']['q'.sprintf ("%02d", $j)]);
		}

		$row = 2;
		foreach ($data as $key => $value) {
			$obj->setCellValue('A'.$row, $value['Suishiwen']['page_id']);
			$obj->setCellValue('B'.$row, $value['Suishiwen']['page_name']);
			$obj->setCellValue('C'.$row, ($value['Suishiwen']['start_time']/1000+8*3600)/86400+70*365+19);
			$obj->getStyle('C'.$row)->getNumberFormat()->setFormatCode('yy/mm/dd h:mm:ss;@');
			$obj->setCellValue('D'.$row, ($value['Suishiwen']['end_time']/1000+8*3600)/86400+70*365+19);
			$obj->getStyle('D'.$row)->getNumberFormat()->setFormatCode('yy/mm/dd h:mm:ss;@');
			$obj->setCellValue('E'.$row, $value['Suishiwen']['bfinished']);
			$obj->setCellValue('F'.$row, $value['Suishiwen']['userid']);
			for ($i = 7, $j = 2; $i <= 56; $i++, $j = $j + 2) {
				$obj->setCellValue($column_name[$i].$row, $value['Suishiwen']['q'.sprintf ("%02d", $j)]);
			}
			$row++;
		}

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		// Disable debug info and templates that prevent download steam.
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
