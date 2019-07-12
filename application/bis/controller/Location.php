<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-19
 * Time: 10:58
 */

namespace app\bis\controller;
use think\Request;
use think\Controller;

class Location extends Base
{
    /**
     * Notes:"门店列表"
     * User: Administrator
     * Date: 2019-6-19
     * Time: 11:26
     * @return mixed
     */
    public function index()
    {

        $location = model('BisLocation')->getBisLocationByStatus(1);
        return $this->fetch('',[
            'location'=>$location,
        ]);
    }

    /**
     * Notes:"新增数据"
     * User: Administrator
     * Date: 2019-6-19
     * Time: 11:35
     * @return mixed
     */
    public function add(Request $request)
    {
        if(!$request->isPost()){
            $cityParent = model('City')->getNormalCotyByParent();
            $category = model('Category')->getNormalFirstCategory();
            return $this->fetch('',[
                'citys'=>$cityParent,
                'categorys'=>$category
            ]);
        }
        // 获取用户提交的数据
        $data = $request->param();
        //检验 数据 validate 机制
        $validate = validate('Bis');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        //获取账户相关信息
        $bisId = $this->getLoginUser()->bis_id;
        // 获取经纬度
        $lnglat = \Map::getLngLat($data['address']);
        $data['cat'] = '';
        if(!empty($data['se_category_id'])) {
            $data['cat'] = implode('|', $data['se_category_id']);
        }
        // 分店信息 添加
        $locationData = [
            'bis_id' => $bisId,
            'name' => $data['name'],
            'logo' => $data['logo'],
            'tel' => $data['tel'],
            'contact' => $data['contact'],
            'category_id' => $data['category_id'],
            'category_path' => $data['category_id'] . ',' . $data['cat'],
            'city_id' => $data['city_id'],
            'city_path' => empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'].','.$data['se_city_id'],
            'api_address' => $data['address'],
            'open_time' => $data['open_time'],
            'content' => empty($data['content']) ? '' : $data['content'],
            'is_main' => 0,// 代表的是分店信息
            'xpoint' => empty($lnglat['result']['location']['lng']) ? '' : $lnglat['result']['location']['lng'],
            'ypoint' => empty($lnglat['result']['location']['lat']) ? '' : $lnglat['result']['location']['lat'],
        ];
        $locationId = model('BisLocation')->add($locationData);
        if($locationId){
            $this->success('申请成功');
        }else{
            $this->error('申请失败');
        }
    }

    public function detail()
    {

    }
}