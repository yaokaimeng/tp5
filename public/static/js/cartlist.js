var memberDomain = urlConfig.user;
var productDomain = urlConfig.pc;
var resDomain = urlConfig.res;
var kadSellerCode = SellerConfig.kadSellerCode;
var debugCart = false; //调试的时候用 显示购物车商品Id
var kadCartConfig = {
    //无图
    NoPic: resDomain + "/theme/default/img/nopic.gif",
    //购物车商品科室集
    CartWareDepartments: [],
    //凑单商品
    CartSingleOrderProducts: [],
    //价格区间的选中
    CartSingleOrderTabIndex: 0,
    //商品选中
    CartSingleOrderProIndexCacheKey: "SingleOrderProIndexKey",
    AddCartView: {
        /**
         *  @param {String} id 商品ID或套餐ID
         *  @param {Number} buyType 购买类型 0--商品(默认) 1--套餐
         *  @param {Number} qty 购买数量(默认1)
         *  @param {Number} cartType 购物车类型 0-- 正常购物车(默认) 1-- 便捷购物车 2-- 处方再次下单 3-- 扫码下单 4-- 心愿单
         *  @param {Number} origin 来源 1-pc(默认) 13-wap 14-Android 15-iPhone 21-vmall
         */
        CreateNew: function (id, buyType, qty, cartType, origin) {
            var addCartView = {};
            addCartView.Id = id;
            addCartView.BuyType = !!buyType ? buyType : 0;
            addCartView.CartType = !!cartType ? cartType : 0;
            addCartView.Quanlity = !!qty ? qty : 1;
            addCartView.Origin = !!origin ? origin : 1;
            return addCartView;
        }
    }
};
$(function () {
    $(".tuannow_btn").hide();
    $(".tuangoubox p").hover(function () {
        $(this).find(".tuannow_btn").fadeIn();
    }, function () {
        $(this).find(".tuannow_btn").fadeOut("fast");
    });
    GetLogin();
    var _ue = $("#UserEmail").emailMatch({ wrapLayer: "#pUserEmail", autoShow: false, IsCart: true });
    $(window).resize(function () {
        var t = 0, l = 0,
            h = _ue.outerHeight();
        t = _ue.position().top;
        l = _ue.position().left;
        $("#pUserEmail > .mailListBox").css({ "top": h + t, "left": l });
    });

    /*头部手机二维码切换*/
    $(".sjhq").hover(function () {
        $(this).addClass("sjhq_hover").children(".ph_erweim").css("display", "block");
    }, function () {
        $(this).removeClass("sjhq_hover").children(".ph_erweim").css("display", "none");
    });

    getCartProduct();

    $('#selectAll').attr("checked", false);
    selectAllProduct();

    $(".btnclass").hover(function () {
        $(this).attr("class", "btnclass btnclass_hover");

    }, function () {
        $(this).attr("class", "btnclass");
    });

    $(".change").click(function () {
        var cal = $(this).parents(".change_box").attr("class");
        if (cal == "login_box change_box") {
            $(".selthis").html("注册成为会员");
        }
        else {
            $(".selthis").html("登录康爱多");
        }
        $(this).parents(".change_box").hide().siblings().show();
    });

    $("div[data-valmsg-for]").each(function (i) {
        if ($.trim($(this).children().text()).length > 0) {
            $(this).css("display", "block");
        }
    });

    /*弹出框关闭按钮*/
    $("#closeLog").hover(function () { $(this).css("color", "#E60012"); }, function () { $(this).css("color", "#858484"); });
});


