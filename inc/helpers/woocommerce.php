<?php

/**
 * Add WooCommerce support
 *
 * @package checkfire
 */
add_action( 'after_setup_theme', 'woocommerce_support' );

if ( ! function_exists( 'woocommerce_support' ) ) {

    /**
     * Declares WooCommerce theme support.
     */
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );

        // Add New Woocommerce 3.0.0 Product Gallery support
        // add_theme_support( 'wc-product-gallery-lightbox' );
        // add_theme_support( 'wc-product-gallery-zoom' );



    }
}
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 3; // 3 products per row
    }
}

// chaning orderby position
remove_action( 'woocommerce_before_shop_loop','woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop','woocommerce_result_count', 20 );

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);

/*
 * add to cart text
 */

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );
//For Single Product Page.
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
//For Archives Product Page.
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text' );
function woo_custom_cart_button_text()
{
    return __( 'RESERVE', 'woocommerce' );
}

function woo_excerpt_in_product_archives() {

    the_excerpt();

}
add_action( 'woocommerce_after_shop_loop_item_title', 'woo_excerpt_in_product_archives', 30 );


remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 40 );

/*
 * get all cat
 */

function woo_display_all_cat()
{
    $taxonomy     = 'product_cat';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no
    $title        = '';
    $empty        = 0;

    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty,
        'order'        => 'DESC',
       // 'exclude' =>16
    );
    $all_categories = get_categories( $args );
    if($all_categories)

        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];



    $i = 0.2;
    foreach ($all_categories as $cat) {
        if($cat->category_parent == 0) {
            $category_id = $cat->term_id;
            $seo_cat = strtolower(str_replace(" ","-",$cat->name));

            strpos($url, $seo_cat)  ? $active = 'active' : $active = '';
            (is_shop() && $cat->name == 'Specials' )? $active_seo ='active' : $active_seo = '';

            $image = '<img class="cat-cross '.$active.' '.$active_seo.' " src="'.get_template_directory_uri().'/assets/images/orn_x.png" />';

           echo '	<button name="'.$seo_cat.'" class="btn-ajax text-center"  data="' . $cat->slug . '">'.$cat->name.'</button>';
						
						


        }
        $i += 0.7;
    }
}





// ajax function for the filter
function wooFilters(){


    $args = array(
        'orderby' => 'date',
        'posts_per_page' => -1,
        'order' => $_POST['date']
    );

    if( isset( $_POST['product_cat_filter'] )  ) {

        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $_POST['product_cat_filter'],

            )

        );
    }


    $query = new WP_Query( $args );

    if( $query->have_posts() ) :

        while( $query->have_posts() ): $query->the_post();
            ?>


            <?php  wc_get_template_part( 'content', 'product' ); ?>


            <?php

        endwhile;
        wp_reset_postdata();
    else :
        echo '<span class="no-prodcuts">Sorry, no products matched your selection</span>';
    endif;

    die();
}


add_action('wp_ajax_productcatfilter', 'wooFilters');
add_action('wp_ajax_nopriv_productcatfilter', 'wooFilters');

/*
 * call special for shop page
 */



