<div class="todoCategories view">
<h2><?php  echo __('Todo Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($todoCategory['TodoCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Todo Category Name'); ?></dt>
		<dd>
			<?php echo h($todoCategory['TodoCategory']['todo_category_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Todo Category'), array('action' => 'edit', $todoCategory['TodoCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Todo Category'), array('action' => 'delete', $todoCategory['TodoCategory']['id']), null, __('Are you sure you want to delete # %s?', $todoCategory['TodoCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Todo Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Todo Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
