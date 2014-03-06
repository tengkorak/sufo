<div class="questions form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Add Question'); ?></legend>
	<?php
		echo $this->Form->input('no');
		echo $this->Form->input('ques');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Answers1s'), array('controller' => 'answers1s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers1'), array('controller' => 'answers1s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers2s'), array('controller' => 'answers2s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers2'), array('controller' => 'answers2s', 'action' => 'add')); ?> </li>
	</ul>
</div>
