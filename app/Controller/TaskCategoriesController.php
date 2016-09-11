<?php
App::uses('AppController', 'Controller');
/**
 * TaskCategories Controller
 *
 * @property TaskCategory $TaskCategory
 */
class TaskCategoriesController extends AppController {


/**
 * Module name
 *
 * @var string
 */
	public $name = 'TaskCategories';

/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'TaskCategory',
		'Template',
	);
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TaskCategory->recursive = 0;
		$this->set('taskCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TaskCategory->id = $id;
		if (!$this->TaskCategory->exists()) {
			throw new NotFoundException(__('Invalid task category'));
		}
		$this->set('taskCategory', $this->TaskCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TaskCategory->create();

			if ($this->TaskCategory->save($this->request->data)) {
				$this->Session->setFlash(__('業務区分の登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('業務区分の登録に失敗しました。'));
			}
			
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TaskCategory->id = $id;
		if (!$this->TaskCategory->exists()) {
			throw new NotFoundException(__('Invalid task category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->TaskCategory->save($this->request->data)) {
				$this->Session->setFlash(__('業務区分の編集に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('業務区分の編集に失敗しました。'));
			}
			
		} else {
			$this->request->data = $this->TaskCategory->read(null, $id);
		}
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
		$this->TaskCategory->id = $id;
		if (!$this->TaskCategory->exists()) {
			throw new NotFoundException(__('Invalid task category'));
		}
		if ($this->TaskCategory->delete()) {
			$this->flash(__('Task category deleted'), array('action' => 'index'));
		}
		$this->flash(__('Task category was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
