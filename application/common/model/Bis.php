<?php

namespace app\Common\model;

use think\Model;
//use app\common\model as BaseModel;

class Bis extends Model
{
    //增加数据add
    public function add($data){
        $data['status']=1;
        $this->allowField(true)->save($data);
        return $this->id;
    }

    /**
     * Notes:"通过状态获取商家数据"
     * User: Administrator
     * Date: 2019-6-17
     * Time: 15:49
     * @param int $status
     */
    public function getBisByStatus($status=0)
    {
        //排序的数组
        $order = [
            'id'=>'desc'
        ];
        //查询条件的数组
        $data = [
            'status'=>$status
        ];

        return $this->where($data)
            ->order($order)
            ->paginate(4);
    }
}
