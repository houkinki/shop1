<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\xampp\htdocs\shop1\public/../application/index\view\detail\detail.html";i:1562724542;s:59:"D:\xampp\htdocs\shop1\application\index\view\head\head.html";i:1562310345;s:58:"D:\xampp\htdocs\shop1\application\index\view\head\nav.html";i:1562230232;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="/static/index/css/base.css" />
    <link rel="stylesheet" href="/static/index/css/common.css" />
    <link rel="stylesheet" href="/static/index/css/<?php echo $controlre; ?>.css" />
    <script type="text/javascript" src="/static/index/js/html5shiv.js"></script>
    <script type="text/javascript" src="/static/index/js/respond.min.js"></script>
    <script type="text/javascript" src="/static/index/js/jquery-1.11.3.min.js"></script>
</head><body>
<div class="header-bar">
    <div class="header-inner">
        <ul class="father">
            <li><a><?php echo $city['name']; ?></a></li>
            <li>|</li>
            <li class="city">
                <a>切换城市<span class="arrow-down-logo"></span></a>
                <div class="city-drop-down">
                    <h3>热门城市</h3>
                    <ul class="son">
                        <?php if(is_array($citys) || $citys instanceof \think\Collection || $citys instanceof \think\Paginator): $i = 0; $__LIST__ = $citys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php echo url('index/index',['city'=>$vo['uname']]); ?>"><?php echo $vo['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>

                </div>
            </li>
            <?php if($user): ?>
            <li> 欢迎您：<?php echo $user->username; ?> </li>
            <li> <a href="/index/user/logout">退出登录</a> </li>
            <?php else: ?>
            <li><a href="/index/user/register">注册</a></li>
            <li>|</li>
            <li><a href="/index/user/login">登录</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div class="search">
    <img src="/static/index/image/logo.png" />

</div>

