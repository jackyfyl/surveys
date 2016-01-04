<div class="suishiwens">
	<h2><?php echo __('问卷 '.$page_id.' 状态'); ?></h2>
<?php if ($page_status == 'offline') {
?>
	<h3>下线</h3> 
<?php
}
else {?>
	<h3>在线</h3>
<?php
}
?>

	<form action="/SswPageStatuses/edit/<?php echo $page_id;?>" method="POST">

<?php if ($page_status == 'offline') {
?>
	<input type="hidden" name="data[SswPageStatus][page_id]" value="<?php echo $page_id;?>"></input>
	<input type="hidden" name="data[SswPageStatus][status]" value="online"></input>
	<input type="hidden" name="redirect" value="/suishiwens/dashboard/<?php echo $page_id;?>"></input>
	<button type="submit">上线</button> 
<?php
}
else {?>
	<input type="hidden" name="data[SswPageStatus][page_id]" value="<?php echo $page_id;?>"></input>
	<input type="hidden" name="data[SswPageStatus][status]" value="offline"></input>
	<input type="hidden" name="redirect" value="/suishiwens/dashboard/<?php echo $page_id;?>"></input>
	<button type="submit">下线</button> 
<?php
}
?>
</form>
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
		<td><?php echo ($count_all == 0)?'-':floor($count_finished/$count_all*100).'%'; ?></td>
	</table>
</div>

<div>
	<h2><?php echo __('下载原始数据'); ?></h2>
<br>&nbsp;
<a href="/Suishiwens/download_rawdata/<?php echo $page_id;?>">开始下载</a>
</div>
