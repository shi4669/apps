<div class="softwares form">
<?php echo $this->Form->create('Software');?>
	<fieldset>
		<legend><?php echo __('Add Software'); ?></legend>
	<?php
		echo $this->Form->input('loaded');
		echo $this->Form->input('host_name');
		echo $this->Form->input('software_name');
		echo $this->Form->input('version');
		echo $this->Form->input('maker');
		echo $this->Form->input('input_div');
		echo $this->Form->input('created_id');
		echo $this->Form->input('updated_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Softwares'), array('action' => 'index'));?></li>
	</ul>
</div>
