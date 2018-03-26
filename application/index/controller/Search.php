<?php
namespace app\index\controller;
use think\Controller;

use think\Session;
use think\Db;
class Search extends Controller
{
	public function search()
	{
		$_POST['data'] = empty($_POST['data'])?'':$_POST['data'];
		
		$data = Db::table('shop_goods')->field(['id','attributes','goodsname','text','picture','curprice','status','imagepath','oriprice'])->where('goodsname','like','%'.$_POST['data'].'%')->whereOr('text','like','%'.$_POST['data'].'%')->whereOr('attributes','like','%'.$_POST['data'].'%')->select();
		
		$this->assign('data',$data);

		//分页
		$list = Db::Table('shop_goods')->paginate(4);
		$page = $list->render();
		$this->assign('list', $list);
		$this->assign('page', $page);
		return $this->fetch();
		
	}

	//分页
	public function fenye()
	{
		$list = Db::Table('shop_goods')->paginate(3);
		$page = $list->render();
		$this->assign('list', $list);
		$this->assign('page', $page);
		return $this->fetch();
	}	
	
}
