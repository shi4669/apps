<div class="changes form">
<?php echo $this->Form->create('Change', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('システム変更履歴 新規登録'); ?></legend>

		<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'change_title',
				'<font color="red">*</font> 作業名',
				array('class' => 'control-label', 'for' => 'change_title')
			);
			echo $this->Form->input(
				'change_title',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 対象機器名 */
			echo $this->Form->label(
				'change_target',
				'<font color="red">*</font> 対象機器名',
				array('class' => 'control-label', 'for' => 'change_target')
			);
			echo $this->Form->input(
				'change_target',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 対象機器名 */
			echo $this->Form->label(
				'change_target_detail',
				'<font color="red">*</font> 対象機器詳細',
				array('class' => 'control-label', 'for' => 'change_target_detail')
			);
			echo $this->Form->input(
				'change_target_deail',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>


		<div class="control-group">
		<?php
			/** 作業予定日/完了日 */
			echo $this->Form->label(
				'change_target_date',
				'<font color="red">*</font> 作業予定日/完了日',
				array('class' => 'control-label', 'for' => 'change_target_date')
			);

			echo $this->Form->input(
				'change_target_date',
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
			/** 作業区分 */
			echo $this->Form->label(
				'change_div',
				'<font color="red">*</font> 作業区分',
				array('class' => 'control-label', 'for' => 'change_div')
			);
			echo $this->Form->input(
				'change_div',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $change_divs,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'change_status',
				'<font color="red">*</font> 作業状況',
				array('class' => 'control-label', 'for' => 'change_status')
			);
			echo $this->Form->input(
				'change_status',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $change_status,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'change_detail',
				'<font color="red">*</font> 作業詳細',
				array('class' => 'control-label', 'for' => 'change_detail')
			);
			echo $this->Form->input(
				'change_detail',
				array('label' => false,'type' => 'textarea','rows' => '10' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);


		?>
		</div>

		<div class="control-group">
		<?php
			/** 作業関連手順書 */
			echo $this->Form->label(
				'operation_doc',
				'<font color="red">*</font> 作業手順書',
				array('class' => 'control-label', 'for' => 'operation_doc')
			);
			echo $this->Form->input(
				'operation_doc',
				array('label' => false,'type' => 'textarea','rows' => '10' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 資料変更区分 */
			echo $this->Form->label(
				'service_affect',
				'<font color="red">*</font> サービス停止の有無',
				array('class' => 'control-label', 'for' => 'service_affect')
			);
			echo $this->Form->input(
				'service_affect',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $general_code,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 作業影響 */
			echo $this->Form->label(
				'affect_detail',
				'<font color="red">*</font> 作業影響',
				array('class' => 'control-label', 'for' => 'affect_detail')
			);
			echo $this->Form->input(
				'affect_detail',
				array('label' => false,'type' => 'textarea','rows' => '10' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 資料変更区分 */
			echo $this->Form->label(
				'change_doc_div',
				'<font color="red">*</font> 資料の更新有無',
				array('class' => 'control-label', 'for' => 'change_doc_div')
			);
			echo $this->Form->input(
				'change_doc_div',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $general_code,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 関連資料 */
			echo $this->Form->label(
				'change_doc_detail',
				'<font color="red">*</font> 更新対象の資料',
				array('class' => 'control-label', 'for' => 'change_doc_detail')
			);
			echo $this->Form->input(
				'change_doc_detail',
				array('label' => false,'type' => 'textarea','rows' => '4' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);


		?>
		</div>

		<div class="control-group">
		<?php
			/** 資料変更区分 */
			echo $this->Form->label(
				'shared_div',
				'<font color="red">*</font> 周知情報の有無',
				array('class' => 'control-label', 'for' => 'shared_div')
			);
			echo $this->Form->input(
				'shared_div',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $general_code,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/**  */
			echo $this->Form->label(
				'shared_detail',
				'<font color="red">*</font> 周知情報',
				array('class' => 'control-label', 'for' => 'shared_detail')
			);
			echo $this->Form->input(
				'shared_detail',
				array('label' => false,'type' => 'textarea','rows' => '4' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/**  */
			echo $this->Form->label(
				'memo',
				'<font color="red">*</font> メモ欄',
				array('class' => 'control-label', 'for' => 'memo')
			);
			echo $this->Form->input(
				'memo',
				array('label' => false,'type' => 'textarea','rows' => '4' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
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
