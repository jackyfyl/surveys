<?php

function getIp()
{
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	   return $_SERVER['HTTP_CLIENT_IP']; 
	}elseif(!empty($_SERVER['HTTP_X_FORVARDED_FOR'])){
	   return $_SERVER['HTTP_X_FORVARDED_FOR'];
	}elseif(!empty($_SERVER['REMOTE_ADDR'])){
	   return $_SERVER['REMOTE_ADDR'];
	}else{
	   return "0";
	}
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>CPIC车主体验及黏性研究</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="jquery-1.11.3.min.js"></script>
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

var RecordID = 0;

var clientip = 0;

function hideiframe()
{
	$('.frame-container').hide();
	
	if($(".Topic8_1").is(":hidden"))
	{
		setTimeout("DisplayTopic('.Topic8_1')", 1000 );
	}	
}

function keypress4(e)
{
	var e = e || window.event; 
	var k = e.keyCode;
	if (k == 13)
	{
		if($(".Topic5_1").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic5_1')", 1000 );
		}
		
//		onUserSelect(2, $('input[name="Question2"]:checked').val() );	
	}
}

function keypress8_3(e)
{
	var e = e || window.event; 
	var k = e.keyCode;
	if (k == 13)
	{
		if($(".Topic9_1").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic9_1')", 1000 );
		}	
		
//		onUserSelect(7, $('input[name="Question7"]:checked').val() );
	}
}

function keypress9_3(e)
{
	var e = e || window.event; 
	var k = e.keyCode;
	if (k == 13)
	{
		if($(".Topic10").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic10')", 1000 );
		}
		
//		onUserSelect(9, $('input[name="Question9"]:checked').val() );
	}
}

function keypress6(e)
{
	var e = e || window.event; 
	var k = e.keyCode;
	if (k == 13)
	{
		if($(".Topic7").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic7')", 1000 );
		}
		
//		onUserSelect(4, $('input[name="Question4"]:checked').val() );
		
//		onUserSelect(2, $('input[name="Question2"]:checked').val() );	
	}
}

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
//		$("html, body").animate(scrollwindow(index));
	}
}


function DisplayTopic(strMsg)
{
	$(strMsg).fadeIn(200);
	ScrollTo();
}

function DisplayTopicWithoutScrol(strMsg)
{
	$(strMsg).fadeIn(200);	
}

function CreateRecord(answerData)
{
	answerData['Survey']['userid']='CPIC'; 
	$.ajax({
		type: "post",
		url: "/surveys/add.json",
		data: answerData,
		dataType: "json",
		success: function (json) {
			// send data success
			RecordID = json["id"];
			console.log(json);
		},
		error: function (err) {
			console.error(err);
		}

	});	
}

function EditRecord(answerData)
{
	var temp = "/surveys/edit/"+ RecordID +".json";
	$.ajax({
		type: "post",
		url: temp,
		data: answerData,
		dataType: "json",
		success: function (json) {
			// send data success
			console.log(json);
		},
		error: function (err) {
			console.error(err);
		}

	});	
}


function onUserSelect(question, answer) {
	
	var result = answer; 
	if (question == 1)
	{
		result = 0;
		$("input.Q1:checked").each(function(){
			result += parseInt(this.value);
		});
	}

// deliver to the server 
	
	var answerData = {};
	answerData['Survey'] = {};	
			
	var x; 
	if (question < 10)
		x = "q0";
	else
		x = "q";
		
	answerData['Survey'][x+ question.toString()] = result; 	

	if ( RecordID == 0 )
		CreateRecord(answerData);
	else
		EditRecord(answerData);
}

function browserRedirect() {
	var sUserAgent = navigator.userAgent.toLowerCase();
	var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
	var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
	var bIsMidp = sUserAgent.match(/midp/i) == "midp";
	var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
	var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
	var bIsAndroid = sUserAgent.match(/android/i) == "android";
	var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
	var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
	if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
		//alert("phone");
	} else {
		//alert("pc");
	}
}

function onSuccess() {
	var url="Finish.html";
	window.location=encodeURI(encodeURI(url));
}


function submit_result()
{
   $.ajax({
		type: "post",
		url: "/surveys/edit/12.json",
		data: answerData,
		dataType: "json",
		success: function (json) {
			// send data success
			console.log(json);
		},
		error: function (err) {
			if(err.status === 200) {
				console.error(err);
			}
			else
			{
				alert("提交失败，请检查您的网络设置");
			}
		}

	});	
}

