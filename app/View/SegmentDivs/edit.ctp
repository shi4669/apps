<div class="segmentDivs form">
<?php echo $this->Form->create('SegmentDiv');?>
	<fieldset>
		<legend><?php echo __('Edit Segment Div'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('segment_div_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SegmentDiv.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SegmentDiv.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Segment Divs'), array('action' => 'index'));?></li>
	</ul>
</div>
