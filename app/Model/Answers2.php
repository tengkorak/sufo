<?php
App::uses('AppModel', 'Model');
/**
 * Answers2 Model
 *
 * @property Enroll $Enroll
 * @property Question $Question
 */
class Answers2 extends AppModel {


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
