<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wamp64\www\tp5\public/../application/index\view\user\grzl.html";i:1521789369;s:57:"D:\wamp64\www\tp5\application\index\view\public\head.html";i:1521728961;}*/ ?>
﻿
<!DOCTYPE html>
<html>
<head>
    <script language="javascript" type="text/javascript" async="async" src="http://ctr.360kad.com/ctrjs/ctr_v2.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>康爱多会员中心-个人资料</title>
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <link href="http://res.360kad.com/theme/default/css/www/web2014/base.css" rel="stylesheet" type="text/css"/>
   <link href="http://res2.360kad.com/theme/default/css/www/web2014/newKad_index.css" rel="stylesheet" type="text/css"/>
   <link href="http://res1.360kad.com/theme/default/css/user/2015/kad2-center-v1.css" rel="stylesheet" type="text/css"/> 
    

    <link href='http://www.wan.com//static/css/comm.css' rel='stylesheet' type='text/css'>
<link href='http://www.wan.com//static/css/style_index.css' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://www.wan.com//static/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src='http://www.wan.com//static/js/lunbo.js'></script>
<script type="text/javascript" src='http://www.wan.com//static/js/other.js'></script>






    <link href="http://res1.360kad.com/theme/default/css/user/2015/kad2-center-popup.css" rel="stylesheet" type="text/css"/>
    <link href="http://res1.360kad.com/theme/default/css/pop/pop.css" rel="stylesheet" type="text/css"/>
    <script src="http://res3.360kad.com/script/jquery.js" type="text/javascript"></script>
    <script src="http://res3.360kad.com/script/jquery.cookie.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/envconfig.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/web2014/newCommonJs.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/web2014/publicsearch.js" type="text/javascript"></script>
    <script src="http://res2.360kad.com/script/pop/poplayer.js" type="text/javascript"></script>
    
    <script src="http://res1.360kad.com/script/easydialog.min.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/category_index.js" type="text/javascript"></script>
    <script src="http://res1.360kad.com/script/jquery.form.min.js" type="text/javascript"></script>
    <script src="http://res2.360kad.com/script/jquery.jSelectDate.js" type="text/javascript"></script>
    <script src="http://res1.360kad.com/script/member/kad2-city-select.js" type="text/javascript"></script>
    <script src="/address/getjscitydata" type="text/javascript"></script>
    <script src="http://res2.360kad.com/script/member/kad2-center-v1.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/pop/poplayer.js" type="text/javascript"></script>
     
    
    <style>
        .prossbar { width: 270px;height: 12px;float: left;background-color: #dcdcdc;}
        .prossbar div {background-color: #fe952f;height: 12px;float: left;}
        .PromptBox .BoxBody {background: #fff;min-height: 70px;height: auto;}
        a:hover {color: red;}
        .apply_r_p a, .a_color:hover {text-decoration: underline;}
        .a:hover {color: red;text-decoration: underline;}
        .span3 a  {color: blue;}
        .span3 a :hover{color: red;text-decoration: underline;}
        .pic_l .choice_pic a:hover {
            text-decoration: none;
        }
        .per_infor .birth_d select, .more_infor .birth_d select {
            width: 110px;
            height: 20px;
            padding: 0 5px;
            margin-bottom: 4px;
            border: solid 1px #bbbbbb;
            color: #333;
        }
    </style>

</head>
<body>
   <!--部件开始:header_www_head,分组:页头部件-->
<!--部件开始:head_header_-->
<!--部件结束:header_www_head-->
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
   <!--部件开始:nav_www_otherleft,分组:频道部件-->
<div class="nav">
   

    <div class="navc itmes_wrap">
        <div class="categorys categorys_hover">
            <h2><a href="<?php echo url('index/index'); ?>">返回首页</a></h2>
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
   
<!--部件结束:pc_pop_show-->


<div class="new-kad-center">
    <!--面包屑-->
    <div class="kad-center-nav">
        <a href="/user">我的康爱多</a> &gt; 个人资料
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
    <!--右侧-->
    <div class="kad-center-right">
        <h3 class="personal-msg">个人资料</h3>
        <div class="safe_c">
            <div class="infor_l">
                <ul class="clearfix">
                    <li><span class="hover null">基本信息</span></li>
                    <li><span class=" null">头像照片</span></li>
                    
                </ul>
            </div>
            <!--个人资料-->
            <div class="infor_c">
                <div class="infor per_infor per_infor_end" style="display:block none">
                    <div class="per_i clearfix">
                        
                    </div>
                    <form action="<?php echo url('user/xiu',array('id'=>$user['uid'])); ?>" method="post" name="BasicDocument" id="BasicDocument">
                            <p id="pName" class="user_n" style="padding-left:24px">用户名：<input name="name" value="<?php echo $user['username']; ?>" >&nbsp;<span><a id="editName" href="javascript:void(0);" style="color:blue">修改</a> 可用于登录,请牢记哦~</span></p>
                                <p class="user_ts"></p>
                        <p class="real_n">真实姓名：&emsp;<input type="text" value="<?php echo $user['Realname']; ?>" class="userN" name="realname" /></p>

                         <div class="email_end"><span>原密码：<input id="name" type="password" value="<?php echo $user['password']; ?>" name="password" class="userN" style="height:30px;width:150px;"></span></div>
                         <div class="email_end"><span>新密码：<input id="name" type="password" value="<?php echo $user['password']; ?>" name="newpassword" class="userN" style="height:30px;width:150px;"></span></div>
  
                        <div class="email_end"><span>邮箱：&emsp;<input id="name" type="text" value="<?php echo $user['email']; ?>" name="email" class="userN" style="height:30px;width:150px;"></span></div>
                        <div class="phone_end"><span>手机：&emsp;<input id="name" type="text" value="<?php echo $user['phone']; ?>" name="phone" class="userN" style="height:30px;width:150px;"></span></div>

                        <p class="real_n add_r">详细地址：&emsp;<input type="text" value="<?php echo $user['address']; ?>" name="address" class="userN address_d" /></p>
                       <p style='margin-top: 10px;'><input type="submit" value='修改' style='height:30px;width:50px;' /></p>
                    </form>
                </div>
                <script type="text/javascript">

                </script>
                <div class="infor pic_infor" style="display:">
                    <div class="per_i clearfix">
                        <span class="span1">资料完整度：</span>
                        <div class="prossbar"><div style="width:81px"></div></div>
                        <span class="span2">
                            完善度30%，
                        </span>
                        <div id="tx">
                                <span class="span3" id="sctx">上传头像可获取100积分</span>
                        </div>
                    </div>
                    <div class="pic_l">
                         <form action="<?php echo url('user/touxiang'); ?>" method="post" id="upload_from" name="" enctype="multipart/form-data">
                        <p class="choice_pic clearfix">
                            
                           
                                <input type="file" name="Image" id="pic" />
                                <input type="submit" value="上传" /><br />
                           

                        </p>
                        <p class="head_big">
                            <a href="javascript:;">
                                
                                    <img src="http://www.wan.com//uploads/<?php echo $user['Image']; ?>" width="250" height="250" />
                                
                            </a>
                        </p>
                        
                        <div class="small_p">
                            
                        </div>
                         </form>
                    </div>
                   
                </div>
                <div class="infor more_infor" style="display:">
                    <div class="per_i clearfix">
                        
                    </div>
                    
                </div>

                <!--提交用户图片E-->
            </div>
            <!--个人资料end-->
        </div>
    </div>
    <!--END右侧-->
</div>
<!--END右侧-->
<div class="PromptBox Box-tips" id="ywcmes" style="z-index: 9999; display: none; position: fixed; left: 50%; top: 50%; margin-top: -87px; margin-left: -208px;">
    <div class="BoxHead">
        <span class="BoxTitle">温馨提示</span>
        <a class="go_close" href="javascript:void(0)" onclick="closeCK()">×</a>
    </div>
    <div class="BoxBody clearfix">
        <p class="Bcon clearfix">
            <i class="ico-tipsDui"></i>
            保存资料成功！<br />
            恭喜您获得100积分，<a href="/integral/Index">查看积分》</a>
        </p>
    </div>
    <div class="Box-operate clearfix">

        <a href="javascript:void(0)" class="btn-blue" onclick="closeCK()">确定<i></i></a>
    </div>
</div>
<div class="PromptBox Box-tips" id="txmes" style="z-index: 9999; display: none; position: fixed; left: 50%; top: 50%; margin-top: -87px; margin-left: -208px;">
    <div class="BoxHead">
        <span class="BoxTitle">温馨提示</span>
        <a class="go_close" href="javascript:void(0)" onclick="closePoint()">×</a>
    </div>
    <div class="BoxBody clearfix">
        <p class="Bcon clearfix">
            <i class="ico-tipsDui"></i>
            保存头像成功！<br />
            恭喜您获得100积分，<a href="/integral/Index">查看积分》</a>
        </p>
    </div>
    <div class="Box-operate clearfix">

        <a href="javascript:void(0)" class="btn-blue" onclick="closePoint()">确定<i></i></a>
    </div>
</div>
<div class="PromptBox Box-tips" id="wwcmes" style="z-index: 9999; display: none; position: fixed; left: 50%; top: 50%; margin-top: -87px; margin-left: -208px;">
    <div class="BoxHead">
        <span class="BoxTitle">温馨提示</span>
        <a class="go_close" href="javascript:void(0)" onclick="closewwc()">×</a>
    </div>
    <div class="BoxBody clearfix">
        <p class="Bcon clearfix">
            <i class="ico-tipsDui"></i>
            <span id="wwcts"></span>
        </p>
    </div>
    <div class="Box-operate clearfix">
        <a href="javascript:void(0)" class="btn-blue" onclick="closewwc()">确定<i></i></a>
    </div>
</div>

   <!--底部 begin-->
    <!--部件开始:Footer_LastNew,分组:页脚部件-->
<div class="wrap_footer">
    <div class="item01">
        <div class="width1200">
            <img src="http://res4.360kad.com/theme/default/img/2014newKad/fxgBenner.png" alt="放心购">
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
                        <p><img src="http://res3.360kad.com/theme/default/img/2014newKad/kadPhoneBg.png" alt=""></p>
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
                    <img src="http://res4.360kad.com/theme/default/img/tool_icon1.png" alt="粤ICP备10212320号" style="display: inline;">
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
        
            <li>
                <a rel="nofollow" href="http://netadreg.gzaic.gov.cn/ntmm/WebSear/WebLogoPub.aspx?logo=440101101012010072700090" target="_blank" title="红盾电子链接标识">
                    <img data-original="http://res3.360kad.com/theme/default/img/tool_icon5.jpg" src="http://res3.360kad.com/theme/default/img/tool_icon5.jpg" alt="" style="display: inline;">
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
                        
                    </span><img src="http://res1.360kad.com/theme/default/img/sm_83x30.png" alt="安全联盟认证" width="83" height="30" style="border: none;">
                </a>
            </li>
            <li>
                <a style="display:block;padding-top:4px;" key="51c2d63c6856be2ce1761dce" logo_size="83x30" logo_type="business" rel="nofollow" href="http://v.pinpaibao.com.cn/authenticate/cert/?site=www.360kad.com&at=business" target="_blank">
                    
                    <span style="display:none;" class="LOGO_aq_jsonp_wrap_" id="AQ_logo_span_init_2"></span>
                    <img src="http://res1.360kad.com/theme/default/img/hy_83x30.png" alt="安全联盟认证" width="83" height="30" style="border: none;">
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




</div>

   <!--end底部-->
</body>
</html>

   