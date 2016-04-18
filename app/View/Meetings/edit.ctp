<div class="meetings form">
<?php echo $this->Form->create('Meeting'); ?>
	<fieldset>
		<legend><?php echo __('Edit Meeting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('conference_id');
		echo $this->Form->input('speaker');
		echo $this->Form->input('description');
		echo $this->Form->input('title');
		echo $this->Form->input('min_registered');
		echo $this->Form->input('type',array('legend' =>'session','type' =>'radio','options' => $meeting_type,'value' => 1));
		echo $this->Form->input('price');
		echo $this->Form->input('open_at');
		echo $this->Form->input('close_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Meeting.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Meeting.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Conferences'), array('controller' => 'conferences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conference'), array('controller' => 'conferences', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Receipts'), array('controller' => 'receipts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Receipt'), array('controller' => 'receipts', 'action' => 'add')); ?> </li>
	</ul>
</div>
