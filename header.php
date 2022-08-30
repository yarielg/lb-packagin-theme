<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="wrapper">
	<header>
		<nav id="header" class="navbar navbar-expand-md <?php /*echo esc_attr( $navbar_scheme );*/ if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

						if ( ! empty( $header_logo ) ) :
					?>
						<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<?php
						else :
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;
					?>
				</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'lb_packaging' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div id="navbar" class="collapse navbar-collapse">
					<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container'      => '',
								'menu_class'     => 'navbar-nav ms-auto',
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
								'walker'         => new WP_Bootstrap_Navwalker(),
							)
						);

				    ?>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav><!-- /#header -->

        <!-- Hero Content -->
        <?php if(is_front_page()){?>
            <div class="container-fluid hero-img px-0">
                <div class="row m-0">
                    <div class="col-12">
                        <div class="container">
                            <div class="row pl-3 lb-hero-content">
                                <div class="col-md-6 col-12 center-mb pt-3 mb-3 px-0 text-white">
                                    <?php
                                    echo html_entity_decode( get_theme_mod('lb_hero_heading',''));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="background-image: url(<?php echo get_theme_file_uri() ?>/assets/img/white-wave.svg);background-size: cover;height: 215px">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 lb-rounded-section">
                        <span>CONSISTENT PRODUCTS</span>
                        <span>HIGH-QUALITY MATERIALS</span>
                        <span>COMPLETE PRODUCTION MANAGEMENT</span>
                    </div>
                </div>
            </div>
            
        <?php }else {
            global $post;

            $subtitle = '';
            $image = '';

            if(isset($post->ID) && is_page($post->id)){
                $subtitle = get_field( 'lb_page_subtitle', $post->ID);
                $image =  get_field( 'lb_page_banner', $post->ID) ? 'url('. get_field( 'lb_page_banner', $post->ID) . ')' : 'linear-gradient(to bottom, #ffbf5f, #ff9902);';
            }
            ?>
            <div class="container-fluid hero-img-page px-0" style="background-image: <?php echo $image ?> ;background-size: cover;background-position: center; overflow: hidden;">
                <div class="row m-0">
                    <div class="col-12">
                        <div class="container">
                            <div class="row pl-3 lb-hero-content">
                                <div class="col-md-6 col-12 center-mb pt-3 mb-3 px-0 text-white">
                                    <h1><?php the_title() ?></h1>
                                    <h5><?php echo $subtitle?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                ?>
                <div class="row" style="background-image: url(<?php echo get_theme_file_uri() ?>/assets/img/white-wave.svg);background-size: cover;height: 215px">
                    <div class="col-md-6"></div>
                </div>
            </div>
        <?php } ?>
	</header>


	<main id="main" class="container-fluid"<?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' style="padding-top: 100px;"'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' style="padding-bottom: 100px;"'; endif; ?>>
		<?php
			// If Single or Archive (Category, Tag, Author or a Date based page).
			if ( is_single() || is_archive() ) :
		?>
			<div class="row">
				<div class="col-md-8 col-sm-12">
		<?php
			endif;
		?>
