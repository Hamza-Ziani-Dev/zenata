<!DOCTYPE html>
<html>
  <head>
  <body>
<!-- Main Page Content -->
<div class="page-content">
<h4  style= "text-align:center;color:blue;">Lots En Stock </h4>
<div class="row mt-n24" style="margin:0;padding: 20px;display: flex;justify-content: space-evenly;align-items: center;">
        <div class="col-6 col-sm-4 col-lg-2 col-md-3 mt-24">
            <div class="widget widget-sm widget-weather-sm h-full">
              <div class="widget-icon-bg">
                <i class="fas fa-columns"></i>
              </div>
              <h6 class="widget-degree">
                  <?php echo $Sn  ?></h6>
                    <h6>N</h6>
              </div>
        </div>        
        <div class="col-6 col-sm-4 col-lg-2 col-md-3 mt-24">
           <div class="widget widget-sm widget-weather-sm h-full">
              <div class="widget-icon-bg">
                 <i class="fas fa-columns"></i>
              </div>
               <h6 class="widget-degree">
                  <?php echo $Snplus  ?></h6>
                    <h6>N+</h6>
              </div>
              </div>
                  
        <div class="col-6 col-sm-4 col-lg-2 col-md-3 mt-24">
          <div class="widget widget-sm widget-weather-sm h-full">
            <div class="widget-icon-bg">
              <i class="fas fa-columns"></i>
            </div>
            <h6 class="widget-degree">
               <?php echo $Spr  ?></h6>
                   <h6>Pr</h6>
            </div>
            </div>         
        <div class="col-6 col-sm-4 col-lg-2 col-md-3 mt-24">
            <div class="widget widget-sm widget-weather-sm h-full">
              <div class="widget-icon-bg">
                <i class="fas fa-columns"></i>
              </div>
                <h6 class="widget-degree">
                  <?php echo $Sprplus  ?></h6>
                      <h6>Pr+</h6>
              </div>
          </div> 

</div><hr>
<!-- Start Statistique -->
<div>
<table style="width:95% ;border: 1px solid black;margin-left: auto; margin-right: auto;">
<caption style="text-align: center;color:#000080; font-weight:bold;caption-side: top;">Etat des lots Distribués</caption>
  <thead>
  <tr>
    <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">N(%)</th>
    <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">N+(%) </th>
    <th style="border: 1px solid black;text-align:center; background-color: #e7e7e7;">PR(%) </th>
    <th style="border: 1px solid black;text-align: center; background-color: #e7e7e7;">PR+(%) </th>
  <tr>
  </thead>
  <tbody>
    <tr>
    <td style="border: 1px solid black; padding: 10px;text-align: center;background-color:white;"><?php echo $n.' ' ; if($n > 0){echo '<span style=color:green;>En Moins</span>'; }else{echo '<span style=colorEn Moins</span>'; }?></td>
    <td style="border: 1px solid black; padding: 10px;text-align: center;background-color:white;"><?php echo $nplus.' ' ; if($nplus > 0){echo '<span style=color:green;>En Moins</span>';  }else{echo '<span style=color:red;>En Trop</span>'; }?></td>
    <td style="border: 1px solid black; padding: 10px;text-align: center;background-color:white;"><?php echo $pr.' ' ;  if($pr > 0){echo '<span style=color:green;>En Moins</span>'; }else{echo '<span style=color:red;>En Trop</span>'; }?></td>
    <td style="border: 1px solid black; padding: 10px;text-align: center;background-color:white;"><?php echo $prplus.' ' ; if($prplus > 0){echo '<span style=color:green;>En Moins</span>';  }else{echo '<span style=color:red;>En Trop</span>'; }?></td>
    </tr>
    </tr>
  </tbody>
