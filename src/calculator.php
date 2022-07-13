<!DOCTYPE html>
<html>
<head>
<body>
  <div class="container">
    <div class="" id="error" style="display: none;" data-animation="fadeOut" role="alert"><span id="message"></span>
    </div>
    <div class="panel panel-light panel-tabbable">
			<div class="panel-header">
				<div class="row">
					<div class="col-md-6"><h1 class="panel-title">Nombres et Catégories</h1>
		</div>
		<div class="col-md-6 align-items-end">
			<div class="panel-toolbar">
				<ul class="nav nav-tabs tabs-underlined nav-tabs-animated" role="tablist">
					<li class="nav-item">
            <a class="nav-link active" id="tab-1" data-toggle="tab" style="pointer-events: none;" href="#panel-with-animated-tabs-tab-1" role="tab" aria-selected="false">
					   
					  </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="tab-2" data-toggle="tab" style="pointer-events: none;"  href="#panel-with-animated-tabs-tab-2" role="tab" aria-selected="false">
              
          </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="tab-3" data-toggle="tab" style="pointer-events: none;"  href="#panel-with-animated-tabs-tab-3" role="tab" aria-selected="true">
						</a>
					</li>
					<li class="nav-floor"></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="panel-body" id="panelBody">

	  <div class="tab-content">
    
			<div style="display: flex;justify-content: space-between;align-items: end; flex-direction: column;" class="tab-pane fade show active" id="panel-with-animated-tabs-tab-1" aria-expanded="true">
									<!-- Step 1 -->
                  <h5 style="text-align:left;"> Saisir les nombres des catégories </h5>
                  <!-- Read Data Table lots_prete -->
        <?php
          $n_p =0 ; $nplus_p = 0; $pr_p = 0; $prplus_p = 0;
            $query = "SELECT * FROM lots_prete";//les lots en chaisir
              $result=  mysqli_query($connect, $query);
              while($row = mysqli_fetch_assoc($result)){
                $n_p = $row["n"];
                $nplus_p = $row["nplus"];
                $pr_p = $row["pr"];
                $prplus_p = $row["prplus"];
              }
              //Calcul
              $nn = number_format($n_p * (1 - ($sn * $prn)));  //N
              $nnplus = number_format($nplus_p * (1 - ($snplus * $prnplus)));//N+
              $npr = number_format($pr_p * (1 - ($spr * $prpr)));//PR
              $nprplus = number_format($prplus_p * (1 - ($sprplus * $prplus)));//PR+
        ?>
        <!-- end -->
<table style="width: 90%;">
  <tr>
	  <td>
		<div>
<table style="margin: 20px 0;">
<tbody>
	<tr>
		<td>
			<label >lots(N) <?php echo 'en Stock (<span id="rest_n">'.$Sn.'</span>)' ; ?>:</label>
		</td>
		<td style="margin-left: 10px;">
			<input id="n" style="width: 80px;" value="0" type="text" name="n" onInput="onChange(this,'n')"><?php echo '<span style=color:green;>nouvelle quantité</span>  '.$nn ; ?>
		</td>
	</tr>
</tbody>
</table>
<table style="margin: 20px 0;">
<tbody>
	<tr>
		<td>
			<label >lots(N+) <?php echo 'en  Stock (<span id="rest_nplus">'.$Snplus.'</span>)' ; ?>:</label>
		</td>
		<td style="margin-left: 10px;">
			<input id="nplus" style="width: 80px;" value="0" type="text" name="nplus" onInput="onChange(this,'nplus')"> <?php echo '<span style=color:green;>nouvelle quantité</span>  '.$nplus_p; ?>
		</td>
	</tr>
