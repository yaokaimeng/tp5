/**
 * @authors zhuofangjun&guAndy
 * @date    2016-08-03 
 * @version PC详情页脚本
 */
var myplate = {
    mark: false, //秒杀一个标识
    originalPrice: 1, //原价
    code: '', //验证码
    phoneValue: '',//输入电话的值
    urlTxt: '', //到货通知电话、邮箱、验证码的值
    colorSpecJson: [],//隐形眼镜中用到
    colorName: [], //颜色
    specName: [],  //度数
    isVirtualMainWareSku: false,//隐形眼镜中用到
    isSeckill: false,//是否秒杀
    arraynum: [],//-&=文本框中用到buyQuantity
    lishengIsSkill: 0,//-到秒杀数量时记录立省
    init: function () {
        lazyInit();//懒加载初始化
        getPrice(true);
        liaochengList(); //疗程装        
        inventoryStatus();//库存状态
        showColorSpec();//隐形眼镜执行函数
        getActivityStock();//营销库存
        setTimeout(showCollect, 900);//显示收藏
        setTimeout(discount, 700);//促销活动标签
        setTimeout(getPromoteLab, 600);//促销logo判断
        setTimeout(saveProductHistory, 500);
        needList();//需求清单红点是否显示
    },
    bindevent: function () {
        showRx();
        imgList();
        //hideProAd();
        topAd();//顶部广告位
        jqzoom();//放大镜
        shareOut();//分享
        smallImg();//加入购物车生成小图
        //getSameProductByPassnum();//规格是否存在
        wechatHongBao();//微信红包交互
        numStyle();//判断文本框中的值是否小于等于1 而后改版样式
        payMent();//支付方式交互
        fixedTopMenu();//滚动详情菜单后变为固定定位
        detailMenu();//详情菜单交互
        list1Isrx();//判断商品介绍是否有名称
        isRelativeArticle();//判断相关文章是否有内容
        closeIsLoginKad();//关闭公共登陆框交互
        selectTypeValue();//咨询提问选择框的类型交互
        emailIsShow();//邮箱是否显示
        createCode();//验证码 
        needReg();
    }
};

function lazyInit() {
    if ($('[data-lazyname="lazy-func"]').length <= 0) { return; }
    setTimeout(lazyLoadProduct, 500);
    $(window).bind("scroll", lazyLoadProduct);
};
/*数据懒加载入口*/
function lazyLoadProduct() {
    var tool = {
        getScrollTop: function () {
            return document.documentElement.scrollTop || document.body.scrollTop;
        },
        getClientHeight: function () {
            return document.documentElement.clientHeight || document.body.clientHeight;
        }
    },
    screenHeight = tool.getClientHeight();
    $('[data-lazyname="lazy-func"]').each(function () {
        var kItem = $(this),
            top = kItem.offset().top;
        if ((kItem.height() !== 0 || top !== 0) && !kItem.is(":hidden") && top <= tool.getScrollTop() + screenHeight * 1.1) {
            kItem.removeAttr("data-lazyname");
            var functionName = kItem.attr("data-func");
            var newFunc = eval(functionName);
            setTimeout(newFunc, 50);
        }
    });
};

function imgList() {
    //多图片展示
    var proImg = $("#mainproductimg_lar");
    var i = $("#minPicScroll ul li").length;
    $("#minPicScroll .prev").hide();
    if (i > 3) {
        $("#minPicScroll .nextNo").hide()
        $("#minPicScroll .next").click(function () {
            $("#minPicScroll li:lt(5)").hide();
            $("#minPicScroll .prevNo").hide();
            $("#minPicScroll .prev").show();
            $("#minPicScroll .next").hide();
            $("#minPicScroll .nextNo").show();
        })
        $("#minPicScroll .prev").click(function () {
            $("#minPicScroll li:lt(5)").show();
            $("#minPicScroll .prevNo").show();
            $("#minPicScroll .prev").hide();
            $("#minPicScroll .next").show();
            $("#minPicScroll .nextNo").hide();
        })
    } else {
        $("#minPicScroll .next").hide();
    }
    if ($("#minPicScroll ul li").length <= 5) {
        $("#minPicScroll .next").hide();
        $("#minPicScroll .nextNo").show();
    }
    $("#minPicScroll li").mouseover(function () {
        $(this).addClass("w-dtl-smr-cur").siblings().removeClass("w-dtl-smr-cur");
        var src = $(this).find("img").attr("src").replace('_100x100.jpg', '');
        proImg.attr({ jqimg: src, src: src });


    });
    $("#minPicScroll li").eq(0).trigger("mouseover");
}

function needReg() {
    $("#buy_bi1b").click(function (event) {
        if($('#need_list').length>0){
            kadpc.addBookCart(productConfig.productId,$('#num_mvalue').val(),function(data){
                if(data == '商品已成功添加到购物车！'){
                    needList();
                    needNumTop();
                }else{
                    showPrompt('<i class="ico-tipsCuo"></i>'+data, 0, 1);
                }
            });
        }else{
            ctrActionsend("demand_registration");
            kadpc.goNeedReg(productConfig.productId, "", parseInt($("#num_mvalue").val()));
        }
    });
};

/*顶部广告位*/
function topAd() {
    $("#top_ad").click(function (event) {
        $("#wrap_topad").hide();
    });
};
/*广告语为空隐藏*/
function hideProAd() {
    if ($(".prem-prodesc").html().trim() != "") return;
    $(".prem-prodesc").hide();
}
//放大镜
function jqzoom() {
    $("#product_bigimg").jqueryzoom({ xzoom: 370, yzoom: 380, offset: 10, position: "right", preload: 1 });
};
//促销logo判断
function getPromoteLab() {
    var rd = Math.random();
    var url = "/product/GetProductPromoLabel?productIds=" + productConfig.productId + "&rd=" + rd;
    $.get(url, function (data) {
        for (var i = 0; i < data.length; i++) {
            if (data[i].PromoLabel > 0) {
                $("#product_bigimg .w-dtl-mag-logo").css("background", "url(" + urlConfig.res + "/theme/default/img/iconimg/product/producticon_" + data[i].PromoLabel + ".png?rd=" + Math.random() + ")");
                $("#product_bigimg .w-dtl-mag-logo").show();
            };
        };
    });
};
//分享
function shareOut() {
    $("#share_out").hover(function () {
        $(".w-dtl-snr-share").addClass('share-hover');
        $("#bdshare").show();
        $("#bdshare").hover(function () {
            $(".w-dtl-snr-share").addClass('share-hover');
            $("#bdshare").show();
            $(".bds_more").hover(function () {
                $("#bdshare_l").css({ "left": "510.5px", "top": "520px" });
                $("#bdshare_l").show();
                $("#bdshare_l").hover(function () {
                    $("#bdshare_l").show();
                }, function () {
                    $("#bdshare_l").hide();
                });
            });
        }, function () {
            $(".w-dtl-snr-share").removeClass('share-hover');
            $("#bdshare").hide();
        });
    }, function () {
        $(".w-dtl-snr-share").removeClass('share-hover');
        $("#bdshare").hide();
    });
};
//微信红包交互
function wechatHongBao() {
    $(".inf-r-wxhb").mouseover(function () {
        $(this).find(".wechat-hobao").show()
    }).mouseout(function () {
        $(this).find(".wechat-hobao").hide()
    });
}
//支付方式交互
function payMent() {
    $("#payment_outer").hover(function () {
        $("#payment_inner").show();
    }, function () {
        $("#payment_inner").hover(function () {
            $("#payment_inner").show();
        }, function () {
            $("#payment_inner").hide();
        });
    });
};
//滚动详情菜单后变为固定定位
function fixedTopMenu() {
    window.onscroll = function () {
        if ($(document).scrollTop() >= $("#sprg_menu").offset()["top"]) {
            $("#sprg_menu_fixed").show();
        }
        else {
            $("#sprg_menu_fixed").hide();
        }
    }
};
/*详情菜单交互*/
function detailMenu() {
    isHideProductDetail(true);
    $("#sprg_menu ul li").click(function (event) {
        var index = $(this).index();
        $(this).addClass('sprg-mcur').siblings().removeClass('sprg-mcur');
        $("#sprg_menu_fixed ul li").eq(index).addClass('sprg-mcur').siblings().removeClass('sprg-mcur');
        $(window).trigger("scroll");
    });
    $("#sprg_menu_fixed ul li").click(function (event) {
        var index = $(this).index();
        $(this).addClass('sprg-mcur').siblings().removeClass('sprg-mcur');
        $("#sprg_menu ul li").eq(index).addClass('sprg-mcur').siblings().removeClass('sprg-mcur');
    });
    $("#menu_2box .sprg_menu_li1").click(function (event) {
        $("#wrap990list1,#wrap990list2,#wrap990list3,#wrap990list4,#wrap990list5,#wrap990list6,#wrap990list7,#wrap990list11,.k-module990").removeClass("hidden");
        isHideProductDetail(true);
        $("#wrap990list8,#wrap990list9,#wrap990list10,#wrap990list11,.k-module990").addClass("hidden");
        $("#wrap990list4 .wrap-com-tilte").removeClass("hidden");
        $("#wrap990list4").css("border-top", "1px solid #dddddd");
        $("#wrap990list5 .wrap-com-tilte").removeClass("hidden");
        $("#wrap990list5").css("border-top", "1px solid #dddddd");
        $(window).trigger("scroll");
    });
    $("#menu_2box .sprg_menu_li2").click(function (event) {
        $("#wrap990list1,#wrap990list8").removeClass("hidden");
        $("#wrap990list2,#wrap990list3,#wrap990list4,#wrap990list5,#wrap990list6,#wrap990list7,#wrap990list9,#wrap990list10,#wrap990list11,.k-module990").addClass("hidden");
        isHideProductDetail(false);
        $(window).trigger("scroll");
    });
    $("#menu_2box .sprg_menu_li3").click(function (event) {
        $("#wrap990list4,#wrap990list5").removeClass("hidden");
        $("#wrap990list1,#wrap990list2,#wrap990list3,#wrap990list6,#wrap990list7,#wrap990list8,#wrap990list9,#wrap990list10,#wrap990list11,.k-module990").addClass("hidden");
        isHideProductDetail(false);
        $("#wrap990list4 .wrap-com-tilte").addClass("hidden");
        $("#wrap990list4").css("border-top", "none");
        $(window).trigger("scroll");
    });
    $("#menu_2box .sprg_menu_li4").click(function (event) {
        $("#wrap990list9").removeClass("hidden");
        $("#wrap990list1,#wrap990list2,#wrap990list3,#wrap990list4,#wrap990list5,#wrap990list6,#wrap990list7,#wrap990list8,#wrap990list10,#wrap990list11").addClass("hidden");
        isHideProductDetail(false);
        $(window).trigger("scroll");
    });
    $("#menu_2box .sprg_menu_li5").click(function (event) {
        $("#wrap990list10").removeClass("hidden");
        $("#wrap990list1,#wrap990list2,#wrap990list3,#wrap990list4,#wrap990list5,#wrap990list6,#wrap990list7,#wrap990list8,#wrap990list9,#wrap990list11").addClass("hidden");
        isHideProductDetail(false);
        $(window).trigger("scroll");
    });
    $("#menu_2box .sprg_menu_li6").click(function (event) {
        $("#wrap990list5").removeClass("hidden");
        $("#wrap990list1,#wrap990list2,#wrap990list3,#wrap990list4,#wrap990list6,#wrap990list7,#wrap990list8,#wrap990list9,#wrap990list10,#wrap990list11").addClass("hidden");
        isHideProductDetail(false);
        $("#wrap990list5 .wrap-com-tilte").addClass("hidden");
        $("#wrap990list5").css("border-top", "none");
        $(window).trigger("scroll");
    });
};

