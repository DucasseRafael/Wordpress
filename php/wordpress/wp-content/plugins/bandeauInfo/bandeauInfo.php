<?php
/**
 * Plugin Name: bandeauInfo
 * Plugin URI: https://www.bandeauInfo.fr
 * Description: Ajoutez un bandeau de texte sur toutes les pages du site
 * Version: 1.0.0
 * Author: Rafael Ducasse
 * Author URI: https://www.iutbayonne.univ-pau.fr/
 * Text Domain: bandeauInfo
 */

function bandeauinfo_administration_add_admin_page() {
    add_submenu_page(
        'options-general.php',
        'Options Bandeau en haut page',
        'Options Bandeau onglet page',
        'manage_options',
        'bandeauinfo_administration',
        'bandeauinfo_administration_page'
    );
}

function bandeauinfo_administration_page() {
    if (isset($_POST['submit'])) {
        update_option('bandeauinfo_message_bandeau', sanitize_text_field($_POST['lemessage']));
    }

    $message_actuel = get_option('bandeauinfo_message_bandeau');
    ?>
    <div class="wrap">
        <h1>Mes options</h1>
        <form method="post" action="">
            <label for="lemessage">Saisissez votre message :</label>
            <input id="lemessage" name="lemessage" value="<?php echo esc_attr($message_actuel); ?>">
            <input type="submit" name="submit" class="button button-primary" value="Enregistrer" />
        </form>
    </div>
    <?php
}

add_action('admin_menu', 'bandeauinfo_administration_add_admin_page');

function ajouter_bandeau($content) {
    $message = get_option('bandeauinfo_message_bandeau');
    $moncontenu = "";
    if ((is_page() || is_single() || is_home() || is_front_page()) && !empty($message)) {
        $moncontenu = '<div style="float:left;position:absolute;left:0;top:0;text-align:center;font-size:20px;width:100%;height:15px;padding:20px;color:white;background-color:black;">' . esc_html($message) . '</div>';
    }
    return $moncontenu . $content;
}

add_filter('the_content', 'ajouter_bandeau');