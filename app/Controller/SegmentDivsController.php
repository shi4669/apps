<?php
App::uses('AppController', 'Controller');
/**
 * SegmentDivs Controller
 *
 * @property SegmentDiv $SegmentDiv
 */
class SegmentDivsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SegmentDiv->recursive = 0;
		$this->set('segmentDivs', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SegmentDiv->id = $id;
		if (!$this->SegmentDiv->exists()) {
			throw new NotFoundException(__('Invalid segment div'));
		}
		$this->set('segmentDiv', $this->SegmentDiv->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SegmentDiv->create();
			if ($this->SegmentDiv->save($this->request->data)) {
				$this->flash(__('Segmentdiv saved.'), array('action' => 'index'));
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
		$this->SegmentDiv->id = $id;
		if (!$this->SegmentDiv->exists()) {
			throw new NotFoundException(__('Invalid segment div'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SegmentDiv->save($this->request->data)) {
				$this->flash(__('The segment div has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->SegmentDiv->read(null, $id);
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
		$this->SegmentDiv->id = $id;
		if (!$this->SegmentDiv->exists()) {
			throw new NotFoundException(__('Invalid segment div'));
		}
		if ($this->SegmentDiv->delete()) {
			$this->flash(__('Segment div deleted'), array('action' => 'index'));
		}
		$this->flash(__('Segment div was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
