<div class="linkMethods form">
<?php echo $this->Form->create('LinkMethod');?>
	<fieldset>
		<legend><?php echo __('Add Link Method'); ?></legend>
	<?php
		echo $this->Form->input('link_method_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Link Methods'), array('action' => 'index'));?></li>
	</ul>
</div>
