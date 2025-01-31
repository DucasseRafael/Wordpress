<?php

    include('infosdb.php');

    $common = ripcord::client($url."/xmlrpc/2/common");


    $uid = $common->authenticate($db, $username, $cleapi, array());
    if(!empty($uid)){
        echo "<p>Je suis connecté avec l’id  : " . $uid . '</p>';
 
    }else{
        echo "Impossible de me connecter";
    }
