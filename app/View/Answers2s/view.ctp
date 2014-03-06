<div class="answers2s view">
<h2><?php echo __('Answers2'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($answers2['Answers2']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enroll'); ?></dt>
		<dd>
			<?php echo $this->Html->link($answers2['Enroll']['name'], array('controller' => 'enrolls', 'action' => 'view', $answers2['Enroll']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($answers2['Question']['id'], array('controller' => 'questions', 'action' => 'view', $answers2['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ans'); ?></dt>
		<dd>
			<?php echo h($answers2['Answers2']['ans']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Answers2'), array('action' => 'edit', $answers2['Answers2']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Answers2'), array('action' => 'delete', $answers2['Answers2']['id']), null, __('Are you sure you want to delete # %s?', $answers2['Answers2']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers2s'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers2'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrolls'), array('controller' => 'enrolls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enroll'), array('controller' => 'enrolls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
