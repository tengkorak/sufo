<div class="scores view">
<h2><?php echo __('Score'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($score['Score']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enroll'); ?></dt>
		<dd>
			<?php echo $this->Html->link($score['Enroll']['name'], array('controller' => 'enrolls', 'action' => 'view', $score['Enroll']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Secta'); ?></dt>
		<dd>
			<?php echo h($score['Score']['secta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sectb'); ?></dt>
		<dd>
			<?php echo h($score['Score']['sectb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sectc'); ?></dt>
		<dd>
			<?php echo h($score['Score']['sectc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sectd'); ?></dt>
		<dd>
			<?php echo h($score['Score']['sectd']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Score'), array('action' => 'edit', $score['Score']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Score'), array('action' => 'delete', $score['Score']['id']), null, __('Are you sure you want to delete # %s?', $score['Score']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrolls'), array('controller' => 'enrolls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enroll'), array('controller' => 'enrolls', 'action' => 'add')); ?> </li>
	</ul>
</div>
