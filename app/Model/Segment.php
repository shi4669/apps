<?php
App::uses('AppModel', 'Model');
/**
 * Segment Model
 *
 */
class Segment extends AppModel {


	public $belongsTo = array(
		'SegmentStatusCategory' => array(
			'className' => 'SegmentStatusCategory',
			'foreignKey' => 'segment_status_id',
			'conditions' => '',
			'fields' => 'id, segment_status_name',
			'order' => ''
		),
		'SegmentDiv' => array(
			'className' => 'SegmentDiv',
			'foreignKey' => 'segment_div_id',
			'conditions' => '',
			'fields' => 'id, segment_div_name',
			'order' => ''
		),
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => 'id, location_name',
			'order' => ''
		),		
		'SegmentOwner' => array(
			'className' => 'User',
			'foreignKey' => 'segment_owner_id',
			'conditions' => '',
			'fields' => 'id, user_full_name',
			'order' => ''
		),		
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'updated_id',
			'conditions' => '',
			'fields' => 'id, user_full_name',
			'order' => ''
		)		
	);	
	
	public function beforeSave() {
		if(empty($this->id)){
			$this->data[$this->alias]['created_id'] = Configure::read('logged_user_id');;
			$this->data[$this->alias]['updated_id'] = Configure::read('logged_user_id');;			
		} else {
			$this->data[$this->alias]['updated_id'] = Configure::read('logged_user_id');;			
		}

		
		return true;
	}
	

}
