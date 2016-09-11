<div class="linkCategories form">
<?php echo $this->Form->create('LinkCategory');?>
	<fieldset>
		<legend><?php echo __('Edit Link Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('link_category_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LinkCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('LinkCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Link Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
