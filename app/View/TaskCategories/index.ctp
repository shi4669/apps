<div class="taskCategories index">
	<h2><?php echo __('業務区分');?></h2>

	<div class="pull-right">
		<?php
			echo $this->Html->link(
				__('新規登録'),
				array(
					'controller' => 'taskCategories',
					'action' => 'add'
				),
				array('class' => 'btn btn-primary btn-small')
			);
		?>

	</div>
	<table  style="table-layout: fixed;">	 
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('業務区分');?></th>
	</tr>
	<?php
	foreach ($taskCategories as $taskCategory): ?>
	<tr>
		<td><?php echo h($taskCategory['TaskCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($taskCategory['TaskCategory']['task_category_name']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $taskCategory['TaskCategory']['id']),array('class' => 'btn btn-primary btn-small')); ?>
			<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $taskCategory['TaskCategory']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $taskCategory['TaskCategory']['id'])); ?>
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

