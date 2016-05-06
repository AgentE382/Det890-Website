<?php

	echo $this->Html->tag('h3','Register');
	echo $this->Form->create('Cadet', array('action' => 'register'));
	echo $this->Form->input('first_name');
	echo $this->Form->input('middle_name');
	echo $this->Form->input('last_name');
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->input('phone');
	echo $this->Form->input('school');
	echo $this->Form->input('major');
	echo $this->Form->input('school_year');
	echo $this->Form->input('as_year');
	echo $this->Form->end('Register');