<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-13
 * Time: 16:45
 */
namespace app\common\model;

use think\Model;
class BisAccount extends Model
{
    protected $autoWriteTimestamp = true;
    public function add($data){
        $data['status']=0;
        $this->allowField(true)->save($data);
        return $this->id;
    }

    public function updateById($data,$id)
    {
        $this->allowField(true)->save($data,['id'=>$id]);
    }
}