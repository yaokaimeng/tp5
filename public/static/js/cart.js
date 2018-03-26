(function () {
    Array.prototype.contains = function (obj) {
        var i = this.length;
        while (i--) {
            if (this[i] === obj) {
                return true;
            }
        }
        return false;
    }
})()
var memberDomain = urlConfig.user;
var productDomain = urlConfig.pc;
function ctr_land_button() {
    if (typeof ctrActionsend != 'undefined'
                && ctrActionsend instanceof Function) {
        ctrActionsend(arguments[0]);
    }
}
function ctr_reg_button() {
    if (typeof ctrActionsend != 'undefined'
                && ctrActionsend instanceof Function) {
        ctrActionsend(arguments[0]);
    }
}

//登陆会员名提示

function onUserfocus(obj) {
    obj.parentNode.className = 'txtSelClass';
    obj.value = "";
    obj.className = "";
}
var txt = "邮箱/手机号/用户名";
function onUserBlur(obj) {
    obj.parentNode.className = 'txtClass';
    if (obj.value == "") {
        obj.value = txt;
        obj.className = "cGray";
    }
}
//     $(document).ready(function () {
//var name = $("#UserEmail").val();

//if (name != "" && name != txt) {
//    $("#UserEmail").removeClass("cGray");
//    $("#UserEmail").addClass("txtClass");
//}
//else {
//    $("#UserEmail").removeClass("Black");
//    $("#UserEmail").addClass("cGray");
//    jQuery('#UserEmail').showTipsInTxt("邮箱/手机号/用户名");
//}


var mailList = new Array();
mailList.push("@qq.com");
mailList.push("@163.com");
mailList.push("@126.com");
mailList.push("@189.cn");
mailList.push("@sohu.com");
mailList.push("@gmail.com");
mailList.push("@hotmail.com");
mailList.push("@yahoo.com");
mailList.push("@139.com");
$("#UserEmail").blur(function () {
    this.parentNode.className = 'txtClass';
    autoOff();
    $('#EmailAuto').slideUp('fast');
});
function UserEmail_blur() {
    this.parentNode.className = 'txtClass';
    autoOff();
    $('#EmailAuto').slideUp('fast');
}

$("#UserEmail").focus(function () {
    //    this.parentNode.className = 'txtSelClass';
    autoOn();
});
$("#UserEmail").bind("keyup", function (evt) {
    var input = $(this).val();
    jQuery('#EmailAuto').slideDown('fast');
    $("#EmailAuto li").eq(0).html(input);
    if (evt.keyCode == 40 || evt.keyCode == 38) {
        return;
    }
    if (input.indexOf("@") == input.length - 1) {
        return;
    }
    $("#EmailAuto li").each(function (i) {
        if (i > 0) {
            $(this).remove();
        }
    });
    var arrayList = input.split("@");
    var str = "";
    for (var i = 0; i < mailList.length; i++) {
        var mail = mailList[i];
        if (arrayList.length > 1) {
            if (mail.indexOf(arrayList[1]) > 0) {
                str = str + "<li class=\"emailAutoli\" id=\"EmailAuto_li_" + (i + 1) + "\" onmousemove=\"this.style.backgroundColor='#E0EFFF';\" onmouseout=\"this.style.backgroundColor='#fff';\" onclick=\"GetEmail(this);\">" + arrayList[0] + mailList[i] + "</li>";
            } else {
                if (input.indexOf("@") <= 0) {
                    str = str + "<li class=\"emailAutoli\" id=\"EmailAuto_li_" + (i + 1) + "\" onmousemove=\"this.style.backgroundColor='#E0EFFF';\" onmouseout=\"this.style.backgroundColor='#fff';\" onclick=\"GetEmail(this);\">" + input + mailList[i] + "</li>";
                }
            }
        } else {
            str = str + "<li class=\"emailAutoli\" id=\"EmailAuto_li_" + (i + 1) + "\" onmousemove=\"this.style.backgroundColor='#E0EFFF';\" onmouseout=\"this.style.backgroundColor='#fff';\" onclick=\"GetEmail(this);\">" + input + mailList[i] + "</li>";
        }
    }
    $("#EmailAuto li").eq(0).after(str);
});

$("#UserEmail").bind("keyup", function (evt) {

    switch (evt.keyCode) {
        case 40:
            chageSelection(true, mailList);
            break;
        case 38:
            chageSelection(false, mailList);
            break;
        case 13:
            GetEmail($("#EmailAuto_li_" + selectedIndex));
            $('#EmailAuto').slideUp('fast');
            break;
    }
});

$("#LoginButton").click(function () {
    if ($("#UserEmail").val().length == 0) {
        alertPop("请输入账号！");
    } else if ($("#UserPassword").val().length == 0) {
        alertPop("请输入密码！");
    } else {
        $("form").submit();
    }
});

var selectedIndex = -1;

function chageSelection(isUp, mailList) {
    if (isUp) {
        selectedIndex++;
    }
    else {
        selectedIndex--;
    }
    var maxIndex = mailList.length;
    if (selectedIndex < 0) { selectedIndex = 0 }
    if (selectedIndex > maxIndex) { selectedIndex = maxIndex }
    for (intTmp = 0; intTmp <= maxIndex; intTmp++) {
        if (intTmp == selectedIndex) {
            $("#EmailAuto_li_" + intTmp).css("backgroundColor", "#84D4FD");
            GetEmail($("#EmailAuto_li_" + selectedIndex));
        } else {
            $("#EmailAuto_li_" + intTmp).css("backgroundColor", "#FFF"); // style.backgroundColor = '#fff';
        }
    }
}
//ActivityProductMessage(24130, 100, 1, "ActivityMessage"); //活动提示
function autoOn() {
    if ($('#UserEmail').val() == "邮箱/手机号/用户名") {
        $("#UserEmail").val("");
    }
    $("#UserEmail").removeClass("cGray");
    $("#UserEmail").addClass("Black");
}

