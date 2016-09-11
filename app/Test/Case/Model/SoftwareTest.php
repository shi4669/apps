<?php
App::uses('Software', 'Model');

/**
 * Software Test Case
 *
 */
class SoftwareTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.software');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Software = ClassRegistry::init('Software');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Software);

		parent::tearDown();
	}

}
