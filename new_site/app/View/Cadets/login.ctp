<?php

	echo $this->Html->tag('h3','Sign in');
	echo $this->Form->create('Cadet', array('action' => 'login'));
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->input('remember', array(
	    'label' => "Remember me for 2 weeks",
	    'type' => "checkbox"
	));
	echo $this->Form->end('Sign in');

	echo $this->Html->link('Register', array('action' => 'register'));