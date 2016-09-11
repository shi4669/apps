<div class="iscMemos index">
	<h2><?php echo __('Isc Memos');?></h2>
<?php

header('Expires:');
header('Cache-Control:');
header('Pragma:');

?>
	<div>
		<?php
			/** 検索 */
			//echo $this->Form->create('Change', array('action' => 'index', 'default' => false, 'class' => 'form-horizontal'));
			echo $this->Form->create('IscMemo', array('class' => 'form-horizontal'));
		?>
		<table>
			<tr>
				<td valign="top" style="padding-right:20px">
					<?php
						echo $this->Form->input('memo_title', array('label'=>'タイトル'));

						echo $this->Form->input(
							'isc_memo_category_id',
							array('label'=>'情報区分',
								'type'=>'select',
								'empty'=>'- 選択してください -',
								'options'=>$isc_memo_category_id)
							);
						echo $this->Form->input('tag', array('label'=>'タグ'));

					?>
				</td>
				<td valign="top">
					<?php
						echo $this->Form->input(
							'created_id',
							array('label'=>'投稿者',
								'type'=>'select',
								'empty'=>'- 選択してください -',
								'options'=>$created_id)
							);
						echo $this->Form->label(
							'memo_date',
							'メモ日'
						);
						echo $this->Form->input(
							'memodate_start',
							array(
								'label' => false,
								'type' => 'date',
								'dateFormat' => 'YMD',
								'minYear' => 2000,
								'maxYear' => date('Y'),
								'monthNames' => false,
								'separator' => '/',
								'empty' => '-',
								'class' => 'input-mini ',
								'div' => false,
							)
						);
						echo ' ～ ';
						echo $this->Form->input(
							'memodate_end',
							array(
								'label' => false,
								'type' => 'date',
								'dateFormat' => 'YMD',
								'minYear' => 2000,
								'maxYear' => date('Y'),
								'monthNames' => false,
								'separator' => '/',
								'empty' => '-',
								'class' => 'input-mini',
								'div' => false
							)
						);
						echo $this->Form->input('Memo', array('label'=>'メモ本文','type' => 'text','class' => 'input-xlarge'));
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
			<th><?php echo $this->Paginator->sort('タイトル');?></th>
			<th><?php echo $this->Paginator->sort('情報提供日');?></th>
			<th><?php echo $this->Paginator->sort('情報提供元');?></th>
			<th><?php echo $this->Paginator->sort('情報区分');?></th>
			<th><?php echo $this->Paginator->sort('タグ');?></th>
			<th><?php echo $this->Paginator->sort('投稿者');?></th>
			<th class="actions"></th>
	</tr>
	<?php
	foreach ($iscMemos as $iscMemo): ?>
	<tr>
		<td><?php echo h($iscMemo['IscMemo']['memo_title']); ?>&nbsp;</td>
		<td><?php echo date("Y年n月j日" , strtotime($iscMemo['IscMemo']['memo_date'])) ?>&nbsp;</td>
		<td><?php echo h($iscMemo['IscMemo']['source']); ?>&nbsp;</td>
		<td><?php echo h($iscMemo['IscMemoCategory']['memo_category_name']); ?>&nbsp;</td>
		<td><?php echo h($iscMemo['IscMemo']['tag']); ?>&nbsp;</td>
		<td><?php echo h($iscMemo['User']['user_full_name']); ?>&nbsp;</td>
		<td class="actions">
<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $iscMemo['IscMemo']['id']),array('class' => 'btn btn-primary btn-small')); ?>
<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $iscMemo['IscMemo']['id']),array('class' => 'btn btn-primary btn-small')); ?>
			<?php  echo $this->Form->postLink(__('削除'), array('action' => 'delete', $iscMemo['IscMemo']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $iscMemo['IscMemo']['id'])); ?>

				
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Memo'), array('action' => 'add')); ?></li>
	</ul>
</div>
