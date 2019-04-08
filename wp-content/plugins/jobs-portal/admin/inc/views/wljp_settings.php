<?php
defined( 'ABSPATH' ) || die(); ?>

<div class="wrap">
    <h2><?php esc_html_e( 'Job Portal Settings', WL_JP_DOMAIN ) ?></h2>
    <form action="options.php" method="post">
        <?php settings_fields( 'wljp' ); ?>
        <?php do_settings_sections( 'wljp' ); ?>
        <input name="submit" type="submit" value="<?php esc_attr_e( 'Save Changes', WL_JP_DOMAIN ); ?>" class="button button-primary" />
    </form>
</div>