function isHideProductDetail(isShow) {
    var height = $("#wrap990list3").height();
    if (height > 70 && isShow) {
        $("#wrap990list3").removeClass("hidden");
    }
    else {
        $("#wrap990list3").addClass("hidden");
    }

}

function saveProductHistory() {
    var url = "/product/SaveProductHistory2?id=" + productConfig.productId + "&time=" + new Date().getTime();
    $.get(url, function (data) {
    });
};

/*懒加载-相关症状*/
function getSymptom() {
    var url = "/product/GetSymptom?productId=" + productConfig.productId;
    $.get(url, function (data) {
        if (data == null || data.length <= 0) {
            $("#remand_xgjbzz").hide();
            return;
        };
        var pagetext = "";
        for (var i = 0; i < data.length; i++) {
            pagetext += '<li><a href="' + window.urlConfig.search + '?pageText=' + data[i] + '" target="_blank">' + data[i] + '</a></li>';
        };
        $("#remand_xgjbzz ul").append(pagetext);
    });
};
/*懒加载-你浏览过的商品*/
function productHistory() {
    var url = "/Product/GetProductHistoryInfo";
    $.get(url, function (data) {
        if (data == null || data.length <= 0) {
            $("#remand_lookpro").hide();
            return;
        }
        var pagetext = "";
        for (var i = 0; i < data.length; i++) {
            pagetext += '<li>\
                            <p class="buylook-proimg">\
                            <a href="/product/' + data[i].LinkId + '.shtml" target="_blank">\
                            <img class="lazyimg" data-lazyname="lazyimg" data-lazy-img="'+ data[i].Pic + '"></a></p>\
                            <p class="buylook-line1 buylook-proname w-pading5"><a href="/product/' + data[i].LinkId + '.shtml" target="_blank">' + data[i].WareName + '</a></p>\
                            <p class="buylook-line2 buylook-progg w-pading5">'+ data[i].Advertisement + '</p>\
                            <p class="buylook-proprice w-pading5">￥'+ data[i].Price.toFixed(2) + '</p>\
                        </li>';
        }
        $("#remand_lookpro ul").append(pagetext);
        $(window).trigger("scroll");
    });
};
/*懒加载-你浏览过的商品*/
function aboutKad() {
    var rd = Math.random();
    var _url = "/weight/get?id=v2_product_about-kad&rd=" + rd;
    $.get(_url, function (data) {
        $("#wrap990list10").html(data);
        $(window).trigger("scroll");
    });
}
/*判断商品介绍是否有名称*/
function list1Isrx() {
    if ($("#list1_isrx p").hasClass('YIrd_p')) {
        $("#list1_isrx").removeClass('hidden');
    } else {
        $("#list1_isrx").addClass('hidden');
    }
};
/*判断相关文章是否有内容*/
function isRelativeArticle() {
    if ($(".relative-article li").length == 0) {
        $("#menu_2box .sprg_menu_li4").hide();
    }
};
/**
 * 到货通知begin
 到货通知图层显示
 **/
function daohuotips() {
    poplayer('advances-layer', 'advClose', true);
    $('#advances-layer .content').show();
    $('#advances-layer .success').hide();
};
/*到货通知验证*/
function GoodsChecked() {
    /*设置遮罩层以及到货通知层样式层级*/
    $("#layer").css("z-index", "9996");
    $("#advances-layer").css("z-index", "9997");
    myplate.phoneValue = $.trim($('#phone-input').val());
    var mailValue = $.trim($('#mail-input').val()),
        pId = $.trim($('#h_productId').val()),
        regMail = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/, //验证邮箱
        regCellPhone = /^[1][358]\d{9}$/; //验证手机
    if (myplate.phoneValue == '' || myplate.phoneValue == '请输入您的电话号码') {
        var _message = '<i class="ico-tipsExc"></i>请输入您的电话号码！'
        showPrompt(_message, 0, 1)
        return false;
    }
    /*邮箱验证*/
    if (mailValue != '') {
        if (mailValue != '请输入您的邮箱地址' && mailValue != '' && !regMail.test(mailValue)) {
            var _message1 = '<i class="ico-tipsExc"></i>请填写您正确的邮箱地址！'
            showPrompt(_message1, 0, 1)
            return false;
        }
    }
    if (mailValue == '' || mailValue == '请输入您的邮箱地址') {
        myplate.urlTxt = "&phone=" + myplate.phoneValue;
    } else {
        if (myplate.phoneValue != '请输入您的电话号码' && regCellPhone.test(myplate.phoneValue)) {
            myplate.urlTxt = "&phone=" + myplate.phoneValue + "&email=" + mailValue;
        } else {
            myplate.urlTxt = "&email=" + mailValue;
        }
    }
    /*电话验证*/
    if (myplate.phoneValue != '') {

        if (myplate.phoneValue != '请输入您的电话号码' && !regCellPhone.test(myplate.phoneValue)) {
            var _message2 = '<i class="ico-tipsExc"></i>请填写您正确的手机号码！';
            showPrompt(_message2, 0, 1)
            return false;
        }
    }
    if (myplate.phoneValue == '' || myplate.phoneValue == '请输入您的电话号码') {
        myplate.urlTxt = "&email=" + mailValue;
    } else {
        if (mailValue != '请输入您的邮箱地址' && mailValue != '' && regMail.test(mailValue)) {
            myplate.urlTxt = "&phone=" + myplate.phoneValue + "&email=" + mailValue;
        } else {
            myplate.urlTxt = "&phone=" + myplate.phoneValue;
        }
    }
    if (!validate()) { /*检验验证码*/
        return false;
    }
    var rd = Math.random();
    var url = "/product/ArrivalNotice?productId=" + productConfig.productId + myplate.urlTxt + "&rd=" + rd;
    $.get(url, function (data) {
        var caseV = data['Code'];
        switch (caseV) {
            case 0:
                var _messageError1 = '<i class="ico-tipsCuo"></i>' + data['Message'];
                showPrompt(_messageError1, 0, 1);
                break;
            case 1:
                var _messageSuccess = '<i class="ico-tipsDui"></i>订阅成功！';
                $('#advances-layer').hide();
                $('#phone-input,#mail-input,#input1').val('');
                showPrompt(_messageSuccess, 0, 1);
                createCode();
                break;
            case -1:
                $('#advances-layer').hide();
                var _messageError = '<i class="ico-tipsCuo"></i>' + data['Message'];
                showPrompt(_messageError, 0, 1);
                break;
        };
    });
};
/**
 * 到货通知end
 **/

/**
 * 验证码begin
 创建验证码
 **/
