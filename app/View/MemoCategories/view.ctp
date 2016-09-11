<div class="memoCategories view">
<h2><?php  echo __('Memo Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($memoCategory['MemoCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Memo Category Name'); ?></dt>
		<dd>
			<?php echo h($memoCategory['MemoCategory']['memo_category_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Memo Category'), array('action' => 'edit', $memoCategory['MemoCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Memo Category'), array('action' => 'delete', $memoCategory['MemoCategory']['id']), null, __('Are you sure you want to delete # %s?', $memoCategory['MemoCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Memo Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Memo Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
