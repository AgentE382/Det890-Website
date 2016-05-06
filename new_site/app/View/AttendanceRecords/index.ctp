<?php

	echo $this->Html->tag('h3', 'UVa PT Attendance');
	echo $this->Html->link('Add', array('controller' => 'attendanceRecords', 'action' => 'add', 'uva'));
	echo $this->Html->link('View', array('controller' => 'attendanceRecords', 'action' => 'view', 'uva'));

	echo $this->Html->tag('h3', 'JMU PT Attendance');
	echo $this->Html->link('Add', array('controller' => 'attendanceRecords', 'action' => 'add', 'jmu'));
	echo $this->Html->link('View', array('controller' => 'attendanceRecords', 'action' => 'view', 'jmu'));

	echo $this->Html->tag('h3', 'LU PT Attendance');
	echo $this->Html->link('Add', array('controller' => 'attendanceRecords', 'action' => 'add', 'lu'));
	echo $this->Html->link('View', array('controller' => 'attendanceRecords', 'action' => 'view', 'lu'));

	echo $this->Html->tag('h3', 'LLAB Attendance');
	echo $this->Html->link('Add', array('controller' => 'attendanceRecords', 'action' => 'add', 'llab'));
	echo $this->Html->link('View', array('controller' => 'attendanceRecords', 'action' => 'view', 'llab'));