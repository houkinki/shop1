<?php
namespace app\index\controller;

use think\Controller;

class Index extends Base
{
    public function index()
    {
        // 商品分类 数据 美食 推荐的数据
        $datas = model('Deal')->getNormalDealByCategoryId(1,$this->city->id);
        //print_r($datas);exit();
        // 获取4个子分类
        $meishiCates = model('Category')->getNormalRecommendCategoryByParentId(1,4);
        //banner图片
        $bannerCentre = model('Featured')->getBannerCentreIma(1);
        $bannerLeft = model('Featured')->getBannerCentreIma(0);
//        print_r($bannerCentre);exit();
        return $this->fetch('index',[
            'banner'=>$bannerCentre,
            'bannerLeft'=>$bannerLeft,
            'meishiCates'=>$meishiCates,
            'datas'=>$datas,
            'title'=>'网站首页'
        ]);
    }

}
