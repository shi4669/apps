<div class="links form">
<?php echo $this->Form->create('Link', array('class' => 'form-horizontal'));?>	 
	<fieldset>
		<legend><?php echo __('リンク新規登録'); ?></legend>

		<div class="control-group">
		<?php
			/** リンクタイトル */
			echo $this->Form->label(
				'link_title',
				'<font color="red">*</font> リンクタイトル',
				array('class' => 'control-label', 'for' => 'link_title')
			);
			echo $this->Form->input(
				'link_title',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
		?>
		</div>
		<div class="control-group">
		<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'link_category_id',
				'<font color="red">*</font> カテゴリ',
				array('class' => 'control-label', 'for' => 'link_category_id')
			);
			echo $this->Form->input(
				'link_category_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $link_category_id,
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
				'memo_category_id',
				'<font color="red">*</font> 登録区分',
				array('class' => 'control-label', 'for' => 'memo_category_id')
			);
			echo $this->Form->input(
				'memo_category_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $memo_category_id,
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
			/** 対象作業名 */
			echo $this->Form->label(
				'link_methods_id',
				'<font color="red">*</font> リンク形式',
				array('class' => 'control-label', 'for' => 'link_methods_id')
			);
			echo $this->Form->input(
				'link_methods_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $link_methods_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** リンクタイトル */
			echo $this->Form->label(
				'link',
				'<font color="red">*</font> リンクタイトル',
				array('class' => 'control-label', 'for' => 'link')
			);
			echo $this->Form->input(
				'link',
				array('label' => false,  'style' => 'width:800px', 'div' => array('class' => 'controls'))
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
				'<font color="red">*</font> 変更履歴情報',
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
	
