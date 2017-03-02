<div class="segmentStatusCategories form">
<?php echo $this->Form->create('SegmentStatusCategory');?>
	<fieldset>
		<legend><?php echo __('Edit Segment Status Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('segment_status_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SegmentStatusCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SegmentStatusCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Segment Status Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
