<div class="sswPageStatuses view">
<h2><?php echo __('Ssw Page Status'); ?></h2>
	<dl>
		<dt><?php echo __('Suishiwen'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sswPageStatus['SswPageStatus']['page_id'], array('controller' => 'SswPageStatuses', 'action' => 'view', $sswPageStatus['SswPageStatus']['page_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($sswPageStatus['SswPageStatus']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ssw Page Status'), array('action' => 'edit', $sswPageStatus['SswPageStatus']['page_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ssw Page Status'), array('action' => 'delete', $sswPageStatus['SswPageStatus']['page_id']), array(), __('Are you sure you want to delete # %s?', $sswPageStatus['SswPageStatus']['page_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ssw Page Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ssw Page Status'), array('action' => 'add')); ?> </li>
	</ul>
</div>
