<?php


require_once '../modal/voyagesModal.php';
require_once '../classes/voyages.class.php';
session_start();

if (isset($_POST['save'])) saveVoyage();

function saveVoyage(){
    $id='';
    $date_dep =$_POST['voyage-date-dep'];
    $date_arr =$_POST['voyage-date-arr'];
    $cap_voyage =$_POST['cap-voyage'];
    $prix_voyage =$_POST['prix-voyage'];
    $train =$_POST['voyage-train'];
    $gare_dep =$_POST['voyage-gare-dep'];
    $gare_arr =$_POST['voyage-gare-arr'];
   

    
$voyage = new VoyagesModal();
$voyage->insertVoyage(new Voyages($id,$date_dep,$date_arr,$cap_voyage,$prix_voyage,$train,$gare_dep,$gare_arr));
    $_SESSION['add-voyage'] = 'voyage ajouter avec succée !';
header('location:../view/voyages.php');
}

// echo $date_dep . '  ' . $date_arr.''.$train.''.$gare_dep.''.$gare_arr.''.$classe;
?>