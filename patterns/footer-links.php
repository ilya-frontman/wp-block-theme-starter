<?php

/**
 * Title: Footer links
 * Slug: nadryv-production/footer-links
 * Categories: text
 * Inserter: no
 *
 * @package nadryv-production
 * @since 1.0.0
 */

?>
<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
<div class="wp-block-group">
    <!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
    <div class="wp-block-group">
        <!-- wp:paragraph {"fontSize":"extra-small"} -->
        <p class="has-extra-small-font-size"><?php esc_html_e('Copyright', 'nadryv-production');
                                                echo ' ' . date_i18n(_x('Y', 'copyright date format', 'nadryv-production')); ?></p><!-- /wp:paragraph -->
        <!-- wp:site-title {"level":0, "fontSize":"extra-small"} /-->
        <?php echo nadryv_production_privacy(); ?>
        <!-- wp:social-links {"className":"is-style-logos-only"} -->
        <ul class="wp-block-social-links has-icon-color is-style-logos-only">
            <!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div><!-- /wp:group -->
</div><!-- /wp:group -->