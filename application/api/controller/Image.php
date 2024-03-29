<?php
namespace app\api\controller;

use think\Controller;
use think\Request;

class Image extends Controller
{
    public function upload(Request $request)
    {
        $file = $request::instance()->file('file');
        //给定一个目录
        $info = $file->move('upload');
        if($info && $info->getPathname()){
            //echo $info->getExtension();
            return show(1,'success','/'.$info->getPathname());
        }
        return show(0,'upload error');
    }
}

