</main><!-- /#main -->
		<footer id="footer-theme">
            <div class="container-fluid footer-wave">
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
			<div class="container-fluid footer-content">
                <div class="row">
                    <div class="col-12">
                        <div class="container widgets">
                            <div class="row">
                                <?php if ( is_active_sidebar( 'footer_1' )) : ?>
                                    <div class="col-md-5 footer-widget-container footer_1 desktop pt-3"><?php dynamic_sidebar( 'footer_1' ); ?></div>
                                <?php endif; ?>
                                <?php if ( is_active_sidebar( 'footer_2' )) : ?>
                                    <div class="col-md-2 footer-widget-container footer_2 pt-3"><?php dynamic_sidebar( 'footer_2' ); ?></div>
                                <?php endif; ?>
                                <?php if ( is_active_sidebar( 'footer_3' )) : ?>
                                    <div class="col-md-5 footer-widget-container footer_3 pt-3"><?php dynamic_sidebar( 'footer_3' ); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row site-info">
                    <div class="col-12">
                        <div class="container">
                            <div class="col-12">
                                <div class="col-md-6">
                                    <span><?php printf( esc_html__( '&copy; %1$s %2$s LB Packaging, LLC All Rights Reserved', 'lb_packaging' ), date_i18n( 'Y' ), '' ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div><!-- /.container -->
		</footer><!-- /#footer -->
	</div><!-- /#wrapper -->
	<?php
		wp_footer();
	?>
</body>
</html>