function autoOff() {
    if ($('#UserEmail').val() != "邮箱/手机号/用户名" && jQuery('#UserEmail').val() == "") {
        $('#EmailAuto').slideUp('fast');
        $("#UserEmail").removeClass("Black");
        $("#UserEmail").addClass("cGray");
        $('#UserEmail').showTipsInTxt('邮箱/手机号/用户名');
        $('#EmailAuto').slideUp('fast');
    }
}
function GetEmail(obj) {
    $("#UserEmail").val($(obj).html());
}


function closeLogin() {
    $("#btnAccount").attr("class", "btnSubmit");
    $("#btnAccount").val('');
    //easyDialog.close();
}
//function totalprice() {

//    var _totalprice = 0;
//    for (var n = 0; n < jQuery(".td7").length; n++) {
//  
//        var cartId = jQuery(".cartId").eq(n).val();
//        var _smallTotal = jQuery(".td7").eq(n).text();
//        _totalprice = parseFloat(_totalprice) + parseFloat(_smallTotal);
//    }
//    $("#totalprice").text(ToMoney(_totalprice));
//}
//改改改改改
function GetLimitCount(productId) {
    var limitCount = 0;
    jQuery.ajax({
        url: "/Goods/LimitCount?ProductId=" + productId,
        type: "GET",
        dataType: "JSON",
        async: false,
        success: function (data) {
            limitCount = data;
        }
    });
    return limitCount;
}

//数量点击
function changeCart(e, cartId, type) {

    /*
    var x = e.offsetX;
    var y = e.offsetY;
    */
    var x = e.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
    var y = e.clientY + document.documentElement.scrollTop + document.body.scrollTop;


    var quantity = jQuery("#tb_quantity_" + cartId).val();
    var productId = jQuery("#ProductId_" + cartId).val();

    quantity = parseFloat(quantity) + parseFloat(type);
    if (isNaN(quantity)) {
        quantity = 1;
        jQuery("#tb_quantity_" + cartId).val("1");
    }
    if (quantity <= 0) {
        quantity = 1;
        jQuery("#tb_quantity_" + cartId).val("1");
        getCartProduct();
        return;
    } else if (quantity > 999) {
        quantity = 999;
        jQuery("#tb_quantity_" + cartId).val("999");
    }
    var p = jQuery("#price_" + cartId).html();
    if (quantity == 0) {
        $("#hidDel").val(cartId);
        DelCart();
    }
    else {
        jQuery.ajax({
            url: "/Cart/ChangeQuantity?cartId=" + cartId + "&quantity=" + quantity,
            type: "post",
            success: function (data) {
                if (data.Result == true) {
                    jQuery("#tb_quantity_" + cartId).val(quantity);
                    $('#loadingImg').empty();
                    $('#changedOk').show();

                    if (type == '1') {

                        $("#changedOk").css({ "left": x - 100, "top": y - 92 });
                        $('#changedOk').delay(2000).hide(0);

                        /*
                        $("#changedOk").css({ left: e.pageX - 98, top: e.pageY - 98 });
                        alertPop(e.e.pageY);                        
                        $('#changedOk').delay(2000).hide(0);
                        */
                        /*
                        $("#changedOk").css({ "left": e.pageX - 100, "top": e.pageY - 92 });
                        $('#changedOk').delay(2000).hide(0);
                        */

                    }
                    if (type == '-1') {

                        $("#changedOk").css({ "left": e.pageX - 44, top: e.pageY - 92 });
                        $('#changedOk').delay(1000).hide(0);
                    }
                    if (type == '0') {
                        $('.warnDialog').hide();
                    }
                    //getCartProduct();
                }
                    //else if (data.Code == "0") {
                    //    alertPop("已购买该产品的订单中合计达到最大限购数!");
                    //}
                else if (data.Code == 2) {
                    alertPop("购物车与已购买该产品的订单中合计达到最大限购数!");
                }
                    //else if (data == "1001") {
                    //    alertPop('购买特卖商品请先登录!');
                    //    //alert("购买特卖商品请先登录!");
                    //}
                else if (data.Code == 1) {
                    alertPop('抱歉！目前库存不足！您要抢购的商品太多人抢了，赶快结算吧！');
                    //alert("抱歉！目前库存不足！您要抢购的商品太多人抢了，赶快结算吧！");
                }
                else {
                    alertPop(data.Message, null, 3);
                }
                getCartProduct();
            }
        });
    }
}

//推荐商品
function getCammandProduct(totalPrice, page) {
    $.ajax({
        url: "/Cart/GetCartProduct",
        type: "POST",
        cache: true,
        dataType: "json",
        data: {},
        success: function (obj) {

            if (obj.length > 0) {
                for (i = 0; i < obj.length; i++) {
                    totalPrice += (parseFloat(obj[i].Price) - parseFloat(obj[i].Concession)) * parseFloat(obj[i].Quantity);
                }

            }
            if (totalPrice >= 200) {
                totalPrice = 0;
            }
            var str = "";
            jQuery.ajax({
                url: "/Product/GetProductInfoListByPrice?price=" + totalPrice + "&page=" + page,
                type: "get",
                cache: true,
                success: function (data) {
                    if (data.length > 0) {
                        str += "<h3 class=\"m_t\">您可能感兴趣的商品</h3>";
                        str += "<ul>";
                        for (var i = 0; i < 5; i++) {
                            var objProduct = data[i];
                            str += "<li>";
                            str += " <p class=\"pic\"><a target=\"_blank\" href=\"" + productDomain + "/product/" + objProduct.ProductId + ".shtml\">";
                            str += "<img width=\"120\" height=\"120\" border=\"0\" title=\"" + objProduct.ProductTitle + "\" alt=\"" + objProduct.ProductTitle + "\" src=\"s/UploadFiles/" + objProduct.ProductThumb + "\"></a></p>";
                            str += "<p class=\"title\"><a target=\"_blank\" class=\"title2\" title=\"\"  href=\"" + productDomain + "/product/" + objProduct.ProductId + ".shtml\">" + objProduct.ProductTitle + "</a></p>";
                            //str += "<p class=\"format\">" + objProduct.Specification + "</p>";
                            str += "<p class=\"price\">￥" + objProduct.Price + "</p>";
                            str += "<p class=\"buy\"><a href=\"javascript:void(0)\" onclick=\"CreateCart(" + objProduct.ProductId + ")\"></a></p>";
                            str += "</li>";

                        }
                        str += "</ul>";
                        $("#likeProductList").html(str);
                        $("#likeProductList").show();
                    }
                    else {
                        $("#likeProductList").hide();
                    }
                }
            });
        }
    });


}

