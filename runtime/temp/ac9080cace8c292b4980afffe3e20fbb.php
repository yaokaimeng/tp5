<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp64\www\tp5\public/../application/index\view\register\register.html";i:1521877663;}*/ ?>
﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
          "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <script language="javascript" type="text/javascript" async="async" src="http://www.wan.com//static/js/ctr_v2.js"></script>
    <script language="javascript" type="text/javascript" src="http://www.wan.com//static/js/envconfig.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>用户注册</title>
    <script src="http://www.wan.com//static/js/jquery.1.7.1.min.js" type="text/javascript"></script>
    <link href="http://www.wan.com//static/css/base.css" rel="stylesheet" type="text/css"/>
    <link href="http://www.wan.com//static/css/pclogin.css" rel="stylesheet" type="text/css"/>
    
    <script src="http://www.wan.com//static/js/jquery.cookie.js" type="text/javascript"></script>

	
	
<!--88888888888888888888888888  ajax 手机 8888888888888888888888888888888888888888888888888888888888888-->
<script type="text/javascript" src="http://www.wan.com//static/js/jquery-3.2.1.min.js"></script>

<script>

        // initialise plugins
        jQuery(function(){
            jQuery('#example').superfish({
                //useClick: true
            });
        });

        </script>
<!--88888888888888888888888888  ajax  8888888888888888888888888888888888888888888888888888888888888-->

    <script type="text/javascript">
    $(function(){
     $("#sunbtn").click(function(){
            var oPhone = $("#phone").val();
            //$("#username").nextAll(".errorUN").html("");
            $.ajax({
                url:"{U('register')}",
                type:"post",
                data:{
                    "phone":oPhone
                },
                 dataType:"json",
                 //alert('23');
               success:function(reslut){
                    if(reslut==1){
                        $("#phone").css("display","inline-block");
                        $("#yzmerror").css("display","none");
                    }else{
                        $("#phone").css("display","none");
                        $("#yzmerror").css("display","inline-block");
                    }
                }
            })
        })
})
    </script>
<!--88888888888888888888888888  ajax手机结束  8888888888888888888888888888888888888888888888888888888888888-->


	
	
	
    
