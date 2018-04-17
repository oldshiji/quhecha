<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:39:"./template/mobile/mobile1/user\reg.html";i:1517208525;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掌心全球购</title>
    <link rel="stylesheet" href="__STATIC__/newskin/css/base.css">
    <link rel="stylesheet" href="__STATIC__/newskin/css/mobile.css">
    <script src="__STATIC__/newskin/js/jquery.min.js"></script>


    <script src="__STATIC__/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__STATIC__/js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
    <script src="__STATIC__/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>


    <script>
        function resize(originSize,type) {
            var type=type||"x";
            var widths=document.documentElement.clientWidth;
            var heights=document.documentElement.clientHeight;
            if(type=="x"){
                var scalex=widths/originSize*100;
                document.querySelector("html").style.fontSize=scalex+"px";
            }else if(type=="y"){
                var scaley=heights/originSize*100;
                document.querySelector("html").style.fontSize=scaley+"px";
            }
        }
        resize(750); 
    </script>
</head>
<body>
<header style="background-color: #fd6600;">
    <div class="h-left"><a href="javascript:;" onclick="history.go(-1)"><img src="__STATIC__/newskin/images/login/return.png"></a></div>
    <div class="h-con" style="color: #fff;">注册</div>
    <div class="h-right"><a href="javascript:;"><img src="__STATIC__/newskin/images/login/fengxiang.png"></a></div>
</header>
<div class="main main-bg">
    <form class="reg-warp" action="" method="post" id="regFrom">
        <input type="hidden" name="is_bind" value="<?php echo \think\Request::instance()->param('is_bind'); ?>" >
        <div class="margin-top">
            <label for="">
                <span>您的昵称：</span>
                <input type="text" placeholder="输入昵称" name="nickname" id="nickname" value="<?php echo \think\Request::instance()->param('nickname'); ?>" >
            </label>
        </div>
        <div class="margin-top">
            <label for="">
                <span>手机号：</span>
                <input type="tel" placeholder="输入真实手机号"  name="username" id="username" maxlength="11">
                <a class="hq">发送验证码</a>
            </label>
            <label for="">
                <span>验证码：</span>
                <input type="text" placeholder="输入验证码" id="mobile_code"  name="mobile_code">
            </label>
        </div>
        <div class="margin-top">
            <label for="">
                <span>设置密码：</span>
                <input type="password" placeholder="请设置6-16位登录密码" name="password" id="password">
            </label>
            <label for="">
                <span>确认密码：</span>
                <input type="password" placeholder="再次输入新密码"  id="password2" name="password2" onBlur="check_confirm_password(this.value);">
            </label>
        </div>
        <button class="tj-btn" onclick="checkSubmit()">注册</button>
        <div class="gvrp">
            注册即视为同意 <a href="">《用户注册协议》</a>
        </div>
    </form> 
</div>
<script>
    $(".main-bg").css("min-height",$(window).height());
</script>
<style>
    #verify_code_img{
        padding: .55467rem .21333rem;
        width: 4.6rem;
        height: 2.9rem;
        color: white;
        border-radius: .128rem;
    }
    #sendcode{
        pointer-events: none;
        background-color: #666;
    }
</style>

<!--注册表单-s-->
<!-- 
<div class="loginsingup-input singupphone">
    <form action="" method="post" id="regFrom" >
    	<input type="hidden" name="is_bind" value="<?php echo \think\Request::instance()->param('is_bind'); ?>">
        <div class="content30">
        	<div class="lsu boo wicheck">
                <input type="text" name="nickname" id="nickname"  placeholder="请输入昵称"  value="<?php echo \think\Request::instance()->param('nickname'); ?>"  class="c-form-txt-normal" onBlur="">
                <span id="mobile_nickname"></span>
            </div>
            <div class="lsu boo wicheck">
                <input type="text" name="username" id="username" value="" placeholder="请输入手机号" maxlength="11"  class="c-form-txt-normal" onBlur="checkMobilePhone(this.value);">
                <span id="mobile_phone_notice"></span>
            </div>
            <div class="lsu boo wicheck">
                <input type="password" name="password" id="password" value="" maxlength="16" placeholder="请设置6-16位登录密码" class="c-form-txt-normal" onBlur="check_password(this.value);">
                <span id="password_notice"></span>
            </div>
            <div class="lsu boo wicheck">
                <input type="password" id="password2" name="password2" value=""  maxlength="16"placeholder="确认密码" onBlur="check_confirm_password(this.value);">
                <span id="confirm_password_notice"></span>
            </div>
            <div class="lsu boo zc_se">
                <input type="text"  value="" name="verify_code" placeholder="请输入图像验证码" >
                <img src="" id="verify_code_img" onclick="verify()">
            </div>
            <?php if($regis_sms_enable == 1): ?>
              <div class="lsu boo zc_se">
                <input type="text" id="mobile_code" value="" name="mobile_code" placeholder="请输入短信验证码" >
                <a rel="mobile" onClick="sendcode(this)">获取短信验证码</a>
            </div>
            <?php endif; ?>
            <div class="lsu submit">
                <input type="button" name="" id="" onclick="checkSubmit()" value="注册"/>
            </div>
            <div class="signup-find">

                <p class="recept">注册即视为同意<a href="">《开源用户注册协议》</a></p>
            </div>
        </div>
    </form>
