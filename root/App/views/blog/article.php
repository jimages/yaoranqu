<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" >
		<meta name="author" content="jimages" >
		<meta name="description" content="这是窅然去·记录网站的文章。题目为开战的话。" >
		<meta name="keywords" content="文章,记录,窅然去,网站历程" >
		<title><?php echo $article->title.'——窅然去·记录'?></title>
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/blog_article.css" />
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/common.css" />
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/blog_common.css" />
		<script type="text/javascript" src="http://resource.yaoranqu.com/js/jquery-1.10.1.min.js"></script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://resource.yaoranqu.com/js/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php require('header.php'); ?>
		<div id="mainBody">
			<article>
				<header>
					<h1><?php echo $article->title; ?></h1>
				</header>
				<?php echo $article->body;?>
				<footer>
				<span>文章分类：<?php echo $article->kind;?></span>
				<span><?php echo $article->create_time.'&nbsp;by&nbsp;'.$article->name;?></span>
				</footer>
				<aside>
				<!-- Duoshuo Comment BEGIN -->
				<div class="ds-thread" data-thread-key="<?php echo $article->id ?>" data-title="<?php echo $article->title ?>"></div>
				<script type="text/javascript">
					var duoshuoQuery = {short_name:"yaoranqu"};
					(function() {
						var ds = document.createElement('script');
						ds.type = 'text/javascript';ds.async = true;
						ds.src = 'http://static.duoshuo.com/embed.js';
						ds.charset = 'UTF-8';
						(document.getElementsByTagName('head')[0] 
						|| document.getElementsByTagName('body')[0]).appendChild(ds);
					})();
				</script>
				<!-- Duoshuo Comment END -->
				</aside>
			</article>	
		</div>
		<?php require('footer.php'); ?>
		<script type='text/javascript' src='http://resource.yaoranqu.com/js/blog/common.js'></script>
	</body>
</html>