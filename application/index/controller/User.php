<?php
namespace app\index\controller;
use traits\model\SoftDelete;
use think\Db;
use think\Request;
use app\index\model\User as UserModel;
use think\Validate;
use think\Controller;
use think\Session;

class User extends Controller
{
	
    
    public function address()
    {
      
        //遍历地址
        $name = session('username');
        //dump($name);
        $id = Db::name('user')->where("username = '$name'")->find();
        $uid = $id['uid'];
        //dump($uid);die;
        $res = Db::name('address')->where("isdel = 0 and u_uid = '$uid'")->select();
        //dump($res);die;
     
      $this->assign('res', $res);
      return $this->fetch();
    }
   
   //个人资料部分
    public function grzl()
    {
      //查询展示个人资料
      $name = Session::get('username');
     /* $msg = Db::name('user')->field('username')->select();
      dump($msg);
      $names = array_column($msg, 'username');
      dump($names);
      if ($name != $names) {
        
      }*/
      $user = Db::name('user')->where("username = '$name'")->find();
      //dump($user);
      $this->assign('user', $user);
      return $this->fetch();
    }

    //修改资料
    public function xiu()
    {
      $id = input('param.id');
      //接收数据
      $name = input('post.name');
      $realname = input('post.realname');
      $email = input('post.email');
      $phone = input('phone');
      $address = input('post.address');
      $password = md5(input('post.newpassword'));
      $data = [
        'username'  =>$name,
        'Realname'  =>$realname,
        'email'     =>$email,
        'phone'     =>$phone,
        'address'   =>$address,
        'password'  =>$password
      ];
      //dump($data);die;
      //插入数据库
      Db::name('user')->where('uid', "$id")->setField($data);
      //echo Db::name('user')->getLastSql();die;
      if (empty($data)) {
        $this->error('修改失败');
      } else {
        $this->success('修改成功');
      }
      return $this->fetch();
    }
	 
    //修改头像
    public function touxiang()
    {
      $name = session('username');
       $info = Db::name('user')->where("username = '$name'")->find();
       //dump($info);die;
       $id = $info['uid'];
       $name = $info['username'];
       $password = $info['password'];
      //上传图片
      $file = request()->file('Image');
      if (empty($file)) {
        $this->error('请选择上传文件');
      }
      $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
      if ($info) {
        $data = $info->getSaveName();
        $img = str_replace('\\', '/', $data);
        
      }
      //dump($img);die;
       //插入数据库
      Db::execute("update shop_user set Image='$img' where uid = '$id'");
    
      if ($info) {
        $this->success('文件上传成功');
      }else{
        $this->error($file->getError());
      }


    }

   public function mygrade()
   {
      $name = Session::get('username');
      $res = Db::name('user')->where("username = '$name'")->find();
      //dump($res);die;
      $this->assign('res', $res);
   		return $this->fetch();
   }

    //添加地址
    public function aaa(Request $request)
    {

    	$name = session('username');
    	//dump($name);die;
    	$uid = Db::name('user')->where("username = '$name'")->find();
    	$uid = $uid['uid'];
    	//dump($uid);
      //获取数据
      $data = $request->param();
      //dump($data);die;
      $name = $data['name'];
      $province = $data['select'];
      $city = $data['selects'];
      $address = $data['address'];
      $phone = $data['phone'];
      $email = $data['email'];
      //dump($name);die;
        $datas = [
          'province'      =>$province,
          'city'          =>$city,
          'address'       =>$address,
          'phone'         =>$phone,
          'consignee'     =>$name,
          'email'         =>$email,
          'u_uid'		  =>$uid
        ];
        //dump($datas);die;
        //插入数据库
        $res = Db::name('address')->insert($datas);
        $this->success('插入成功','user/address');
    }

    //修改地址
    public function xiugai()
    {
      //获取修改id，查询数据展示
      $id = input('param.id');
      $find = Db::name('address')->where('id',"$id")->find();
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
        $this->error("修改失败",'user/xiugai');
      } else{
        $this->success('修改成功','user/address');
      }

    }

    //删除地址
    public function del()
    {
      //use SoftDelete;
      $id = input('param.id');
      //dump($id);
      Db::table('shop_address')->where("id='$id'")->update(['isdel' => '1']);
      $this->success('删除成功！！！');
    }

    public function info()
  {
      $name = session('username');
      $id = Db::name('user')->where("username = '$name'")->find();
      $id = $id['uid'];
      
      $data = model('address')->addInfo();
 
   $info = Db::table('shop_address')
        ->field('shop_address.consignee, shop_address.address, shop_address.phone, shop_address.email')
        ->view('shop_user','uid', 'shop_address.u_uid = shop_user.uid')
        ->select();
        //dump($info);
  }

  public function smsyzm()
  {

    session_start();
    //载入ucpass类
    require_once('lib/Ucpaas.class.php');
    require_once('serverSid.php');
    $a = rand(1000,9999);
    $_SESSION['phonecode'] = $a;
    //改 $appid为AppID    和$templateid为模板ID
    $appid = "e035feaf912b4e4cb7e4bb6c3b31336f";  //应用的ID，可在开发者控制台内的短信产品下查看
    $templateid = "272809";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
    $param = $a; //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
    $mobile = $_POST['phone'];
    $uid = "";

  //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

  echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);






  }
}