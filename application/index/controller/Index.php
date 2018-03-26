<?php
namespace app\index\controller;

use think\Db;
use think\Request;
use think\Controller;
use app\index\model\Index as IndexModel;

class Index extends Controller
{
	
    public function index()
    {
      //无限极分类
      $list = Db::name('category')->where('big=0')->select();//获取一级分类
        //一级保存在数组中
        $list2 = array();
        $list3 = array();
        foreach($list as $key=>$value) {
          $list[$key]['child'] = array();
          $list2 = Db::name('category')->where('big='. $value['sid'])->select();//获取二级分类

          foreach($list2 as $k=>$v) {

             array_push( $list[$key]['child'], $v);//合并一级与二级

            $list[$key]['child'][$k]['child2']=array();//组装三级分类
           
          
              $list3 = Db::name('category')->where('big='. $v['sid'])->select();
             foreach($list3 as $v2) {
                array_push($list[$key]['child'][$k]['child2'],$v2);
             }
            
          }
        }
        //dump($list2);
       $this->assign('list', $list);

       $data = Db::name('goods')->where('attributes = 1')->select();
       //dump($data);
       $this->assign('data',$data);

      $info = Db::table('shop_goods')
              ->field('shop_goods.goodsname, shop_goods.curprice, shop_goods.imagepath,shop_goods.id')
              ->view('shop_category','uname','shop_goods.tpid = shop_category.big')
              ->limit(5)
              ->select();
              //dump($info);
      $this->assign('info', $info);
      
       return $this->fetch();
    }

   
	
}
