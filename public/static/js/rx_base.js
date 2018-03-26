/// <reference path="D:\svn\360kad\研发中心\Kad2.0\前端\9_Res\script\jquery.1.7.1.min.js" />
/// <reference path="D:\svn\360kad\研发中心\Kad2.0\前端\9_Res\script\form-btn.js" />
/// <reference path="D:\svn\360kad\研发中心\Kad2.0\前端\9_Res\script\url.js" />
/// <reference path="D:\svn\360kad\研发中心\Kad2.0\前端\9_Res\script\pop\poplayer.js" />
var userDomain = urlConfig.user;
var cartDomain = urlConfig.cart;
(function () {
    $(function () {
        //radio模拟
        $('.address-lists input,.add-new-address input,.pay-way-lists .fl input,.delivery-box input,.order-remarks .chbox,.tab-div label input').bindCheckboxSwitch();
        //收货人信息修改
        var $fixedBtn = $(".consignee .fixed-btn");
        var $savedBtn = $(".consignee .saved-btn");
        var $consignee = $("#consignee");
        var $paymentInfor = $("#payment-infor");
        var $paymentFixedBtn = $("#payment-fixed-btn");
        var $saveAddressBtn01 = $("#save-address-btn01");
        var $saveAddressBtn02 = $("#save-address-btn02");
        var matchFlag = false;

        //修改
        $fixedBtn.bind("click", function () {
            $consignee.addClass('consignee-error');
            $(this).parent().parent(".sectionA").hide()
						.next(".sectionB").show();
            $paymentFixedBtn.hide().next("font").show();
            //业务逻辑
            getAddressList();
        });

        //保存
        $savedBtn.bind("click", function () {
            //            $consignee.removeClass('consignee-error');
            //            $(this).parent().parent(".sectionB").hide()
            //						.prev(".sectionA").show();
            //            $paymentFixedBtn.show().next("font").hide();
            $saveAddressBtn01.click();
        });

        function hideAddNewAddress() {
            $consignee.removeClass('consignee-error');
            $savedBtn.parent().parent(".sectionB").hide()
            						.prev(".sectionA").show();
            $paymentFixedBtn.show().next("font").hide();
        }

        $saveAddressBtn01.bind('click', function (event) {
            if (($('#new-address-btn').parent().hasClass('on') && validateFn() == false) || ($('#h_isModify').val() == '1' && validateFn() == false)) {
                return false;
            }
            else {
                hideAddNewAddress();
                setLastPay($('#PayType').val());
                if ($('#h_isCreate').val() == '1' || $('#h_isModify').val() == '1') {
                    createAddress();
                } else {
                    $('#h_NeedShowPayment').val(1);
                    $paymentFixedBtn.click();
                }
            }
        });

        function setDefaultPayWay() {
            if (!$('.pay-way-lists li').hasClass('on')) {
                var $default_pay_way_radio = $('.pay-way-lists .pay-way-radio[value="0"]');
                $default_pay_way_radio.click();
                $default_pay_way_radio.parent().addClass('on');
                $('#chkEveryDay').click();
                $('#chkEveryDay').parent().addClass('on');
            }
        }



        //验证新增地址信息
        function validateFn() {
            passValidate = true;
            matchOtherMsg();
            if (passValidate) {
                return true;
            } else {
                return false;
            }
        }

        //新增地址
        var $newAddressBtn = $("#new-address-btn");
        var $addNewAddress = $(".add-new-address");
        $newAddressBtn.bind("click", function () {
            $(this).parent().parent().parent().siblings('.virtualForm').show();
            $addNewAddress.find(".title").css("backgroundColor", "#f0f9ff");
            //业务逻辑
            $("#user-name").val('');
            $("#Email").val('');
            $("#Postcode").val('');
            $("#Telephone").val('');
            $("#txtMobilePhone").val('');
            $("#detailed-address").val('');
            $('#selectedAddressId').val(0);
        });

        var $radio = $consignee.find(':radio');
        $radio.not("#new-address-btn").bind('click', function (event) {
            $addNewAddress.find(".title").css("backgroundColor", "");
            $addNewAddress.find('.virtualForm').hide();
            $(".error-box").hide();
        });

        //使用优惠券及积分
        var $span = $(".used-coupons .tab-th span");
        var $div = $(".tab-content .tab-div");
        $span.each(function (i) {
            $(this).click(function () {
                $(this).addClass('on').siblings().removeClass('on');
                $div.hide();
                $div.eq(i).show();
                $span.find('i').hide();
                $(this).children('i').show();
            });
        });

        //选择支付及配送方式
        //修改
        var $paymentFixedBtn = $("#payment-fixed-btn");
        $paymentFixedBtn.bind('click', function (event) {
            var sendType = $('#h_sendType').val();
            var payType = $('#PayType').val();
            var $sendType = $('.pay-way-radio[name="delivery_way_radio"][value="' + sendType + '"]')[0];
            if ($sendType) {
                $sendType.click();
            }
            $(this).parent().parent(".sectionA").hide();
            $(this).parent().parent(".sectionA").next(".sectionB").show();
            $consignee.find('font').show();
            $consignee.find(".fixed-btn").hide();
            $paymentInfor.addClass('consignee-error');
            //setDefaultPayWay();
            setLastPay(payType);

            var $needShowPayment = $('#h_NeedShowPayment');
            if ($($needShowPayment).val() == '1') {
                $('#h_NeedShowPayment').val(0);
                if ($('#h_OrderId').length > 0/*再次下单*/) {
                    showLoadingPro();
                    var OrderId = $('#h_OrderId').val();
                    GetOrderMsg(OrderId);
                }
                else {/*正常下单*/
                    loadOrderDetails();
                }
            }
        });
        //保存支付
        var $paymentSavedbtn = $("#payment-saved-btn");
        $paymentSavedbtn.bind('click', function (event) {
            var sendType = $('#h_sendType').val();
            //门店自提
            if (sendType == "2") {
                var selectStores = $('.store_address_list').find('.on');
                if (selectStores.length == 0) {
                    alertPop("请先选择自提点");
                    return;
                }
            }
            $(this).parent().parent(".sectionB").hide();
            $(this).parent().parent(".sectionB").prev(".sectionA").show();
            $consignee.find('font').hide();
            $consignee.find(".fixed-btn").show();
            $paymentInfor.removeClass('consignee-error');
            if ($('#repBuyOrder_ProIds').length > 0) {
                //GetFreightAndConcession();
                $('#h_NeedShowPayment').val(0);
                showLoadingPro();
                var OrderId = $('#h_OrderId').val();
                GetOrderMsg(OrderId);
            }
            else {
                EditFreight();
            }
        });

        $saveAddressBtn02.click(function () {
            $paymentSavedbtn.click();
        });

        //订单备注、商品发票、使用优惠券及积分操作checkbox
        var $chbox = $(".order-remarks .chbox");
        $chbox.click(function () {
            if ($(this).parent().hasClass('on')) {
                $(this).closest('p').next().show();
                $(this).parent().next(".font-sty").addClass('font-color');
                $(this).parent().parent().next(".tips-txt").hide();
                //加载优惠券
                if ($(this).parent().parent().parent().parent().parent().hasClass('used-coupons')) {
                    //getAjaxPage(1, '/Coupon/GetMyCouponList', 'user_couponList');
                    //GetChangNumber();
                    $('#CouponNumber').val('');
                }
            } else {
                $(this).closest('p').next().hide();
                $(this).parent().next(".font-sty").removeClass('font-color');
                $(this).parent().parent().next(".tips-txt").show();
            }

        });

        //支付方式下radio操作
        var $payWayRadio = $(".pay-way-lists .pay-way-radio");
        var $payWayLists = $(".pay-way-lists");
        $payWayRadio.each(function (i) {
            $(this).click(function (event) {
                //if (i == 3) { $("#buyself").show(); $("#express-delivery").hide(); } else { $("#buyself").hide(); $("#express-delivery").show() }
                $payWayLists.find('.pay-icon').show();
                $(this).closest('li').addClass('on').siblings('li').removeClass('on');
                $(this).closest('li').find('.pay-icon').show();
            });
        });


        //checkbox模拟
        $('.full-chose-box input,.cart-body li input,.settle-0accounts input').bindCheckboxSwitch();

        alsoBuy();

        //更多推荐交互
        $(".act_list ul li").hover(function () {
            $(this).addClass("hover").siblings().removeClass("hover");
        }, function () {
            $(".act_list ul li").removeClass("hover");
        });
        //更多推荐交互
        $(".act_list ul li").hover(function () {
            $(this).addClass("hover").siblings().removeClass("hover");
        }, function () {
            $(".act_list ul li").removeClass("hover");
        });
        //radio模拟
        $('.rx-kad-table .rx-checkbox,#added-rx-btn,.chose-sex input').bindCheckboxSwitch();
        //新增处方
        var $rxBtnLeft = $(".rx-btn-left");
        var $fillRxForm = $(".new-user-rx");
        var $rxCloseBtn = $(".rx-close-btn");
        var $addNextRx = $('.add-next-rx');
        var $rxSaveBtn = $(".fill-rx-form .save-btn");
        var $cancelBtn = $(".fill-rx-form .cancel-btn");

        $rxBtnLeft.click(function (event) {
            $addNextRx.hide();
            //$fillRxForm.show();
        });
        //关闭
        $rxCloseBtn.click(function (event) {
            $addNextRx.show();
            $fillRxForm.hide();
        });
        //保存
        //        $rxSaveBtn.click(function (event) {
        //            $rxCloseBtn.click();
        //        });
        //取消
        $cancelBtn.click(function (event) {
            $rxCloseBtn.click();
        });
        //radio模拟
        $('.used-radio,.your-trouble input').bindCheckboxSwitch();

        //银行支付、平台支付、预付卡支付
        var $paySpan = $(".pay-way-th span");
        var $payWayMain = $(".pay-way-main");

        $paySpan.each(function (i) {
            $(this).click(function () {
                $paySpan.find("i").hide();
                $(this).addClass('on').siblings().removeClass('on');
                $payWayMain.eq(i).show().siblings().hide();
                $(this).find("i").show();
            });
        });
        //查看所有支付方式
        var $clickOpenBtn = $(".click-open-btn");
        var $usedBankOpen = $(".used-bank-open");
        $clickOpenBtn.click(function (event) {
            $(this).parent(".used-bank-way").hide();
            $(this).parent(".used-bank-way").next(".go-pay").hide();
            $usedBankOpen.show();
        });

        //处方登记
        var $rxFixedBtn = $("#rx-fixed-btn");
        $rxFixedBtn.click(function (event) {
            $(this).closest('.sectionA').hide().next(".sectionB").show();
        });
        var $savedRxBtn = $(".saved-rx-btn");
        $savedRxBtn.click(function (event) {
            $(this).closest('.sectionB').hide().prev(".sectionA").show();
            var $rxSectionA = $(this).closest('.sectionB').prev(".sectionA");
            $rxSectionA.children('.rx-item').remove();
            var rx_item_html = '';
            var index = 1;
            $(".ckRxNoteId:checked").each(function () {
                var noteId = $(this).val();
                var diagnose = $('#ulRxNoteList tr[noteId="' + noteId + '"] .diagnose').text();
                var rpList = $('#ulRxNoteList tr[noteId="' + noteId + '"] .rpList').text();
                rx_item_html += '<p class="rx-item"><span class="rx-left">处方' + index + '</span><span>' + diagnose + ' ：' + rpList + '</span></p>';
                index++;
            });
            $rxSectionA.append(rx_item_html);
            checkRxData();
        });
        //END处方登记
    });
})();

