<!-- -/ block three column (Home Loop) /- -->
<div class="block_three-col"  id="threeColumns">
    <div class="block_small_container">

        <div class="row">
            <div class="col-md-12">
            <h1><?php echo theme('title'); ?></h1>
                <?php ( theme('title') == 'What we do' ) ? $class = 'what-we-do' : $class ='over-image';  ?>
            <div class="title-separator"></div>
            </div>

            <div class="mobile-wrapper-slick">



            <?php if( have_rows('three_columns') ): $i = 0; ?>

            <?php while( have_rows('three_columns') ): the_row();
            // vars
            $image = get_sub_field('main_image');
            $sec_image = get_sub_field('second_image');
            $title = get_sub_field('title');
            $btn = get_sub_field('button');
            $btn_url = get_sub_field('button_url');
            $filter_url = get_sub_field('filter_url');

            ?>

	            <?php if ($i == 3 && is_page('Contempo') ) {  echo '<div class="adjust-columns">'; } ?>

            <div class="col-md-4 col-sm-6 col-xs-12 ">
                <a href="<?php echo site_url().'/fire-trade-products?filter='.$btn_url ?>" >
                <div class="block_three-col_wrapper ">
                    <div class="block_three-col_wrapper_image">

                        <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                        <div class="background-overlay"></div>
                    </div>

                    <div class="block_three-col_wrapper_content <?php echo $class; ?>">

                        <div class="content_image <?php echo $class ?>" id="over-image">
                            <img class="img-responsive" src="<?php echo $sec_image['url']; ?>" alt="<?php echo $sec_image['alt'] ?>"
                                 width="200" />
                            <h2><?php echo $title; ?></h2>
                            <div class="content_btn">
                                <?php if($btn_url): ?>
                                    <a href="<?php echo site_url().'/'. $btn_url ?>" ><?php echo $btn; ?></a>

                                <?php endif; ?>

                            </div>

                        </div>


                    </div>

                </a>




                </div><!-- end wrapper -->
            </div><!-- end col -->
	        <?php if ($i == 4 && is_page('Contempo')) {  echo '</div>'; } ?>

                <?php $i++; endwhile;  ?>



            <?php endif; ?>
        </div>

        </div><!-- end row -->












    </div>
</div>