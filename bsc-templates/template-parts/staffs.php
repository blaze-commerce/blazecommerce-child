<style>
	.t-desc {
		text-align: right;
	}

	.staff-ssu {
		display: flex;
		justify-content: center;
		align-items: flex-end;
	}

	.t-desc, .j-desc {
		/* margin-top: 7rem; */
		align-items: center;
		margin: auto;
	}

	a:hover, a:focus, a:active {
		color: red;
	}

	.line-height-1 {
		line-height: 1;
	}
	@media screen and (max-width: 767px) {

		.container {
			padding: 0px;
		}

		#john-col .row {
			flex-direction: column-reverse;
		}

		#taylor-col .row div, #john-col .row div {
				margin-top: 0;
				text-align: center;
    		width: 100%;
		}

		#taylor-col {
			/* border-top: solid; */
			border-bottom: solid;
			margin-bottom: 35px;
		}


		#john-col {
			border-bottom: solid;
			/* margin-bottom: 35px; */
		}

		.t-desc, .j-desc {
			/* border-top: solid; */
			padding-bottom: 6px;
			padding-top: 6px;
		}

		.t-desc p:last-child, .j-desc p:last-child {
			/* border-bottom: solid; */
			/* padding-bottom: 6px; */
		}

		#ssu-staffs {
			padding: 0px;
		}

		.degree-link {
			text-align: left;
		}

	}
</style>

<div class="container" id="ssu-staffs">
	<div class="row flex-wrap">
		<div class="col" id="taylor-col">
			<div class="row justify-content-end">
				<div class="t-desc line-height-1">
					<h1 class="my-0 text-red">Tess Mittag</h1>
					<p class="mt-0">Manager of Stock Show University</p>
					<b>Questions?</b>
					<p class="mt-0">Email Tess: <a href="mailto:tessa@sullivansupply.com">tessa@sullivansupply.com</a></p>
				</div>
				<img style="height: 260px; margin: 0 10px; object-fit: contain;" src="/wp-content/uploads/2022/09/tess-1.png">
			</div>
		</div>
		<div class="col" id="john-col">
			<div class="row">
				<img style="height: 260px; margin: 0 10px; object-fit: contain;" src="/wp-content/themes/sul-theme/bsc-templates/images/home/staffs/john.png">
				<div class="j-desc line-height-1">
					<h1 class="my-0 text-red">JOHN SULLIVAN</h1>
					<p class="mt-0">Founder of Stock Show University</p>
				</div>
			</div>
		</div>
	</div>
</div>
