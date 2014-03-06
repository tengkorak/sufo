<?php
App::uses('AppModel', 'Model');
/**
 * Answers1 Model
 *
 * @property Enroll $Enroll
 * @property Question $Question
 */
class Answers1 extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ans';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Enroll' => array(
			'className' => 'Enroll',
			'foreignKey' => 'enroll_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
