<div class="ipStatusCategories form">
<?php echo $this->Form->create('IpStatusCategory');?>
	<fieldset>
		 <legend><?php echo __('IP割当状態 新規登録'); ?></legend>
	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'ip_status_name',
				'<font color="red">*</font> IP割当状態',
				array('class' => 'control-label', 'for' => 'ip_status_name')
			);
			echo $this->Form->input(
				'ip_status_name',
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

