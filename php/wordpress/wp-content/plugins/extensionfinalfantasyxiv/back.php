<?php

function final_fantasy_xiv_administration_add_admin_page() {
    add_submenu_page(
        'options-general.php',
        'Options FinalFantasyXIV',
        'Options FinalFantasyXIV',
        'manage_options',
        'final_fantasy_xiv_administration',
        'final_fantasy_xiv_administration_page'
    );
}

function final_fantasy_xiv_administration_page() {
    if (isset($_POST['submit'])) {
        // On enregistre le paramètre d'URL s'il est renseigné
        if (isset($_POST['urlOdoo'])) {
            update_option('final_fantasy_xiv_urlOdoo', sanitize_text_field($_POST['urlOdoo']));
        }
        // On enregistre le paramètre de base de données s'il est renseigné
        if (isset($_POST['dbOdoo'])) {
            update_option('final_fantasy_xiv_dbOdoo', sanitize_text_field($_POST['dbOdoo']));
        }
    }

    $db_actuel = get_option('final_fantasy_xiv_dbOdoo');
    $url_actuel = get_option('final_fantasy_xiv_urlOdoo');
    ?>
    <div class="wrap OdooBridge OdooBridgeBack">
        <h1>Mes options</h1>
        <form method="post" action="">
            <label for="dbOdoo">Saisissez le nom de la base Odoo (ex: odoo_v16) :</label>
            <input class="input" id="dbOdoo" name="dbOdoo" value="<?php echo esc_attr($db_actuel); ?>">
            <br/>
            <label for="urlOdoo">Saisissez l'URL d'Odoo (ex: http://web:8069) :</label>
            <input id="urlOdoo" name="urlOdoo" value="<?php echo esc_attr($url_actuel); ?>">
            <br/>
            <input type="submit" name="submit" class="button button-primary" value="Enregistrer" />
        </form>
    </div>
    <?php
}

add_action('admin_menu', 'final_fantasy_xiv_administration_add_admin_page');

function final_fantasy_xiv_add_custom_user_profile_apikey($user) {
    printf(
        '
<h3>%1$s</h3>
<table class="form-table">
<tr>
<th><label for="odooapikey">%2$s</label></th>
<td>
    <input type="text" name="odooapikey" id="odooapikey" value="%3$s" class="regular-text" />
    <br /><span class="description">%4$s</span>
</td>
</tr>
</table>
',
        __('Extra Profile Information', 'locale'),
        __('Odoo API key', 'locale'),
        esc_attr(get_user_meta($user->ID, 'odooapikey', true)),
        __('Start typing API key', 'locale')
    );
}

function final_fantasy_xiv_save_custom_user_profile_apikey($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return FALSE;
    }

    $odooapikey = (isset($_POST['odooapikey'])) ? $_POST['odooapikey'] : '';

    // Human readable value and id
    update_user_meta($user_id, 'odooapikey', $odooapikey);
}

// for account owner
add_action('show_user_profile', 'final_fantasy_xiv_add_custom_user_profile_apikey');
add_action('personal_options_update', 'final_fantasy_xiv_save_custom_user_profile_apikey');


// for admins
add_action('edit_user_profile', 'final_fantasy_xiv_add_custom_user_profile_apikey');
add_action('edit_user_profile_update', 'final_fantasy_xiv_save_custom_user_profile_apikey');