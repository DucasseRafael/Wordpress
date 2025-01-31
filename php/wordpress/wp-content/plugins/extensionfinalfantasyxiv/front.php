<?php
require_once('OdooPrimitive.php');

function listeJoueurs($content) {
    if (is_page('odoofinalfantasyxiv')) {
        $moncontenu = '
        <div class="OdooBridge">
            <div class="OdooContent">
        ';
        
        if ($allJoueurs = getAllJoueurs()) {
            $moncontenu .= '
            <h2>Liste des véhicules disponibles à l\'IUT</h2>
            <div class="liste">
            ';
            
            foreach ($allJoueurs as $joueur) {
                if ($joueur["image"] == "") {
                    $joueur["image"] = plugin_dir_url(__FILE__) . "/assets/images/placeholder.png";
                } else {
                    $joueur["image"] = "data:image/png;base64," . $joueur["image"];
                }
                
                $moncontenu .= '
                <div class="card">
                    <form action="" method="post">
                        ' . wp_nonce_field('reserverVoiture', 'reservation_OdooBridge-verif', true, false) . '
                        <div class="cardContent">
                            <img class="thumb" src="' . $joueur["image"] . '" alt="Image du véhicule">
                            <div class="formulaire">
                                <p class="nom">' . $joueur["nom"] . '</p>
                                <p class="immat">Niveau : ' . $joueur["niveau"] . '</p>
                                <p class="date">Date de création : ' . date("d-m-Y", strtotime($joueur["dateCreationJoueur"])) . '</p>
                                <p class="state">Ville de départ : ' . $joueur["ville_id"][1] . '</p>
                                <input type="hidden" name="joueur_id" value="' . $joueur["id"] . '">
                                <div class="date_reservation">
                                    <label for="date_reservation">Date de réservation :</label><br/>
                                    <input type="date" name="date_reservation" id="date_reservation" required><br/>
                                </div>
                                <div class="duree_reservation">
                                    <label for="duree_reservation">Durée de réservation :</label><br/>
                                    <input type="number" name="duree_reservation" id="duree_reservation" required>
                                </div>
                                <input type="submit" name="reservation_OdooBridge" value="Réserver">
                            </div>
                        </div>
                    </form>
                </div>
                ';
            }
            
            $moncontenu .= '
            </div>
            ';
        } else {
            if (is_user_logged_in()) {
                $moncontenu .= "<p>Erreur de connexion à Odoo. Vérifiez vos identifiants de connexion (email et clé API) dans votre profil, et les paramétrages de BD dans la page d'options du plugin</p>"; 
            } else {
                $moncontenu .= "<p>Vous devez être connecté pour consulter cette page !</p>";
            }
        }
        
        $moncontenu .= '
            </form>
            </div>
        </div>
        ';
        return $moncontenu;
    } else {
        return $content;
    }
}

add_filter('the_content', 'listeJoueurs');