function createCode() {
    myplate.code = "";
    var codeLength = 4, //验证码的长度
        checkCode = document.getElementById("checkCode"),
        selectChar = new Array(2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    if (checkCode == null) {
        return;
    }
    checkCode.value = "";
    for (var i = 0; i < codeLength; i++) {
        var charIndex = Math.floor(Math.random() * 32);
        myplate.code += selectChar[charIndex];
    }
    if (myplate.code.length != codeLength) {
        createCode();
    }
    checkCode.value = myplate.code;
};
/*检验验证码*/
function validate() {
    var inputCode = document.getElementById("input1").value.toUpperCase();
    if (inputCode.length <= 0) {
        var _message = '<i class="ico-tipsExc"></i>请输入验证码！'
        showPrompt(_message, 0, 1)
        return false;
    }
    else if (inputCode != myplate.code) {
        var _message1 = '<i class="ico-tipsExc"></i>验证码输入错误！'
        showPrompt(_message1, 0, 1)
        createCode();
        return false;
    }
    else {
        return true;
    }
};
/**
 * 验证码end
 **/

/* *
*套餐begin
**/
function packageType() {
    var rd = Math.random();
    var url = "/product/KitList?id=" + productConfig.productId + "&rd=" + rd;
    $.get(url, function (t) {
        if (t == null)
            return;
        var data = t.Result;
        if (data == null || data.length == 0) {
            $("#package_typebuy").hide();
            return;
        }
        var obj = [],
            pkgcon = '',
            pkgtab = '<div class="package-menu" id="package_menu"><ul class="clearfix">',
            pkgstr = '<div class="clearfix" id="pack_listcont">',
            DPdata = [],
            currentWareCode = productConfig.productId || "";
        if (currentWareCode == "") {
            throw new RangeError("当前商品的SkuCode未找到！");
        }
        for (var i = 0; i < data.length; i++) {
            var kitSubList = data[i].kitSubList;
            if (kitSubList.length > 4) continue;
            if (kitSubList.length == 1 && kitSubList[0].IsTemplateShow) {
                DPdata.push(data[i]);
            }
            for (var j = 0; j < kitSubList.length; j++) {
                /*判断该套餐模板是否显示？*/
                if (kitSubList[j].WareCode == currentWareCode && kitSubList[j].IsTemplateShow) {
                    obj.push(data[i]); /*记录模板可显示的套餐？*/
                    break;
                }
            }
        }
        if (obj.length <= 0) { $("#package_typebuy").hide(); return; }
        $("#package_typebuy").show();
        var isfirst = true;
        for (var k = 0; k < obj.length && k < 8; k++) {
            var pkglistLength = obj[k]["kitSubList"].length, isRx = false;
            if (pkglistLength <= 1) continue;
            if (pkglistLength > 8) { continue; }
            if (obj[k].HasRx) {
                isRx = true;
            }
            var PrmSubtitle = obj[k].PrmSubtitle || "";
            if (isfirst || pkgstr == '') {
                pkgtab += '<li class="pack-mcur">' + (PrmSubtitle == "" ? "优惠套餐" + (k + 1) : PrmSubtitle) + '</li>';
                if (false) {
                    pkgstr += '<div class="pack-listinner"><div class="package-cpl"><div class="packge-cpl-floor"><div class="pack-somepro" style="overflow-x:scroll;"><div class="clearfix" style="width:' + (pkglistLength * 200 + (pkglistLength - 1) * 35) + 'px;">';
                }
                else {
                    pkgstr += '<div class="pack-listinner"><div class="package-cpl"><div class="packge-cpl-floor"><div class="pack-somepro"><div class="clearfix">';
                }
            }
            else {
                pkgtab += '<li>' + (PrmSubtitle == "" ? "优惠套餐" + (k + 1) : PrmSubtitle) + '</li>';
                //pkglistLength > 4
                if (false) {
                    pkgstr += '<div class="pack-listinner hidden"><div class="package-cpl"><div class="packge-cpl-floor"><div class="pack-somepro" style="overflow-x:scroll;"><div class="clearfix" style="width:' + (pkglistLength * 200 + (pkglistLength - 1) * 35) + 'px;">';
                }
                else {
                    pkgstr += '<div class="pack-listinner hidden"><div class="package-cpl"><div class="packge-cpl-floor"><div class="pack-somepro"><div class="clearfix">';
                }
            }
            isfirst = false;
            /*主产品*/
            for (var j = 0; j < pkglistLength; j++) {
                var datalist = obj[k]["kitSubList"][j];
                if (datalist.IsKeyWare) {
                    if (!datalist.IsRx) {
                        state = 0; /*非处方药显示加入购物车 */
                    } else {
                        if (datalist.RxType == 0 || datalist.RxType == 1) {
                            state = 0; /*加入购物车 */
                        } else if (datalist.RxType == 2 || datalist.RxType == 3) {
                            state = 1; /*需求登记*/
                        } else {
                            state = 2; /*缺货*/
                        }
                    }
                }
                /*套餐图片展示*/
                if (datalist.WareCode == productConfig.productId) {
                    pkgstr += '<div class="somepro-this"><p class="spro-this-img">';
                    pkgstr += '<img src="' + ((datalist.Pic != "" && datalist.Pic != null && datalist.Pic != "无") ? datalist.Pic : window.urlConfig.multiDomain.res() + "/theme/default/img/nopic.jpg") + '" />';
                    pkgstr += '</p><p class="spro-this-name padding18lr text-elli" title="' + datalist.WareName + '">' + datalist.WareName + '</p>';
                    pkgstr += '<p class="spro-this-price padding18lr"><span class="spro-price-m">¥' + datalist.Price.toFixed(2) + '</span><span class="spro-price-num">×' + datalist.Qty + '件</span></p></div>';

                }
                /*套餐参数展示*/
            }
            /*副产品*/
            for (var m = 0; m < pkglistLength; m++) {
                if (m > 3) continue;
                var datalistfu = obj[k]["kitSubList"][m];
                /*套餐图片展示*/
                if (datalistfu.WareCode != productConfig.productId) {
                    pkgstr += '<p class="spro-plus">+</p>';
                    pkgstr += '<div class="somepro-this"><p class="spro-this-img"><a href="/product/' + datalistfu.WareCode + '.shtml" target="_blank">';
                    pkgstr += '<img src="' + ((datalistfu.Pic != "" && datalistfu.Pic != null && datalistfu.Pic != "无") ? datalistfu.Pic : window.urlConfig.multiDomain.res() + "/theme/default/img/nopic.jpg") + '" />';
                    pkgstr += '</a></p><p class="spro-this-name padding18lr text-elli" title="' + datalistfu.WareName + '"><a href="/product/' + datalistfu.WareCode + '.shtml" target="_blank">' + datalistfu.WareName + '</a></p>';
                    pkgstr += '<p class="spro-this-price padding18lr"><span class="spro-price-m">¥' + datalistfu.Price.toFixed(2) + '</span><span class="spro-price-num">×' + datalistfu.Qty + '件</span></p></div>';
                }
                /*套餐参数展示*/
            }
            pkgstr += '</div></div>';
            if (obj[k].Remark != null && obj[k].Remark != "") {
                pkgstr += '<div class="pack-yaosdp clearfix"><p class="yaosdp-l">药师点评：</p><p class="yaosdp-t">' + obj[k].PrmName + '</p><p class="yaosdp-r">' + obj[k].Remark + '</p></div>';
            }
            pkgstr += '</div></div>';
            /*结算*/
            pkgstr += '<div class="package-cpr"><p class="pack-cpr-lis">立省<span>￥' + (obj[k].OriginPrice - obj[k].KitPrice).toFixed(2) + '</span></p>';
            pkgstr += '<p class="pack-cpr-price">套餐价<span>￥' + obj[k].KitPrice.toFixed(2) + '</span></p><p class="pack-cpr-marprice">原&nbsp价<span>￥' + obj[k].OriginPrice.toFixed(2) + '</span></p>';
            /*判断套餐按钮 begin*/
            switch (state) {
                case 0:
                    /*立即购买*/
                    pkgstr += '<a class="pack-cpr-btn" href="javascript:;" onclick="addCartJsonp(' + obj[k].PrmCode + ',1,1)">加入购物车</a>';
                    break;
                case 1:
                    /*需求登记*/
                    pkgstr += '<a class="pack-cpr-btn" href="javascript:;" onclick="ctrActionsend(\'demand_registration\');addPackage_rxNum(' + obj[k].PrmCode + ',1,1)">需求登记</a>';
                    break;
                case 2:
                    /*到货通知*/
                    pkgstr += '<a class="pack-cpr-btn" href="javascript:;" onclick="daohuotips()">到货通知</a>';
                    break;
                default:
            }
            /*判断套餐按钮 end*/
            pkgstr += '</div></div>';
        }
        pkgtab += '</ul></div>';
        pkgcon = pkgtab + pkgstr + '</div>';
        $("#package_typebuy").html(pkgcon);
        packageMenu();/*套餐交互*/
        if (typeof (CreateGetNeedRegList) == "function") {
            CreateGetNeedRegList(t); /*第一次加载创建需求登记中的套餐列表*/
        }
    });
};

function addPackage_rxNum(prmCode) {
    kadpc.goNeedReg(productConfig.productId, prmCode, 1, "", true);
}
/*套餐交互*/
function packageMenu() {
    $("#package_menu ul li").click(function (event) {
        var index = $(this).index();
        $(this).addClass('pack-mcur').siblings().removeClass('pack-mcur');
        $("#pack_listcont .pack-listinner").eq(index).show().siblings().hide();
    });
};
/* *
*套餐end
**/

/**
 咨询提问begin
 选择问题的值
**/
function selectTypeValue() {
    $("#question_type li input").click(function () {
        var indexType = $(this).val();
        $('#Y_zxtype').val(indexType);
        $(this).parent("li").addClass('select-cur').siblings().removeClass('select-cur');
    });

    $("#question_type ul li").click(function () {
        var indexType = $(this).find("input[type='radio']").eq(0).val();
        $('#Y_zxtype').val(indexType);
        $(this).addClass('select-cur').siblings().removeClass('select-cur');
    });
    $("#question_type ul li").eq(0).click();
};
/*邮箱是否显示*/
function emailIsShow() {
    $("#email_box").hide();
    $("#yx_check").click(function (event) {
        if ($(this).hasClass('tc-rselect-cur')) {
            $(this).removeClass('tc-rselect-cur');
            $("#email_box").hide();
        }
        else {
            $(this).addClass('tc-rselect-cur');
            $("#email_box").show();
        }
    });
};
/*邮箱是否正确*/
function isEmail(str) {
    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return reg.test(str);
};
/*questionType 1: "商品问题";  2: "库存及配送";  3: "支付问题";  5: "促销及赠品"; default: "未知状态";*/
function seekAdvice(productId) {
    if (!IsLogin()) {
        kadpc.goLogin(function () { });
        return;
    }
    var Rp_cont = $.trim($("#ques_textarea").val()),
        isSendID = $("#yx_check"),
        isSend = "",
        email = $.trim($("#email_value").val()),
        _type = $("#Y_zxtype").val(),
        emailcheck = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (isSendID.hasClass('tc-rselect-cur')) {
        isSend = "true";
    } else {
        isSend = "false";
    };
    if (Rp_cont == "") {
        var _message = '<i class="ico-tipsExc"></i>请输入需要咨询的内容！'
        showPrompt(_message, 0, 1);
        return;
    }
    if (Rp_cont.length > 100) {
        var _message = '<i class="ico-tipsExc"></i>输入咨询的内容不超100个字！'
        showPrompt(_message, 0, 1);
        return;
    }
    if (_type == "") {
        var _message1 = '<i class="ico-tipsExc"></i>请选择咨询类型！'
        showPrompt(_message1, 0, 1);
        return;
    }
    if (isSend == "true") {
        if (isEmail(email)) {
            seekAdviceSuccess(productId, _type, Rp_cont, isSend, email);
        } else {
            var _message2 = '<i class="ico-tipsExc"></i>请输入正确的邮箱地址！'
            showPrompt(_message2, 0, 1);
        }
    }
    else {
        seekAdviceSuccess(productId, _type, Rp_cont, isSend, email);
    }
};
/*提交是否成功*/
function seekAdviceSuccess(productId, questionType, Rp_cont, isSend, email) {
    var rd = Math.random();
    var urlstr = "/Product/CreateConsultingByWeb?productId=" + productId + "&questionType=" + questionType + "&question=" + escape(Rp_cont) + "&isSend=" + isSend;
    if (email != "") {
        urlstr += "&email=" + email;
    }
    urlstr += "&rd=" + rd;
    $.get(urlstr, function (data) {
        switch (data) {
            case "1": alert("邮箱不能为空！"); break;
            case "2": alert("请选择要咨询的商品！"); break;
            case "5": alert("抱歉，系统升级中，暂时不能提交！(H)"); break;
            default: {
                if (data == "0") {
                    $("#ques_textarea").val("");
                    $("#email_value").val("");
                    var _message = '<i class="ico-tipsDui"></i>您的咨询提交成功，请耐心等待药师回复！'
                    showPrompt(_message, 0, 1)
                }
                else {
                    var _message1 = '<i class="ico-tipsExc"></i>信息提交失败，请修改内容后重试！'
                    showPrompt(_message1, 0, 1)
                }
            }
        }
    })
};
/**
 * 咨询提问end
**/

/*用户登录*/
function UserLogin() {
    var Email = $("#UserName").val();
    var Password = $("#UserPassword").val();
    $("#LoginError").html("");
    $('#EmailErr,#PasswordErr').addClass('txtError');
    var isPass = true;
    if (Password == "" || Password.length < 6 || Password.length > 20) {
        objName = "UserPassword";
        idstr = $("#" + objName).attr("id");
        $("span[data-valmsg-for=\"" + idstr + "\"]").text("密码长度应在6-20位之间!");
        $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block");
        $("#" + objName).addClass("input_error");
        $("#" + objName).siblings("i").show().attr("class", "txt_icon txt_error");
        isPass = false;
    }
    if (!isPass) { return; }
    $.ajax({
        url: kad_user_url + "/Login/AjaxLoginV2",
        type: "Post",
        data: "userName=" + Email + "&pass=" + Password,
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
                popClose('showLogOrReg', true);
                GetHNavList();
                GetLogin();
                ctrActionsend('land_button_succ');
            }
            else {
                ctrActionsend('land_button_fail');
                if (data.Code == "UserName") {
                    objName = "UserName";
                    idstr = $("#" + objName).attr("id");
                    $("span[data-valmsg-for=\"" + idstr + "\"]").text(data.Message);
                    $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block");
                    $("#" + objName).addClass("input_error");
                    $("#" + objName).siblings("i").show().attr("class", "txt_icon txt_error");
                }
                else if (data.Code == "UserPassword") {
                    objName = "UserPassword";
                    idstr = $("#" + objName).attr("id");
                    if (Password.length < 6 || Password.length > 20) {
                        $("span[data-valmsg-for=\"" + idstr + "\"]").text(data.Message);
                        $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block");
                        $("#" + objName).addClass("input_error");
                        $("#" + objName).siblings("i").show().attr("class", "txt_icon txt_error");
                    }
                    else {
                        $("span[data-valmsg-for=\"" + idstr + "\"]").text("密码不正确！");
                        $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block");
                        $("#" + objName).addClass("input_error");
                        $("#" + objName).siblings("i").show().attr("class", "txt_icon txt_error");
                        $("#" + objName).val("");
                    }
                }
                else {
                    $("#LoginError").html(data.Result);
                }
            }
        }
    });
};
/*添加到收藏*/
function collection() {
    if (!IsLogin()) {
        kadpc.goLogin(function () {
            loadCollection();
        });
        return;
    };
    loadCollection();
};

