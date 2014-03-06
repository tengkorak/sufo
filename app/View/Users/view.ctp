<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faculty'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Faculty']['name'], array('controller' => 'faculties', 'action' => 'view', $user['Faculty']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uid'); ?></dt>
		<dd>
			<?php echo h($user['User']['uid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pswd'); ?></dt>
		<dd>
			<?php echo h($user['User']['pswd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fname'); ?></dt>
		<dd>
			<?php echo h($user['User']['fname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prgrm'); ?></dt>
		<dd>
			<?php echo h($user['User']['prgrm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addrs'); ?></dt>
		<dd>
			<?php echo h($user['User']['addrs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nric'); ?></dt>
		<dd>
			<?php echo h($user['User']['nric']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($user['User']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($user['User']['gender']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faculties'), array('controller' => 'faculties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faculty'), array('controller' => 'faculties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrolls'), array('controller' => 'enrolls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enroll'), array('controller' => 'enrolls', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Enrolls'); ?></h3>
	<?php if (!empty($user['Enroll'])): ?>
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
	<?php foreach ($user['Enroll'] as $enroll): ?>
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
