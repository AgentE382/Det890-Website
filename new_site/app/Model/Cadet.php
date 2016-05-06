<?php

/**
 * Cadet model
 *
 * @package		app.Model
 */
class Cadet extends AppModel {

	public $name = 'Cadet';

	public $validate = array(
		'email' => array(
			'requiredOnCreate' => array(
				'on' => 'create',
				'rule' => 'notEmpty',
				'message' => 'Email required'
				),
			'invalidFormat' => array(
				'rule' => array('email', true),
				'message' => 'Invalid email format or host'
				),
			'alreadyTaken' => array(
				'rule' => 'isUnique',
				'message' => 'Email is already taken'
				),
			),
		'password' => array(
			'requiredOnCreate' => array(
				'on' => 'create',
				'rule' => 'notEmpty',
				'message' => 'Password required'
				),
			'invalidFormat' => array(
				'rule' => array('between', 6, 32),
				'message' => 'Password must be between 6-32 characters'
				)
			)
		);

	public $hasMany = array('LoginToken');

	public function beforeSave($option = array()){
		if( isset($this->data['Cadet']['password']) ){
			$this->data['Cadet']['password'] = Authsome::hash($this->data['Cadet']['password']);
		}
		return true;
	}

	public function authsomePersist($cadet, $duration) {
	    $token = md5(uniqid(mt_rand(), true));
	    $cadetId = $cadet['Cadet']['id'];

	    $this->LoginToken->create(array(
	        'cadet_id' => $cadetId,
	        'token' => $token,
	        'duration' => $duration,
	        'expires' => date('Y-m-d H:i:s', strtotime($duration)),
	    ));
	    $this->LoginToken->save();

	    return "${token}:${cadetId}";
	}

	public function authsomeLogin($type, $credentials = array()) {
	    switch ($type) {
	        case 'guest':
	            // You can return any non-null value here, if you don't
	            // have a guest account, just return an empty array
	            return array();
	        case 'credentials':
	            $password = Authsome::hash($credentials['password']);

	            // This is the logic for validating the login
	            $conditions = array(
	                'Cadet.email' => $credentials['email'],
	                'Cadet.password' => $password,
	            );
	            break;
	        case 'cookie':
	            list($token, $cadetId) = split(':', $credentials['token']);
	            $duration = $credentials['duration'];

	            $loginToken = $this->LoginToken->find('first', array(
	                'conditions' => array(
	                    'cadet_id' => $cadetId,
	                    'token' => $token,
	                    'duration' => $duration,
	                    'used' => false,
	                    'expires <=' => date('Y-m-d H:i:s', strtotime($duration)),
	                ),
	                'contain' => false
	            ));

	            if (!$loginToken) {
	                return false;
	            }

	            $loginToken['LoginToken']['used'] = true;
	            $this->LoginToken->save($loginToken);

	            $conditions = array(
	                'Cadet.id' => $loginToken['LoginToken']['cadet_id']
	            );
	            break;
	        default:
	            return null;
	    }

	    return $this->find('first', compact('conditions'));
	}

}