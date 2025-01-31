<?php

if (!class_exists('ripcord')) {
    require_once('ripcord/ripcord.php');
}


// paramètres de connexion à Odoo


// on déclare les variables comme globales
global $odoo_url, $odoo_db, $odoo_username, $odoo_apikey;


// on récupère les paramètres de connexion à Odoo depuis les options
$odoo_url = get_option('urlOdoo');
$odoo_db = get_option('dbOdoo'); 


//récupération des paramètres de connexion de l'utilisateur courant
global $current_user;
get_currentuserinfo();


$odoo_username = $current_user->user_email;


// et sans oublier de récupérer la clé d'api de l'utilisateur courant
$odoo_apikey = get_user_meta($current_user->ID, 'odooapikey',true); 

function final_fantasy_xiv_odooConnect() {
    global $odoo_url, $odoo_db, $odoo_username, $odoo_apikey;


    if ($odoo_url == "" || $odoo_db == "" || $odoo_username == "" || $odoo_apikey == "") {
        return "";
    }


    $common = ripcord::client($odoo_url."/xmlrpc/2/common");
    $common->version();
    $uid = $common->authenticate($odoo_db, $odoo_username, $odoo_apikey, array());
    return $uid;
}

function getAllJoueurs() {
    global $odoo_url, $odoo_db, $odoo_username, $odoo_apikey;


    $uid = final_fantasy_xiv_odooConnect();


    if(!empty($uid)){

    
        $models = ripcord::client("$odoo_url/xmlrpc/2/object");
 
         $domain = [];
        
        $kwargs = ['order' => 'nom desc', 'domain' => $domain, 'fields' => ['nom', 'niveau','dateCreationJoueur', 'image', 'classeJoueur', 'ville_id']];

        $lesJoueurs = $models->execute_kw($odoo_db, $uid, $odoo_apikey, 'finalfantasyxiv.joueur', 'search_read', [], $kwargs);
        
        return $lesJoueurs;
    }
    else{
        return false;
    }
}

