<div class="templates index">

	<h2><?php echo __('メールテンプレート');?></h2>
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
	<table  style="table-layout: fixed;">	 
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('メールテンプレート名');?></th>
			<th><?php echo $this->Paginator->sort('業務区分');?></th>
			<th><?php echo $this->Paginator->sort('投稿者');?></th>
			<th><?php echo $this->Paginator->sort('最終更新日');?></th>
			<th class="actions"></th>
	</tr>
	<?php
	foreach ($templates as $template): ?>
	<tr>
		<td><?php echo h($template['Template']['id']); ?>&nbsp;</td>
		<td><?php echo h($template['Template']['templates_name']); ?>&nbsp;</td>
		<td><?php echo h($template['TaskCategory']['task_category_name']); ?>&nbsp;</td>
		<td><?php echo h($template['User']['user_full_name']); ?>&nbsp;</td>
		<td><?php echo h($template['Template']['modified']); ?>&nbsp;</td>
		<td class="actions">

			<?php
	 			echo $this->Html->link(__('参照'), array('action' => 'view', $template['Template']['id']),array('class' => 'btn btn-primary btn-small'));
			?>
			<?php
				echo $this->Html->link(__('更新'), array('action' => 'edit', $template['Template']['id']),array('class' => 'btn btn-primary btn-small'));
			?>
			<?php
									   echo $this->Form->postLink(__('削除'), array('action' => 'delete', $template['Template']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $template['Template']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Template'), array('action' => 'add')); ?></li>
	</ul>
</div>
