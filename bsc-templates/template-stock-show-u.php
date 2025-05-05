<?php
/*
Template Name: Stock Show BSC
*/

get_header();



$args = array(
  'post_type' => 'ad_space',
  'tag' => 'promotion',
  );
$query = new WP_query( $args );

?>

<?php get_template_part( 'bsc-templates/template-parts/content', 'ssu-nav' ); ?>
    <?php get_template_part('bsc-templates/apply-style') ?>


    <style>
        a.text-white:hover {
            color: white;
        }

        .animal-links .text-white:hover {
            color: #991d24;
        }

        .d-block {
            display: block;
        }

        @media screen and (min-width: 768px) {
          .w-md-30 {
            width: 30%;
          }


        }
        @media screen and (max-width: 767.99px) {
          .row.animals, .animal-links {
            flex-direction: row !important;
            padding: 0 !important;
            /* flex-wrap: wrap; */

          }
          .row.animals a {
            /* width: 50% !important; */
            /* padding: 0; */
          }
          .sullivan-tips > div {
            text-align: center;
          }

          .sullivan-tips p {
            text-align: left;
          }

          .sullivan-tips img {
            max-width: 300px;
          }
          /* .animal-links {
            display: none !important;
          } */

          .ssu-header-homepage {
            margin-bottom: 0;
          }

          .animals-container, .animal-links-container {
            padding: 0px !important;
          }

          .animals-container a {
            border-bottom: solid #222020;
          }

          .animal-links h3 {
              /* padding: 0 !important; */
                text-align: left;
                padding-left: 1.2rem;
          }

          /* .row.animals a::after {
              display: block;
              background: #222020;
              padding-left: 0.75rem;
              text-align: center;
              font-size: 1.15rem;
              color: white;
              text-transform: uppercase;
          }

          .row.animals a:first-child::after {
              content: "cattle";

          }

          .row.animals a:nth-child(2)::after {
              content: "sheep";

          }


          .row.animals a:nth-child(3)::after {
              content: "hogs";

          }

          .row.animals a:last-child::after {
              content: "goats";

          } */

          .mt-sm-0 {
              margin-top: 0 !important;
          }
        }
    </style>
	<div id="primary" class="content-area">

		<main id="main" class="site-main secondary-page" style="padding-top: 100px;">
            <?php get_template_part( 'bsc-templates/template-parts/top-slider'); ?>
            <?php get_template_part( 'bsc-templates/template-parts/staffs'); ?>
            <?php get_template_part( 'bsc-templates/template-parts/degree-section'); ?>

            <style>
            </style>
            <div>
                <h1 class="text-center ssu-header-homepage">STOCK SHOW U ONLINE</h1>
<!--
                <div class="container animals-container">
                    <div class="row animals align-items-end">
                        <a href="/ssu-stg/online/" class="m-auto"><img class="d-block" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/cattle-icon.png"></a>
                        <a href="/ssu-stg/online/sheep" class="m-auto"><img class="d-block" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/sheep-icon.png"></a>
                        <a href="/ssu-stg/online/hogs" class="m-auto"><img class="d-block" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/hog-icon.png"></a>
                        <a href="/ssu-stg/online/goats" class="m-auto"><img class="d-block" src="/wp-content/uploads/2021/02/goat-icon-edited.png"></a>
                    </div>
                </div>
-->
            </div>
            <div class="species-slider" style="margin-top: 3rem;margin-bottom: -5px;">
	            <div>
		            <a href="/ssu-stg/online/">
			            <img class="d-block m-auto" style="height: 131px" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/cattle-icon.png">
			            <h3 class="my-0 text-white text-center py-025rem" style="background-color: #222020" id="cattle-item">CATTLE</h3>
		            </a>
				</div>
	            <div>
		            <a href="/ssu-stg/online/sheep">
			            <img class="d-block m-auto" style="height: 131px" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/sheep-icon.png">
			            <h3 class="my-0 text-white text-center py-025rem" style="background-color: #222020" id="sheep-item">SHEEP</h3>
		            </a>
				</div>
	            <div>
		            <a href="/ssu-stg/online/hogs">
			            <img class="d-block m-auto" style="height: 131px" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/hog-icon.png">
			            <h3
                        class="my-0 text-white text-center py-025rem"
                        style="background-color: #222020" id="hogs-item">HOGS</h3>
		            </a>
				</div>
	            <div>
		            <a href="/ssu-stg/online/goats">
			            <img class="d-block m-auto " style="height: 131px" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/goat-icon.png">
			            <h3 class="my-0 text-white text-center py-025rem"  style="background-color: #222020">GOATS</h3>
		            </a>
				</div>

			</div>
            <style>


                @media screen and (min-width: 700px) {
                    #hogs-item {
                        padding-right: 3rem;

                    }

                        #cattle-item {
                            padding-right: 2rem;
                        }

                    #sheep-item {
                        padding-right: 1rem;
                    }
                }
                @media screen and (max-width: 699.99px) {
                    .species-slider img {
                        height: 100%;
                        object-fit: contain;
                        object-position: bottom;
                    }
                }
            </style>
			<script type="text/javascript" src="/wp-content/themes/sul-theme/slick/slick.js"></script>
            <script>

