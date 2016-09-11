<?php
App::uses('TodoProgress', 'Model');

/**
 * TodoProgress Test Case
 *
 */
class TodoProgressTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.todo_progress');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TodoProgress = ClassRegistry::init('TodoProgress');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TodoProgress);

		parent::tearDown();
	}

}
