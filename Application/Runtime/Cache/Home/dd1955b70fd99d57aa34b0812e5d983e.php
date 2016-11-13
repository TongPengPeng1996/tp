<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>登录</title>
		<meta charset='utf-8'>
	</head>
	<script type="text/javascript" src="/Public/js/jquery-1.8.3.min.js"></script>
	<body>
		<form action="/home/login/hehe" method='post'>
			<fieldset>
				<legend>用户</legend>
				<input type="text" autofocus="true" name='name' required id='name'>
			</fieldset>
			<fieldset>
				<legend>邮箱</legend>
				<input type="email" autofocus="true" name='email' pattern="\w+@\w+(\.\w+){1,2}" id='email' required>
			</fieldset>
			<fieldset>
				<legend>密码</legend>
				<input type="password" name='pwd'>
			</fieldset>
			<fieldset>
				<legend>验证码</legend>
				<input type="text" name='code' id='yzm'>
			</fieldset>
			<fieldset>
				<img src="<?php echo U('home/login/code');?>" id='code' title="点击刷新">
				<!-- <img src="<?php echo U('home/login/verify');?>"> -->
			</fieldset> 
			&nbsp;&nbsp;&nbsp;&nbsp;
			
			<br>
			<span id='spans'></span><br>
			
			
			<input type="submit" value='登录'>
			&nbsp;
			<a href="/home/login/register" style='font-size:20px;'>注册</a>

		</form>
	</body>
	<script type="text/javascript">
		// $.ajax({
		// 	url:"/home/login/dologin",
		// 	data:$('#myform').serialize(),
		// 	dataType:json,
		// 	type:'post',
		// 	success:function(data){
		// 		alert(1);
		// 	},
		// 	error:function(){
		// 		alert('失败');
		// 	}
		// });
	$('#name').blur(function(){
		var username = $('#name').val();
		// alert(username);
		$.ajax({
			url:"/home/login/dologin",
			data:{name:username},
			type:'post',
			async:true,
			success:function(data){
				if(!data){
					
					var span = $('#spans');
										
					span.html('用户名或邮箱不存在');
					span.css({ color:'red'});
				}
			},
			// error:function(){
			// 	alert('失败');
			// }
		});
	});
	$('#name').click(function(){
		$('#spans').html('');
	});
	$('#email').blur(function(){
		var email = $('#email').val();
		var name = $('#name').val();
		$.ajax({
			url:'/home/login/email',
			data:{email:email,name:name},
			type:'post',
			async:true,
			success:function(data){
				if(!data){
					
					var span = $('#spans');
										
					span.html('用户名或邮箱不存在');
					span.css({ color:'red'});
				}
			},
			// error:function(){
			// 	alert('失败');
			// }
		});
	});
	$('#email').click(function(){
		$('#spans').html('');
	});


	// 验证码
	// $('#code').click(function(){
	// 	var code = $('#code').attr('src');
	// 	$('#code').attr('src',code+Math.random());
		
	// });
	var captcha_img = $('#code');
	var verifyimg = $('#code').attr("src");  
	captcha_img.attr('title', '点击刷新');  
	captcha_img.click(function(){  
	    if( verifyimg.indexOf('?')>0){  
	        $(this).attr("src", verifyimg+'&random='+Math.random());  
	    }else{  
	        $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
	    }  
	});

	// 验证码
	$('#yzm').blur(function(){
		var yzm = $('#yzm').val();
		$.ajax({
			url:'/home/login/yzm',
			async:true,
			type:'post',
			data:{code:yzm},
			success:function(data){
				alert(data)
			},error:function(){
				alert('失败');
			}
		});
	});
	</script>
</html>