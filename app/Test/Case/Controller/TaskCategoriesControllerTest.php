<?php
App::uses('TaskCategoriesController', 'Controller');

/**
 * TestTaskCategoriesController *
 */
class TestTaskCategoriesController extends TaskCategoriesController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * TaskCategoriesController Test Case
 *
 */
class TaskCategoriesControllerTestCase extends CakeTestCase {
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
		$this->TaskCategories = new TestTaskCategoriesController();
		$this->TaskCategories->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TaskCategories);

		parent::tearDown();
	}

}