function CreateCart(productId, q) {
    jQuery.ajax({
        url: "/Cart/Creat?productId=" + productId + "&quantity=" + $("#q").val(),
        type: "post",
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

function getName(v) {
    var name = '';
    if (v.DetailType == 2)
        name = "赠品";
    else if (v.DetailType == 3)
        name = "换购";
    else if (v.DetailType == 5)
        name = "秒杀";
    //else if (v.DetailType == 6)
    //    name = "秒杀";
    if (name != '')
        return '<font style="color:#ff0000;">[' + name + ']</font> ' + v.WareName + ' [X' + v.Qty + ']';
    return v.WareName;
}

function closePop() {
    $('.popCart').hide();
}

function confirmRedemption(sellerCode, cartId) {
    var wareSkuCode = $('.popCart input:checked').val();
    var v = $('.popCart input:checked').attr('val');
    var img = $('.popCart').find('img').attr('src');
    if (wareSkuCode == null) {
        alertPop('请选择换购的商品！');
        return;
    }

    if (wareSkuCode && cartId) {
        $('.btnRedemption').css({ 'background-color': '#ccc', 'color': '#000' }).attr('disabled', true);
        $.ajax({
            url: "/Cart/AddRedemption",
            type: "POST",
            cache: false,
            dataType: "json",
            data: { cartId: cartId, wareSkuCode: wareSkuCode },
            success: function (data) {
                //if (data.Result) {
                //    if (confirm('【' + data.wareName + '】已参加【' + data.promotionName + '】换购活动,同一换购活动每次只能参加一次，是否移除【' + data.wareName + '】的换购商品，用此商品参加换购活动?')) {

                //    }
                //}
                getCartProduct();
            }
        });
    }
    $('.popCart').hide();
}

function DelRedemption(e, cartId) {
    confirmPop('确定删除此换购商品吗？', function () {
        confirmDelRedemption(cartId);
    })
}

function chkRedemption(o, el) {
    var $inputs = $('.' + el + ' input[type="checkbox"]');
    for (var i = 0; i < $inputs.length; i++) {
        if ($inputs[i] != o) {
            $inputs[i].checked = false;
        }
        else {
            $inputs[i].checked = o.checked;
        }
    }
}

function showRedemption(cartId, o, sellerCode, redemptionCode) {
    if (cartId == '')
        return false;
    if (sellerCode == '')
        return false;
    if (redemptionCode == undefined)
        redemptionCode = '';

    $.ajax({
        url: "/Cart/GetCartRedemption",
        type: "POST",
        cache: false,
        dataType: "json",
        data: { CartId: cartId, SellerCode: sellerCode },
        success: function (data) {
            if (data) {
                var x = $(o).offset().top + 26;
                var y = $(o).offset().left;
                var str = '';
                str += '<div class="popCart">';
                str += '<h4>请选择换购商品，数量有限，换完即止 <span class="close" onclick="closePop()">X</span></h4>';
                str += '<ul>';
                str += '<li style="height:210px;overflow-y:auto;overflow-x:hidden;">';
                str += '<table  style="width:430px;">';

                $.each(data, function (i, ent) {
                    var check = redemptionCode == ent.WareSkuCode ? 'checked="checked"' : '';
                    str += '<tr ' + (i % 2 == 0 ? "class=\"cur\"" : "") + '>';
                    str += '<td><input name="redemptionList" type="checkbox" ' + check + ' onclick="chkRedemption(this,\'popCart\')" value="' + ent.WareSkuCode + '" val=' + ent.Price + '|' + ent.Qty + ' /><input type="hidden" id="wareCode_' + ent.WareSkuCode + '" value="' + cartId + "|*|" + ent.WareName + '" /></td>';
                    str += '<td><a href="' + GetProductUrl(ent.WareSkuCode) + '" target="_blank"><img src="' + ent.MainPic + '" alt="' + ent.WareName + '"></a></td>';
                    str += '<td valign="top">';
                    str += '<a href="' + GetProductUrl(ent.WareSkuCode) + '" target="_blank">' + ent.WareName + '... ×' + ent.Qty + '</a>';
                    str += '<p class="price">￥ ' + ent.Price.toFixed(2) + '</p>';
                    str += '</td>';
                    str += '</tr>';
                });
            }

            str += '</table>';
            str += '</li>';
            str += '<li>';
            str += '<table class="toolBar">';
            str += '<tr>';
            str += '<td><button class="btnConfirm" onclick="confirmRedemption(\'' + sellerCode + '\',\'' + cartId + '\')">确认</button><button class="btnCancel" onclick="closePop()">取消</button></td>';
            str += '</tr>';
            str += '</table>';
            str += '</li>';
            str += '</ul>';
            str += '</div>';
            if ($('.popCart').length > 0) {
                $('.popCart').remove();
            }
            $('#divCartContent1').append(str);

            $('.popCart').css({ 'left': y, 'top': x }).show();
        }
    });
}

//获取购物车商品
function getCartProduct() {
    $('#loadingCart').show();
    $('.btnRedemption').css({ 'background-color': '#ccc', 'color': '#000' }).attr('disabled', true);
    $.ajax({
        url: "/Cart/GetCartList",
        type: "POST",
        cache: false,
        dataType: "json",
        data: {},
        success: function (data) {
            if (data && data.cartView.IsOverLimit && data.cartView.HadAdjusted) {//超限且已自动调整
                alertPop(data.cartView.OverLimitTips, function () {
                    initCartHtml(data);
                });
            }
            else {
                initCartHtml(data);
            }
        }
    });
}

function initCartHtml(data) {
    kadCartConfig.CartWareDepartments = [];
    $(".cart-thead").hide();
    $(".cart-body").hide();
    $(".settle-0accounts").hide();
    $("#cart-nothings").hide();
    if (data) {
        $('#h_CartCount').val(data.cartView.TotalItemCount);
        var jn = data.cartView;
        var kadHtml = '';
        var otherSellerHtml = '';
        var giftHtml = '';
        var totalProductCount = 0;
        var freightCost = 0;
        var total = 0;
        var iconStr = '';
        if (!jn)
            return;
        if (jn.ApiException == '同一商品不能参与多个同一类型的活动') {
            alertPop('同一商品不能参与多个同类型的活动');
            return;
        }

        var allWareCodes = '';
        if (jn.SellerCart && jn.SellerCart.length > 0) {
            //购物车主体
            $.each(jn.SellerCart, function (i, obj) {

                //拼接全部商品编码
                $.each(obj.DetailList, function (z, detail) {
                    allWareCodes += detail.WareCode + ",";
                });

                var rxTotal = 0;
                var notRxTotal = 0;
                var strRxHtml = "";
                var strNotRxHtml = "";
                var cartList = obj.CartList;
                var giftList = obj.CartGiftList;
                totalProductCount = obj.TotalProductCount;
                freightCost = obj.FreightCost;
                if (cartList && cartList.length > 0) {
                    var isRx = false;
                    $.each(cartList, function (i, ent) {
                        isRx = ent.IsRx;
                        var sku = ent.WareSkuList;
                        var str = '';
                        var trRedemption = '';
                        var promotionPrice = 0;

                        //赠品
                        //str += getGift(ent, obj);

                        str += '<li><div class="disb item1"><label for="" class="single-chose"><i><input type="checkbox" class="check-box-input" name="product" id="' + ent.CartId + '" value="' + ent.CartId + '" redemp="' + (ent.RedemptionWareCode == null ? '' : ent.RedemptionWareCode) + '" onclick="changeSelect(this)"></i></label></div>';

                        str += '<div class="disb item2">';
                        if (ent.BuyType == 0 && sku) {
                            var cartIndex = 1;
                            $.each(sku, function (i, sub) {
                                if (sub.DetailType != 4 && cartIndex == 1) {
                                    if (sub.DetailType != 2 || (sub.DetailType == 2 && sub.GivingWay != 1)) {
                                        str += '<a href="' + GetProductUrl(sub.WareSkuCode) + '" target="_blank" title="' + sub.WareName + '">' + (debugCart ? sub.WareSkuCode : "") + '<img src="' + sub.MainPic + '" alt="' + sub.WareName + '"></a>';
                                    }
                                    else {
                                        var giftCode = ent.GiftWareCode;
                                        if (giftCode != null && giftCode != '') {
                                            var arr = giftCode.split(',');
                                            $.each(arr, function (i, v) {
                                                if (v == sub.WareSkuCode) {
                                                    str += '<a href="' + GetProductUrl(sub.WareSkuCode) + '" target="_blank" title="' + sub.WareName + '">' + (debugCart ? sub.WareSkuCode : "") + '<img src="' + sub.MainPic + '" alt="' + sub.WareName + '"></a>';
                                                    return false;
                                                }
                                            });
                                        }
                                    }
                                    cartIndex++;
                                }
                                //科室
                                if (sub.DetailType != 2 && sub.Department != '' && sub.Department != null && kadCartConfig.CartWareDepartments.indexOf(sub.Department) == -1) {
                                    kadCartConfig.CartWareDepartments.push(sub.Department);
                                }
                            });
                        }

                        if (ent.BuyType == 1 && sku) {
                            $.each(sku, function (i, sub) {
                                if (sub.DetailType == 4 && sub.IsKeyWare) {
                                    str += '<a href="' + GetProductUrl(sub.WareSkuCode) + '" target="_blank" title="' + sub.WareName + '">' + (debugCart ? sub.WareSkuCode : "") + '<img src="' + sub.MainPic + '" alt="' + sub.WareName + '"></a>';
                                    if (sub.IsRx) {
                                        isRx = sub.IsRx;
                                    }
                                }
                                //科室
                                if (sub.DetailType != 2 && sub.Department != '' && sub.Department != null && kadCartConfig.CartWareDepartments.indexOf(sub.Department) == -1) {
                                    kadCartConfig.CartWareDepartments.push(sub.Department);
                                }
                            });
                        }
                        str += '</div>';

                        str += '<div class="disb item3">';
                        var tip = ""
                        if (ent.BuyType == 1) {
                            tip = '[子产品]';
                            //str += '</td><td class="td2" id="td_prdocuctName" idx="' + ent.PackageId + '"><font color="red">[套餐]</font> ' + (debugCart ? ent.PackageId : "") + ' ' + ent.PackageName + '<br/>';
                            str += '<p><i class="icon0">[套餐]</i><a href="javascript:;;" target="_blank" title="' + ent.PackageName + '" style="cursor: text;text-decoration: none;">' + (debugCart ? ent.PackageId + " " : "") + ent.PackageName + '</a></p>';
                        }
                        else {
                            //str += '</td><td class="td2" id="td_prdocuctName2" align="center">';
                            if (sku) {
                                $.each(sku, function (i, sub) {
                                    iconStr = getIconStr(sub.IconType);
                                    if (sub.DetailType != 2 || (sub.DetailType == 2 && sub.GivingWay != 1)) {
                                        //str += '<a href="' + productDomain + '/product/' + sub.WareSkuCode + '.shtml" title="' + sub.WareName + '" target="_blank">' + getName(sub) + '</a><br/>';
                                        if (sub.DetailType == 1 || sub.DetailType == 5 || sub.DetailType == 6) {
                                            str += '<p><i class="icon0 ' + iconStr + '"></i><a href="' + GetProductUrl(sub.WareSkuCode) + '" target="_blank" title="' + sub.WareName + '">' + getName(sub) + '</a></p>';
                                        }
                                        else {
                                            str += '<p class="children-pro"><img src="' + resDomain + '/theme/default/img/user/2015/tc_icon.png" alt=""><a href="' + GetProductUrl(sub.WareSkuCode) + '" target="_blank">' + getName(sub) + '</a></p>';
                                        }
                                    }
                                    else {
                                        var giftCode = ent.GiftWareCode;
                                        if (giftCode != null && giftCode != '') {
                                            var arr = giftCode.split(',');
                                            $.each(arr, function (i, v) {
                                                if (v == sub.WareSkuCode) {
                                                    //str += '<a href="' + productDomain + '/product/' + sub.WareSkuCode + '.shtml" title="' + sub.WareName + '" target="_blank">' + getName(sub) + '</a><br/>';
                                                    str += '<p class="children-pro"><img src="' + resDomain + '/theme/default/img/user/2015/tc_icon.png" alt=""><a href="' + GetProductUrl(sub.WareSkuCode) + '" target="_blank">' + getName(sub) + '</a></p>';
                                                    return false;
                                                }
                                            });
                                        }
                                    }
                                });
                            }
                        }

                        if (ent.BuyType == 1 && sku) {
                            $.each(sku, function (i, sub) {
                                if (sub.DetailType == 4) {
                                    //str += '<a href="' + productDomain + '/product/' + sub.WareSkuCode + '.shtml" title="' + sub.WareName + '" target="_blank">' + tip + sub.WareName + ' [X' + sub.Qty + ']</a><br/>';
                                    str += '<p class="children-pro"><img src="' + resDomain + '/theme/default/img/user/2015/tc_icon.png" alt=""><a href="' + GetProductUrl(sub.WareSkuCode) + '" target="_blank">' + tip + sub.WareName + ' [X' + sub.Qty + ']</a></p>';
                                }
                            });
                            //赠品
                            //if (gift) {
                            //    $.each(gift, function (i, v) {
                            //        var name = "";
                            //        if (v.DetailType == 2)
                            //            name = "赠品";
                            //        else if (v.DetailType == 3)
                            //            name = "换购";
                            //        giftHtml += '<tr class="bgColor"><td class="td0" width="25px"></td><td class="td1" width="140px"><a href="' + productDomain + '/product/' + v.WareSkuCode + '.shtml" alt="' + name + ' ' + v.WareName + ' [X' + v.Qty + ']" title="' + name + ' ' + v.WareName + ' [X' + v.Qty + ']" target="_blank"><img src="' + v.MainPic + '" alt="' + name + ' ' + v.WareName + ' [X' + v.Qty + ']"></a></td><td class="td2" id="td_prdocuctName2" align="center"><a href="' + productDomain + '/product/' + v.WareSkuCode + '.shtml" title="' + v.MainPic + '" alt="' + name + ' ' + v.WareName + ' [X' + v.Qty + ']" target="_blank">' + name + ' ' + v.WareName + ' [X' + v.Qty + ']</a><br></td><td class="td3">-</td><td class="td5" style="overflow:hidden;"></td><td class="td7">-</td><td class="td8"></td></tr>';
                            //    });
                            //}
                        }
                        str += '</div>';

                        //str += '</td><td class="td3">';
                        //str += "￥" + ent.Price.toFixed(2);
                        str += '<div class="disb item4">¥' + ent.Price.toFixed(2) + '</div>';

                        //str += ' </td><td class="td5" style="overflow:hidden;">';
                        //str += '<i onclick="changeCart(event,\'' + ent.CartId + '\',-1)"></i><input maxlength="3" id="tb_quantity_' + ent.CartId + '" value="' + ent.Quantity + '" onblur="changeCart(event,\'' + ent.CartId + '\',0)" /><samp onclick="changeCart(event,\'' + ent.CartId + '\',1)"></samp>';
                        //str += '</td><td class="td4">';
                        //str += '</td>';
                        str += '<div class="disb item5"><span class="reduct-btn" id="reduct-btn" onclick="changeCart(event,\'' + ent.CartId + '\',-1)">-</span><input type="text" maxlength="3" id="tb_quantity_' + ent.CartId + '" class="num-txt" value="' + ent.Quantity + '" onblur="changeCart(event,\'' + ent.CartId + '\',0)"><span class="reduct-btn" id="add-btn" onclick="changeCart(event,\'' + ent.CartId + '\',1)">+</span></div>';

                        //if (ent.DisPrice > 0) {
                        //    str += "省￥" + ToMoney(ent.DisPrice) + "<br />";
                        //}
                        //else {
                        //    str += "￥0";
                        //}

                        if (ent.DisPrice > 0) {
                            str += '<div class="disb item6">省<span class="save-price">¥' + ToMoney(ent.DisPrice) + '</span>元</div>';
                        }
                        else {
                            str += '<div class="disb item6">省<span class="save-price">¥0.00</span>元</div>';
                        }
                        //str += '<td class="td6" style="display:none;" id="l_course_' + ent.CartId + '">' + Math.round(ent.NetSumAmt) + '</td>';
                        //str += '<td class="td7">￥' + ent.NetSumAmt.toFixed(2) + '</td>';
                        //str += '<div class="disb item7" id="l_course_' + ent.CartId + '" >' + Math.round(ent.NetSumAmt) + '</div>';
                        str += '<div class="disb item8">￥<span id="price_' + ent.CartId + '">' + ent.NetSumAmt.toFixed(2) + '</span></div>';

                        //str += '<td class="td8"><span class="spanDel" id="aCart' + ent.CartId + '" onclick="Delete(event,\'' + ent.CartId + '\');">删除</span>';
                        str += '<div class="disb item9"><span class="delte-btn" id="aCart' + ent.CartId + '" onclick="Delete(event,\'' + ent.CartId + '\');">删除</span></div></li>';

                        str += '<input id="cartId_' + ent.CartId + '" class="cartId" value="' + ent.CartId + '" type="hidden" />';
                        str += '<input id="ProductId_' + ent.CartId + '" value="' + ent.PackageId + '" type="hidden" />';
                        str += '<input id="concession_' + ent.CartId + '" value="0" type="hidden" />';
                        str += '<input id="IsRX_' + ent.CartId + '"  type="hidden"  value="' + (ent.IsRx ? 1 : 0) + '"/>';// 是否处方药
                        str += '<input id="ProductType_' + ent.CartId + '"  type="hidden"  value="' + ent.ProductType + '"/>';
                        //str += '</td></tr>';

                        //换购
                        if (ent.RedemptionList && ent.RedemptionList.length > 0) {
                            //var wareCode = ent.RedemptionWareCode;
                            //if (wareCode) {
                            for (var i = 0; i < ent.RedemptionList.length; i++) {
                                //if (ent.RedemptionList[i].WareSkuCode == wareCode) {
                                var redempCartIds = "";
                                $.each(ent.RedemptionList[i].MainWareCartIds, function (j, cartId) {
                                    redempCartIds += cartId + '_';
                                })
                                if (redempCartIds.lastIndexOf('_') == (redempCartIds.length - 1)) {
                                    redempCartIds = redempCartIds.substring(0, redempCartIds.length - 1);
                                }
                                //style="display: none;"
                                str += '<li><div class="disb item1"><label for="" class="single-chose" style="display: none;"><i><input disabled="disabled" type="checkbox" class="check-box-input redempCart" name="redempPro" id="' + redempCartIds + '" value="' + redempCartIds + '" onclick="changeSelect(this)" disabled="disabled"></i></label></div>';
                                str += '<div class="disb item2">';
                                str += '<a href="' + GetProductUrl(ent.RedemptionList[i].WareSkuCode) + '" target="_blank" title="' + ent.RedemptionList[i].WareName + '">' + (debugCart ? ent.RedemptionList[i].WareSkuCode : "") + '<img src="' + ent.RedemptionList[i].MainPic + '" alt="' + ent.RedemptionList[i].WareName + '"></a>';
                                str += '</div>';
                                str += '<div class="disb item3">';
                                str += '<p><i class="icon0 ' + getIconStr(ent.RedemptionList[i].IconType) + '"></i><a href="' + GetProductUrl(ent.RedemptionList[i].WareSkuCode) + '" target="_blank" title="' + ent.RedemptionList[i].WareName + '">' + '<font style="color:#ff0000;">[换购]</font> ' + ent.RedemptionList[i].WareName + '</a></p>';
                                str += '</div>';
                                str += '<div class="disb item4">¥' + ent.RedemptionList[i].Price.toFixed(2) + '</div>';
                                str += '<div class="disb item5"><span class="reduct-btn" id="reduct-btn" onclick="" disabled="disabled">-</span><input type="text" maxlength="3" id="tb_quantity_redemp_' + redempCartIds + '" class="num-txt" value="' + ent.RedemptionList[i].Qty + '" onblur="" disabled="disabled"><span class="reduct-btn" id="add-btn" onclick="" disabled="disabled">+</span></div>';
                                //str += '<div class="disb item5"><span id="tb_quantity_' + redempCartIds + '">' + ent.RedemptionList[i].Qty + '</span></div>';
                                if (ent.RedemptionList[i].Price - ent.RedemptionList[i].PromotionPrice > 0) {
                                    str += '<div class="disb item6">省<span class="save-price">¥' + ToMoney(ent.RedemptionList[i].Price * ent.RedemptionList[i].Qty - ent.RedemptionList[i].PromotionPrice * ent.RedemptionList[i].Qty) + '</span>元</div>';
                                }
                                else {
                                    str += '<div class="disb item6">省<span class="save-price">¥0.00</span>元</div>';
                                }
                                //str += '<div class="disb item7" id="l_course_redemp_' + redempCartIds + '" >' + Math.round(ent.PromotionPrice) + '</div>';
                                str += '<div class="disb item8">￥<span id="price_redemp_' + redempCartIds + '">' + (ent.RedemptionList[i].PromotionPrice * ent.RedemptionList[i].Qty).toFixed(2) + '</span></div>';

                                str += '<div class="disb item9"><span class="delte-btn" id="aCart_redemp_' + redempCartIds + '" onclick="DelRedemption(event,\'' + ent.CartId + '\');">删除</span></div></li>';
                                promotionPrice += (ent.RedemptionList[i].PromotionPrice * ent.RedemptionList[i].Qty);
                                totalProductCount += 1;
                                //break;
                            }
                            //}
                            //}
                            str += trRedemption;
                        }

                        var totalReslt = ent.NetSumAmt + promotionPrice;
                        if (obj.SellerCode == kadSellerCode) {
                            if (isRx) {
                                strRxHtml += str;
                                rxTotal += totalReslt;
                            }
                            else {
                                strNotRxHtml += str;
                                notRxTotal += totalReslt;
                            }
                        }
                        else {
                            strRxHtml += str;
                            rxTotal += totalReslt;
                        }
                    });
                }
                //赠品
                if (giftList && giftList.length > 0) {
                    var giftStr = '';
                    $.each(giftList, function (i, gift) {
                        var giftCartIds = "";
                        $.each(gift.MainWareCartIds, function (j, cartId) {
                            giftCartIds += cartId + '_';
                        })
                        if (giftCartIds.lastIndexOf('_') == (giftCartIds.length - 1)) {
                            giftCartIds = giftCartIds.substring(0, giftCartIds.length - 1);
                        }
                        //style="display: none;"
                        giftStr += '<li><div class="disb item1"><label for="" class="single-chose" style="display: none;"><i><input disabled="disabled" type="checkbox" class="check-box-input giftCart" name="giftPro" id="' + giftCartIds + '" value="' + giftCartIds + '" onclick="changeSelect(this)" disabled="disabled"></i></label></div>';
                        giftStr += '<div class="disb item2">';
                        giftStr += '<a href="' + GetProductUrl(gift.WareSkuCode) + '" target="_blank" title="' + gift.WareName + '">' + (debugCart ? gift.WareSkuCode : "") + '<img src="' + gift.MainPic + '" alt="' + gift.WareName + '"></a>';
                        giftStr += '</div>';
                        giftStr += '<div class="disb item3">';
                        giftStr += '<p><i class="icon0 ' + getIconStr(gift.IconType) + '"></i><a href="' + GetProductUrl(gift.WareSkuCode) + '" target="_blank" title="' + gift.WareName + '">' + '<font style="color:#ff0000;">[赠品]</font> ' + gift.WareName + '</a></p>';
                        giftStr += '</div>';
                        giftStr += '<div class="disb item4">¥0.00</div>';
                        giftStr += '<div class="disb item5"><span class="reduct-btn" id="reduct-btn" onclick="" disabled="disabled">-</span><input type="text" maxlength="3" id="tb_quantity_' + giftCartIds + '" class="num-txt" value="' + gift.Qty + '" onblur="" disabled="disabled"><span class="reduct-btn" id="add-btn" onclick="" disabled="disabled">+</span></div>';
                        //giftStr += '<div class="disb item5"><span id="tb_quantity_ent.CartId_redemp_' + gift.WareSkuCode + '">' + gift.Qty + '</span></div>';
                        if (gift.Price > 0) {
                            giftStr += '<div class="disb item6">省<span class="save-price">¥0.00</span>元</div>';
                        }
                        else {
                            giftStr += '<div class="disb item6">省<span class="save-price">¥0.00</span>元</div>';
                        }
                        //giftStr += '<div class="disb item7" id="l_course_' + giftCartIds + '" >0.00</div>';
                        giftStr += '<div class="disb item8">￥<span id="price_' + giftCartIds + '">0.00</span></div>';

                        giftStr += '<div class="disb item9"><span class="delte-btn" id="aCartent.CartId_redemp_' + gift.WareSkuCode + '" onclick="DelGifts(\'' + giftCartIds + '\');">' + (gift.GivingWay != 1 ? '' : '删除') + '</span></div></li>';
                        totalProductCount += 1;
                    });
                    if (obj.SellerCode == kadSellerCode) {
                        if (strRxHtml != '') {
                            strRxHtml += giftStr;
                        }
                        else {
                            strNotRxHtml += giftStr;
                        }
                    }
                    else {
                        strRxHtml += giftStr;
                    }
                }
                total += rxTotal + notRxTotal - obj.CouponPrice;

                $('.without-pay span font.save').html("￥" + obj.TotalDisPrice.toFixed(2));
                if (freightCost == 0) {
                    $('.without-pay span.freight-tips').html(window.cartConfig.cartFreePostage);
                    $('.without-pay span.single-order').hide();
                }
                else {
                    $('.without-pay span.freight-tips').html(window.cartConfig.cartPostage.replace("{0}", (parseInt(window.cartConfig.postage) - total).toFixed(2)));
                    $('.without-pay span.single-order').show();
                }
                if (obj.SellerCode == kadSellerCode) {
                    var couponList = '';
                    var couponPrice = 0;
                    if (obj.CouponList && obj.CouponList.length > 0) {
                        couponList = getCoupon(obj, notRxTotal)
                        couponPrice = obj.CouponPrice;
                    }
                    var cartClass = '';
                    strNotRxHtml = strNotRxHtml.length > 0 ? '<!--康爱多--><div class="cart-sectionA "><p class="th-title">康爱多</p><ul class="pro-list-box"><!--OTC-->' + strNotRxHtml + '</ul><p class="total-price kad_notRx_total_price">合计：¥' + ToMoney(notRxTotal - couponPrice) + '</p></div><!--END康爱多-->' : '';
                    if (obj.CouponList && obj.CouponList.length > 0) {
                        couponList = getCoupon(obj, rxTotal)
                        if (strNotRxHtml.length > 0) {
                            couponList = '';
                            couponPrice = 0;
                        }
                    }
                    if (strNotRxHtml.length > 0) {
                        cartClass = ' cart-sectionB';
                    }
                    strRxHtml = strRxHtml.length > 0 ? ('<!--新特药房云景店--><div class="cart-sectionA ' + cartClass + '"><p class="th-title">新特药房云景店</p><ul class="pro-list-box"><!--RX-->' + strRxHtml + '</ul><p class="total-price kad_Rx_total_price">合计：¥' + ToMoney(rxTotal - couponPrice) + '</p></div><!--END新特药房云景店-->') : '';
                    kadHtml += strNotRxHtml + strRxHtml;
                }
                else {
                    var cartClass = '';
                    if (jn.KadSellerCart.IsKadSeller) {
                        cartClass = ' cart-sectionB';
                    }
                    strRxHtml = strRxHtml.length > 0 ? ('<!--其他商家--><div class="cart-sectionA ' + cartClass + '"><p class="th-title">' + obj.SellerName + '</p><ul class="pro-list-box">' + strRxHtml + '</ul><p class="total-price">合计：¥' + ToMoney(rxTotal - obj.CouponPrice) + '</p></div><!--END其他商家-->') : '';
                    otherSellerHtml += strRxHtml;
                }

            });

            //买的人还买了
            var alsoBuyHtml = '';
            if (allWareCodes != '') {
                if (allWareCodes.lastIndexOf(',')) {
                    allWareCodes = allWareCodes.substring(0, allWareCodes.length - 1);
                }
                GetRecommendSearchProducts({
                    pageType: "cart",
                    recomm: "alsobuy",
                    productId: allWareCodes,
                    callback: function (data) {
                        if (data) {
                            $('.buy-other-things').show();
                            var alsoBuyHtml = '';
                            $.each(data, function (i, product) {
                                alsoBuyHtml += '<li><p class="product-pic"><a href="' + GetProductUrl(product.WareSkuCode) + '?ref=alsobuy&kzone=alsobuy" target="_blank"><img src="' + product.Pic180 + '" alt="' + product.WareName + '" title="' + product.WareName + '"></a></p><p class="product-title clearfix"><i id="proIcon_' + product.WareSkuCode + '"></i><a href="' + GetProductUrl(product.WareSkuCode) + '?ref=alsobuy&kzone=alsobuy" target="_blank" title="' + product.WareName + '">' + product.WareName + '  ' + product.Adv + '</a></p><p class="product-price">¥' + parseFloat(product.SalePrice).toFixed(2) + '</p></li>';
                            })
                            $('.buy-pro-list .pro-box ul').html(alsoBuyHtml);
                            alsoBuy();
                            if (alsoBuyHtml == '') {
                                $('.buy-other-things').hide();
                            }
                        }
                        else {
                            $('.buy-other-things').hide();
                        }
                    }
                });
            }

            $(".product-total-price").text("￥" + ToMoney(total));
            $("#h_totalPrice").val(ToMoney(total));
            $(".product-nums").text(jn.TotalItemCount);
            $(".cart-body").html(kadHtml + otherSellerHtml + giftHtml);
            $(".cart-thead").show();
            $(".cart-body").show();
            $(".settle-0accounts").show();
            var isSpecialOffer = jn.HasSpecialOffer;
            //特卖
            if (isSpecialOffer) {
                getSpecialOfferCacheTime();
            } else {
                clearInterval(sotimer);
                $(".ctimeInfo").html("");
                $(".ctimew").css("display", "none");
            }
            $('.btnRedemption').css({ 'background-color': '#ff0000', 'color': '#fff' }).attr('disabled', false);
            if ($('#CartCount').html() == "0") {
                $("#divCartContent2").show();
                $("#divCartContent1").hide();
                $("#productChBox").hide();
                //特卖倒计时
                clearInterval(sotimer);
                $(".soTimer").html("");
            }
        }
        else {
            clearInterval(sotimer);
            $(".ctimeInfo").html("");
            $(".ctimew").css("display", "none");
            $("#cart-nothings").show();
        }
    }
    $('#loadingCart').hide();
    selectChecked();
}

function KeepToDecimal(price) {
    if (price == undefined)
        return 0;
    return (price * 100 >> 0) / 100;
}

function v_coupon(sellerCode) {
    $('.couponTip').hide();
    $('#couponTip_' + sellerCode).show();
}

function confirmCoupon(sellerCode) {
    var couponCode = '';
    var couponName = '';

    $('#couponTip_' + sellerCode).find('input[name="couponCode_' + sellerCode + '"]').each(function () {
        if (this.checked) {
            couponCode = this.value;
            couponName = $(this).attr('text');
            return false;
        }
    });
    $.ajax({
        url: "/Cart/SaveCoupon",
        type: "POST",
        cache: false,
        data: 'sellerCode=' + sellerCode + '&couponCode=' + couponCode,
        success: function (data) {
            getCartProduct();
        }
    });
}

function delCoupon(sellerCode, couponCode) {
    $.ajax({
        url: "/Cart/DeleteCouponByCart",
        type: "POST",
        cache: false,
        data: 'sellerCode=' + sellerCode + '&couponCode=' + couponCode,
        success: function (data) {
            getCartProduct();
        }
    });
}

function clearCoupon(sellerCode) {
    //$('#couponTip_' + id).find('input[name="couponCode"]').attr('checked', false);
    //$('#couponText_' + id).html('');
    $('#couponTip_' + sellerCode).hide();
}

function showGift(cartId, sellerCode) {
    $('#cartId_' + sellerCode + '_' + cartId + '').show();
}

function closeGiftPop(cartId, sellerCode) {
    $('#cartId_' + sellerCode + '_' + cartId + '').hide();
}

function confirmGift(o, cartId, sellerCode) {
    var giftCode = '';
    $('#cartId_' + sellerCode + '_' + cartId + '').find('input[name="giftCode"]').each(function () {
        if (this.checked) {
            giftCode += this.value + ',';
        }
    });
    $.ajax({
        url: "/Cart/SaveGift",
        type: "POST",
        cache: false,
        data: 'cartId=' + cartId + '&sellerCode=' + sellerCode + '&giftCode=' + giftCode,
        success: function (data) {
            getCartProduct();
        }
    });
}

//判断是否有赠品
function isGift(ent) {
    var result = false;
    $.each(ent.WareSkuList, function (i, ent) {
        if (ent.DetailType == 2) {
            result = true;
            return false;
        }
    });
    return result;
}


function getGift(ent, obj) {
    if (ent == null ||
        !ent.AutoGivingWay)
        return '';
    if (!isGift(ent)) {
        return '';
    }
    var str = '';
    str += '<tr><td colspan="7" class="redemption" style="position:relative;"><button class="btnGift" style="width:60px;" type="button" onclick="showGift(\'' + ent.CartId + '\',\'' + obj.SellerCode + '\')">领取赠送</button>';
    str += '<div id="cartId_' + obj.SellerCode + '_' + ent.CartId + '" class="popGifCart" style="display:none;">';
    str += '<h4>请选择赠品商品，数量有限，领完即止 <span class="close" onclick="closeGiftPop(\'' + ent.CartId + '\',\'' + obj.SellerCode + '\')">X</span></h4>';
    str += '<ul>';
    str += '<li style="height:210px;overflow-y:auto;overflow-x:hidden;">';
    str += '<table  style="width:430px;">';

    var arr;

    if (ent.GiftWareCode != '' && ent.GiftWareCode != null) {
        arr = ent.GiftWareCode.split(',');
    }

    if (ent.BuyType == 0 && ent.WareSkuList) {
        $.each(ent.WareSkuList, function (i, ent) {
            if (ent.DetailType == 2) {
                var check = '';
                if (arr) {
                    $.each(arr, function (i, v) {
                        if (v == ent.WareSkuCode) {
                            check = 'checked="checked"';
                            return false;
                        }
                    });
                }
                str += '<tr ' + (i % 2 == 0 ? "class=\"cur\"" : "") + '>';
                str += '<td><input name="giftCode" onclick="chkRedemption(this,\'popGifCart\')"  type="checkbox" ' + check + ' value="' + ent.WareSkuCode + '" val=' + ent.Price + '|' + ent.Qty + ' /><input type="hidden" id="wareCode_' + ent.WareSkuCode + '" value="' + ent.CartId + "|*|" + ent.WareName + '" /></td>';
                str += '<td><a href="' + GetProductUrl(ent.WareSkuCode) + '" target="_blank"><img src="' + ent.MainPic + '" alt="' + ent.WareName + '"></a></td>';
                str += '<td valign="top">';
                str += '<a href="' + GetProductUrl(ent.WareSkuCode) + '" target="_blank">' + ent.WareName + '... ×' + ent.Qty + '</a>';
                str += '<p class="price">￥ ' + ent.Price.toFixed(2) + '</p>';
                str += '</td>';
                str += '</tr>';
            }
        });
    }
    str += '</table>';
    str += '</li>';
    str += '<li>';
    str += '<table class="toolBar">';
    str += '<tr>';
    str += '<td><button class="btnConfirm" onclick="confirmGift(this,\'' + ent.CartId + '\',\'' + obj.SellerCode + '\')">确认</button><button class="btnCancel" onclick="closeGiftPop(\'' + ent.CartId + '\',\'' + obj.SellerCode + '\')">取消</button></td>';
    str += '</tr>';
    str += '</table>';
    str += '</li>';
    str += '</ul>';
    str += '</div>';

    str += '</td></tr>';
    return str;
}

function getCoupon(obj, total) {
    if (obj.CouponList.length == 0)
        return '';

    var couponName = '';
    $.each(obj.CouponList, function (i, ent) {
        if (obj.CouponCode != '' && obj.CouponCode == ent.CouponCode) {
            couponName = '已选优惠：' + ent.CouponName + '<em class="delCoupon" onclick="delCoupon(\'' + obj.SellerCode + '\',\'' + ent.CouponCode + '\')">删除</em>';
            return false;
        }
    });

    var str = '<div class="couponFrame"><div class="v_coupon" onclick="v_coupon(\'' + obj.SellerCode + '\')">优惠券<span class="arrow"></span></div> <strong id="couponText_' + obj.SellerCode + '" class="couponText">' + couponName + '</strong>';
    str += '<div id="couponTip_' + obj.SellerCode + '" class="couponTip">';
    str += '<span class="coupon-close-x" onclick="$(\'#couponTip_' + obj.SellerCode + '\').hide()">close</span>';
    str += '<div id="ks-content-tilte" class="ks-content-tilte">';
    str += '<div class="coupon-summary">';
    str += '<span class="icon-announcement"></span>请选择电子优惠券';
    str += '</div>';
    str += '<div class="coupon-list">';
    str += '<ul>';
    $.each(obj.CouponList, function (i, ent) {
        var checked = 'checked="checked"';
        if (obj.CouponCode == '' || obj.CouponCode != ent.CouponCode) {
            checked = '';
        }
        var disabled = 'disabled="disabled"';
        if (total >= ent.LimitedAmt)
            disabled = '';
        str += '<li>';
        str += '<div class="selectCoupon"><input name="couponCode_' + obj.SellerCode + '" type="radio" value="' + ent.CouponCode + '" text="' + ent.CouponName + '" ' + checked + ' ' + disabled + ' /></div>';
        str += '<div class="coupon-detail">';
        str += '<div class="coupon-info">';
        str += '<p class="coupon-title">' + ent.CouponName + '</p>';
        str += '<p class="coupon-time">结束时间 ' + ent.EndTime + '</p>';
        str += '</div>';
        str += '<div class="coupon-op"><div class="coupon-amount"><span class="rmb">¥</span>5</div></div>';
        str += '</div>';
        str += '</li>';
    });
    str += '</ul>';
    str += '<div class="btnOK"><span onclick="confirmCoupon(\'' + obj.SellerCode + '\')">使 用</span> <span onclick="clearCoupon(\'' + obj.SellerCode + '\')">取消</span></div>';
    str += '</div>';
    str += '<div class="hr"></div>';
    str += '<span class="arrow"></span>';
    str += '</div></div></div>';
    return str;
}

//保持选中状态
function selectChecked() {
    var cartIDS = "";
    $('#full-chose-input').parent().addClass('on')
    $("#cartIds").val("");
    $.each($("input[name='product']"), function () {
        $(this).parent().addClass('on');
        cartIDS += $(this).val() + ",";
        $(this).parent().parent().parent().parent().addClass("act");
    });
    //giftPro
    $.each($("input[name='giftPro']"), function () {
        $(this).parent().addClass('on');
        //cartIDS += $(this).val() + ",";
        $(this).parent().parent().parent().parent().addClass("act");
    });
    //redempPro
    $.each($("input[name='redempPro']"), function () {
        $(this).parent().addClass('on');
        //cartIDS += $(this).val() + ",";
        $(this).parent().parent().parent().parent().addClass("act");
    });
    var num = cartIDS.lastIndexOf(',');
    cartIDS = cartIDS.substring(0, num);
    $("#cartIds").val(cartIDS);
    $('#full-chose-input-end').parent().addClass('on');
    updateCartSelectState(cartIDS, true);
}

//购物车数量
function getSelectProCount() {
    var ids = $("#cartIds").val();
    var count = 0;
    if (ids.length > 0) {
        var cartIdArr = ids.split(',');
        count = cartIdArr.length;
        //赠品对应的主商品是否全选
        var giftCarts = $('.giftCart');
        for (var i = 0; i < giftCarts.length; i++) {
            var cartIdArr = $(giftCarts[i]).val().split(',');
            var allSel = true;
            for (var j = 0; j < cartIdArr.length; j++) {
                if (cartIdArr[j] != '' && !$('#' + cartIdArr[j]).parent().hasClass('on')) {
                    allSel = false;
                }
            }
            //if (allSel) {
            //    count += 1;
            //}
        }
        //换购对应的主商品是否全选
        var redempCarts = $('.redempCart');
        for (var i = 0; i < redempCarts.length; i++) {
            var cartIdArr = $(redempCarts[i]).val().split(',');
            var allSel = true;
            for (var j = 0; j < cartIdArr.length; j++) {
                if (cartIdArr[j] != '' && !$('#' + cartIdArr[j]).parent().hasClass('on')) {
                    allSel = false;
                }
            }
            //if (allSel) {
            //    count += 1;
            //}
        }
        $(".product-nums").text(count);
    }
    else {
        $(".product-nums").text(0);
    }
    return count;
}

function txtfocus(obj) {
    var idstr = obj.id;
    var idstr_pw = obj.id.substr(5);
    var input_val = $(obj).val();
    var valText = $.trim($("div[data-valmsg-for=\"" + idstr + "\"]").text());
    $(obj).siblings(".txt_icon").hide().attr("class", "txt_icon");
    $(obj).addClass("input_hover");
    $(obj).parents(".txtClass").removeClass("p_error");
    if (input_val == "密码必须为6-20位数字和字符" || input_val == "请再输入一次密码") {
        $(obj).css("display", "none");
        $("#" + idstr_pw).css("display", "block").focus();
    }

    if (input_val == "邮箱/手机号/用户名" || input_val == "邮箱/手机号") {
        $(obj).css("color", "#333");
        $(obj).val("");
    }
    $(obj).siblings(".txt_icon").hide().attr("class", "txt_icon");
    $(obj).addClass("input_hover").removeClass("input_error");
    $(obj).siblings(".txt_icon").hide().attr("class", "txt_icon");
    $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "none");
    if (valText == "") {
        $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "none");
        $("span[data-valmsg-for=\"" + idstr + "\"]").empty();
        if (idstr == "Password") {
            //$("span[data-valmsg-for=\"ConfirmPassword\"]").empty();
        }
    } else {
        $("div[data-warnmsg-for=\"" + idstr + "\"]").css("display", "none");
        $("span[data-valmsg-for=\"" + idstr + "\"]").empty();
        return true;
    }
}

function txtblur(obj) {
    var idstr = obj.id;
    $(obj).removeClass("input_hover");
    $("div[data-warnmsg-for=\"" + idstr + "\"]").css("display", "none");
    var isOk = true;
    var input_val = $.trim($(obj).val());

    if ($(obj).attr("data-val")) {

        /* 1.判断格式 */
        if (isOk == true && typeof ($(obj).attr("data-val-regex")) != "undefined") {
            var pattern = $(obj).attr("data-val-regex-pattern");
            var regx = new RegExp(pattern);
            if (input_val == "") {/*为空，提示data-val-required*/
                $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block").css("top", $("div[data-valmsg-for=\"" + idstr + "\"]").parent().height() - $("div[data-valmsg-for=\"" + idstr + "\"]").height() - $(obj).height() + 8);
                $("span[data-valmsg-for=\"" + idstr + "\"]").text($(obj).attr("data-val-required"));
                $(obj).addClass("input_error");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                $(obj).val("");
                isOk = false;
            }
            else if (regx.test(input_val) == true) {/*正确*/
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                $(obj).removeClass("input_error");
            }
            else {/*格式不正确，提示data-val-regex*/
                $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block").css("top", $("div[data-valmsg-for=\"" + idstr + "\"]").parent().height() - $("div[data-valmsg-for=\"" + idstr + "\"]").height() - $(obj).height() + 8);
                $("span[data-valmsg-for=\"" + idstr + "\"]").text($(obj).attr("data-val-regex"));
                $(obj).addClass("input_error");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                isOk = false;
            }
        }
        /* 2.判断为空(排除全0) */
        if (isOk == true && typeof ($(obj).attr("data-val-required")) != "undefined") {

        }

        /* 3.判断长度 */
        if (isOk == true && typeof ($(obj).attr("data-val-length")) != "undefined") {
            var data = $(obj).val();
            var max = $(obj).attr("data-val-length-max");
            var min = $(obj).attr("data-val-length-min");
            if (data.length < min || data.length > max) {/*判断长度*/
                $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block").css("top", $("div[data-valmsg-for=\"" + idstr + "\"]").parent().height() - $("div[data-valmsg-for=\"" + idstr + "\"]").height() - $(obj).height() + 8);
                $("span[data-valmsg-for=\"" + idstr + "\"]").text($(obj).attr("data-val-length"));
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                $(obj).addClass("input_error");
                isOk = false;
            }
            else {
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                $(obj).removeClass("input_error");
            }

        }
        /* 4.关联验证(确认密码) */
        if (isOk == true && typeof ($(obj).attr("data-val-equalto")) != "undefined") {
            var objId = $(obj).attr("data-val-equalto-other").substring(2, $(obj).attr("data-val-equalto-other").length);
            var data = $(obj).val();
            var max = $(obj).attr("data-val-length-max");
            var min = $(obj).attr("data-val-length-min");
            if ($("#" + objId).val() != "" && $(obj).val() != "") {
                if ($("#" + objId).val() != $(obj).val()) {/*验证两处值是否相等*/
                    var obj2 = document.getElementById("ConfirmPassword");
                    $("div[data-valmsg-for=\"" + obj2.id + "\"]").css("display", "block").css("top", $("div[data-valmsg-for=\"" + idstr + "\"]").parent().height() - $("div[data-valmsg-for=\"" + idstr + "\"]").height() - $(obj).height() + 8);
                    $("span[data-valmsg-for=\"" + obj2.id + "\"]").text($(obj).attr("data-val-equalto"));
                    $(obj2).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                    $(obj2).addClass("input_error");
                    isOk = false;
                }
                else if (data.length < min || data.length > max) {/*验证长度*/
                    $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block").css("top", $("div[data-valmsg-for=\"" + idstr + "\"]").parent().height() - $("div[data-valmsg-for=\"" + idstr + "\"]").height() - $(obj).height() + 8);
                    $("span[data-valmsg-for=\"" + idstr + "\"]").text($(obj).attr("data-val-length"));
                    $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                    $(obj).addClass("input_error");
                    isOk = false;
                }
                else {
                    $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                    $("#" + objId).next().show().attr("class", "txt_icon txt_right");
                    $(obj).removeClass("input_error");
                    $("#" + objId).removeClass("input_error");
                    $("div[data-valmsg-for=\"" + objId + "\"]").css("display", "none");
                    $("span[data-valmsg-for=\"ConfirmPassword\"]").empty();
                }
            }
        }
        /*执行指定方法*/
        if (isOk == true && typeof ($(obj).attr("data-val-function")) != "undefined") {
            var func = $(obj).attr("data-val-function");
            myEval(func, obj);
        }
        if (isOk) {
            $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "none");
            $("span[data-valmsg-for=\"" + idstr + "\"]").empty();
            $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
            $(obj).removeClass("input_error");
        } else {
        }
    }

}

