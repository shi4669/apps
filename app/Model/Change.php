<?php
App::uses('AppModel', 'Model');
/**
 * Change Model
 *
 */
class Change extends AppModel {

	/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ChangeDiv' => array(
			'className' => 'ChangeDiv',
			'foreignKey' => 'change_div_id',
			'conditions' => '',
			'fields' => 'id, change_div_name',
			'order' => ''
		),
		'ChangeProgress' => array(
			'className' => 'ChangeProgress',
			'foreignKey' => 'change_status_id',
			'conditions' => '',
			'fields' => 'id, progress_name',
			'order' => ''
		),
		'ServiceAffect' => array(
			'className' => 'GeneralCode',
			'foreignKey' => 'service_affect_id',
			'conditions' => '',
			'fields' => 'id, code_name',
			'order' => ''
		),
		'SharedDiv' => array(
			'className' => 'GeneralCode',
			'foreignKey' => 'shared_div_id',
			'conditions' => '',
			'fields' => 'id, code_name',
			'order' => ''
		),
		'ChangeDoc' => array(
			'className' => 'GeneralCode',
			'foreignKey' => 'change_doc_id',
			'conditions' => '',
			'fields' => 'id, code_name',
			'order' => ''
		),		
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'created_id',
			'conditions' => '',
			'fields' => 'id, user_full_name',
			'order' => ''
		)		
	);

	/**
 * beforeSave method
 *
 * @var string
 */
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
