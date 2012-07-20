<img id="BG_BLUR" class="hidden" src="" />
<div id="BG_BLUR_FAKE"></div>
<div class="base_wrap">
	<div class="header">
		<a href="/" class="logo"><img src="<?php echo base_url(); ?>assets/images/logo_white.png" alt="" />
		</a>
		<h1>
			<a href="/randy" class="text" title="Hojin Lee's Travelog"><span>Hojin
					Lee</span>'s Log at Paris, France</a>
		</h1>
	</div>
	<div class="sign">
		<a href="http://itunes.apple.com/us/app/travelog/id521918510?mt=8"
			target="_blank">Get the App</a> <a href="/a/auth">Sign In</a>
	</div>
	<div class="pic_full" id="PHOTO_ZOOM" style="display: none">
		<div class="img"></div>
	</div>
	<div class="wrap">
		<div class="wrap2">
			<div class="container">
				<!-- 썸네일 및 작성자 이름 -->
				<div class="me" style="left: 725px;">
					<h2>
						<a href="http://www.facebook.com/<?php echo $invite_data->weddingEvent->host2->host; ?>"
							style="background-image: url(<?php echo $invite_data->weddingEvent->host2->photoData; ?>);"
							target="_blank" title="<?php echo $invite_data->weddingEvent->host2->name; ?>"> <span class="tooltip"><?php echo $invite_data->weddingEvent->host2->name; ?></span>
						</a>
					</h2>
				</div>
				<div class="me">
					<h2>
						<a href="http://www.facebook.com/<?php echo $invite_data->weddingEvent->host1->host; ?>"
							style="background-image: url(<?php echo $invite_data->weddingEvent->host1->photoData; ?>);"
							target="_blank" title="<?php echo $invite_data->weddingEvent->host1->name; ?>"> <span class="tooltip"><?php echo $invite_data->weddingEvent->host1->name; ?></span>
						</a>
					</h2>
				</div>
				<!-- 좋아요 버튼 및 목록 -->
				<div class="love" id="LIKE">
					<a class="love login" href="#"><span class="tooltip"></span><span
						class="icon"></span> </a>
					<div class="likes">
						<span class="count">3</span>
						<div class="ulcon">
							<ul>
								<li class="1004"><a href="/noff" rel="Robinson&nbsp;Park"><img
										src="<?php echo $invite_data->weddingEvent->host2->photoData; ?>" />
								</a></li>
								<li class="1008"><a href="/kyokyo" rel="Lina&nbsp;Park"><img
										src="http://s3.amazonaws.com/profiles.travelog.me/2012/05/09/c2449804aa6fafed32c649b2c6c47785.jpg_small" />
								</a></li>
								<li class="1015"><a href="/sven" rel="Sven&nbsp;Jansen"><img
										src="http://s3.amazonaws.com/profiles.travelog.me/2012/05/10/779ad178690c521253db82027c3c74cd.jpg_small" />
								</a></li>
							</ul>
						</div>
					</div>
					<!-- div.likes 끝 -->
				</div>
				<div class="content">
					<div class="date"><?php echo mdate('%M %d%S, %Y, %h:%i %A', strtotime($invite_data->weddingEvent->when)); ?> <?php echo $invite_loc_data['add']; ?></div>
					<div class="box">
						<div class="img_box" id="PHOTO">
							<div class="multi_img">
								<a href="#" class="prev"></a><a href="#" class="next"></a>
								<div class="dim">
									<!-- dim -->
									<ol class="dim">
										<li class="on"></li>
										<li></li>
										<li></li>
									</ol>
								</div>
								<div class="grad"></div>
							</div>
							<!-- div.multi_img 끝 -->
							<a href="#" class="zoom"></a>
							<ol class="img">
								<li class=""><img
									src="<?php echo $invite_data->weddingEvent->coverPhotoURI; ?>"
									xsrc="http://d2scgnwnhl18tn.cloudfront.net/100002541610868%26100003722877610/cover/DD7235A7-001B-4382-B1B3-408F61283E52-43095-00034A06BB67EFF6.png"
									width="500" alt="Travelog - Hojin Lee's Log at Paris, France" />
								</li>
								<li class="hidden"><img
									src="http://d2scgnwnhl18tn.cloudfront.net/100002541610868%26100003722877610/cover/281F2575-A4CE-4BB0-958F-D6ABF9E63239-41162-00034319558DC5C2.png"
									xsrc="http://d2scgnwnhl18tn.cloudfront.net/100002541610868%26100003722877610/cover/281F2575-A4CE-4BB0-958F-D6ABF9E63239-41162-00034319558DC5C2.png"
									width="500" alt="Travelog - Hojin Lee's Log at Paris, France" />
								</li>
								<li class="hidden"><img
									src="http://d2scgnwnhl18tn.cloudfront.net/100002541610868%26100003722877610/cover/281F2575-A4CE-4BB0-958F-D6ABF9E63239-41162-00034319558DC5C2.png"
									xsrc="http://d2scgnwnhl18tn.cloudfront.net/100002541610868%26100003722877610/cover/281F2575-A4CE-4BB0-958F-D6ABF9E63239-41162-00034319558DC5C2.png"
									width="500" alt="Travelog - Hojin Lee's Log at Paris, France" />
								</li>
							</ol>
						</div>
						<!-- div.img_box 끝 -->
						<div class="txt_box">
							<p class="desc"><?php echo $invite_loc_data['add']; ?>!!</p>
						</div>
						<!-- div.txt_box 끝 -->
						<div class="map">
							<div class="pin_bg"></div>
							<div class="info">
								<img src="<?php echo base_url(); ?>assets/images/pin.png" class="pin" />
							</div>
							<div class="inset">
								<h2>
									<a class="location"
										href="http://maps.google.com/maps?z=15ll=&<?php echo $invite_loc_data['lat']; ?>,<?php echo $invite_loc_data['lon']; ?>&q=<?php echo $invite_loc_data['lat']; ?>,<?php echo $invite_loc_data['lon']; ?>"
										target="_blank" title="Paris, France"><img
										src="<?php echo base_url(); ?>assets/images/flag/s/fr.png" /> <?php echo $invite_loc_data['add']; ?></a>
								</h2>
							</div>
							<img
								src="http://maps.google.com/maps/api/staticmap?center=<?php echo $invite_loc_data['add']; ?>,<?php echo $invite_loc_data['add']; ?>&zoom=16&size=500x100&sensor=false&language=en"
								class="map" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Begin Dynamic JavaScript -->