function verCodeblur(obj) {
    $(obj).removeClass("input_hover");
    $("div[data-warnmsg-for=\"" + obj.id + "\"]").css("display", "none");
    var v = $.trim($(obj).val());
    if (v == "") {
        $("span[data-valmsg-for=\"" + obj.id + "\"]").text("请输入验证码！");
        var $errDiv = $("div[data-valmsg-for=\"" + obj.id + "\"]");
        $errDiv.css("top", $errDiv.parent().height());
        $errDiv.css("display", "block");
        $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
        $(obj).addClass("input_error");
        $(obj).val("");
    }
}

var MyEvalDic = { "funLoginUserName": funLoginUserName, "funRegisterUserName": funRegisterUserName };
function myEval(funName, params) { MyEvalDic[funName](params); }
/* 登录时，检查用户名是否存在 */
function funLoginUserName(obj) {
    var value = $.trim($(obj).val());
    $.ajax({
        url: memberDomain + '/Login/IsExitsEmailOrMobile?param=' + value,
        type: 'get',
        cache: 'false',
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            if (data.Result) {
                $("span[data-valmsg-for=\"" + obj.id + "\"]").text("该用户名不存在");
                $("div[data-valmsg-for=\"" + obj.id + "\"]").css("display", "block");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                $(obj).removeClass("input_hover");
                $(obj).addClass("input_error");
            }
        }
    });
}
/* 注册时，检查用户名是否存在 */
function funRegisterUserName(obj) {
    var value = $.trim($(obj).val());
    $.ajax({
        url: memberDomain + '/Login/IsExitsEmailOrMobile?param=' + value,
        type: 'get',
        cache: 'false',
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            if (data.Result) {
                $("span[data-valmsg-for=\"" + obj.id + "\"]").text("该电子邮箱已经存在");
                $("div[data-valmsg-for=\"" + obj.id + "\"]").css("display", "block");
                $('.txtError').css("top", "77px");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                $(obj).removeClass("input_hover");
                $(obj).addClass("input_error");
            }
        }
    });
}

