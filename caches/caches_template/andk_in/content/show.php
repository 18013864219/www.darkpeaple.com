<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","crumb"); ?>
<div id="content">
	<div class="uk-container uk-container-center">
		<!-- Main -->
		<main class="uk-width-1-1">
			<div id="main">
			<article class="uk-article">
				<h1 class="uk-article-title"><?php echo $title;?></h1>
				
				<div class="uk-article-lead">
					<!-- JiaThis Button BEGIN -->
					<div class="jiathis_style">
						<span class="jiathis_txt">分享到：</span>
						<a class="jiathis_button_qzone">QQ空间</a>
						<a class="jiathis_button_tsina">新浪微博</a>
						<a class="jiathis_button_tqq">腾讯微博</a>
						<a class="jiathis_button_renren hidden-small">人人网</a>
						<a class="jiathis_button_douban hidden-small">豆瓣</a>
						<a class="jiathis_button_weixin hidden-small">微信</a>
						<a class="jiathis_button_fav hidden-small">收藏夹</a>
						<a class="jiathis_button_copy hidden-small">复制网址</a>
					</div>
					<!-- JiaThis Button END -->
				</div>
				<div class="content" style="margin-top:20px">
				<?php if($allow_visitor==1) { ?>
					<?php echo $content;?>
					<?php if($pages) { ?><div class="pagenavi"><?php echo $pages;?></div><?php } ?>
					<?php if($voteid) { ?><script language="javascript" src="<?php echo APP_PATH;?>index.php?m=vote&c=index&a=show&action=js&subjectid=<?php echo $voteid;?>&type=2"></script><?php } ?>
				<?php } else { ?>
					<center><a href="<?php echo APP_PATH;?>index.php?m=content&c=readpoint&allow_visitor=<?php echo $allow_visitor;?>"><font color="red">阅读此信息需要您支付 <b><i><?php echo $readpoint;?> <?php if($paytype) { ?>元<?php } else { ?>点<?php } ?></i></b>，点击这里支付</font></a></center>
				<?php } ?>
				</div>
				
				<div class="uk-pagination">
					<span class="uk-pagination-previous"><a href="<?php echo $previous_page['url'];?>" title="<?php echo $previous_page['title'];?>" rel="prev"><?php echo $previous_page['title'];?></a></span>
					<span class="uk-pagination-next"><a href="<?php echo $next_page['url'];?>" title="<?php echo $next_page['title'];?>" rel="next"><?php echo $next_page['title'];?></a></span>
				</div>
				
				<div class="related">
					<div class="title"><h2>您可能也喜欢</h2></div>
					<div class="uk-grid photo-list">
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0f770b4a841d369ee4b4a888d9c68cf8&action=lists&catid=%24catid&thumb=1&order=rand%28%29&num=4\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'thumb'=>'1','order'=>'rand()','limit'=>'4',));}?>
						<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<div class="uk-width-medium-1-4">
							<a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>" target="_blank" class="uk-overlay-toggle">
								<div class="uk-overlay">
									<img src="<?php echo thumb($r[thumb],201,120);?>" alt="<?php echo $r['title'];?>">
									<div class="uk-overlay-area"></div>
								</div>
								<div class="uk-thumbnail-caption"><?php echo str_cut(strip_tags($r[title]),33);?></div>
							</a>
						</div>
						<?php $n++;}unset($n); ?>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					</div>
				</div>

				<!-- <div class="comment">
					<div class="title"><h2>我要评论</h2></div>
					<div class="ds-thread" data-category="<?php echo $CAT['catname'];?>" data-thread-key="<?php echo id_encode("show-$catid",$id,$siteid);?>" data-title="<?php echo new_addslashes($title);?>" data-author-key="<?php echo $u['userid'];?>" data-url="<?php echo $url;?>"></div>
				</div> -->
				
			</article>
			<!-- article -->
			</div>
		</main>
		<!-- / Main -->
		<?php include template("content","sidebar"); ?>
		<!-- otherItem -->
	</div>
</div>
<script type="text/javascript">
function add_favorite(title) {
	$.getJSON('<?php echo APP_PATH;?>api.php?op=add_favorite&title='+encodeURIComponent(title)+'&url='+encodeURIComponent(location.href)+'&'+Math.random()+'&callback=?', function(data){
		if(data.status==1)	{
			$("#favorite").html('收藏成功');
		} else {
			alert('请登录');
		}
	});
}
</script>
<script src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>
<script src="http://v3.jiathis.com/code/jia.js?uid=1372342552954323" charset="utf-8"></script>
<script type="text/javascript">
var duoshuoQuery = {short_name:"andkin"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = 'http://static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		|| document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
</script>
<?php include template("content","footer"); ?>