</head>
<body>

    
<style>
    .background-gray { background-color: #b5b5b5; }
    input::-webkit-inner-spin-button { -webkit-appearance: none; }

    input::-webkit-outer-spin-button { -webkit-appearance: none; }
</style>

<div id="header" class="header clearfix">
    <div class="header-list1">
        <span class="header-logo"><a href="http://www.360kad.com"><img src="http://www.wan.com//static/images/login_logo.jpg" /></a></span>
        <p class="header-notice"><img src="http://www.wan.com//static/images/autoslogo.gif" /></p>
    </div>
    <div class="header-list2">欢迎注册</div>
    
</div>
<div style="background-color: blue; width: auto; height: 2px;"></div>
<div id="container" class="container-register">
    <h3 class="register-title" style='margin-left: -100px;'>
        欢迎注册账号
    </h3>
    <form action='http://www.wan.com//index/register/doreg' method='post'>
    <div class="register-from">
   
          <div class="bind-input-wrap clearfix">
            <div class="bind-code">
              
                 <span>用户名：</span>
            <input type="text" class="input_text" name="username" id="username" onblur='s_name()'/>
          
                
            </div>
           <span id='ss_name'></span>
        </div>
        
        <div class="bind-input-wrap clearfix">
            <div class="bind-code">
               
                <label> <span>密码：</span>
            <input type="text" class="input_text" name="password" id="password"/ onblur='s_pwd()'><span></span>
            </label>
            </div>
            <span id='ss_pwd'></span>
            
        </div>

        <div class="bind-input-wrap clearfix">
            <div class="bind-code">
               
                <label> <span>确认密码：</span>
            <input type="text" class="input_text" name="repassword" id="repassword"/ onblur="s_repwd()"><span></span>
            </label>
            </div>
            <span id='ress_pwd'></span>
        </div>
        
        <div class="bind-input-wrap clearfix">
            <div class="bind-code">
              
                <label> <span>邮箱：</span>
            <input type="text" class="input_text" name="email" id="email"/ onblur='s_email()'>
            </label>

            </div>
          <span id='ss_email'></span>
        </div>

        <div class="bind-input-wrap clearfix">
            <div class="bind-code">

              
                <label> <span>手机号：</span>
            <input type="text" class="input_text" name="phone" id="phone"/><span></span>
            </label>


            </div>
            
        </div>

      
        <div class="bind-input-wrap clearfix">
             <div class="bind-code"> 
                <!-- <p class="user-font code-font">短信验证码</p>
                -->
                 <input type="text" maxlength="6" class="code-name" name="phonecode"  placeholder="请输入短信验证码" />
                
            </div> 
            
           <span style="height:150px;width:200px;"><a id="sunbtn" style='background-color: gray;display:block;width:88px;height:44px;margin-left: 320px;text-align: center;line-height: 44px;'>发送验证码</a></span>
           
        </div>
        
        <input  value='立即注册' type='submit' style="height:25px;width:350px"/>
        <!--20160810add-->
	</form>

<script type="text/javascript">
function s_email(){
    var emil=document.getElementById('email').value;
    var r_emil=/^\w+@\w+(\.)(com|cn|net)$/;
    if(emil==""){
        document.getElementById('ss_email').innerHTML="<font color='red'>不能为空</font>";
    
    }else if(r_emil.test(emil)){
        document.getElementById('ss_email').innerHTML="<font color='red'>正确</font>";
        
    }else{
        document.getElementById('ss_email').innerHTML="<font color='red'>邮箱格式不正确</font>";
        
    }
}

    function s_name(){
     var name=document.getElementById('username').value;
    if(name==""){
        document.getElementById('ss_name').innerHTML="<font color='red'>不能为空</font>";
        
    }else if(name.length>=5){
        document.getElementById('ss_name').innerHTML="<font color='red'>要记住哦</font>";
        
    }else{
        document.getElementById('ss_name').innerHTML="<font color='red'>用户名不能小于5位</font>";
        
    }
}


    function s_pwd(){
     pwd=document.getElementById('password').value;
    if(pwd==""){
        document.getElementById('ss_pwd').innerHTML="<font color='red'>不能为空</font>";
        
    }else if(pwd.length>=6){
        document.getElementById('ss_pwd').innerHTML="<font color='red'>正确</font>";
        
    }else{
        document.getElementById('ss_pwd').innerHTML="<font color='red'>密码不能小于6位</font>";
        
    }
}

    function s_repwd(){
     pwd=document.getElementById('repassword').value;
    if(pwd==""){
        document.getElementById('ress_pwd').innerHTML="<font color='red'>不能为空</font>";
        
    }else if(pwd.length>=6){
        document.getElementById('ress_pwd').innerHTML="<font color='red'>正确</font>";
        
    }else{
        document.getElementById('ress_pwd').innerHTML="<font color='red'>确认密码与密码不一致</font>";
        
    }
}



</script>






























        <div class="pay-type">
            <div class="payt-top">
                <p class="paytop-name">使用合作网站账号登录康爱多</p>
                <p class="paytop-line"></p>
            </div>
            <ul class="clearfix">
                <li class="ptype-wechat"><a title="微信登录" href="/login/WeChatLogin?ReturnUrl=http%3a%2f%2fwww.360kad.com%2f%3futm_source%3dbaidu%26utm_medium%3dcpc%26utm_campaign%3d%25E6%2596%25B0%25E4%25BB%25A3%25E7%25A0%2581%25E5%2589%258D50-%25E5%2585%25B3%25E9%2594%25AE%25E8%25AF%258D-baidupc"></a></li>
                <li class="ptype-qq"><a title="QQ登录" href="/login/QzoneLogin?ReturnUrl=http%3a%2f%2fwww.360kad.com%2f%3futm_source%3dbaidu%26utm_medium%3dcpc%26utm_campaign%3d%25E6%2596%25B0%25E4%25BB%25A3%25E7%25A0%2581%25E5%2589%258D50-%25E5%2585%25B3%25E9%2594%25AE%25E8%25AF%258D-baidupc"></a></li>
                <li class="ptype-tb"><a title="淘宝登录" href="/Login/TaobaoLogin?ReturnUrl=http%3a%2f%2fwww.360kad.com%2f%3futm_source%3dbaidu%26utm_medium%3dcpc%26utm_campaign%3d%25E6%2596%25B0%25E4%25BB%25A3%25E7%25A0%2581%25E5%2589%258D50-%25E5%2585%25B3%25E9%2594%25AE%25E8%25AF%258D-baidupc"></a></li>
                <li class="ptype-zfb"><a title="支付宝登录" href="/login/AlipayLogin?ReturnUrl=http%3a%2f%2fwww.360kad.com%2f%3futm_source%3dbaidu%26utm_medium%3dcpc%26utm_campaign%3d%25E6%2596%25B0%25E4%25BB%25A3%25E7%25A0%2581%25E5%2589%258D50-%25E5%2585%25B3%25E9%2594%25AE%25E8%25AF%258D-baidupc"></a></li>
                <li class="ptype-sina"><a title="新浪微博登录" href="/login/SinaLogin?ReturnUrl=http%3a%2f%2fwww.360kad.com%2f%3futm_source%3dbaidu%26utm_medium%3dcpc%26utm_campaign%3d%25E6%2596%25B0%25E4%25BB%25A3%25E7%25A0%2581%25E5%2589%258D50-%25E5%2585%25B3%25E9%2594%25AE%25E8%25AF%258D-baidupc"></a></li>
                <li class="ptype-ykt"><a title="健保通（医卡通）登录" href="/login/EbaolifeLogin?ReturnUrl=http%3a%2f%2fwww.360kad.com%2f%3futm_source%3dbaidu%26utm_medium%3dcpc%26utm_campaign%3d%25E6%2596%25B0%25E4%25BB%25A3%25E7%25A0%2581%25E5%2589%258D50-%25E5%2585%25B3%25E9%2594%25AE%25E8%25AF%258D-baidupc"></a></li>
            </ul>
        </div>
        <!--20160810add-->
    </div>

</div>
<div id="popup1" class="popup1" style="display: none;">
    <a href="javascript:;" onclick="$(this).parent().hide();" class="popup1-close"></a>
    <p class="popup1-title">账号确认</p>
    <div class="popup1-container">
        <p class="popup1-container-size">该手机号已存在，继续注册将与原来账号解除绑定，<a href="javascript:;"></a>您可使用原账号直接登录，或继续注册。</p>
    </div>
    <div class="popup1-btn">
        <a href="javascript:void(0);" onclick="loginInPhone();" class="btn1">直接登录</a>
    </div>
    <div class="popup1-link"><a href="javascript:void(0)" id="continueReg">没有注册过，继续注册></a></div>
</div>
<div id="popup2" class="popup1" style="display: none;">
    <a href="javascript:;" onclick="$(this).parent().hide();" class="popup1-close"></a>
    <p class="popup1-title">温馨提示</p>
    <div class="popup1-container">
        <p class="popup1-container-size">请阅读并同意《康爱多网上药店服务协议》！</p>
    </div>
    <div class="popup1-btn">
        <a href="javascript:void(0);" id="confirmLoginName" class="btn1">确定</a>
    </div>
</div>
<div id="popup8" class="popup1" style="display: none;">
    <a href="javascript:;" onclick="$(this).parent().hide();" class="popup1-close"></a>
    <p class="popup1-title">账号确认</p>
    <div class="popup1-container">
        <p class="popup1-container-size">该手机号已存在，继续注册将与原来账号解除绑定。<a href="javascript:;"></a></p>
    </div>
    <div class="popup1-btn">
        <a onclick="$('#popup8').hide();" href="javascript:void(0);" class="btn1">重新注册</a>
    </div>
</div>

    <!--部件开始:footer_userlogin2016,分组:页脚部件-->
<style>
#kad{ color:#666; } 
#footer a:hover {color: red}
}
</style>
<div id="footer" class="footer">
			<div class="footer-container">
				<p class="footer-about">
                                       <a rel="nofollow" href="http://www.360kad.com/zhuanti/pc_pifa.shtml" target="_blank" class="pifa_shop">批发招商<span></span></a> |
					<a rel="nofollow" href="http://help.360kad.com/about/kankan" target="_blank">关于我们</a> | <a href="http://www.360kad.com/zhuanti/kad_zsyd.shtml" target="_blank" rel="nofollow">
						    掌上药店
						</a> | <a rel="nofollow" href="http://help.360kad.com/about/entitygz" target="_blank">
						    实体药店
						</a> | <a rel="nofollow" href="http://help.360kad.com/About/Recruitment" target="_blank">加入康爱多</a> | <a href="http://help.360kad.com/About/CallUs" target="_blank" rel="nofollow">联系我们</a> | <a href="http://www.360kad.com/Supplier" target="_blank" rel="nofollow">商务合作</a>	| <a href="http://help.360kad.com/About/Authen" rel="nofollow" target="_blank">经营认证</a> | <a rel="nofollow" href="http://help.360kad.com/About/FriendlyLink" target="_blank">友情链接</a> | <a href="http://www.360kad.com/TagList.aspx" target="_blank">
						    TAG列表
						</a> | <a href="http://www.360kad.com/SiteMap.shtml" target="_blank">网站地图</a> | <a href="http://cps.360kad.com/" target="_blank">CPS联盟</a>
				</p>
				<p class="footer-about">
		            <a class="pr8" rel="nofollow" title="互联网药品交易服务资格证书" target="_blank" href="http://help.360kad.com/about/AuthenBusiness">
		                互联网药品交易服务资格证书
		            </a>| <span class="bottomPadding01">
		                      <a rel="nofollow" title="互联网药品信息服务资格证书" target="_blank" href="http://help.360kad.com/About/AuthenInfo">
		                          互联网药品信息服务资格证书
		                      </a>
		            </span>| <span class="bottomPadding01">
		                         <a rel="nofollow" title="执业药师证" target="_blank" href="http://help.360kad.com/About/AuthenManage">执业药师证</a>
		            </span>| <span class="bottomPadding02">
		                         <a rel="nofollow" title="药品经营许可证" target="_blank" href="http://help.360kad.com/About/AuthenManage">药品经营许可证</a>
		            </span>| <span class="bottomPadding02">
		                         <a rel="nofollow" title="食品流通许可证" target="_blank" href="http://help.360kad.com/About/AuthenLiuTong">
		                             食品流通许可证
		                         </a>
		            </span>| <span class="bottomPadding02">
		                         <a rel="nofollow" title="公司营业执照" target="_blank" href="http://help.360kad.com/About/Authen">公司营业执照</a>
		            </span>| <span>
		                         <a rel="nofollow" title="GSP认证证书" target="_blank" href="http://help.360kad.com/About/AuthenGSP">
		                             GSP认证证书
		                         </a>
		            </span>| <span>
		                         <a href="http://help.360kad.com/About/AuthenTeleservice" target="_blank" rel="nofollow">增值电信业务经营许可证 &nbsp;</a>
		            </span>
		        </p>
		        
