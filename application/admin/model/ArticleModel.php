<?php
namespace app\admin\Model;
use think\Controller;
use think\Model;

class ArticleModel extends Model
{
    protected $_validate = array(   
      array('icon','require','链接名称不能为空!',1,'regex'), // 在新增的时候验证name字段是否唯一    
    array('icon','','链接名称不能重复!',1,'unique',3), // 在新增的时候验证name字段是否唯一  
 );
}