function loadCollection() {
    var rd = Math.random();
    var url = "/Favorite/AddFavorite?wareCode=" + productConfig.productId + "&rd=" + rd;
    $.get(url, function (data) {
        switch (data) {
            case "3":
                $("#collection_box").addClass('conllection-cur');
                var _message = '<i class="ico-tipsDui"></i>收藏成功！'
                showPrompt(_message, 0, 1);
                break;
            case "1":
                $("#collection_box").addClass('conllection-cur');
                var _message1 = '<i class="ico-tipsExc"></i>该商品已收藏！'
                showPrompt(_message1, 0, 1);
                break;
            case "0":
                var _message2 = '<i class="ico-tipsCuo"></i>收藏失败，请重试！'
                showPrompt(_message2, 0, 1);
                break;
        }
    });
}

/*登录*/
function ToLogin() {
    kadpc.goLogin(function () { });
};
/*提示框*/
function closets(obj, ishide) {
    /*不要改这个showPrompt */
    ishide = ishide || false;
    popClose('showPrompt', ishide);
    /*判断在到货通知状态下是否需要隐藏当前遮罩层*/
    if ($("#advances-layer").css("display") != "block") {
        $("#layer").hide();
    };
};
function surets() {
    popClose('showPrompt', true);
};
/*关闭公共登陆框*/
function closeIsLoginKad() {
    $("#closeLog").click(function (event) {
        $("#showLogOrReg,#layer").hide();
    });
};
/*领券*/
function FreeCoupon(activityID) {
    var rd = Math.random();
    var url = "/product/FreeCoupon?ActivityID=" + activityID + "&rd=" + rd;
    $.get(url, function (data) {
        if (data == "true") {
            showPrompt('<i class="ico-tipsDui"></i>领取成功！', 0, 1);
        } else if (data == "请先登录！") {
            ToLogin();
        } else if (data == "已领取优惠券") {
            showPrompt('<i class="ico-tipsOver"></i>已领取优惠券！', 0, 1);
        } else {
            showPrompt('<i class="ico-tipsCuo"></i>' + data + '！', 0, 1);
        }
    });
};

/**
 * 评论列表begin
 * data.TotalPage 分页的条数
 * max_page_index 评论列表的内容
 **/
function initPage(data) {
    var max_page_index = data.TotalCount;
    if (data.TotalPage <= 1) {
        $("#wrap990list4 .revw-page").hide();//分页隐藏
        return;
    }
    if (max_page_index <= 0) {
        $("#revw_list").hide();
        return;
    }
    $("#wrap990list4,#wrap990list4 .revw-page").show();
    /*加载分页*/
    $("#wrap990list4 .pagination").kadpage(max_page_index, {
        callback: pageSelectCallback
    });
};
/*评论列表*/
function initPageData(data) {
    var list = data.Data.CommentList,
        text = '',
        res = urlConfig.res.toString();
    if (data.TotalCount <= 0) {
        text = '<div class="clearfix revwlist-no">\
                    <div class="listno-l"><img src="'+ res + '/theme/default/img/product2/nopersontip.jpg"></div>\
                    <div class="listno-r">该商品还没有人评价呢~</div>\
                </div>';
        $("#revw_list").append(text);
        return;
    }
    $("#revw_list ul").html("");
    for (var i = 0; i < list.length; i++) {
        text += '<li>\
                    <div class="clearfix">\
                        <p class="revw-star revw-star' + list[i].Star + '"></p>\
                        <p class="revw-tr">\
                            <span class="revw-rname">' + list[i].UserName + '</span>\
                            <span class="revw-rdate">' + list[i].DateTime + '</span>\
                        </p>\
                    </div>\
                    <div class="revw-rcont">' + list[i].Content + '</div>\
                </li>';
    }
    $("#revw_list ul").append(text);
};
/*好评率*/
function initRate(data) {

    $("#review_rates").html(data.Data.Point1 + "%");
    $("#review_rate_good").html(data.Data.Point1);
    $("#review_rate_normal").html(data.Data.Point2);
    $("#review_rate_bad").html(data.Data.Point3);
    $("#rate_good_w").css("width", (348 * (data.Data.Point1 / 100)) + "px");
    $("#rate_normal_w").css("width", (348 * (data.Data.Point2 / 100)) + "px");
    $("#rate_bad_w").css("width", (348 * (data.Data.Point3 / 100)) + "px");

};
/*第几页*/
var firstComment = true;
function pageSelectCallback(page_index, jq) {
    if (firstComment) return;
    loadComment(false, page_index);
    return false;
};
/*懒加载-评论初始化函数*/
function loadComment(isFirst, page_index) {
    isFirst = (isFirst == undefined ? true : isFirst);
    page_index = (page_index == undefined ? 0 : page_index);
    var url = "/product/GetCommentList?wareSkuCode=" + productConfig.productId + "&pageindex=" + (parseInt(page_index) + 1);
    $.get(url, function (data) {
        if (isFirst) {
            initPage(data, isFirst);
            initRate(data);
        }
        else {
            $("html,body").animate({ scrollTop: $("#wrap990list4").offset().top }, 300);
        }
        initPageData(data);
        firstComment = false;
    });
};
/**
 * 评论列表end
 **/

/**
* 药师咨询列表begin
* data.TotalPage 分页的条数
* max_page_index 评论列表的内容
**/
function initPagePharmacist(data) {
    var max_page_index = data.TotalCount;
    if (data.TotalCount <= 10) {
        $("#wrap990list5 .revw-page").hide();//分页隐藏
        return;
    }
    if (max_page_index <= 0) {
        $("#pharask_list").hide();
        return;
    }
    $("#wrap990list5,#wrap990list5 .revw-page").show();
    //加载分页
    $("#wrap990list5 .pagination").kadpage(max_page_index, {
        callback: pageSelectCallbackPharmacist
    });
};
/*药师评论列表*/
function initPageDataPharmacist(data) {
    var list = data.Data,
        text = '',
        res = urlConfig.res.toString();
    if (data.TotalCount <= 0) {
        text = '<div class="clearfix revwlist-no">\
                    <div class="listno-l"><img src="'+ res + '/theme/default/img/product2/nopersontip.jpg"></div>\
                    <div class="listno-r">该商品还没有人提问呢~</div>\
                </div>';
        $("#pharask_list").append(text);
        return;
    }
    $("#pharask_list ul").html("");
    for (var i = 0; i < list.length; i++) {
        var time1 = list[i].CreateTime.split(" ")[0];
        var time2 = list[i].ReplyDate.split(" ")[0];
        text += '<li>\
                    <p class="pharask-quan"><span class="pharask-qa">Q</span>' + list[i].Question + '</p>\
                    <p class="pharask-quan2">\
                        <span class="pharask-tel">' + (list[i].LoginName == null ? "匿名用户" : list[i].LoginName) + '</span>\
                        <span class="quan-date">' + time1 + '</span>\
                    </p>\
                    <p class="pharask-quan clearfix" style="color: #9a9a9a;">\
                        <span class="pharask-qa pharask-qa2" style="float: left;">A</span>\
                        <span style="float: left;width: 922px;">' + list[i].ReplyContent + '<span>\
                    </p>\
                    <p class="pharask-quan2">\
                        <span class="pharask-tel">康爱多药师</span>\
                        <span class="quan-date">' + time2 + '</span>\
                    </p>\
                </li>';
    }
    $("#pharask_list ul").append(text);
};
/*药师第几页*/
var firstpha = true;
function pageSelectCallbackPharmacist(page_index, jq) {
    if (firstpha) return;
    loadPharmacist(false, page_index);
    return false;
};
/*懒加载-药师评论初始化函数*/
function loadPharmacist(isFirst, page_index) {
    isFirst = (isFirst == undefined ? true : isFirst);
    page_index = (page_index == undefined ? 0 : page_index);
    var url = "/Product/GetConsultingList?productId=" + productConfig.productId + "&pageindex=" + (parseInt(page_index) + 1);
    $.get(url, function (data) {
        if (isFirst) {
            initPagePharmacist(data, isFirst);
        }
        else {
            $("html,body").animate({ scrollTop: $("#wrap990list5").offset().top }, 300);
        }
        initPageDataPharmacist(data);
        firstpha = false;
    })
};
/**
 * 药师咨询列表end
 **/