function GoBackLookProduct() {
    var totalPrice = $("#totalprice").text();
    if (parseFloat(totalPrice) < 200) {
        var currentPage = parseInt($("#currentPage").val());
        currentPage = currentPage - 1;
        if (currentPage <= 0) {
            getCammandProduct(totalPrice, 0);
        } else {
            getCammandProduct(totalPrice, currentPage);
        }
        $("#currentPage").val(currentPage);
    }
}
function GoChangeProduct() {
    var totalPrice = $("#totalprice").text();
    if (parseFloat(totalPrice) < 200) {
        var currentPage = parseInt($("#currentPage").val());
        currentPage = currentPage + 1;
        if (currentPage <= 0) {
            getCammandProduct(totalPrice, 0);
        } else {
            getCammandProduct(totalPrice, currentPage);
        }
        $("#currentPage").val(currentPage);
    }
}

//免费领取
function FreeGoodList(page) {
    var productList = "";
    jQuery.ajax({
        url: "/Product/FreeGoodList",
        type: "get",
        cache: true,
        data: { totalMoney: $("#totalprice").text(), page: page },
        success: function (data) {
            if (data.length > 0) {
                $("#Free").show();
                for (var i = 0; i < data.length; i++) {
                    var objProduct = data[i];
                    productList = productList + "<li><p class=\"pic\">"
                    + "<a target=\"_blank\" href=\"" + productDomain + "/product/" + objProduct.ProductId + ".shtml\" onclick=\"_gaq.push(['_trackEvent', '订单流程跟踪', '查看购物车-免费领取图片-商品名', '" + objProduct.ProductTitle + "',0]);\"><img src=\"" + objProduct.ProductThumb + "\"/></a></p>"
                    + "<p class=\"title\"><a href=\"" + productDomain + "/product/" + objProduct.ProductId + ".shtml\" target=\"_blank\" onclick=\"_gaq.push(['_trackEvent', '订单流程跟踪', '查看购物车-免费领取标题-商品名', '" + objProduct.ProductTitle + "',0]);\">" + objProduct.ProductTitle + "</a></p>"
                    + "<p class=\"price\"><span class=\"price_m\">￥" + objProduct.Price_Market + "</span><span class=\"price_d\">￥" + objProduct.Price + "</span></p>"
                    + "<p class=\"FreeGet\"><span onclick=\"_gaq.push(['_trackEvent', '订单流程跟踪', '查看购物车-免费领取按钮-商品名', '" + objProduct.ProductTitle + "',0]);GetFree(" + objProduct.ProductId + ");\"></span></p></li>";
                }
                $("#FreeGoods").html(productList);
            } else {
                $("#Free").hide();
            }

        }
    });
}

function CreateCart(productId) {
    jQuery.ajax({
        url: "/Cart/Creat?productId=" + productId,
        type: "post",
        success: function (data) {
            if (data == "true") {
                //location.href = "/Cart/Index";
                getCartProduct();
            }
            else {
                alertPop(data, null, 3);
            }
        }
    });
}


//删除选中商品
function removeSelect() {
    var ids = $("#cartIds").val();
    if (ids == "") {
        alertPop("请至少选择一种商品!");
        return;
    }
    _gaq.push(['_trackEvent', '新订单流程跟踪20120823', '购物车-批量删除-文字链接', '0', 0]);
    if (ids.length > 0) {
        $.ajax({
            url: '/Cart/DeleteList',
            type: 'post',
            data: { CartIds: ids },
            cache: 'false',
            success: function (data) {
                $("#cartIds").val("");
                $("#cartIdsCount").text('0');
                selectCount();
                getCartProduct();
            }
        })
    }


}

//复选框状态
function changeSelect(chkSel) {
    $(chkSel).parent().parent().parent().parent().toggleClass('act');
    var val = $("#cartIds").val();
    var newVal = "";
    var chkSelVal = $(chkSel).val();
    //换购
    //var redempCode = $(chkSel).attr('redemp');
    //var redempCartId = '';
    //if (redempCode != '') {
    //    redempCartId = $('#' + $(chkSel).val() + '_redemp_' + redempCode).val();
    //}
    if (!$(chkSel).parent().hasClass('on')) {
        $(chkSel).parent().addClass('on');
        //if (redempCartId != '') {
        //    $('#' + redempCartId).parent().addClass('on');
        //    $('#' + redempCartId).parent().parent().parent().parent().addClass("act");
        //}
        if (val != "") {
            if (!val.split(',').contains(chkSelVal)) {
                newVal = val + "," + chkSelVal;
                //if (redempCartId != '') {
                //    newVal += "," + redempCartId;
                //}
            }
        }
        else {
            newVal = val + chkSelVal;
            //if (redempCartId != '') {
            //    newVal += "," + redempCartId;
            //}
        }
        $("#cartIds").val(newVal);
        newVal = "";
        val = "";

        //if (chkSelVal.indexOf("_redemp_") > -1) {
        //    var cartIdAndWareCode = chkSelVal.split("_redemp_");
        //    if (cartIdAndWareCode.length == 2) {
        //        AddRedemption(cartIdAndWareCode[0], cartIdAndWareCode[1]);
        //    }
        //}
        //else {
        updateCartSelectState(chkSelVal, true);
        //}
    }
    else {
        $(chkSel).parent().removeClass('on');
        //if (redempCartId != '') {
        //    $('#' + redempCartId).parent().removeClass('on');
        //    $('#' + redempCartId).parent().parent().parent().parent().removeClass("act");
        //}
        if (val.indexOf(',') > 0) {
            var IDS = val.split(',');
            for (var i = 0; i < IDS.length; i++) {
                if (chkSelVal != IDS[i] /*&& redempCartId != IDS[i]*/) {
                    newVal += IDS[i] + ",";
                }
            }
            var num2 = newVal.lastIndexOf(',');
            newVal = newVal.substring(0, num2);
            $("#cartIds").val(newVal);
            newVal = "";
            val = "";
        }
        else {
            if (val == chkSelVal) {
                $("#cartIds").val("");
            }
        }

        //if (chkSelVal.indexOf("_redemp_") > -1) {
        //    var cartIdAndWareCode = chkSelVal.split("_redemp_");
        //    if (cartIdAndWareCode.length == 2) {
        //        removeRedemption(cartIdAndWareCode[0]);
        //    }
        //}
        //else {
        updateCartSelectState(chkSelVal, false);
        //}
    }
    //选择对应赠品
    selectGiftsAndRedemps();
    selectCount();
    getTotalMoney();
    var cartCount = parseInt($('#h_CartCount').val());
    if (getSelectProCount() < cartCount) {
        $('#full-chose-input').parent().removeClass('on');
        $('#full-chose-input-end').parent().removeClass('on');
    }
    else {
        $('#full-chose-input').parent().addClass('on');
        $('#full-chose-input-end').parent().addClass('on');
    }
}

