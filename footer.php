    <footer class="footer">
        <div class="footer__menu">
            <?php wp_nav_menu( array('theme_location' => 'footer-nav' ) ) ?>
        </div>
        <div class="footer__targenio">
            <span>&#169; <?php bloginfo( 'name' ); echo " " . date('Y'); ?></span>
        </div>
    </footer>
</div> <!-- closes <div class=wp-container"> -->

<?php wp_footer(); ?>
</body>
</html>