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
	public $components = array(
		'Auth' => array(
			'loginRedirect' => array('controller' => 'events', 'action' => 'index'),//page after login
			'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),//page after logout
			'loginAction' => array('controller' => 'users', 'action' => 'login'),//page when not login
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'User',
					'fields' => array('username' => 'name','password' => 'password'),
					'scope' => array('User.is_actived' => 1 )
				)
			)
		)
	);

	public function beforeFilter(){
		$this->set('meeting_type',array(1 =>'workshop',2 => 'tutorial',3 => 'technologic'));
		if($this->Auth->loggedIn()){
			$this->set('current_user',$this->Auth->user());
		}
	}
}
