<?php
App::uses('AppModel', 'Model');
/**
 * Question Model
 *
 * @property Answers1 $Answers1
 * @property Answers2 $Answers2
 */
class Question extends AppModel {

var $name = 'Question';
var $validate = array(
	'survey' => array(
		'survey_must_not_be_blank'=>array(
		'rule' => 'notEmpty',
		'message' =>'There is/are unanswered question(s)' 
		) 
	  )
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Answers1' => array(
			'className' => 'Answers1',
			'foreignKey' => 'question_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Answers2' => array(
			'className' => 'Answers2',
			'foreignKey' => 'question_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
