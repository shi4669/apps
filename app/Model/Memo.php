<?php
App::uses('AppModel', 'Model');
/**
 * Memo Model
 *
 */
class Memo extends AppModel {


	public $order = array('Memo.memo_date asc');
 /* belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TaskCategory' => array(
			'className' => 'TaskCategory',
			'foreignKey' => 'task_category_id',
			'conditions' => '',
			'fields' => 'id, task_category_name',
			'order' => ''
		),
		'MemoCategory' => array(
			'className' => 'MemoCategory',
			'foreignKey' => 'memo_category_id',
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
