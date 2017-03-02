<div class="ipaddresses form">
<?php echo $this->Form->create('Ipaddress', array('class' => 'form-horizontal'));?>	 	 
	<fieldset>
		<legend><?php echo __('IPアドレス新規登録'); ?></legend>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'ipaddress',
				'<font color="red">*</font>IPアドレス',
				array('class' => 'control-label', 'for' => 'ipaddress')
			);
			echo $this->Form->input(
				'ipaddress',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

	<div class="control-group">
	<?php
			/** セグメント名 */
			echo $this->Form->label(
				'segment_id',
				'<font color="red">*</font> セグメント',
				array('class' => 'control-label', 'for' => 'segment_id')
			);
			echo $this->Form->input(
				'segment_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $segment_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
	</div>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'hostname',
				'<font color="red">*</font>ホスト名',
				array('class' => 'control-label', 'for' => 'hostname')
			);
			echo $this->Form->input(
				'hostname',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'host_detail',
				'<font color="red">*</font>ホスト名詳細',
				array('class' => 'control-label', 'for' => 'host_detail')
			);
			echo $this->Form->input(
				'host_detail',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'requester',
				'申請者',
				array('class' => 'control-label', 'for' => 'requester')
			);
			echo $this->Form->input(
				'requester',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

	<div class="control-group">
		<?php
			/** 申請日 */
			echo $this->Form->label(
				'request_date',
				'申請日',
				array('class' => 'control-label', 'for' => 'request_date')
			);

			echo $this->Form->input(
				'request_date',
				array('label' => false,
						  'type' => 'date',
						  'dateFormat' => 'YMD',
						  'monthNames' => false,
						  'timeFormat' => '24',
						  'separator' => '/',
						  'separator' => array('年', '月', '日　'),
						  'class' => 'input-xlarge',
						  'div' => array('class' => 'controls')
				 )
			);

		?>
	</div>

	<div class="control-group">
	<?php
			/** IP種別 */
			echo $this->Form->label(
				'ip_div_id',
				'<font color="red">*</font> IP種別',
				array('class' => 'control-label', 'for' => 'ip_div_id')
			);
			echo $this->Form->input(
				'ip_div_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $ip_div_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
	</div>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'tag',
				'タグ',
				array('class' => 'control-label', 'for' => 'tag')
			);
			echo $this->Form->input(
				'tag',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

	<div class="control-group">
	<?php
			/** 機器種別 */
			echo $this->Form->label(
				'device_category_id',
				'<font color="red">*</font> 機器種別',
				array('class' => 'control-label', 'for' => 'device_category_id')
			);
			echo $this->Form->input(
				'device_category_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $device_category_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
	</div>
	<div class="control-group">
	<?php
			/** IP種別 */
			echo $this->Form->label(
				'icmp_div_id',
				'<font color="red">*</font> Ping応答',
				array('class' => 'control-label', 'for' => 'ip_div_id')
			);
			echo $this->Form->input(
				'icmp_div_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $icmp_div_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
	</div>

	<div class="control-group">
	<?php
			/** IP種別 */
			echo $this->Form->label(
				'ip_status_id',
				'<font color="red">*</font> IP払出状態',
				array('class' => 'control-label', 'for' => 'ip_status_id')
			);
			echo $this->Form->input(
				'ip_status_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $ip_status_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
	</div>

	<div class="control-group">
	<?php
			/** 監視機器 */
			echo $this->Form->label(
				'mointor_device_id',
				'<font color="red">*</font> 監視機器',
				array('class' => 'control-label', 'for' => 'mointor_device_id')
			);
			echo $this->Form->input(
				'mointor_device_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $mointor_device_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
	</div>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'dns_domain',
				'DNSドメイン',
				array('class' => 'control-label', 'for' => 'dns_domain')
			);
			echo $this->Form->input(
				'dns_domain',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'dns_server',
				'レコードが登録されたDNSサーバ',
				array('class' => 'control-label', 'for' => 'dns_server')
			);
			echo $this->Form->input(
				'dns_server',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'comment',
				'一口コメント',
				array('class' => 'control-label', 'for' => 'comment')
			);
			echo $this->Form->input(
				'comment',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'memo1',
				'<font color="red">*</font> メモ本文',
				array('class' => 'control-label', 'for' => 'memo1')
			);
			echo $this->Form->input(
				'memo1',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '20' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'memo2',
				'<font color="red">*</font> 補足情報',
				array('class' => 'control-label', 'for' => 'memo2')
			);
			echo $this->Form->input(
				'memo2',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '5' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
	</fieldset>
	<font color="red">*</font> がついている項目はかならず入力してください。

	<div class="form-actions">
	<?php
		echo $this->Form->button('登録', array('class' => 'btn btn-primary'));
		echo $this->Html->link(
			__('キャンセル'),
			array('action' => 'index'),
			array('class' => 'btn')
		);
	?>
	</div>
	<?php
		echo $this->Form->end();
	?>
</div>
