<div class="deviceCategories form">
<?php echo $this->Form->create('DeviceCategory');?>
	<fieldset>
		 <legend><?php echo __('機器種別 新規登録'); ?></legend>
	</fieldset>
	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'device_name',
				'<font color="red">*</font> 機器種別',
				array('class' => 'control-label', 'for' => 'device_name')
			);
			echo $this->Form->input(
				'device_name',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>
	</fieldset>
	<font color="red">*</font> がついている項目はかならず入力してください。
</div>
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
				