jQuery('.species-slider').slick({
			  slidesToShow: 4,
			  slidesToScroll: 1,

			  prevArrow: false,
			  nextArrow: false,

		  		centerMode: false,
			  // responsive: [
			  //   {
			  //     breakpoint: 699,
			  //     settings: {
			  //       slidesToShow: 2,
              //       centerMode: false,
              //       prevArrow: `<span>Prev</span>`,
              //       nextArrow: `<span>Next</span>`
			  //     }
			  //   }]
		  });
            </script>

            <div class=" font-1rem" style="background: #222020">
<!--
                <div class="container mt-0 animal-links-container">
    				<div class="row text-center animal-links">
    					<a class="m-auto py-025rem" style="width: 200px" href="/ssu-stg/online/"><h3 class="my-0 text-white" style="padding-right: 2rem;">CATTLE</h3></a>
    					<a class="m-auto py-025rem" style="width: 135px" href="/ssu-stg/online/sheep"><h3 class="my-0 text-white" style="padding-right: 1rem">SHEEP</h3></a>
    					<a class="m-auto py-025rem" style="width: 163px" href="/ssu-stg/online/hogs"><h3 class="my-0 text-white" style="padding-right: 3rem;">HOGS</h3></a>
    					<a class="m-auto py-025rem" style="width: 142px" href="/ssu-stg/online/goats"><h3 class="my-0 text-white">GOATS</h3></a>
    				</div>
    			</div>
-->

                <div class="container mt-0" style="padding-top: 3rem; ">
                    <div class="row justify-content-center align-items-center">
                        <h2 class="text-red d-inline-block mr-050rem">SULLIVAN TIPS</h2>
                        <h5 class="text-white font-24px">Getting complete paint coverage!</h5>
                    </div>
                    <div class="row sullivan-tips justify-content-space-between text-white flex-wrap">
                        <div class="w-md-30">
                            <img src="https://www.sullivansupply.com/wp-content/uploads/2021/02/step_1.jpg">
                            <p><b>STEP 1</b><br>Glue the leg using a Sullivan’s Teflon Comb and either Sullivan’s Primetime or Tail Adhesive. If you are less experienced, opt for Primetime as you are less likely to gunk up the leg. Remember to hold can 6 inches away from the leg</p>
                        </div>
                        <div class="w-md-30">
                            <img src="https://www.sullivansupply.com/wp-content/uploads/2021/02/step_2.jpg">
                            <p><b>STEP 2</b><br>Spray on Sullivan’s White Powder’Ful to build leg by thickening hair follicles and filling in between hairs. Alternate with Tail Adhesive to create a strong hold. If painting a black leg, use Black Powder’Ful for better coverage. Powder’Ful is also a great tool for clipping the leg.</p>
                        </div>
                        <div class="w-md-30">
                            <img src="https://www.sullivansupply.com/wp-content/uploads/2021/02/step_3.jpg">
                            <p><b>STEP 3</b><br>Once you are done building the leg with Powder’Ful, complete cover the leg with Sullivan’s Jet Black, first and then Sullivan’s Black Finisher for a natural black look. Allow dry time between layers.</p>
                        </div>
                    </div>
                </div>
            </div>




			<!-- <script type="text/javascript" src="/wp-content/themes/sul-theme/slick/slick.js"></script>
            <script>

jQuery('.species-slider').slick({
			  slidesToShow: 4,
			  slidesToScroll: 1,

			  prevArrow: false,
			  nextArrow: false,

		  		centerMode: false,
			  responsive: [
			    {
			      breakpoint: 1100,
			      settings: {
			        slidesToShow: 3,
		  		centerMode: false,
			      }
			    },
			    {
			      breakpoint: 850,
			      settings: {
			        slidesToShow: 2,
		  		centerMode: false,
			      }
			    }
			    ]
		  });
            </script> -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
