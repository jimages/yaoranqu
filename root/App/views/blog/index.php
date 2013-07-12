<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="jimages" >
		<meta name="description" content="“窅然去”网站建立的一点一滴，都在这里。同时也有站长的小博文。" >
		<meta name="keywords" content="blog,记录,博客" >
		<title>窅然去·记录——从这里，启程。</title>
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/common.css" /> 
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/blog_index.css" /> 
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/blog_common.css" />
		<link rel="shortcut icon" href="http://resource.yaoranqu.com/images/favicon.ico"/>
		<script type='text/javascript' src='http://resource.yaoranqu.com/js/jquery-1.10.1.min.js' ></script>
	</head>
	<body>
		<header>
			<div id="pageStart">
				<a href="#" target="_self" id="top" >
					<img alt="窅然去·记录" src="http://resource.yaoranqu.com/images/header.png" />
				</a>
				<div id="nav" >
					<nav>
						<ul>
							<li>
								<a href="#" target="_blank">首页</a>
							</li>
							<li>
								<a href="#" target="_blank">所有的</a>
							</li>
							<li>
								<a href="#" target="_blank">分类</a>
							</li>
						</ul>
					</nav>
				</div>	
			</div>
		</header>
		<div id="mainBody">
			<div id="getEmail">
				<p>&nbsp;&nbsp;&nbsp;&nbsp;您好，本网站正在建设中，您现在看到的是本站的开发博客。您可以将您的电子邮件留下以便于当网站建设完成并上线后，我们将以电子邮件的形式提醒您。我们将妥善保存您的信息。</p>
				<span>您的电子邮件：</span>
				<form accept-charset="utf8" target="_blank" name="getEmail" action='/blog/getEmail' method='get'>
					<ul>
						<li>
							<input type="email" name="email" id="emailInput" maxlength="37" />
						</li>
						<li>
							<input type="submit" value="提&nbsp;交" id="emailSubmit" />
						</li>
					</ul>
				</form>
			</div>
			<?php foreach ($articles as $article) { ?>
			<img src="http://resource.yaoranqu.com/images/split.png" alt="分割条" />
			<article>
				<div class="article">
					<header>
						<h3><?php
							/*article title */echo $article->title; ?></h3>
					</header>
					<?php
						/* article body */echo $article->body; ?>
					<footer>
					</footer>
				</div>
			</article>
			<?php } ?>
		</div>
		<footer>
			<div id="pageEnd">
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
		<script type='text/javascript' src='http://resource.yaoranqu.com/js/blog/index.js'></script>
	</body>
</html>