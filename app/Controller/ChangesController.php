<?php
App::uses('AppController', 'Controller');

/** HelperをControllerで使用する */
App::import('Helper', 'Csv');
/**
 * Changes Controller
 *
 * @property Change $Change
 */
class ChangesController extends AppController {

/**
 * Module name
 *
 * @var string
 */
	public $name = 'Changes';

/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'Change',
		'ChangeProgress',
		'ChangeDiv',
		'GeneralCode',
	);

/**
g * index method
 *
 * @return void
 */
	public function index() {
		$this->Change->recursive = 0;

		$option = array();
		$searchword = array();
		$lasttrade_start = null;
		$lasttrade_end = null;

		/** eリクエストデータがある場合、ページ以外のパラメータがある場合は検索処理 */		
		if (!empty($this->data)) {
			if (!isset($this->request->data['clear'])) {
				$searchword = $this->request->data['Change'];
		
				/** 顧客情報の検索処理 */
				foreach ($searchword as $search_key => $search_value) {
					if (isset($search_value) && $search_value != '') {
						if (strstr($search_key, '_div')) {
						 	/** _idを含む場合、完全一致にする */
							$option[$search_key] = $search_value;
						}
					}
				}
			} else {
					/** 検索内容のクリア */
					$this->redirect(array('action' => 'index'));
			}
		}
		/** 作業区分を取得する */
		$change_divs = $this->ChangeDiv->find('all');
		/** プルダウン用にデータを整える */
		$change_divs = Set::Combine($change_divs, '{n}.ChangeDiv.id', '{n}.ChangeDiv.change_div_name');

		/** 作業状況を取得する */
		$change_status = $this->ChangeProgress->find('all');
		/** プルダウン用にデータを整える */
		$change_status = Set::Combine($change_status, '{n}.ChangeProgress.id', '{n}.ChangeProgress.progress_name');

			/** 汎用コードを取得する */
		$general_code = $this->GeneralCode->find('all');
		/** プルダウン用にデータを整える */
		$general_code = Set::Combine($general_code, '{n}.GeneralCode.id', '{n}.GeneralCode.code_name');

		/** Viewに値を渡す */
		$this->set('change_divs', $change_divs);
		$this->set('change_status', $change_status);
		$this->set('general_code', $general_code);
		$this->set('changes', $this->paginate($option));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Change->id = $id;
		if (!$this->Change->exists()) {
			throw new NotFoundException(__('Invalid change'));
		}
		$this->set('change', $this->Change->read(null, $id));

		/** 作業区分を取得する */
		$change_div_value =  $this->Change->data['Change']['change_div']; 
		$change_divs = $this->ChangeDiv->find(
			'all',
			Array(
				'conditions' => Array('id' => $change_div_value),
				'fields' => Array('ChangeDiv.change_div_name')
			)
		);
		$change_divs= $change_divs[0]['ChangeDiv']['change_div_name'];

		/** 作業状況を取得する */
		$change_status_value =  $this->Change->data['Change']['change_status']; 
		$change_status = $this->ChangeProgress->find(
			'all',
			Array(
				'conditions' => Array('id' => $change_status_value),
				'fields' => Array('ChangeProgress.progress_name')
			)
		);
		$change_status= $change_status[0]['ChangeProgress']['progress_name'];
		
		/** サービス停止の有無を取得する */
		$service_affect_value =  $this->Change->data['Change']['service_affect']; 
		$service_affect = $this->GeneralCode->find(
			'all',
			Array(
				'conditions' => Array('id' => $service_affect_value),
				'fields' => Array('GeneralCode.code_name')
			)
		);
		$service_affect = $service_affect[0]['GeneralCode']['code_name'];

		/** 資料更新の有無の有無を取得する */
		$change_doc_value =  $this->Change->data['Change']['change_doc_div']; 
		$change_doc_div = $this->GeneralCode->find(
			'all',
			Array(
				'conditions' => Array('id' => $change_doc_value),
				'fields' => Array('GeneralCode.code_name')
			)
		);
		$change_doc_div = $change_doc_div[0]['GeneralCode']['code_name'];		
		
		/** 周知情報の有無の有無を取得する */
		$shared_div_value =  $this->Change->data['Change']['shared_div']; 
		$shared_div = $this->GeneralCode->find(
			'all',
			Array(
				'conditions' => Array('id' => $shared_div_value),
				'fields' => Array('GeneralCode.code_name')
			)
		);
		$shared_div = $shared_div[0]['GeneralCode']['code_name'];				
		
		/** Viewに値を渡す */
		$this->set('change_divs', $change_divs);
		$this->set('change_status', $change_status);
		$this->set('service_affect', $service_affect);
		$this->set('change_doc_div', $change_doc_div);
		$this->set('shared_div', $shared_div);				
		
//		$this->set('general_code', $general_code);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Change->create();

			if ($this->Change->save($this->request->data)) {
				$this->Session->setFlash(__('システム変更履歴の登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('システム変更履歴の登録に失敗しました。'));
			}
		}

		/** 作業区分を取得する */
		$change_divs = $this->ChangeDiv->find('all');
		/** プルダウン用にデータを整える */
		$change_divs = Set::Combine($change_divs, '{n}.ChangeDiv.id', '{n}.ChangeDiv.change_div_name');

		/** 作業状況を取得する */
		$change_status = $this->ChangeProgress->find('all');
		/** プルダウン用にデータを整える */
		$change_status = Set::Combine($change_status, '{n}.ChangeProgress.id', '{n}.ChangeProgress.progress_name');

			/** 汎用コードを取得する */
		$general_code = $this->GeneralCode->find('all');
		/** プルダウン用にデータを整える */
		$general_code = Set::Combine($general_code, '{n}.GeneralCode.id', '{n}.GeneralCode.code_name');

		/** Viewに値を渡す */
		$this->set('change_divs', $change_divs);
		$this->set('change_status', $change_status);
		$this->set('general_code', $general_code);				
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Change->id = $id;
		if (!$this->Change->exists()) {
			throw new NotFoundException(__('Invalid change'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Change->save($this->request->data)) {
				$this->Session->setFlash(__('システム変更履歴の更新に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));				
				//$this->flash(__('The change has been saved.'), array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('システム変更履歴の更新に失敗しました。'));				
			}
		} else {
			$this->request->data = $this->Change->read(null, $id);
		}

				/** 作業区分を取得する */
		$change_divs = $this->ChangeDiv->find('all');
		/** プルダウン用にデータを整える */
		$change_divs = Set::Combine($change_divs, '{n}.ChangeDiv.id', '{n}.ChangeDiv.change_div_name');

		/** 作業状況を取得する */
		$change_status = $this->ChangeProgress->find('all');
		/** プルダウン用にデータを整える */
		$change_status = Set::Combine($change_status, '{n}.ChangeProgress.id', '{n}.ChangeProgress.progress_name');

			/** 汎用コードを取得する */
		$general_code = $this->GeneralCode->find('all');
		/** プルダウン用にデータを整える */
		$general_code = Set::Combine($general_code, '{n}.GeneralCode.id', '{n}.GeneralCode.code_name');

		/** Viewに値を渡す */
		$this->set('change_divs', $change_divs);
		$this->set('change_status', $change_status);
		$this->set('general_code', $general_code);				
	
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Change->id = $id;
		if (!$this->Change->exists()) {
			throw new NotFoundException(__('Invalid change'));
		}
		if ($this->Change->delete()) {
			$this->flash(__('Change deleted'), array('action' => 'index'));
		}
		$this->flash(__('Change was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
