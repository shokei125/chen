<div class="conferences view">
<h2><?php echo __('Conference'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($conference['Conference']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($conference['Event']['city'], array('controller' => 'events', 'action' => 'view', $conference['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($conference['Conference']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($conference['Conference']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Opent At'); ?></dt>
		<dd>
			<?php echo h($conference['Conference']['opent_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registered Attendee'); ?></dt>
		<dd>
			<?php echo h($conference['Conference']['registered_attendee']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Conference'), array('action' => 'edit', $conference['Conference']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Conference'), array('action' => 'delete', $conference['Conference']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $conference['Conference']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Conferences'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conference'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('controller' => 'meetings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Meetings'); ?></h3>
	<?php if (!empty($conference['Meeting'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Conference Id'); ?></th>
		<th><?php echo __('Speaker'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Min Registered'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Open At'); ?></th>
		<th><?php echo __('Close At'); ?></th>
		<th><?php echo __('Registered Attendee'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($conference['Meeting'] as $meeting): ?>
		<tr>
			<td><?php echo $meeting['id']; ?></td>
			<td><?php echo $meeting['conference_id']; ?></td>
			<td><?php echo $meeting['speaker']; ?></td>
			<td><?php echo $meeting['description']; ?></td>
			<td><?php echo $meeting['title']; ?></td>
			<td><?php echo $meeting['min_registered']; ?></td>
			<td><?php echo $meeting['type']; ?></td>
			<td><?php echo $meeting['price']; ?></td>
			<td><?php echo $meeting['open_at']; ?></td>
			<td><?php echo $meeting['close_at']; ?></td>
			<td><?php echo $meeting['registered_attendee']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'meetings', 'action' => 'view', $meeting['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'meetings', 'action' => 'edit', $meeting['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'meetings', 'action' => 'delete', $meeting['id']), array('confirm' => __('Are you sure you want to delete # %s?', $meeting['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
