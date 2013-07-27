<div id="ad">
	<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- google ad bnnaer -->
	<ins class="adsbygoogle"
		style="display:block;width:728px;height:90px;margin:auto;"
		data-ad-client="ca-pub-5495447425243679"
		data-ad-slot="6878046749"></ins>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>
<footer>
	<section id='link'>
		<h4>朋友</h4>
		<img id='linkLeft' class='linkButton' alt='向左移动' src='http://resource.yaoranqu.com/images/footer/left.png' height='40' width='40' />
		<div id='linkContent'>
			<ul id='linkContainer'>
			<?php 
				//Load model.
				$this->load->model('other_model','other');
				$data = $this->other->get_links();
				foreach($data as $link): ?>
				<li class='linkItem <?php switch($link->type):
					case '1': 
						echo 'top';
						break;
					case '2':
						echo 'middle';
						break;
					case '3':
						echo 'bottom';
						break;
					default:
						break;
					endswitch;
					?>'>
					<ul>
						<li><a href="<?php echo $link->url; ?>"><?php echo $link->name; ?></a></li>
						<li><?php echo $link->description; ?></li>
					</ul>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<img id='linkRight' class='linkButton' alt='向右移动' src='http://resource.yaoranqu.com/images/footer/right.png' height='40' width='40' />
	</section>
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
				<a href="http://www.yaoranqu.com" target="_blank" > 
					<img src="http://resource.yaoranqu.com/images/logo_31x31.png" alt="窅然去" />
				</a>
			</li>
			<li>
				<span>Copyright ©2013 Yaoranqu</span>
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
<script type="text/javascript" src="http://resource.yaoranqu.com/js/footer.js"></script>
<script type='text/javascript' src='http://resource.yaoranqu.com/js/blog/common.js'></script>