/**
* 促销活动列表begin
* FullAmtDiscount 满金额减  FullAmountDiscount满数量减 
* FullAmtAdditionalBuy满金额加价购 FullAmountAdditionalBuy满数量加价购 
* FullAmtGift满金额赠品 FullAmountGift满数量赠品
* FullAmtGiftPrm满金额送优惠券 FullAmountGiftPrm满数量送优惠券
* WareFreeShip免运费 MoneyFreeShip单品免运费 CusGradeFreeShip客户等级免邮费 AreaFreeShip区域免运费
* CouponFullAmtDiscount优惠券
* pageIner1满减 pageIner2换购 pageIner3满赠 pageIner4送劵 pageIner5免邮 pageIner6领券
**/
function discount() {
    var rd = Math.random();
    var pageIner1 = '',
        pageIner2 = '',
        pageIner3 = '',
        pageIner4 = '',
        pageIner5 = '',
        pageIner6 = '',
        pageMore = '',
        url = '/product/GetNowActivityList?productId=' + productConfig.productId + "&rd=" + rd,
        prmType = ['FullAmtDiscount', 'FullAmountDiscount', 'FullAmtAdditionalBuy', 'FullAmountAdditionalBuy', 'FullAmtGift', 'FullAmountGift', 'FullAmtGiftPrm', 'FullAmountGiftPrm', 'WareFreeShip', 'MoneyFreeShip', 'CusGradeFreeShip', 'AreaFreeShip', 'CouponFullAmtDiscount'];
    $.get(url, function (data) {
        if (data.Data.length <= 0) {
            $('#promotion_active').hide();
            return;
        }
        for (var i = 0; i < prmType.length; i++) {
            for (var j = 0; j < data.Data.length; j++) {
                var thisPrmType = prmType[i],
                    dataPrmType = data.Data[j].PrmTypeCode;
                if (thisPrmType != dataPrmType) {
                    continue;
                }
                switch (i) {
                    case 0:
                        var txt = '';
                        for (var k = 0; k < data.Data[j].Condition.length; k++) {
                            if (k == data.Data[j].Condition.length - 1) {
                                txt += data.Data[j].Condition[k].CondDesc;
                            } else {
                                txt += data.Data[j].Condition[k].CondDesc + '；';
                            }
                        }

                        if (data.Data[j].Condition.length > 1 ||   productConfig.mainWareSkuCode  != productConfig.productId || productConfig.rxotc == "True" || myplate.isSeckill) {//满金额减大于两个以上的 不展示
                            pageIner1 += '<p>' + txt + '</p>';
                        }
                        else {
                            pageIner1 += '<p>' + txt + '&nbsp<a style="color:#006fe6;" href="' + urlConfig.search + '/Home/FullMoney?pageText=' + data.Data[j].PrmCode + '" >查看更多</a></p>';
                        }

                        break;
                    case 1:
                        var txt = '';
                        for (var k = 0; k < data.Data[j].Condition.length; k++) {
                            if (data.Data[j].Condition[k].CondDesc) {
                                if (k == data.Data[j].Condition.length - 1) {
                                    txt += data.Data[j].Condition[k].CondDesc;
                                } else {
                                    txt += data.Data[j].Condition[k].CondDesc + '；';
                                }
                            }
                        }
                        pageIner1 += '<p>' + txt + '</p>';
                        break;
                    case 2:
                        var txt = "";
                        for (var ai = 0; ai < data.Data[j].Condition.length; ai++) {
                            txt += "<p>";
                            txt += "满" + data.Data[j].Condition[ai].LimitedAmt.toFixed(2) + "元";
                            for (var k = 0; k < data.Data[j].Condition[ai].GiftSet.length; k++) {
                                txt += '加' + (data.Data[j].Condition[ai].GiftSet[k].SingleQty * data.Data[j].Condition[ai].GiftSet[k].PrmContentPrice).toFixed(2) + '元，即可获得价值' + data.Data[j].Condition[ai].GiftSet[k].Price.toFixed(2) + '元的 <a class="bule-unline" href="/product/' + data.Data[j].Condition[ai].GiftSet[k].PrmContentCode + '.shtml" target="_blank">' + data.Data[j].Condition[ai].GiftSet[k].PrmContentName + '</a> ' + data.Data[j].Condition[ai].GiftSet[k].SingleQty + '件';
                                if (k < data.Data[j].Condition[ai].GiftSet.length - 1)
                                    txt += "；";
                            }
                            txt += "</p>";
                        }
                        pageIner2 += txt;
                        break;
                    case 3:
                        var txt = "";
                        for (var ai = 0; ai < data.Data[j].Condition.length; ai++) {
                            txt += "<p>";
                            txt += "满" + data.Data[j].Condition[ai].LimitedAmount + "件";
                            for (var k = 0; k < data.Data[j].Condition[ai].GiftSet.length; k++) {
                                txt += '加' + (data.Data[j].Condition[ai].GiftSet[k].SingleQty * data.Data[j].Condition[ai].GiftSet[k].PrmContentPrice).toFixed(2) + '元，即可获得价值' + data.Data[j].Condition[ai].GiftSet[k].Price.toFixed(2) + '元的 <a class="bule-unline" href="/product/' + data.Data[j].Condition[ai].GiftSet[k].PrmContentCode + '.shtml" target="_blank">' + data.Data[j].Condition[ai].GiftSet[k].PrmContentName + '</a> ' + data.Data[j].Condition[ai].GiftSet[k].SingleQty + '件';
                                if (k < data.Data[j].Condition[ai].GiftSet.length - 1)
                                    txt += "；";
                            }
                            txt += "</p>";
                        }
                        pageIner2 += txt;
                        break;
                    case 4:
                        var txt = "";
                        for (var ai = 0; ai < data.Data[j].Condition.length; ai++) {
                            txt += "<p>";
                            if (productConfig.rxType > 0 || productConfig.isotc == "True") {
                                txt += "满" + data.Data[j].Condition[ai].LimitedAmt.toFixed(2) + "元+0.01元，即可获得：";
                            }
                            else {
                                txt += "满" + data.Data[j].Condition[ai].LimitedAmt.toFixed(2) + "元，即可获得：";
                            }
                            for (var k = 0; k < data.Data[j].Condition[ai].GiftSet.length; k++) {
                                txt += ("<a class=\"bule-unline\" href=\"/product/" + data.Data[j].Condition[ai].GiftSet[k].PrmContentCode + ".shtml\" target=\"_blank\">" + data.Data[j].Condition[ai].GiftSet[k].PrmContentName + "</a>" + data.Data[j].Condition[ai].GiftSet[k].SingleQty + "件");
                                if (k < data.Data[j].Condition[ai].GiftSet.length - 1)
                                    txt += "+";
                            }
                            txt += "</p>";
                        }
                        pageIner3 += txt;
                        break;
                    case 5:
                        var txt = "";
                        for (var ai = 0; ai < data.Data[j].Condition.length; ai++) {
                            txt += "<p>";
                            txt += "满" + data.Data[j].Condition[ai].LimitedAmount + "件+0.01元，即可获得：";
                            for (var k = 0; k < data.Data[j].Condition[ai].GiftSet.length; k++) {
                                txt += ("<a class=\"bule-unline\" href=\"/product/" + data.Data[j].Condition[ai].GiftSet[k].PrmContentCode + ".shtml\" target=\"_blank\">" + data.Data[j].Condition[ai].GiftSet[k].PrmContentName + "</a>" + data.Data[j].Condition[ai].GiftSet[k].SingleQty + "件");
                                if (k < data.Data[j].Condition[ai].GiftSet.length - 1)
                                    txt += "+";
                            }
                            txt += "</p>";
                        }
                        pageIner3 += txt;
                        break;
                    case 6:
                    case 7:
                        var txt = '';
                        for (var ai = 0; ai < data.Data[j].Condition.length; ai++) {
                            if (ai == data.Data[j].Condition.length - 1) {
                                txt += data.Data[j].Condition[ai].CondDesc;
                            }
                            else {
                                txt += data.Data[j].Condition[ai].CondDesc + '；';
                            }
                        }
                        pageIner4 += '<p>' + txt + '</p>';
                        break;
                    case 8:
                    case 9:
                    case 10:
                    case 11:
                        if (data.Data[j].Condition[0].CondDesc) {
                            pageIner5 += '<p>' + data.Data[j].Condition[0].CondDesc + '</p>';
                        }
                        break;
                    case 12:
                        if (data.Data[j].Condition[0].CondDesc) {
                            pageIner6 += '<p>' + data.Data[j].Condition[0].CondDesc + '<a class="bule-unline prem-cup-btn" href="javascript:;" onclick="if(!IsLogin()){ToLogin();}else{ctrActionsend(\'collar_roll_receive\');FreeCoupon(' + data.Data[j].PrmCode + ');}">立即领取</a></p>';
                        }
                        break;
                    default:
                        break;
                }
            }
        }
        if (pageIner1 != '') {
            $('#discount_curpon1').append(pageIner1);
        }
        if (pageIner2 != '') {
            $('#discount_curpon2').append(pageIner2);
        }
        if (pageIner3 != '') {
            $('#discount_curpon3').append(pageIner3);
        }
        if (pageIner4 != '') {
            $('#discount_curpon4').append(pageIner4);
        }
        if (pageIner5 != '') {
            $('#discount_curpon5').append(pageIner5);
        }
        if (pageIner6 != '') {
            $('#discount_curpon6').append(pageIner6);
        }
        isNoneLeftSign();//左边标签控制
        isRx();//是否为处方药
        numMore();//判断促销内容显示与否，是否多于2行
    });
};
/*左边标签控制*/
function isNoneLeftSign() {
    $(".prem-cxactive li").each(function () {
        var lisize = $(this).children(".prem-cuinfor-r").children('p').size(),
            index = $(".prem-cxactive li").index(this);
        if (lisize > 0) {
            $(".prem-cxactive li").eq(index).show();
        }
        else {
            $(".prem-cxactive li").eq(index).hide();
        }
    });
};
/*判断当个商品是否为处方药 确定是领取还是满赠*/
function isRx() {
    if (productConfig.rxotc != 'False') {
        $("#manzeng_lingqu").text("满领");
        $("#huangou_huanqu").text("换取");
    }
    else {
        $("#manzeng_lingqu").text("满赠");
        $("#huangou_huanqu").text("换购");
    }
};
/*判断促销内容是否多于2行*/
function numMore() {
    $('#promotion_active').show();
    var discount = $("#discount_curpon_box ul li:visible").length;
    if (discount <= 0) {
        $('#promotion_active').hide();
        return;
    }
    var addHeight = 46;
    if (!$("#app_price").is(':hidden') || !$("#kill_countdown").is(':hidden')) {
        addHeight = 76;
    }
    addHeight = addHeight + (discount > 1 ? 8 : 0);
    if (discount > 2) {
        var pageMore = '<a class="bule-unline activeMore" onclick="activeMore(this)" style="float: left;">更多</a>';
        $("#discount_curpon_box").append(pageMore);
    }
    var maxHeight = $("#discount_curpon_box ul li:visible").eq(0).height() + $("#discount_curpon_box ul li:visible").eq(1).height();
    $("#discount_curpon_box ul li:visible").eq(discount - 1).addClass("lastactive");
    $("#discount_curpon_box").css("max-height", (maxHeight + 10) + "px");
    $("#discount_curpon_box").attr("max-h", maxHeight + 10);
    $(".activeMore").css("top", (maxHeight + 6) + "px");
    if (discount > 2) {
        $("#discount_curpon_box").css("overflow", "hidden");
        $("#discount_curpon_box ul li:visible").find(".prem-cuinfor-r").css("width", "422px");
    }
    var priceHeight = $("#promotion_active").height();
    $(".prem-ac-information").css("height", (priceHeight + addHeight) + "px");
};
/*展开收起*/
function activeMore(obj) {
    if ($(obj).hasClass('activeUp')) {
        $(obj).removeClass("activeUp");
        $(obj).text("更多");
        var maxHeight = $("#discount_curpon_box").attr("max-h");
        $("#discount_curpon_box").css("max-height", maxHeight + "px");
        $("#discount_curpon_box").css("overflow", "hidden");
        $(".activeMore").css("top", (parseInt(maxHeight) - 6) + "px")
    } else {
        $(obj).addClass("activeUp");
        $(obj).text("收起");
        $("#discount_curpon_box").removeAttr("style");
        var ulHeight = $("#discount_curpon_box ul").height();
        $(".activeMore").css("top", ulHeight - 6 + "px");
    }
};
/**
* 促销活动列表end
**/

