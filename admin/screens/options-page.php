
<?php settings_errors(); ?>

<style>
    h1 {
        font-weight: 400;
        margin-bottom: 60px;
    }

</style>


<h1>Extend your website Functionalities</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'wthree-advanced-options-settings-group' ); ?>
    <?php do_settings_sections( 'wthree_create_main_page' ); ?>
    <?php submit_button(); ?>
</form>