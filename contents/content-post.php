<?php
global $post;
$page_id = get_option( 'page_for_posts' );
$image_id = get_post_thumbnail_id();
$image = '';
if($image_id) {
    $image = wp_get_attachment_image_src($image_id, 'banner')[0];
}
?>

<article id="<?php echo get_post_type()."-".get_the_ID(); ?>" <?php post_class('article section has-bg-img blog-post-single'); ?> role="article">
    <div class="centering">
        <?php if ( $image ) : ?>
            <div class="background-image-hero" style="background-image: url('<?php echo $image; ?>');">
                <h1 class="section-title-single"><?php the_title(); ?></h1>
                <span class="post-meta"><?php the_date('d-m-y'); ?></span>
            </div>
            <?php else : ?>
            <div class="background-image-hero small">
                <h1 class="section-title-single"><?php the_title(); ?></h1>
                <span class="post-meta"><?php the_date('d-m-y'); ?></span>
            </div>
        <?php endif; ?>
        <div class="inner-wrapper">
            <div class="content-inner">
                <div class="post-text"><?php the_content(); ?></div>
                <div class="post-actions">
                    <a href="<?php the_permalink( $page_id ); ?>" class="button-post">Back to Posts</a>
                    <?php get_template_part( 'components/share-buttons' ); ?>
                </div>
            </div>
        </div>
    </div>
</article> <!-- MAIN ARTICLE ENDS -->