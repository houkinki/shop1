<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-5-31
 * Time: 14:08
 */
namespace app\admin\validate;
use think\Validate;

class Category extends Validate
{
    protected $rule = [
        ['name','require|max:11','分类名必须传递|分类名不能超过10字符'],
        ['parent_id','number'],
        ['id','number'],
        ['status','number|in:-1,0,1','状态必须是数字|状态不合法'],
        ['listorder','number'],
    ];

    /**
     * @var array
     *  场景设置
     *  '模块名称'=>['ID字段']
     */
    protected $scene = [
        'add'=>['name','parent_id'], //添加
        'listorder'=>['id','listorder'],//排序
        'status'=>['id','status'],
    ];
}