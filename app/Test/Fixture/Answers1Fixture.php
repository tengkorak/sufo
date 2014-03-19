<?php
/**
 * Answers1Fixture
 *
 */
class Answers1Fixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'survey_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'ans' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ANSWER1_ENROLL1_idx' => array('column' => 'survey_id', 'unique' => 0),
			'fk_ANSWER1_QUESTION1_idx' => array('column' => 'question_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'survey_id' => 1,
			'question_id' => 1,
			'ans' => 1
		),
	);

}
