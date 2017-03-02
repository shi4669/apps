<div class="segmentStatusCategories form">
<?php echo $this->Form->create('SegmentStatusCategory');?>
	<fieldset>
		<legend><?php echo __('Add Segment Status Category'); ?></legend>
	<?php
		echo $this->Form->input('segment_status_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Segment Status Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