//iconType 0-无图标,1-甲类OTC,2-乙类OTC,3-保健食品,4-处方药
//<!--icon01:甲类otc icon02:保健食品 icon03:处方药 icon04:外 icon05:乙类OTC-->
function getIconStr(iconType) {
    var iconStr = '';
    if (iconType == 0) {
        iconStr = '';
    }
    else if (iconType == 1) {
        iconStr = 'icon01';
    }
    else if (iconType == 2) {
        iconStr = 'icon05';
    }
    else if (iconType == 3) {
        iconStr = 'icon02';
    }
    else if (iconType == 4) {
        iconStr = 'icon03';
    }
    return iconStr;
}

//删除
function DelGifts(cartId) {
    confirmPop("确定删除此赠品吗", function () {
        $.ajax({
            url: "/Cart/DelGift",
            type: "POST",
            cache: false,
            dataType: "json",
            data: { cartId: cartId },
            success: function (data) {
                getCartProduct();
            }
        });
    });
}

function IsDobuleTime2() {
    var a = new Date(2015, 11, 10, 18, 0, 0, 0);
    var b = new Date(2015, 11, 12, 20, 0, 0, 0);
    var d = new Date();
    var now = new Date(d.getFullYear(), d.getMonth() + 1, d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds(), 0);
    if (now >= a && now < b) {
        return true;
    }
    return false;
}

