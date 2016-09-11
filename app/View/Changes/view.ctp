<div class="changes view">

	<legend><?php echo __('システム変更履歴の詳細'); ?></legend>
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
				<td><?php echo h($change['Change']['id']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>作業名</font></td>
				<td><?php echo h($change['Change']['change_title']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>作業対象機器</font></td>
				<td><?php echo h($change['Change']['change_target']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>作業対象機器詳細</font></td>
				<td><?php echo h($change['Change']['change_target_detail']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>作業予定日/完了日</font></td>
				<td><?php echo h($change['Change']['change_target_date']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>作業区分</font></td>
				<td><?php echo h($change_divs); ?></td>
			</tr>
			<tr>
				<td><font color=blue>作業状況</font></td>
				<td><?php echo h($change_status); ?></td>
			</tr>
			<tr>
				<td><font color=blue>作業詳細</font></td>
				<td><?php echo h($change['Change']['change_detail']); ?></td>	 
			</tr>
			<tr>
				<td><font color=blue>作業手順書</font></td>
				<td><?php echo h($change['Change']['operation_doc']); ?></td>	 
			</tr>
			<tr>
				<td><font color=blue>サービス停止</font></td>
				<td><?php echo h($service_affect); ?></td>	 
			</tr>
			<tr>
				<td><font color=blue>作業影響</font></td>
				<td><?php echo h($change['Change']['affect_detail']); ?></td>	 
			</tr>
			<tr>
				<td><font color=blue>資料の更新有無</font></td>
				<td><?php echo h($change_doc_div); ?></td>	 
			</tr>
			<tr>
				<td><font color=blue>更新対象の資料</font></td>
				<td><?php echo h($change['Change']['change_doc_detail']); ?></td>	 
			</tr>
			<tr>
				<td><font color=blue>周知情報の有無</font></td>
				<td><?php echo h($shared_div); ?></td>	 
			</tr>
			<tr>
				<td><font color=blue>周知情報</font></td>
				<td><?php echo h($change['Change']['shared_detail']); ?></td>	 
			</tr>
			<tr>
				<td><font color=blue>メモ欄</font></td>
				<td><?php echo h($change['Change']['memo']); ?></td>	 
			</tr>
	
			</tbody>
	</table>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('一覧画面へ'), array('action' => 'index')); ?> </li>
	</ul>
</div>
