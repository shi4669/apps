<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');/**
 * User Model
 *
 */
class User extends AppModel {


/**
 * beforeSave method
 *
 * @var string
 */
	public function beforeSave() {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] =
				AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	
}
