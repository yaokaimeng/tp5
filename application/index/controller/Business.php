<?php
namespace app\index\controller;

use think\Db;
use think\Request;
use think\Controller;
use think\Session;

class Business extends Controller
{
	
    public function myorder()
    {
       return $this->fetch();
    }
   
   public function mysays()
   {
   		return $this->fetch();
   }
	


  //我的收藏部分
   public function mycollection()
   {

      //展示信息拿到uid
      $name = session('username');
      $uid = Db::name('user')->where("username = '$name'")->find();
      $uid = $uid['uid'];
      //dump($uid);
      //拿到gid
      $info = Db::table('shop_collection')->field('g_gid')->where("c_uid = '$uid' and isdel=0")->distinct(true)->select();
      //dump($info);
      $arr = array();
      foreach ($info as $key=>$val) {
          $val = $info[$key];
         foreach($val as $v) {
          $res = Db::name('goods')->where("id = '$v'")->find();
          //dump($res);
          $arr[] = $res; 
         }
      }
      //dump($arr);
      //$this->assign('time',$time);
      $this->assign('arr',$arr);
   		return $this->fetch();
   }

   public function addcoll()
   {
       //拿到商品id及信息
      $id = input('id');
      //dump($id);
      $info = Db::name('goods')->where("id = '$id'")->find();
      $gid = $info['id'];
       //用户信息
      $name = session('username');
      $uid = Db::name('user')->where("username = '$name'")->find();
      $uid = $uid['uid'];
      //dump($uid);
       //插入到购物车
      $data = [
        'c_uid' =>$uid,
        'g_gid' =>$gid,
      ];
      $res = Db::name('collection')->insert($data);
      $this->success('收藏成功','business/mycollection');
   }

   //取消收藏
   public function quxiao()
   {
       $id = input('param.id');
       Db::table('shop_collection')->where("g_gid='$id'")->update(['isdel' => '1']);
      $this->success('取消成功！！！');
   }
}