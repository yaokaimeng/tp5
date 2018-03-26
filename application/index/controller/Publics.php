<?php

namespace app\index\Controller;

use think\Controller;
use think\Db;

class Publics extends Controller
{
	public function head()
	{
		$name = session('username');
		$info = Db::name('user')->where("username = '$name'")->find();
		dump($info);
		$this->assign('info', $info);
		return $this->fetch();
	}
}