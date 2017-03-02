<div class="monitorDeviceCategories view">
<h2><?php  echo __('Monitor Device Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($monitorDeviceCategory['MonitorDeviceCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monitor Device Name'); ?></dt>
		<dd>
			<?php echo h($monitorDeviceCategory['MonitorDeviceCategory']['monitor_device_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Monitor Device Category'), array('action' => 'edit', $monitorDeviceCategory['MonitorDeviceCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Monitor Device Category'), array('action' => 'delete', $monitorDeviceCategory['MonitorDeviceCategory']['id']), null, __('Are you sure you want to delete # %s?', $monitorDeviceCategory['MonitorDeviceCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Monitor Device Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Monitor Device Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
