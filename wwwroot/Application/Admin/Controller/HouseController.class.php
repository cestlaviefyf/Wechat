<?php
/**
 * Created by PhpStorm.
 * User: Fu Yuefei
 * Date: 2017/7/6
 * Time: 16:20
 */

namespace Admin\Controller;


class HouseController extends AdminController
{
    public function index(){
//        /* 获取频道列表 */

        $sale = M('Sale')->select();
        $this->assign('sale', $sale);
        $this->meta_title = '物业管理';
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $sale = D('Sale');
            $data = $sale->create();
            if($data){
                $id = $sale->add();
                if($id){
                    $this->success('新增成功', U('index'));
                    //记录行为
                    action_log('update_sale', 'sale', $id, UID);
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($sale->getError());
            }
        } else {
            //获取父导航
            $this->assign('info',null);
            $this->meta_title = '新增导航';
            $this->display('edit');
        }
    }
}