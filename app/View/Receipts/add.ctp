<?php if($buy_flag): ?>
	<?php echo $this->Html->link('back to meeting list',array('controller' => 'meetings','action' => 'index')); ?>
<?php else: ?>
	<script type="text/javascript">
	$(function(){
		var $num = $('.input.number').first();
		$num.hide();
		$(".radio_btn").on('click',function(){
			if($(this).val() == 1){
				$num.show('slow');
			}else{
				$('#ReceiptCardNumber').val('');
				$num.hide('slow');
			}
		});
	})
	</script>
	<div class="receipts form">
	<?php echo $this->Form->create('Receipt'); ?>
		<fieldset>
			<legend><?php echo __('Add Receipt'); ?></legend>
		<?php
			echo $this->Form->input('meeting_id',array('type' => 'hidden','value' => $meeting_id));
			echo $this->Form->input('user_id',array('type' => 'hidden','value' => $current_user['id']));
			echo $this->Form->input('type',array('type' => 'radio' ,'options' => array(1 => 'credit' , 2 => 'cash'),'default' => 2,'class' => 'radio_btn'));
			echo $this->Form->input('card_number');
			echo $this->Form->input('amount');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Buy')); ?>
	</div>
	<?php if(isset($current_user) && $current_user['is_admin'] == 1): ?>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>

			<li><?php echo $this->Html->link(__('List Receipts'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Meetings'), array('controller' => 'meetings', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<?php endif; ?>
<?php endif; ?>