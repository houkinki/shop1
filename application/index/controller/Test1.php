<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-26
 * Time: 16:55
 */
namespace app\index\controller;
use think\Controller;

class Test1 extends Controller
{
    public function index()
    {
        $width = 500;
        $height = 300;
        $image = imagecreatetruecolor($width,$height);
        header('content-type:text/html;charset=utf-8');
        // 2.创建颜色
        $red = imagecolorallocate($image,250,0,0);
        //3.开始绘画
        //横着写一个字符
        // imagechar():水平的绘制一个字符
        imagechar($image,5,50,100,'5',$red);
        // 4. imagejpeg($image):输出图像
        imagejpeg($image);
        //6.imagedestroy($image)
        imagedestroy($image);

    }
}