</tbody>
</table>
</div>	
</td>
<td>
<div>
<table style="margin: 20px 0;">
	<tbody>
		<tr>
			<td>				
				<label >lots(PR) <?php echo 'en Stock (<span id="rest_pr">'.$Spr.'</span>)' ; ?>:</label>
			</td>
			<td style="margin-left: 10px;">
				<input id="pr" style="width: 80px;" value="0" type="text" name="pr" onInput="onChange(this,'pr')"><?php echo '<span style=color:green;>nouvelle quantité</span>  '.$npr; ?>
			</td>
		</tr>
</tbody>
</table>
<table style="margin: 20px 0;">
	<tbody>
		<tr>
			<td>
				<label >lots(PR+) <?php echo 'en Stock (<span id="rest_prplus">'.$Sprplus.'</span>)' ; ?>:</label>
			</td>
			<td style="margin-left: 10px;">
				<input id="prplus" style="width: 80px;" value="0" type="text" name="prplus" onInput="onChange(this,'prplus')"><?php echo '<span style=color:green;>nouvelle quantité</span>  '.$prplus_p; ?>
			</td>
		</tr>
	</tbody>
</table>	
</div>	
</td>
</table>
<div>
  <form method="POST">
			<button class="btn btn-success"  type="button" onclick="validateWithStep(1)">Next</button>
  </form>
</div>
</div>
<div class="tab-pane fade" id="panel-with-animated-tabs-tab-2" aria-expanded="true">
<div>
   <h5 style="text-align:right;">Choisir votre quantité de chaque tranche</h5>
<div>
	<div>
    <div style="padding: 20px 10px;">
      <div class="accordion accordion-sm" id="accordionWithCustomAnimation1Example">
        <div class="card"> <!-- N -->
          <div class="card-header" id="accordionWithCustomAnimation1HeadingOne">
          <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordionWithCustomAnimation1CollapseOne" aria-expanded="true" aria-controls="accordionWithCustomAnimation1CollapseOne">
          N (<span id="n0"></span>/<span id="default_n0"></span>)
            <div class="nav-icon-bars nav-icon-bars-animate-1">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
             </div>
          </button>
          </h2>
          </div>
<div id="accordionWithCustomAnimation1CollapseOne" class="collapse show" aria-labelledby="accordionWithCustomAnimation1HeadingOne" data-parent="#accordionWithCustomAnimation1Example">
  <div class="card-body d-flex justify-content-start align-items-center flex-wrap">
<?php
$fin_lots_n = []; $type_lots_n = [];
  foreach ($Tra_n as $key => $value) {
    if(in_array($value['Secteur'],$type_lots_n) == false){
      $type_lots_n[] = $value['Secteur'];
      $fin_lots_n[] = [ 'secteur' => (string) $value['Secteur']  , 'count' => (int) $value['count_n'] ] ;
    }else{
    foreach ($type_lots_n as $key_ => $value_) {
      if($fin_lots_n['secteur'] == $value['Secteur']){
        $value_['count'] += (int) $value['count_n'];
      }
    }
    }
  }
foreach ($fin_lots_n as $key => $value) {
  $count = $value['count'];
    echo "<div id='body_n0$key' onclick='isChecked(`default_n0`,`n0`,$count,$key)' style='padding: 10px;
    background-color: #ececec;
    border: 1px solid;margin:10px 5px;cursor: pointer;'>
    <span id='cgr_n0$key'>".$value['secteur']."</span> (<span id='count_n0$key'>$count</span>)</div>";
}
?>     
     </div>
  </div>
</div>
<div class="card"><!-- N+ -->
   <div class="card-header" id="accordionWithCustomAnimation1HeadingTwo">
    <h2 class="mb-0">
    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#accordionWithCustomAnimation1CollapseTwo" aria-expanded="false" aria-controls="accordionWithCustomAnimation1CollapseTwo">
      N+ (<span id="nplus0"></span>/<span id="default_nplus0"></span>)
    <div class="nav-icon-bars nav-icon-bars-animate-1">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    </button>
    </h2>
  </div>
