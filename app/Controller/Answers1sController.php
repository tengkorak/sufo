<?php
App::uses('AppController', 'Controller');
/**
 * Answers1s Controller
 *
 * @property Answers1 $Answers1
 * @property PaginatorComponent $Paginator
 */
class Answers1sController extends AppController {

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
		$this->Answers1->recursive = 0;
		$this->set('answers1s', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Answers1->exists($id)) {
			throw new NotFoundException(__('Invalid answers1'));
		}
		$options = array('conditions' => array('Answers1.' . $this->Answers1->primaryKey => $id));
		$this->set('answers1', $this->Answers1->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Answers1->create();
			if ($this->Answers1->save($this->request->data)) {
				$this->Session->setFlash(__('The answers1 has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answers1 could not be saved. Please, try again.'));
			}
		}
		$surveys = $this->Answers1->Survey->find('list');
		$questions = $this->Answers1->Question->find('list');
		$this->set(compact('surveys', 'questions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Answers1->exists($id)) {
			throw new NotFoundException(__('Invalid answers1'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Answers1->save($this->request->data)) {
				$this->Session->setFlash(__('The answers1 has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answers1 could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Answers1.' . $this->Answers1->primaryKey => $id));
			$this->request->data = $this->Answers1->find('first', $options);
		}
		$surveys = $this->Answers1->Survey->find('list');
		$questions = $this->Answers1->Question->find('list');
		$this->set(compact('surveys', 'questions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Answers1->id = $id;
		if (!$this->Answers1->exists()) {
			throw new NotFoundException(__('Invalid answers1'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Answers1->delete()) {
			$this->Session->setFlash(__('The answers1 has been deleted.'));
		} else {
			$this->Session->setFlash(__('The answers1 could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
