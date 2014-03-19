<?php
/**
 * ScoreFixture
 *
 */
class ScoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'survey_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'secta' => array('type' => 'float', 'null' => true, 'default' => null),
		'sectb' => array('type' => 'float', 'null' => true, 'default' => null),
		'sectc' => array('type' => 'float', 'null' => true, 'default' => null),
		'sectd' => array('type' => 'float', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_SCORE_ENROLL1_idx' => array('column' => 'survey_id', 'unique' => 0)
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
			'secta' => 1,
			'sectb' => 1,
			'sectc' => 1,
			'sectd' => 1
		),
	);

}