//头部交互
// JavaScript Document

//顶部调用
jQuery(document).ready(function () {
    //顶部下拉菜单
    $(".hNavList > li").hover(function () {
        $(this).addClass("Yhover");
    }, function () {
        $(this).removeClass("Yhover");
    })
    //判断登陆状态
    if (IsLogin()) {
        $('.YnewYesLogin').show();
        $('.YnewNoLogin').hide();
        GetHNavList();
        GetLogin();
    } else {
        $('.YnewYesLogin').hide();
        $('.YnewNoLogin').show();
    }
    GetTopCartList();
});
//是否登录
function GetLogin() {
    jQuery.ajax({
        type: "Get",
        url: userDomain + "/Login/GetUserInfo",
        cache: false,
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            if (data.isLogin) {
                var YUserName = "<a href=\"" + userDomain + "/user\"  rel=\"nofollow\">" + data["userName"] + "</a>";
                var Yout = "<a href=\"" + userDomain + "/User/Logout?ReturnUrl=" + urlConfig.pc + "\" rel=\"nofollow\">退出</a>";
                $(".YUserName").html(YUserName)
                $(".Yout").html(Yout)
            }

        }
    });

}
//是否登录
function IsLogin() {
    var result = false;
    jQuery.ajax({
        type: "Get",
        url: "/Login/GetUserInfo",
        cache: false,
        async: false,
        success: function (data) {
            if (data.isLogin) {
                result = true;
            }
        }
    });
    return result;
}
//顶部获取未付款订单，优惠劵，积分，待确认收货，已完成订单的数值
function GetHNavList() {
    $.ajax({
        url: userDomain + "/Order/GetUserCenterLinks",
        type: "GET",
        cache: false,
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            var YIntegral = "<a href='" + userDomain + "/Integral/index' rel=\"nofollow\">积分<b>" + data.Point + "</b></a>"; //积分
            var YCoupon = "<a href='" + userDomain + "/Coupon/index'  rel=\"nofollow\">优惠劵<b>" + data.Coupon + "</b></a>"; //优惠劵
            var YNopay = "<a href='" + userDomain + "/Order?Type=1'  rel=\"nofollow\">未付款订单<b>" + data.OrderTip + "</b></a>"; //未付款订单
            var YNosure = "<a href='" + userDomain + "/Order?Type=2'  rel=\"nofollow\">待确认收货<b>" + data.OrderNoReply + "</b></a>"; //待收货
            var Yyespay = "<a href='" + userDomain + "/Order?Type=4'  rel=\"nofollow\">已完成订单<b>" + data.OrderCancel + "</b></a>"; //已完成订单

            $(".YIntegral").html(YIntegral);
            $(".YCoupon").html(YCoupon);
            $(".YNopay").html(YNopay);
            $(".YNosure").html(YNosure);
            $(".Yyespay").html(Yyespay);
        }
    });
}

