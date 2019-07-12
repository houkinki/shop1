<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class City extends Controller
{
    //初始化 model
    private $obj;
    public function _initialize()
    {
        $this->obj=model('City');
    }

    public function getCityByParentId()
    {
        $id = input('post.id');
        if(!$id){
            $this->error('ID不合法');
        }
        //通过ID获取二级城市
        $citys = $this->obj->getNormalCotyByParent($id);
        if($citys){
            return show(1,'success',$citys);
        }else{
            return show(0,'error',$citys);
        }
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}