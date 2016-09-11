<div class="iscMemoCategories index">
	<h2><?php echo __('Isc Memo Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('memo_category_name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($iscMemoCategories as $iscMemoCategory): ?>
	<tr>
		<td><?php echo h($iscMemoCategory['IscMemoCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($iscMemoCategory['IscMemoCategory']['memo_category_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $iscMemoCategory['IscMemoCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $iscMemoCategory['IscMemoCategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $iscMemoCategory['IscMemoCategory']['id']), null, __('Are you sure you want to delete # %s?', $iscMemoCategory['IscMemoCategory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Isc Memo Category'), array('action' => 'add')); ?></li>
	</ul>
</div>
