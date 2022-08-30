<?php
/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */

get_header();

the_post();
?>
<div class="row">
        <div class="col-12 p-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0">
                        <?php
                        if ( function_exists('yoast_breadcrumb') && !is_front_page()) {
                            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                        }
                        ?>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="row">
	<div class="col-12 p-0">
		<div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
			<!--<h1 class="entry-title"><?php /*the_title(); */?></h1>-->
			<?php
				the_content();

			?>
		</div><!-- /#post-<?php the_ID(); ?> -->
	
	</div><!-- /.col -->
	<?php
		//get_sidebar();
	?>
</div><!-- /.row -->
<?php
get_footer();



