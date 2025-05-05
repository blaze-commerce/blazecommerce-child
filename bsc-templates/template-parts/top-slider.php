<!-- <link rel="stylesheet" type="text/css" href="/wp-content/themes/sul-theme/slick/slick-theme.css"/> -->

<style>
.slick-prev {
	left: 2rem;
}
.slick-next {
	right: 2rem;
}

.arrow-btn-wrapper {
	position: absolute;
	z-index: 2;
	top: 0;
	bottom: 0;
	display: inline-flex;
}

.arrow-btn-wrapper button {
	margin: auto;
	background: transparent;
	border: none;
	font-size: 1.5rem;
}

.btn-prev {
	left: 3rem;
}

.btn-next {
	right: 3rem;
}

@media screen and (max-width: 1000px) {
	.p-sm-relative {
		position: relative !important;
	}
}

</style>

<div class="pos-relative" style="margin-top: 6rem;">
	<div class="your-class ">
		<div>
			<!-- <img src="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-6.png"> -->
			<picture>
				<source media="(max-width:500px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-mobile-1.png">
		  		<source media="(max-width:900px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-mobile-5.png">
		  		<source media="(min-width:901px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-6.png">
		  		<img>
			</picture>
		</div>
		<div>
			<!-- <img src="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-7.png"> -->
			<picture>
				<source media="(max-width:500px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-mobile-2.png">
				<source media="(max-width:900px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-mobile-6.png">
				<source media="(min-width:901px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-7.png">
				<img>
			</picture>
		</div>
		<div>
			<picture>
				<source media="(max-width:500px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-mobile-3.png">
				<source media="(max-width:900px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-mobile-7.png">
				<source media="(min-width:901px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-8.png">
				<img>
			</picture>
		</div>
			<!-- <img src="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-8.png"></div> -->
		<div>
			<!-- <img src="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-9.png"> -->
			<picture>
				<source media="(max-width:500px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-mobile-4.png">
				<source media="(max-width:900px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-mobile-8.png">
				<source media="(min-width:901px)" srcset="/wp-content/themes/sul-theme/bsc-templates/images/sliders/20-SUL-0073_CA-9.png">
				<img>
			</picture>
		</div>
	</div>
	<div class="pos-absolute" style="z-index: 0; left: 0; right: 0; top: 0; width: 100%;">
		<img style="
		width: 30vw;
		max-width: 288px;
		margin: auto;
		display: block;
		transform: translateY(-35%);"

		src="/wp-content/uploads/2021/03/StockShowU-edit-blackbar.png">

	</div>
</div>


<script src="/wp-content/themes/sul-theme/slick/slick.js"></script>
<script>
jQuery(document).ready(function(){
	jQuery('.your-class').slick({
		autoplay: true,
		prevArrow: `<div class="arrow-btn-wrapper btn-prev"><button type="button"><i class="fas fa-chevron-circle-left text-white"></i></button></div>`,
		nextArrow: `<div class="arrow-btn-wrapper btn-next"><button type="button"><i class="fas fa-chevron-circle-right text-white"></i></button></div>`
	});
});
</script>
