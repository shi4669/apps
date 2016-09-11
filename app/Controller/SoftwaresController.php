<?php
App::uses('AppController', 'Controller');
/**
 * Softwares Controller
 *
 * @property Software $Software
 */
class SoftwaresController extends AppController {

/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'Software',
	);

/**
 * Paginate setting
 *
 * @var array
 */
	public $paginate = array(
		'order' => 'Software.id ASC',
		'limit' => 5,
	);


	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Software->recursive = 0;

		$option = array();
		$searchword = array();

		if (!empty($this->data)|| count($this->passedArgs) > 1)  {
			if (!isset($this->request->data['clear'])) {
				
					if (isset($this->request->data['search'])) {
						$searchword = $this->request->data['Software'];
						echo "hi!";
					} else {

						/** パラメータが検索ワード */
						foreach ($this->passedArgs as $argkey => $argvalue) {
							//echo  urldecode($argvalue);
							$searchword[$argkey] = urldecode($argvalue);
						}
						echo "hi2!";
						$this->request->data['Software'] = $searchword;
					}			


						
				/** 顧客情報の検索処理 */
				foreach ($searchword as $search_key => $search_value) {
					if (isset($search_value) && $search_value != '') {
						if (strstr($search_key, '_name')) {
						 	/** _nameを含む場合部分一致にする */
							//$option[$search_key] = $search_value;
							$option[$search_key.' LIKE'] = "%{$search_value}%";
						}
					}
				}
			} else {
					/** 検索内容のクリア */
					$this->redirect(array('action' => 'index'));
			}
		}
		/** Viewに値を渡す */
		$this->set('softwares', $this->paginate($option));
		$this->set('searchword', $searchword);

	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Software->id = $id;
		if (!$this->Software->exists()) {
			throw new NotFoundException(__('Invalid software'));
		}
		$this->set('software', $this->Software->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Software->create();
			if ($this->Software->save($this->request->data)) {
				$this->flash(__('Software saved.'), array('action' => 'index'));
			} else {
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
		$this->Software->id = $id;
		if (!$this->Software->exists()) {
			throw new NotFoundException(__('Invalid software'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Software->save($this->request->data)) {
				$this->flash(__('The software has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->Software->read(null, $id);
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
		$this->Software->id = $id;
		if (!$this->Software->exists()) {
			throw new NotFoundException(__('Invalid software'));
		}
		if ($this->Software->delete()) {
			$this->flash(__('Software deleted'), array('action' => 'index'));
		}
		$this->flash(__('Software was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
