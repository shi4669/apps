<div class="icmpDivCategories view">
<h2><?php  echo __('Icmp Div Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($icmpDivCategory['IcmpDivCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icmp Div Name'); ?></dt>
		<dd>
			<?php echo h($icmpDivCategory['IcmpDivCategory']['icmp_div_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Icmp Div Category'), array('action' => 'edit', $icmpDivCategory['IcmpDivCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Icmp Div Category'), array('action' => 'delete', $icmpDivCategory['IcmpDivCategory']['id']), null, __('Are you sure you want to delete # %s?', $icmpDivCategory['IcmpDivCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Icmp Div Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Icmp Div Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
