<?php
App::uses('Answers2', 'Model');

/**
 * Answers2 Test Case
 *
 */
class Answers2Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.answers2',
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
		$this->Answers2 = ClassRegistry::init('Answers2');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Answers2);

		parent::tearDown();
	}

}
