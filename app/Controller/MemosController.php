<?php
App::uses('AppController', 'Controller');
/**
 * Memos Controller
 *
 * @property Memo $Memo
 */
class MemosController extends AppController {

/**
 * Module name
 *
 * @var string
 */
	public $name = 'Memos';

/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'Memo',
		'TaskCategory',
		'MemoCategory',		
		'User',
	);
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Memo->recursive = 0;

		$option = array();
		$searchword = array();
		$memodate_start = null;
		$memodate_end = null;
		$created_id = null;

		$login_id = $this->Auth->user('id');
		$login_username = $this->Auth->user('username');		

		if ($login_username == "admin") {
//			$this->set('links', $this->paginate());
		} else {		
			$option[' ( Memo.created_id =  ? and Memo.memo_category_id= 1 ) OR Memo.memo_category_id = 2 '] = array($login_id);

		}
		
		
		/** リクエストデータがある場合、ページ以外のパラメータがある場合は検索処理 */		
		if (!empty($this->data) || count($this->passedArgs) > 1) {
			
			if (!isset($this->request->data['clear'])) {

				if (isset($this->request->data['search'])) {
					$searchword = $this->request->data['Memo'];
					
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
						$this->request->data['Memo'] = $searchword;
				}
				/** 顧客情報の検索処理 */
				foreach ($searchword as $search_key => $search_value) {

					if ($search_key != 'page') {					
						if (isset($search_value) && $search_value != '') {

							if (strstr($search_key, '_id')) {
	
								if (strstr($search_key, 'task_category_id')) {
									$option[$search_key] = $search_value;
								}
								if (strstr($search_key, 'created_id')) {
									$created_id = $search_value;

									if ($created_id) {
										$option['Memo.created_id =  ? '] = array($created_id);
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
		

//		$this->set('memos', $this->paginate());

				/** 業務区分を取得する */
		$task_category_id = $this->TaskCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$task_category_id = Set::Combine($task_category_id, '{n}.TaskCategory.id', '{n}.TaskCategory.task_category_name');

		$created_id = $this->User->find('all');
		/** 11プルダウン用にデータを整える */
		$created_id = Set::Combine($created_id, '{n}.User.id', '{n}.User.user_full_name');		

		$memo_category_id = $this->MemoCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$memo_category_id = Set::Combine($memo_category_id, '{n}.MemoCategory.id', '{n}.MemoCategory.memo_category_name');
		
				/** Viewに値を渡す */
		$this->set('task_category_id', $task_category_id);
		$this->set('memo_category_id', $memo_category_id);		
		$this->set('created_id', $created_id);
		$this->set('memos', $this->paginate($option));
		$this->set('searchword', $searchword);
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Memo->id = $id;
		if (!$this->Memo->exists()) {
			throw new NotFoundException(__('Invalid memo'));
		}
		$this->set('memo', $this->Memo->read(null, $id));

		/** 作業区分を取得する */
		$task_category_id =  $this->Memo->data['Memo']['task_category_id']; 
		$task_category_name = $this->TaskCategory->find(
			'all',
			Array(
				'conditions' => Array('id' => $task_category_id),
				'fields' => Array('TaskCategory.task_category_name')
			)
		);
		$task_category = $task_category_name[0]['TaskCategory']['task_category_name'];

		/** 作業区分を取得する */
		$memo_category_id =  $this->Memo->data['Memo']['memo_category_id']; 
		$memo_category_name = $this->MemoCategory->find(
			'all',
			Array(
				'conditions' => Array('id' => $memo_category_id),
				'fields' => Array('MemoCategory.memo_category_name')
			)
		);
		$memo_category = $memo_category_name[0]['MemoCategory']['memo_category_name'];		


		/** 作業区分を取得する */
		$created_id_value =  $this->Memo->data['Memo']['created_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $created_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$created_id_name = $user_full_name[0]['User']['user_full_name'];

		$updated_id_value =  $this->Memo->data['Memo']['updated_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $updated_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$updated_id_name = $user_full_name[0]['User']['user_full_name'];

				/** Viewに値を渡す */
		$this->set('task_category', $task_category);
		$this->set('memo_category', $memo_category);		
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
			$this->Memo->create();
			if ($this->Memo->save($this->request->data)) {
				$this->Session->setFlash(__('メモの登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));												
			} else {
				$this->Session->setFlash(__('メモの登録に失敗しました。'));												
			}
		}

				/** 業務区分を取得する */
		$task_category_id = $this->TaskCategory->find('all');
		/** プルダウン用にデータを整える */
		$task_category_id = Set::Combine($task_category_id, '{n}.TaskCategory.id', '{n}.TaskCategory.task_category_name');

		$memo_category_id = $this->MemoCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$memo_category_id = Set::Combine($memo_category_id, '{n}.MemoCategory.id', '{n}.MemoCategory.memo_category_name');
		
				/** Viewに値を渡す */
		$this->set('memo_category_id', $memo_category_id);		
		$this->set('task_category_id', $task_category_id);
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Memo->id = $id;
		if (!$this->Memo->exists()) {
			throw new NotFoundException(__('Invalid memo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Memo->save($this->request->data)) {
				$this->Session->setFlash(__('メモの編集に成功しました。'), 'Flash/success');				
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('メモの編集に失敗しました。'));																
			}
		} else {
			$this->request->data = $this->Memo->read(null, $id);
		}
						/** 業務区分を取得する */
		$task_category_id = $this->TaskCategory->find('all');
		/** プルダウン用にデータを整える */
		$task_category_id = Set::Combine($task_category_id, '{n}.TaskCategory.id', '{n}.TaskCategory.task_category_name');

		$memo_category_id = $this->MemoCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$memo_category_id = Set::Combine($memo_category_id, '{n}.MemoCategory.id', '{n}.MemoCategory.memo_category_name');
		
				/** Viewに値を渡す */
		$this->set('task_category_id', $task_category_id);
		$this->set('memo_category_id', $memo_category_id);			
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
		$this->Memo->id = $id;
		if (!$this->Memo->exists()) {
			throw new NotFoundException(__('Invalid memo'));
		}
		if ($this->Memo->delete()) {
			$this->Session->setFlash(__('Memo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Memo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}