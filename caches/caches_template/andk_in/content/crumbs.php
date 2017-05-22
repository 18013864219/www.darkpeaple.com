<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!-- breadcrumb -->
<div class="crumbs">
	<div class="uk-container uk-container-center">
		<?php if($CAT[catid]==18) { ?>
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=e4f9b7bcd02a9c537b22ab07ae9ed6e7&sql=select+%2A+from+v9_category+where+parentid%3D%24catid+\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_category where parentid=$catid  LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<h1><li style="float: left;width: 181px;height: 34px;line-height: 34px;background-color:#4D4D4D;cursor: pointer;text-align: center;font-size: 14px;margin-right: 8px;list-style-type: none;margin-top: 12px;"><a href="<?php echo $r['url'];?>" style="color:#fff;">&nbsp<?php echo $r['catname'];?>&nbsp</a></li></h1>
			<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<?php } else { ?>
		<h1><?php echo $CAT['catname'];?></h1>
		<?php } ?>
		<div class="uk-breadcrumb">
			<span>当前位置</span>/
			<a href="<?php echo siteurl($siteid);?>">首页</a>/
			<?php echo catpos($catid,'/');?>
			<span class="uk-active">列表</span>
		</div>
	</div>
</div>
<!-- / breadcrumb -->