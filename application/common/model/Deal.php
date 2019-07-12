<?php

namespace app\Common\model;

use think\Model;
//use app\common\model as BaseModel;

class Deal extends Model
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

    /**
     * Notes:"通过状态获取商家数据"
     * User: Administrator
     * Date: 2019-6-17
     * Time: 15:49
     * @param int $status
     */
    public function getDealByBisId($BisId=0)
    {
        //排序的数组
        $order = [
            'id'=>'desc'
        ];
        //查询条件的数组
        $data = [
            'bis_id'=>$BisId
        ];

        return $this->where($data)
            ->order($order)
            ->paginate(4);
    }

    // 查询 所有内容
    public function getNormalDeals($data = [],$orders='')
    {
        $order = [];

        if($orders=='order_sales'){
            $order['buy_count']='desc';
        }elseif ($orders=='order_price'){
            $order['id']='desc';
            $order=['current_price'=>'desc'];
        }elseif ($orders=='order_time'){
            $order['create_time']='desc';
        }

        // find_in_set(11,'se_category_id');

        $order['id']='desc';
        if(!empty($data['se_category_id'])){
            print_r($data['se_category_id']);
            $datas[] = "find_in_set(".$data['se_category_id'].",se_category_id)";
            //$datas[] = "se_category_id in (".$data['se_category_id'].")";
        }
        if(!empty($data['category_id'])){
            $datas[] = 'category_id = '.$data['category_id'];
        }
        $data['status'] = 1;
        $datas[] = 'status=1';
        //print_r(implode('AND',$datas));
        $result = $this->where(implode(' AND ',$datas))
            ->order($order)
            ->paginate();
        echo $this->getLastSql();
        return $result;
    }

    /**
     * Notes:"123456"
     * User: Administrator
     * Date: 2019-7-3
     * Time: 17:09
     * @param $id 分类
     * @param $citId 城市
     * @param $limit 条数
     */
    public function getNormalDealByCategoryId($id,$cityId,$limit=10)
    {
        $data = [
            'end_time'=>['gt',time()],
            'category_id'=>$id,
            'city_id'=>$cityId,
            'status'=>1,
        ];
        $order = [
            'listorder'=>'desc',
            'id'=>'desc',
        ];
        $result = $this->where($data)
            ->order($order);
        if($limit){
            $result = $result->limit($limit);
        }

        $ss = $result->select();
        print_r($this->getLastSql());
        return $ss;
    }
}
