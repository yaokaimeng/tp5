<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\wamp64\www\tp5\public/../application/index\view\business\mysays.html";i:1521787425;s:57:"D:\wamp64\www\tp5\application\index\view\public\head.html";i:1521728961;}*/ ?>
﻿
<!DOCTYPE html>
<html>
<head>
    <script language="javascript" type="text/javascript" async="async" src="http://ctr.360kad.com/ctrjs/ctr_v2.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>康爱多会员中心-我的评论</title>
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <link href="http://res3.360kad.com/theme/default/css/www/web2014/base.css" rel="stylesheet" type="text/css"/>
    <link href="http://res4.360kad.com/theme/default/css/www/web2014/newKad_index.css" rel="stylesheet" type="text/css"/>
    <link href="http://res3.360kad.com/theme/default/css/user/2015/kad2-center-v1.css" rel="stylesheet" type="text/css"/>
    
 <link href='http://www.wan.com//static/css/comm.css' rel='stylesheet' type='text/css'>
<link href='http://www.wan.com//static/css/style_index.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://www.wan.com//static/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src='http://www.wan.com//static/js/lunbo.js'></script>
<script type="text/javascript" src='http://www.wan.com//static/js/other.js'></script>



    
    <link href="http://res2.360kad.com/theme/default/css/user/2015/kad2-center-popup.css" rel="stylesheet" type="text/css"/>
    <link href="http://res2.360kad.com/theme/default/css/pop/pop.css" rel="stylesheet" type="text/css"/>
    <script src="http://res4.360kad.com/script/jquery.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/jquery.cookie.js" type="text/javascript"></script>
    <script src="http://res3.360kad.com/script/envconfig.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/web2014/newCommonJs.js" type="text/javascript"></script>
    <script src="http://res2.360kad.com/script/web2014/publicsearch.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/pop/poplayer.js" type="text/javascript"></script>
    
<script src="http://res.360kad.com/script/comment.js" type="text/javascript"></script>
<script src="http://res4.360kad.com/script/member/kad2-vipclub.js" type="text/javascript"></script>
<script src="http://res1.360kad.com/script/category_index.js" type="text/javascript"></script>

    
<link href="http://res1.360kad.com/theme/default/css/user/2015/Comment_index.css" rel="stylesheet" type="text/css"/>
<link href="http://res3.360kad.com/theme/default/css/user/2015/kad2-center-personalDate.css" rel="stylesheet" type="text/css"/>

