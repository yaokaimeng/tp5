<?php

namespace app\index\controller;

use think\Db;
use think\Request;
use think\Controller;
use app\index\model\Lists as ListsModel;

class Lists extends Controller
{
	public function lists()
	{
		
		return $this->fetch();
	}

	public function details()
	{
		$id = input('param.id');
		//dump($id);die;
		$info = Db::name('goods')->where("id = '$id'")->find();
		//dump($info['id']);
		$comment = Db::name('comment')->where("gid = '$id'")->select();
		$this->assign('info',$info);
		$this->assign('comment', $comment);
		return $this->fetch();
	}

	public function list()
	{
		$id = input('param.id');
		//dump($id);die;
		$infos = Db::table('shop_goods')->where("s_sid = '$id'")->select();
		//dump($infos);die;
		$this->assign('infos',$infos);

		//分页
		$list = Db::Table('shop_goods')->where("s_sid = '$id'")->paginate(2);
		$page = $list->render();
		$this->assign('list', $list);
		$this->assign('page', $page);
		return $this->fetch();
	}

	//评论部分
	public function comment()
	{
		//插入评论
		$gid = input('post.id');
		//dump($gid);
		$name = session('username');
		$info = Db::name('user')->where("username = '$name'")->find();
		$id = $info['uid'];
		$content = input('post.content');
		$time = time();
		if (empty($content)) {
			$this->error('评价内容不能为空哦！！！');
		}
		$data = [
			'u_uid'=>$id,
			'content'=>$content,
			'time'=>$time,
			'gid'=>$gid
		];
		$res = Db::name('comment')->insert($data);
		if ($res) {
			$this->success('评论成功');
		} else {
			$this->error('评论失败。。。');
		}
	}
}