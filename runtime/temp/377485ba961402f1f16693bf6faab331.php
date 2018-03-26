<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp64\www\tp5\public/../application/index\view\publics\head.html";i:1521728659;}*/ ?>
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
          <a href='javascript:;'  class='a_color'>我的我健康</a> <img src='http://www.wan.com//uploads/<?php echo $info['Image']; ?>' title='' alt='' class='sjx' />
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