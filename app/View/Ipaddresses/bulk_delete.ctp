<div class="ipaddresses form">
<?php echo $this->Form->create('Ipaddress', array('class' => 'form-horizontal'));?>	 	 
	<fieldset>
		<legend><?php echo __('IPアドレス一括削除'); ?></legend>

	<div class="control-group">
	<?php
			/** セグメント名 */
			echo $this->Form->label(
				'segment_id',
				'<font color="red">*</font> IPを削除する<BR>対象のセグメント',
				array('class' => 'control-label', 'for' => 'segment_id')
			);
			echo $this->Form->input(
				'segment_id',
				array(
					'label' => false,
					'type' => 'select',
					'options' => $segment_id,
					'empty' => '- 選択してください -',
					'class' => 'input-xlarge',
					'div' => array('class' => 'controls')
				)
			);
		?>
	</div>

	</fieldset>
	<div class="form-actions">
	<?php
		echo $this->Form->button('削除', array('class' => 'btn btn-primary'));
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
