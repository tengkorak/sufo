<?php
    debug($enrolls);
?>
<div class="enrolls index">
	<h2><?php echo __('Enrolls'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('semester_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('stat'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($enrolls as $enroll): ?>
	<tr>
		<td><?php echo h($enroll['Enroll']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($enroll['User']['id'], array('controller' => 'users', 'action' => 'view', $enroll['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($enroll['Course']['name'], array('controller' => 'courses', 'action' => 'view', $enroll['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($enroll['Semester']['id'], array('controller' => 'semesters', 'action' => 'view', $enroll['Semester']['id'])); ?>
		</td>
		<td><?php echo h($enroll['Enroll']['name']); ?>&nbsp;</td>
		<td><?php echo h($enroll['Enroll']['stat']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $enroll['Enroll']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $enroll['Enroll']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $enroll['Enroll']['id']), null, __('Are you sure you want to delete # %s?', $enroll['Enroll']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Enroll'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Semesters'), array('controller' => 'semesters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Semester'), array('controller' => 'semesters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers1s'), array('controller' => 'answers1s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers1'), array('controller' => 'answers1s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers2s'), array('controller' => 'answers2s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers2'), array('controller' => 'answers2s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
	</ul>
</div>
