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
				$this->Session->setFlash(__('監視機器の登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));				
			} else {
				$this->Session->setFlash(__('監視機器の登録に失敗しました。'));																				
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
				$this->Session->setFlash(__('監視機器の更新に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));				
			} else {
				$this->Session->setFlash(__('監視機器の更新に失敗しました。'));				
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
			$this->Session->setFlash(__('監視機器 の削除が完了しました。'));
			$this->redirect(array('action' => 'index'));			
		}
		$this->flash(__('Monitor device category was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
