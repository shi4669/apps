<?php
App::uses('AppController', 'Controller');
/**
 * MemoCategories Controller
 *
 * @property MemoCategory $MemoCategory
 */
class MemoCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MemoCategory->recursive = 0;
		$this->set('memoCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MemoCategory->id = $id;
		if (!$this->MemoCategory->exists()) {
			throw new NotFoundException(__('Invalid memo category'));
		}
		$this->set('memoCategory', $this->MemoCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MemoCategory->create();
			if ($this->MemoCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The memo category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The memo category could not be saved. Please, try again.'));
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
		$this->MemoCategory->id = $id;
		if (!$this->MemoCategory->exists()) {
			throw new NotFoundException(__('Invalid memo category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MemoCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The memo category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The memo category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MemoCategory->read(null, $id);
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
		$this->MemoCategory->id = $id;
		if (!$this->MemoCategory->exists()) {
			throw new NotFoundException(__('Invalid memo category'));
		}
		if ($this->MemoCategory->delete()) {
			$this->Session->setFlash(__('Memo category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Memo category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
