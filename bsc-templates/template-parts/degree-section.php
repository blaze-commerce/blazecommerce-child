

<style>
.degree-desc {
	/* right: 0; */
	padding-right: 20px;
	padding-top: 1rem;
}
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

/* .pos-md-absolute {
	position: : absolute;
} */
#associate-desc {
	left: 50%;
	text-align: right;
}

#degree-section {
	margin-bottom: 200px
}

@media screen and (max-width: 767px) {

	#degree-section {
		margin-bottom: 0;
	}

	#associate-desc {
		left: 0;
		text-align: left;
	}

	.degree-nav li, .degree-nav li a {
		width: 100%;
	}

	.w-sm-100 {
		width: 100%;
	}

	#degree-section {
		padding: 0;
	}

	.pos-sm-relative {
		position: relative !important;
	}
	.degree-desc {
		/* right: 0; */
		/* padding-right: 20px; */
		padding-bottom: 1rem;
		right: 0;
		padding-left: 20px;
	}
}

.pt-1rem {
	padding-top: 1rem;
}
</style>

<section id="degree-section">
	<div class="background-black">
		<div class="container mt-0" id="degree-section"  style="">
			<ul class="row list-style-none p-0 m-0 font-1rem">
				<li class="mr-auto w-sm-100">
					<button class="text-white degree-link degree-link-active w-sm-100" data-degree="docterate">ASSOCIATES
						<i class="fas fa-chevron-circle-right"></i>
					</button>

					<div class="degree-desc background-white pos-absolute degree-desc-current pos-sm-relative" id="docterate-desc">
						<b>SSU Apprenticeship</b>
							<p class="mt-0 w-sm-100">A one or two hour demo focusing on specific topic such as daily care, clipping, fitting or showmanship. Demos are typically inconjuction with another show or event.</p>
					</div>
				</li>
				<li class="m-auto w-sm-100">
					<button class="text-white degree-link w-sm-100" data-degree="masters">BACHELORS
						<i class="fas fa-chevron-circle-right"></i>
					</button>
					<div class="degree-desc pos-absolute background-white degree-desc-unactive  pos-sm-relative" id="masters-desc">
						<p class="mt-0 w-sm-100">A one day event covering daily care, clipping, fitting and showmanship tips and techniques. Students may bring their animals and work directly with the industry's best to advance their skills.</p>
					</div>
				</li>
				<li class="m-auto w-sm-100">
					<button class="text-white degree-link w-sm-100 " data-degree="bachelors">MASTERS
						<i class="fas fa-chevron-circle-right"></i>
					</button>
					<div class="degree-desc pos-absolute background-white degree-desc-unactive  pos-sm-relative" id="bachelors-desc">
						<p class="mt-0 w-sm-100 pt-1rem">A two-day fun filled event where students can bring their animals and work one on one with the industry's best and most talented. Topics covered include: daily care, clipping, fitting, proper breakdown, showmanship, nutrition and show road prep. Students will walk away motivated and prepared for success!</p>
					</div>
				</li>
				<li class="ml-auto w-sm-100">
					<button class="text-white degree-link w-sm-100" data-degree="associates">DOCTORATE
						<i class="fas fa-chevron-circle-right"></i>
					</button>
					<div
					class="degree-desc pos-absolute background-white degree-desc-unactive pos-sm-relative"
					id="associates-desc">
					<p class="mt-0 w-sm-100">Become an SSU Professor in training. An elite nomination program for 10 nominated individuals to work one-on-one with our SSU Master Professors focusing on clipping and fitting. Select events occur throughout the year. Nominations are currently closed.</p>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="pos-relative">
			<!-- make the longest element the always current desc -->



		</div>
	</div>
</section>
<script>
	jQuery("#degree-section").ready(function(){

		jQuery(".degree-link").click(function(item){
			const activeLinkclass = "degree-link-active"
			jQuery("." + activeLinkclass).removeClass(activeLinkclass)
			this.classList.toggle(activeLinkclass)

			const currentClassSelector = "degree-desc-current";

			const prevItem = jQuery("." + currentClassSelector);
			prevItem.hide()
			prevItem.removeClass(currentClassSelector)

			const selectingItem = jQuery("#" + this.dataset.degree + "-desc")
			selectingItem.show()
			selectingItem.addClass(currentClassSelector)

		})

	})
</script>
