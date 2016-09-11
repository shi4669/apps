<?php
App::uses('AppController', 'Controller');
/**
 * TodoCategories Controller
 *
 * @property TodoCategory $TodoCategory
 */
class TodoCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TodoCategory->recursive = 0;
		$this->set('todoCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TodoCategory->id = $id;
		if (!$this->TodoCategory->exists()) {
			throw new NotFoundException(__('Invalid todo category'));
		}
		$this->set('todoCategory', $this->TodoCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TodoCategory->create();
			if ($this->TodoCategory->save($this->request->data)) {
				$this->flash(__('Todocategory saved.'), array('action' => 'index'));
			} else {
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
		$this->TodoCategory->id = $id;
		if (!$this->TodoCategory->exists()) {
			throw new NotFoundException(__('Invalid todo category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TodoCategory->save($this->request->data)) {
				$this->flash(__('The todo category has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->TodoCategory->read(null, $id);
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
		$this->TodoCategory->id = $id;
		if (!$this->TodoCategory->exists()) {
			throw new NotFoundException(__('Invalid todo category'));
		}
		if ($this->TodoCategory->delete()) {
			$this->flash(__('Todo category deleted'), array('action' => 'index'));
		}
		$this->flash(__('Todo category was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
