<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\wamp64\www\tp5\public/../application/index\view\user\mygrade.html";i:1521886204;s:57:"D:\wamp64\www\tp5\application\index\view\public\head.html";i:1521728961;}*/ ?>
﻿
<!DOCTYPE html>
<html>
<head>
    <script language="javascript" type="text/javascript" async="async" src="http://ctr.360kad.com/ctrjs/ctr_v2.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>康爱多会员中心-我的积分</title>
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <link href="http://res4.360kad.com/theme/default/css/www/web2014/base.css" rel="stylesheet" type="text/css"/>
    <link href="http://res1.360kad.com/theme/default/css/www/web2014/newKad_index.css" rel="stylesheet" type="text/css"/>
    <link href="http://res3.360kad.com/theme/default/css/user/2015/kad2-center-v1.css" rel="stylesheet" type="text/css"/>
    
    <link href="http://res3.360kad.com/theme/default/css/user/2015/kad2-center-popup.css" rel="stylesheet" type="text/css"/>
    <link href="http://res4.360kad.com/theme/default/css/pop/pop.css" rel="stylesheet" type="text/css"/>
    <script src="http://res1.360kad.com/script/jquery.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/jquery.cookie.js" type="text/javascript"></script>
    <script src="http://res2.360kad.com/script/envconfig.js" type="text/javascript"></script>
    <script src="http://res3.360kad.com/script/web2014/newCommonJs.js" type="text/javascript"></script>
    <script src="http://res3.360kad.com/script/web2014/publicsearch.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/pop/poplayer.js" type="text/javascript"></script>
    
    <script src="http://res1.360kad.com/script/category_index.js" type="text/javascript"></script>
    <script src="http://res2.360kad.com/script/member/kad2-center-v1.js" type="text/javascript"></script>

    <link href='http://www.wan.com//static/css/comm.css' rel='stylesheet' type='text/css'>
<link href='http://www.wan.com//static/css/style_index.css' rel='stylesheet' type='text/css'>


<script type="text/javascript" src="http://www.wan.com//static/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src='http://www.wan.com//static/js/lunbo.js'></script>
<script type="text/javascript" src='http://www.wan.com//static/js/other.js'></script>
<link rel="stylesheet" href="http://www.wan.com//static/css/calendar.css">
    
    <link href="http://res.360kad.com/theme/default/css/user/2015/kad2-center-v1.css" rel="stylesheet" type="text/css"/>
<link href="http://res2.360kad.com/theme/default/css/user/2015/TransactionManagement.css" rel="stylesheet" type="text/css"/>
<style>
    a:hover {
        color: red;
    }

    .myIntegralT1 .Ytit a:hover {
        color: red;
    }
</style>

</head>
<body>
   <!--部件开始:header_www_head,分组:页头部件-->
<!--部件开始:head_header_top,分组:页头部件-->

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

 <div class="nav">
    

    <div class="navc itmes_wrap">
        <div class="categorys categorys_hover">
            <h2><a href="<?php echo url('index/index'); ?>" >返回首页</a></h2>
            <!--分类类目-->
           <script type="text/javascript" src="http://www.360kad.com/CommonJS/Js.aspx?Id=nav_www_otherleft_data"></script>
        </div>
        <!--部件开始:nav_www_home,分组:频道部件-->

<!--部件结束:nav_www_home-->

    </div>

</div>
<!--部件结束:nav_www_otherleft-->

   <!--部件开始:pc_pop_show,分组:通用部件-->
<!--删除弹窗-->
    <div class="kad-delete-pop" id="kad-delete-pop">
        <div class="pop-main">
            <p class="pop-title">
                温馨提示 <i class="kad-delte-closeBtn" id="kad-delte-closeBtn"></i>
            </p>
            <p class="pop-txt">
                <span class="icon err_icon01">确定从购物车中删除此商品？</span></p>
            <p class="pop-btn-box">
                <a href="javascript:void(0);" class="pop-btn-cancel" id="pop-btn-cancel" onclick="popClose('kad-delete-pop', 1);">
                </a><a href="javascript:void(0);" class="pop-btn-right" onclick="popClose('kad-delete-pop', 1);">
                </a>
            </p>
        </div>
    </div>
