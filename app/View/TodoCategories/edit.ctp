<div class="todoCategories form">
<?php echo $this->Form->create('TodoCategory');?>
	<fieldset>
		<legend><?php echo __('Edit Todo Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('todo_category_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TodoCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TodoCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Todo Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
