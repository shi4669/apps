<div class="segments view">
	<legend><?php echo __('セグメントの詳細'); ?></legend>

 	<table  style="table-layout: fixed;">
		<thead>
			<tr>
				<th th width=200 align=right>項目</th>
				<th>入力内容</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><font color=blue>登録ID</font></td>
				<td><?php echo h($segment['Segment']['id']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>セグメント名称</font></td>
				<td><?php echo h($segment['Segment']['segment_name']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>セグメント	IP</font></td>
				<td><?php echo h($segment['Segment']['segment_ipaddress']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>セグメントサブネット</font></td>
				<td><?php echo h($segment['Segment']['segment_subnet']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>ロケーション</font></td>
				<td><?php echo h($location_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>セグメントオーナー</font></td>
				<td><?php echo h($segment_owner_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>ステータス</font></td>
				<td><?php echo h($segment_status_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>セグメント区分</font></td>
				<td><?php echo h($segment_div_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>セグメント開始（終了日）</font></td>
				<td><?php echo h($segment['Segment']['segment_subnet']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>セグメント関連機器</font></td>
				<td><?php echo h($segment['Segment']['segment_source_device']); ?></td>
			</tr>
			</tbody>
	</table>

	<p class="bg-primary"><h4>メモ本文</h4></p>
	<p>
		<?php echo nl2br(h($segment['Segment']['memo'])); ?>
	</p>

<div>
	<h4><?php echo __('メモ登録情報'); ?></h4>
	<ul>
	<li><font color=red><?php echo h($segment['Segment']['created']); ?></font><font color=blue> <?php echo h($created_id_name); ?></font>さんに新規登録されました。</li>
	<li><font color=red><?php echo h($segment['Segment']['modified']); ?></font><font color=blue> <?php echo h($updated_id_name); ?></font>さんに最終更新されました。</li>
	</ul>
</div>
<br><br>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('一覧画面へ'), array('action' => 'index')); ?> </li>
	</ul>
</div>
