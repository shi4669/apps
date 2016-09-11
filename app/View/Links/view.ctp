<div class="links view">
<h2><?php  echo __('Link');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($link['Link']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Title'); ?></dt>
		<dd>
			<?php echo h($link['Link']['link_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Date'); ?></dt>
		<dd>
			<?php echo h($link['Link']['link_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Category Id'); ?></dt>
		<dd>
			<?php echo h($link['Link']['link_category_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Memo Category Id'); ?></dt>
		<dd>
			<?php echo h($link['Link']['memo_category_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo h($link['Link']['tag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Methods Id'); ?></dt>
		<dd>
			<?php echo h($link['Link']['link_methods_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($link['Link']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Memo'); ?></dt>
		<dd>
			<?php echo h($link['Link']['memo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Id'); ?></dt>
		<dd>
			<?php echo h($link['Link']['created_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Id'); ?></dt>
		<dd>
			<?php echo h($link['Link']['updated_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($link['Link']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($link['Link']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Link'), array('action' => 'edit', $link['Link']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Link'), array('action' => 'delete', $link['Link']['id']), null, __('Are you sure you want to delete # %s?', $link['Link']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Links'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Link'), array('action' => 'add')); ?> </li>
	</ul>
</div>
