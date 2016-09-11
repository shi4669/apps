<?php
App::uses('TodoCategory', 'Model');

/**
 * TodoCategory Test Case
 *
 */
class TodoCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.todo_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TodoCategory = ClassRegistry::init('TodoCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TodoCategory);

		parent::tearDown();
	}

}
