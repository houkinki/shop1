<?php
namespace app\bis\controller;
use think\Controller;
use think\Request;

class Deal extends Base
{
    /**
     * Notes:"团购商品列表"
     * User: Administrator
     * Date: 2019-6-19
     * Time: 16:53
     * @return mixed
     */
    public function index()
    {
        $arr = ['a','b','c'];
        foreach ($arr as $key=>$val){
            $val = &$arr[$key];
            print_r($arr);
        }

        $bisId = $this->getLoginUser()->bis_id;
        $deal = model('Deal')->getDealByBisId($bisId);
        return $this->fetch('',[
            'deal'=>$deal,
        ]);
    }

    public function add(Request $request)
    {
        $bisId = $this->getLoginUser()->bis_id;
        if($request->isPost()){
            //如果是post提交
            $data = $request->param('','','htmlentities');
            if(!empty($data['id'])){
                print_r($request->post('id'));
                $id = $data['id'];
            }else{
                $id='';
            }

            //进行数据检验
            $validate = validate('Bis');
            if(!$validate->scene('deal')->check($data)){
                $this->error($validate->getError());
            }
            $location = model('BisLocation')->get($data['location_ids'][0]);

            $data['cat'] = '';
            if(!empty($data['se_category_id'])) {
                $data['cat'] = implode('|', $data['se_category_id']);
            }

            // 判断是否是更新

            if($id){
                $dealData = [
                    'id'=>$id,
                    'update_time'=>intval(microtime(true)),
                    'bis_id'=>$bisId,
                    'name'=>$data['name'],
                    'image'=>$data['image'],
                    'category_id'=>$data['category_id'],
                    'se_category_id'=>$data['category_id'] . ',' . $data['cat'],
                    'city_id'=>$data['city_id'],
                    'city_path' => empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'].','.$data['se_city_id'],
                    'location_ids'=>empty($data['location_ids'])?'':implode(',',$data['location_ids']),
                    'start_time'=>strtotime($data['start_time']),
                    'end_time'=>strtotime($data['end_time']),
                    'total_count'=>$data['total_count'],
                    'coupons_begin_time'=>strtotime($data['coupons_begin_time']),
                    'coupons_end_time'=>strtotime($data['coupons_end_time']),
                    'origin_price'=>$data['origin_price'],
                    'current_price'=>$data['current_price'],
                    'notes'=>$data['notes'],
                    'description'=>$data['description'],
                    'bis_account_id'=>$this->getLoginUser()->id,
                    'create_time'=>intval(microtime(true))
                ];
            }else{
                $dealData = [
                    'bis_id'=>$bisId,
                    'name'=>$data['name'],
                    'image'=>$data['image'],
                    'category_id'=>$data['category_id'],
                    'se_category_id'=>$data['category_id'] . ',' . $data['cat'],
                    'city_id'=>$data['city_id'],
                    'city_path' => empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'].','.$data['se_city_id'],
                    'location_ids'=>empty($data['location_ids'])?'':implode(',',$data['location_ids']),
                    'start_time'=>strtotime($data['start_time']),
                    'end_time'=>strtotime($data['end_time']),
                    'total_count'=>$data['total_count'],
                    'coupons_begin_time'=>strtotime($data['coupons_begin_time']),
                    'coupons_end_time'=>strtotime($data['coupons_end_time']),
                    'origin_price'=>$data['origin_price'],
                    'current_price'=>$data['current_price'],
                    'notes'=>$data['notes'],
                    'description'=>$data['description'],
                    'bis_account_id'=>$this->getLoginUser()->id,
                    'xpoint'=>$location->xpoint,
                    'ypoint'=>$location->ypoint,
                    'create_time'=>intval(microtime(true))
                ];
            }



            // 数据入库
            $res = model('Deal')->add($dealData);
            if($res){
                 $this->success('申请成功',url('deal/index'));
            }else{
                 $this->error('申请失败');
            }
        }else{
            //非post提交
            $location_ids = model('BisLocation')->getNormalLocationByBisId($bisId);
            $cityParent = model('City')->getNormalCotyByParent();
            $category = model('Category')->getNormalFirstCategory();
            return $this->fetch('',[
                'citys'=>$cityParent,
                'categorys'=>$category,
                'bislocations'=>$location_ids
            ]);
        }
    }

    /**
     * Notes:"团购商品列表"
     * User: Administrator
     * Date: 2019-6-19
     * Time: 16:53
     * @return mixed
     */
    public function detail(Request $request)
    {
        $id = $request->param('id');
        $buyingData = model('Deal')->get($id);
        $bisId = $this->getLoginUser()->bis_id;
        $location_ids = model('BisLocation')->getNormalLocationByBisId($bisId);
        $cityParent = model('City')->getNormalCotyByParent();
        $category = model('Category')->getNormalFirstCategory();
        $idsId = explode(',',$buyingData->location_ids);
        return $this->fetch('',[
            'citys'=>$cityParent,
            'categorys'=>$category,
            'bislocations'=>$location_ids,
            'buyingData'=>$buyingData,
            // 所属目录的 ID
            'idsId'=>$idsId,
            'id'=>$id
        ]);

    }
}