/*库存状态:1-禁售缺货 2-禁售有货 3-现在有货 4-货源紧张 5-库存有限 6-暂时缺货*/
function inventoryStatus() {
    if ((productConfig.cartType == 2 || productConfig.isCanSale != 1) && (productConfig.rxType == 0 || productConfig.rxType == 1)) {
        $("#bybuy").css("background-color", "#999");
        $("#bybuy").removeAttr("onclick");
        $(".onloading").hide();
        $("#bybuy").removeClass("hidden");
        $("#cantbuy_warm").removeClass("hidden");
        $("#rx_warm").addClass("hidden");
        return;
    };
    var rd = Math.random();
    var url = "/product/GetStockByProductId?productId=" + productConfig.productId + "&rd=" + rd;
    $.get(url, function (data) {
        $(".onloading").hide();
        $("#bybuy").removeClass("hidden");
        switch (data) {
            case 1:
            case 2:
                $("#buystyle_type,.nohuo-hidden").hide();/*购买按钮隐藏和数量加减隐藏*/
                break;
            case 3:
                $("#inventory_status").text("现在有货");
                break;
            case 4:
                $("#inventory_status").text("货源紧张");
                break;
            case 5:
                $("#inventory_status").text("库存有限");
                break;
            case 6:
                $("#inventory_status").addClass("inf-rrzt-red");
                $("#inventory_status").text("商品已售完");
                $("#bybuy").addClass("hidden");
                $("#buynotice").removeClass("hidden");
                break;
            default:
                $("#inventory_status").text("您输入的单号错误");
        }
    });
};
/*获取特供库存状态*/
function getActivityStock() {
    var rd = Math.random();
    var url = "/product/GetActivityStock?productid=" + productConfig.productId + "&rd=" + rd;
    $.get(url, function (data) {
        if (data.Code == 0 && $("#double11_promote").length > 0) {
            $("#tegong_all").html(data.ActivityStockNum.replace('件', ''));
            $("#tegong_end").html(data.LeftStockNum.replace('件', '').replace('仅剩', ''));
            $("#double11_promote").removeClass("hidden");
        };
    });
};
/*药品信息:用法用量/药师指导-更多收起*/
function drugTalkShow(obj) {
    if ($(obj).hasClass('activeUp')) {
        $(obj).siblings("p").css({ "width": "480px", "height": "20px", "white-space": "nowrap", "display": "block", "float": "left", "text-overflow": "ellipsis" });
        $(obj).css({ "float": "left" });
        $(obj).removeClass("activeUp");
        $(obj).text("更多");
    } else {
        $(obj).siblings("p").css({ "width": "auto", "height": "auto", "white-space": "normal", "display": "inline", "float": "none", "text-overflow": "clip" });
        $(obj).css({ "float": "none" });
        $(obj).addClass("activeUp");
        $(obj).text("收起");
    }
};
/*规格*/
function getSameProductByPassnum() {
    if ($("#text_specBox ul li").length <= 0) {
        $("#spec_box").addClass('hidden');
        return;
    }
    $("#spec_box").removeClass('hidden');
    return;
};
/*疗程装*/
function liaochengList() {
    var rd = Math.random();
    var url = "/product/GetPreferentialListByProductId?productId=" + productConfig.productId + "&rd=" + rd;
    $.get(url, function (msg) {
        if (msg != null && msg.list.length > 0) {
            var useday = productConfig.useDay || 0,
                pkgstr = "",
                unitName = productConfig.unitName || '件'; /*单位默认盒*/
            data = msg.list;
            productConfig.pricenum = data.length;/*-&+&文本框buyQuantity()用到*/
            $('#course_treat').removeClass('hidden');
            for (i = 0; i < data.length; i++) {
                pkgstr += '<li><a href="javascript:;" onclick="addRedValue(this);"><span><font class="lcz-he">' + data[i].ProductNum + '</font>' + unitName + '起</span> <span><font class="lcz-price">' + data[i].PrmPrice.toFixed(2) + '</font>元/' + unitName;
                if (useday > 0) {
                    pkgstr += '，' + Math.floor(data[i].ProductNum * useday) + '天量</span></a></li>';
                } else {
                    pkgstr += '</span></a></li>';
                }
                myplate.arraynum[i] = [data[i].ProductNum, data[i].PrmPrice];/*-&+&文本框buyQuantity()用到*/
            }
            $("#text_courseTreat ul").html(pkgstr);
            showLiaoChenAtmosphere(data);
        } else {
            $("#course_treat").addClass('hidden');
        }
        LoadingSwitch();//正在加载切换
    });
};
/*疗程氛围*/
function showLiaoChenAtmosphere(data) {
    if ($("#double11_lcjh").length <= 0)
        return;
    var unitName = productConfig.unitName || '件';
    for (i = 0; i < data.length; i++) {
        $("#double11_lcjh ul").append("<li><span>" + data[i].ProductNum + "</span>" + unitName + "起 <span>" + data[i].PrmPrice.toFixed(2) + "</span>元/" + unitName + "</li>")
    }
    $("#double11_lcjh").show();
}
/*疗程装价格变动*/
function addRedValue(obj) {
    var _Ynum = $(obj).children('span').children('.lcz-he').text();
    productConfig.addNumber = _Ynum;
    productConfig.numModify = _Ynum;
    $('#num_mvalue').val(_Ynum);
    if ($(obj).parent('li').hasClass('dtl-inf-rur')) {
        productConfig.addNumber = 1;
        productConfig.numModify = 1;
        $('#num_mvalue').val(1);
        $(obj).parent('li').removeClass('dtl-inf-rur').siblings().removeClass('dtl-inf-rur');
    } else {

        $(obj).parent('li').addClass('dtl-inf-rur').siblings().removeClass('dtl-inf-rur');
        $('#text_courseTreat ul li').removeClass('dtl-rur-bor');
    }
    getPrice(false);
    numStyle();
    /*
    需求登记同步
    */
    productConfig.addNumber = $("#num_mvalue").val();
};
/*-&+&文本框价格变动*/
function buyQuantity(quantity) {
    var num = parseInt($("#num_mvalue").val());
    var addNum = (num + quantity > 0 ? num + quantity : 1);
    productConfig.numModify = addNum;
    $("#num_mvalue").val(addNum);
    getPrice(false);
    numStyle();
};
/*判断商品数量为0时自动*/
function numModify() {
    var Ynum = $('#num_mvalue').val(),
        _message = '<i class="ico-tipsExc"></i>请输入正确的数量';
    if (Ynum <= 0 || Ynum > 999) {
        $('#num_mvalue').val(1);
        productConfig.numModify = Ynum;
        $('#num_mvalue').focus();
        $('#text_courseTreat ul li').removeClass("dtl-inf-rur");
        showPrompt(_message, 0, 1);
    }
    if (productConfig.numModify != Ynum) {
        $('#text_courseTreat ul li').removeClass("dtl-inf-rur");
    }
    getPrice(false);
    numStyle();
};
/*判断文本框中的值是否小于等于1 而后改版样式*/
function numStyle() {
    if ($('#num_mvalue').val() <= 1) {
        $("#num_lvalue").css("color", "#cfcfcf");
    } else {
        $("#num_lvalue").css("color", "#212121");
    }
};


function getPrice(isFirst) {
    var rd = Math.random();
    var quantity = $("#num_mvalue").val();
    var url = "/product/getprice?wareskucode=" + productConfig.productId + "&quantity=" + quantity + "&rd=" + rd;
    $.get(url, function (data) {
        myplate.originalPrice = data.StyleInfo.OrigPrice.toFixed(2);
        var parsefloat = data.StyleInfo.Price.toFixed(2),
            showPrice = data.StyleInfo.Price,
            originalPrice = data.StyleInfo.OrigPrice.toFixed(2) || 0,
            priceName = "",
            text = '',
            priceMarket = '';
        if (originalPrice > parsefloat) {
            priceMarket = originalPrice;
        }
        if (data.Style == "SecKillStyle") {
            if (isFirst) {
                showCountDown(data.StyleInfo.SeckillEndTime, data.StyleInfo.ServerTime);
                secKillTagShow(data.StyleInfo.SingleQty);
            }
            productConfig.seckillNum = data.StyleInfo.SingleQty;
            productConfig.seckillPrice = data.StyleInfo.Price;
            priceName = "秒杀价";
            myplate.isSeckill = true;
        }
        else if (data.Style == "CommonStyle") {
            priceName = (productConfig.rxType > 0 ? "门店价" : "会员价");
        }
        else if (data.Style == "SaveStyle") {
            priceName = (productConfig.rxType > 0 ? "门店价" : "抢购价");
        }
        else if (data.Style == "IntervalStyle") {
            priceName = "会员价";
        }
        else if (data.Style == "CourseStyle") {
            priceName = "疗程价";
        }
        else {
            priceName = "会员价";
        }
        if (data.Style == "IntervalStyle") {
            showPrice = data.StyleInfo.MinSalePrice + "-" + data.StyleInfo.MaxSalePrice;
            $("#original_price").parent("span").hide();
        }
        if (data.StyleInfo.LessPrice > 0) {
            if (data.Style == "CourseStyle") {
                $("#henan_price").html((data.StyleInfo.LessPrice * quantity).toFixed(2));
                $("#henan_price").parent("span").show();
            } else {
                $("#henan_price").html(data.StyleInfo.LessPrice.toFixed(2));
                $("#henan_price").parent("span").show();
            }
        }
        else if (data.StyleInfo.LessPrice <= 0) {
            $("#henan_price").parent("span").hide();
        } else {
            $("#henan_price").parent("span").hide();
        }
        if (data.StyleInfo.LessPrice > 0 && (data.Style == "SaveStyle" || data.Style == "CourseStyle")) {
            $("#original_price").parent("span").hide();
        }
        else {
            $("#original_price").parent("span").show();
        }
        if (data.Style != "SecKillStyle" && data.StyleInfo.IsAppPrice && isFirst) {
            if (productConfig.rxType > 0) {
                $(".go-app-buy").html("去手机登记");
            }
            $("#app_price ul .sec").html("<span>￥</span>" + data.StyleInfo.AppPrice.toFixed(2));
            $("#app_price").show();
        }
        if (data.Style == "CourseStyle") {
            $("#saleprice_value").text((parsefloat * quantity).toFixed(2));
        } else {
            if (data.Style != "IntervalStyle") {
                $("#saleprice_value").text(showPrice.toFixed(2));
            } else {
                $("#saleprice_value").text(showPrice);
            }
        }
        if (data.Style != "SecKillStyle") {
            showCourseStyle(parsefloat);
        }
        $("#saleprice_name").text(priceName);
        $("#original_price").text(data.StyleInfo.OrigPrice.toFixed(2));
        productConfig.salePrice2 = parsefloat;
    });
}

