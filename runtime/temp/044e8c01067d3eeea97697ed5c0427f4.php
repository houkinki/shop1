<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"D:\xampp\htdocs\shop1\public/../application/bis\view\deal\detail.html";i:1561102503;s:61:"D:\xampp\htdocs\shop1\application\bis\view\public\header.html";i:1559803747;s:61:"D:\xampp\htdocs\shop1\application\bis\view\public\footer.html";i:1559809491;}*/ ?>
<!--包含头部文件-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/hui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/hui/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/css/style.css" />
  <link rel="stylesheet" type="text/css" href="/static/admin/css/common.css" />
  <link rel="stylesheet" type="text/css" href="/static/admin/uploadify/uploadify.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>o2o平台</title>
<meta name="keywords" content="tp5打造o2o平台系统">
<meta name="description" content="o2o平台">
</head>
<div class="cl pd-5 bg-1 bk-gray mt-20"> 团购商品信息</div>
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add" method="post" action="<?php echo url('deal/add',['id'=>$id]); ?>">

	基本信息：
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>团购名称：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $buyingData['name']; ?>" placeholder="" id="" name="name">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属城市：</label>
			<div class="formControls col-xs-8 col-sm-2"> 
				<span class="select-box">
				<select name="city_id" class="select cityId">

					<option value="0">--请选择--</option>
					<?php if(is_array($citys) || $citys instanceof \think\Collection || $citys instanceof \think\Paginator): $i = 0; $__LIST__ = $citys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['id']; ?>" <?php if($buyingData['city_id'] == $vo['id']): ?> selected="selected" <?php endif; ?>><?php echo $vo['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span>
			</div>
			<div class="formControls col-xs-8 col-sm-2">
				<span class="select-box">
				<select name="se_city_id" class="select se_city_id">
					<option value="0"><?php echo getSeCityName($buyingData['city_path']); ?></option>
				</select>
				</span> 
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属分类：</label>
			<div class="formControls col-xs-8 col-sm-3"> <span class="select-box">
				<select name="category_id" class="select categoryId">
					<option value="0">--请选择--</option>
					<?php if(is_array($categorys) || $categorys instanceof \think\Collection || $categorys instanceof \think\Paginator): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['id']; ?>" <?php if($buyingData['category_id'] == $vo['id']): ?> selected="selected" <?php endif; ?>><?php echo $vo['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">所属子类：</label>
			<div class="formControls col-xs-8 col-sm-3 skin-minimal">
				<div class="check-box se_category_id">
					<?php echo getSeCategoryName($buyingData['se_category_id']); ?>
				</div>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-9 col-sm-2">支持门店：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="check-box">

				<?php if(is_array($bislocations) || $bislocations instanceof \think\Collection || $bislocations instanceof \think\Paginator): $i = 0; $__LIST__ = $bislocations;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<input name="location_ids[]" type="checkbox" id="checkbox" value="<?php echo $vo['id']; ?>"
						<?php if(is_array($idsId) || $idsId instanceof \think\Collection || $idsId instanceof \think\Paginator): $i = 0; $__LIST__ = $idsId;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;if($vo1 == $vo['id']): ?> checked="checked"<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					/><?php echo $vo['name']; endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
		</div>
	
		<div class="row cl">
              <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
              <div class="formControls col-xs-8 col-sm-9">
                <input id="file_upload"  type="file" multiple="true" >
                <img  id="upload_org_code_img" src="<?php echo $buyingData['image']; ?>" width="150" height="150">
                <input id="file_upload_image" name="image" type="hidden" multiple="true" value="">
              </div>
        </div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">团购开始时间：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" name="start_time" class="input-text" id="countTimestart" onfocus="selecttime(1)" value="<?php echo date("Y-m-d H:i:s",$buyingData['start_time']); ?>"  >

			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">团购结束时间:</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" name="end_time" class="input-text" id="countTimestart" onfocus="selecttime(1)" value="<?php echo date("Y-m-d H:i:s",$buyingData['end_time']); ?>"  >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">库存数:</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $buyingData['total_count']; ?>" placeholder="" id="" name="total_count">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">原价:</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $buyingData['origin_price']; ?>" placeholder="" id="" name="origin_price">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">团购价:</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $buyingData['current_price']; ?>" placeholder="" id="" name="current_price">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">消费券生效时间：</label>
			<div class="formControls col-xs-8 col-sm-3">
				
				<input type="text" name="coupons_begin_time" class="input-text" id="countTimestart" onfocus="selecttime(1)" value='<?php echo date("Y-m-d H:i:s",$buyingData['coupons_begin_time']); ?>' >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">消费券结束时间:</label>
			<div class="formControls col-xs-8 col-sm-3">
				
				<input type="text" name="coupons_end_time" class="input-text" id="countTimestart" onfocus="selecttime(1)" value="<?php echo date("Y-m-d H:i:s",$buyingData['coupons_end_time']); ?>"  >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">团购描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<script id="editor"  type="text/plain" name="description" style="width:80%;height:300px;"><?php echo html_entity_decode($buyingData['description']); ?></script>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">购买须知：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<script id="editor2"  type="text/plain" name="notes" style="width:80%;height:300px;"> <?php echo $buyingData['notes']; ?></script>
			</div>
		</div>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 申请</button>	
			</div>
		</div>
	</form>
</article>

<!--包含尾部文件-->
<script type="text/javascript" src="/static/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>  
<script type="text/javascript" src="/static/admin/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/admin/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/static/admin/js/common.js"></script>
<script type="text/javascript" src="/static/admin/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/static/admin/js/image.js"></script>

<script type="text/javascript" src="/static/admin/hui/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/static/admin/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<!--分配编辑器-->
<script>
	var SCOPE = {
		"city_url":"<?php echo url('api/city/getCityByParentId'); ?>",
		"category_url":"<?php echo url('api/category/getCategoryByParentId'); ?>",
		"image_upload":"<?php echo url('api/image/upload'); ?>",
		"uploadify_swf":"/static/admin/uploadify/uploadify.swf",

	}
</script>
<script>
	$(function(){
		var ue = UE.getEditor('editor');
		var ue1 = UE.getEditor('editor1');
		var ue2 = UE.getEditor('editor2');
	});
</script>
</body>
</html>