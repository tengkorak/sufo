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

<!--<div class="users form">
    <?php //echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php //echo __('Please enter your username and password'); ?>
        </legend>
        <?php //echo $this->Form->input('uid');
        //echo $this->Form->input('pswd');
        ?>
    </fieldset>
    
    <?php //echo $this->Form->end(__('Login')); ?>
</div>-->

<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' =>'login_form')); ?><br/>
<?php echo $this->Html->link('Student', array('controller' => 'surveys', 'action' =>'studindex')); ?><br/>