function showCourseStyle(coursePrice) {
    $("#text_courseTreat ul li").removeClass('dtl-inf-rur');
    $("#text_courseTreat ul li").each(function () {
        var itemPrice = parseFloat($(this).find(".lcz-price").html());
        if (parseFloat(coursePrice) <= itemPrice) {
            $(this).addClass('dtl-inf-rur').siblings().removeClass('dtl-inf-rur');
            //$(this).find("a").click();
            return false;
        }
    })
}

function showCountDown(time1, time2) {
    $("#kill_countdown").show();
    var endtime = /(.+)?(?:\(|（)(.+)(?=\)|）)/.exec(time1);
    var nowtime = /(.+)?(?:\(|（)(.+)(?=\)|）)/.exec(time2);
    countDown(parseInt(endtime[2]), parseInt(nowtime[2]));
}

function countDown(endTime, startTime) {
    var time = endTime - startTime;
    var day = Math.floor(time / 1000 / 60 / 60 / 24);
    var hour = Math.floor(time / 1000 / 60 / 60 % 24);
    var min = Math.floor(time / 1000 / 60 % 60);
    var sec = Math.floor(time / 1000 % 60);
    $(".Killing span").eq(0).html(day);
    if (day < 1) {
        $(".Killing span").eq(0).hide();
        $(".Killing span").eq(1).hide();
    }
    $(".Killing span").eq(2).html(hour);
    $(".Killing span").eq(4).html(min);
    $(".Killing span").eq(6).html(sec);
    setTimeout(function () { countDown(parseInt(endTime), parseInt(startTime) + 1000); }, 1000);
}

function secKillTagShow(SingleQty) {
    if (!SingleQty)
        return;
    var txt = '';
    txt += '<li class="clearfix">\
                            <span class="prem-cuinfor-l">限购</span>\
                            <div class="prem-cuinfor-r">\
                                 <p>购买' +(SingleQty==1?'1':'1-'+SingleQty)+'件时享受优惠，超出数量以结算价为准</p>\
                            </div>\
                        </li>\
                        <li class="clearfix">\
                            <span class="prem-cuinfor-l">限制</span>\
                            <div class="prem-cuinfor-r">\
                                <p>秒杀价格不与其他优惠同时享受！</p>\
                            </div>\
                        </li>';
    if (!myplate.mark) {
        $("#discount_curpon_box ul").prepend(txt);
	$('.prem-prodesc').html("本商品正在参与限量秒杀中，抢完为止。")
    }
    myplate.mark = true;
}
/**
 * 促销价end
 */

/**
 * 是否参与秒杀begin
 */
function getSeckill() {
    var rd = Math.random();
    var flag = false,
        url = "/product/CheckSeckill?wareCode=" + productConfig.productId + "&rd=" + rd;
    $.get(url, function (data) {
        if (!data.Code && data.Data.Store && data.Data.IsTagShow) {
            if (productConfig.rxotc == "True") {
                priceName = "门店价"
            }
            else {
                priceName = "特惠"
            }
            $("#saleprice_name").text(priceName);
            $("#saleprice_value").text(data.Data.PrmPrice.toFixed(2));
            $("#original_price").text(productConfig.salePrice.toFixed(2));
            $("#henan_price").text((productConfig.salePrice - data.Data.PrmPrice).toFixed(2));
            $("#priceall").hide();
            $("#henan_price").parent("span").show();
            myplate.lishengIsSkill = (productConfig.salePrice - data.Data.PrmPrice).toFixed(2);/*秒杀的立省记录*/
            productConfig.seckillNum = data.Data.SingleQty;/*秒杀的数量记录*/
            productConfig.seckillPrice = data.Data.PrmPrice;/*秒杀的价格记录*/
            if (data.Data.SingleQty) {
                var txt = '';
                txt += '<li class="clearfix">\
                            <span class="prem-cuinfor-l">限购</span>\
                            <div class="prem-cuinfor-r">\
                                 <p>购买' +(data.Data.SingleQty==1?'1':'1-'+data.Data.SingleQty)+'件时享受优惠，超出数量以结算价为准</p>\
                            </div>\
                        </li>\
                        <li class="clearfix">\
                            <span class="prem-cuinfor-l">限制</span>\
                            <div class="prem-cuinfor-r">\
                                <p>特惠价格不与其他优惠同时享受！</p>\
                            </div>\
                        </li>';
                if (!myplate.mark) {
                    $("#discount_curpon_box ul").append(txt);
                }
                myplate.mark = true;
            };
        }
    });
};
/**
 * 是否参与秒杀end
 */

/**
 * 隐形眼镜begin
 */
function IsVirtualMainWareSku() {
    if ($("#IsColorSpec").length <= 0)
        return false;
    if ($(".selDegrees_on").length == 1)//没有选中度数不可加入购物车
        return true;
    if ($("#ypColor .on").length == 0) {
        $("#selColor").removeClass("selDegrees");
        $("#selColor").addClass("selDegrees_on");
        return true;
    }
    if ($("#ypDegrees .on").length == 0) {
        $("#selColor").removeClass("selDegrees");
        $("#selColor").addClass("selDegrees_on");
        return true;
    }
    return false;
};
function showColorSpec() {
    $("#selColor,#selDegrees").hide();
    var rd = Math.random();
    var url = "/product/GetColorSpec?wareSkuCode=" + productConfig.productId + "&productCode=" + productConfig.productCode + "&rd=" + rd;
    $.get(url, function (data) {
        if (!data.Data.IsShow) {
            getSameProductByPassnum();
            $("#selColor,#selDegrees").hide();
            return;
        }
        $(document.body).append("<input type=\"hidden\" id=\"IsColorSpec\" />");
        myplate.isVirtualMainWareSku = data.Data.IsVirtualMainWareSku;
        $("#spec_box").hide();//规格影藏
        $("#selColor,#selDegrees").show();
        if (data.Data.IsVirtualMainWareSku) { $("#stock_status").hide(); }
        myplate.colorSpecJson = data.Data.PropertyGroupList;
        myplate.colorName = data.Data.PropertyName["颜色"];
        myplate.specName = data.Data.PropertyName["度数"];
        loadColor(data.Data.PropertyList["颜色"]);
        loadSpec(data.Data.PropertyList["度数"]);
    });
};
function loadColor(color) {
    $("#ypColor").html("");
    for (var i = 0; i < color.length; i++) {
        var className = color[i].Name == myplate.colorName ? "on" : "",
            colorSpec = color[i].Name + "-" + myplate.specName,
            pic180 = (color[i].Pic180 == null || color[i].Pic180 == "无") ? urlConfig.res + "/theme/default/img/product/nopic_glasses.png" : color[i].Pic180;
        if (myplate.colorSpecJson[colorSpec] == undefined) {
            className = "off";
        }
        if (myplate.isVirtualMainWareSku) {
            className = "";
        }
        $("#ypColor").append("<a href=\"javascript:void(0)\" class='" + className + "' value=\"" + color[i].Name + "\"><img src=\"" + pic180 + "\" style=\"width:22px;height:22px;margin-top:1px;\">" + color[i].Name + "<span class=\"Ygx\"></span></a>");
    }
    colorCliek();
};
function loadSpec(spec) {
    $("#ypDegrees").html("");
    for (var i = 0; i < spec.length; i++) {
        var className = spec[i].Name == myplate.specName ? "on" : "",
            colorSpec = myplate.colorName + "-" + spec[i].Name;
        if (myplate.colorSpecJson[colorSpec] == undefined) {
            className = "off";
        }
        if (myplate.isVirtualMainWareSku) {
            className = "";
        }
        $("#ypDegrees").append("<a class='" + className + "' value='" + spec[i].Name + "' href=\"javascript:void(0)\">" + spec[i].Name + "<span class=\"Ygx\"></span></a>");
    }
    specCliek();
};
function colorCliek() {
    $("#ypColor a").click(function () {
        $("#selColor").removeClass("selDegrees_on");
        if ($(this).hasClass("on"))
            return;
        $(this).siblings().removeClass("on");
        $(this).siblings().removeClass("off");
        $(this).removeClass("off");
        $(this).addClass("on");
        jump();
    })
};
function specCliek() {
    $("#ypDegrees a").click(function () {
        $("#selDegrees").removeClass("selDegrees_on");
        if (!$("#ypColor a").hasClass("on")) {
            $("#selColor").addClass("selDegrees_on");
            return;
        }
        if ($(this).hasClass("on"))
            return;
        if ($(this).hasClass("off"))
            return;
        $(this).siblings().removeClass("on");
        $(this).addClass("on");
        jump();//选择跳转
    })
};
//选择跳转
function jump() {
    var color = $("#ypColor .on").attr("value"),
        spec = $("#ypDegrees .on").attr("value"),
        colorSpec = color + "-" + spec,
        wareSkuCode = myplate.colorSpecJson[colorSpec];
    if (wareSkuCode == undefined) {
        $("#selDegrees").removeClass("selDegrees");
        $("#selDegrees").addClass("selDegrees_on");
        $("#ypDegrees a").removeClass("on");
        $("#ypDegrees a").each(function () {
            var thisSpec = $(this).attr("value");
            colorSpec = color + "-" + thisSpec;
            if (myplate.colorSpecJson[colorSpec] == undefined) {
                $(this).addClass("off");
            }
            else {
                $(this).removeClass("off");
            }
        });
        return;
    }
    $("#selDegrees").removeClass("selDegrees_on");
    $("#selDegrees").addClass("selDegrees");
    $("#bybuy").hide();
    $(".onloading").show();
    window.location.href = "/product/" + wareSkuCode + ".shtml"
};
/**
 * 隐形眼镜end
 */

/**
 * 购买方法 begin
 * Id 单品id 或者套餐id
 * quantity 数量
 * type 0单品 1套餐
 **/
