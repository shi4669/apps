<div class="deviceCategories form">
<?php echo $this->Form->create('DeviceCategory');?>
	<fieldset>
		<legend><?php echo __('Add Device Category'); ?></legend>
	<?php
		echo $this->Form->input('device_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Device Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
