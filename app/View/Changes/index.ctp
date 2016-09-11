<div class="changes index">
	<h2><?php echo __('システム変更履歴');?></h2>

	<div>
		<?php
			/** 検索 */
			//echo $this->Form->create('Change', array('action' => 'index', 'default' => false, 'class' => 'form-horizontal'));
			echo $this->Form->create('Change', array('class' => 'form-horizontal'));
		?>
		<table>
			<tr>
				<td valign="top" style="padding-right:20px">
					<?php
						echo $this->Form->input('change_title', array('label'=>'作業名'));
						echo $this->Form->input('change_target', array('label'=>'対象機器'));
						echo $this->Form->input(
							'change_div',
							array('label'=>'作業区分',
								'type'=>'select',
								'empty'=>'- 選択してください -',
								'options'=>$change_divs)
							);
						echo $this->Form->input(
							'change_status',
							array('label'=>'作業状況',
								'type'=>'select',
								'empty'=>'- 選択してください -',
								'options'=>$change_status)
							);
					?>
				</td>
				<td valign="top">
					<?php
						echo $this->Form->input(
							'change_doc_div',
							array('label'=>'資料の更新有無',
								'type'=>'select',
								'empty'=>'- 選択してください -',
								'options'=>$general_code)
							);
						echo $this->Form->input(
							'shared_div',
							array('label'=>'周知情報の有無',
								'type'=>'select',
								'empty'=>'- 選択してください -',
								'options'=>$general_code)
							);
						echo $this->Form->input('email', array('label'=>'メールアドレス'));
						echo $this->Form->label(
							'lasttrade',
							'最終取引日'
						);
						echo $this->Form->input(
							'lasttrade_start',
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
							'lasttrade_end',
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
			<th width=20><?php echo __('id');?></th>
			<th><?php echo __('対象機器');?></th>
			<th width=300><?php echo __('作業内容');?></th>
			<th><?php echo __('作業予定/完了日');?></th>
			<th><?php echo __('作業区分');?></th>
			<th><?php echo __('作業状況');?></th>
			<th><?php echo __('');?></th>
	<?php
	foreach ($changes as $change): ?>
	<tr>
		<td width=20><?php echo h($change['Change']['id']); ?>&nbsp;</td>
		<td><?php echo h($change['Change']['change_target']); ?>&nbsp;</td>
		<td width=300><?php echo h($change['Change']['change_title']); ?>&nbsp;</td>
		<td><?php echo date("Y年n月j日" , strtotime($change['Change']['change_target_date'])) ?>&nbsp;</td>
		<td><?php echo h($change['ChangeDiv']['change_div_name']); ?>&nbsp;</td>
		<td><?php echo h($change['ChangeProgress']['progress_name']); ?>&nbsp;</td>

		<td class="actions">

			<?php
	 			echo $this->Html->link(__('参照'), array('action' => 'view', $change['Change']['id']),array('class' => 'btn btn-primary btn-small'));
			?>
			<?php
				echo $this->Html->link(__('更新'), array('action' => 'edit', $change['Change']['id']),array('class' => 'btn btn-primary btn-small'));
			?>
			<?php
									   echo $this->Form->postLink(__('削除'), array('action' => 'delete', $change['Change']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $change['Change']['id'])); ?>
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
