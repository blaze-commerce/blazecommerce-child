<?php
/*
Template Name: Stock Show U Online Goats BSC
*/

get_header();

$args = array(
  'post_type' => 'ad_space',
  'tag' => 'promotion',
  );
$query = new WP_query( $args );

?>
<?php get_template_part('bsc-templates/apply-style') ?>
<style>

nav#ssuo-nav ul {
	display: flex;
	list-style: none;
	margin: 0;
	padding: 0;
	justify-content: space-evenly;
	align-items: flex-end;
}

#ssuo-nav li {
	flex-basis: 400px;
	flex-shrink: 1;
}

#ssuo-nav li a {
	display: flex;
	flex-direction: column;
	justify-content: flex-end;
	align-items: center;
	width: 100%;
	height: 100%;
}

#ssuo-nav li div {
	width: 100%;
	text-align: center;
	color: white;
	text-transform: uppercase;
	background: #222020;
	padding: 0.3rem 0;
}

#ssuo-logo {
	transform: translateY(calc(100% - 4.25vw));
}


#ssuo-nav {
	margin-top: 5rem;
}

@media screen and (max-width: 870px) {
	#ssuo-nav {
		margin-top: 150px;
	}
}
</style>


<div id="primary" class="content-area secondary-page" style="">

	<div>
		<nav id="ssuo-nav">
			<ul style="">
				<li>
					<a href="/stock-show-u/online/">
						<img loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/cattle-icon.png">
						<div>Cattle</div>
					</a>
				</li>
				<li>
					<a href="/stock-show-u/online/sheep">
						<img loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/sheep-icon.png">
						<div>Sheep</div>
					</a>
				</li>
				<li>
					<a href="/stock-show-u/online">
						<img id="ssuo-logo" loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/SSUO_Banner.png">
						<div>&nbsp;</div>
					</a>
				</li>
				<li>
					<a href="/stock-show-u/online/hogs">
						<img loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/hog-icon.png">
						<div>Hogs</div>
					</a>
				</li>
				<li>
					<a href="/stock-show-u/online/goats">
						<img loading="lazy" src="/wp-content/themes/sul-theme/bsc-templates/images/animals/goat-icon.png">
						<div>Goats</div>
					</a>
				</li>
			</ul>
		</nav>

	</div>


    <div class="container font-16px text-bold bread-crumbs">
        <a class="text-500" href="/stock-show-u">Stock Show U</a>
        <i class="fas fa-chevron-circle-right text-red"></i>
        <a href="/stock-show-u/online" class="text-500">Stock Show U Online</a>
        <i class="fas fa-chevron-circle-right text-red"></i>
        <a href="/stock-show-u/online/goats" class="text-500">Goats</a>
    </div>
	<!-- <?php get_template_part('bsc-templates/template-parts-online/ssuo-nav') ?> -->

	<div class="container pos-relative ssuo-container">
        <div style="width: 100%; margin-top: 25px;">
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
        </div>
	</div>
	<script src="https://player.vimeo.com/api/player.js"></script>
</div>

<?php
get_footer();