//更新购物车选择状态
function updateCartSelectState(cartIds, selected) {
    $.ajax({
        url: "/Cart/UpdateCartSelectState",
        data: { cartIds: cartIds, selected: selected },
        type: "post",
        success: function (data) {
            //
        }
    });
}

function getTotalMoney() {
    var ids = $("#cartIds").val();
    if (ids.length > 0) {
        var cartIdArr = ids.split(',');
        var total = 0, notRxTotal = 0, rxTotal = 0, price = 0;
        for (var i = 0; i < cartIdArr.length; i++) {
            price = parseFloat($('#price_' + cartIdArr[i]).text());
            total += price;
            if ($('#IsRX_' + cartIdArr[i]).val() == "1") {
                rxTotal += price;
            }
            else {
                notRxTotal += price;
            }
        }
        //换购价
        var redempCarts = $('.redempCart');
        for (var i = 0; i < redempCarts.length; i++) {
            var cartIdArr = $(redempCarts[i]).val().split('_');
            var allSel = true;
            var isRx = false;
            for (var j = 0; j < cartIdArr.length; j++) {
                if (cartIdArr[j] != '' && !$('#' + cartIdArr[j]).parent().hasClass('on')) {
                    allSel = false;
                }
                if ($('#IsRX_' + cartIdArr[i]).val() == "1") {
                    isRx = true;
                }
            }
            var redempPrice = parseFloat($('#price_redemp_' + redempCarts[i].id).text());
            if (allSel) {
                total += redempPrice;
            }
            if (isRx) {
                rxTotal += redempPrice;
            }
            else {
                notRxTotal += redempPrice;
            }
            //else {
            //    total -= redempPrice;
            //}
        }
        $('.kad_notRx_total_price').text('合计：¥' + ToMoney(notRxTotal));
        $('.kad_Rx_total_price').text('合计：¥' + ToMoney(rxTotal));
        $(".product-total-price").text("￥" + ToMoney(total));
        var WholeMoneyFreeShipAmt = parseInt(window.cartConfig.postage);
        if (total < WholeMoneyFreeShipAmt) {
            $('.without-pay span.freight-tips').html(window.cartConfig.cartPostage.replace("{0}", (WholeMoneyFreeShipAmt - total).toFixed(2)));
            $('.without-pay span.single-order').show();
        }
        else {
            $('.without-pay span.freight-tips').html(window.cartConfig.cartFreePostage);
            $('.without-pay span.single-order').hide();
        }
        getFreight(ids);
    }
    else {
        $('.kad_notRx_total_price').text('合计：¥0.00');
        $('.kad_Rx_total_price').text('合计：¥0.00');
        $(".product-total-price").text("￥0.00");
        $(".total-price").html("合计：¥0.00");
        $('.without-pay span font.save').html("￥0.00");
        $('.without-pay span.freight-tips').html(window.cartConfig.cartPostage.replace("{0}", parseFloat(window.cartConfig.postage).toFixed(2)));
        $('.without-pay span.single-order').show();
    }
}

///改改改改改
function getFreight(cartIds) {
    $.get('/Cart/GetFreight', function (data) {
        if (data != null) {
            $('.without-pay span font.save').html("￥" + data.TotalDisPrice.toFixed(2));
            var freight = parseFloat(data.TotalFreightCost);
            if (freight == 0) {
                $('.without-pay span.freight-tips').html(window.cartConfig.cartFreePostage);
                $('.without-pay span.single-order').hide();
            }
            else {
                var WholeMoneyFreeShipAmt = parseInt(window.cartConfig.postage);
                $('.without-pay span.freight-tips').html(window.cartConfig.cartPostage.replace("{0}", (WholeMoneyFreeShipAmt - parseFloat(data.TotalProductPrice)).toFixed(2)));
                $('.without-pay span.single-order').show();
            }

        }
    }, 'json');
}

