<?php
App::uses('AppController', 'Controller');
/**
 * Enrolls Controller
 *
 * @property Enroll $Enroll
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EnrollsController extends AppController {

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
		$this->Enroll->recursive = 0;
		$this->set('enrolls', $this->Paginator->paginate());
	}

		public function studindex()
        {
            $this->Enroll->recursive = 0;
		$this->set('enrolls', $this->Paginator->paginate());            
        }     
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Enroll->exists($id)) {
			throw new NotFoundException(__('Invalid enroll'));
		}
		$options = array('conditions' => array('Enroll.' . $this->Enroll->primaryKey => $id));
		$this->set('enroll', $this->Enroll->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enroll->create();
			if ($this->Enroll->save($this->request->data)) {
				$this->Session->setFlash(__('The enroll has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enroll could not be saved. Please, try again.'));
			}
		}
		$users = $this->Enroll->User->find('list');
		$courses = $this->Enroll->Course->find('list');
		$semesters = $this->Enroll->Semester->find('list');
		$this->set(compact('users', 'courses', 'semesters'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Enroll->exists($id)) {
			throw new NotFoundException(__('Invalid enroll'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Enroll->save($this->request->data)) {
				$this->Session->setFlash(__('The enroll has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enroll could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Enroll.' . $this->Enroll->primaryKey => $id));
			$this->request->data = $this->Enroll->find('first', $options);
		}
		$users = $this->Enroll->User->find('list');
		$courses = $this->Enroll->Course->find('list');
		$semesters = $this->Enroll->Semester->find('list');
		$this->set(compact('users', 'courses', 'semesters'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Enroll->id = $id;
		if (!$this->Enroll->exists()) {
			throw new NotFoundException(__('Invalid enroll'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Enroll->delete()) {
			$this->Session->setFlash(__('The enroll has been deleted.'));
		} else {
			$this->Session->setFlash(__('The enroll could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function viewLectCourse($id = NULL)
        {
            
        }

		   
        
 }
