
<?php
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename= Resultat.xls');
//Connect To DB
include '../database/connection.php';
?>
<?php
$query = "SELECT * FROM resultat";
$result=  mysqli_query($connect, $query);
$html ='';
$html ='<table>
               <tr>
                  <th>lot</th>
                  <th>Secteur</th>
                  <th>Quartier</th>
                  <th>Libelle</th>
                  <th>Tf_lot</th>
                  <th>Titre</th>
                  <th>NatureRDC</th>
                  <th>Types</th>
                  <th>Types_facades</th>
                  <th>Facades<th></th>
                  <th>Cour</th>
               </tr>';
               while($row = mysqli_fetch_assoc($result)){
                  $html.= '<tr>
                             <td>'.$row["lot"].'</td><td>'. $row["Secteur"].'</td>
                             <td>'.$row["Quartier"].'</td><td>'. $row["Libelle"].'</td>
                             <td>'.$row["Tf_lot"].'</td> <td>'.$row["Titre"].'</td>
                             <td>'.$row["NatureRDC"].'</td> <td>'. $row["Types"].'</td>
                             <td>'. $row["Types_facades"].'</td>
                             <td>'.$row["Facades"].'</td><td>'. $row["Cour"].'</td>
                           </tr>';
               }
 $html.='</table>';
 echo $html;
?>