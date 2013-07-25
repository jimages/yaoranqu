<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="author" content="jimages" />
		<meta name="description" content="“窅然去”网站建立的一点一滴，都在这里。同时也有站长的小博文。" />
		<meta name="keywords" content="blog,记录,博客" />
		<title>窅然去·记录——从这里，启程。</title>
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/common.css" /> 
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/blog_index.css" /> 
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/blog_common.css" />
		<link rel="shortcut icon" href="http://resource.yaoranqu.com/images/favicon.ico"/>
		<script type='text/javascript' src='http://resource.yaoranqu.com/js/jquery-1.10.1.min.js' ></script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://resource.yaoranqu.com/js/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php require('header.php'); ?>
		<div id="mainBody">
			<?php foreach ($articles as $article) { ?>
			<article>
				<div class="article">
					<header>
						<a href='http://www.yaoranqu.com/blog/article/<?php echo $article->id ;?>/' ><h3><?php echo $article->title; ?></h3></a>
					</header>
					<?php
						/* article body */echo $article->body; ?>
					<footer>
						<span><?php echo $article->create_time.'&nbsp;by&nbsp;'.$article->name; ?></span>
					</footer>
				</div>
			</article>
			<?php } ?>
			<div id="getEmail">
				<p>&nbsp;&nbsp;&nbsp;&nbsp;您好，本网站正在持续建设中，您现在看到的是本站的记录。您可以将您的电子邮件留下以便于当网站建设发生重大进展时，我们将以电子邮件的形式提醒您。我们将妥善保存您的信息。</p>
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
		</div>
		<?php require('footer.php'); ?>
		<script type='text/javascript' src='http://resource.yaoranqu.com/js/blog/index.js'></script>
	</body>
</html>