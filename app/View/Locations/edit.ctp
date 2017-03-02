<div class="locations form">

<?php echo $this->Form->create('Location', array('class' => 'form-horizontal'));?>	 
	<fieldset>
		<legend><?php echo __('ロケーション編集'); ?></legend>

	<div class="control-group">
	<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'location_name',
				'<font color="red">*</font> ロケーション名',
				array('class' => 'control-label', 'for' => 'location_name')
			);
			echo $this->Form->input(
				'location_name',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

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

	<?php
		echo $this->Form->end();
	?>

	 

</div>
