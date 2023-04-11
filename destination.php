<?php

// RECEVOIR LE FICHIER
$f_recu = $_FILES["fichier_a_envoyer"];                             // Je mets le fichier reçu dans une variable
                                                                    // $_FILES renvoie un array
         
foreach ($f_recu as $key => $value) {                               // parcourir le tableau reçu 
    echo $key.' ======>   '.$value. '<br/>';
}

// JE METS LES ELEMENTS DU TABLEAU DANS DES VARIABLES  
$f_name = $f_recu['name'];
$f_tmp_name = $f_recu['tmp_name'];
$f_size = $f_recu['size'];
$f_error = $f_recu['error']; 

// JE REGARDE SI $_FILES EST VIDE
if (is_null($f_name)or $f_error>0){
    header('location:form.php?message="Vous devez choisir un fichier"');
    exit();
}



// LIMITER LE POIDS DU FICHIER

$poids_max = 200;                                                    // Poids max ==> 200 Kb

if ($f_size >$poids_max*1024){
    header ('location: form.php?message="Le fichier fait plus de 200 kb"');
    exit();
}

// LIMITER L'EXTENSION DU FICHIER

$ext_autorise = array("png", "jpg");
$f_extension = strtolower(end(explode(".", $f_name)));

if (!in_array($f_extension,$ext_autorise)){
    header ('location:form.php?message="Le fichier a une extension illégale"');
    exit();
}

 //REPERTOIRE  Où ENREGISTRER LE FICHIER

if (!file_exists('dosier_fichiers_recu')){
    mkdir('dosier_fichiers_recu', 0777);
}

if(move_uploaded_file($f_tmp_name,'dosier_fichiers_recu/'.$f_name)){
    header ('location:form.php?message="fichier téléchargé avec succès"');
    exit();
}else{
    header ('location:form.php?message="error"');
    exit();
}


