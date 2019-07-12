<?php
namespace app\index\controller;

use think\Db;
use think\Request;

class Base extends \think\Controller
{
    public $city = '';
    public $account = '';
    /**
     * @return bool
     */
    public function _initialize()
    {
        // 城市数据 获取
        $citys = model('City')->getNormalCitys();
        // 获取首页分类的数据
        $cats = $this->getRecommendCats();
        //print_r($cats);
        $this->getCity($citys);
        $this->assign('citys',$citys);
        $this->assign('cats',$cats);
        // 分配一个公共的css样式参数
        $this->assign('controlre',strtolower(request()->controller()));
        $this->assign('city',$this->city);
        $this->assign('user',$this->getLoginUser());

    }

    /**
     * @return bool
     */
    public function getCity($citys)
    {
        // 判断初始城市
        foreach ($citys as $city){
            $city = $city->toArray();
            if($city['is_default']==1){
                $defaultuname = $city['uname'];
                break; // 终止foreach
            }
        }
        $defaultuname = $defaultuname?$defaultuname:'nanchang';
        var_dump((bool)\request()->param('city'));
        var_dump((bool)session('cityuname','','o2o'));
        if(session('cityuname11','','o2o') && !\request()->param('city'))
        {
            $cityuname = session('cityuname11','','o2o');
            //print_r(session('cityuname11','','o2o'));
            //print_r(12);

        }else{
            $cityuname = \request()->param('city',$defaultuname,'trim');
            //print_r($cityuname."123456");
            session(null,'o2o');
            session('cityuname11',$cityuname,'o2o');
            //print_r(session('cityuname11','','o2o'));
        }
        $this->city = model('City')->where(['uname'=>$cityuname])->find();

    }

    /**
     * Notes:"用户登录状态判断"
     * User: Administrator
     * Date: 2019-6-26
     * Time: 16:22
     */
    public function getLoginUser()
    {
        if(!$this->account){
            $this->account = session('o2o_user','','o2o');
        }
        return $this->account;
    }

    /**
     * Notes:"获取首页推荐当中的商品分类数据"
     * User: Administrator
     * Date: 2019-6-26
     * Time: 17:19
     */
    public function getRecommendCats()
    {
        $parentIds = $sedCatArr = $recomCats = [];
        $cats = model('Category')->getNormalRecommendCategoryByParentId(0,5);
        foreach ($cats as $cat){
            $parentIds[] = $cat->id;
        }
        // 获取二级分类的数据
        $sedCats = model('Category')->getNormalCategoryIdParentId($parentIds);
        foreach ($sedCats as $sedCat){
            $sedCatArr[$sedCat->parent_id][] = [
                'id'=>$sedCat->id,
                'name'=>$sedCat->name
            ];
        }
        // 遍历一级目录
        foreach ($cats as $cat){
            $recomCats[$cat->id] = [$cat->name,empty($sedCatArr[$cat->id])?[]:$sedCatArr[$cat->id]];
        }
        return $recomCats;
    }
}
