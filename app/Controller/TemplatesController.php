<?php
App::uses('AppController', 'Controller');
/**
 * Templates Controller
 *
 * @property Template $Template
 */
class TemplatesController extends AppController {

/**
 * Module name
 *
 * @var string
 */
	public $name = 'Templates';

/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'Template',
		'TaskCategory',
		'User',
	);
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Template->recursive = 0;
		$this->set('templates', $this->paginate());

				/** 業務区分を取得する */
		$task_category_id = $this->TaskCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$task_category_id = Set::Combine($task_category_id, '{n}.TaskCategory.id', '{n}.TaskCategory.task_category_name');

		$created_id = $this->User->find('all');
		/** 11プルダウン用にデータを整える */
		$created_id = Set::Combine($created_id, '{n}.User.id', '{n}.User.user_full_name');		

				/** Viewに値を渡す */
		$this->set('task_category_id', $task_category_id);
		$this->set('created_id', $created_id);		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		$this->set('template', $this->Template->read(null, $id));

		/** 作業区分を取得する */
		$task_category_id =  $this->Template->data['Template']['task_category_id']; 
		$task_category_name = $this->TaskCategory->find(
			'all',
			Array(
				'conditions' => Array('id' => $task_category_id),
				'fields' => Array('TaskCategory.task_category_name')
			)
		);
		$task_category = $task_category_name[0]['TaskCategory']['task_category_name'];


		/** 作業区分を取得する */
		$created_id_value =  $this->Template->data['Template']['created_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $created_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$created_id_name = $user_full_name[0]['User']['user_full_name'];

		$updated_id_value =  $this->Template->data['Template']['updated_id']; 
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
			$this->Template->create();
			if ($this->Template->save($this->request->data)) {
				$this->Session->setFlash(__('メールテンプレートの登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));								
			} else {
				$this->Session->setFlash(__('メールテンプレートの登録に失敗しました。'));								
			}
		}

		/** 業務区分を取得する */
		$task_category_id = $this->TaskCategory->find('all');
		/** プルダウン用にデータを整える */
		$task_category_id = Set::Combine($task_category_id, '{n}.TaskCategory.id', '{n}.TaskCategory.task_category_name');

				/** Viewに値を渡す */
		$this->set('task_category_id', $task_category_id);
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Template->save($this->request->data)) {
				$this->Session->setFlash(__('メールテンプレートの更新に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));								
			} else {
				$this->Session->setFlash(__('メールテンプレートの更新に失敗しました。'));								
			}
		} else {
			$this->request->data = $this->Template->read(null, $id);
		}

		$task_category_id = $this->TaskCategory->find('all');
		/** 11プルダウン用にデータを整える */
		$task_category_id = Set::Combine($task_category_id, '{n}.TaskCategory.id', '{n}.TaskCategory.task_category_name');

				/** Viewに値を渡す */
		$this->set('task_category_id', $task_category_id);		
		
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
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		if ($this->Template->delete()) {
			$this->flash(__('Template deleted'), array('action' => 'index'));
		}
		$this->flash(__('Template was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
