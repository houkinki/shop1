<?php
namespace app\bis\controller;
use think\Controller;
use think\Request;

class Base extends Controller
{
    public $account;
    public function _initialize()
    {
        // 判断用户是否登录
        $isLogin = $this->isLogin();
        if(!$isLogin){
            return $this->redirect('login/login');
        }
    }
    //判断是否登录
    public function isLogin()
    {
        $user = $this->getLoginUser();
        if($user && $user->id){
            return true;
        }
        return false;
    }
    // 获取用户信息
    public function getLoginUser()
    {
        if(!$this->account){
            $this->account = session('bisAccount','','bis');
        }
        return $this->account;
    }
}
