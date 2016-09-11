<?php
App::uses('LinkCategory', 'Model');

/**
 * LinkCategory Test Case
 *
 */
class LinkCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.link_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LinkCategory = ClassRegistry::init('LinkCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LinkCategory);

		parent::tearDown();
	}

}
