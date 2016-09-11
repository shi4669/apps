<div class="links form">
<?php echo $this->Form->create('Link');?>
	<fieldset>
		<legend><?php echo __('Edit Link'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('link_title');
		echo $this->Form->input('link_date');
		echo $this->Form->input('link_category_id');
		echo $this->Form->input('memo_category_id');
		echo $this->Form->input('tag');
		echo $this->Form->input('link_methods_id');
		echo $this->Form->input('link');
		echo $this->Form->input('memo');
		echo $this->Form->input('created_id');
		echo $this->Form->input('updated_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Link.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Link.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Links'), array('action' => 'index'));?></li>
	</ul>
</div>
