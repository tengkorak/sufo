<?php
App::uses('AppController', 'Controller');
/**
 * Programs Controller
 *
 * @property Program $Program
 * @property PaginatorComponent $Paginator
 */
class ProgramsController extends AppController {

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
		$this->Program->recursive = 0;
		$this->set('programs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Program->exists($id)) {
			throw new NotFoundException(__('Invalid program'));
		}
		$options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
		$this->set('program', $this->Program->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Program->create();
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The program has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program could not be saved. Please, try again.'));
			}
		}
		$faculties = $this->Program->Faculty->find('list');
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
		if (!$this->Program->exists($id)) {
			throw new NotFoundException(__('Invalid program'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The program has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
			$this->request->data = $this->Program->find('first', $options);
		}
		$faculties = $this->Program->Faculty->find('list');
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
		$this->Program->id = $id;
		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Invalid program'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Program->delete()) {
			$this->Session->setFlash(__('The program has been deleted.'));
		} else {
			$this->Session->setFlash(__('The program could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function countProgram()
        {
            $query = "SELECT DISTINCT COUNT(id) as prgrmCount FROM programs";
            
            $prgrmCount = $this->Program->query($query);
            return $prgrmCount[0][0]['prgrmCount'];
        }
        
        public function getProgramNamebyID($prgID)
        {
            $query = "SELECT name FROM programs WHERE id = $prgID";
            
            $prgrmName = $this->Program->query($query);
            return $prgrmName[0]['programs']['name'];
        }
        
        public function getProgramCodebyID($prgID)
        {
            $query = "SELECT code FROM programs WHERE id = $prgID";
            
            $prgrmCode = $this->Program->query($query);
            return $prgrmCode[0]['programs']['code'];
        }
        
}
