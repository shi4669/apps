<div class="icmpDivCategories form">
<?php echo $this->Form->create('IcmpDivCategory');?>
	<fieldset>
		 <legend><?php echo __('IP応答性(Ping応答) 新規登録'); ?></legend>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'icmp_div_name',
				'<font color="red">*</font> IP応答性(Ping応答)',
				array('class' => 'control-label', 'for' => 'icmp_div_name')
			);
			echo $this->Form->input(
				'icmp_div_name',
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


