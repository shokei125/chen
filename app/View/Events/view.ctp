<div class="events view">
<h2><?php echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($event['Event']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($event['Event']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount At'); ?></dt>
		<dd>
			<?php echo h($event['Event']['discount_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Early Discount'); ?></dt>
		<dd>
			<?php echo h($event['Event']['early_discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student Discount'); ?></dt>
		<dd>
			<?php echo h($event['Event']['student_discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php if(isset($current_user) && $current_user['is_admin'] == 1): ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $event['Event']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conferences'), array('controller' => 'conferences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conference'), array('controller' => 'conferences', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php endif; ?>
<div class="related">
	<h3><?php echo __('Related Conferences'); ?></h3>
	<?php if (!empty($event['Conference'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Opent At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Conference'] as $conference): ?>
		<tr>
			<td><?php echo $conference['id']; ?></td>
			<td><?php echo $conference['name']; ?></td>
			<td><?php echo $conference['opent_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'conferences', 'action' => 'view', $conference['id'])); ?>
<?php if(isset($current_user) && $current_user['is_admin'] == 1): ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'conferences', 'action' => 'edit', $conference['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'conferences', 'action' => 'delete', $conference['id']), array('confirm' => __('Are you sure you want to delete # %s?', $conference['id']))); ?>
<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<?php if(isset($current_user) && $current_user['is_admin'] == 1): ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Conference'), array('controller' => 'conferences', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<?php endif; ?>
