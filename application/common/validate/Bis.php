<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-9
 * Time: 11:03
 */
namespace app\common\validate;
use think\Validate;

class Bis extends Validate
{
    protected $rule=[
        ['name','require|max:25','用户名必须填|用户名长都不能超过25字符'],
        ['title','require|max:25','用户名必须填|用户名长都不能超过25字符'],
        ['city_id','require'],
        ['se_city_id','require'],
        ['logo','require'],
        ['licence_logo','require'],
        ['bank_info','require'],
        ['bank_name','require'],
        ['bank_user','require'],
        ['faren','require'],
        ['faren_tel','require'],
        ['email','require'],
        ['tel','require','用户名必须填'],
        ['contact','require'],
        ['category_id','require'] ,
        ['address','require'] ,
        ['open_time','require'] ,
        ['username','require','用户名不能为空'] ,
        ['password','require','密码不能为空'],
        ['start_time','<:end_time','开始时间大于结束时间'],
        ['end_time','gt:start_time','结束时间小于开始时间'],
        ['id','number'],
        ['status','number|in:-1,0,1','状态必须是数字|状态不合法'],
    ];
    protected $scene = [
        'add'=>['name','city_id'],
        'head'=>['tel','contact'],
        'login'=>['username','password'],
        'deal'=>['name','start_time','end_time'],
        'featured'=>['title'],
        'status'=>['id','status'],
    ];

    // 验证 团购时间的有效性
    public function validTime($time11,$rule)
    {
        print_r($time11);

        if($time11>$rule){
            return true;
        }else{
            return "时间不合法";
        }
    }
}