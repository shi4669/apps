<div class="icmpDivCategories form">
<?php echo $this->Form->create('IcmpDivCategory');?>
	<fieldset>
		<legend><?php echo __('Edit Icmp Div Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('icmp_div_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IcmpDivCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('IcmpDivCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Icmp Div Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
