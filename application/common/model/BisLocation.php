<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-13
 * Time: 16:45
 */
namespace app\common\model;

use think\model;
class BisLocation extends Model
{
    protected $autoWriteTimestamp = true;
    public function add($data){
        $data['status']=0;
        $this->save($data);
        return $this->id;
    }


    public function getBisLocationByStatus($status=0)
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

    // pp
    public function getNormalLocationByBisId($bisId)
    {
        $data = [
            'bis_id'=>$bisId,
            'status'=>1
        ];
        $result = $this->where($data)
            ->order('id','desc')
            ->select();

        return $result;
    }

    // 商品详情页 查询数据
    function getNormalLocationsInId($ids)
    {
        $data = [
            'id'=>['in',$ids],
            'status'=>1
        ];
        return $this->where($data)
            ->select();
    }
}