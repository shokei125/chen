<div class="conferences index">
	<h2><?php echo __('Conferences'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('opent_at'); ?></th>
			<th><?php echo $this->Paginator->sort('registered_attendee'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($conferences as $conference): ?>
	<tr>
		<td><?php echo h($conference['Conference']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($conference['Event']['city'], array('controller' => 'events', 'action' => 'view', $conference['Event']['id'])); ?>
		</td>
		<td><?php echo h($conference['Conference']['name']); ?>&nbsp;</td>
		<td><?php echo h($conference['Conference']['description']); ?>&nbsp;</td>
		<td><?php echo h($conference['Conference']['opent_at']); ?>&nbsp;</td>
		<td><?php echo h($conference['Conference']['registered_attendee']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $conference['Conference']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $conference['Conference']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $conference['Conference']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $conference['Conference']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Conference'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('controller' => 'meetings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
	</ul>
</div>
