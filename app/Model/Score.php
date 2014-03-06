<?php
App::uses('AppModel', 'Model');
/**
 * Score Model
 *
 * @property Enroll $Enroll
 */
class Score extends AppModel {


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
		)
	);
}
