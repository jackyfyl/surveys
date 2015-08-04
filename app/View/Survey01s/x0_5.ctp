<div class="survey01s form">
<?php echo $this->Form->create('Survey01'); ?>
	<fieldset>
	<?php
$options = array('1' => 'good', '2' => 'fine', '3'=>'Okey', '4'=>'Soso', '5'=>'bad');
$attributes = array('legend' => 'title' );
echo $this->Form->radio('e1', $options, $attributes);

echo $this->Form->radio('e2_51', $options, $attributes);
echo $this->Form->radio('e2_52', $options, $attributes);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
