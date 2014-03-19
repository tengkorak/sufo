<div class="surveys view">
<h2><?php echo __('Survey'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['User']['id'], array('controller' => 'users', 'action' => 'view', $survey['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Course']['name'], array('controller' => 'courses', 'action' => 'view', $survey['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Semester'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Semester']['id'], array('controller' => 'semesters', 'action' => 'view', $survey['Semester']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Group']['name'], array('controller' => 'groups', 'action' => 'view', $survey['Group']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Survey'), array('action' => 'edit', $survey['Survey']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Survey'), array('action' => 'delete', $survey['Survey']['id']), null, __('Are you sure you want to delete # %s?', $survey['Survey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Semesters'), array('controller' => 'semesters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Semester'), array('controller' => 'semesters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers1s'), array('controller' => 'answers1s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers1'), array('controller' => 'answers1s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers2s'), array('controller' => 'answers2s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answers2'), array('controller' => 'answers2s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Answers1s'); ?></h3>
	<?php if (!empty($survey['Answers1'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Survey Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Ans'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($survey['Answers1'] as $answers1): ?>
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
	<?php if (!empty($survey['Answers2'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Survey Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Ans'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($survey['Answers2'] as $answers2): ?>
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
<div class="related">
	<h3><?php echo __('Related Scores'); ?></h3>
	<?php if (!empty($survey['Score'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Survey Id'); ?></th>
		<th><?php echo __('Secta'); ?></th>
		<th><?php echo __('Sectb'); ?></th>
		<th><?php echo __('Sectc'); ?></th>
		<th><?php echo __('Sectd'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($survey['Score'] as $score): ?>
		<tr>
			<td><?php echo $score['id']; ?></td>
			<td><?php echo $score['survey_id']; ?></td>
			<td><?php echo $score['secta']; ?></td>
			<td><?php echo $score['sectb']; ?></td>
			<td><?php echo $score['sectc']; ?></td>
			<td><?php echo $score['sectd']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'scores', 'action' => 'view', $score['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'scores', 'action' => 'edit', $score['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'scores', 'action' => 'delete', $score['id']), null, __('Are you sure you want to delete # %s?', $score['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
