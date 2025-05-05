<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sul-theme
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header display-block" >
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					sul_theme_posted_on();
					sul_theme_entry_footer();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php sul_theme_post_thumbnail(); ?>
		

		<div class="entry-content">

<!-- dv made changes here on feb23 -->
			<?php					
				
				
				/* translators: %s: Name of current post. Only visible to screen readers */
the_excerpt();?>

		<p><a class="button wp-element-button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Continue Reading <svg class="svg-inline--fa fa-chevron-circle-right fa-w-075" aria-hidden="true" data-prefix="fas" data-icon="chevron-circle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z"></path></svg></a></p>


		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
	
	<style>
		
		.display-block {
			display: block !important;
		}
		
		.blog article.post .entry-header .entry-meta span, .single-post article.post .entry-header .entry-meta span, .category article.post .entry-header .entry-meta span, .archive article.post .entry-header .entry-meta span {
		    margin-left: 0 !important;
		}
		
		.fa-w-075 {
			width: 0.75rem !important;
			height: auto;
		}
		
		a.read-more {
			font-weight: bold;
		}
	</style>
