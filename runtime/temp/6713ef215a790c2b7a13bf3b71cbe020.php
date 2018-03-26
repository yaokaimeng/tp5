<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"D:\wamp64\www\tp5\public/../application/index\view\index\index.html";i:1521977630;s:57:"D:\wamp64\www\tp5\application\index\view\public\head.html";i:1521728961;s:57:"D:\wamp64\www\tp5\application\index\view\public\foot.html";i:1520935958;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>我健康商城</title>

<link href='http://www.wan.com//static/css/comm.css' rel='stylesheet' type='text/css'>
<link href='http://www.wan.com//static/css/style_index.css' rel='stylesheet' type='text/css'>

</head>

<script type="text/javascript" src="http://www.wan.com//static/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src='http://www.wan.com//static/js/lunbo.js'></script>
<script type="text/javascript" src='http://www.wan.com//static/js/other.js'></script>


<body>

  <!-- 页眉 -->
  <form action='' method=''>
  
             <div class='PTit30'>
    <div class='W1200 nav_bj'>
    
      <div class='FL'>
       <?php if(empty(\think\Session::get('username'))): ?>
       <span>欢迎来到我健康网上药店！</span>
       <a href='http://www.wan.com/index/login/login'>登录</a>
       <a href='http://www.wan.com/index/register/register'>注册</a>
       <?php else: ?>
         <a><span>欢迎   <?php echo \think\Session::get('username'); ?> ！</span></a>
      
        <a href='http://www.wan.com/index/login/logout'>退出</a>
      <?php endif; ?>
        <a href=''>后台管理中心</a>
      
      </div>
    
      <div class='FR nav_gray'>
        <div class='FL pointer'>
          <a href='javascript:;'  class='a_color'>我的我健康</a> <img src='http://www.wan.com//uploads/{}' title='' alt='' class='sjx' />
          <ul>
            <li><a href="<?php echo url('user/grzl'); ?>">我的中心</a></li>
            <li><a href='http://www.wan.com/index/business/mycollection'>我的收藏</a></li>
            <li><a href='http://www.wan.com/index/user/address'>我的地址</a></li>
          </ul>
        </div>
        <div class='FL pointer'>
          <a href='http://www.wan.com/index/business/myorder' class='a_color'>我的订单</a> <img src='http://www.wan.com//static/images/index_sjx.png' title='' alt='' class='sjx' />
          <ul>
            <li><a href='javascript:;'>待付款订单</a></li>
            <li><a href='javascript:;'>待确认收货</a></li>
          </ul>
        </div>
        <div class='FL pointer'>
          <img src='http://www.wan.com//static/images/index_gwc.png' title='' alt='' class='img_pos' />
          <a href='http://www.wan.com/index/car/car1' class='a_color'>购物车 <span></span> </a>
        </div>
        <div class='FL'><img src='http://www.wan.com//static/images/index_dh.png' class='img_pos' title='' alt='' /> 400-8811-020</div>
        <div class='FL pointer'>
          <a href='javascript:;'  class='a_color'>客户服务</a> <img src='http://www.wan.com//static/images/index_sjx.png' title='' alt='' class='sjx' />
          <ul>
            <li><a href='javascript:;'>帮助中心</a></li>
            <li><a href='javascript:;'>联系我们</a></li>
            <li><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=Wmtibm5qamNvYmsaKyt0OTU3" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_11.png"/></a></li>
          </ul>
        </div>
        <div class='FL pointer'>
          <a href='javascript:;'  class='a_color'>网站导航</a> <img src='http://www.wan.com//static/images/index_sjx.png' title='' alt='' class='sjx' />
          <div class='wzdh_xq'>
            <div>
              <div><a href='javascript:;'>特色频道</a></div>
              <p><a href='javascript:;'>男科药馆</a><a href='javascript:;'>医疗器械</a></p>
            </div>
            <div>
              <div><a href='javascript:;'>健康工具</a></div>
              <p><a href='javascript:;'>掌上药店</a><a href='javascript:;'>自助找药</a><p>
            </div>
            <div>
              <div><a href='javascript:;'>健康知多点</a></div>
              <p>
                <a href='javascript:;'>用药指南</a>
                <a href='javascript:;'>健康问答</a>
                <a href='javascript:;'>肝胆科</a>
              </p>
              <p>
                <a href='javascript:;'>皮肤科</a>
                <a href='javascript:;'>呼吸科</a>
                <a href='javascript:;'>减肥瘦身</a>
              </p>
              <p>
                <a href='javascript:;'>两性健康</a>
                <a href='javascript:;'>妇科</a>
                <a href='javascript:;'>母婴</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
    </div>
  </div>	
  <!-- logo 搜索 -->
  <div class='W1200 logo_div'>
    
    <div class='logo FL'>
      <img src='http://www.wan.com//static/images/index_logo.png' />
    </div>
    <div class='logo_ss FL'>
      <form action="<?php echo url('search/search'); ?>" method="post">
       <input class="qingshuru" type="text" value="" name="search" placeholder="请输入搜索内容"/>
      <a href="<?php echo url('search/search'); ?>" style="font-size:20px;margin-top: 5px;"><input class="sousou" type="hidden" value="搜索" name=""/>去搜索</a>
      </form>
      <div class='input_cli'>
       
        
        <div class='FL input_right'>
          <P>正在热搜中：</P>
          <p>
            <span><a href='javascript:;'>阿胶</a></span>
            <span><a href='javascript:;'>安宫牛黄丸</a></span>
            <span><a href='javascript:;'>必利劲</a></span>
            <span><a href='javascript:;'>乙肝</a></span>
            <span><a href='javascript:;'>锁阳固精丸</a></span>
            <span><a href='javascript:;'>舒利迭</a></span>
            <span><a href='javascript:;'>欧姆龙血压计</a></span>
            <span><a href='javascript:;'>恩替卡韦</a></span>
            <span><a href='javascript:;'>维生素C</a></span>
          </p>
        </div>
        
      </div>
      <p>
        <a href='javascript；;'>16.9买3件</a>
        <a href='javascript；;'>保肝护肝</a>
        <a href='javascript；;'>皮肤护理</a>
        <a href='javascript；;'>消暑养生</a>
        <a href='javascript；;'>眉眼美肤</a>
        <a href='javascript；;'>爱肠护胃</a>
      </p>
 
    </div>
    
  </div>
  <!-- 导航 -->

  <div class='nav'>
    <div class='W1200 nav_w'>
      <!--竖着的导航-->
      <ol class='nav_ol FL'>
      	
        <li><b><img src='http://www.wan.com//static/images/index_fl.png' /></b><a href='javascript:;' id='all'>全部分类</a></li>
		<?php if(!empty($list)): foreach($list as $value): ?>
        <li style="height:">
          <b><img src='http://www.wan.com//static/images/index_fl1.png' /></b>
         
          <a ><?php echo $value['uname']; ?></a>
         
          <span> &gt; </span>

          <div class='nav_st'>
           
               <div class='nav_nr'>
                <?php foreach($value['child'] as $val): ?>
                <p style="margin-left:10px;"><a href="<?php echo url('lists/list',array('id'=>$val['sid'])); ?>"><?php echo $val['uname']; ?> &gt;</a></p>
               
                     <?php foreach($val['child2'] as $v): ?>
                    <em style="margin-left: 10px;">|<a href="<?php echo url('lists/details',array('id'=>$v['sid'])); ?>"><?php echo $v['uname']; ?></a></em>
                    <?php endforeach; endforeach; ?>
              </div>
              
         </div>
          
        </li>
         <?php endforeach; endif; ?>
      
      </ol>
      <!--横着的导航-->
      <ul class='nav_ul FL'>
        
        <li><a href='javascript:;'>首页</a></li>
       
        <?php foreach($list as $value): ?>
        <li><a href='javascript:;'><?php echo $value['uname']; ?></a></li>
        <!-- 
        <li><a href='javascript:;'>器械商城</a></li> -->
         <?php endforeach; ?>
        <li>
         
          <a href='javascript:;'>用药问答</a><img src='http://www.wan.com//static/images/index_sjx.png' />
          <table cellpadding="0" cellspacing="0">
            <tr><td><a href='javascript:;'>用药指南</a></td><td><a href='javascript:;'>健康资讯</a></td></tr>
            <tr><td><a href='javascript:;'>皮肤科资讯</a></td><td><a href='javascript:;'>呼吸科资讯</a></td></tr>
            <tr><td><a href='javascript:;'>妇科资讯</a></td><td><a href='javascript:;'>减肥瘦身</a></td></tr>
            <tr><td><a href='javascript:;'>两性健康</a></td><td><a href='javascript:;'>健康问答</a></td></tr>
          </table>  
        </li>
        <li><a href='javascript:;'>慢性病用药</a></li>
        <li>
          <a href='javascript:;'>掌上我健康</a><img src='http://www.wan.com//static/images/index_sjx.png' />
          <div>
            <p><img src='http://www.wan.com//static/images/ewm.png' /></p>
            <p>关注微信</p>
          </div>  
        </li>
        <li><a href='javascript:;'>超值秒杀</a></li>
      </ul>
      



      
      <!--右边的保证-->
      
    </div>
  </div>
  
  <!-- banner -->
  
  <div class='banner'>
    <div class='banner_ig'>
      <div class='igs'>
        <div class='ig'><div class='W1200'><img src='images/banner_1.jpg' title='' alt='' /></div></div>
        <div class='ig'><div class='W1200'><img src='http://www.wan.com//static/images/banner_2.jpg' title='' alt='' /></div></div>
        <div class='ig'><div class='W1200'><img src='http://www.wan.com//static/images/banner_3.jpg' title='' alt='' /></div></div>
        <div class='ig'><div class='W1200'><img src='http://www.wan.com//static/images/banner_4.jpg' title='' alt='' /></div></div>
        <div class='ig'><div class='W1200'><img src='http://www.wan.com//static/images/banner_5.jpg' title='' alt='' /></div></div>
        <div class='ig'><div class='W1200'><img src='http://www.wan.com//static/images/banner_6.png' title='' alt='' /></div></div>
        <div class='ig'><div class='W1200'><img src='http://www.wan.com//static/images/banner_7.jpg' title='' alt='' /></div></div>
        <div class='ig'><div class='W1200'><img src='http://www.wan.com//static/images/banner_8.jpg' title='' alt='' /></div></div>
        <div class='ig'><div class='W1200'><img src='http://www.wan.com//static/images/banner_9.jpg' title='' alt='' /></div></div>
      </div>
     
      <div class='W1200 banner_btn'>
        <div class='btn btn1'></div>
        <div class='btn btn2'></div>
        <div class='yq'>
          <div class='xyq xyq_ys'></div>
          <div class='xyq'></div>
          <div class='xyq'></div>
          <div class='xyq'></div>
          <div class='xyq'></div>
          <div class='xyq'></div>
          <div class='xyq'></div>
          <div class='xyq'></div>
          <div class='xyq'></div>
        </div>
      </div> 
    </div>
  </div>
  
  
  <!-- 正文 -->
  <!-- 超值秒杀 -->
  <div class='margin'></div>
  
  
  <div class='margin' style="margin-left: 100px;">

     <iframe allowtransparency="true" frameborder="0" width="385" height="96" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=1&z=1&t=0&v=0&d=3&bd=0&k=&f=&ltf=009944&htf=cc0000&q=1&e=1&a=1&c=54511&w=385&h=96&align=center"></iframe>

     <!--音乐开始-->
     <!--  <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=5220204&auto=1&height=66" style="margin-left: 300px;"></iframe> -->
     <!--音乐结束-->
  </div>
  <!-- 健康推荐 -->
  <div class='W1200 jktj' style="margin-top:100px;">
    <div class='jktj_title'>
      <div>健康推荐</div>
    </div>
    
    <div class='jktj_nr'>
      <?php if(!empty($data)): foreach($data as $val): ?>
      <div class='jktj_mk'>
        <p>
          <a href="<?php echo url('lists/details',array('id'=>$val['id'])); ?>"><img src='http://www.wan.com//uploads/<?php echo $val['imagepath']; ?>' title='' alt='' /></a>
        </p>
        <p><a href='javascript:;'><?php echo $val['goodsname']; ?></a></p>
        <p><span>￥<?php echo $val['curprice']; ?></span></p>  
      </div>
    <?php endforeach; endif; ?>
    </div>

  </div>
  
  <div class='margin'></div>
  <div class='W1200'><img src='http://www.wan.com//static/images/index_g1.png' title='' alt='' /></div>
  <div class='margin'></div>
  
  <!-- 1f -->
  <?php foreach($list as $value): ?>
  <div class='W1200 floor floor_1'>
    <div class='floor_title floor_first'> <?php echo $value['uname']; ?></div>

    <div class='floor_nr'>
      
      <div class='FL floor_list'>
       
        <ul>
           <?php foreach($value['child'] as $val): ?>
          <li><a href='javascript:;'><?php echo $val['uname']; ?></a></li>
          
         <?php endforeach; ?>
        </ul>
        
        <p><img src='http://www.wan.com//static/images/floor1.png' title='' alt='' /></p>
      </div>
      
      <div class='FL floor_info' style="width:960px;">
        
       
        <table cellpadding="0" cellspacing="0" style="width:960px;">

                 <tr style="width:960px;">

            <?php foreach($info as $v): ?>
            <td>


              <a href="<?php echo url('lists/details',array('id'=>$v['id'])); ?>">  
           
			    <p><?php echo $v['goodsname']; ?></p> 
				
                <p><img src='http://www.wan.com//uploads/<?php echo $v['imagepath']; ?>' title='' alt='' /><?php echo $v['uname']; ?></p>
				<p>￥<?php echo $v['curprice']; ?></p>
				<p style="background-color: white;"></p>
				<p></p>
              </a>
              
            </td>
          <!--新添加的-->
            <td rowspan="2" class="td_border">
              <a href="javascript:;"><img src="images/index_product17.jpg" title="" alt=""></a>
            </td>
            <!--新添加的-->
             <?php endforeach; ?>
            </tr>
           
        </table>
     
      </div>
      
    </div>

  </div>
  <?php endforeach; ?>
  
 
  
  
  <!-- 热门品牌 -->
  <div class='W1200 rmpp'>
    <div class='rmpp_title'>
      <div>热门品牌</div>
    </div>
    
    <div class='rmpp_nr'>
      
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp2.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp3.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp4.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp5.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp6.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp7.png' title='' alt='' /></a></div>
      
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp8.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp9.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp10.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp11.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp12.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp13.png' title='' alt='' /></a></div>
      <div class='rmpp_mk'><a href='javascript'><img src='http://www.wan.com//static/images/index_pp14.png' title='' alt='' /></a></div>

    </div>

  </div>
  
  <!-- 页脚 -->
  
  <div class='footer'>
    <div class='footer_1'>
      <div class='W1200'>
        <div class='footer_mk'>
          <p class='FL'><img src='http://www.wan.com//static/images/zheng1.png' title='' alt='' /></p>
          <p class='FL'>
            <span>正品保障</span>
            <span>国家认证 正规合法</span>
          </p>
        </div>
        
        <div class='footer_mk'>
          <p class='FL'><img src='http://www.wan.com//static/images/zheng2.png' title='' alt='' /></p>
          <p class='FL'>
            <span>专业药师</span>
            <span>用药全程指导</span>
          </p>
        </div>
        
        <div class='footer_mk'>
          <p class='FL'><img src='http://www.wan.com//static/images/sou.png' title='' alt='' /></p>
          <p class='FL'>
            <span>厂家授权</span>
            <span>厂家授权 正品渠道</span>
          </p>
        </div>
        
        <div class='footer_mk'>
          <p class='FL'><img src='http://www.wan.com//static/images/zheng5.png' title='' alt='' /></p>
          <p class='FL'>
            <span>货到付款</span>
            <span>货到付款 购药无忧</span>
          </p>
        </div>
        
        <div class='footer_mk'>
          <p class='FL'><img src='http://www.wan.com//static/images/zheng4.png' title='' alt='' /></p>
          <p class='FL'>
            <span>满79元包邮</span>
            <span>全场满79元包邮</span>
          </p>
        </div>
        
        <div class='footer_mk'>
          <p class='FL'><img src='http://www.wan.com//static/images/zheng3.png' title='' alt='' /></p>
          <p class='FL'>
            <span>正品保障</span>
            <span>国家认证 正规合法</span>
          </p>
        </div>
        
      </div>
    </div>
    <div class='footer_2'>
      <div class='W1200'>
        <div class='FL footer_list'>
        
          <div class='FL footer_p1'>
            <p>手机购药</p>
            <p><img src='http://www.wan.com//static/images/ewm.png' title='' alt='' /></p>
            <p>APP首单减10元</p>
          </div>
          
          <div class='FL footer_p1'>
            <p>微信购药</p>
            <p><img src='http://www.wan.com//static/images/ewm.png' title='' alt='' /></p>
            <p>扫一扫领优惠券</p>
          </div>
          
        </div>
        
        <div class='FL footer_table'>
          <table cellpadding="0" cellspacing="0">
            <tr>
              <th>新手指南</th>
              <th>配送方式</th>
              <th>支付方式</th>
              <th>售后服务</th>
              <th>特色服务</th>
            </tr>
            <tr>
              <td><a href='javascript:;'>购物流程</a></td>
              <td><a href='javascript:;'>配送范围及运费</a></td>
              <td><a href='javascript:;'>货到付款</a></td>
              <td><a href='javascript:;'>退化货流程</a></td>
              <td><a href='javascript:;'>会员俱乐部</a></td>
            </tr>
            <tr>
              <td><a href='javascript:;'>会员级别</a></td>
              <td><a href='javascript:;'>隐私配送</a></td>
              <td><a href='javascript:;'>网上支付</a></td>
              <td><a href='javascript:;'>退换货政策</a></td>
              <td><a href='javascript:;'>投诉建议</a></td>
            </tr>
            <tr>
              <td><a href='javascript:;'>积分说明</a></td>
              <td><a href='javascript:;'>商品验收及签收</a></td>
              <td><a href='javascript:;'>银行转账</a></td>
              <td><a href='javascript:;'>退款流程</a></td>
              <td><a href='javascript:;'>用药咨询</a></td>
            </tr>
            <tr>
              <td><a href='javascript:;'>优惠券</a></td>
              <td><a href='javascript:;'></a></td>
              <td><a href='javascript:;'></a></td>
              <td><a href='javascript:;'></a></td>
              <td><a href='javascript:;'>免责声明</a></td>
            </tr>
            <tr>
              <td><a href='javascript:;'>常见问题</a></td>
              <td><a href='javascript:;'></a></td>
              <td><a href='javascript:;'></a></td>
              <td><a href='javascript:;'></a></td>
              <td><a href='javascript:;'></a></td>
            </tr>
          </table>
        </div>
        
        <div class='FL footer_div'>
          <div class='footer_lx'>
            <p>我健康订购热线</p>
            <p>400-8811-020</p>
            <p>服务时间：08:30-23:00</p>
          </div>
          
          <div class='footer_lx'>
            <p>我健康订购热线</p>
            <p>400-8811-020</p>
            <p>服务时间：08:30-23:00</p>
          </div>
          
        </div>
        
      </div>
    </div>
    
    <div class='footer_3'>
      <div class='W1200'>
        <div class='footer_jg'>
          <span>政府机构：</span>
          <em><a href='javascript:;'>国家卫生和计划生育委员会</a></em>
          <em><a href='javascript:;'>国家食品药品监督管理总局</a></em>
          <em><a href='javascript:;'>广东省卫生和计划生育委员会</a></em>
          <em><a href='javascript:;'>广东省食品药品监督管理局</a></em>
        </div>
        
        <div class='footer_jg footer_bottom'>
          <span>友情链接：</span>
          <em><a href='javascript:;'>环球医药招商网</a></em>
          <em><a href='javascript:;'>皮肤病</a></em>
          <em><a href='javascript:;'>药品文章</a></em>
          <em><a href='javascript:;'>摇篮育儿问答</a></em>
          <em><a href='javascript:;'>医药招商网</a></em>
          <em><a href='javascript:;'>中华康网</a></em>
          <em><a href='javascript:;'>69健康</a></em>
          <em><a href='javascript:;'>中药材</a></em>
          <em><a href='javascript:;'>医学百科</a></em>
          <em><a href='javascript:;'>PCbaby母婴用品</a></em>
          <em><a href='javascript:;'>康强网</a></em>
          <em><a href='javascript:;'>亲贝网</a></em>
          <em><a href='javascript:;'>妈妈论坛网</a></em>
          <em><a href='javascript:;'>中医中药秘方网</a></em>
          <em><a href='javascript:;'>三九养生堂</a></em>
        </div>
        
        <div class='footer_cen'><a href='javascript:;'>批发商洽</a>| <a href='javascript:;'>关于我们</a> | <a href='javascript:;'>掌上药店</a> | <a href='javascript:;'>实体药店</a> | <a href='javascript:;'>加入我健康</a> | <a href='javascript:;'>联系我们</a> | <a href='javascript:;'>经营认证</a> | <a href='javascript:;'>友情链接</a> | <a href='javascript:;'>TAG列表</a> | <a href='javascript:;'>网站地图</a> | <a href='javascript:;'>CPS联盟</a></div>
        <div class='footer_cen'><a href='javascript:;'>互联网药品交易服务资格证书</a>| <a href='javascript:;'>互联网药品信息服务资格证书</a> | <a href='javascript:;'>执业药师证</a> | <a href='javascript:;'>药品经营许可证</a> | <a href='javascript:;'>食品经营许可证</a> | <a href='javascript:;'>公司营业执照</a> | <a href='javascript:;'>GSP认证证书</a> | <a href='javascript:;'>增值电信业务经营许可证</a> | <a href='javascript:;'>医疗器械经营许可证</a> | <a href='javascript:;'>第二类医疗器械经营备案凭证</a> | <a href='javascript:;'>国家食品药品监督管理总局-数据查询</a> | <a href='javascript:;'>广东省食品药品监督管理局-数据库查询</a></div>
        
        <div class='footer_bs'>
          <span><img src='http://www.wan.com//static/images/tool_icon1.png' title='' alt='' /><a href='javascript:;'>粤ICP备<br/>10212320号-1</a></span>
          <span><img src='http://www.wan.com//static/images/tool_icon2.png' title='' alt='' /><a href='javascript:;'>网络110报警服务<br/>网络110报警服务</a></span>
          <span><img src='http://www.wan.com//static/images/tool_icon5.jpg' title='' alt='' /><a href='javascript:;'>红盾电子<br/>链接标识</a></span>
          <span><img src='http://www.wan.com//static/http://www.wan.com//static/images/index_7.png' title='' alt='' /></span>
          <span><img src='http://www.wan.com//static/images/index_8.png' title='' alt='' /></span>
          <span><img src='http://www.wan.com//static/images/index_9.png' title='' alt='' /></span>
        </div>
        
        <div class='footer_cen'>&copy;2010-2016 山西我健康网上药店版权所有，并保留所有权利</div>
      </div>
    </div>
  </div>
  <!--右边固定的内容-->
	
	
  <!--左边固定的导航-->
  <div class='ce'>
    <div>家庭常备</div>
	<div>母婴乐园</div>
	<div>男科药馆</div>
	<div>滋补保健</div>
	<div>医疗器械</div>
	<div><img src='http://www.wan.com//static/images/ewm.png' title='' alt='' /></div>
	<div>扫码关注我</div>
  </div>
  
  <!--上边固定的收索框-->
  <div class='fixed_logo'>
    <div class='W1200'>
	  <div class='logo FL'>
        <p><img src='http://www.wan.com//static/images/index_logo.png' /></p>
      </div>
      <div class='logo_ss FL'>
	    <input type='text' name='srk' placeholder='汤臣倍健' /><input type='submit' name='ss' value='搜索' />
	  </div>
	</div>
  </div>
 </form>
</body>
</html>
