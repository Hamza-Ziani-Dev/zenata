<?php
//Connect To DB
$host="127.0.0.1";
$user="root";
$password="";
$database="zenata";
//URL de Connection
 $connect=  mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_errno()){
    die("can not connect to database field:". mysqli_connect_error());
}
   function getIdsInDatabase($arrayTranche) {
    $option =['n'=>'lots_n','nplus'=>'lots_nplus','pr'=>'lots_pr ','prplus'=>'lots_prplus'];
     global $connect;
     $result_arr = [];
     foreach(json_decode($arrayTranche) as $value){
     foreach($value->tranches as $value2){
      // get data
      $los = $value->type;
      $name_table = $option[$los];
       $query="SELECT * FROM $name_table WHERE  Secteur ='".$value2->tranche."' limit ".(int) $value2->quantity ;
       $res=  mysqli_query( $connect,$query);
       while($item=  mysqli_fetch_assoc($res)){
         // add data
         $lot= $item['lot'];
         $Secteur= $item['Secteur']; 
         $Quartier = $item['Quartier'];
         $Libelle= $item['Libelle'];
         $Tf_lot=  $item['Tf_lot'];
         $Titre=  $item['Titre'];
         $NatureRDC=  $item['NatureRDC'];
         $Types= $item['Types'];
         $Types_facades= $item['Types_facades'];
         $Facades= $item['Facades'];
         $Cour= $item['Cour'];
         $mydate= $item['mydate'];
         $sql1 = "INSERT INTO resultat (lot_id,lot,Secteur,Quartier,Libelle,Tf_lot,Titre,NatureRDC,Types,Types_facades,Facades,Cour,mydate) VALUES ('$lot','$los','$Secteur','$Quartier','$Libelle','$Tf_lot','$Titre','$NatureRDC','$Types','$Types_facades','$Facades','$Cour','$mydate')";
         // remove data
         $sql2= "DELETE FROM lots WHERE lot = $lot ;";
         $sql3= "DELETE FROM $name_table where lot = $lot ;";
           if(
             mysqli_query($connect, $sql1)
            &&
            mysqli_query($connect,$sql2)
            &&
            mysqli_query($connect,$sql3)
            ){
               $result_arr[] = $item;
            }
       }
     }
     }
     return json_encode($result_arr);

  }
  echo  getIdsInDatabase(trim($_REQUEST['data']));

?>