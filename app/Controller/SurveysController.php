<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Questions');
App::import('Controller', 'Courses');
App::import('Controller', 'Semesters');
App::import('Controller', 'Groups');

/**
 * Surveys Controller
 *
 * @property Survey $Survey
 * @property PaginatorComponent $Paginator
 */
class SurveysController extends AppController {

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
		$this->Survey->recursive = 0;
		$this->set('surveys', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Survey->exists($id)) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$options = array('conditions' => array('Survey.' . $this->Survey->primaryKey => $id));
		$this->set('survey', $this->Survey->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Survey->create();
			if ($this->Survey->save($this->request->data)) {
				$this->Session->setFlash(__('The survey has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
			}
		}
		$users = $this->Survey->User->find('list');
		$courses = $this->Survey->Course->find('list');
		$semesters = $this->Survey->Semester->find('list');
		$groups = $this->Survey->Group->find('list');
		$this->set(compact('users', 'courses', 'semesters', 'groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Survey->exists($id)) {
			throw new NotFoundException(__('Invalid survey'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Survey->save($this->request->data)) {
				$this->Session->setFlash(__('The survey has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Survey.' . $this->Survey->primaryKey => $id));
			$this->request->data = $this->Survey->find('first', $options);
		}
		$users = $this->Survey->User->find('list');
		$courses = $this->Survey->Course->find('list');
		$semesters = $this->Survey->Semester->find('list');
		$groups = $this->Survey->Group->find('list');
		$this->set(compact('users', 'courses', 'semesters', 'groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Survey->id = $id;
		if (!$this->Survey->exists()) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Survey->delete()) {
			$this->Session->setFlash(__('The survey has been deleted.'));
		} else {
			$this->Session->setFlash(__('The survey could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function lectViewCourseGroup($cCode = NULL)
        {
            $query = "SELECT DISTINCT grp.name, sem.startmonth, sem.startyear, sem.endmonth, sem.endyear, grp.id, sem.id, c.id, c.code, c.name
                        FROM surveys svy, semesters sem, courses c, groups grp
                        WHERE sem.id = svy.semester_id
                        AND c.id = svy.course_id
                        AND c.id = grp.course_id
                        AND c.code = '".$cCode."'
                        ORDER BY grp.name";
            
            $datas = $this->Survey->query($query);
            print_r($datas);
            $this->set('datas', $datas);
        }
        
        public function countAns($courseID = NULL, $grpID = NULL, $semID = NULL, $qNum = NULL, $ansVal = NULL)
        {
            $query = "SELECT COUNT(a1.id) as ansCount
                        FROM surveys svy, courses c, groups grp, semesters sem, answers1s a1, questions q
                        WHERE sem.id = svy.semester_id
                        AND c.id = svy.course_id
                        AND c.id = grp.course_id
                        AND svy.id = a1.survey_id
                        AND q.id = a1.question_id
                        AND grp.id = svy.group_id
                        AND c.id = '".$courseID."'
                        AND grp.id = '".$grpID."'
                        AND sem.id = '".$semID."'
                        AND q.id = '".$qNum."'
                        AND a1.ans = '".$ansVal."'";
            
            $datas = $this->Survey->query($query);
            return $datas[0][0]['ansCount'];
        }


        public function lectViewGroupScore($courseID = NULL, $grpID = NULL, $semID = NULL)
        {
            $scoresArray = array();
            $otherInfo = array();
            $QuestionController = new QuestionsController();
            $CoursesController = new CoursesController();
            $GroupController =  new GroupsController();
            $SemesterController = new SemestersController();
            
            $TotalAvgPartA = 0;
            $TotalAvgPartB = 0;
            $TotalAvgPartC = 0;
            $TotalAvgPartD = 0;
            
            $cCodeName = $CoursesController->getCourseCodeName($courseID);
            $gName = $GroupController->getGroupName($grpID);
            $semFName = $SemesterController->getFullSemName($semID);
            
            $otherInfo = array('cCodeName'=> $cCodeName, 'gName'=> $gName, 'semFName'=> $semFName);
            
            for($i = 1; $i <= 25; $i++)
            {   
                $totalVal1 = $this->countAns($courseID, $grpID, $semID, $i, 1);
                $totalVal2 = $this->countAns($courseID, $grpID, $semID, $i, 2);
                $totalVal3 = $this->countAns($courseID, $grpID, $semID, $i, 3);
                $totalVal4 = $this->countAns($courseID, $grpID, $semID, $i, 4);
                
                $avg = $this->averageCounter($totalVal1, $totalVal2, $totalVal3, $totalVal4);
                $qDesc = $QuestionController->getQuestionDesc($i);
                //echo $qDesc;
                $score = array('qNum' => $i, 'qDesc' => $qDesc, 'totalVal1' => $totalVal1, 'totalVal2' => $totalVal2, 'totalVal3' => $totalVal3, 'totalVal4' => $totalVal4, 'average' => $avg);
                //$scoresArray = array('score', $score);
                array_push($scoresArray, $score);
                
                if($i <= 3)
                {
                    $TotalAvgPartA = $TotalAvgPartA + $avg;
                }
                else if($i <= 12)
                {
                    $TotalAvgPartB = $TotalAvgPartB + $avg;
                }
                else if($i <= 23)
                {
                    $TotalAvgPartC = $TotalAvgPartC + $avg;
                }
                else if($i <= 25)
                {
                    $TotalAvgPartD = $TotalAvgPartD + $avg;
                }
            }
            
            $avgPartA = $TotalAvgPartA / 3;
            $avgPartB = $TotalAvgPartB / 9;
            $avgPartC = $TotalAvgPartC / 11;
            $avgPartD = $TotalAvgPartD / 2;
            
            $avgPartA = CakeNumber::precision($avgPartA, 2);
            $avgPartB = CakeNumber::precision($avgPartB, 2);
            $avgPartC = CakeNumber::precision($avgPartC, 2);
            $avgPartD = CakeNumber::precision($avgPartD, 2);
            
            $averagePart = array('avgPartA'=>$avgPartA, 'avgPartB'=>$avgPartB, 'avgPartC'=>$avgPartC, 'avgPartD'=>$avgPartD);
            
            $this->set(array('otherInfo'=> $otherInfo, 'scoresArray'=> $scoresArray, 'averagePart'=> $averagePart));
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
                $avg = 0.00;
            }
            
            return CakeNumber::precision($avg, 2);
        }
        
        public function submitSurvey()
        {
            print_r($this->request->data);
        }
                
}
