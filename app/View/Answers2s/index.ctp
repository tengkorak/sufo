<div class="answers2s index">
	<h2><?php echo __('Answers2s'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('enroll_id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ans'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($answers2s as $answers2): ?>
	<tr>
		<td><?php echo h($answers2['Answers2']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($answers2['Enroll']['name'], array('controller' => 'enrolls', 'action' => 'view', $answers2['Enroll']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($answers2['Question']['id'], array('controller' => 'questions', 'action' => 'view', $answers2['Question']['id'])); ?>
		</td>
		<td><?php echo h($answers2['Answers2']['ans']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $answers2['Answers2']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $answers2['Answers2']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $answers2['Answers2']['id']), null, __('Are you sure you want to delete # %s?', $answers2['Answers2']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Answers2'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Enrolls'), array('controller' => 'enrolls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enroll'), array('controller' => 'enrolls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
