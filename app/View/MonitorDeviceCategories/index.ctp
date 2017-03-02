<div class="monitorDeviceCategories index">
	<h2><?php echo __('Monitor Device Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('monitor_device_name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($monitorDeviceCategories as $monitorDeviceCategory): ?>
	<tr>
		<td><?php echo h($monitorDeviceCategory['MonitorDeviceCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($monitorDeviceCategory['MonitorDeviceCategory']['monitor_device_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $monitorDeviceCategory['MonitorDeviceCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $monitorDeviceCategory['MonitorDeviceCategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $monitorDeviceCategory['MonitorDeviceCategory']['id']), null, __('Are you sure you want to delete # %s?', $monitorDeviceCategory['MonitorDeviceCategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Monitor Device Category'), array('action' => 'add')); ?></li>
	</ul>
</div>
