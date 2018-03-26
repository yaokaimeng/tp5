<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wamp64\www\tp5\public/../application/index\view\login\login.html";i:1521858946;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>盒老师</title>
	<meta name="keywords" content="盒老师">
	<meta name="content" content="盒老师">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="http://www.wan.com//static/css/login.css">
    <script type="text/javascript" src="http://www.wan.com//static/js/jquery-1.11.3.js"></script>
</head>
<body class="login_bj" >
<div class="zhuce_body">
	<div class="logo"><a href="#"><img src="http://www.wan.com//static/images/logo.png" width="114" height="54" border="0"></a></div>
    <div class="zhuce_kong login_kuang">
    	<div class="zc">
        	<div class="bj_bai">
            <h3>登录</h3>
       	  	  <form action="http://www.wan.com//index/login/dologin" method="post">
                <input name="name" type="text" class="kuang_txt" placeholder="用户名">
                <input name="pwd" type="text" class="kuang_txt" placeholder="密码">
                <div><img src="<?php echo captcha_src(); ?>" alt="captcha"  onclick="this.src=this.src" /></div>
                <input type="text" name='code'>
                <!-- <input type="submit" id='code'> -->
                <div>
               		<a href="#">忘记密码？</a><input name="" type="checkbox" value="" checked><span>记住我</span> 
                </div>
                <input type="submit" class="btn_zhuce" value="登录">
                
                </form>
            </div>
        	<div class="bj_right">
            	<p>使用以下账号直接登录</p>
                <a href="<?php echo url('oauthhui/qq'); ?>" class="zhuce_qq" >QQ登录</a>
                <a href="#" class="zhuce_wb">微博登录</a>
                <a href="#" class="zhuce_wx">微信登录</a>
                <p>已有账号？<a href="#">立即登录</a></p>
            
            </div>
        </div>
        
    </div>

</div>
<!==qq  登录==>
   <!--  <script>
    function toLogin()
    {
      //以下为按钮点击事件的逻辑。注意这里要重新打开窗口
      //否则后面跳转到QQ登录，授权页面时会直接缩小当前浏览器的窗口，而不是打开新窗口
      var A=window.open("index/oauthhui/qq","TencentLogin", 
      "width=450,height=320,menubar=0,scrollbars=1,resizable=1,status=1,titlebar=0,toolbar=0,location=1");
    } 
   </script> -->
<!==qq  登录==>
</body>
</html>
<script type="text/javascript">
    $('#code').click(function () {
        var code = $('input[name=code]').val();
        $.post('<?php echo url("dologin"); ?>', {code:code}, function (data) {
            console.log(data);
        });
        return false;
    });
</script>