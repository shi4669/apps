<div class="ipaddresses view">
	<legend><?php echo __('IPアドレスの詳細'); ?></legend>
 	<table  style="table-layout: fixed;">
		<thead>
			<tr>
				<th th width=200 align=right>項目</th>
				<th>入力内容</th>
			</tr>
	 			<tr>
				<td><font color=blue>登録ID</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['id']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>IPアドレス</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['ipaddress']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>セグメント名称</font></td>
				<td><?php echo h($segment_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>ホスト名</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['hostname']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>ホスト詳細</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['host_detail']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>機器種別</font></td>
				<td><?php echo h($device_category_id_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>IP種別</font></td>
				<td><?php echo h($ip_div_id_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>PING応答</font></td>
				<td><?php echo h($icmp_div_id_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>割当状態</font></td>
				<td><?php echo h($ip_status_id_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>監視機器</font></td>
				<td><?php echo h($mointor_device_id_name); ?></td>
			</tr>
			<tr>
				<td><font color=blue>申請者</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['requester']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>申請日</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['request_date']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>タグ</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['tag']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>DNSドメイン</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['dns_domain']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>レコード登録された<BR>DNSサーバ</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['dns_server']); ?></td>
			</tr>
			<tr>
				<td><font color=blue>一口コメント</font></td>
				<td><?php echo h($ipaddress['Ipaddress']['comment']); ?></td>
			</tr>

		</thead>
		<tbody>	 	 	 
		</tbody>
	</table>

	<p class="bg-primary"><h4>メモ本文</h4></p>
	<p>
		<?php echo nl2br(h($ipaddress['Ipaddress']['memo1'])); ?>
	</p><BR><BR>
	<p class="bg-primary"><h4>補足情報</h4></p>
	<p>
		<?php echo nl2br(h($ipaddress['Ipaddress']['memo2'])); ?>
	</p><BR><BR>
<div>
	<h4><?php echo __('IPアドレス登録情報'); ?></h4>
	<ul>
	<li><font color=red><?php echo h($ipaddress['Ipaddress']['created']); ?></font><font color=blue> <?php echo h($created_id_name); ?></font>さんに新規登録されました。</li>
	<li><font color=red><?php echo h($ipaddress['Ipaddress']['modified']); ?></font><font color=blue> <?php echo h($updated_id_name); ?></font>さんに最終更新されました。</li>
	</ul>
</div>
<br><br>	 
