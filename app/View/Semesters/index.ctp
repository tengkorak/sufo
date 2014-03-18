<div class="semesters index">
	<h2><?php echo __('Semesters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('startmonth'); ?></th>
			<th><?php echo $this->Paginator->sort('startyear'); ?></th>
			<th><?php echo $this->Paginator->sort('endmonth'); ?></th>
			<th><?php echo $this->Paginator->sort('endyear'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($semesters as $semester): ?>
	<tr>
		<td><?php echo h($semester['Semester']['id']); ?>&nbsp;</td>
		<td><?php echo h($semester['Semester']['startmonth']); ?>&nbsp;</td>
		<td><?php echo h($semester['Semester']['startyear']); ?>&nbsp;</td>
		<td><?php echo h($semester['Semester']['endmonth']); ?>&nbsp;</td>
		<td><?php echo h($semester['Semester']['endyear']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $semester['Semester']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $semester['Semester']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $semester['Semester']['id']), null, __('Are you sure you want to delete # %s?', $semester['Semester']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Semester'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
