<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\xampp\htdocs\shop1\public/../application/admin\view\bis\detail.html";i:1560830256;s:63:"D:\xampp\htdocs\shop1\application\admin\view\public\header.html";i:1559550613;s:63:"D:\xampp\htdocs\shop1\application\admin\view\public\footer.html";i:1559273150;}*/ ?>
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
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>o2o平台</title>
<meta name="keywords" content="tp5打造o2o平台系统">
<meta name="description" content="o2o平台">
</head>

<article class="page-container">
    <form class="form form-horizontal">
        基本信息：
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商户名称：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $bisData['name']; ?>" placeholder="" id="er" name="name">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属城市：</label>
            <div class="formControls col-xs-8 col-sm-2">
				<span class="select-box">
				<select name="city_id" class="select cityId">
					<option value="0">--请选择--</option>
					<?php if(is_array($citys) || $citys instanceof \think\Collection || $citys instanceof \think\Paginator): $i = 0; $__LIST__ = $citys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['id']; ?>" {if condition="$bisData.city_id eq $vo.id" selected="selected" {/if}}><?php echo $vo['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span>
            </div>
            <div class="formControls col-xs-8 col-sm-2">
				<span class="select-box">
				<select name="se_city_id" class="select se_city_id">
					<option value="0"><?php echo getSeCityName($bisData['city_path']); ?></option>
				</select>
				</span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
            <div class="formControls col-xs-8 col-sm-9">

                <img id="upload_org_code_img" src="<?php echo $bisData['logo']; ?>" width="150" height="150">

            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">营业执照：</label>
            <div class="formControls col-xs-8 col-sm-9">

                <img id="upload_org_code_img_other" src="<?php echo $bisData['licence_logo']; ?>" width="150" height="150">

            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">商户介绍：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <script id="editor1"  type="text/plain" name="description" style="width:80%;height:300px;"><?php echo $locationData['content']; ?></script>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">银行账号:</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $bisData['bank_info']; ?>" placeholder="" id="" name="bank_info">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">开户行名称:</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $bisData['bank_name']; ?>" placeholder="" id="er" name="bank_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">开户行姓名:</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $bisData['bank_user']; ?>" placeholder="" id="" name="bank_user">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">法人:</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $bisData['faren']; ?>" placeholder="" id="" name="faren">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">法人电话:</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $bisData['faren_tel']; ?>" placeholder="" id="" name="faren_tel">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $bisData['email']; ?>" placeholder="" id="" name="email">
            </div>
        </div>
        总店信息：
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">电话:</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $locationData['tel']; ?>" placeholder="" id="" name="tel">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">联系人:</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $locationData['contact']; ?>" placeholder="" id="" name="contact">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属分类：</label>
            <div class="formControls col-xs-8 col-sm-3"> <span class="select-box">
				<select name="category_id" class="select categoryId">
					<option value="0">--请选择--</option>
					<?php if(is_array($categorys) || $categorys instanceof \think\Collection || $categorys instanceof \think\Paginator): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['id']; ?>" <?php if($locationData['category_id'] == $vo['id']): ?> selected="selected" <?php endif; ?>><?php echo $vo['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">所属子类：</label>
            <div class="formControls col-xs-8 col-sm-3 skin-minimal">
                <div class="check-box se_category_id">
                    <?php echo getSeCategoryName($locationData['category_path']); ?>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">商户地址：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $locationData['api_address']; ?>" placeholder="" id="" name="address">
            </div>
            <a  class="btn btn-default radius ml-10 maptag">标注</a>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">营业时间:</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $locationData['open_time']; ?>" placeholder="" id="er1" name="open_time">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">门店简介：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php echo $locationData['content']; ?>
                </div>

                    </div>

                账号信息：
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">用户名:</label>
                <div class="formControls col-xs-8 col-sm-3">
                    <input type="text" class="input-text" value="<?php echo $accountData['username']; ?>" placeholder="" id="" name="username">
                    </div>
                    </div>
                    <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">密码:</label>
                <div class="formControls col-xs-8 col-sm-3">
                    <input type="password" class="input-text" value="<?php echo $accountData['password']; ?>" placeholder="" id="" name="password">
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

                <script type="text/javascript" src="/static/admin/hui/lib/ueditor/1.4.3/ueditor.config.js"></script>
                <script type="text/javascript" src="/static/admin/hui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
                <script type="text/javascript" src="/static/admin/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
                <!--分配编辑器-->
                <script>
                    var SCOPE = {
                        "city_url":"<?php echo url('api/city/getCityByParentId'); ?>",
                        "category_url":"<?php echo url('api/category/getCategoryByParentId'); ?>",
                    }
                </script>
                <script>
                    $(function(){
                        var ue = UE.getEditor('editor');
                        var ue1 = UE.getEditor('editor1');
                    });
                </script>
                </body>
                </html>