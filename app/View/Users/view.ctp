<div class="users view">
<legend><?php echo __('ユーザー情報の詳細'); ?></legend>	 

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
				<td><?php echo h($user['User']['id']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>ユーザーID</font></td>
				<td><?php echo h($user['User']['username']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>ユーザー名</font></td>
				<td><?php echo h($user['User']['user_full_name']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>メールアドレス</font></td>
				<td><?php echo h($user['User']['mail_address']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>メール自動配信</font></td>
				<td><?php echo h($user['User']['mail_send_div']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>登録日</font></td>
				<td><?php echo h($user['User']['created']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>更新日</font></td>
				<td><?php echo h($user['User']['modified']); ?></td>
			</tr>
			</tbody>
	</table>


<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('ユーザー一覧へ'), array('action' => 'index')); ?> </li>
	</ul>
</div>
