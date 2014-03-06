<?php
App::uses('AppController', 'Controller');
/**
 * Semesters Controller
 *
 * @property Semester $Semester
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SemestersController extends AppController {

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
		$this->Semester->recursive = 0;
		$this->set('semesters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Semester->exists($id)) {
			throw new NotFoundException(__('Invalid semester'));
		}
		$options = array('conditions' => array('Semester.' . $this->Semester->primaryKey => $id));
		$this->set('semester', $this->Semester->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Semester->create();
			if ($this->Semester->save($this->request->data)) {
				$this->Session->setFlash(__('The semester has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The semester could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Semester->exists($id)) {
			throw new NotFoundException(__('Invalid semester'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Semester->save($this->request->data)) {
				$this->Session->setFlash(__('The semester has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The semester could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Semester.' . $this->Semester->primaryKey => $id));
			$this->request->data = $this->Semester->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Semester->id = $id;
		if (!$this->Semester->exists()) {
			throw new NotFoundException(__('Invalid semester'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Semester->delete()) {
			$this->Session->setFlash(__('The semester has been deleted.'));
		} else {
			$this->Session->setFlash(__('The semester could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
