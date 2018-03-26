//地区选择
(function ($) {

    //n表单名,v"湖南,长沙,天心区",d默认值:"请选省,请选择市,请选择区/县"
    //加载
    $.fn.District = function (v, n, d, callback, style) {      
        n = n || "KADDistrict";
        v = v || "";
        d = (d || "请选择省,请选择市,请选择区/县").split(",");
        style = style || "";
       
        var data = $.fn.District.Data;
        var id = n.replace(/\./g, "_");     
        if ($("#" + id).length == 0) {
            this.append($('<input type="hidden">').attr({ "name": n, "id": id }));
            this.append($('<input type="hidden">').attr({ "name": n + "_code", "id": id + "_code" }));
        }

        for (var i = 0; i < d.length && i < 3; i++) {

            var s = $("<select>").append($("<option>").html(d[i].replace('{name}', '')).attr({ 'value': '', def: d[i] })).attr({ "n": id, "id": id + "_" + i, "i": i, "class": style });
            this.append(s);
            s.change($.fn.District.Change);

            if (i == 0) {
                $.fn.District.FillData(id, -1);
            }
        }

        $.fn.District.CallBack = callback;
        $.fn.District.SetValue(id, v);
    };
    //选择完成后的事件
    $.fn.District.CallBack = null;
    //select 的 id
    //选择事件
    $.fn.District.Change = function () {
        var o = $(this);
        var index = parseInt(o.attr('i'));
        var name = o.attr('n');
        $.fn.District.FillData(name, index);
        var r = [];
        var rCode = [];
        $('select[n=' + name + ']').each(function (v) {
            r.push($($(this).get(0)).val());
            rCode.push($($(this).get(0)).find("option:selected").attr("id")||"");
        });     
        $('#' + name).val(r == ',' ? "" : r);
        $('#' + name + '_code').val(rCode == ',' ? "" : rCode);
        $.fn.District.CallBack ? $.fn.District.CallBack(r) : null;
    };
    //填充数据
    $.fn.District.FillData = function (name, index) {
        var id = 0;
        var parent = "";
        if (index > -1) {
            var p = $("#" + name + "_" + index);

            var opt = p.get(0);
            var o = $(opt[opt.selectedIndex]);
            id = o.attr('id');
            parent = o.html();           
            index = parseInt(p.attr("i"));
        }        
        var o = $("#" + name + "_" + (++index));      
        if (o.length) {
            o.get(0).length = 1;
            var def = $(o.get(0)[0]);
            def.html(def.attr('def').replace('{name}', parent));           
            var data = $.fn.District.Data[id];
            if (data && data.length) {
                for (var i = 0; i < data.length; i++) {
                    o.append($("<option>").html(data[i][1]).attr('id', data[i][0]));
                }
                if (i == 1) {
                    o.get(0)[i].selected = true;

                }
                o.show();
                o.triggerHandler('change');
            } else {
                var x = $("#" + name + "_" + (++index));
                if (x.length > 0)
                {
                    x.get(0).length = 1
                }
                o.hide();
            }
        }
    };
    //选中
    $.fn.District.SetValue = function (name, v) {
       
        v = v.split(",");
        for (var i = 0; i < 3; i++) {
            var o = $("#" + name + "_" + i);
            if (o.length && v[i]) {
                var l = o.get(0);
                for (var j = 0; j < l.length; j++) {
                    if (l[j].text == v[i]) {
                        l[j].selected = true;
                        o.triggerHandler('change');
                        break;
                    }
                }
            }
        }
    };

})(jQuery);