</table>
</div><br>
<!-- End Statistique -->
<!-- From saisir les pourcentage du prudence -->
<div><hr>
<form method="POST">
    <table style="width:95% ;border: 1px solid black;margin-left: auto; margin-right: auto;">
        <caption style="text-align: center;color:#000080; font-weight:bold;caption-side: top;">Saisir la prudence appliquer à chaque Catégorie par %</caption>
      <tr>
        <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">N(%)</th>
        <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">N+(%)</th>
        <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">PR(%)</th>
        <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">PR+(%)</th>
      </tr>
      <tr>
        <td style="border: 1px solid black; padding: 10px;text-align: center;background-color: white;">
          <input  type="text" name="prn">
        </td>
        <td style="border: 1px solid black; padding: 10px;text-align: center;background-color: white;">
          <input  type="text" name="prnplus">
        </td>
        <td style="border: 1px solid black; padding: 10px;text-align: center;background-color: white;">
          <input  type="text" name="prpr">
        </td>
        <td style="border: 1px solid black; padding: 10px;text-align: center;background-color: white;">
          <input  type="text" name="prprplus">
        </td>
      </tr>
    </table><br>
    <div style="margin-left:33px;font-size: 10px;">
        <button class="btn btn-success " type="submit" name="get_value">Valider Prudence</button><br>
        </div>
    </form>
    <hr>
</div><hr>
<!-- Form saisir les quantité de chaque categorie -->
<form method="POST">
<table style="width:95% ;margin-left: auto; margin-right: auto;">
<caption style="text-align: center;color:#000080; font-weight:bold;caption-side: top;" > Saisir la quantité de chaque Catégorie </caption>
      <tr>
        <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">Lots(N)</th>
        <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">Lots(N+)</th>
        <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">Lots(PR)</th>
        <th style="border: 1px solid black;text-align:center;background-color: #e7e7e7;">Lots(PR+)</th>
      </tr>
      <tr>
      <td style="margin-left: 10px;border: 1px solid black; padding: 10px;text-align: center;background-color: white;">
				<input  style="width: 80px;" type="text" name='n' >
			</td>
      <td style="margin-left: 10px;border: 1px solid black; padding: 10px;text-align: center;background-color: white;">
				<input style="width: 80px;"  type="text" name="nplus">
			</td>
      <td style="margin-left: 10px;border: 1px solid black; padding: 10px;text-align: center;background-color: white;">
			  <input  style="width: 80px;"  type="text" name="pr">
			</td>
      <td style="margin-left: 10px;border: 1px solid black; padding: 10px;text-align: center;background-color: white;">
			  <input  style="width: 80px;"  type="text" name="prplus">
			</td>
      </tr>
          </table>
    </from><br>
    <div style="margin-left:33px;font-size: 10px;">
         <form method="POST">
              <button class="btn btn-success btn-lg" type="submit" name="valider">Valider</button><br><br>
              <button class="btn btn-warning " type="submit" name="miss_prudence">Mise à jour prudence</button>
         </form>
     </div>
     <hr>
     <?php
     if(isset($_POST['valider'])){
        if(isset($_POST['n'])){ $n = $_POST['n']; } //1
        if(isset($_POST['nplus'])){$nplus  = $_POST['nplus'];} //2
        if(isset($_POST['pr'])){ $pr = $_POST['pr']; }//3
        if(isset($_POST['prplus'])){ $prplus = $_POST['prplus']; } //4 
      }  
      //Insert Les Valeurs dans la base de donnes:
  if(isset($_POST['valider'])){
    $sql = "INSERT INTO lots_prete(n,nplus,pr,prplus)
    VALUES ('$n','$nplus','$pr','$prplus')";
         if(mysqli_query($connect, $sql)){
               // echo ' bien ajouter';
          }else{
              echo "error: $sql. ". mysqli_error($connect);
          }
  }  
      ?>
