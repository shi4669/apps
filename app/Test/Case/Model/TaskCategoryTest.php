<?php
App::uses('TaskCategory', 'Model');

/**
 * TaskCategory Test Case
 *
 */
class TaskCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.task_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TaskCategory = ClassRegistry::init('TaskCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TaskCategory);

		parent::tearDown();
	}

}
