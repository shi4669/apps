<div class="todoProgresses form">
<?php echo $this->Form->create('TodoProgress');?>
	<fieldset>
		<legend><?php echo __('Add Todo Progress'); ?></legend>
	<?php
		echo $this->Form->input('progress_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Todo Progresses'), array('action' => 'index'));?></li>
	</ul>
</div>
