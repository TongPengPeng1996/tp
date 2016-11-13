<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>主页</title>
		<meta charset="utf-8">
	</head>
	<script type="text/javascript" src="/Public/js/jquery-1.8.3.min.js"></script>
	<body>
		<center>
			<!DOCTYPE html>
<html>
	<head>
		<title>公共</title>
		<meta charset='utf-8'>
	</head>
	<body>
		<span><a href="/home/index/index" style="color:orange;font-size:25px;">浏览主页</a></span>
		<span><a href="/home/index/create" style="color:pink;font-size:25px;">添加用户</a></span>
		<br>
	</body>	
</html>
			<!-- <?php echo ($_SESSION['name']?$_SESSION['name']:''); ?> -->
			<?php if(($_SESSION['name'])): ?>欢迎<span style='color:red;font-size:25px;'><?php echo ($_SESSION['name']); ?></span>
				<?php else: ?>
				 请登录<?php endif; ?>
			<a href="/home/index/out">退出</a>

			<form action='' method='post' id='post' name='myform'>
				
			</form>

			<table border='1'>
				<tr style='font-size:25px;'>
					<th>学号&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th>姓名&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th>性别&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th>班级&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th>成绩&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th>动作</th>
				</tr>
				<?php if(is_array($list)): foreach($list as $key=>$list): ?><tr>
						<td><?php echo ($list["id"]); ?></td>
						<td><?php echo ($list["name"]); ?></td>
						<td><?php echo ($list[sex] == 1?'女':'男'); ?></td>
						<td><?php echo ($list["class"]); ?></td>
						<td><?php echo ($list["score"]); ?></td>
						<td>
							<a href="/home/index/update/id/<?php echo ($list["id"]); ?>">修改</a>
							<!-- <a href="javascript:delete(<?php echo ($list["id"]); ?>)">删除</a> -->
							<!-- <a href="/home/index/delete/id/<?php echo ($list["id"]); ?>">删除</a> -->
							<a href="javascript:dodel(<?php echo ($list["id"]); ?>)">删除</a>
							 <!-- onclick='delete(<?php echo ($list["id"]); ?>)' -->
						</td>
					</tr><?php endforeach; endif; ?>
			</table>
			<!-- <table border="1">
				<tr>
					<td><a href="/home/index/index/page/1"><</a></td>
					<td><a href="/home/index/index/page/1">1</a></td>
					<td><a href="/home/index/index/page/2">2</a></td>
					<td><a href="/home/index/index/page/3">3</a></td>
					<td><a href="/home/index/index/page/1">></a></td>
				</tr>
			</table> -->
			<span><?php echo ($page); ?></span>
		</center>	
		<!-- 多说评论框 start -->
		<div class="ds-thread" data-thread-key="1" data-title="请替换成文章的标题" data-url="asdasd"></div>
		<!-- 多说评论框 end -->
	</body>
	<script type="text/javascript">
		// function delete(id)
		// {
		// 	// var form = document.myform;
		// 	// form.action = '/home/index/delete/';
		// 	// var a = $('#id').val(id);
		// 	alert(1);
		// 	// $('#hehe').action = '/home/index/index/id/';
		// 	// $('#hehe:hidden').val(id);
		// 	// form.submit();
		// }
		
		// ajax
		function dodel(id)
		{
			if(confirm('确定删除么')){
				// $.ajax({
				// 	url:'/home/index/dodel',
				// 	type:'post',
				// 	async:true,
				// 	data:{id:id},
				// 	success:function(data){
				// 		if(data){
				// 			console.log(data);
				// 		}
				// 	}
				// });
				var form = document.myform;
				form.action = '/home/index/dodel/id/'+id;
				form.submit();
			}
			
			
		}
		
	</script>
	<script type="text/javascript">
		// <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
var duoshuoQuery = {short_name:"tpp19961116"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
// <!-- 多说公共JS代码 end -->
	</script>
</html>