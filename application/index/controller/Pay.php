<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-7-10
 * Time: 9:39
 */
namespace app\index\controller;
use think\Controller;
use think\Request;

class Pay extends Base
{
    public function index(Request $request)
    {
        //判断用户是否登录
        if(!$this->getLoginUser()){
            $this->error('请登录','user/login');
        }

        // 判断参数是否合法
        $orderId = $request->param('id',0,'intval');
        if(empty($orderId)){
            $this->error('请求参数不合法');
        }

        // 查询数据
        $order = model('Order')->get($orderId);
        if(empty($order)||$order->status!=1||$order->par_status!=1){
            $this->error('无法进行该项操作');
        }

        // 严格判断 订单是否 是用户本人
        if($order->username!=$this->getLoginUser()->username){
            $this->error('不是你的订单你瞎点个啥');
        }

        // 获取商品信息
        $deal = model('Deal')->get($order->deal_id);
        // 生成 微信二维码

        return $this->fetch('',[
            'deal'=>$deal,
            'order'=>$order
        ]);
    }
}