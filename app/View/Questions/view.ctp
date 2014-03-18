<div class="questions view">
<h2><?php echo __('Question'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ques'); ?></dt>
		<dd>
			<?php echo h($question['Question']['ques']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question'), array('action' => 'edit', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $question['Question']['id']), null, __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers1s'), array('controller' => 'answers1s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers1'), array('controller' => 'answers1s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers2s'), array('controller' => 'answers2s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers2'), array('controller' => 'answers2s', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Answers1s'); ?></h3>
	<?php if (!empty($question['Answers1'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Survey Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Ans'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($question['Answers1'] as $answers1): ?>
		<tr>
			<td><?php echo $answers1['id']; ?></td>
			<td><?php echo $answers1['survey_id']; ?></td>
			<td><?php echo $answers1['question_id']; ?></td>
			<td><?php echo $answers1['ans']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'answers1s', 'action' => 'view', $answers1['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'answers1s', 'action' => 'edit', $answers1['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'answers1s', 'action' => 'delete', $answers1['id']), null, __('Are you sure you want to delete # %s?', $answers1['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Answers1'), array('controller' => 'answers1s', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Answers2s'); ?></h3>
	<?php if (!empty($question['Answers2'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Survey Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Ans'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($question['Answers2'] as $answers2): ?>
		<tr>
			<td><?php echo $answers2['id']; ?></td>
			<td><?php echo $answers2['survey_id']; ?></td>
			<td><?php echo $answers2['question_id']; ?></td>
			<td><?php echo $answers2['ans']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'answers2s', 'action' => 'view', $answers2['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'answers2s', 'action' => 'edit', $answers2['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'answers2s', 'action' => 'delete', $answers2['id']), null, __('Are you sure you want to delete # %s?', $answers2['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Answers2'), array('controller' => 'answers2s', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
