<?php
	
	echo $this->Html->tag('h3', 'Change Password');
	echo $this->Form->create('Cadet', array('action' => 'settings'));
	echo $this->Form->hidden('change_password');
	echo $this->Form->input('old_password', array('label' => 'Enter old password', 'type' => 'password'));
	echo $this->Form->input('new_password', array('label' => 'Enter new password', 'type' => 'password'));
	echo $this->Form->input('new_password_confirm', array('label' => 'Confirm new password', 'type' => 'password'));
	echo $this->Form->submit('Change password');