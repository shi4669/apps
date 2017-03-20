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
				$this->Session->setFlash(__('IP種別の登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));																
			} else {
				$this->Session->setFlash(__('IP種別の登録に失敗しました。'));																
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
				$this->Session->setFlash(__('IP種別の更新に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));																				
			} else {
				$this->Session->setFlash(__('IP種別の更新に失敗しました。'));																				
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
			$this->Session->setFlash(__('IP種別 の削除が完了しました。'));
			$this->redirect(array('action' => 'index'));			
		}
		$this->flash(__('Ip div category was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
