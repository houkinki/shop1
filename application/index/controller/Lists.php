<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-7-8
 * Time: 15:14
 */
namespace app\index\controller;
use think\Controller;
use think\Request;

class Lists extends Base
{
    public function index(Request $request)
    {
        $firstCatIds = $data = [];
        // 1.获取一级栏目分类
        $categorys = model('Category')->getNormalFirstCategory();

        foreach ($categorys as $category){
            $firstCatIds[] = $category->id;
        }
        // 2、获取二级分类
        $id = $request->param('id',0,'intval');

        // id = 0  一级分类 二级分类

        if(in_array($id,$firstCatIds)){ //一级分类
            //todo
            $parentId = $id;
            $data['category_id'] =  $id;
        }elseif($id){ //二级目录
            // 取出数据
            $modelSecond = model('Category')->get($id);

            if(!$modelSecond || $modelSecond->status!=1){
                $this->error('ID不合法');
            }
            $parentId = $modelSecond->parent_id;
            print_r($parentId);
            $data['se_category_id'] =  $id;
        }else{
            $parentId = 0;
        }

        // 获取子栏目下的所有 子分类
        $sedcategorys = [];
        if($parentId){
            $sedcategorys =  model('Category')->getNormalFirstCategory($parentId);
        }

        // 排序数据获取的逻辑
        $order_sales = $request->param('order_sales','');
        $order_price = $request->param('order_price','');
        $order_time = $request->param('order_time','');
        if(!empty($order_sales)){
            $orderflag = 'order_sales';
        }elseif (!empty($order_price)){
            $orderflag = 'order_price';
        }elseif (!empty($order_time)){
            $orderflag = 'order_time';
        }else{
            $orderflag = '';
        }

        // 查询所有数据
        $data['city_id']=$this->city->id;
        $deals = model('Deal')->getNormalDeals($data,$orderflag);
        //print_r($sedcategorys);
        return $this->fetch('lists',[
            'title'=>'商品列表页',
            // 一级栏目
            'categorys'=>$categorys,
            // 二级栏目
            'sedcategorys'=>$sedcategorys,
            // ----
            'id'=>$id,
            'parentId'=>$parentId,
            // 所有商品数据
            'deals'=>$deals,
            // 返回排序的状态
            'orderflag'=>$orderflag

        ]);
    }
}