//顶部购物车
function GetTopCartList() {
    var numbers = 0;
    jQuery.ajax({
        url: urlConfig.pc + "/cart/GetCartCount",
        type: "Get",
        cache: true,
        dataType: "jsonp",
        success: function (data) {
            if (data) {
                var str = "<a href=\"" + cartDomain + "/cart/index\">购物车" + data.TotalItemCount + "件</a>";
                $(".cartNums,.pro_num").text(data.TotalItemCount);
                $(".hNavList .tcart").html(str);
            }

        }
    });
}


function alsoBuy() {
    //买了的人还买了
    var initN = 0;
    var $buyProList = $(".buy-pro-list");
    var $proBoxW = $buyProList.find(".pro-box").outerWidth();
    var $buyUl = $buyProList.find('ul');
    var $buyLi = $buyUl.find("li");
    var liW = $buyLi.outerWidth();
    var liSize = $buyLi.size();
    var $prevBtn = $("#prev-btn");
    var $nextBtn = $("#next-btn");
    var initPages = Math.ceil(liSize / 5);

    $buyUl.css("width", liW * liSize + "px");

    if (initPages > 1) {
        $prevBtn.hide(); $nextBtn.show();
    } else {
        $prevBtn.hide(); $nextBtn.hide();
    }

    //鼠标经过li
    $buyLi.hover(function () {
        $(this).css("border-color", "#ff0000");
    }, function () {
        $(this).css("border-color", "#fff");
    });

    //下一个
    $nextBtn.bind('click', function (event) {

        initN++;
        if (initN >= initPages) {
            initN = initPages - 1;
            $nextBtn.hide();
            return false;
        }
        $nextBtn.hide();
        $prevBtn.show();
        changeFn();
    });

    //上一个
    $prevBtn.bind('click', function (event) {

        initN--;
        if (initN == -1) {
            initN = 0;
            $prevBtn.hide();
            return false;
        }
        $nextBtn.show();
        $prevBtn.hide();
        changeFn();
    });

    //ul切换函数
    function changeFn() {
        $buyUl.stop().animate({ marginLeft: -initN * $proBoxW + "px" }, 600);
    }
    changeFn();
}


