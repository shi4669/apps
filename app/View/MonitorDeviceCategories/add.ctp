<div class="monitorDeviceCategories form">
<?php echo $this->Form->create('MonitorDeviceCategory');?>
	<fieldset>
		<legend><?php echo __('Add Monitor Device Category'); ?></legend>
	<?php
		echo $this->Form->input('monitor_device_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Monitor Device Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
