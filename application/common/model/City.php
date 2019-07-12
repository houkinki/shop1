<?php

namespace app\Common\model;

use think\Db;
use think\Model;

class City extends Model
{
    //获取一级省市名称
    public function getNormalCotyByParent($parentId=0)
    {
        $data = [
            'status'=>1,
            'parent_id'=>$parentId,
        ];

        $order = [
            'id'=>'desc',
        ];

        return $this->where($data)
            ->order($order)
            ->select();
    }

    //获取所有城市名称
    public function getNormalCityByParentId()
    {
        $data = [
            'status'=>1,
            'parent_id'=>['gt',0],
        ];

        $order = [
            'id'=>'desc',
        ];

        return $this->where($data)
            ->order($order)
            ->select();
    }

    // 查询 所有城市
    public function getNormalCitys()
    {
        $data = [
            'status'=>1,
            'parent_id'=>['gt',0],
        ];

        $order = [
            'id'=>'desc',
        ];

        return $this->where($data)
            ->order($order)
            ->select();
    }
}
