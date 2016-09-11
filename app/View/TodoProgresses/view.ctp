<div class="todoProgresses view">
<h2><?php  echo __('Todo Progress');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($todoProgress['TodoProgress']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Progress Name'); ?></dt>
		<dd>
			<?php echo h($todoProgress['TodoProgress']['progress_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Todo Progress'), array('action' => 'edit', $todoProgress['TodoProgress']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Todo Progress'), array('action' => 'delete', $todoProgress['TodoProgress']['id']), null, __('Are you sure you want to delete # %s?', $todoProgress['TodoProgress']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Todo Progresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Todo Progress'), array('action' => 'add')); ?> </li>
	</ul>
</div>