<style>
    a:hover {
        color: red;
    }
    .comment-list .w310 {
        width: 200px;
        float: left;
        padding: 30px 20px;
    }
    .comment-list { /* padding: 20px 25px 20px; */
        line-height: 22px;
        color: #666;
        padding-top: 10px;
    }
    .comment-t ul a:hover {
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

<!--部件结束:header_www_head-->

   <!--部件开始:nav_www_otherleft,分组:频道部件-->
<div class="nav">
   
    <div class="navc itmes_wrap">
        <div class="categorys categorys_hover">
            <h2><a href="<?php echo url('index/index'); ?>" >返回首页</a></h2>
            <!--分类类目-->
           <script type="text/javascript" src="http://www.360kad.com/CommonJS/Js.aspx?Id=nav_www_otherleft_data"></script>
        </div>
      
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
        <a href="/user">我的康爱多</a> &gt; 我的评论
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
    <!--右侧-->
    <div class="kad-center-right">
        <h3 class="personal-msg">我的评论</h3>
        <div class="myIntegralT2">
            <dl class="myOrder-tab">
                <dd class="on">
                    <span onclick=" GetDComment() ">待评论</span>
                </dd>
                <dd class="">
                    <span onclick=" GetYComment() ">已评论</span>
                </dd>
            </dl>

        </div>

        <div class="myIntegrallist">
            <div class="comment-t" style="display: block">
                <p>评论说明：</p>
                <ul>
                    <li>1、欢迎您发表与商品质量相关、对其他用户有参考价值的原创评论，好的评论将获得<span>10积分，</span><a href="http://help.360kad.com/Novice/IntegralDesc" target="_blank">查看评论获取积分规则&gt;&gt;</a></li>
                    <li>2、收到商品后即可发表评论,每位顾客只能对该商品发表一条评论；</li>
                    <li>3、当涉及广告、比价、重复反馈、不实评论、恶意评论、粗口、危害国家安全等等不当言论时，康爱多网上药店有权予以管理。</li>
                </ul>
            </div>
            <div class="comment-list tab-comt-list" style="display: block; width: 1000px; margin-left: -45px;">
                    <div class="comment-list tab-comt-list">
                        <dl class="comment-list-head">
                            <dt class="w470">商品信息</dt>
                            <dt class="w310">价格</dt>
                            <dt class="w105">操作</dt>
                        </dl>
                        <p class="noContent">没有记录</p>
                    </div>
            </div>
            <!--分页 start-->
            <div class="YPagebox">
                <div class="YPage">
                </div>
            </div>
            <!--分页 end-->
        </div>
    </div>
    <!--右侧 end-->
</div>

   <!--底部 begin-->
    <!--部件开始:Footer_LastNew,分组:页脚部件-->
<div class="wrap_footer">
    <div class="item01">
        <div class="width1200">
            <img src="http://res3.360kad.com/theme/default/img/2014newKad/fxgBenner.png" alt="放心购">
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
            <a href="http://help.360kad.com/AboutKad/LianXiWoMen" target="_blank" rel="nofollow">联系我们</a>  |
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
                    <img src="http://res.360kad.com/theme/default/img/tool_icon1.png" alt="粤ICP备10212320号" style="display: inline;">
                </a>
                <a class="txt" rel="nofollow" title="粤ICP备10212320号" target="_blank" href="http://www.beianbeian.com/">粤ICP备10212320号</a>
            </li>
            <li>
                <a rel="nofollow" href="http://www.gdnet110.gov.cn/" target="_blank" title="网络110报警服务">
                    <img src="http://res2.360kad.com/theme/default/img/tool_icon2.png" alt="网络110报警服务" style="display: inline;">
                </a>
                <a class="txt item01" rel="nofollow" title="网络110报警服务" target="_blank" href="http://www.gdnet110.gov.cn/">
                    网络110报警服务
                </a>
            </li>
         <!--   <li>
                <a rel="nofollow" href="http://bcp.12312.gov.cn/chengxin?d=3793755&amp;t=101" target="_blank" title="诚信经营示范单位">
                    <img data-original="http://res3.360kad.com/theme/default/img/tool_icon4.jpg " src="http://res3.360kad.com/theme/default/img/tool_icon4.jpg" alt="" style="display: inline;">
                </a>
                <a class="txt item01 item02" rel="nofollow" title="诚信经营示范单位" target="_blank" href="http://bcp.12312.gov.cn/chengxin?d=3793755&amp;t=101">
                    诚信经营示范单位
                </a>
            </li> -->
            <li>
                <a rel="nofollow" href="http://netadreg.gzaic.gov.cn/ntmm/WebSear/WebLogoPub.aspx?logo=440101101012010072700090" target="_blank" title="红盾电子链接标识">
                    <img data-original="http://res.360kad.com/theme/default/img/tool_icon5.jpg" src="http://res3.360kad.com/theme/default/img/tool_icon5.jpg" alt="" style="display: inline;">
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

    <script type="text/javascript">
        var star = -1;
        $(document).ready(function() {
            $(".sjhq").hover(function() {
                $(this).addClass("sjhq_hover").children(".ph_erweim").css("display", "block");
            }, function() {
                $(this).removeClass("sjhq_hover").children(".ph_erweim").css("display", "none");
            });
            //全部分类
            var $leftSide_menu = $(".leftSide_menu");
            var $nodesLi = $("#kinds_lists").find("li");

            $(".categorys").hover(function() {
                $leftSide_menu.show();
            }, function() {
                $leftSide_menu.hide();
            });
            $nodesLi.hover(function() {
                $(this).addClass('act');
                $(this).children('.sideBox,.blueLine').show();
                $(this).children(".potiner_h").hide();
            }, function() {
                $(this).removeClass('act');
                $(this).children('.sideBox,.blueLine').hide();
                $(this).children(".potiner_h").show();
            });
            //END全部分类
            var $linkBox = $(".footer_list .linkBox");
            $linkBox.hover(function() {
                $(this).parent().css('height', '66px');
            }, function() {
                $(this).parent().css('height', '22px');
            });
        });
        //去评论
        $(function() {

            var selNum = -1;
            $("#comment-star img").hover(function() {
                var num = $(this).index();
                cStarOn(num, this);
                for (j = num + 1; j < 5; j++) {
                    $(this).parent("#comment-star").children("img").eq(j).attr("src", "http://res2.360kad.com/theme/default/img/user/c_star_out.png");
                }
            }, function() {
                $(this).parent("#comment-star").children("img").attr("src", "http://res2.360kad.com/theme/default/img/user/c_star_out.png");
                cStarOn(selNum, this);
                console.log(selNum);
            });

            $("#comment-star img").click(function() {
                var num = $(this).index();
                cStarOn(num);
                selNum = num;
                var starArray = new Array();
                starArray = ["很不满意", "不满意", "一般", "满意", "非常满意"];
                var obj = $(this).parent(".comment-star").next(".commentLev");
                obj.css("color", "#666");
                obj.html(starArray[num]);
                star = num;
            });
            //收起评论
            commentHide();
            $(".spnShow").eq(0).click();
        });


        function cStarOn(num, obj) {
            for (i = 0; i <= num; i++) {
                $(obj).parent("#comment-star").children("img").eq(i).attr("src", "http://res1.360kad.com/theme/default/img/user/c_star_on.png");
            }
        }

        //收起评论
        function commentHide() {
            $(".spnHide").click(function() {
                $(this).parent(".w105").next(".comment-info").hide();
                $(this).hide();
                $(this).next(".spnShow").show();
            });
            $(".spnShow").click(function() {
                $(this).parent(".w105").next(".comment-info").show();
                $(this).hide();
                $(this).prev(".spnHide").show();
            });
        }

        function Fill(orderCode, productCode, brandCode, wareSkuCode) {
            var Content = $("#" + wareSkuCode + "_Content").val();
            if (Content.length < 5) {
                alertPop("请至少输入5个字符！");
                return false;
            }
            if (star == -1) {
                alertPop("您还未评级商品的哦");
                return;
            }
            $.ajax({
                url: "/Comment/Add",
                type: "post",
                data: { content: Content, orderCode: orderCode, productCode: productCode, star: star + 1, wareSkuCode: wareSkuCode, brandCode: brandCode },
                dataType: "json",
                cache: false,
                success: function(data) {
                    if (data.Message == "评论成功") {
                        alertSuccess(data.Message, GetYComment);
                    } else {
                        alertPop(data.Message);
                    }
                }
            });
        }


        function success() {
            location.reload();
        }

        function GetDComment() {
            window.location = "/comment";
        }

       /* function GetYComment() {
            window.location = "/comment/reply";
        }*/
    </script>
