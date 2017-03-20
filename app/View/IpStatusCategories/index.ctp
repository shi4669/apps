<div class="ipStatusCategories index">

	<h2><?php echo __('IP割当状態');?></h2>

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
			<th><?php echo $this->Paginator->sort('IP割当状態');?></th>
			<th><?php echo $this->Paginator->sort('更新者');?></th>
			<th><?php echo $this->Paginator->sort('最終更新日');?></th>
	</tr>
	<?php
	foreach ($ipStatusCategories as $ipStatusCategory): ?>
	<tr>
		<td><?php echo h($ipStatusCategory['IpStatusCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($ipStatusCategory['IpStatusCategory']['ip_status_name']); ?>&nbsp;</td>
		<td><?php echo h($ipStatusCategory['User']['user_full_name']); ?>&nbsp;</td>
		<td><?php echo h($ipStatusCategory['IpStatusCategory']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $ipStatusCategory['IpStatusCategory']['id']),array('class' => 'btn btn-primary btn-small')); ?>	 
            <?php  echo $this->Form->postLink(__('削除'), array('action' => 'delete', $ipStatusCategory['IpStatusCategory']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $ipStatusCategory['IpStatusCategory']['id'])); ?>
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

