<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\xampp\htdocs\shop1\public/../application/index\view\order\confirm.html";i:1562813823;s:59:"D:\xampp\htdocs\shop1\application\index\view\head\head.html";i:1562310345;}*/ ?>
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
<!--支付第一步-->
<div class="firstly">
    <div class="bindmobile-wrap">
        采用<span style="color:red">微信支付</span>，购买成功后，团购券将发到您的注册邮箱：<span class="mobile"><?php echo $user['email']; ?></span><a class="link"></a>
    </div>

    <table class="table table-goods" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <th class="first">商品</th>
            <th width="120">单价</th>
            <th width="190">数量</th>
            <th width="140">优惠</th>
            <th width="140" class="last">小计</th>
        </tr>
        <tr class="j-row">
            <td class="vtop">
                <div class="title-area" title="【<?php echo $deal['name']; ?>】精选自助餐1位！免费WiFi！">
                    <div class="img-wrap">
                        <a href="" target="_blank"><img src="image/faf2b2119313b07eadf19d880bd7912396dd8ce6.jpg" width="130" height="79"></a>
                    </div>
                    <div class="title-wrap">
                        <div class="title">
                            <a href="" class="link">【<?php echo $deal['name']; ?>】精选自助餐1位！免费WiFi！</a>
                        </div>
                        <div class="attrs"></div>
                    </div>
                </div>
            </td>
            <td>￥<span class="font14"><?php echo $deal['current_price']; ?></span></td>
            <td class="j-cell">
                <div class="buycount-ctrl">
                    <a class="j-ctrl ctrl minus disabled"><span class="horizontal"></span></a>
                    <input type="text" value="1" maxlength="10">
                    <a class="ctrl j-ctrl plus"><span class="horizontal"></span><span class="vertical"></span></a>
                </div>
                <span class="err-wrap j-err-wrap"></span>
            </td>
            <td class="j-cellActivity">-￥<span><?php echo $deal['origin_price']*$count - $deal['current_price']*$count; ?></span><br></td>
            <td class="price font14">¥<span class="j-sumPrice"><?php echo $deal['current_price']*$count*1000/1000; ?></span></td>
        </tr>
        </tbody>
    </table>



    <div class="final-price-area">应付总额：<span class="sum">￥<span class="price"><?php echo $deal['current_price']*$count; ?></span></span></div>

    <div class="page-button-wrap">
        <a  class="btn btn-primary o2o_pay">确认</a>
    </div>

    <div style="width: 100%;min-width: 1200px;height: 5px;background: #dbdbdb;margin: 50px 0 20px;"></div>
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
    $(".o2o_pay").click(function () {
        var count = $(".buycount-ctrl input").val();
        var price = $(".sum .price").text();

        url = "<?php echo url('order/index',['id'=>$deal['id']]); ?>"+"?deal_count="+count+"?total_price="+price;
        self.location = url;
    })
</script>
</body>
</html>