<div class="suishiwens">
	<h2><?php echo __('问卷状态'); ?></h2>
		<?php echo $this->Form->button(__('New Suishiwen'), array('action' => 'add')); ?>
</br>&nbsp;
</div>

<div>
	<h2><?php echo __('提交统计'); ?></h2>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo "全部"?></th>
		<th><?php echo "已成功提交"?></th>
		<th><?php echo "未完成"?></th>
		<th><?php echo "成功提交百分比"?></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td><?php echo h($count_all); ?>&nbsp;</td>
		<td><?php echo h($count_finished); ?>&nbsp;</td>
		<td><?php echo h($count_unfinished); ?>&nbsp;</td>
		<td><?php echo floor($count_finished/$count_all*100); ?>%</td>
	</table>
</div>
