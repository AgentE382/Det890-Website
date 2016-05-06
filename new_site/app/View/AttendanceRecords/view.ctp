<?php

	function formatName($cadet) {
		$middleInitial = (!empty($cadet['Cadet']['middle_name']) ? substr($cadet['Cadet']['middle_name'], 0, 1) . '.' : '');
		$formattedName = $cadet['Cadet']['last_name'] . ', ' . $cadet['Cadet']['first_name'] . ' ' . $middleInitial;
		return $formattedName;
	}
	
	if (empty($dates)) {
		echo $this->Html->tag('p', 'No attendance has been entered yet.');
	} else {
		echo $this->Form->create('AttendanceRecord', array('url' => array('action' => 'view', $type)));
		echo $this->Form->input('date', array(
			'type' => 'select',
			'options' => $dates
			));
		echo $this->Form->submit('View');
	}

	if (isset($absentCadets)) {
		echo $this->Html->tag('h4', 'Absent:');
		if (empty($absentCadets))
			echo $this->Html->tag('p', 'None!');
		foreach ($absentCadets as $absentCadet) {
			echo $this->Html->tag('p', formatName($absentCadet));
		}
	}

	if (isset($excusedCadets)) {
		echo $this->Html->tag('h4', 'Excused:');
		if (empty($excusedCadets))
			echo $this->Html->tag('p', 'None!');
		foreach ($excusedCadets as $excusedCadet) {
			echo $this->Html->tag('p', formatName($excusedCadet));
		}
	}