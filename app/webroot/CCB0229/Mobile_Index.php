<!DOCTYPE HTML>
<html>
<head>
<title>投资理财偏好调查</title>
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

var answerData = {};


function onUserSelect(question, answer) {
	answerData[question+1] = answer;	
}

function getUserId() {
	var result = location.search.match(new RegExp("[\?\&][^\?\&]+=[^\?\&]+", "g"));
	if(!!result) {
		for (var i = 0; i < result.length; i++) {
			var idx = result[i].indexOf('un=');
			if(idx !== -1) {
				return parseInt(result[i].substring(idx + 3));
			}
		}
	}
	return -1;
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
		$("html, body").animate(scrollwindow(index));
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

function Final_submit()
{
	var uiOnly = false;
	
	answerData[0] = "<?php echo $_SERVER["REMOTE_ADDR"] ?>";
	answerData[21] = navigator.userAgent.toLowerCase();
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

	browserRedirect();

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
	setTimeout("DisplayTopic('.Topic3')", 2000 );	
	

	$(".Q1").click(function(){
		
		if($(".Topic4").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic4')", 1000 );
		}		
		
		onUserSelect(1, $('input[name="Question1"]:checked').val() );
		
	});
	
	$(".Q2").click(function(){
		if($(".Topic5").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic5')", 1000 );
		}
		
		onUserSelect(2, $('input[name="Question2"]:checked').val() );
	});	
	
	$(".Q3").click(function(){
		if($(".Topic6").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic6')", 1000 );
		}
		
		onUserSelect(3, $('input[name="Question3"]:checked').val() );
	});	
	
	$(".Q4").click(function(){
		if($(".Topic7").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic7')", 1000 );
		}
		
		onUserSelect(4, $('input[name="Question4"]:checked').val() );
	});		
	
	$(".Q5").click(function(){
		if($(".Topic8").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic8')", 1000 );
		}
		
		onUserSelect(5, $('input[name="Question5"]:checked').val() );
	});	
	
	$(".Q6").click(function(){
		if($(".Topic9").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic9')", 1000 );
		}
		
		onUserSelect(6, $('input[name="Question6"]:checked').val() );
	});		

	$(".Q7").click(function(){
		if($(".Topic10").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic10')", 1000 );
		}
		
		onUserSelect(7, $('input[name="Question7"]:checked').val() );
	});		

	$(".Q8").click(function(){
		if($(".Topic11").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic11')", 1000 );
		}
		
		onUserSelect(8, $('input[name="Question8"]:checked').val() );
	});			
	
	$(".Q9").click(function(){
		if($(".Topic12").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic12')", 1000 );
		}
		
		onUserSelect(9, $('input[name="Question9"]:checked').val() );
	});		
	
	$(".Q10").click(function(){
		if($(".Topic13").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic13')", 1000 );
		}
		
		onUserSelect(10, $('input[name="Question10"]:checked').val() );
	});			
	
	$(".Q11").click(function(){
		if($(".Topic14").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic14')", 1000 );
		}
		
		onUserSelect(11, $('input[name="Question11"]:checked').val() );
	});		

	$(".Q12").click(function(){
		if($(".Topic15").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic15')", 1000 );
		}
		
		onUserSelect(12, $('input[name="Question12"]:checked').val() );
	});

	$(".Q13").click(function(){
		if($(".Topic16").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic16')", 1000 );
		}
		
		onUserSelect(13, $('input[name="Question13"]:checked').val() );
	});	
	
	$(".Q14").click(function(){
		if($(".Topic17").is(":hidden"))
		{
			setTimeout("DisplayTopic('.Topic17')", 1000 );
			setTimeout("DisplayTopic('.Topic18')", 1000 );			
			setTimeout("DisplayTopic('.Submission')", 1000 );
		}
		
		onUserSelect(14, $('input[name="Question14"]:checked').val() );
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
					小珊
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

<div class="Topic3" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小珊
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
					您在各类投资理财产品上投入总计有多少？
				</section>
				<section>
					<div class="Topic3_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q1" name="Question1" type="radio" value="1" id="1_1"><label for="1_1"><=5万</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q1" name="Question1" type="radio" value="2" id="1_2"><label for="1_2">5万-10万元</label></input>
							</p>
							<p class="choice">	
								<input class = "Q1" name="Question1" type="radio" value="3" id="1_3"><label for="1_3">10万-50万元</label></input>
							</p>		
							<p class="choice">	
								<input class = "Q1" name="Question1" type="radio" value="4" id="1_4"><label for="1_4">>=50万元 </label></input>
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
				您最主要的理财投资标的是？
				</section>
				<section>
					<div class="Topic4_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q2" name="Question2" type="radio" value="1" id="2_1"><label for="2_1"> 股市</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q2" name="Question2" type="radio" value="2" id="2_2"><label for="2_2"> 基金</label></input>
							</p>
							<p class="choice">	
								<input class = "Q2" name="Question2" type="radio" value="3" id="2_3"><label for="2_3"> 银行理财</label></input>
							</p>
							<p class="choice">	
								<input class = "Q2" name="Question2" type="radio" value="4" id="2_4"><label for="2_4"> 互联网金融产品</label></input>
							</p>
							<p class="choice">	
								<input class = "Q2" name="Question2" type="radio" value="5" id="2_5"><label for="2_5"> 信托产品</label></input>
							</p>
							<p class="choice">	
								<input class = "Q2" name="Question2" type="radio" value="6" id="2_6"><label for="2_6"> 保险高收益理财产品</label></input>
							</p>
							<p class="choice">	
								<input class = "Q2" name="Question2" type="radio" value="7" id="2_7"><label for="2_7"> 房产等不动产</label></input>
							</p>
							<p class="choice">	
								<input class = "Q2" name="Question2" type="radio" value="8" id="2_8"><label for="2_8"> 黄金等贵金属</label></input>
							</p>
							<p class="choice">	
								<input class = "Q2" name="Question2" type="radio" value="9" id="2_9"><label for="2_9"> 美元等外汇资产</label></input>
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

<div class="Topic5" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小珊
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				您现在的股票投资占投资理财资金比重？ 
				</section>
				<section>
					<div class="Topic5_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q3" name="Question3" type="radio" value="1" id="3_1"><label for="3_1">50%以上</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q3" name="Question3" type="radio" value="2" id="3_2"><label for="3_2">30%-50%</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3" name="Question3" type="radio" value="3" id="3_3"><label for="3_3">20%-30% </label></input>
							</p>
							<p class="choice">	
								<input class = "Q3" name="Question3" type="radio" value="4" id="3_4"><label for="3_4">10%-20%</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3" name="Question3" type="radio" value="5" id="3_5"><label for="3_5">10%以内</label></input>
							</p>
							<p class="choice">	
								<input class = "Q3" name="Question3" type="radio" value="6" id="3_6"><label for="3_6">无</label></input>
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
					您是否看好股市投资？ 
				</section>
				<section>
					<div class="Topic6_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q4" name="Question4" type="radio" value="1" id="4_1"><label for="4_1">是</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q4" name="Question4" type="radio" value="2" id="4_2"><label for="4_2">否</label></input>
							</p>
							<p class="choice">	
								<input class = "Q4" name="Question4" type="radio" value="3" id="4_3"><label for="4_3">看不清</label></input>
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

<div class="Topic7" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小珊
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				后市，您如何操作？ 
				</section>
				<section>
					<div class="Topic7_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q5" name="Question5" type="radio" value="1" id="5_1"><label for="5_1">加仓</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q5" name="Question5" type="radio" value="2" id="5_2"><label for="5_2">减仓</label></input>
							</p>
							<p class="choice">	
								<input class = "Q5" name="Question5" type="radio" value="3" id="5_3"><label for="5_3">待反弹清仓 </label></input>
							</p>
							<p class="choice">	
								<input class = "Q5" name="Question5" type="radio" value="4" id="5_4"><label for="5_4">观望</label></input>
							</p>
							
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic8" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
					您现在的互联网理财占投资理财资金比重是？ 
				</section>
				<section>
					<div class="Topic8_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q6" name="Question6" type="radio" value="1" id="6_1"><label for="6_1">无</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q6" name="Question6" type="radio" value="2" id="6_2"><label for="6_2">小于3%</label></input>
							</p>
							<p class="choice">	
								<input class = "Q6" name="Question6" type="radio" value="3" id="6_3"><label for="6_3">3-5%</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q6" name="Question6" type="radio" value="4" id="6_4"><label for="6_4">6-10%</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q6" name="Question6" type="radio" value="5" id="6_5"><label for="6_5">11-20%</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q6" name="Question6" type="radio" value="6" id="6_6"><label for="6_6">21-30%</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q6" name="Question6" type="radio" value="7" id="6_7"><label for="6_7">31-50%</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q6" name="Question6" type="radio" value="8" id="6_8"><label for="6_8">51%或以上</label></input>
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

<div class="Topic9" style="Display: none">	
	<section style="border: 0px; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 60px; vertical-align: top; box-sizing: border-box;" >
			<section style="width: 55px; height: 55px; margin-left: 10px; box-sizing: border-box; background-image: url(002-conv-1-left-2-v2-img1.png); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;" >
			</section>
			<section  style="font-size: 0.8em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: inherit; box-sizing: border-box;">
				<section  style="box-sizing: border-box;">
					小珊
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				互联网理财上，您偏好投资？ 
				</section>
				<section>
					<div class="Topic9_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q7" name="Question7" type="radio" value="1" id="7_1"><label for="7_1">P2P网贷</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q7" name="Question7" type="radio" value="2" id="7_2"><label for="7_2">股权众筹</label></input>
							</p>
							<p class="choice">	
								<input class = "Q7" name="Question7" type="radio" value="3" id="7_3"><label for="7_3">互联网基金 </label></input>
							</p>
							<p class="choice">	
								<input class = "Q7" name="Question7" type="radio" value="4" id="7_4"><label for="7_4">互联网保险</label></input>
							</p>
							<p class="choice">	
								<input class = "Q7" name="Question7" type="radio" value="5" id="7_5"><label for="7_5">互联网信托 </label></input>
							</p>
							<p class="choice">	
								<input class = "Q7" name="Question7" type="radio" value="6" id="7_6"><label for="7_6">其他</label></input>
							</p>							
						</div>
					</div>					
				</section>

			</section>
		</section>
	</section>
</div>

<div class="Topic10" style="Display: none">		
	<section style="border: 0px; text-align: right; margin: 0.2em 0px; box-sizing: border-box; padding: 0px;" >
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(188, 227, 249); box-sizing: border-box;" >
			<section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; text-align: left; box-sizing: border-box; background-color: rgb(188, 227, 249);">
				<section  style="box-sizing: border-box;">
				您目前投资的互联网理财收益率是多少？如果您目前没有投资互联网理财，您认为理想的互联网理财收益率是多少？  
				</section>
				<section>
					<div class="Topic10_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q8" name="Question8" type="radio" value="1" id="8_1"><label for="8_1">20%以上</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q8" name="Question8" type="radio" value="2" id="8_2"><label for="8_2">15%以上</label></input>
							</p>
							<p class="choice">	
								<input class = "Q8" name="Question8" type="radio" value="3" id="8_3"><label for="8_3">10%以上</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q8" name="Question8" type="radio" value="4" id="8_4"><label for="8_4">6%-10%</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q8" name="Question8" type="radio" value="5" id="8_5"><label for="8_5">3%-5%</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q8" name="Question8" type="radio" value="6" id="8_6"><label for="8_6">3%以下</label></input>
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
					小珊
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				您挑选互联网理财时最看重的是？ 
				</section>
				<section>
					<div class="Topic11_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q9" name="Question9" type="radio" value="1" id="9_1"><label for="9_1">平台资质背景</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q9" name="Question9" type="radio" value="2" id="9_2"><label for="9_2">收益率有多高 </label></input>
							</p>
							<p class="choice">	
								<input class = "Q9" name="Question9" type="radio" value="3" id="9_3"><label for="9_3">有无担保措施 </label></input>
							</p>
							<p class="choice">	
								<input class = "Q9" name="Question9" type="radio" value="4" id="9_4"><label for="9_4">熟人推荐</label></input>
							</p>
							<p class="choice">	
								<input class = "Q9" name="Question9" type="radio" value="5" id="9_5"><label for="9_5">其他 </label></input>
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
					您在银行理财的投资占理财资金比重是？ 
				</section>
				<section>
					<div class="Topic12_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="1" id="10_1"><label for="10_1">50%以上</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="2" id="10_2"><label for="10_2">30%-50%</label></input>
							</p>
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="3" id="10_3"><label for="10_3">20%-30% </label></input>
							</p>	
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="4" id="10_4"><label for="10_4">10%-20%</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="5" id="10_5"><label for="10_5">10%以内</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q10" name="Question10" type="radio" value="6" id="10_6"><label for="10_6">无 </label></input>
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
					小珊
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				您现在是否有投资房产的意愿？ 
				</section>
				<section>
					<div class="Topic13_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q11" name="Question11" type="radio" value="1" id="11_1"><label for="11_1">有</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q11" name="Question11" type="radio" value="2" id="11_2"><label for="11_2">没有 </label></input>
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
					您现在配置外汇类资产的意愿是？ 
				</section>
				<section>
					<div class="Topic14_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q12" name="Question12" type="radio" value="1" id="12_1"><label for="12_1">强烈</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q12" name="Question12" type="radio" value="2" id="12_2"><label for="12_2">一般</label></input>
							</p>
							<p class="choice">	
								<input class = "Q12" name="Question12" type="radio" value="3" id="12_3"><label for="12_3">暂无 </label></input>
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
					小珊
				</section>
			</section>
		</section>
		<section style="display: inline-block; width: 75%; font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: inherit; border-color: rgb(255, 228, 200); box-sizing: border-box;" >
			<img style="vertical-align: top; margin-top: 29px; box-sizing: border-box; background-color: rgb(255, 228, 200);" src="002-conv-1-left-2-v2-img0.png" /><section style="display: inline-block; width: 85%; margin-top: 11px; padding: 16px; border-radius: 16px; box-sizing: border-box; background-color: rgb(255, 228, 200);" >
				<section  style="box-sizing: border-box;">
				您的性别？
				</section>
				<section>
					<div class="Topic15_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q13" name="Question13" type="radio" value="1" id="13_1"><label for="13_1">男</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q13" name="Question13" type="radio" value="2" id="13_2"><label for="13_2">女 </label></input>
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
					请问您的年龄是？ 
				</section>
				<section>
					<div class="Topic16_controls">
						<div class="bg">
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="1" id="14_1"><label for="14_1">25岁以下</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="2" id="14_2"><label for="14_2">25-30岁</label></input>
							</p>
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="3" id="14_3"><label for="14_3">31-35岁 </label></input>
							</p>	
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="1" id="14_4"><label for="14_4">36-40岁</label></input>
							</p>	
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="2" id="14_5"><label for="14_5">41-50岁</label></input>
							</p>
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="3" id="14_6"><label for="14_6">51-60岁 </label></input>
							</p>								
							<p class="choice">	
								<input class = "Q14" name="Question14" type="radio" value="3" id="14_7"><label for="14_7">61岁或以上 </label></input>
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
					小珊
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

<div class="Topic18" style="Display: none">
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


</body>
</html>
