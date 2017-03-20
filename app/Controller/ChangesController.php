<?php
App::uses('AppController', 'Controller');
App::uses('TextHelper', 'Text');

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

	var $helpers = array('Text');	
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
		'ServiceAffect',
		'SharedDiv',
		'ChangeDoc',
		'User',
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
		$changedate_start = null;
		$changedate_end = null;

		/** eリクエストデータがある場合、ページ以外のパラメータがある場合は検索処理 */		
		if (!empty($this->data) || count($this->passedArgs) > 1)  {

			if (!isset($this->request->data['clear'])) {

				if (isset($this->request->data['search'])) {
					$searchword = $this->request->data['Change'];
					
				} else {
						/** パラメータが検索ワード */
						foreach ($this->passedArgs as $argkey => $argvalue) {
							if ($argkey != 'sort' && $argkey != 'direction' && $argkey != 'page') {
								if ($argkey != 'change_date_start' && $argkey != 'change_date_end') {
									$searchword[$argkey] = urldecode($argvalue);
								} else {
									$searchword[$argkey]['year'] = urldecode($argvalue['year']);
									$searchword[$argkey]['month'] = urldecode($argvalue['month']);
									$searchword[$argkey]['day'] = urldecode($argvalue['day']);
								}
							}
							
						}
						$this->request->data['Change'] = $searchword;
				}				

				/** システム変更履歴の検索処理 */
				foreach ($searchword as $search_key => $search_value) {

					if ($search_key != 'page') {					
						if (isset($search_value) && $search_value != '') {

							if (strstr($search_key, '_id')) {
	
								if (strstr($search_key, 'change_div_id')) {
									$option[$search_key] = $search_value;
								}
								if (strstr($search_key, 'change_status_id')) {
									$option[$search_key] = $search_value;
								}
								if (strstr($search_key, 'change_doc_id')) {
									$option[$search_key] = $search_value;
								}								
								if (strstr($search_key, 'created_id')) {
									$created_id = $search_value;

									if ($created_id) {
										$option['Change.created_id =  ? '] = array($created_id);
									}
								}
						  

							
							} elseif ( strstr($search_key,'change_date')) {
								/*日付の検索*/
								$year = strval($search_value['year']);
								$month = strval($search_value['month']);
								$day = strval($search_value['day']);							

								if (!empty($year) && !empty($month) && !empty($day)) {
									/** 日付が存在するか確認 */
									if (checkdate($month, $day, $year)) {
										if(strstr($search_key, '_start')) {
											$changedate_start = $year.'-'.$month.'-'.$day;
										} elseif(strstr($search_key, '_end')) {
											$changedate_end = $year.'-'.$month.'-'.$day;
										}
									}
								}							

								/** 開始日と終了日を検索する */
								if ($changedate_start || $changedate_end) {
									if ($changedate_start == null) {
										$changedate_start =  date('Y')-100 .'-'. date('m') .'-'. date('d');
									}
									if ($changedate_end == null) {
										$changedate_end =  date('Y')+100 .'-'. date('m') .'-'. date('d');
									}
									$option['change_target_date BETWEEN ? AND ?'] = array($changedate_start, $changedate_end);
								}
														
							} else {
								$option[$search_key.' LIKE'] = "%{$search_value}%";
						 		/**を含む場合部分一致にする */
							
							}
						}
					}
				}//forreach終了				
				
		
			} else {
					/** 検索内容のクリア */
					$this->redirect(array('action' => 'index'));
			}
		}
		/** 作業区分を取得する */
		$change_divs = $this->ChangeDiv->find('all');
		/** プルダウン用にデータを整える */
		$change_div_id = Set::Combine($change_divs, '{n}.ChangeDiv.id', '{n}.ChangeDiv.change_div_name');

		/** 作業状況を取得する */
		$change_status = $this->ChangeProgress->find('all');
		/** プルダウン用にデータを整える */
		$change_status_id = Set::Combine($change_status, '{n}.ChangeProgress.id', '{n}.ChangeProgress.progress_name');

			/** 汎用コードを取得する */
		$general_code = $this->GeneralCode->find('all');
		/** プルダウン用にデータを整える */
		$general_code = Set::Combine($general_code, '{n}.GeneralCode.id', '{n}.GeneralCode.code_name');

		/** Viewに値を渡す */
		$this->set('change_div_id', $change_div_id);
		$this->set('change_status_id', $change_status_id);
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
		$change_div_value =  $this->Change->data['Change']['change_div_id']; 
		$change_divs = $this->ChangeDiv->find(
			'all',
			Array(
				'conditions' => Array('id' => $change_div_value),
				'fields' => Array('ChangeDiv.change_div_name')
			)
		);
		$change_div_id= $change_divs[0]['ChangeDiv']['change_div_name'];

		/** 作業状況を取得する */
		$change_status_value =  $this->Change->data['Change']['change_status_id']; 
		$change_status = $this->ChangeProgress->find(
			'all',
			Array(
				'conditions' => Array('id' => $change_status_value),
				'fields' => Array('ChangeProgress.progress_name')
			)
		);
		$change_status_id= $change_status[0]['ChangeProgress']['progress_name'];
		
		/** サービス停止の有無を取得する */
		$service_affect_value =  $this->Change->data['Change']['service_affect_id']; 
		$service_affect = $this->ServiceAffect->find(
			'all',
			Array(
				'conditions' => Array('id' => $service_affect_value),
				'fields' => Array('ServiceAffect.code_name')
			)
		);
		$service_affect_id = $service_affect[0]['ServiceAffect']['code_name'];

		/** 資料更新の有無の有無を取得する */
		$change_doc_value =  $this->Change->data['Change']['change_doc_id']; 
		$change_doc_ids = $this->ChangeDoc->find(
			'all',
			Array(
				'conditions' => Array('id' => $change_doc_value),
				'fields' => Array('ChangeDoc.code_name')
			)
		);
		$change_doc_id = $change_doc_ids[0]['ChangeDoc']['code_name'];		
		
		/** 周知情報の有無の有無を取得する */
		$shared_div_value =  $this->Change->data['Change']['shared_div_id']; 
		$shared_div = $this->SharedDiv->find(
			'all',
			Array(
				'conditions' => Array('id' => $shared_div_value),
				'fields' => Array('SharedDiv.code_name')
			)
		);
		$shared_div_id = $shared_div[0]['SharedDiv']['code_name'];				

		$created_id_value =  $this->Change->data['Change']['created_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $created_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$created_id_name = $user_full_name[0]['User']['user_full_name'];

		$updated_id_value =  $this->Change->data['Change']['updated_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $updated_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$updated_id_name = $user_full_name[0]['User']['user_full_name'];
				
		
		
		/** Viewに値を渡す */
		$this->set('change_div_id', $change_div_id);
		$this->set('change_status_id', $change_status_id);
		$this->set('service_affect_id', $service_affect_id);
		$this->set('change_doc_id', $change_doc_id);
		$this->set('shared_div_id', $shared_div_id);				
		$this->set('created_id_name', $created_id_name);
		$this->set('updated_id_name', $updated_id_name);
		
		
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
		$change_div_id = $this->ChangeDiv->find('all');
		/** プルダウン用にデータを整える */
		$change_div_id = Set::Combine($change_div_id, '{n}.ChangeDiv.id', '{n}.ChangeDiv.change_div_name');

		/** 作業状況を取得する */
		$change_status_id = $this->ChangeProgress->find('all');
		/** プルダウン用にデータを整える */
		$change_status_id = Set::Combine($change_status_id, '{n}.ChangeProgress.id', '{n}.ChangeProgress.progress_name');

			/** 汎用コードを取得する */
		$general_code = $this->GeneralCode->find('all');
		/** プルダウン用にデータを整える */
		$general_code = Set::Combine($general_code, '{n}.GeneralCode.id', '{n}.GeneralCode.code_name');

		/** Viewに値を渡す */
		$this->set('change_div_id', $change_div_id);
		$this->set('change_status_id', $change_status_id);
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
		$change_div_id = $this->ChangeDiv->find('all');
		/** プルダウン用にデータを整える */
		$change_div_id = Set::Combine($change_div_id, '{n}.ChangeDiv.id', '{n}.ChangeDiv.change_div_name');

		/** 作業状況を取得する */
		$change_status_id = $this->ChangeProgress->find('all');
		/** プルダウン用にデータを整える */
		$change_status_id = Set::Combine($change_status_id, '{n}.ChangeProgress.id', '{n}.ChangeProgress.progress_name');

			/** 汎用コードを取得する */
		$general_code = $this->GeneralCode->find('all');
		/** プルダウン用にデータを整える */
		$general_code = Set::Combine($general_code, '{n}.GeneralCode.id', '{n}.GeneralCode.code_name');

		/** Viewに値を渡す */
		$this->set('change_div_id', $change_div_id);
		$this->set('change_status_id', $change_status_id);
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
			$this->Session->setFlash(__('システム変更履歴の削除が完了しました。'));
			$this->redirect(array('action' => 'index'));			
		}
		$this->flash(__('システム変更履歴の削除が失敗しました。'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
