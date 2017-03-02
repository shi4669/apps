<div class="segmentStatusCategories view">
<h2><?php  echo __('Segment Status Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($segmentStatusCategory['SegmentStatusCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Segment Status Name'); ?></dt>
		<dd>
			<?php echo h($segmentStatusCategory['SegmentStatusCategory']['segment_status_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Segment Status Category'), array('action' => 'edit', $segmentStatusCategory['SegmentStatusCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Segment Status Category'), array('action' => 'delete', $segmentStatusCategory['SegmentStatusCategory']['id']), null, __('Are you sure you want to delete # %s?', $segmentStatusCategory['SegmentStatusCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Segment Status Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Segment Status Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
