<div class="meetings view">
<h2><?php echo __('Meeting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conference'); ?></dt>
		<dd>
			<?php echo $this->Html->link($meeting['Conference']['name'], array('controller' => 'conferences', 'action' => 'view', $meeting['Conference']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Speaker'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['speaker']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Registered'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['min_registered']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($meeting_type[$meeting['Meeting']['type']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open At'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['open_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Close At'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['close_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registered Attendee'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['registered_attendee']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<?php if(isset($current_user) && $current_user['is_admin'] == 1): ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meeting'), array('action' => 'edit', $meeting['Meeting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meeting'), array('action' => 'delete', $meeting['Meeting']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $meeting['Meeting']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conferences'), array('controller' => 'conferences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conference'), array('controller' => 'conferences', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Receipts'), array('controller' => 'receipts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Receipt'), array('controller' => 'receipts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php endif; ?>

<div class="related">
	<h3><?php echo __('Related Receipts'); ?></h3>
	<?php if (!empty($meeting['Receipt'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($meeting['Receipt'] as $receipt): ?>
		<tr>
			<td><?php echo $receipt['id']; ?></td>
			<td><?php echo $receipt['type']; ?></td>
			<td><?php echo $receipt['amount']; ?></td>
			<td><?php echo $receipt['created']; ?></td>
			<td><?php echo $receipt['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'receipts', 'action' => 'view', $receipt['id'])); ?>
<?php if(isset($current_user) && $current_user['is_admin'] == 1): ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'receipts', 'action' => 'edit', $receipt['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'receipts', 'action' => 'delete', $receipt['id']), array('confirm' => __('Are you sure you want to delete # %s?', $receipt['id']))); ?>
<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('buy meeting'), array('controller' => 'receipts', 'action' => 'add',$meeting['Meeting']['id'])); ?> </li>
		</ul>
	</div>
</div>
