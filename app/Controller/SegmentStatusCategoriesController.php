<?php
App::uses('AppController', 'Controller');
/**
 * SegmentStatusCategories Controller
 *
 * @property SegmentStatusCategory $SegmentStatusCategory
 */
class SegmentStatusCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SegmentStatusCategory->recursive = 0;
		$this->set('segmentStatusCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SegmentStatusCategory->id = $id;
		if (!$this->SegmentStatusCategory->exists()) {
			throw new NotFoundException(__('Invalid segment status category'));
		}
		$this->set('segmentStatusCategory', $this->SegmentStatusCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SegmentStatusCategory->create();
			if ($this->SegmentStatusCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The segment status category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The segment status category could not be saved. Please, try again.'));
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
		$this->SegmentStatusCategory->id = $id;
		if (!$this->SegmentStatusCategory->exists()) {
			throw new NotFoundException(__('Invalid segment status category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SegmentStatusCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The segment status category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The segment status category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SegmentStatusCategory->read(null, $id);
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
		$this->SegmentStatusCategory->id = $id;
		if (!$this->SegmentStatusCategory->exists()) {
			throw new NotFoundException(__('Invalid segment status category'));
		}
		if ($this->SegmentStatusCategory->delete()) {
			$this->Session->setFlash(__('Segment status category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Segment status category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
