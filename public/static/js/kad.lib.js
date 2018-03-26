/// <reference path="jquery.d.ts" />
/// <reference path="envconfig.dev.ts" />
/// <reference path="kad.base.dev.ts" />
/// <reference path="kad.rightBar.ts" />
var pcLogin = (function () {
    function pcLogin() {
        this.loginWeightUrl = "/weight/get?id=common_kadlogin";
        this.toLoginUrl = urlConfig.user + "/login/ajaxloginv2";
    }
    pcLogin.prototype.goLogin = function (callback) {
        this.callBack = callback;
        this.loadLoginHtml();
    };
    pcLogin.prototype.bindEvent = function () {
        var _this = this;
        $("#LoginButton").click(function () {
            if (_this.checkData()) {
                _this.ajaxLogin();
            }
        });
        $("#kadlogin_checkbox").click(function () {
            if ($(this).hasClass('on')) {
                $(this).removeClass('on');
                $(this).siblings('input').removeAttr('checked');
            }
            else {
                $(this).addClass('on');
                $(this).siblings('input').attr('checked', 'checked');
            }
        });
        $("#UserName").blur(function () {
            _this.LoginTxtBlur(this);
        });
        $("#UserName").focus(function () {
            _this.LoginTxtOnFocus(this);
        });
        $("#UserPassword").blur(function () {
            _this.LoginTxtBlur(this);
        });
        $("#UserPassword").focus(function () {
            $('#LoginError').html('');
            _this.LoginTxtOnFocus(this);
        });
        $('#closeLog').click(function () {
            _this.hideLogin(2);
        });
    };
    pcLogin.prototype.LoginTxtBlur = function (obj) {
        var _this = this;
        var id = obj.id;
        $(obj).removeClass("input_hover");
        $("div[data-warnmsg-for='" + id + "']").css("display", "none");
        var isOk = true;
        var input_val = $(obj).val();
        if (!$(obj).attr("data-val"))
            return;
        if (typeof ($(obj).attr("data-val-regex")) != "undefined") {
            var pattern = $(obj).attr("data-val-regex-pattern");
            var regx = new RegExp(pattern);
            if (input_val == "") {
                _this.showError(id, $(obj).attr("data-val-required"));
                return false;
            }
            else if (regx.test(input_val) == true && (input_val != "邮箱/手机号/用户名")) {
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
                $(obj).removeClass("input_error");
                return true;
            }
            else {
                _this.showError(id, $(obj).attr("data-val-regex"));
                return false;
            }
        }
        if (typeof ($(this).attr("data-val-required")) != "undefined") {
            if ($.trim(input_val) == "0") {
                _this.showError(id, $(obj).attr("data-val-required"));
                isOk = false;
            }
            else {
                $(obj).removeClass("input_error");
                $(obj).siblings(".txt_icon").show().attr("class", "txt_icon txt_right");
            }
        }
        if (typeof ($(obj).attr("data-val-length")) != "undefined") {
            var max = parseInt($(obj).attr("data-val-length-max"));
            var min = parseInt($(obj).attr("data-val-length-min"));
            if (input_val.length < min || input_val.length > max) {
                _this.showError(id, $(obj).attr("data-val-length"));
                isOk = false;
            }
            else {
                _this.showError(id, "");
            }
        }
        if (isOk) {
            $("div[data-warnmsg-for='" + id + "']").css("display", "none");
            $("div[data-warnmsg-for='" + id + "']").empty();
        }
    };
    pcLogin.prototype.LoginTxtOnFocus = function (obj) {
        var id = obj.id;
        var valText = $.trim($("div[data-valmsg-for='" + id + "']").text());
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
        $("div[data-valmsg-for='" + id + "']").css("display", "none");
        if (valText == "") {
            $("div[data-valmsg-for='" + id + "']").css("display", "none");
            if ($.trim($(obj).val()).length == 0) {
            }
        }
        else {
            $("div[data-valmsg-for='UserName']").css("display", "none");
            return true;
        }
    };
    pcLogin.prototype.loadLoginHtml = function () {
        var _this = this;
        if ($("#showLogOrReg").length > 0) {
            _this.showLogin();
            return;
        }
        $.get(this.loginWeightUrl, function (data) {
            $("body").append(data);
            _this.bindEvent();
            _this.showLogin();
        });
    };
    pcLogin.prototype.checkData = function () {
        var Email = $("#UserName").val();
        var Password = $("#UserPassword").val();
        this.userName = Email;
        this.passWord = Password;
        $("#LoginError").html("");
        $('#EmailErr,#PasswordErr').addClass('txtError');
        if (Email == "") {
            this.showError("UserName", "请输入登录账号！");
            return;
        }
        if (Password == "" || Password.length < 6 || Password.length > 20) {
            this.showError("UserPassword", "密码长度应在6-20位之间!");
            return false;
        }
        return true;
    };
    pcLogin.prototype.showError = function (errorName, errorMsg) {
        var errorId = $("#" + errorName).attr("id");
        if (errorMsg != "" && errorMsg != undefined) {
            $("span[data-valmsg-for=\"" + errorId + "\"]").text(errorMsg);
            $("div[data-valmsg-for=\"" + errorId + "\"]").show();
        }
        $("#" + errorName).addClass("input_error");
        $("#" + errorName).siblings("i").show().attr("class", "txt_icon txt_error");
    };
    pcLogin.prototype.ajaxLogin = function () {
        var _this = this;
        $.ajax({
            url: _this.toLoginUrl,
            type: "Post",
            data: "userName=" + this.userName + "&pass=" + this.passWord,
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
                if (data.Result != true) {
                    ctrActionsend('land_button_fail');
                    if (data.Code == "UserName" || data.Code == "UserPassword") {
                        _this.showError(data.Code, data.Message);
                    }
                    else {
                        $("#LoginError").html(data.Message);
                    }
                    return;
                }
                _this.hideLogin(1);
                GetHNavList();
                GetLogin();
                ctrActionsend('land_button_succ');
            }
        });
    };
    pcLogin.prototype.showLogin = function () {
        poplayer('showLogOrReg', '', true);
    };
    pcLogin.prototype.hideLogin = function (resultCode) {
        popClose('showLogOrReg', true);
        this.loginBack(resultCode);
    };
    pcLogin.prototype.loginBack = function (resultCode) {
        this.callBack(resultCode);
    };
    return pcLogin;
}());
var pcNeedReg = (function () {
    function pcNeedReg() {
        this.needRegWeightUrl = "/weight/get?id=v2_needReg";
        this.isLogin = false;
        this.quantity = 1;
        this.needRegType = 0;
        this.provinceJson = [{ "Id": "110000", "Name": "北京" }, { "Id": "120000", "Name": "天津" }, { "Id": "130000", "Name": "河北省" }, { "Id": "140000", "Name": "山西省" }, { "Id": "150000", "Name": "内蒙古自治区" }, { "Id": "210000", "Name": "辽宁省" }, { "Id": "220000", "Name": "吉林省" }, { "Id": "230000", "Name": "黑龙江省" }, { "Id": "310000", "Name": "上海" }, { "Id": "320000", "Name": "江苏省" }, { "Id": "330000", "Name": "浙江省" }, { "Id": "340000", "Name": "安徽省" }, { "Id": "350000", "Name": "福建省" }, { "Id": "360000", "Name": "江西省" }, { "Id": "370000", "Name": "山东省" }, { "Id": "410000", "Name": "河南省" }, { "Id": "420000", "Name": "湖北省" }, { "Id": "430000", "Name": "湖南省" }, { "Id": "440000", "Name": "广东省" }, { "Id": "450000", "Name": "广西壮族自治区" }, { "Id": "460000", "Name": "海南省" }, { "Id": "500000", "Name": "重庆" }, { "Id": "510000", "Name": "四川省" }, { "Id": "520000", "Name": "贵州省" }, { "Id": "530000", "Name": "云南省" }, { "Id": "540000", "Name": "西藏自治区" }, { "Id": "610000", "Name": "陕西省" }, { "Id": "620000", "Name": "甘肃省" }, { "Id": "630000", "Name": "青海省" }, { "Id": "640000", "Name": "宁夏回族自治区" }, { "Id": "650000", "Name": "新疆维吾尔自治区" }];
        this.topDefault = ["请选择省份", "请选择城市", "请选择区县"];
        this.onlypackage = false;
        this.isReSet = true;
        this.isSumiting = false;
    }
    pcNeedReg.prototype.goNeedReg = function (wareSkuCode, packageId, quantity, department, onlypackage) {
        this.wareSkuCode = wareSkuCode;
        this.packageId = (packageId == undefined || packageId == "" || packageId == null ? "" : packageId);
        this.needRegType = (packageId == undefined || packageId == "" || packageId == null ? 0 : 1);
        this.quantity = quantity;
        this.department = (department == undefined || department == "" || department == null ? "" : department);
        this.onlypackage = (onlypackage == undefined || onlypackage == null ? false : onlypackage);
        this.loadNeedRegHtml();
    };
    pcNeedReg.prototype.loadNeedRegHtml = function () {
        var _this = this;
        if ($("#needReg_box").length > 0) {
            _this.loadData();
            _this.showNeedRegBox();
            return;
        }
        $.get(this.needRegWeightUrl, function (data) {
            $("body").append(data);
            _this.bindEvent();
            _this.loadData();
            _this.showNeedRegBox();
        });
    };
    pcNeedReg.prototype.bindEvent = function () {
        var _this = this;
        $(".rightFixed_l").click(function () {
            var addressId = $(".radAddressId:checked").eq(0).attr("index");
            _this.setDefault(addressId);
            _this.returnPrevLayer();
        });
        $(".rightFixed_r").click(function () {
            _this.defaultHideArea();
            _this.returnPrevLayer();
        });
        $(".rightFixed_m").click(function () {
            _this.returnPrevLayer();
        });
        $("#alertDivs_tips_r").click(function () {
            popClose('alertDivs', true);
        });
        $("#btn_warn").click(function () {
            poplayer('needReg_box', 'needReg_close1', true);
            popClose('alertDivs', false);
            $('#layer').show();
        });
        $(".get_person_address").click(function () {
            popClose('needReg_box', false);
            kadpc.goLogin(function (data) {
                if (data == 1) {
                    _this.loadUserInfo();
                    _this.loadUserAddress();
                    _this.showNeedRegBox();
                }
                else {
                    popClose("needReg_box", true);
                }
            });
        });
        $(".fixed_address").click(function () {
            var _this = this;
            var rd = Math.random();
            var _url = "/address/getuseraddresslist?rd=" + rd;
            $('#addNew_addressUl').html("");
            $.get(_url, function (data) {
                if (!data) {
                    return;
                }
                var str = "";
                for (var i = 0; i < data.length; i++) {
                    if (data[i].IsDefault) {
                        str += '<li><input type="radio" class="clicked_r radAddressId" name="checekRad" checked="checked" index="' + data[i].ID + '" /><p class="newaddress_txt">' + data[i].Province + data[i].City + data[i].District + data[i].Address + data[i].Accepter + " 联系方式：" + data[i].MobilePhone + '</p></li>';
                    }
                    else {
                        str += '<li><input type="radio" name="checekRad"  class="clicked_r radAddressId" index="' + data[i].ID + '" /><p class="newaddress_txt">' + data[i].Province + data[i].City + data[i].District + data[i].Address + data[i].Accepter + " 联系方式：" + data[i].MobilePhone + '</p></li>';
                    }
                }
                if (data.length > 0) {
                    $('#addNew_addressUl').html(str);
                    if ($("#addNew_addressUl input[checked='checked']").length == 0) {
                        $("#addNew_addressUl input").eq(0).click();
                    }
                }
                else {
                    var str1 = "<h3 style='text-align:center;'>地址列表为空，请返回新增地址，谢谢！</h>";
                    $('#addNew_addressUl').html(str1);
                }
            });
            $("#needReg_box_1").attr("display", "block");
            poplayer("needReg_box_1", "", true);
            popClose("needReg_box", false);
            poplayer('needReg_box_1', 'needReg_close2', false);
        });
        $('#needReg_close2').click(function () {
            popClose('needReg_box_1', false);
            poplayer('needReg_box', 'needReg_close1', true);
        });
        $("#add_icon").click(function () {
            var num = parseInt($("#addNumber").val());
            $("#addNumber").val((num + 1).toString());
            if (_this.needRegType == 0) {
                _this.loadSinglePrice(num + 1, function () { _this.setPrice(); });
            }
            else {
                _this.setPrice();
            }
            //_this.setPrice();
        });
        $("#reduce_icon").click(function () {
            var num = parseInt($("#addNumber").val());
            if (num - 1 <= 0)
                return;
            $("#addNumber").val((num - 1).toString());
            if (_this.needRegType == 0) {
                _this.loadSinglePrice(num - 1, function () { _this.setPrice(); });
            }
            else {
                _this.setPrice();
            }
            //_this.setPrice();
        });
        $("#addNumber").keyup(function () {
            if ($('#addNumber').val() <= 0 || $('#addNumber').val() > 999) {
                $('#addNumber').val("1");
                $('#addNumber').focus();
                _this.setPrice();
                alert("请输入正确的数量！");
            }
        });
        $("#addNumber").blur(function () {
            var q = $.trim(jQuery("#addNumber").val());
            var total = parseInt(q);
            if (isNaN(q) || q > 999 || q < 0) {
                $("#addNumber").val("1");
            }
            _this.setPrice();
        });
        $("#btnCheckOrder").click(function () {
            _this.Submit();
        });
        $("#RegionProvince").change(function () {
            if ($("#RegionProvince").val() == "-1") {
                _this.defaultCityArea();
                return;
            }
            $("#RegionCity").show();
            _this.defaultCityArea();
            var provinceId = $("#RegionProvince").find("option:selected").attr("value");
            _this.ajaxCity(provinceId);
        });
        $("#RegionCity").change(function () {
            if ($("#RegionCity").val() == "-1") {
                return;
            }
            _this.defaultArea();
            var cityId = $("#RegionCity").find("option:selected").attr("value");
            _this.ajaxArea(cityId);
        });
    };
    pcNeedReg.prototype.setPrice = function () {
        var totalPrice = parseInt($("#addNumber").val()) * this.selectPrice;
        $('#ViperPrice .ViperPrice_num').html("\uFFE5" + totalPrice.toFixed(2));
    };
    pcNeedReg.prototype.defaultHideArea = function () {
        $("#txtAddress").val("");
        $("#txtRemark").val("");
        this.loadProvinceSelect("");
        this.defaultCityArea();
        $("#RegionCity").hide();
        $("#RegionArea").hide();
    };
    pcNeedReg.prototype.defaultCityArea = function () {
        $("#RegionCity").html("");
        $("#RegionCity").append("<option value=\"-1\">" + this.topDefault[1] + "</option>");
        $("#RegionArea").html("");
        $("#RegionArea").append("<option value=\"-1\">" + this.topDefault[2] + "</option>");
    };
    pcNeedReg.prototype.defaultArea = function () {
        $("#RegionArea").html("");
        $("#RegionArea").append("<option value=\"-1\">" + this.topDefault[2] + "</option>");
    };
    pcNeedReg.prototype.setDefault = function (addressId) {
        var _this = this;
        var _url = "/address/setdefault?addressid=" + addressId;
        $.ajax({
            url: _url,
            type: "get",
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data) {
                    _this.loadUserAddress();
                }
                else {
                    _this.showNeedRegBox();
                }
            }
        });
        //$.get(_url, function (data) {
        //    if (data) {
        //        _this.loadUserAddress();
        //    }
        //    else {
        //        _this.showNeedRegBox();
        //    }
        //});
    };
    pcNeedReg.prototype.showNeedRegBox = function () {
        poplayer("needReg_box", "needReg_close1", true);
    };
    pcNeedReg.prototype.returnPrevLayer = function () {
        popClose("needReg_box_1", true);
        poplayer("needReg_box", "needReg_close1", true);
    };
    pcNeedReg.prototype.loadData = function () {
        var _this = this;
        this.setFormData();
        if (this.isReSet) {
            this.loadProductPrice();
        }
        else {
            this.loadLocalProductPrice();
            this.loadLoaclPackage();
        }
        this.loadUserInfo();
        this.loadUserAddress();
    };
    pcNeedReg.prototype.setFormData = function () {
        var wareSkuCode = $("#config_wareskucode").val();
        var packageId = $("#config_packageid").val();
        $("#addNumber").val(this.quantity.toString());
        $("#h_ProductType").val(this.needRegType.toString());
        $("#config_wareskucode").val(this.wareSkuCode);
        $("#Department").val(this.department);
        $("#config_packageid").val(this.packageId);
        if (wareSkuCode == this.wareSkuCode) {
            this.isReSet = false;
        }
    };
    pcNeedReg.prototype.loadProvinceSelect = function (provinceId, cityId, areaId) {
        this.ajaxProvince(this.provinceJson, provinceId, cityId, areaId);
    };
    pcNeedReg.prototype.ajaxProvince = function (data, provinceId, cityId, areaId) {
        this.listToSelect(data, this.topDefault[0], provinceId, "RegionProvince");
        $("#RegionProvince").show();
        if (cityId != "" && areaId != null) {
            this.ajaxCity(provinceId, cityId, areaId);
        }
    };
    pcNeedReg.prototype.ajaxCity = function (provinceId, cityId, areaId) {
        var _this = this;
        var rd = Math.random();
        var _url = "/address/getaddresslist?rd=" + rd;
        $.get(_url, { parentId: provinceId, selectId: 1 }, function (data) {
            $("#RegionCity").show();
            _this.listToSelect(data, _this.topDefault[1], cityId, "RegionCity");
            if (areaId != "" && areaId != null) {
                _this.ajaxArea(cityId, areaId);
            }
        });
    };
    pcNeedReg.prototype.ajaxArea = function (cityId, areaId) {
        var _this = this;
        var rd = Math.random();
        var _url = "/address/getaddresslist?rd=" + rd;
        $.get(_url, { parentId: cityId, selectId: 2 }, function (data) {
            _this.listToSelect(data, _this.topDefault[2], areaId, "RegionArea");
        });
    };
    /*list转为select下拉框*/
    pcNeedReg.prototype.listToSelect = function (data, topOpt, addressId, areaId) {
        var areaSelect = $("#" + areaId);
        $("#" + areaId).html("");
        areaSelect.append("<option value=\"-1\">" + topOpt + "</option>");
        for (var i = 0; i < data.length; i++) {
            var isSelect = (data[i].Id == addressId ? "selected=\"selected\"" : "");
            areaSelect.append("<option value=\"" + data[i].Id + "\" " + isSelect + ">" + data[i].Name + "</option>");
        }
        if (data.length > 0) {
            $("#" + areaId).show();
        }
        else {
            $("#" + areaId).hide();
        }
    };
    pcNeedReg.prototype.loadUserInfo = function () {
        var rd = Math.random();
        var _url = "/User/GetUserInfo?rd=" + rd;
        var _isLogin = false;
        $.ajax({
            url: _url,
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if (!data["isLogin"]) {
                    return;
                }
                _isLogin = true;
                $("#is_nologin").hide();
                $("#is_login").show();
                $('#txtUserName').text(data["userName"]);
            }
        });
        this.isLogin = _isLogin;
        return _isLogin;
    };
    pcNeedReg.prototype.loadUserAddress = function () {
        var _this = this;
        if (!this.isLogin) {
            this.loadProvinceSelect("", "", "");
            $("#txtConsignee").val("");
            $("#txtMobilephone").val("");
            $("#RegionCity").hide();
            $("#RegionArea").hide();
            return;
        }
        var rd = Math.random();
        var _url = "/address/getdefault?rd=" + rd;
        $.get(_url, function (data) {
            if (data == null) {
                return;
            }
            $("#txtMobilephone").val(data.MobilePhone);
            $("#txtConsignee").val(data.Accepter);
            $("#h_AddressId ").val(data.ID);
            $('#h_RegionCity').val(data.CityCode);
            $("#RegionProvince").val(data.ProvinceCode);
            $("#txtAddress").val(data.Address);
            _this.loadProvinceSelect(data.ProvinceCode, data.CityCode, data.AreaCode);
        });
    };
    pcNeedReg.prototype.loadLocalProductPrice = function () {
        var _this = this;
        this.salePrice = parseFloat($('#SingleProductNum').val());
        if (this.needRegType == 0) {
            this.loadSinglePrice(this.quantity, function () { _this.setPrice(); });
        }
    };
    pcNeedReg.prototype.loadSinglePrice = function (quantity, callBack) {
        var _this = this;
        var rd = Math.random();
        var _url = "/Product/GetActivityConcessionPrice?productId=" + _this.wareSkuCode + "&quantity=" + quantity + "&rd=" + rd;
        $.get(_url, function (data) {
            var singlePrice = (parseFloat(data.Concession) / quantity);
            $('#SingleProductNum').val(singlePrice.toString());
            _this.salePrice = singlePrice;
            _this.selectPrice = singlePrice;
            var productNumbers = "\uFFE5" + parseFloat(data.Concession).toFixed(2);
            $('#ViperPrice .ViperPrice_num').html(productNumbers);
        });
    };
    pcNeedReg.prototype.loadProductPrice = function () {
        var _this = this;
        var rd = Math.random();
        var _url = "/Product/GetActivityConcessionPrice?productId=" + _this.wareSkuCode + "&quantity=" + _this.quantity + "&rd=" + rd;
        $.get(_url, function (data) {
            var singlePrice = (parseFloat(data.Concession) / _this.quantity);
            $('#SingleProductNum').val(singlePrice.toString());
            _this.salePrice = singlePrice;
            _this.selectPrice = singlePrice;
            var productNumbers = "\uFFE5" + parseFloat(data.Concession).toFixed(2);
            $('#ViperPrice .ViperPrice_num').html(productNumbers);
            _this.loadProductPackage();
        });
    };
    pcNeedReg.prototype.loadProductPackage = function () {
        var _this = this;
        var rd = Math.random();
        var _url = "/Product/KitList?id=" + _this.wareSkuCode + "&rd=" + rd;
        $.get(_url, function (data) {
            var dataResult = [];
            for (var i = 0; i < data.Result.length; i++) {
                var kitSubList = data.Result[i].kitSubList;
                for (var j = 0; j < kitSubList.length; j++) {
                    if (kitSubList[j].WareCode == _this.wareSkuCode && kitSubList[j].IsDetailShow) {
                        dataResult.push(data.Result[i]);
                        break;
                    }
                }
            }
            ;
            if (dataResult.length > 0) {
                $("#set_mealList").html("");
                $('.newNeedF').show();
                var oneClass = (_this.packageId == "" || _this.packageId == null ? "class=\"addLi_hover\"" : "");
                if (_this.onlypackage) {
                    $("#set_mealList").append("<li style=\"display:none\" " + oneClass + "><a class='tobuyone'  type=\"0\" price=\"" + _this.salePrice + "\" id='tobuyone' href='javascript:void(0)' >\u4E00\u4EF6\u4F53\u9A8C\u88C5</a></li>");
                }
                else {
                    $("#set_mealList").append("<li " + oneClass + "><a class='tobuyone'  type=\"0\" price=\"" + _this.salePrice + "\" id='tobuyone' href='javascript:void(0)' >\u4E00\u4EF6\u4F53\u9A8C\u88C5</a></li>");
                }
                var packageTimeOut = true;
                for (var i = 0; i < dataResult.length; i++) {
                    var selectClass = (dataResult[i].PrmCode == _this.packageId ? "class=\"addLi_hover\"" : "");
                    if (_this.onlypackage && _this.packageId != "" && selectClass != "") {
                        packageTimeOut = false;
                    }
                    if (_this.onlypackage && _this.packageId != "" && selectClass == "") {
                        $("#set_mealList").append("<li style=\"display:none\" " + selectClass + "><a  class=\"tobuypackage\" type=\"1\" prmCode=\"" + dataResult[i].PrmCode + "\" price=\"" + dataResult[i].KitPrice + "\" originPrice=\"" + dataResult[i].OriginPrice + "\" href='javascript:void(0)'>" + dataResult[i].PrmName + "</a></li>");
                        continue;
                    }
                    $("#set_mealList").append("<li " + selectClass + "><a  class=\"tobuypackage\" type=\"1\" prmCode=\"" + dataResult[i].PrmCode + "\" price=\"" + dataResult[i].KitPrice + "\" originPrice=\"" + dataResult[i].OriginPrice + "\" href='javascript:void(0)'>" + dataResult[i].PrmName + "</a></li>");
                }
                $("#productpackage").show();
                $(".infocon .marprice").hide();
                $("#set_mealList li a").click(function () {
                    _this.needRegType = parseInt($(this).attr("type"));
                    _this.selectPrice = parseFloat($(this).attr("price"));
                    if (_this.needRegType == 1) {
                        _this.packageId = $(this).attr("prmCode");
                    }
                    var totalPrice = (_this.selectPrice * parseFloat($("#addNumber").val())).toFixed(2);
                    $(this).parent('li').addClass('addLi_hover');
                    $(this).parent('li').siblings().removeClass('addLi_hover');
                    $('#ViperPrice .ViperPrice_num').html("\uFFE5" + totalPrice);
                    _this.setPrice();
                });
                if ($("#set_mealList li.addLi_hover").length > 0) {
                    $("#set_mealList li.addLi_hover a").click();
                }
                if (_this.onlypackage && _this.packageId != "" && packageTimeOut) {
                    popClose("needReg_box", true);
                    alert("此套餐已过期");
                }
                else {
                    _this.showNeedRegBox();
                }
            }
            else {
                _this.setPrice();
            }
        });
    };
    pcNeedReg.prototype.loadLoaclPackage = function () {
        var _this = this;
        if (this.packageId == "") {
            $("#set_mealList li").show();
            if ($("#set_mealList li").length > 0) {
                $("#set_mealList li a").eq(0).click();
            }
            return;
        }
        if (_this.onlypackage) {
            $("#set_mealList li").hide();
            if ($("#set_mealList li a[prmCode='" + _this.packageId + "']").length == 0) {
                popClose("needReg_box", true);
                alert("此套餐已过期");
            }
            $("#set_mealList li a[prmCode='" + _this.packageId + "']").parent("li").show();
            $("#set_mealList li a[prmCode='" + _this.packageId + "']").click();
        }
        else {
            $("#set_mealList li").show();
            $("#set_mealList li a").eq(0).click();
        }
    };
    pcNeedReg.prototype.Submit = function () {
        var _this = this;
        if (_this.isSumiting) {
            return;
        }
        if (!_this.checkSubmitData()) {
            _this.isSumiting = false;
            return;
        }
        if (!_this.initializeFormData()) {
            _this.isSumiting = false;
            return;
        }
        _this.isSumiting = true;
        var _formData = $("#form_CheckOrder").serialize();
        var _url = "/Order/CreateCheckOrder";
        $.ajax({
            url: _url,
            data: _formData,
            type: "post",
            cache: false,
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=utf-8",
            json: 'callback',
            success: function (data) {
                switch (data) {
                    case "-1":
                        alert("系统繁忙，请稍后再试！");
                        break;
                    case "0":
                        {
                            if (data[0] == "0") {
                                popClose("needReg_box", true);
                                poplayer('submitReg_success', 'needReg_close_succ', true);
                                var text = "恭喜您，需求已成功提交！";
                                $('#needReg_box_1 .mainTitle').html(text);
                                $("#btnCheckOrder").show();
                                $('#RegionProvince').hide();
                                $("#txtConsignee").val("");
                                $("#txtMobilephone").val("");
                                _this.defaultHideArea();
                            }
                        }
                        ;
                        break;
                    case "1":
                        alert("手机号不能为空！");
                        break;
                    case "2":
                        alert("请选择要购买的商品！");
                        break;
                    case "3":
                        alert("输入的商品数量不正确！");
                        break;
                    default:
                        if (typeof (data) === 'object' && data.Message) {
                            alert(data.Message);
                        } else {
                            alert(data);
                        }
                        break;
                }
                _this.isSumiting = false;
            },
            error: function () {
                _this.isSumiting = false;
            }
        });
    };
    pcNeedReg.prototype.initializeFormData = function () {
        var curHrefs = window.location.href;
        if (curHrefs.indexOf("?ref=kadsearch") > -1) {
            $("#ocRef").val("kadsearch");
        }
        $("#h_ProductType").val(this.needRegType.toString());
        if (this.needRegType == 0) {
            $("#hidden_ProductId").val(this.wareSkuCode);
        }
        else if (this.needRegType == 1) {
            $("#hidden_ProductId").val(this.packageId);
        }
        $("#Department").val(this.department);
        return true;
    };
    pcNeedReg.prototype.checkSubmitData = function () {
        var mobilePhoneRegs = /^(\d{11}$)/;
        var PhoneNumbers = $('#txtMobilephone').val();
        if ($.trim($('#txtConsignee').val()) == '' || $('#txtConsignee').val() == '必填' || $.trim($('#txtMobilephone').val()) == '' || $('#txtMobilephone').val() == '必填' || $('#txtMobilephone').val().length < 11 || $.trim($('#txtAddress').val()) == '' || $('#txtAddress').val() == '必填 街道名及编号、楼宇名及房间号') {
            popClose("needReg_box", true);
            poplayer("alertDivs", "alertDivs_tips_r", true);
            $('#alertDivs .alertTxt_title').html('请确认姓名/手机/地址填写完整。');
            return false;
        }
        else if (!mobilePhoneRegs.exec(PhoneNumbers)) {
            popClose("needReg_box", true);
            poplayer("alertDivs", "alertDivs_tips_r", true);
            $('#alertDivs .alertTxt_title').html('请输入正确的手机号码！');
            return false;
        }
        else if (!$('#addNumber').is('.addinput_hover')) {
            popClose("needReg_box", true);
            poplayer("alertDivs", "alertDivs_tips_r", true);
            $('#alertDivs .alertTxt_title').html('请确认您需要的数量，以便登记。');
            return false;
        }
        else if ($('#RegionProvince').val() == '-1') {
            popClose("needReg_box", true);
            poplayer("alertDivs", "alertDivs_tips_r", true);
            $('#alertDivs .alertTxt_title').html('请选择您所在的省份，以便登记。');
            return false;
        }
        else if ($('#RegionCity').val() == '-1') {
            popClose("needReg_box", true);
            poplayer("alertDivs", "alertDivs_tips_r", true);
            $('#alertDivs .alertTxt_title').html('请选择您所在的城市，以便登记。');
            return false;
        }
        else if ($('#RegionArea').val() == '-1') {
            if ($('#RegionArea').css('display', 'none')) {
                return true;
            }
            else {
                popClose("needReg_box", true);
                poplayer("alertDivs", "alertDivs_tips_r", true);
                $('#alertDivs .alertTxt_title').html('请选择您所在的地区，以便登记。');
                return false;
            }
        }
        return true;
    };
    return pcNeedReg;
}());
var _kadpc = (function () {
    function _kadpc() {
    }
    _kadpc.prototype.goLogin = function (callBack) {
        new pcLogin().goLogin(callBack);
    };
    _kadpc.prototype.goBook = function (wareSkuCode, quantity) {
        quantity = (quantity == undefined ? 1 : quantity);
        ctrActionsend('demand_registration');
        new pcNeedReg().goNeedReg(wareSkuCode, "", quantity, "", false);
    };
    _kadpc.prototype.goPackageBook = function (wareSkuCode, packageId, quantity) {
        quantity = (quantity == undefined ? 1 : quantity);
        ctrActionsend('demand_registration');
        new pcNeedReg().goNeedReg(wareSkuCode, packageId, quantity, "", true);
    };
    _kadpc.prototype.goNeedReg = function (wareSkuCode, packageId, quantity, department, onlypackage) {
        quantity = (quantity == undefined ? 1 : quantity);
        new pcNeedReg().goNeedReg(wareSkuCode, packageId, quantity, department, onlypackage);
    };
    _kadpc.prototype.addCart = function (id, quantity, callback) {
        ctrActionsend('add_to_card');
        this.addCommon(id, 0, quantity, callback);
    };
    _kadpc.prototype.addBookCart = function (id, quantity, callback) {
        this.addCommon2(id, 0, quantity, 4, callback);
    };
    _kadpc.prototype.addPackageBookCart = function (id, quantity, callback) {
        this.addCommon2(id, 1, quantity, 4, callback);
    };
    _kadpc.prototype.addPackage = function (id, quantity, callback) {
        ctrActionsend('add_to_card');
        this.addCommon(id, 1, quantity, callback);
    };
    _kadpc.prototype.addCommon = function (id, buyType, quantity, callback) {
        var rd = Math.random();
        if (quantity == 0 || quantity == undefined || quantity == null) {
            quantity = 1;
        }
        var url = "/cart/addcartjsonp?id=" + id + "&quantity=" + quantity + "&buytype=" + buyType + "&sellercode=null&rd=" + rd;
        $.get(url, function (data) {
            if (callback != null && callback != undefined && (typeof callback) === "function") {
                callback(data);
                return;
            }
            ;
            if (data != "商品已成功添加到购物车！") {
                alert(data);
                return;
            }
            ;
            var _kadbar = new kadbar();
            _kadbar.addCart();
        });
    };
    _kadpc.prototype.addCommon2 = function (id, buyType, quantity, cartType, callback) {
        var rd = Math.random();
        if (cartType == undefined || cartType == null) {
            cartType = 0;
        }
        if (quantity == 0 || quantity == undefined || quantity == null) {
            quantity = 1;
        }
        var url = "/cart/addcart?id=" + id + "&quantity=" + quantity + "&buytype=" + buyType + "&sellercode=null&rd=" + rd + "&carttype=" + cartType;
        $.get(url, function (data) {
            if (callback != null && callback != undefined && (typeof callback) === "function") {
                callback(data);
                return;
            }
            ;
            if (data != "商品已成功添加到购物车！") {
                alert("商品已成功添加到需求清单！");
                return;
            }
            ;
        });
    };
    _kadpc.prototype.isLogin = function () {
        var result = false;
        jQuery.ajax({
            type: "get",
            url: "/user/getuserinfo",
            cache: false,
            async: false,
            success: function (msg) {
                result = msg.isLogin || false;
            }
        });
        return result;
    };
    _kadpc.prototype.getCoupon = function (activityId, callback) {
        var _this = this;
        if (!kadpc.isLogin()) {
            this.goLogin(function (data) {
                if (data == 1) {
                    _this.getCoupon(activityId, null);
                }
            });
            return;
        }
        $.ajax({
            type: "Get",
            url: urlConfig.user + "/coupon/addcusprmote?procode=" + activityId,
            dataType: "jsonp",
            jsonp: "callback",
            cache: false,
            success: function (data) {
                if (callback != null && callback != undefined && (typeof callback) === "function") {
                    callback(data);
                    return;
                }
                ;
                if (data.Result == true) {
                    alert("领取成功！");
                    return;
                }
                alert(data.Message);
            }
        });
    };
    _kadpc.prototype.buyChange = function (giftWareSkuCode, actType, callback) {
        var _this = this;
        if (!kadpc.isLogin()) {
            this.goLogin(function (data) {
                if (data == 1) {
                    _this.buyChange(giftWareSkuCode, actType, null);
                }
            });
            return;
        }
        $.ajax({
            url: urlConfig.cart + "/Cart/FreeGet?giftwarecode=" + giftWareSkuCode + "&actType=" + actType + "&origin=1",
            type: "Get", cache: false, dataType: "jsonp", jsonp: "callback",
            success: function (data) {
                if (callback != null && callback != undefined && (typeof callback) === "function") {
                    callback(data);
                    return;
                }
                ;
                if (data.Result == true) {
                    alert(data.Message);
                }
                else {
                    alert(data.Message);
                }
            },
            error: function () {
            }
        });
    };
    return _kadpc;
}());
var kadpc = new _kadpc();
//# sourceMappingURL=kad.lib.js.map