<?php
namespace app\index\controller;

use think\Controller;

class Detail extends Base
{
    public function index($id)
    {
        if(!intval($id)){
            $this->error('ID不合法');
        }
        // 根据ID查询商品的数据
        $deal =model('Deal')->get($id);
        //print_r($deal);exit();
        if(!$deal || $deal->status !=1){
            $this->error('该商品不存在');
        }
        // 获取分类信息
        $category = model('Category')->get($deal->category_id);
        // 获取分店信息
        $locations = model('BisLocation')->getNormalLocationsInId($deal->location_ids);
        // 判断 开始团购的时间
        $flag = 0;
        if($deal->start_time>time()){
            $flag = 1;
            $dtime = $deal->start_time-time();
            $timedata = '';
            $d = floor($dtime/(3600*24)); //0.6 0 1.2 1
            if($d){
                $timedata .= $d."天";
            }
            $h = floor($dtime%(3600*24)/3600);
            if($h){
                $timedata .= $h."小时";
            }
            $m = floor($dtime%(3600*24)%3600/60);
            if($h){
                $timedata .= $m."分";
            }
            $this->assign('timedata',$timedata);
            //$this->assign('flag',$deal->flag);
        }
        return $this->fetch('detail',[
            'title'=>$deal->name,
            'category'=>$category,
            'locations'=>$locations,
            'deal'=>$deal,
            'flag'=>$flag,
            'mapstr'=>$locations[0]['xpoint'].','.$locations[0]['ypoint']
        ]);
    }

}
