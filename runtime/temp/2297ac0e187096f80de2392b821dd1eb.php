<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\wamp64\www\tp5\public/../application/index\view\user\address.html";i:1521884901;s:57:"D:\wamp64\www\tp5\application\index\view\public\head.html";i:1521728961;s:57:"D:\wamp64\www\tp5\application\index\view\public\foot.html";i:1520935958;}*/ ?>
﻿
<!DOCTYPE html>
<html>
<head>
    <script language="javascript" type="text/javascript" async="async" src="http://ctr.360kad.com/ctrjs/ctr_v2.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>康爱多会员中心-收货地址</title>
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <link href="http://www.wan.com//static/css/base1.css" rel="stylesheet" type="text/css"/>
    <link href="http://www.wan.com//static/css/newKad_index.css" rel="stylesheet" type="text/css"/>
    <link href="http://www.wan.com//static/css/kad2-center-v1.css" rel="stylesheet" type="text/css"/>


<link href='http://www.wan.com//static/css/comm.css' rel='stylesheet' type='text/css'>
<link href='http://www.wan.com//static/css/style_index.css' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://www.wan.com//static/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src='http://www.wan.com//static/js/lunbo.js'></script>
<script type="text/javascript" src='http://www.wan.com//static/js/other.js'></script>
    


    
    <link href="http://www.wan.com//static/css/kad2-center-popup.css" rel="stylesheet" type="text/css"/>
    <link href="http://res4.360kad.com/theme/default/css/pop/pop.css" rel="stylesheet" type="text/css"/>
    <script src="http://www.wan.com//static/js/jquery.js" type="text/javascript"></script>
    <script src="http://www.wan.com//static/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="http://www.wan.com//static/js/envconfig.js" type="text/javascript"></script>
    <script src="http://www.wan.com//static/js/newcommonJs.js" type="text/javascript"></script>
    <script src="http://www.wan.com//static/js/publicsearch.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/pop/poplayer.js" type="text/javascript"></script>
    
    <script src="http://www.wan.com//static/js/kad2-city-select.js" type="text/javascript"></script>
    <script src="/address/getjscitydata" type="text/javascript"></script>

    
    <link href="http://res.360kad.com/theme/default/css/user/2015/kad2-center-personalDate.css" rel="stylesheet" type="text/css"/>
    <style>
        a:hover {color: red;}
        .apply_r_p a, .a_color:hover {text-decoration: underline;}
        .popup_addr {display: none;width: 946px;height: 314px;color: #666;border: dotted 1px #cfcfcf;background: #f0f9ff;position:absolute;top: 50%;left: 50%;margin-left: -369px;margin-top: -40px;z-index: 999;}
        .save-btn-box a:hover {text-decoration: none;}
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
            <h2><a href="<?php echo url('index/index'); ?>">返回首页</a></h2>
            <!--分类类目-->
           <script type="text/javascript" src="http://www.360kad.com/CommonJS/Js.aspx?Id=nav_www_otherleft_data"></script>
        </div>
       
    </div>

</div>
<!--部件结束:pc_pop_show-->

    <div class="new-kad-center">
        <!--面包屑-->
        <div class="kad-center-nav">
            <a href="/user">我的康爱多</a> &gt; 收货地址
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
            <p><a href="/safe">安全中心</a></p>
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
        <div class="kad-center-right">
            <h3 class="personal-msg">收货地址</h3>
            <div class="safe_c addr_null">
                <div class="addr clearfix" style="margin-top: -35px;">
                    <p class="font">
                        现保留 1 个收货地址，还可以增加 9 个地址。<a id="add-new-addr" href="javascript:void(0)" class="a_color">添加新的地址</a><br />系统仅能保留10个收货地址，还设置其中一个为默认地址，提交订单无须再次填写信息！
                    </p>
                    <p class="pic">
                        <img src="http://res4.360kad.com/theme/default/img/user/2015/pic1.jpg" />
                    </p>
                </div>
                <table class="tb" cellspacing="0" cellpadding="0" border="0" id="table">
                    <thead>
                        <tr class="tr1">
                            <td class="td1">收货人</td>
                            <td class="td2">收货地址</td>
                            <td class="td3">手机</td>
                            <td class="td4">邮件</td>
                            <!-- <td class="td5">默认</td> -->
                            <td class="td6"></td>
                        </tr>
                    </thead>  
                     <?php if(!empty($res)): foreach($res as $val): ?>  
                    <tbody>     
                       
                                <tr class="tr2">
                                    
                                    <td class="td1">

                                    <?php echo $val['consignee']; ?></td>
                                    <td class="td2">
                                        <?php echo $val['address']; ?></td>
                                    <td class="td3"><?php echo $val['phone']; ?>  </td>
                                    <td class="td4"><?php echo $val['email']; ?></td>
                                   <!--  <td class="td5"> 是</td> -->
                                    <td class="td6 clearfix">
                                        <a class="xg a_color" href="<?php echo url('user/xiugai',array('id'=>$val['id'])); ?> "  >修改</a>
                                    
                                        <a class="sc a_color" href="<?php echo url('user/del',array('id'=>$val['id'])); ?> ">删除</a>
                                    
                                    </td>
                                    
                                </tr>
                    </tbody>
                    <?php endforeach; endif; ?>
                </table>
                <input type="hidden" id="addresId" />
            </div>
        </div>
        <!--新增详细 begin-->
        <div class="popup_addr" id="addaddressfrm" >
            <input id="IsDefault" value="0" style="display:none" />
            <div class="popup_t clearfix">
                <p class="add_addr"><span class="radio_b"></span><span class="addr_f">新增地址</span></p><span class="close_i"  id="Pop_i" onclick="tabVisble()"></span>
            </div>
            <form action="<?php echo url('user/aaa'); ?>" style="display: block;" method='post'>
                <p class="pl10"> 
                    <span class="txt-left"><samp>*</samp> 收货人姓名：</span><span class="user-name-input">
                        <input type="text" class="txt-input" id="user-name" name="name" />
                    </span>
                    <span class="error-box" id="erroname" style="display: none;" style="font-color:red;">
                        <i class="icon-pic"></i><span id="msgname">收货人不能为空且必须不少于2个字符</span>
                    </span>
                </p>
                <p class="pl22">
                    <span class="txt-left"><samp>*</samp> 所在地区：</span>

                    
                    <span id="m_select" style="margin-left: 5px">
                   </span> 
                   <input type="hidden" name="KADDistrict" id="KADDistrict">

                    <select n="KADDistrict" id="KADDistrict_0" i="0" class="" name='select'><option id="110000" >北京</option><option id="120000">天津</option><option id="130000">河北省</option><option id="140000">山西省</option><option id="150000">内蒙古自治区</option><option id="210000">辽宁省</option><option id="220000">吉林省</option><option id="230000">黑龙江省</option><option id="310000">上海</option><option id="320000">江苏省</option><option id="330000">浙江省</option><option id="340000">安徽省</option><option id="350000">福建省</option><option id="360000">江西省</option><option id="370000">山东省</option><option id="410000">河南省</option><option id="420000">湖北省</option><option id="430000">湖南省</option><option id="440000">广东省</option><option id="450000">广西壮族自治区</option><option id="460000">海南省</option><option id="500000">重庆</option><option id="510000">四川省</option><option id="520000">贵州省</option><option id="530000">云南省</option><option id="540000">西藏自治区</option><option id="610000">陕西省</option><option id="620000">甘肃省</option><option id="630000">青海省</option><option id="640000">宁夏回族自治区</option><option id="650000">新疆维吾尔自治区</option></select>

                    
                    <select n="KADDistrict" id="KADDistrict_0" i="0" class="" name='selects'><option id="110000" >北京</option><option id="120000">天津</option><option id="130000">上海</option><option id="140000">张家口市</option><option id="150000">唐山市</option><option id="210000">秦皇岛市</option><option id="220000">宁波市</option><option id="230000">丽水市</option><option id="310000">杭州市</option><option id="320000">哈尔滨市</option><option id="330000">浙江省</option><option id="340000">黑河市</option></select>







                    <script type="text/javascript">$("#m_select").District("北京,北京市,东城区");</script>
                    <span class="error-box error-box3" id="areaerror" style="display: none;">
                        <i class="icon-pic"></i><span>请您填写完整的地区信息</span>
                    </span>
                </p>
                <p class="pl22">
                    <span class="txt-left"><samp>*</samp> 详细地址：</span>
                    <input type="text" value="" class="detailed-address txt-input" style="margin-left:5px" id="detailed-address" name="address" />
                    <span class="error-box error-box2" id="erroraddress" style="display: none;">
                        <i class="icon-pic"></i><span id="msgaddress">详细地址不能为空且必须不少于3个字符</span>
                    </span>
                </p>
                <p class="pl22">
                    <span class="txt-left"><samp>*</samp> 手机号码：</span>
                    <input type="text" id="phone" class="cell-phone-num txt-input" style="margin-left:5px" name='phone'/>
                    
                    <span class="error-box error-box2" id="errormobile" style="display: none; left:662px;">
                        <i class="icon-pic"></i><span id="msgmobile">手机号码不能为空!</span>
                    </span>
                </p>
                <p class="pl34">
                    <span class="txt-left">电子邮箱：</span>
                    <input type="text" id="emil" class="email-input txt-input" name="email"/>
                    <span class="tips"> 用来接收订单提醒邮件，便于您及时了解订单状态</span>
                    <span class="error-box error-box2" id="erroremil" style="display: none;">
                        <i class="icon-pic"></i><span id="msgemil">请输入正确的邮箱</span>
                    </span>
                </p>
                <p class="pl34">
                    <span class="txt-left">邮政编码：</span>
                    <input type="text" id="Zipcode" class="zip-code txt-input" />
                    <span class="error-box error-box2" id="errorcode" style="display: none; left:272px;">
                        <i class="icon-pic"></i><span id="msgcode">请输入正确的验证编码</span>
                    </span>
                </p>
                <input type="hidden" value="0" id="match-value" name="" />
            
            <p class="save-btn-box" >
                <a id="save-address-btn01" onclick=" Submit() " class="save-address-btn" href="javascript:void(0);" style='margin-top: 10px;'>校验信息
                
                </a>
                <a id="save-address-res" onclick="Reset()" class="save-address-res" href="javascript:void(0);" style='margin-top: 10px;'>重置</a>
            </p>

            <input type='submit' value='提交' style='width:50px;height:25px;padding-bottom: 5px;'/>
            <?php if(!empty($res)): ?>
            <input type='hidden' value="<?php echo $val['id']; ?>"/>
            <?php endif; ?>
            </form>
        </div>
        <!--新增详细 end-->
        <!--右侧 end-->
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
            <a href="javascript:void(0)" class="btn-blue" onclick="closeRe();">确定<i></i></a>
        </div>
    </div>
    <div class="kad-delete-pop" id="xg"  style="z-index: 99999; display: none; position: fixed; left: 50%; top: 50%; margin-top: -87px; margin-left: -208px;">
        <div class="pop-main">
            <p class="pop-title">
                温馨提示 <i class="kad-delte-closeBtn" id="kad-delte-closeBtn" onclick="closexg()"></i>
            </p>
            <p class="pop-txt"><span class="err_icon01">确定要修改吗？</span></p>
            <p class="pop-btn-box">
                <a href="javascript:void(0);" class="pop-btn-cancel" id="pop-btn-cancel" onclick="closexg();">
                </a><a href="javascript:void(0);" class="pop-btn-right" id="qrxg">
                </a>
            </p>
        </div>
    </div>
    <input type="hidden" id="h_AddressId" value="" />
    <input type="hidden" id="count" value="1" />

   <!--底部 begin-->
    <!--部件开始:Footer_LastNew,分组:页脚部件-->

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
    <!--END康爱多掌上药店-->



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

<script language="javascript">

    function closexg() {
        $("#xg").css("display", "none");
        $(".popup_addr").hide();
    }
    function closeRe() {
        window.location.href = "/Address/Index";
    }
    function closewwc() {
        $("#wwcmes").css("display", "none");
    }
    $("#Pop_i").click(function () {
        $(".popup_addr").hide();
    });
    $("#add-new-addr").click(function () {
        if ($("#count").val() >= 10) {
            alertPop("只能添加十个收货地址");
        } else {
            $(".addr_f").text("新增地址");
            $("#table").css("display", "none");
            $("#addaddressfrm").show();
            Reset();
        }
    });
    
    //重置
    function Reset() {
        $("#addaddressfrm").find("input[type='text']").val("");
    }
    //根据省份获取市区
    $("#province").change(function () {
        var provinceId = $("#province").val();
        $.ajax({
            url: "/Address/GetAllRegionList",
            data: { type: "spanCity", parentId: provinceId },
            success: function (itemList) {
                var html = "";
                for (var i = 0; i < itemList.length; i++) {
                    html += '<option value=' + itemList[i].DictValue + '>' + itemList[i].DictText + '</option>';
                }
                $("#city").html(html);
                var cityid = $("#city").val();
                $.ajax({
                    url: "/Address/GetAllRegionList",
                    data: { type: "spanArea", parentId: cityid },
                    success: function (itemList) {
                        var html = "";
                        for (var i = 0; i < itemList.length; i++) {
                            html += '<option value=' + itemList[i].DictValue + '>' + itemList[i].DictText + '</option>';
                        }
                        $("#area").html(html);
                    }
                });
            }
        });
    });
    //根据市获取区
    $("#city").change(function () {
        var cityid = $("#city").val();
        $.ajax({
            url: "/Address/GetAllRegionList",
            data: { type: "spanArea", parentId: cityid },
            success: function (itemList) {
                var html = "";
                if(itemList.length>0)
                    $("#area").show();
                else
                    $("#area").hide();
                for (var i = 0; i < itemList.length; i++) {
                    html += '<option value=' + itemList[i].DictValue + '>' + itemList[i].DictText + '</option>';
                }
                $("#area").html(html);
            }
        });
    });
    //是否邮件
    function isEmail(strEmail) {
        if (strEmail.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1) {
            return true;
        }
        else {
            return false;
        }
    }
    //是否手机
    function isMobilephone(strMobilephone) {
        if (strMobilephone.search(/^((13|15|17|18|14|16|19)[0-9]{1})+\d{8}$/) != -1) {
            return true;
        }
        else {
            return false;
        }
    }
    //是否固定电话
    function isTelephone(strTelephone) {
        if (strTelephone.search(/^\d{3,4}-?\d{7,9}$/) != -1) {
            return true;
        }
        else {
            return false;
        }
    }
    //是否邮政编码
    function isPostcode(strPostcode) {
        if (strPostcode.search(/^[0-9]{6}$/) != -1) {
            return true;
        }
        else {
            return false;
        }
    }


    //提交收货人信息
    function Submit() {
        
        var AddressId = $("#h_AddressId").val();
        var IsDefault = false;
        var Consignee = $("#user-name").val();
        var Province = $("#KADDistrict_0").find("option:selected").attr("id");
        var ProvinceName = $("#KADDistrict_0").find("option:selected").text();
        var City = $("#KADDistrict_1").find("option:selected").attr("id");
        var CityName = $("#KADDistrict_1").find("option:selected").text();
        var Area = $("#KADDistrict_2").find("option:selected").attr("id");
        var AreaName = $("#KADDistrict_2").find("option:selected").text();
        var Address = $("#detailed-address").val();
        var MobilePhone = $("#phone").val();
        var Telephone = $("#tel").val();
        var Email = $("#emil").val();
        var Postcode = $("#Zipcode").val();
        if ($("#IsDefault").attr("checked") == "checked") {
            IsDefault = true;
        }
        if (Consignee === "" && Address=="" && MobilePhone === "") {
            $("#erroname").css('display', 'block');
            $("#msgname").text("收货人不能为空且必须不少于2个字符!");
            $("#erroraddress").css('display', 'block');
            $("#msgaddress").text("详细地址不能为空且必须不少于3个字符!");
            $("#errormobile").css('display', 'block');
            $("#msgmobile").text("手机号码不能为空!");
            return false;
        }
        if ( Address=="" && MobilePhone === "") {
            $("#erroraddress").css('display', 'block');
            $("#msgaddress").text("详细地址不能为空且必须不少于3个字符!");
            $("#errormobile").css('display', 'block');
            $("#msgmobile").text("手机号码不能为空");
            return false;
        }
        if ($("#KADDistrict_2").is(":hidden"))
        {
            AreaName = "";
            Area = "";
        }
        if (City == "请选择市")
        {
            $("#areaerror").css('display', 'block');
            $("#areaerror span").text("请选择市");
            return false;
        }
        if (AreaName == "请选择区/县") {
            $("#areaerror").css('display', 'block');
            $("#areaerror span").text("请选择区域");
            return false;
        }
        if (Consignee === "") {
            $("#erroname").css('display', 'block');
            $("#msgname").text("收货人不能为空且必须不少于2个字符!");
            return false;
        }
        if (Consignee.length < 2) {
            $("#erroname").css('display', 'block');
            $("#msgname").text("收货人姓名不能为空且不少于两个字符");
            return false;
        }
        if (Address=="") {
            $("#erroraddress").css('display', 'block');
            $("#msgaddress").text("请您填写完整的地区信息");
            return false;
        }
      
        if (Address.length < 3) {
            $("#erroraddress").css('display', 'block');
            $("#msgaddress").text("详细地址不能为空且必须不少于3个字符");
            return false;
        }
        if (Address.length >25) {
            $("#erroraddress").css('display', 'block');
            $("#msgaddress").text("收货地址不能超过25个字符!");
            return false;
        }
        if (MobilePhone !== "" && !isMobilephone(MobilePhone)) {
            $("#errormobile").css('display', 'block');
            $("#msgmobile").text("手机号码格式不正确!");
            return false;
        }
        if (MobilePhone == "") {
            $("#errormobile").css('display', 'block');
            $("#msgmobile").text("手机号码不能为空!");
            return false;
        }
        if (Email !== "" && !isEmail(Email)) {
            $("#erroremil").css('display', 'block');
            $("#msgemil").text("邮箱格式不对!");
            return false;
        }
        if (Postcode !== "" && !isPostcode(Postcode)) {
            $("#errorcode").css('display', 'block');
            $("#msgcode").text("邮政编码格式不对!");
            return false;
        }
       
        if ($("#h_AddressId").val() == "") {

            $.ajax({
                url: "index/address/add",
                data: {
                    ProvinceId: Province,
                    ProvinceName: ProvinceName,
                    CityId: City,
                    CityName: CityName,
                    AreaId: Area,
                    AreaName: AreaName,
                    Address: Address,
                    Postcode: Postcode,
                    MobilePhone: MobilePhone,
                    Email: Email,
                    Consignee: Consignee,
                    IsDefault: IsDefault,
                    Telephone: Telephone
                },
                dataType: "json",
                type: "post",
                cache: false,
                success: function (data) {
                    if (data.Result) {

                        $("#wwcts").text("添加成功");
                        $("#wwcmes").css("display", "block");
                    } else {
                        alertPop(data.Message);
                    }
                }
            });
        } else {
            $("#xg").css("display", "block");
            $("#qrxg").click(function(){
                $.ajax({
                    url: "/Address/Edit",
                    data: {
                        AddressId: AddressId, ProvinceId: Province, ProvinceName: ProvinceName,
                        CityId: City, CityName: CityName, AreaId: Area, AreaName: AreaName,
                        Address: Address, Postcode: Postcode, MobilePhone: MobilePhone,
                        Email: Email, Consignee: Consignee,
                        IsDefault: IsDefault, Telephone: Telephone
                    },
                    type: "post",
                    cache: false,
                    success: function (data) {
                        if (data.Result) {
                         
                            $("#xg").css("display", "none");
                            $("#wwcts").text("修改成功");
                            $("#wwcmes").css("display", "block");
                            $("#table").style("display", "none");
                        }
                        else {
                            alertPop(data.Message);
                        }

                    }, error: function (data) {
                        $("#txtError").text(data.Message);
                    }

                });
            });
        }
        return false;
    };

    $("#user-name").focus(function () {
        $("#erroname").css('display', 'none');
    });
    $("#detailed-address").focus(function () {
        $("#erroraddress").css('display', 'none');
    });
    
    $("#phone").focus(function () {
        $("#errormobile").css('display', 'none');
    });
    $("#tel").focus(function () {
        $("#errormobile").css('display', 'none');
    });
    $("#emil").focus(function () {
        $("#erroremil").css('display', 'none');
    });
    $("#Zipcode").focus(function () {
        $("#errorcode").css('display', 'none');
    });
    //删除
    function Delete() {
        var addressId = $("#addresId").val();
        $.ajax({
            url: "/Address/Delete?AddressId=" + addressId,
            type: "post",
            cache: false,
            success: function (data) {
                if (data) {
                    window.location.href = "/Address/Index";
                }
                else {
                    alertPop(data);

                }
            }
        });
    }
    function success() {
        window.location.href = "/Address/Index";
    }
    //默认
    function Default() {
        var addressId = $("#addresId").val();
        $.ajax({
            url: "/Address/Default?AddressId=" + addressId,
            type: "post",
            cache: false,
            success: function (data) {
                if (data) {
                    window.location.href = "/Address/Index";
                }
                else {
                    alertPop(data);
                }
            }
        });
    }
    function tabVisble()
    {
        $("#table").css("display", "block");
    }
    function Edit(Id) {
        $(".addr_f").text("修改地址");
        $("#table").css("display", "none");
        var id = Id;
        $(".popup_addr").show();
        $.ajax({
            url: "/Address/Edit?id=" + id,
            type: "get",
            dataType: "json",
            cache: false,
            success: function (data) {
                $("#m_select").html("");
                $("#m_select").District(""+data.Province+","+data.City+","+data.District+"");
                $("#h_AddressId").val(data.ID);
                if (data.Address == "" || data.Address == null) {
                    $("#detailed-address").val("街道名及编号、楼宇名及房间号").css("color", "#666");
                }
                else {
                    $("#detailed-address").val(data.Address).css("color", "#000");
                }
                $("#Zipcode").val(data.PostCode);
                if (data.MobilePhone == "" || data.MobilePhone == null) {
                    $("#phone").val("").css("color", "#666");
                }
                else {
                    $("#phone").val(data.MobilePhone).css("color", "#000");
                }
                if (data.TelePhone == "" || data.TelePhone == null) {
                    $("#tel").val("");
                }
                else {
                    $("#tel").val(data.TelePhone).css("color", "#000");
                }
                $("#emil").val(data.Email);
                $("#user-name").val(data.Accepter);
                if (data.IsDefault == 1) {
                    $("#IsDefault").attr("checked", "checked");
                }
                else {
                    $("#IsDefault").attr("checked", "");
                }
            }
        });
    }
</script>
