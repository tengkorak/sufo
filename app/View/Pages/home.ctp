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
            echo 'navbar role 3';
        }
    }
    else
    {
        include '/navbar/indexNavBar.php';
    }
    
?>
