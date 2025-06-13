<?php
/**
 * Title: BlazeCommerce Customer Reviews Showcase
 * Slug: blaze-commerce/customer-reviews-showcase
 * Categories: blazecommerce-content, testimonials
 * Keywords: reviews, testimonials, customers, ratings, five star
 * Viewport width: 1200
 * Description: A clean, semantic customer reviews showcase section with decorative lines, testimonial cards, and call-to-action button. Interactive features handled by Next.js frontend.
 */

// Get review data from the extension
$reviews_data = array();
$review_stats = array();

if ( class_exists( 'BlazeWooless\Extensions\CustomerReviewsWoocommerce' ) ) {
    $extension = BlazeWooless\Extensions\CustomerReviewsWoocommerce::get_instance();

    // Get sample reviews for the pattern
    $reviews_response = $extension->get_customer_reviews( new WP_REST_Request() );
    if ( $reviews_response->get_status() === 200 ) {
        $data = $reviews_response->get_data();
        $reviews_data = $data['reviews'] ?? array();
        $review_stats = $data['stats'] ?? array();
    }
}

// Fallback data if no reviews found
if ( empty( $reviews_data ) ) {
    $reviews_data = array(
        array(
            'id' => 1,
            'author' => 'Sample Customer',
            'content' => 'Great product! Highly recommended.',
            'rating' => 5,
            'verified' => true,
            'avatar' => 'https://placehold.co/56x56',
        )
    );
}

// Get title from settings or use default
$review_title = '3,000+ Five Star Reviews';
if ( ! empty( $review_stats['total_reviews'] ) ) {
    $total = number_format( $review_stats['total_reviews'] );
    $review_title = $total . '+ Customer Reviews';
}
?>

