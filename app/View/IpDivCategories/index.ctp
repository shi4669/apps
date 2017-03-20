<div class="ipDivCategories index">

	<h2><?php echo __('IP種別一覧');?></h2>
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
			<th width=120><?php echo $this->Paginator->sort('id');?></th>
			<th witdh="100"><?php echo $this->Paginator->sort('IP種別');?></th>
			<th><?php echo $this->Paginator->sort('更新者');?></th>
			<th><?php echo $this->Paginator->sort('最終更新日');?></th>

	</tr>
	<?php
	foreach ($ipDivCategories as $ipDivCategory): ?>
	<tr>
		<td><?php echo h($ipDivCategory['IpDivCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($ipDivCategory['IpDivCategory']['ip_div_name']); ?>&nbsp;</td>
		<td><?php echo h($ipDivCategory['User']['user_full_name']); ?>&nbsp;</td>
		<td><?php echo h($ipDivCategory['IpDivCategory']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $ipDivCategory['IpDivCategory']['id']),array('class' => 'btn btn-primary btn-small')); ?>	 

            <?php  echo $this->Form->postLink(__('削除'), array('action' => 'delete', $ipDivCategory['IpDivCategory']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $ipDivCategory['IpDivCategory']['id'])); ?>
	 
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

