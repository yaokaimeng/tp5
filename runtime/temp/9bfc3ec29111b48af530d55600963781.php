<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp64\www\tp5\public/../application/index\view\car\xiugai.html";i:1521862775;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<div style="margin-left: 400px;margin-top:200px;height:350px;width:750px;background-color: lightblue;padding-left: 20px;padding-top: 10px;" >
	<form action="<?php echo url('car/add',array('id'=>$find['id'])); ?>" method='post' value=>
                <p class="pl10"> 
                    <span class="txt-left"><samp>*</samp> 收货人姓名：</span><span class="user-name-input">
                        <input type="text" class="txt-input" id="user-name" name="name" value='<?php echo $find['consignee']; ?>'/>
                    </span>
                    <span class="error-box" id="erroname" style="display: none;" style="font-color:red;">
                        <i class="icon-pic"></i><span id="msgname">收货人不能为空且必须不少于2个字符</span>
                    </span>
                </p>
               <!--  <p class="pl22">
                  <span class="txt-left"><samp>*</samp> 所在地区：</span>
               
                   
                   <span id="m_select" style="margin-left: 5px">
                  </span> 
                  <input type="hidden" name="KADDistrict" id="KADDistrict"> -->
<!-- 
                    <select n="KADDistrict" id="KADDistrict_0" i="0" class="" name='select' value="<?php echo $find['province']; ?>"><option id="110000" >北京</option><option id="120000">天津</option><option id="130000">河北省</option><option id="140000">山西省</option><option id="150000">内蒙古自治区</option><option id="210000">辽宁省</option><option id="220000">吉林省</option><option id="230000">黑龙江省</option><option id="310000">上海</option><option id="320000">江苏省</option><option id="330000">浙江省</option><option id="340000">安徽省</option><option id="350000">福建省</option><option id="360000">江西省</option><option id="370000">山东省</option><option id="410000">河南省</option><option id="420000">湖北省</option><option id="430000">湖南省</option><option id="440000">广东省</option><option id="450000">广西壮族自治区</option><option id="460000">海南省</option><option id="500000">重庆</option><option id="510000">四川省</option><option id="520000">贵州省</option><option id="530000">云南省</option><option id="540000">西藏自治区</option><option id="610000">陕西省</option><option id="620000">甘肃省</option><option id="630000">青海省</option><option id="640000">宁夏回族自治区</option><option id="650000">新疆维吾尔自治区</option></select>
 -->
                  <!--   
                  <select n="KADDistrict" id="KADDistrict_0" i="0" class="" name='selects' value="<?php echo $find['city']; ?>"><option id="110000" >北京</option><option id="120000">天津</option><option id="130000">上海</option><option id="140000">张家口市</option><option id="150000">唐山市</option><option id="210000">秦皇岛市</option><option id="220000">宁波市</option><option id="230000">丽水市</option><option id="310000">杭州市</option><option id="320000">哈尔滨市</option><option id="330000">浙江省</option><option id="340000">黑河市</option></select>
                   -->
                   <!--  <script type="text/javascript">$("#m_select").District("北京,北京市,东城区");</script>
                   <span class="error-box error-box3" id="areaerror" style="display: none;">
                       <i class="icon-pic"></i><span>请您填写完整的地区信息</span>
                   </span> -->
                </p>
                <p class="pl22">
                    <span class="txt-left"><samp>*</samp> 详细地址：</span>
                    <input type="text" class="detailed-address txt-input" style="margin-left:5px" id="detailed-address" name="address" value="<?php echo $find['address']; ?>"/>
                    <span class="error-box error-box2" id="erroraddress" style="display: none;">
                        <i class="icon-pic"></i><span id="msgaddress">详细地址不能为空且必须不少于3个字符</span>
                    </span>
                </p>
                <p class="pl22">
                    <span class="txt-left"><samp>*</samp> 手机号码：</span>
                    <input type="text" id="phone" class="cell-phone-num txt-input" style="margin-left:5px" name='phone' value="<?php echo $find['phone']; ?>"/>
                    
                    <span class="error-box error-box2" id="errormobile" style="display: none; left:662px;">
                        <i class="icon-pic"></i><span id="msgmobile">手机号码不能为空!</span>
                    </span>
                </p>
                <p class="pl34">
                    <span class="txt-left">电子邮箱：</span>
                    <input type="text" id="emil" class="email-input txt-input" name='email' value='<?php echo $find['email']; ?>'/>
                    <span class="tips"> 用来接收订单提醒邮件，便于您及时了解订单状态</span>
                    <span class="error-box error-box2" id="erroremil" style="display: none;">
                        <i class="icon-pic"></i><span id="msgemil">请输入正确的邮箱</span>
                    </span>
                </p>
                <p class="pl34">
                    <span class="txt-left">邮政编码：</span>
                    <input type="text" id="Zipcode" class="zip-code txt-input" />
                    <span class="error-box error-box2" id="errorcode" style="display: none; left:272px;">
                        <i class="icon-pic"></i><span id="msgcode">请输入正确的验证编码</span>
                    </span>
                </p>
                <input type="hidden" value="0" id="match-value" name="" />
            
          
            <input type='submit' value='提交' style='width:50px;height:25px;padding-bottom: 5px;'/>
            </form>
        </div>
</body>
</html>