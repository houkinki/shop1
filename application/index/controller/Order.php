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

class Order extends Base
{
    public function confirm(Request $request)
    {
        //判断是否登录
        if(!$this->getLoginUser()){
            $this->error('请登录','user/login');
        }

        // 判断参数是否合法
        $id = $request->param('id',0,'intval');
        if(!$id){
            $this->error('参数不合法');
        }
        $count = $request->get('count',1,'intval');

        // // 根据ID查询商品的数据
        $deal =model('Deal')->get($id);
        // echo model('Deal')->getLastSql()
        if(!$deal || $deal->status != 1){
            $this->error("商品不存在");
        }
        // 对象转为数组
        $deal = $deal->toArray();

        return $this->fetch('',[
            'controler'=>'pay',
            'title'=>$deal['name'],
            'deal'=>$deal,
            'count'=>$count
        ]);
    }

    // 支付详情页面
    public function index(Request $request)
    {
        // 判断是否登录
        $user = $this->getLoginUser();
        if(!$user){
            $this->error('用户未登录');
        }
        // 判断参数是否合法
        $id = $request->param('id',0,'intval');
        if(!$id){
            $this->error('参数不合法');
        }
        $count = $request->get('deal_count',1,'intval');
        $price = $request->get('total_price',1,'intval');
        // 根据ID查询商品的数据
        $deal = model('Deal')->get($id);
        if(!$deal || $deal->status != 1){
            $this->error("商品不存在");
        }
        // 判断商品是否存在 和状态

        //
        //print_r($_SERVER['HTTP_REFERER']);exit();
        if(empty($_SERVER['HTTP_REFERER'])){
            $this->error('请求不合法');
        }

        // 组装入库数据
        $setOrderSn = setOrderSn();
        $data = [
            'out_trade_no'=>$setOrderSn,
            'user_id'=>$user->id,
            'username'=>$user->username,
            'deal_id'=>$id,
            'deal_price'=>$price,
            'deal_count'=>$count,
            'referer' =>$_SERVER['HTTP_REFERER']
        ];
        try{
            $orderId = model('Order')->add($data);
        }catch (\Exception $e){
            $this->error('订单处理失败');
        }

        $this->redirect(url('pay/index',['id'=>$orderId]));
    }
}