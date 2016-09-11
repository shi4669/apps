<div class="iscMemoCategories form">
<?php echo $this->Form->create('IscMemoCategory');?>
	<fieldset>
		<legend><?php echo __('Edit Isc Memo Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('memo_category_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IscMemoCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('IscMemoCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Isc Memo Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
