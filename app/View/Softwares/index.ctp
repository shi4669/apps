<div class="softwares index">
	<h2><?php echo __('ソフトウェア一覧');?></h2>

	<div>
		<?php
			/** 検索 */
			//echo $this->Form->create('Change', array('action' => 'index', 'default' => false, 'class' => 'form-horizontal'));
			echo $this->Form->create('Software', array('class' => 'form-horizontal'));
		?>
		<table>
			<tr>
				<td valign="top" style="padding-right:20px">
					<?php
						echo $this->Form->input('host_name', array('label'=>'ホスト名'));
 						echo $this->Form->input('software_name', array('label'=>'ソフトウェア名'));
					?>
				</td>
			</tr>
		</table>
		<?php
			echo $this->Form->button('検索', array('name' => 'search', 'type' => 'submit', 'class' => 'btn  btn-primary btn-small'));
			echo '&nbsp;';
			echo $this->Form->button('クリア', array('name' => 'clear', 'type' => 'submit', 'class' => 'btn  btn-primary btn-small'));
			echo $this->Form->end();
		?>
	</div>

	<br>
	<table  style="table-layout: fixed;">
	<tr>
			<th width=100><?php echo __('データ取込日');?></th>
			<th width=150><?php echo __('ホスト名');?></th>
			<th width=500><?php echo __('ソフトウェア名');?></th>
			<th><?php echo __('バージョン');?></th>
			<th><?php echo __('製造元');?></th>
	</tr>
	<?php
	foreach ($softwares as $software): ?>
	<tr>

		<td><?php echo date("Y年n月j日" , strtotime($software['Software']['loaded'])) ?>&nbsp;</td>
		<td><?php echo h($software['Software']['host_name']); ?>&nbsp;</td>
		<td><?php echo h($software['Software']['software_name']); ?>&nbsp;</td>
		<td><?php echo h($software['Software']['version']); ?>&nbsp;</td>
		<td><?php echo h($software['Software']['maker']); ?>&nbsp;</td>

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
	<?php $this->Paginator->options(array('url' => $searchword)); ?>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>

	</div>
</div>

