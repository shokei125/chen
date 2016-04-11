<div class="receipts view">
<h2><?php echo __('Receipt'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meeting'); ?></dt>
		<dd>
			<?php echo $this->Html->link($receipt['Meeting']['title'], array('controller' => 'meetings', 'action' => 'view', $receipt['Meeting']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($receipt['User']['name'], array('controller' => 'users', 'action' => 'view', $receipt['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card Number'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['card_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Receipt'), array('action' => 'edit', $receipt['Receipt']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Receipt'), array('action' => 'delete', $receipt['Receipt']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $receipt['Receipt']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Receipts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Receipt'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('controller' => 'meetings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
