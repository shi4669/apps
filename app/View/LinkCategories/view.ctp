<div class="linkCategories view">
<h2><?php  echo __('Link Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($linkCategory['LinkCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Category Name'); ?></dt>
		<dd>
			<?php echo h($linkCategory['LinkCategory']['link_category_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Link Category'), array('action' => 'edit', $linkCategory['LinkCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Link Category'), array('action' => 'delete', $linkCategory['LinkCategory']['id']), null, __('Are you sure you want to delete # %s?', $linkCategory['LinkCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Link Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Link Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
