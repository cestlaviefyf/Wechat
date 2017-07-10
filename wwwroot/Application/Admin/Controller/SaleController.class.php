<?php
/**
 * Created by PhpStorm.
 * User: Fu Yuefei
 * Date: 2017/7/6
 * Time: 15:03
 */

namespace Admin\Controller;


class SaleController extends AdminController
{
    public function index(){
        $pid = I('get.pid', 0);
//        /* 获取频道列表 */
        $map  = array('status' => array('gt', -1), 'pid'=>$pid);
//        $list = M('House')->where($map)->order('sort asc,id asc')->select();
//
//        $this->assign('list', $list);
        $this->assign('pid', $pid);
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
            $pid = I('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = M('Sale')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }

            $this->assign('pid', $pid);
            $this->assign('info',null);
            $this->meta_title = '新增导航';
            $this->display('sale');
        }
    }
}