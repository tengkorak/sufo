<?php
/**
 * Answers2Fixture
 *
 */
class Answers2Fixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'survey_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'ans' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ANSWER2_ENROLL1_idx' => array('column' => 'survey_id', 'unique' => 0),
			'fk_ANSWER2_QUESTION1_idx' => array('column' => 'question_id', 'unique' => 0)
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
			'ans' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
