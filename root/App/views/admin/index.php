<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="jimages">
		<meta name="description" content="窅然去的后台管理平台">
		<meta name="keywords" content="后台,admin">
		<title>后台管理——窅然去</title>
		<link rel="stylesheet" type="text/css" href="http://resource.yaoranqu.com/css/admin/index.css" />
		<!-- 
			the admin theme is not a 960px width page,it is the basic of ugly2.So it doesn`t load website 
		common stylesheet file,Instead it include itself global file.	
		-->
		<script type="text/javascript" src="http://resource.yaoranqu.com/js/jquery-1.10.1.min.js"></script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://resource.yaoranqu.com/js/html5.js"></script>
		<![endif]-->
		<!-- Load editor -->
		<script type="text/javascript" src="http://resource.yaoranqu.com/js/kindeditor-4.1.7/kindeditor.js"></script>
		<script type="text/javascript" src="http://resource.yaoranqu.com/js/kindeditor-4.1.7/lang/zh_CN.js"></script>
		<!-- Load our editor stylesheet -->
		<link type="text/caa" src="http://resource.yaoranqu.com/css/editor/default/default.css" />
	</head>
	<body>
		<header id="pageStart" >
			<hgroup>
				<h1>Yaoranqu Admin</h1>
				<h2>Dashboard</h2>
			</hgroup>
			<span><a href="http://www.yaoranqu.com/">返回站点</a></span>
			<div id="connect">
			</div>
		</header>
		<!-- page aside.It is also admin menu.-->
		<aside id="pageAside">
			<div id="selectedBackground" ></div>
			<ul>
				<li><a href="#"><img alt="用户" src="http://resource.yaoranqu.com/images/admin/user.png" width="34" height="34"/></a>
					<a href="#"><span>Jimages</span></a>
				</li>
				<li>
					<a href="#" id="firstSelection" class="menu" onclick='changePage($("#index"));'>首页</a>
				</li>
				<li>
					<a href="#" class="menu" onclick='changePage($("#article"));'>文章</a>
				</li>
				<li>
					<a href="#" class="menu" onclick='changePage($("#website"));'>站务</a>
				</li>
			</ul>
			<!-- copyright -->
			<span id='copyright'>Design by jimages.The name of theme is tee1.</span>
		</aside>
		<article id="index" class="page">
			<h3>首页</h3>
			<section>
			<h4>浏览情况统计</h4>
			  <table>
				<tbody>
					<tr id="date">
						<td>今日</td>
						<td>昨日</td>
						<td>本周</td>
						<td>上周</td>
					</tr>
					<tr class="const">
						<td>1600</td>
						<td>1600</td>
						<td>1600</td>
						<td>1600</td>
					</tr>
					<tr class="constTitle">
						<td>PV</td>
						<td>PV</td>
						<td>PV</td>
						<td>PV</td>
					</tr>
					<tr class="const">
						<td>2500</td>
						<td>2500</td>
						<td>2500</td>
						<td>2500</td>
					</tr>
					<tr class="constTitle">
						<td>UA</td> 
						<td>UA</td> 
						<td>UA</td> 
						<td>UA</td> 
					</tr>
				</tbody>
			  </table>
			</section>
			<section>
				<h4>编写新的文章</h4>
				<form action="#" method="post" accept-charset="UTF-8" id='addArticle' >
					<input type="text" name="title" id="textTitle"/>
					<label for="textTitle" id="textTitleNotice">文章题目</label>
					<span id="selectedType" class='select'>请选择类目</span>
						<ul id='articleType' class='typeOption'>
							<li class='option'>生活见闻</li>
							<li class='option'>开发纪实</li>
							<li class='option'>乱七八糟</li>
							<li class='option'>网站历程</li>
						</ul>
					<input type="hidden" name="textType" value=""/>
					<!-- load editor -->
					<textarea id="textContent" name="textContent" ></textarea>
					<input type="submit" id="textSubmit" value="提交"/>
				</form>
			</section>
		</article>
		<article class='page' id='article' >
			<h3>文章</h3>
			<section>
				<h4>管理文章</h4>
				<table>
					<thead>
						<tr>
							<td>文章编号</td>
							<td>标题</td>
							<td>编写时间</td>
							<td>作者</td>
							<td>编辑</td>
							<td>删除</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>开站的话</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>2</td>
							<td>新的首页菜单</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>3</td>
							<td>满血复活</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>4</td>
							<td>I was here! 之 那些年，那些海峡</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>5</td>
							<td>黄梅天的烦躁心情</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>6</td>
							<td>一个人的星期天</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>7</td>
							<td>新的家，美的梦</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>8</td>
							<td>毕业季</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>9</td>
							<td>高考这件小事</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>10</td>
							<td>你好世界</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>11</td>
							<td>你最珍贵</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>12</td>
							<td>那些年，我们醉过的夜</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						
						<tr>
							<td>13</td>
							<td>网站上线，欢迎来访</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>14</td>
							<td>很好，很强大</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>15</td>
							<td>政治局常委会部署新疆维稳：严打暴力犯罪</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>16</td>
							<td>这些标题没有用，只是用来充数的</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>17</td>
							<td>朴槿惠：中国梦与韩国梦就是东北亚的梦想</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>18</td>
							<td>清华拒绝承认四川“二级运动员”高考加分</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>19</td>
							<td>北京现C1F9开头百元假币 验钞机两次识别为真</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
						<tr>
							<td>20</td>
							<td>人类首度发现星际“大门” 美探测器抵新区域</td>
							<td>2013-06-29</td>
							<td>jimages</td>
							<td><a href="#">编辑</a></td>
							<td><a href="#">删除</a></td>
						</tr>						
					</tbody>
				</table>
				<div>
				<button id='head' class='pageNumber'>第一页</button>
				<button class='pageNumber'>1</button>
				<button class='pageNumber'>2</button>
				<button class='pageNumber'>3</button>
				<button class='pageNumber'>4</button>
				<button class='pageNumber'>5</button>
				<button id='foot' class='pageNumber'>最后页</button>
				</div>
			</section>
			<section id='aticleType'>
			<h4>文章分类管理</h4>
			<p>这里的东西有待添加</p>
			</section>
		</article>
		<article class='page' id='website' >
			<h3>网站事务</h3>
			<section>
				<h4>添加友链</h4>
				<form action='http://www.yaoranqu.com/admin/add_link/' method='get' accept-charset='utf8' id='addLink'>
					<input type="text" name="name" id="linkName"/>
					<label for="linkName" id="linkNameNotice">网站名称</label>
					<input type="url" name='url' id='linkUrl'/>
					<label for='linkUrl' id='linkUrlNotice'>网站地址</label>
					<span id="linkPositionNotice" class='select'>请选择位置</span>
					<ul id='linkPosition' class='typeOption'>
						<li class='option'>上</li>
						<li class='option'>中</li>
						<li class='option'>下</li>
					</ul>
					<input type="hidden" name="position" value=""/>
					<input type='text' name='linkDescription' id='linkDescription'/>
					<label for='linkDescription' id='linkDescriptionNotice'>描述</label>
					<input type='submit' value='提&nbsp;交' />
				</form>
			</section>
		</article>
	<script type="text/javascript" src="http://resource.yaoranqu.com/js/admin/index.js"></script>
	</body>
</html>