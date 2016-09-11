<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * Module name
 *
 * @var string
 */
	public $name = 'Users';

/**
 * Use Model
 *
 * @var array
 */
	public $uses = array('User');
	
/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		/** ログインしていない時に許可するアクション */
		$this->Auth->autoRedirect = false;
		$this->Auth->allow('login', 'add');
		$this->layout = 'login';
		parent::beforeFilter();
	}

	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;

		$option = array();

		$login_id = $this->Auth->user('id');
		$login_username = $this->Auth->user('username');		

		if ($login_username == "admin") {
			$this->set('users', $this->paginate());
		} else {		
			$option['User.id =  ? '] = array($login_id);
			$this->set('users', $this->paginate($option));
		}
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();

			$this->User->data['User']['password'] = AuthComponent::password($this->data['User']['password']);

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('ユーザーの登録に成功しました。' . $password), 'Flash/success');		
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('ユーザーの登録に失敗しました。再度登録してください。'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('ユーザー情報の編集が完了しました。'),'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('ユーザー情報の編集が失敗しました。'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * login method
 *
 * @return void
 */
	public function login() {
		/** POST 送信時にログイン認証処理を行う */
		if ($this->request->is('post')) {
			/** ログイン認証処理 */
			if ($this->Auth->login()) {
	
				/** 認証後のリダイレクト処理 */
			   	$this->redirectlogin();
				
			   } else {
				/** 認証エラーメッセージ出力 */
				$this->Session->setFlash(__('ログインに失敗しました。'));
			   	}
		 }else{
			/** ログイン認証済の場合、顧客画面へ遷移 */
			if ($this->Auth->login()) {
			   $this->redirectlogin();
			}
		 }

	}

/**
 * redirectlogin method
 *
 * @return boolean
 */
	public function redirectlogin($type = null) {
		try {
			/** 二度呼ぶと値が書き変わる為、変数に格納する */
			$redirectUrl = $this->Auth->redirect();
			$this->redirect($redirectUrl);
	
		} catch (Exception $e) {
			/** エラー（ログアウト） */
			$this->Auth->logout();
		/** 認証エラーメッセージ出力 */
				$this->Session->setFlash(__('ログインに失敗しました。'));
			}
	}

/**a
 * logout method
 *
 * @return void
 */
	public function logout() {
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}	
	
}
