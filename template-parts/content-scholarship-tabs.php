<?php
/**
 * Template part for displaying Scholarship Winners in a categorized tabbed content layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *
 */

?>

<div class="tabs don-test-scholar">

	<?php $winner_categories = get_terms('winner_categories', array(
		'orderby' => 'name',
		'order' => 'DESC'
	)); ?>

	<ul class="tab-links blaze-scholar">

		<?php foreach($winner_categories as $winner_category) { ?>
			<li><a href="#<?php echo $winner_category->slug ?>"><?php echo $winner_category->name ?></a></li>
		<?php } ?>

	</ul><!-- /.tab-links -->

	<div class="tab-content blaze-scholar-tab-content">

		<?php foreach($winner_categories as $winner_category) { ?>

			<div class="tab-pane blaze-scholar-tab-pane" id="<?php echo $winner_category->slug ?>">

				<?php

					$args = array(

						'post_type' => 'scholarship_winners',
						'post_per_page' => -1,
						'meta_key' => 'last_name',
						'orderby' => 'meta_value',
						'order'	=> 'ASC',
						'nopaging' => true,
						'tax_query' => array(
							array(
								'taxonomy' => 'winner_categories',
								'field' => 'slug',
								'terms' => $winner_category->slug
							)
						)
					);

					$query = new WP_query($args);
				?>

				<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

					<div class="tab-item">
						<?php the_post_thumbnail(); ?>
						<div class="blz-scholar-p">
							<?php the_title( '<h2 class="entry-title blz-entry-title-scholar">', '</h2>' ); ?>
							<p class="blz-entry-scholar-p"><small><?php the_field('location'); ?></small></p>
							<?php the_content(); ?>
						</div>

					</div><!-- /.tab-item -->

				<?php endwhile; endif; wp_reset_postdata(); ?>

			</div><!-- /.tab-pane -->

		<?php } ?>

	</div><!-- /.tab-content -->

</div><!-- /.tabs -->
