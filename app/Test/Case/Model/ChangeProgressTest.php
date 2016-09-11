<?php
App::uses('ChangeProgress', 'Model');

/**
 * ChangeProgress Test Case
 *
 */
class ChangeProgressTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.change_progress');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChangeProgress = ClassRegistry::init('ChangeProgress');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChangeProgress);

		parent::tearDown();
	}

}
