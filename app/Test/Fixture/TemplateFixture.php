<?php
/**
 * TemplateFixture
 *
 */
class TemplateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'templates_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'task_category_id' => array('type' => 'string', 'null' => true, 'default' => '1', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'subject' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'destination' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mail_templates' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'situation' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'usages' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tag' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'history' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'templates_name' => 'Lorem ipsum dolor sit amet',
			'task_category_id' => '',
			'subject' => 'Lorem ipsum dolor sit amet',
			'destination' => 'Lorem ipsum dolor sit amet',
			'mail_templates' => 'Lorem ipsum dolor sit amet',
			'situation' => 'Lorem ipsum dolor sit amet',
			'usages' => 'Lorem ipsum dolor sit amet',
			'tag' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'history' => 'Lorem ipsum dolor sit amet',
			'created_id' => 'Lorem ipsum dolor sit amet',
			'updated_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-06-05 14:52:10',
			'modified' => '2016-06-05 14:52:10'
		),
	);
}
