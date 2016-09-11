<div class="linkMethods index">
	<h2><?php echo __('Link Methods');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('link_method_name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($linkMethods as $linkMethod): ?>
	<tr>
		<td><?php echo h($linkMethod['LinkMethod']['id']); ?>&nbsp;</td>
		<td><?php echo h($linkMethod['LinkMethod']['link_method_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $linkMethod['LinkMethod']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $linkMethod['LinkMethod']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $linkMethod['LinkMethod']['id']), null, __('Are you sure you want to delete # %s?', $linkMethod['LinkMethod']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Link Method'), array('action' => 'add')); ?></li>
	</ul>
</div>
