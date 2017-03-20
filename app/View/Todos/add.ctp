<div class="todos form">
<?php echo $this->Form->create('Todo', array('class' => 'form-horizontal'));?>
	 <fieldset>
		<legend><?php echo __('Todo新規登録'); ?></legend>

		<div class="control-group">
		<?php
			/** メモタイトル */
			echo $this->Form->label(
				'todo_title',
				'<font color="red">*</font> Todoタイトル',
				array('class' => 'control-label', 'for' => 'todo_title')
			);
			echo $this->Form->input(
				'todo_title',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 作業予定日/完了日 */
			echo $this->Form->label(
				'todo_date',
				'<font color="red">*</font> Todo期限',
				array('class' => 'control-label', 'for' => 'memo_date')
			);

			echo $this->Form->input(
				'todo_date',
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
				'todo_category_id',
				'<font color="red">*</font> Todo区分',
				array('class' => 'control-label', 'for' => 'todo_category_id')
			);
			echo $this->Form->input(
				'todo_category_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $todo_category_id,
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
				'prj_name',
				' 案件名',
				array('class' => 'control-label', 'for' => 'prj_name')
			);
			echo $this->Form->input(
				'prj_name',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
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
			/** 対象作業名 */
			echo $this->Form->label(
				'element',
				'技術要素',
				array('class' => 'control-label', 'for' => 'element')
			);
			echo $this->Form->input(
				'element',
				array('label' => false, 'class' => 'input-xlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'todo_progress_id',
				'<font color="red">*</font> Todo進捗',
				array('class' => 'control-label', 'for' => 'todo_progress_id')
			);
			echo $this->Form->input(
				'todo_progress_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $todo_progress_id,
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
				'memo',
				'<font color="red">*</font> メモ本文',
				array('class' => 'control-label', 'for' => 'memo')
			);
			echo $this->Form->input(
				'memo',
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '20' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 作業状況 */
			echo $this->Form->label(
				'memo2',
				'<font color="red">*</font> 補足情報',
				array('class' => 'control-label', 'for' => 'memo2')
			);
			echo $this->Form->input(
				'memo2',
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
