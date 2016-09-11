<div class="templates form">
<?php echo $this->Form->create('Template', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('メールテンプレート新規登録'); ?></legend>

		<br>
		<p class="bg-primary"><h4>基本情報</h4></p>

		<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'templates_name',
				'<font color="red">*</font> テンプレート名',
				array('class' => 'control-label', 'for' => 'templates_name')
			);
			echo $this->Form->input(
				'templates_name',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'task_category_id',
				'<font color="red">*</font> 業務区分',
				array('class' => 'control-label', 'for' => 'task_category_id')
			);
			echo $this->Form->input(
				'task_category_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $task_category_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'subject',
				'<font color="red">*</font> メール件名',
				array('class' => 'control-label', 'for' => 'subject')
			);
			echo $this->Form->input(
				'subject',
				array('label' => false,  'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'subject',
				'<font color="red">*</font> メール宛先',
				array('class' => 'control-label', 'for' => 'destination')
			);
			echo $this->Form->input(
				'destination',
				array('label' => false,  'style' => 'width:500px', 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'attachment',
				'<font color="red">*</font> 添付ファイル',
				array('class' => 'control-label', 'for' => 'attachment')
			);
			echo $this->Form->input(
				'attachment',
				array('label' => false,  'style' => 'width:700px', 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
		<p class="bg-primary"><h4>本文テンプレート</h4></p>
		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'mail_templates',
				'<font color="red">*</font> メール本文',
				array('class' => 'control-label', 'for' => 'mail_templates')
			);
			echo $this->Form->input(
				'mail_templates',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '20' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
 		<p class="bg-primary"><h4>付加情報</h4></p>
		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'situation',
				'<font color="red">*</font> こんな時に使う',
				array('class' => 'control-label', 'for' => 'situation')
			);
			echo $this->Form->input(
				'situation',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '5' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'usages',
				'<font color="red">*</font> 補足情報',
				array('class' => 'control-label', 'for' => 'usages')
			);
			echo $this->Form->input(
				'usages',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '5' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'tag',
				' タグ',
				array('class' => 'control-label', 'for' => 'tag')
			);
			echo $this->Form->input(
				'tag',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'memo',
				'メモ',
				array('class' => 'control-label', 'for' => 'memo')
			);
			echo $this->Form->input(
				'memo',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '5' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'history',
				'更新履歴',
				array('class' => 'control-label', 'for' => 'history')
			);
			echo $this->Form->input(
				'history',
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
