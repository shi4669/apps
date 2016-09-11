<div class="memos index">
	<h2><?php echo __('メモ');?></h2>

<?php

header('Expires:');
header('Cache-Control:');
header('Pragma:');

?>
	<div>
		<?php
			/** 検索 */
			//echo $this->Form->create('Change', array('action' => 'index', 'default' => false, 'class' => 'form-horizontal'));
			echo $this->Form->create('Memo', array('class' => 'form-horizontal'));
		?>
		<table>
			<tr>
				<td valign="top" style="padding-right:20px">
					<?php
						echo $this->Form->input('memo_title', array('label'=>'メモタイトル'));

						echo $this->Form->input(
							'task_category_id',
							array('label'=>'業務区分',
								'type'=>'select',
								'empty'=>'- 選択してください -',
								'options'=>$task_category_id)
							);
							echo $this->Form->input('prj_name', array('label'=>'案件名'));
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
			<th width=250><?php echo $this->Paginator->sort('メモタイトル');?></th>
			<th><?php echo $this->Paginator->sort('メモ日');?></th>
			<th><?php echo $this->Paginator->sort('公開区分');?></th>
			<th><?php echo $this->Paginator->sort('業務区分');?></th>
			<th><?php echo $this->Paginator->sort('案件名');?></th>
			<th><?php echo $this->Paginator->sort('タグ');?></th>
			<th><?php echo $this->Paginator->sort('投稿者');?></th>
			<th class="actions"></th>
	</tr>
	<?php
	foreach ($memos as $memo): ?>
	<tr>
		<td><font color=blue><?php echo h($memo['Memo']['memo_title']); ?>&nbsp;</font></td>
		<td><?php echo date("Y年n月j日" , strtotime($memo['Memo']['memo_date'])) ?>&nbsp;</td>
		<td><font color=red><?php echo h($memo['MemoCategory']['memo_category_name']); ?>&nbsp;</font></td>
		<td><?php echo h($memo['TaskCategory']['task_category_name']); ?>&nbsp;</td>
		<td><font color=red><?php echo h($memo['Memo']['prj_name']); ?>&nbsp;</font></td>
		<td><font color=green><?php echo h($memo['Memo']['tag']); ?>&nbsp;</font></td>
		<td><?php echo h($memo['User']['user_full_name']); ?>&nbsp;</td>
		<td class="actions">
<?php echo $this->Html->link(__('参照'), array('action' => 'view', $memo['Memo']['id']),array('class' => 'btn btn-primary btn-small')); ?>
<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $memo['Memo']['id']),array('class' => 'btn btn-primary btn-small')); ?>
			<?php  echo $this->Form->postLink(__('削除'), array('action' => 'delete', $memo['Memo']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $memo['Memo']['id'])); ?>

				
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
	<?php $this->Paginator->options(array('url' => $searchword)); ?>
<?php
foreach ($searchword as $search_key => $search_value) {
	echo $search_value;
}

;?> 
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