function matchOtherMsg() {
    matchUserNameMsg();
    matchAddressMsg();
    matchAreaMsg();
    matchMobileMsg();
    matchTelPhoneMsg();
    matchEmailMsg();
    matchPostCodeMsg();
}

var passValidate = true;
function matchUserNameMsg() {
    var $userName = $("#user-name").val();
    if ($.trim($userName) == "") {
        $("#user-name").parent().next(".error-box").show().children('span').html("请您填写收货人姓名！");
        passValidate = false;
    }
    else if ($.trim($userName).length < 2) {
        $("#user-name").parent().next(".error-box").show().children('span').html("请您填写真实的收货人名称！");
        passValidate = false;
    }
    else {
        $("#user-name").parent().next(".error-box").hide();
    }
}
function matchAddressMsg() {
    var $detailedAddress = $("#detailed-address").val();
    if ($.trim($detailedAddress) == "") {
        $("#detailed-address").next(".error-box").show().children('span').html("请您填写收货人详细地址");
        passValidate = false;
    }
    else if ($.trim($detailedAddress).length > 25) {
        $("#detailed-address").next(".error-box").show().children('span').html("收货地址不能超过25个字符");
        passValidate = false;
    }
    else {
        $("#detailed-address").next(".error-box").hide();
    }
}
function matchAreaMsg() {
    var $province = $("#h_ProvinceId").val();
    var $city = $("#h_CityId").val();
    var $town = $("#h_AreaId").val();
    if ($province == "-1" || $city == "-1" || $town == "-1") {
        $(".error-box3").show();
        passValidate = false;
    } else {
        $(".error-box3").hide();
    }
}
function matchMobileMsg() {
    var $cellPhoneNum = $(".cell-phone-num").val();
    var mobilePhoneReg = /^((13|15|17|18|14|16|19)[0-9]{1})+\d{8}$/;
    if (!mobilePhoneReg.test($.trim($cellPhoneNum))) {
        $("#txtMobilePhone").siblings('.error-box[errtype="mobileErr"]').show().children('span').html("请输入有效的手机号码");
        if ($("#txtMobilePhone").siblings('.error-box[errtype="telErr"]').css("display") != "none") {
            $("#txtMobilePhone").siblings('.error-box[errtype="telErr"]').css('left', '743px');
        }
        passValidate = false;
    }
    else {
        $("#txtMobilePhone").siblings('.error-box[errtype="mobileErr"]').hide();
        if ($("#txtMobilePhone").siblings('.error-box[errtype="telErr"]').css("display") != "none") {
            $("#txtMobilePhone").siblings('.error-box[errtype="telErr"]').css('left', '552px');
        }
    }
}
function matchTelPhoneMsg() {
    var $Telephone = $('#Telephone');
    if ($.trim($Telephone.val()) != "") {
        var telphoneReg = /^(\d{3}-\d{8}|\d{4}-\d{7})$/;
        var $cellPhoneNum = $(".cell-phone-num").val();
        var mobilePhoneReg = /^((13|15|17|18|14|16|19)[0-9]{1})+\d{8}$/;
        if (!telphoneReg.exec($Telephone.val())) {
            $("#txtMobilePhone").siblings('.error-box[errtype="telErr"]').show().children('span').html("请输入有效的固定电话");
            if ($("#txtMobilePhone").siblings('.error-box[errtype="mobileErr"]').css("display") === "none") {
                $("#txtMobilePhone").siblings('.error-box[errtype="telErr"]').css('left', '552px');
            }
            else {
                $("#txtMobilePhone").siblings('.error-box[errtype="telErr"]').css('left', '743px');
            }
            passValidate = false;
        }
        else {
            $("#txtMobilePhone").siblings('.error-box[errtype="telErr"]').hide();
        }
    }
    else {
        $("#txtMobilePhone").siblings('.error-box[errtype="telErr"]').hide();
    }
}
function matchEmailMsg() {
    var $Email = $('#Email');
    if ($.trim($Email.val()) != "") {
        var emailReg = /^([\w.\-]+@([\w\-]+\.)+[\w\-]+)$/;
        if (!emailReg.exec($Email.val())) {
            $Email.siblings(".error-box").show().children('span').html("请输入正确的电子邮箱！");
            passValidate = false;
        }
        else {
            $Email.siblings(".error-box").hide();
        }
    }
    else {
        $("#Email").siblings(".error-box").hide();
    }
}
function matchPostCodeMsg() {
    var $PostCode = $('#PostCode');
    if ($.trim($PostCode.val()) != "") {
        var postCodeReg = /^(\d{6})$/;
        if (!postCodeReg.exec($PostCode.val())) {
            $PostCode.siblings(".error-box").show().children('span').html("请输入正确的邮政编码！");
            passValidate = false;
        }
        else {
            $PostCode.siblings(".error-box").hide();
        }
    }
    else {
        $PostCode.siblings(".error-box").hide();
    }
}

//设置默认支付 payType:1,2,3,4
function setLastPay(payType) {
    var $default_pay_way_radio = $('.pay-way-lists .pay-way-radio[name="pay-way-radio"][value="' + payType + '"]');
    var $other_pay_way_radio = $('.pay-way-lists .pay-way-radio[name="pay-way-radio"][value!="' + payType + '"]');
    $default_pay_way_radio.click();
    $default_pay_way_radio.parent().addClass('on');
    $other_pay_way_radio.parent().removeClass('on');
    var sendTime = $('#h_sendTime').val();
    if (sendTime == '3') {
        $('#chkEveryDay').click();
        $('#chkEveryDay').parent().addClass('on');
    }
    else if (sendTime == '1') {
        $('#chkFreeDay').click();
        $('#chkFreeDay').parent().addClass('on');
    }
    else if (sendTime == '2') {
        $('#chkWorkDay').click();
        $('#chkWorkDay').parent().addClass('on');
    }
    else {
        $('#chkEveryDay').click();
        $('#chkEveryDay').parent().addClass('on');
    }
}
