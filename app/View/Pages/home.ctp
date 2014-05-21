<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<?php

    if($this->Session->check('User') == TRUE)
    {
        if($this->Session->read('User.role') == "1")
        {
            include '/navbar/adminNavBar.php';
        }
        else if($this->Session->read('User.role') == "2")
        {
            include '/navbar/lectNavBar.php';
        }
        else if($this->Session->read('User.role') == "3")
        {
            include '/navbar/stdNavBar.php';
        }
    }
    else
    {
        include '/navbar/indexNavBar.php';
    }
?>
    
<div class="container">

<div class="hero-unit">
  <div class="row">
      
    <div class="span2">
        <img src="img/sufo.png"/>
    </div>

    <div class="span8">
        <small>
        <b> Student Feedback Online (SuFO)</b> is an online application management system for students. 
        This feedback exercise is carried out as part of the continuous improvement and quality assurance 
        process in maintaining the standard and quality of teaching and learning delivery. Since the University’s 
        establishment, the use of manual questionnaires and later the OMR based questionnaire have been utilized 
        as a process for quality assurance and enhancement. This method has taken much time of the faculties to 
        distribute, collect and analyze the questionnaires. SuFO has been the best solution in providing flexible 
        time for the student to fill up the questionnaire. Students can log in through the i-student portal to 
        access the i-learn portal where they can access their respective courses. The online questionnaire is 
        available in the i-Learn portal from week 12 onwards of an academic semester. From week 12 of each semester, 
        students will not be able to access the modules in the i-Learn Portal, until they have completed the 
        questionnaire (SuFO). It is the students’ responsibility to complete the online questionnaire to ensure 
        that their important feedback contributes to the overall quality enhancement of teaching and learning 
        in the university.
        </small>
    </div>

  </div>
</div>
</div>
 