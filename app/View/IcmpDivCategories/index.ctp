<div class="icmpDivCategories index">
	<h2><?php echo __('IP応答性(Ping応答)');?></h2>

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
			<th><?php echo $this->Paginator->sort('IP応答性(Ping応答)');?></th>
			<th><?php echo $this->Paginator->sort('更新者');?></th>
			<th><?php echo $this->Paginator->sort('最終更新日');?></th>
	</tr>
	<?php
	foreach ($icmpDivCategories as $icmpDivCategory): ?>
	<tr>
		<td><?php echo h($icmpDivCategory['IcmpDivCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($icmpDivCategory['IcmpDivCategory']['icmp_div_name']); ?>&nbsp;</td>
		<td><?php echo h($icmpDivCategory['User']['user_full_name']); ?>&nbsp;</td>
		<td><?php echo h($icmpDivCategory['IcmpDivCategory']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $icmpDivCategory['IcmpDivCategory']['id']),array('class' => 'btn btn-primary btn-small')); ?>	 
            <?php  echo $this->Form->postLink(__('削除'), array('action' => 'delete', $icmpDivCategory['IcmpDivCategory']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $icmpDivCategory['IcmpDivCategory']['id'])); ?>
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

