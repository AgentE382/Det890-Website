<?php

/**
 * AttendanceRecord model
 *
 * @package		app.Model
 */
App::uses('Cadet', 'Model');

class AttendanceRecord extends AppModel {

	public $name = 'AttendanceRecord';

	public $validate = array(
		);

	public $belongsTo = array('Cadet');

	public function getCadets($type) {

		switch ($type) {
		    case 'llab':
		        $cadets = ClassRegistry::init('Cadet')->find('all', array(
		    		'order' => array('last_name' => 'asc')
		    		));
		        return $cadets;
		        break;
		    case 'uva':
		    	$cadets = ClassRegistry::init('Cadet')->find('all', array(
		    		'conditions' => array('school' => array('pvcc', 'uva')),
		    		'order' => array('last_name' => 'asc')
		    		));
		    	return $cadets;
		        break;
		    case 'jmu':
		        $cadets = ClassRegistry::init('Cadet')->find('all', array(
		    		'conditions' => array('school' => 'jmu'),
		    		'order' => array('last_name' => 'asc')
		    		));
		        return $cadets;
		        break;
		    case 'lu':
		        $cadets = ClassRegistry::init('Cadet')->find('all', array(
		    		'conditions' => array('school' => 'lu'),
		    		'order' => array('last_name' => 'asc')
		    		));
		        return $cadets;
		        break;
		}

	}

}