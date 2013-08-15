<header id='pageStart'>
	<div id='module'>
		<section id="dayDaySay">
			<h3>碎碎念</h3>
			<img alt='碎碎念' src='http://resource.yaoranqu.com/images/jimages.png' width='95' height='95' id='jimages'/>
			<?php 
				$this->load->driver('cache');
				//Load day day say.
				$this->load->model('other_model','other');
				$day_day_say = $this->other->get_day_day_say();
			?>
			<p id='content'><?php echo $day_day_say->content; ?></p>
			<span id='time'><?php echo $day_day_say->create_time; ?></span>
		</section>
		<section id='weather'>
			<h3>天气</h3>
			<div id='loader'>
				<img alt='加载中' src='http://resource.yaoranqu.com/images/common/weather_loader.gif' height='16' width='16'  id='loader'/>
			</div>
			<div id='report' style='display:none;'>
				<span id='date'></span>
				<span id='city'></span>
				<span id='temperature'></span>
				<span id='weather'></span>
			</div>
		</section>
		<nav>
			<ul>
				<li>
					<a href="http://www.yaoranqu.com/blog/" target="_self">首页</a>
				</li>
				<li>
					<a href="http://www.yaoranqu.com/blog/alist/" target="_self">归档</a>
				</li>
			</ul>
		</nav>
	</div>
</header>