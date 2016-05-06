<?php

	function formatName($cadet) {
		$middleInitial = (!empty($cadet['Cadet']['middle_name']) ? substr($cadet['Cadet']['middle_name'], 0, 1) . '.' : '');
		$formattedName = $cadet['Cadet']['last_name'] . ', ' . $cadet['Cadet']['first_name'] . ' ' . $middleInitial;
		return $formattedName;
	}
	
	echo $this->Form->create('AttendanceRecord', array('url' => array('action' => 'add', $type)));
	echo $this->Form->input('date');
	// echo $this->Form->hidden('type', array(
	// 	'value' => $type
	// 	));
	// debug($cadets);
	foreach ($cadets as $cadet) {
		// formatName($cadet);
		echo $this->Form->input(
			'cadet_id-' . $cadet['Cadet']['id'],
			array(
				'label' => formatName($cadet),
				'type' => 'select',
				'options' => array(
					'Present' => 'Present',
					'Absent' => 'Absent',
					'Excused' => 'Excused'
					)));

	}
	echo $this->Form->submit('Submit Attendance');