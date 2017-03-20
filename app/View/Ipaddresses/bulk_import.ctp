<div class="ipaddresses form">
<?php echo $this->Form->create('Ipaddress', array('class' => 'form-horizontal'));?>	 	 
	<fieldset>
		<legend><?php echo __('IPアドレス一括初期登録'); ?></legend>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'lot',
				'<font color="red">*</font>台数',
				array('class' => 'control-label', 'for' => 'lot')
			);
			echo $this->Form->input(
				'lot',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'start_address',
				'<font color="red">*</font>開始アドレス',
				array('class' => 'control-label', 'for' => 'start_address')
			);
			echo $this->Form->input(
				'start_address',
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
