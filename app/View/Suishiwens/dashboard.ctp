<div class="full-height-box oem-package" style="overflow: auto;">



<section class="row top-panel oem-off" ng-hide="!status.auth.loadingUserInfo &amp;&amp; status.auth.userInfo &amp;&amp; isMobile">
	<header class="tn-header">
		<nav class="navbar navbar-static-top" role="navigation">
			<div class="container-fluid">
				<div class="x3-nav-brand navbar-header navbar-brand">
					<a class="no-decoration" href="http://askhere.guanshantech.com/" target="_top">
						<img class="ccblogo" title="xiumi.us" src="/img/xiumi_logo.png">
						<img title="xiumi.us" src="/img/xiumi_brand_name_w-normal.png" ng-hide="true" class="ng-hide">
					</a>
				</div>

			</div>
		</nav>
	</header>
	<!-- header END -->
	<div class="row title-info text-center">
		<img src="/img/xiumi_slogan.png" >
	</div>
</section>

<section>
	<div class="x3-asset-submit-panel container form-group center-v" style="width: 100%;">
		<form class="inner ng-pristine ng-valid" name="assetSubmitForm" action="/SswPageStatuses/edit/<?php echo $page_id;?>" method="POST">
			<input type="hidden" name="data[SswPageStatus][page_id]" value="<?php echo $page_id;?>"></input>
			<input type="hidden" name="data[SswPageStatus][status]" value="<?php if ($page_status == 'offline') { echo "online"; } else { echo "offline"; }?>"></input>
			<input type="hidden" name="redirect" value="/suishiwens/dashboard/<?php echo $page_id;?>"></input>
			<br>
			<h3 class="row title " style="margin-left: 1em"><?php echo __('问卷 '.$page_id.' 状态'); ?></h3>
			<br>
			<table style="margin-left: 2em ; width: 15%">
			<tr  align="left">
			  <td><?php if ($page_status == 'offline') { echo "下线"; } else { echo "在线"; }?></td>
			  <td><button class="btn btn-green" type="submit" value="Submit"><?php if ($page_status == 'offline') { echo "上线"; } else { echo "下线"; }?></button></td>
			</tr>
			</table>
			<br>
			<!--<img class="row hint-img" src="/images/mail.jpg"/>-->
		</form>
	</div>

	<div class="x3-asset-submit-panel container form-group center-v" style="width: 100%; background: RGB(230, 230, 230);">
		<form class="inner ng-pristine ng-valid" name="assetSubmitForm">
			<br>
			<h3 class="row title text-left" style="margin-left: 1em">数据提交统计</h3>
			<br>
			<table style="margin-left: 2em ; width: 75%" border="1">
			<tr align="center" >
			  <td>全部</td>
			  <td>已成功提交</td>
			  <td>未完成</td>
			  <td>成功提交比例</td>
			</tr>
			<tr align="center" >
			  <td><?php echo h($count_all); ?></td>
			  <td><?php echo h($count_finished); ?></td>
			  <td><?php echo h($count_unfinished); ?></td>
			  <td><?php echo ($count_all == 0)?'-':floor($count_finished/$count_all*100).'%'; ?></td>
			</tr>
			</table>
			<br>
			<br>
			<br>
			<!--<img class="row hint-img" src="/images/mail.jpg"/>-->
		</form>
	</div>

	<div class="x3-asset-submit-panel container form-group center-v" style="width: 100%;">
		<form class="inner ng-pristine ng-valid" name="assetSubmitForm">
			<h3 class="row title text-left" style="margin-left: 1em">下载原始数据</h3>
			<br>
			<div class="row" style="margin-left: 2em">
				<?php if ($count_all == 0) { ?>
					<button class="btn btn-green disabled" >没有数据可以下载</button>
				<?php
				}
				else { ?>
					<a class="btn btn-green" href="/Suishiwens/download_rawdata/<?php echo $page_id;?>">开始下载</a>
				<?php
				}
				?>
			</div>
			<!--<img class="row hint-img" src="/images/mail.jpg"/>-->
		</form>
	</div>
</section>

<section class="row tn-footer oem-off moble-hidden">

	<footer>
		<div class="copyright">
			<span>Copyright </span>
			<span class="glyphicon glyphicon-copyright-mark"></span>
			<span> 2015 Guanshan Technology. All rights reserved.</span>
		</div>
		<div class="declare">
			<span class="beian"><a href="http://www.miitbeian.gov.cn/">沪ICP备14054036号</a></span>
		</div>
	</footer>

</section>


</div>
</div>

