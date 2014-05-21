<?php
App::uses('AppController', 'Controller');
/**
 * Faculties Controller
 *
 * @property Faculty $Faculty
 * @property PaginatorComponent $Paginator
 */
class FacultiesController extends AppController {

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
		$this->Faculty->recursive = 0;
		$this->set('faculties', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Faculty->exists($id)) {
			throw new NotFoundException(__('Invalid faculty'));
		}
		$options = array('conditions' => array('Faculty.' . $this->Faculty->primaryKey => $id));
		$this->set('faculty', $this->Faculty->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Faculty->create();
			if ($this->Faculty->save($this->request->data)) {
				$this->Session->setFlash(__('The faculty has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faculty could not be saved. Please, try again.'));
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
		if (!$this->Faculty->exists($id)) {
			throw new NotFoundException(__('Invalid faculty'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Faculty->save($this->request->data)) {
				$this->Session->setFlash(__('The faculty has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faculty could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Faculty.' . $this->Faculty->primaryKey => $id));
			$this->request->data = $this->Faculty->find('first', $options);
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
		$this->Faculty->id = $id;
		if (!$this->Faculty->exists()) {
			throw new NotFoundException(__('Invalid faculty'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Faculty->delete()) {
			$this->Session->setFlash(__('The faculty has been deleted.'));
		} else {
			$this->Session->setFlash(__('The faculty could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function adminListFaculty()
        {
            $facQuery = "SELECT id, name FROM faculties";
            
            $faculties = $this->Faculty->query($facQuery);
            
            $this->set(array('faculties'=> $faculties));
        }
        
        public function getFacNamebyID($facID)
        {
            $query = "SELECT name FROM faculties WHERE id = $facID";
            
            $facName = $this->Faculty->query($query);
            return $facName[0]['faculties']['name'];
        }
        
        public function getFacCodebyID($facID)
        {
            $query = "SELECT code FROM faculties WHERE id = $facID";
            
            $facCode = $this->Faculty->query($query);
            return $facCode[0]['faculties']['code'];
        }
        
        public function countFaculty()
        {
            $query = "SELECT DISTINCT COUNT(id) as facCount FROM faculties";
            
            $facCount = $this->Faculty->query($query);
            return $facCount[0][0]['facCount'];
        }
        
}
