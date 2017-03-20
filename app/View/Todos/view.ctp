<div class="memos view">

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
				<td><?php echo h($todo['Todo']['id']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>Todoタイトル</font></td>
				<td><?php echo h($todo['Todo']['todo_title']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>Todo期限</font></td>
			    <td><?php echo date("Y年n月j日" , strtotime($todo['Todo']['todo_date'])); ?></td>
			</tr>
			<tr>
				<td><font color=blue>業務区分</font></td>
				<td><?php echo h($task_category); ?></td>
			</tr>
			<tr>
				<td><font color=blue>Todo区分</font></td>
				<td><?php echo h($todo_category); ?></td>
			</tr>
			<tr>
				<td><font color=blue>案件名</font></td>
				<td><?php echo h($todo['Todo']['prj_name']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>タグ</font></td>
				<td><?php echo h($todo['Todo']['tag']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>技術要素</font></td>
				<td><?php echo h($todo['Todo']['element']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>Todo進捗</font></td>
				<td><font color=red><?php echo h($todo_progress); ?></font></td>
			</tr>
			</tbody>
	</table>

	<p class="bg-primary"><h4>メモ本文</h4></p>
	<p style="background-color:#E6E6FA;border:1px dotted #CCCCCC;padding:5px; overflow:auto;">
	<?php
	 	$memo = $todo['Todo']['memo'];
		echo nl2br($this->Text->autoLinkUrls($memo, array( 'target' => '_blank')));
		//echo nl2br(h($this->Text->autoLinkUrls($memo)));
	?>
	</p>

	 <br><br>
	<p class="bg-primary"><h4>補足情報</h4></p>
	<?php
	 	$memo2 = $todo['Todo']['memo2'];
		echo nl2br($this->Text->autoLinkUrls($memo2, array( 'target' => '_blank')));
		//echo nl2br(h($this->Text->autoLinkUrls($memo)));
	?>
			
	</p>

	 <br><br>

<div>
	<h4><?php echo __('メモ登録情報'); ?></h4>
	<ul>
	<li><font color=red><?php echo h($todo['Todo']['created']); ?></font><font color=blue> <?php echo h($created_id_name); ?></font>さんに新規登録されました。</li>
	<li><font color=red><?php echo h($todo['Todo']['modified']); ?></font><font color=blue> <?php echo h($updated_id_name); ?></font>さんに最終更新されました。</li>
	</ul>
</div>
<br><br>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('一覧画面へ'), array('action' => 'index')); ?> </li>
	</ul>
</div>	 

