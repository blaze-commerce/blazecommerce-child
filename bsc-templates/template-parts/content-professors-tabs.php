<?php
/**
 * Template part for displaying Scholarship Winners in a categorized tabbed content layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sul-theme
 */

?>

<div class="tabs">

	<?php $professors_categories = get_terms('professors_categories', array(
		'orderby' => 'menu_order'
	)); ?>

	<ul class="tab-links">

		<?php foreach($professors_categories as $professors_category) { ?>
			<li><a href="#<?php echo $professors_category->slug ?>"><?php echo $professors_category->name ?></a></li>
		<?php } ?>

	</ul><!-- /.tab-links -->

	<div class="tab-content">

		<?php foreach($professors_categories as $professors_category) { ?>

			<div class="tab-pane" id="<?php echo $professors_category->slug ?>">


				<?php

					$args = array(

						'post_type' => 'professors_staff',

						'post_per_page' => -1,
						'meta_key' => 'last_name',
						'orderby' => 'meta_value',
						'order'	=> 'ASC',
						'nopaging' => true,
						'tax_query' => array(
							array(
								'taxonomy' => 'professors_categories',
								'field' => 'slug',
								'terms' => $professors_category->slug
							)
						)
					);

					$query = new WP_query($args);
				?>

				<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

					<div class="tab-item">

						<a href="<?php the_permalink(); ?>">
							<?php sul_theme_post_thumbnail(); ?>
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
							<p><?php the_field('position'); ?></p>
						</a>

					</div><!-- /.tab-item -->

				<?php endwhile; endif; wp_reset_postdata(); ?>

			</div><!-- /.tab-pane -->

		<?php } ?>

	</div><!-- /.tab-content -->

</div><!-- /.tabs -->