function addCartJsonp(Id, quantity, type) {
    var rd = Math.random();
    var url = "/cart/AddCart?id=" + Id + "&quantity=" + quantity + "&buyType=" + type + "&sellerCode=" + productConfig.sellerCode + "&rd=" + rd;
    if (type == 0) {
        if (IsVirtualMainWareSku()) {
            return;
        }
        $(".onloading").attr("class", "buyloading");
        $("#bybuy").hide();
        $(".buyloading").show();
        if (quantity == 0) {
            quantity = 1;
        }
    }
    $.get(url, function (data) {
        $(".buyloading").hide();
        $("#bybuy").show();
        if (data != "商品已成功添加到购物车！") {
            showPrompt(data, 0, 1);
            return;
        }
        if (type == 1) {
            autoMoveCart();//加入购物车时,右侧导航自动展开
            numtop();
        } else if (type == 0) {
            moveCartImg(); //抛物线
            setTimeout("numtop()", 2000);//数量气泡浮上
        }
        barGetCartList();//右边导航购物车的数量变化
    });
};
//数量气泡浮上
function numtop() {
    $("#singleNum").show().stop().animate({
        opacity: 1, top: -10
    }, 1000, function () {
        $("#singleNum").stop().animate({ opacity: 0, top: -20 }, 1000, function () {
            $("#singleNum").css('top', 20);
        }).fadeOut();
    });
};
//抛物线计算
function moveCartImg() {
    if ($.browser.msie && $.browser.version < 9) {
        autoMoveCart();
    } else {
        var $top = $("#bybuy").offset().top,
            $left = $("#bybuy").offset().left,
            cart_box = document.getElementById("cart_box"),
            cloneImg = document.getElementById("cloneImg"),
            parabola = funParabola(cloneImg, cart_box).mark();
        $("#cloneImg").show();
        $("#cloneImg").css({ marginLeft: 0, marginTop: 0, position: "absolute", left: $left, top: $top, zIndex: 9999 });
        $("#cloneImg").children("img").css({ width: 22, height: 22 });
        parabola.init();
        setTimeout(function () { $("#cloneImg").hide() }, 2000);
        setTimeout("autoMoveCart()", 2000);//右侧导航展开
    }
};
//加入购物车生成小图
function smallImg() {
    var cloneImg = $("#minPicScroll li img").eq(0).clone();
    $("#cloneImg").append(cloneImg);
};
//加入购物车时,右侧导航自动展开
function autoMoveCart() {
    if ($("#cart_lists_show").css("display") != "none")
        return;
    $(".cart_box").click();
    $("#nav_closeBtn").show();
};
/*正在加载切换*/
function LoadingSwitch() {
    $(".onloading").hide();
    $("#buyloading").show();
};

/*判断是否已经收藏*/
function showCollect() {
    var rd = Math.random();
    var url = "/Favorite/HasCollect?productId=" + productConfig.productId + "&rd=" + rd;
    $.get(url, function (data) {
        if (data.Code != 0)
            return;
        $("#collection_box").addClass("conllection-cur");
    });
};

/*电话回访*/
function PhoneBack(phoneTxt) {
    $('.Tel_bi1b').css('display', 'none'); $('.Tel_bi1b1').css('display', 'block');
    if ($.trim(phoneTxt) == '') {
        $('.Tel_bi1b1').css('display', 'none');
        $('.Tel_bi1b').css('display', 'block');
        $("#phoneTxt").focus();
        var _messageTel2 = '<i class="ico-tipsExc"></i>请填写电话回拨！';
        showPrompt(_messageTel2, 0, 1);
        return false;
    }
    //获取当前href
    var curHref = window.location.href;
    var mobilePhoneReg = /^(\d{11}$)/;
    var telphoneReg = /^(\d{3}-\d{8}|\d{4}-\d{7})$/;
    if (mobilePhoneReg.exec($.trim(phoneTxt)) || telphoneReg.exec($.trim(phoneTxt))) {
        $('#form_currenturl').val(curHref);
        $('#form_phone').val(phoneTxt);
        if (curHref.indexOf('?ref=kadsearch') > -1) {
            $("#form_ocRef").val("kadsearch");
        }
        var zmPhoneBack = $("#form_Order_Phone").serialize();
        $.ajax({
            type: 'get',
            url: "/Order/CreateCheckOrderPhone",
            cache: false,
            dataType: "json",
            data: zmPhoneBack,
            contentType: "application/x-www-form-urlencoded; charset=utf-8",
            json: 'callback',
            success: function (data) {
                if (data == "5") { alert("抱歉，系统升级中，暂时不能提交！(H)"); return false; }
                if (data[0] == "0") {
                    $('#Tel_bot,#Tel_bot1').val(' ');
                    $('#txtPhoneCall').val('');
                    poplayer('Buy_OrdS', 'closeClassb', true);
                    $('.Tel_bi1b1').css('display', 'none');
                    $('.Tel_bi1b').css('display', 'block');
                    $('#rdivBox').css('display', 'none');
                    $('#form_producttype').val(0);
                }
                else {
                    alert("提交失败");
                    $('.Tel_bi1b1').css('display', 'none'); $('.Tel_bi1b').css('display', 'block');
                }

            }
        })
    }
    else {
        $("#phoneTxt").focus();
        $('.Tel_bi1b1').css('display', 'none');
        $('.Tel_bi1b').css('display', 'block');
        var _messageTel = '<i class="ico-tipsExc"></i>请输入正确的电话号码！<br>如手机号：13900000000<br>或电话：010-66666666或0662-8989888！';
        showPrompt(_messageTel, 0, 1);
        return false;
    }
}

function AddCart_new(quantity, productId) {
    addCartJsonp2(productId, quantity, 0);
}

function addCartJsonp2(Id, quantity, type) {
    var rd = Math.random();
    var url = "/cart/AddCart?id=" + Id + "&quantity=" + quantity + "&buyType=" + type + "&sellerCode=" + productConfig.sellerCode + "&rd=" + rd;
    if (type == 0) {
        $(".onloading").attr("class", "buyloading");
        $("#bybuy").hide();
        $(".buyloading").show();
        if (quantity == 0) {
            quantity = 1;
        }
    }
    $.get(url, function (data) {
        $(".buyloading").hide();
        $("#bybuy").show();
        autoMoveCart();//加入购物车时,右侧导航自动展开
        numtop();
        barGetCartList();//右边导航购物车的数量变化
    });
};
/**
 * 购买方法end
 **/
/*懒执行加载活动专区*/
function GetProductSeoDesp() {
    var url = '/Product/GetProductSeoDesp?wareskuCode=' + productConfig.productId;
    $.get(url, function (data) {
        $(".kmodule-box").append(data.Data);
    });
};

function showRx() {
    var utm_source = GetQueryString("utm_source");
    var utm_medium = GetQueryString("utm_medium");
    if (utm_source == null) {
        $(".Yico_rx").show();
        return;
    }
    if (utm_source == "360" && utm_medium.toLowerCase() == "cpc") {
        $(".Yico_rx").hide();
        return;
    }
    if ($(".Yico_rx").length <= 0) {
        return;
    }
    $(".Yico_rx").show();
};

function GetQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
};

function needList(){
    var rd = Math.random();
    var url = '/Cart/GetCartCount?cartType=4&rd=' + rd;
    if($('#need_list').length >0){
        $.get(url, function (data) {
            if (data.TotalItemCount>0) {
                $('#need_list_num1').show();
            };
        });
    }
}
function needNumTop() {
    $("#need_list_num2").show().stop().animate({
        opacity: 1, top: -40
    }, 500, function () {
        $("#need_list_num2").stop().animate({ opacity: 0, top: -40 }, 1000, function () {
            $("#need_list_num2").css('top', -5);
        }).fadeOut();
    });
};
/**
*  init()为数据初始化，bindevent()一些交互效果
 **/
myplate.bindevent();
myplate.init();

$('#videoPlayBtn').click(function() {
    $('#videoBox').show();
    $(this).hide();
});
$('#videoBox__close').click(function() {
    $('#videoBox').hide();
    $('#videoPlayBtn').show();
});
$('.minPicScrolldiv>ul>li').hover(function() {
    $('#videoBox').hide();
    $('#videoPlayBtn').show();
});



/*
* 800图视频播放功能
* by xiefu
* 2017/11/29
*/

var video = {
    //判断是否有视频
    isVideo: $("#produceVideoUrl").val() != "" || $("#videoUrl").val() != "",

    //判断是否有本品视频
    isThisVideo: $("#produceVideoUrl").val() != "",

    // 判断是否有相关视频
    isRelatedVideo: $("#videoUrl").val() != "",

    //关闭视频
    closeVideo: function () {
        $('#thisVideo').remove();
        $('#relatedVideo').remove();
        if (this.isThisVideo) {
            $('.video-playButton').show();
        };
        if (this.isRelatedVideo) {
            $('.video-related').show();
        };
        $('.video-close').hide();
    },

    //插入视频
    satrtVideo: function (videoUrl) {
        $('.video-close').show();
        $('.video-playButton').hide();
        $('.video-related').hide();
        $('.video-play').append('<div id="thisVideo" class="this-video"><iframe border="0" src="' + videoUrl + '?embed=video" frameborder="no"></iframe></div>');
    },

    //初始化视频
    initVideo: function () {
        $('.video-play').show();
        $('#thisVideo').remove();
        $('#relatedVideo').remove();
        $('.video-close').hide();
        if (this.isThisVideo) {
            $('.video-playButton').show();
        };
        if (this.isRelatedVideo) {
            $('.video-related').show();
        };
        
    }
}

if (video.isVideo) {
    
    //小图新增按钮
    $('#minPicScroll li').eq(0).css('position', 'relative').append('<img src="http://res.360kad.com/theme/default/img/800pic/video-playButton.png" style="width:30px;height:30px; position: absolute;left: 0;top: 0;bottom:0;right:0;margin:auto">');

    //点击播放本品视频
    if (video.isThisVideo) {
        $('.video-playButton').show();
        $('.video-playButton').click(function () {
            var produceVideoUrl = $('#produceVideoUrl').val();
            video.satrtVideo(produceVideoUrl);
        });
    } else {
        $('.video-playButton').hide();
    }

    //点击播放相关视频
    if (video.isRelatedVideo) {
        $('.video-related').show()
        $('.video-related').click(function () {
            var videoUrl = $('#videoUrl').val();
            video.satrtVideo(videoUrl);
        });
    } else {
        $('.video-related').hide()
    }

    //点击关闭按钮关闭视频
    $('.video-close').click(function () {
        video.closeVideo();
    })

    // hover 除了第一个 li 标签
    $('#minPicScroll li:gt(0)').hover(function () {
        $('.video-play').css('z-index','-1');

    });

    // hover 第一个 li 标签初始化视频
    $('#minPicScroll li').eq(0).hover(function () {
        $('.video-play').css('z-index','999');

    });
} else {
    $('.video-play').hide();
}