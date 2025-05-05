<?php
/*
Template Name: Stock Show U Online Hogs BSC
*/

get_header();

$args = array(
  'post_type' => 'ad_space',
  'tag' => 'promotion',
  );
$query = new WP_query( $args );

?>
<?php get_template_part('bsc-templates/apply-style') ?>

<div id="primary" class="content-area secondary-page" style="padding-top: 50px;">

	<?php get_template_part('bsc-templates/template-parts-online/ssuo-nav') ?>

	<div class="container pos-relative">
		<h1>Webinar</h1>
		<div style="width: 45%; display: inline-block;">
			<div class="ssu-video-wrapper">
				<iframe src="https://player.vimeo.com/video/467735216?&color=ffffff&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<duv style="width: 45%; display: inline-block;">
			<div class="ssu-video-wrapper">
				<iframe src="https://player.vimeo.com/video/485961971?color=ffffff&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	<script src="https://player.vimeo.com/api/player.js"></script>
</div>

<?php
get_footer();
