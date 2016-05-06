<?php

/**
 * AttendanceRecords Controller
 *
 */
App::uses('AppController', 'Controller');

class AttendanceRecordsController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->sensitive = true;
	    $this->permissions = array('attendance');
	}

	public function index() {

	}

	public function add($type) {

		$this->set('cadets', $cadets = $this->AttendanceRecord->getCadets($type));
		$this->set('type', $type);

		if ($this->request->data) {
			foreach ($cadets as $cadet) {
				$cadetId = $cadet['Cadet']['id'];
				$attendanceRecordData = array('AttendanceRecord' => array(
					'cadet_id' => $cadetId,
					'date' => $this->request->data['AttendanceRecord']['date'],
					'type' => $type,
					'value' => $this->request->data['AttendanceRecord']['cadet_id-' . $cadetId]
					));
				$attendanceRecord = $this->AttendanceRecord->save($attendanceRecordData);
				$this->AttendanceRecord->clear();
			}
			$this->redirect(array('action' => 'index'));
		}

	}

	public function view($type) {

		$this->set('type', $type);

		$uniqueDates = $this->AttendanceRecord->find('all', array(
			'fields' => array('DISTINCT date'),
			'conditions' => array('type' => $type),
			'order' => array('date' => 'desc')
			));
		$dates = array();
		foreach ($uniqueDates as $date) {
			$formattedDate = date('l, d M y', strtotime($date['AttendanceRecord']['date']));
			$dates[$formattedDate] = $formattedDate;
		}
		
		$this->set('dates', $dates);

		if ($this->request->data) {
			// debug($this->request->data['AttendanceRecord']['date']);
			$date = date('Y-m-d', strtotime($this->request->data['AttendanceRecord']['date']));
			// debug($date);
			$absentCadets = $this->AttendanceRecord->find('all', array(
				'conditions' => array(
					'AttendanceRecord.date' => $date,
					'AttendanceRecord.value' => 'Absent'
					),
				'fields' => array(
					'Cadet.first_name',
					'Cadet.middle_name',
					'Cadet.last_name'
					)
				));
			$this->set('absentCadets', $absentCadets);

			$excusedCadets = $this->AttendanceRecord->find('all', array(
				'conditions' => array(
					'AttendanceRecord.date' => $date,
					'AttendanceRecord.value' => 'Excused'
					),
				'fields' => array(
					'Cadet.first_name',
					'Cadet.middle_name',
					'Cadet.last_name'
					)
				));
			$this->set('excusedCadets', $excusedCadets);

		}

	}

}
