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
			'foreignKey' => 'change_div',
			'conditions' => '',
			'fields' => 'id, change_div_name',
			'order' => ''
		),
		'ChangeProgress' => array(
			'className' => 'ChangeProgress',
			'foreignKey' => 'change_status',
			'conditions' => '',
			'fields' => 'id, progress_name',
			'order' => ''
		)		
	);

}
