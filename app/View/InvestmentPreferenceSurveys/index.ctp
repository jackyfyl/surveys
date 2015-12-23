<div class="investmentPreferenceSurveys index">
	<h2><?php echo __('Investment Preference Surveys'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('q01'); ?></th>
			<th><?php echo $this->Paginator->sort('q02'); ?></th>
			<th><?php echo $this->Paginator->sort('q03'); ?></th>
			<th><?php echo $this->Paginator->sort('q04'); ?></th>
			<th><?php echo $this->Paginator->sort('q05'); ?></th>
			<th><?php echo $this->Paginator->sort('q06'); ?></th>
			<th><?php echo $this->Paginator->sort('q07'); ?></th>
			<th><?php echo $this->Paginator->sort('q08'); ?></th>
			<th><?php echo $this->Paginator->sort('q09'); ?></th>
			<th><?php echo $this->Paginator->sort('q10'); ?></th>
			<th><?php echo $this->Paginator->sort('q11'); ?></th>
			<th><?php echo $this->Paginator->sort('q12'); ?></th>
			<th><?php echo $this->Paginator->sort('q13'); ?></th>
			<th><?php echo $this->Paginator->sort('q14'); ?></th>
			<th><?php echo $this->Paginator->sort('q15'); ?></th>
			<th><?php echo $this->Paginator->sort('q16'); ?></th>
			<th><?php echo $this->Paginator->sort('q17'); ?></th>
			<th><?php echo $this->Paginator->sort('q18'); ?></th>
			<th><?php echo $this->Paginator->sort('q19'); ?></th>
			<th><?php echo $this->Paginator->sort('q20'); ?></th>
			<th><?php echo $this->Paginator->sort('userid'); ?></th>
			<th><?php echo $this->Paginator->sort('wxopenid'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($investmentPreferenceSurveys as $investmentPreferenceSurvey): ?>
	<tr>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['id']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q01']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q02']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q03']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q04']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q05']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q06']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q07']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q08']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q09']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q10']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q11']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q12']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q13']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q14']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q15']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q16']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q17']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q18']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q19']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q20']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['userid']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['wxopenid']); ?>&nbsp;</td>
		<td><?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $investmentPreferenceSurvey['InvestmentPreferenceSurvey']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $investmentPreferenceSurvey['InvestmentPreferenceSurvey']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $investmentPreferenceSurvey['InvestmentPreferenceSurvey']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $investmentPreferenceSurvey['InvestmentPreferenceSurvey']['id']))); ?>
		</td>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Investment Preference Survey'), array('action' => 'add')); ?></li>
	</ul>
</div>
