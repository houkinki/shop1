<?php

namespace app\Common\model;

use think\Model;
//use app\common\model as BaseModel;

class Featured extends Model
{
    //增加数据add
    public function add($data){
        $data['status']=1;
        if(!empty($data['id'])){
            $sql = $this->where(['id'=>$data['id']])
                ->update($data);
            return $sql;
        }else{
            $this->allowField(true)->save($data);
        }
        return $this->id;
    }

    // 查询数据
    public function getFeaturedsByType($type=0)
    {
        $data = [
            'type'=>$type,
            'status'=>['egt',0]
        ];
        $order = [
            'id'=>'desc'
        ];
        return $this->where($data)
            ->order($order)
            ->paginate(5);
    }

    // 中间banner
    public function getBannerCentreIma($type=0)
    {
        $data = [
            'type'=>$type,
            'status'=>['egt',0]
        ];
        $order = [
            'id'=>'desc'
        ];
        return $this->where($data)
            ->order($order)
            ->select();
    }


}
