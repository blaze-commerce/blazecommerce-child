<?php
/**
* Template Name: Video Series BSC
*/

get_header();
?>

<?php get_template_part( 'bsc-templates/template-parts/content', 'ssu-nav' ); ?>

<style>


.type-tribe_events {
	padding: 0px !important;
}
.footer-widgets {
	display: none;
}
.stock-show-events .footer-widget-header {
	background-color: #460202;
}
.footer-widget-header {
	background-color: #460202 !important;
	color: #fff;
	margin: 40px 0;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
}
.footer-widget-header .footer-widget-wrapper {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	max-width: 635px;
	width: 100%;
	position: relative;
	margin: 0 auto;
}
.footer-widget-header .footer-widget-wrapper .logo-image {
	display: inline-block;
	position: absolute;
	max-width: 230px;
	left: 20px;
	top: -51px;
}
.footer-widget-header h1 {
	margin: 0;
	margin-left: 50px;
}
h2 {
	margin: 0px !important;
}
.list-info {
	padding-bottom: 15px;
}
.widget-title {
	padding-bottom: 20px;
}
#tribe-events-adv-list-widget-3 {
	display: block !important;
}
.tribe-events-widget-link {
	display: none;
}
.tribe-events-title {
	font-size: 18px;
}





#video-sidebar-wrapper {
	position: relative; width:370px; height: auto;  margin-left: 25px; margin-right: 15px; margin-top: 0; display: none;
}

#video-sidebar {
	position: fixed; width: 370px; height: 500px;  overflow-y: scroll; border-radius: 5px; background-color: #ffffff; /* visibility: hidden; */ padding-bottom: 25px;
}

#video-sidebar-wrapper1 {
	position: relative; width:370px; height: auto;  margin-left: 25px; margin-right: 15px; margin-top: 0;
}

#video-sidebar1 {
	position: fixed; width: 370px; height: 500px;  overflow-y: scroll; border-radius: 5px; background-color: #ffffff; padding-bottom: 25px;
}

#video-sidebar-wrapper2 {
	position: relative; width:370px; height: auto;  margin-left: 25px; margin-right: 15px; margin-top: 0; display: none;
}

#video-sidebar2 {
	position: fixed; width: 370px; height: 500px;  overflow-y: scroll; border-radius: 5px; background-color: #ffffff; padding-bottom: 25px;
}

#video-sidebar-wrapper3 {
	position: relative; width:370px; height: auto;  margin-left: 25px; margin-right: 15px; margin-top: 0; display: none;
}

#video-sidebar3 {
	position: fixed; width: 370px; height: 500px;  overflow-y: scroll; border-radius: 5px; background-color: #ffffff; padding-bottom: 25px;
}

#video-sidebar-wrapper4 {
	position: relative; width:370px; height: auto;  margin-left: 25px; margin-right: 15px; margin-top: 0; display: none;
}

#video-sidebar4 {
	position: fixed; width: 370px; height: 500px;  overflow-y: scroll; border-radius: 5px; background-color: #ffffff; padding-bottom: 25px;
}

footer {
	position: relative;
	z-index: 999;
}
#tabs {
	width: 100%;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;

	-webkit-box-pack: justify;

	-ms-flex-pack: justify;

	justify-content: space-between;
	-webkit-box-align: end;
	-ms-flex-align: end;
	align-items: flex-end;
	-ms-flex-wrap: nowrap;
	flex-wrap: nowrap;
	background-color: white;
}

.tab {
	display: inline-block;
	width: 50%;
	text-align: center;
	padding: 3px 0;

	background-color: #A31D26;
	color: white;
	text-transform: uppercase;
	border-radius: 5px 5px 0 0;

}

.tab.active {
	background-color: #7D1B1F;


	padding: 5px 0;

}

#featured-products {
	display: none;
	padding: 15px 0;
	height: 100%;
	overflow-y: scroll;
}
#helpful-tips {
	display: none;
	padding-top: 10px;


	margin-left: 0;



	height: auto;
	overflow-y: scroll;

}
#helpful-tips li {
	padding: 10px 0;
	border-bottom: 2px solid rgba(182,172,166,.8);

}

#featured-products.active {
	display: block;
}
#helpful-tips.active {
	display: block;
}

.sb-product {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
	-ms-flex-align: center;
	align-items: center;

	padding: 15px;
	border-top: 2px solid rgba(182,172,166,.8);
}

.sb-product:nth-child(1) {
	margin-top: 15px;
}
.sb-product img {
	width: 150px !important;
	margin-right: 25px;
}
.sb-product-info h3, .sb-product-info a {


}
.sb-product-info {
	width: 150px;
}

.sb-product-info p {
	margin: 5px 0;
	overflow: hidden;
	-o-text-overflow: ellipsis;
	text-overflow: ellipsis;
	display: -webkit-box;
	-webkit-box-orient: vertical;
	-webkit-line-clamp: 5; /* number of lines to show */
}
.sb-product-info h3 {
	color: #991d24;
	/* 		margin-bottom: 15px; */
}

.video-page-wrapper, .content {
	width: 100%; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: justify; -ms-flex-pack: justify; justify-content: space-between;
}
.videos-wrapper {
	padding-right: 25px;
}

@media (max-width: 1100px) {
	.content {-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;}
	.left-sidebar {
		display: none;
	}
	.videos-wrapper {
		padding: 0 15px;
	}

	#video-sidebar-wrapper {
		position: static;
		width: 100% !important;
		padding: 0 15px;
		margin: 0 auto;

	}

	#video-sidebar-wrapper1 {
		position: static;
		width: 100% !important;
		padding: 0 15px;
		margin: 0 auto;

	}

	#video-sidebar-wrapper2 {
		position: static;
		width: 100% !important;
		padding: 0 15px;
		margin: 0 auto;

	}

	#video-sidebar-wrapper3 {
		position: static;
		width: 100% !important;
		padding: 0 15px;
		margin: 0 auto;

	}

	#video-sidebar-wrapper4 {
		position: static;
		width: 100% !important;
		padding: 0 15px;
		margin: 0 auto;

	}

	#video-sidebar {
		position: static;
		margin: 0 auto;
		width: 100% !important;
		padding: 0;
		height: auto;
		margin-left: 0px !important;
	}

	#video-sidebar1 {
		position: static;
		margin: 0 auto;
		width: 100% !important;
		padding: 0;
		height: auto;
		margin-left: 0px !important;
	}

	#video-sidebar2 {
		position: static;
		margin: 0 auto;
		width: 100% !important;
		padding: 0;
		height: auto;
		margin-left: 0px !important;
	}

	#video-sidebar3 {
		position: static;
		margin: 0 auto;
		width: 100% !important;
		padding: 0;
		height: auto;
		margin-left: 0px !important;
	}

	#video-sidebar4 {
		position: static;
		margin: 0 auto;
		width: 100% !important;
		padding: 0;
		height: auto;
		margin-left: 0px !important;
	}

	.gridContainer {
		width: 100% !important;
	}

}

@media (max-width: 1100px) {
	#eg-1-post-id-4093205 .esg-media-poster {
		background-size: contain;
		background-color: black;
		background-position: center;
	}
	#eg-1-post-id-4137216 .esg-media-poster {
		background-size: contain;
		background-color: black;
		background-position: center;
	}
	#eg-1-post-id-4175459 .esg-media-poster {
		background-size: contain;
		background-color: black;
		background-position: center;
	}
	#eg-1-post-id-4204816 .esg-media-poster {
		background-size: contain;
		background-color: black;
		background-position: center;
	}
}

@media (max-width: 1720px) {
	#video-sidebar {
		margin-left: -40px;
		width: 333px;
	}

	#video-sidebar1 {
		margin-left: -40px;
		width: 333px;
	}

	#video-sidebar2 {
		margin-left: -40px;
		width: 333px;
	}

	#video-sidebar3 {
		margin-left: -40px;
		width: 333px;
	}

	#video-sidebar4 {
		margin-left: -40px;
		width: 333px;
	}
}

#seasonOneSidebar {
	visibility: visible;
}


</style>


<?php get_template_part('bsc-templates/apply-style') ?>

<style>

nav#ssuo-nav ul {
	display: flex;
	list-style: none;
	margin: 0;
	padding: 0;
	justify-content: space-evenly;
	align-items: flex-end;
}

#ssuo-nav li {
	flex-basis: 400px;
	flex-shrink: 1;
}

#ssuo-nav li a {
	display: flex;
	flex-direction: column;
	justify-content: flex-end;
	align-items: center;
	width: 100%;
	height: 100%;
}

#ssuo-nav li div {
	width: 100%;
	text-align: center;
	color: white;
	text-transform: uppercase;
	background: #222020;
	padding: 0.3rem 0;
}

#ssuo-logo {
	transform: translateY(calc(100% - 4.25vw));
}


#ssuo-nav {
	margin-top: 5rem;
}

@media screen and (max-width: 870px) {
	#ssuo-nav {
		margin-top: 150px;
	}
}
</style>