function Final_submit()
{
	var uiOnly = false;
	
	answerData[0] = 100;
	answerData[1] = "oB4nYjnoHhuWrPVi2pYLuPjnCaU0";
	
	if (uiOnly) {
		// send data success
		onSuccess();
	}
	else
	{
	   $.ajax({
			type: "post",
			url: "/InvestmentPreferenceSurveys/add.json",
			data: answerData,
			dataType: "json",
			success: function (json) {
				// send data success
				onSuccess();
				console.log(json);
			},
			error: function (err) {
				if(err.status === 200) {
					onSuccess();
					console.error(err);
				}
				else
				{
					alert("提交失败，请检查您的网络设置");
				}
			}

		});	
	}
}

$(function(){ 

	console.log("testtest");
	browserRedirect();
	
	 <?php 
		$address = getIp();
	 ?>
//	clientip = "<?php echo $address ?>"; 	
//	cur_local = "<?php echo $location ?>";
//	alert(cur_local);
	
	var d = new Date();
	var now = "";
	if (d.getHours() < 10)
	{
		now += "0" + d.getHours()+" 时 ";
	}
	else 
	{
		now += d.getHours()+" 时 ";
	}
	
	if (d.getMinutes() < 10 )
	{
		now += "0" + d.getMinutes() +" 分 ";	
	}
	else
	{
		now += d.getMinutes() +" 分 ";
	}
    $(".Time").text(now);
	$(".Time").fadeIn(200);
	setTimeout("DisplayTopic('.Topic1')", 0 );
	setTimeout("DisplayTopic('.Topic2')", 1000 );
	setTimeout("DisplayTopic('.Topic3_1')", 2000 );	
	
	$(".Q1_1").click(function(){

		var val = $('input[name="Question1_1"]:checked').val();

		if ( val != 99)
		{
			$(".Topic3_2").hide();
			$(".Topic3_3").hide();
			if($(".Topic4").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic4')", 1000 );
			}
//			onUserSelect(1, $('input[name="Question1_1"]:checked').val() );				
		}
		else
		{
			if($(".Topic3_2").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic3_2')", 1000 );
			}										
		}
		
	});
	
	$(".Q1_2").click(function(){

		var val = $('input[name="Question1_2"]:checked').val();

		if ( val != 99)
		{
			$(".Topic3_3").hide();
			if($(".Topic4").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic4')", 1000 );
			}					
//			onUserSelect(1, $('input[name="Question1_2"]:checked').val() );				
		}
		else
		{
			if($(".Topic3_3").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic3_3')", 1000 );
			}										
		}
		
	});	
	
	$(".Q1_3").click(function(){

		var val = $('input[name="Question1_3"]:checked').val();

		if($(".Topic4").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic4')", 1000 );
		}					
//		onUserSelect(1, $('input[name="Question1_3"]:checked').val() );			
		
	});		
	
	$(".Q2").click(function(){
	});	

	$(".Q3_1").click(function(){

		var val = $('input[name="Question3_1"]:checked').val();

		if ( val != 99)
		{
			$(".Topic5_2").hide();
			$(".Topic5_3").hide();
			if($(".Topic6").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic6')", 1000 );
			}
//			onUserSelect(1, $('input[name="Question3_1"]:checked').val() );				
		}
		else
		{
			if($(".Topic5_2").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic5_2')", 1000 );
			}										
		}
		
	});
	
	$(".Q3_2").click(function(){

		var val = $('input[name="Question3_2"]:checked').val();

		if ( val != 99)
		{
			$(".Topic5_3").hide();
			if($(".Topic6").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic6')", 1000 );
			}					
//			onUserSelect(1, $('input[name="Question3_2"]:checked').val() );				
		}
		else
		{
			if($(".Topic5_3").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic5_3')", 1000 );
			}										
		}
		
	});	
	
	$(".Q3_3").click(function(){

		var val = $('input[name="Question3_3"]:checked').val();

		if($(".Topic6").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic6')", 1000 );
		}					
//		onUserSelect(1, $('input[name="Question3_3"]:checked').val() );			
		
	});			
	
	$(".Q4").click(function(){
	});		
	
	$(".Q5").click(function(){
		if($(".Topic8").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic8_2')", 1000 );
		}
		
//		onUserSelect(5, $('input[name="Question5"]:checked').val() );
	});	

	$(".Q6_1").click(function(){
		var val = $('input[name="Question6_1"]:checked').val();	
		
		if ( val != 99 )
		{
			$(".Topic8_2").hide();
			$(".Topic8_3").hide();
			if($(".Topic9_1").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic9_1')", 1000 );
			}					
//		onUserSelect(6, $('input[name="Question6_1"]:checked').val() );			
		}
		else
		{
			if($(".Topic8_2").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic8_2')", 1000 );
			}		
		}
		
	});		
	
	$(".Q6_2").click(function(){
		var val = $('input[name="Question6_2"]:checked').val();	
		
		if ( val == 10 )
		{
			$(".Topic8_3").hide();
			if($(".Topic9_1").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic9_1')", 1000 );
			}				
//		onUserSelect(6, $('input[name="Question6_2"]:checked').val() );			
		}
		else
		{
			if($(".Topic8_3").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic8_3')", 1000 );
			}	
//		onUserSelect(6, $('input[name="Question6_2"]:checked').val() );				
		}
		
	});		
		
	$(".Q7").click(function(){
	});		

	$(".Q8_1").click(function(){
		var val = $('input[name="Question8_1"]:checked').val();	
		
		if ( val != 99 )
		{
			$(".Topic9_2").hide();
			$(".Topic9_3").hide();
			if($(".Topic10").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic10')", 1000 );
			}					
//		onUserSelect(6, $('input[name="Question6_1"]:checked').val() );			
		}
		else
		{
			if($(".Topic9_2").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic9_2')", 1000 );
			}		
		}
		
	});		
	
	$(".Q8_2").click(function(){
		var val = $('input[name="Question8_2"]:checked').val();	
		
		if ( val == 10 )
		{
			$(".Topic9_3").hide();
			if($(".Topic10").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic10')", 1000 );
			}				
//		onUserSelect(6, $('input[name="Question6_2"]:checked').val() );			
		}
		else
		{
			if($(".Topic9_3").is(":hidden"))
			{
				setTimeout("DisplayTopic('.Topic9_3')", 1000 );
			}	
//		onUserSelect(6, $('input[name="Question6_2"]:checked').val() );				
		}
		
	});			
			
	$(".Q9").click(function(){
	});		
	
	$(".Q10").click(function(){
		if($(".Topic11").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic11')", 1000 );
		}
		
//		onUserSelect(10, $('input[name="Question11"]:checked').val() );
	});			
	
	$(".Q11").click(function(){
		if($(".Topic12").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic12')", 1000 );
		}
		
//		onUserSelect(11, $('input[name="Question11"]:checked').val() );
	});		

	$(".Q12").click(function(){
		if($(".Topic13").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic13')", 1000 );
		}
		
//		onUserSelect(12, $('input[name="Question12"]:checked').val() );
	});

	$(".Q13").click(function(){
		if($(".Topic14").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic14')", 1000 );
		}
		
//		onUserSelect(13, $('input[name="Question14"]:checked').val() );
	});	
	
	$(".Q14").click(function(){
		if($(".Topic15").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic15')", 1000 );
		}
		
//		onUserSelect(14, $('input[name="Question15"]:checked').val() );
	});		
	
	$(".Q15").click(function(){
		if($(".Topic16").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic16')", 1000 );
		}
		
//		onUserSelect(15, $('input[name="Question15"]:checked').val() );
	});	

	$(".Q16").click(function(){
		if($(".Topic17").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic17')", 1000 );
		}
		
//		onUserSelect(16, $('input[name="Question15"]:checked').val() );
	});		
	
	$(".Q17").click(function(){
		if($(".Topic18").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic18')", 1000 );
			setTimeout("DisplayTopic('.Topic19')", 1000 );
			setTimeout("DisplayTopic('.Topic20')", 1000 );	
			setTimeout("DisplayTopic('.Submission')", 1000 );				
		}
		
//		onUserSelect(17, $('input[name="Question15"]:checked').val() );
	});		
		

});
</script>

