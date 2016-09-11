<?php
App::uses('IscMemo', 'Model');

/**
 * IscMemo Test Case
 *
 */
class IscMemoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.isc_memo');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->IscMemo = ClassRegistry::init('IscMemo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IscMemo);

		parent::tearDown();
	}

}