<div id="primary" class="content-area secondary-page" style="">

	<div>
		<nav id="ssuo-nav">
			<ul style="">
				<li>
					<a href="/stock-show-u/online/">
						<img loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/cattle-icon.png">
						<div>Cattle</div>
					</a>
				</li>
				<li>
					<a href="/stock-show-u/online/sheep">
						<img loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/sheep-icon.png">
						<div>Sheep</div>
					</a>
				</li>
				<li>
					<a href="/stock-show-u/online">
						<img id="ssuo-logo" loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/SSUO_Banner.png">
						<div>&nbsp;</div>
					</a>
				</li>
				<li>
					<a href="/stock-show-u/online/hogs">
						<img loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/hog-icon.png">
						<div>Hogs</div>
					</a>
				</li>
				<li>
					<a href="/stock-show-u/online/goats">
						<img loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/goat-icon.png">
						<div>Goats</div>
					</a>
				</li>
			</ul>
		</nav>

	</div>

	<div class="container font-16px text-bold bread-crumbs">

		<a class="text-500" href="/stock-show-u">Stock Show U</a> <i class="fas fa-chevron-circle-right text-red"></i> <a href="/stock-show-u/online" class="text-500">Stock Show U Online</a>


		<div class="content">
			<div class="gridContainer" style="width: 85%; margin-right: 25px;">
				<!-- <div class="videos-wrapper" style="width: 100%"> -->
				<!-- <a href="/stock-show-u/" class="logo-image"><img src="/wp-content/uploads/2019/12/SSUO_Banner.jpg" alt="The Pulse Powered by Sullivan Supply"></a> -->
				<div style="width: 100%; margin-top: 25px;">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
				<!-- </div><!-- .entry-content -->

			</div>
			<div id="video-sidebar-wrapper">
				<div id="video-sidebar">
					<div id="tabs">
						<div id="tab-fp" class="tab active">Featured Products</div>
						<div id="tab-ht" class="tab">Helpful Tips</div>
					</div>
					<div id="featured-products">
						<div id="meta-area"></div>
						<div id="products-area"></div>
					</div>
					<ul id="helpful-tips">
					</ul>
				</div>
			</div>

			<div id="video-sidebar-wrapper1">
				<div id="video-sidebar1">
					<div id="tabs">
						<div id="tab-fp" class="tab active" style="width: 100%">Featured Products</div>
					</div>
					<div id="featured-products" class="active">
						<div id="meta-area">
							<div style="padding: 0 !important;">These products were featured in: <br><b>Season 1</b></div>
							<div id="products-area">
								<div class="sb-product"><img src="/wp-content/uploads/2018/10/SCG-100x100.jpg" />
									<div class="sb-product-info">
										<h3>Sullivan&rsquo;s Smart comb fluffer</h3>
										<a class="button" href="/product/smart-comb-w-grip">View product</a></div>
									</div>
									<div class="sb-product"><img src="/wp-content/uploads/2018/10/SENSATION-3-100x100.jpg" />
										<div class="sb-product-info">
											<h3>Sullivan&rsquo;s Smart Sensation regular</h3>
											<a class="button" href="/product/smart-sensation-brush">View product</a></div>
										</div>
										<div class="sb-product"><img src="/wp-content/uploads/2019/08/360F-100x100.jpg" />
											<div class="sb-product-info">
												<h3>Sullivan&rsquo;s 360 Fluffer</h3>
												<a class="button" href="/product/360-fluffer">View product</a></div>
											</div>
											<div class="sb-product"><img src="/wp-content/uploads/2018/10/MR-100x100.jpg" />
												<div class="sb-product-info">
													<h3>Sullivan&rsquo;s Medium rice root brush</h3>
													<a class="button" href="/product/rice-root-mix-brush-medium">View product</a></div>
												</div>
												<div class="sb-product"><img src="/wp-content/uploads/2018/10/HSCD-1-100x100.jpg" />
													<div class="sb-product-info">
														<h3>Sullivan&rsquo;s Dually shedding comb</h3>
														<a class="button" href="/product/dually-hair-shedding-comb/">View product</a></div>
													</div>



													<div class="sb-product"><img src="/wp-content/uploads/2018/10/FOA-1-100x100.jpg" />
														<div class="sb-product-info">
															<h3>Sullivan&rsquo;s Soap foamer</h3>
															<a class="button" href="/product/soap-foamer">View product</a></div>
														</div>
														<div class="sb-product"><img src="/wp-content/uploads/2019/10/VQ-100x100.jpg" />
															<div class="sb-product-info">
																<h3>Sullivan&rsquo;s Volumizer quart</h3>
																<a class="button" href="/product/vita-hair-volumizer-quart">View product</a></div>
															</div>
															<div class="sb-product"><img src="/wp-content/uploads/2018/10/NWQ-3-100x100.jpg" />
																<div class="sb-product-info">
																	<h3>Sullivan&rsquo;s Natural white</h3>
																	<a class="button" href="/product/natural-white-quart">View product</a></div>
																</div>
																<div class="sb-product"><img src="/wp-content/uploads/2018/10/SSSB-1-100x100.jpg" />
																	<div class="sb-product-info">
																		<h3>Sullivan&rsquo;s Smart scrub</h3>
																		<a class="button" href="/product/sullivans-smart-scrub-brush">View product</a></div>
																	</div>
																	<div class="sb-product"><img src="/wp-content/uploads/2019/06/SMB-T-100x100.jpg" />
																		<div class="sb-product-info">
																			<h3>Sullivan&rsquo;s Smart bucket</h3>
																			<a class="button" href="/product/smart-bucket">View product</a></div>
																		</div>



																		<div class="sb-product">
																			<img src="/wp-content/uploads/2019/10/VQ-100x100.jpg" />
																			<div class="sb-product-info">
																				<h3>
																					Sullivan&rsquo;s Volumizer quart
																				</h3>
																				<a class="button" href="/product/vita-hair-volumizer-quart">
																					View product
																				</a>
																			</div>
																		</div>
																		<div class="sb-product">
																			<img src="/wp-content/uploads/2018/10/NWQ-3-100x100.jpg" />
																			<div class="sb-product-info">
																				<h3>
																					Sullivan&rsquo;s Natural white
																				</h3>
																				<a class="button" href="/product/natural-white-quart">
																					View product
																				</a>
																			</div>
																		</div>
																		<div class="sb-product">
																			<img src="/wp-content/uploads/2018/10/REJQ-1-100x100.jpg" />
																			<div class="sb-product-info">
																				<h3>
																					Sullivan&rsquo;s Rejuvenate
																				</h3>
																				<a class="button" href="/product/rejuvenate-shampoo-quart">
																					View product
																				</a>
																			</div>
																		</div>
																		<div class="sb-product">
																			<img src="/wp-content/uploads/2019/09/HNCQ-new-100x100.jpg" />
																			<div class="sb-product-info">
																				<h3>
																					Sullivan&rsquo;s Hydrator Nourishing Conditioner
																				</h3>
																				<a class="button" href="/product/hydrator-nurishing-conditioner-32oz">
																					View product
																				</a>
																			</div>
																		</div>






																		<div class="sb-product"><img src="/wp-content/uploads/2019/09/AIII-top-100x100.jpg" />
																			<div class="sb-product-info">
																				<h3>Sullivan&rsquo;s Air Express III</h3>
																				<a class="button" href="/product/air-express-iii">View product</a></div>
																			</div>
																			<div class="sb-product"><img src="/wp-content/uploads/2018/10/CDBP-100x100.jpg" />
																				<div class="sb-product-info">
																					<h3>Sullivan&rsquo;s Complete blower package</h3>
																					<a class="button" href="/product/complete-double-blower-package/">View product</a></div>
																				</div>
																				<div class="sb-product"><img src="/wp-content/uploads/2019/09/TURBO-top-100x100.jpg" />
																					<div class="sb-product-info">
																						<h3>Sullivan&rsquo;s 24&rdquo; Turbo Fan</h3>
																						<a class="button" href="/product/24-turbo-fan">View product</a></div>
																					</div>




																					<div class="sb-product">
																						<img src="/wp-content/uploads/2018/10/KSQ-1-100x100.jpg" />
																						<div class="sb-product-info">
																							<h3>
																								Sullivan&rsquo;s Kleen Sheen Quart
																							</h3>
																							<a class="button" href="/product/kleen-sheen-quart">
																								View product
																							</a>
																						</div>
																					</div>
																					<div class="sb-product">
																						<img src="/wp-content/uploads/2018/10/MR-100x100.jpg" />
																						<div class="sb-product-info">
																							<h3>
																								Sullivan&rsquo;s Medium rice root brush
																							</h3>
																							<a class="button" href="/product/rice-root-mix-brush-medium">
																								View product
																							</a>
																						</div>
																					</div>
																					<div class="sb-product">
																						<img src="/wp-content/uploads/2018/10/SCG-100x100.jpg" />
																						<div class="sb-product-info">
																							<h3>
																								Sullivan&rsquo;s Smart comb fluffer
																							</h3>
																							<a class="button" href="/product/smart-comb-w-grip">
																								View product
																							</a>
																						</div>
																					</div>




																					<div class="sb-product"><img src="/wp-content/uploads/2018/08/TB2-1.jpg" />
																						<div class="sb-product-info">
																							<h3>Sullivan&rsquo;s Tail bag 2.0</h3>
																							<a class="button" href="/product/tail-bag-2-0">View product</a></div>
																						</div>
																						<div class="sb-product"><img src="/wp-content/uploads/2018/05/ROTO-STAG-300x206.jpg" />
																							<div class="sb-product-info">
																								<h3>Sullivan&rsquo;s Staggered Roto Brush</h3>
																								<a class="button" href="/product/roto-brush">View product</a></div>
																							</div>
																							<div class="sb-product"><img src="/wp-content/uploads/2018/05/ROTO-FLU-300x276.jpg" />
																								<div class="sb-product-info">
																									<h3>Sullivan&rsquo;s Fluffer Roto Brush</h3>
																									<a class="button" href="/product/roto-brush">View product</a></div>
																								</div>



																							</div>
																						</div>
																						<ul id="helpful-tips" class="">
																							<li>Always use plastic combs and brushes for daily care</li>
																							<li>The comb you use will depend on hair type and length</li>
																							<li>Brush, brush, brush! Stimulation leads to a healthy hair coat</li>
																							<li>Shed dead hair by using a shedding comb daily before washing/rinsing</li>
																						</ul>
																					</div>
																				</div>
																			</div>

																			<div id="video-sidebar-wrapper2">
																				<div id="video-sidebar2">
																					<div id="tabs">
																						<div id="tab-fp" class="tab active" style="width: 100%">Featured Products</div>
																					</div>
																					<div id="featured-products" class="active">
																						<div id="meta-area">
																							<div style="padding: 0 !important;">These products were featured in: <br><b>Season 2</b></div>
																							<div id="products-area">
																								<div class="sb-product"><img src="/wp-content/uploads/2018/09/A5W.jpg" />
																									<div class="sb-product-info">
																										<h3>5 Speed Andis W/Super Blocking</h3>
																										<a class="button" href="/product/5-speed-andis-w-super-blocking">View product</a></div>
																									</div>
																									<div class="sb-product"><img src="/wp-content/uploads/2018/09/AGCWI.jpg" />
																										<div class="sb-product-info">
																											<h3>AGC 2 Speed w/ Super Blocking</h3>
																											<a class="button" href="/product/agc-2-speed-w-super-blocking">View product</a></div>
																										</div>
																										<div class="sb-product"><img src="/wp-content/uploads/2019/10/APZR2FLA-new.jpg" />
																											<div class="sb-product-info">
																												<h3>Andis Pulse ZR 2 FLARE EDITION-Super Blocking</h3>
																												<a class="button" href="/product/andis-pulse-zr-2-flare-edition-super-blocking">View product</a></div>
																											</div>
																											<div class="sb-product"><img src="/wp-content/uploads/2017/09/AMBB.jpg" />
																												<div class="sb-product-info">
																													<h3>ANDIS MEDIUM BLENDING BLADE</h3>
																													<a class="button" href="/product/andis-medium-blending-blade">View product</a></div>
																												</div>
																												<div class="sb-product"><img src="/wp-content/uploads/2018/06/ASBB.jpg" />
																													<div class="sb-product-info">
																														<h3>ANDIS SUPER BLOCKING BLADE</h3>
																														<a class="button" href="/product/andis-super-blocking-blade">View product</a></div>
																													</div>
																													<div class="sb-product"><img src="/wp-content/uploads/2020/01/ASCC-1.jpg" />
																														<div class="sb-product-info">
																															<h3>ANDIS STEEL CLIP-ON COMBS</h3>
																															<a class="button" href="/product/andis-steel-clip-on-combs">View product</a></div>
																														</div>
																														<div class="sb-product"><img src="/wp-content/uploads/2018/10/AND10.jpg" />
																															<div class="sb-product-info">
																																<h3>ANDIS #10 BLADE</h3>
																																<a class="button" href="/product/andis-10-blade">View product</a></div>
																															</div>
																															<div class="sb-product"><img src="/wp-content/uploads/2018/10/CL-1.jpg" />
																																<div class="sb-product-info">
																																	<h3>EXTEND CLIPPER LUBE</h3>
																																	<a class="button" href="/product/extend-clipper-lube">View product</a></div>
																																</div>
																																<div class="sb-product"><img src="/wp-content/uploads/2019/09/CAD-top.jpg" />
																																	<div class="sb-product-info">
																																		<h3>CLIPPER CADDY</h3>
																																		<a class="button" href="/product/clipper-caddy">View product</a></div>
																																	</div>
																																	<div class="sb-product"><img src="/wp-content/uploads/2019/09/PFBC2-T-new.jpg" />
																																		<div class="sb-product-info">
																																			<h3>Pig Face Brush w/Clip NEW</h3>
																																			<a class="button" href="/product/pig-face-brush-w-clip-new">View product</a></div>
																																		</div>
																																		<div class="sb-product"><img src="/wp-content/uploads/2019/10/ABR2B.jpg" />
																																			<div class="sb-product-info">
																																				<h3>Andis Blue Ribbon 2 Blade</h3>
																																				<a class="button" href="/product/andis-blue-ribbon-2-blade">View product</a></div>
																																			</div>
																																		</div>
																																	</div>
																																	<ul id="helpful-tips" class="">
																																		<li>Always use plastic combs and brushes for daily care</li>
																																		<li>The comb you use will depend on hair type and length</li>
																																		<li>Brush, brush, brush! Stimulation leads to a healthy hair coat</li>
																																		<li>Shed dead hair by using a shedding comb daily before washing/rinsing</li>
																																	</ul>
																																</div>
																															</div>
																														</div>

																														<div id="video-sidebar-wrapper3">
																															<div id="video-sidebar3">
																																<div id="tabs">
																																	<div id="tab-fp" class="tab active" style="width: 100%">Featured Products</div>
																																</div>
																																<div id="featured-products" class="active">
																																	<div id="meta-area">
																																		<div style="padding: 0 !important;">These products were featured in: <br><b>Season 3</b></div>
																																		<div id="products-area">
																																			<div class="sb-product"><img src="/wp-content/uploads/2018/10/TSFW-2.jpg" />
																																				<div class="sb-product-info">
																																					<h3>TEFLON FLUFFER COMB W/ GRIP</h3>
																																					<a class="button" href="/product/teflon-fluffer-comb-w-grip">View product</a></div>
																																				</div>
																																				<div class="sb-product"><img src="/wp-content/uploads/2018/10/TSCW-2.jpg" />
																																					<div class="sb-product-info">
																																						<h3>TEFLON SULLIVAN COMB W/ GRIP</h3>
																																						<a class="button" href="/product/teflon-sullivan-comb-w-grip">View product</a></div>
																																					</div>
																																					<div class="sb-product"><img src="/wp-content/uploads/2018/10/COMB-1.jpg" />
																																						<div class="sb-product-info">
																																							<h3>BLUNT FLUFFER</h3>
																																							<a class="button" href="/product/sullivan-combs">View product</a></div>
																																						</div>
																																						<div class="sb-product"><img src="/wp-content/uploads/2018/10/TTFW-2.jpg" />
																																							<div class="sb-product-info">
																																								<h3>TEFLON TIGER TOOTH FLUFFER COMB</h3>
																																								<a class="button" href="/product/teflon-tiger-tooth-fluffer-comb">View product</a></div>
																																							</div>
																																							<div class="sb-product"><img src="/wp-content/uploads/2018/08/WC9W-1.jpg" />
																																								<div class="sb-product-info">
																																									<h3>9in WIZARD COMB W/ CASE</h3>
																																									<a class="button" href="/product/9-wizard-comb-w-case">View product</a></div>
																																								</div>
																																								<div class="sb-product"><img src="/wp-content/uploads/2018/10/TDBSW-2.jpg" />
																																									<div class="sb-product-info">
																																										<h3>TEFLON DOUBLESTUFF COMB W/ GRIP</h3>
																																										<a class="button" href="/product/teflon-doublestuff-comb-w-grip">View product</a></div>
																																									</div>
																																									<div class="sb-product">
																																										<img src="/wp-content/uploads/2018/10/ROTO-2.jpg" />
																																										<div class="sb-product-info">
																																											<h3>
																																												ROTO BRUSHES
																																											</h3>
																																											<a class="button" href="/product/roto-brush">
																																												View product
																																											</a>
																																										</div>
																																									</div>
																																									<div class="sb-product">
																																										<img src="/wp-content/uploads/2018/10/SSSB-1.jpg" />
																																										<div class="sb-product-info">
																																											<h3>
																																												SULLIVAN&rsquo;S SMART SCRUB BRUSH
																																											</h3>
																																											<a class="button" href="/product/sullivans-smart-scrub-brush">
																																												View product
																																											</a>
																																										</div>
																																									</div>
																																									<div class="sb-product">
																																										<img src="/wp-content/uploads/2019/09/TA-top.jpg" />
																																										<div class="sb-product-info">
																																											<h3>
																																												TAIL ADHESIVE
																																											</h3>
																																											<a class="button" href="/product/tail-adhesive-2">
																																												View product
																																											</a>
																																										</div>
																																									</div>
																																									<div class="sb-product">
																																										<img src="/wp-content/uploads/2018/10/PT-1.jpg" />
																																										<div class="sb-product-info">
																																											<h3>
																																												PRIME TIME ADHESIVE
																																											</h3>
																																											<a class="button" href="/product/prime-time-adhesive">
																																												View product
																																											</a>
																																										</div>
																																									</div>
																																									<div class="sb-product">
																																										<img src="/wp-content/uploads/2018/06/POW-W.jpg" />
																																										<div class="sb-product-info">
																																											<h3>
																																												POWDER&rsquo;FUL
																																											</h3>
																																											<a class="button" href="/product/powderful">
																																												View product
																																											</a>
																																										</div>
																																									</div>
																																									<div class="sb-product">
																																										<img src="/wp-content/uploads/2018/06/TUP-JET-1.jpg" />
																																										<div class="sb-product-info">
																																											<h3>
																																												JET BLACK
																																											</h3>
																																											<a class="button" href="/product/touch-up-paint/?attribute_color=JET-BLACK&attribute_uom=CASE">
																																												View product
																																											</a>
																																										</div>
																																									</div>
																																									<div class="sb-product">
																																										<img src="/wp-content/uploads/2018/06/TUP-BF.jpg" />
																																										<div class="sb-product-info">
																																											<h3>
																																												BLACK FINISHER
																																											</h3>
																																											<a class="button" href="/product/touch-up-paint/?attribute_color=BLACK-FINISHER&attribute_uom=CASE">
																																												View product
																																											</a>
																																										</div>
																																									</div>
																																									<div class="sb-product"><img src="/wp-content/uploads/2018/05/APZR2W-1.jpg" />
																																										<div class="sb-product-info">
																																											<h3>Andis Pulse ZR 2 w/Wide Blade</h3>
																																											<a class="button" href="/product/andis-pulse-zr-2-w-wide-blade">View product</a></div>
																																										</div>
																																										<div class="sb-product">
																																											<img src="/wp-content/uploads/2018/10/SC-1.jpg" />
																																											<div class="sb-product-info">
																																												<h3>
																																													SWEDISH CROWN TAIL COMB
																																												</h3>
																																												<a class="button" href="/product/swedish-crown-tail-comb">
																																													View product
																																												</a>
																																											</div>
																																										</div>
																																										<div class="sb-product"><img src="/wp-content/uploads/2018/10/SHOQ-2.jpg" />
																																											<div class="sb-product-info">
																																												<h3>SHOCK, QUART</h3>
																																												<a class="button" href="/product/shock-quart">View product</a></div>
																																											</div>
																																											<div class="sb-product"><img src="/wp-content/uploads/2020/01/GAME-web.jpg" />
																																												<div class="sb-product-info">
																																													<h3>Game Changer &ndash; 32oz</h3>
																																													<a class="button" href="/product/game-changer-32oz">View product</a></div>
																																												</div>
																																												<div class="sb-product"><img src="/wp-content/uploads/2019/09/FLARE-top.jpg" />
																																													<div class="sb-product-info">
																																														<h3>FLARE 5oz</h3>
																																														<a class="button" href="/product/flare-finishing-spray">View product</a></div>
																																													</div>
																																													<div class="sb-product"><img src="/wp-content/uploads/2020/03/FLARE10.jpg" />
																																														<div class="sb-product-info">
																																															<h3>FLARE 10oz Finishing Spray</h3>
																																															<a class="button" href="/product/flare-10oz-finishing-spray">View product</a></div>
																																														</div>
																																														<div class="sb-product"><img src="/wp-content/uploads/2018/10/SWAT-1.jpg" />
																																															<div class="sb-product-info">
																																																<h3>SWAT FLY SPRAY</h3>
																																																<a class="button" href="/product/swat-fly-spray">View product</a></div>
																																															</div>
																																															<div class="sb-product">
																																																<img src="/wp-content/uploads/2018/06/TUP-FAW.jpg" />
																																																<div class="sb-product-info">
																																																	<h3>
																																																		FAWN
																																																	</h3>
																																																	<a class="button" href="/product/touch-up-paint/?attribute_color=%231-FAWN&attribute_uom=CASE">
																																																		View product
																																																	</a>
																																																</div>
																																															</div>
																																															<div class="sb-product">
																																																<img src="/wp-content/uploads/2018/06/TUP-COP.jpg" />
																																																<div class="sb-product-info">
																																																	<h3>
																																																		COPPER
																																																	</h3>
																																																	<a class="button" href="/product/touch-up-paint/?attribute_color=%232-COPPER&attribute_uom=CASE">
																																																		View product
																																																	</a>
																																																</div>
																																															</div>
																																															<div class="sb-product">
																																																<img src="/wp-content/uploads/2018/06/TUP-BRI.jpg" />
																																																<div class="sb-product-info">
																																																	<h3>
																																																		BRICK
																																																	</h3>
																																																	<a class="button" href="/product/touch-up-paint/?attribute_color=%233-BRICK&attribute_uom=CASE">
																																																		View product
																																																	</a>
																																																</div>
																																															</div>
																																															<div class="sb-product">
																																																<img src="/wp-content/uploads/2018/06/TUP-VEL-1.jpg" />
																																																<div class="sb-product-info">
																																																	<h3>
																																																		RED VELVET
																																																	</h3>
																																																	<a class="button" href="/product/touch-up-paint/?attribute_color=%234-RED-VELVET&attribute_uom=CASE">
																																																		View product
																																																	</a>
																																																</div>
																																															</div>
																																															<div class="sb-product">
																																																<img src="/wp-content/uploads/2018/06/TUP-DCR.jpg" />
																																																<div class="sb-product-info">
																																																	<h3>
																																																		DARK CRIMSON
																																																	</h3>
																																																	<a class="button" href="/product/touch-up-paint/?attribute_color=%235-DARK-CRIMSON-&attribute_uom=CASE">
																																																		View product
																																																	</a>
																																																</div>
																																															</div>
																																															<div class="sb-product">
																																																<img src="/wp-content/uploads/2018/06/TUP-SF.jpg" />
																																																<div class="sb-product-info">
																																																	<h3>
																																																		SILVER FOX
																																																	</h3>
																																																	<a class="button" href="/product/touch-up-paint/?attribute_color=SILVER-FOX&attribute_uom=CASE">
																																																		View product
																																																	</a>
																																																</div>
																																															</div>
																																															<div class="sb-product">
																																																<img src="/wp-content/uploads/2018/06/TUP-BLO.jpg" />
																																																<div class="sb-product-info">
																																																	<h3>
																																																		BLONDIE
																																																	</h3>
																																																	<a class="button" href="/product/touch-up-paint/?attribute_color=BLONDIE&attribute_uom=CASE">
																																																		View product
																																																	</a>
																																																</div>
																																															</div>
																																															<div class="sb-product"><img src="/wp-content/uploads/2018/10/HP-1.jpg" />
																																																<div class="sb-product-info">
																																																	<h3>HOCUS POCUS</h3>
																																																	<a class="button" href="/product/hocus-pocus">View product</a></div>
																																																</div>
																																																<div class="sb-product"><img src="/wp-content/uploads/2018/10/HSQ-1.jpg" />
																																																	<div class="sb-product-info">
																																																		<h3>HAIR SAVIOR, QUART</h3>
																																																		<a class="button" href="/product/hair-savior-quart">View product</a></div>
																																																	</div>
																																																	<div class="sb-product"><img src="/wp-content/uploads/2018/10/TC-1.jpg" />
																																																		<div class="sb-product-info">
																																																			<h3>TAIL CLAMP</h3>
																																																			<a class="button" href="/product/tail-clamp">View product</a></div>
																																																		</div>
																																																		<div class="sb-product"><img src="/wp-content/uploads/2018/10/SCG.jpg" />
																																																			<div class="sb-product-info">
																																																				<h3>SMART COMB W/GRIP</h3>
																																																				<a class="button" href="/product/smart-comb-w-grip">View product</a></div>
																																																			</div>

																																																			<div class="sb-product"><img src="/wp-content/uploads/2018/10/FOA-1.jpg" />
																																																				<div class="sb-product-info">
																																																					<h3>SOAP FOAMER</h3>
																																																					<a class="button" href="/product/soap-foamer">View product</a></div>
																																																				</div>
																																																			</div>
																																																		</div>
																																																		<ul id="helpful-tips" class="">
																																																			<li>Always use plastic combs and brushes for daily care</li>
																																																			<li>The comb you use will depend on hair type and length</li>
																																																			<li>Brush, brush, brush! Stimulation leads to a healthy hair coat</li>
																																																			<li>Shed dead hair by using a shedding comb daily before washing/rinsing</li>
																																																		</ul>
																																																	</div>
																																																</div>
																																															</div>



																																															<div id="video-sidebar-wrapper4">
																																																<div id="video-sidebar4">
																																																	<div id="tabs">
																																																		<div id="tab-fp" class="tab active" style="width: 100%">Featured Products</div>
																																																	</div>
																																																	<div id="featured-products" class="active">
																																																		<div id="meta-area">
																																																			<div style="padding: 0 !important;">These products were featured in: <br><b>Season 4</b></div>
																																																			<div id="products-area">
																																																				<div class="sb-product"><img src="/wp-content/uploads/2018/10/EH-1.jpg" />
																																																					<div class="sb-product-info">
																																																						<h3>EXHIBITOR HARNESS</h3>
																																																						<a class="button" href="/product/exhibitor-harness">View product</a></div>
																																																					</div>
																																																					<div class="sb-product"><img src="/wp-content/uploads/2018/06/60-60-BK.jpg" />
																																																						<div class="sb-product-info">
																																																							<h3>60″ SUPERSTICK SHOW STICK</h3>
																																																							<a class="button" href="/product/60-superstick-show-stick">View product</a></div>
																																																						</div>
																																																						<div class="sb-product"><img src="/wp-content/uploads/2019/09/CF-top.jpg" />
																																																							<div class="sb-product-info">
																																																								<h3>CARBON FIBER SHOWSTICK</h3>
																																																								<a class="button" href="/product/carbon-fiber-showstick/">View product</a></div>
																																																							</div>
																																																							<div class="sb-product"><img src="/wp-content/uploads/2017/09/TOT.jpg" />
																																																								<div class="sb-product-info">
																																																									<h3>TOTAL GRIP SHOW STICK</h3>
																																																									<a class="button" href="/product/total-grip-show-stick/">View product</a></div>
																																																								</div>

																																																								<div class="sb-product"><img src="/wp-content/uploads/2019/09/FCSH-TOP.jpg" />
																																																									<div class="sb-product-info">
																																																										<h3>1ST CLASS SHOW HALTER</h3>
																																																										<a class="button" href="/product/1st-class-show-halter">View product</a></div>
																																																									</div>


																																																									<div class="sb-product"><img src="/wp-content/uploads/2018/10/CCCH-1.jpg" />
																																																										<div class="sb-product-info">
																																																											<h3>Cruise Control Cable Halter</h3>
																																																											<a class="button" href="/product/cruise-control-cable-halter">View product</a></div>
																																																										</div>


																																																										<div class="sb-product"><img src="/wp-content/uploads/2019/09/SLIP-BK-new.jpg" />
																																																											<div class="sb-product-info">
																																																												<h3>Slip Stop -Lead Attatchment</h3>
																																																												<a class="button" href="/product/slip-stop-lead-attatchment">View product</a></div>
																																																											</div>


																																																											<div class="sb-product"><img src="/wp-content/uploads/2018/10/SCG.jpg" />
																																																												<div class="sb-product-info">
																																																													<h3>SMART COMB W/GRIP</h3>
																																																													<a class="button" href="/product/smart-comb-w-grip">View product</a></div>
																																																												</div>


																																																												<div class="sb-product"><img src="/wp-content/uploads/2018/10/SWAT-1.jpg" />
																																																													<div class="sb-product-info">
																																																														<h3>SWAT FLY SPRAY</h3>
																																																														<a class="button" href="/product/swat-fly-spray">View product</a></div>
																																																													</div>
																																																												</div>
																																																											</div>
																																																											<ul id="helpful-tips" class="">
																																																												<li>Always use plastic combs and brushes for daily care</li>
																																																												<li>The comb you use will depend on hair type and length</li>
																																																												<li>Brush, brush, brush! Stimulation leads to a healthy hair coat</li>
																																																												<li>Shed dead hair by using a shedding comb daily before washing/rinsing</li>
																																																											</ul>
																																																										</div>
																																																									</div>
																																																								</div>
																																																							</div>

																																																							<!-- <?php get_template_part('bsc-templates/template-parts-online/ssuo-nav') ?> -->

																																																							<div class="container">
																																																								<!-- <div class="bsc-video-play">
																																																								<iframe title="vimeo-player" src="https://player.vimeo.com/video/389045623" width="640" height="360" frameborder="0" allowfullscreen></iframe>
																																																							</div> -->
																																																						</div>
																																																					</div><!-- #primary -->

																																																					<script src="https://code.jquery.com/jquery-3.4.1.js"></script>


																																																					<script type="text/javascript">

																																																					// The following code is responsible for the functionallity of the right sidebar.
																																																					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

																																																					window.onload = function(){

																																																						var vidSidebar = document.getElementById("video-sidebar-wrapper");
																																																						var vidSidebar1 = document.getElementById("video-sidebar-wrapper1");
																																																						var vidSidebar2 = document.getElementById("video-sidebar-wrapper2");
																																																						var vidSidebar3 = document.getElementById("video-sidebar-wrapper3");
																																																						var vidSidebar4 = document.getElementById("video-sidebar-wrapper4");
																																																						var featuredProducts = document.getElementById("featured-products");
																																																						var productsArea = document.getElementById("products-area");
																																																						var metaArea = document.getElementById("meta-area");
																																																						var helpfulTips = document.getElementById("helpful-tips");
																																																						var tabFp = document.getElementById("tab-fp");
																																																						var tabHt = document.getElementById("tab-ht");



																																																						// Toggle between "Featured Products" and "Helpful Tips" tabs

																																																						tabFp.addEventListener("click", function() {
																																																							toggleFeaturedProductsTab();
																																																						});

																																																						tabHt.addEventListener("click", function() {
																																																							toggleHelpfulTipsTab();
																																																						});


																																																						function toggleFeaturedProductsTab () {
																																																							tabHt.className = "tab"
																																																							tabFp.className = "tab active"
																																																							helpfulTips.className = "";
																																																							featuredProducts.className = "active";
																																																						}

																																																						function toggleHelpfulTipsTab () {
																																																							tabFp.className = "tab"
																																																							tabHt.className = "tab active"
																																																							featuredProducts.className = "";
																																																							helpfulTips.className = "active";
																																																						}



																																																						function getInitialSideBarData() {
																																																							vidSidebar.style.display = "block";
																																																							vidSidebar1.style.display = "none";
																																																							vidSidebar2.style.display = "none";
																																																							vidSidebar3.style.display = "none";
																																																							vidSidebar4.style.display = "none";
																																																							var products = [];
																																																							sideBarData.forEach(item => {
																																																								products.push(...item.products);
																																																							})


																																																							displayInitialSidebarData(products);

																																																							function displayInitialSidebarData (productsData ) {
																																																								var productsHtml = 	"";
																																																								productsHtml = productsData.map(function(item, index) {
																																																									return (
																																																										"<div class='sb-product'><img src='" + item.img + "'><div class='sb-product-info'><h3>" + item.name + "</h3><a class='button' href='" + item.link + "'>View product</a></div></div>"
																																																									)
																																																								}).join('')
																																																								productsArea.innerHTML = productsHtml;
																																																							}



																																																						}



																																																						// Adds click listeners to all videos. When a video is clicked, the index value of the video gets passed to getSideBarData().
																																																						var videos = document.querySelector('.mainul').getElementsByTagName("li");


																																																						for (var i = 0; i < videos.length; i++) {
																																																							(function () {
																																																								var index = i;
																																																								videos[i].addEventListener('click', event => {getSideBarData(index)})
																																																							}()); // immediate invocation
																																																						}




																																																						// Extracts the data from "sideBarData", and passes it to displaySidebarData().
																																																						function getSideBarData(index) {
																																																							if (sideBarData[index] !== null) {
																																																								vidSidebar.style.display = "block";
																																																								vidSidebar1.style.display = "none";
																																																								vidSidebar2.style.display = "none";
																																																								vidSidebar3.style.display = "none";
																																																								vidSidebar4.style.display = "none";
																																																								toggleFeaturedProductsTab();
																																																								var products = sideBarData[index].products;
																																																								var helpfulTips = sideBarData[index].helpfulTips;
																																																								var meta = sideBarData[index].meta;
																																																								displaySidebarData(products, helpfulTips, meta);

																																																							}

																																																						}





																																																						// Converts the data to html and displays it in the sidebar
																																																						function displaySidebarData (productsData, helpfulTipsData, meta) {
																																																							var productsHtml = 	"";
																																																							var metaHtml = "<div style='padding: 0 !important;'>These products were featured in:</div>";

																																																							var helpfulTipsHtml = "";

																																																							metaHtml += "Season " + meta.season + " > Episode " + meta.episode + " > " + "<strong>" + meta.title + "</strong>";


																																																							productsHtml = productsData.map(function(item, index) {
																																																								return (
																																																									"<div class='sb-product'><img src='" + item.img + "'><div class='sb-product-info'><h3>" + item.name + "</h3><a class='button' href='" + item.link + "'>View product</a></div></div>"
																																																								)
																																																							}).join('')

																																																							if (helpfulTipsData === null) {
																																																								helpfulTipsHtml = "<p>There are no tips available for this video yet.</p>"
																																																							} else {
																																																								helpfulTipsHtml = helpfulTipsData.map(function(item, index) {
																																																									return (
																																																										"<li>" + item + "</li>"
																																																									)
																																																								}).join('')
																																																							}


																																																							metaArea.innerHTML = metaHtml;
																																																							productsArea.innerHTML = productsHtml;

																																																							helpfulTips.innerHTML = helpfulTipsHtml;

																																																						}








																																																						// This is the sidebar data for all videos
																																																						var sideBarData = [

																																																							null,
																																																							{
																																																								meta: {
																																																									season: "1",
																																																									episode: "1",
																																																									title: "Daily Combs And Brushes"
																																																								},

																																																								helpfulTips: ["Always use plastic combs and brushes for daily care", "The comb you use will depend on hair type and length", "Brush, brush, brush! Stimulation leads to a healthy hair coat", "Shed dead hair by using a shedding comb daily before washing/rinsing"],


																																																								products: [
																																																									{
																																																										name: "Sullivan’s Smart comb fluffer",
																																																										desc: "The Smart Comb™ is just that ... a multi-tasking, yet the lightest weight comb on the market, with interchangeable blades that securely snap in and out of a plastic handle allowing you to pick the blade of choice.",
																																																										link: "/product/smart-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/SCG-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Smart Sensation regular",
																																																										desc: "The Smart Sensation is like no other. The advantage of the SMART SENSATION is how it amplifies the volume of the hair as it lifts it up from the hide without causing curls, kinks or matting that is often associated with rice root or massage brushes.",
																																																										link: "/product/smart-sensation-brush",
																																																										img: "/wp-content/uploads/2018/10/SENSATION-3-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s 360 Fluffer",
																																																										desc: "The 360 Fluffer Smart Brush is a daily hair care brush made to create a complete 360 degrees of hair lift. With its soft plastic bristles, this brush also massages the hide to create circulation to promote better hair growth. The 360 Smart Brush is a daily care must have.",
																																																										link: "/product/360-fluffer",
																																																										img: "/wp-content/uploads/2019/08/360F-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Medium rice root brush",
																																																										desc: "The Sullivan’s RiceRoot Mix brush has bristles that contain ½ riceroots and ½ syntheticbristles to help standup to continuous use. They have stronger bristles to belonger lasting and smooth wood handles for your comfort.",
																																																										link: "/product/rice-root-mix-brush-medium",
																																																										img: "/wp-content/uploads/2018/10/MR-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Dually shedding comb",
																																																										desc: "This double-sided hair shedding comb features rounded stainless steel teeth with extra-wide spacing on one side that gentlypenetrates deep into the thickest, 'wooly' hair coatsremoving old dead hair, yet leaving the healthy hair unharmed. Flip the comb over to the other side with narrow spaced teeth to remove dead hair from medium coats. The perfect two-step process.",
																																																										link: "/product/dually-hair-shedding-comb/",
																																																										img: "/wp-content/uploads/2018/10/HSCD-1-100x100.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "1",
																																																									episode: "2",
																																																									title: "Washrack Preparation"
																																																								},

																																																								helpfulTips: [
																																																									"Blow out calf before washing or rinsing",
																																																									"Check water pressure to determine tip to use in foamer",
																																																									"Choose a hydrating shampoo like Sullivan’s Volumizer or Natural White"
																																																								],


																																																								products: [
																																																									{
																																																										name: "Sullivan’s Soap foamer",
																																																										desc: "Heavy-duty soap foaming tool. Simply fill with shampoo, attach a water hose, and spray. Features a quick disconnect nozzle for easy rinsing. The foamer sprays a pre-set amount of foamed shampoo onto the animal.",
																																																										link: "/product/soap-foamer",
																																																										img: "/wp-content/uploads/2018/10/FOA-1-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Volumizer quart",
																																																										desc: "Vita Hair Volumizer™ Foaming Shampoo is formulated with a natural plant-based proprietary surfactant technology which creates an opposite acting polar electrical charge within each hair strand that actually pushes every hair follicle apart. This prevents the hair from sticking together, and actually springs it loose, making each hair follicle stand on end for a noticeable difference in hair volume and body.",
																																																										link: "/product/vita-hair-volumizer-quart",
																																																										img: "/wp-content/uploads/2019/10/VQ-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Natural white",
																																																										desc: "Sullivan’s Natural White is uniquely designed to enhance the skin, hair, and wool of all livestock leaving the animal with a lighter and brighter appearance. It is a dye-free whitening shampoo, infused with coconut oil that can be used daily, without purple staining. We recommend using Natural White with a Soap Foamer for the best coverage on the animal.",
																																																										link: "/product/natural-white-quart",
																																																										img: "/wp-content/uploads/2018/10/NWQ-3-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Smart scrub",
																																																										desc: "Stronger, Longer, Better. These are the words that describe the new Sullivan’s Smart Scrub Brush. Made in the USA, this brush is created from high quality material for a more durable brush. With its added length and openings on the strap, the Smart Scrub will comfortably fit any sized hand. Multi-purpose brush equipped with soft,fluffer style bristles. For all forms of hair working routines.",
																																																										link: "/product/sullivans-smart-scrub-brush",
																																																										img: "/wp-content/uploads/2018/10/SSSB-1-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Smart bucket",
																																																										desc: "Flatback, 20 quart capacity. The most uniquely designed bucket you have ever seen. 9 colors.",
																																																										link: "/product/smart-bucket",
																																																										img: "/wp-content/uploads/2019/06/SMB-T-100x100.jpg"
																																																									}

																																																								]

																																																							},

																																																							{
																																																								meta: {
																																																									season: "1",
																																																									episode: "3",
																																																									title: "Shampooing Techniques"
																																																								},

																																																								helpfulTips: [
																																																									"Start at calf’s leg to reduce shock",
																																																									"Choose a nourishing shampoo",
																																																									"Always scrub forward",
																																																									"Make sure to condition with Sullivan’s Hydrator post-washing"
																																																								],


																																																								products: [
																																																									{
																																																										name: "Sullivan’s Volumizer quart",
																																																										desc: "Vita Hair Volumizer™ Foaming Shampoo is formulated with a natural plant-based proprietary surfactant technology which creates an opposite acting polar electrical charge within each hair strand that actually pushes every hair follicle apart. This prevents the hair from sticking together, and actually springs it loose, making each hair follicle stand on end for a noticeable difference in hair volume and body.",
																																																										link: "/product/vita-hair-volumizer-quart",
																																																										img: "/wp-content/uploads/2019/10/VQ-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Natural white",
																																																										desc: "Sullivan’s Natural White is uniquely designed to enhance the skin, hair, and wool of all livestock leaving the animal with a lighter and brighter appearance. It is a dye-free whitening shampoo, infused with coconut oil that can be used daily, without purple staining. We recommend using Natural White with a Soap Foamer for the best coverage on the animal.",
																																																										link: "/product/natural-white-quart",
																																																										img: "/wp-content/uploads/2018/10/NWQ-3-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Rejuvenate",
																																																										desc: "Sullivan’s Rejuvenate Shampoo offers an olive oil, pomegranate extract, and Vita Skin package that leaves the skin on all species silky smooth. This makes the perfect non-degreasing shampoo. Rejuvenate cleans while leaving key natural oils in place to preserve the skin and hide. This shampoo is safe for everyday use without the concern for dryness and irritation. With its mild antiseptic and toning properties, Sullivan’s Rejuvenate Shampoo helps tighten pores and tone the skin. The Vita Skin package contains: Vitamin E, Vitamin B complex, and Vitamin C.",
																																																										link: "/product/rejuvenate-shampoo-quart",
																																																										img: "/wp-content/uploads/2018/10/REJQ-1-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Hydrator Nourishing Conditioner",
																																																										desc: "Scientifically formulated hydrating & nourishing conditioner that uses the hair and skins natural oil make up to formulate the best replenishment of the natural oils and vitamins back into the hair to promote hide and hair health as well has hair growth and strength.",
																																																										link: "/product/hydrator-nurishing-conditioner-32oz",
																																																										img: "/wp-content/uploads/2019/09/HNCQ-new-100x100.jpg"
																																																									}
																																																								]

																																																							},

																																																							{
																																																								meta: {
																																																									season: "1",
																																																									episode: "4",
																																																									title: "Proper Blow-Drying"
																																																								},

																																																								helpfulTips: [
																																																									"Always blow forward",
																																																									"Hold nozzle close to skin",
																																																									"Never put a calf away wet or damp",
																																																									"Blow an extra 10-15 minutes after you think the calf is dry"
																																																								],


																																																								products: [
																																																									{
																																																										name: "Sullivan’s Air Express III",
																																																										desc: "The Aerodynamic Front End increases air velocity for more air power! The funnel design on the AIR EXPRESS III has less air restriction. More efficient AIRFLOW with less RESTRICTION means MORE AIR POWER to dry your livestock FASTER!",
																																																										link: "/product/air-express-iii",
																																																										img: "/wp-content/uploads/2019/09/AIII-top-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Complete blower package",
																																																										desc: "Designed to be Problem Free! This Totally Tuned cart features an ALL Metal“Y” System that eliminates the need for short blower hoses that generatesmore Sealed Air Pressure which means more air power! Stouter steel construction for added stability. Large Air-Less wheels roll easily across rough surfaces. Equipped with convenient Comb Holders on the back of cart. Blowers and Hose sold separately. Not recommended to use a 15’ long hose.",
																																																										link: "/product/complete-double-blower-package/",
																																																										img: "/wp-content/uploads/2018/10/CDBP-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s 24” Turbo Fan",
																																																										desc: "Sullivan’s TURBO ... America’s #1 Livestock Fan! Nothing matches the Turbo for Air POWER! Documented most CFM’s of any livestock fan on the market! 1/2 HP sealed ball bearing motor features a very important component, a 10% larger internal stator and rotor ‘stack’ for more horse power than standard 1/2 HP motors. This extra ‘stack’ powers it to run faster than any other livestock fan that we know of. As an added benefit, the Turbo motor runs 11% cooler than competitors 1/2 HP motors, this allows cooler air output from the Turbo. All while only drawing 4 AMP’s of electricity, equaling a super efficient fan.",
																																																										link: "/product/24-turbo-fan",
																																																										img: "/wp-content/uploads/2019/09/TURBO-top-100x100.jpg"
																																																									}
																																																								]

																																																							},


																																																							{
																																																								meta: {
																																																									season: "1",
																																																									episode: "5",
																																																									title: "Hair Conditioning"
																																																								},

																																																								helpfulTips: [
																																																									"Always use a conditioner daily, post rinsing/washing",
																																																									"Choose a daily conditioner that won’t add additional body heat",
																																																									"Avoid human hair conditioners"
																																																								],


																																																								products: [
																																																									{
																																																										name: "Sullivan’s Kleen Sheen Quart",
																																																										desc: "Kleen Sheen is the fantastic daily hair care conditioning formula for producing healthy, well trained hair with that “Ultra” shine. Fortified with the VITA HAIR™ and moisturizers that boost hair strength to create better conditioned hair. Repels dirt to keep animals cleaner. This light sheen is perfect for daily hair care, clipping and show day groom-ing. Spray Kleen Sheen over entire body once a day, every day. Requires no washing out.",
																																																										link: "/product/kleen-sheen-quart",
																																																										img: "/wp-content/uploads/2018/10/KSQ-1-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Medium rice root brush",
																																																										desc: "The Sullivan’s RiceRoot Mix brush has bristles that contain ½ riceroots and ½ syntheticbristles to help standup to continuous use. They have stronger bristles to belonger lasting and smooth wood handles for your comfort.",
																																																										link: "/product/rice-root-mix-brush-medium",
																																																										img: "/wp-content/uploads/2018/10/MR-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Smart comb fluffer",
																																																										desc: "The Smart Comb™ is just that ... a multi-tasking, yet the lightest weight comb on the market, with interchangeable blades that securely snap in and out of a plastic handle allowing you to pick the blade of choiceThe Smart Comb™ is just that ... a multi-tasking, yet the lightest weight comb on the market, with interchangeable blades that securely snap in and out of a plastic handle allowing you to pick the blade of choice. The new comfort handle is perfect for long daysin the barn.",
																																																										link: "/product/smart-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/SCG-100x100.jpg"
																																																									}
																																																								]

																																																							},

																																																							{
																																																								meta: {
																																																									season: "1",
																																																									episode: "6",
																																																									title: "Deep Hair Conditioning"
																																																								},

																																																								helpfulTips: [
																																																									"Revive Lite – Warm temps",
																																																									"Revive – Cold temps",
																																																									"Revive is perfect post show after hair is weaken from adhesives",
																																																									"Spray Surecoat in heavy for first 10 days of use, lightly thereafter",
																																																									"SureCoat helps grow hair without sacrificing natural shine"
																																																								],


																																																								products: [
																																																									{
																																																										name: "Sullivan’s Revive",
																																																										desc: "For cattle that are kept in a cooler, apply REVIVE during the day and rinse out before letting out for the night. For a quick conditioning treatment during hot weather, apply REVIVE, comb in, blow dry deep into the hair and rinse immediately. Apply daily depending on hair dryness.",
																																																										link: "/product/revive",
																																																										img: "/wp-content/uploads/2017/09/REV-top-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Revive Lite",
																																																										desc: "When applied, this new formula lightly coats and easily penetrates the hair and absorbs into the skin without clogging the pores. Revive LITE, however, with its lighter molecular structure, can actually penetrate deep into the cortex of the hair strand to infuse essential nutrients and lipids for the utmost moisturizing and hydrating properties.Revive LITE is also fortified with the advanced VITA HAIR nourishing Vitamin package.",
																																																										link: "/product/revive-lite",
																																																										img: "/wp-content/uploads/2019/09/REVL-top-100x100.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Surecoat quart",
																																																										desc: "Sure Coat™ by Sure Coat Solutions LLC with Sullivan’s Vita Hair. Sure Coat promotes hair growth in a flake free formula that utilizes natural oils geared for feeding hair follicles. The nutrient molecules in this product are small enough to be absorbed by the hair shaft, promoting quick hair growth. Can be used daily.",
																																																										link: "/product/sure-coat-quart",
																																																										img: "/wp-content/uploads/2018/10/SSCQ-2-100x100.jpg"
																																																									}
																																																								]

																																																							},



																																																							{
																																																								meta: {
																																																									season: "1",
																																																									episode: "7",
																																																									title: "Roto-Brushing Techniques"
																																																								},

																																																								helpfulTips: [
																																																									"Always put a tail bag on before roto brushing",
																																																									"2-3 minutes per leg and area",
																																																									"Staggered - everyday use",
																																																									"Fluffer - show day"
																																																								],


																																																								products: [
																																																									{
																																																										name: "Sullivan’s Tail bag 2.0",
																																																										desc: "Added Velcro material to keep the bag secure around the tail makes the Sullivan's Tail Bag 2.0 a daily hair care must have. Use the tail bag every time you Roto Brush to protect the hair from being caught in the Roto Brush. Also works great while fitting, the bag keeps the hair out of the way until it's time to ball the tail.",
																																																										link: "/product/tail-bag-2-0",
																																																										img: "/wp-content/uploads/2018/08/TB2-1.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Staggered Roto Brush",
																																																										desc: "The everyday go to for separating and creating a lift to the hair follicles. Attach to a cordless drill.",
																																																										link: "/product/roto-brush",
																																																										img: "/wp-content/uploads/2018/05/ROTO-STAG-300x206.jpg"
																																																									},
																																																									{
																																																										name: "Sullivan’s Fluffer Roto Brush",
																																																										desc: "Perfect for show day to create the ultimate pop to the hair prior to fitting. Attach to a cordless drill.",
																																																										link: "/product/roto-brush",
																																																										img: "/wp-content/uploads/2018/05/ROTO-FLU-300x276.jpg"
																																																									}
																																																								]

																																																							},

																																																							null,

																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "1",
																																																									title: "Clippers & Blades"
																																																								},

																																																								helpfulTips: [
																																																									"Choose a clipper that is comfortable to you",
																																																									"A corded clipper is a good clipper to start out with",
																																																									"Medium blade - forgiving, good for beginners",
																																																									"Superblocking blade - show day blade, clips sharper"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "2",
																																																									title: "Evaluating Animal Composition"
																																																								},

																																																								helpfulTips: [
																																																									"Front leg structure - shoulder, knee and pastern",
																																																									"Rear leg structure - hip, hock and pastern",
																																																									"If angles are correct, motion will be foward",
																																																									"Peak - high point, clip shorter",
																																																									"Valley - low point, clip longer"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "3",
																																																									title: "Rump & Tail"
																																																								},

																																																								helpfulTips: [
																																																									"Heifers - teardrop shape",
																																																									"Steers - square shape",
																																																									"Start on the tail just above the twist (where the butt meets)"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "4",
																																																									title: "Backleg & Quarter"
																																																								},

																																																								helpfulTips: [
																																																									"Start on side of hock and clip shorter (peak)",
																																																									"Create a banana shape",
																																																									"Adjust depending on leg structure"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "5",
																																																									title: "Tailhead & Top"
																																																								},

																																																								helpfulTips: [
																																																									"Three sections: Hip-back, hip to shoulder, shoulder to poll",
																																																									"Take long, steady strokes",
																																																									"Hip, shoulder and poll (peaks)",
																																																									"Middle of back (valley)"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "6",
																																																									title: "Neck"
																																																								},

																																																								helpfulTips: [
																																																									"Long and slender (especially heifers)",
																																																									"Use a clip on guard (5/8)  for the neck"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "7",
																																																									title: "Chest & Throat"
																																																								},

																																																								helpfulTips: [
																																																									"Navel and chest floor should be same hair length to create balance"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "8",
																																																									title: "Front Leg"
																																																								},

																																																								helpfulTips: [
																																																									"Knee (peak)",
																																																									"Create banana shape by clipping knee shorter and rest of leg longer"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "9",
																																																									title: "Belly"
																																																								},

																																																								helpfulTips: [
																																																									"Navel - deepest point",
																																																									"Heifers - clip out teat area",
																																																									"Leave belly hair longer for show day",
																																																									"Trim off longer hairs on underline and side of belly"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "2",
																																																									episode: "10",
																																																									title: "Head"
																																																								},

																																																								helpfulTips: [
																																																									"Leave head for last",
																																																									"Allow extra  time for re-growth on red and white faced calves"
																																																								],


																																																								products: [
																																																									{
																																																										name: "5 Speed Andis W/Super Blocking",
																																																										desc: "",
																																																										link: "/product/5-speed-andis-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/A5W.jpg"
																																																									},
																																																									{
																																																										name: "AGC 2 Speed w/ Super Blocking",
																																																										desc: "",
																																																										link: "/product/agc-2-speed-w-super-blocking",
																																																										img: "/wp-content/uploads/2018/09/AGCWI.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 FLARE EDITION-Super Blocking",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-flare-edition-super-blocking",
																																																										img: "/wp-content/uploads/2019/10/APZR2FLA-new.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS MEDIUM BLENDING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-medium-blending-blade",
																																																										img: "/wp-content/uploads/2017/09/AMBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS SUPER BLOCKING BLADE",
																																																										desc: "",
																																																										link: "/product/andis-super-blocking-blade",
																																																										img: "/wp-content/uploads/2018/06/ASBB.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS STEEL CLIP-ON COMBS",
																																																										desc: "",
																																																										link: "/product/andis-steel-clip-on-combs",
																																																										img: "/wp-content/uploads/2020/01/ASCC-1.jpg"
																																																									},
																																																									{
																																																										name: "ANDIS #10 BLADE",
																																																										desc: "",
																																																										link: "/product/andis-10-blade",
																																																										img: "/wp-content/uploads/2018/10/AND10.jpg"
																																																									},
																																																									{
																																																										name: "EXTEND CLIPPER LUBE",
																																																										desc: "",
																																																										link: "/product/extend-clipper-lube",
																																																										img: "/wp-content/uploads/2018/10/CL-1.jpg"
																																																									},
																																																									{
																																																										name: "CLIPPER CADDY",
																																																										desc: "",
																																																										link: "/product/clipper-caddy",
																																																										img: "/wp-content/uploads/2019/09/CAD-top.jpg"
																																																									},
																																																									{
																																																										name: "Pig Face Brush w/Clip NEW",
																																																										desc: "",
																																																										link: "/product/pig-face-brush-w-clip-new",
																																																										img: "/wp-content/uploads/2019/09/PFBC2-T-new.jpg"
																																																									},
																																																									{
																																																										name: "Andis Blue Ribbon 2 Blade",
																																																										desc: "",
																																																										link: "/product/andis-blue-ribbon-2-blade",
																																																										img: "/wp-content/uploads/2019/10/ABR2B.jpg"
																																																									}
																																																								]

																																																							},

																																																							null,

																																																							{
																																																								meta: {
																																																									season: "3",
																																																									episode: "1",
																																																									title: "Metal Combs"
																																																								},

																																																								helpfulTips: [
																																																									"Always use a metal comb for fitting",
																																																									"Choose a comb that best fits your calf's hair",
																																																									"Hold the comb at 45 degree angle, pulling the hair toward you",
																																																									"Clean combs after each use with Hocus Pocus Wipes",
																																																									"Put show halter on first thing"
																																																								],


																																																								products: [
																																																									{
																																																										name: "TEFLON FLUFFER COMB W/ GRIP",
																																																										desc: "",
																																																										link: "/product/teflon-fluffer-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/TSFW-2.jpg"
																																																									},
																																																									{
																																																										name: "TEFLON SULLIVAN COMB W/ GRIP",
																																																										desc: "",
																																																										link: "/product/teflon-sullivan-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/TSCW-2.jpg"
																																																									},
																																																									{
																																																										name: "BLUNT FLUFFER",
																																																										desc: "",
																																																										link: "/product/sullivan-combs",
																																																										img: "/wp-content/uploads/2018/10/COMB-1.jpg"
																																																									},
																																																									{
																																																										name: "TEFLON TIGER TOOTH FLUFFER COMB",
																																																										desc: "",
																																																										link: "/product/teflon-tiger-tooth-fluffer-comb",
																																																										img: "/wp-content/uploads/2018/10/TTFW-2.jpg"
																																																									},
																																																									{
																																																										name: "9in WIZARD COMB W/ CASE",
																																																										desc: "",
																																																										link: "/product/9-wizard-comb-w-case",
																																																										img: "/wp-content/uploads/2018/08/WC9W-1.jpg"
																																																									},
																																																									{
																																																										name: "TEFLON DOUBLESTUFF COMB W/ GRIP",
																																																										desc: "",
																																																										link: "/product/teflon-doublestuff-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/TDBSW-2.jpg"
																																																									}

																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "3",
																																																									episode: "2",
																																																									title: "Legs"
																																																								},

																																																								helpfulTips: [
																																																									"Roto brush legs first to separate hairs",
																																																									"Less is more with adhesive, spray a little and comb a lot",
																																																									"Use an adhesive based on experience level",
																																																									"Allow dry time between each layer"
																																																								],


																																																								products: [
																																																									{
																																																										name: "ROTO BRUSHES",
																																																										desc: "",
																																																										link: "/product/roto-brush",
																																																										img: "/wp-content/uploads/2018/10/ROTO-2.jpg"
																																																									},
																																																									{
																																																										name: "SULLIVAN’S SMART SCRUB BRUSH",
																																																										desc: "",
																																																										link: "/product/sullivans-smart-scrub-brush",
																																																										img: "/wp-content/uploads/2018/10/SSSB-1.jpg"
																																																									},
																																																									{
																																																										name: "TEFLON FLUFFER COMB W/ GRIP",
																																																										desc: "",
																																																										link: "/product/teflon-fluffer-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/TSFW-2.jpg"
																																																									},
																																																									{
																																																										name: "TEFLON SULLIVAN COMB W/ GRIP",
																																																										desc: "",
																																																										link: "/product/teflon-sullivan-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/TSCW-2.jpg"
																																																									},
																																																									{
																																																										name: "TAIL ADHESIVE",
																																																										desc: "",
																																																										link: "/product/tail-adhesive-2",
																																																										img: "/wp-content/uploads/2019/09/TA-top.jpg"
																																																									},
																																																									{
																																																										name: "PRIME TIME ADHESIVE",
																																																										desc: "",
																																																										link: "/product/prime-time-adhesive",
																																																										img: "/wp-content/uploads/2018/10/PT-1.jpg"
																																																									},
																																																									{
																																																										name: "POWDER’FUL",
																																																										desc: "",
																																																										link: "/product/powderful",
																																																										img: "/wp-content/uploads/2018/06/POW-W.jpg"
																																																									},
																																																									{
																																																										name: "JET BLACK",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=JET-BLACK&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-JET-1.jpg"
																																																									},
																																																									{
																																																										name: "BLACK FINISHER",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=BLACK-FINISHER&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-BF.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "3",
																																																									episode: "3",
																																																									title: "Top & Tailhead"
																																																								},

																																																								helpfulTips: [
																																																									"Pull hair toward the center of back",
																																																									"Mimimal clipping, goes a long way",
																																																									"Analyze calf on the move to account for any adjustments",
																																																									"Create a soft curve to the tail head"
																																																								],


																																																								products: [
																																																									{
																																																										name: "TEFLON DOUBLESTUFF COMB W/ GRIP",
																																																										desc: "",
																																																										link: "/product/teflon-doublestuff-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/TDBSW-2.jpg"
																																																									},
																																																									{
																																																										name: "TAIL ADHESIVE",
																																																										desc: "",
																																																										link: "/product/tail-adhesive-2",
																																																										img: "/wp-content/uploads/2019/09/TA-top.jpg"
																																																									},
																																																									{
																																																										name: "PRIME TIME ADHESIVE",
																																																										desc: "",
																																																										link: "/product/prime-time-adhesive",
																																																										img: "/wp-content/uploads/2018/10/PT-1.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 w/Wide Blade",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-w-wide-blade",
																																																										img: "/wp-content/uploads/2018/05/APZR2W-1.jpg"
																																																									},
																																																									{
																																																										name: "POWDER’FUL",
																																																										desc: "",
																																																										link: "/product/powderful",
																																																										img: "/wp-content/uploads/2018/06/POW-W.jpg"
																																																									},
																																																									{
																																																										name: "JET BLACK",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=JET-BLACK&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-JET-1.jpg"
																																																									},
																																																									{
																																																										name: "BLACK FINISHER",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=BLACK-FINISHER&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-BF.jpg"
																																																									},
																																																									{
																																																										name: "9in WIZARD COMB W/ CASE",
																																																										desc: "",
																																																										link: "/product/9-wizard-comb-w-case",
																																																										img: "/wp-content/uploads/2018/08/WC9W-1.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "3",
																																																									episode: "4",
																																																									title: "Belly"
																																																								},

																																																								helpfulTips: [
																																																									"Gently pull belly hairs toward you, then brush back down",
																																																									"Spray a layer of white powderful over tail adhesive to hold",
																																																									"Clip off uneven hairs"
																																																								],


																																																								products: [
																																																									{
																																																										name: "TEFLON FLUFFER COMB W/ GRIP",
																																																										desc: "",
																																																										link: "/product/teflon-fluffer-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/TSFW-2.jpg"
																																																									},
																																																									{
																																																										name: "9in WIZARD COMB W/ CASE",
																																																										desc: "",
																																																										link: "/product/9-wizard-comb-w-case",
																																																										img: "/wp-content/uploads/2018/08/WC9W-1.jpg"
																																																									},
																																																									{
																																																										name: "TAIL ADHESIVE",
																																																										desc: "",
																																																										link: "/product/tail-adhesive-2",
																																																										img: "/wp-content/uploads/2019/09/TA-top.jpg"
																																																									},
																																																									{
																																																										name: "PRIME TIME ADHESIVE",
																																																										desc: "",
																																																										link: "/product/prime-time-adhesive",
																																																										img: "/wp-content/uploads/2018/10/PT-1.jpg"
																																																									},
																																																									{
																																																										name: "POWDER’FUL",
																																																										desc: "",
																																																										link: "/product/powderful",
																																																										img: "/wp-content/uploads/2018/06/POW-W.jpg"
																																																									},
																																																									{
																																																										name: "Andis Pulse ZR 2 w/Wide Blade",
																																																										desc: "",
																																																										link: "/product/andis-pulse-zr-2-w-wide-blade",
																																																										img: "/wp-content/uploads/2018/05/APZR2W-1.jpg"
																																																									},
																																																									{
																																																										name: "JET BLACK",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=JET-BLACK&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-JET-1.jpg"
																																																									},
																																																									{
																																																										name: "BLACK FINISHER",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=BLACK-FINISHER&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-BF.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "3",
																																																									episode: "5",
																																																									title: "Tail Switch"
																																																								},

																																																								helpfulTips: [
																																																									"The tail ball should fall in line with chest floor",
																																																									"Separate tail into two layers and tease under layer",
																																																									"Use lots of adhesive to hold"
																																																								],


																																																								products: [
																																																									{
																																																										name: "TAIL BAG 2.0",
																																																										desc: "",
																																																										link: "/product/tail-bag-2-0",
																																																										img: "/wp-content/uploads/2018/02/TB2-2.jpg"
																																																									},
																																																									{
																																																										name: "TEFLON FLUFFER COMB W/ GRIP",
																																																										desc: "",
																																																										link: "/product/teflon-fluffer-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/TSFW-2.jpg"
																																																									},
																																																									{
																																																										name: "SULLIVAN’S SMART SCRUB BRUSH",
																																																										desc: "",
																																																										link: "/product/sullivans-smart-scrub-brush",
																																																										img: "/wp-content/uploads/2018/10/SSSB-1.jpg"
																																																									},
																																																									{
																																																										name: "SWEDISH CROWN TAIL COMB",
																																																										desc: "",
																																																										link: "/product/swedish-crown-tail-comb",
																																																										img: "/wp-content/uploads/2018/10/SC-1.jpg"
																																																									},
																																																									{
																																																										name: "TAIL ADHESIVE",
																																																										desc: "",
																																																										link: "/product/tail-adhesive-2",
																																																										img: "/wp-content/uploads/2019/09/TA-top.jpg"
																																																									},
																																																									{
																																																										name: "JET BLACK",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=JET-BLACK&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-JET-1.jpg"
																																																									},
																																																									{
																																																										name: "BLACK FINISHER",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=BLACK-FINISHER&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-BF.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "3",
																																																									episode: "6",
																																																									title: "Body"
																																																								},

																																																								helpfulTips: [
																																																									"Allow 10-15 minutes to work hair before heading to the ring",
																																																									"Use Game Changer for ultimate hold",
																																																									"Use flare as final touch",
																																																									"Don't forget fly spray - swat!"
																																																								],


																																																								products: [
																																																									{
																																																										name: "SHOCK, QUART",
																																																										desc: "",
																																																										link: "/product/shock-quart",
																																																										img: "/wp-content/uploads/2018/10/SHOQ-2.jpg"
																																																									},
																																																									{
																																																										name: "Game Changer – 32oz",
																																																										desc: "",
																																																										link: "/product/game-changer-32oz",
																																																										img: "/wp-content/uploads/2020/01/GAME-web.jpg"
																																																									},
																																																									{
																																																										name: "FLARE 5oz",
																																																										desc: "",
																																																										link: "/product/flare-finishing-spray",
																																																										img: "/wp-content/uploads/2019/09/FLARE-top.jpg"
																																																									},
																																																									{
																																																										name: "FLARE 10oz Finishing Spray",
																																																										desc: "",
																																																										link: "/product/flare-10oz-finishing-spray",
																																																										img: "/wp-content/uploads/2020/03/FLARE10.jpg"
																																																									},
																																																									{
																																																										name: "SWAT FLY SPRAY",
																																																										desc: "",
																																																										link: "/product/swat-fly-spray",
																																																										img: "/wp-content/uploads/2018/10/SWAT-1.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "3",
																																																									episode: "7",
																																																									title: "Color Matching"
																																																								},

																																																								helpfulTips: [
																																																									"Start light and go darker",
																																																									"Practice colors at home",
																																																									"Often times, you will have to mix colors to create the perfect match"
																																																								],


																																																								products: [
																																																									{
																																																										name: "FAWN",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=%231-FAWN&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-FAW.jpg"
																																																									},
																																																									{
																																																										name: "COPPER",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=%232-COPPER&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-COP.jpg"
																																																									},
																																																									{
																																																										name: "BRICK",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=%233-BRICK&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-BRI.jpg"
																																																									},
																																																									{
																																																										name: "RED VELVET",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=%234-RED-VELVET&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-VEL-1.jpg"
																																																									},
																																																									{
																																																										name: "DARK CRIMSON",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=%235-DARK-CRIMSON-&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-DCR.jpg"
																																																									},
																																																									{
																																																										name: "SILVER FOX",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=SILVER-FOX&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-SF.jpg"
																																																									},
																																																									{
																																																										name: "BLONDIE",
																																																										desc: "",
																																																										link: "/product/touch-up-paint/?attribute_color=BLONDIE&attribute_uom=CASE",
																																																										img: "/wp-content/uploads/2018/06/TUP-BLO.jpg"
																																																									},
																																																									{
																																																										name: "TAIL ADHESIVE",
																																																										desc: "",
																																																										link: "/product/tail-adhesive-2",
																																																										img: "/wp-content/uploads/2019/09/TA-top.jpg"
																																																									},
																																																									{
																																																										name: "POWDER’FUL",
																																																										desc: "",
																																																										link: "/product/powderful",
																																																										img: "/wp-content/uploads/2018/06/POW-W.jpg"
																																																									}

																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "3",
																																																									episode: "8",
																																																									title: "Breakdown"
																																																								},

																																																								helpfulTips: [
																																																									"Never skip breakdown",
																																																									"Breakdown tail last",
																																																									"You should be able to comb through all areas if properly broken down",
																																																									"Condition post washing and drying to prevent dry skin"
																																																								],


																																																								products: [
																																																									{
																																																										name: "HOCUS POCUS",
																																																										desc: "",
																																																										link: "/product/hocus-pocus",
																																																										img: "/wp-content/uploads/2018/10/HP-1.jpg"
																																																									},
																																																									{
																																																										name: "HAIR SAVIOR, QUART",
																																																										desc: "",
																																																										link: "/product/hair-savior-quart",
																																																										img: "/wp-content/uploads/2018/10/HSQ-1.jpg"
																																																									},
																																																									{
																																																										name: "TAIL CLAMP",
																																																										desc: "",
																																																										link: "/product/tail-clamp",
																																																										img: "/wp-content/uploads/2018/10/TC-1.jpg"
																																																									},
																																																									{
																																																										name: "SMART COMB W/GRIP",
																																																										desc: "",
																																																										link: "/product/smart-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/SCG.jpg"
																																																									},
																																																									{
																																																										name: "SULLIVAN’S SMART SCRUB BRUSH",
																																																										desc: "",
																																																										link: "/product/sullivans-smart-scrub-brush",
																																																										img: "/wp-content/uploads/2018/10/SSSB-1.jpg"
																																																									},
																																																									{
																																																										name: "SOAP FOAMER",
																																																										desc: "",
																																																										link: "/product/soap-foamer",
																																																										img: "/wp-content/uploads/2018/10/FOA-1.jpg"
																																																									},
																																																									{
																																																										name: "REVIVE LITE",
																																																										desc: "",
																																																										link: "/product/revive-lite",
																																																										img: "/wp-content/uploads/2019/09/REVL-top.jpg"
																																																									}
																																																								]

																																																							},

																																																							null,

																																																							{
																																																								meta: {
																																																									season: "4",
																																																									episode: "1",
																																																									title: "Show Ring Style"
																																																								},

																																																								helpfulTips: [
																																																									"Look professional - long sleeves are recommended",
																																																									"Choose footwear that protects feet",
																																																									"Limit bling to one item"
																																																								],


																																																								products: [
																																																									{
																																																										name: "EXHIBITOR HARNESS",
																																																										desc: "",
																																																										link: "/product/exhibitor-harness",
																																																										img: "/wp-content/uploads/2018/10/EH-1.jpg"
																																																									},
																																																									{
																																																										name: "60″ SUPERSTICK SHOW STICK",
																																																										desc: "",
																																																										link: "/product/60-superstick-show-stick",
																																																										img: "/wp-content/uploads/2018/06/60-60-BK.jpg"
																																																									},
																																																									{
																																																										name: "CARBON FIBER SHOWSTICK",
																																																										desc: "",
																																																										link: "/product/carbon-fiber-showstick",
																																																										img: "/wp-content/uploads/2019/09/CF-top.jpg"
																																																									},
																																																									{
																																																										name: "TOTAL GRIP SHOW STICK",
																																																										desc: "",
																																																										link: "/product/total-grip-show-stick",
																																																										img: "/wp-content/uploads/2017/09/TOT.jpg"
																																																									},
																																																									{
																																																										name: "1ST CLASS SHOW HALTER",
																																																										desc: "",
																																																										link: "/product/1st-class-show-halter",
																																																										img: "/wp-content/uploads/2019/09/FCSH-TOP.jpg"
																																																									},
																																																									{
																																																										name: "Cruise Control Cable Halter",
																																																										desc: "",
																																																										link: "/product/cruise-control-cable-halter",
																																																										img: "/wp-content/uploads/2018/10/CCCH-1.jpg"
																																																									},
																																																									{
																																																										name: "Slip Stop -Lead Attatchment",
																																																										desc: "",
																																																										link: "/product/slip-stop-lead-attatchment",
																																																										img: "/wp-content/uploads/2019/09/SLIP-BK-new.jpg"
																																																									},
																																																									{
																																																										name: "SMART COMB W/GRIP",
																																																										desc: "",
																																																										link: "/product/smart-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/SCG.jpg"
																																																									},
																																																									{
																																																										name: "SWAT FLY SPRAY",
																																																										desc: "",
																																																										link: "/product/swat-fly-spray",
																																																										img: "/wp-content/uploads/2018/10/SWAT-1.jpg"
																																																									}

																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "4",
																																																									episode: "2",
																																																									title: "Equipment"
																																																								},

																																																								helpfulTips: [
																																																									"Leather show halter for showmanship always",
																																																									"Choose a halter that best suites the calf",
																																																									"Pick a showstick color that blends in",
																																																									"Size showstick to showman and calf"
																																																								],


																																																								products: [
																																																									{
																																																										name: "EXHIBITOR HARNESS",
																																																										desc: "",
																																																										link: "/product/exhibitor-harness",
																																																										img: "/wp-content/uploads/2018/10/EH-1.jpg"
																																																									},
																																																									{
																																																										name: "60″ SUPERSTICK SHOW STICK",
																																																										desc: "",
																																																										link: "/product/60-superstick-show-stick",
																																																										img: "/wp-content/uploads/2018/06/60-60-BK.jpg"
																																																									},
																																																									{
																																																										name: "CARBON FIBER SHOWSTICK",
																																																										desc: "",
																																																										link: "/product/carbon-fiber-showstick",
																																																										img: "/wp-content/uploads/2019/09/CF-top.jpg"
																																																									},
																																																									{
																																																										name: "TOTAL GRIP SHOW STICK",
																																																										desc: "",
																																																										link: "/product/total-grip-show-stick",
																																																										img: "/wp-content/uploads/2017/09/TOT.jpg"
																																																									},
																																																									{
																																																										name: "1ST CLASS SHOW HALTER",
																																																										desc: "",
																																																										link: "/product/1st-class-show-halter",
																																																										img: "/wp-content/uploads/2019/09/FCSH-TOP.jpg"
																																																									},
																																																									{
																																																										name: "Cruise Control Cable Halter",
																																																										desc: "",
																																																										link: "/product/cruise-control-cable-halter",
																																																										img: "/wp-content/uploads/2018/10/CCCH-1.jpg"
																																																									},
																																																									{
																																																										name: "Slip Stop -Lead Attatchment",
																																																										desc: "",
																																																										link: "/product/slip-stop-lead-attatchment",
																																																										img: "/wp-content/uploads/2019/09/SLIP-BK-new.jpg"
																																																									},
																																																									{
																																																										name: "SMART COMB W/GRIP",
																																																										desc: "",
																																																										link: "/product/smart-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/SCG.jpg"
																																																									},
																																																									{
																																																										name: "SWAT FLY SPRAY",
																																																										desc: "",
																																																										link: "/product/swat-fly-spray",
																																																										img: "/wp-content/uploads/2018/10/SWAT-1.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "4",
																																																									episode: "3",
																																																									title: "Setting Your Animal Up"
																																																								},

																																																								helpfulTips: [
																																																									"Offset front feet",
																																																									"Stagger showside backfoot",
																																																									"Practice walking into place",
																																																									"Change pressure on halter depending on if you're stopping or going"
																																																								],


																																																								products: [
																																																									{
																																																										name: "EXHIBITOR HARNESS",
																																																										desc: "",
																																																										link: "/product/exhibitor-harness",
																																																										img: "/wp-content/uploads/2018/10/EH-1.jpg"
																																																									},
																																																									{
																																																										name: "60″ SUPERSTICK SHOW STICK",
																																																										desc: "",
																																																										link: "/product/60-superstick-show-stick",
																																																										img: "/wp-content/uploads/2018/06/60-60-BK.jpg"
																																																									},
																																																									{
																																																										name: "CARBON FIBER SHOWSTICK",
																																																										desc: "",
																																																										link: "/product/carbon-fiber-showstick",
																																																										img: "/wp-content/uploads/2019/09/CF-top.jpg"
																																																									},
																																																									{
																																																										name: "TOTAL GRIP SHOW STICK",
																																																										desc: "",
																																																										link: "/product/total-grip-show-stick",
																																																										img: "/wp-content/uploads/2017/09/TOT.jpg"
																																																									},
																																																									{
																																																										name: "1ST CLASS SHOW HALTER",
																																																										desc: "",
																																																										link: "/product/1st-class-show-halter",
																																																										img: "/wp-content/uploads/2019/09/FCSH-TOP.jpg"
																																																									},
																																																									{
																																																										name: "Cruise Control Cable Halter",
																																																										desc: "",
																																																										link: "/product/cruise-control-cable-halter",
																																																										img: "/wp-content/uploads/2018/10/CCCH-1.jpg"
																																																									},
																																																									{
																																																										name: "Slip Stop -Lead Attatchment",
																																																										desc: "",
																																																										link: "/product/slip-stop-lead-attatchment",
																																																										img: "/wp-content/uploads/2019/09/SLIP-BK-new.jpg"
																																																									},
																																																									{
																																																										name: "SMART COMB W/GRIP",
																																																										desc: "",
																																																										link: "/product/smart-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/SCG.jpg"
																																																									},
																																																									{
																																																										name: "SWAT FLY SPRAY",
																																																										desc: "",
																																																										link: "/product/swat-fly-spray",
																																																										img: "/wp-content/uploads/2018/10/SWAT-1.jpg"
																																																									}
																																																								]

																																																							},
																																																							{
																																																								meta: {
																																																									season: "4",
																																																									episode: "4",
																																																									title: "Ring Patterns"
																																																								},

																																																								helpfulTips: [
																																																									"Watch prior classes to determine ring pattern",
																																																									"Keep proper spacing",
																																																									"Use the whole ring",
																																																									"Make big circles"
																																																								],


																																																								products: [
																																																									{
																																																										name: "EXHIBITOR HARNESS",
																																																										desc: "",
																																																										link: "/product/exhibitor-harness",
																																																										img: "/wp-content/uploads/2018/10/EH-1.jpg"
																																																									},
																																																									{
																																																										name: "60″ SUPERSTICK SHOW STICK",
																																																										desc: "",
																																																										link: "/product/60-superstick-show-stick",
																																																										img: "/wp-content/uploads/2018/06/60-60-BK.jpg"
																																																									},
																																																									{
																																																										name: "CARBON FIBER SHOWSTICK",
																																																										desc: "",
																																																										link: "/product/carbon-fiber-showstick",
																																																										img: "/wp-content/uploads/2019/09/CF-top.jpg"
																																																									},
																																																									{
																																																										name: "TOTAL GRIP SHOW STICK",
																																																										desc: "",
																																																										link: "/product/total-grip-show-stick",
																																																										img: "/wp-content/uploads/2017/09/TOT.jpg"
																																																									},
																																																									{
																																																										name: "1ST CLASS SHOW HALTER",
																																																										desc: "",
																																																										link: "/product/1st-class-show-halter",
																																																										img: "/wp-content/uploads/2019/09/FCSH-TOP.jpg"
																																																									},
																																																									{
																																																										name: "Cruise Control Cable Halter",
																																																										desc: "",
																																																										link: "/product/cruise-control-cable-halter",
																																																										img: "/wp-content/uploads/2018/10/CCCH-1.jpg"
																																																									},
																																																									{
																																																										name: "Slip Stop -Lead Attatchment",
																																																										desc: "",
																																																										link: "/product/slip-stop-lead-attatchment",
																																																										img: "/wp-content/uploads/2019/09/SLIP-BK-new.jpg"
																																																									},
																																																									{
																																																										name: "SMART COMB W/GRIP",
																																																										desc: "",
																																																										link: "/product/smart-comb-w-grip",
																																																										img: "/wp-content/uploads/2018/10/SCG.jpg"
																																																									},
																																																									{
																																																										name: "SWAT FLY SPRAY",
																																																										desc: "",
																																																										link: "/product/swat-fly-spray",
																																																										img: "/wp-content/uploads/2018/10/SWAT-1.jpg"
																																																									}
																																																								]

																																																							},


																																																						]


																																																					}
																																																					</script>

																																																					<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

																																																					<script>
																																																					$( document ).ready(function() {
																																																						$( ".esg-filter-wrapper.esg-fgc-1 div:nth-child(6)" ).click(function() {
																																																							$("#video-sidebar-wrapper1").css("display", "none");
																																																							$("#video-sidebar-wrapper").css("display", "none");
																																																							$("#video-sidebar-wrapper3").css("display", "none");
																																																							$("#video-sidebar-wrapper2").css("display", "none");
																																																							$("#video-sidebar-wrapper4").css("display", "block");
																																																						});
																																																					});

																																																					$( document ).ready(function() {
																																																						$( ".esg-filter-wrapper.esg-fgc-1 div:nth-child(5)" ).click(function() {
																																																							$("#video-sidebar-wrapper1").css("display", "none");
																																																							$("#video-sidebar-wrapper").css("display", "none");
																																																							$("#video-sidebar-wrapper3").css("display", "block");
																																																							$("#video-sidebar-wrapper2").css("display", "none");
																																																							$("#video-sidebar-wrapper4").css("display", "none");
																																																						});
																																																					});
																																																					</script>

																																																					<script>
																																																					$( document ).ready(function() {
																																																						$( ".esg-filter-wrapper.esg-fgc-1 div:nth-child(4)" ).click(function() {
																																																							$("#video-sidebar-wrapper1").css("display", "none");
																																																							$("#video-sidebar-wrapper").css("display", "none");
																																																							$("#video-sidebar-wrapper3").css("display", "none");
																																																							$("#video-sidebar-wrapper4").css("display", "none");
																																																							$("#video-sidebar-wrapper2").css("display", "block");
																																																						});
																																																					});
																																																					</script>

																																																					<script>
																																																					$( document ).ready(function() {
																																																						$( ".esg-filter-wrapper.esg-fgc-1 div:nth-child(3)" ).click(function() {
																																																							$("#video-sidebar-wrapper1").css("display", "block");
																																																							$("#video-sidebar-wrapper").css("display", "none");
																																																							$("#video-sidebar-wrapper2").css("display", "none");
																																																							$("#video-sidebar-wrapper3").css("display", "none");
																																																							$("#video-sidebar-wrapper4").css("display", "none");
																																																						});
																																																					});
																																																					</script>


																																																					<?php
																																																					get_footer();
