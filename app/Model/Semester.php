<?php
App::uses('AppModel', 'Model');
/**
 * Semester Model
 *
 * @property Enroll $Enroll
 */
class Semester extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Enroll' => array(
			'className' => 'Enroll',
			'foreignKey' => 'semester_id',
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
