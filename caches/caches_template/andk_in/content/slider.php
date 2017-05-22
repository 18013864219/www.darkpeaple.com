<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<style>
* { margin: 0 ; padding: 0;}
.flexslider { position: relative; height: 400px; overflow: hidden; background: url(<?php echo BJH_PATH;?>images/loading.gif) 50% no-repeat;width:1500px;}
.slides { position: relative; z-index: 1;width:1500px}
.slides li { height: 400px;}
.flex-control-nav { position: absolute;height:50px; bottom: 10px;top:360px;left:-80px; z-index: 2; width: 100%; text-align: center;}
.flex-control-nav li { display: inline-block; width: 14px; height: 14px; margin: 0 5px; *display: inline; zoom: 1;}
.flex-control-nav a { display: inline-block; width: 14px; height: 14px; line-height: 40px; overflow: hidden; background: url(<?php echo BJH_PATH;?>images/dot.png) right 0 no-repeat; cursor: pointer;}
.flex-control-nav .flex-active { background-position: 0 0;}
</style>
</head>

<body>
 <center>

<div class="flexslider">
	<ul class="slides">
	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3431329f40ccac39edabaae88935c5f3&action=position&posid=1&thumb=1&order=listorder+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','thumb'=>'1','order'=>'listorder DESC','limit'=>'5',));}?>
        		<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?> 
		<li>
			<a style="margin-left:-60px;" href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><img src="<?php echo thumb($r[thumb],1500,400);?>" alt="<?php echo $r['title'];?>" /></a>
		</li>
		<?php $n++;}unset($n); ?> 
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	</ul>
</div>

</center>

<script src="<?php echo BJH_PATH;?>js/jquery-1.7.2.min.js"></script>
<script src="<?php echo BJH_PATH;?>js/jquery.flexslider-min.js"></script>
<script>
$(window).load(function() {
	$('.flexslider').flexslider({
		directionNav: false,
		pauseOnAction: false
	});
});
</script>