<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wp_query;

if ( $wp_query->max_num_pages <= 1 )
	return;
?>
<nav id="archive-navigation" class="paging-navigation  tbWow fadeInUp">
	<?php
		$wooPagination = paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         => str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999 ) ) ),
			'format'       => '',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => '&lsaquo; Previous',
			'next_text'    => 'Next &rsaquo;',
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) );

		echo str_replace(array("a class='page-numbers", 'prev page-numbers', 'next page-numbers', "span class='page-numbers"), array("a class='page-numbers btn btn-pagination btn-tb-secondary", 'prev page-numbers btn btn-pagination btn-tb-secondary', 'next page-numbers btn btn-pagination btn-tb-secondary', "span class='page-numbers btn btn-pagination btn-tb-secondary"), $wooPagination);
	?>
</nav>