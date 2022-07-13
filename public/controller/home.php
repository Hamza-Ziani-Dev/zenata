
<!--                                     1 Globals                                          -->
<?php
    //echo 'les nombres constatnts globals'; 
$sql="SELECT nombre as 'c_gn' FROM `const_global` WHERE categorie = 'n' ";//n
$res=  mysqli_query($connect, $sql);
$Gn =(int) mysqli_fetch_assoc($res)['c_gn'];  '<br>';//1
$sql="SELECT nombre as 'c_gnplus' FROM `const_global` WHERE categorie = 'n+' ";//n+
$res=  mysqli_query($connect, $sql);
$Gnplus =(int) mysqli_fetch_assoc($res)['c_gnplus']; '<br>'; //2
$sql="SELECT nombre as 'c_gpr' FROM `const_global` WHERE categorie = 'pr' ";//pr
$res=  mysqli_query($connect, $sql);
$Gpr =(int) mysqli_fetch_assoc($res)['c_gpr'];  '<br>'; //3
$sql="SELECT nombre as 'count_gprplus' FROM `const_global` WHERE categorie = 'pr+' ";//pr+
$res=  mysqli_query($connect, $sql);
$Gprplus=(int) mysqli_fetch_assoc($res)['count_gprplus'];  '<br>';//4
$total_G =  $Gn +  $Gnplus + $Gpr +  $Gprplus; '<br>';
//pourcentage
//echo 'Les pourcentage globals'; 
$pc_Gn = number_format(($Gn / $total_G) * 100, 2);  
$pc_Gnplus = number_format(($Gnplus / $total_G) *100, 2);  
$pc_Gpr = number_format(($Gpr / $total_G) * 100, 2);  
$pc_Gprplus = number_format(($Gprplus / $total_G) * 100, 2); 

//Hn Historique  effectués (N):
$sql="SELECT count(*) as 'c_hn' FROM lots_effectues WHERE categorie = 'n' ";//n
$res=  mysqli_query($connect, $sql);
$Hn =(int) mysqli_fetch_assoc($res)['c_hn'];
//Hnplus Historique  effectués (N+):
$sql="SELECT count(*) as 'c_hnplus' FROM lots_effectues WHERE categorie = 'n+' ";//n+
$res=  mysqli_query($connect, $sql);
 $Hnplus =(int) mysqli_fetch_assoc($res)['c_hnplus'];
//Hn Historique  effectués (PR):
$sql="SELECT count(*) as 'c_hpr' FROM lots_effectues WHERE categorie = 'pr' ";//pr
$res=  mysqli_query($connect, $sql);
 $Hpr =(int) mysqli_fetch_assoc($res)['c_hpr'];
//Hn Historique  effectués (pr+):
$sql="SELECT count(*) as 'c_hprplus' FROM lots_effectues WHERE categorie = 'pr+' ";//pr+
$res=  mysqli_query($connect, $sql);
 $Hprplus =(int) mysqli_fetch_assoc($res)['c_hprplus'];
// 'les nombres Historiques effectués '; 
 'total de historique'. $total_H =  $Hn +  $Hnplus + $Hpr +  $Hprplus;
