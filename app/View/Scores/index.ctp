<div class="scores index">
	<h2><?php echo __('Scores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('enroll_id'); ?></th>
			<th><?php echo $this->Paginator->sort('secta'); ?></th>
			<th><?php echo $this->Paginator->sort('sectb'); ?></th>
			<th><?php echo $this->Paginator->sort('sectc'); ?></th>
			<th><?php echo $this->Paginator->sort('sectd'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($scores as $score): ?>
	<tr>
		<td><?php echo h($score['Score']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($score['Enroll']['name'], array('controller' => 'enrolls', 'action' => 'view', $score['Enroll']['id'])); ?>
		</td>
		<td><?php echo h($score['Score']['secta']); ?>&nbsp;</td>
		<td><?php echo h($score['Score']['sectb']); ?>&nbsp;</td>
		<td><?php echo h($score['Score']['sectc']); ?>&nbsp;</td>
		<td><?php echo h($score['Score']['sectd']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $score['Score']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $score['Score']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $score['Score']['id']), null, __('Are you sure you want to delete # %s?', $score['Score']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Score'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Enrolls'), array('controller' => 'enrolls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enroll'), array('controller' => 'enrolls', 'action' => 'add')); ?> </li>
	</ul>
</div>