//选取数量
function selectCount() {
    var ids = $("#cartIds").val();
    if (ids.length > 0) {
        if (ids.indexOf(',') > 0) {
            var IDS = ids.split(',');
            var num = IDS.length;
            //var redemps = $('.redempCart');
            //for (var i = 0; i < IDS.length ; i++) {
            //    for (var j = 0; j < redemps; j++) {
            //        if (redemps[j].id.indexOf(IDS[i])) {
            //            num += 1;
            //        }
            //    }
            //}
            //赠品对应的主商品是否全选
            var giftCarts = $('.giftCart');
            for (var i = 0; i < giftCarts.length; i++) {
                var cartIdArr = $(giftCarts[i]).val().split('_');
                var allSel = true;
                for (var j = 0; j < cartIdArr.length; j++) {
                    if (cartIdArr[j] != '' && !$('#' + cartIdArr[j]).parent().hasClass('on')) {
                        allSel = false;
                    }
                }
                if (allSel) {
                    num += 1;
                }
            }
            //redempCart
            //换购对应的主商品是否全选
            var redempCart = $('.redempCart');
            for (var i = 0; i < redempCart.length; i++) {
                var cartIdArr = $(redempCart[i]).val().split('_');
                var allSel = true;
                for (var j = 0; j < cartIdArr.length; j++) {
                    if (cartIdArr[j] != '' && !$('#' + cartIdArr[j]).parent().hasClass('on')) {
                        allSel = false;
                    }
                }
                if (allSel) {
                    num += 1;
                }
            }
            $("#cartIdsCount").text(num);
        }
        else {
            $("#cartIdsCount").text('1');
        }
    }

    else {
        $("#cartIdsCount").text('0');
    }
}

//全选
function selectAllProduct() {
    _gaq.push(['_trackEvent', '新订单流程跟踪20120823', '购物车-全选-小方框', '0', 0]);
    var cartIDS = "";
    $("#full-chose-input").click(function () {
        cartIDS = '';
        if ((!$('#full-chose-input').parent().hasClass('on') && !$('#full-chose-input-end').parent().hasClass('on')) || ($('#full-chose-input').parent().hasClass('on') && !$('#full-chose-input-end').parent().hasClass('on'))) {
            $('#full-chose-input').parent().addClass('on');
            $("#cartIds").val("");
            $.each($("input[name='product']"), function () {
                $(this).parent().addClass('on');
                cartIDS += $(this).val() + ",";
            });
            var num = cartIDS.lastIndexOf(',');
            cartIDS = cartIDS.substring(0, num);
            $("#cartIds").val(cartIDS);
            $('#full-chose-input-end').parent().addClass('on');
            $('.pro-list-box li').addClass('act');
            updateCartSelectState(cartIDS, true);
        }
        else {
            $('#full-chose-input').parent().removeClass('on');
            $.each($("input[name='product']"), function () {
                $(this).parent().removeClass('on');
            });
            updateCartSelectState($("#cartIds").val(), false);
            cartIDS = "";
            $("#cartIds").val("");
            $('#full-chose-input-end').parent().removeClass('on');
            $('.pro-list-box li').removeClass('act');
        }
        selectCount();
        getTotalMoney();
        getSelectProCount();
        //选择对应赠品
        selectGiftsAndRedemps();
    });
    $("#full-chose-input-end").click(function () {
        cartIDS = '';
        if ((!$('#full-chose-input-end').parent().hasClass('on') && !$('#full-chose-input').parent().hasClass('on')) || ($('#full-chose-input-end').parent().hasClass('on') && !$('#full-chose-input').parent().hasClass('on'))) {
            $('#full-chose-input-end').parent().addClass('on')
            $("#cartIds").val("");
            $.each($("input[name='product']"), function () {
                $(this).parent().addClass('on');
                cartIDS += $(this).val() + ",";
            });
            var num = cartIDS.lastIndexOf(',');
            cartIDS = cartIDS.substring(0, num);
            $("#cartIds").val(cartIDS);
            $('#full-chose-input').parent().addClass('on');
            $('.pro-list-box li').addClass('act');
            updateCartSelectState(cartIDS, true);
        }
        else {
            $('#full-chose-input-end').parent().removeClass('on');
            $.each($("input[name='product']"), function () {
                $(this).parent().removeClass('on');
            });
            updateCartSelectState($("#cartIds").val(), false);
            cartIDS = "";
            $("#cartIds").val("");
            $('#full-chose-input').parent().removeClass('on');
            $('.pro-list-box li').removeClass('act');
        }
        selectCount();
        getTotalMoney();
        getSelectProCount();
        //选择对应赠品
        selectGiftsAndRedemps();
    });
}

//删除购物车产品
function Delete(e, CartId) {
    confirmPop('确定从购物车中删除此商品？', function () {
        DelCart(CartId);
    });
}

//确认删除换购商品
function confirmDelRedemption(cartId) {
    if (cartId) {
        $.ajax({
            url: "/Cart/DeleteRedemption?cartId=" + cartId,
            type: "post",
            success: function (data) {
                if (data) {
                    $('#' + $('#divCartContent1').attr('trRedemptionId')).remove();
                    $('#divCartContent1').removeAttr("chkValue_" + cartId);
                    $('#divCartContent1').removeAttr("trRedemptionId");
                    getCartProduct();
                    return;
                }
                else {
                    alertPop('删除失败，请重试！');
                }
            }
        });
    }
}

//确认删除
function DelCart(cartId) {
    if (cartId) {
        jQuery.ajax({
            url: "/Cart/Delete?CartId=" + cartId,
            type: "post",
            success: function (data) {
                if (data) {
                    getCartProduct();
                    $("#hidDel").val('');
                    var str = $.trim($("#cartIds").val());
                    if (str.length > 0) {
                        if (str.indexOf(',') > 0) {
                            var ids = str.split(',');
                            var cartIds = '';
                            var times = 0;
                            for (i = 0; i < ids.length; i++) {
                                if (ids[i] != cartId) {
                                    cartIds = cartIds + ids[i] + ',';
                                    times = times + 1;
                                }
                            }
                            var num = cartIds.lastIndexOf(',');
                            cartIds = cartIds.substring(0, num);
                            $("#cartIds").val(cartIds);
                            $("#cartIdsCount").text(times);
                        }
                        else {
                            if (str == cartId) {
                                $("#cartIds").val('');
                                $("#cartIdsCount").text('0');
                            }
                        }
                    }
                }
                else {
                    alertPop("商品删除失败！");
                    $("#hidDel").val('');
                }
            }
        });
    }
}