<script type="text/javascript">
	$(document).ready(function () {
		var img = document.getElementById('BG_BLUR'); img.onload = function() { Pixastic.process(img, 'blurfast', { amount: 5 }); $('#BG_BLUR_FAKE').fadeOut(300); }; img.src = '<?php echo $invite_data->weddingEvent->coverPhotoURI; ?>';
		if (window.location.hash == '#_=_')window.location.hash = '';
		var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-25533381-1']); _gaq.push(['_setDomainName', 'travelog.me']); _gaq.push(['_trackPageview']); (function() { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();
	});
</script>
<!-- End Dynamic JavaScript -->
<div class="sns">
	<div class="facebook">
		<div id="fb-root"></div>
		<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
		<div class="fb-like" data-href="http://travelog.me/randy/log/184"
			data-send="false" data-layout="button_count" data-show-faces="false"
			data-font="arial" data-width="95"></div>
	</div>
	<div class="twitter">
		<a href="https://twitter.com/share" class="twitter-share-button"
			data-lang="en" data-url="http://travelog.me/randy/log/184">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
	<div class="pinterest">
		<a
			href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Ftravelog.me%2Frandy%2Flog%2F184&media=http%3A%2F%2Fs3.amazonaws.com%2Fphotos.travelog.me%2F2012%2F05%2F12%2F2a06c9a741daa7081f40a209b8e672e9.jpg_large"
			class="pin-it-button" count-layout="horizontal"><img border="0"
			src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /> </a>
	</div>
	<div class="googleplus">
		<g:plusone size="medium"></g:plusone>
		<script type="text/javascript"> (function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })(); </script>
	</div>
</div>
<div class="copy">
	<strong>© 2012 TRAVELOG</strong>
</div>