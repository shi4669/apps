<?php
App::uses('AppController', 'Controller');
/**
 * DeviceCategories Controller
 *
 * @property DeviceCategory $DeviceCategory
 */
class DeviceCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DeviceCategory->recursive = 0;
		$this->set('deviceCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DeviceCategory->id = $id;
		if (!$this->DeviceCategory->exists()) {
			throw new NotFoundException(__('Invalid device category'));
		}
		$this->set('deviceCategory', $this->DeviceCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DeviceCategory->create();
			if ($this->DeviceCategory->save($this->request->data)) {
				$this->Session->setFlash(__('機器種別の登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));				
			} else {
				$this->Session->setFlash(__('機器種別の登録に失敗しました。'));				
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
		$this->DeviceCategory->id = $id;
		if (!$this->DeviceCategory->exists()) {
			throw new NotFoundException(__('Invalid device category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DeviceCategory->save($this->request->data)) {
				$this->Session->setFlash(__('機器種別の更新に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('機器種別の更新に失敗しました。'));				
			}
		} else {
			$this->request->data = $this->DeviceCategory->read(null, $id);
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
		$this->DeviceCategory->id = $id;
		if (!$this->DeviceCategory->exists()) {
			throw new NotFoundException(__('Invalid device category'));
		}
		if ($this->DeviceCategory->delete()) {
			$this->Session->setFlash(__('機器種別 の削除が完了しました。'));
			$this->redirect(array('action' => 'index'));			
		}
		$this->flash(__('Device category was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
