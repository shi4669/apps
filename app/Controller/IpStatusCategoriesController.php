<?php
App::uses('AppController', 'Controller');
/**
 * IpStatusCategories Controller
 *
 * @property IpStatusCategory $IpStatusCategory
 */
class IpStatusCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IpStatusCategory->recursive = 0;
		$this->set('ipStatusCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->IpStatusCategory->id = $id;
		if (!$this->IpStatusCategory->exists()) {
			throw new NotFoundException(__('Invalid ip status category'));
		}
		$this->set('ipStatusCategory', $this->IpStatusCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IpStatusCategory->create();
			if ($this->IpStatusCategory->save($this->request->data)) {
				$this->flash(__('Ipstatuscategory saved.'), array('action' => 'index'));
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
		$this->IpStatusCategory->id = $id;
		if (!$this->IpStatusCategory->exists()) {
			throw new NotFoundException(__('Invalid ip status category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->IpStatusCategory->save($this->request->data)) {
				$this->flash(__('The ip status category has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->IpStatusCategory->read(null, $id);
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
		$this->IpStatusCategory->id = $id;
		if (!$this->IpStatusCategory->exists()) {
			throw new NotFoundException(__('Invalid ip status category'));
		}
		if ($this->IpStatusCategory->delete()) {
			$this->flash(__('Ip status category deleted'), array('action' => 'index'));
		}
		$this->flash(__('Ip status category was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
