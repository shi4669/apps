<div class="ipDivCategories form">
<?php echo $this->Form->create('IpDivCategory');?>
	<fieldset>
		 <legend><?php echo __('IP種別 新規登録'); ?></legend>
	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'ip_div_name',
				'<font color="red">*</font> IP種別',
				array('class' => 'control-label', 'for' => 'ip_div_name')
			);
			echo $this->Form->input(
				'ip_div_name',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
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

