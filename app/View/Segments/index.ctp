<div class="segments index">

	<h2><?php echo __('セグメント一覧');?></h2>
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
			<th><?php echo $this->Paginator->sort('セグメント名称');?></th>
			<th><?php echo $this->Paginator->sort('セグメントIP');?></th>
			<th><?php echo $this->Paginator->sort('ロケーション');?></th>	
			<th><?php echo $this->Paginator->sort('オーナー');?></th>
			<th><?php echo $this->Paginator->sort('ステータス');?></th>
			<th><?php echo $this->Paginator->sort('セグメント区分');?></th>
			<th><?php echo $this->Paginator->sort('セグメント開始日/終了日');?></th>
	</tr>
	<?php
	foreach ($segments as $segment): ?>
	<tr>
		<td><?php echo h($segment['Segment']['id']); ?>&nbsp;</td>
		<td><?php echo h($segment['Segment']['segment_name']); ?>&nbsp;</td>
		<td><?php echo h($segment['Segment']['segment_ipaddress']); ?>&nbsp;</td>
		<td><?php echo h($segment['Location']['location_name']); ?>&nbsp;</td>
		<td><?php echo h($segment['SegmentOwner']['user_full_name']); ?>&nbsp;</td>
		<td><?php echo h($segment['SegmentStatusCategory']['segment_status_name']); ?>&nbsp;</td>
		<td><?php echo h($segment['SegmentDiv']['segment_div_name']); ?>&nbsp;</td>
		<td><?php echo h($segment['Segment']['segment_status_date']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('参照'), array('action' => 'view', $segment['Segment']['id']),array('class' => 'btn btn-primary btn-small')); ?>
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $segment['Segment']['id']),array('class' => 'btn btn-primary btn-small')); ?>
            <?php  echo $this->Form->postLink(__('削除'), array('action' => 'delete', $segment['Segment']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $segment['Segment']['id'])); ?>
	 
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
		<?php
			echo $this->Paginator->counter(array(
			'format' => __('{:count} 件中 {:page} ページ目 ({:start} ～ {:end} 件表示)')
			));
		?>
	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>

	</div>
 </div>
