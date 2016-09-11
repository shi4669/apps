<?php
App::uses('AppModel', 'Model');
/**
 * IscMemo Model
 *
 */
class IscMemo extends AppModel {

   public $order = array('IscMemo.memo_date asc');

	 /* belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'IscMemoCategory' => array(
			'className' => 'IscMemoCategory',
			'foreignKey' => 'isc_memo_category_id',
			'conditions' => '',
			'fields' => 'id, memo_category_name',
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
