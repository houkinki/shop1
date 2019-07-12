<?php
namespace app\admin\controller;
use think\Controller;
use app\Common\model\Deal as DealModel;
use think\Request;

class Deal extends Controller
{
    private $obj;
    public function _initialize()
    {
        $this->obj = new DealModel();
    }

    public function index(Request $request)
    {

        $data = $request->get();
        $sdata = [];
        if(!empty($data['start_time'])&&!empty($data['end_time']) && strtotime($data['end_time'])>strtotime($data['start_time'])){
            $sdata['create_time']=[
                ['gt',strtotime($data['start_time'])],
                ['lt',strtotime($data['end_time'])],
            ];
        }
        if(!empty($data['category_id'])){
            $sdata['category_id']=$data['category_id'];
        }
        if(!empty($data['city_id'])){
            $sdata['city_id']=$data['city_id'];
        }

        //  模糊查询
        if(!empty($data['name'])){
            $sdata['name']=['like','%'.$data['name'].'%'];
        }

        $deal = $this->obj->getNormalDeals($sdata);
        //print_r($deal);
        $categoryArrs = $cityArrs = [];
        // 全部分类
        $categorys = model("Category")->getNormalCategoryByParentId();

        foreach ($categorys as $category){
            $categoryArrs[$category->id]=$category->name;
        }
        // 全部城市
        $citys = model('City')->getNormalCityByParentId();
        foreach ($citys as $city){
            $cityArrs[$city->id]=$city->name;
        }
        print_r($categoryArrs);
        print_r($cityArrs);
        return $this->fetch('',[
            'categorys'=>$categorys,
            'citys'=>$citys,
            'deal'=>$deal,
            // 当前搜索的内容的名称
            'category_id'=>empty($data['category_id'])?'':$data['category_id'],
            'city_id'=>empty($data['city_id'])?'':$data['city_id'],
            'name'=>empty($data['name'])?'':$data['name'],
            'end_time'=>empty($data['end_time'])?'':$data['end_time'],
            'start_time'=>empty($data['start_time'])?'':$data['start_time'],
            // 城市 和商品类别
            'categoryArrs'=>$categoryArrs,
            'cityArrs'=>$cityArrs,
        ]);
    }


}
