<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\wamp64\www\tp5\public/../application/index\view\car\car2.html";i:1521976483;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>请核对填写订单信息</title>
    <script src="http://res4.360kad.com/script/jquery.1.7.1.min.js" type="text/javascript"></script>
    <script language="javascript" type="text/javascript" async="async" src="http://ctr.360kad.com/ctrjs/ctr_v2.js"></script>
    <script src="http://res.360kad.com/script/envconfig.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/url.js" type="text/javascript"></script>
    <script src="http://res1.360kad.com/script/form-btn.js" type="text/javascript"></script>
    <script src="http://res1.360kad.com/script/rx_base.js" type="text/javascript"></script>
     <link href="http://res1.360kad.com/theme/default/css/user/2015/base.css" rel="stylesheet" type="text/css"/>
    <link href="http://res.360kad.com/theme/default/css/user/2015/order-cart.css" rel="stylesheet" type="text/css"/>
    <link href="http://res4.360kad.com/theme/default/css/user/2015/orderProcess.css" rel="stylesheet" type="text/css"/>
    
    <style type="text/css">
        .used-coupons .section3 .left a { display: block; width: 102px; height: 28px; background: url(http://res3.360kad.com/theme/default/img/user/2015/orderP_allbgs.png) no-repeat 0px -434px; }
        .used-coupons .section3 .left a:hover { background-position: 0px -462px; }
        .total-price{font-family: "宋体";  color:#666;}
    </style>

    
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
                    <span class="Ycen"></span><span ></span><a href="http://www.wan.com/index/business/myorder" >我的订单</a>
                    <div class="Ytopnavdiv">
                        <dl class="Ymyorderc">
                            <dd class="YNopay">
                                <a href="http://user.360kad.com/order?type=1">待付款订单</a>
                            </dd>
                            <dd class="YNosure">
                                <a href="http://user.360kad.com/order?type=2">待确认收货</a>
                            </dd>
                        </dl>
                    </div>
                </li>
                <li class="Ymykad ">
                    <span class="Ycen"></span><span class="Yico_dian"></span><a href="http://user.360kad.com/user">我的康爱多</a>
                    <div class="Ytopnavdiv">
                        <dl class="Ymykadc">
                            <dd>
                                 <a href="<?php echo url('user/grzl'); ?>">我的中心</a>
                            </dd>
                            <dd>
                                <a href="http://www.wan.com/index/business/mycollection">我的收藏</a>
                            </dd>
                            <dd>
                                <a href="<?php echo url('user/address'); ?>">收货地址</a>
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

    
<form action="/Order/Index" method="post" id="submitForm" enctype="multipart/form-data">
    <input type="hidden" id="hasOtherRp" name="hasOtherRp" value="0" />
    <!--填写核对订单信息-->
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
                <img src="http://res.360kad.com/theme/default/img/user/2015/shop_p3.png"  />
            </div>
        </div>
        <!--顶部end-->
        <div class="ctime cartTime">
            <span class="ctimeInfo" style="float: left; line-height: 18px; font-weight: bold;">
            </span>
            <input type="hidden" id="ctimeType" value="order" />
            <div style="height: 18px;">
                <ul class="ctimeWarn"></ul>
            </div>
        </div>
        <div class="fill-msg-box">
            <h3>
                填写核对订单信息
            </h3>
            <!--收货人信息-->
            <div class="consignee" id="consignee">
                <!--如有未填写完的选项当前添加class="consignee-error"-->
                
                <div class="sectionA">
                    <p class="pb12">
                        <input id="h_AddressId" name="h_AddressId" type="hidden" value="1789806090" />
                        <span class="users-msg">收货人信息</span><a class="fixed-btn" href="<?php echo url('car/xiugai'); ?>">[修改]</a><font>如需修改，请先保存选择支付及配送方式</font>
                    </p>
                    <p class="pl22">
                        <span class="users-name">
                         <?php echo $address['consignee']; ?>
                        </span><span class="users-phone-num">
                          <?php echo $address['phone']; ?>
                        </span>
                    </p>
                    <p class="user-address">
                       <?php echo $address['address']; ?>
                    </p>
                </div>
                <div class="sectionB" style="display: none;">
                    <p class="pb12">
                        <span class="users-msg">收货人信息</span><a class="saved-btn" href="javascript:void(0);">[保存收货人信息]</a>
                    </p>
                    <ul class="address-lists clearfix">
                        <!--地址列表-->
                    </ul>
                    <!--新增地址-->
                    <div class="add-new-address">
                        <p class="title">
                            <span class="label-box">
                                <label for="new-address-btn">
                                    <input type="radio" name="radio-btn01" class="new-address-btn" id="new-address-btn"
                                           onclick="selectedAddress(this);_gaq.push(['_trackEvent', '新订单流程跟踪20120823', '订单信息页-新增收货地址-单选按钮', '0', 0]);"
                                           value="0" />
                                </label>
                            </span><span class="font-sty">新增地址</span>
                        </p>
                        
                        <div class="virtualForm">
                            <p class="pl10">
                                <span class="txt-left"><samp>*</samp>收货人姓名：</span><span class="user-name-input">
                                    <input type="text" name="" id="user-name"
                                           class="txt-input" onblur="matchUserNameMsg()">
                                </span> <span class="error-box">
                                    <i class="icon-pic"></i><span>请您填写收货人姓名</span>
                                </span>
                            </p>
                            <p class="pl22">
                                <span class="txt-left">
                                
                                <input type="hidden" id="h_ProvinceId" value="0" />
                                <input type="hidden" id="h_CityId" value="0" />
                                <input type="hidden" id="h_AreaId" value="0" />
                                <input type="hidden" id="h_isCreate" value="0" />
                                <input type="hidden" id="h_isModify" value="0" />
                                <input type="hidden" id="selectedAddressId" value='0' />
                            </p>
                            <p class="pl22">
                                <span class="txt-left">
                                    <samp>
                                        *
                                    </samp>
                                    详细地址：
                                </span>
                                <input type="text" name="" id="detailed-address" class="detailed-address txt-input"
                                       value="" onblur="matchAddressMsg()" />
                                <span class="error-box error-box2">
                                    <i class="icon-pic"></i><span>请您填写收货人详细地址</span>
                                </span>
                            </p>
                            <p class="pl22">
                                <span class="txt-left">
                                    <samp>
                                        *
                                    </samp>
                                    手机号码：
                                </span>
                                <input type="text" class="cell-phone-num txt-input" onkeydown="$('#match-value').val(1);"
                                       id="txtMobilePhone" onblur="matchMobileMsg()" />
                                <span class="pr46">或</span><span class="tell-phone-txt">固定电话：</span><input type="text"
                                                                                                />
                                <span class="error-box error-box2" errtype="mobileErr">
                                    <i class="icon-pic"></i><span>请输入您的手机号码！</span>
                                </span>
                                <span class="error-box error-box2" errtype="telErr">
                                    <i class="icon-pic"></i><span>请输入正确的固定电话！</span>
                                </span>
                            </p>
                            <p class="pl34">
                                <span class="txt-left">电子邮箱：</span><input type="text" class="email-input txt-input" onblur="matchEmailMsg()" id="Email" /><span class="error-box error-box2">
                                    <i class="icon-pic"></i><span>请您填写正确的电子邮箱！</span>
                                </span><span class="tips"> 用来接收订单提醒邮件，便于您及时了解订单状态</span>
                            </p>
                            <p class="pl34">
                                <span class="txt-left">邮政编码：</span><input type="text" class="zip-code txt-input" onblur="matchPostcodeMsg()" id="Postcode" />
                                <span class="error-box error-box2" style="left:274px;">
                                    <i class="icon-pic"></i><span>请您填写正确的邮政编码！</span>
                                </span>
                            </p>
                            <input type="hidden" name="" id="match-value" value="0" />
                        </div>
                        
                        <p class="save-btn-box">
                            <a href="javascript:void(0);" class="save-address-btn" id="save-address-btn01"></a>
                        </p>
                    </div>
                    <!--END新增地址-->
                </div>
            </div>
            <!--END收货人信息-->
            <!--选择支付及配送方式-->
            <div class="payment-infor consignee" id="payment-infor">

                <input type="hidden" id="h_showOrderPage" value="-1">
                <input type="hidden" id="StoreAddressId" name="StoreAddressId" value="0">
                <div class="sectionA">
                    <p class="pb12">
                        <span class="chose-pay-way">
                            选择支付及配送方式
                        </span><a id="payment-fixed-btn" href="javascript:void(0);">[修改]</a><font>
                            如需修改，请先保存收货人信息
                        </font>
                    </p>
                    <p class="pl22 dispatch" id="txt_send_way">
                        快递配送
                    </p>
                    <p class="pl22 dispatch" id="txt_pay_way">
                        在线支付
                    </p>
                </div>
                <!--展开-->
                <div class="sectionB">
                    <p class="pb12">
                        <span class="chose-pay-way">选择支付及配送方式</span><a id="payment-saved-btn" href="javascript:void(0);">[保存支付及配送方式]</a>
                    </p>
                    <!--配送方式-->
                    <p class="title">
                        配送方式
                    </p>
                    <div class="pay-way-lists clearfix">
                        <div style="padding:6px 18px;">
                            <!--class="on"当前背景高亮-->
                            <div class="fl">
                                <span class="sw15">
                                    <label for="">
                                        <input type="radio" class="pay-way-radio" name="delivery_way_radio" id="" value="1" />
                                    </label>
                                </span>快递配送
                            </div>
                            <span class="intor-txt" style="padding-left: 181px;color:#999;">
                                支持圆通、EMS <a href="http://help.360kad.com/Delivery/Freight" target="_blank">[查看服务及配送范围]</a>
                            </span>
                        </div>
                        <div class="delivery-way">
                            <!--快递配送-->
                            <div class="delivery-box clearfix" id="express-delivery" style="padding-top:0px">
                                <span class="delivery-time-txt">送货时间：</span><p>
                                    <i>
                                        <label for="">
                                            <input type="radio" class="pay-way-radio" name="time-radio" id="chkEveryDay" onclick="$('#h_sendTime').val(0);">
                                        </label>
                                    </i><span>不限定时间</span>
                                </p>
                                <p class="delivery-time pl144">
                                    <i>
                                        <label for="">
                                            <input type="radio" class="pay-way-radio" name="time-radio" id="chkFreeDay" onclick="$('#h_sendTime').val(1);">
                                        </label>
                                    </i><span>非工作日（周六、日）</span>
                                </p>
                                <p class="delivery-time pl144">
                                    <i>
                                        <label for="">
                                            <input type="radio" class="pay-way-radio" name="time-radio" id="chkWorkDay" onclick="$('#h_sendTime').val(2);">
                                        </label>
                                    </i><span>工作日（周一到周五）</span>
                                </p>
                            </div>
                            <p class="delivery-time">
                                <span class="delivery-time-txt">运 费：</span><span class="price-num">￥15.00</span><a href="http:///help.360kad.com/Delivery/Freight" target="_blank">[查看运费说明]</a>
                            </p>
                        </div>
                    </div>
                    <!--END快递配送-->

                    <p class="title">
                        支付方式
                    </p>
                    <ul class="pay-way-lists clearfix">
                        <li class="online_pay store_pay">
                            <!--class="on"当前背景高亮-->
                            <div class="fl">
                                <span class="sw15">
                                    <label for="">
                                        <input type="radio" class="pay-way-radio" name="pay-way-radio" id="Radio3" value="1" onclick="changePayWay(1);">
                                    </label>
                                </span>在线支付
                            </div>
                            <div class="fr">
                                <p>
                                    支持支付宝、微信支付、多家主流银行卡、健医卡等多种支付方式；可在提交订单后选择。
                                </p>
                                <p class="pay-icon">
                                   <img src="http://res.360kad.com/theme/default/img/user/2015/pay-way-listIcons.png"  />
                                </p>
                            </div>
                        </li>
                            <li class="online_pay">
                                <div class="fl">
                                    <span class="sw15">
                                        <label for="">
                                            <input type="radio" class="pay-way-radio" name="pay-way-radio" id="Radio4" value="3" onclick="changePayWay(3);">
                                        </label>
                                    </span>货到付款
                                </div>
                                <div class="fr">
                                    送货上门后再收款，支持现金，POS机刷卡 <a href="http://help.360kad.com/Delivery/Freight" target="_blank">
                                        [查看服务及配送范围]
                                    </a>
                                </div>
                            </li>
                            <li class="online_pay">
                                <div class="fl">
                                    <span class="sw15">
                                        <label for="">
                                            <input type="radio" class="pay-way-radio" name="pay-way-radio" id="Radio5" value="2" onclick="changePayWay(2);">
                                        </label>
                                    </span>银行转账
                                </div>
                                <div class="fr">
                                    通过广州银行、中国农业银行转账 转账后1~3个工作日到账 <a href="http://help.360kad.com/Pay/BankTrans" target="_blank">
                                        [查看详情]
                                    </a>
                                </div>
                            </li>
                    </ul>
                    <!--保存支付及配送方式-->
                    <p class="save-btn-box">
                        <a href="javascript:void(0);" class="save-address-btn" id="save-address-btn02"></a>
                        <span class="error-box" style="display: none;"><i class="icon-pic"></i><span>请您保存收货人信息</span> </span>
                    </p>
                    <!--END保存支付及配送方式-->
                </div>
            </div>
            <input type="hidden" id="h_isSavePayType" value="1" />
            <input type="hidden" id="PayType" name="PayType" value=1 />
            <input type="hidden" id="h_sendType" name="h_sendType" value="1" />
            <input type="hidden" id="h_sendTime" name="h_sendTime" value="0" />
            <input type="hidden" id="h_delAddress" name="h_delAddress" value="0" />
            <input type="hidden" id="h_cartType" name="h_cartType" value="0" />

            
            <!--END展开-->
        </div>
        <!--END选择支付及配送方式-->
        <!--商品清单-->
        <div class="pro-list-commodities">
            <p class="title">
                商品清单 <a href="<?php echo url('car/car1'); ?>">[返回修改购物车]</a>
            </p>
            <div class="orderDetails">
                        <div class="pro-list-show">
                            <p class="th">
                                <span class="items1">康爱多</span> <span class="items2">会员价</span> <span class="items3">
                                    数量
                                </span> 
                                <span class="items6">小计</span>
                            </p>
                            <?php if(!empty($arr)): foreach($arr as $val): ?>
                                <div class="kad-pro-intor">

                                    <div class="items1">
                                        <p>
                                            <a href="">
                                                <span class='hg-tips'></span><?php echo $val['goodsname']; ?>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="items2 font-colors">
                                        ￥<?php echo $val['curprice']; ?>
                                    </div>
                                    <div class="items3">
1瓶                                    </div>
                                    
                                    <div class="items6">
                                        ￥<?php echo $val['curprice']; ?>
                                    </div>
                                </div>
                                <?php endforeach; endif; ?>
                            <!--赠品-->
                                    <p class="total-price">
                                    <span>合计：</span><span class="num">￥<?php echo $zong; ?></span>
                                </p>
                        </div>
                            </div>
            <!--订单备注-->
            <div class="order-remarks">
                <p>
                    <label for="">
                        <i><input type="checkbox" class="chbox" name="chk_remark" id="chk_remark" /></i><span class="font-sty">订单备注</span>
                    </label>
                </p>
                <p class="textarea-box">
                    <textarea class="order-remarks-msg" name="txt_remark" onkeydown="$(this).css('color','#000');" id="txt_remark" onclick='if($(this).val()=="限50个字"){$(this).val("");}'>限50个字</textarea>
                </p>
            </div>
            <!--商品发票-->
            <div class="order-remarks">
                <p>
                    <label for="">
                        <i>
                            <input type="checkbox" class="chbox" name="" id="" onclick="if($('#ChkIsInvoice').val()=='0'){$('#ChkIsInvoice').val(1)}else{$('#ChkIsInvoice').val(0)}" />
                        </i><span class="font-sty">商品发票</span>
                    </label>
                    <span class="tips-txt">不需要发票</span>
                </p>
                <div class="textarea-box receipt">
                    <p>
                        发票类型： 普通发票
                    </p>
                    <p>
                        发票抬头：
                        <input type="hidden" id="ChkIsInvoice" name="ChkIsInvoice" value="0" />
                        <input type="text" name="InvoiceTitle" id="InvoiceTitle" />
                    </p>
                </div>
            </div>
            <!--使用优惠券及积分-->
            <div class="order-remarks used-coupons">
                <p>
                    <span class="used-coupons-tips">
                        <label for="">
                            <i>
                                <input type="checkbox" class="chbox" name="" id="chk_coupon" onclick="calcUseCoupon(this);" />
                            </i><span class="font-sty">使用优惠券及积分</span>
                        </label>
                        <span class="tips-txt">可使用优惠券<span class="num" id="can_use_coupon">0</span>张</span>
                    </span>
                </p>
                <!--使用优惠券及积分tab-->
                <div class="tab-box">
                    <p class="tab-th">
                        <span class="on"><i style="display: block;"></i>使用电子优惠券</span><span><i></i>使用实体优惠券</span><span><i></i>使用积分</span>
                        <a href="http://help.360kad.com/Pay/Coupon" target="_blank">[了解康爱多优惠券规则]</a>
                    </p>
                    <div class="tab-content">
                        <!--使用电子优惠券-->
                        <div class="section1 tab-div" style="display: block;">
                            <p style="color: #666;">
                                <span class="items1">电子优惠券账号</span> <span class="items2">优惠金额</span> <span class="items3">
                                    使用限制
                                </span> <span class="items4">到期时间</span>
                            </p>
                            <input type="hidden" name="CouponNumber" id="CouponNumber" />
                            <div class="cp-box" id="user_couponList" style="display: block;">
                                        <span>暂无可用优惠券！</span>
                            </div>
                            <div class="page" id="couponPage">
                                <input type="hidden" id="h_CouponPageParams" value="0" pageindex="1" pagesize="3" />
                                <span class="cp-count">共0个优惠券</span> <span class="page-act">
                                   
                                </span>
                            </div>
                        </div>
                        <!--使用实体优惠券-->
                        <div class="section2 tab-div clearfix">
                            <div class="left">
                                <p>
                                    请输入实体优惠券：
                                </p>
                                <p>
                                    账号：<input type="text" name="a_CouponNumber" id="a_CouponNumber">密码：<input type="password">
                                <p class="right-btn-box">
                                    <a href="javascript:void(0);" onclick="Activation();"></a>
                                </p>
                            </div>
                            <div class="right">
                                <p class="font-sty">
                                    使用规则
                                </p>
                                <p>
                                    • 请在优惠券有效期内使用，以免过期；
                                </p>
                                <p>
                                    <a href="http://help.360kad.com/Pay/Coupon" target="_blank">[了解康爱多优惠券规则]</a>
                                </p>
                            </div>
                        </div>
                        <!--积分兑换优惠券-->
                        <div class="section2 section3 tab-div clearfix">
                            <div class="left">
                                <p>
                                    <samp class="font-sty">
                                        您现在有积分：
                                    </samp><span class="integral-num" id="MyIntegral">505</span> 可用
                                    <input type="text" name="" class="integral" id="ChangNumber" value="500" onkeyup="calcPointAmt()" />
                                    折合人民币￥<span class="integral-num" id="integral_money">2.50</span>元
                                    <input type="hidden" id="h_UseIntegral" value="500">
                                </p>
                                <p class="right-btn-box">
                                    <a href="javascript:void(0);" onclick="useIntegral();"></a>
                                </p>
                            </div>
                            <div class="right">
                                <p class="font-sty">
                                    使用规则
                                </p>
                                <p>
                                    • 积分使用比例：100积分可抵0.5元
                                </p>
                                <p>
                                    <a href="http://help.360kad.com/Novice/IntegralDesc" target="_blank">[了解康爱多积分规则]</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END使用优惠券及积分tab-->
            </div>
            <!--结算信息-->
            <div class="accounts-msg">
                
                <p>
                    您需要为订单共支付<span class="order-total-money" id="TotalMoney">￥<?php echo $zong; ?></span>
                </p>
            </div>
        </div>
        <!--END商品清单-->
        <!--提交订单-->
        <div class="submit-orders">
            <a href="<?php echo url('car/car3'); ?>" id="btnSubmit" >提交订单</a> <a href="javascript:void(0)" id="btnLoading" style="display: none; background: url(http://res4.360kad.com/theme/default/img/user/2015/loading.gif) no-repeat; line-height: 38px; padding-left: 26px; text-indent: 0; text-decoration: none; color: #666;">订单提交中...</a>
            <div class="ctime cartTime" style="float: left; margin-top: 10px; padding-left: 10px;">
                <span class="ctimeInfo" style="float: left; line-height: 18px; font-weight: bold;">
                </span>
                <div class="ctimew">
                    <ul class="ctimeWarn"></ul>
                </div>
            </div>
        </div>
        <!--END提交订单-->
    </div>

    <!--END填写核对订单信息-->
    <input type="hidden" id="h_isHasArea" value="-1" />
    <input type="hidden" id="h_city" value="0" />
    <input type="hidden" id="h_GoodsTotal" name="h_GoodsTotal" value="22.800" />
    <input type="hidden" id="h_FreightTotal" name="h_FreightTotal" value="15.0" />
    <input type="hidden" id="h_CouponMoney" value="0" />
    <input type="hidden" id="h_TotalMoney" name="h_TotalMoney" value="37.800" />
    <input type="hidden" id="h_paySendStat" value="0" />
    <input type="hidden" id="h_editAddressStat" value="0" />
    <input type="hidden" id="h_IsDefault" value="1" />
    <input type="hidden" id="h_editBankStat" value="0" />
    <input type="hidden" id="h_PointsAmt" name="h_PointsAmt" value="" />
    <input type="hidden" id="h_NeedShowPayment" name="h_NeedShowPayment" value="1" />
    <input type="hidden" id="h_EbaolifeTips" /><!--医卡通不能销售商品提示-->
    <input type="hidden" id="h_isModifyAddressTips" value="0" /><!--是否新增或修改地址的提示-->
</form>

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

    <link href="http://res1.360kad.com/theme/default/css/pop/pop.css" rel="stylesheet" type="text/css"/>
    <script src="http://res.360kad.com/script/pop/poplayer.js" type="text/javascript"></script>
    <!--部件开始:pc_pop_show,分组:通用部件-->
<!--删除弹窗-->
   
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

    
    
    <script src="http://res2.360kad.com/script/confirmOrder.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/order_js_new.js" type="text/javascript"></script>
    <script type="text/javascript">
        /// <reference path="D:\svn\360kad\研发中心\Kad2.0\前端\9_Res\script\jquery.1.7.1.min.js" />

        $(function () {
            //默认选中的优惠券
            if ('' != null && '' != '') {
                showOrderRemarks($('#chk_coupon'));//展开使用优惠券
                changeCouponPage(0, 0, '');
            }
            $('#payment-fixed-btn').click(function () {
                $('#h_NeedShowPayment').val(1);
            });
            /*
            为了在添加或修改收货地址成功后在提示框中点击右上边x按钮也能
            显示选择支付及配送方式框以及不要提示“请保存您的收货地址信息”
            **/
            $("#kad-delte-closeBtn").die().live("click", function () {
                var isModifyAddressTips = parseInt($('#h_isModifyAddressTips').val());
                if (isModifyAddressTips == 1) {
                    $("#payment-fixed-btn").click();
                }
                $('#h_isModifyAddressTips').val(0);
            });
            if ('0' == '1') {
                getSpecialOfferCacheTime();
            }
            //配送方式切换
            $('.pay-way-radio[name="delivery_way_radio"]').click(function () {
                $('.pay-way-lists .delivery-way').hide();
                $(this).parents('.pay-way-lists').children('.delivery-way').show();
                //配送方式
                $('#h_sendType').val($(this).val());
                EditFreight();
                //默认支付方式
                $('.online_pay .pay-way-radio[value="1"]')[0].click();
                $('.store_pay').hide();
                $('.online_pay').show();

            });
            //门店数据
            ShowStoreSelect();
        });
    </script>
    <script src="http://res2.360kad.com/script/limitTime.js" type="text/javascript"></script>

</body>
</html>