//取消删除
function DelCance() {
    if ($('#divCartContent1').attr('trRedemptionId')) {
        $('#divCartContent1').removeAttr("trRedemptionId");
    }
    $("#hidDel").val('');
}

//收藏
function AddFavorite(e, productId) {
    if (IsLogin()) {
        $(".CollectBox").show(); $(".CollectBox").css({ "left": e.clientX - 260, "top": e.clientY - 30 });
    }
    else {
        $('#showLogOrReg').show();
    }
}

/*购物车-登陆*/
function UserLogin() {
    ctr_land_button('land_button_home');
    $("#LoginError").html("");
    var isPass = true;
    var UserEmail = $("#UserEmail").val();
    var UserPassword = $("#UserPassword").val();
    if (UserEmail == "" || UserEmail == "邮箱/手机号/用户名") {
        var txt = "登录名不能为空！";
        $("span[data-valmsg-for=\"UserEmail\"]").text(txt);
        isPass = false;
    }
    if (UserPassword == "") {
        $("span[data-valmsg-for=\"UserPassword\"]").text("密码长度应在6-20位之间！");
        isPass = false;
    }
    $("div.login_box div[data-valmsg-for]").each(function (i) {
        if ($.trim($(this).children().text()).length > 0) {
            $(this).css("top", $("div[data-valmsg-for=\"" + idstr + "\"]").parent().height() - $("div[data-valmsg-for=\"" + idstr + "\"]").height() - $(obj).height() + 8);
            $(this).css("display", "block");
            var $obj = $("#" + $(this).attr("data-valmsg-for"));
            $obj.siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
            $obj.removeClass("input_hover");
            $obj.addClass("input_error");
            isPass = false;
        }
    });
    if (!isPass) { ctr_land_button('land_button_fail'); return; }


    //登录
    jQuery.ajax({
        url: memberDomain + "/Login/AjaxLoginV2",
        type: "Post",
        data: "userName=" + UserEmail + "&pass=" + UserPassword,
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            if (data.Message == "没有绑定主帐号") {
                location.href = urlConfig.user + "/Register/RegisterKadMain?guId=" + data.Code + "&returnUrl=" + document.URL;
                return;
            }
            if (data.Message == "没有验证手机") {
                location.href = urlConfig.user + "/register/verification?guId=" + data.Code + "&returnUrl=" + document.URL;
                return;
            }
            if (data.Result == true) {
                ctr_land_button('land_button_succ');
                if ($("#showLogOrReg").attr("data-beforeunload")) {
                    GetLogin();;
                } else {
                    //判断限购数
                    var cartIds = $('#cartIds').val();
                    if (cartIds == '') {
                        alertPop('请至少选中一件商品！');
                        return;
                    }
                    popClose('showLogOrReg', '');
                    jQuery.ajax({
                        url: '/Cart/GoToOrder',
                        type: "post",
                        dataType: "json",
                        success: function (data) {
                            if (data.Result) {
                                if (data.Code == 11/*医卡通不能销售商品提示*/) {
                                    confirmPop(data.Message, function () {
                                        location.href = '/Order/Index';
                                    });
                                }
                                else {
                                    location.href = '/Order/Index';
                                }
                            }
                            else {
                                if (data.Code == 0) {
                                    alertPop('尚未登录！', function () {
                                        window.location = urlConfig.user + '/Login/Index';
                                    });
                                }
                                else {
                                    alertPop(data.Message, function () {
                                        window.location.reload();
                                    });
                                    return;
                                }
                            }
                        },
                        error: function (data) {
                            alertPop("网络繁忙!", function () {
                                window.location.reload();
                            });
                            return;
                        }
                    });
                }
            }
            else {
                ctr_land_button('land_button_fail');
                if (data.Code == "UserName") {
                    var obj = document.getElementById("UserEmail");
                    $("span[data-valmsg-for=\"" + obj.id + "\"]").text(data.Message);
                    $("div[data-valmsg-for=\"" + obj.id + "\"]").css("display", "block").css("top", $("div[data-valmsg-for=\"" + obj.id + "\"]").parent().height() - $("div[data-valmsg-for=\"" + obj.id + "\"]").height() - $(obj).height() + 8);
                    $(obj).addClass("input_error");
                    $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                }
                else if (data.Code == "UserPassword") {
                    var obj = document.getElementById("UserPassword");
                    $("span[data-valmsg-for=\"" + obj.id + "\"]").text(data.Message);
                    $("div[data-valmsg-for=\"" + obj.id + "\"]").css("display", "block").css("display", "block").css("top", $("div[data-valmsg-for=\"" + obj.id + "\"]").parent().height() - $("div[data-valmsg-for=\"" + obj.id + "\"]").height() - $(obj).height() + 8);
                    $(obj).addClass("input_error");
                    $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                    $(obj).val("");
                }
                else {
                    $("#LoginError").html(data.Result);
                }
                //$('.txtError').css("top", "77px");

            }
        }
    });

}

//改改改改改
function CheckCartListLimit() {
    var result = false;
    jQuery.ajax({
        url: "/Cart/CheckCartListLimit",
        type: "get",
        dataType: "jsonp",
        cache: true,
        async: false,
        success: function (data) {
            if (data.result == "0") {
                result = true;
            }
            else {
                alertPop(data.result);
            }
        }
    });
    return result;
}

//回车
function isEnterKey(evt, obj, n) {
    evt = (evt) ? evt : ((window.event) ? window.event : "")
    var keyCode = evt.keyCode ? evt.keyCode : (evt.which ? evt.which : evt.charCode);
    if (keyCode == 13) {
        $(obj).blur();
        if (n == 1) { UserLogin(); }
        else if (n == 2) { UserReg(); }
    }
}
//注册 
//$("#Email").blur(function () {
//    if (!isEmail($("#Email").val())) {
//        var txt = "请输入正确的邮箱 !";
//        $("#EmailError").html(txt);
//    }
//    else {
//        $("#EmailError").html('');
//    }
//});

