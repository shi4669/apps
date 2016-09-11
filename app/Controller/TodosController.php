<?php
App::uses('AppController', 'Controller');
/**
 * Todos Controller
 *
 * @property Todo $Todo
 */
class TodosController extends AppController {

/**
 * Module name
 *
 * @var string
 */
	public $name = 'Todos';
	
/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'Todo',
		'TaskCategory',
		'TodoCategory',		
		'User',
		'TodoProgress',
	);

	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Todo->recursive = 0;

		$option = array();
		$searchword = array();
		$tododate_start = null;
		$tododate_end = null;
		$created_id = null;		
//		$this->set('todos', $this->paginate());

		/** リクエストデータがある場合、ページ以外のパラメータがある場合は検索処理 */		
		if (!empty($this->data) || count($this->passedArgs) > 1) {
			
			if (!isset($this->request->data['clear'])) {

				if (isset($this->request->data['search'])) {
					$searchword = $this->request->data['Todo'];
					
				} else {
						/** パラメータが検索ワード */
						foreach ($this->passedArgs as $argkey => $argvalue) {
							if ($argkey != 'sort' && $argkey != 'direction' && $argkey != 'page') {
								if ($argkey != 'todo_date_start' && $argkey != 'todo_date_end') {
									$searchword[$argkey] = urldecode($argvalue);
								} else {
									$searchword[$argkey]['year'] = urldecode($argvalue['year']);
									$searchword[$argkey]['month'] = urldecode($argvalue['month']);
									$searchword[$argkey]['day'] = urldecode($argvalue['day']);
								}
							}
							
						}
						$this->request->data['Todo'] = $searchword;
				}
				/** 顧客情報の検索処理 */
				foreach ($searchword as $search_key => $search_value) {

					if ($search_key != 'page') {					
						if (isset($search_value) && $search_value != '') {

							if (strstr($search_key, '_id')) {
	
								if (strstr($search_key, 'task_category_id')) {
									$option[$search_key] = $search_value;
								}
								if (strstr($search_key, 'todo_category_id')) {
									$option[$search_key] = $search_value;
								}
								if (strstr($search_key, 'todo_progress_id')) {
									$option[$search_key] = $search_value;
								}								
								if (strstr($search_key, 'created_id')) {
									$created_id = $search_value;

									if ($created_id) {
										$option['Todo.created_id =  ? '] = array($created_id);
									}
								}
						  

							
							} elseif ( strstr($search_key,'todo_date')) {
								/*日付の検索*/
								$year = strval($search_value['year']);
								$month = strval($search_value['month']);
								$day = strval($search_value['day']);							

								if (!empty($year) && !empty($month) && !empty($day)) {
									/** 日付が存在するか確認 */
									if (checkdate($month, $day, $year)) {
										if(strstr($search_key, '_start')) {
											$tododate_start = $year.'-'.$month.'-'.$day;
										} elseif(strstr($search_key, '_end')) {
											$tododate_end = $year.'-'.$month.'-'.$day;
										}
									}
								}							

								/** 開始日と終了日を検索する */
								if ($tododate_start || $tododate_end) {
									if ($tododate_start == null) {
										$tododate_start =  date('Y')-100 .'-'. date('m') .'-'. date('d');
									}
									if ($tododate_end == null) {
										$tododate_end =  date('Y')+100 .'-'. date('m') .'-'. date('d');
									}
									$option['todo_date BETWEEN ? AND ?'] = array($tododate_start, $tododate_end);
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

				/** 業務区分を取得する */
		$task_category_id = $this->TaskCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$task_category_id = Set::Combine($task_category_id, '{n}.TaskCategory.id', '{n}.TaskCategory.task_category_name');

		$created_id = $this->User->find('all');
		/** 11プルダウン用にデータを整える */
		$created_id = Set::Combine($created_id, '{n}.User.id', '{n}.User.user_full_name');		

				/** 業務区分を取得する */
		$todo_category_id = $this->TodoCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$todo_category_id = Set::Combine($todo_category_id, '{n}.TodoCategory.id', '{n}.TodoCategory.todo_category_name');

				/** 業務区分を取得する */
		$todo_progress_id = $this->TodoProgress->find('all');
		/** 11プルダウン用にデータを整える */
		$todo_progress_id = Set::Combine($todo_progress_id, '{n}.TodoProgress.id', '{n}.TodoProgress.progress_name');

		
				/** Viewに値を渡す */
		$this->set('task_category_id', $task_category_id);
		$this->set('todo_category_id', $todo_category_id);
		$this->set('todo_progress_id', $todo_progress_id);		
		$this->set('created_id', $created_id);

		$this->set('todos', $this->paginate($option));
		$this->set('searchword', $searchword);		
//		$this->set('memos', $this->paginate($option));
//		$this->set('searchword', $searchword);
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Todo->id = $id;
		if (!$this->Todo->exists()) {
			throw new NotFoundException(__('Invalid todo'));
		}
		$this->set('todo', $this->Todo->read(null, $id));

		/** 作業区分を取得する */
		$task_category_id =  $this->Todo->data['Todo']['task_category_id']; 
		$task_category_name = $this->TaskCategory->find(
			'all',
			Array(
				'conditions' => Array('id' => $task_category_id),
				'fields' => Array('TaskCategory.task_category_name')
			)
		);
		$task_category = $task_category_name[0]['TaskCategory']['task_category_name'];

		/** 作業区分を取得する */
		$todo_category_id =  $this->Todo->data['Todo']['todo_category_id']; 
		$todo_category_name = $this->TodoCategory->find(
			'all',
			Array(
				'conditions' => Array('id' => $task_category_id),
				'fields' => Array('TodoCategory.todo_category_name')
			)
		);
		$todo_category = $todo_category_name[0]['TodoCategory']['todo_category_name'];		

		/** 作業区分を取得する */
		$todo_progress_id =  $this->Todo->data['Todo']['todo_progress_id']; 
		$todo_progress_name = $this->TodoProgress->find(
			'all',
			Array(
				'conditions' => Array('id' => $todo_progress_id),
				'fields' => Array('TodoProgress.progress_name')
			)
		);
		$todo_progress = $todo_progress_name[0]['TodoProgress']['progress_name'];		
		
		/** 作業区分を取得する */
		$created_id_value =  $this->Todo->data['Todo']['created_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $created_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$created_id_name = $user_full_name[0]['User']['user_full_name'];

		$updated_id_value =  $this->Todo->data['Todo']['updated_id']; 
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
		$this->set('todo_category', $todo_category);
		$this->set('todo_progress', $todo_progress);				
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
			$this->Todo->create();
			if ($this->Todo->save($this->request->data)) {
				$this->Session->setFlash(__('Todoの新規登録が完了しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Todoの新規登録が失敗しました。'));
			}
		}

			/** 業務区分を取得する */
		$task_category_id = $this->TaskCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$task_category_id = Set::Combine($task_category_id, '{n}.TaskCategory.id', '{n}.TaskCategory.task_category_name');

		$created_id = $this->User->find('all');
		/** 11プルダウン用にデータを整える */
		$created_id = Set::Combine($created_id, '{n}.User.id', '{n}.User.user_full_name');		

				/** 業務区分を取得する */
		$todo_category_id = $this->TodoCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$todo_category_id = Set::Combine($todo_category_id, '{n}.TodoCategory.id', '{n}.TodoCategory.todo_category_name');

				/** 業務区分を取得する */
		$todo_progress_id = $this->TodoProgress->find('all');
		/** 11プルダウン用にデータを整える */
		$todo_progress_id = Set::Combine($todo_progress_id, '{n}.TodoProgress.id', '{n}.TodoProgress.progress_name');
				/** Viewに値を渡す */
		$this->set('task_category_id', $task_category_id);
		$this->set('todo_category_id', $todo_category_id);
		$this->set('todo_progress_id', $todo_progress_id);		
		$this->set('created_id', $created_id);
		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Todo->id = $id;
		if (!$this->Todo->exists()) {
			throw new NotFoundException(__('Invalid todo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Todo->save($this->request->data)) {
				$this->Session->setFlash(__('Todoの更新が成功しました。'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Todoの更新が失敗しました。'));
			}
		} else {
			$this->request->data = $this->Todo->read(null, $id);
		}

			/** 業務区分を取得する */
		$task_category_id = $this->TaskCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$task_category_id = Set::Combine($task_category_id, '{n}.TaskCategory.id', '{n}.TaskCategory.task_category_name');

		$created_id = $this->User->find('all');
		/** 11プルダウン用にデータを整える */
		$created_id = Set::Combine($created_id, '{n}.User.id', '{n}.User.user_full_name');		

				/** 業務区分を取得する */
		$todo_category_id = $this->TodoCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$todo_category_id = Set::Combine($todo_category_id, '{n}.TodoCategory.id', '{n}.TodoCategory.todo_category_name');

				/** 業務区分を取得する */
		$todo_progress_id = $this->TodoProgress->find('all');
		/** 11プルダウン用にデータを整える */
		$todo_progress_id = Set::Combine($todo_progress_id, '{n}.TodoProgress.id', '{n}.TodoProgress.progress_name');
				/** Viewに値を渡す */
		$this->set('task_category_id', $task_category_id);
		$this->set('todo_category_id', $todo_category_id);
		$this->set('todo_progress_id', $todo_progress_id);		
		$this->set('created_id', $created_id);

		
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
		$this->Todo->id = $id;
		if (!$this->Todo->exists()) {
			throw new NotFoundException(__('Invalid todo'));
		}
		if ($this->Todo->delete()) {
			$this->Session->setFlash(__('Todo の削除が完了しました。'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Todo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
