<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-7-11
 * Time: 11:50
 */
namespace app\common\model;
use think\Model;

class Order extends Model
{
    protected $autoWriteTimestamp = true;
    public function add($data)
    {
        $data['status'] = 1;
        $result = $this->allowField(true)->save($data);
        return $result;
    }
}