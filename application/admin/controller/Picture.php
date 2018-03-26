<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
use think\Request;
class Picture extends Controller
{
	public function picture_list()
	{
		$data = Db::name('address')->select(); 
		 $this->assign('data', $data);
		return $this->fetch();
	}

    public function picture_add()
    {
    	return $this->fetch();
    }
}