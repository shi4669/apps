<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Template Model
 *
 */
class Template extends AppModel {
	/**
 * belongsTo associations
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
