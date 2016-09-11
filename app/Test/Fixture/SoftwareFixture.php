<?php
/**
 * SoftwareFixture
 *
 */
class SoftwareFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'loaded' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'host_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'software_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'version' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'maker' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'input_div' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'loaded' => '2016-05-04 18:37:16',
			'host_name' => 'Lorem ipsum dolor sit amet',
			'software_name' => 'Lorem ipsum dolor sit amet',
			'version' => 'Lorem ipsum dolor sit amet',
			'maker' => 'Lorem ipsum dolor sit amet',
			'input_div' => '',
			'created_id' => 'Lorem ipsum dolor sit amet',
			'updated_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-05-04 18:37:16',
			'modified' => '2016-05-04 18:37:16'
		),
	);
}
