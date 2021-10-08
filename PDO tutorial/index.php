<?php   
require './cnx.php';

$user = new cnx();
// $user->Insert('anouar','moulaoui','123');
// $user->Insert('soufyan','sf','123');
// $user->Insert('youssef','moulaoui1','123');
// $user->Insert('siham','ss','123');
?>

    <?php 
    
    //$user->showAll();
    //$user->getData();
    // $user->FetchColumn();
    $user->FetchOb();
    ?>

