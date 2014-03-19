<div class="coursesUsers view">
<h2><?php echo __('Courses User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coursesUser['CoursesUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesUser['User']['id'], array('controller' => 'users', 'action' => 'view', $coursesUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesUser['Course']['name'], array('controller' => 'courses', 'action' => 'view', $coursesUser['Course']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Courses User'), array('action' => 'edit', $coursesUser['CoursesUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Courses User'), array('action' => 'delete', $coursesUser['CoursesUser']['id']), null, __('Are you sure you want to delete # %s?', $coursesUser['CoursesUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
