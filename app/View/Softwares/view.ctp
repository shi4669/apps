<div class="softwares view">
<h2><?php  echo __('Software');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($software['Software']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loaded'); ?></dt>
		<dd>
			<?php echo h($software['Software']['loaded']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Host Name'); ?></dt>
		<dd>
			<?php echo h($software['Software']['host_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Software Name'); ?></dt>
		<dd>
			<?php echo h($software['Software']['software_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Version'); ?></dt>
		<dd>
			<?php echo h($software['Software']['version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maker'); ?></dt>
		<dd>
			<?php echo h($software['Software']['maker']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Input Div'); ?></dt>
		<dd>
			<?php echo h($software['Software']['input_div']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Id'); ?></dt>
		<dd>
			<?php echo h($software['Software']['created_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Id'); ?></dt>
		<dd>
			<?php echo h($software['Software']['updated_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($software['Software']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($software['Software']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Software'), array('action' => 'edit', $software['Software']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Software'), array('action' => 'delete', $software['Software']['id']), null, __('Are you sure you want to delete # %s?', $software['Software']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Softwares'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Software'), array('action' => 'add')); ?> </li>
	</ul>
</div>
