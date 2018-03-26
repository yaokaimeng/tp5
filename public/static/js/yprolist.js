// JavaScript Document






//jQuery.cookie
jQuery.cookie = function (name, value, options) { if (typeof value != 'undefined') { options = options || {}; if (value === null) { value = ''; options.expires = -1; } var expires = ''; if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) { var date; if (typeof options.expires == 'number') { date = new Date(); date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000)); } else { date = options.expires; } expires = '; expires=' + date.toUTCString(); } var path = options.path ? '; path=' + (options.path) : ''; var domain = options.domain ? '; domain=' + (options.domain) : ''; var secure = options.secure ? '; secure' : ''; document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join(''); } else { var cookieValue = null; if (document.cookie && document.cookie != '') { var cookies = document.cookie.split(';'); for (var i = 0; i < cookies.length; i++) { var cookie = jQuery.trim(cookies[i]); if (cookie.substring(0, name.length + 1) == (name + '=')) { cookieValue = decodeURIComponent(cookie.substring(name.length + 1)); break; } } } return cookieValue; } };


//添加到收藏
function YCreateFavorite(obj, productID) {
    var d = IsLogin();
    if (d) {
        jQuery.ajax({
            url: "/Favorite/AddFavorite?wareCode=" + productID,
            type: "Get",
            cache: false,
            success: function (data) {
                if (data == 3) {
                    $(obj).addClass("on");
                    var _message = '<i class="ico-tipsDui"></i>收藏成功！'
                    showPrompt(_message, 0, 1)

                }
                else if (data == 1) {
                    $(obj).addClass("on");
                    var _message1 = '<i class="ico-tipsExc"></i>该商品已收藏！'
                    showPrompt(_message1, 0, 1)
                }
                else if (data == 0) {
                    var _message2 = '<i class="ico-tipscuo"></i>收藏失败，请重试！'
                    showPrompt(_message2, 0, 1)
                }
            }
        });


    }
    else {
        ToLogin();
    }

}


/*公共部分*/
//是否登录
function IsLogin() {
    var result = false;
    jQuery.ajax({
        type: "Get",
        url: "/User/GetUserInfo/",
        cache: false,
        async: false,
        success: function (msg) {
            result = msg.isLogin || false;
        }
    });
    return result;
}
//登录

function ToLogin() {
    poplayer('showLogOrReg', '', true);
}
//登录/注册
function getcheckboxon(obj) {
    if ($(obj).hasClass('on')) {
        $(obj).removeClass('on')
        $(obj).siblings('input').removeAttr('checked')
    } else {
        $(obj).addClass('on')
        $(obj).siblings('input').attr('checked', 'checked')
    }
}

function passwordtxtfocus(obj) {
    $(obj).hide()
    $('#UserPassword').focus()
    $('#UserPassword').show();

}
$(function () {
    $('#closeLog').click(function () {
        closeLogin();

    });
})
function closeLogin() {
    $(".txtError").children().text("");
    $("#UserName").val("邮箱/手机号/用户名").css("color", "#999");
    $("#UserPassword").val("");
    $(".p_input").children("input").removeClass("input_error");
    $(".p_input").children("i").removeClass('txt_error txt_right');
    $(".p_input").children("i.txt_icon").css('display', 'none');
    $('#EmailErr,#PasswordErr').css('display', 'none');
    $('.txtError').hide();
    popClose('showLogOrReg', true);
    nRegNum = 0;
}

