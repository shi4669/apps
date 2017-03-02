<div class="ipDivCategories view">
<h2><?php  echo __('Ip Div Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ipDivCategory['IpDivCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Div Name'); ?></dt>
		<dd>
			<?php echo h($ipDivCategory['IpDivCategory']['ip_div_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ip Div Category'), array('action' => 'edit', $ipDivCategory['IpDivCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ip Div Category'), array('action' => 'delete', $ipDivCategory['IpDivCategory']['id']), null, __('Are you sure you want to delete # %s?', $ipDivCategory['IpDivCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ip Div Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ip Div Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
