<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","crumbs"); ?>
<div id="content">
	<div class="uk-container uk-container-center">
		<!-- Main -->
		<main class="uk-width-1-1">
			<div id="main">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b35172e224d5c1dba4253a8c340a477b&action=lists&catid=%24catid&num=15&thumb=1&order=id+DESC&cache=3600&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 15;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'thumb'=>'1','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'thumb'=>'1','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
				<div class="list">
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
					<?php $db = pc_base::load_model('hits_model'); $_r = $db->get_one(array('hitsid'=>'c-'.$modelid.'-'.$r[id])); $views = $_r[views]; ?>
					<div class="post">
						<div class="uk-grid">
							<div class="uk-width-medium-1-3">
								<div class="thumb"><a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><img src="<?php echo thumb($r[thumb],275,180);?>" alt="<?php echo $r['title'];?>"></a></div>
							</div>
							<div class="uk-width-medium-2-3">
								<h2 class="title"><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></h2>
								
								<div class="entry"><?php echo str_cut($r['description'],255);?></div>
								<div class="button"><a href="<?php echo $r['url'];?>" target="_blank" class="uk-button uk-button-small uk-button-danger">阅读全文</a></div>
							</div>
						</div>
					</div>
					<?php $n++;}unset($n); ?>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</div>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				<!-- list -->
				<div class="pagenavi"><?php echo $pages;?></div>
			</div>
		</main>
		<!-- / Main -->
		<?php include template("content","sidebar"); ?>
		<!-- otherItem -->
	</div>
</div>
<?php include template("content","footer"); ?>