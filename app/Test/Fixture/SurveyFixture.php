<?php
/**
 * SurveyFixture
 *
 */
class SurveyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'semester_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ENROLL_USERS_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_ENROLL_COURSE1_idx' => array('column' => 'course_id', 'unique' => 0),
			'fk_ENROLL_SEMESTER1_idx' => array('column' => 'semester_id', 'unique' => 0),
			'fk_surveys_groups1_idx' => array('column' => 'group_id', 'unique' => 0)
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
			'user_id' => 1,
			'course_id' => 1,
			'semester_id' => 1,
			'group_id' => 1
		),
	);

}
