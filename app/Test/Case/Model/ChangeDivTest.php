<?php
App::uses('ChangeDiv', 'Model');

/**
 * ChangeDiv Test Case
 *
 */
class ChangeDivTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.change_div');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChangeDiv = ClassRegistry::init('ChangeDiv');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChangeDiv);

		parent::tearDown();
	}

}
