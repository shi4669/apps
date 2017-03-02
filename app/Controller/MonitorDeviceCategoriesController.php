<?php
App::uses('AppController', 'Controller');
/**
 * MonitorDeviceCategories Controller
 *
 * @property MonitorDeviceCategory $MonitorDeviceCategory
 */
class MonitorDeviceCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MonitorDeviceCategory->recursive = 0;
		$this->set('monitorDeviceCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MonitorDeviceCategory->id = $id;
		if (!$this->MonitorDeviceCategory->exists()) {
			throw new NotFoundException(__('Invalid monitor device category'));
		}
		$this->set('monitorDeviceCategory', $this->MonitorDeviceCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MonitorDeviceCategory->create();
			if ($this->MonitorDeviceCategory->save($this->request->data)) {
				$this->flash(__('Monitordevicecategory saved.'), array('action' => 'index'));
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
		$this->MonitorDeviceCategory->id = $id;
		if (!$this->MonitorDeviceCategory->exists()) {
			throw new NotFoundException(__('Invalid monitor device category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MonitorDeviceCategory->save($this->request->data)) {
				$this->flash(__('The monitor device category has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->MonitorDeviceCategory->read(null, $id);
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
		$this->MonitorDeviceCategory->id = $id;
		if (!$this->MonitorDeviceCategory->exists()) {
			throw new NotFoundException(__('Invalid monitor device category'));
		}
		if ($this->MonitorDeviceCategory->delete()) {
			$this->flash(__('Monitor device category deleted'), array('action' => 'index'));
		}
		$this->flash(__('Monitor device category was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
