<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-6-17
 * Time: 15:34
 */

namespace app\admin\controller;
use think\Controller;
use think\Request;

class Bis extends Controller
{
    private $obj;
    public function _initialize()
    {
       $this->obj = model("Bis");
    }

    /**
     * Notes:"删除的商户"
     * User: Administrator
     * Date: 2019-6-17
     * Time: 15:37
     * @return mixed
     */
    public function del()
    {
        $data = $this->obj->getBisByStatus(-1);
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    /**
     * Notes:"商户列表"
     * User: Administrator
     * Date: 2019-6-17
     * Time: 15:37
     * @return mixed
     */
    public function index()
    {
        $data = $this->obj->getBisByStatus(1);
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    /**
     * Notes:"入驻申请列表"
     * User: Administrator
     * Date: 2019-6-17
     * Time: 15:37
     * @return mixed
     */
    public function apply()
    {
        $data = $this->obj->getBisByStatus();
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    public function detail(Request $request)
    {
        //获取ID
        $id = $request->param('id');
        if(empty($id)){
            return $this->error('ID错误');
        }
        // 获取一级城市的数据
        $cityParent = model('City')->getNormalCotyByParent();
        // 获取一级栏目的数据
        $category = model('Category')->getNormalFirstCategory();
        // 获取商户数据
        $bisData = model('Bis')->get($id);
        $locationData = model('BisLocation')->get(['bis_id'=>$id,'is_main'=>1]);
        $accountData = model('BisAccount')->get(['bis_id'=>$id,'is_main'=>1]);
        return $this->fetch('',[
            'citys'=>$cityParent,
            'categorys'=>$category,
            'bisData'=>$bisData,
            'locationData'=>$locationData,
            'accountData'=>$accountData
        ]);
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
        $loaction = model('BisLocation')->save(['status'=>$getData['status']],['bis_id'=>$getData['id'],'is_main'=>1]);
        $account = model('BisAccount')->save(['status'=>$getData['status']],['bis_id'=>$getData['id'],'is_main'=>1]);


        if($res&&$loaction&&$account){
            $data = model('Bis')->get($getData['id']);
            if($data['status']==1){
                $title = 'o2o商城审核邮件';
                $content = '恭喜您通过审核';
                \phpmailer\Email::send($data['email'],$title,$content);
            }
            return $this->success('状态修改成功');
        }else{
            return $this->error('状态修改失败');
        }
    }

}