<div class="ipStatusCategories view">
<h2><?php  echo __('Ip Status Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ipStatusCategory['IpStatusCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Status Name'); ?></dt>
		<dd>
			<?php echo h($ipStatusCategory['IpStatusCategory']['ip_status_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ip Status Category'), array('action' => 'edit', $ipStatusCategory['IpStatusCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ip Status Category'), array('action' => 'delete', $ipStatusCategory['IpStatusCategory']['id']), null, __('Are you sure you want to delete # %s?', $ipStatusCategory['IpStatusCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ip Status Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ip Status Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
