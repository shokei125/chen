<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('password');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('is_student',array('type' =>'radio' ,'options' => array('-1' => 'no','1' => 'yes')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
<?php echo $this->Html->link('Top',array('controller' =>'users','action' =>'login')) ?>
</div>
<?php if(isset($current_user) && $current_user['is_admin'] == 1): ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Receipts'), array('controller' => 'receipts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Receipt'), array('controller' => 'receipts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php endif; ?>