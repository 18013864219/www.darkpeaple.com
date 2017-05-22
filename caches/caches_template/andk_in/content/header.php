<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<!-- bootrstrap -->
<link href="<?php echo BJH_PATH;?>/bs/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo BJH_PATH;?>/bs/css/bootstrap.css" rel="stylesheet">
<script src="<?php echo BJH_PATH;?>/bs/js/jquery.min.js"></script>
<script src="<?php echo BJH_PATH;?>/bs/js/bootstrap.min.js"></script>
<script src="<?php echo BJH_PATH;?>/bs/js/holder.min.js"></script>
<?php if(!$catid) { ?>
<link rel="stylesheet" href="<?php echo BJH_PATH;?>css/Lindex.css?v=2.0">
<script src="<?php echo BJH_PATH;?>js/jquery.min.js?v=2.0"></script>
<script src="<?php echo BJH_PATH;?>js/jquery.royalslider.min.js?v=2.0"></script>
<?php } else { ?>
<link rel="stylesheet" href="<?php echo BJH_PATH;?>css/LlistShow.css?v=2.0">
<script src="<?php echo BJH_PATH;?>js/jquery.min.js?v=2.0"></script>
<?php } ?>
<!--[if lt IE 9]>
<script src="<?php echo BJH_PATH;?>js/html5.js"></script>
<link rel="stylesheet" href="<?php echo BJH_PATH;?>css/Lie.css">
<![endif]-->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo BJH_PATH;?>ico/apple-touch-icon-144-precomposed.png">
<link rel="shortcut icon" href="<?php echo BJH_PATH;?>ico/favicon.png">
</head>
<body>
<header style="background-color:black;">
<!-- nav -->
<nav class="uk-navbar" style="background-color:black;height:80px;">
	<div class="uk-container uk-container-center">
		<a class="uk-navbar-brand" href="."><img src="<?php echo BJH_PATH;?>images/logo.png" width="288" height="38" style="position:relative;top:-20px;"></a>
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
		<ul class="uk-navbar-nav hidden-small" style="position:relative;left:-300px;">
			<li <?php if(!$catid) { ?>  class="uk-active"<?php } ?>><a href=".">首页</a></li>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<?php if($r[child]==0) { ?>
			<li  class="uk-parent<?php if($catid==$r[catid] || $top_parentid==$r[catid]) { ?> uk-active<?php } ?>"> <a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=502cea5b674647987de4b8b331363f83&action=category&catid=%24r%5Bcatid%5D&num=25&siteid=%3C%3Fphp+echo+%24siteid%3B%3F%3E&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$r[catid],'siteid'=>'<?php echo $siteid;?>','order'=>'listorder ASC','limit'=>'25',));}?>
				<?php if($data) { ?>
				<div class="uk-dropdown uk-dropdown-navbar">
					<ul class="uk-nav uk-nav-navbar">
						<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
						<li><a href="<?php echo $v['url'];?>"><?php echo $v['catname'];?></a></li>
						<?php $n++;}unset($n); ?>
					</ul>
				</div>
				<?php } ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</li>
			<?php } else { ?>
			<li  class="uk-parent<?php if($catid==$r[catid] || $top_parentid==$r[catid]) { ?> uk-active<?php } ?>"> <a href="#"><?php echo $r['catname'];?></a>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=502cea5b674647987de4b8b331363f83&action=category&catid=%24r%5Bcatid%5D&num=25&siteid=%3C%3Fphp+echo+%24siteid%3B%3F%3E&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$r[catid],'siteid'=>'<?php echo $siteid;?>','order'=>'listorder ASC','limit'=>'25',));}?>
				<?php if($data) { ?>
				<div class="uk-dropdown uk-dropdown-navbar">
					<ul class="uk-nav uk-nav-navbar">
						<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
						<li><a href="<?php echo $v['url'];?>"><?php echo $v['catname'];?></a></li>
						<?php $n++;}unset($n); ?>
					</ul>
				</div>
				<?php } ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</li>
			<?php } ?>
			<?php $n++;}unset($n); ?>
			
		</ul>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<ul class="uk-navbar-nav hidden-small" style="position:relative;right:-350px;">
			<li style="margin-top:5px">
				<span>
				<?php if($_username) { ?><span style="font-size:15px;color:#fff;"><?php echo L('你好');?> <?php echo get_nickname();?> |</span>, 
				<a style="font-size:15px;color:#fff;" style="" href="<?php echo APP_PATH;?>index.php?m=member&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('个人中心');?> |</a> 
				<a style="font-size:15px;color:#fff;" href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('退出');?></a>&nbsp;&nbsp;<?php } else { ?> 
				</span>
						<span style="margin-bottom:10px;margin-right:80px">
							<a style="font-size:18px;color:#fff;" href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('注册');?></a>
								&nbsp;&nbsp;&nbsp;&nbsp;
							<a style="font-size:18px;color:#fff;" href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('登录');?></a>
						</span>
				<?php } ?>
			</li>
		</ul>
		<div class="uk-navbar-flip"><a href="#tm-offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a></div>
	</div>
</nav>
<!-- / nav -->
</header>