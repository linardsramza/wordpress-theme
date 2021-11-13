        <footer id="footer" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-2 col-lg-2 footer-list-item footer-logo">
                        <?php
                            $footer_logo = get_field('footer_logo',  'option');
                        if(!empty($footer_logo)): ?>
                            <img src="<?= $footer_logo['url']; ?>" alt="<?= $footer_logo['alt']; ?>">
                        <?php endif; ?>
                    </div>

                    <?php dynamic_sidebar( 'footer_menu_1' ); ?>
                    <?php dynamic_sidebar( 'footer_menu_2' ); ?>
                    <?php dynamic_sidebar( 'footer_menu_3' ); ?>
                    <?php dynamic_sidebar( 'footer_menu_4' ); ?>
                    <?php dynamic_sidebar( 'footer_menu_5' ); ?>
                </div>
            </div>
            <div id="copyright">
                <div class="container d-flex justify-content-end">
                    <div class="content d-flex flex-column align-items-end">
                        <div class="text"><?php echo esc_html( date_i18n( __( 'Y', 'gwm_theme' ) ) ); ?> BPO</div>
                        <img src="<?= get_template_directory_uri() ?>/assets/images/bpo-small-black-logo.svg" height="20">
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
		<script>
            AOS.init();
		</script>
    </body>
</html>