<div class="nav-bar-header">
    <div class="nav-inner">
        <ul class="nav-list">
            <li class="nav-item">
                <span class="item">全部分类</span>
                <div class="left-menu">
                    <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?>
                    <div class="level-item">
                        <div class="first-level">
                            <dl>
                                <dt class="title"><a href="<?php echo url('lists/index',['id'=>$key]); ?>" target="_top"><?php echo $cat[0]; ?></a></dt>
                                <?php if(is_array($cat[1]) || $cat[1] instanceof \think\Collection || $cat[1] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($cat[1]) ? array_slice($cat[1],0,2, true) : $cat[1]->slice(0,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <dd><a href="<?php echo url('lists/index',['id'=>$vo['id']]); ?>" target="_top" class=""><?php echo $vo['name']; ?></a></dd>
                                <?php endforeach; endif; else: echo "" ;endif; ?>

                            </dl>
                        </div>
                        <div class="second-level">
                            <div class="section">
                                <div class="section-item clearfix no-top-border">
                                    <h3>其他分类</h3>
                                    <ul>
                                        <li><a class="hot">精选品牌</a></li>
                                        <?php if(is_array($cat[1]) || $cat[1] instanceof \think\Collection || $cat[1] instanceof \think\Paginator): $i = 0; $__LIST__ = $cat[1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <li><a><?php echo $vo['name']; ?></a></li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>

                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </li>
            <li class="nav-item"><a class="item first active">首页</a></li>
            <li class="nav-item"><a class="item">团购</a></li>
            <li class="nav-item"><a class="item">商户</a></li>
        </ul>
    </div>
</div>




    <div class="p-detail">
        <div class="p-bread-crumb">
            <div class="w-bread-crumb">
                <ul class="crumb-list">
                    <li class="crumb"><a>团购</a><span class="ico-gt">&gt;</span></li>
                    <li class="crumb"><a>美食</a><span class="ico-gt">&gt;</span></li>
                    <li class="crumb crumb-last"><a><?php echo $locations[0]->name; ?></a></li>
                </ul>
            </div>
        </div>
        <div class="static-hook-real static-hook-id-5"></div>
        <div class="p-item-info">
            <div class="w-item-info">
                <h2><?php echo $deal->name; ?></h2>
                <div class="item-title">
                    <span class="text-main">仅售55元，价值59元精选自助餐1位！免费WiFi！</span>
                </div>
                <div class="ii-images static-hook-real static-hook-id-6">
                    <div class="w-item-images">
                        <div class="images-board">
                            <div class="item-status ">
                                <span class="ico-status ico-jingxuan"></span>
                            </div>
                            <img src="<?php echo $deal['image']; ?>" class="item-img-large" />
                        </div>
                        <ul class="images-list clearfix">
                            <li class="images images-last">
                                <img src="<?php echo $deal->image; ?>" />
                            </li>
                        </ul>
                        <div class="erweima-share-collect">
                            <ul class="item-option clearfix">
                                <li class=" ">
                                    
                                    <div class="collect-success">
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="ii-intro">
                    <div class="w-item-intro">
                        <div class="price-area-wrap static-hook-real static-hook-id-8">
                            <div class="price-area has-promotion-icon">
                                <div class="pic-price-area">
                                    <span class="unit">¥</span>
                                    <span class="priceNum">53.6</span>
                                </div>
                                
                                <div class="market-price-area">
                                    <div class="price">¥59</div>
                                    <div class="name">价值</div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <?php if($flag == '1'): ?>
                        <div class="static-hook-real static-hook-id-9">
                            <a class="link jingxuan-box" alt="更多精选品牌特惠">
                                <div class="box">
                                    
                                    <div class="jx-update" id="j-jxUpdateTime">
                                        <span>距离开始时间还有</span>
                                        <span class="jx-timerbox"><?php echo $timedata; ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>
                        <ul class="ugc-strategy-area static-hook-real static-hook-id-10">
                            <li class="item-bought">
                                <div class="sl-wrap">
                                    <div class="sl-wrap-cnt">
                                        <div class="item-bought-num"><span class="intro-strong">23221</span>人已团购</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="buy-panel-wrap">
                            <div class="buy-panel">
                                <div class="validdate-buycount-area static-hook-real static-hook-id-11">
                                    <div class="item-countdown-row">
                                        <span class="name">有效期</span>
                                        <span class="value">2017-01-20</span>
                                    </div>
                                    <div class="item-buycount-row j-item-buycount-row">
                                        <div class="name">数&nbsp;&nbsp;&nbsp;量</div>
                                        <div class="buycount-ctrl">
                                            <a href="javascript:;" class="j-ctrl ctrl minus disabled"><span class="horizontal"></span></a>
                                            <input type="text" value="1" maxlength="10" autocomplete="off">
                                            <a href="javascript:;" class="ctrl j-ctrl plus "><span class="horizontal"></span><span class="vertical"></span></a>
                                        </div>
                                        <div class="text-wrap">
                                            <span class="left-budget">优惠价剩余20份</span>
                                            <span class="err-wrap j-err-wrap"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-buy-area">
                                    <div style="float:left" class="static-hook-real static-hook-id-12">
                                        <?php if($flag == 1): ?>
                                        <a href="" class="btn-buy btn-buy-qrnew j-btn-buy btn-hit" style="background: #c0c6c9; border-bottom: #c0c6c9">立即抢购</a>
                                        <?php else: ?>
                                        <a class="o2o_click btn-buy btn-buy-qrnew j-btn-buy btn-hit">立即抢购</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-item-info-more">
            <div class="iim-wrapper">
                <div class="spec-nav ">
                    <div class="nav-bar"></div>
                    <div class="w-spec-nav" style="position: static; top: auto; z-index: auto;">
                        <ul class="sn-list">
                            <li class="spec-nav-current">
                                <i></i><a><span>本单详情</span></a>
                            </li>
                            <li class="">
                                <i></i><a><span>消费提示</span></a>
                            </li>
                            <li class="">
                                <i></i><a><span>商家介绍</span></a>
                            </li>
                        </ul>

                    </div>
                </div>
                <ul class="j-info-all">
                    <li class="tab">
                        <div class="ia-shop-branch">
                            <div class="w-shop-branch">
                                <h3 class="w-section-header">分店信息</h3>
                                <div class="branch-content">
                                    <div class="shop-map">
                                        <div class="w-map">
                                            <img src="<?php echo url('map/getMapImage',['data'=>$mapstr]); ?>">
                                        </div>
                                    </div>
                                    <div class="branch-detail">
                                        <div>
                                            <div class="w-area-filter">
                                                <label>筛选：</label>
                                                <select name="city" class="af-content"><option value="100010000" selected="">北京市</option></select>
                                                <select name="district" class="af-content">
                                                    <option selected="">全部城区</option>
                                                    <option value="307">朝阳区</option>
                                                    <option value="392">海淀区</option>
                                                    <option value="395">丰台区</option>
                                                    <option value="408">通州区</option>
                                                    <option value="6547">平谷区</option>
                                                </select>
                                            </div>
                                            <div class="branch-list-content">
                                                <div class="w-branch-list">
                                                    <ul class="branch-list-content">
                                                        <li class="branch branch-open">
                                                            <a href="//www.nuomi.com/shop/133957" target="_blank" class="branch-name">好伦哥(西坝河店)</a>
                                                            <p class="branch-address">北京市朝阳区西坝河东里83号商业用楼（国际展览中心对面）</p>
                                                            <p class="branch-tel">01064655007</p>
                                                            <p class="map-travel">
                                                                <a href="javascript:;" class="map">
                                                                    <span class="icon"></span>
                                                                    <span class="text">查询地图</span>
                                                                </a>
                                                                <a href="javascript:;" class="travel">
                                                                    <span class="icon"></span>
                                                                    <span class="text">公交/驾车去这里</span>
                                                                </a>
                                                            </p>
                                                        </li>
                                                        <li class="branch branch-close">
                                                            <a href="//www.nuomi.com/shop/133957" target="_blank" class="branch-name">好伦哥(西坝河店)</a>
                                                            <p class="branch-address">北京市朝阳区西坝河东里83号商业用楼（国际展览中心对面）</p>
                                                            <p class="branch-tel">01064655007</p>
                                                            <p class="map-travel">
                                                                <a href="javascript:;" class="map">
                                                                    <span class="icon"></span>
                                                                    <span class="text">查询地图</span>
                                                                </a>
                                                                <a href="javascript:;" class="travel">
                                                                    <span class="icon"></span>
                                                                    <span class="text">公交/驾车去这里</span>
                                                                </a>
                                                            </p>
                                                        </li>
                                                        <li class="branch branch-close">
                                                            <a href="//www.nuomi.com/shop/133957" target="_blank" class="branch-name">好伦哥(西坝河店)</a>
                                                            <p class="branch-address">北京市朝阳区西坝河东里83号商业用楼（国际展览中心对面）</p>
                                                            <p class="branch-tel">01064655007</p>
                                                            <p class="map-travel">
                                                                <a href="javascript:;" class="map">
                                                                    <span class="icon"></span>
                                                                    <span class="text">查询地图</span>
                                                                </a>
                                                                <a href="javascript:;" class="travel">
                                                                    <span class="icon"></span>
                                                                    <span class="text">公交/驾车去这里</span>
                                                                </a>
                                                            </p>
                                                        </li>
                                                        <li class="branch branch-close">
                                                            <a href="//www.nuomi.com/shop/133957" target="_blank" class="branch-name">好伦哥(西坝河店)</a>
                                                            <p class="branch-address">北京市朝阳区西坝河东里83号商业用楼（国际展览中心对面）</p>
                                                            <p class="branch-tel">01064655007</p>
                                                            <p class="map-travel">
                                                                <a href="javascript:;" class="map">
                                                                    <span class="icon"></span>
                                                                    <span class="text">查询地图</span>
                                                                </a>
                                                                <a href="javascript:;" class="travel">
                                                                    <span class="icon"></span>
                                                                    <span class="text">公交/驾车去这里</span>
                                                                </a>
                                                            </p>
                                                        </li>
                                                        <li class="branch branch-close">
                                                            <a href="//www.nuomi.com/shop/133957" target="_blank" class="branch-name">好伦哥(西坝河店)</a>
                                                            <p class="branch-address">北京市朝阳区西坝河东里83号商业用楼（国际展览中心对面）</p>
                                                            <p class="branch-tel">01064655007</p>
                                                            <p class="map-travel">
                                                                <a href="javascript:;" class="map">
                                                                    <span class="icon"></span>
                                                                    <span class="text">查询地图</span>
                                                                </a>
                                                                <a href="javascript:;" class="travel">
                                                                    <span class="icon"></span>
                                                                    <span class="text">公交/驾车去这里</span>
                                                                </a>
                                                            </p>
                                                        </li>
                                                        <li class="branch branch-close">
                                                            <a href="//www.nuomi.com/shop/133957" target="_blank" class="branch-name">好伦哥(西坝河店)</a>
                                                            <p class="branch-address">北京市朝阳区西坝河东里83号商业用楼（国际展览中心对面）</p>
                                                            <p class="branch-tel">01064655007</p>
                                                            <p class="map-travel">
                                                                <a href="javascript:;" class="map">
                                                                    <span class="icon"></span>
                                                                    <span class="text">查询地图</span>
                                                                </a>
                                                                <a href="javascript:;" class="travel">
                                                                    <span class="icon"></span>
                                                                    <span class="text">公交/驾车去这里</span>
                                                                </a>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ifram">本单详情（此处高度随着填充的内容自动变化）</div>
                    </li>
                    <li class="tab"><div class="ifram">消费提示（此处高度随着填充的内容自动变化）</div></li>
                    <li class="tab"><div class="ifram">商家介绍（此处高度随着填充的内容自动变化）</div></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-content">
        <div class="copyright-info">
            <div class="site-info">
                
            </div>
            <div class="icons">
                
            </div>
            <div style="width:200px;margin:0 auto; padding:20px 0;">
               
            </div>
        </div>
    </div>

    <script>
        //校验正整数
        function isNaN(number){
            var reg = /^[1-9]\d*$/;
            return reg.test(number);
        }

        function inputChange(num){
            if(!isNaN(num)){
                $(".buycount-ctrl input").val("1");
            }
            else{
                $(".buycount-ctrl input").val(num);
                if(num == 1){
                    $(".buycount-ctrl a").eq(0).addClass("disabled");
                }
                else{
                    $(".buycount-ctrl a").eq(0).removeClass("disabled");
                }
            }
        }

        $(".buycount-ctrl input").keyup(function(){
            var num = $(".buycount-ctrl input").val();
            inputChange(num);
        });
        $(".minus").click(function(){
            var num = $(".buycount-ctrl input").val();
            num--;
            inputChange(num);
        });
        $(".plus").click(function(){
            var num = $(".buycount-ctrl input").val();
            num++;
            inputChange(num);
        });

        

        $(".sn-list li").click(function(){
            var index = $(".sn-list li").index(this)
            $(".sn-list li").removeClass("spec-nav-current");
            $(".j-info-all .tab").css({display: "none"});
            $(this).addClass("spec-nav-current");
            $(".j-info-all .tab").eq(index).css({display: "block"});
        });

        $(".branch").mouseenter(function(){
            $(".branch").removeClass("branch-open").addClass("branch-close");
            $(this).removeClass("branch-close").addClass("branch-open");
        });
        
        $(".o2o_click").click(function () {
            var count = $(".buycount-ctrl input").val();
            url = "<?php echo url('order/confirm',['id'=>$deal['id']]); ?>"+"?count="+count;
            window.open(url);
        })
    </script>
</body>
</html>