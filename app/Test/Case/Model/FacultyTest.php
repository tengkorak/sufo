<?php
App::uses('Faculty', 'Model');

/**
 * Faculty Test Case
 *
 */
class FacultyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.faculty',
		'app.program',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Faculty = ClassRegistry::init('Faculty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Faculty);

		parent::tearDown();
	}

}
