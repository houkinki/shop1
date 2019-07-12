<?php
function isMain($is_main)
{
    if($is_main==1){
        return "<span class='label label-success radius'>是</span>";
    }else{
        return "<span class='label label-success radius'>否</span>";
    }
}

function status($status)
{
    if($status==1)
    {
        $str = "<span class='label label-success radius'>正常</span>";
    }elseif ($status==0){
        $str = "<span class='label label-danger radius'>待审</span>";
    }else{
        $str = "<span class='label label-danger radius'>删除</span>";
    }
    return $str;
}

//团购状态 判断
function state($end_time,$start_time){
    //获取当前时间
    $currentTime = intval(microtime(true));
    if($end_time-$currentTime>=0&&$currentTime-$start_time>=0) {
        $str = "<span class='label label-success radius'>活动进行中</span>";
    }elseif($end_time-$currentTime>=0&&$currentTime-$start_time<0){
        $str = "<span class='label label-danger radius'>活动未开始</span>";
    }
    else{
        $str = "<span class='label label-danger radius'>活动已结束</span>";
    }
    return $str;
}

// 团购显示