<!-- -->
<?php 
  //les nombres de saisir de la form du prudence :
 $prn = 0;$prnplus = 0;$prpr = 0; $prprplus = 0;
  if(isset($_POST['get_value'])){
        if(isset($_POST['prn'])){ $prn = $_POST['prn']; } //1
        if(isset($_POST['prnplus'])){$prnplus  = $_POST['prnplus'];} //2
        if(isset($_POST['prpr'])){ $prpr = $_POST['prpr']; }//3
        if(isset($_POST['prprplus'])){ $prprplus = $_POST['prprplus']; } //4 
              $prn = $prn / 100;//1
              $prnplus = $prnplus / 100;//2
              $prpr = $prpr / 100;//3
              $prprplus = $prprplus /100;//4
             // var_dump($prn);var_dump($prnplus);var_dump($prpr);var_dump($prprplus);
 }
  //Insert Prudence dans la base de donnes:
  if(isset($_POST['get_value'])){
   $sql = "INSERT INTO prudence(n,nplus,pr,prplus)
   VALUES ('$prn','$prnplus','$prpr','$prprplus')";
        if(mysqli_query($connect, $sql)){
              // echo ' bien ajouter';
         }else{
             echo "error: $sql. ". mysqli_error($connect);
         }
 } 
?>
<?php
       $query = "SELECT * FROM prudence";
       $result=  mysqli_query($connect, $query);
       while($row = mysqli_fetch_assoc($result)){
        $prn = $row["n"];
        $prnplus = $row["nplus"];
        $prpr = $row["pr"];
        $prprplus = $row["prplus"];
      }
?>
<?php
       $Qn = 0; $Qnplus = 0;  $Qpr = 0; $Qprplus = 0;
       if(isset($_POST['get_value'])){
         //les nombres de saisir de la form du Quantié :
          if(isset($_POST['n'])){ $Qn = $_POST['n']; } //1
          if(isset($_POST['nplus'])){ $Qnplus  = $_POST['nplus']; } //2
          if(isset($_POST['pr'])){ $Qpr = $_POST['pr'];  }//3
          if(isset($_POST['prplus'])){ $Qprplus = $_POST['prplus'];  } //4
       }
?>
<!-- end prudence -->
</div><!-- / .page-content -->
<!-- Main Page Content -->
<!-- To Do List -->
								<div class="panel panel-light">
									<div class="panel-header">
										<h3 class="panel-title"><span id="dashboard_title">Constants lots Globals</span> </h3>
										<div class="panel-toolbar">
											<ul class="nav nav-pills btn-group">
												<li class="nav-item btn-group">
													<button class="btn btn-sm btn-outline-primary active"
             onclick="
             $('#chart_effectues_').css('position','absolute');
             $('#chart_effectues_').css('opacity','0');
             $('#chart_effectues_').css('z-index','-100');
             $('#chart_global_').css('position','relative');
             $('#chart_global_').css('opacity','1');
             $('#chart_global_').css('z-index','auto');
             $('#dashboard_title').text('Constants lots Globals ');
             "
             >
             Constants lots Globals 
													</a>
												</li>
												<li class="nav-item btn-group">
													<button class="btn btn-sm btn-outline-primary"  onclick="
             $('#chart_global_').css('position','absolute');
             $('#chart_global_').css('opacity','0');
             $('#chart_global_').css('z-index','-100');
             $('#chart_effectues_').css('position','relative');
             $('#chart_effectues_').css('opacity','1');
             $('#chart_effectues_').css('z-index','auto');
             $('#dashboard_title').text('Lots Distribués');
             ">
             Lots Distribués
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="panel-body px-0 py-2">
										<div class="tab-content">
											<div class="tab-pane fade show active" id="Constants-lots-Globals" aria-expanded="true">
           <ul class="list-group check-list no-borders">
           <li class="list-group-item" id="chart_global_">
            <?php include('chart_global.php') ?>
           </li>
           <li class="list-group-item" style="position: absolute;opacity: 0;z-index:-100;" id="chart_effectues_">
           <?php include('chart_effectues.php')  ?>
           </li>
           </ul>
											</div>
											<div class="tab-pane fade" id="Lots-Déja-Affectues" aria-expanded="true">
           <ul class="list-group check-list no-borders"></ul></div>
										</div>
										
									</div>
								</div>
<!-- / To Do List --><br><br><br>
</head></body>
</html>            
                 
