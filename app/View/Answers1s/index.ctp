<div class="answers1s index">
	<h2><?php echo __('Answers1s'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('survey_id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ans'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($answers1s as $answers1): ?>
	<tr>
		<td><?php echo h($answers1['Answers1']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($answers1['Survey']['id'], array('controller' => 'surveys', 'action' => 'view', $answers1['Survey']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($answers1['Question']['id'], array('controller' => 'questions', 'action' => 'view', $answers1['Question']['id'])); ?>
		</td>
		<td><?php echo h($answers1['Answers1']['ans']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $answers1['Answers1']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $answers1['Answers1']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $answers1['Answers1']['id']), null, __('Are you sure you want to delete # %s?', $answers1['Answers1']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Answers1'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
