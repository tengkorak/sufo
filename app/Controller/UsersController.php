<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Session');

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
        //bole pkai read je!
        $lol = $this->User->read(NULL, $id);
        //$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $lol));
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
        $this->set(compact('faculties'));
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
        $this->set(compact('faculties'));
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
                
                if($user['role'] == '2')
                {
                    $this->Redirect(array('controller' => 'Enrolls', 'action' => 'viewLectCourse', $user['id']));
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
 
    function logout() {
 
        $this->Session->destroy();
        $this->Session->setFlash('You have been logged out!');
 
        // Go home!
        $this->Redirect('/');
        exit();
    }
     
}