<div class="todoProgresses form">
<?php echo $this->Form->create('TodoProgress');?>
	<fieldset>
		<legend><?php echo __('Edit Todo Progress'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('progress_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TodoProgress.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TodoProgress.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Todo Progresses'), array('action' => 'index'));?></li>
	</ul>
</div>