</div>
 -->
<!--注册表单-s-->
<script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        verify();
    })
    // 普通 图形验证码
    function verify(){
        $('#verify_code_img').attr('src','/index.php?m=Home&c=User&a=verify&type=user_reg&r='+Math.random());
    }
    var flag = false;
    //手机验证
    function checkMobilePhone(mobile){
        if(mobile == ''){
            showErrorMsg('手机不能空');
            flag = false;
        }else if(checkMobile(mobile)){ //判断手机格式
            $.ajax({
                type : "GET",
                url:"/index.php?m=Home&c=Api&a=issetMobile",
                data :{mobile:mobile},// 你的formid 搜索表单 序列化提交
                success: function(data)
                {
                    if(data == '0')
                    {
                       flag = true;
                    }else{
                        showErrorMsg('* 手机号已存在');
                       flag = false;
                    }
                }
            });
        }else{
            showErrorMsg('* 手机号码格式不正确');
           flag = false;
        }
    }

    //密码
    function check_password(password) {
        var password = $.trim(password);
        if(password == ''){
            showErrorMsg("*登录密码不能包含空格");
           flag = false;
        }else if (password.length < 6) {
            showErrorMsg('*登录密码不能少于 6 个字符。');
           flag = false;
        }
    }

    //验证确认密码
    function check_confirm_password(confirm_password) {
        var password1 = $.trim($('#password').val());
        var password2 = $.trim(confirm_password);
        if (password2.length < 6) {
            showErrorMsg('*登录密码不能少于 6 个字符。');
           flag = false;
        }
        if (password2 != password1) {
            showErrorMsg('*两次密码不一致');
           flag = false;
        }else{
            flag = true;
        }
    }

    function countdown(obj) {
        var s =  <?php echo $tpshop_config['sms_sms_time_out']; ?>;
        //改变按钮状态
        $(obj).attr('id','sendcode')
        callback();
        //循环定时器
        var T = window.setInterval(callback,1000);
        function callback()
        {
            if(s <= 0){
                //移除定时器
                window.clearInterval(T);
                $(obj).removeAttr('id')
                obj.innerHTML='获取短信验证码';
            }else{
                if(s<=10){
                    obj.innerHTML = '0'+ --s + '秒后再获取';
                }else{
                    obj.innerHTML = --s+ '秒后再获取';
                }
            }
        }
    }

    //发送短信验证码
    function sendcode(obj){
        if(flag){
            $.ajax({
                url:'/index.php?m=Home&c=Api&a=send_validate_code&t='+Math.random() ,
                type:'post',
                dataType:'json',
                data:{type:$(obj).attr('rel'),send:$.trim($('#username').val()), scene:1},
                success:function(res){
                    if(res.status==1){
                        //成功
                        showErrorMsg(res.msg);
                        countdown(obj)
                    }else{
                        //失败
                        showErrorMsg(res.msg);
                    }
                },
                error:function(){
                    showErrorMsg('网络错误，请稍后再试');
                }
            })
        }else{
            showErrorMsg('请先填写完所有信息！');
        }
    }

    //提交表单
    function checkSubmit()
    {
        $.ajax({
        type:'POST',
        url:"/index.php?m=Mobile&c=User&a=reg",
        dataType:'JSON',
        data:$('#regFrom').serialize(),
        success:function(data){
            if(data.status == 1){
                showErrorMsg(data.msg);
                location.href='/index.php/Mobile/User/index';
            }else {
                showErrorMsg(data.msg);
                verify();
            }
        }
    })
    }
    /**
     * 提示弹窗
     * @param msg
     */
    function showErrorMsg(msg){
        layer.open({content:msg,time:2});
    }
</script>
	</body>
</html>
