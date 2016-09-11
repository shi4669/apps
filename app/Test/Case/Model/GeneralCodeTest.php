<?php
App::uses('GeneralCode', 'Model');

/**
 * GeneralCode Test Case
 *
 */
class GeneralCodeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.general_code');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GeneralCode = ClassRegistry::init('GeneralCode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeneralCode);

		parent::tearDown();
	}

}