<div id="accordionWithCustomAnimation1CollapseTwo" class="collapse" aria-labelledby="accordionWithCustomAnimation1HeadingTwo" data-parent="#accordionWithCustomAnimation1Example">
  <div class="card-body d-flex justify-content-start align-items-center flex-wrap">
<?php
$fin_lots_n = [];$type_lots_n = [];
  foreach ($Tra_nplus as $key => $value) {
    if(in_array($value['Secteur'],$type_lots_n) == false){
      $type_lots_n[] = $value['Secteur'];
        $fin_lots_n[] = [ 'secteur' => (string) $value['Secteur']  , 'count' => (int) $value['count_nplus'] ] ;
    }else{
      foreach ($type_lots_n as $key_ => $value_) {
        if($fin_lots_n['secteur'] == $value['Secteur']){
          $value_['count'] += (int) $value['count_nplus'];
        }
      }
    }
  }
  foreach ($fin_lots_n as $key => $value) {
    $count =$value['count'];
      echo "<div id='body_nplus0$key' onclick='isChecked(`default_nplus0`,`nplus0`,$count,$key)' style='padding: 10px;
        background-color: #ececec;
          border: 1px solid;margin:10px 5px;cursor: pointer;'><span id='cgr_nplus0$key' >".$value['secteur']."</span>  (<span id='count_nplus0$key' >$count</span>)</div>";
  }
?>
    </div>
  </div>
</div>
 <div class="card"><!-- PR -->
    <div class="card-header" id="accordionWithCustomAnimation1HeadingThree">
  <h2 class="mb-0">
  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#accordionWithCustomAnimation1CollapseThree" aria-expanded="false" aria-controls="accordionWithCustomAnimation1CollapseThree">
    Pr (<span id="pr0"></span>/<span id="default_pr0"></span>)
  <div class="nav-icon-bars nav-icon-bars-animate-1">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>
  </button>
  </h2>
</div>
<div id="accordionWithCustomAnimation1CollapseThree" class="collapse" aria-labelledby="accordionWithCustomAnimation1HeadingThree" data-parent="#accordionWithCustomAnimation1Example">
    <div class="card-body d-flex justify-content-start align-items-center flex-wrap">
<?php $fin_lots_n = [];$type_lots_n = [];
  foreach ($Tra_pr as $key => $value) {
    if(in_array($value['Secteur'],$type_lots_n) == false){
      $type_lots_n[] = $value['Secteur'];
       $fin_lots_n[] = [ 'secteur' => (string) $value['Secteur']  , 'count' => (int) $value['count_pr'] ] ;
    }else{
      foreach ($type_lots_n as $key_ => $value_) {
        if($fin_lots_n['secteur'] == $value['Secteur']){
          $value_['count'] += (int) $value['count_pr'];
      }
      }
    }
  }
  foreach ($fin_lots_n as $key => $value) {
    $count =$value['count'];
      echo "<div id='body_pr0$key' onclick='isChecked(`default_pr0`,`pr0`,$count,$key)' style='padding: 10px;
      background-color: #ececec;
      border: 1px solid;margin:10px 5px;cursor: pointer;'><span id='cgr_pr0$key' >".$value['secteur']." </span> (<span  id='count_pr0$key' >$count</span>)</div>";
  }
?>
    </div>
  </div>
</div>
<div class="card"> <!-- PR + -->
  <div class="card-header" id="accordionWithCustomAnimation1HeadingFour">
  <h2 class="mb-0">
    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#accordionWithCustomAnimation1CollapseFour" aria-expanded="false" aria-controls="accordionWithCustomAnimation1CollapseFour">
     PrPlus (<span id="prplus0"></span>/<span id="default_prplus0"></span>)
    <div class="nav-icon-bars nav-icon-bars-animate-1">
     <span></span>
     <span></span>
     <span></span>
     <span></span>
     <span></span>
     <span></span>
   </div>
    </button>
   </h2>
    </div>
