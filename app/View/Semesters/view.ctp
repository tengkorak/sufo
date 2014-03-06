<div class="semesters view">
<h2><?php echo __('Semester'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($semester['Semester']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Startmonth'); ?></dt>
		<dd>
			<?php echo h($semester['Semester']['startmonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Startyear'); ?></dt>
		<dd>
			<?php echo h($semester['Semester']['startyear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endmonth'); ?></dt>
		<dd>
			<?php echo h($semester['Semester']['endmonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endyear'); ?></dt>
		<dd>
			<?php echo h($semester['Semester']['endyear']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Semester'), array('action' => 'edit', $semester['Semester']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Semester'), array('action' => 'delete', $semester['Semester']['id']), null, __('Are you sure you want to delete # %s?', $semester['Semester']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Semesters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Semester'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrolls'), array('controller' => 'enrolls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enroll'), array('controller' => 'enrolls', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Enrolls'); ?></h3>
	<?php if (!empty($semester['Enroll'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Semester Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Stat'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($semester['Enroll'] as $enroll): ?>
		<tr>
			<td><?php echo $enroll['id']; ?></td>
			<td><?php echo $enroll['user_id']; ?></td>
			<td><?php echo $enroll['course_id']; ?></td>
			<td><?php echo $enroll['semester_id']; ?></td>
			<td><?php echo $enroll['name']; ?></td>
			<td><?php echo $enroll['stat']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enrolls', 'action' => 'view', $enroll['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enrolls', 'action' => 'edit', $enroll['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enrolls', 'action' => 'delete', $enroll['id']), null, __('Are you sure you want to delete # %s?', $enroll['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Enroll'), array('controller' => 'enrolls', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
