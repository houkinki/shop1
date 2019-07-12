<?php
namespace app\common\model;

use think\Model;


class Category extends Model
{
    //增加数据
    protected $autoWriteTimestamp = true;
    public function  add($data)
    {
        $data['status'] = 1;
        //$data['create_time']=time();
//        $data['name']='美食';
//        $data['listorder']=1;
//        $data['update_time']=time();
        return $this->save($data);
    }

    /**
     * Notes:"获取一级栏目"
     * User: Administrator
     * Date: 2019-5-31
     * Time: 15:29
     */
    public function getNormalFirstCategory($id=0)
    {
        $data = [
            'status'=>1,
            'parent_id'=>$id
        ];
        $order = [
            'id'=>'desc',
        ];
        return $this->where($data)
            ->order($order)
            ->select();
//            ->paginate(2);
    }

    public function getFirstCategorys($parentId=0)
    {
        $data = [
            'parent_id'=>$parentId,
            'status'=>['neq',-1]
        ];
        $order = [
            'listorder'=>'desc',
            'id'=>'desc',
        ];
        //echo $this->getLastSql();
        return $this->where($data)
            ->order($order)
            ->paginate(2);
    }

    /**
     * Notes:"团购列表页面的分类"
     * User: Administrator
     * Date: 2019-6-21
     * Time: 10:18
     */
    public function getNormalCategoryByParentId()
    {
        $data = [
            'parent_id'=>['gt',0],
            'status'=>1
        ];
        return $this->where($data)
            ->order(['id'=>'desc'])
            ->select();
    }

    public function getNormalRecommendCategoryByParentId($id=0,$limit=5)
    {
        $data = [
            'parent_id'=>$id,
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
        return $result->select();
    }

    /**
     * Notes:"获取二级目录"
     * User: Administrator
     * Date: 2019-6-27
     * Time: 9:39
     */
    public function getNormalCategoryIdParentId($ids)
    {
        $data = [
            'parent_id'=>['in',implode(',',$ids)],
            'status'=>1
        ];
        $order = [
            'listorder'=>'desc',
            'id'=>'desc',
        ];
        $result = $this->where($data)
            ->order($order)
            ->select();
        return $result;
    }
}