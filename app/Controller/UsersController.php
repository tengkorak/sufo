<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Surveys');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$faculties = $this->User->Faculty->find('list');
		$courses = $this->User->Course->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('faculties', 'courses', 'groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$faculties = $this->User->Faculty->find('list');
		$courses = $this->User->Course->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('faculties', 'courses', 'groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        // Placeholder for login_form, required by CakePHP to see the login_form view
    function login_form() { }
 
    function login()
    {
        //echo 'lol1';
        //echo $this->data['User']['uid'];
        //print_r($this->data);
        if(empty($this->data['User']['uid']) == false && empty($this->data['User']['pswd']) == FALSE)
        {
            //echo 'lol2';
            // Here we validate the user by calling that method from the User model
            if(($user = $this->User->validateLogin($this->data['User'])) != false)
            {
                // Write some Session variables and redirect to our next page!
                //$this->Session->setFlash('Logged IN');
                $this->Session->write('User', $user);
                
                //echo 'lol3';
                //print_r($user);
 
                // Go to our first destination!
                //$this->Redirect(array('controller' => 'Enrolls', 'action' => 'viewLectCourse', 99901));
                if($user['role'] == '1')
                {
                    $this->redirect(array('controller'=> 'Users', 'action'=> 'adminViewAllLect'));
                }
                else if($user['role'] == '2')
                {
                    $this->Redirect(array('controller' => 'CoursesUsers', 'action' => 'lectViewCourse', $user['uid']));
                }
                else if($user['role'] == '3')
                {
                    //student redirect link
                }
                
                exit();
            }
            else
            {
                $this->Session->setFlash('Incorrect username/password!');
                $this->Redirect(array('action' => 'login_form'));
                exit();
            }
        }
    }
 
    function logout()
    {
        $this->Session->destroy();
        //$this->Session->setFlash('You have been logged out!');
        // Go home!
        $this->Redirect('/');
        exit();
    }
    
    public function adminViewAllLect()
    {
        $SurveysController = new SurveysController();
        
        $query = "SELECT usr.fname, c.code, c.name, grp.name, c.id, grp.id, sem.id
                    FROM users usr, courses c, groups grp, surveys svy, courses_users cusr, semesters sem
                    WHERE usr.id = cusr.user_id
                    AND usr.id = svy.user_id
                    AND c.id = cusr.course_id
                    AND c.id = grp.course_id
                    AND c.id = svy.course_id
                    AND grp.id = svy.group_id
                    AND sem.id = svy.semester_id
                    AND usr.role = '2'
                    ORDER BY usr.fname, c.code";
        
        $datas = $this->User->query($query);
        
        $cData =  array();
        $uiData = array();
        
        foreach($datas as $data):
            
            $courseID = $data['c']['id'];
            $grpID = $data['grp']['id'];
            $semID = $data['sem']['id'];
            
            $TotalAvgPartA = 0;
            $TotalAvgPartB = 0;
            $TotalAvgPartC = 0;
            $TotalAvgPartD = 0;

            for($i = 1; $i <= 25; $i++)
            {
                $totalVal1 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 1);
                $totalVal2 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 2);
                $totalVal3 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 3);
                $totalVal4 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 4);

                $avg = $SurveysController->averageCounter($totalVal1, $totalVal2, $totalVal3, $totalVal4);

                if($i <= 3)
                {
                    $TotalAvgPartA = $TotalAvgPartA + $avg;
                }
                else if($i <= 12)
                {
                    $TotalAvgPartB = $TotalAvgPartB + $avg;
                }
                else if($i <= 23)
                {
                    $TotalAvgPartC = $TotalAvgPartC + $avg;
                }
                else if($i <= 25)
                {
                    $TotalAvgPartD = $TotalAvgPartD + $avg;
                }
            }

            $avgPartA = $TotalAvgPartA / 3;
            $avgPartB = $TotalAvgPartB / 9;
            $avgPartC = $TotalAvgPartC / 11;
            $avgPartD = $TotalAvgPartD / 2;
            
            $avgPartA = CakeNumber::precision($avgPartA, 2);
            $avgPartB = CakeNumber::precision($avgPartB, 2);
            $avgPartC = CakeNumber::precision($avgPartC, 2);
            $avgPartD = CakeNumber::precision($avgPartD, 2);
            
            $cData = array('fName'=> $data['usr']['fname'], 
                            'cCode'=> $data['c']['code'], 
                            'cName'=> $data['c']['name'],
                            'grpName'=> $data['grp']['name'],
                            'avgPartA'=> $avgPartA,
                            'avgPartB'=> $avgPartB,
                            'avgPartC'=> $avgPartC,
                            'avgPartD'=> $avgPartD,
                            'cID'=> $data['c']['id'],
                            'grpID'=> $data['grp']['id'],
                            'semID'=> $data['sem']['id'],
                            );
            
            array_push($uiData, $cData);
            
        endforeach;
        //print_r($uiData);
        //Search parameter
        $facQuery = "SELECT id, name FROM faculties";
        
        $facDatas = $this->User->query($facQuery);
        //$facDatas = $facDatas[0];
        print_r($facDatas);
        
        //$this->set('datas', $uiData);
        $this->set(array('datas'=> $uiData, 'facDatas'=> $facDatas));
    }
    
    public function adminSearchUserResult()
    {
        $keyword = $this->request->data['keyword'];
        $srchField = $this->request->data['srchField'];
        $faculty = $this->request->data['faculty'];
        
        echo $keyword;
        echo $srchField;
        echo $faculty;
        
        $SurveysController = new SurveysController();
        
        $query = "SELECT usr.fname, c.code, c.name, grp.name, c.id, grp.id, sem.id
                    FROM users usr, courses c, groups grp, surveys svy, courses_users cusr, semesters sem
                    WHERE usr.id = cusr.user_id
                    AND usr.id = svy.user_id
                    AND c.id = cusr.course_id
                    AND c.id = grp.course_id
                    AND c.id = svy.course_id
                    AND grp.id = svy.group_id
                    AND sem.id = svy.semester_id
                    AND usr.role = '2' ";
        
        if($srchField == "userID")
        {
            $query.="AND usr.uid = '".$keyword."' ";
        }
        
        if($srchField == "fname")
        {
            $query.="AND usr.fname LIKE '%".$keyword."%' ";
        }
        
        if($faculty != "NULL")
        {
            $query.="AND usr.faculty_id = '".$faculty."' ";
        }
        
        $query.="ORDER BY usr.fname, c.code";
        
        $datas = $this->User->query($query);
        
        $cData =  array();
        $uiData = array();
        
        foreach($datas as $data):
            
            $courseID = $data['c']['id'];
            $grpID = $data['grp']['id'];
            $semID = $data['sem']['id'];
            
            $TotalAvgPartA = 0;
            $TotalAvgPartB = 0;
            $TotalAvgPartC = 0;
            $TotalAvgPartD = 0;

            for($i = 1; $i <= 25; $i++)
            {
                $totalVal1 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 1);
                $totalVal2 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 2);
                $totalVal3 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 3);
                $totalVal4 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 4);

                $avg = $SurveysController->averageCounter($totalVal1, $totalVal2, $totalVal3, $totalVal4);

                if($i <= 3)
                {
                    $TotalAvgPartA = $TotalAvgPartA + $avg;
                }
                else if($i <= 12)
                {
                    $TotalAvgPartB = $TotalAvgPartB + $avg;
                }
                else if($i <= 23)
                {
                    $TotalAvgPartC = $TotalAvgPartC + $avg;
                }
                else if($i <= 25)
                {
                    $TotalAvgPartD = $TotalAvgPartD + $avg;
                }
            }

            $avgPartA = $TotalAvgPartA / 3;
            $avgPartB = $TotalAvgPartB / 9;
            $avgPartC = $TotalAvgPartC / 11;
            $avgPartD = $TotalAvgPartD / 2;
            
            $avgPartA = CakeNumber::precision($avgPartA, 2);
            $avgPartB = CakeNumber::precision($avgPartB, 2);
            $avgPartC = CakeNumber::precision($avgPartC, 2);
            $avgPartD = CakeNumber::precision($avgPartD, 2);
            
            $cData = array('fName'=> $data['usr']['fname'], 
                            'cCode'=> $data['c']['code'], 
                            'cName'=> $data['c']['name'],
                            'grpName'=> $data['grp']['name'],
                            'avgPartA'=> $avgPartA,
                            'avgPartB'=> $avgPartB,
                            'avgPartC'=> $avgPartC,
                            'avgPartD'=> $avgPartD,
                            'cID'=> $data['c']['id'],
                            'grpID'=> $data['grp']['id'],
                            'semID'=> $data['sem']['id'],
                            );
            
            array_push($uiData, $cData);
            
        endforeach;
        
        $this->set('datas', $uiData);
    }
}
