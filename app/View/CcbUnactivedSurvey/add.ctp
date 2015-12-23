<div class="ccbSurveys form">
<?php echo $this->Form->create('CcbUnactivedSurvey'); ?>
	<fieldset>
		<legend><?php echo __('Add Ccb Survey'); ?></legend>
	<?php
		echo $this->Form->input('q01');
		echo $this->Form->input('q02');
		echo $this->Form->input('q03');
		echo $this->Form->input('q04');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ccb Surveys'), array('action' => 'index')); ?></li>
	</ul>
</div>
