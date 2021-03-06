<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
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
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="/js/jquery-1.11.3.min.js"></script>
<style type="text/css">
body {
	background:#e6e6e6;
    -webkit-font-smoothing: antialiased;
	font-family: 'Lucida Grande', 'Helvetica Neue', Helvetica, 'Microsoft YaHei', Arial, sans-serif;
}

input, button { border:0; margin:8px; line-height:18px; font-size:18px }
.btns { 
width:243px; 
height:40px; 
color:#000000;
background: rgb(188, 227, 249);
padding: 0.5em 1em;
border-radius: 12px;
-webkit-border-radius: 12px;
-moz-border-radius: 12px;
-o-border-radius: 12px;

}

@-webkit-keyframes breathe {
    0% { opacity: 1; box-shadow:0 1px 2px rgba(255,255,255,0.1);}
    100% { opacity: 1; border:1px solid rgba(59,235,235,1); box-shadow:0 1px 30px rgba(59,255,255,1);}
}

.Time { 
width:100px; 
height:15px; 
color:#FFFFFF;
background: #B0B0B0;
padding: 0.5em 1em;
border-radius: 5px;
font-size: 13px;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-o-border-radius: 5px;
}

.choice{
	border-bottom: 1px ;
	padding-bottom: 0.3em;
	padding-left: 0.5em;
}
.textwhite{
	width: 80%;
}
#sub {width: 100%;
	height: 2.5em;
	line-height: 2.5em;
	border-radius: 0.2em;
	font-weight: bold;
	color: #ffffff;
	background-color: #2dbe60;
	border: none;
	margin: 1em 0;}
span{
	margin-left: 0.5em;
	font-size: 12px;
	display: inline-block;
	vertical-align: bottom;
	margin-top: 2px;
	color:#666666;
}
.content{ padding: 0.8em;}
.bg{
	padding-top: 0.2em;
	border: 1px;
	border-bottom: none;
}

</style>
<script type="text/javascript">
var currentpos,timer; 


function scrollwindow(index) 
{
	document.documentElement.scrollTop = index;
    window.pageYOffset = index;
	
}

function ScrollTo()
{
	var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
	
	var index = $(document).height()-$(window).height();
	
	if (index != 0)
	{
		$("html, body").animate({ scrollTop: index });
		$("html, body").animate(scrollwindow(index));
	}
}


function DisplayTopic(strMsg)
{
	$(strMsg).fadeIn(200);	
	$('#chatAudio')[0].play();
	ScrollTo();
}

function DisplayTopicWithoutScrol(strMsg)
{
	$(strMsg).fadeIn(200);	
	$('#chatAudio')[0].play();
}


$(function(){ 
	$('<audio id="chatAudio"><source src="notify.ogg" type="audio/ogg"><source src="notify.mp3" type="audio/mpeg"><source src="notify.wav" type="audio/wav"></audio>').appendTo('body');

	var d = new Date();
	var now = "";
	if (d.getHours() < 10)
	{
		now += "0" + d.getHours()+" . ";
	}
	else 
	{
		now += d.getHours()+" . ";
	}
	
	if (d.getMinutes() < 10 )
	{
		now += "0" + d.getMinutes() +" . ";	
	}
	else
	{
		now += d.getMinutes() +" . ";
	}
    $(".Time").text(now);
	$(".Time").fadeIn(200);
	DisplayTopic(".Topic1");
	setTimeout("DisplayTopic('.Topic2')", 800 );
	setTimeout("DisplayTopic('.Topic3')", 1800 );
	

	$(".Q1").click(function(){
		if($(".Topic4").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic4')", 1000 );
		}
	});
	
	$(".Q2").click(function(){
		if($(".Topic5").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic5')", 1000 );
		}
	});	
	
	$(".Q3").click(function(){
		if($(".Topic6").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic6')", 1000 );
		}
	});	
	
	$(".Q4").click(function(){
		if($(".Topic7").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic7')", 1000 );
		}
	});		
	
	$(".Q5").click(function(){
		if($(".Topic8").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic8')", 1000 );
		}
	});			
	
	$(".Q6").click(function(){
		if($(".Topic9").is(":hidden"))
		{
			setTimeout("DisplayTopicWithoutScrol('.Topic9')", 1000 );
			setTimeout("DisplayTopicWithoutScrol('.Topic10')", 1200 );
			setTimeout("DisplayTopic('.Submission')", 1200 );
		}
	});		
});
</script>

</head>
<body>
			<?php echo $this->fetch('content'); ?>
</body>
		<?php echo $this->fetch('script');?>
</html>
