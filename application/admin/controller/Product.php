<?php

namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
use app\admin\model\ProductModel;
use think\Validate;
class Product extends Common 
{
	
	public function product_category()
	{
		return $this->fetch();
	}

	public function product_category_ajax()
	{
		$data = Db::name('category')->field(['sid','big','uname'])->select();
		//var_dump($data);
	 echo json_encode($data);

	}

	public function product_category_del()
	{
		$sid = $_GET['sid'];
		$data = Db::name('category')->where("big=".$sid)->find();
		if($data){
			$str = "分类下面还有子分类,不能删除";
			echo json_encode($str);
		}else{
			$re = Db::name('category')->delete($sid);
			if($re){
				echo 1;
			}
		}
	}

	public function product_category_add()
	{
		$data = Db::name('category')->field(['*','concat(path,",",sid)'=>'paths'])->order('paths')->select();

		foreach($data as $k => $v){
			$data[$k]['uname']=str_repeat("|--", $v['laver']).$v['uname'];
		}
		$this->assign('data',$data);
		return $this->fetch();
	}
	//添加分类
	public function category_add()
	{
		
		$data['uname'] = input('uname');
		$data['big'] = input('big');
		if($data['uname']!="" && $data['big']!=0)
		{
		$user = new ProductModel();
		$m = Db::name('category')->field(['path'])->find($data['big']);
		//$m = Db::name('category')->field('path')->find($data['big']);
		$data['path']=$m['path'].",".$data['big'];
		$data['laver']=1;
		$data['laver']=substr_count($data['path'], ",");
		//返回插入的id
		$re = db('category')->insertGetId($data);
		$path['sid'] = $re;
		$path['path'] = $data['path'].",".$re;
		$path['laver'] = substr_count($path['path'],",");
		if($re){
			echo "<script>alert('添加成功');parent.location.href='product_category'</script>";
		}else{
			echo "<script>alert('添加失败');parent.location.href='product_category'</script>";
		}
		}else if($data['uname']!="" && $data['big']==0){
			//$user = new ProductModel();
			//$m = Db::name('category')->field('path')->find($data['big']);
			$data['path']=$data['big'];
			$data['laver']=1;
			//$data['laver']=substr_count($data['path'], ",");
			//返回插入的id
			$re = db('category')->insertGetId($data);
			$path['sid'] = $re;
			$path['path'] = $data['path'].",".$re;
			//$path['laver'] = substr_count($path['path'],",");
		if($re){
			echo "<script>alert('添加成功');parent.location.href='product_category'</script>";
		}else{
			echo "<script>alert('添加失败');parent.location.href='product_category'</script>";
		}
		}else{
			echo "<script>alert('添加失败!!,不能为空!!');parent.location.href='product_category'</script>";
		}
		}

	public function product_brand()
	{
		return $this->fetch();
	}

	public function product_list()
	{
		$data = Db::name('goods')->select();
    //$data =  Db::name('goods')->paginate(1);
		// $page = $data->render();
		 $this->assign('data', $data);
		 //$this->assign('page', $page);
      
		return $this->fetch();
	}

	public function sub()
    {
        //Db::name("table")->where("XXXX")->paginate(10,false,['query'=>request()->param()]);
        $sou = input('sub');
        $map['goodsname'] = array('like', '%' . $sou . '%');
        
        //print_r($map);exit;
        $data = db('goods')->where($map)->select();
         //var_dump($list);die;
        $data = db('goods')->where($map)->count();
        $data = Db::name('goods')->paginate(1);
		$page = $data->render();
        //$Page = new \Think\Page($count, 2);
        //$a_list = $Page->show();
        //$list=D('essay')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
        //print_r($list);exit;
        $this->assign('page',$page);
        $this->assign('data',$data);
        return $this->fetch('product_list');
}
	
	public function product_add()
	{
		$data = Db::name('category')->field(['*','concat(path,",",sid)'=>'paths'])->order('paths')->select();

		foreach($data as $k => $v){
			$data[$k]['uname']=str_repeat("|--", $v['laver']).$v['uname'];
		}
		$this->assign('data',$data);	
		return $this->fetch();
		//var_dump($_POST);
	}

