<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');/**
 * IscMemos Controller
 *
 * @property IscMemo $IscMemo
 */
class IscMemosController extends AppController {


/**
 * Module name
 *
 * @var string
 */
	public $name = 'IscMemos';

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		/** ログインしていない時に許可するアクション */
		$this->Auth->autoRedirect = false;
		$this->Auth->allow('index','view');
		parent::beforeFilter();
	}	
/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'IscMemo',
		'IscMemoCategory',
		'User',
	);
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IscMemo->recursive = 0;

		$option = array();
		$searchword = array();
		$memodate_start = null;
		$memodate_end = null;
		$created_id = null;

		/** リクエストデータがある場合、ページ以外のパラメータがある場合は検索処理 */		
		if (!empty($this->data) || count($this->passedArgs) > 1) {
			
			if (!isset($this->request->data['clear'])) {

				if (isset($this->request->data['search'])) {
					$searchword = $this->request->data['IscMemo'];
					
				} else {
						/** パラメータが検索ワード */
						foreach ($this->passedArgs as $argkey => $argvalue) {
							if ($argkey != 'sort' && $argkey != 'direction' && $argkey != 'page') {
								if ($argkey != 'memodate_start' && $argkey != 'memodate_end') {
									$searchword[$argkey] = urldecode($argvalue);
								} else {
									$searchword[$argkey]['year'] = urldecode($argvalue['year']);
									$searchword[$argkey]['month'] = urldecode($argvalue['month']);
									$searchword[$argkey]['day'] = urldecode($argvalue['day']);
								}
							}
							
						}
						$this->request->data['IscMemo'] = $searchword;
				}
				/** 顧客情報の検索処理 */
				foreach ($searchword as $search_key => $search_value) {

					if ($search_key != 'page') {					
						if (isset($search_value) && $search_value != '') {

							if (strstr($search_key, '_id')) {
	
								if (strstr($search_key, 'isc_memo_category_id')) {
									$option[$search_key] = $search_value;
								}
								if (strstr($search_key, 'created_id')) {
									$created_id = $search_value;

									if ($created_id) {
										$option['IscMemo.created_id =  ? '] = array($created_id);
									}
								}
						  

							
							} elseif ( strstr($search_key,'memodate')) {
								/*日付の検索*/
								$year = strval($search_value['year']);
								$month = strval($search_value['month']);
								$day = strval($search_value['day']);							

								if (!empty($year) && !empty($month) && !empty($day)) {
									/** 日付が存在するか確認 */
									if (checkdate($month, $day, $year)) {
										if(strstr($search_key, '_start')) {
											$memodate_start = $year.'-'.$month.'-'.$day;
										} elseif(strstr($search_key, '_end')) {
											$memodate_end = $year.'-'.$month.'-'.$day;
										}
									}
								}							

								/** 開始日と終了日を検索する */
								if ($memodate_start || $memodate_end) {
									if ($memodate_start == null) {
										$memodate_start =  date('Y')-100 .'-'. date('m') .'-'. date('d');
									}
									if ($memodate_end == null) {
										$memodate_end =  date('Y')+100 .'-'. date('m') .'-'. date('d');
									}
									$option['memo_date BETWEEN ? AND ?'] = array($memodate_start, $memodate_end);
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

		$isc_memo_category_id = $this->IscMemoCategory->find('all');
		/** プルダウン用にデータを整える */
		$isc_memo_category_id = Set::Combine($isc_memo_category_id, '{n}.IscMemoCategory.id', '{n}.IscMemoCategory.memo_category_name');

		$created_id = $this->User->find('all');
		/** 11プルダウン用にデータを整える */
		$created_id = Set::Combine($created_id, '{n}.User.id', '{n}.User.user_full_name');		
		/** Viewに値を渡す */
		$this->set('isc_memo_category_id', $isc_memo_category_id);
		$this->set('created_id', $created_id);		
		$this->set('iscMemos', $this->paginate($option));
		$this->set('searchword', $searchword);
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->IscMemo->id = $id;
		if (!$this->IscMemo->exists()) {
			throw new NotFoundException(__('Invalid isc memo'));
		}
		$this->set('iscMemo', $this->IscMemo->read(null, $id));

		/** 作業区分を取得する */
		$isc_memo_category_id =  $this->IscMemo->data['IscMemo']['isc_memo_category_id']; 
		$isc_memo_category_name = $this->IscMemoCategory->find(
			'all',
			Array(
				'conditions' => Array('id' => $isc_memo_category_id),
				'fields' => Array('IscMemoCategory.memo_category_name')
			)
		);
		$isc_memo_category = $isc_memo_category_name[0]['IscMemoCategory']['memo_category_name'];


		/** 作業区分を取得する */
		$created_id_value =  $this->IscMemo->data['IscMemo']['created_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $created_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$created_id_name = $user_full_name[0]['User']['user_full_name'];

		$updated_id_value =  $this->IscMemo->data['IscMemo']['updated_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $updated_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$updated_id_name = $user_full_name[0]['User']['user_full_name'];
		
		
				/** Viewに値を渡す */
		$this->set('isc_memo_category', $isc_memo_category);
		$this->set('created_id_name', $created_id_name);
		$this->set('updated_id_name', $updated_id_name);		

		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IscMemo->create();
			if ($this->IscMemo->save($this->request->data)) {
				$this->Session->setFlash(__('情報の登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));				
			} else {
				$this->Session->setFlash(__('情報の登録に失敗しました。'));																
			}
		}
				/** 業務区分を取得する */
		$isc_memo_category_id = $this->IscMemoCategory->find('all');
		/** プルダウン用にデータを整える */
		$isc_memo_category_id = Set::Combine($isc_memo_category_id, '{n}.IscMemoCategory.id', '{n}.IscMemoCategory.memo_category_name');

				/** Viewに値を渡す */
		$this->set('isc_memo_category_id', $isc_memo_category_id);
		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->IscMemo->id = $id;
		if (!$this->IscMemo->exists()) {
			throw new NotFoundException(__('Invalid isc memo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->IscMemo->save($this->request->data)) {
				$this->Session->setFlash(__('情報の更新に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));				

			} else {
				$this->Session->setFlash(__('情報の更新に失敗しました。'));																				
			}
		} else {
			$this->request->data = $this->IscMemo->read(null, $id);
		}

				/** 業務区分を取得する */
		$isc_memo_category_id = $this->IscMemoCategory->find('all');
		/** プルダウン用にデータを整える */
		$isc_memo_category_id = Set::Combine($isc_memo_category_id, '{n}.IscMemoCategory.id', '{n}.IscMemoCategory.memo_category_name');

				/** Viewに値を渡す */
		$this->set('isc_memo_category_id', $isc_memo_category_id);		
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
		$this->IscMemo->id = $id;
		if (!$this->IscMemo->exists()) {
			throw new NotFoundException(__('Invalid isc memo'));
		}
		if ($this->IscMemo->delete()) {
			$this->flash(__('Isc memo deleted'), array('action' => 'index'));
		}
		$this->flash(__('Isc memo was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
