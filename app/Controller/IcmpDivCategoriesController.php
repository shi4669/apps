<?php
App::uses('AppController', 'Controller');
/**
 * IcmpDivCategories Controller
 *
 * @property IcmpDivCategory $IcmpDivCategory
 */
class IcmpDivCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IcmpDivCategory->recursive = 0;
		$this->set('icmpDivCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->IcmpDivCategory->id = $id;
		if (!$this->IcmpDivCategory->exists()) {
			throw new NotFoundException(__('Invalid icmp div category'));
		}
		$this->set('icmpDivCategory', $this->IcmpDivCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IcmpDivCategory->create();
			if ($this->IcmpDivCategory->save($this->request->data)) {
				$this->flash(__('Icmpdivcategory saved.'), array('action' => 'index'));
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
		$this->IcmpDivCategory->id = $id;
		if (!$this->IcmpDivCategory->exists()) {
			throw new NotFoundException(__('Invalid icmp div category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->IcmpDivCategory->save($this->request->data)) {
				$this->flash(__('The icmp div category has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->IcmpDivCategory->read(null, $id);
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
		$this->IcmpDivCategory->id = $id;
		if (!$this->IcmpDivCategory->exists()) {
			throw new NotFoundException(__('Invalid icmp div category'));
		}
		if ($this->IcmpDivCategory->delete()) {
			$this->flash(__('Icmp div category deleted'), array('action' => 'index'));
		}
		$this->flash(__('Icmp div category was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