/*------------------------------凑单Start-----------------------------------*/

$(function () {
    /*扩展*/
    String.prototype.emptyToNoPic = function () {
        if (!this || this == "" || this == "无") {
            return kadCartConfig.NoPic;
        }
        return this;
    };
    Array.prototype.indexOf = function (val) {
        for (var i = 0; i < this.length; i++) {
            if (this[i] == val) return i;
        }
        return -1;
    };
    Array.prototype.remove = function (val) {
        var index = this.indexOf(val);
        if (index > -1) {
            this.splice(index, 1);
            return true;
        }
        return false;
    };

    $(".tab-nav ul li").click(function () {
        var index = $(this).index();
        kadCartConfig.CartSingleOrderTabIndex = index;
        $(".tab-nav ul li").find(".line").hide();
        $(this).find(".line").show();
        $(".tab-content .box").eq(index).show().siblings(".box").hide();
        var minPrice = $(this).attr("min-price");
        var maxPrice = $(this).attr("max-price");
        GetSingleOrderProducts(index, minPrice, maxPrice, 12);
    });
    $(".box ul").on("click", "li .icon-left p", function () {
        var $parentBox = $(this).parents(".box");
        var arrIndexs = new Array();
        var cacheKey = kadCartConfig.CartSingleOrderProIndexCacheKey;
        if (!!$parentBox.data(cacheKey)) {
            arrIndexs = $parentBox.data(cacheKey);
        }
        var thisLiIndex = $(this).parents("li").index();
        if ($(this).hasClass("act")) {
            $(this).removeClass("act");
            arrIndexs.remove(thisLiIndex);
        } else {
            $(this).addClass("act");
            arrIndexs.push(thisLiIndex);
        }
        $parentBox.data(cacheKey, arrIndexs);
    });
    //去凑单按钮
    $(".without-pay .single-order").click(function () {
        $(".free-bounced-bg,#free-bounced").show();
        $(".tab-nav ul li").eq(kadCartConfig.CartSingleOrderTabIndex).click();
        _gaq.push(['_trackEvent', '查看购物车页', '去凑单', '0', 0]);
    });
    //关闭
    $("#free-bounced .del-span,#free-bounced .quxiao,#free-bounced .sure").click(function () {
        $(".free-bounced-bg,#free-bounced").hide();
        if ($(this).hasClass("sure")) {
            //var $selectedPro = $(".tab-content .box").eq(kadCartConfig.CartSingleOrderTabIndex).find(".act");//当前选中tab
            var $selectedPro = $(".tab-content .box").find(".act");//所有tab
            if ($selectedPro && $selectedPro.length > 0) {
                var addCartViewArr = new Array();
                for (var i = 0; i < $selectedPro.length; i++) {
                    var wareCode = $($selectedPro[i]).attr("code");
                    var addCartView = kadCartConfig.AddCartView.CreateNew(wareCode);
                    addCartViewArr.push(addCartView);
                }
                addCarts(addCartViewArr);
                var $allBox = $(".tab-content .box");
                for (var i = 0; i < $allBox.length; i++) {
                    $($allBox[i]).data(kadCartConfig.CartSingleOrderProIndexCacheKey, []);
                }
                _gaq.push(['_trackEvent', '凑单商品页', '去凑单-确定', '0', 0]);
            };
        };
    });
});
var yAoscroll = function (a, b) {
    var $scroll = $(a);
    var $content = $(b);
    var $scrollH = $scroll.parent().height() - $scroll.height();
    var $contentHA = $content.height() - $content.parent().height();
    var $per = $contentHA / $scrollH;
    var timeDo = null;
    var timeDo1 = null;
    var timeTo = null;
    var timeTo1 = null;
    if ($contentHA <= 0) { $scroll.parent().hide(); return };
    /*滚动条*/
    $scroll.mousedown(function (e) {
        var mouseY = e.pageY;
        var $scrollP = $scroll.position().top;
        $(document).bind("mousemove",
        function (e) {
            var mouseYnow = e.pageY;
            var mValue = mouseYnow - mouseY + $scrollP;
            var $contentH = -mValue * $per;
            if (mValue >= 0 && mValue <= $scrollH) {
                $scroll.css("top", mValue + "px");
                $content.css("top", $contentH + "px");
            }
            if (mValue <= 0) {
                $scroll.css("top", "0");
                $content.css("top", "0");
            }
            if (mValue >= $scrollH) {
                $scroll.css("top", $scrollH + "px");
                $content.css("top", -$contentHA + "px");
            }
        })
        e.preventDefault();
        document.onselectstart = function () {
            return false
        }
    })
    $(document).mouseup(function () {
        $(document).unbind("mousemove");
        document.onselectstart = function () {
            return true
        }
    })

    /*滚轮*/
    $content.hover(function () {
        if (window.addEventListener) { this.addEventListener('DOMMouseScroll', wheel, false) };
        this.onmousewheel = wheel;
        window.onmousewheel = document.onmousewheel = function () { return false; }
    }, function () {
        if (window.addEventListener) this.removeEventListener('DOMMouseScroll', wheel, false);
        this.onmousewheel = this.onmousewheel = null;
        window.onmousewheel = document.onmousewheel = function () { return true; }
    })
    function handle(delta) {
        var i = $content.position().top;
        if (delta < 0) {
            i = i - 10;
            i2 = i / $per;
            if (i <= -$contentHA) {
                $content.css("top", -$contentHA + "px");
                $scroll.css("top", $scrollH + "px")
                i = -$contentHA;
            }
            else {
                $content.css("top", i + "px")
                $scroll.css("top", -i2 + "px")
            }
        }
        else {
            i = i + 10;
            i2 = i / $per;
            if (i >= 0) {
                $content.css("top", 0 + "px");
                $scroll.css("top", 0 + "px")
                i = 0;
            }
            else {
                $content.css("top", i + "px")
                $scroll.css("top", -i2 + "px")
            }
        }
    }
    function wheel(event) {
        var delta = 0;
        if (!event) event = window.event;
        if (event.wheelDelta) {
            delta = event.wheelDelta / 120;
            if (window.opera) delta = -delta;
        } else if (event.detail) delta = -event.detail / 3;
        if (delta) handle(delta);
        if (!window.event) {
            event.preventDefault();
        }

    }
}
//购物车凑单
function GetSingleOrderProducts(tab_nav_li_index, minPrice, maxPrice, count) {
    if (kadCartConfig.CartWareDepartments.length == 0) {
        return;
    }
    var pramData = {
        departments: kadCartConfig.CartWareDepartments,
        minPrice: minPrice,
        maxPrice: maxPrice,
        count: count
    };
    var cacheKey = "kad_" + $.param(pramData);
    var cacheData = kadCartConfig.CartSingleOrderProducts[cacheKey];
    if (!!cacheData) {
        initSingleOrderHtml(cacheData, tab_nav_li_index);
        return;
    }
    $.ajax({
        url: "/Cart/GetSingleOrderProducts",
        type: "Post",
        cache: false,
        dataType: "json",
        data: $.param(pramData, true),
        success: function (data) {
            kadCartConfig.CartSingleOrderProducts[cacheKey] = data;
            initSingleOrderHtml(data, tab_nav_li_index);
        }
    });
}

