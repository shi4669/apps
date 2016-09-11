<?php
App::uses('AppController', 'Controller');
/**
 * IscMemoCategories Controller
 *
 * @property IscMemoCategory $IscMemoCategory
 */
class IscMemoCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IscMemoCategory->recursive = 0;
		$this->set('iscMemoCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->IscMemoCategory->id = $id;
		if (!$this->IscMemoCategory->exists()) {
			throw new NotFoundException(__('Invalid isc memo category'));
		}
		$this->set('iscMemoCategory', $this->IscMemoCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IscMemoCategory->create();
			if ($this->IscMemoCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The isc memo category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The isc memo category could not be saved. Please, try again.'));
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
		$this->IscMemoCategory->id = $id;
		if (!$this->IscMemoCategory->exists()) {
			throw new NotFoundException(__('Invalid isc memo category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->IscMemoCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The isc memo category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The isc memo category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->IscMemoCategory->read(null, $id);
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
		$this->IscMemoCategory->id = $id;
		if (!$this->IscMemoCategory->exists()) {
			throw new NotFoundException(__('Invalid isc memo category'));
		}
		if ($this->IscMemoCategory->delete()) {
			$this->Session->setFlash(__('Isc memo category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Isc memo category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
