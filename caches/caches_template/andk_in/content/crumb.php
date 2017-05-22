<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!-- breadcrumb -->
<div class="crumbs">
	<div class="uk-container uk-container-center">
		<h1><?php echo $CAT['catname'];?></h1>
		<div class="uk-breadcrumb">
			<span>当前位置</span>/
			<a href="<?php echo siteurl($siteid);?>">首页</a>/
			<?php echo catpos($catid,'/');?>
			<span class="uk-active">正文</span>
		</div>
	</div>
</div>
<!-- / breadcrumb -->