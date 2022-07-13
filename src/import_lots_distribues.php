<?php
use SimpleExcel\SimpleExcel;

if(isset($_POST['import'])){

if(move_uploaded_file($_FILES['excel']['tmp_name'],$_FILES['excel']['name'])){
    require_once('SimpleExcel/SimpleExcel.php'); 
    
    $excel = new SimpleExcel('csv');                  
    
    $excel->parser->loadFile($_FILES['excel']['name']);           
    
    $row = $excel->parser->getField(); 

    $count = 1;
    $db = mysqli_connect('localhost','root','','zenata');

    while(count($row)>$count){
        $num_ordre = $row[$count][0];
        $douar  = $row[$count][1];
        $nom_prenom = $row[$count][2];
        $cin  = $row[$count][3];
        $num_binome = $row[$count][4];
        $paiement = $row[$count][5];
        $date_paiement = $row[$count][6];
        $tirage  = $row[$count][7];
        $num_tirage= $row[$count][8];
        $date_tirage = $row[$count][9];
        $num_lot  = $row[$count][10];
        $categorie = $row[$count][11];

        $query = "INSERT INTO lots_effectues(num_ordre,douar,nom_prenom,cin,num_binome,paiement,date_paiement,tirage,num_tirage,date_tirage,num_lot,categorie) ";
        $query.="VALUES ('$num_ordre','$douar','$nom_prenom','$cin','$num_binome','$paiement','$date_paiement','$tirage',$num_tirage,'$date_tirage','$num_lot','$categorie')";
        if(mysqli_query($db,$query)){
            echo ' <h3>bien ajouter </h3>';
       }else{
           echo "error: $sql. ". mysqli_error($db);
       }
        $count++;
    }

    echo "<script>window.location.href='index.php';</script>";
                  
}  
}
?>
<!DOCTYPE html>
<html>

<style>
body
{
 margin:0;
 padding:0;
 background-color:#f1f1f1;
}
.box
{
 width:550px;
 border:2px solid #ccc;
 background-color:#fff;
 border-radius:5px;
 margin:50px;
 padding:30px;
 
}
</style>
<body>
<div class="container box">
    <h3 align="center">Import Excel Lots Distribués</h3><br />
    <form method="post" enctype="multipart/form-data">
        <label>Choisir le fichier csv excel des lots dustribués : </label>
        <input type="file" name="excel" accept=".csv"/>
        <br/><br>
        <input type="submit" name="import" class="btn btn-primary btn-lg" value="Importer" />
    </form>
    <br />
</div>
