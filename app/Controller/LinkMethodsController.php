<?php
App::uses('AppController', 'Controller');
/**
 * LinkMethods Controller
 *
 * @property LinkMethod $LinkMethod
 */
class LinkMethodsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->LinkMethod->recursive = 0;
		$this->set('linkMethods', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->LinkMethod->id = $id;
		if (!$this->LinkMethod->exists()) {
			throw new NotFoundException(__('Invalid link method'));
		}
		$this->set('linkMethod', $this->LinkMethod->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LinkMethod->create();
			if ($this->LinkMethod->save($this->request->data)) {
				$this->Session->setFlash(__('The link method has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link method could not be saved. Please, try again.'));
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
		$this->LinkMethod->id = $id;
		if (!$this->LinkMethod->exists()) {
			throw new NotFoundException(__('Invalid link method'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LinkMethod->save($this->request->data)) {
				$this->Session->setFlash(__('The link method has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link method could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->LinkMethod->read(null, $id);
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
		$this->LinkMethod->id = $id;
		if (!$this->LinkMethod->exists()) {
			throw new NotFoundException(__('Invalid link method'));
		}
		if ($this->LinkMethod->delete()) {
			$this->Session->setFlash(__('Link method deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Link method was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
