<div class="monitorDeviceCategories index">

	<h2><?php echo __('監視機器一覧');?></h2>

	<div class="pull-right">
		<?php
			echo $this->Html->link(
				__('新規登録'),
				array(
					'action' => 'add'
				),
				array('class' => 'btn btn-primary btn-small')
			);
		?>

	</div>
	<br>
	<br>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('監視機器');?></th>
			<th><?php echo $this->Paginator->sort('更新者');?></th>
			<th><?php echo $this->Paginator->sort('最終更新日');?></th>
	</tr>
	<?php
	foreach ($monitorDeviceCategories as $monitorDeviceCategory): ?>
	<tr>
		<td><?php echo h($monitorDeviceCategory['MonitorDeviceCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($monitorDeviceCategory['MonitorDeviceCategory']['monitor_device_name']); ?>&nbsp;</td>
		<td><?php echo h($monitorDeviceCategory['User']['user_full_name']); ?>&nbsp;</td>
		<td><?php echo h($monitorDeviceCategory['MonitorDeviceCategory']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $monitorDeviceCategory['MonitorDeviceCategory']['id']),array('class' => 'btn btn-primary btn-small')); ?>	 

            <?php  echo $this->Form->postLink(__('削除'), array('action' => 'delete', $monitorDeviceCategory['MonitorDeviceCategory']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $monitorDeviceCategory['MonitorDeviceCategory']['id'])); ?>	 
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
