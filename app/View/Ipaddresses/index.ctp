<div class="ipaddresses index">
	<h2><?php echo __('IPアドレス一覧');?></h2>

<?php

header('Expires:');
header('Cache-Control:');
header('Pragma:');

?>
        <div>
                <?php
                        /** 検索 */
                        //echo $this->Form->create('Change', array('action' => 'index', 'default' => false, 'class' => 'form-horizontal'));
                        echo $this->Form->create('Ipaddress', array('class' => 'form-horizontal'));
                ?>
                <table>
                        <tr>
                                <td valign="top" style="padding-right:20px">
                                        <?php
                                                echo $this->Form->input('todo_title', array('label'=>'IPアドレス'));
                                                echo $this->Form->input(
                                                        'task_category_id',
                                                        array('label'=>'セグメント',
                                                                'type'=>'select',
                                                                'empty'=>'- 選択してください -',
                                                                'options'=>$segment_id)
                                                        );
                                                echo $this->Form->input(
                                                        'todo_category_id',
                                                        array('label'=>'IP種別',
                                                                'type'=>'select',
                                                                'empty'=>'- 選択してください -',
                                                                'options'=>$ip_div_id)
                                                        );
                                                echo $this->Form->input('prj_name', array('label'=>'ホスト名'));
                                                echo $this->Form->input('prj_name', array('label'=>'タグ'));

                                        ?>
                                </td>

                                <td valign="top">

                                        <?php
                                                echo $this->Form->input('tag', array('label'=>'DNSドメイン'));
                                                echo $this->Form->input(
                                                        'todo_progress_id',
                                                        array('label'=>'割当状態',
                                                                'type'=>'select',
                                                                'empty'=>'- 選択してください -',
                                                                'options'=>$ip_status_id)
                                                        );
                                                echo $this->Form->input(
                                                        'created_id',
                                                        array('label'=>'機器種別',
                                                                'type'=>'select',
                                                                'empty'=>'- 選択してください -',
                                                                'options'=>$created_id)
                                                        );
                                                echo $this->Form->input('prj_name', array('label'=>'申請者'));
                                                echo $this->Form->label(
                                                        'todo_date',
                                                        '申請日'
                                                );
                                                echo $this->Form->input(
                                                        'todo_date_start',
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
                                                        'todo_date_end',
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

        <br>

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
		&nbsp;
		<?php
			echo $this->Html->link(
				__('一括初期登録'),
				array(
					'action' => 'add'
				),
				array('class' => 'btn btn-primary btn-small')
			);
		?>
		&nbsp;
		<?php
			echo $this->Html->link(
				__('インポート'),
				array(
					'action' => 'add'
				),
				array('class' => 'btn btn-primary btn-small')
			);
		?>
		<?php
			echo $this->Html->link(
				__('エクスポート'),
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
			<th><?php echo $this->Paginator->sort('IPアドレス');?></th>
			<th><?php echo $this->Paginator->sort('セグメント');?></th>
			<th><?php echo $this->Paginator->sort('ホスト名');?></th>
			<th><?php echo $this->Paginator->sort('ホスト詳細');?></th>
			<th><?php echo $this->Paginator->sort('IP種別');?></th>
			<th><?php echo $this->Paginator->sort('ステータス');?></th>
			<th><?php echo $this->Paginator->sort('機器区分');?></th>
			<th><?php echo $this->Paginator->sort('申請者');?></th>
			<th><?php echo $this->Paginator->sort('申請日');?></th>
	</tr>
	<?php
	foreach ($ipaddresses as $ipaddress): ?>
	<tr>
		<td><?php echo h($ipaddress['Ipaddress']['id']); ?>&nbsp;</td>
		<td><?php echo h($ipaddress['Ipaddress']['ipaddress']); ?>&nbsp;</td>
		<td><?php echo h($ipaddress['Segment']['segment_name']); ?>&nbsp;</td>
		<td><?php echo h($ipaddress['Ipaddress']['hostname']); ?>&nbsp;</td>
		<td><?php echo h($ipaddress['Ipaddress']['host_detail']); ?>&nbsp;</td>
		<td><?php echo h($ipaddress['IpDivCategory']['ip_div_name']); ?>&nbsp;</td>
		<td><?php echo h($ipaddress['IpStatusCategory']['ip_status_name']); ?>&nbsp;</td>
		<td><?php echo h($ipaddress['DeviceCategory']['device_name']); ?>&nbsp;</td>
		<td><?php echo h($ipaddress['Ipaddress']['requester']); ?>&nbsp;</td>
        <td><?php echo date("Y年n月j日" , strtotime($ipaddress['Ipaddress']['request_date'])) ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('参照'), array('action' => 'view', $ipaddress['Ipaddress']['id']),array('class' => 'btn btn-primary btn-small')); ?>
			<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $ipaddress['Ipaddress']['id']),array('class' => 'btn btn-primary btn-small')); ?>
            <?php  echo $this->Form->postLink(__('削除'), array('action' => 'delete', $ipaddress['Ipaddress']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $ipaddress['Ipaddress']['id'])); ?>


	 
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
		<li><?php echo $this->Html->link(__('New Ipaddress'), array('action' => 'add')); ?></li>
	</ul>
</div>