</head>
<body>
<br/>

<div style="text-align: center">
<div class="Time" style="text-align: center; margin-left:auto; margin-right:auto; Display: none"></div>
</div>



<div class="Topic1" style="Display: none">
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;">
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;">
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;"></section>
			<section style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
					2015年，都说是居民资产重配大时代——转投金融资产，您是否感受到这波浪潮，您在今年是如何保卫自己的钱袋子？特此推出调查，对投资者的理财偏好进行摸底，以期为您将来投资厘清方向。
				</section>
			</section>
		</section>
	</section>
</div>

<div class="Topic2" style="Display: none">
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);" >
				<section  style="box-sizing: border-box;">
					问卷中的各类投资理财产品包括股票、基金、银行理财、互联网金融、信托、保险、不动产、贵金属、外汇等。感谢您的配合！	
				</section>
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png"/>
		</section>
		
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小关
				</section>
			</section>
		</section>
		
	</section>
</div>	

<div class="Topic3_1" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
					您来这家麦当劳的前一个停留点是哪里？请确认您是从该点直接到本餐厅，中间没有在其他任何地方停留哦！
				</section>
				<section>
					<div class="Topic3_1_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q1_1" name="Question1_1" type="radio" value="1" id="1_1_1"><label for="1_1_1">购物场所（如商场，商店，步行街）</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q1_1" name="Question1_1" type="radio" value="2" id="1_1_2"><label for="1_1_2">工作地点</label></input>
							</p>
							<p class="choice">	
								<input class = "Q1_1" name="Question1_1" type="radio" value="3" id="1_1_3"><label for="1_1_3">业务办理 (如拜访客户，快递等)</label></input>
							</p>		
							<p class="choice">	
								<input class = "Q1_1" name="Question1_1" type="radio" value="4" id="1_1_4"><label for="1_1_4">家</label></input>
							</p>
							<p class="choice">	
								<input class = "Q1_1" name="Question1_1" type="radio" value="99" id="1_1_5"><label for="1_1_5">都不是</label></input>
							</p>	
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic3_2" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
				那是不是以下这些地点？
				</section>
				<section>
					<div class="Topic3_2_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q1_2" name="Question1_2" type="radio" value="5" id="1_2_5"><label for="1_2_5">学校/补习班/大学</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q1_2" name="Question1_2" type="radio" value="6" id="1_2_6"><label for="1_2_6">访友/亲戚</label></input>
							</p>
							<p class="choice">	
								<input class = "Q1_2" name="Question1_2" type="radio" value="7" id="1_2_7"><label for="1_2_7">交通换乘站</label></input>
							</p>		
							<p class="choice">	
								<input class = "Q1_2" name="Question1_2" type="radio" value="8" id="1_2_8"><label for="1_2_8">隔壁加油站</label></input>
							</p>
							<p class="choice">	
								<input class = "Q1_2" name="Question1_2" type="radio" value="99" id="1_2_9"><label for="1_2_9">都不是</label></input>
							</p>
						</div>
					</div>							
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>

