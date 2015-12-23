<div class="ccbSurveys">
	<h2><?php echo __('Ccb Surveys'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cid'); ?></th>
			<th><?php echo $this->Paginator->sort('q01'); ?></th>
			<th><?php echo $this->Paginator->sort('q02'); ?></th>
			<th><?php echo $this->Paginator->sort('q03'); ?></th>
  			<th><?php echo $this->Paginator->sort('q04'); ?></th>
	</tr>
	</thead>
	<tbody
	<?php foreach ($CcbUnactivedSurveys as $ccbSurvey): ?>
	<tr>
		<td><?php echo h($ccbSurvey['CcbUnactivedSurvey']['id']); ?>&nbsp;</td>
		<td><?php echo h($ccbSurvey['CcbUnactivedSurvey']['cid']); ?>&nbsp;</td>
		<td><?php echo h($ccbSurvey['CcbUnactivedSurvey']['q01']); ?>&nbsp;</td>
		<td><?php echo h($ccbSurvey['CcbUnactivedSurvey']['q02']); ?>&nbsp;</td>
		<td><?php echo h($ccbSurvey['CcbUnactivedSurvey']['q03']); ?>&nbsp;</td>
		<td><?php echo h($ccbSurvey['CcbUnactivedSurvey']['q04']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
