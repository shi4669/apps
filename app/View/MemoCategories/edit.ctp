<div class="memoCategories form">
<?php echo $this->Form->create('MemoCategory');?>
	<fieldset>
		<legend><?php echo __('Edit Memo Category'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MemoCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MemoCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Memo Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