<div class="Topic3_3" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
					还是以下地点？
				</section>
				<section>
					<div class="Topic3_3_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q1_3" name="Question1_3" type="radio" value="9" id="1_3_9"><label for="1_3_9">电影院</label></input>
							</p>
							<p class="choice">	
								<input class = "Q1_3" name="Question1_3" type="radio" value="10" id="1_3_10"><label for="1_3_10">医院</label></input>
							</p>
							<p class="choice">	
								<input class = "Q1_3" name="Question1_3" type="radio" value="11" id="1_3_11"><label for="1_3_11">消遣/娱乐（健身房、公园）</label></input>
							</p>
							<p class="choice">	
								<input class = "Q1_3" name="Question1_3" type="radio" value="12" id="1_3_12"><label for="1_3_12">其他</label></input>
							</p>
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic4" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
				请问您来这家麦当劳的前一个停留点的具体名称是？(回车确认)
				</section>
				<section>
					<div class="Topic4_controls">
						<div class="bg">
							<textarea class = "Q2" name="Question2" style="width:100%;height:80px; font-size: 1.1em" onKeyPress="keypress4();" placeholder="请填写大厦，商店，小区或交通换乘站等的名称"></textarea>
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>		

<div class="Topic5_1" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				请问您离开麦当劳之后的下一个停留点将是哪里？ 
				</section>
				<section>
					<div class="Topic5_1_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q3_1" name="Question3_1" type="radio" value="1" id="3_1_1"><label for="3_1_1">购物场所（如商场，商店，步行街）</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q3_1" name="Question3_1" type="radio" value="2" id="3_1_2"><label for="3_1_2">工作地点</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3_1" name="Question3_1" type="radio" value="3" id="3_1_3"><label for="3_1_3">业务办理 (如拜访客户，快递等)</label></input>
							</p>		
							<p class="choice">	
								<input class = "Q3_1" name="Question3_1" type="radio" value="4" id="3_1_4"><label for="3_1_4">家</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3_1" name="Question3_1" type="radio" value="99" id="3_1_5"><label for="3_1_5">都不是</label></input>
							</p>	
						</div>						
					</div>				
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic5_2" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
				那是不是以下这些地点？
				</section>
				<section>
					<div class="Topic5_2_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q3_2" name="Question3_2" type="radio" value="5" id="3_2_5"><label for="3_2_5">学校/补习班/大学</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q3_2" name="Question3_2" type="radio" value="6" id="3_2_6"><label for="3_2_6">访友/亲戚</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3_2" name="Question3_2" type="radio" value="7" id="3_2_7"><label for="3_2_7">交通换乘站</label></input>
							</p>		
							<p class="choice">	
								<input class = "Q3_2" name="Question3_2" type="radio" value="8" id="3_2_8"><label for="3_2_8">隔壁加油站</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3_2" name="Question3_2" type="radio" value="99" id="3_2_9"><label for="3_2_9">都不是</label></input>
							</p>
						</div>
					</div>							
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>

