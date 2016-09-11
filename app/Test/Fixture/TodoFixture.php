<?php
/**
 * TodoFixture
 *
 */
class TodoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'todo_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'todo_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'task_category_id' => array('type' => 'string', 'null' => true, 'default' => '1', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'todo_category_id' => array('type' => 'string', 'null' => true, 'default' => '1', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'todo_progress_id' => array('type' => 'string', 'null' => true, 'default' => '1', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tag' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'memo2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'updated_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'todo_title' => 'Lorem ipsum dolor sit amet',
			'todo_date' => '2016-06-23 19:10:17',
			'task_category_id' => '',
			'todo_category_id' => '',
			'todo_progress_id' => '',
			'tag' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'memo2' => 'Lorem ipsum dolor sit amet',
			'created_id' => 'Lorem ipsum dolor sit amet',
			'updated_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-06-23 19:10:17',
			'modified' => '2016-06-23 19:10:17'
		),
	);
}
