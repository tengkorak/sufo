<?php
App::uses('AppController', 'Controller');
/**
 * Answers2s Controller
 *
 * @property Answers2 $Answers2
 * @property PaginatorComponent $Paginator
 */
class Answers2sController extends AppController {

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
		$this->Answers2->recursive = 0;
		$this->set('answers2s', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Answers2->exists($id)) {
			throw new NotFoundException(__('Invalid answers2'));
		}
		$options = array('conditions' => array('Answers2.' . $this->Answers2->primaryKey => $id));
		$this->set('answers2', $this->Answers2->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Answers2->create();
			if ($this->Answers2->save($this->request->data)) {
				$this->Session->setFlash(__('The answers2 has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answers2 could not be saved. Please, try again.'));
			}
		}
		$surveys = $this->Answers2->Survey->find('list');
		$questions = $this->Answers2->Question->find('list');
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
		if (!$this->Answers2->exists($id)) {
			throw new NotFoundException(__('Invalid answers2'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Answers2->save($this->request->data)) {
				$this->Session->setFlash(__('The answers2 has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answers2 could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Answers2.' . $this->Answers2->primaryKey => $id));
			$this->request->data = $this->Answers2->find('first', $options);
		}
		$surveys = $this->Answers2->Survey->find('list');
		$questions = $this->Answers2->Question->find('list');
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
		$this->Answers2->id = $id;
		if (!$this->Answers2->exists()) {
			throw new NotFoundException(__('Invalid answers2'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Answers2->delete()) {
			$this->Session->setFlash(__('The answers2 has been deleted.'));
		} else {
			$this->Session->setFlash(__('The answers2 could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
