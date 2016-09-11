<div class="taskCategories form">
<?php echo $this->Form->create('TaskCategory', array('class' => 'form-horizontal'))?>


	<fieldset>
		<legend><?php echo __('業務区分登録'); ?></legend>

	<div class="control-group">
	<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'task_category_name',
				'<font color="red">*</font> 業務区分名',
				array('class' => 'control-label', 'for' => 'task_category_name')
			);
			echo $this->Form->input(
				'task_category_name',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
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

	<?php
		echo $this->Form->end();
	?>
</div>


