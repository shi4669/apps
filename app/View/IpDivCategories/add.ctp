<div class="ipDivCategories form">
<?php echo $this->Form->create('IpDivCategory');?>
	<fieldset>
		<legend><?php echo __('Add Ip Div Category'); ?></legend>
	<?php
		echo $this->Form->input('ip_div_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ip Div Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
