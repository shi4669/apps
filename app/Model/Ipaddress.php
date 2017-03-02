<?php
App::uses('AppModel', 'Model');
/**
 * Ipaddress Model
 *
 */
class Ipaddress extends AppModel {


	public $belongsTo = array(
			'Segment' => array(
			'className' => 'Segment',
			'foreignKey' => 'segment_id',
			'conditions' => '',
			'fields' => 'id, segment_name',
			'order' => ''
			),
			'DeviceCategory' => array(
			'className' => 'DeviceCategory',
			'foreignKey' => 'device_category_id',
			'conditions' => '',
			'fields' => 'id, device_name',
			'order' => ''
			),
			'IpStatusCategory' => array(
			'className' => 'IpStatusCategory',
			'foreignKey' => 'ip_status_id',
			'conditions' => '',
			'fields' => 'id, ip_status_name',
			'order' => ''
			),			
			'IpDivCategory' => array(
			'className' => 'IpDivCategory',
			'foreignKey' => 'ip_div_id',
			'conditions' => '',
			'fields' => 'id, ip_div_name',
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
