<div class="memoCategories form">
<?php echo $this->Form->create('MemoCategory');?>
	<fieldset>
		<legend><?php echo __('Add Memo Category'); ?></legend>
	<?php
		echo $this->Form->input('memo_category_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Memo Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