///是否邮件
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
    if (strMobilephone.search(/^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/) != -1) {
        return true;
    }
    else {
        return false;
    }
}

/*购物车-注册*/
function UserReg() {
    ctr_reg_button('reg_button_land');
    $("#EmailError").html("");
    var Email = $.trim($("#Email").val());
    var Password = $("#Password").val();
    var ConfirmPassword = $("#ConfirmPassword").val();
    var ValidateCode = $("#ValidateCode").val();
    var isPass = true;
    if (!isEmail(Email)) {
        var txt = "请输入正确的邮箱 !";
        $("span[data-valmsg-for=\"Email\"]").text(txt);
        isPass = false;
    }
    if (Password == "") {
        $("span[data-valmsg-for=\"Password\"]").text("请输入密码！");
        isPass = false;
    }
    if ($.trim(Password).length > 20 || $.trim(Password).length < 6) {
        $("span[data-valmsg-for=\"Password\"]").text("密码长度应在6-20位之间！");
        isPass = false;
    }
    if (Password != ConfirmPassword) {
        $("span[data-valmsg-for=\"ConfirmPassword\"]").text("两次密码输入的不一致!");
        isPass = false;
    }
    if ($.trim(ConfirmPassword).length > 20 || $.trim(ConfirmPassword).length < 6) {
        $("#ConfirmPasswordError").html("");
        $("span[data-valmsg-for=\"ConfirmPassword\"]").text("确认密码长度应在6-20位之间！");
        isPass = false;
    }
    if (ValidateCode == "") {
        $("span[data-valmsg-for=\"ValidateCode\"]").text("请输入验证码!");
        isPass = false;
    }
    if (ValidateCode != "") {
        $("div[data-valmsg-for=\"ValidateCode\"]").css("display", "none");
        $("span[data-valmsg-for=\"ValidateCode\"]").empty();
    }
    if (!$("#ChkIsAgreed").attr("checked")) {
        alertPop("请阅读并同意《康爱多网上药店服务条款》!");
        isPass = false;
    }
    $("#ValidateCode").removeClass("input_hover");
    $("div.register_box div[data-valmsg-for]").each(function (i) {
        if ($.trim($(this).children().text()).length > 0) {
            $(this).css("top", $(this).parent().height());
            $(this).css("display", "block");
            var iName = $(this).attr("data-valmsg-for");
            if (iName == "Password" || iName == "ConfirmPassword") {
                var $obj = $("#text_" + iName);
                $obj.removeClass("input_hover");
                $obj.addClass("input_error");
                $obj.siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
            }
            else {
                var $obj = $("#" + iName);
                $obj.removeClass("input_hover");
                $obj.addClass("input_error");
                $obj.siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
            }
            isPass = false;
        }
    });
    if (!isPass) { ctr_reg_button('reg_button_fail'); return isPass; }
    //注册
    jQuery.ajax({
        url: memberDomain + "/Register/AjaxRegister",
        data: "UserName=" + Email + "&Password=" + Password + "&ConfirmPassword=" + ConfirmPassword + "&Email=" + Email + "&ValidateCode=" + ValidateCode,
        type: "Post",
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            if (data.Flag == true) {
                ctr_reg_button('reg_button_succ');
                if ($("#showLogOrReg").attr("data-beforeunload")) {
                    GetLogin();
                    //easyDialog.open({ container: 'showunloadactivity', callback: function () { $("#showLogOrReg").removeAttr("data-beforeunload"); } });
                } else {
                    //easyDialog.close();
                    //Statistics('注册成功页', 'event3', data.Result);
                    location.href = '/Order/Index';
                }
            }
            else {
                ctr_reg_button('reg_button_fail');
                if (data.Result == "验证码错误，请重新输入！") {
                    var obj = document.getElementById("ValidateCode");
                    $("span[data-valmsg-for=\"" + obj.id + "\"]").text("验证码错误，请重新输入！");
                    $("div[data-valmsg-for=\"" + obj.id + "\"]").css("display", "block");
                    $(obj).addClass("input_error");
                }
                else {
                    $("#EmailError").html(data.Result);
                }
                return false;
            }
        }
    });
}


//登录注册的切换
$(".loginLi a").click(function () {
    $(".loginLi a").addClass("hoverNavA");
    $(".regLi a").removeClass("hoverNavA");
    $(".regForm").hide();
    $(".loginForm").show();
})
$(".regLi a").click(function () {
    $(".loginLi a").removeClass("hoverNavA");
    $(".regLi a").addClass("hoverNavA");
    $(".regForm").show();
    $(".loginForm").hide();
})

//订单
function GoToOrder() {
    $('#btnAccount').hide();
    $('#btnLoading').show();
    var cartIds = $('#cartIds').val();
    if (cartIds == '') {
        alertPop('请至少选中一件商品！');
        $('#btnAccount').show();
        $('#btnLoading').hide();
        return;
    }

    //判断限购数
    //if (!CheckCartListLimit(cartIds)) {
    //    setTimeout(function () {
    //        location.href = '/Cart/Index';
    //    }, 1000);
    //    return;
    //}
    var isLogin = $("#h_isLogin").val(); //  IsLogin();
    if (isLogin != "1") {
        popShow('showLogOrReg', '', true);
        $('#btnAccount').show();
        $('#btnLoading').hide();
        $('#IsRemberName').bindCheckboxSwitch();
        return;
    }
    _gaq.push(['_trackEvent', '新订单流程跟踪20120823', '购物车-结算-按钮', '0', 0]);

    jQuery.ajax({
        url: '/Cart/GoToOrder',
        type: "post",
        dataType: "json",
        success: function (data) {
            if (data.Result) {
                if (data.Code == 11/*医卡通不能销售商品提示*/) {
                    confirmPop(data.Message, function () {
                        location.href = '/Order/Index';
                    });
                    $('#btnAccount').show();
                    $('#btnLoading').hide();
                }
                else {
                    location.href = '/Order/Index';
                }
            }
            else {
                if (data.Code == 0) {
                    alertPop('尚未登录！', function () {
                        window.location = urlConfig.user + '/Login/Index';
                    });
                }
                else {
                    alertPop(data.Message, function () {
                        window.location.reload();
                    });
                    return;
                }
            }

        },
        error: function (data) {
            alertPop("网络繁忙!");
            $('#btnAccount').show();
            $('#btnLoading').hide();
            return;
        }
    });
}
//关闭窗口JQ
$(".close").click(function () {
    easyDialog.close();
})
//关闭窗口JQ 自动隐藏
$(".popClose").click(function () {
    easyDialog.close();
})

