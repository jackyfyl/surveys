<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
	?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<script src="/js/jquery-1.11.3.min.js"></script>
<style type="text/css">
	
body {
	background:#e6e6e6;
    -webkit-font-smoothing: antialiased;
	font-family: 'Lucida Grande', 'Helvetica Neue', Helvetica, 'Microsoft YaHei', Arial, sans-serif;
}
</style>
<script type="text/javascript">
$(function(){
	var total_width = $(document).width();
	
	$("#Pic").css("height", total_width * 0.2);

	
	$(document).ready(function() {
		$("#handpic").load(function(){
			$("#main").animate({ top: 1.5 * total_width }, "slow");
			$("#hand").animate({ top: 1.5 * total_width }, "slow", function()
			{
				$("#hand").animate({ top:  total_width }, "slow");
			});
		});

		if($('#handpic').complete) {
			$('#handpic').load();
		}
	})
});	
</script>

</head>
<body>
			<?php echo $this->fetch('content'); ?>
</body>
		<?php echo $this->fetch('script');?>
</html>
