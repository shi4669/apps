<div class="ipStatusCategories form">
<?php echo $this->Form->create('IpStatusCategory');?>
	<fieldset>
		<legend><?php echo __('Edit Ip Status Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ip_status_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IpStatusCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('IpStatusCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ip Status Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
