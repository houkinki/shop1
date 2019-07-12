<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * Notes:"网站地图 标识"
 * User: Administrator
 * Date: 2019-6-13
 * Time: 11:33
 * @param $url
 * @param int $type
 * @param array $data
 */
function doCulr($url,$type=0,$data=[]){
    //初始化
    $ch = curl_init();
    //设置选项
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HEADER,0);
    if($type==1){
        //post
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    }
    //执行并获取内容
    $output = curl_exec($ch);
    //释放curl句柄
    curl_close($ch);
    return $output;
}

// 商户入驻申请的文案
function bisRegister($status){
    if($status==1){
        $str = "入驻申请成功";
    }elseif ($status==0){
        $str = "待审核，审核后平台会发送邮件通知，请关注邮件";
    }elseif ($status==2){
        $str = "非常抱歉，您提交的材料不符合条件，请重新提交";
    }else{
        $str = "入驻申请已经被拒绝";
    }
    return $str;
}

/**
 * Notes:"通用的分页样式"
 * User: Administrator
 * Date: 2019-6-17
 * Time: 16:24
 * @param $obj
 * @return string
 */
function pagination($obj){
    if(empty($obj))
    {
        return '';
    }
    // 优化的方案
    $params = request()->param();
    return '<div class="cl pd-5 bg-1 bk-gray mt-20 tp-o2o">'.$obj->appends($params)->render().'</div>';
}

// 显示页面 显示二级城市
function getSeCityName($path)
{
    if (empty($path)){
        return '';
    }
    if(preg_match('/,/',$path)){
        $cityPath = explode(',',$path);
        $cityId = $cityPath[1];
    }else{
        $cityId = $path;
    }
    $city = model('City')->get($cityId);
    return $city->name;
}

function getSeCategoryName($path)
{

    if(empty($path)){
        return '';
    }
    if(preg_match('/|/',$path)){
        $categoryPath = explode(',',$path);
        $categoryId = $categoryPath[1];
        $categoryIds = explode('|',$categoryId);
    }else{
        $categoryIds = $path;
    }

    if(empty($categoryId)){
        return '';
    }else{
        $category = [];
        $str = '';
        foreach ($categoryIds as $value){
            $name = model('Category')->get($value)->name;
            $id = model('Category')->get($value);
            $str .= '<input name="location_ids[]" type="checkbox" id="checkbox" value="'.$id.'" checked="checked">'.$name;
        }
        return $str;
    }

}

function countLocation($ids)
{
    if($ids){
        return 1;
    }
    if(preg_match('/,/',$ids)){
        $arr = explode(',',$ids);
        return count($arr);
    }
}

// 设置订单号
function setOrderSn(){
    list($t1,$t2) = explode(' ',microtime());
    $t3 = explode('.',$t1*10000);
    return $t2.$t3[0].(rand(10000,99999));
}
