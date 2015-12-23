<div class="surveys form">
<?php echo $this->Form->create('Survey'); ?>
	<fieldset>
		<legend><?php echo __('Add Survey'); ?></legend>
	<?php
		echo $this->Form->input('wxopenid');
		echo $this->Form->input('userid');
		echo $this->Form->input('user_agent');
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
		echo $this->Form->input('q21');
		echo $this->Form->input('q22');
		echo $this->Form->input('q23');
		echo $this->Form->input('q24');
		echo $this->Form->input('q25');
		echo $this->Form->input('q26');
		echo $this->Form->input('q27');
		echo $this->Form->input('q28');
		echo $this->Form->input('q29');
		echo $this->Form->input('q30');
		echo $this->Form->input('q31');
		echo $this->Form->input('q32');
		echo $this->Form->input('q33');
		echo $this->Form->input('q34');
		echo $this->Form->input('q35');
		echo $this->Form->input('q36');
		echo $this->Form->input('q37');
		echo $this->Form->input('q38');
		echo $this->Form->input('q39');
		echo $this->Form->input('q40');
		echo $this->Form->input('q41');
		echo $this->Form->input('q42');
		echo $this->Form->input('q43');
		echo $this->Form->input('q44');
		echo $this->Form->input('q45');
		echo $this->Form->input('q46');
		echo $this->Form->input('q47');
		echo $this->Form->input('q48');
		echo $this->Form->input('q49');
		echo $this->Form->input('q50');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index')); ?></li>
	</ul>
</div>
