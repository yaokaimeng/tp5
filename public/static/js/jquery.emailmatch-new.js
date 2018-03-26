
(function ($) {
    $.fn.emailMatch = function (settings) {
        var defaultSettings = {
            emailTip: "邮箱/手机号/用户名",
            aEmail: ["sina.com", "163.com", "qq.com", "126.com", "vip.sina.com", "sina.cn", "hotmail.com", "gmail.com", "sohu.com", "139.com"], //邮件数组
            wrapLayer: "body",
            className: "mailListBox",
            emailRemember: true,
            autoCursor: false,
            position: "bottom", // bottom, left , right
            autoShow: true, // false:有@符号才显示
            IsCart: false, //购物车页面不减去两个像素
            width: 0, //自定义输入框的宽
            height: 0 //自定义输入框的高
        };
        /* 合并默认参数和用户自定义参数 */
        settings = settings ? $.extend(defaultSettings, settings) : defaultSettings;
        return this.each(function () {
            var elem = $(this), t = 0, l = 0,
			w = settings.width > 0 ? settings.width - 1 : elem.outerWidth() - 1,
			h = settings.height > 0 ? settings.height : elem.outerHeight(),
			selectVal = sMail = inputVal = "", arrayNum = 0,
			isIndex = -1;

            switch (settings.position) {  // 判断 列表位置
                case "bottom":
                    t = elem.position().top;
                    l = elem.position().left;
                    break;
                case "left":
                    t = elem.position().top - h;
                    l = elem.position().left - w;
                    break;
                case "right":
                    t = elem.position().top - h;
                    l = elem.position().left + w;
                    break;
                default:
                    t = elem.position().top;
                    l = elem.position().left;
            }

            var mailWrap = document.createElement("div");
            $(mailWrap).attr({ "id": elem.attr("id"), "class": settings.className })
            $(settings.wrapLayer).append(mailWrap);
            if ($.trim(elem.val()) == "" &&
                settings.emailTip != '') {
                elem.val(settings.emailTip);
                elem.css("color", "#C1C1C1");
            };
            elem.focus(function () {
                /*如果elem元素开始是隐藏的，刚才取到的宽高值可能不准确，要用下面两行再取一次*/
                w = settings.width > 0 ? settings.width - 1 : elem.outerWidth() - 1;
                h = settings.height > 0 ? settings.height : elem.outerHeight();
                arrayNum = 0;
                if ($.trim(elem.val()) == settings.emailTip &&
                    settings.emailTip != '') {
                    elem.val(''); elem.css("color", "#C1C1C1");
                }; // 清空 输入框 提示内容
                if ($.trim(elem.val()) != "") {
                    inputVal = $.trim(elem.val());
                    isIndex = inputVal.indexOf("@");
                    if (isIndex >= 0) {
                        sMail = inputVal.substr(isIndex + 1);
                        inputVal = inputVal.substring(0, isIndex);
                        if (sMail != "") {
                            arrayNum = parseInt(!position(settings.aEmail, sMail) ? 0 : position(settings.aEmail, sMail));
                        }
                    }
                    if (settings.autoCursor) {
                        elem.val(inputVal);
                        if ($.browser.msie) {
                            setCaretAtEnd(elem.attr("id"));
                        }
                    }
                    if (settings.autoShow || isIndex >= 0) {
                        showList($(mailWrap), w, h, t, l, settings.position, elem, settings.IsCart);
                        createMailList(mailWrap, inputVal, sMail, settings.aEmail, arrayNum);
                    }
                };
            }).blur(function () {
                inputVal = $.trim(elem.val());
                isIndex = inputVal.indexOf("@");
                if (!settings.autoShow) {
                    if (elem.val() == '') {
                        if (settings.emailTip != '') {
                            elem.val(settings.emailTip);
                            elem.css("color", "#c1c1c1");
                        }
                        hideList($(mailWrap));
                        return false;
                    }; // 还原 输入框 提示内容
                }
                if (settings.autoShow || isIndex >= 0) {
                    enterVal(mailWrap, elem, settings.IsCart, settings.autoShow);
                }
                hideList($(mailWrap));

                if (!settings.IsCart) {
                    //验证
                    var obj = "#" + elem.attr("id");
                    var idstr = elem.attr("id");
                    $(obj).removeClass("input_hover");
                    $("div[data-warnmsg-for=\"" + idstr + "\"]").css("display", "none");
                    var isOk = true;
                    if ($(obj).attr("data-val")) {

                        if (typeof ($(obj).attr("data-val-regex")) != "undefined") {
                            var pattern = $(obj).attr("data-val-regex-pattern");
                            var regx = new RegExp(pattern);

                            if (!regx.test($(obj).val())) {
                                $("span[data-valmsg-for=\"" + idstr + "\"]").css("display", "inline-block");
                                $("span[data-valmsg-for=\"" + idstr + "\"]").html("<i data-valmsg-replace=\"true\" data-valmsg-for=\"Email\" class=\"icon\"></i>" + $(obj).attr("data-val-regex"));
                                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                                $(obj).parents(".txtClass").addClass("p_error");
                                isOk = false;
                            }
                            else {
                                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                                $(obj).parents(".txtClass").removeClass("p_error");
                            }
                        }
                        if (typeof ($(obj).attr("data-val-required")) != "undefined") {
                            if ($.trim($(obj).val()) == 0) {
                                $("span[data-valmsg-for=\"" + idstr + "\"]").css("display", "inline-block");
                                $("span[data-valmsg-for=\"" + idstr + "\"]").html("<i data-valmsg-replace=\"true\" data-valmsg-for=\"Email\" class=\"icon\"></i>" + $(obj).attr("data-val-required"));
                                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                                $(obj).parents(".txtClass").addClass("p_error");
                                isOk = false;
                            }
                            else {
                                if (isOk) {
                                    $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                                    $(obj).parents(".txtClass").removeClass("p_error");
                                }
                            }
                        }

                        if (typeof ($(obj).attr("data-val-remote")) != "undefined") {
                            if ($.trim($(obj).val()).length > 0) {
                                var url = $(obj).attr("data-val-remote-url") + "?email=" + $(obj).val();
                                $.ajax({
                                    type: "get",
                                    url: url,
                                    cache: false,
                                    success: function (data) {
                                        if (!data) {
                                            $("span[data-valmsg-for=\"" + idstr + "\"]").css("display", "inline-block");
                                            $("span[data-valmsg-for=\"" + idstr + "\"]").html("<i data-valmsg-replace=\"true\" data-valmsg-for=\"Email\" class=\"icon\"></i>" + $(obj).attr("data-val-remote"));
                                            $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                                            $(obj).parents(".txtClass").addClass("p_error");
                                            isOk = false;
                                        }
                                        else {
                                            if (isOk) {
                                                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                                                $(obj).parents(".txtClass").removeClass("p_error");
                                            }
                                        }
                                    }
                                });
                            }
                        }
                        if (typeof ($(obj).attr("data-val-length")) != "undefined") {
                            var data = $(obj).val();
                            var max = $(obj).attr("data-val-length-max");
                            var min = $(obj).attr("data-val-length-min");
                            if (data.length < min || data.length > max) {
                                $("span[data-valmsg-for=\"" + idstr + "\"]").css("display", "inline-block");
                                $("span[data-valmsg-for=\"" + idstr + "\"]").html("<i data-valmsg-replace=\"true\" data-valmsg-for=\"Email\" class=\"icon\"></i>" + $(obj).attr("data-val-length"));
                                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                                $(obj).parents(".txtClass").addClass("p_error");
                                isOk = false;
                            }
                            else {
                                if (isOk) {
                                    $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                                    $(obj).parents(".txtClass").removeClass("p_error");
                                }
                            }

                        }
                        if (typeof ($(obj).attr("data-val-equalto")) != "undefined") {
                            var objId = $(obj).attr("data-val-equalto-other").substring(2, $(obj).attr("data-val-equalto-other").length);
                            var data = $(obj).val();
                            var max = $(obj).attr("data-val-length-max");
                            var min = $(obj).attr("data-val-length-min");
                            if ($("#" + objId).val() != "" && $(obj).val() != "") {
                                if ($("#" + objId).val() != $(obj).val()) {
                                    $("span[data-valmsg-for=\"" + idstr + "\"]").css("display", "inline-block");
                                    $("span[data-valmsg-for=\"" + idstr + "\"]").html("<i data-valmsg-replace=\"true\" data-valmsg-for=\"Email\" class=\"icon\"></i>" + $(obj).attr("data-val-equalto"));
                                    $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                                    $(obj).parents(".txtClass").addClass("p_error");
                                    isOk = false;
                                }
                                else if (data.length < min || data.length > max) {
                                    $("span[data-valmsg-for=\"" + idstr + "\"]").css("display", "inline-block");
                                    $("span[data-valmsg-for=\"" + idstr + "\"]").html("<i data-valmsg-replace=\"true\" data-valmsg-for=\"Email\" class=\"icon\"></i>" + $(obj).attr("data-val-length"));
                                    $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_error");
                                    //$("#" + objId).next().show().attr("class","txt_icon txt_error");
                                    $(obj).parents(".txtClass").addClass("p_error");
                                    isOk = false;
                                }
                                else {
                                    if (isOk) {
                                        $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                                        $("#" + objId).next().show().attr("class", "txt_icon txt_right");
                                        $(obj).parents(".txtClass").removeClass("p_error");
                                        $("#" + objId).parents(".txtClass").removeClass("p_error");
                                        $("div[data-valmsg-for=\"" + objId + "\"]").css("display", "none");
                                    }
                                }
                            }
                        }
                        if (isOk) {
                            $("span[data-valmsg-for=\"" + idstr + "\"]").css("display", "none");
                            $("span[data-valmsg-for=\"" + idstr + "\"]").empty();
                        }
                    }
                }
            });
            elem.keyup(function (e) {
                var suffixArray = [], eKey = e && (e.which || e.keyCode);
                //console.log(eKey);
                switch (eKey) {
                    case 9: // tab 按键
                        return;
                        break;
                    case 13:
                        { // 回车 
                            enterVal(mailWrap, elem, settings.IsCart, settings.autoShow);
                            hideList($(mailWrap));
                        } break;
                    case 38:
                        { // 方向键 上
                            inputVal = $.trim(elem.val());
                            var keyIndex = inputVal.indexOf("@");
                            if (settings.autoShow || keyIndex >= 0) {
                                showList($(mailWrap), w, h, t, l, settings.position, elem, settings.IsCart);
                                cursorMove(mailWrap, -1);
                            }
                        } break;
                    case 40:
                        {// 方向键 下
                            inputVal = $.trim(elem.val());
                            var keyIndex = inputVal.indexOf("@");
                            if (settings.autoShow || keyIndex >= 0) {
                                showList($(mailWrap), w, h, t, l, settings.position, elem, settings.IsCart);
                                cursorMove(mailWrap, +1);
                            }
                        } break;
                    default:
                        {
                            inputVal = $.trim(elem.val());
                            var keyIndex = inputVal.indexOf("@");
                            var suffix = "", suffixState = true;
                            if (keyIndex >= 0) {
                                suffix = inputVal.substr(keyIndex + 1);
                                inputVal = inputVal.substring(0, keyIndex);
                                $("#t2").text("BBB" + inputVal);
                                if (suffix != '' && settings.emailRemember) { // 过滤数组
                                    for (var i = 0; i < settings.aEmail.length; i++) {
                                        if (settings.aEmail[i].indexOf(suffix) == 0) {
                                            suffixArray.push(settings.aEmail[i]);
                                            suffixState = false;
                                        }
                                    }
                                }
                                if (suffix != '' && !settings.emailRemember) { // 当前高亮 选项 
                                    for (var i = 0; i < settings.aEmail.length; i++) {
                                        if (settings.aEmail[i].indexOf(suffix) == 0) {
                                            arrayNum = i;
                                            suffixState = false;
                                            break;
                                        }
                                    }
                                }
                            }

                            suffixArray = suffixArray.length > 0 ? suffixArray : settings.aEmail;
                            if (inputVal == "" && suffix == "") {
                                hideList($(mailWrap));
                                arrayNum = 0;
                                createMailList(mailWrap, inputVal, suffix, settings.aEmail, arrayNum);
                            } else {
                                if (settings.autoShow || keyIndex >= 0) {
                                    showList($(mailWrap), w, h, t, l, settings.position, elem, settings.IsCart);
                                    createMailList(mailWrap, inputVal, suffix, suffixArray, arrayNum);
                                }
                                else {
                                    hideList($(mailWrap));
                                    arrayNum = 0;
                                    createMailList(mailWrap, inputVal, suffix, settings.aEmail, arrayNum);
                                }
                            }
                        }
                }

            });

            $(mailWrap).find("li:not('.first')").live('mouseover', function () {
                $(this).addClass("hover").siblings().removeClass("hover");
            });
            $(mailWrap).find("li:not('.first')").live('mousedown', function () {
                $(this).addClass("current").siblings().removeClass("current");
                enterVal(mailWrap, elem, settings.IsCart, settings.autoShow);
                hideList($(mailWrap));
            });
            $(mailWrap).bind("mouseout", function () {
                $(mailWrap).find("li:not('.first')").removeClass("hover");
            });
        });
    };

    function cursorMove(o, n) {
        var cursorList = $(o).find("li:not('.first')"), k = new Number();
        for (i = 0; i < cursorList.length; i++) {
            if (cursorList[i].className == "current") {
                k = i + n
                cursorList[i].className = "";
            };
        }
        if (k < 0) k = 0;
        if (k >= cursorList.length - 1) k = cursorList.length - 1;
        cursorList[k].className = "current";
    }

    function setCaretAtEnd(field) { // IE 系列浏览器 在自动光标跳回文档首问题
        var b = document.getElementById(field);
        if (b.createTextRange) {
            var r = b.createTextRange();
            r.moveStart('character', b.value.length);
            r.collapse();
            r.select();
        }
    }

    function position(array, value) {  // 取得 元素在数组中的位置
        for (var i in array) {
            if (array[i] == value) {
                return i; break;
            }
        }
    };
    function enterVal(oWrap, elem, IsCart, autoShow) {
        if (!IsCart) {
            if ($(".mailListBox:first").css("display") != "none") {
                if (autoShow || elem.val().indexOf("@") != -1) {
                    elem.val($(oWrap).find("li.current").text());
                }
            }
        }
        else {
            if (autoShow || elem.val().indexOf("@") != -1) {
                if ($.trim(elem.val()) != "") {
                    elem.val($(oWrap).find("li.current").text());                    
                }
            }
        }
    };

    function showList(oElem, w, h, t, l, p, elem, IsCart) { // 显示 邮箱框架 并定位.
        switch (p) {  // 判断 列表位置
            case "bottom":
                t = elem.position().top;
                l = elem.position().left;
                break;
            case "left":
                t = elem.position().top - h;
                l = elem.position().left - w;
                break;
            case "right":
                t = elem.position().top - h;
                l = elem.position().left + w;
                break;
            default:
                t = elem.position().top;
                l = elem.position().left;
        }
        var exWidth = 2;
        if (IsCart) {
            exWidth = 0;
        }
        oElem.css({ "display": "block", "top": h + t, "left": l, "width": w - exWidth });
    };

    function hideList(oElem) { // 显示 邮箱框架 
        oElem.css({ "display": "none" });
    };

    function createMailList(oWrap, sVal, suffix, aEail, nK) { // 创建 候选列表
        if (nK < 0) { nK = 0; }
        if (nK > aEail.length - 1) { nK = aEail.length - 1; }
        var mailList = "<li class='first'><span>请选择邮箱类型</span></li>";
        var State = true; // 用户键入 后缀 是否匹配候选后缀 的状态

        for (k = 0; k < aEail.length; k++) {
            if (suffix != '' && aEail[k].indexOf(suffix) == 0) {
                State = false;
            }
        }

        nK = parseInt(suffix != '' && State && !position(aEail, suffix) ? 0 : nK);

        if (suffix != '' && State) {
            if (nK == 0) {
                mailList += '<li class="current"><span>' + sVal + '</span>@' + suffix + '</li>';
            } else {
                mailList += '<li><span>' + sVal + '</span>@' + suffix + '</li>';
            }
        }
        if ($.isArray(aEail)) {
            $.each(aEail, function (i) {
                if (State && suffix != '') {
                    if (i == (nK - 1)) {
                        mailList += '<li class="current"><span>' + sVal + '</span>@' + aEail[i] + '</li>';
                    } else {
                        mailList += '<li><span>' + sVal + '</span>@' + aEail[i] + '</li>';
                    }
                } else {
                    if (i == nK) {
                        mailList += '<li class="current"><span>' + sVal + '</span>@' + aEail[i] + '</li>';
                    } else {
                        mailList += '<li><span>' + sVal + '</span>@' + aEail[i] + '</li>';
                    }
                }
            });
        }
        mailList = "<ul>" + mailList + "</ul>";
        $(oWrap).html(mailList);
    };
})(jQuery);
