<?php

/**
 * Cadets Controller
 *
 */
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class CadetsController extends AppController {

	public function login() {

	    if (empty($this->request->data)) {
	        return;
	    }

	    $user = Authsome::login($this->request->data['Cadet']);

	    if (!$user) {
	        $this->Session->setFlash('Unknown user or wrong password');
	        return;
	    }

	    $remember = (!empty($this->request->data['Cadet']['remember']));
	    if ($remember) {
	        Authsome::persist('2 weeks');
	    }

	    $this->redirect(array('action' => 'index'));
	}

	public function logout() {
		$sensitive;

    	Authsome::logout();
    	return $this->redirect(array('controller' => 'pages', 'action' => 'display'));
    }

	public function register() {

		if ($this->request->data) {

			if ($cadet = $this->Cadet->save($this->request->data)) {

				$webmaster = $this->Cadet->findByWebmaster(true);
				if (!$webmaster) {
					$webmasterEmail = '890webmaster@virginia.edu';
				} else {
					$webmasterEmail = $webmaster['Cadet']['email'];
				}

				$Email = new CakeEmail();
				$Email->from(array($webmasterEmail => 'Det 890 Webmaster'))
				    ->to($cadet['Cadet']['email'])
				    ->subject('Registration Successful')
				    ->send('You have successfully registered.');

				return $this->redirect(array('action' => 'login'));

			}

		}


	}					

	public function files() {
		$this->sensitive = true;

	}

	public function settings() {
		$this->sensitive = true;

		if ($this->request->data) {

			if (isset($this->request->data['Cadet']['change_password'])) {

				if ($this->user['Cadet']['password']==Authsome::hash($this->request->data['Cadet']['old_password'])) {

					if ($this->request->data['Cadet']['new_password']==$this->request->data['Cadet']['new_password_confirm']) {
						$newPassword = $this->request->data['Cadet']['new_password'];
						$email = $this->user['Cadet']['email'];
						$this->Cadet->id = $this->user['Cadet']['id'];
						$cadetData = array(
							'Cadet' => array(
								'password' => $newPassword
								)
							);
						if ($cadet = $this->Cadet->save($cadetData)) {
							// debug('got here!');

							Authsome::logout();
							$user = Authsome::login(array('email' => $email, 'password' => $newPassword));

							return $this->redirect(array('action' => 'index'));

						} else {
							// debug('failed');
						}
					}
				}

			}

		}

	}

	public function index() {
		$this->sensitive = true;

		// debug($this->user);

	}

	public function update() {
		$this->sensitive = true;

		if ($this->request->data) {

			$password = $this->request->data['Cadet']['password'];
			unset($this->request->data['Cadet']['password']);
			if ($this->user['Cadet']['password']==Authsome::hash($password)) {

				$this->Cadet->id = $this->user['Cadet']['id'];

				if ($cadet = $this->Cadet->save($this->request->data)) {

					Authsome::logout();
					$user = Authsome::login(array('email' => $cadet['Cadet']['email'],'password' => $password));

					return $this->redirect(array('action' => 'index'));

				}
			}

		}


	}

}
