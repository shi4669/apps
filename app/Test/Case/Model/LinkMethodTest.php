<?php
App::uses('LinkMethod', 'Model');

/**
 * LinkMethod Test Case
 *
 */
class LinkMethodTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.link_method');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LinkMethod = ClassRegistry::init('LinkMethod');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LinkMethod);

		parent::tearDown();
	}

}
