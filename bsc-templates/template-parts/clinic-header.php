
<style>
	.degree-desc-unactive {
		display: none;
	}

	.degree-link {
		transition: 500ms;
		cursor: pointer;
		font-size: 1.15rem;
		border-radius: 0;
		background-color: black;
		border: none;
	}
	.degree-link-active {
		background: #991d24;
	}

	.degree-link svg {
		transition: 200ms;
	}

	.degree-link-active svg {
		transform: rotate(90deg);
	}

	@media screen and (max-width: 767px) {
		#degree-section-selector li {
			margin: 0;
		}

		#degree-section-selector svg {
			display: none !important;
		}
	}
</style>
<section id="degree-section">
	<div class="background-black">
		<div class="container" style="padding-top: 4rem;margin-top: 0">

			<h2 class="mt-0 text-white">What type of event are you interested in?</h2>
			<ul class="row list-style-none p-0 m-0 font-1rem" id="degree-section-selector">
				<li class="mr-auto">
					<button class="text-white degree-link degree-link-active" data-degree="webinar">WEBINAR <i class="fas fa-chevron-circle-right"></i></button>
				</li>
				<li class="m-auto">
					<button class="text-white degree-link" data-degree="masters">MASTERS <i class="fas fa-chevron-circle-right"></i></button>
				</li>
				<li class="m-auto">
					<button class="text-white degree-link" data-degree="bachelors">BACHELORS  <i class="fas fa-chevron-circle-right"></i></button>
				</li>
				<li class="ml-auto">
					<button class="text-white degree-link" data-degree="associates">ASSOCIATES  <i class="fas fa-chevron-circle-right"></i></button>
				</li>
			</ul>
		</div>
	</div>
	<!-- <div class="container">
		<div class="pos-relative">
 make the longest element the always current desc
			<div class="degree-desc background-white" id="always-current-desc">
				<b>Booking a Webinar</b>
				<p class="mt-0 w-50">Sae evendant, occus minvelestiae ea volorro consequas quaepudis esto offic tes- sundae delenditas dolendigenia volendant volorem quosandis re, odi volorereium est omnimusa et libea si omni dis dolenitetur sequia sam apiento quae dem et pedit, qui.</p>
			</div>
			<div class="degree-desc pos-absolute-0 background-white degree-desc-unactive" id="masters-desc">
				<p class="mt-0 w-50">A two-day graduate program that allows students  to work one on one with professors and develop techniques for daily care, clipping, fitting and showmanship.</p>
			</div>
			<div class="degree-desc pos-absolute-0 background-white degree-desc-unactive" id="bachelors-desc">
				<p class="mt-0 w-50">A one-day program for students to gain experience on daily care, clipping, fitting and showmanship techniques, while working one on one with professors.</p>
			</div>
			<div class="degree-desc pos-absolute-0 background-white degree-desc-unactive" id="associates-desc">
				<p class="mt-0 w-50">A one to two hour demonstration covering topics including, but not limited to; daily care, fitting, clipping, showmanship, show road prep. </p>
			</div>
		</div>
	</div> -->
</section>
<script>
	jQuery("#degree-section").ready(function(){

		jQuery(".degree-link").click(function(item){
			const activeLinkclass = "degree-link-active"
			jQuery("." + activeLinkclass).removeClass(activeLinkclass)
			this.classList.toggle(activeLinkclass)

			const currentClassSelector = "degree-desc-current";

			const prevItem = jQuery("." + currentClassSelector);
			prevItem.fadeOut()
			prevItem.removeClass(currentClassSelector)

			const selectingItem = jQuery("#" + this.dataset.degree + "-desc")
			selectingItem.fadeIn()
			selectingItem.addClass(currentClassSelector)

		})

	})
</script>
