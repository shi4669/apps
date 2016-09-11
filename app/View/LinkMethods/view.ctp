<div class="linkMethods view">
<h2><?php  echo __('Link Method');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($linkMethod['LinkMethod']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Method Name'); ?></dt>
		<dd>
			<?php echo h($linkMethod['LinkMethod']['link_method_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Link Method'), array('action' => 'edit', $linkMethod['LinkMethod']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Link Method'), array('action' => 'delete', $linkMethod['LinkMethod']['id']), null, __('Are you sure you want to delete # %s?', $linkMethod['LinkMethod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Link Methods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Link Method'), array('action' => 'add')); ?> </li>
	</ul>
</div>
