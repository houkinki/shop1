<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-13
 * Time: 16:45
 */
namespace app\common\model;

use think\Model;
class BaseModel extends Model
{
    protected $autoWriteTimestamp = true;
    public function add($data){
        $data['status']=0;
        $this->allowField(true)->save($data);
        return $this->id;
    }

    /**
     * Notes:"更新登录时间"
     * User: Administrator
     * Date: 2019-6-25
     * Time: 17:05
     * @param $data
     * @param $id
     */
    public function updateById($data,$id)
    {
        return $this->allowField(true)->save($data,['id'=>$id]);
    }
}