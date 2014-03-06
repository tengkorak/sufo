<div class="answers2s form">
<?php echo $this->Form->create('Answers2'); ?>
	<fieldset>
		<legend><?php echo __('Edit Answers2'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('enroll_id');
		echo $this->Form->input('question_id');
		echo $this->Form->input('ans');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Answers2.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Answers2.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Answers2s'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enrolls'), array('controller' => 'enrolls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enroll'), array('controller' => 'enrolls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
