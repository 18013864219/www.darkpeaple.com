<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","slider"); ?>

<div id="content">
	<div class="uk-container uk-container-center">
		<!-- Main -->
		<main class="uk-width-1-1">
			<div id="main" >
			<?php $n=1;if(is_array(subcat(0,0,0,$siteid))) foreach(subcat(0,0,0,$siteid) AS $r) { ?>
			<?php $num++?>
			<div class="uk-grid" style="margin-bottom:50px">
				<div class="uk-width-1-1" style="width:860px;">
					<div class="menu" style="width:860px;">
						<h2 style="background-color:#4D4D4D"><?php echo $r['catname'];?></h2>
						<span class="sub">
							<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f75240b4f6197018030c210d31d46bb7&action=category&catid=%24r%5Bcatid%5D&num=5&order=listorder+ASC&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$info = $content_tag->category(array('catid'=>$r[catid],'order'=>'listorder ASC','limit'=>'5',));}?>
							<?php $n=1;if(is_array($info)) foreach($info AS $v) { ?><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['catname'];?></a>/<?php $n++;}unset($n); ?>
							<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						</span>
						<span class="more">
							<a href="<?php echo $r['url'];?>" target="_blank">更多>></a>
						</span>
					</div>
				</div>
				<div class="uk-width-1-1"  style="width:860px;">
					<div class="uk-grid tm-mix" style="background-color:#ccc;margin-left:0px;height:250px;" >
						<span class="uk-width-medium-1-3" style="width:500px;height:250px;">
							<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8512261e8c9ab0ca807657418ae91efa&action=lists&catid=%24r%5Bcatid%5D&order=updatetime+DESC&thumb=1&num=1&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$info = $content_tag->lists(array('catid'=>$r[catid],'order'=>'updatetime DESC','thumb'=>'1','limit'=>'1',));}?>
             				<?php $n=1;if(is_array($info)) foreach($info AS $v) { ?>
							<div class="tm-focus" style="height:250px;width:500px;margin-left:-20px">
								<div class="thumb" style="height:250px;width:500px;">
									<a href="<?php echo $v['url'];?>" target="_blank">
									<img src="<?php echo thumb($v[thumb],273,135);?>" alt="<?php echo $v['title'];?>" style="width:500px;height:250px;">
									<div class="uk-overlay-area" style="height:250px;width:500px;"></div></a>
								</div>
							</div>
							
						</span>
						<span class="uk-width-medium-1-3" style="margin-left:500px;margin-top:-150px;">
							<div class="tm-list" >
								<ul>		
									<li>
									<div style="color:#1891D2;font-size:25px;margin-left: 50px;margin-top:-80px;"><?php echo str_cut($v[title],54);?></div>
									<div style="font-size:25px;margin-left:90px;margin-top:70px">
										<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="_blank" style="color:#FFF;">查看详情>>
										</a>
									</div>
									</li>									
								</ul>
								<?php $n++;}unset($n); ?>
              				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
							</div>
						</span>
					</div>
				</div>
			</div>
			<!-- <?php echo $r['catname'];?> -->
			<?php $n++;}unset($n); ?>
			</div>
		</main>
		<!-- / Main -->
		<?php include template("content","sidebar"); ?>
		<!-- otherItem... -->
	</div>
</div>
<div style="height:100px;"></div>
<?php include template("content","footer"); ?>