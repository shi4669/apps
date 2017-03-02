<?php
App::uses('AppController', 'Controller');
/**
 * Ipaddresses Controller
 *
 * @property Ipaddress $Ipaddress
 */
class IpaddressesController extends AppController {

/**
 * Module name
 *
 * @var string
 */
	public $name = 'Ipaddresses';

/**
 * Use Model
 *
 * @var array
 */
	public $uses = array(
		'Ipaddress',
		'Segment',
		'IpDivCategory',
		'IcmpDivCategory',
		'IpStatusCategory',
		'MonitorDeviceCategory',
		'DeviceCategory',
		'User',
	);

	
/**
 * index method
 *
 * @return voidt
 */
	public function index() {
		$this->Ipaddress->recursive = 0;
		$this->set('ipaddresses', $this->paginate());

		/** セグメントステータス区分区分を取得する */
		$segment_id = $this->Segment->find('all');
		/** プルダウン用にデータを整える */
		$segment_id = Set::Combine($segment_id, '{n}.Segment.id', '{n}.Segment.segment_name');

		/** セグメントステータス区分区分を取得する */
		$device_id = $this->DeviceCategory->find('all');
		/** プルダウン用にデータを整える */
		$device_id = Set::Combine($device_id, '{n}.DeviceCategory.id', '{n}.DeviceCategory.device_name');

		/** IP種別を取得する */
		$ip_div_id = $this->IpDivCategory->find('all');
		/** プルダウン用にデータを整える */
		$ip_div_id = Set::Combine($device_id, '{n}.IpDivCategory.id', '{n}.IpDivCategory.ip_div_name');

		/** IP種別を取得する */
		$ip_status_id = $this->IpStatusCategory->find('all');
		/** プルダウン用にデータを整える */
		$ip_status_id = Set::Combine($ip_status_id, '{n}.IpStatusCategory.id', '{n}.IpStatusCategory.ip_status_name');

		$created_id = $this->User->find('all');
		/** 11プルダウン用にデータを整える */
		$created_id = Set::Combine($created_id, '{n}.User.id', '{n}.User.user_full_name');		
		
		
		/** Viewに値を渡す */
		$this->set('segment_id', $segment_id);
		$this->set('device_id', $device_id);
		$this->set('ip_div_id', $ip_div_id);
		$this->set('ip_status_id', $ip_status_id);
		$this->set('created_id', $created_id);		
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ipaddress->id = $id;
		if (!$this->Ipaddress->exists()) {
			throw new NotFoundException(__('Invalid ipaddress'));
		}
		$this->set('ipaddress', $this->Ipaddress->read(null, $id));
		$segment_id_value =  $this->Ipaddress->data['Ipaddress']['segment_id'];
		$segment_id_name = $this->Segment->find(
			'all',
			Array(
				'conditions' => Array('Segment.id' => $segment_id_value),
				'fields' => Array('Segment.segment_name')
			)
		);
		$segment_name = $segment_id_name[0]['Segment']['segment_name'];

		$ip_div_id_value =  $this->Ipaddress->data['Ipaddress']['ip_div_id'];
		$ip_div_id_name = $this->IpDivCategory->find(
			'all',
			Array(
				'conditions' => Array('IpDivCategory.id' => $ip_div_id_value),
				'fields' => Array('IpDivCategory.ip_div_name')
			)
		);
		$ip_div_id_name = $ip_div_id_name[0]['IpDivCategory']['ip_div_name'];

		$icmp_div_id_value =  $this->Ipaddress->data['Ipaddress']['icmp_div_id'];
		$icmp_div_id_name = $this->IcmpDivCategory->find(
			'all',
			Array(
				'conditions' => Array('IcmpDivCategory.id' => $icmp_div_id_value),
				'fields' => Array('IcmpDivCategory.icmp_div_name')
			)
		);
		$icmp_div_id_name = $icmp_div_id_name[0]['IcmpDivCategory']['icmp_div_name'];

		$ip_status_id_value =  $this->Ipaddress->data['Ipaddress']['ip_status_id'];
		$ip_status_id_name = $this->IpStatusCategory->find(
			'all',
			Array(
				'conditions' => Array('IpStatusCategory.id' => $ip_status_id_value),
				'fields' => Array('IpStatusCategory.ip_status_name')
			)
		);
		$ip_status_id_name = $ip_status_id_name[0]['IpStatusCategory']['ip_status_name'];

		$mointor_device_id_value =  $this->Ipaddress->data['Ipaddress']['mointor_device_id'];
		$mointor_device_id_name = $this->MonitorDeviceCategory->find(
			'all',
			Array(
				'conditions' => Array('MonitorDeviceCategory.id' => $mointor_device_id_value),
				'fields' => Array('MonitorDeviceCategory.monitor_device_name')
			)
		);
		$mointor_device_id_name = $mointor_device_id_name[0]['MonitorDeviceCategory']['monitor_device_name'];

		$device_category_id_value =  $this->Ipaddress->data['Ipaddress']['device_category_id'];
		$device_category_id_name = $this->DeviceCategory->find(
			'all',
			Array(
				'conditions' => Array('DeviceCategory.id' => $device_category_id_value),
				'fields' => Array('DeviceCategory.device_name')
			)
		);
		$device_category_id_name = $device_category_id_name[0]['DeviceCategory']['device_name'];						

		$created_id_value =  $this->Ipaddress->data['Ipaddress']['created_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $created_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$created_id_name = $user_full_name[0]['User']['user_full_name'];

		$updated_id_value =  $this->Ipaddress->data['Ipaddress']['updated_id']; 
		$user_full_name = $this->User->find(
			'all',
			Array(
				'conditions' => Array('id' => $updated_id_value),
				'fields' => Array('User.user_full_name')
			)
		);
		$updated_id_name = $user_full_name[0]['User']['user_full_name'];

		#Viewにデータを渡す。
		$this->set('segment_name', $segment_name);
		$this->set('ip_div_id_name', $ip_div_id_name);
		$this->set('icmp_div_id_name', $icmp_div_id_name);
		$this->set('ip_status_id_name', $ip_status_id_name);
		$this->set('mointor_device_id_name', $mointor_device_id_name);
		$this->set('device_category_id_name', $device_category_id_name);
		$this->set('created_id_name', $created_id_name);
		$this->set('updated_id_name', $updated_id_name);
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ipaddress->create();
			if ($this->Ipaddress->save($this->request->data)) {
				$this->Session->setFlash(__('IPアドレスの新規登録が完了しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));				
			} else {
				$this->Session->setFlash(__('IPアドレスの新規登録が失敗しました。'));				
			}
		}

		/** セグメントステータス区分区分を取得する */
		$segment_id = $this->Segment->find('all');
		/** プルダウン用にデータを整える */
		$segment_id = Set::Combine($segment_id, '{n}.Segment.id', '{n}.Segment.segment_name');

		/** IPアドレス区分を取得する */
		$ip_div_id = $this->IpDivCategory->find('all');
		/** プルダウン用にデータを整える */
		$ip_div_id = Set::Combine($ip_div_id, '{n}.IpDivCategory.id', '{n}.IpDivCategory.ip_div_name');

		/** PING応答を取得する */
		$icmp_div_id = $this->IcmpDivCategory->find('all');
		/** プルダウン用にデータを整える */
		$icmp_div_id = Set::Combine($icmp_div_id, '{n}.IcmpDivCategory.id', '{n}.IcmpDivCategory.icmp_div_name');

		/** IPステータスを取得する */
		$ip_status_id = $this->IpStatusCategory->find('all');
		/** プルダウン用にデータを整える */
		$ip_status_id = Set::Combine($ip_status_id, '{n}.IpStatusCategory.id', '{n}.IpStatusCategory.ip_status_name');

		/** 監視機器を取得する */
		$mointor_device_id = $this->MonitorDeviceCategory->find('all');
		/** プルダウン用にデータを整える */
		$mointor_device_id = Set::Combine($mointor_device_id, '{n}.MonitorDeviceCategory.id', '{n}.MonitorDeviceCategory.monitor_device_name');

		/** 監視機器を取得する */
		$device_category_id = $this->DeviceCategory->find('all');
		/** プルダウン用にデータを整える */
		$device_category_id = Set::Combine($device_category_id, '{n}.DeviceCategory.id', '{n}.DeviceCategory.device_name');
				
		$this->set('segment_id', $segment_id);
		$this->set('ip_div_id', $ip_div_id);
		$this->set('icmp_div_id', $icmp_div_id);
		$this->set('ip_status_id', $ip_status_id);
		$this->set('mointor_device_id', $mointor_device_id);
		$this->set('device_category_id', $device_category_id);				
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Ipaddress->id = $id;
		if (!$this->Ipaddress->exists()) {
			throw new NotFoundException(__('Invalid ipaddress'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ipaddress->save($this->request->data)) {
				$this->flash(__('The ipaddress has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->Ipaddress->read(null, $id);
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
		$this->Ipaddress->id = $id;
		if (!$this->Ipaddress->exists()) {
			throw new NotFoundException(__('Invalid ipaddress'));
		}
		if ($this->Ipaddress->delete()) {
			$this->flash(__('Ipaddress deleted'), array('action' => 'index'));
		}
		$this->flash(__('Ipaddress was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
