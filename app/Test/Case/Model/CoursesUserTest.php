<?php
App::uses('CoursesUser', 'Model');

/**
 * CoursesUser Test Case
 *
 */
class CoursesUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.courses_user',
		'app.user',
		'app.course',
		'app.program',
		'app.group',
		'app.survey'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CoursesUser = ClassRegistry::init('CoursesUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CoursesUser);

		parent::tearDown();
	}

}