<div class="Topic5_3" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
					还是以下地点？
				</section>
				<section>
					<div class="Topic5_3_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q3_3" name="Question3_3" type="radio" value="9" id="3_3_9"><label for="3_3_9">电影院</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3_3" name="Question3_3" type="radio" value="10" id="3_3_10"><label for="3_3_10">医院</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3_3" name="Question3_3" type="radio" value="11" id="3_3_11"><label for="3_3_11">消遣/娱乐（健身房、公园）</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3_3" name="Question3_3" type="radio" value="12" id="3_3_12"><label for="3_3_12">其他</label></input>
							</p>
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic6" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					请问您的下一个停留点的具体名称是？(回车确认)
				</section>
				<section>
					<div class="Topic6_controls">
						<div class="bg">
							<textarea class = "Q4" name="Question4" style="width:100%;height:80px; font-size: 1.1em"  onKeyPress="keypress6();" placeholder="请填写大厦，商店，小区或交通换乘站等的名称"></textarea>					
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>		

<div class="Topic7" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				请<a href="javascript:void(0);" onclick="$('.frame-container').show();">点击打开地图</a>，在地图上指出您刚才提到的“前一个停留点”和"下一个停留点"的位置。
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic8_1" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					您使用哪一种交通方式从上一个停留点来到这家麦当劳的？ 
				</section>
				<section>
					<div class="Topic8_1_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q6_1" name="Question6_1" type="radio" value="4" id="6_1_1"><label for="6_1_1">出租车</label></input>
							</p>
							<p class="choice">		
								<input class = "Q6_1" name="Question6_1" type="radio" value="6" id="6_1_2"><label for="6_1_2">摩托车</label></input>
							</p>
							<p class="choice">	
								<input class = "Q6_1" name="Question6_1" type="radio" value="7" id="6_1_3"><label for="6_1_3">电瓶车</label></input>
							</p>
							<p class="choice">										
								<input class = "Q6_1" name="Question6_1" type="radio" value="8" id="6_1_4"><label for="6_1_4">自行车</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q6_1" name="Question6_1" type="radio" value="9" id="6_1_5"><label for="6_1_5">徒步</label></input>
							</p>
							<p class="choice">										
								<input class = "Q6_1" name="Question6_1" type="radio" value="99" id="6_1_5"><label for="6_1_5">都不是</label></input>
							</p>							
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>

<div class="Topic8_2" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					那是下面这些交通方式吗？
				</section>
				<section>
					<div class="Topic8_2_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q6_2" name="Question6_2" type="radio" value="2" id="6_2_2"><label for="6_2_2">地铁</label></input>	
							</p>
							<p class="choice">										
								<input class = "Q6_2" name="Question6_2" type="radio" value="1" id="6_2_1"><label for="6_2_1">公共汽车</label></input>
							</p>
							<p class="choice">	
								<input class = "Q6_2" name="Question6_2" type="radio" value="3" id="6_2_3"><label for="6_2_3">火车</label></input>
							</p>
							<p class="choice">										
								<input class = "Q6_2" name="Question6_2" type="radio" value="5" id="6_2_4"><label for="6_2_4">私家车</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q6_2" name="Question6_2" type="radio" value="10" id="6_2_5"><label for="6_2_5">都不是</label></input>
							</p>									
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>

<div class="Topic8_3" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					如果您是乘坐公共汽车、地铁、火车或者轿车前来本餐厅的，请写下您下车/停车的位置名称 
				</section>
				<section>
					<div class="Topic8_3_controls">
						<div class="bg">
							<textarea class = "Q7" name="Question7" style="width:100%;height:80px; font-size: 1.1em" onKeyPress="keypress8_3();" placeholder="请填写大厦，商店，小区或交通换乘站等的名称"></textarea>					
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>	

