<?php
use SimpleExcel\SimpleExcel;

if(isset($_POST['import'])){

if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){
    require_once('SimpleExcel/SimpleExcel.php'); 
    
    $excel = new SimpleExcel('csv');                  
    
    $excel->parser->loadFile($_FILES['excel_file']['name']);           
    
    $row = $excel->parser->getField(); 

    $count = 1;
    $db = mysqli_connect('localhost','root','','zenata');

    while(count($row)>$count){
        $Secteur = $row[$count][0];
        $Quartier = $row[$count][1];
        $Libelle = $row[$count][2];
        $Tf_lot = $row[$count][3];
        $Titre = $row[$count][4];
        $NatureRDC = $row[$count][5];
        $Types= $row[$count][6];
        $Types_facades = $row[$count][7];
        $Facades = $row[$count][8];
        $Cour = $row[$count][9];
        $Visa = $row[$count][10];
        $Types_lots = $row[$count][11];

        $query = "INSERT INTO lots(Secteur,Quartier,Libelle,Tf_lot,Titre,NatureRDC,Types,Types_facades,Facades,Cour,Visa,Types_lots)";
        $query.="VALUES ('$Secteur','$Quartier','$Libelle','$Tf_lot','$Titre','$NatureRDC','$Types','$Types_facades','$Facades','$Cour','$Visa','$Types_lots')";
        if(mysqli_query($db,$query)){
            echo ' <h3> bien ajouter </h3>';
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
    <h3 align="center">Import Excel Lots</h3><br />
    <form method="post" enctype="multipart/form-data">
        <label>Choisir le fichier csv excel des lots de TS en préparation : </label>
        <input type="file" name="excel_file" accept=".csv"/>
        <br/><br>
        <input type="submit" name="import" class="btn btn-primary btn-lg" value="Importer" />
    </form>
    <br />
</div>