<!--部件结束:pc_pop_show-->

    <div class="new-kad-center">
        <!--面包屑-->
        <div class="kad-center-nav">
            <a href="/user">我的康爱多</a> &gt; 我的积分
        </div>
        <!--END面包屑-->
        <!--左侧 begin-->
        <style>
    a:hover { color: red; }
    .kad-center-store a:hover { color: #fff; }
</style>
<div class="kad-center-left">
    <div class="kad-center-menu">
         <h3>交易管理</h3>
        <div class="kad-center-list">
            <p><a href="http://www.wan.com/index/business/myorder">我的订单</a></p>
            
            
            <p><a href="http://www.wan.com/index/business/mycollection">我的收藏</a></p>
            <p><a href="http://www.wan.com/index/business/mysays">我的评论</a></p>
            
        </div>
        <h3>账户资料</h3>
        <div class="kad-center-list">
            
            <p><a href="http://www.wan.com/index/user/grzl">个人资料</a></p>
            <p><a href="http://www.wan.com/index/user/mygrade">我的积分</a></p>
            <p><a href="http://www.wan.com/index/user/address">收货地址</a></p>
            
        </div>
        <h3>客户服务</h3>
        <div class="kad-center-list">
            <p><a href="/custom/refundlist">申请退换货</a></p>
            <p><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=Wmtibm5qamNvYmsaKyt0OTU3" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_11.png"/></a></p>
            <p><a href="/custom/phoneCustomer">移动客服</a></p>
        </div>
    </div>
    <div class="kad-center-store">
        <p><a href="/club">会员俱乐部 GO &gt;</a></p>
    </div>
</div>
<script>
    $.ajax({
        url: "/User/CouponCount",
        cache: false,
        dataType: "json",
        success: function (result) {
            $("#userleftCouponCount").text(result);
        }
    });
</script>
        <!--左侧 end-->
        <!--右侧 begin-->
        <div class="myIntegralT1">
            <h3 class="Ytit">
                <a href="http://help.360kad.com/Novice/IntegralDesc" target="_blank">查看积分说明</a>积分与等级
            </h3>
            <div class="h10"></div>
            <dl class="myIntegralT1-dl">
                <dd>
                    <p class="Yname">可用积分</p>
                    <p class="Yjifen" id="integral_count"><?php echo $res['grade']; ?></p>
                </dd>
                
                
                 <dd class="Ylast">
                    <p class="Yname">用户等级</p>
                    <?php if($res['grade']>=50 and $res['grade']<=100): ?>
                    <p class="Yjifen" id="integral_count">普通会员</p>
                    <?php endif; if($res['grade']>=101 and $res['grade']<=200): ?>
                    <p class="Yjifen" id="integral_count">青铜会员</p>
                    <?php endif; if($res['grade']>=201 and $res['grade']<=300): ?>
                    <p class="Yjifen" id="integral_count">白银会员</p>
                    <?php endif; if($res['grade']>=301 and $res['grade']<=400): ?>
                    <p class="Yjifen" id="integral_count">黄金会员</p>
                    <?php endif; if($res['grade']>=401): ?>
                    <p class="Yjifen" id="integral_count">至尊会员</p>
                    <?php endif; ?>
                </dd> 
            </dl>

        </div>
        <div class="fh10"></div>
        <!--右侧 begin-->
        <div class="kad-center-right" style="border:none;">
        
        <div id="demo">
  <div id="ca"></div>
  <!-- <input type="text" id="dt" placeholder="trigger calendar"> -->
  <!--日历开始-->
  <div id="dd"></div>
</div>
<script src="http://www.wan.com//static/js/jquery.js"></script> 
<script src="http://www.wan.com//static/js/calendar.js"></script> 
<script>
    $('#ca').calendar({
        width: 320,
        height: 320,
        data: [
            {
              date: '2015/12/24',
              value: 'Christmas Eve'
            },
            {
              date: '2015/12/25',
              value: 'Merry Christmas'
            },
            {
              date: '2016/01/01',
              value: 'Happy New Year'
            }
        ],
        onSelected: function (view, date, data) {
            console.log('view:' + view)
            alert('date:' + date)
            console.log('data:' + (data || 'None'));
        }
    });

    $('#dd').calendar({
        trigger: '#dt',
        zIndex: 999,
        format: 'yyyy-mm-dd',
        onSelected: function (view, date, data) {
            console.log('event: onSelected')
        },
        onClose: function (view, date, data) {
            console.log('event: onClose')
            console.log('view:' + view)
            console.log('date:' + date)
            console.log('data:' + (data || 'None'));
        }
    });
</script> 
<!--日历结束-->




        </div>
       
        <!--右侧 end-->
    </div>
    <!--右侧 end-->
    
    <!--部件开始:Footer_LastNew,分组:页脚部件-->
<div class="wrap_footer">
    <div class="item01">
        <div class="width1200">
            <img src="http://res2.360kad.com/theme/default/img/2014newKad/fxgBenner.png" alt="放心购">
            <a class="safeBuy" style="background:#fff;opacity:0;filter:alpha(opacity=0);" title="放心购" href="http://www.360kad.com/zhuanti/trust.shtml?kzone=fxg_foot_pc" target="_blank"></a>
        </div>
    </div>
    <!--康爱多掌上药店-->
    <div class="item01 item02">
        <div class="width1200 clearfix">
            <div class="lside">
                <div class="appCode">
                    <p class="title">手机购药</p>
                    <p class="code"></p>
                    <p class="clearfix pl8">
                        <span class="ios"><a href="http://um0.cn/2Vawnt/?kzone=ios_foot_pc" target="_blank"></a></span>
                        <span class="line"></span>
                        <span class="android"><a href="http://res.360kad.com/app/k/kad.apk?kzone=android_foot_pc" target="_blank"></a></span>
                    </p>
                </div>
                <div class="weixinCode">
                    <p class="title">微信购药</p>
                    <p class="code"></p>
                    <p class="title02" style="width:90px;">扫一扫  领优惠券</p>
                </div>
            </div>
            <div class="mside">
                <ul class="clearfix">
                    <li>
                        <p class="title">新手指南</p>
                        <p><a href="http://help.360kad.com/Shopping/shopWm?kzone=gwlc_foot_pc" target="_blank" rel="nofollow">购物流程</a></p>
                        <p><a href="http://help.360kad.com/Novice/VipClass?kzone=hyjb_foot_pc" target="_blank" rel="nofollow">会员级别</a></p>
                        <p><a href="http://help.360kad.com/Novice/IntegralDesc?kzone=jfsm_foot_pc" target="_blank" rel="nofollow">积分说明</a></p>
                        <p><a href="http://help.360kad.com/Pay/Coupon?kzone=yhj_foot_pc" target="_blank" rel="nofollow">优惠券</a></p>
                        <p><a href="http://help.360kad.com/Novice/Question?kzone=cjwt_foot_pc" target="_blank" rel="nofollow">常见问题</a></p>
                    </li>
                    <li>
                        <p class="title">配送方式</p>
                        <p><a href="http://help.360kad.com/Delivery/Freight?kzone=psfw_foot_pc" target="_blank" rel="nofollow">配送范围及运费</a></p>
                        <p><a href="http://help.360kad.com/Delivery/Privsend?kzone=ysps_foot_pc" target="_blank" rel="nofollow">隐私配送</a></p>
                        <p><a href="http://help.360kad.com/Delivery/Receipt?kzone=spys_foot_pc" target="_blank" rel="nofollow">商品验收及签收</a></p>
                    </li>
                    <li>
                        <p class="title">支付方式</p>
                        <p><a href="http://help.360kad.com/Pay/Cash?kzone=hdfk_foot_pc" target="_blank" rel="nofollow">货到付款</a></p>
                        <p><a href="http://help.360kad.com/Pay/OnlinePay?kzone=wszf_foot_pc" target="_blank" rel="nofollow">网上支付</a></p>
                        <p><a href="http://help.360kad.com/Pay/BankTrans?kzone=yhzz_foot_pc" target="_blank" rel="nofollow">银行转账</a></p>
                        <p><a href="http://help.360kad.com/Pay/Mention?kzone=ydzt_foot_pc" target="_blank" rel="nofollow">药店自提</a></p>
                    </li>
                    <li>
                        <p class="title">售后服务</p>
                        <p><a href="http://help.360kad.com/SaleAfter/ReturnsFlow?kzone=thhlc_foot_pc" target="_blank" rel="nofollow">退换货流程</a></p>
                        <p><a href="http://help.360kad.com/SaleAfter/ReturnsPolicy?kzone=thhzc_foot_pc" target="_blank" rel="nofollow">退换货政策</a></p>
                        <p><a href="http://help.360kad.com/SaleAfter/RefundFlow?kzone=tklc_foot_pc" target="_blank" rel="nofollow">退款流程</a></p>
                    </li>
                    <li>
                        <p class="title">特色服务</p>
                        <p><a href="http://user.360kad.com/club?kzone=hyjlb_foot_pc" target="_blank" rel="nofollow">会员俱乐部</a></p>
                        <p><a href="http://help.360kad.com/Feature/TouSuJianYi?kzone=tsjy_foot_pc" target="_blank" rel="nofollow">投诉建议</a></p>
                        <p><a href="http://help.360kad.com/Feature/YongYaoZiXun?kzone=yyzx_foot_pc" target="_blank" rel="nofollow">用药咨询 </a></p>
                        <p><a href="http://help.360kad.com/Feature/MianZeShengMing?kzone=mzsm_foot_pc" target="_blank" rel="nofollow">免责声明 </a></p>
                    </li>
                    <li class="phonePic">
                        <p><img src="http://res2.360kad.com/theme/default/img/2014newKad/kadPhoneBg.png" alt=""></p>
                        <p class="pt4">订购服务时间：8:30-23:00</p>
                        <p>售后服务时间：9:00-22:30</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--END康爱多掌上药店-->
</div>
<div class="footer_list">
    <div class="width1200">
    <!--    <p><span class="title">战略企业：</span><a href="http://www.taiantang.net/" target="_blank" rel="nofollow">太安堂集团有限公司 (股票代码：002433)</a></p> -->
        <p>
            <span class="title">政府机构：</span><a href="http://www.nhfpc.gov.cn/" target="_blank" rel="nofollow">国家卫生和计划生育委员会</a>
            <a href="http://www.sda.gov.cn/" target="_blank" rel="nofollow">国家食品药品监督管理局</a>
            <a href="http://www.gdwst.gov.cn/" target="_blank" rel="nofollow">广东省卫生和计划生育委员会</a>
            <a href="http://www.gdda.gov.cn/" target="_blank" rel="nofollow">广东省食品药品监督管理局</a>
        </p> 

        <!--关于康爱多网上药店-->
        <p class="aboutKadList">
            <a rel="nofollow" href="http://help.360kad.com/AboutKad/kadJieShao" target="_blank">关于我们</a> |
            <a href="http://www.360kad.com/zhuanti/kad_zsyd.shtml" target="_blank" rel="nofollow">掌上药店</a> |
            <a rel="nofollow" href="http://help.360kad.com/about/entitygz" target=" _blank">实体药店</a> |
            <a rel="nofollow" href="http://help.360kad.com/AboutKad/JiaRuKangAiDuo" target="_blank">加入康爱多</a> |
            <a href="http://help.360kad.com/AboutKad/LianXiWoMen" 
            target="_blank" rel="nofollow">联系我们</a>  |
            <a href="http://www.360kad.com/zhuanti/service_provder.shtml" target="_blank" rel="nofollow">厂商合作</a>  |
            <a href="http://help.360kad.com/AboutKad/JingYingRenZheng" rel="nofollow" target="_blank">经营认证</a> |
            <a rel="nofollow" href="http://help.360kad.com/About/FriendlyLink" target="_blank">友情链接</a> |
            <a href="http://www.360kad.com/TagList.aspx" target="_blank">TAG列表</a> |
            <a href="http://www.360kad.com/SiteMap.shtml" target="_blank">网站地图</a> |
            <a href="http://cps.360kad.com/" target="_blank">CPS联盟</a>
        </p>
        <p class="diploma_list">
            <a class="pr8" rel="nofollow" title="互联网药品交易服务资格证书" target="_blank" href="http://help.360kad.com/about/AuthenBusiness">互联网药品交易服务资格证书</a>|
            <span class="bottomPadding01">
                <a rel="nofollow" title="互联网药品信息服务资格证书" target="_blank" href="http://help.360kad.com/About/AuthenInfo">互联网药品信息服务资格证书</a>
            </span>|
            <span class="bottomPadding01">
                <a rel="nofollow" title="执业药师证" target="_blank" href="http://help.360kad.com/About/AuthenPractice">执业药师证</a>
            </span>|
            <span class="bottomPadding02">
                <a rel="nofollow" title="药品经营许可证" target="_blank" href="http://help.360kad.com/About/AuthenManage">药品经营许可证</a>
            </span>|

            <span class="bottomPadding02">
                <a rel="nofollow" title="食品经营许可证" target="_blank" href="http://help.360kad.com/About/AuthenLiuTong">食品经营许可证</a>
            </span>|
            <span class="bottomPadding02">
                <a rel="nofollow" title="公司营业执照" target="_blank" href="http://help.360kad.com/About/Authen">公司营业执照</a>
            </span>|
            <span>
                <a rel="nofollow" title="GSP认证证书" target="_blank" href="http://help.360kad.com/About/AuthenGSP">GSP认证证书</a>
            </span>|
            <span>
                <a href="http://help.360kad.com/About/AuthenTeleservice" target="_blank" rel="nofollow">增值电信业务经营许可证 &nbsp;</a>
            </span>
        </p>
        <!--END关于康爱多网上药店-->
        <!--行业认证-->
        <ul class="hyRz clearfix">
            <li>
                <a rel="nofollow" href="http://www.beianbeian.com/" target="_blank" title="粤ICP备10212320号">
                    <img src="http://res2.360kad.com/theme/default/img/tool_icon1.png" alt="粤ICP备10212320号" style="display: inline;">
                </a>
                <a class="txt" rel="nofollow" title="粤ICP备10212320号" target="_blank" href="http://www.beianbeian.com/">粤ICP备10212320号</a>
            </li>
            <li>
                <a rel="nofollow" href="http://www.gdnet110.gov.cn/" target="_blank" title="网络110报警服务">
                    <img src="http://res4.360kad.com/theme/default/img/tool_icon2.png" alt="网络110报警服务" style="display: inline;">
                </a>
                <a class="txt item01" rel="nofollow" title="网络110报警服务" target="_blank" href="http://www.gdnet110.gov.cn/">
                    网络110报警服务
                </a>
            </li>
         <!--   <li>
                <a rel="nofollow" href="http://bcp.12312.gov.cn/chengxin?d=3793755&amp;t=101" target="_blank" title="诚信经营示范单位">
                    <img data-original="http://res2.360kad.com/theme/default/img/tool_icon4.jpg " src="http://res3.360kad.com/theme/default/img/tool_icon4.jpg" alt="" style="display: inline;">
                </a>
                <a class="txt item01 item02" rel="nofollow" title="诚信经营示范单位" target="_blank" href="http://bcp.12312.gov.cn/chengxin?d=3793755&amp;t=101">
                    诚信经营示范单位
                </a>
            </li> -->
            <li>
                <a rel="nofollow" href="http://netadreg.gzaic.gov.cn/ntmm/WebSear/WebLogoPub.aspx?logo=440101101012010072700090" target="_blank" title="红盾电子链接标识">
                    <img data-original="http://res3.360kad.com/theme/default/img/tool_icon5.jpg" src="http://res.360kad.com/theme/default/img/tool_icon5.jpg" alt="" style="display: inline;">
                </a>
                <a class="txt item01 item02" rel="nofollow" title="红盾电子链接标识" target="_blank" href="http://netadreg.gzaic.gov.cn/ntmm/WebSear/WebLogoPub.aspx?logo=440101101012010072700090">
                    红盾电子链接标识
                </a>
            </li>
            <li>
                <a id='___szfw_logo___' href='https://credit.szfw.org/CX20170801035370070198.html' target='_blank'><img src='http://icon.szfw.org/cert.png' border='0' /></a>
<script type='text/javascript'>(function(){document.getElementById('___szfw_logo___').oncontextmenu = function(){return false;}})();</script>
            </li>
            <li>
                <a class="item03" style="display:block;" key="51c2d63c6856be2ce1761dce" logo_size="83x30" logo_type="realname" rel="nofollow" href="http://v.pinpaibao.com.cn/authenticate/cert/?site=www.360kad.com&at=realname" target="_blank">
                    
                    <span style="display:none;" class="LOGO_aq_jsonp_wrap_" id="AQ_logo_span_init_1">
                        
                    </span><img src="http://res3.360kad.com/theme/default/img/sm_83x30.png" alt="安全联盟认证" width="83" height="30" style="border: none;">
                </a>
            </li>
            <li>
                <a style="display:block;padding-top:4px;" key="51c2d63c6856be2ce1761dce" logo_size="83x30" logo_type="business" rel="nofollow" href="http://v.pinpaibao.com.cn/authenticate/cert/?site=www.360kad.com&at=business" target="_blank">
                    
                    <span style="display:none;" class="LOGO_aq_jsonp_wrap_" id="AQ_logo_span_init_2"></span>
                    <img src="http://res4.360kad.com/theme/default/img/hy_83x30.png" alt="安全联盟认证" width="83" height="30" style="border: none;">
                </a>
            </li>
        </ul>
        <p class="bottom">&copy2010-2015 广东<a href="http://www.360kad.com">康爱多网上药店</a>版权所有，并保留所有权利</p>
        <!--END行业认证-->

    </div>
</div>
<script>
    $(function () {
        $(".linkBox").hover(function () {
            $(".friendLinks").css("height", "66px");
        }, function () {
            $(".friendLinks").css("height", "22px");
        });
    });
</script>

<!--部件开始:JS_www_Statistics,分组:通用部件-->
<div class="statistics" style="display:none;">

<!-- 谷歌统计 start -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3051632-5']);
  _gaq.push(['_setDomainName', '.360kad.com']);
  _gaq.push(['_setAllowHash', false]);
  _gaq.push(['_addOrganic', 'soso', 'w']);
  _gaq.push(['_addOrganic', 'youdao', 'q']);
  _gaq.push(['_addOrganic', 'sogou', 'query']);
  _gaq.push(['_addOrganic', '360', 'q']);
  _gaq.push(['_addOrganic', 'baidu', 'word']);
  _gaq.push(['_addOrganic', 'baidu', 'q1']);
  _gaq.push(['_addOrganic', 'so.com', 'q']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Google 再营销代码 -->
<!-- <script type="text/javascript">
var google_conversion_id = 972512314;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/972512314/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
-->
<!--百度0628 -->
<script type="text/javascript">
var _bdhmProtocol = " https://";
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F7a942c91de8533c33ddabdacba23065b' type='text/javascript'%3E%3C/script%3E"));
</script>
<!--百度再营销0416 -->
<script type="text/javascript">
<!-- 
var bd_cpro_rtid="nHRvPjm";
//-->
</script>
<script type="text/javascript"  src="https://cpro.baidu.com/cpro/ui/rt.js"></script>
<noscript>
<div style="display:none;">
<img height="0" width="0" style="border-style:none;" src="https://eclick.baidu.com/rt.jpg?t=noscript&rtid=nHRvPjm" />
</div>
</noscript>

</div>

<!--部件结束:JS_www_Statistics-->

<!--部件结束:Footer_LastNew-->

   <!--end底部-->
</body>
</html>

       <script>
           (function($) {
               $.extend({
                   tipsBox: function(options) {
                       options = $.extend({
                           obj: null, //jq对象，要在那个html标签上显示
                           str: "+1", //字符串，要显示的内容;也可以传一段html，如: "<b style='font-family:Microsoft YaHei;'>+1</b>"
                           startSize: "12px", //动画开始的文字大小
                           endSize: "40px", //动画结束的文字大小
                           interval: 600, //动画时间间隔
                           color: "red", //文字颜色
                           callback: function() {} //回调函数
                       }, options);
                       $("body").append("<span class='numx'>" + options.str + "</span>");
                       var box = $(".numx");
                       var left = options.obj.offset().left + options.obj.width() / 2 - 8;
                       var top = options.obj.offset().top - options.obj.height() + 10;
                       box.css({
                           "position": "absolute",
                           "left": left + "px",
                           "top": top + "px",
                           "z-index": 9999,
                           "font-size": options.startSize,
                           "line-height": options.endSize,
                           "color": options.color
                       });
                       box.animate({
                           "font-size": options.endSize,
                           "opacity": "0",
                           "top": top - parseInt(options.endSize) + "px"
                       }, options.interval, function() {
                           box.remove();
                           options.callback();
                       });
                   }
               });
           })(jQuery);
       </script>
       <script language="javascript">
           function check(option) {
               //检查1.3.6个月的时间积分
               window.location.href = "/Integral/?type=" + $("#type").val() + "&option=" + option;
           }

//列表切换
           function GetIntegralHq() {
               window.location.href = "/Integral/?type=2";
           }

           function GetIntegralXf() {
               window.location.href = "/Integral/?type=1";
           }

           $(document).ready(function() {
               $("#onSign").bind("click", GetDaySingIntegral);
           });

           function GetDaySingIntegral() {
               var type = 2;
        $("#onSign").unbind("click");
        $.ajax({
            url: "/Integral/GetDayIntegral",
            cache: false,
            dataType: "json",
            success: function(data) {
                if (!data.Result) {
                    $("#onSign").bind("click", GetDaySingIntegral);
                    alertPop(data.Message);
                    return;
                }
                $("#onSign").attr("class", "btn-onSignIn");
                $.tipsBox({
                    obj: $("#integral_count"),
                    str: "+" + data.Code,
                    callback: function() {
                        var count = parseInt($("#integral_count").html()) + parseInt(data.Code);
                        $("#integral_count").html(count);
                        var d = new Date();
                        var vYear = d.getFullYear()
                        var vMon = d.getMonth() + 1
                        var vDay = d.getDate();
                        var h = d.getHours();
                        var m = d.getMinutes();
                        var se = d.getSeconds();
                        s = vYear + "/" + (vMon < 10 ? "" + vMon : vMon) + "/" + (vDay < 10 ? "0" + vDay : vDay) + " " + (h < 10 ? "0" + h : h) + ":" + (m < 10 ? "0" + m : m) + ":" + (se < 10 ? "0" + se : se);
                        if (type == 2) {
                            $($('#point>tbody:first')).eq(0).prepend("<tr><td><table class='Ly-tabledes wControl_jifen'><tr><td  class='wbtit'>签到送积分</td><td class='wdes'>收入</td><td class='wdes'><b class='f_jfred'>+5</b></td><td class='wdes'>" + s + "</td></tr></table></td></tr>");
                        }
                    }
                });
            }
        });
    }
</script> 