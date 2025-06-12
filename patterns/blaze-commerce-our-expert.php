<?php
/**
 * Title: BlazeCommerce Our Expert
 * Slug: blaze-commerce/our-expert
 * Categories: BlazeCommerce Layout
 * Keywords: expert, team, professional, specialist, kajal, naina
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport width: 1400
 * Description: A professional expert section showcasing expertise with responsive layout for desktop, tablet, and mobile.
 */
?>

<!-- wp:group {"metadata":{"name":"BlazeCommerce Our Expert"},"align":"full","style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem","left":"1.5rem","right":"1.5rem"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#f9fafb"}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f9fafb;margin-top:0;margin-bottom:0;padding-top:5rem;padding-right:1.5rem;padding-bottom:5rem;padding-left:1.5rem">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"3rem","left":"3rem"}}},"className":"items-center"} -->
	<div class="wp-block-columns alignwide items-center">
		<!-- wp:column {"width":"40%","className":"text-center lg:text-left"} -->
		<div class="wp-block-column text-center lg:text-left" style="flex-basis:40%">
			<!-- wp:image {"id":123,"width":"400px","height":"400px","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"rounded-2xl shadow-lg aspect-square"} -->
			<figure class="wp-block-image size-large rounded-2xl shadow-lg aspect-square">
				<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&crop=face" alt="<?php echo esc_attr_x( 'Kajal Naina - Expert Jewelry Designer', 'Alt text for expert image', 'blaze-child' ); ?>" style="width:400px;height:400px;object-fit:cover"/>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%","style":{"spacing":{"blockGap":"1.5rem"}}} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"400","lineHeight":"1.75"},"color":{"text":"#6b7280"}},"fontFamily":"cardo"} -->
			<h3 class="wp-block-heading has-text-align-left has-text-color has-cardo-font-family" style="color:#6b7280;font-size:1.5rem;font-weight:400;line-height:1.75"><?php echo esc_html_x( 'Our Expert', 'Section subtitle', 'blaze-child' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:heading {"textAlign":"left","style":{"typography":{"fontSize":"2.5rem","fontWeight":"400","lineHeight":"1.2"},"color":{"text":"#111827"},"spacing":{"margin":{"bottom":"1.5rem"}}},"fontFamily":"cardo"} -->
			<h2 class="wp-block-heading has-text-align-left has-text-color has-cardo-font-family" style="color:#111827;margin-bottom:1.5rem;font-size:2.5rem;font-weight:400;line-height:1.2"><?php echo esc_html_x( 'Meet Kajal Naina', 'Expert name heading', 'blaze-child' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem","fontWeight":"300","lineHeight":"1.75"},"color":{"text":"#374151"},"spacing":{"margin":{"bottom":"2rem"}}},"fontFamily":"josefin-sans"} -->
			<p class="has-text-color has-josefin-sans-font-family" style="color:#374151;margin-bottom:2rem;font-size:1.125rem;font-weight:300;line-height:1.75"><?php echo esc_html_x( 'A certified pearl specialist with numerous certifications in metalsmithing, metal clay, and jewelry making, Kajal Naina draws on her expertise to craft exquisite, meaningful designs. Her journey spans India, Singapore, Japan, and Hong Kong, blending cultural influences into her fine jewelry. Today, she leads her eponymous brand, uniting passion and artistry to create jewelry that tells a story.', 'Expert description', 'blaze-child' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"2rem"}}}} -->
			<div class="wp-block-buttons" style="margin-top:2rem">
				<!-- wp:button {"style":{"color":{"background":"#1f2937","text":"#ffffff"},"typography":{"fontSize":"1rem","fontWeight":"400","textTransform":"uppercase","letterSpacing":"0.025em"},"spacing":{"padding":{"top":"0.75rem","bottom":"0.75rem","left":"1.5rem","right":"1rem"}},"border":{"radius":"0.125rem"}},"fontFamily":"josefin-sans","className":"hover:bg-gray-800"} -->
				<div class="wp-block-button hover:bg-gray-800">
					<a class="wp-block-button__link has-text-color has-background has-josefin-sans-font-family wp-element-button" href="/about" style="border-radius:0.125rem;color:#ffffff;background-color:#1f2937;padding-top:0.75rem;padding-right:1rem;padding-bottom:0.75rem;padding-left:1.5rem;font-size:1rem;font-weight:400;letter-spacing:0.025em;text-transform:uppercase"><?php echo esc_html_x( 'Get To Know Us', 'Button text', 'blaze-child' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