<p style="width:350px;margin:0 auto;color:#666;" class="bottom">&copy;2010-2016 广东<a id="kad"  href="http://www.360kad.com">康爱多网上药店</a>版权所有，并保留所有权利</p>
			</div>
		</div>
    <!--百度统计  start -->
    <div style="display: none;">
        <script type="text/javascript">
            var _bdhmProtocol = " https://";
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F9dc25c72b2848d6257aafcf33ec1a6db' type='text/javascript'%3E%3C/script%3E"));
        </script>
        
        <!-- 谷歌统计 start -->
        <script type="text/javascript">            var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-3051632-5']); _gaq.push(['_setDomainName', '']); _gaq.push(['_setAllowHash', false]); _gaq.push(['_addOrganic', 'soso', 'w']); _gaq.push(['_addOrganic', 'youdao', 'q']); _gaq.push(['_addOrganic', 'sogou', 'query']); _gaq.push(['_trackPageview']); (function () { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();</script>
    </div>
<!--部件结束:footer_userlogin2016-->

</body>
</html>

<script type="text/javascript">
    $(function(){
            $("#sunbtn").click(function(){
                var oPhone = $("#phone").val();
                $.ajax({
                    url:'/index/user/smsyzm',
                    type:"post",
                    data:{
                        "phone":oPhone
                    },
                    dataType:"json",
                })
            })
    })
    var oBtn = document.getElementById('sunbtn');
    var flag = true;
    oBtn.onclick = function () {
        if (flag) {
            flag = false;
            var s = 60;
            var timer = setInterval(function () {
                oBtn.innerHTML = s + '秒'+'&ensp;&ensp;&ensp;&ensp;&ensp;';
                if (s <= 0) {
                    oBtn.innerHTML = '重新发送';
                    clearInterval(timer);
                    flag = true;
                }
                s--;
            }, 1000);
        }
    }
</script>
