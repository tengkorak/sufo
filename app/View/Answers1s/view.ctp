<div class="answers1s view">
<h2><?php echo __('Answers1'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($answers1['Answers1']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enroll'); ?></dt>
		<dd>
			<?php echo $this->Html->link($answers1['Enroll']['name'], array('controller' => 'enrolls', 'action' => 'view', $answers1['Enroll']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($answers1['Question']['id'], array('controller' => 'questions', 'action' => 'view', $answers1['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ans'); ?></dt>
		<dd>
			<?php echo h($answers1['Answers1']['ans']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Answers1'), array('action' => 'edit', $answers1['Answers1']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Answers1'), array('action' => 'delete', $answers1['Answers1']['id']), null, __('Are you sure you want to delete # %s?', $answers1['Answers1']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers1s'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers1'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrolls'), array('controller' => 'enrolls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enroll'), array('controller' => 'enrolls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
