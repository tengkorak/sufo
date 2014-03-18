<div class="semesters form">
<?php echo $this->Form->create('Semester'); ?>
	<fieldset>
		<legend><?php echo __('Edit Semester'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('startmonth');
		echo $this->Form->input('startyear');
		echo $this->Form->input('endmonth');
		echo $this->Form->input('endyear');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Semester.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Semester.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Semesters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
