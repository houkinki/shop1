<?php
namespace app\admin\controller;
use think\Controller;
use app\Common\model\Featured as FeaturedModel;
use think\Request;

class Featured extends Base
{
    private $obj;
    public function _initialize()
    {
        $this->obj = new FeaturedModel();
    }

    public function index(Request $request)
    {
        $types = config('featured.featured_type');
        $type = $request->get('type','','intval');
        $results = $this->obj->getFeaturedsByType($type);
//        print_r($results);exit();
        //print_r($results);
        return $this->fetch('',[
            'types'=>$types,
            'results'=>$results,
            'type'=>$type
        ]);
    }

    /**
     * Notes:"推荐位置 添加或者修改"
     * User: Administrator
     * Date: 2019-6-24
     * Time: 15:57
     * @param Request $request
     * @return mixed
     */
    public function add(Request $request)
    {
        if($request->isPost()){
            $postEdit = $request->param();
            if($postEdit){
                $feature = new FeaturedModel;
                $feature->title =$postEdit['title'];
                $feature->type =$postEdit['type'];
                $feature->image =$postEdit['image'];
                $feature->url =$postEdit['url'];
                $feature->description =$postEdit['description'];
                $feature->update_time =intval(microtime(true));
                $validate = validate('Bis');
                if(!$validate->scene('featured')->check($feature)){
                    $this->error($validate->getError());
                }
                $ret = $feature->save();
                if($ret){
                    $this->success('修改成功');
                }else{
                    $this->error('修改失败');
                }
            }
            $data = $request->post();
            $validate = validate('Bis');
            if(!$validate->scene('featured')->check($data)){
                $this->error($validate->getError());
            }
            $data['create_time'] = intval(microtime(true));
            $ret = $this->obj->add($data);
            if($ret){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            $types = config('featured.featured_type');
            $editId = $request->param('id');
            if($editId){
                $data = FeaturedModel::get($editId);
                return $this->fetch('',[
                    'types'=>$types,
                    'id'=>$editId,
                    'data'=>$data
                ]);
            }
            return $this->fetch('',[
                'types'=>$types,
                'id'=>''
            ]);
        }
    }
}
