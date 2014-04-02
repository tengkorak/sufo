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
        
        function login_form() { }
 
    function login() {
        //echo 'lol1';
        //echo $this->data['User']['uid'];
        //print_r($this->data);
        // Check if they went here after submitting the form
        // Note that all our form data is preceded by the model name ['User']
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
                    $this->redirect(array('controller' => 'CoursesUsers', 'action' => 'lectViewCourse', $user['uid']));
                }
                else if($user['role'] == '3')
                {
                    $this->redirect(array('controller' => 'Surveys', 'action' => 'studindex'));
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
        
  }
