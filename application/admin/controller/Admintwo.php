<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
use think\Request;
class Admintwo extends Controller
{
	public function admin_list()
	{
		$data= Db::name('auth_user')->select();
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function admin_permission()
	{

		$data= Db::name('auth_rule')->where('status=1')->select();
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function admin_role()
	{
		$data= Db::name('auth_group')->where('status=1')->select();
		$this->assign('data',$data);
		return $this->fetch();
	}
	
	public function admin_permission_add()
	{
		
		return $this->fetch();
	}

	public function admin_permission_add_data()
	{
		$data['name'] = input('name');
		$data['title'] = input('title');
		$data['type'] = 1;
		$data['status'] = 1;
		//var_dump($data);die;
		$result= Db::name('auth_rule')->insert($data);
		if($result){
			return $this->success("成功",'admin_permission',2);
		}else{
			return $this->error("失败"); 
		}
	}

	public function admin_role_add()
	{
		$data= Db::name('auth_rule')->where('status=1')->select();
		$this->assign('data',$data);
		
		return $this->fetch();
	}

	public function admin_add()
	{
		$data= Db::name('auth_group')->where('status=1')->select();
		$this->assign('data',$data);
		
		return $this->fetch();
	}

	//添加管理到数据库
	public function admin_add_user()
	 {
		if(input()){
			$data['admin_name'] = input('admin_name');
			$data['admin_password'] = md5(input('admin_password'));
			$name = Db::name("auth_user")->where("admin_name='". $data['admin_name'] ."'")->find();

		if($name){
		 		$res1 = Db::name('auth_user')->insert($data);
		 		$group['group_id']=input('group_id');
		 		$group['uid']=$res1;
		 		$res2 = Db::name("auth_group_access")->insert($group);

		 		if($res1&&$res2){
		 			return $this->success('添加成功',"admin_list",2);
		 		}else{
		 			return $this->error('添加失败');
		 		}
		 		}else{
		 			return $this->error("用户名已存在");
		 	}	
	  
}
 }

 		public function admin_role_add_user()
		{
			$arr  = Request::instance()->post();
			//dump($arr);die;
			$data['title'] = input('title');
			//$data['rules'] = input('check');
			//var_dump($data);die;
			//var_dump($data);die;
			$data['rules']=implode(",", $arr['check']);
			//dump($data);die;
			$data['status'] = 1;
			//var_dump($data);die;
			$result= Db::name('auth_group')->insert($data);
			if($result){
				return $this->success("成功",'admin_role',2);
			}else{
				return $this->error("失败");
			}
		}

		public function dei_ajax()
		{
			$id= input('id');
			$res = Db::name('auth_group')->where('id',"$id")->update(['enable'=>1]);
			if ($res) {
				echo 1;
		}
		}

		/**
		 * [admin_role_hui description]
		 * @return [type] [description]
		 * 
		 */
		public function admin_role_hui()
		{
			$data= Db::name('auth_group')->where('status=1')->select();
			$this->assign('data',$data);
			return $this->fetch();
		}

		/**
		 * [dei_ajax description]
		 * @return [type] [description]
		 */
		public function hui_ajax()
		{
			$id= input('id');
			$res = Db::name('auth_group')->where('id',"$id")->update(['enable'=>0]);
			if ($res) {
				echo 0;
		}
		}

		public function ajax_del()
		{
			$id= input('id');
			$res = Db::name('auth_rule')->where('id',"$id")->update(['del'=>1]);
			if ($res) {
				echo 1;
		}
		}

		public function admin_permission_hui()
		{
			$data= Db::name('auth_rule')->where('status=1')->select();
			$this->assign('data',$data);
			return $this->fetch();
		}

		public function ajax_del_hui()
		{
			$id= input('id');
			$res = Db::name('auth_rule')->where('id',"$id")->update(['del'=>0]);
			if ($res) {
				echo 0;
		}
		}

		public function admin_list_ajax()
	{
		/**
		 * [$id description]
		 * @var [type]
		 */
		$id = input('id');
		$res = Db::name('auth_user')->where('id',"$id")->find();
		//echo json_encode($res['enable']);
		if ($res['enable'] == 0) {
			$result = db('auth_user')->where('id',"$id")->update(['enable'=>1]);
			if ($result) {
				echo 1;
			}
		} else{
			$result = db('auth_user')->where('id',"$id")->update(['enable'=>0]);
			if ($result) {
				echo 1;
			}
		}
	}

	public function ajax_delt()
		{
			$id= input('id');
			$res = Db::name('auth_user')->where('id',"$id")->update(['del'=>1]);
			if ($res) {
				echo 1;
		}
		}

		public function admin_list_hui()
		{
			$data= Db::name('auth_user')->select();
			$this->assign('data',$data);
			return $this->fetch();
		}

		public function admin_ajax_hui()
		{
			$id= input('id');
			$res = Db::name('auth_user')->where('id',"$id")->update(['del'=>0]);
			if ($res) {
				echo 0;
		}
	}


}