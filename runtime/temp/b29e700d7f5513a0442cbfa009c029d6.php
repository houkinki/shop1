<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\xampp\htdocs\shop1\public/../application/index\view\order\pay.html";i:1562811248;s:59:"D:\xampp\htdocs\shop1\application\index\view\head\head.html";i:1562310345;}*/ ?>
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
</head>

<!--支付第二步-->
<div class="secondly">
    <div class="search">
        <img src="https://passport.baidu.com/export/reg/logo-nuomi.png" />
        <div class="w-order-nav-new">
            <ul class="nav-wrap">
                <li>
                    <div class="no"><span>1</span></div>
                    <span class="text">确认订单</span>
                </li>
                <li class="to-line "></li>
                <li class="current">
                    <div class="no"><span>2</span></div>
                    <span class="text">选择支付方式</span>
                </li>
                <li class="to-line "></li>
                <li class="">
                    <div class="no"><span>3</span></div>
                    <span class="text">购买成功</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="order_infor_module">
        <div class="order_details">
            <table width="100%">
                <tbody>
                <tr>
                    <td class="fl_left ">
                        <ul class="order-list">
                            <li>
                                <span class="order-list-no">订单1:</span>
                                <span class="order-list-name">好伦哥6店单人自助</span><span class="order-list-number">2份</span>
                            </li>
                        </ul>
                    </td>
                    <td class="fl_right">
                        <dl>
                            <dt>应付金额：</dt>
                            <dd class="money"><span>107.2元</span></dd>
                        </dl>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h1 class="title">选择支付方式</h1>

    <div class="pay">第三方账户支付</div>
    <div class="paychoose">
        <input type="radio" checked />百度钱包
        <input type="radio" />支付宝
        <input type="radio" />支付宝扫码
    </div>

    <div class="pay">银行卡直接支付</div>
    <div class="paychoose">
        <input type="checkbox" />农业银行
        <input type="checkbox" />招商银行
        <input type="checkbox" />工商银行
    </div>
    <button>立即支付</button>

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
            $(".j-sumPrice").text($("td .font14").text() * num - $(".j-cellActivity span").text());
            $(".sum .price").text($("td .font14").text() * num - $(".j-cellActivity span").text());
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
</script>
</body>
</html>