<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\wamp64\www\tp5\public/../application/index\view\car\car3.html";i:1521774181;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>在线支付</title>
    <script src="http://res1.360kad.com/script/jquery.1.7.1.min.js" type="text/javascript"></script>
    <script language="javascript" type="text/javascript" async="async" src="http://ctr.360kad.com/ctrjs/ctr_v2.js"></script>
    <script src="http://res4.360kad.com/script/envconfig.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/url.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/form-btn.js" type="text/javascript"></script>
    <script src="http://res1.360kad.com/script/rx_base.js" type="text/javascript"></script>
    <link href="http://res3.360kad.com/theme/default/css/user/2015/base.css" rel="stylesheet" type="text/css"/>
    <link href="http://res3.360kad.com/theme/default/css/user/2015/orderProcess.css" rel="stylesheet" type="text/css"/>
    
    <style type="text/css">
        .order_id:hover { color: #F79669; }
    </style>

    
    <script type="text/javascript">
        /// <reference path="http://devres.360kad.com/script/pop/poplayer.js" />
        (function () {
            //四舍六入五取偶(银行家算法）
            Number.prototype.round = function (len) {
                var old = this;
                var a1 = Math.pow(10, len) * old;
                a1 = Math.round(a1);
                var oldstr = old.toString()
                var start = oldstr.indexOf(".");
                if (start > 0 && oldstr.split(".")[1].length == len + 1) {
                    if (oldstr.substr(start + len + 1, 1) == 5) {
                        var flagval = oldstr.substr(start + len, 1) - 0;
                        if (flagval % 2 == 0) {
                            a1 = a1 - 1;
                        }
                    }
                }
                var b1 = a1 / Math.pow(10, len);
                return b1;
            }
            //八舍九入
            Number.prototype.round89 = function () {
                var thatNum = this;
                if (thatNum.toString().length > 2) {
                    var endNum = thatNum * 1000 % 10;
                    if (endNum < 9) {
                        return parseInt(thatNum * 100) / 100;
                    }
                    else {
                        return (parseInt(thatNum * 100) + 1) / 100;
                    }
                }
                return thatNum;
            }
            //解决js浮点数计算bug
            Number.prototype.mul = function (otherNum) {
                var a = this,
                    b = otherNum,
                    c = 0,
                    d = a.toString(),
                    e = b.toString();
                try {
                    c += d.split(".")[1].length;
                } catch (f) { }
                try {
                    c += e.split(".")[1].length;
                } catch (f) { }
                return Number(d.replace(".", "")) * Number(e.replace(".", "")) / Math.pow(10, c);
            }
            Number.prototype.div = function (otherNum) {
                var a = this, b = otherNum;
                var c, d, e = 0, f = 0;
                try {
                    e = a.toString().split(".")[1].length;
                } catch (g) { }
                try {
                    f = b.toString().split(".")[1].length;
                } catch (g) { }
                return c = Number(a.toString().replace(".", "")), d = Number(b.toString().replace(".", "")), (c / d).mul(Math.pow(10, f - e));
            }
        })();
        var canGotoPay = true;
        $(function () {
            //订单不能支付时
            if ('' != '') {
                alertPop('', function () {
                    window.history.back();
                }, 1);
            }
            $('.price-txt').text('￥37.80');

            //支付反馈点击
            $('.your-trouble input').click(function () {
                $('#selReason').val($(this).val());
            });

            //特卖
            $(".ctimew").hover(function () {
                $(this).children(".ctimeWarn").show();
            }, function () {
                $(this).children(".ctimeWarn").hide();
            });
            var isSpecialOffer = '1';
            if (isSpecialOffer === '1') {
                getSpecialOfferPayCacheTime();
            } else {
                clearInterval(sotimer);
                $(".ctimeInfo").html("");
                $(".ctimew").css("display", "none");
            }

            //多次支付
            multiPay();
            $("#multiPay").toggle(function () {
                $(this).html("【取消多次支付】");
                $("#multiPayHtml").show();
                canGotoPay = false;
                initMultiPay($('#txtMultiPrice'));
            }, function () {
                $(this).html("【使用多次支付】");
                $("#multiPayHtml").hide();
                $('#payErrmsg').html('');
                canGotoPay = true;
                $('#txtMultiPrice').html('');
            });

            //花呗
            var $huabeiFqContain = $('.pay-way-main.huabei .bank-show');
            if ($huabeiFqContain && $huabeiFqContain.length == 1) {
                var orderAmt = Number('37.80');
                var hbFqNumArr = [3,6,12];
                var hbFqBuyerFeeRateArr = [0.023,0.045,0.075];
                if (hbFqNumArr.length > 0) {
                    var hbFqHtml = '';
                    for (var i = 0; i < hbFqNumArr.length; i++) {
                        var fqDesc = hbFqNumArr[i] + '期';
                        var totalFqFee = orderAmt.mul(hbFqBuyerFeeRateArr[i]);//总金额四舍六入五取偶
                        var fqFee = totalFqFee == 0 ? 0 : totalFqFee.div(hbFqNumArr[i]);//手续费展示八舍九入
                        var fqFeeDesc = '￥' + (parseInt((orderAmt.div(hbFqNumArr[i])).mul(100)) / 100 + parseInt(fqFee.mul(100)).div(100)).toFixed(2) + '/期';//每期金额取整
                        if (hbFqNumArr[i] === 0) {
                            fqDesc = '不分期';
                            fqFeeDesc = '0服务费';
                        }
                        hbFqHtml += '<a href="javascript:;;" class="huabei-stages" onclick="changeHbFq(this,' + hbFqNumArr[i] + ',' + fqFee + ',' + (hbFqBuyerFeeRateArr[i] * 100) + ',' + (orderAmt + totalFqFee) + ');">' +
                                    '<span>' + fqDesc + '</span>' +
                                    '<span>' + fqFeeDesc + '</span>' +
                                    '<i></i>' +
                                    '</a>';
                    }
                    $huabeiFqContain.empty().html(hbFqHtml);
                    $huabeiFqContain.find('.huabei-stages:first').click();
                }
            }
        });

        function changeHbFq(that, fqNum, fqFee, fqFeeRate, totalFqFee) {
            $(that).addClass('active').siblings('.huabei-stages').removeClass('active');
            var desc = '已选择' + fqNum + '期，分期总额<i>￥' + totalFqFee.round(2).toFixed(2) + '</i>，含手续费<i>￥' + fqFee.round89().toFixed(2) + '</i>/期，费率' + fqFeeRate + '%';
            if (fqNum === 0) {
                desc = '已选择不分期，无手续费';
            }
            $('.pay-way-main.huabei .huabei-txt').empty().html(desc);
            $('.pay-way-main.huabei .huabei-pay a').unbind('click').bind('click', function () {
                GotoPay(this, fqNum);
            });
        }

        function GotoPay(obj, hbFqNum) {
            if (!IsLogin()) {
                $(obj).removeAttr('target');
                alertPop("检测到您刚刚在其他终端登录过，需要重新登录！", function () {
                    window.location = "http://user.360kad.com/Login/Index";
                });
            }
            else {
                //是否支持医保支付，暂时注释  搜狗浏览器会拦截
                //var tc = $(obj).attr('tc');
                //if (tc && tc == '1') {
                //    var canEBaoLife = CanEBaoLife();
                //    if (canEBaoLife != "1") {
                //        alertPop(canEBaoLife);
                //        return false;
                //    }
                //}
                if (!canGotoPay) {
                    alertPop("您的订单金额不满足使用多次支付的规则，请取消！");
                    return false;
                }
                if ($(obj).attr("ebao") == "1" && "False" == "True") {
                    return alertPop("该支付方式不支持开具发票，请重新下单或选择其它支付方式！");
                }

                var typeId = $(obj).attr('typeid');
                $('#h_payTypeId').val(typeId);
                var multiType = "0";
                if ($('#multiPayHtml').css('display') != 'none')
                    multiType = "1"
                var payurl = '/Pay/GotoPay?OrderId=1641750600&TypeId=' + typeId + '&multiPrice=' + encodeURIComponent($('#txtMultiPrice').val()) + '&multiType=' + multiType;
                if (hbFqNum) {
                    payurl += '&hbFqNum=' + hbFqNum
                }
                $(obj).attr('href', payurl).attr("target", "_blank");
                popShow('paying-out-box', 'paying-close-btn', 1);
            }
        }

        function CanEBaoLife() {
            var canEBaoLife = "1";
            $.ajax({
                url: "/Pay/IsCanEBaoLife?orderId=1641750600",
                type: 'get',
                cache: false,
                async: false,
                success: function (data) {
                    if (data != "1") {
                        canEBaoLife = "抱歉，您选购的商品：" + data + " 暂不支持健保通（医卡通）支付，请选择其他支付方式！";
                    }
                }
            });
            return canEBaoLife;
        }
        function PayResult() {
            var remarkCode = $("#selReason").val();
            if (remarkCode == '0') {
                alertPop("请选择支付失败原因!", function () {
                    popShow('paying-out-box', 'paying-close-btn', 1);
                });
                return;
            }
            var typeId = $('#h_payTypeId').val();
            var orderId = '1641750600';
            $.ajax({
                url: '/Pay/AddPayFailInfo',
                type: 'get',
                data: 'payTypeCode=' + typeId + '&orderCode=' + orderId + '&remarkCode=' + remarkCode,
                cache: false,
                success: function (data) {
                    if (data.Result) {
                        alertPop("提交成功!", null, 2);
                    }
                    else {
                        alertPop(data.Msg);
                    }
                }
            });
        }
        function ShowDetail() {
            var orderIdArr = '1641750600'.split(',');
            for (var i = 0; i < orderIdArr.length; i++) {
                var obj = 'http://user.360kad.com/Order/Detail?orderId=' + orderIdArr[i];
                window.open(obj);
            }
        }

        //特卖
        function getSpecialOfferPayCacheTime() {
            clearInterval(sotimer);
            $(".ctimeInfo").html("");
            $(".ctimew").css("display", "none");
            maxsotime = parseInt('7198');
            sotimer = setInterval("CountDown()", 1000);
        }
        var maxsotime = 0
        function CountDown() {
            if (maxsotime >= 0) {
                minutes = Math.floor(maxsotime / 60);
                seconds = Math.floor(maxsotime % 60);
                $(".ctimeInfo").html("请在<b>" + minutes + "</b>分<b>" + seconds + "</b>秒内完成支付。超时订单会自动废除！");
                --maxsotime;
            }
            else {
                clearInterval(sotimer);
                $(".ctimeInfo").html("超时了～～请重新下单并支付！");
            }
            $(".ctimew").css("display", "inline-block");
        }
        sotimer = "";

        //非负浮点数(正浮点数 + 0)
        function isFloat(str) {
            var pos = new RegExp(/^\d+(\.\d+)?$/);
            return pos.test(str);
        }
        //多次支付
        function initMultiPay(obj) {
            var total = parseFloat($('#surplus').attr('total'));
            var minPrice = parseFloat($('#minPrice').val());//多次支付交易需支付的最小单笔金额
            var objMsg = $('#payErrmsg');
            canGotoPay = true;
            if (obj.val() == '') {
                objMsg.html('请输入支付金额！');
                return;
            }
            var val = parseFloat(obj.val());
            $('#surplus').html(total);
            if (val < 0) {
                objMsg.html('订单支付金额必须大于 ' + minPrice + ' 元');
                canGotoPay = false;
                return;
            }
            if (!isFloat(obj.val())) {
                objMsg.html('您输入的金额格式不正确');
                canGotoPay = false;
                return;
            }

            if (val > total) {
                obj.val(total);
            }
            else {
                $('#surplus').html((total - val).toFixed(2));
            }
            if (val < minPrice) {
                objMsg.html('订单支付金额必须大于 ' + minPrice + ' 元');
                canGotoPay = false;
                return;
            }
            canGotoPay = true;
        }
        function multiPay() {
            var obj = $('#txtMultiPrice');
            obj.click(function () {
                $('#payErrmsg').html('');
            });
            obj.blur(function () {
                initMultiPay(obj);
            });
        }
    </script>
    <script type="text/javascript"> 
var _gaq = _gaq || []; 
 _gaq.push(['_setAccount', 'UA-3051632-5']); 
 _gaq.push(['_setDomainName', '.360kad.com']); 
 _gaq.push(['_setAllowHash', false]);
_gaq.push(['_trackPageview']);
_gaq.push(['_addTrans',
'1641750600',
'康爱多网上药店',
 '37.80',
'0',
'15.00',
'北京市',
'北京',
'china'
  ]);
_gaq.push(['_addItem',
'1641750600',
'999631',
'念慈菴 京都念慈菴蜜炼川贝枇杷膏 150ml/瓶',
'呼吸系统',
'22.80',
'1.0'
]);
_gaq.push(['_trackTrans']);
(function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();
</script>


</head>
<body>
    <!--部件开始:NewLoginRegTop,分组:页头部件-->
  <!--头部-->
<div class="header_top">
    <div class="header_t">
        <div class="header_t_l">
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
            <ul class="YnewYesLogin">
                <li>欢迎回来！</li>
                <li class="YUserName"></li>
                <li class="YIntegral"></li>
                <li class="YCoupon"></li>
                <li class="Yout"></li>
            </ul>
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
                <li class="tcart"><a href="<?php echo url('car/car1'); ?>">购物车</a></li>
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
    <!--头部部分-->
    <div class="subsuccess_h clearfix">
        <div class="head_l">
            <a href="http://www.360kad.com">
                <img src="http://res.360kad.com/theme/default/img/user/2015/kad_03.jpg"  />
            </a>
            <p>
                <img src="http://res.360kad.com/theme/default/img/user/2015/autoSlogo.gif"  />
            </p>
        </div>
        <div class="head_r">
            <img src="http://res.360kad.com/theme/default/img/user/2015/shop_p4.png"  />
        </div>
    </div>
    <!--头部部分end-->
    <div class="ctime cartTime">
        <span class="ctimeInfo" style="float: left; line-height: 18px; font-weight: bold;">
        </span>
        <input type="hidden" id="ctimeType" value="pay" />
        <div class="ctimew">
            <img src="http://res.360kad.com/theme/default/img/ctimeChm.png" alt="倒计时说明"  />
            <ul class="ctimeWarn">
                <li>▪ 由于库存有限，我们只能暂时为您保留订单120分钟。</li>
                <li>▪ 超时未支付订单将会自动废除，您需要重新下单。</li>
            </ul>
        </div>
    </div>
    <!--订单提交成功部分-->
    <div class="order_c">
        <p class="order_p1 family_yh">
            感谢您！订单提交成功！ 订单ID：
                <span class="order_id" onclick="ShowDetail(1641750600)" style="cursor: pointer;">1641750600</span>
        </p>
            <p class="order_p2">
                应付金额：<span class="order_pri">￥37.80</span>
            </p>
            <p id="multiPayHtml" style="display:none;">
                <span style="width:275px;">
                    <b>本次支付金额：</b>
                    <input id="txtMultiPrice" type="text" class="multiPayInput" maxlength="5" />,<b class="price" style="color: Black">剩余需支付￥<span id="surplus" total="37.80">37.80</span></b>
                    <input id="minPrice" type="hidden" value="9999999" />
                    <input id="fullPrice" type="hidden" value="99999999" />
                </span>
            </p>
            <p id="payErrmsg" class="payErrmsg">
            </p>
            <p class="order_p2">
                请您在提交订单后的<span class="time">24小时</span>内付款，否则订单会自动取消。
            </p>
            <div class="web_ewm" style="top: 19px;">
                <img src="http://res4.360kad.com/theme/default/img/user/2015/sm_pay01.png" style="margin-bottom: 5px;" />
                <img src="/Pay/WeiXinPayQRCode?dataToEncode=http%3A%2F%2Fm.360kad.com%2FOrder%2FQRPay%3ForderId%3D1641750600&amp;size=2" />
            </div>
    </div>
    <!--去支付方式-->

<!--去支付方式-->
<div class="banks-container">
    <div class="used-bank-way">
        <p class="used-bank-top">

            <span class="self-pay-price"><span class="price-txt">￥0</span></span><span class="fr">应付金额：</span>
        </p>
        <span class="click-open-btn"></span>
    </div>
    <p class="go-pay">
        <a href="javascript:void(0)" onclick="" typeid="-1">
            <img src="http://res.360kad.com/theme/default/img/user/2015/goPay-pic_03.png"  />
        </a>
    </p>
    <!--展开-->
    <div class="used-bank-way used-bank-open">
        <div class="section1">
            <p class="top">
                <span class="font-sty">请在下方选择支付方式</span><span class="self-pay-price"><span class="price-txt">￥0</span></span><span class="fr">应付金额：</span>
            </p>
            <div class="bottom">
                <p>
                    推荐使用:
                </p>
                <p class="groom-bank">
                            <a href="javascript:void(0)" onclick="GotoPay(this)" typeid="alipay" tc="0">
                                <img src="http://image.360kad.com/group1/M00/0E/FD/CgAgEFZunaGAQpeuAAASbsyFzZQ353.png" alt="支付宝" width="130" height="30" />
                            </a>
                            <a href="javascript:void(0)" onclick="GotoPay(this)" typeid="weixin" tc="0">
                                <img src="http://image.360kad.com/group1/M00/04/B8/CgAgEVVla6GAQc43AAAGpV3mxWE848.png" alt="微信支付" width="130" height="30" />
                            </a>

                </p>
            </div>
        </div>
        <!--othes支付方式-->
        <div class="others-payList-box">
            <p class="pay-way-th clearfix">
                        <span class=on><i></i>银行卡支付<i class="line"></i></span>
                        <span ><i></i>平台支付<i class="line"></i></span>
                        <span ><i></i>医保（健康）卡<i class="line"></i></span>
                        <span ><i></i>花呗分期<i class="line"></i></span>


            </p>
            <div class="pay-way-wrap">

                <!--银行支付-->
                        <div class="pay-way-main" style=display:block>
                            <p class="intor-txt pb10">
                                温馨提醒：部分网银可能要求IE6.0版本才能使用，请酌情选择；或者更换浏览器后再登录支付。
                            </p>
                            <p class="bank-show">
                            <a href="javascript:void(0)" onclick="GotoPay(this)" typeid="PayecoPC">
                                <img src="http://image.360kad.com/group1/M00/9A/06/CgAgEVjs_laATse_AAALx0wEVeE809.jpg" alt="易联PC" width="130" height="30" />
                            </a>

                            </p>

                        </div>


                        <!--平台支付-->
                        <div class="pay-way-main" >
                            <p class="bank-show">
                            <a href="javascript:void(0)" onclick="GotoPay(this)" typeid="alipay">
                                <img src="http://image.360kad.com/group1/M00/0E/FD/CgAgEFZunaGAQpeuAAASbsyFzZQ353.png" alt="支付宝" width="130" height="30" />
                            </a>
                            <a href="javascript:void(0)" onclick="GotoPay(this)" typeid="weixin">
                                <img src="http://image.360kad.com/group1/M00/04/B8/CgAgEVVla6GAQc43AAAGpV3mxWE848.png" alt="微信支付" width="130" height="30" />
                            </a>

                            </p>
                        </div>


                        <!--医保支付-->
                        <div class="pay-way-main" >
                            <p class="intor-txt pt10">
                                友情提示：凡用“医保（健康）卡”支付方式购买商品，都不开具发票，谢谢！
                            </p>
                            
                            <p class="bank-show">
                            <a ebao="1" href="javascript:void(0)" onclick="GotoPay(this)" typeid="ebaolife" tc="1">
                                <img src="http://image.360kad.com/group1/M00/67/45/CgAgEFgGSeSARHXaAAA1RyWbdqg354.png" alt="亿保支付" width="130" height="30" />
                            </a>
                            <a ebao="1" href="javascript:void(0)" onclick="GotoPay(this)" typeid="JianYi" tc="0">
                                <img src="http://image.360kad.com/group1/M00/09/FD/CgAgEFXC_kOAMTizAAAS4KSCfY4448.png" alt="健医支付" width="130" height="30" />
                            </a>
                            <a ebao="1" href="javascript:void(0)" onclick="GotoPay(this)" typeid="UnionCard" tc="0">
                                <img src="http://image.360kad.com/group1/M00/09/6D/CgAgEFWps_2AS5qxAAAcLI3pr4w681.png" alt="钥匙卡" width="130" height="30" />
                            </a>
                            <a ebao="1" href="javascript:void(0)" onclick="GotoPay(this)" typeid="pukang" tc="0">
                                <img src="http://image.360kad.com/group1/M00/9E/44/CgAgEFj_WWKAQUnzAAAfnXVgHnU822.png" alt="普康宝" width="130" height="30" />
                            </a>
                            <a ebao="1" href="javascript:void(0)" onclick="GotoPay(this)" typeid="haohe" tc="0">
                                <img src="http://image.360kad.com/group1/M00/A2/6C/CgAgEFkRa4qAPV-NAAAe6flYUiI657.png" alt="优福" width="130" height="30" />
                            </a>

                            </p>
                        </div>




                        <div class="pay-way-main huabei" >
                            <p class="bank-show">
                                
                            </p>
                            <p class="intor-txt huabei-txt pt10">
                                
                                
                            </p>
                            <p class="huabei-pay">
                                <a href="javascript:void(0);" onclick="GotoPay(this)" typeid="alipay_hb">立即支付</a>
                            </p>
                        </div>

            </div>
        </div>
        <!--ENDothes支付方式-->
    </div>
</div>
<!--END去支付方式-->
<script type="text/javascript">
    $(function () {
        var typeId = parseInt('0');//上一次的支付类型编码
        if (typeId == 0) {
            var $clickOpenBtn = $(".click-open-btn");
            var $usedBankOpen = $(".used-bank-open");
            $clickOpenBtn.parent(".used-bank-way").hide();
            $clickOpenBtn.parent(".used-bank-way").next(".go-pay").hide();
            $usedBankOpen.show();
        }
    });
</script>
    <!--END去支付方式-->
        <input type="hidden" id="h_payTypeId" value="" />
    <!--支付中-->
        <div class="paying-out-box" id="paying-out-box">
            <div class="paying-inner-box">
                <div class="opacity-bg">
                </div>
                <div class="content">
                    <h3>
                        <span class="fl">支付中</span><span class="paying-close-btn" id="paying-close-btn"></span>
                    </h3>
                    <div class="intor-section">
                        <p class="title">
                            请您在新打开的支付平台或网银页面进行支付，支付完成前请不要关闭该窗口。
                        </p>
                        <p class="btn-list">
                            <a href="http://user.360kad.com/Order/Detail?orderId=1641750600" onclick=" popclose('paying-out-box',1);" =popClose('paying-out-box',1);" target="_blank">
                                <img src="http://res.360kad.com/theme/default/img/user/2015/finshed-pay.png"  />
                            </a> <a href="http://pay.360kad.com/Pay?OrderId=1641750600">
                                <img src="http://res.360kad.com/theme/default/img/user/2015/other-pay01.png"  />
                            </a> <a href="http://help.360kad.com/SaleAfter/ContactSer" target="_blank">
                                <img src="http://res.360kad.com/theme/default/img/user/2015/zxkf01.png"  />
                            </a> <a href="http://help.360kad.com/Pay/OnlinePay" target="_blank">查看支付问题帮助</a>
                        </p>
                        <p style="color: #000;">
                            您遇到了哪种支付问题？
                        </p>
                        <!--支付问题-->
                        <div class="your-trouble">
                            <form action="">
                                <label for="">
                                </label>
                                <ul>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="1" />
                                                </i>
                                            </label><span class="reasonTxt">页面跳转失败</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="2" />
                                                </i>
                                            </label><span class="reasonTxt">网速慢导致支付失败</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="3" />
                                                </i>
                                            </label><span class="reasonTxt">重新修改订单内容，放弃本次支付</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="4" />
                                                </i>
                                            </label><span class="reasonTxt">重新修改支付方式，放弃本次支付</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="5" />
                                                </i>
                                            </label><span class="reasonTxt">不想买了，我要取消订单</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="6" />
                                                </i>
                                            </label><span class="reasonTxt">订单重复，仅支付一个订单</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="7" />
                                                </i>
                                            </label><span class="reasonTxt">价格不符，核对订单信息</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="8" />
                                                </i>
                                            </label><span class="reasonTxt">银行帐户金额不足</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="9" />
                                                </i>
                                            </label><span class="reasonTxt">银行账户金额不足</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="10" />
                                                </i>
                                            </label><span class="reasonTxt">电脑限制不能支付</span>
                                        </li>
                                        <li>
                                            <label>
                                                <i>
                                                    <input type="radio" name="fk-radio" id="" value="11" />
                                                </i>
                                            </label><span class="reasonTxt">个人网银问题</span>
                                        </li>
                                </ul>
                                <input type="hidden" id="selReason" value="0" />
                                <a href="javascript:;" class="submit-fk" onclick="popClose('paying-out-box',1);PayResult();">
                                </a>
                            </form>
                        </div>
                        <!--END支付问题-->
                        <p class="check-out-order">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <!--END支付中-->
            <!--订单提交成功部分end-->
</div>
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
    <script src="http://res3.360kad.com/script/pop/poplayer.js" type="text/javascript"></script>
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
