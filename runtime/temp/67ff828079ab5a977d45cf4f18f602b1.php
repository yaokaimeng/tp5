<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\wamp64\www\tp5\public/../application/index\view\business\myorder.html";i:1521787097;s:57:"D:\wamp64\www\tp5\application\index\view\public\head.html";i:1521728961;}*/ ?>
﻿
<!DOCTYPE html>
<html>
<head>
    <script language="javascript" type="text/javascript" async="async" src="http://ctr.360kad.com/ctrjs/ctr_v2.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>康爱多会员中心-我的订单</title>
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <link href="http://res4.360kad.com/theme/default/css/www/web2014/base.css" rel="stylesheet" type="text/css"/>
    <link href="http://res2.360kad.com/theme/default/css/www/web2014/newKad_index.css" rel="stylesheet" type="text/css"/>
    <link href="http://res2.360kad.com/theme/default/css/user/2015/kad2-center-v1.css" rel="stylesheet" type="text/css"/>


    <link href='http://www.wan.com//static/css/comm.css' rel='stylesheet' type='text/css'>
<link href='http://www.wan.com//static/css/style_index.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://www.wan.com//static/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src='http://www.wan.com//static/js/lunbo.js'></script>
<script type="text/javascript" src='http://www.wan.com//static/js/other.js'></script>



    
    <link href="http://res1.360kad.com/theme/default/css/user/2015/kad2-center-popup.css" rel="stylesheet" type="text/css"/>
    <link href="http://res2.360kad.com/theme/default/css/pop/pop.css" rel="stylesheet" type="text/css"/>
    <script src="http://res4.360kad.com/script/jquery.js" type="text/javascript"></script>
    <script src="http://res3.360kad.com/script/jquery.cookie.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/envconfig.js" type="text/javascript"></script>
    <script src="http://res1.360kad.com/script/web2014/newCommonJs.js" type="text/javascript"></script>
    <script src="http://res1.360kad.com/script/web2014/publicsearch.js" type="text/javascript"></script>
    <script src="http://res3.360kad.com/script/pop/poplayer.js" type="text/javascript"></script>
    
    <script src="http://res1.360kad.com/script/category_index.js" type="text/javascript"></script>
    <script src="http://res4.360kad.com/script/member/kad2-center-v1.js" type="text/javascript"></script>
    <script src="http://res.360kad.com/script/pop/poplayer.js" type="text/javascript"></script>
    <script src="http://res3.360kad.com/script/Recomm.js" type="text/javascript"></script>
    <script>
        //radio单选与checkbox多选按钮的模拟
        (function ($) {
            
            $.fn.bindCheckboxRadioSimulate = function (options) {
                var settings = {
                    className: 'on',
                    onclick: null,
                    checkbox_checked_fn: function (obj) {
                        obj.parent().addClass(this.className);
                    },
                    checkbox_nochecked_fn: function (obj) {
                        obj.parent().removeClass(this.className);
                    },
                    radio_checked_fn: function (obj) {
                        obj.parent().addClass(this.className);
                    },
                    radio_nochecked_fn: function (obj) {
                        obj.parent().removeClass(this.className);
                    }
                };
                $.extend(true, settings, options);

                //input判断执行
                function inputJudge_fn(obj_this) {

                    var $this = obj_this,
                        $type;
                    if ($this.attr('type') != undefined) {
                        $type = $this.attr('type');
                        if ($type == 'checkbox')  else {
                                settings.checkbox_nochecked_fn($this);
                            }
                        } else if ($type == 'radio') );
                                } else {
                                    settings.radio_nochecked_fn($this);
                                }
                            }
                        }
                    }
                }
                return this.each(function () {
                    inputJudge_fn($(this));
                }).click(function () {
                    inputJudge_fn($(this));
                    if (settings.onclick) {
                        settings.onclick(this, {
                            isChecked: $(this).prop("checked"),//返回是否选中
                            objThis: $(this)//返回自己
                        });
                    }
                });
            };
        })(jQuery);

        //执行函数
        $(function () {
            //checkbox模拟--记住密码
            $('.checkbox-moni2 input').bindCheckboxRadioSimulate();
            //radio--记住密码
            $('.radio-moni input').bindCheckboxRadioSimulate();
        })
        //radio单选与checkbox多选按钮的模拟 end

    </script>

    
    <link href="http://res3.360kad.com/theme/default/css/user/2015/kad2-center-personalDate.css" rel="stylesheet" type="text/css"/>
    <link href="http://res.360kad.com/theme/default/css/user/2015/TransactionManagement.css" rel="stylesheet" type="text/css"/>
    <style>
        .checkbox-moni input, .checkbox-moni2 input, .radio-moni input {
            opacity: initial;
        }

        .b {
            font-weight: bold;
        }

        a:hover {
            color: red;
        }

        .tab-void .order-title a:hover {
            color: red;
        }

        .sy :hover {
            color: red;
        }

        .tab-void .go-pay a:hover {
            text-decoration: underline;
        }

        .on-orders a {
            color: #2d8ef3;
        }

            .on-orders a:hover {
                color: red;
            }
    .oder_del { width: 16px; height: 16px; float: right; background: url(http://res.360kad.com/theme/user/img/order-del.png) no-repeat; margin-top: 10px; margin-right: 12px; cursor: pointer; }
    </style>

</head>
<body>
   <!--部件开始:header_www_head,分组:页头部件-->
<!--部件开始:head_header_top,分组:页头部件-->
  <div class='PTit30'>
    <div class='W1200 nav_bj'>
    
      <div class='FL'>
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
    
      <div class='FR nav_gray'>
        <div class='FL pointer'>
          <a href='javascript:;'  class='a_color'>我的我健康</a> <img src='http://www.wan.com//uploads/{}' title='' alt='' class='sjx' />
          <ul>
            <li><a href="<?php echo url('user/grzl'); ?>">我的中心</a></li>
            <li><a href='http://www.wan.com/index/business/mycollection'>我的收藏</a></li>
            <li><a href='http://www.wan.com/index/user/address'>我的地址</a></li>
          </ul>
        </div>
        <div class='FL pointer'>
          <a href='http://www.wan.com/index/business/myorder' class='a_color'>我的订单</a> <img src='http://www.wan.com//static/images/index_sjx.png' title='' alt='' class='sjx' />
          <ul>
            <li><a href='javascript:;'>待付款订单</a></li>
            <li><a href='javascript:;'>待确认收货</a></li>
          </ul>
        </div>
        <div class='FL pointer'>
          <img src='http://www.wan.com//static/images/index_gwc.png' title='' alt='' class='img_pos' />
          <a href='http://www.wan.com/index/car/car1' class='a_color'>购物车 <span></span> </a>
        </div>
        <div class='FL'><img src='http://www.wan.com//static/images/index_dh.png' class='img_pos' title='' alt='' /> 400-8811-020</div>
        <div class='FL pointer'>
          <a href='javascript:;'  class='a_color'>客户服务</a> <img src='http://www.wan.com//static/images/index_sjx.png' title='' alt='' class='sjx' />
          <ul>
            <li><a href='javascript:;'>帮助中心</a></li>
            <li><a href='javascript:;'>联系我们</a></li>
            <li><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=Wmtibm5qamNvYmsaKyt0OTU3" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_11.png"/></a></li>
          </ul>
        </div>
        <div class='FL pointer'>
          <a href='javascript:;'  class='a_color'>网站导航</a> <img src='http://www.wan.com//static/images/index_sjx.png' title='' alt='' class='sjx' />
          <div class='wzdh_xq'>
            <div>
              <div><a href='javascript:;'>特色频道</a></div>
              <p><a href='javascript:;'>男科药馆</a><a href='javascript:;'>医疗器械</a></p>
            </div>
            <div>
              <div><a href='javascript:;'>健康工具</a></div>
              <p><a href='javascript:;'>掌上药店</a><a href='javascript:;'>自助找药</a><p>
            </div>
            <div>
              <div><a href='javascript:;'>健康知多点</a></div>
              <p>
                <a href='javascript:;'>用药指南</a>
                <a href='javascript:;'>健康问答</a>
                <a href='javascript:;'>肝胆科</a>
              </p>
              <p>
                <a href='javascript:;'>皮肤科</a>
                <a href='javascript:;'>呼吸科</a>
                <a href='javascript:;'>减肥瘦身</a>
              </p>
              <p>
                <a href='javascript:;'>两性健康</a>
                <a href='javascript:;'>妇科</a>
                <a href='javascript:;'>母婴</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
    </div>
  </div>	
  <!-- logo 搜索 -->
  <div class='W1200 logo_div'>
    
    <div class='logo FL'>
      <img src='http://www.wan.com//static/images/index_logo.png' />
    </div>
    <div class='logo_ss FL'>
      <form action="<?php echo url('search/search'); ?>" method="post">
       <input class="qingshuru" type="text" value="" name="search" placeholder="请输入搜索内容"/>
      <a href="<?php echo url('search/search'); ?>" style="font-size:20px;margin-top: 5px;"><input class="sousou" type="hidden" value="搜索" name=""/>去搜索</a>
      </form>
      <div class='input_cli'>
       
        
        <div class='FL input_right'>
          <P>正在热搜中：</P>
          <p>
            <span><a href='javascript:;'>阿胶</a></span>
            <span><a href='javascript:;'>安宫牛黄丸</a></span>
            <span><a href='javascript:;'>必利劲</a></span>
            <span><a href='javascript:;'>乙肝</a></span>
            <span><a href='javascript:;'>锁阳固精丸</a></span>
            <span><a href='javascript:;'>舒利迭</a></span>
            <span><a href='javascript:;'>欧姆龙血压计</a></span>
            <span><a href='javascript:;'>恩替卡韦</a></span>
            <span><a href='javascript:;'>维生素C</a></span>
          </p>
        </div>
        
      </div>
      <p>
        <a href='javascript；;'>16.9买3件</a>
        <a href='javascript；;'>保肝护肝</a>
        <a href='javascript；;'>皮肤护理</a>
        <a href='javascript；;'>消暑养生</a>
        <a href='javascript；;'>眉眼美肤</a>
        <a href='javascript；;'>爱肠护胃</a>
      </p>
 
    </div>
    
  </div>
  <!-- 导航 -->


<!--部件结束:header_www_head-->

   <!--部件开始:nav_www_otherleft,分组:频道部件-->
<div class="nav">
   

    <div class="navc itmes_wrap">
        <div class="categorys categorys_hover">
            <h2><a href="<?php echo url('index/index'); ?>" >返回首页</a></h2>
            <!--分类类目-->
           <script type="text/javascript" src="http://www.360kad.com/CommonJS/Js.aspx?Id=nav_www_otherleft_data"></script>
        </div>
       
    </div>

</div>
<!--部件结束:nav_www_otherleft-->

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

   
<div class="new-kad-center">
    <!--面包屑-->
    <div class="kad-center-nav">
        <a href="/user">我的康爱多</a> &gt; 我的订单
    </div>
    <!--END面包屑-->
    <!--左侧 begin-->
    <style>
    a:hover { color: red; }
    .kad-center-store a:hover { color: #fff; }
</style>
<div class="kad-center-left">
    <div class="kad-center-menu">
         <h3>交易管理</h3>
        <div class="kad-center-list">
            <p><a href="http://www.wan.com/index/business/myorder">我的订单</a></p>
            
            <p><a href="http://www.wan.com/index/business/mycollection">我的收藏</a></p>
            <p><a href="http://www.wan.com/index/business/mysays">我的评论</a></p>
            
        </div>
        <h3>账户资料</h3>
        <div class="kad-center-list">
            
            <p><a href="http://www.wan.com/index/user/grzl">个人资料</a></p>
            <p><a href="http://www.wan.com/index/user/mygrade">我的积分</a></p>
            <p><a href="http://www.wan.com/index/user/address">收货地址</a></p>
            
        </div>
        <h3>客户服务</h3>
        <div class="kad-center-list">
            <p><a href="/custom/refundlist">申请退换货</a></p>
            <p><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=Wmtibm5qamNvYmsaKyt0OTU3" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_11.png"/></a></p>
            
        </div>
    </div>
    <div class="kad-center-store">
        <p><a href="/club">会员俱乐部 GO &gt;</a></p>
    </div>
</div>
<script>
    $.ajax({
        url: "/User/CouponCount",
        cache: false,
        dataType: "json",
        success: function (result) {
            $("#userleftCouponCount").text(result);
        }
    });
</script>
    <!--左侧 end-->
    <!--右侧 begin-->
    <div class="kad-center-right">
        <h3 class="personal-msg">我的订单</h3>
        <div class="h20"></div>
        <div class="myOrder">
            <dl class="myOrder-tab">
                <dd class="on">
                    <span >所有订单 1</span>
                </dd>
                <dd class="">
                    <span onclick="GetOrderList()">待付款 1</span>
                </dd>
                <dd class="">
                    <span onclick="GetOrderDSH()">待确认收货 0</span>
                </dd>
                <dd class="">
                    <span onclick="GetOrderFC()">订单废除 0</span>
                </dd>
                <dd class="">
                    <span onclick="GetOrderWC()">交易完成 0</span>
                </dd>
            </dl>
            <p class="myOrder-tabright"><a href="http://help.360kad.com/Shopping/OrderState" target="_blank">查看订单状态说明</a></p>
        </div>
        <div class="myOrderSearch">
            <dl class="SearchOrder">
                <dd class="searchtext" style="padding:0px 0px 0px"><input type="text" style="height: 30px; line-height: 30px; width: 200px; text-align: left; padding-left: 5px; color: #333" id="goods" value="商品名称、收货人姓名、订单编号" maxlength="100" /></dd>
                <dd><input type="button" value="查询" onclick="Submitgoods()" class="searchbtn" /></dd>
            </dl>
            <div class="timeSelect">
                <input type="hidden" id="type" value="0" />
                <input type="hidden" id="option" value="1" />
                <select onchange="check(this.value)" id="potion">
                    <option selected="selected" value="1">近一个月订单</option>
                    <option value="3">近三个月订单</option>
                    <option value="6">一年内订单</option>
                    <option value="0">全部订单</option>
                </select>
            </div>
        </div>

        <div class="myOrder-tips" style="display: none">抱歉，没有找到与搜索条件相符的订单！</div>

        <div class="myOrder-list">
            <table class="tab-void" width="100%" height="100%" cellpadding="0" cellspacing="0" id="tab">
                <thead align="center">
                    <tr>
                        <td width="305">订单商品</td>
                        <td width="125">收货人</td>
                        <td width="123">金额</td>
                        <td width="126">订单状态</td>
                        <td width="126">付款方式</td>
                        <td class="br1" width="138">操作</td>
                    </tr>
                </thead>
                <!--全部订单begin-->
                <tbody>
                            <tr class="order-title">
                                <td colspan="6">
                                    订单编号：<a href="/order/detail?orderid=1636235270">1636235270</a>
                                           &nbsp;下单日期: 2018/03/02 13:24:52
                                    

                                </td>
                            </tr>
                            <tr>
                                <td class="img-box">
                                    <a href="/Order/Detail?orderid=1636235270">
                                        
                                        <img src="http://image.360kad.com/group1/M00/9A/09/CgAgEFjteB-AXUeCAAHVVntMFFk158.jpg_180x180.jpg" style="width: 70px;" alt="" />
                                    </a>
                                    <span class="total-pro">共 2 件商品</span>
                                </td>
                                <td>曹忠建</td>
                                <td>
                                    <p class="price">￥ 44.90</p>
                                    <p class="price1">
                                        (含运费：<span>¥ 15.00</span>)
                                    </p>
                                </td>
                                <td>
                                    <span class=" b">
                                        未付款
                                    </span>
                                </td>
                                <td>
                                    <label>
                                        在线支付
                                    </label>
                                </td>
                                    <td class="order-act">
                                                                                        <p class="go-pay">
                                                    <a href="javascript:;;" onclick="gotoPay('1636235270')">去付款</a>
                                                </p>
                                                                                                                                                                <p>
                                            <a href="/Order/Detail?orderid=1636235270">订单详情</a>
                                        </p>
                                            <a href="javascript:void(0)" onclick="OrderCancel(1636235270) ">取消订单</a>
                                        <input type="hidden" id="code" />
                                    </td>
                            </tr>
                </tbody>
                <tfoot>
                    <tr class="sep-row">
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <!-- 页码 begin -->
                            <!-- 页码 end -->
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="page">
<div class="YPagebox"><div class="YPage"> <span class="Yp_num"><span class="Yp_tolp">数量:1 共1页</span></span></div></div>        </div>
    </div>
    <!--右侧 end-->
    <!--为您推荐 begin-->
    <div class="kad-center-right today-team-buy" id="user-guess" style="display:none">
    <h3 class="personal-msg" style="position: relative;padding-left: 16px;border-left: 3px solid #ff7e00;">
        为您推荐
    </h3>
    <div class="listcontent">
        <div class="product_list_show">
            <ul class="ie7Hack"></ul>
            <span class="prev" id="prev-btn"><a href="javascript:void(0)"></a></span>
            <span class="next" id="next-btn"><a href="javascript:void(0)"></a></span>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function () {
            GetSearchRecommend();
        });
        function GetSearchRecommend() {
            GetRecommendProducts({
                pageType: "vippage",
                recomm: "guesslike",
                userid: "12301009930",
                callback: function (data) {
                    if (data.length == 0)
                        $("#user-guess").hide();
                    else
                        $("#user-guess").show();
                    for (var i = 0; i < data.length; i++) {
                        var html = "";
                        html += "<li>";
                        html += "<div class=\"inner-box\" style=\"padding: 10px;border: 1px solid #fff;line-height: 18px;color: #666;\">";
                        html += "<p class=\"pro-pic\"><a href=\"http://www.360kad.com/product/" + data[i].WareSkuCode + ".shtml?kzone=alsobuy\">";
                        html += "<img src=" + data[i].Pic180 + " style=\"height:205px;width:205px\" alt=\"" + data[i].WareName + "\"></a></p>";
                        html += "<p class=\"pro-title\"><a href=\"http://www.360kad.com/product/" + data[i].WareSkuCode + ".shtml?kzone=alsobuy\">" + data[i].WareName + "</a></p>";
                        html += "<p class=\"market-pice\" style=\"text-decoration: line-through\">市场价：￥" + data[i].MarketPrice + "</a></p>";
                        html += "<p class=\"hg-price\" ><span>" + (data[i].RxType == 0 ? "会员价" : "门店价") + "：￥" + data[i].SalePrice + "</span></p>";
                        html += "</div>";
                        html += "</li>";
                        $(".ie7Hack").append(html);
                    }
                    UserGuessScroll();
                }
            });
        }
        var initN = 1;
        var initPages = 0;
        function UserGuessScroll() {
            var $buyProList = $(".listcontent");
            var $proBoxW = $buyProList.find(".product_list_show").outerWidth();
            var $buyUl = $buyProList.find('ul');
            var $buyLi = $buyUl.find("li");
            var liW = $buyLi.outerWidth();
            var liSize = $buyLi.size();
            var $prevBtn = $("#prev-btn");
            var $nextBtn = $("#next-btn");
            initPages = Math.ceil(liSize / 4);
            $buyUl.css("width", liW * liSize + 36 + "px");
            if (initPages > 1) {
                $prevBtn.show(); $nextBtn.show();
            } else {
                $prevBtn.hide(); $nextBtn.hide();
            }
            if (initN = 1)
            {
                $prevBtn.hide();
            }
            //下一个
            $nextBtn.bind('click', function (event) {
                if (initN >= initPages) {
                    $nextBtn.hide();
                    return;
                }
                if (initN + 1 == initPages) {
                    $nextBtn.hide();
                } else {
                    $nextBtn.show();
                }
                $prevBtn.show();
                initN++;
                changeFn();
            });

            //上一个
            $prevBtn.bind('click', function (event) {
                if (initN <= 1) {
                    return;
                }
                if (initN - 1 == 1) {
                    $prevBtn.hide();
                }
                else {
                    $prevBtn.show();
                }
                $nextBtn.show();
                initN--;
                changeFn();
            });

            //ul切换函数
            function changeFn() {
                $buyUl.stop().animate({ marginLeft: -(initN - 1) * $proBoxW + "px" }, 600);
            }
        }
    </script>

    <!--为您推荐 end-->
</div>
<!--物流跟踪信息 begin-->
<div class="wl-list-show" id="wl-list-show" style="left: 1053px;">
    <i class="wl-pointer-icon"></i>
    <p class="title"><span class="wl-name">快递名：<span class="main-name-way" id="kdname"></span></span><span class="wl-order" id="kdNo">运单号：<span class="order-nums" id="no"></span></span></p>
    <div class="wl-main-txt" id="ddgz">
    </div>
</div>
<!--物流跟踪信息 end-->
<!--取消订单 begin-->
<div class="PromptBox Box-cancelOrder" id="EditPromptBox" style="z-index: 9999; display: none; position: fixed; left: 50%; top: 46%; margin-top: -87px; margin-left: -208px; " id="Cancel">
    <div class="BoxHead">
        <span class="BoxTitle">温馨提示</span>
        <a class="go_close" onclick="GetCancel()" href="javascript:void(0)">×</a>
    </div>
    <div class="BoxBody clearfix">
        <p class="Bdes">您确认取消该订单？请选择任一选项，以便我们改进服务。谢谢！</p>
        <dl class="Blist">
                    <dd>
                        <label class="radio-moni">
                            <i><input type="radio" name="radio-moni" checked=&quot;checked&quot; code="200002" value="发票信息有误" /></i>
                            <span>发票信息有误</span>
                        </label>
                    </dd>
                    <dd>
                        <label class="radio-moni">
                            <i><input type="radio" name="radio-moni"  code="200004" value="配送信息有误" /></i>
                            <span>配送信息有误</span>
                        </label>
                    </dd>
                    <dd>
                        <label class="radio-moni">
                            <i><input type="radio" name="radio-moni"  code="200005" value="不想买了" /></i>
                            <span>不想买了</span>
                        </label>
                    </dd>
                    <dd>
                        <label class="radio-moni">
                            <i><input type="radio" name="radio-moni"  code="200014" value="重复下单" /></i>
                            <span>重复下单</span>
                        </label>
                    </dd>
                    <dd>
                        <label class="radio-moni">
                            <i><input type="radio" name="radio-moni"  code="200017" value="价格贵了" /></i>
                            <span>价格贵了</span>
                        </label>
                    </dd>
                    <dd>
                        <label class="radio-moni">
                            <i><input type="radio" name="radio-moni"  code="203003" value="无法支付/重复扣费" /></i>
                            <span>无法支付/重复扣费</span>
                        </label>
                    </dd>
                    <div style="clear:both; padding:0px 0px;">
                        <label class="radio-moni">
                            <i><input type="radio" name="radio-moni" id="radio-moni" value="" code="203006" /></i>
                            <span>其它原因</span>
                        </label>
                        <input type="text" id="moni_text" style="width: 330px; height: 22px; padding: 0px 5px; width: 330px;" disabled="disabled" />
                    </div>
        </dl>
    </div>
    <div class="Box-operate clearfix">
        <a href="javascript:void(0)" class="btn-blue" id="Confirm">确定<i></i></a>
        <a href="javascript:void(0)" class="btn-White" onclick="GetCancel()">取消<i></i></a>
    </div>
</div>
<!--取消订单 end-->

   <!--底部 begin-->
    <!--部件开始:Footer_LastNew,分组:页脚部件-->
<div class="wrap_footer">
    <div class="item01">
        <div class="width1200">
            <img src="http://res.360kad.com/theme/default/img/2014newKad/fxgBenner.png" alt="放心购">
            <a class="safeBuy" style="background:#fff;opacity:0;filter:alpha(opacity=0);" title="放心购" href="http://www.360kad.com/zhuanti/trust.shtml?kzone=fxg_foot_pc" target="_blank"></a>
        </div>
    </div>
    <!--康爱多掌上药店-->
    <div class="item01 item02">
        <div class="width1200 clearfix">
            <div class="lside">
                <div class="appCode">
                    <p class="title">手机购药</p>
                    <p class="code"></p>
                    <p class="clearfix pl8">
                        <span class="ios"><a href="http://um0.cn/2Vawnt/?kzone=ios_foot_pc" target="_blank"></a></span>
                        <span class="line"></span>
                        <span class="android"><a href="http://res.360kad.com/app/k/kad.apk?kzone=android_foot_pc" target="_blank"></a></span>
                    </p>
                </div>
                <div class="weixinCode">
                    <p class="title">微信购药</p>
                    <p class="code"></p>
                    <p class="title02" style="width:90px;">扫一扫  领优惠券</p>
                </div>
            </div>
            <div class="mside">
                <ul class="clearfix">
                    <li>
                        <p class="title">新手指南</p>
                        <p><a href="http://help.360kad.com/Shopping/shopWm?kzone=gwlc_foot_pc" target="_blank" rel="nofollow">购物流程</a></p>
                        <p><a href="http://help.360kad.com/Novice/VipClass?kzone=hyjb_foot_pc" target="_blank" rel="nofollow">会员级别</a></p>
                        <p><a href="http://help.360kad.com/Novice/IntegralDesc?kzone=jfsm_foot_pc" target="_blank" rel="nofollow">积分说明</a></p>
                        <p><a href="http://help.360kad.com/Pay/Coupon?kzone=yhj_foot_pc" target="_blank" rel="nofollow">优惠券</a></p>
                        <p><a href="http://help.360kad.com/Novice/Question?kzone=cjwt_foot_pc" target="_blank" rel="nofollow">常见问题</a></p>
                    </li>
                    <li>
                        <p class="title">配送方式</p>
                        <p><a href="http://help.360kad.com/Delivery/Freight?kzone=psfw_foot_pc" target="_blank" rel="nofollow">配送范围及运费</a></p>
                        <p><a href="http://help.360kad.com/Delivery/Privsend?kzone=ysps_foot_pc" target="_blank" rel="nofollow">隐私配送</a></p>
                        <p><a href="http://help.360kad.com/Delivery/Receipt?kzone=spys_foot_pc" target="_blank" rel="nofollow">商品验收及签收</a></p>
                    </li>
                    <li>
                        <p class="title">支付方式</p>
                        <p><a href="http://help.360kad.com/Pay/Cash?kzone=hdfk_foot_pc" target="_blank" rel="nofollow">货到付款</a></p>
                        <p><a href="http://help.360kad.com/Pay/OnlinePay?kzone=wszf_foot_pc" target="_blank" rel="nofollow">网上支付</a></p>
                        <p><a href="http://help.360kad.com/Pay/BankTrans?kzone=yhzz_foot_pc" target="_blank" rel="nofollow">银行转账</a></p>
                        <p><a href="http://help.360kad.com/Pay/Mention?kzone=ydzt_foot_pc" target="_blank" rel="nofollow">药店自提</a></p>
                    </li>
                    <li>
                        <p class="title">售后服务</p>
                        <p><a href="http://help.360kad.com/SaleAfter/ReturnsFlow?kzone=thhlc_foot_pc" target="_blank" rel="nofollow">退换货流程</a></p>
                        <p><a href="http://help.360kad.com/SaleAfter/ReturnsPolicy?kzone=thhzc_foot_pc" target="_blank" rel="nofollow">退换货政策</a></p>
                        <p><a href="http://help.360kad.com/SaleAfter/RefundFlow?kzone=tklc_foot_pc" target="_blank" rel="nofollow">退款流程</a></p>
                    </li>
                    <li>
                        <p class="title">特色服务</p>
                        <p><a href="http://user.360kad.com/club?kzone=hyjlb_foot_pc" target="_blank" rel="nofollow">会员俱乐部</a></p>
                        <p><a href="http://help.360kad.com/Feature/TouSuJianYi?kzone=tsjy_foot_pc" target="_blank" rel="nofollow">投诉建议</a></p>
                        <p><a href="http://help.360kad.com/Feature/YongYaoZiXun?kzone=yyzx_foot_pc" target="_blank" rel="nofollow">用药咨询 </a></p>
                        <p><a href="http://help.360kad.com/Feature/MianZeShengMing?kzone=mzsm_foot_pc" target="_blank" rel="nofollow">免责声明 </a></p>
                    </li>
                    <li class="phonePic">
                        <p><img src="http://res.360kad.com/theme/default/img/2014newKad/kadPhoneBg.png" alt=""></p>
                        <p class="pt4">订购服务时间：8:30-23:00</p>
                        <p>售后服务时间：9:00-22:30</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--END康爱多掌上药店-->
</div>
<div class="footer_list">
    <div class="width1200">
    <!--    <p><span class="title">战略企业：</span><a href="http://www.taiantang.net/" target="_blank" rel="nofollow">太安堂集团有限公司 (股票代码：002433)</a></p> -->
        <p>
            <span class="title">政府机构：</span><a href="http://www.nhfpc.gov.cn/" target="_blank" rel="nofollow">国家卫生和计划生育委员会</a>
            <a href="http://www.sda.gov.cn/" target="_blank" rel="nofollow">国家食品药品监督管理局</a>
            <a href="http://www.gdwst.gov.cn/" target="_blank" rel="nofollow">广东省卫生和计划生育委员会</a>
            <a href="http://www.gdda.gov.cn/" target="_blank" rel="nofollow">广东省食品药品监督管理局</a>
        </p> 

        <!--关于康爱多网上药店-->
        <p class="aboutKadList">
            <a rel="nofollow" href="http://help.360kad.com/AboutKad/kadJieShao" target="_blank">关于我们</a> |
            <a href="http://www.360kad.com/zhuanti/kad_zsyd.shtml" target="_blank" rel="nofollow">掌上药店</a> |
            <a rel="nofollow" href="http://help.360kad.com/about/entitygz" target=" _blank">实体药店</a> |
            <a rel="nofollow" href="http://help.360kad.com/AboutKad/JiaRuKangAiDuo" target="_blank">加入康爱多</a> |
            <a href="http://help.360kad.com/AboutKad/LianXiWoMen" target="_blank" rel="nofollow">联系我们</a>  |
            <a href="http://www.360kad.com/zhuanti/service_provder.shtml" target="_blank" rel="nofollow">厂商合作</a>  |
            <a href="http://help.360kad.com/AboutKad/JingYingRenZheng" rel="nofollow" target="_blank">经营认证</a> |
            <a rel="nofollow" href="http://help.360kad.com/About/FriendlyLink" target="_blank">友情链接</a> |
            <a href="http://www.360kad.com/TagList.aspx" target="_blank">TAG列表</a> |
            <a href="http://www.360kad.com/SiteMap.shtml" target="_blank">网站地图</a> |
            <a href="http://cps.360kad.com/" target="_blank">CPS联盟</a>
        </p>
        <p class="diploma_list">
            <a class="pr8" rel="nofollow" title="互联网药品交易服务资格证书" target="_blank" href="http://help.360kad.com/about/AuthenBusiness">互联网药品交易服务资格证书</a>|
            <span class="bottomPadding01">
                <a rel="nofollow" title="互联网药品信息服务资格证书" target="_blank" href="http://help.360kad.com/About/AuthenInfo">互联网药品信息服务资格证书</a>
            </span>|
            <span class="bottomPadding01">
                <a rel="nofollow" title="执业药师证" target="_blank" href="http://help.360kad.com/About/AuthenPractice">执业药师证</a>
            </span>|
            <span class="bottomPadding02">
                <a rel="nofollow" title="药品经营许可证" target="_blank" href="http://help.360kad.com/About/AuthenManage">药品经营许可证</a>
            </span>|

            <span class="bottomPadding02">
                <a rel="nofollow" title="食品经营许可证" target="_blank" href="http://help.360kad.com/About/AuthenLiuTong">食品经营许可证</a>
            </span>|
            <span class="bottomPadding02">
                <a rel="nofollow" title="公司营业执照" target="_blank" href="http://help.360kad.com/About/Authen">公司营业执照</a>
            </span>|
            <span>
                <a rel="nofollow" title="GSP认证证书" target="_blank" href="http://help.360kad.com/About/AuthenGSP">GSP认证证书</a>
            </span>|
            <span>
                <a href="http://help.360kad.com/About/AuthenTeleservice" target="_blank" rel="nofollow">增值电信业务经营许可证 &nbsp;</a>
            </span>
        </p>
        <!--END关于康爱多网上药店-->
        <!--行业认证-->
        <ul class="hyRz clearfix">
            <li>
                <a rel="nofollow" href="http://www.beianbeian.com/" target="_blank" title="粤ICP备10212320号">
                    <img src="http://res1.360kad.com/theme/default/img/tool_icon1.png" alt="粤ICP备10212320号" style="display: inline;">
                </a>
                <a class="txt" rel="nofollow" title="粤ICP备10212320号" target="_blank" href="http://www.beianbeian.com/">粤ICP备10212320号</a>
            </li>
            <li>
                <a rel="nofollow" href="http://www.gdnet110.gov.cn/" target="_blank" title="网络110报警服务">
                    <img src="http://res1.360kad.com/theme/default/img/tool_icon2.png" alt="网络110报警服务" style="display: inline;">
                </a>
                <a class="txt item01" rel="nofollow" title="网络110报警服务" target="_blank" href="http://www.gdnet110.gov.cn/">
                    网络110报警服务
                </a>
            </li>
         <!--   <li>
                <a rel="nofollow" href="http://bcp.12312.gov.cn/chengxin?d=3793755&amp;t=101" target="_blank" title="诚信经营示范单位">
                    <img data-original="http://res4.360kad.com/theme/default/img/tool_icon4.jpg " src="http://res4.360kad.com/theme/default/img/tool_icon4.jpg" alt="" style="display: inline;">
                </a>
                <a class="txt item01 item02" rel="nofollow" title="诚信经营示范单位" target="_blank" href="http://bcp.12312.gov.cn/chengxin?d=3793755&amp;t=101">
                    诚信经营示范单位
                </a>
            </li> -->
            <li>
                <a rel="nofollow" href="http://netadreg.gzaic.gov.cn/ntmm/WebSear/WebLogoPub.aspx?logo=440101101012010072700090" target="_blank" title="红盾电子链接标识">
                    <img data-original="http://res2.360kad.com/theme/default/img/tool_icon5.jpg" src="http://res4.360kad.com/theme/default/img/tool_icon5.jpg" alt="" style="display: inline;">
                </a>
                <a class="txt item01 item02" rel="nofollow" title="红盾电子链接标识" target="_blank" href="http://netadreg.gzaic.gov.cn/ntmm/WebSear/WebLogoPub.aspx?logo=440101101012010072700090">
                    红盾电子链接标识
                </a>
            </li>
            <li>
                <a id='___szfw_logo___' href='https://credit.szfw.org/CX20170801035370070198.html' target='_blank'><img src='http://icon.szfw.org/cert.png' border='0' /></a>
<script type='text/javascript'>(function(){document.getElementById('___szfw_logo___').oncontextmenu = function(){return false;}})();</script>
            </li>
            <li>
                <a class="item03" style="display:block;" key="51c2d63c6856be2ce1761dce" logo_size="83x30" logo_type="realname" rel="nofollow" href="http://v.pinpaibao.com.cn/authenticate/cert/?site=www.360kad.com&at=realname" target="_blank">
                    
                    <span style="display:none;" class="LOGO_aq_jsonp_wrap_" id="AQ_logo_span_init_1">
                        
                    </span><img src="http://res.360kad.com/theme/default/img/sm_83x30.png" alt="安全联盟认证" width="83" height="30" style="border: none;">
                </a>
            </li>
            <li>
                <a style="display:block;padding-top:4px;" key="51c2d63c6856be2ce1761dce" logo_size="83x30" logo_type="business" rel="nofollow" href="http://v.pinpaibao.com.cn/authenticate/cert/?site=www.360kad.com&at=business" target="_blank">
                    
                    <span style="display:none;" class="LOGO_aq_jsonp_wrap_" id="AQ_logo_span_init_2"></span>
                    <img src="http://res2.360kad.com/theme/default/img/hy_83x30.png" alt="安全联盟认证" width="83" height="30" style="border: none;">
                </a>
            </li>
        </ul>
        <p class="bottom">&copy2010-2015 广东<a href="http://www.360kad.com">康爱多网上药店</a>版权所有，并保留所有权利</p>
        <!--END行业认证-->

    </div>
</div>
<script>
    $(function () {
        $(".linkBox").hover(function () {
            $(".friendLinks").css("height", "66px");
        }, function () {
            $(".friendLinks").css("height", "22px");
        });
    });
</script>

<!--部件开始:JS_www_Statistics,分组:通用部件-->
<div class="statistics" style="display:none;">

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
var _bdhmProtocol = " https://";
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F7a942c91de8533c33ddabdacba23065b' type='text/javascript'%3E%3C/script%3E"));
</script>
<!--百度再营销0416 -->
<script type="text/javascript">
<!-- 
var bd_cpro_rtid="nHRvPjm";
//-->
</script>
<script type="text/javascript"  src="https://cpro.baidu.com/cpro/ui/rt.js"></script>
<noscript>
<div style="display:none;">
<img height="0" width="0" style="border-style:none;" src="https://eclick.baidu.com/rt.jpg?t=noscript&rtid=nHRvPjm" />
</div>
</noscript>

</div>

<!--部件结束:JS_www_Statistics-->

<!--部件结束:Footer_LastNew-->

   <!--end底部-->
</body>
</html>

    <script language="javascript">
        $("#wl-list-show").hover(function (event) {
            $(this).show();
        }, function () {
            $(this).hide();
        });

        $("#goods").focus(function () {
            if ($("#goods").val() == "商品名称、收货人姓名、订单编号") {
                $("#goods").val("");
            }

        });
        $("#goods").blur(function () {
            if ($("#goods").val() == "") {
                $("#goods").val("商品名称、收货人姓名、订单编号");
            }
        });
        //轮回切换
        function GetOrderList() {
            ;
            window.location.href = "/index/business/myorder" ;
        }
        function GetOrderDFK() {
            window.location.href = "/Order/?type=1" + "&option=" + $("#potion").val();
        }
        function GetOrderDSH() {
            window.location.href = "/Order/?type=2" + "&option=" + $("#potion").val();
        }
        function GetOrderFC() {
            window.location.href = "/Order/?type=3" + "&option=" + $("#potion").val();
        }
        function GetOrderWC() {
            window.location.href = "/Order/?type=4" + "&option=" + $("#potion").val();
        }
        function check(option) {
            //检查1.3.6个月的时间积分
            window.location.href = "/Order?type=" + $("#type").val() + "&option=" + option;
        }
        //查询商品
        function Submitgoods() {
            var option = $("#option").val();
            var goods = $("#goods").val();
            goods = goods.replace("商品名称、收货人姓名、订单编号", "");
            if (goods === "") {
                window.location.href = "/Order?type=" + $("#type").val() + "&option=" + option;
                return;
            }
            $.ajax({
                url: "/Order/SeachOrder?page=" + 100 + "&type=" + $("#type").val() + '&option=' + option + "&str=" + encodeURI(goods),
                cache: false,
                dataType: "json",
                success: function (result) {
                    if (result.Result) {
                        window.location.href = "/Order?type=" + $("#type").val() + "&option=" + option + "&str=" + goods;
                    } else {
                        $(".myOrder-tips").css("display", "block");
                        $("#tab tbody").html("");
                        var tr_html = "<tr><td colspan=\"6\"> <p class=\"on-orders\"> 暂无订单，这就去<a href='http://www.360kad.com' target=\"_blank\">康爱多首页</a>挑选商品！</p></td></tr>";
                        $("#tab tbody").append(tr_html);
                        $("#page").html("");
                    }
                }
            });
        }
        //取消订单
        function OrderCancel(ordercode) {
            orderIsLock(ordercode, function () {
                $(".PromptBox").css("display", "block");
                $("#Confirm").click(function () {
                    var cancelReason = $('input:radio[name="radio-moni"]:checked').attr("value");
                    var selectCode = $('input:radio[name="radio-moni"]:checked').attr("code");
                    if (selectCode == "203006")
                        cancelReason = $("#moni_text").val();
                    $.ajax({
                        url: "/Order/CancelOrder?orderCode=" + ordercode + "&cancelTypeCode=" + selectCode + '&cancelReason=' + encodeURI(cancelReason),
                        cache: false,
                        dataType: "json",
                        success: function (result) {
                            if (!result.Result) {
                                alertPop(result.Message);
                                return;
                            }
                            if (result.Code == 1) {
                                eval(result.Data);//ga推送
                                $(".PromptBox").css("display", "none");
                                alertSuccess("订单已取消，欢迎再次选购", success);
                            }
                            else if (result.Code == 3) {
                                window.location.href = "/order/apply?ordercode=" + ordercode;
                            }
                        }
                    });
                });
            }, 1);
        }

        function GetCancel() {
            $("#EditPromptBox").hide();
        }

        function success() {
            window.location.href = "/Order/Index";
        }
        //确认收货
        function QRGoods() {
            $.ajax({
                url: "/Order/ConfirmReceiving?orderCode=" + $('#code').val(),
                cache: false,
                dataType: "json",
                success: function (result) {
                    if (result.Result) {
                        alertSuccess(result.Message, success);
                    } else {
                        alertPop(result.Message);
                    }
                }
            });
        }

        function OrderComment(ordercode) {
            window.location.href = '/Comment/Add?orderCode=' + ordercode;
        }

        function ShowComment() {
            var prstr = "";
            $.ajax({
                url: "/comment/GetCanComment?orderCodes=" + prstr,
                type: "get",
                dataType: "json",
                json: "callback",
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].Value != "true")
                            continue;
                        $("#comment_" + data[i].Key).show();
                    }
                }
            });
        }
        $(document).ready(function () {

            $('input:radio[name="radio-moni"]').change(function () {
                var selectValue = $('input:radio[name="radio-moni"]:checked').val();
                if (selectValue != 0)
                    $("#moni_text").attr("disabled", true);
                else
                    $("#moni_text").attr("disabled", false);
            });

            $(".aa").each(function () {
                var order = $(this).attr("value");
                $.ajax({
                    url: "/Order/Package?code=" + order,
                    cache: false,
                    dataType: "json",
                    success: function (result) {
                        var listKD = result;
                        var html = '';
                        var isShowQR = true;
                        for (var i = 0; i < listKD.length; i++) {
                            html += ' <p style="margin-top: 5px"><span >' + listKD[i].TraceName + ":" + listKD[i].TraceStatus + '</span></p>';
                            if (listKD[i].TraceStatus == "待发货")
                                continue;
                            if (listKD[i].TraceStatus == "已拒收" && isShowQR)
                                isShowQR = false;
                            html += "<div class='wl-box'><a href='javascript:void(0)' id='logisticstracking' onmousemove='Getlogtrack(" + order + "," + listKD[i].ConsignCode + ",this)'>物流跟踪</a></div>"
                        }
                        $("#package_" + order).html(html);
                        if (isShowQR) {
                            $("#qrgoods_" + order).show();
                        }
                    }
                });
            })

            ShowComment();
            orderDelete();
        });
        function Getlogtrack(code, ConsignCode, ev) {
            $("#wl-list-show").show().css({
                top: $(ev).offset().top + 23 + "px",
                left: $(ev).offset().left + 22 + "px"
            });
            $("#wl-list-show").show();
            $.ajax({
                url: "/User/LogTrace?code=" + code + "&consignCode=" + ConsignCode,
                cache: false,
                dataType: "json",
                success: function (result) {
                    var listTrace = result.TraceList;
                    var listKD = result.TransferList;
                    for (var i = 0; i < listKD.length; i++) {
                        $("#kdname").text(listKD[i].TransferName);
                        $("#no").text(listKD[i].PsBillCode);
                    }
                    var html = '';
                    if (listTrace.length == 0) {
                        html += '<p style=\"text-align:center;color:red\">暂无物流信息</p>';
                        html += '<p class="time "></p>';
                    }
                    for (var i = 0; i < listTrace.length; i++) {
                        if (i > 2) {
                            continue;
                        }
                        if (i < 1) {
                            html += '<p class="color-red">' + listTrace[i].TraceDesc + '</p>';
                            html += '<p class="time color-red">' + ChangeDateFormat(listTrace[i].CreateTime) + '</p>';
                        } else {
                            html += '<p>' + listTrace[i].TraceDesc + '</p>';
                            html += '<p class="time ">' + ChangeDateFormat(listTrace[i].CreateTime) + '</p>';
                        }
                    }
                    html += " <p class='check-xq'><a href='/Order/Detail?orderid=" + code + "' target='blank'>查看详情</a></p>";
                    $("#ddgz").html(html);
                }
            });
        }
        //时间转换
        function ChangeDateFormat(cellval) {
            var date = new Date(parseInt(cellval.replace("/Date(", "").replace(")/", ""), 10));
            var month = date.getMonth() + 1 < 10 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
            var currentDate = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
            var hour = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
            var minute = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
            var second = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
            return date.getFullYear() + "-" + month + "-" + currentDate + " " + hour + ":" + minute + ":" + second;
        }

        //订单是否锁定,未锁定执行callback,type=1弹cancelTips,type=2弹payTips
        function orderIsLock(orderId, callback, type) {
            $.ajax({
                url: "/Order/OrderIsLock?orderCode=" + orderId,
                cache: false,
                dataType: "json",
                success: function (result) {
                    if (result.Result) {
                        var msg = result.Message;
                        if (type == 2) {
                            msg = result.Data;
                        }
                        alertPop(msg, function () {
                        }, 1);
                        return;
                    }
                    else {
                        callback();
                    }
                }
            });
        }
        //去支付
        function gotoPay(orderId) {
            orderIsLock(orderId, function () {
                window.location.href = 'http://' + 'pay.360kad.com' + '/Pay/GotoPayView?orderId=' + orderId;
            }, 2)
        }

        function orderDelete(selector) {
            if (!selector)
                selector = $('.oder_del');

            selector.off("click").on("click", function () {
                var orderCode = $(this).data("code");
                if (orderCode) {
                    confirmPop('确定要删除吗？订单删除后，将无法恢复！', function () {
                        $.ajax({
                            url: "/Order/Del",
                            data: { orderCode: orderCode },
                            type: "Get", dataType: "json",
                            success: function (data) {
                                alertPop(data.Message
                                    , function () {
                                        if (data.Result)
                                            location.reload();
                                    }
                                    , data.Result ? 2 : 3
                                );
                            }
                        });
                    });
                }
            });
        }
    </script>