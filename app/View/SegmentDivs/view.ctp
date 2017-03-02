<div class="segmentDivs view">
<h2><?php  echo __('Segment Div');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($segmentDiv['SegmentDiv']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Segment Div Name'); ?></dt>
		<dd>
			<?php echo h($segmentDiv['SegmentDiv']['segment_div_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Segment Div'), array('action' => 'edit', $segmentDiv['SegmentDiv']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Segment Div'), array('action' => 'delete', $segmentDiv['SegmentDiv']['id']), null, __('Are you sure you want to delete # %s?', $segmentDiv['SegmentDiv']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Segment Divs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Segment Div'), array('action' => 'add')); ?> </li>
	</ul>
</div>
