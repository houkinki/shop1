<?php
namespace app\admin\controller;
use http\Params;
use think\Controller;
use app\common\model\Category as CaModel;
use think\Model;
use think\Request;

class Category extends Controller
{
    //初始化 model 实例
    private $obj;
    public function _initialize()
    {
        $this->obj = new CaModel();
    }

    public function index(Request $request)
    {
        //return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
//        $parentId1 = input('get.parent_id');
        $parentId = $request->param('id',0,'intval');
        $categorys = $this->obj->getFirstCategorys($parentId);
        return $this->fetch('',[
            'categorys'=>$categorys,
        ]);
    }
    /**
     * @return bool
     * 新增数据
     */
    public function add()
    {
//        $dataCase = new CaModel();
        //model('Category')->getNormalFirstCategory();
        $categorys=$this->obj->getNormalFirstCategory();
        return $this->fetch('',[
            'categorys'=>$categorys,
        ]);
    }

    /**
     * Notes:"修改栏目名称"
     * User: houkinki
     * Date: 2019-6-3
     * Time: 16:49
     */
    public function edit(Request $request,$id=0)
    {
        if($id<1)
        {
            return $this->error('参数错误');
        }
        $category = $this->obj->get($id);
        $categorys=$this->obj->getNormalFirstCategory();
        return $this->fetch('',[
            'category'=>$category,
            'categorys'=>$categorys,
        ]);

    }

    /**
     * Notes:"123456"
     * User: Administrator
     * Date: 2019-5-31
     * Time: 11:32
     *  保存数据
     */
    public function save(Request $request)
    {
        if(!$request->isPost())
        {
            return $this->error('请求错误');
        }

        $postData = request()->post();

        //$postData['status']=10;
        $validate = validate('Category');
        if(!empty($postData['id'])){

            $postData['update_time']=intval(microtime(true));
            $res = $this->obj->save($postData,['id'=>$postData['id']]);
            if($res)
            {
                $this->success('修改成功');
            }else
            {
                $this->error("修改失败");
            }
        }
        if(!$validate->scene('add')->check($postData))
        {
            $this->error($validate->getError());
        }

        // 把$postData数据提交model层
        //$res = CaModel::add($postData);
        $dataCase = new CaModel();
        //
        $res = $this->obj->add($postData);
        if($res)
        {
            $this->success('新增成功');
        }else
        {
            $this->error("新增失败");
        }

    }

    /**
     * Notes:"排序逻辑"
     * User: Administrator
     * Date: 2019-6-4
     * Time: 10:31
     */
    public function listorder($id,$listorder)
    {
        $res = $this->obj->save(['listorder'=>$listorder],['id'=>$id]);
        if($res){
            $this->result($_SERVER['HTTP_REFERER'],1,'success');
        }else{
            $this->result($_SERVER['HTTP_REFERER'],0,'更新失败');
        }
    }

    /**
     * Notes:"修改列表的状态"
     * User: Administrator
     * Date: 2019-6-4
     * Time: 11:53
     */
    public function status(Request $request)
    {
        $getData = $request->param();
        $getData['update_time']=intval(microtime(true));
        $validate = validate('Category');
        if(!$validate->scene('status')->check($getData)){
            $this->error($validate->getError());
        }
        $res = $this->obj->save($getData,['id'=>$getData['id']]);
        if($res){
            return $this->success('状态修改成功');
        }else{
            return $this->error('状态修改失败');
        }
    }

}