function initSingleOrderHtml(data, tab_nav_li_index) {
    if (data && data.length > 0) {
        $(".scroll-bar").css("top", "0px");
        $("#scroll1").css("top", "0px");
        $(".tab-content .box").eq(tab_nav_li_index).show().siblings(".box").hide();
        var proSelectedIndexs = $(".tab-content .box").eq(tab_nav_li_index).data(kadCartConfig.CartSingleOrderProIndexCacheKey);
        var $ul = $(".tab-content .box").eq(tab_nav_li_index).children("ul");
        $ul.empty();
        var $cloneLi = $(".tab-content .clone-contain li");
        $.each(data, function (i, recPro) {
            var $newLi = $cloneLi.clone();
            $newLi.find(".icon-left p").attr("code", recPro.WareSkuCode);
            $newLi.find(".pro-url").prop("href", GetProductUrl(recPro.WareSkuCode));
            $newLi.find(".pro-img").prop("src", (!!recPro.Pic180 ? recPro.Pic180 : "").emptyToNoPic());
            $newLi.find(".pro-aname").prop("href", GetProductUrl(recPro.WareSkuCode)).text(recPro.WareName);
            $newLi.find(".price-box").text("￥" + recPro.SalePrice.toFixed(2));
            //.icon-left p
            if (proSelectedIndexs && proSelectedIndexs.length > 0 && proSelectedIndexs.indexOf(i) > -1) {
                $newLi.find(".icon-left p").addClass("act");
            }
            $ul.append($newLi);
        });
        yAoscroll(".scroll-bar", "#scroll1");
    }
    else {
        alertPop("暂无凑单商品推荐");
    }
}

//批量加入购物车
function addCarts(addCartViewArr) {
    if (!$.isArray(addCartViewArr) || addCartViewArr.length == 0)
        return;
    var paramData = {
        addCartViewsJson: JSON.stringify(addCartViewArr)
    };
    $.ajax({
        url: "/Cart/AddCarts",
        type: "Post",
        cache: false,
        dataType: "json",
        data: paramData,
        success: function (data) {
            if (data.AllSuccess) {
                getCartProduct();
            }
            else {
                alertPop(data.Message, function () {
                    getCartProduct();
                }, 1);
            }
        }
    });
}
/*------------------------------凑单End-----------------------------------*/