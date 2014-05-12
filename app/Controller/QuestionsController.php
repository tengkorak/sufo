<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {

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
		$this->Question->recursive = 0;
		$this->set('questions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
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
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->request->data = $this->Question->find('first', $options);
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
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('The question has been deleted.'));
		} else {
			$this->Session->setFlash(__('The question could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function getQuestionDesc($id = NULL)
        {
            $qDesc = $this->Question->read(NULL, $id);
            //echo "Belom spec";
            //print_r($qDesc);
            
            if(!empty($qDesc))
            {
                $qDesc = $qDesc['Question']['ques'];
                //echo 'lol';
            }
            else
            {
                $qDesc = '';
            }
            //debug($qDesc);
            //print_r($qDesc);
            return $qDesc;
        }
        
        public function getQuestionDescBI($id = NULL)
        {
            $qDesc = $this->Question->read(NULL, $id);
            //echo "Belom spec";
            //print_r($qDesc);
            
            if(!empty($qDesc))
            {
                $qDesc = $qDesc['Question']['quesbi'];
                //echo 'lol';
            }
            else
            {
                $qDesc = '';
            }
            //debug($qDesc);
            //print_r($qDesc);
            return $qDesc;
        }
        
        public function stdViewQuestions()
        {
            $query = "SELECT id, ques
                        FROM questions";
            
            $questions = $this->Question->query($query);
            
            //print_r($questions);
            $qA1 = array();
            $qA2 = array();
            for($i = 0; $i <= 26; $i++)
            {
                if($i <= 24)
                {
                    array_push($qA1, $questions[$i]);
                }
                else
                {
                    array_push($qA2, $questions[$i]);
                }
                
            }
            
            //print_r($qA2);
            $this->set(array('qA1'=> $qA1, 'qA2'=> $qA2));
            
        }
        
}
