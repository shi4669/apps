<div class="users index">
	<h2><?php echo __('ユーザー管理');?></h2>

	<div class="pull-right">
		<?php
			echo $this->Html->link(
				__('トップ画面へ'),
				array(
					'controller' => 'changes',
					'action' => 'index'
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
			<th><?php echo $this->Paginator->sort('ユーザーID');?></th>
			<th><?php echo $this->Paginator->sort('ユーザー名');?></th>
			<th><?php echo $this->Paginator->sort('メールアドレス');?></th>
			<th><?php echo $this->Paginator->sort('メール自動配信');?></th>
			<th><?php echo $this->Paginator->sort('登録日');?></th>
			<th><?php echo $this->Paginator->sort('更新日');?></th>
			<th><?php echo __('');?></th>

	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['user_full_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['mail_address']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['mail_send_div']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('参照'), array('action' => 'view', $user['User']['id']),array('class' => 'btn btn-primary btn-small')); ?>
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $user['User']['id']),array('class' => 'btn btn-primary btn-small')); ?>
			<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $user['User']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $user['User']['id'])); ?>
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
<
