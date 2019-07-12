<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-5-31
 * Time: 10:44
 */
namespace app\index\controller;
use think\Controller;
use think\Exception;
use think\Request;

class User extends Controller
{
    // 用户登录
    public function login(Request $request)
    {
        if($request->isPost()){
            $postData = $request->post();
            $data['name|email']= $postData['userName'];

            try {
                $user = model('User')->LoginData($data['name|email']);
            }catch (\Exception $e){
                $this->error($e->getMessage());
            }
            if(!$user||$user->status != 1){
                $this->error('该用户不存在');
            }
            // 判断密码是否合理
            if(md5($postData['password'].$user->code)!=$user->password){
                $this->error('密码不正确');
            }
            if($user){
                model('User')->updateById([
                    'last_login_time'=>intval(microtime(true))
                ],$user->id);
                session('o2o_user',$user,'o2o');
                $this->success('登录成功','index/index');
            }else{
                $this->error('登录错误','user/login');
            }
        }else{
            $user = session('o2o_user','','o2o');
            if($user && $user->id){
                $this->redirect(url('index/index'));
            }
            return $this->fetch();
        }

    }

    // 退出登录
    public function logout()
    {
        session(null,'o2o');
        $this->redirect(url('user/login'));
    }

    // 用户注册
    public function register(Request $request)
    {
        if($request->isPost()){
            $postData = $request->post();
            //validate  验证
            $validate  = validate('User');
            //$validate = validate('Bis');
            if(!$validate->scene('register')->check($postData)){
                $this->error($validate->getError());
            }
            // 判断两次输入的密码 是否一致
            if($postData['repassword']!=$postData['password']){
                $this->error('两次密码不一样');
            }
            $postData['code'] = mt_rand(100,10000);
            $postData['password'] = md5($postData['password'].$postData['code']);
            if(!captcha_check($postData['verifycode'])){
                $this->error('验证码不正确');
            }
            try{
                $res = model('User')->add($postData);
            }catch (\Exception $e){
                $this->error($e->getMessage());
            }
            if($res){
                $this->success('注册成功','user/login');
            }else{
                $this->success('注册失败');
            }

        }
        return $this->fetch();
    }
}