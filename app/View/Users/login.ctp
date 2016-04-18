<?php
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('password');
echo $this->Form->end('login');
?>

<?php echo $this->Html->link('register',array('controller' => 'users', 'action' => 'add')); ?>