<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
use think\Request;
class Member extends Controller
{
	public function member_add()
	{
		return $this->fetch();
	}

	public function member_list()
	{


		// $id= input('uid');
		// dump($id);
		/**
		 * [$data description]
		 * @var [type]
		 */
		$data =  Db::name('user')->select();

		 $this->assign('data',$data);

		return $this->fetch();
	}

	public function member_list_ajax()
	{
		/**
		 * [$id description]
		 * @var [type]
		 */
		$id = input('uid');
		$res = Db::name('user')->where('uid',"$id")->find();
		//echo json_encode($res['enable']);
		if ($res['enable'] == 0) {
			$result = db('user')->where('uid',"$id")->update(['enable'=>1]);
			if ($result) {
				echo 1;
			}
		} else{
			$result = db('user')->where('uid',"$id")->update(['enable'=>0]);
			if ($result) {
				echo 1;
			}
		}
	}


	public function del_ajax()
	{
		/**
		 * [$id description]
		 * @var [type]
		 */
		$id = input('uid');
		$res = Db::name('user')->where('uid',"$id")->update(['disable'=>1]);
		if ($res) {
			echo 1;
		}
	}

	public function member_li()
	{
		$data = Db::name('user')->where('disable' ==1)->select();
		//var_dump($data);
 		$this->assign('data',$data);
		return $this->fetch();
	}

	public function member_li_hui()
	{
		$id = input('uid');
		$res = Db::name('user')->where('uid',"$id")->update(['disable'=>0]);
		if ($res) {
			echo 0;
		}
	}

	public function feedback_list()
	{
		$data = Db::name('comment')->select();
 		$this->assign('data',$data);
		return $this->fetch();
	}


}