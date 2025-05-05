<?php
/**
 * Template Name: Professors BSC
 */

get_header();
block_template_part( 'header' );
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
?>
<?php get_template_part( 'bsc-templates/template-parts/content', 'ssu-nav' ); ?>
<?php get_template_part( 'bsc-templates/apply-style' ) ?>
<div id="primary" class="content-area secondary-page" style="padding-top: 50px;">
	<?php get_template_part( 'bsc-templates/template-parts/ssu-header' ) ?>
	<main id="main" class="site-main">
		<div class="container blz-meet-team-container" style="padding-top: 3rem">
			<h3 class="text-center my-0" style="color: #b3b3b3;">CLICK A REGION TO VIEW PROFESSORS</h3>
			<?php get_template_part( 'bsc-templates/template-parts/professors' ) ?>
		</div>
	</main>
</div>
<?php
block_template_part( 'footer' );
get_footer();
