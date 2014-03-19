<?php
App::uses('Survey', 'Model');

/**
 * Survey Test Case
 *
 */
class SurveyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.survey',
		'app.user',
		'app.course',
		'app.program',
		'app.faculty',
		'app.group',
		'app.groups_user',
		'app.courses_user',
		'app.semester',
		'app.answers1',
		'app.question',
		'app.answers2',
		'app.score'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Survey = ClassRegistry::init('Survey');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Survey);

		parent::tearDown();
	}

}
