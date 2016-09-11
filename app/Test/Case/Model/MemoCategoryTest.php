<?php
App::uses('MemoCategory', 'Model');

/**
 * MemoCategory Test Case
 *
 */
class MemoCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.memo_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MemoCategory = ClassRegistry::init('MemoCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MemoCategory);

		parent::tearDown();
	}

}
