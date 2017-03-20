<?php
App::uses('AppModel', 'Model');
/**
 * Todo Model
 *
 */
class Todo extends AppModel {

	public $order = array('Todo.task_category_id,Todo.todo_date asc');

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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'created_id',
			'conditions' => '',
			'fields' => 'id, user_full_name',
			'order' => ''
		),
		'TodoCategory' => array(
			'className' => 'TodoCategory',
			'foreignKey' => 'todo_category_id',
			'conditions' => '',
			'fields' => 'id, todo_category_name',
			'order' => ''
		),
		'TodoProgress' => array(
			'className' => 'TodoProgress',
			'foreignKey' => 'todo_progress_id',
			'conditions' => '',
			'fields' => 'id, progress_name',
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
