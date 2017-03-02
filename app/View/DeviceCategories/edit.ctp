<div class="deviceCategories form">
<?php echo $this->Form->create('DeviceCategory');?>
	<fieldset>
		<legend><?php echo __('Edit Device Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('device_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DeviceCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DeviceCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Device Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
