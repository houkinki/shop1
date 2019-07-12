<?php
namespace app\bis\controller;

use think\Controller;
use think\Request;


class Login extends Controller
{
    public function login(Request $request)
    {
        //登录逻辑
        if(!$request->isPost()){
            return $this->fetch('index');
        }

        //获取相关的数据
        $postData = $request->post();
        //严格的判断
        $validate = validate('Bis');
        if(!$validate->scene('login')->check($postData)){
            $this->error($validate->getError());
        }
        //通过用户名 获取 用户相关信息
        $username = model('BisAccount')->get(['username'=>$postData['username']]);
        if(!$username){
            return $this->error('用户名不存在');
        }
        if($username['status']!=1){
            return $this->error('账户正在审核中...');
        }
        $password = $username['password'];
        if($password==md5($postData['password'].$username['code'])){
            model('BisAccount')->updateById(['last_login_time'=>time()],$username->id);
            // 保存用户信息 bis是作用域
            session('bisAccount',$username,'bis');
            print_r($_SESSION);
            return $this->success('登录成功','index/index');
        }else{
            return $this->error('密码错误');
        }

        // 查询状态 status

    }

    public function logout()
    {
        //清楚session
        session(null,'bis');
        return $this->success('退出成功','login/login');
    }
}