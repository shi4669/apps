<div class="segments form">
<?php echo $this->Form->create('Segment', array('class' => 'form-horizontal'));?>	 
	<fieldset>
	 <legend><?php echo __('セグメント更新'); ?></legend>

	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'segment_name',
				'<font color="red">*</font> セグメント名称',
				array('class' => 'control-label', 'for' => 'segment_name')
			);
			echo $this->Form->input(
				'segment_name',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>
	<div class="control-group">
	<?php
	 		echo $this->Form->label(
				'segment_ipaddress',
				'<font color="red">*</font> セグメントIP',
				array('class' => 'control-label', 'for' => 'segment_ipaddress')
			);
			echo $this->Form->input(
				'segment_ipaddress',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);
	?>
	</div>

	<div class="control-group">
	<?php
			echo $this->Form->label(
				'segment_subnet',
				'<font color="red">*</font> セグメントサブネット',
				array('class' => 'control-label', 'for' => 'segment_subnet')
			);
			echo $this->Form->input(
				'segment_subnet',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
			);

		?>
	</div>

	<div class="control-group">
	<?php
			/** 対象作業名 */
			echo $this->Form->label(
				'location_id',
				'<font color="red">*</font> ロケーション',
				array('class' => 'control-label', 'for' => 'location_id')
			);
			echo $this->Form->input(
				'location_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $location_id,
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
				'segment_div_id',
				'<font color="red">*</font> セグメント区分',
				array('class' => 'control-label', 'for' => 'segment_div_id')
			);
			echo $this->Form->input(
				'segment_div_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $segment_div_id,
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
				'segment_status_id',
				'<font color="red">*</font> セグメントステータス',
				array('class' => 'control-label', 'for' => 'segment_status_id')
			);
			echo $this->Form->input(
				'segment_status_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $segment_status_id,
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
				'segment_owner_id',
				'<font color="red">*</font> セグメントオーナー',
				array('class' => 'control-label', 'for' => 'segment_owner_id')
			);
			echo $this->Form->input(
				'segment_owner_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $segment_owner_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
		</div>

		<div class="control-group">
		<?php
			/** 作業予定日/完了日 */
			echo $this->Form->label(
				'segment_status_date',
				'<font color="red">*</font> 開始/終了日',
				array('class' => 'control-label', 'for' => 'segment_status_date')
			);

			echo $this->Form->input(
				'segment_status_date',
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
			echo $this->Form->label(
				'segment_source_device',
				'<font color="red">*</font> 関連機器',
				array('class' => 'control-label', 'for' => 'segment_source_device')
			);
			echo $this->Form->input(
				'segment_source_device',
				array('label' => false,  'style' => 'width:300px', 'div' => array('class' => 'controls'))
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
				array('label' => false,'type' => 'textarea','style' => 'width:600px','rows' => '10' ,'class' => 'input-xxlarge', 'div' => array('class' => 'controls'))
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

