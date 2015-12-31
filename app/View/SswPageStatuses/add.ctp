<div class="sswPageStatuses form">
<?php echo $this->Form->create('SswPageStatus'); ?>
	<fieldset>
		<legend><?php echo __('Add Ssw Page Status'); ?></legend>
	<?php
		echo $this->Form->input(
			'page_id', array(
				'label' => 'Page ID',
				'type' => 'text'
			)
		);
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ssw Page Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Suishiwens'), array('controller' => 'suishiwens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Suishiwen'), array('controller' => 'suishiwens', 'action' => 'add')); ?> </li>
	</ul>
</div>