<!-- wp:group {"className":"self-stretch px-4 md:px-8 lg:px-20 inline-flex flex-col justify-start items-center gap-28","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group self-stretch px-4 md:px-8 lg:px-20 inline-flex flex-col justify-start items-center gap-28">
    
    <!-- wp:group {"className":"self-stretch flex flex-col justify-center items-center gap-12","layout":{"type":"constrained"}} -->
    <div class="wp-block-group self-stretch flex flex-col justify-center items-center gap-12">
        
        <!-- wp:group {"className":"self-stretch flex flex-col justify-start items-start gap-3","layout":{"type":"constrained"}} -->
        <div class="wp-block-group self-stretch flex flex-col justify-start items-start gap-3">
            
            <!-- wp:group {"className":"self-stretch inline-flex justify-center items-start flex-wrap content-start","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
            <div class="wp-block-group self-stretch inline-flex justify-center items-start flex-wrap content-start">
                
                <!-- wp:group {"className":"flex-1 flex justify-center items-center gap-1.5","layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-group flex-1 flex justify-center items-center gap-1.5">
                    
                    <!-- wp:separator {"className":"flex-1 h-px bg-zinc-200 rounded-sm"} -->
                    <hr class="wp-block-separator has-alpha-channel-opacity flex-1 h-px bg-zinc-200 rounded-sm"/>
                    <!-- /wp:separator -->
                    
                    <!-- wp:group {"className":"inline-flex flex-col justify-center items-center gap-1.5","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group inline-flex flex-col justify-center items-center gap-1.5">
                        
                        <!-- wp:heading {"textAlign":"center","className":"text-center justify-start text-Secondary-foreground text-2xl md:text-3xl lg:text-4xl font-normal font-['Cardo'] leading-9 md:leading-10 lg:leading-[48px]","fontSize":"large"} -->
                        <h2 class="wp-block-heading has-text-align-center text-center justify-start text-Secondary-foreground text-2xl md:text-3xl lg:text-4xl font-normal font-['Cardo'] leading-9 md:leading-10 lg:leading-[48px] has-large-font-size"><?php echo esc_html( $review_title ); ?></h2>
                        <!-- /wp:heading -->
                        
                    </div>
                    <!-- /wp:group -->
                    
                    <!-- wp:separator {"className":"flex-1 h-px bg-zinc-200 rounded-sm"} -->
                    <hr class="wp-block-separator has-alpha-channel-opacity flex-1 h-px bg-zinc-200 rounded-sm"/>
                    <!-- /wp:separator -->
                    
                </div>
                <!-- /wp:group -->
                
            </div>
            <!-- /wp:group -->
            
        </div>
        <!-- /wp:group -->
        
        <!-- wp:group {"className":"self-stretch hidden lg:flex justify-between items-center gap-6","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-group self-stretch hidden lg:flex justify-between items-center gap-6">

            <?php
            $desktop_reviews = array_slice( $reviews_data, 0, 3 );
            foreach ( $desktop_reviews as $review ) :
                $stars = str_repeat( '⭐', intval( $review['rating'] ) );
                $review_image = ! empty( $review['images'] ) ? $review['images'][0] : 'https://placehold.co/560x380';
            ?>

            <!-- wp:group {"className":"w-[560px] h-96 relative inline-flex flex-col justify-center items-start","layout":{"type":"constrained"}} -->
            <div class="wp-block-group w-[560px] h-96 relative inline-flex flex-col justify-center items-start">

                <!-- wp:cover {"url":"<?php echo esc_url( $review_image ); ?>","className":"self-stretch flex-1 inline-flex justify-start items-start","layout":{"type":"constrained"}} -->
                <div class="wp-block-cover self-stretch flex-1 inline-flex justify-start items-start"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $review_image ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

                    <!-- wp:group {"className":"w-[560px] h-48 p-6 left-0 top-[180px] absolute bg-green-900/80 backdrop-blur-[6.50px] flex flex-col justify-center items-center gap-8 overflow-hidden","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group w-[560px] h-48 p-6 left-0 top-[180px] absolute bg-green-900/80 backdrop-blur-[6.50px] flex flex-col justify-center items-center gap-8 overflow-hidden">

                        <!-- wp:group {"className":"self-stretch flex flex-col justify-start items-start gap-3","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group self-stretch flex flex-col justify-start items-start gap-3">

                            <!-- wp:image {"className":"w-14 h-14 rounded-full border-2 border-accent---background-2","width":"56px","height":"56px"} -->
                            <figure class="wp-block-image w-14 h-14 rounded-full border-2 border-accent---background-2"><img src="<?php echo esc_url( $review['avatar'] ); ?>" alt="<?php echo esc_attr( $review['author'] ); ?>" style="width:56px;height:56px"/></figure>
                            <!-- /wp:image -->

                            <!-- wp:paragraph {"className":"justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-normal"} -->
                            <p class="justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-normal"><?php echo esc_html( strtoupper( $review['author'] ) ); ?><?php if ( $review['verified'] ) echo ' ✓'; ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"className":"self-stretch inline-flex justify-start items-start gap-2 flex-wrap content-start","layout":{"type":"flex","flexWrap":"wrap"}} -->
                            <div class="wp-block-group self-stretch inline-flex justify-start items-start gap-2 flex-wrap content-start">

                                <!-- wp:paragraph {"className":"flex justify-start items-center gap-2"} -->
                                <p class="flex justify-start items-center gap-2"><?php echo esc_html( $stars ); ?></p>
                                <!-- /wp:paragraph -->

                            </div>
                            <!-- /wp:group -->

                            <?php if ( ! empty( $review['content'] ) ) : ?>
                            <!-- wp:paragraph {"className":"self-stretch justify-center text-accent---foreground text-sm font-normal font-['Raleway'] leading-normal tracking-tight"} -->
                            <p class="self-stretch justify-center text-accent---foreground text-sm font-normal font-['Raleway'] leading-normal tracking-tight"><?php echo esc_html( wp_trim_words( $review['content'], 15 ) ); ?></p>
                            <!-- /wp:paragraph -->
                            <?php endif; ?>

                        </div>
                        <!-- /wp:group -->

                    </div>
                    <!-- /wp:group -->

                </div></div>
                <!-- /wp:cover -->

            </div>
            <!-- /wp:group -->

            <?php endforeach; ?>
            
            <!-- wp:group {"className":"w-[560px] h-96 relative inline-flex flex-col justify-center items-start","layout":{"type":"constrained"}} -->
            <div class="wp-block-group w-[560px] h-96 relative inline-flex flex-col justify-center items-start">
                
                <!-- wp:cover {"url":"https://placehold.co/560x380","className":"self-stretch flex-1 inline-flex justify-start items-start","layout":{"type":"constrained"}} -->
                <div class="wp-block-cover self-stretch flex-1 inline-flex justify-start items-start"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="https://placehold.co/560x380" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
                    
                    <!-- wp:group {"className":"w-[560px] h-48 p-6 left-0 top-[180px] absolute bg-green-900/80 backdrop-blur-[6.50px] flex flex-col justify-center items-center gap-8 overflow-hidden","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group w-[560px] h-48 p-6 left-0 top-[180px] absolute bg-green-900/80 backdrop-blur-[6.50px] flex flex-col justify-center items-center gap-8 overflow-hidden">
                        
                        <!-- wp:group {"className":"self-stretch flex flex-col justify-start items-start gap-3","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group self-stretch flex flex-col justify-start items-start gap-3">
                            
                            <!-- wp:image {"className":"w-14 h-14 rounded-full border-2 border-accent---background-2","width":"56px","height":"56px"} -->
                            <figure class="wp-block-image w-14 h-14 rounded-full border-2 border-accent---background-2"><img src="https://placehold.co/56x56" alt="" style="width:56px;height:56px"/></figure>
                            <!-- /wp:image -->
                            
                            <!-- wp:paragraph {"className":"self-stretch justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-normal"} -->
                            <p class="self-stretch justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-normal">ROSEMARY VAMDENBROUCKE / SUPERMODEL YOGI</p>
                            <!-- /wp:paragraph -->
                            
                            <!-- wp:group {"className":"self-stretch inline-flex justify-start items-start gap-2 flex-wrap content-start","layout":{"type":"flex","flexWrap":"wrap"}} -->
                            <div class="wp-block-group self-stretch inline-flex justify-start items-start gap-2 flex-wrap content-start">
                                
                                <!-- wp:paragraph {"className":"flex justify-start items-center gap-2"} -->
                                <p class="flex justify-start items-center gap-2">⭐⭐⭐⭐⭐</p>
                                <!-- /wp:paragraph -->
                                
                            </div>
                            <!-- /wp:group -->
                            
                        </div>
                        <!-- /wp:group -->
                        
                    </div>
                    <!-- /wp:group -->
                    
                </div></div>
                <!-- /wp:cover -->
                
            </div>
            <!-- /wp:group -->
            
            <!-- wp:group {"className":"w-[560px] h-96 relative inline-flex flex-col justify-center items-start","layout":{"type":"constrained"}} -->
            <div class="wp-block-group w-[560px] h-96 relative inline-flex flex-col justify-center items-start">
                
                <!-- wp:cover {"url":"https://placehold.co/560x380","className":"self-stretch flex-1 inline-flex justify-start items-center","layout":{"type":"constrained"}} -->
                <div class="wp-block-cover self-stretch flex-1 inline-flex justify-start items-center"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="https://placehold.co/560x380" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
                    
                    <!-- wp:group {"className":"w-[560px] h-48 p-6 left-0 top-[186px] absolute bg-green-900/80 backdrop-blur-[6.50px] flex flex-col justify-center items-center gap-8 overflow-hidden","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group w-[560px] h-48 p-6 left-0 top-[186px] absolute bg-green-900/80 backdrop-blur-[6.50px] flex flex-col justify-center items-center gap-8 overflow-hidden">
                        
                        <!-- wp:group {"className":"self-stretch flex flex-col justify-start items-start gap-3","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group self-stretch flex flex-col justify-start items-start gap-3">
                            
                            <!-- wp:image {"className":"w-14 h-14 rounded-full border-2 border-accent---background-2","width":"56px","height":"56px"} -->
                            <figure class="wp-block-image w-14 h-14 rounded-full border-2 border-accent---background-2"><img src="https://placehold.co/56x56" alt="" style="width:56px;height:56px"/></figure>
                            <!-- /wp:image -->
                            
                            <!-- wp:paragraph {"className":"self-stretch justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-normal"} -->
                            <p class="self-stretch justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-normal">SAMANTHA SIN / YOGS EXPERTS & FOUNDER OF ONE YOGA AND SMANTHA YOGA, HONGKONG</p>
                            <!-- /wp:paragraph -->
                            
                            <!-- wp:group {"className":"self-stretch inline-flex justify-start items-start gap-2 flex-wrap content-start","layout":{"type":"flex","flexWrap":"wrap"}} -->
                            <div class="wp-block-group self-stretch inline-flex justify-start items-start gap-2 flex-wrap content-start">
                                
                                <!-- wp:paragraph {"className":"flex justify-start items-center gap-2"} -->
                                <p class="flex justify-start items-center gap-2">⭐⭐⭐⭐⭐</p>
                                <!-- /wp:paragraph -->
                                
                            </div>
                            <!-- /wp:group -->
                            
                        </div>
                        <!-- /wp:group -->
                        
                    </div>
                    <!-- /wp:group -->
                    
                </div></div>
                <!-- /wp:cover -->
                
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"self-stretch hidden md:flex lg:hidden px-8 flex-col justify-start items-start","layout":{"type":"constrained"}} -->
        <div class="wp-block-group self-stretch hidden md:flex lg:hidden px-8 flex-col justify-start items-start">

            <!-- wp:group {"className":"w-full flex justify-start items-start gap-4 overflow-x-auto","layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group w-full flex justify-start items-start gap-4 overflow-x-auto">

                <?php
                $tablet_reviews = array_slice( $reviews_data, 0, 3 );
                foreach ( $tablet_reviews as $review ) :
                    $stars = str_repeat( '⭐', intval( $review['rating'] ) );
                ?>

                <!-- wp:group {"className":"w-80 self-stretch p-6 bg-green-900/80 backdrop-blur-[6.50px] inline-flex flex-col justify-start items-start gap-8 overflow-hidden","layout":{"type":"constrained"}} -->
                <div class="wp-block-group w-80 self-stretch p-6 bg-green-900/80 backdrop-blur-[6.50px] inline-flex flex-col justify-start items-start gap-8 overflow-hidden">

                    <!-- wp:group {"className":"self-stretch flex flex-col justify-start items-start gap-3","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group self-stretch flex flex-col justify-start items-start gap-3">

                        <!-- wp:image {"className":"w-14 h-14 rounded-full border-2 border-accent---background-2","width":"56px","height":"56px"} -->
                        <figure class="wp-block-image w-14 h-14 rounded-full border-2 border-accent---background-2"><img src="<?php echo esc_url( $review['avatar'] ); ?>" alt="<?php echo esc_attr( $review['author'] ); ?>" style="width:56px;height:56px"/></figure>
                        <!-- /wp:image -->

                        <!-- wp:paragraph {"className":"justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-none"} -->
                        <p class="justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-none"><?php echo esc_html( strtoupper( $review['author'] ) ); ?><?php if ( $review['verified'] ) echo ' ✓'; ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"flex justify-start items-center gap-2"} -->
                        <p class="flex justify-start items-center gap-2"><?php echo esc_html( $stars ); ?></p>
                        <!-- /wp:paragraph -->

                        <?php if ( ! empty( $review['content'] ) ) : ?>
                        <!-- wp:paragraph {"className":"self-stretch justify-center text-accent---foreground text-sm font-normal font-['Raleway'] leading-normal tracking-tight"} -->
                        <p class="self-stretch justify-center text-accent---foreground text-sm font-normal font-['Raleway'] leading-normal tracking-tight"><?php echo esc_html( wp_trim_words( $review['content'], 20 ) ); ?></p>
                        <!-- /wp:paragraph -->
                        <?php endif; ?>

                    </div>
                    <!-- /wp:group -->

                </div>
                <!-- /wp:group -->

                <?php endforeach; ?>

                <!-- wp:group {"className":"w-80 self-stretch p-6 bg-green-900/80 backdrop-blur-[6.50px] inline-flex flex-col justify-start items-center gap-8 overflow-hidden","layout":{"type":"constrained"}} -->
                <div class="wp-block-group w-80 self-stretch p-6 bg-green-900/80 backdrop-blur-[6.50px] inline-flex flex-col justify-start items-center gap-8 overflow-hidden">

                    <!-- wp:group {"className":"self-stretch flex flex-col justify-start items-start gap-3","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group self-stretch flex flex-col justify-start items-start gap-3">

                        <!-- wp:image {"className":"w-14 h-14 rounded-full border-2 border-accent---background-2","width":"56px","height":"56px"} -->
                        <figure class="wp-block-image w-14 h-14 rounded-full border-2 border-accent---background-2"><img src="https://placehold.co/56x56" alt="" style="width:56px;height:56px"/></figure>
                        <!-- /wp:image -->

                        <!-- wp:paragraph {"className":"self-stretch justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-none"} -->
                        <p class="self-stretch justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-none">ROSEMARY VAMDENBROUCKE / SUPERMODEL YOGI</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"flex justify-start items-center gap-2"} -->
                        <p class="flex justify-start items-center gap-2">⭐⭐⭐⭐⭐</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"self-stretch justify-center text-accent---foreground text-sm font-normal font-['Raleway'] leading-normal tracking-tight"} -->
                        <p class="self-stretch justify-center text-accent---foreground text-sm font-normal font-['Raleway'] leading-normal tracking-tight">Wearing the Divine Om, not only reminds me to take a moment to breathe but also remain loyal to my innermost truth. It's simple and elegant design compares to the symmetry of nature.</p>
                        <!-- /wp:paragraph -->

                    </div>
                    <!-- /wp:group -->

                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"w-80 p-6 bg-green-900/80 backdrop-blur-[6.50px] inline-flex flex-col justify-start items-center gap-8 overflow-hidden","layout":{"type":"constrained"}} -->
                <div class="wp-block-group w-80 p-6 bg-green-900/80 backdrop-blur-[6.50px] inline-flex flex-col justify-start items-center gap-8 overflow-hidden">

                    <!-- wp:group {"className":"self-stretch flex flex-col justify-start items-start gap-3","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group self-stretch flex flex-col justify-start items-start gap-3">

                        <!-- wp:image {"className":"w-14 h-14 rounded-full border-2 border-accent---background-2","width":"56px","height":"56px"} -->
                        <figure class="wp-block-image w-14 h-14 rounded-full border-2 border-accent---background-2"><img src="https://placehold.co/56x56" alt="" style="width:56px;height:56px"/></figure>
                        <!-- /wp:image -->

                        <!-- wp:paragraph {"className":"self-stretch justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-none"} -->
                        <p class="self-stretch justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-none">SAMANTHA SIN / YOGS EXPERTS & FOUNDER OF ONE YOGA AND SMANTHA YOGA, HONGKONG</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"flex justify-start items-center gap-2"} -->
                        <p class="flex justify-start items-center gap-2">⭐⭐⭐⭐⭐</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"self-stretch justify-center text-accent---foreground text-sm font-normal font-['Raleway'] leading-normal tracking-tight"} -->
                        <p class="self-stretch justify-center text-accent---foreground text-sm font-normal font-['Raleway'] leading-normal tracking-tight">I always wanted to have a yoga related jewelry, it's frustrating that I couldn't find a nice one. But when I first looked at the tranquility aum bracelet, I must say it is truly gorgeous!</p>
                        <!-- /wp:paragraph -->

                    </div>
                    <!-- /wp:group -->

                </div>
                <!-- /wp:group -->

            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"self-stretch py-6 inline-flex justify-center items-start gap-2","layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-group self-stretch py-6 inline-flex justify-center items-start gap-2">

                <!-- wp:html -->
                <div class="w-6 h-1 bg-accent---background-2 rounded-md"></div>
                <div class="w-2 h-1 bg-muted-bg rounded-md"></div>
                <div class="w-2 h-1 bg-muted-bg rounded-md"></div>
                <div class="w-2 h-1 bg-muted-bg rounded-md"></div>
                <!-- /wp:html -->

            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"self-stretch flex md:hidden px-4 flex-col justify-start items-start","layout":{"type":"constrained"}} -->
        <div class="wp-block-group self-stretch flex md:hidden px-4 flex-col justify-start items-start">

            <!-- wp:group {"className":"w-full flex justify-start items-start gap-4 overflow-x-auto","layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group w-full flex justify-start items-start gap-4 overflow-x-auto">

                <?php
                $mobile_reviews = array_slice( $reviews_data, 0, 1 );
                foreach ( $mobile_reviews as $review ) :
                    $stars = str_repeat( '⭐', intval( $review['rating'] ) );
                ?>

                <!-- wp:group {"className":"w-80 self-stretch p-6 bg-green-900/80 backdrop-blur-[6.50px] inline-flex flex-col justify-start items-start gap-8 overflow-hidden","layout":{"type":"constrained"}} -->
                <div class="wp-block-group w-80 self-stretch p-6 bg-green-900/80 backdrop-blur-[6.50px] inline-flex flex-col justify-start items-start gap-8 overflow-hidden">

                    <!-- wp:group {"className":"self-stretch flex flex-col justify-start items-start gap-3","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group self-stretch flex flex-col justify-start items-start gap-3">

                        <!-- wp:image {"className":"w-14 h-14 rounded-full border-2 border-accent---background-2","width":"56px","height":"56px"} -->
                        <figure class="wp-block-image w-14 h-14 rounded-full border-2 border-accent---background-2"><img src="<?php echo esc_url( $review['avatar'] ); ?>" alt="<?php echo esc_attr( $review['author'] ); ?>" style="width:56px;height:56px"/></figure>
                        <!-- /wp:image -->

                        <!-- wp:paragraph {"className":"justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-none"} -->
                        <p class="justify-center text-accent---foreground text-sm font-bold font-['Cardo'] leading-none"><?php echo esc_html( strtoupper( $review['author'] ) ); ?><?php if ( $review['verified'] ) echo ' ✓'; ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"flex justify-start items-center gap-2"} -->
                        <p class="flex justify-start items-center gap-2"><?php echo esc_html( $stars ); ?></p>
                        <!-- /wp:paragraph -->

                        <?php if ( ! empty( $review['content'] ) ) : ?>
                        <!-- wp:paragraph {"className":"self-stretch justify-center text-accent---foreground text-base font-light font-['Josefin_Sans'] leading-normal"} -->
                        <p class="self-stretch justify-center text-accent---foreground text-base font-light font-['Josefin_Sans'] leading-normal"><?php echo esc_html( wp_trim_words( $review['content'], 25 ) ); ?></p>
                        <!-- /wp:paragraph -->
                        <?php endif; ?>

                    </div>
                    <!-- /wp:group -->

                </div>
                <!-- /wp:group -->

                <?php endforeach; ?>

            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"self-stretch py-6 inline-flex justify-center items-start gap-2","layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-group self-stretch py-6 inline-flex justify-center items-start gap-2">

                <!-- wp:html -->
                <div class="w-6 h-1 bg-accent---background-2 rounded-md"></div>
                <div class="w-2 h-1 bg-muted-bg rounded-md"></div>
                <div class="w-2 h-1 bg-muted-bg rounded-md"></div>
                <div class="w-2 h-1 bg-muted-bg rounded-md"></div>
                <!-- /wp:html -->

            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:group -->

        <!-- wp:buttons {"className":"self-stretch px-4 py-3 rounded shadow-[0px_1px_2px_0px_rgba(0,0,0,0.12)] shadow-[inset_0px_-1px_0px_0px_rgba(0,0,0,0.08)] inline-flex justify-center items-center gap-1.5","layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons self-stretch px-4 py-3 rounded shadow-[0px_1px_2px_0px_rgba(0,0,0,0.12)] shadow-[inset_0px_-1px_0px_0px_rgba(0,0,0,0.08)] inline-flex justify-center items-center gap-1.5">
            
            <!-- wp:button {"className":"text-center justify-center text-Secondary-foreground text-base font-semibold font-['Josefin_Sans'] uppercase leading-7 tracking-tight"} -->
            <div class="wp-block-button text-center justify-center text-Secondary-foreground text-base font-semibold font-['Josefin_Sans'] uppercase leading-7 tracking-tight"><a class="wp-block-button__link wp-element-button">SEE ALL</a></div>
            <!-- /wp:button -->
            
        </div>
        <!-- /wp:buttons -->
        
    </div>
    <!-- /wp:group -->
    
</div>
<!-- /wp:group -->
