<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>



<div class="sidebar col-md-2 col-sm-2">





    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="catFilter">

        <div id="selectProductCat">
        <?php


           

       woo_display_all_cat();





        ?>
        </div>
        <input type="hidden" name="action" value="productcatfilter">
        <input type="hidden" name="tax_filter_one" value="product_cat">


    </form>
















    <?php
    // woo_display_all_cat();
    ?>

</div>

<div id="content " role="main" class="col-md-10 col-sm-10">

    <?php if ( have_posts() ) : ?>

        <?php
        /**
         * woocommerce_before_shop_loop hook.
         *
         * @hooked wc_print_notices - 10
         * @hooked woocommerce_result_count - 20
         * @hooked woocommerce_catalog_ordering - 30
         */
        do_action( 'woocommerce_before_shop_loop' );
        ?>

        <?php woocommerce_product_loop_start(); ?>

        <?php woocommerce_product_subcategories(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php
            /**
             * woocommerce_shop_loop hook.
             *
             * @hooked WC_Structured_Data::generate_product_data() - 10
             */
            do_action( 'woocommerce_shop_loop' );
            ?>

            <?php wc_get_template_part( 'content', 'product' ); ?>

        <?php endwhile; // end of the loop. ?>

        <?php woocommerce_product_loop_end(); ?>

        <?php
        /**
         * woocommerce_after_shop_loop hook.
         *
         * @hooked woocommerce_pagination - 10
         */
        do_action( 'woocommerce_after_shop_loop' );
        ?>

    <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

        <?php
        /**
         * woocommerce_no_products_found hook.
         *
         * @hooked wc_no_products_found - 10
         */
        do_action( 'woocommerce_no_products_found' );
        ?>

    <?php endif; ?>

    <?php
    /**
     * woocommerce_after_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'woocommerce_after_main_content' );
    ?>

    <?php
    /**
     * woocommerce_sidebar hook.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    do_action( 'woocommerce_sidebar' );
    ?>

    <?php get_footer( 'shop' ); ?>


    <script>

        jQuery(document).ready(function ($) {


            var url      = window.location.href;
            var getRequest = window.location.search.slice();

            var cleanUrl = url.replace(getRequest,'');


           //$('#selectProductCat').change(function(){
                $('.btn-ajax').on('click', function (e) {
                    e.preventDefault();
                  //  $('#catFilter').submit();

                $(this).addClass('active-cross')
                    .siblings().removeClass('active-cross');

                $('.loadmore').hide();
                var loaderSpinner = '<div class="loader-spinner">' +
                    '<span class="square"></span>'+
                    '<span class="square"></span>'+
                    '<span class="square last"></span>'+
                    '<span class="square clear"></span>'+
                    '<span class="square"></span>'+
                    '<span class="square last"></span>'+
                    '<span class="square clear"></span>'+
                    '<span class="square"></span>'+
                    '<span class="square last"></span>'+
                    '</div>';
                $('body').append(loaderSpinner);
                $('.wrapper').css({'opacity': '0.2'});
                var filter = $('#catFilter');
                console.log(filter.serialize()+'product_cat_filter='+$(this).attr('data'));
                $.ajax({
                    url:filter.attr('action'),
                    data:filter.serialize()+'&product_cat_filter='+$(this).attr('data'), // form data
                    type:filter.attr('method'), // POST
                    beforeSend:function(xhr){
                    },
                    error:function (data) {
                        console.log('ERROR');
                    },
                    success:function(data){
                        if(data =='') {
                            console.log('empty');
                        }else {
                            $('.loader-spinner').hide();
                            $('.wrapper').css({'opacity': '1'});
                            $('.products').empty().html(data);

                            history.pushState({}, "", cleanUrl);


                        }


                        // $('#lazyload').empty();
                    }
                });
                return false;
            });




        });

    </script>