///免费领取
function GetFree(productID) {
    $("#FreeGetProductID").val(productID);
    if (IsLogin() == 'true') {
        jQuery.ajax({
            url: "/Cart/FreeGet?productID=" + productID,
            type: "post",
            success: function (data) {
                if (data == "true") {
                    //  
                    location.href = "/Cart/Index";
                }
                else {
                    CreateCart(productID, 1);
                }
            }
        });
    }
    else {
        easyDialog.open({
            container: 'showLogOrReg'
        })
    }
}

/*得到金额（获取两位小数点）*/
function ToMoney(x) {
    var f_x = parseFloat(x);
    if (isNaN(f_x)) {
        alertPop('function:changeTwoDecimal->parameter error');
        return false;
    }
    f_x = Math.round(x * 100) / 100;
    var s_x = f_x.toString();
    var pos_decimal = s_x.indexOf('.');
    if (pos_decimal < 0) {
        pos_decimal = s_x.length;
        s_x += '.';
    }
    while (s_x.length <= pos_decimal + 2) {
        s_x += '0';
    }
    return s_x;
}


//套餐购买
function CreatePackageToCart(packageId) {
    jQuery.ajax({
        url: "/Cart/CreatePackageToCart?packageId=" + packageId,
        type: "GET",
        cache: false,
        success: function (data) {
            if (data == "true") {
                getCartProduct();
                $("#txtResult").text("商品添加成功！");
                easyDialog.open({ container: 'divSuccess' });
            }
            else {
                $("#txtResult").text(data);
                easyDialog.open({ container: 'divSuccess' });
            }
        }
    });
}

//特卖
function getSpecialOfferCacheTime() {
    $.ajax({
        url: '/Cart/GetSpecialOfferCacheProductTimeSeconds',
        type: 'get',
        cache: false,
        success: function (data) {
            clearInterval(sotimer);
            $(".ctimeInfo").html("");
            $(".ctimew").css("display", "none");
            maxsotime = data;
            sotimer = setInterval("CountDown()", 1000);
        }
    });
}
var maxsotime = 0
function CountDown() {
    if (maxsotime > 0) {
        minutes = Math.floor(maxsotime / 60);
        seconds = Math.floor(maxsotime % 60);
        $(".ctimeInfo").html("请在<b>" + minutes + "</b>分<b>" + seconds + "</b>秒内提交订单，下单后您还有<b>30</b>分钟的支付时间。 ");
        --maxsotime;
    }
    else {
        clearInterval(sotimer);
        $(".ctimeInfo").html("超时了～～马上点击去结算抢回有货的商品吧！ ");
    }
    $(".ctimew").css("display", "inline-block");
}
sotimer = "";

$(function () {
    $(".ctimew").hover(function () {
        $(this).children(".ctimeWarn").show();
    }, function () {
        $(this).children(".ctimeWarn").hide();
    });
});

//换购
function AddRedemption(cartId, wareSkuCode) {
    $.ajax({
        url: "/Cart/AddRedemption",
        type: "POST",
        cache: false,
        dataType: "json",
        data: { cartId: cartId, wareSkuCode: wareSkuCode },
        success: function (data) {
        }
    });
}
function removeRedemption(cartId) {
    if (cartId) {
        $.ajax({
            url: "/Cart/DeleteRedemption?cartId=" + cartId,
            type: "post",
            success: function (data) {
                if (data) {
                }
                else {
                    alertPop('删除失败，请重试！');
                }
            }
        });
    }
}
//选择对应赠品
function selectGiftsAndRedemps() {
    var giftCarts = $('.giftCart');
    for (var i = 0; i < giftCarts.length; i++) {
        var cartIdArr = $(giftCarts[i]).val().split('_');
        var allSel = true;
        for (var j = 0; j < cartIdArr.length; j++) {
            if (cartIdArr[j] != '' && !$('#' + cartIdArr[j]).parent().hasClass('on')) {
                allSel = false;
            }
        }
        if (allSel) {
            $(giftCarts[i]).parent().addClass('on');
            $(giftCarts[i]).parent().parent().parent().parent().addClass("act");
        }
        else {
            $(giftCarts[i]).parent().removeClass('on');
            $(giftCarts[i]).parent().parent().parent().parent().removeClass("act");
        }
    }
    var redempCarts = $('.redempCart');
    for (var i = 0; i < redempCarts.length; i++) {
        var cartIdArr = $(redempCarts[i]).val().split('_');
        var allSel = true;
        for (var j = 0; j < cartIdArr.length; j++) {
            if (cartIdArr[j] != '' && !$('#' + cartIdArr[j]).parent().hasClass('on')) {
                allSel = false;
            }
        }
        if (allSel) {
            $(redempCarts[i]).parent().addClass('on');
            $(redempCarts[i]).parent().parent().parent().parent().addClass("act");
        }
        else {
            $(redempCarts[i]).parent().removeClass('on');
            $(redempCarts[i]).parent().parent().parent().parent().removeClass("act");
        }
    }
}


function IsDobuleTime() {
    var a = new Date(2015, 11, 10, 18, 0, 0, 0);
    var b = new Date(2015, 11, 12, 20, 0, 0, 0);
    var d = new Date();
    var now = new Date(d.getFullYear(), d.getMonth() + 1, d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds(), 0);
    if (now >= a && now < b) {
        return true;
    }
    return false;
}