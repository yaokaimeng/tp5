<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
class Article extends Controller
{
	public function article_list()
	{
		return $this->fetch();
	}

	public function article_list_add()
	{
		$data = Db::name('ads')->select();
    
		 $this->assign('data', $data);
		return $this->fetch();
	}

	public function article_tian()
	{
		return $this->fetch();
	}

	public function article_tian_add()
	{
		if(input())
		{
			$data['icon']=input('icon');
			$data['descirtion']=input('descirtion');
			$data['is_show']=input('is_show');
			$data['link']=input('link');
			$result = Db::name('ads')->insert($data);
			if($result){
				$this->success("添加链接成功",'article_list_add','',2);
			}else{
				$this->error("添加链接失败");
			}
		}else{
			return $this->error($result->getError());
		}
		
		}

		public function article_list_del()
	{
		/**
		 * [$id description]
		 * @var [type]
		 */
		$id = input('id');
		$res = Db::name('ads')->where('id',"$id")->update(['del'=>1]);
		if ($res) {
			echo 1;
		}
	}
	

	public function article_list_ajax()
	{
		/**
		 * [$id description]
		 * @var [type]
		 */
		$id = input('id');
		$res = Db::name('ads')->where('id',"$id")->find();
		//echo json_encode($res['enable']);
		if ($res['enable'] == 0) {
			$result = db('ads')->where('id',"$id")->update(['enable'=>1]);
			if ($result) {
				echo 1;
			}
		} else{
			$result = db('ads')->where('id',"$id")->update(['enable'=>0]);
			if ($result) {
				echo 1;
			}
		}
	}

	public function article_list_hui()
	{
		$data = Db::name('ads')->select(); 
		 $this->assign('data', $data);
		return $this->fetch();
	}

		public function article_del_hui()
	{
		/**
		 * [$id description]
		 * @var [type]
		 */
		$id = input('id');
		$res = Db::name('ads')->where('id',"$id")->update(['del'=>0]);
		if ($res) {
			echo 0;
		}
	}

}