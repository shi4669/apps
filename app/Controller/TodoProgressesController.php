<?php
App::uses('AppController', 'Controller');
/**
 * TodoProgresses Controller
 *
 * @property TodoProgress $TodoProgress
 */
class TodoProgressesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TodoProgress->recursive = 0;
		$this->set('todoProgresses', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TodoProgress->id = $id;
		if (!$this->TodoProgress->exists()) {
			throw new NotFoundException(__('Invalid todo progress'));
		}
		$this->set('todoProgress', $this->TodoProgress->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TodoProgress->create();
			if ($this->TodoProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The todo progress has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The todo progress could not be saved. Please, try again.'));
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
		$this->TodoProgress->id = $id;
		if (!$this->TodoProgress->exists()) {
			throw new NotFoundException(__('Invalid todo progress'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TodoProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The todo progress has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The todo progress could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TodoProgress->read(null, $id);
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
		$this->TodoProgress->id = $id;
		if (!$this->TodoProgress->exists()) {
			throw new NotFoundException(__('Invalid todo progress'));
		}
		if ($this->TodoProgress->delete()) {
			$this->Session->setFlash(__('Todo progress deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Todo progress was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
