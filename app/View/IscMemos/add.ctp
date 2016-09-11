<div class="iscMemos form">
<?php echo $this->Form->create('IscMemo');?>
	<fieldset>
		<legend><?php echo __('メモ新規登録'); ?></legend>
		<div class="control-group">

	 <?php 
			/** メモタイトル */
			echo $this->Form->label(
				'memo_title',
				'<font color="red">*</font> メモタイトル',
				array('class' => 'control-label', 'for' => 'memo_title')
			);
			echo $this->Form->input(
				'memo_title',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 作業予定日/完了日 */
			echo $this->Form->label(
				'memo_date',
				'<font color="red">*</font> メモ日',
				array('class' => 'control-label', 'for' => 'memo_date')
			);

			echo $this->Form->input(
				'memo_date',
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

	 <?php 
			/** メモタイトル */
			echo $this->Form->label(
				'source',
				'<font color="red">*</font> 情報提供元',
				array('class' => 'control-label', 'for' => 'source')
			);
			echo $this->Form->input(
				'source',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'isc_memo_category_id',
				'<font color="red">*</font> 情報区分',
				array('class' => 'control-label', 'for' => 'isc_memo_category_id')
			);
			echo $this->Form->input(
				'task_category_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $isc_memo_category_id,
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
				'memo1',
				'<font color="red">*</font> 連携情報',
				array('class' => 'control-label', 'for' => 'memo1')
			);
			echo $this->Form->input(
				'memo1',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '20' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'memo2',
				'<font color="red">*</font> 見解',
				array('class' => 'control-label', 'for' => 'memo2')
			);
			echo $this->Form->input(
				'memo2',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '5' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'memo3',
				'<font color="red">*</font> TDF状況',
				array('class' => 'control-label', 'for' => 'memo3')
			);
			echo $this->Form->input(
				'memo3',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '5' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'memo4',
				'<font color="red">*</font> 参照資料など',
				array('class' => 'control-label', 'for' => 'memo4')
			);
			echo $this->Form->input(
				'memo4',
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

