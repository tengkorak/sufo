<?php
App::uses('AppController', 'Controller');
App::uses('CakeNumber', 'Utility');
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
            $id = 99901;
            $query = "SELECT en.name, c.code, c.name, sem.startmonth, sem.startyear, sem.endmonth, sem.endyear, en.id, c.id, sem.id
                        FROM enrolls en, courses c, users usr, semesters sem
                        WHERE usr.id = en.user_id
                        AND c.id = en.course_id
                        AND sem.id = en.semester_id
                        AND en.user_id = '".$id."'";
            
            $datas = $this->Enroll->query($query);
            $this->set('datas', $datas);
        }
        
        public function countAns($courseID = NULL, $semID = NULL, $enName = NULL, $qNum = NULL, $ansVal = NULL)
        {
            $query = "SELECT COUNT(a1.id) as ansCount
                        FROM enrolls en, users usr, courses c, semesters sem, questions q, answers1s a1
                        WHERE usr.id = en.user_id
                        AND c.id = en.course_id
                        AND sem.id = en.semester_id
                        AND en.id = a1.enroll_id
                        AND q.id = a1.question_id
                        AND c.id = '".$courseID."'
                        AND sem.id = '".$semID."'
                        AND en.name = '".$enName."'
                        AND q.`no` = '".$qNum."'
                        AND a1.ans = '".$ansVal."'";
            
            $ansCount = $this->Enroll->query($query);
            //debug($ansCount);
            return $ansCount[0][0]['ansCount'];
        }
        
        public function viewGroupScore($enrollID = NULL, $courseID = NULL, $semID = NULL, $enName = NULL)
        {
            //$scores;
            $scoresArray = array();
            
            for($i = 1; $i <= 25; $i++)
            {   
                $totalVal1 = $this->countAns($courseID, $semID, $enName, $i, 1);
                $totalVal2 = $this->countAns($courseID, $semID, $enName, $i, 2);
                $totalVal3 = $this->countAns($courseID, $semID, $enName, $i, 3);
                $totalVal4 = $this->countAns($courseID, $semID, $enName, $i, 4);
                
                $avg = $this->averageCounter($totalVal1, $totalVal2, $totalVal3, $totalVal4);
                
                $score = array('qNum' => $i, 'totalVal1' => $totalVal1, 'totalVal2' => $totalVal2, 'totalVal3' => $totalVal3, 'totalVal4' => $totalVal4, 'average' => $avg);
                //$scoresArray = array('score', $score);
                array_push($scoresArray, $score);
            }
            
            //$scoresArray = array('score', $score);
            $this->set('scoresArray', $scoresArray);
        }
        
        public function averageCounter($tv1 = NULL, $tv2 = NULL, $tv3 = NULL, $tv4 = NULL)
        {
            $total = $tv1 + $tv2 + $tv3 + $tv4;
            if($total > 0)
            {
                $avg = (($tv1 * 1) + ($tv2 * 2) + ($tv3 * 3) + ($tv4 * 4)) / $total;
            }
            else
            {
                $avg = 0.0;
            }
            
            return CakeNumber::precision($avg, 2);
        }
        
 }