<div class="Topic9_1" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				请问离开麦当劳之后,您将会采取何种交通方式去往下一个停留点?  
				</section>
				<section>
					<div class="Topic9_1_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q8_1" name="Question8_1" type="radio" value="4" id="8_1_1"><label for="8_1_1">出租车</label></input>
							</p>
							<p class="choice">										
								<input class = "Q8_1" name="Question8_1" type="radio" value="6" id="8_1_2"><label for="8_1_2">摩托车</label></input>
							</p>
							<p class="choice">	
								<input class = "Q8_1" name="Question8_1" type="radio" value="7" id="8_1_3"><label for="8_1_3">电瓶车</label></input>
							</p>
							<p class="choice">		
								<input class = "Q8_1" name="Question8_1" type="radio" value="8" id="8_1_4"><label for="8_1_4">自行车</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q8_1" name="Question8_1" type="radio" value="9" id="8_1_5"><label for="8_1_5">徒步</label></input>
							</p>
							<p class="choice">										
								<input class = "Q8_1" name="Question8_1" type="radio" value="99" id="8_1_5"><label for="8_1_5">都不是</label></input>
							</p>							
						</div>
					</div>				
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic9_2" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				那是下面这些交通方式吗？ 
				</section>
				<section>
					<div class="Topic9_2_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q8_2" name="Question8_2" type="radio" value="2" id="8_2_2"><label for="8_2_2">地铁</label></input>							
							</p>
							<p class="choice">		
								<input class = "Q8_2" name="Question8_2" type="radio" value="1" id="8_2_1"><label for="8_2_1">公共汽车</label></input>
							</p>
							<p class="choice">	
								<input class = "Q8_2" name="Question8_2" type="radio" value="3" id="8_2_3"><label for="8_2_3">火车</label></input>
							</p>
							<p class="choice">		
								<input class = "Q8_2" name="Question8_2" type="radio" value="5" id="8_2_4"><label for="8_2_4">私家车</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q8_2" name="Question8_2" type="radio" value="10" id="8_2_5"><label for="8_2_5">都不是</label></input>
							</p>									
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic9_3" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					如果您是乘坐公共汽车、地铁、火车或者轿车前来本餐厅的，请写下您下车/停车的位置名称 
				</section>
				<section>
					<div class="Topic9_3_controls">
						<div class="bg">
							<textarea class = "Q9" name="Question9" style="width:100%;height:80px; font-size: 1.1em" onKeyPress="keypress9_3();" placeholder="请填写大厦，商店，小区或交通换乘站等的名称"></textarea>					
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
	</section>
</div>

<div class="Topic10" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					在这个商圈内您会首选哪个快餐品牌？ 
				</section>
				<section>
					<div class="Topic10_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="1" id="8_1"><label for="8_1">麦当劳</label></input>
							</p>
							<p class="choice">		
								<input class = "Q10" name="Question10" type="radio" value="2" id="8_2"><label for="8_2">肯德基</label></input>
							</p>
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="3" id="8_3"><label for="8_3">汉堡王</label></input>
							</p>
							<p class="choice">		
								<input class = "Q10" name="Question10" type="radio" value="4" id="8_4"><label for="8_4">味千拉面</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="5" id="8_5"><label for="8_5">永和大王</label></input>
							</p>
							<p class="choice">										
								<input class = "Q10" name="Question10" type="radio" value="6" id="8_6"><label for="8_6">真功夫</label></input>
							</p>
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="7" id="8_7"><label for="8_7">赛百味</label></input>
							</p>
							<p class="choice">										
								<input class = "Q10" name="Question10" type="radio" value="8" id="8_8"><label for="8_8">其它</label></input>
							</p>							
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>