//pourcentage Historiques(n,n+,pr,pr+)
//echo 'Les pourcentage Historique'; 
$pc_Hn = number_format(($Hn / $total_H) * 100, 2); 
$pc_Hnplus = number_format(($Hnplus / $total_H) * 100, 2);  
$pc_Hpr = number_format(($Hpr / $total_H ) * 100,2);  
$pc_Hprplus = number_format(($Hprplus / $total_H) * 100, 2); 
//Calcule :
if($pc_Gn != $pc_Hn && $pc_Gnplus != $pc_Hnplus && $pc_Gpr != $pc_Hpr && $pc_Gprplus != $pc_Hprplus){
//N
$sn = 0;
$n = ($pc_Gn - $pc_Hn);
if($n > 0){
   $sn = 1;
}else{
   $sn = -1;
}
//echo $Sn;echo '<br>';
$snplus = 0;
$nplus = ($pc_Gnplus - $pc_Hnplus); 
if($nplus > 0){
  $snplus = 1;
}else{
  $snplus = -1;
}
//echo $Snplus;
$spr = 0;
$pr = ($pc_Gpr - $pc_Hpr);
if($pr > 0){
  $spr = 1;
}else{
  $spr = -1;
}
//echo $Spr;echo '<br>';
$sprplus = 0;
$prplus = ($pc_Gprplus - $pc_Hprplus);
if($prplus> 0){
  $sprplus = 1;
}else{
  $sprplus = -1;
}
}
//echo $Sprplus;echo '<br>';
?>
<!--  lots visé En Stock -->
<?php 
   ////////////////////////////// 1  Count De Categorie N ////////////////////////////////////////////////////////////////
   $sqln="SELECT count(*) as 'count_n' FROM lots WHERE NatureRDC='RESIDENTIEL' and FACADES='1 FACADE'";
   $result=  mysqli_query($connect, $sqln);
   $Sn =(int) mysqli_fetch_assoc($result)['count_n'];
   ////////////////////////////////// Insert Table N In Database //////////////////////////////////////////////
   $sql="SELECT * FROM lots WHERE NatureRDC='RESIDENTIEL' and FACADES='1 FACADE' ";
   $result=  mysqli_query($connect, $sql);
   $lots_n = array();//1
   while($row=  mysqli_fetch_assoc($result)){
       $lots_n[] = $row;
       $lot = $row['lot'];$secteur= $row['Secteur'];$quartier = $row['Quartier'];$libelle = $row['Libelle'];
       $tf_lot = $row['Tf_lot']; $titre = $row['Titre'];$naturerdc = $row['NatureRDC'];$type =$row['Types'];
       $type_facades = $row['Types_facades'];$facades= $row['Facades'];$cour=$row['Cour'];
       //Insert Resultat Dans La Base de Donnes:
       if(isset($_POST['sauvegarder_cat'])){
         $mydate = date('Y-m-d H:i:s');//My date format
         $sql = "INSERT INTO lots_n(lot,Secteur,Quartier,Libelle,Tf_lot,Titre,NatureRDC,Types,Types_facades,Facades,Cour,mydate)
         VALUES ('$lot','$secteur','$quartier','$libelle','$tf_lot','$titre','$naturerdc','$type','$type_facades','$facades','$cour','$mydate')";
              if(mysqli_query($connect, $sql)){
                    // echo ' bien ajouter';
               }else{
                   echo "error: $sql. ". mysqli_error($connect);
               }
       }
   }
      //print_r($lots_n);
   //////////////////////////////////////   Tranche ==>Count Cat N      ////////////////////////////////////////////////////////////////////
  $query="SELECT Secteur,count(*) as 'count_n' FROM lots_n WHERE NatureRDC='RESIDENTIEL' and FACADES='1 FACADE' group by Secteur";
   $res=  mysqli_query($connect,$query);
   $Tra_n= array();
                        while($row= mysqli_fetch_assoc($res)){
                          $Tra_n[] = $row;
                         $secteur = $row['Secteur'];$count_n = $row['count_n'];
                       //Post Valider
                        if(isset($_POST['sauvegarder_tranche'])){
                         $sql = "INSERT INTO qu_tranche_n(Secteur,Count_N) VALUES ('$secteur','$count_n')";
                              if(mysqli_query($connect, $sql)){
                                     //echo ' bien ajouter';
                               }else{
                                   echo "error: $sql. ". mysqli_error($connect);
                               }
                       }
                     }
   //var_dump($Tra_n);
   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   ////////////////////////////// 2  Count De Categorie N+ ////////////////////////////////////////////////////////////
   $sqlnplus="SELECT count(*) as 'count_nplus' FROM lots WHERE NatureRDC='RESIDENTIEL' and FACADES='2 FACADES' ";
   $result=  mysqli_query($connect, $sqlnplus);
   $Snplus =(int) mysqli_fetch_assoc($result)['count_nplus'];
   ////////////////////////////// 2 insert Cat N+ in database    //////////////////////////////////////////////////////////////////////
   $sql="SELECT * FROM lots WHERE NatureRDC='RESIDENTIEL' and FACADES='2 FACADES' ";
   $result=  mysqli_query($connect, $sql);
   $lots_nplus = array();//2
   while($row=  mysqli_fetch_assoc($result)){
       $lots_nplus[] = $row;
       $lot = $row['lot'];$secteur= $row['Secteur'];$quartier = $row['Quartier'];$libelle = $row['Libelle'];
       $tf_lot = $row['Tf_lot']; $titre = $row['Titre'];$naturerdc = $row['NatureRDC'];$type =$row['Types'];
       $type_facades = $row['Types_facades'];$facades= $row['Facades'];$cour=$row['Cour'];
       //Insert Resultat Dans La Base de Donnes:
       if(isset($_POST['sauvegarder_cat'])){
         $mydate = date('Y-m-d H:i:s');//My date format
         $sql = "INSERT INTO lots_nplus(lot,Secteur,Quartier,Libelle,Tf_lot,Titre,NatureRDC,Types,Types_facades,Facades,Cour,mydate)
         VALUES ('$lot','$secteur','$quartier','$libelle','$tf_lot','$titre','$naturerdc','$type','$type_facades','$facades','$cour','$mydate')";
              if(mysqli_query($connect, $sql)){
                    // echo ' bien ajouter';
               }else{
                   echo "error: $sql. ". mysqli_error($connect);
               }
       }
   }
       //print_r($lots_nplus);
   //////////////////////////////////////   Tranche ==>Count Cat N+    ////////////////////////////////////////////////////////////////////
   $query="SELECT Secteur,count(*) as 'count_nplus' FROM lots_nplus WHERE NatureRDC='RESIDENTIEL' and FACADES='2 FACADES' group by Secteur";
   $Tra_nplus = array();
   $result=  mysqli_query($connect,$query);
                        while($row=  mysqli_fetch_assoc($result)){
                          $Tra_nplus[] = $row;
                         $secteur = $row['Secteur'];$count_nplus = $row['count_nplus'];
                       //Post Valider
                        if(isset($_POST['sauvegarder_tranche'])){
                         $sql = "INSERT INTO qu_tranche_nplus(secteur,count_nplus) VALUES ('$secteur','$count_nplus')";
                              if(mysqli_query($connect, $sql)){
                                     //echo ' bien ajouter';
                               }else{
                                   echo "error: $sql. ". mysqli_error($connect);
                               }
                       }
                     }
   //var_dump($Tra_nplus);
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   ///////////////////////////// 3  Count De Categorie PR ///////////////////////////////////////////////////////////
   $sqlpr = "SELECT count(*) as 'count_pr' FROM lots WHERE NatureRDC='Commercial' and FACADES='1 FACADE' ";
   $result =  mysqli_query($connect, $sqlpr);
   $Spr = (int) mysqli_fetch_assoc($result)['count_pr'];
   ////////////////////////////// 3 insert table PR in Database  //////////////////////////////////////////////////////////////////////
   $sql="SELECT * FROM lots WHERE NatureRDC='Commercial' and FACADES='1 FACADE' ";
   $result=  mysqli_query($connect, $sql);
   $lots_pr = array();//3
   while($row=  mysqli_fetch_assoc($result)){
       $lots_pr[] = $row;
       $lot = $row['lot'];$secteur= $row['Secteur'];$quartier = $row['Quartier'];$libelle = $row['Libelle'];
       $tf_lot = $row['Tf_lot']; $titre = $row['Titre'];$naturerdc = $row['NatureRDC'];$type =$row['Types'];
       $type_facades = $row['Types_facades'];$facades= $row['Facades'];$cour=$row['Cour'];
       //Insert Resultat Dans La Base de Donnes:
       if(isset($_POST['sauvegarder_cat'])){
         $mydate = date('Y-m-d H:i:s');//My date format
         $sql = "INSERT INTO lots_pr(lot,Secteur,Quartier,Libelle,Tf_lot,Titre,NatureRDC,Types,Types_facades,Facades,Cour,mydate)
         VALUES ('$lot','$secteur','$quartier','$libelle','$tf_lot','$titre','$naturerdc','$type','$type_facades','$facades','$cour','$mydate')";
              if(mysqli_query($connect, $sql)){
                    // echo ' bien ajouter';
               }else{
                   echo "error: $sql. ". mysqli_error($connect);
               }
       }
   }
   //////////////////////////////////////   Tranche ==> Count Cat PR     ////////////////////////////////////////////////////////////////////
   $query = "SELECT Secteur,count(*) as 'count_pr' FROM lots_pr WHERE NatureRDC='Commercial' and FACADES='1 FACADE' group by Secteur";
   $res =  mysqli_query($connect,$query);
   $Tra_pr = array();
                        while($row = mysqli_fetch_assoc($res)){
                          $Tra_pr[] = $row;
                         $secteur = $row['Secteur'];$count_pr = $row['count_pr'];
                       //Post Valider
                        if(isset($_POST['sauvegarder_tranche'])){
                         $sql = "INSERT INTO qu_tranche_pr(secteur,count_nplus) VALUES ('$secteur','$count_pr')";
                              if(mysqli_query($connect, $sql)){
                                     //echo ' bien ajouter';
                               }else{
                                   echo "error: $sql. ". mysqli_error($connect);
                               }
                       }
                     }
   //var_dump($Tra_pr);
   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   /////////////////////////////////////// 4  Count De Categorie PR+  /////////////////////////////////////////////////////////
   $sqlpr_plus="SELECT count(*) as 'count_prplus' FROM lots WHERE NatureRDC='Commercial' and FACADES='2 FACADES' ";
   $result=  mysqli_query($connect, $sqlpr_plus);
   $Sprplus = (int) mysqli_fetch_assoc($result)['count_prplus'];
   //////////////////////////////////////////// 4 insert Table PRPlus In Database  //////////////////////////////////////////////////////////////////////
   $sql="SELECT * FROM lots WHERE NatureRDC='Commercial' and FACADES='2 FACADES' ";
   $result=  mysqli_query($connect, $sql);
   $lots_prplus = array();//4
   while($row=  mysqli_fetch_assoc($result)){
       $lots_prplus[] = $row;
       $lot = $row['lot'];$secteur= $row['Secteur'];$quartier = $row['Quartier'];$libelle = $row['Libelle'];
       $tf_lot = $row['Tf_lot']; $titre = $row['Titre'];$naturerdc = $row['NatureRDC'];$type =$row['Types'];
       $type_facades = $row['Types_facades'];$facades= $row['Facades'];$cour=$row['Cour'];
       //Insert Resultat Dans La Base de Donnes:
       if(isset($_POST['sauvegarder_cat'])){
         $mydate = date('Y-m-d H:i:s');//My date format
         $sql = "INSERT INTO lots_prplus(lot,Secteur,Quartier,Libelle,Tf_lot,Titre,NatureRDC,Types,Types_facades,Facades,Cour,mydate)
         VALUES ('$lot','$secteur','$quartier','$libelle','$tf_lot','$titre','$naturerdc','$type','$type_facades','$facades','$cour','$mydate')";
              if(mysqli_query($connect, $sql)){
                    // echo ' bien ajouter';
               }else{
                   echo "error: $sql. ". mysqli_error($connect);
               }
       }
   }
     // print_r($lots_prplus);
   //////////////////////////////////////   Tranche ==>Count Cat PRPLUS     ////////////////////////////////////////////////////////////////////
   $query="SELECT Secteur,count(*) as 'count_prplus' FROM lots_prplus WHERE NatureRDC='Commercial' and FACADES='2 FACADES' group by Secteur";
   $res=  mysqli_query($connect,$query);
   $Tra_prplus= array();
                        while($row= mysqli_fetch_assoc($res)){
                          $Tra_prplus[] = $row;
                         $secteur = $row['Secteur'];$count_prplus = $row['count_prplus'];
                       //Post Valider
                        if(isset($_POST['sauvegarder_tranche'])){
                         $sql = "INSERT INTO qu_tranche_prplus(secteur,count_nplus) VALUES ('$secteur','$count_prplus')";
                              if(mysqli_query($connect, $sql)){
                                     //echo ' bien ajouter';
                               }else{
                                   echo "error: $sql. ". mysqli_error($connect);
                               }
                       }
                     }
   //var_dump($Tra_prplus);
   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!-- Pour Supprimer Table Resultat -->
