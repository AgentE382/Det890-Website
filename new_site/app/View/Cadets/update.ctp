<?php

	echo $this->Html->tag('h3','Update');
	echo $this->Form->create('Cadet', array('action' => 'update'));
	echo $this->Form->input('first_name', array(
		'value' => $user['Cadet']['first_name']));
	echo $this->Form->input('middle_name', array(
		'value' => $user['Cadet']['middle_name']));
	echo $this->Form->input('last_name', array(
		'value' => $user['Cadet']['last_name']));
	echo $this->Form->input('email', array(
		'value' => $user['Cadet']['email']));
	echo $this->Form->input('phone', array(
		'value' => $user['Cadet']['phone']));
	echo $this->Form->input('school', array(
		'value' => $user['Cadet']['school']));
	echo $this->Form->input('major', array(
		'value' => $user['Cadet']['major']));
	echo $this->Form->input('school_year', array(
		'value' => $user['Cadet']['school_year']));
	echo $this->Form->input('as_year', array(
		'value' => $user['Cadet']['as_year']));
	echo $this->Form->input('gpa', array(
		'value' => $user['Cadet']['gpa']));
	echo $this->Html->tag('p', 'Please enter your password to confirm changes.');
	?>

	<div class="input password required">
		<label for="CadetPassword">Password</label>
		<input name="data[Cadet][password]" autocomplete="off" type="text" id="CadetPassword" required="required">
	</div>

	<!-- <input type="" name="pswd" id="password" maxlength="16" size="20" > -->
	<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
	<script>
	$(document).ready(function(){
		$("#CadetPassword").focus(function() {
			document.getElementById('CadetPassword').setAttribute('type', 'password');
		});
	});
	</script>

<?php
	echo $this->Form->end('Update');