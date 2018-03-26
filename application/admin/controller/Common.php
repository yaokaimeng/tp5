<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Auth;
use think\Session;
use think\Request;
class Common extends Controller
{
    //当任何函数加载的时候会调用此函数
    public function _initialize()
    {
        // 获取用户名
        $id = session::get('user')['id'];
        //var_dump($id);die;

        //判断用户名是否存在
         if (empty($id)) {
           return $this->error('没有登录');
         }

        // 获取控制器名
        //$controller = request()->controller();

        // 获取方法名
        //$action = request()->action();

        // 获取模块名
      //  $model = request()->module();
        // dump($controller);
        // dump($action);
        // dump( $model);
        //dump($id);
        // 声明Auth认证类    
        $AUTH = new Auth();
       //  $method = $model . DIRECTORY_SEPARATOR . $controller .DIRECTORY_SEPARATOR.$action;
       // if(!$auth->check($method, $id)){


       // 		$url = request()->action();
       // 		//dump($url);
       // 		//die;
       // 		 $username = session::get('username');
       		
       // 		if (empty($username)) {
       // 			$this->error('您没有登录！');
       // 		} elseif(  ) {
       // 			if ($url != 'login') {
       // 				$this->error('您没有权限访问！');
       // 			}
       // 		}
       		
            
            //return '您没有权限访问！';
        //}
        
        // if(!$AUTH->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,session::get('user')['id']));
        // 	$this->error('您没有权限访问！',url('admin/admin/index'));
        $module = request()->module();
        $controller = request()->controller();
        $action = request()->action();
        	  if(!$AUTH->check($module.'/'.$controller.'/'.$action,session::get('user')['id']));
        	 $this->success('您没有权限访问！',url('admin/admin/welcome'));
		
    }
}
  