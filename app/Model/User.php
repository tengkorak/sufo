<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Faculty $Faculty
 * @property Enroll $Enroll
 */
class User extends AppModel {
    
    function validateLogin($data)
    {
        // Search our database where the 'username' field is equal to our form input.
        // Same with the password (this example uses PLAIN TEXT passwords, you should encrypt yours!)
        // The second parameter tells us which fields to return from the database
        // Here is the corresponding query:
        // "SELECT id, username FROM users WHERE username = 'xxx' AND password = 'yyy'"
        // 
        //print_r($data);
        echo $data['uid'];
        //$user = $this->find(array('uid' => $data['uid'], 'password' => $data['pswd']), array('uid', 'pswd'));
        $user = $this->find('all', array(
            'conditions'=> array(
                'uid'=> $data['uid'],
                'pswd'=> $data['pswd']
            )
        ));
 
        if( empty($user) == false )
        {
            $returnVal = $user['0']['User'];
        }
        else
        {
            $returnVal = false;
        }
 
        return $returnVal;
    }


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Faculty' => array(
			'className' => 'Faculty',
			'foreignKey' => 'faculty_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Enroll' => array(
			'className' => 'Enroll',
			'foreignKey' => 'user_id',
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
