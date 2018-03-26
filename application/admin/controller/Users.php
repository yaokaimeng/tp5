<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
class Admin extends Controller
{
	public function index()
	{
		return $this->fetch();
	}


}

