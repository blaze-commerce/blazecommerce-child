<?php
/*
Template Name: Stock Show Child
*/

get_header();
?>

<?php get_template_part( 'bsc-templates/template-parts/content', 'ssu-nav' ); ?>
    <?php get_template_part('bsc-templates/apply-style') ?>


	<div id="primary" class="content-area secondary-page">
		<main id="main" class="site-main">
			 <div class="container font-16px text-bold bread-crumbs" >
        <a class="text-500" href="/stock-show-u">Stock Show U</a>
        <i class="fas fa-chevron-circle-right text-red"></i>
        <a href="/stock-show-u/host-a-clinic-2" class="text-500">Resources</a>
    </div>

			<div class="container">
				<div class="row">
					<div class="onecol-one first ">
						<div class="entry-content">
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
						</div><!-- .entry-content -->
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
