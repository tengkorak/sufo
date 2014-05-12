<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Questions');
App::import('Controller', 'Courses');
App::import('Controller', 'Semesters');
App::import('Controller', 'Groups');
App::import('Controller', 'Users');
App::import('Controller', 'Campuses');
App::import('Controller', 'Faculties');

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
            //print_r($datas);
            
            $uiData = array();
            $TotalAvgPartA = 0;
            $TotalAvgPartB = 0;
            $TotalAvgPartC = 0;
            $TotalAvgPartD = 0;
            
            for($i = 0; $i < count($datas); $i++)
            {   
                $TotalAvgPartA = 0.0;
                $TotalAvgPartB = 0.0;
                $TotalAvgPartC = 0.0;
                $TotalAvgPartD = 0.0;
                
                for($j = 1; $j <= 25; $j++)
                {
                    $totalVal1 = $this->countAns($datas[$i]['c']['id'], $datas[$i]['grp']['id'], $datas[$i]['sem']['id'], $j, 1);
                    $totalVal2 = $this->countAns($datas[$i]['c']['id'], $datas[$i]['grp']['id'], $datas[$i]['sem']['id'], $j, 2);
                    $totalVal3 = $this->countAns($datas[$i]['c']['id'], $datas[$i]['grp']['id'], $datas[$i]['sem']['id'], $j, 3);
                    $totalVal4 = $this->countAns($datas[$i]['c']['id'], $datas[$i]['grp']['id'], $datas[$i]['sem']['id'], $j, 4);

                    $avg = $this->averageCounter($totalVal1, $totalVal2, $totalVal3, $totalVal4);

                    if($j <= 3)
                    {
                        $TotalAvgPartA = $TotalAvgPartA + $avg;
                    }
                    else if($j <= 12)
                    {
                        $TotalAvgPartB = $TotalAvgPartB + $avg;
                    }
                    else if($j <= 23)
                    {
                        $TotalAvgPartC = $TotalAvgPartC + $avg;
                    }
                    else if($j <= 25)
                    {
                        $TotalAvgPartD = $TotalAvgPartD + $avg;
                    }

                    $avgPartA = $TotalAvgPartA / 3;
                    $avgPartB = $TotalAvgPartB / 9;
                    $avgPartC = $TotalAvgPartC / 11;
                    $avgPartD = $TotalAvgPartD / 2;

                    $avgPartA = CakeNumber::precision($avgPartA, 2);
                    $avgPartB = CakeNumber::precision($avgPartB, 2);
                    $avgPartC = CakeNumber::precision($avgPartC, 2);
                    $avgPartD = CakeNumber::precision($avgPartD, 2);
                }
                
                $viewData = array('grpName'=>$datas[$i]['grp']['name'],
                                    'semStartMon'=> $datas[$i]['sem']['startmonth'],
                                    'semStartYear'=> $datas[$i]['sem']['startyear'],
                                    'semEndMon'=> $datas[$i]['sem']['endmonth'],
                                    'semEndYear'=> $datas[$i]['sem']['endyear'],
                                    'avgPartA'=> $avgPartA,
                                    'avgPartB'=> $avgPartB,
                                    'avgPartC'=> $avgPartC,
                                    'avgPartD'=> $avgPartD,
                                    'cID'=> $datas[$i]['c']['id'],
                                    'grpID'=> $datas[$i]['grp']['id'],
                                    'semID'=> $datas[$i]['sem']['id']
                                );
                
                array_push($uiData, $viewData);
            }
            
            $this->set(array('uiData'=> $uiData, 'datas'=> $datas));
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
        
        public function countAnsv2($cat, $camFacID, $semID, $qNum, $ansVal)
        {
            if($cat == "campus")
            {
                $query = "SELECT COUNT(a1.id) as ansCount
                        FROM users usr, campuses camp, surveys svy, answers1s a1, semesters sem
                        WHERE usr.id = svy.user_id
                        AND camp.id = usr.campus_id
                        AND svy.id = a1.survey_id
                        AND sem.id = svy.semester_id
                        AND usr.campus_id = $camFacID
                        AND sem.id = $semID
                        AND a1.question_id = $qNum
                        AND a1.ans = $ansVal";
            }
            
            if($cat == "faculty")
            {
                $query = "SELECT COUNT(a1.id) as ansCount
                        FROM users usr, faculties fac, surveys svy, answers1s a1, semesters sem
                        WHERE usr.id = svy.user_id
                        AND fac.id = usr.faculty_id
                        AND svy.id = a1.survey_id
                        AND sem.id = svy.semester_id
                        AND usr.faculty_id = $camFacID
                        AND sem.id = $semID
                        AND a1.question_id = $qNum
                        AND a1.ans = $ansVal";
            }
            
            $result = $this->Survey->query($query);
            return $result[0][0]['ansCount'];
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
                $qDescBI = $QuestionController->getQuestionDescBI($i);
                //echo $qDesc;
                
                $score = array('qNum' => $i, 'qDesc' => $qDesc, 'qDescBI'=> $qDescBI, 'totalVal1' => $totalVal1, 'totalVal2' => $totalVal2, 'totalVal3' => $totalVal3, 'totalVal4' => $totalVal4, 'average' => $avg);
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
        
        public function adminViewGroupScore($courseID = NULL, $grpID = NULL, $semID = NULL)
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
                $qDescBI = $QuestionController->getQuestionDescBI($i);
                //echo $qDesc;
                
                $score = array('qNum' => $i, 'qDesc' => $qDesc, 'qDescBI'=> $qDescBI, 'totalVal1' => $totalVal1, 'totalVal2' => $totalVal2, 'totalVal3' => $totalVal3, 'totalVal4' => $totalVal4, 'average' => $avg);
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
        
        public function adminIndex()
        {
            $this->set(NULL);
        }
        
        public function adminSearch()
        {
            $facQuery = "SELECT id, name FROM faculties";
            $facDatas = $this->Survey->query($facQuery);
            
            if($this->request->data == NULL)
            {
                $uiData = NULL;
            }
            else if($this->request->data != NULL)
            {
                $uiData = NULL;
                
                $keyword = $this->request->data['keyword'];
                $srchField = $this->request->data['srchField'];
                $faculty = $this->request->data['faculty'];

                $SurveysController = new SurveysController();

                $query = "SELECT usr.fname, c.code, c.name, grp.name, c.id, grp.id, sem.id
                            FROM users usr, courses c, groups grp, surveys svy, courses_users cusr, semesters sem
                            WHERE usr.id = cusr.user_id
                            AND usr.id = svy.user_id
                            AND c.id = cusr.course_id
                            AND c.id = grp.course_id
                            AND c.id = svy.course_id
                            AND grp.id = svy.group_id
                            AND sem.id = svy.semester_id
                            AND usr.role = '2' ";

                if($srchField == "userID")
                {
                    $query.="AND usr.uid = '".$keyword."' ";
                }

                if($srchField == "fname")
                {
                    $query.="AND usr.fname LIKE '%".$keyword."%' ";
                }

                if($faculty != "NULL")
                {
                    $query.="AND usr.faculty_id = '".$faculty."' ";
                }

                $query.="ORDER BY usr.fname, c.code";
                
                if($keyword == NULL && $srchField == "NULL" && $faculty == "NULL")
                {
                    $query.=" limit 20";
                }
                
                $datas = $this->Survey->query($query);

                $cData =  array();
                $uiData = array();

                foreach($datas as $data):

                    $courseID = $data['c']['id'];
                    $grpID = $data['grp']['id'];
                    $semID = $data['sem']['id'];

                    $TotalAvgPartA = 0;
                    $TotalAvgPartB = 0;
                    $TotalAvgPartC = 0;
                    $TotalAvgPartD = 0;

                    for($i = 1; $i <= 25; $i++)
                    {
                        $totalVal1 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 1);
                        $totalVal2 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 2);
                        $totalVal3 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 3);
                        $totalVal4 = $SurveysController->countAns($courseID, $grpID, $semID, $i, 4);

                        $avg = $SurveysController->averageCounter($totalVal1, $totalVal2, $totalVal3, $totalVal4);

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
                    $overallAvg = ($avgPartA + $avgPartB + $avgPartC + $avgPartD) / 4;

                    $avgPartA = CakeNumber::precision($avgPartA, 2);
                    $avgPartB = CakeNumber::precision($avgPartB, 2);
                    $avgPartC = CakeNumber::precision($avgPartC, 2);
                    $avgPartD = CakeNumber::precision($avgPartD, 2);
                    $overallAvg = CakeNumber::precision($overallAvg, 2);

                    $cData = array('fName'=> $data['usr']['fname'], 
                                    'cCode'=> $data['c']['code'], 
                                    'cName'=> $data['c']['name'],
                                    'grpName'=> $data['grp']['name'],
                                    'avgPartA'=> $avgPartA,
                                    'avgPartB'=> $avgPartB,
                                    'avgPartC'=> $avgPartC,
                                    'avgPartD'=> $avgPartD,
                                    'overallAvg'=> $overallAvg,
                                    'cID'=> $data['c']['id'],
                                    'grpID'=> $data['grp']['id'],
                                    'semID'=> $data['sem']['id'],
                                    );

                    array_push($uiData, $cData);

                endforeach;

            }
            $this->set(array('datas'=> $uiData, 'facDatas'=> $facDatas));
        }
        
        public function adminViewStatCampFac()
        {
            $semQuery = "SELECT id, startmonth, startyear, endmonth, endyear FROM semesters";
            $semDatas = $this->Survey->query($semQuery);
            
            if($this->request->data == NULL)
            {
                $uiData = NULL;
            }
            else if($this->request->data != NULL)
            {
                $uiData = NULL;
                
                $semID = $this->request->data['semester'];
                //echo $semID;
                
            }
            
            $this->set(array('datas'=> $uiData, 'semDatas'=> $semDatas));
            
        }
        
        public function lectIndex()
        {
            
        }
        
        public function adminViewStatSection()
        {
            $semQuery = "SELECT id, startmonth, startyear, endmonth, endyear FROM semesters";
            $semDatas = $this->Survey->query($semQuery);
            
            if($this->request->data == NULL)
            {
                $uiData = NULL;
            }
            else if($this->request->data != NULL)
            {
                $uiData = NULL;
                $semID = $this->request->data['semester'];
                $ctgry = $this->request->data['category'];
                $SurveysController = new SurveysController();
                $CampusController = new CampusesController();
                $FacultyController = new FacultiesController();
                //echo $semID;
                
                if($ctgry == "campus")
                {
                    $query = "SELECT id, name, code FROM campuses";
                    $campuses = $this->Survey->query($query);
                    //print_r($campuses);
                    $uiData = array();
                    foreach($campuses as $campus):
                        $datas = NULL;
                        $scoreData = $SurveysController->getCamFacScoreSection($ctgry, $semID, $campus['campuses']['id']);
                        
                        $campusName = $CampusController->getCampusNamebyID($campus['campuses']['id']);
                        $campusCode = $CampusController->getCampusCodebyID($campus['campuses']['id']);
                        
                        $datas = array('campFacName'=> $campusName, 'campFacCode'=> $campusCode, 'scoreData'=> $scoreData);
                        array_push($uiData, $datas);
                    endforeach;
                }
                
                if($ctgry == "faculty")
                {
                    $query = "SELECT id, name, code FROM faculties";
                    $faculties = $this->Survey->query($query);
                    //print_r($campuses);
                    $uiData = array();
                    foreach($faculties as $faculty):
                        $datas = NULL;
                        $scoreData = $SurveysController->getCamFacScoreSection($ctgry, $semID, $faculty['faculties']['id']);
                        
                        $facName = $FacultyController->getFacNamebyID($faculty['faculties']['id']);
                        $facCode = $FacultyController->getFacCodebyID($faculty['faculties']['id']);
                        
                        $datas = array('campFacName'=> $facName, 'campFacCode'=> $facCode, 'scoreData'=> $scoreData);
                        array_push($uiData, $datas);
                    endforeach;
                    
                }
                
                //$this->set(array('uiData'=> $uiData));
            }
            
            $this->set(array('datas'=> $uiData, 'semDatas'=> $semDatas));
        }
        
        public function getCamFacScoreSection($ctgry, $semID, $camFacID)
        {
            //lol
            $TotalAvgPartA = 0;
            $TotalAvgPartB = 0;
            $TotalAvgPartC = 0;
            $TotalAvgPartD = 0;
            $SurveyController = new SurveysController();
            
            if($ctgry == "campus")
            {
                for($i = 1; $i <= 25; $i++)
                {
                    $totalVal1 = $SurveyController->countAnsv2($ctgry, $camFacID, $semID, $i, 1);
                    $totalVal2 = $SurveyController->countAnsv2($ctgry, $camFacID, $semID, $i, 2);
                    $totalVal3 = $SurveyController->countAnsv2($ctgry, $camFacID, $semID, $i, 3);
                    $totalVal4 = $SurveyController->countAnsv2($ctgry, $camFacID, $semID, $i, 4);
                    
                    $avg = $SurveyController->averageCounter($totalVal1, $totalVal2, $totalVal3, $totalVal4);

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
                $overallAvg = ($avgPartA + $avgPartB + $avgPartC + $avgPartD) / 4;

                $avgPartA = CakeNumber::precision($avgPartA, 2);
                $avgPartB = CakeNumber::precision($avgPartB, 2);
                $avgPartC = CakeNumber::precision($avgPartC, 2);
                $avgPartD = CakeNumber::precision($avgPartD, 2);
                $overallAvg = CakeNumber::precision($overallAvg, 2);
                
                $data = array('sectA'=> $avgPartA, 'sectB'=> $avgPartB, 'sectC'=> $avgPartC, 'sectD'=> $avgPartD, 'overAllAVG'=> $overallAvg);
            }
            
            if($ctgry == "faculty")
            {
                for($i = 1; $i <= 25; $i++)
                {
                    $totalVal1 = $SurveyController->countAnsv2($ctgry, $camFacID, $semID, $i, 1);
                    $totalVal2 = $SurveyController->countAnsv2($ctgry, $camFacID, $semID, $i, 2);
                    $totalVal3 = $SurveyController->countAnsv2($ctgry, $camFacID, $semID, $i, 3);
                    $totalVal4 = $SurveyController->countAnsv2($ctgry, $camFacID, $semID, $i, 4);
                    
                    $avg = $SurveyController->averageCounter($totalVal1, $totalVal2, $totalVal3, $totalVal4);

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
                $overallAvg = ($avgPartA + $avgPartB + $avgPartC + $avgPartD) / 4;

                $avgPartA = CakeNumber::precision($avgPartA, 2);
                $avgPartB = CakeNumber::precision($avgPartB, 2);
                $avgPartC = CakeNumber::precision($avgPartC, 2);
                $avgPartD = CakeNumber::precision($avgPartD, 2);
                $overallAvg = CakeNumber::precision($overallAvg, 2);
                
                $data = array('sectA'=> $avgPartA, 'sectB'=> $avgPartB, 'sectC'=> $avgPartC, 'sectD'=> $avgPartD, 'overAllAVG'=> $overallAvg);
            
            }
            
            return $data;
        }


        public function countCamFacScoreSection($camFacID)
        {
            
        }
        
        public function aboutSuFO()
        {
            
        }
                
}