<div class="Topic11" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				包括你自己在内，你今天将为多少人购买食物呢? (单独前来 = 1人) 
				</section>
				<section>
					<div class="Topic11_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q11" name="Question11" type="radio" value="1" id="11_1"><label for="11_1">1</label></input>
								<input class = "Q11" name="Question11" type="radio" value="2" id="11_2"><label for="11_2">2</label></input>
								<input class = "Q11" name="Question11" type="radio" value="3" id="11_3"><label for="11_3">3</label></input>								
							</p>
							<p class="choice">	
								<input class = "Q11" name="Question11" type="radio" value="4" id="11_4"><label for="11_4">4</label></input>
								<input class = "Q11" name="Question11" type="radio" value="5" id="11_5"><label for="11_5">5</label></input>
								<input class = "Q11" name="Question11" type="radio" value="6" id="11_6"><label for="11_6">6</label></input>								
							</p>
							<p class="choice">	
								<input class = "Q11" name="Question11" type="radio" value="7" id="11_7"><label for="11_7">7</label></input>
								<input class = "Q11" name="Question11" type="radio" value="8" id="11_8"><label for="11_8">8</label></input>
								<input class = "Q11" name="Question11" type="radio" value="9" id="11_9"><label for="11_9">9</label></input>	
							</p>
							<p class="choice">	
								<input class = "Q11" name="Question11" type="radio" value="10" id="11_10"><label for="11_10">10</label></input>
								<input class = "Q11" name="Question11" type="radio" value="11" id="11_11"><label for="11_11">多余10人</label></input>
							</p>							
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic12" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					请问您到这家麦当劳用餐的频率是...? 
				</section>
				<section>
					<div class="Topic12_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q12" name="Question12" type="radio" value="1" id="12_1"><label for="12_1">几乎每天</label></input>
							</p>
							<p class="choice">		
								<input class = "Q12" name="Question12" type="radio" value="2" id="12_2"><label for="12_2">2-3次/星期</label></input>
							</p>
							<p class="choice">	
								<input class = "Q12" name="Question12" type="radio" value="3" id="12_3"><label for="12_3">1次/星期 </label></input>
							</p>
							<p class="choice">										
								<input class = "Q12" name="Question12" type="radio" value="4" id="12_4"><label for="12_4">2-3次/月</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q12" name="Question12" type="radio" value="5" id="12_5"><label for="12_5">1次/月</label></input>
							</p>
							<p class="choice">		
								<input class = "Q12" name="Question12" type="radio" value="6" id="12_6"><label for="12_6">2-3个月1次 </label></input>
							</p>	
							<p class="choice">	
								<input class = "Q12" name="Question12" type="radio" value="7" id="12_7"><label for="12_7">6个月1次或更少</label></input>
							</p>
							<p class="choice">									
								<input class = "Q12" name="Question12" type="radio" value="8" id="12_8"><label for="12_8">这次是我第一次光顾这家餐厅 </label></input>
							</p>							
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>

<div class="Topic13" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				为什么您今天会来这家麦当劳吃东西呢? 
				</section>
				<section>
					<div class="Topic13_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q13" name="Question13" type="radio" value="1" id="13_1"><label for="13_1">看到餐厅建筑</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q13" name="Question13" type="radio" value="2" id="13_2"><label for="13_2">看到麦当劳的厨窗海报</label></input>
							</p>
							<p class="choice">	
								<input class = "Q13" name="Question13" type="radio" value="3" id="13_3"><label for="13_3">看到餐厅标志</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q13" name="Question13" type="radio" value="4" id="13_4"><label for="13_4">看到路边麦当劳的标志</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q13" name="Question13" type="radio" value="5" id="13_5"><label for="13_5">有人提议来这家麦当劳</label></input>
							</p>
							<p class="choice">	
								<input class = "Q13" name="Question13" type="radio" value="6" id="13_6"><label for="13_6">记得这有家麦当劳/我曾经来过</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q13" name="Question13" type="radio" value="7" id="13_7"><label for="13_7">其它</label></input>
							</p>							
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic14" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					以下哪一项能最好的代表您总的家庭月收入? 包括月薪、花红、任何生意和投资的盈利、银行利息、津贴、福利 (以人民币计算)
				</section>
				<section>
					<div class="Topic14_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="1" id="14_1"><label for="14_1"> <2500 </label></input>
							</p>
							<p class="choice">		
								<input class = "Q14" name="Question14" type="radio" value="2" id="14_2"><label for="14_2">2500-4999</label></input>
							</p>
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="3" id="14_3"><label for="14_3">5000-7499</label></input>
							</p>
							<p class="choice">		
								<input class = "Q14" name="Question14" type="radio" value="4" id="14_4"><label for="14_4">7500-9999 </label></input>
							</p>	
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="5" id="14_5"><label for="14_5">10000-14999</label></input>
							</p>
							<p class="choice">		
								<input class = "Q14" name="Question14" type="radio" value="6" id="14_6"><label for="14_6">15000-19999</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="7" id="14_7"><label for="14_7">≥20000</label></input>
							</p>							
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>

