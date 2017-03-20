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
				<td><?php echo h($memo['Memo']['id']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>メモタイトル</font></td>
				<td><?php echo h($memo['Memo']['memo_title']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>メモ日</font></td>
			    <td><?php echo date("Y年n月j日" , strtotime($memo['Memo']['memo_date'])); ?></td>
			</tr>
			<tr>
				<td><font color=blue>メモ区分</font></td>
				<td><?php echo h($memo_category); ?></td>
			</tr>
			<tr>
				<td><font color=blue>業務区分</font></td>
				<td><?php echo h($task_category); ?></td>
			</tr>
			<tr>
				<td><font color=blue>案件名</font></td>
			    <td><?php echo h($memo['Memo']['prj_name']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>タグ</font></td>
				<td><?php echo h($memo['Memo']['tag']); ?></td>
			</tr>
			</tbody>
	</table>

	<p class="bg-primary"><h4>メモ本文</h4></p>
	<p style="background-color:#E6E6FA;border:1px dotted #CCCCCC;padding:5px; overflow:auto;">

	<?php
		//$text = 'CakePHPはPHP用の高速開発フレームワークです。http://cakephp.jp/ アプリケーションの開発、メンテナンス、インストールのための拡張性の高い仕組みを提供します。';
	 	$text = $memo['Memo']['memo'];
		echo nl2br($this->Text->autoLinkUrls($text, array( 'target' => '_blank')));
	?>   
	</p>	 
	</p>

	 <br><br>
	<p class="bg-primary"><h4>補足情報</h4></p>

	<?php
		//$text = 'CakePHPはPHP用の高速開発フレームワークです。http://cakephp.jp/ アプリケーションの開発、メンテナンス、インストールのための拡張性の高い仕組みを提供します。';
	 	$text2 = $memo['Memo']['memo2'];
		echo nl2br($this->Text->autoLinkUrls($text2, array( 'target' => '_blank')));
	?>   
	</p>			
	</p>

	 <br><br>

<div>
	<h4><?php echo __('メモ登録情報'); ?></h4>
	<ul>
	<li><font color=red><?php echo h($memo['Memo']['created']); ?></font><font color=blue> <?php echo h($created_id_name); ?></font>さんに新規登録されました。</li>
	<li><font color=red><?php echo h($memo['Memo']['modified']); ?></font><font color=blue> <?php echo h($updated_id_name); ?></font>さんに最終更新されました。</li>
	</ul>
</div>
<br><br>
<div class="actions">
	<ul>
<?php echo $_SERVER['HTTP_REFERER']; ?>
	 
		<li><?php echo $this->Html->link(__('一覧画面へ'), array('action' => 'index')); ?> </li>
	</ul>
</div>	 