<div id="accordionWithCustomAnimation1CollapseFour" class="collapse" aria-labelledby="accordionWithCustomAnimation1HeadingFour" data-parent="#accordionWithCustomAnimation1Example">
  <div class="card-body d-flex justify-content-start align-items-center flex-wrap">
<?php
$fin_lots_n = [];$type_lots_n = [];
  foreach ($Tra_prplus as $key => $value) {
    if(in_array($value['Secteur'],$type_lots_n) == false){
      $type_lots_n[] = $value['Secteur'];
        $fin_lots_n[] = [ 'secteur' => (string) $value['Secteur']  , 'count' => (int) $value['count_prplus'] ] ;
    }else{
    foreach ($type_lots_n as $key_ => $value_) {
      if($fin_lots_n['secteur'] == $value['Secteur']){
        $value_['count'] += (int) $value['count_prplus'];
      }
    }
    }
  }
  foreach ($fin_lots_n as $key => $value) {
    $count =$value['count'];
    echo "<div  id='body_prplus0$key' onclick='isChecked(`default_prplus0`,`prplus0`,$count,$key)' style='padding: 10px;
    background-color: #ececec;
    border: 1px solid;margin:10px 5px;cursor: pointer;'><span id='cgr_prplus0$key' >".$value['secteur']."</span> (<span id='count_prplus0$key'>$count</span>) </div>";
  }
?>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<div class="d-flex justify-content-between align-items-center">
	<button class="btn btn-primary" type="button" onclick="isReturned()">Return</button>
	<button class="btn btn-success"  type="button" onclick="validateWithStep(2)">Next</button>
</div>
</div>
</div>
<div class="tab-pane fade" id="panel-with-animated-tabs-tab-3" aria-expanded="true">
		<div class="panel-body">
			<div class="flex-table-responsive">
       <div class="flex-table-2 flex-table-2-mode-2" style="border: 1px solid #0000000d;">
          <div class="thead">
						<div class="tr">
						<div class="th d-flex justify-content-center align-items-center">Catégorie</div>
						<div class="th d-flex justify-content-center align-items-center">Nombre</div>
						<div class="th d-flex justify-content-center align-items-center">Tranche</div>
					</div>
				</div>
		<div class="tbody" id="table_tbody">	</div>
	</div>
</div>
</div>
<div class="d-flex justify-content-between align-items-center">
		<button class="btn btn-primary" type="button" onclick="document.getElementById('tab-2').click()">Return</button>
		<button class="btn btn-success" name="valider" type="button" onclick="isValid()" >Valider</button>
     <a href="./src/export.php" ><button class="btn btn-success" name="export" >Exporter</button></a>
