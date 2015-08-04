<div class="gsu01s index">
	<h2><?php echo __('Gsu01s'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('emp_id'); ?></th>
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
			<th><?php echo $this->Paginator->sort('q10_1'); ?></th>
			<th><?php echo $this->Paginator->sort('q10_2'); ?></th>
			<th><?php echo $this->Paginator->sort('q10_3'); ?></th>
			<th><?php echo $this->Paginator->sort('q10_4'); ?></th>
			<th><?php echo $this->Paginator->sort('q10_5'); ?></th>
			<th><?php echo $this->Paginator->sort('q10_6'); ?></th>
			<th><?php echo $this->Paginator->sort('q10_7'); ?></th>
			<th><?php echo $this->Paginator->sort('q10_8'); ?></th>
			<th><?php echo $this->Paginator->sort('q12'); ?></th>
			<th><?php echo $this->Paginator->sort('q13'); ?></th>
			<th><?php echo $this->Paginator->sort('c_name'); ?></th>
			<th><?php echo $this->Paginator->sort('c_cell'); ?></th>
			<th><?php echo $this->Paginator->sort('c_unit'); ?></th>
			<th><?php echo $this->Paginator->sort('c_depart'); ?></th>
			<th><?php echo $this->Paginator->sort('c_address'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($gsu01s as $gsu01): ?>
	<tr>
		<td><?php echo h($gsu01['Gsu01']['id']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['emp_id']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q01']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q02']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q03']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q04']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q05']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q06']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q07']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q08']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q09']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q10']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q10_1']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q10_2']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q10_3']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q10_4']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q10_5']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q10_6']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q10_7']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q10_8']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q12']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['q13']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['c_name']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['c_cell']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['c_unit']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['c_depart']); ?>&nbsp;</td>
		<td><?php echo h($gsu01['Gsu01']['c_address']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gsu01['Gsu01']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gsu01['Gsu01']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gsu01['Gsu01']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $gsu01['Gsu01']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Gsu01'), array('action' => 'add')); ?></li>
	</ul>
</div>
