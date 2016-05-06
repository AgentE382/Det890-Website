<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public function beforeFilter() {

		$user = $this->checkLogin();
		$basePath = Router::url('/');
		$this->set('basePath', $basePath);

		$this->set('FALL_SEMESTER', array(
			'August',
			'December'
			));

		$this->set('SPRING_SEMESTER', array(
			'January',
			'May'
			));

		$this->set('schools', array(
			'lu' => 'Liberty University',
			'jmu' => 'James Madison University',
			'pvcc' => 'Piedmont Virginia Community College',
			'uva' => 'University of Virginia'
			));

		$this->set('asYears', array(
			'AS100' => 'AS100',
			'AS200' => 'AS200',
			'AS300' => 'AS300',
			'AS400' => 'AS400'		
				));

		$this->set('schoolYears', array(
			'Freshman' =>'Freshman',
			'Sophomore' => 'Sophomore',
			'Junior' => 'Junior',
			'Senior' => 'Senior',
			'Fifth Year' => 'Fifth Year'	
					));

		$this->set('userMenu', array(
			'Cadet Home' => 'cadets/index',
			'Update Info' => 'cadets/update',
			'Manage Attendance' => 'attendanceRecords/index',
			'Helpful Files' => 'cadets/files',
			'Account Settings' => 'cadets/settings',
			'Log out' => 'cadets/logout'
			));
	}

	public function beforeRender() {
		if ($this->loggedIn) {
			$this->response->disableCache();
			header("Cache-Control: no-store, no-cache, must-revalidate");
			header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
			header("Pragma: no-cache");
		}
		if ($this->sensitive && !$this->loggedIn) {
			return $this->redirect(array('controller' => 'pages', 'action' => 'display'));
		}

		if (!empty($this->permissions))
			foreach ($this->permissions as $permissionType)
				if (!$this->user['Cadet'][$permissionType])
					return $this->redirect(array('controller' => 'cadets', 'action' => 'index'));
	}

	public $components = array(	
        'Authsome.Authsome' => array(
            'model' => 'Cadet'
        ),
        'Session'
    );

    public function checkLogin() {
    	if ($user = Authsome::get()) {
    		$this->loggedIn = true;
    		$this->set('loggedIn', $this->loggedIn);
    		$this->user = $user;
    		$this->set('user', $this->user);
    		return;
    	} else {
    		$this->loggedIn = false;
	    	return false;
	    }
    }

}
