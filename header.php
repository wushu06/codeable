<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->

<head id="header">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="theme-color" content="#000000">
    <meta name="msapplication-navbutton-color" content="#000000">
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000">

    <title>
		<?php if(is_front_page() ) : ?>
			<?php echo get_bloginfo()?>
		<?php else : ?>
			<?php echo get_bloginfo()?> | <?php wp_title(''); ?>
		<?php endif; ?>
    </title>
    <!--<link rel="shortcut icon" href="<?php /*echo get_stylesheet_directory_uri(); */?>/assets/images/favicon.ico" />-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">



	<?php wp_head();?>

</head>

<body <?php body_class('');?>>

<?php if( is_front_page()  ) {
    $navbarhome = 'navbar-nav-home';
}else {
    $navbarhome ='';
}
?>


<header id="mainHeader" class="p-fixed">

    <nav class="navbar navbar-default  <?php echo $navbarhome ?>">

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link animsition-link" href="<?php echo site_url() ?>"  data-animsition-out-class="zoom-out-sm">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item main-logo">
                        <a class="navbar-brand" href="<?php echo site_url() ?>">

                            <?php if(is_front_page()): ?>
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/logo_long.png" alt="" width="200">
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/logo_medium.png" alt="" width="200">
                            <?php endif; ?>

                        </a>

                    </li>
                    <li class="nav-item">
                        <a class=" <?php echo (is_shop()|| is_product_category() ) ? 'active ' : 'nav-link'; ?> animsition-link" data-animsition-out-class="zoom-out-sm" href="<?php echo site_url() ?>/store/">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>


            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>



				<?php
            /*    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 3,
                        'container'         => 'div',
                        'container_class'   => 'nav navbar-nav navbar-right',
                        'container_id'      => 'main-menu',

                        'menu_class'        => 'nav navbar-nav navbar-right',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                );*/

				?>



</header>

<div class="header-mobile">



    <div class="woo-nav-mobile">
        <ul class="nav navbar-nav" id="menu-woo-menu">
           <li>
               <a class="navbar-brand" href="<?php echo site_url() ?>">

                       <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/logo_long.png" alt="" width="200">


               </a>

           </li>
            <li>

                <a href="#menu" class="mobile-menu-btn">
                    <div class="hamburger hamburger--spring js-hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                            <span class="extra-bar"></span>
                        </div>
                    </div>

                </a>

            </li>
        </ul>
    </div>










</div><!-- /- end mobile header -/ -->



<div class="clearfix"></div>




<nav id="menu">


	<?php wp_nav_menu( array(
		'theme_location' => 'primary',
		'container'         => false,
		'menu_class'        => false,
		'fallback_cb'       => false

	) ); ?>

</nav><!-- end mobile menu -->



<div class="clearfix"></div>

<section class="wrapper animsition" id="page"> <!-- website wrapper -->



