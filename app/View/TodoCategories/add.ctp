<div class="todoCategories form">
<?php echo $this->Form->create('TodoCategory');?>
	<fieldset>
		<legend><?php echo __('Add Todo Category'); ?></legend>
	<?php
		echo $this->Form->input('todo_category_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Todo Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
