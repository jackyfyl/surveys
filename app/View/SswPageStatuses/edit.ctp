<div class="sswPageStatuses form">
<?php echo $this->Form->create('SswPageStatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ssw Page Status'); ?></legend>
	<?php
		echo $this->Form->input('page_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SswPageStatus.page_id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SswPageStatus.page_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ssw Page Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Suishiwens'), array('controller' => 'suishiwens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Suishiwen'), array('controller' => 'suishiwens', 'action' => 'add')); ?> </li>
	</ul>
</div>
