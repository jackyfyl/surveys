<div class="investmentPreferenceSurveys form">
<?php echo $this->Form->create('InvestmentPreferenceSurvey'); ?>
	<fieldset>
		<legend><?php echo __('Add Investment Preference Survey'); ?></legend>
	<?php
		echo $this->Form->input('q01');
		echo $this->Form->input('q02');
		echo $this->Form->input('q03');
		echo $this->Form->input('q04');
		echo $this->Form->input('q05');
		echo $this->Form->input('q06');
		echo $this->Form->input('q07');
		echo $this->Form->input('q08');
		echo $this->Form->input('q09');
		echo $this->Form->input('q10');
		echo $this->Form->input('q11');
		echo $this->Form->input('q12');
		echo $this->Form->input('q13');
		echo $this->Form->input('q14');
		echo $this->Form->input('q15');
		echo $this->Form->input('q16');
		echo $this->Form->input('q17');
		echo $this->Form->input('q18');
		echo $this->Form->input('q19');
		echo $this->Form->input('q20');
		echo $this->Form->input('userid');
		echo $this->Form->input('wxopenid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Investment Preference Surveys'), array('action' => 'index')); ?></li>
	</ul>
</div>
