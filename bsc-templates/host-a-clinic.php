<?php
/*
Template Name: Stock Show U Clinic
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



<div id="primary" class="content-area secondary-page" style="padding-top: 50px;background: black">

    <div class="container font-16px text-bold bread-crumbs" >
        <a class="text-500" href="/stock-show-u">Stock Show U</a>
        <i class="fas fa-chevron-circle-right text-red"></i>
        <a href="/stock-show-u/host-a-clinic-2" class="text-500">Host a Clinic</a>
    </div>

	<?php get_template_part('bsc-templates/template-parts/clinic-header') ?>
</div>
<div class="secondary-page">
    <div class="container">
        <div style="width: 75%;">
            <p>Please fill the form below.</p>
            <?php echo do_shortcode('[contact-form-7 id="531752" title="Host a Clinic"]'); ?>
        </div>
    </div>

</div>
<?php
get_footer();
