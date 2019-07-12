<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-13
 * Time: 16:45
 */
namespace app\common\model;
use think\model;
class User extends BaseModel
{
    protected $autoWriteTimestamp = true;
    public function add($data=[]){
        if(!is_array($data)){
            exception('传递的数据不是一个数组');
        }
        return $this->data($data)->allowField(true)
            ->save();
    }

    public function LoginData($username)
    {

        if(!$username){
            exception('用户名不能为空');
        }
        $data = ['username|email'=>$username];
        $res = $this->where($data)->find();
        return $res;
    }
}