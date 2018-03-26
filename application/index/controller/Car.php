<?php
namespace app\index\controller;

use think\Db;
use think\Request;
use think\Controller;
use think\Session;
use app\index\model\Car as CarModel;

class Car extends Controller
{
	   //购物车部分
    public function car1()
    {
      //展示信息拿到uid
      $name = session('username');
      if (empty($name)) {
        $this->error('请先登录或注册');
      }
      $uid = Db::name('user')->where("username = '$name'")->find();
      $uid = $uid['uid'];
      //dump($uid);拿到gid
      $info = Db::table('shop_shopcar')->field('gid')->where("u_uid = '$uid' and isdel = 0")->distinct(true)->select();
      //dump($info);die;展示信息
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
       //查询畅销品
       $chang = Db::name('goods')->where('attributes = 2')->limit(10)->select();
      
      $this->assign('chang', $chang);
      $this->assign('arr', $arr);
      return $this->fetch();
    }

    //添加购物车
    public function addcar()
    {
      //拿到商品id及信息
      $id = input('id');
      //dump($id);
      $info = Db::name('goods')->where("id = '$id'")->find();
      $gid = $info['id'];
       //用户信息
      $name = session('username');
      if (empty($name)) {
        $this->error('请先登录或注册');
      }
      $uid = Db::name('user')->where("username = '$name'")->find();
      $uid = $uid['uid'];
       //插入到购物车
      $data = [
        'u_uid' =>$uid,
        'gid'   =>$gid
      ];
      $res = Db::name('shopcar')->insert($data);
      $this->success('插入成功','car/car1');
    }

    //删除购物车
    public function delcar()
    {
      $id = input('param.id');
       Db::table('shop_shopcar')->where("gid='$id'")->update(['isdel' => '1']);
      $this->success('删除成功！！！');
    }
   
    public function car2()
    {    
      //拿到用户对应的地址
      $name = session('username');
      $uid = Db::name('user')->where("username = '$name'")->find();
      $uid = $uid['uid'];
      $address = Db::table('shop_address')->where("u_uid = '$uid' and isdel = 0")->find(); 
      
     //购物车中商品信息
      $id = input('post.name/a');
      //dump($id);
      $arr = array();
      $zong = 0;
      foreach ($id as $key=>$val) {
          $val = $id[$key];
          $info = Db::name('goods')->where("id = '$val'")->find();
         $arr[] = $info;
        //dump($info);
        //拿到价格数组相加
        $price = $info['curprice'];
        //dump($price);
        $zong += $price;
      }
      //dump($arr);
      //dump($zong);
      $this->assign('address',$address);
      $this->assign('arr', $arr);
      $this->assign('zong',$zong);
   		return $this->fetch();
    }

   //修改用户地址
    public function xiugai()
    {
      //拿到用户对应的地址
       $name = session('username');
      //dump($name);die;
      $uid = Db::name('user')->where("username = '$name'")->find();
      $uid = $uid['uid'];
      //dump($uid);die;
      $find = Db::table('shop_address')->where("u_uid = '$uid' and isdel = 0")->find(); 
      //dump($address);
      $this->assign('find', $find);
     return $this->fetch();
    }
   //修改地址
    public function add()
    {
      $id = input('param.id');
          //接收要修改数据
      $name = input('post.name');
      $province = input('post.select');
      $city = input('post.selects');
      $address = input('post.address');
      $phone = input('post.phone');
      $email = input('post.email');
      //插入数据
      $result = [
        'province'      =>$province,
        'city'        =>$city,
        'address'     =>$address,
        'phone'       =>$phone,
        'consignee'   =>$name,
        'email'       =>$email
      ];
          //dump($result);die;
      Db::name('address')->where('id', "$id")->setField($result);
         
      if (empty($result)) {
        $this->error("修改失败",'car/xiugai');
      } else{
        $this->success('修改成功','car/car2');
      }

    }
	   
    public function car22()
    {
      //拿到用户对应的地址
      $name = session('username');
      if (empty($name)) {
        $this->error('您还没有登录或注册');
      }
      $uid = Db::name('user')->where("username = '$name'")->find();
      $uid = $uid['uid'];
      $address = Db::table('shop_address')->where("u_uid = '$uid' and isdel = 0")->find(); 
      //获取商品id
      $id = input('param.id');
      $arr = Db::name('goods')->where("id = '$id'")->select();
      //dump($arr);
      $this->assign('arr',$arr);
      $this->assign('address', $address);
      return $this->fetch();
    }


     public function adds()
    {
      $id = input('param.id');
          //接收要修改数据
      $name = input('post.name');
      $province = input('post.select');
      $city = input('post.selects');
      $address = input('post.address');
      $phone = input('post.phone');
      $email = input('post.email');
      //插入数据
      $result = [
        'province'      =>$province,
        'city'        =>$city,
        'address'     =>$address,
        'phone'       =>$phone,
        'consignee'   =>$name,
        'email'       =>$email
      ];
          //dump($result);die;
      Db::name('address')->where('id', "$id")->setField($result);
         
      if (empty($result)) {
        $this->error("修改失败",'car/xiugai');
      } else{
        $this->success('修改成功','car/car22');
      }

    }
    public function car3()
    {
   		return $this->fetch();
    }
}