<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\wamp64\www\tp5\public/../application/index\view\car\car1.html";i:1521773567;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>查看购物车</title>
    <script src="http://res2.360kad.com/script/jquery.1.7.1.min.js" type="text/javascript"></script>
    <script language="javascript" type="text/javascript" async="async" src="http://ctr.360kad.com/ctrjs/ctr_v2.js"></script>
    <script src="http://res1.360kad.com/script/envconfig.js" type="text/javascript"></script>
    <script src="http://res1.360kad.com/script/url.js" type="text/javascript"></script>
    <script src="http://res1.360kad.com/script/form-btn.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/rx_base.js" type="text/javascript"></script>
    <link href="http://res.360kad.com/theme/default/css/user/2015/base.css" rel="stylesheet" type="text/css"/>
    <link href="http://res.360kad.com/theme/default/css/user/2015/order-cart.css" rel="stylesheet" type="text/css"/>
    <link href="http://res4.360kad.com/theme/default/css/user/2015/orderProcess.css" rel="stylesheet" type="text/css"/>
    
    <link href="http://res3.360kad.com/script/Emailmatch/email.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .item2 img { width: 100px; }
        .header_search { float: left; }
        .header_r_d { clear: both; }
        .header_search_fine { float: left; margin-top: 10px; padding-left: 10px; }
        /*购物车凑单*/
        #free-bounced { display: none; width: 820px; height: 620px; position: fixed; z-index: 1000; top: 50%; left: 50%; margin-top: -310px; margin-left: -410px; }
            #free-bounced .bounced-bg { width: 820px; height: 620px; background-color: #000000; opacity: 0.5; filter: alpha(opacity=50); }
            #free-bounced .del-span { display: block; width: 40px; height: 40px; position: absolute; top: -10px; right: -10px; background: url(http://res.360kad.com/theme/default/img/user/2015/delete.png) no-repeat; z-index: 20; cursor: pointer; }
        ul li { list-style: none; }
        #free-bounced .inner-box { background-color: #ffffff; height: 600px; width: 800px; position: absolute; top: 10px; left: 10px; z-index: 3; }
        .tab-nav { width: 100%; height: 60px; background: #f4f4f4; border-bottom: 1px solid #c8c8c8; }
            .tab-nav ul li { height: 60px; width: 25%; float: left; text-align: center; line-height: 60px; cursor: pointer; font-size: 16px; font-family: "Microsoft YaHei"; position: relative; }
                .tab-nav ul li .line { display: block; width: 100%; height: 3px; background: #0a75e7; position: absolute; bottom: 0px; left: 0px; z-index: 4; display: none; }
        .clear { width: 100%; height: 0px; clear: both; }
        .tab-content { padding: 0px 20px; border-bottom: 1px solid #eeeeee; overflow: hidden; position: relative; height: 460px; }
            .tab-content .box ul li { height: 100px; width: 380px; float: left; font-family: "Microsoft YaHei"; margin-bottom: 40px; }
                .tab-content .box ul li .icon-left { height: 100px; width: 34px; }
                    .tab-content .box ul li .icon-left p { width: 12px; height: 12px; border: 1px solid #cfcfcf; margin-top: 42px; position: relative; cursor: pointer; }
                        .tab-content .box ul li .icon-left p span { display: block; width: 12px; height: 12px; position: absolute; top: 0px; left: 0px; z-index: 2; background: url(http://res.360kad.com/theme/default/img/user/2015/true.png) no-repeat; display: none; }
                        .tab-content .box ul li .icon-left p.act { border: 1px solid #0a75e7; }
                            .tab-content .box ul li .icon-left p.act span { display: block; }
                .tab-content .box ul li .pro-img { width: 98px; height: 98px; border: 1px solid #efefef; }
                    .tab-content .box ul li .pro-img img { width: 100%; height: auto; }
                .tab-content .box ul li .text-box { width: 178px; padding-left: 18px; height: 100px; }
                    .tab-content .box ul li .text-box .pro-name { padding-top: 20px; }
                        .tab-content .box ul li .text-box .pro-name a { display: block; color: #666666; font-size: 14px; text-decoration: none; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; }
                    .tab-content .box ul li .text-box .price-box { padding-top: 12px; color: #fe2424; font-size: 16px; }
        .float-l { float: left; }
        .btn-a { padding-top: 15px; text-align: center; }
            .btn-a a { display: inline-block; text-decoration: none; width: 108px; height: 46px; font-size: 16px; line-height: 46px; font-family: "Microsoft YaHei"; }
         .btn-a a.quxiao { border: 1px solid #cfcfcf; color: #666666; }
         .btn-a a.sure { border: 1px solid #0a75e7; color: #ffffff; background: #0a75e7; }
        .scroll-box { position: absolute; width: 10px; height: 460px; top: 0px; right: 10px; }
        .scroll-box  .scroll-bar { position: absolute; top: 0px; left: 0px; width: 10px; height: 140px; background: #c5c5c5; }
        .tab-content .box { display: none; }
        #scroll1 { position: absolute; top: 0px; left: 20px; z-index: 3; width: 760px; padding-top: 40px; }
        .free-bounced-bg { display: none; width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; background: #000000; opacity: 0.5; filter: alpha(opacity=50); z-index: 999; }
        /*差多少免邮、去凑单*/
        span.without-pay span { margin-left: 50px; }
            span.without-pay span:last-child { color: #2B87E8; cursor: pointer; }
            span.without-pay span font { color: #FE2424; }
    </style>

    
   
    </script>
    <script src="http://www.wan.com//static/js/Recomm2.js" type="text/javascript"></script>
    <script src="http://www.wan.com//static/js/web2014/publicsearch.js" type="text/javascript"></script>
    <script src="http://www.wan.com//static/js/jquery.emailmatch-new.js" type="text/javascript"></script>
    <script src="http://www.wan.com//static/js/cart.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/cartList.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            if (IsLogin()) {
                $("#h_isLogin").val(1);
            }
        });

        function LogOut() {
            location.href = 'http://user.360kad.com/User/LogOut?ReturnUrl=' + document.URL;
        }

    </script>

</head>
<body>
    <!--部件开始:NewLoginRegTop,分组:页头部件-->
  <!--头部-->
<div class="header_top">
    <div class="header_t">
        <div class="header_t_l">
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
        <div class="header_t_r">
            <ul class="hNavList">
                <li class="Ywebnav">
                    <span class="Ycen"></span><span class="Yico_dian"></span><span class="tlast">网站导航</span>
                    <div class="Ytopnavdiv">
                        <dl>
                            <dt>特色频道</dt>
                            <dd>
                                <a href="#" target="_blank">特卖</a>
                            </dd>
                            <dd>
                                <a href="http://www.360kad.com/tuangou/" target="_blank">药团</a>
                            </dd>
                            <dd>
                                <a href="http://www.360kad.com/dymhh/men.shtml" target="_blank">男科药馆</a>
                            </dd>
                            <dd>
                                <a href="http://www.360kad.com/medical/" target="_blank">医疗器械</a>
                            </dd>
                        </dl>
                        <dl class="d2">
                            <dt>健康工具</dt>
                            <dd>
                                <a href="http://www.360kad.com/zhuanti/kad_zsyd.shtml" target="_blank">掌上药店</a>
                            </dd>
                            <dd>
                                <a href="http://www.360kad.com/dymhh/selfhelp.shtml" target="_blank">自助找药</a>
                            </dd>
                            <!--<dd><a href="http://cart.360kad.com/Assistant" target="_blank">便捷购</a></dd>-->
                        </dl>
                        <dl>
                            <dt>健康知多点</dt>
                            <dd>
                                <a href="http://www.360kad.com/Medication/" target="_blank">用药指南</a>
                            </dd>
                            <dd>
                                <a href="http://ask.360kad.com/" target="_blank">健康问答</a>
                            </dd>
                            <dd>
                                <a href="http://www.360kad.com/jknews/List_170.shtml" target="_blank">肝胆科</a>
                            </dd>
                            <dd>
                                <a href="http://pfk.360kad.com/" target="_blank">皮肤科</a>
                            </dd>
                            <dd>
                                <a href="http://hx.360kad.com/" target="_blank">呼吸科</a>
                            </dd>
                            <dd>
                                <a href="http://jf.360kad.com/" target="_blank">减肥瘦身</a>
                            </dd>
                            <dd>
                                <a href="http://sex.360kad.com/" target="_blank">两性健康</a>
                            </dd>
                            <dd>
                                <a href="http://fk.360kad.com/" target="_blank">妇科</a>
                            </dd>
                            <dd>
                                <a href="http://baby.360kad.com/" target="_blank">母婴</a>
                            </dd>
                        </dl>
                    </div>
                </li>
                <li class="YService">
                    <span class="Ycen"></span><span class="Yico_dian"></span><span class="tlast">客户服务</span>
                    <div class="Ytopnavdiv">
                        <dl class="Ymykadc">
                            <dd>
                                <a href="http://help.360kad.com/">帮助中心</a>
                            </dd>
                            <dd>
                                <a href="http://help.360kad.com/SaleAfter/ContactSer">联系客服</a>
                            </dd>
                            <dd>
                                <a href="http://help.360kad.com/Complaint/Index?workcategoryid=3&customformid=104">投诉建议</a>
                            </dd>
                        </dl>
                    </div>
                </li>
                <li class="tphone"><a href="http://www.360kad.com/zhuanti/kad_zsyd.shtml">手机版</a></li>
                <li class="ttel">400-8811-020</li>
                <li ><a href="http://www.wan.com/index/car/car1">购物车</a></li>
                <li class="Ymyorder ">
                    <span class="Ycen"></span><span class="Yico_dian"></span><a href="http://www.wan.com/index/business/myorder" >我的订单</a>
                    <div class="Ytopnavdiv">
                        <dl class="Ymyorderc">
                            <dd class="YNopay">
                                <a href="">待付款订单</a>
                            </dd>
                            <dd class="YNosure">
                                <a href="">待确认收货</a>
                            </dd>
                        </dl>
                    </div>
                </li>
                <li class="Ymykad ">
                    <span class="Ycen"></span><span class="Yico_dian"></span><a href="">我的康爱多</a>
                    <div class="Ytopnavdiv">
                        <dl class="Ymykadc">
                            <dd>
                                <a href="<?php echo url('user/grzl'); ?>">我的中心</a>
                            </dd>
                            <dd>
                                <a href="http://www.wan.com/index/business/mycollection">我的收藏</a>
                            </dd>
                            <dd>
                                <a href="http://www.wan.com/index/user/address">收货地址</a>
                            </dd>
                        </dl>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--END头部-->
<!--部件结束:NewLoginRegTop-->

    

<div class="order-msg-wrap">
    <!--顶部-->
    <div class="subsuccess_h clearfix">
        <div class="head_l">
            <a href="http://www.360kad.com">
                <img src="http://res.360kad.com/theme/default/img/user/2015/kad_03.jpg"  />
            </a>
            <p><img src="http://res.360kad.com/theme/default/img/user/2015/autoSlogo.gif"  /></p>
        </div>
        <div class="head_r">
            <img src="http://res.360kad.com/theme/default/img/user/2015/shop_p2.png"  />
        </div>
    </div>
    <!--顶部end-->
    <!--部件开始:cart_head_ad,分组:广告部件-->
<!--部件结束:cart_head_ad-->

    <!--头部-->
    <div class="ctime cartTime">
        <span class="ctimeInfo" style="float: left; line-height: 18px; font-weight: bold;">
        </span>
        <input type="hidden" id="ctimeType" value="cart" />
        
    </div>
    <div class="cart-thead clearfix">
        <label for="" class="full-chose-box">
            <i>
                <input type="checkbox" name="" id="full-chose-input" class="full-chose-input check-box-input" />
            </i>全选
        </label>
        <span class="pro-title">商品名称</span> <span class="other-msg">
            <span class="sw80">会员价</span><span class="line">|</span><span class="sw80"></span><span class="line">|</span><span class="sw124">优惠金额</span><!--<span class="line">|</span><span class="sw106">赠送积分</span>--><span class="line">|</span><span class="sw80">小计</span><span class="line">|</span><span class="sw80">操作</span>
        </span>
    </div>
    <!--主体-->
    
    <!--END主体-->
    <form action="<?php echo url('car/car2'); ?>" method="post">
    <div id="loadingCart">
      
       <div class="cart-body" style=""><!--康爱多-->
            <div class="cart-sectionA "><p class="th-title">康爱多</p><ul class="pro-list-box"><!--OTC-->
            <?php if(!empty($arr)): foreach($arr as $val): ?>
            <li class="act"><div class="disb item1"><label for="" class="single-chose"><i class="on"><input type="checkbox" class="check-box-input" name="name[]" id="910fadfd5a174b24bc718dedbef7d8f9" value="<?php echo $val['id']; ?>" redemp="" ></i></label></div><div class="disb item2"><a href="http://www.360kad.com/product/131720.shtml" ><img src="http://www.wan.com//uploads/<?php echo $val['imagepath']; ?>" ></a></div><div class="disb item3"><p><i class="icon0 "></i><a ><?php echo $val['goodsname']; ?></a></p></div><div class="disb item4">￥<?php echo $val['curprice']; ?></div><div class="disb item6">省<span class="save-price">¥0.00</span>元</div><div class="disb item8">￥<span id="price_910fadfd5a174b24bc718dedbef7d8f9"><?php echo $val['curprice']; ?></span></div><div class="disb item9"><a class="delte-btn" href="<?php echo url('car/delcar',array('id'=>$val['id'])); ?>">删除</a></div></li>
             <input type='hidden' value="<?php echo $val['curprice']; ?>" name='price[]'/>
            <?php endforeach; endif; ?>
            </ul></div><!--END康爱多-->
        </div>
        
   

    </div>
    <!--结算-->
    <div class="settle-0accounts">
        
        <div class="clearfix go-pay-box">
            <span class="go-back">
                <i></i><a href="<?php echo url('index/index'); ?>" >
                    返回首页
                </a>
            </span> <span class="cart-msg ">
                <span class="go-pay-btn">
               
                <input type="submit" value="提交" style="width:100px;height: 46px;">
                </span>
            </span>
        </div>
    </div>
    <!--END结算-->
 </form>    
    
    <!--活动推荐部分-->
    <!--部件开始:cart_reccomm_act_r,分组:广告部件-->
<div class="act_r">
    <h3>畅销品</h3>
    <div class="act_list">
        <ul class="clearfix">
            <?php if(!empty($chang)): foreach($chang as $val): ?>
                <li class="">
                    <a href="<?php echo url('lists/details',array('id'=>$val['id'])); ?>">
                        <img title="<?php echo $val['goodsname']; ?>" alt="" src="http://www.wan.com//uploads/<?php echo $val['imagepath']; ?>">Kad.Web.Core.AdEntity.
                    </a>

            </li>
             <?php endforeach; endif; ?>  
        </ul>
    </div>
</div>
<!--部件结束:cart_reccomm_act_r-->

</div>
<input type="hidden" id="cartIds" />
<input type="hidden" id="h_isLogin" value='0' />
<input type="hidden" id="h_totalPrice" value='0' />
<input type="hidden" id="h_CartCount" value="0" />
<!-- 登录/注册start -->
<div id="showLogOrReg" class="showLogOrReg" style="display: none;">
    <div class="wright">
        <p class="wright_t">
            <span class="selthis">登录康爱多</span><a href="javascript:void(0)" class="go_close" id="closeLog"
                                                 onclick="popClose('showLogOrReg',1);"></a>
        </p>
        <form method="post" action="" onsubmit="return false;">
            <input type="hidden" value="false" name="IsCartLogin" />
            <div class="wright_m">
                <p class="LoginError" id="LoginError">
                    <span data-valmsg-replace="true" data-valmsg-for="LoginError" class="field-validation-valid">
                    </span>
                </p>
                <div class="import_class">
                    <div class="txtClass">
                        <p class="pt10">
                            登录名 <span class="Register_ps">
                                没有账户？ <a onclick="location.href='http://user.360kad.com/Register/Mobile?returnUrl='+document.URL;return false;" href="javascript:void(0);" target="_blank">快速注册</a>
                            </span>
                        </p>
                        <div id="pUserEmail" class="p_input">
                            <input type="text" autocomplete="off" data-val="true" data-val-regex="请输入正确格式的登录名！"
                                   data-val-required="登录名不能为空！" data-val-regex-pattern="([\u4e00-\u9fa5]|[a-zA-Z0-9]|_)|([\w.\-]+@([\w\-]+\.)+[\w\-]+)|(^(13[0-9]|15[7-9]|153|156|18[7-9])[0-9]{8}$)"
                                   value="k12301009930" class="text pb5" onblur="txtblur(this);" onkeydown="" onfocus="txtfocus(this);"
                                   name="UserEmail" id="UserEmail"><i class="txt_icon" style=""></i>
                        </div>
                    </div>
                    <div class="txtError" data-valmsg-for="UserEmail" id="txtError">
                        <span class="field-validation-valid" data-valmsg-for="UserEmail" data-valmsg-replace="true">
                        </span><span class="txtError_ico"></span>
                    </div>
                    <!--<div class="txtWarn" data-warnmsg-for="UserName" id="PasswordWarn" style="display: none;">请输入正确格式的登录名！</div>-->
                </div>
                <div style="z-index: 1;" class="import_class">
                    <div class="txtClass">
                        <p class="pt10">
                            密码 <span class="forget_ps">
                                <a href="javascript:void(0)" target="_blank" onclick="location.href = 'http://user.360kad.com/Login/ForgetPassword'; return false;">
                                    忘记密码
                                </a>
                            </span>
                        </p>
                        <p class="p_input">
                            <!--<span class="UserPasswordtxt" onclick="passwordtxtfocus(this);">6—20位字母、数字或字符的组合，不建议用纯数字/纯字母</span>-->
                            <input type="password" data-val="true" data-val-length="密码长度应在6-20位之间！" data-val-length-max="20"
                                   data-val-length-min="6" data-val-required="请输入您的密码！" value="" name="UserPassword"
                                   class="pl5" id="UserPassword" onblur="txtblur(this);" onfocus="$('#LoginError').html('');txtfocus(this);"
                                   onkeydown="isEnterKey(event,this,1);">
                            <i class="txt_icon"></i>
                        </p>
                    </div>
                    <div class="txtError" data-valmsg-for="UserPassword" id="PasswordErr">
                        <span class="field-validation-valid" data-valmsg-for="UserPassword" data-valmsg-replace="true">
                        </span><span class="txtError_ico"></span>
                    </div>
                    <!--<div class="txtWarn" data-warnmsg-for="UserPassword" id="PasswordWarn">
                                请输入密码，长度应在6-20位之间！
                          </div>-->
                </div>
                <div class="cbxClass">
                    <label for="IsRemberName">
                        <input type="checkbox" id="IsRemberName" name="IsRemberName" checked="checked" value="true"
                               class="inputcheck">
                        记住我的登录名
                    </label>
                </div>
                <div class="btnclass">
                    <input type="hidden" id="ReturnUrl" name="ReturnUrl" value="/Cart">
                    <input type="button" value="登 录" name="LoginButton" id="LoginButton" class="btncss"
                           onclick="UserLogin();">
                    <!--
                          <input id="ReturnUrl" type="hidden" name="ReturnUrl" value="">
                          <input type="button" value="登 录" name="LoginButton" id="LoginButton" class="btncss" >-->
                </div>
                <p class="more_login">
                    您还可以使用合作网站账号登录康爱多：
                </p>
                <p class="log_user_other">
                    <span>
                        <a class="l_weChat" onclick="location.href = 'http://user.360kad.com/login/WeChatLogin?ReturnUrl=' + document.URL; return false;"
                           href="javascript:void(0)" title="微信登录"></a>
                    </span>
                    <span>
                        <a class="l_qq" onclick="location.href = 'http://user.360kad.com/login/QzoneLogin?ReturnUrl=' + document.URL; return false;"
                           href="javascript:void(0)" title="QQ登录"></a>
                    </span>
                    <span>
                        <a class="l_xinlang" onclick="location.href = 'http://user.360kad.com/login/SinaLogin?ReturnUrl=' + document.URL; return false;"
                           href="javascript:void(0)" title="新浪微博登录"></a>
                    </span><span>
                        <a class="l_alipay" onclick="location.href = 'http://user.360kad.com/Login/AlipayLogin?ReturnUrl=' + document.URL; return false;"
                           href="javascript:void(0)" title="支付宝登录"></a>
                    </span><span>
                        <a class="l_taobao" onclick="location.href = 'http://user.360kad.com/login/TaobaoLogin?ReturnUrl=' + document.URL; return false;"
                           href="javascript:void(0)" title="淘宝登录"></a>
                    </span><span>
                               <a class="l_ebaolife" onclick="location.href = 'http://user.360kad.com/login/EbaolifeLogin?ReturnUrl=' + document.URL; return false;"
                                  href="javascript:void(0)" title="健保通（医卡通）登录"></a>
                    </span>
                </p>
                <p class="log_help">
                    如紧急，请拨打<b>400-8811-020</b>咨询。
                </p>
            </div>
        </form>
    </div>
</div>
<!-- 登录/注册end -->
<!--购物车凑单Start-->
<div class="free-bounced-bg"></div>
<div id="free-bounced">
    <span class="del-span"></span>
    <div class="bounced-bg">
    </div>
    <div class="inner-box">
        <div class="tab-nav">
            <ul>
                <li min-price="1" max-price="10">1-10元<span class="line" style="display:block;"></span></li>
                <li min-price="10" max-price="20">10-20元<span class="line"></span></li>
                <li min-price="20" max-price="30">20-30元<span class="line"></span></li>
                <li min-price="30" max-price="999">30元以上<span class="line"></span></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="tab-content">
            <div class="scroll-box">
                <span class="scroll-bar"></span>
            </div>
            <div style="display:none;">
                <ul class="clone-contain">
                    <li>
                        <div class="icon-left float-l">
                            <p code="6431">
                                <span></span>
                            </p>
                        </div>
                        <div class="pro-img float-l">
                            <a class="pro-url" href="" target="_blank">
                                <img class="pro-img" src="http://res.360kad.com/theme/default/img/user/2015/img-a.jpg">
                            </a>
                        </div>
                        <div class="text-box float-l">
                            <p class="pro-name"><a class="pro-aname" href="" target="_blank">同仁堂 烧伤净喷雾剂 20同仁堂 烧伤净喷雾剂 20</a></p>
                            <p class="price-box">￥9.50</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="scroll1">
                <div class="box" style="display:block;">
                    <ul></ul>
                </div>
                <div class="box">
                    <ul></ul>
                </div>
                <div class="box">
                    <ul></ul>
                </div>
                <div class="box">
                    <ul></ul>
                </div>
            </div>
        </div>

        <div class="btn-a">
            <a href="javascript:;" class="quxiao">取消</a>
            <a href="javascript:;" class="sure">确定</a>
        </div>
    </div>
</div>
<!--购物车凑单End-->
    <!--部件开始:NewLoginRegFooter,分组:页脚部件-->
 <!--footer-->
<div class="wrap_footer">
    <!--康爱多掌上药店-->
    <div class="item01 item02">
        <div class="width980 clearfix">
           <div class="lside">
                <div class="appCode">
                    <p class="title">手机购药</p>
                    <p class="code"></p>
                    <p class="clearfix pl8">
                        <span class="ios"><a href="http://um0.cn/2Vawnt/" target="_blank"></a></span>
                        <span class="line"></span>
                        <span class="android"><a target="_blank" href="http://res.360kad.com/app/k/kad.apk"></a></span>
                    </p>
                </div>
                <div class="weixinCode">
                    <p class="title">微信购药</p>
                    <p class="code"></p>
                    <p class="title02">扫一扫  领红包</p>
                </div>
            </div>
            <div class="mside">
                <ul class="clearfix">
                    <li>
                        <p class="title">
                            新手指南
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Shopping/shopWm" target="_blank" rel="nofollow">购物流程</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Novice/VipClass" target="_blank" rel="nofollow">会员介绍</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Novice/IntegralDesc" target="_blank" rel="nofollow">积分说明</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Pay/Coupon" target="_blank" rel="nofollow">优惠券使用</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Novice/Question" target="_blank" rel="nofollow">常见问题</a>
                        </p>
                    </li>
                    <li>
                        <p class="title">
                            配送方式
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Delivery/Freight" target="_blank" rel="nofollow">配送说明</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Delivery/Privsend" target="_blank" rel="nofollow">隐私配送</a>
                        </p>
                    </li>
                    <li>
                        <p class="title">
                            支付方式
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Pay/OnlinePay" target="_blank" rel="nofollow">在线支付</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Pay/BankTrans" target="_blank" rel="nofollow">银行转账</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Pay/Cash" target="_blank" rel="nofollow">货到付款</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Pay/Mention" target="_blank" rel="nofollow">上门自提</a>
                        </p>
                    </li>
                    <li>
                        <p class="title">
                            售后服务
                        </p>
                        <p>
                            <a href="http://help.360kad.com/MyKad/MyOrder" target="_blank" rel="nofollow">订单查询</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/SaleAfter/ReturnsFlow" target="_blank" rel="nofollow">退换商品</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/SaleAfter/RefundFlow" target="_blank" rel="nofollow">退款说明</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/SaleAfter/ContactSer" target="_blank" rel="nofollow">联系客服</a>
                        </p>
                    </li>
                    <li>
                        <p class="title">
                            特色服务
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Feature/DrugDecla" target="_blank" rel="nofollow">用药咨询</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Novice/PrivacyDec" target="_blank" rel="nofollow">隐私声明</a>
                        </p>
                        <p>
                            <a href="http://user.360kad.com/Custom/Proposedinteractive?type=0"
                               target="_blank" rel="nofollow">投诉建议</a>
                        </p>
                        <p>
                            <a href="http://help.360kad.com/Novice/Disclaimer" target="_blank" rel="nofollow">
                                免责声明
                            </a>
                        </p>
                    </li>
                    <li class="phonePic">
                        <p>
                            <img src="http://res.360kad.com/theme/default/img/user/2015/kadPhoneBg.png"  />
                        </p>
                        <p class="pt4">
                            订购服务时间：9：00—23：00
                        </p>
                        <p>
                            售后服务时间：9：00—22：30
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--END康爱多掌上药店-->
</div>
<div class="footer_list">
    <div class="width980">
        <!--关于康爱多网上药店-->
        <p class="aboutKadList">
            <a rel="nofollow" href="http://help.360kad.com/about/kankan" target="_blank">关于我们</a>
            | <a href="http://www.360kad.com/zhuanti/kad_zsyd.shtml" target="_blank" rel="nofollow">
    掌上药店
</a> | <a rel="nofollow" href="http://help.360kad.com/about/entitygz" target="_blank">
    实体药店
</a> | <a rel="nofollow" href="http://help.360kad.com/About/Recruitment"
   target="_blank">加入康爱多</a> | <a href="http://help.360kad.com/About/CallUs" target="_blank"
   rel="nofollow">联系我们</a> | <a href="http://www.360kad.com/Supplier" target="_blank"
   rel="nofollow">商务合作</a> | <a href="http://help.360kad.com/About/Authen" rel="nofollow"
   target="_blank">经营认证</a> | <a rel="nofollow" href="http://help.360kad.com/About/FriendlyLink"
   target="_blank">友情链接</a> | <a href="http://www.360kad.com/TagList.aspx" target="_blank">
    TAG列表
</a> | <a href="http://www.360kad.com/SiteMap.shtml" target="_blank">网站地图</a>
            | <a href="http://cps.360kad.com/" target="_blank">CPS联盟</a>
        </p>
        <p class="diploma_list">
            <a class="pr8" rel="nofollow" title="互联网药品交易服务资格证书" target="_blank" href="http://help.360kad.com/about/AuthenBusiness">
                互联网药品交易服务资格证书
            </a>| <span class="bottomPadding01">
                      <a rel="nofollow" title="互联网药品信息服务资格证书"
                         target="_blank" href="http://help.360kad.com/About/AuthenInfo">
                          互联网药品信息服务资格证书
                      </a>
            </span>| <span class="bottomPadding01">
                         <a rel="nofollow" title="执业药师证"
                            target="_blank" href="http://help.360kad.com/About/AuthenManage">执业药师证</a>
            </span>| <span class="bottomPadding02">
                         <a rel="nofollow" title="药品经营许可证" target="_blank"
                            href="http://help.360kad.com/About/AuthenManage">药品经营许可证</a>
            </span>| <span class="bottomPadding02">
                         <a rel="nofollow" title="食品流通许可证" target="_blank" href="http://help.360kad.com/About/AuthenLiuTong">
                             食品流通许可证
                         </a>
            </span>| <span class="bottomPadding02">
                         <a rel="nofollow" title="公司营业执照"
                            target="_blank" href="http://help.360kad.com/About/Authen">公司营业执照</a>
            </span>| <span>
                         <a rel="nofollow" title="GSP认证证书" target="_blank" href="http://help.360kad.com/About/AuthenGSP">
                             GSP认证证书
                         </a>
            </span>| <span>
                         <a href="http://help.360kad.com/About/AuthenTeleservice"
                            target="_blank" rel="nofollow">增值电信业务经营许可证 &nbsp;</a>
            </span>
        </p>
        <!--END关于康爱多网上药店-->
        <!--行业认证-->
        <p class="bottom" style="font-family: " 宋体";">
            &copy; 2010-2016 广东<a href="http://www.360kad.com">康爱多网上药店</a> 版权所有，并保留所有权利
        </p>
        <!--END行业认证-->
    </div>
</div>
<!--ENDfooter-->
<!--部件结束:NewLoginRegFooter-->

    <link href="http://www.wan.com//static/css/pop.css" rel="stylesheet" type="text/css"/>
    <script src="http://www.wan.com//static/js/poplayer.js" type="text/javascript"></script>
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

    <!--网站统计-->
    <!--部件开始:WebmasterStatistics,分组:通用部件-->
<div style="display:none">
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
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F7a942c91de8533c33ddabdacba23065b' type='text/javascript'%3E%3C/script%3E"));
</script>
<!--百度再营销0416 -->
<script type="text/javascript">
<!-- 
var bd_cpro_rtid="nHRvPjm";
//-->
</script>
<script type="text/javascript"  src="http://cpro.baidu.com/cpro/ui/rt.js"></script>
<noscript>
<div style="display:none;">
<img height="0" width="0" style="border-style:none;" src="http://eclick.baidu.com/rt.jpg?t=noscript&rtid=nHRvPjm" />
</div>
</noscript>
</div>
<!--部件结束:WebmasterStatistics-->

    
    
</body>
</html>