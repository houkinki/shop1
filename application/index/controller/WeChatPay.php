<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-7-11
 * Time: 14:26
 */
namespace app\index\controller;
use think\Controller;
use think\Exception;
use think\Request;

class WeChatPay extends Controller
{
    public function notify()
    {
        // 测试
        $weixindata = file_get_contents("php://input");
        file_put_contents('/tmp/2.txt',$weixindata,FILE_APPEND);

        try{

        }catch (\Exception $e){

        }
    }
}