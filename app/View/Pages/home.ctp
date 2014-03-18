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

<?php echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login_form')); ?> <br/>
<?php echo $this->Html->link('AddNewSem', array('controller' => 'Semesters', 'action' => 'addNewSem')); ?> <br/>
<?php echo $this->Html->link('stdViewQues', array('controller' => 'Questions', 'action' => 'stdViewQuestions')); ?> <br/>
<?php echo $this->Html->link('Test_Lecturer', array('controller' => 'enrolls', 'action' => 'viewLectCourse', 99901)); ?>