	public function product_add_goods()
	{
		// dump(input());
		$data['goodsname']=input('goodsname');
		$tid = explode(",",$_POST['big']);
		$data['s_sid']=$tid[0];
		$data['tpid']=$tid[1];
		//var_dump($data);die;
		$data['unit']=input('unit');
		$data['attributes']=input('attributes');
		$data['number']=input('number');
		$data['barcode']=input('barcode');
		$data['curprice']=input('curprice');
		$data['oriprice']=input('oriprice');
		$data['cosprice']=input('cosprice');
		$data['inventory']=input('inventoryoc');
		$data['restrict']=input('restrict');
		$data['already']=input('already');
		$data['freight']=input('freight');
		$data['status']=input('status');
		$data['reorder']=input('reorder');
		$data['text']=input('editorValue');
		//$data['imagepath']=input('imagepath');
		//var_dump($data);die;
		$path  = request()->file('imagepath');
		//var_dump($data);die;
		//获取图片路径
		//$fileurl = $data->getInfo('tmp_name');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $info = $path->move(ROOT_PATH . 'public' . DS . 'uploads');
	    //$path = '/uploads/'. $info->getSaveName();
	    $data['imagepath'] = $info->getSaveName();
	    // var_dump($data);die;
	    //$path =  DS . 'uploads/' . $info->getSavename(); 
		//$path = str_replace('\\', '/', $path);
		//var_dump($path);die;
	    //var_dump($data);die;
		$result = Db::name('goods')->insert($data);
		//var_dump($result);die;
		if($result){
			$this->success("添加药品成功",'product_list','',2);
		}else{
			$this->error("添加药品失败",'product_add','',2);
		}	
}


	public function product_edit()
	{
		$goods = Db::name('goods')->find(input('id'));
		$this->assign('goods',$goods);



		$data = Db::name('category')->field(['*','concat(path,",",sid)'=>'paths'])->order('paths')->select();

		foreach($data as $k => $v){
			$data[$k]['uname']=str_repeat("|--", $v['laver']).$v['uname'];
		}
		$this->assign('data',$data);
		return $this->fetch();

	}

	public function product_edit_goods()
	{
		$data['goodsname']=input('goodsname');
		$tid = explode(",",$_POST['big']);
		$data['big']=$tid[0];
		$data['tpid']=$tid[1];
		//var_dump($data);die;
		$data['unit']=input('unit');
		$data['attributes']=input('attributes');
		$data['number']=input('number');
		$data['barcode']=input('barcode');
		$data['curprice']=input('curprice');
		$data['oriprice']=input('oriprice');
		$data['cosprice']=input('cosprice');
		$data['inventory']=input('inventoryoc');
		$data['restrict']=input('restrict');
		$data['already']=input('already');
		$data['freight']=input('freight');
		$data['status']=input('status');
		$data['reorder']=input('reorder');
		$data['text']=input('editorValue');
		$data['id']=input('id');
	

		$result = db('goods')->where("id=".$data['id'])->update($data);
		if($result){
			return $this->success("修改药品成功",'product_list','',2);
		}else{
			return $this->error("修改药品失败",'product_add','',2);
		}
	}


	public function product_list_ajax()
	{
		$id = input('id');
		$res = Db::name('goods')->where('id',"$id")->find();
		//echo json_encode($res['enable']);
		if ($res['enable'] == 0) {
			$result = db('goods')->where('id',"$id")->update(['enable'=>1]);
			if ($result) {
				echo 1;
			}
		} else{
			$result = db('goods')->where('id',"$id")->update(['enable'=>0]);
			if ($result) {
				echo 1;
			}
		}
	}

	public function del_ajax()
	{
		$id = input('id');
		$res = Db::name('goods')->where('id',"$id")->update(['enable'=>1]);
		if ($res) {
			echo 1;
		}
	}

}


