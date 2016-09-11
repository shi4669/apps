<div class="templates view">
	<legend><?php echo __('メールテンプレートの詳細'); ?></legend>
	<p class="bg-primary"><h4>基本情報</h4></p>
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
				<td><?php echo h($template['Template']['id']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>テンプレート名</font></td>
				<td><?php echo h($template['Template']['templates_name']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>業務区分</font></td>
				<td><?php echo h($task_category); ?></td>
			</tr>
			<tr>
				<td><font color=blue>件名</font></td>
				<td><?php echo h($template['Template']['subject']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>宛先</font></td>
				<td><?php echo h($template['Template']['destination']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>添付ファイル</font></td>
				<td><?php echo h($template['Template']['attachment']); ?></td>
			</tr>
			</tbody>
	</table>

	<p class="bg-primary"><h4>本文テンプレート</h4></p>
	<p style="background-color:#E6E6FA;border:1px dotted #CCCCCC;padding:5px; overflow:auto;">
		<?php echo nl2br(h($template['Template']['mail_templates'])); ?>
	</p>

	 <br><br>
	<p class="bg-primary"><h4>付加情報</h4></p>
 	<table  style="table-layout: fixed;">
		<thead>
			<tr>
				<th th width=200 align=right>項目</th>
				<th>入力内容</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td><font color=blue>こんな時に使う</font></td>
				<td><?php echo h($template['Template']['situation']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>補足情報</font></td>
				<td><?php echo h($template['Template']['usages']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>タグ</font></td>
				<td><?php echo h($template['Template']['tag']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>メモ</font></td>
				<td><?php echo h($template['Template']['memo']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>更新履歴</font></td>
				<td><?php echo nl2br(h($template['Template']['history'])); ?></td>
			</tr>
			</tbody>
	</table>

	 
</div>
<br>
<div>
	<h4><?php echo __('テンプレート登録情報'); ?></h4>
	<ul>
	<li><font color=red><?php echo h($template['Template']['created']); ?></font><font color=blue> <?php echo h($created_id_name); ?></font>さんに新規登録されました。</li>
	<li><font color=red><?php echo h($template['Template']['modified']); ?></font><font color=blue> <?php echo h($updated_id_name); ?></font>さんに最終更新されました。</li>
	</ul>
</div>
<br><br>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('一覧画面へ'), array('action' => 'index')); ?> </li>
	</ul>
</div>
