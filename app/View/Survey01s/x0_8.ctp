<div class="survey01s form">
<?php echo $this->Form->create('Survey01'); ?>
	<fieldset>
	<?php
$options = array('1' => 'good', '2' => 'fine', '3'=>'Okey', '4'=>'Soso', '5'=>'bad');
$attributes = array('legend' => 'title' );
echo $this->Form->radio('h1', $options, $attributes);

echo $this->Form->radio('h2_81', $options, $attributes);
echo $this->Form->radio('h2_82', $options, $attributes);
echo $this->Form->radio('h2_83', $options, $attributes);
echo $this->Form->radio('h2_84', $options, $attributes);
echo $this->Form->radio('h2_85', $options, $attributes);
echo $this->Form->radio('h2_86', $options, $attributes);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
