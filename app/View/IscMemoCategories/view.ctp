<div class="iscMemoCategories view">
<h2><?php  echo __('Isc Memo Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($iscMemoCategory['IscMemoCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Memo Category Name'); ?></dt>
		<dd>
			<?php echo h($iscMemoCategory['IscMemoCategory']['memo_category_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Isc Memo Category'), array('action' => 'edit', $iscMemoCategory['IscMemoCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Isc Memo Category'), array('action' => 'delete', $iscMemoCategory['IscMemoCategory']['id']), null, __('Are you sure you want to delete # %s?', $iscMemoCategory['IscMemoCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Isc Memo Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Isc Memo Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
