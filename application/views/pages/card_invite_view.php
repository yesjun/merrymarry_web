<img id="BG_BLUR" class="hidden" src="" />
<div id="BG_BLUR_FAKE"></div>
<div class="base_wrap">
	<div class="pic_full" id="PHOTO_ZOOM" style="display: none">
		<div class="img"></div>
	</div>
	<div class="wrap">
		<div class="wrap2">
			<div class="container">
				<div class="content">
					<div class="top_link">
						<img src="<?php echo base_url(); ?>assets/images/top_link/card_toplink_bg.png" class="link_bg" />
						<p><a href="" class="apple_bu"><img src="<?php echo base_url(); ?>assets/images/top_link/apple_bu.png" width="224" /></a></p>
						<p><a href="" class="play_bu"><img src="<?php echo base_url(); ?>assets/images/top_link/play_bu.png" width="224" /></a></p>
					</div>
					<div class="profile">
						<img src="<?php echo base_url(); ?>assets/images/profile/profile_bg.png" class="profile_bg" />
						<div class="host1">
							<h2>
								<a href="http://www.facebook.com/<?php echo $invite_data->weddingEvent->host1->host; ?>"
									style="background-image: url(<?php echo $invite_data->weddingEvent->host1->photoData; ?>);"
									target="_blank" title="<?php echo $invite_data->weddingEvent->host1->name; ?>"> 
								</a>
								<span class="tooltip"><?php echo $invite_data->weddingEvent->host1->name; ?></span>
							</h2>
						</div>
						<div class="host2">
							<h2>
								<a href="http://www.facebook.com/<?php echo $invite_data->weddingEvent->host2->host; ?>"
									style="background-image: url(<?php echo $invite_data->weddingEvent->host2->photoData; ?>);"
									target="mm_facebook" title="<?php echo $invite_data->weddingEvent->host2->name; ?>"> 
								</a>
								<span class="tooltip"><?php echo $invite_data->weddingEvent->host2->name; ?></span>
							</h2>
						</div>
					</div>
					<div class="box">
						<div class="img_box" id="PHOTO">
							<!-- div class="multi_img" -->
								<!-- a href="#" class="prev"></a><a href="#" class="next"></a -->
								<!-- div class="dim">
									<!-- dim -- >
									<ol class="dim">
										<li class="on"></li>
										<li></li>
										<li></li>
									</ol>
								</div -->
								<!-- div class="grad"></div -->
							<!-- /div -->
							<!-- div.multi_img 끝 -->
							<!-- a href="#" class="zoom"></a -->
							<ol class="img">
								<li><img
									src="<?php echo $invite_data->weddingEvent->coverPhotoURI; ?>"
									xsrc="<?php echo $invite_data->weddingEvent->coverPhotoURI; ?>"
									width="560" alt="Travelog - Hojin Lee's Log at Paris, France" />
								</li>
							</ol>
						</div>
						<!-- div.img_box 끝 -->
						<div class="txt_box_bg"><img src="<?php echo base_url(); ?>assets/images/card_photo/card_photo_bg_02.png" width="560" /></div>
						<div class="txt_box">
							<p class="desc"><?php echo mdate('%M %d%S, %Y, %h:%i %A', strtotime($invite_data->weddingEvent->when)); ?></p>
						</div>
						<!-- div.txt_box 끝 -->
					</div>
					<div class="rsvp">
						<img src="<?php echo base_url(); ?>assets/images/rsvp/rsvp_bg.png" />
						<p><a href="" class="yes_bu"><img src="<?php echo base_url(); ?>assets/images/rsvp/yes_bu.png" /></a></p>
						<p><a href="" class="no_bu"><img src="<?php echo base_url(); ?>assets/images/rsvp/no_bu.png" /></a></p>
					</div>
					<!-- map -->
					<div class="map_box">
						<div class="pin_bg"></div>
						<div class="info">
							<img src="<?php echo base_url(); ?>assets/images/map/map_bg.png" class="pin" />
						</div>
						<div class="inset">
							<h2>
								<a class="location"
									href="http://maps.google.com/maps?z=15ll=&<?php echo $invite_loc_data['lat']; ?>,<?php echo $invite_loc_data['lon']; ?>&q=<?php echo $invite_loc_data['lat']; ?>,<?php echo $invite_loc_data['lon']; ?>"
									target="_blank" title="<?php echo $invite_loc_data['add']; ?>"><?php echo $invite_loc_data['add']; ?></a>
							</h2>
						</div>
						<img
							src="http://maps.google.com/maps/api/staticmap?center=<?php echo $invite_loc_data['lat']; ?>,<?php echo $invite_loc_data['lon']; ?>&zoom=16&size=560x233&sensor=false&language=en"
							class="map" />
					</div>
					<!-- /map -->
					<div class="gift_box">
						<img src="<?php echo base_url(); ?>assets/images/gift/gift_bg.png" class="gift_box_bg" />
						<?php for($gift_count = 0; $gift_count < count($gift_data); $gift_count++): $gift = $gift_data[$gift_count]; ?>
							<div style="left: <?php echo $gift_count*190 + 36; ?>px;"><a href="<?php echo $gift->storeURL; ?>" class="gift_item" target="mm_store"><img src="<?php echo $gift->photoURI; ?>" /></a><div><?php echo $gift->title; ?></div></div>
						<?php endfor; ?>
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