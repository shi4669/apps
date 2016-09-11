<div class="IscMemos view">

	<legend><?php echo __('メモの詳細'); ?></legend>

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
				<td><?php echo h($iscMemo['IscMemo']['id']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>連携情報</font></td>
				<td><?php echo h($iscMemo['IscMemo']['memo_title']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>情報提供日</font></td>
			    <td><?php echo date("Y年n月j日" , strtotime($iscMemo['IscMemo']['memo_date'])); ?></td>
			</tr>
			<tr>
				<td><font color=blue>情報提供元</font></td>
				<td><?php echo h($iscMemo['IscMemo']['source']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>情報区分</font></td>
				<td><?php echo h($isc_memo_category); ?></td>
			</tr>
			<tr>
				<td><font color=blue>タグ</font></td>
				<td><?php echo h($iscMemo['IscMemo']['tag']); ?></td>
			</tr>
			</tbody>
	</table>

	<p class="bg-primary"><h4>情報詳細</h4></p>
	<p style="background-color:#E6E6FA;border:1px dotted #CCCCCC;padding:5px; overflow:auto;">
		<?php echo nl2br(h($iscMemo['IscMemo']['memo1'])); ?>
	</p>

	 <br><br>
	<p class="bg-primary"><h4>他社見解など</h4></p>
	 	<p style="background-color:#E6E6FA;border:1px dotted #CCCCCC;padding:5px; overflow:auto;">
		<?php echo nl2br(h($iscMemo['IscMemo']['memo2'])); ?>
	</p>

	 <br><br>

	<p class="bg-primary"><h4>状況</h4></p>
	 	<p style="background-color:#E6E6FA;border:1px dotted #CCCCCC;padding:5px; overflow:auto;">
		<?php echo nl2br(h($iscMemo['IscMemo']['memo3'])); ?>
	</p>
	 <br><br>

	<p class="bg-primary"><h4>参考資料など</h4></p>
	 	<p style="background-color:#E6E6FA;border:1px dotted #CCCCCC;padding:5px; overflow:auto;">
		<?php echo nl2br(h($iscMemo['IscMemo']['memo3'])); ?>
	</p>	 
<div>
	<h4><?php echo __('登録情報'); ?></h4>
	<ul>
	<li><font color=red><?php echo h($iscMemo['IscMemo']['created']); ?></font><font color=blue> <?php echo h($created_id_name); ?></font>さんに新規登録されました。</li>
	<li><font color=red><?php echo h($iscMemo['IscMemo']['modified']); ?></font><font color=blue> <?php echo h($updated_id_name); ?></font>さんに最終更新されました。</li>
	</ul>
</div>
<br><br>

