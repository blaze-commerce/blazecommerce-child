<?php
/**
 * Template part for displaying Scholarship Winners in a categorized tabbed content layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sul-theme
 */

?>
<link href="/wp-content/themes/css/main.css" rel="stylesheet">
<style>

	@keyframes turnRed {
		from {
			color: white;
		}
	}

	@keyframes rotate90 {
		from {
 	   		transform: rotate(0deg);
		}
		to {
 	   		transform: rotate(90deg);
		}
	}

	/* nav */
	.nav-item-ssu {
		padding: 0 1rem;
	}

	.nav-item-ssu a {
		color: white;
	}

	.nav-item-ssu a.active-link {
	   animation-name: turnRed;
	   animation-duration: 200ms;
	   color: #991d24;
	}

	.nav-item-ssu a.active-link svg {
	   animation-name: rotate90;
	   animation-duration: 200ms;
	   transform: rotate(90deg);

	}

	#stock-show-nav {
		background-color: black;
		color: white;
		text-transform: uppercase;
		text-align: center;
		padding: 1rem;
		font-size: 1rem;
/* 		display: none; */
	}
	.page-id-9 #stock-show-nav,
	.parent-pageid-9 #stock-show-nav,
	.parent-pageid-4690206 #stock-show-nav,
	.page-id-4687763 #stock-show-nav,
	.parent-pageid-4687763 #stock-show-nav,
	.term-apparel #stock-show-nav {
/* 		display: block; */
	}

	#stock-show-nav ul {
		list-style: none;
		display: inline-flex;
		padding: 0;
		margin: 0;
	}

	.nav-item-ssu a {
	    font-size: 1.25rem;
	    line-height: 0.75;
	    vertical-align: middle;
	}

	.term-apparel .secondary-page {
		padding-top: 4rem;
	}

	@media screen and (max-width: 767px) {
		#stock-show-university-nav {
			display: flex !important;
			flex-direction: column !important;
			text-align: left !important;
		}

		.bread-crumbs {
			margin-top: 100px !important;
		}

		.term-apparel #main {
			margin-top: 100px !important;
		}
	}
</style>
