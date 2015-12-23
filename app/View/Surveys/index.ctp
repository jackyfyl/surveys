<div class="surveys index">
	<h2><?php echo __('Surveys'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('wxopenid'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('userid'); ?></th>
			<th><?php echo $this->Paginator->sort('user_agent'); ?></th>
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
			<th><?php echo $this->Paginator->sort('q21'); ?></th>
			<th><?php echo $this->Paginator->sort('q22'); ?></th>
			<th><?php echo $this->Paginator->sort('q23'); ?></th>
			<th><?php echo $this->Paginator->sort('q24'); ?></th>
			<th><?php echo $this->Paginator->sort('q25'); ?></th>
			<th><?php echo $this->Paginator->sort('q26'); ?></th>
			<th><?php echo $this->Paginator->sort('q27'); ?></th>
			<th><?php echo $this->Paginator->sort('q28'); ?></th>
			<th><?php echo $this->Paginator->sort('q29'); ?></th>
			<th><?php echo $this->Paginator->sort('q30'); ?></th>
			<th><?php echo $this->Paginator->sort('q31'); ?></th>
			<th><?php echo $this->Paginator->sort('q32'); ?></th>
			<th><?php echo $this->Paginator->sort('q33'); ?></th>
			<th><?php echo $this->Paginator->sort('q34'); ?></th>
			<th><?php echo $this->Paginator->sort('q35'); ?></th>
			<th><?php echo $this->Paginator->sort('q36'); ?></th>
			<th><?php echo $this->Paginator->sort('q37'); ?></th>
			<th><?php echo $this->Paginator->sort('q38'); ?></th>
			<th><?php echo $this->Paginator->sort('q39'); ?></th>
			<th><?php echo $this->Paginator->sort('q40'); ?></th>
			<th><?php echo $this->Paginator->sort('q41'); ?></th>
			<th><?php echo $this->Paginator->sort('q42'); ?></th>
			<th><?php echo $this->Paginator->sort('q43'); ?></th>
			<th><?php echo $this->Paginator->sort('q44'); ?></th>
			<th><?php echo $this->Paginator->sort('q45'); ?></th>
			<th><?php echo $this->Paginator->sort('q46'); ?></th>
			<th><?php echo $this->Paginator->sort('q47'); ?></th>
			<th><?php echo $this->Paginator->sort('q48'); ?></th>
			<th><?php echo $this->Paginator->sort('q49'); ?></th>
			<th><?php echo $this->Paginator->sort('q50'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($surveys as $survey): ?>
	<tr>
		<td><?php echo h($survey['Survey']['id']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['wxopenid']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['created']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['userid']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['user_agent']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q01']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q02']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q03']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q04']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q05']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q06']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q07']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q08']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q09']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q10']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q11']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q12']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q13']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q14']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q15']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q16']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q17']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q18']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q19']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q20']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q21']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q22']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q23']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q24']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q25']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q26']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q27']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q28']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q29']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q30']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q31']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q32']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q33']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q34']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q35']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q36']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q37']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q38']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q39']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q40']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q41']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q42']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q43']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q44']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q45']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q46']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q47']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q48']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q49']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['q50']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $survey['Survey']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $survey['Survey']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $survey['Survey']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $survey['Survey']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Survey'), array('action' => 'add')); ?></li>
	</ul>
</div>
