<?php
App::uses('AppModel', 'Model');
/**
 * Link Model
 *
 */
class Link extends AppModel {

/**	
 *
 * @var array
 */
	public $belongsTo = array(
		'LinkCategory' => array(
			'className' => 'LinkCategory',
			'foreignKey' => 'link_category_id',
			'conditions' => '',
			'fields' => 'id, link_category_name',
			'order' => ''
		),
		'LinkMethod' => array(
			'className' => 'LinkMethod',
			'foreignKey' => 'link_methods_id',
			'conditions' => '',
			'fields' => 'id, link_method_name',
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
