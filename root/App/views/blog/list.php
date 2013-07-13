<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" >
		<meta name="author" content="jimages" >
		<meta name="description" content="窅然去·记录的文章都在其中。" >
		<meta name="keywords" content="文章,目录,窅然去,窅然去·记录" >
		<title>文章目录——窅然去·记录</title>
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/common.css" />
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/blog_article_list.css" />
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/blog_common.css" />
		<script type="text/javascript" src="http://resource.yaoranqu.com/js/jquery-1.10.1.min.js"></script>
	</head>
	<body>
		<?php require('header.php'); ?>
		<div id="mainBody" >
			<span>您的位置：<a href="http://www.yaoranqu.com/" >窅然去</a>><a href="#" >所有的</a></span>
			<hr />
			<h1>所有的文章</h1>
			<ul id="index">
				<?php foreach ($list as $each) { ?>
				<li><a href="http://www.yaoranqu.com/blog/article/<?php echo $each->id; ?>"><?php echo $each->title; ?></a><span><?php echo $each->create_time; ?> by <?php echo $each->name ; ?></span></li>
				<?php } ?>
			</ul>
			<?php if ($is_display_pageNext) { ?>
			<div id="pageNext" >
				<?php if ($is_display_next_page) { ?>
				<a href="http://www.yaoranqu.com/blog/alist/<?php echo $now_page; ?>/" >下一页</a>
				<?php } ?>
				<?php foreach ($page_item as $number) { ?>
				<a <?php if($now_page == $number){ ?>id="nowPage"<?php }else{ ?>href='http://www.yaoranqu.com/blog/alist/<?php echo ($number - 1);}?>/' ><?php echo $number;?></a>
				<?php } ?>
				<a href='http://www.yaoranqu.com/blog/alist/' >首页</a>
				<a href="http://www.yaoranqu.com/blog/alist/<?php echo $max_page-1 ?>/" >尾页</a>
			</div>
			<?php } ?>
		</div>
		<?php require('footer.php'); ?>
	</body>
</html>