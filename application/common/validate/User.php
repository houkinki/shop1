<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-25
 * Time: 11:43
 */
namespace app\common\validate;
use think\Validate;

class User extends Validate
{
    protected $rule = [
        ['username','require|max:25|min:6','用户名不能为空|用户名不能超过25个字符|用户名不能小于6个字符'],
        ['email','email'],
        ['password','require','密码不能为空'],
        ['repassword','require','密码不能为空'],
        ['verifycode','require','验证码不能为空']
    ];

    protected $scene = [
        'register'=>['username','email','password','repassword','verifycode']
    ];
}