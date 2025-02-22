<?php
/**
 * Title: ProductCards
 * Slug: blazecommerce-child/productcards
 * Categories: 
 */
?>
<!-- wp:woocommerce/product-template {"metadata":{"name":"ProductCard"},"className":"gap-3"} -->
<!-- wp:group {"metadata":{"name":"CardHeader"},"className":"relative","layout":{"type":"constrained"}} -->
<div class="wp-block-group relative"><!-- wp:woocommerce/product-image {"isDescendentOfQueryLoop":true,"className":"h-[120px]"} /-->

<!-- wp:group {"metadata":{"name":"ProductBadges"},"className":"product-badges","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-badges"><!-- wp:group {"metadata":{"name":"CardSaleBadge"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:outermost/icon-block {"iconName":"","metadata":{"name":"AddToWishlistButton"},"className":"absolute"} -->
<div class="wp-block-outermost-icon-block absolute"><div class="icon-container" style="width:48px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.3615 12.1392C7.16317 12.2092 6.8365 12.2092 6.63817 12.1392C4.9465 11.5617 1.1665 9.15252 1.1665 5.06918C1.1665 3.26668 2.619 1.80835 4.40984 1.80835C5.4715 1.80835 6.41067 2.32168 6.99984 3.11502C7.589 2.32168 8.534 1.80835 9.58984 1.80835C11.3807 1.80835 12.8332 3.26668 12.8332 5.06918C12.8332 9.15252 9.05317 11.5617 7.3615 12.1392Z" stroke="#040711" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></div></div>
<!-- /wp:outermost/icon-block --></div>
<!-- /wp:group -->

<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"className":"text-foreground text-sm md:textbbase text-lg font-bold font-secondary","fontSize":"medium","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:group {"metadata":{"name":"ProductRating"},"className":"flex flex-col md:flex-row gap-2","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group flex flex-col md:flex-row gap-2"><!-- wp:group {"metadata":{"name":"ProductRatingIcons"},"className":"gap-[2.5px] items-center","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group gap-[2.5px] items-center"><!-- wp:outermost/icon-block {"iconName":"","metadata":{"name":"EmptyStar"}} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:48px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="16" height="16" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[16px] h-[16px]"><path d="M4.12215 13.4865L5.07464 9.36884L5.14248 9.07556L4.91503 8.87837L1.72002 6.10838L5.94324 5.74178L6.2433 5.71573L6.36056 5.4383L8 1.55926L9.63945 5.4383L9.7567 5.71573L10.0568 5.74178L14.28 6.10838L11.085 8.87837L10.8575 9.07556L10.9254 9.36884L11.8778 13.4865L8.25827 11.303L8 11.1472L7.74173 11.303L4.12215 13.4865Z" stroke="#5A768E"></path></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:outermost/icon-block {"iconName":"","metadata":{"name":"HaftStar"}} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:48px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="16" height="16" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"><path d="M7.5 4.11865V9.96865L9.8625 11.4124L9.24375 8.7124L11.325 6.9124L8.5875 6.66865L7.5 4.11865ZM2.86875 14.5249L4.0875 9.25615L0 5.7124L5.4 5.24365L7.5 0.274902L9.6 5.24365L15 5.7124L10.9125 9.25615L12.1312 14.5249L7.5 11.7312L2.86875 14.5249Z" fill="#5A768E"></path></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:outermost/icon-block {"iconName":"","metadata":{"name":"FullStar"}} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:48px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="16" height="16" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"><path d="M2.86875 14.5249L4.0875 9.25615L0 5.7124L5.4 5.24365L7.5 0.274902L9.6 5.24365L15 5.7124L10.9125 9.25615L12.1312 14.5249L7.5 11.7312L2.86875 14.5249Z" fill="#5A768E"></path></svg></div></div>
<!-- /wp:outermost/icon-block --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"metadata":{"name":"ProductReviewsCount"},"className":"text-foreground text-xxs md:text-xs xl:text-sm font-light font-secondary"} -->
<p class="text-foreground text-xxs md:text-xs xl:text-sm font-light font-secondary">{{reviewCount}}</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lex items-center gap-1","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group lex items-center gap-1"><!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","metadata":{"name":"SalePrice"},"className":"text-primary text-xxs md:text-xs xl:text-sm font-normal font-secondary line-through","style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","metadata":{"name":"Price"},"className":"text-foreground text-sm md:text-base xl:text-lg font-bold font-secondary","style":{"spacing":{"margin":{"bottom":"1rem"}}}} /--></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template -->