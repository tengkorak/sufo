<div class="faculties view">
<h2><?php echo __('Faculty'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($faculty['Faculty']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($faculty['Faculty']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Faculty'), array('action' => 'edit', $faculty['Faculty']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Faculty'), array('action' => 'delete', $faculty['Faculty']['id']), null, __('Are you sure you want to delete # %s?', $faculty['Faculty']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Faculties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faculty'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Programs'); ?></h3>
	<?php if (!empty($faculty['Program'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Faculty Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($faculty['Program'] as $program): ?>
		<tr>
			<td><?php echo $program['id']; ?></td>
			<td><?php echo $program['faculty_id']; ?></td>
			<td><?php echo $program['name']; ?></td>
			<td><?php echo $program['code']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'programs', 'action' => 'view', $program['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'programs', 'action' => 'edit', $program['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'programs', 'action' => 'delete', $program['id']), null, __('Are you sure you want to delete # %s?', $program['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($faculty['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Faculty Id'); ?></th>
		<th><?php echo __('Uid'); ?></th>
		<th><?php echo __('Pswd'); ?></th>
		<th><?php echo __('Fname'); ?></th>
		<th><?php echo __('Prgrm'); ?></th>
		<th><?php echo __('Addrs'); ?></th>
		<th><?php echo __('Nric'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($faculty['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['faculty_id']; ?></td>
			<td><?php echo $user['uid']; ?></td>
			<td><?php echo $user['pswd']; ?></td>
			<td><?php echo $user['fname']; ?></td>
			<td><?php echo $user['prgrm']; ?></td>
			<td><?php echo $user['addrs']; ?></td>
			<td><?php echo $user['nric']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['contact']; ?></td>
			<td><?php echo $user['gender']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
