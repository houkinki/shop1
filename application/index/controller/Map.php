<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-7-8
 * Time: 9:58
 */

namespace app\index\controller;
use think\Controller;

class Map extends Controller
{
    public function getMapImage($data)
    {
        return \Map::staticimage($data);
    }
}