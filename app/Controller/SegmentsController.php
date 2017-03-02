<?php
App::uses('AppController', 'Controller');
/**
 * Segments Controller
 *
 * @property Segment $Segment
 */
class SegmentsController extends AppController {


 
/**
 * Module name
 *
 * @var string
 */
	public $name = 'Segments';

/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'Segment',
		'Location',
		'SegmentStatusCategory',
		'SegmentDiv',
		'SegmentOwner',
		'User',
	);


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Segment->recursive = 0;
		$this->set('segments', $this->paginate());

		/** セグメントステータス区分区分を取得する */
		$location_id = $this->Location->find('all');
		/** プルダウン用にデータを整える */
		$location_id = Set::Combine($location_id, '{n}.Location.id', '{n}.Location.location_name');
		
		/** セグメントステータス区分区分を取得する */
		$segment_status_id = $this->SegmentStatusCategory->find('all');
		/** プルダウン用にデータを整える */
		$segment_status_id = Set::Combine($segment_status_id, '{n}.SegmentStatusCategory.id', '{n}.SegmentStatusCategory.segment_status_name');

 		/** セグメントステータス区分区分を取得する */
		$segment_owner_id = $this->SegmentOwner->find('all');
		/** プルダウン用にデータを整える */
		$segment_owner_id = Set::Combine($segment_owner_id, '{n}.User.id', '{n}.User.user_full_name');

 		/** セグメントステータス区分区分を取得する */
		$segment_div_id = $this->SegmentDiv->find('all');
		/** プルダウン用にデータを整える */
		$segment_div_id = Set::Combine($segment_div_id, '{n}.SegmentDiv.id', '{n}.SegmentDiv.segment_div_name');		

		/** Viewに値を渡す */
		$this->set('location_id', $location_id);		
		$this->set('segment_status_id', $segment_status_id);
		$this->set('segment_owner_id', $segment_owner_id);
		$this->set('segment_div_id', $segment_div_id);		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Segment->id = $id;
		if (!$this->Segment->exists()) {
			throw new NotFoundException(__('Invalid segment'));
		}
		$this->set('segment', $this->Segment->read(null, $id));

		$location_id_value =  $this->Segment->data['Segment']['location_id'];
		$location_id_name = $this->Location->find(
			'all',
			Array(
				'conditions' => Array('Location.id' => $location_id_value),
				'fields' => Array('Location.location_name')
			)
		);
		
		$location_name = $location_id_name[0]['Location']['location_name'];
		

		$segment_status_id_value =  $this->Segment->data['Segment']['segment_status_id']; 
		$segment_status_id_name = $this->SegmentStatusCategory->find(
			'all',
			Array(
				'conditions' => Array('id' => $segment_status_id_value),
				'fields' => Array('SegmentStatusCategory.segment_status_name')
			)
		);
		$segment_status_name = $segment_status_id_name[0]['SegmentStatusCategory']['segment_status_name'];

		$segment_div_id_value =  $this->Segment->data['Segment']['segment_div_id']; 
		$segment_div_id_name = $this->SegmentDiv->find(
			'all',
			Array(
				'conditions' => Array('id' => $segment_div_id_value),
				'fields' => Array('SegmentDiv.segment_div_name')
			)
		);
		$segment_div_name = $segment_div_id_name[0]['SegmentDiv']['segment_div_name'];

		
		$segment_owner_id_value =  $this->Segment->data['Segment']['segment_owner_id']; 
		$segment_owner_id_name = $this->SegmentOwner->find(
			'all',
			Array(
				'conditions' => Array('id' => $segment_owner_id_value),
				'fields' => Array('SegmentOwner.user_full_name')
			)
		);
		$segment_owner_name = $segment_owner_id_name[0]['SegmentOwner']['user_full_name'];

		
		$created_id_value =  $this->Segment->data['Segment']['created_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $created_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$created_id_name = $user_full_name[0]['User']['user_full_name'];

		$updated_id_value =  $this->Segment->data['Segment']['updated_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $updated_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$updated_id_name = $user_full_name[0]['User']['user_full_name'];

		

		$this->set('segment_div_name', $segment_div_name);
		$this->set('segment_owner_name', $segment_owner_name);		
		$this->set('segment_status_name', $segment_status_name);
		$this->set('location_name', $location_name);		
		$this->set('created_id_name', $created_id_name);
		$this->set('updated_id_name', $updated_id_name);
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Segment->create();
			if ($this->Segment->save($this->request->data)) {
				$this->Session->setFlash(__('セグメントの登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));														
			} else {
				$this->Session->setFlash(__('セグメントの登録に失敗しました。'));																
			}
		}

		/** セグメントステータス区分区分を取得する */
		$location_id = $this->Location->find('all');
		/** プルダウン用にデータを整える */
		$location_id = Set::Combine($location_id, '{n}.Location.id', '{n}.Location.location_name');
				
		/** セグメントステータス区分区分を取得する */
		$segment_status_id = $this->SegmentStatusCategory->find('all');
		/** プルダウン用にデータを整える */
		$segment_status_id = Set::Combine($segment_status_id, '{n}.SegmentStatusCategory.id', '{n}.SegmentStatusCategory.segment_status_name');

 		/** セグメントステータス区分区分を取得する */
		$segment_owner_id = $this->User->find('all');
		/** プルダウン用にデータを整える */
		$segment_owner_id = Set::Combine($segment_owner_id, '{n}.User.id', '{n}.User.user_full_name');

 		/** セグメントステータス区分区分を取得する */
		$segment_div_id = $this->SegmentDiv->find('all');
		/** プルダウン用にデータを整える */
		$segment_div_id = Set::Combine($segment_div_id, '{n}.SegmentDiv.id', '{n}.SegmentDiv.segment_div_name');		

		/** Viewに値を渡す */
		$this->set('location_id', $location_id);		
		$this->set('segment_status_id', $segment_status_id);
		$this->set('segment_owner_id', $segment_owner_id);
		$this->set('segment_div_id', $segment_div_id);				

		
		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Segment->id = $id;
		if (!$this->Segment->exists()) {
			throw new NotFoundException(__('Invalid segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Segment->save($this->request->data)) {
				$this->Session->setFlash(__('セグメントの更新に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));													
			} else {
				$this->Session->setFlash(__('セグメントの更新に失敗しました。'));																				
			}
		} else {
			$this->request->data = $this->Segment->read(null, $id);
		}
		/** セグメントステータス区分区分を取得する */
		$location_id = $this->Location->find('all');
		/** プルダウン用にデータを整える */
		$location_id = Set::Combine($location_id, '{n}.Location.id', '{n}.Location.location_name');
				
		/** セグメントステータス区分区分を取得する */
		$segment_status_id = $this->SegmentStatusCategory->find('all');
		/** プルダウン用にデータを整える */
		$segment_status_id = Set::Combine($segment_status_id, '{n}.SegmentStatusCategory.id', '{n}.SegmentStatusCategory.segment_status_name');

 		/** セグメントステータス区分区分を取得する */
		$segment_owner_id = $this->User->find('all');
		/** プルダウン用にデータを整える */
		$segment_owner_id = Set::Combine($segment_owner_id, '{n}.User.id', '{n}.User.user_full_name');

 		/** セグメントステータス区分区分を取得する */
		$segment_div_id = $this->SegmentDiv->find('all');
		/** プルダウン用にデータを整える */
		$segment_div_id = Set::Combine($segment_div_id, '{n}.SegmentDiv.id', '{n}.SegmentDiv.segment_div_name');		

		/** Viewに値を渡す */
		$this->set('location_id', $location_id);		
		$this->set('segment_status_id', $segment_status_id);
		$this->set('segment_owner_id', $segment_owner_id);
		$this->set('segment_div_id', $segment_div_id);
		
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
		$this->Segment->id = $id;
		if (!$this->Segment->exists()) {
			throw new NotFoundException(__('Invalid segment'));
		}
		if ($this->Segment->delete()) {
			$this->Session->setFlash(__('セグメントの削除が完了しました。'));			
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
