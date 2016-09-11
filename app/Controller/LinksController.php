<?php
App::uses('AppController', 'Controller');
/**
 * Links Controller
 *
 * @property Link $Link
 */
class LinksController extends AppController {


/**
 * Module name
 *
 * @var string
 */
	public $name = 'Links';

/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'Link',
		'LinkCategory',
		'MemoCategory',		
		'LinkMethod',		
		'User',
	);

	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Link->recursive = 0;
		$option = array();

		$login_id = $this->Auth->user('id');
		$login_username = $this->Auth->user('username');		

		if ($login_username == "admin") {
			$this->set('links', $this->paginate());
		} else {		
			$option[' ( Link.created_id =  ? and Link.memo_category_id= 1 ) OR Link.memo_category_id = 2 '] = array($login_id);
			$this->set('links', $this->paginate($option));
		}
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Link->id = $id;
		if (!$this->Link->exists()) {
			throw new NotFoundException(__('Invalid link'));
		}
		$this->set('link', $this->Link->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Link->create();
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('The link has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link could not be saved. Please, try again.'));
			}
		}
		/** 業務区分を取得する */
		$link_category_id = $this->LinkCategory->find('all');
		/** プルダウン用にデータを整える */
		$link_category_id = Set::Combine($link_category_id, '{n}.LinkCategory.id', '{n}.LinkCategory.link_category_name');

		/** 業務区分を取得する */
		$memo_category_id = $this->MemoCategory->find('all');
		/** プルダウン用にデータを整える */
		$memo_category_id = Set::Combine($memo_category_id, '{n}.MemoCategory.id', '{n}.MemoCategory.memo_category_name');		

		/** 業務区分を取得する */
		$link_methods_id = $this->LinkMethod->find('all');
		/** プルダウン用にデータを整える */
		$link_methods_id = Set::Combine($link_methods_id, '{n}.LinkMethod.id', '{n}.LinkMethod.link_method_name');				
				/** Viewに値を渡す */
		$this->set('link_category_id', $link_category_id);
		$this->set('memo_category_id', $memo_category_id);
		$this->set('link_methods_id', $link_methods_id);		

		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Link->id = $id;
		if (!$this->Link->exists()) {
			throw new NotFoundException(__('Invalid link'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('The link has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Link->read(null, $id);
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
		$this->Link->id = $id;
		if (!$this->Link->exists()) {
			throw new NotFoundException(__('Invalid link'));
		}
		if ($this->Link->delete()) {
			$this->Session->setFlash(__('Link deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Link was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
