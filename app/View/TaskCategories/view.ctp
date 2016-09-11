<div class="taskCategories view">
<h2><?php  echo __('Task Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taskCategory['TaskCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task Category Name'); ?></dt>
		<dd>
			<?php echo h($taskCategory['TaskCategory']['task_category_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Id'); ?></dt>
		<dd>
			<?php echo h($taskCategory['TaskCategory']['created_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Id'); ?></dt>
		<dd>
			<?php echo h($taskCategory['TaskCategory']['updated_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($taskCategory['TaskCategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($taskCategory['TaskCategory']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Task Category'), array('action' => 'edit', $taskCategory['TaskCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Task Category'), array('action' => 'delete', $taskCategory['TaskCategory']['id']), null, __('Are you sure you want to delete # %s?', $taskCategory['TaskCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Task Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
