<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-25
 * Time: 11:25
 */
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    /**
     * Notes:"点击修改状态"
     * User: Administrator
     * Date: 2019-6-24
     * Time: 17:25
     */
    public function status(Request $request)
    {
        $statusData = $request->param();
        $statusData['update_time']=intval(microtime(true));
        $validate = validate('Bis');
        if(!$validate->scene('status')->check($statusData)){
            $this->error($validate->getError());
        }
        // 获取控制器
        $model = $request->controller();
        $res = model($model)->save($statusData,['id'=>$statusData['id']]);
        if($res){
            return $this->success('状态修改成功');
        }else{
            return $this->error('状态修改失败');
        }
    }

    /**
     * 获取首页推荐当中的商品分类数据
     */
    public function getRecommendCats(){
        $parentIds = [];
        $cats = model('Category')->getNromalRecommendCategoryByParentId(0,5);
        foreach($cats as $cat){
            $parentIds[] = $cat->id;
        }
        // 获取二级分类的数据
        $sedCats = model('Category')->getNromalCategoryIdParentId($parentIds);
        foreach ($sedCats as $sedCat){
            $sedCatArr[$sedCat->parent_id] = [
                'id'=>$sedCat->id,
                'name'=>$sedCat->name,
            ];
        }

    }
}