<div class="Topic15" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				以下哪一项最能够代表您的年龄？
				</section>
				<section>
					<div class="Topic15_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q15" name="Question15" type="radio" value="1" id="15_1"><label for="15_1"><12岁</label></input>
								<input class = "Q15" name="Question15" type="radio" value="2" id="15_2"><label for="15_2">13-15</label></input>
							</p>		
							<p class="choice">									
								<input class = "Q15" name="Question15" type="radio" value="3" id="15_3"><label for="15_3">16-18</label></input>
								<input class = "Q15" name="Question15" type="radio" value="4" id="15_4"><label for="15_4">19-22</label></input>
							</p>		
							<p class="choice">									
								<input class = "Q15" name="Question15" type="radio" value="5" id="15_5"><label for="15_5">23-25</label></input>
								<input class = "Q15" name="Question15" type="radio" value="6" id="15_6"><label for="15_6">25-30</label></input>
							</p>
							<p class="choice">	
								<input class = "Q15" name="Question15" type="radio" value="7" id="15_7"><label for="15_7">31-35</label></input>
								<input class = "Q15" name="Question15" type="radio" value="8" id="15_8"><label for="15_8">36-40</label></input>
							</p>
							<p class="choice">									
								<input class = "Q15" name="Question15" type="radio" value="9" id="15_9"><label for="15_9">41-45</label></input>
								<input class = "Q15" name="Question15" type="radio" value="10" id="15_10"><label for="15_10">46-50</label></input>
							</p>
							<p class="choice">									
								<input class = "Q15" name="Question15" type="radio" value="11" id="15_11"><label for="15_11">51-60</label></input>
								<input class = "Q15" name="Question15" type="radio" value="12" id="15_12"><label for="15_12">>60岁</label></input>
							</p>							
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic16" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					以下哪一项能代表您的职业？ 
				</section>
				<section>
					<div class="Topic16_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q16" name="Question16" type="radio" value="1" id="16_1"><label for="16_1">学生</label></input>
							</p>
							<p class="choice">									
								<input class = "Q16" name="Question16" type="radio" value="2" id="16_2"><label for="16_2">事业单位</label></input>
							</p>
							<p class="choice">	
								<input class = "Q16" name="Question16" type="radio" value="4" id="16_3"><label for="16_3">国企 </label></input>
							</p>
							<p class="choice">									
								<input class = "Q16" name="Question16" type="radio" value="3" id="16_4"><label for="16_4">机关单位</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q16" name="Question16" type="radio" value="5" id="16_5"><label for="16_5">外企</label></input>
							</p>
							<p class="choice">									
								<input class = "Q16" name="Question16" type="radio" value="7" id="16_6"><label for="16_6">自由职业 </label></input>
							</p>								
							<p class="choice">	
								<input class = "Q16" name="Question16" type="radio" value="6" id="16_7"><label for="16_7">私企 </label></input>
								<input class = "Q16" name="Question16" type="radio" value="8" id="16_8"><label for="16_8">退休 </label></input>
							</p>
							<p class="choice">									
								<input class = "Q16" name="Question16" type="radio" value="9" id="16_9"><label for="16_9">暂无 </label></input>
							</p>							
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>

<div class="Topic17" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				请问您的性别是：
				</section>
				<section>
					<div class="Topic17_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q17" name="Question17" type="radio" value="1" id="17_1"><label for="17_1">男</label></input>
							</p>		
							<p class="choice">								
								<input class = "Q17" name="Question17" type="radio" value="2" id="17_2"><label for="17_2">女</label></input>
							</p>		
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic18" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					您今天购餐的小票金额（单位：元）是...?
				</section>
				<section>
					<div class="Topic8_3_controls">
						<div class="bg">
							<input class = "Q18" name="Question18" style="width:100%;" type="number" id="18_2"></input>				
						</div>
					</div>					
				</section>					
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png" />
		</section>
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
				<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
					<section  style="box-sizing: border-box;">
					<span style="font-size: 12.8000001907349px; text-align: center;">小关</span>
				</section>
			</section>
		</section>
		<section style="width: 0px; height: 0px; clear: both;"></section>
	</section>
</div>	

<div class="Topic19" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小安
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
					我们的访问到此结束。衷心感谢您的参与与贡献!
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic20" style="Display: none">
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);" >
				<section  style="box-sizing: border-box;">
					非常感谢，别忘了点击下方的提交按钮！！！	
				</section>
			</section><img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(188, 227, 249);" src="003-conv-1-right-2-v2-img0.png"/>
		</section>
		
		<section style="display: inline-block; vertical-align: top; width: 60px; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(003-conv-1-right-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" ></section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小关
				</section>
			</section>
		</section>
		
	</section>
</div>	

<div class="Submission" style="text-align: center; Display: none ">
<br/>
<br/>
	<input type="submit" class="btns" onclick = "Final_submit()" value="提    交" />
<br/> 

</div>

<div class="frame-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 1000; display: none">
	<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" src="./baidu1.html" style="height: 100%; width: 100%;"></iframe>
</div>

</body>
</html>
