<div class="survey01s form">
<?php echo $this->Form->create('Survey01'); ?>
	<fieldset>
	<?php
$options = array('1' => 'good', '2' => 'fine', '3'=>'Okey', '4'=>'Soso', '5'=>'bad');
$attributes = array('legend' => 'title' );
echo $this->Form->radio('g1', $options, $attributes);

echo $this->Form->radio('g2_71', $options, $attributes);
echo $this->Form->radio('g2_72', $options, $attributes);
echo $this->Form->radio('g2_73', $options, $attributes);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
