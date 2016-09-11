<?php
App::uses('IscMemoCategory', 'Model');

/**
 * IscMemoCategory Test Case
 *
 */
class IscMemoCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.isc_memo_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->IscMemoCategory = ClassRegistry::init('IscMemoCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IscMemoCategory);

		parent::tearDown();
	}

}
