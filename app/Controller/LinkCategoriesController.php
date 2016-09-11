<?php
App::uses('AppController', 'Controller');
/**
 * LinkCategories Controller
 *
 * @property LinkCategory $LinkCategory
 */
class LinkCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->LinkCategory->recursive = 0;
		$this->set('linkCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->LinkCategory->id = $id;
		if (!$this->LinkCategory->exists()) {
			throw new NotFoundException(__('Invalid link category'));
		}
		$this->set('linkCategory', $this->LinkCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LinkCategory->create();
			if ($this->LinkCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The link category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link category could not be saved. Please, try again.'));
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
		$this->LinkCategory->id = $id;
		if (!$this->LinkCategory->exists()) {
			throw new NotFoundException(__('Invalid link category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LinkCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The link category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->LinkCategory->read(null, $id);
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
		$this->LinkCategory->id = $id;
		if (!$this->LinkCategory->exists()) {
			throw new NotFoundException(__('Invalid link category'));
		}
		if ($this->LinkCategory->delete()) {
			$this->Session->setFlash(__('Link category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Link category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
