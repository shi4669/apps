<?php
App::uses('AppController', 'Controller');
/**
 * IpDivCategories Controller
 *
 * @property IpDivCategory $IpDivCategory
 */
class IpDivCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IpDivCategory->recursive = 0;
		$this->set('ipDivCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->IpDivCategory->id = $id;
		if (!$this->IpDivCategory->exists()) {
			throw new NotFoundException(__('Invalid ip div category'));
		}
		$this->set('ipDivCategory', $this->IpDivCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IpDivCategory->create();
			if ($this->IpDivCategory->save($this->request->data)) {
				$this->flash(__('Ipdivcategory saved.'), array('action' => 'index'));
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
		$this->IpDivCategory->id = $id;
		if (!$this->IpDivCategory->exists()) {
			throw new NotFoundException(__('Invalid ip div category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->IpDivCategory->save($this->request->data)) {
				$this->flash(__('The ip div category has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->IpDivCategory->read(null, $id);
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
		$this->IpDivCategory->id = $id;
		if (!$this->IpDivCategory->exists()) {
			throw new NotFoundException(__('Invalid ip div category'));
		}
		if ($this->IpDivCategory->delete()) {
			$this->flash(__('Ip div category deleted'), array('action' => 'index'));
		}
		$this->flash(__('Ip div category was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
