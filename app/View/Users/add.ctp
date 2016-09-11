<div class="users form">

<?php echo $this->Form->create('User', array('class' => 'form-horizontal'));?>	 
	<fieldset>
		<legend><?php echo __('ユーザー登録'); ?></legend>

	<div class="control-group">
	<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'username',
				'<font color="red">*</font> ユーザーID',
				array('class' => 'control-label', 'for' => 'username')
			);
			echo $this->Form->input(
				'username',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

	<div class="control-group">
	<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'password',
				'<font color="red">*</font> パスワード',
				array('class' => 'control-label', 'for' => 'password')
			);
			echo $this->Form->input(
				'password',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

	<div class="control-group">
	<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'user_full_name',
				'<font color="red">*</font> ユーザー名',
				array('class' => 'control-label', 'for' => 'user_full_name')
			);
			echo $this->Form->input(
				'user_full_name',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

	<div class="control-group">
	<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'mail_address',
				'<font color="red">*</font> メールアドレス',
				array('class' => 'control-label', 'for' => 'mail_address')
			);
			echo $this->Form->input(
				'mail_address',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 性別 */
			echo $this->Form->label(
				'mail_send_div',
				'メール自動配信',
				array('class' => 'control-label', 'for' => 'mail_send_div')
			);
			echo $this->Form->input(
				'mail_send_div',
				array(
					'type'=>'radio',
					'value' => 1,
					'legend' => false,
					'separator' => '',
					'options' => array('1' => '希望する', '2' => '希望しない'),
					'div' => array('class' => 'controls radio')
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

	<?php
		echo $this->Form->end();
	?>
</div>