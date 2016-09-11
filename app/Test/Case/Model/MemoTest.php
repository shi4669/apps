<?php
App::uses('Memo', 'Model');

/**
 * Memo Test Case
 *
 */
class MemoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.memo');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Memo = ClassRegistry::init('Memo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Memo);

		parent::tearDown();
	}

}
