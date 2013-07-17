<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" >
		<meta name="author" content="jimages" >
		<meta name="description" content="窅然去-登陆" >
		<meta name="keywords" content="登陆" >
		<title>窅然去·登陆</title>
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/login.css" />
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/common.css" />
		<script type="text/javascript" src="http://resource.yaoranqu.com/js/jquery-1.10.1.min.js" ></script>
	</head>
	<body>
		<div id="login">
			<h1>窅然去·登录</h1>
			<span id="error" ></span>
			<form method="post" action="http://www.yaoranqu.com/user/check_login/" accept-charset="UTF-8" >
				<ul>
					<li>
						<label for="username">用户名</label>
						<input type="text" name="username"  class="loginText" id="username" />
					</li>
					<li>
						<label for="password">密码</label>
						<input type="password" name="password" class="loginText"  id="password" />
					</li>
					<li>
						<input type="submit" value="登录" id="loginSubmit" />
					</li>
				</ul>
			</form>
		</div>
		<footer>
			<div id="pageEnd" >
				<ul>
					<li>
						<a href="http://creativecommons.org/licenses/by-sa/3.0/deed.zh" target="_blank" >
							<img src="http://resource.yaoranqu.com/images/cc.png" alt="cc协议" />
						</a>
					</li>
					<li>
						<img src="http://resource.yaoranqu.com/images/html5_24x32.png" alt="本站采用html5技术" />
					</li>
					<li>
						<a href="#" target="_blank" > 
							<img src="http://resource.yaoranqu.com/images/logo_31x31.png" alt="窅然去" />
						</a>
					</li>
					<li>
						<a href="http://creativecommons.org/licenses/by-sa/3.0/deed.zh" target="_blank" >本站遵守署名-相同方式共享 3.0 未本地化版本</a>
					</li>
					<li id="icp" >
						<a href="http://www.miibeian.gov.cn" target="_blank">蜀ICP备13015168号</a>
					</li>
				</ul>
			</div>
		</footer>
		<!-- load function -->
		<script type='text/javascript' src='http://resource.yaoranqu.com/js/include/md5.js'></script>
		<!-- setup js -->
		<script type="text/javascript" src="http://resource.yaoranqu.com/js/login.js"></script>
	</body>
</html>
