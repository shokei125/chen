<div class="meetings index">
	<h2><?php echo __('Meetings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('conference_id'); ?></th>
			<th><?php echo $this->Paginator->sort('speaker'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('min_registered'); ?></th>
			<th><?php echo $this->Paginator->sort('type','session'); ?></th>
			<th><?php echo $this->Paginator->sort('open_at'); ?></th>
			<th><?php echo $this->Paginator->sort('close_at'); ?></th>
			<th><?php echo $this->Paginator->sort('registered_attendee'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($meetings as $meeting): ?>
	<tr>
		<td><?php echo h($meeting['Meeting']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($meeting['Conference']['name'], array('controller' => 'conferences', 'action' => 'view', $meeting['Conference']['id'])); ?>
		</td>
		<td><?php echo h($meeting['Meeting']['speaker']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['title']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['min_registered']); ?>&nbsp;</td>
		<td><?php echo h($meeting_type[$meeting['Meeting']['type']]); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['open_at']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['close_at']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['registered_attendee']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $meeting['Meeting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $meeting['Meeting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $meeting['Meeting']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $meeting['Meeting']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Meeting'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Conferences'), array('controller' => 'conferences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conference'), array('controller' => 'conferences', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Receipts'), array('controller' => 'receipts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Receipt'), array('controller' => 'receipts', 'action' => 'add')); ?> </li>
	</ul>
</div>