/*flag true/false 成功/失败
result  用户Id/失败信息
code 0成功 其他失败 
Message 信息
url url*/
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
    jQuery.ajax({
        url: urlConfig.user + '/Login/AjaxLogin',
        type: "Post",
        data: "userName=" + Email + "&pass=" + Password,
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            /*flag true/false 成功/失败
            result  用户Id/失败信息
            code 0成功 其他失败 
            Message 信息
            url url*/
            if (data.Flag == true) {
                popClose('showLogOrReg', true);
                var productid = jQuery("#product_id_str").val();
                if (productid > 0) {
                    AddCart_new(1, '', productid, '');
                }
                GetLogin();
                if ($("#IsHave").html() != "暂时缺货(T)") {
                    if (nRegNum == 1) { ShowNeedRegBox(); InitCheckOrderMsg(); }
                }

            }
            else {
                if (data.Code == 1) {
                    objName = "UserName";
                    idstr = $("#" + objName).attr("id");
                    $("span[data-valmsg-for=\"" + idstr + "\"]").text("登录名不存在！");
                    $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block");
                    $("#" + objName).addClass("input_error");
                    $("#" + objName).siblings("i").show().attr("class", "txt_icon txt_error");
                }
                else if (data.Code == 2) {
                    objName = "UserPassword";
                    idstr = $("#" + objName).attr("id");
                    if (Password.length < 6 || Password.length > 20) {
                        $("span[data-valmsg-for=\"" + idstr + "\"]").text("密码长度应在6-20位之间！");
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
}


//账号密码验证  
function txtfocus(obj) {
    var idstr = obj.id;
    var valText = $.trim($("div[data-valmsg-for=\"" + idstr + "\"]").text());
    var input_val = $(obj).val();

    if (input_val == "邮箱/手机号/用户名") {
        $(obj).css("color", "#333");
        $(obj).val("");
    }
    else {
        $(obj).css("color", "black");
    }
    $(obj).siblings(".txt_icon").hide().attr("class", "txt_icon");
    $(obj).addClass("input_hover").removeClass("input_error");
    $(obj).siblings(".txt_icon").hide().attr("class", "txt_icon");
    $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "none");
    if (valText == "") {
        $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "none");
        if ($.trim($(obj).val()).length == 0) {
        }
    } else {
        $("div[data-warnmsg-for=\"" + idstr + "\"]").css("display", "none");
        return true;
    }
}
var isOk = true;
function txtblur(obj) {

    var idstr = obj.id;
    $(obj).removeClass("input_hover");
    $("div[data-warnmsg-for=\"" + idstr + "\"]").css("display", "none");
    var isOk = true;
    var input_val = $(obj).val();

    if ($(obj).attr("data-val")) {
        if (typeof ($(obj).attr("data-val-regex")) != "undefined") {
            var pattern = $(obj).attr("data-val-regex-pattern");

            var regx = new RegExp(pattern);
            if (input_val == "") {
                $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block")
                $("span[data-valmsg-for=\"" + idstr + "\"]").text($(obj).attr("data-val-required"));

                $(obj).addClass("input_error");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                return false;
            }
            else if (regx.test(input_val) == true && ($(obj).val() != "邮箱/手机号/用户名")) {
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                $(obj).removeClass("input_error");
                return true;
            }
            else {
                $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block");
                $("span[data-valmsg-for=\"" + idstr + "\"]").text($(obj).attr("data-val-regex"));
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                return false;
            }
        }
        if (typeof ($(obj).attr("data-val-required")) != "undefined") {
            if ($.trim($(obj).val()) == 0) {
                $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block")
                $("span[data-valmsg-for=\"" + idstr + "\"]").text($(obj).attr("data-val-required"));
                $(obj).addClass("input_error");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                isOk = false;
            }
            else {
                $(obj).removeClass("input_error");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
            }
        }


        if (typeof ($(obj).attr("data-val-length")) != "undefined") {
            var data = $(obj).val();
            var max = $(obj).attr("data-val-length-max");
            var min = $(obj).attr("data-val-length-min");
            if (data.length < min || data.length > max) {
                $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "block");
                $("span[data-valmsg-for=\"" + idstr + "\"]").text($(obj).attr("data-val-length"));
                $(obj).addClass("input_error");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                isOk = false;
            }
            else {
                $(obj).removeClass("input_error");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
            }

        }

        if (isOk) {
            $("div[data-valmsg-for=\"" + idstr + "\"]").css("display", "none");
            $("span[data-valmsg-for=\"" + idstr + "\"]").empty();
        }
    }

}
//关闭dialog
function popClose(showname, showtype) {
    document.getElementById(showname).style.display = "none";
    if (showtype) { document.getElementById("layer").style.display = "none"; }

}
//遮罩层2013-08-23
function poplayer(idname, closename, showtype) {
    var isIE = (document.all) ? true : false;
    var isIE6 = isIE && (navigator.userAgent.indexOf('MSIE 6.0') != -1);
    var newbox = document.getElementById(idname);
    var closebtn = document.getElementById(closename);
    newbox.style.zIndex = "9999";
    newbox.style.display = "block"
    newbox.style.position = !isIE6 ? "fixed" : "absolute";
    newbox.style.top = newbox.style.left = "50%";
    newbox.style.marginTop = -newbox.offsetHeight / 2 + "px";
    newbox.style.marginLeft = -newbox.offsetWidth / 2 + "px";
    if (showtype) {
        if (document.getElementById("layer") == undefined) {
            var layer = document.createElement("div");
            layer.id = "layer";
            layer.style.width = layer.style.height = "100%";
            layer.style.position = !isIE6 ? "fixed" : "absolute";
            layer.style.top = layer.style.left = 0;
            layer.style.backgroundColor = "#000";
            layer.style.zIndex = "9998";
            layer.style.opacity = "0.4";
            document.body.appendChild(layer);
        }
        else { layer = document.getElementById("layer"); document.getElementById("layer").style.display = "block"; }
    }

    function layer_iestyle() {
        document.getElementById("layer").style.width = Math.max(document.documentElement.scrollWidth, document.documentElement.clientWidth)
+ "px";
        layer.style.height = $(document).height();
    }
    function newbox_iestyle() {
        newbox.style.marginTop = document.documentElement.scrollTop - newbox.offsetHeight / 2 + "px";
        newbox.style.marginLeft = document.documentElement.scrollLeft - newbox.offsetWidth / 2 + "px";
    }
    if (isIE) { document.getElementById("layer").style.filter = "alpha(opacity=60)"; }
    if (isIE6) {
        if (showtype) { layer_iestyle(); }
        newbox_iestyle();
        window.attachEvent("onscroll", function () {
            newbox_iestyle();
        })
        window.attachEvent("onresize", layer_iestyle)
    }
    closebtn.onclick = function () {
        newbox.style.display = "none"; if (showtype) { document.getElementById("layer").style.display = "none" };
    }
}

var code; //在全局 定义验证码
function createCode() {
    code = "";
    var codeLength = 4; //验证码的长度
    var checkCode = document.getElementById("checkCode");
    checkCode.value = "";

    var selectChar = new Array(2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

    for (var i = 0; i < codeLength; i++) {
        var charIndex = Math.floor(Math.random() * 32);
        code += selectChar[charIndex];
    }
    if (code.length != codeLength) {
        createCode();
    }
    checkCode.value = code;
}

function validate() {
    var inputCode = document.getElementById("input1").value.toUpperCase();

    if (inputCode.length <= 0) {
        alert("请输入验证码！");
        var _message = '<span class="ico_exc"></span><p>请输入验证码！</p>'
        showPrompt(_message, 0, 1)
        return false;
    }
    else if (inputCode != code) {
        alert("验证码输入错误！");
        var _message1 = '<span class="ico_cuo"></span><p>验证码输入错误！</p>'
        showPrompt(_message1, 0, 1)
        createCode();
        return false;
    }
    else {
        return true;
    }

}

//提示框
function closets(obj) {
    //$(obj).parents('#showPrompt').hide()
    popClose('showPrompt', true);
}
function surets() {
    //$('#showPrompt').hide()
    popClose('showPrompt', true);
}
//type 0：空 1：叹号 2：勾 3：叉
//Opera 0：空 1：确定 2：确定+取消 
//<span class="ico_exc"></span><span class="ico_dui"></span><span class="ico_cuo"></span>
function showPrompt(message, Opera, type) {

    //判断操作按钮
    if (Opera == 1) {
        switch (type) {
            case 0:
                $('#showPrompt .go_sure').attr('onclick', 'diyfunction0()')
                break;
            case 1:
                $('#showPrompt .go_sure').attr('onclick', 'diyfunction1()')
                break;
            case 2:
                $('#showPrompt .go_sure').attr('onclick', 'diyfunction2()')
                break;
            case 3:
                $('#showPrompt .go_sure').attr('onclick', 'diyfunction3()')
                break;
        }
    }
    else {
        $('#showPrompt .go_Cancel').hide()
    }

    //显示界面
    //$('#showPrompt').show();

    $('#showPrompt .Bcon').html(message);
    poplayer('showPrompt', '', true);
}
//提示框 end




(function () {

    //买了的人还买了
    $(function () {
        var initN = 0;
        var $buyProList = $("#Browse-historylist");
        var $proBoxW = $buyProList.find(".YLicon").outerWidth();
        var $buyUl = $buyProList.find('ul');
        var $buyLi = $buyUl.find("li");
        var liW = $buyLi.outerWidth();
        var liSize = $buyLi.size();
        var $prevBtn = $buyProList.find(".Ylt")
        var $nextBtn = $buyProList.find(".Ygt")
        var initPages = Math.ceil(liSize / 6);

        $buyUl.css("width", liW * liSize + "px");

        if (initPages > 1) {
            $prevBtn.show(); $nextBtn.show();
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
                return false;
            }
            changeFn();
        });

        //上一个
        $prevBtn.bind('click', function (event) {

            initN--;
            if (initN == -1) {
                initN = 0;
                return false;
            }
            changeFn();
        });

        //ul切换函数
        function changeFn() {
            $buyUl.stop().animate({ marginLeft: -initN * $proBoxW + "px" }, 600);
        }


    });

})();


jQuery(document).ready(function () {
    var $ProListli = $("#YproList>ul>li");
    //鼠标经过li
    $ProListli.hover(function () {
        $(this).css("border-color", "#ff0000");
    }, function () {
        $(this).css("border-color", "#fff");
    });
});
jQuery(document).ready(function () {
    var $YproductLi = $("#YproductList > li > div");
    //鼠标经过li
    $YproductLi.hover(function () {
        $(this).css("border-color", "#ff0000");
        $(this).children().children('.yin_ico').show();
    }, function () {
        $(this).css("border-color", "#fff");
        $(this).children().children('.yin_ico').hide();
    });
});