</div>
</div>
</div>
</div>
</div> <!-- Panels With Animated Tabs -->
</div>
<?php
$arr_counts = (object)  ['n' => $Sn,'nplus' => $Snplus,'pr' => $Spr,'prplus' => $Sprplus  ] ;
?>
<!-- Script Validation les inputs-->
<script type="text/javascript">
  let inputs =  {'n' : 0,'nplus' : 0,'pr' : 0,'prplus' : 0 };
  let tranches =  {'n' : [] ,'nplus' : [] ,'pr' : [] ,'prplus' : [] };
  let isComplete = [];
  let valider = [];
  let isReturnedToSepOne = false;
  let objects = <?php echo json_encode($arr_counts); ?>;
  var valid = true;
  function onChange(e,category){
    let reste = Number(objects[category]) - e.value;
    if(isReturnedToSepOne){
      tranches[category] = [];
    }
    if(reste < 0 ){
      document.getElementById('rest_'+ category).style.color= 'red';
      e.style.color= 'red';
      e.style.border= '1px solid red';
      valid = false;
      document.getElementById('rest_'+ category).innerText= '0';
      document.getElementById('panelBody').style.backgroundColor= '#ff00000d';
      inputs[category] = Number(e.value);
    }else{
      valid = true;
      e.style.color= 'black';
      e.style.border= '1px solid black';
      document.getElementById('rest_'+category).style.color= 'green';
      document.getElementById('rest_'+category).innerText= ''+reste;
      ids.forEach((value,index)=>{
      let response = document.getElementById(value);
        document.getElementById('panelBody').style.backgroundColor= 'initial';
    });
    inputs[category] = Number(e.value);
    }
}
      const ids = ['N','N+','PR','PR+','n','nplus','pr','prplus']
    function validateWithStep(number){
      const items = ['n0','nplus0','pr0','prplus0'];
      switch (number) {
        case 1:
          if((inputs['n'] != 0 || inputs['n'] == 0)  && ( inputs['nplus'] != 0 || inputs['nplus'] == 0) && ( inputs['pr'] != 0 || inputs['pr'] == 0)  && (inputs['prplus'] != 0|| inputs['prplus'] == 0) ){
            document.getElementById('panelBody').style.backgroundColor= 'initial';
            items.forEach((item)=>{
              document.getElementById(''+item).innerText = '0';
              document.getElementById('default_'+item).innerText = inputs[item.replace('0','')];
            });
            document.getElementById('panel-with-animated-tabs-tab-1').style.display="none";
            document.getElementById('tab-2').click();
          }else{
            document.getElementById('panelBody').style.backgroundColor= '#ff00000d';
          }
          break;
          case 2:
            if(isComplete.length === 4) {
              let tbody = '';
              let getName = (index)=>{
    let arr =  ['n','nplus','pr','prplus'];
    return arr[index];
              };
              let formatArr = (arr,type = null)=>{
    let attribute;
       if(type != null){
        attribute = [];
       }else{
         attribute = '';
        }
        arr.forEach((item,index)=>{
          let dfg = item.split('#');
          if(type != null){
               attribute.push({tranche: dfg[0],quantity: dfg[1]}) ;   
             
          }else{
            attribute += dfg[0]+' ( '+dfg[1]+' )'+(arr.length -1 === index ? ' .' : ' , ');
          }
       
        });
        return attribute;

    }
    for (let index = 0; index <= 3; index++) {
    tbody += `<div class="tr">
           	<div class="td  justify-content-center align-items-center">${getName(index)}</div>
           		<div class="td  justify-content-center align-items-center">${inputs[getName(index)]}</div>
           		<div class="td  justify-content-center align-items-center">${formatArr(tranches[getName(index)])}</div>
             	</div> `;
            valider.push(
            {
              type :getName(index),
              value :inputs[getName(index)],
              tranches : formatArr(tranches[getName(index)],'tranche')
            }
            );
    }
    document.getElementById('table_tbody').innerHTML=tbody;
    document.getElementById('tab-3').click();
    return console.log('Result',valider)
    }else{
    return false;
    }
    break;
    default:
    break;
    }
  }
  function isValid(){
     $.ajax({
     url: "http://localhost/zenata/public/controller/validation.php",
     type: "POST",
     data: {data:JSON.stringify(valider)},
     cache: false,
     success: function (response) {
     console.log('Result', valider, JSON.parse(response) );
    document.getElementById('export_excel').click();
  $.ajax({
     url: "http://localhost/zenata/src/export.php",
     type: "POST",
    data: {data:response},
     cache: false,
     success: function (response) {
    window.onload;
     }
   });
  }
        });
  }
  function alers(name){
    let response = '';
    switch (name) {
      case 'info':
        response =  'alert alert-primary-light alert-dismissible alert-dismissible-2';
        break;
      case 'success':
        response =  'alert alert-secondary-light alert-dismissible alert-dismissible-2';
        break;
      case 'error':
        response =  'alert alert-danger-light alert-dismissible alert-dismissible-2';
        break;
      case 'message':
        response =  'alert alert-dark-light alert-dismissible alert-dismissible-2';
        break;
      default:
      response = 'alert alert-warning-light alert-dismissible alert-dismissible-2'
        break;
    }
    return response;
  }
  function isChecked(default_id,id,value,index){
    let tag = document.getElementById(id);
    let default_tag = document.getElementById(default_id);
    const ctg = document.getElementById('cgr_'+id+''+index);
    let selected = {used:false,value:0,index:-1};
      tranches[''+id.replace('0','')].forEach((item,index)=>{
      console.log(ctg.innerText,''+item);
      if(''+item.indexOf(''+ctg.innerText) != -1){
          selected.used = true;
          selected.value = Number(item.split('#')[1]);
          selected.index = index;
        }
      });
      if(selected.used == true) {
        document.getElementById('count_'+id+''+index).innerText =
        Number(document.getElementById('count_'+id+''+index).innerText) +
        Number(selected.value);
        tag.innerText = 
        Number(tag.innerText) -  Number(selected.value);
        document.getElementById('body_'+id+''+index).style.backgroundColor="#ececec";
        document.getElementById(id).parentElement.style.backgroundColor='initial';
        document.getElementById(id).parentElement.style.color='#333';
        tranches[''+id.replace('0','')].splice(selected.index,1);
      }else{
       const result =  Number(value) - Number(tag.innerText);
      if(result < 0 || Number(default_tag.innerText)  >  Number(tag.innerText)){
      if( Number(default_tag.innerText)  >  Number(tag.innerText) && tranches[''+id.replace('0','')].includes(document.getElementById('cgr_'+id+''+index).innerText) == false){
        document.getElementById('count_'+id+''+index).innerText =  Number(document.getElementById('count_'+id+''+index).innerText) - (Number(default_tag.innerHTML) - Number(tag.innerText)) < 0 ?
         0 : Number(document.getElementById('count_'+id+''+index).innerText) - (Number(default_tag.innerHTML) - Number(tag.innerText));
         tag.innerText = Number(tag.innerText)+value >  Number(default_tag.innerText) ?  Number(default_tag.innerText) : Number(tag.innerText)+value ;
        tranches[''+id.replace('0','')].push(document.getElementById('cgr_'+id+''+index).innerText+'#'+(Number(value) - Number(document.getElementById('count_'+id+''+index).innerText)));
        document.getElementById('body_'+id+''+index).style.backgroundColor="#bdf7c6";
      }
      }else{
      if( Number(default_tag.innerText)  >  Number(tag.innerText) && tranches[''+id.replace('0','')].includes(document.getElementById('cgr_'+id+''+index).innerText) == false){
          document.getElementById('count_'+id+''+index).innerText = Number(document.getElementById('count_'+id+''+index).innerText) - (Number(default_tag.innerHTML) - Number(tag.innerText)) < 0
          ? 0 : Number(document.getElementById('count_'+id+''+index).innerText) - (Number(default_tag.innerHTML) - Number(tag.innerText));
          tag.innerText = Number(tag.innerText)+value >  Number(default_tag.innerText) ?  Number(default_tag.innerText) : Number(tag.innerText)+value ;
          tranches[''+id.replace('0','')].push(document.getElementById('cgr_'+id+''+index).innerText+'#'+(Number(value) - Number(document.getElementById('count_'+id+''+index).innerText)));
           document.getElementById('body_'+id+''+index).style.backgroundColor="#bdf7c6";
      }
      }
      }
      if (Number(default_tag.innerText)  ===   Number(tag.innerText) ){
      document.getElementById(id).parentElement.style.backgroundColor='rgb(55, 159, 71)';
      document.getElementById(id).parentElement.style.color='white';
      if( isComplete.length < 4){
       isComplete.push(id);
      }
      }
  }    
  function isReturned(){
    $('#panel-with-animated-tabs-tab-1').css('display','inherit  ');
    document.getElementById('tab-1').click();
    isReturnedToSepOne = true;
  }
</script>
</body>
   </head>
 </html>