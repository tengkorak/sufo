<?php
App::uses('Answers1', 'Model');

/**
 * Answers1 Test Case
 *
 */
class Answers1Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.answers1',
		'app.survey',
		'app.question'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Answers1 = ClassRegistry::init('Answers1');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Answers1);

		parent::tearDown();
	}

}