<?php
 if(isset($_POST["sauvegarder_effectues"])){
   $query = "DELETE FROM resultat ";
   mysqli_query($connect, $query);
   }
   //<!-- Pour Supprimer Table Prudence -->
    if(isset($_POST["miss_prudence"])){
      $query = "DELETE FROM prudence ";
      mysqli_query($connect, $query);
      }
    //<!-- Pour Supprimer Table lots_prete -->
    if(isset($_POST["miss_prudence"])){
      $query = "DELETE FROM lots_prete ";
      mysqli_query($connect, $query);
      }
//Sauvegarder et mise à jour les lots affectues en DB:
if(isset($_POST['sauvegarder_effectues'])){
  $sql = "INSERT INTO ts_precedent(categorie,nombre) VALUES
  ('n','$Hn'),('n+','$Hnplus'),
  ('pr','$Hpr'), ('pr+','$Hprplus')";
       if(mysqli_query($connect, $sql)){
          echo "<h4 > Mise à jour </h4>";
        } else{
         echo "error  $sql." . mysqli_error($connect);
        } 
 }
 /*
 if(isset($_POST['sauvegarder_effectues'])){
  $sql = "INSERT INTO lots_effectues(num_ordre,douar,nom_prenom,cin,num_binome,paiement,date_paiement,tirage,num_tirage,date_tirage,num_lot,categorie) VALUES
  ('pr','$Hpr'), ('pr+','$Hprplus')";
       if(mysqli_query($connect, $sql)){
          echo "<h4 > Mise à jour </h4>";
        } else{
         echo "error  $sql." . mysqli_error($connect);
        } 
 }
 */
?>