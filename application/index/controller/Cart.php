<?php

namespace app\think\Controller;

use think\Db;
use think\Controller;

class Cart extends Controller
{
	public function carxiu()
	{
		return $this->fetch();
	}

	//修改地址
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
}