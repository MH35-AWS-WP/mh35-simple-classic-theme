        </div><!-- /#site-content-wrap -->
        <footer id="site-footer" class="site-footer">
            <nav class="footer-nav">
                <?php if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                    ) );
                } ?>
            </nav>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>