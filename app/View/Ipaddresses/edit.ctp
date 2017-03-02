<div class="ipaddresses form">
<?php echo $this->Form->create('Ipaddress');?>
	<fieldset>
		<legend><?php echo __('Edit Ipaddress'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ipaddress');
		echo $this->Form->input('segment_id');
		echo $this->Form->input('ip_div_id');
		echo $this->Form->input('icmp_div_id');
		echo $this->Form->input('ip_status_id');
		echo $this->Form->input('mointor_device_id');
		echo $this->Form->input('device_category');
		echo $this->Form->input('hostname');
		echo $this->Form->input('host_detail');
		echo $this->Form->input('requester');
		echo $this->Form->input('request_date');
		echo $this->Form->input('tag');
		echo $this->Form->input('dns_domain');
		echo $this->Form->input('dns_server');
		echo $this->Form->input('comment');
		echo $this->Form->input('memo1');
		echo $this->Form->input('memo2');
		echo $this->Form->input('created_id');
		echo $this->Form->input('updated_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ipaddress.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ipaddress.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ipaddresses'), array('action' => 'index'));?></li>
	</ul>
</div>
