<!-- <div class="trending-now clearfix">
	<?php if ( is_active_sidebar( 'footer-left' ) ) { ?>
		<div class="widget-content">
			<?php dynamic_sidebar( 'footer-left' ); ?>
		</div>
	<?php } ?>
</div> -->


<style>
	/* .widget-content {
		padding: 0 !important;
	}

	@media screen and (min-width: 1700px) {
		.pulse-wrapper {
			width: 35%;
			float: right;
		}
	}


	}*/

	.text-white {
		color: white;
	}

	.background-red {
		background: #991d24;
	}

	.homepage-only {
		display: none !important;
	}

	.page-id-225 .homepage-only {
		display: block !important;
	}
	.page-id-225 .not-home-page-only {
		display: none;
	}
</style>
<div class="stock-show-events clearfix">
	<?php if ( is_active_sidebar( 'footer-right' ) ) { ?>
		<div class="footer-widget-header homepage-only">
			<div class="footer-widget-wrapper">
				<a href="/stock-show-u/" class="logo-image"><img src="/wp-content/uploads/2018/04/stock-show-logo.png" alt="The Pulse Powered by Sullivan Supply"></a>
				<div style="width: 230px;">&nbsp;</div>
				<h1>Events</h1>
			</div>
		</div>
		<div class="background-red not-home-page-only">
			<div class="container">
				<div style="display: flex;justify-content: center;align-items: center;">
					<div style="position: relative; width: 230px; display: inline-flex; align-items: center;">
						<img style="position: absolute; left: 0; right: 0; top: -80px;" src="https://www.sullivansupply.com/wp-content/uploads/2021/02/StockShowU-edit-redbar.png">
					</div>
					<h1 class="text-white" style="margin: 0;">Events</h1>
					
					
					<?php echo do_shortcode( '[tribe_events view="list" category="stock-show-u"]' ); ?>
				</div>
			</div>
		</div>

		<div class="container" >
			<div class="widget-content">
				<?php dynamic_sidebar( 'footer-right' ); ?>
				<a href="/stock-show-u/clinic-schedule/" class="button" target="_self" style="margin: 15px 25px !important;">View All Events</a>
			</div>
			<div class="widget-content" style="">
				<a href="http://pulse.sullivansupply.com/">
					<img style="max-width: 600px !important; width: 100%;" src="/wp-content/uploads/2021/02/20-SUL-0073_CA-pulseCTA.png">
				</a>
			</div>
		</div>

	 <?php } ?> 
</div>
