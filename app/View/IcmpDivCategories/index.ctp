<div class="icmpDivCategories index">
	<h2><?php echo __('Icmp Div Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('icmp_div_name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($icmpDivCategories as $icmpDivCategory): ?>
	<tr>
		<td><?php echo h($icmpDivCategory['IcmpDivCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($icmpDivCategory['IcmpDivCategory']['icmp_div_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $icmpDivCategory['IcmpDivCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $icmpDivCategory['IcmpDivCategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $icmpDivCategory['IcmpDivCategory']['id']), null, __('Are you sure you want to delete # %s?', $icmpDivCategory['IcmpDivCategory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Icmp Div Category'), array('action' => 'add')); ?></li>
	</ul>
</div>
