//? this function for navigate the pages like includes
function GO_To_LIKS (e){
 var id = e.getAttribute('href');
 if(id == 'page2'){
     $('#page1').css('display','none');
     $('#'+id).css('display','block');
 }else{
     $('#'+id).css('display','block');
     $('#page2').css('display','none');
}
//  $.ajax(url).done(function(response, status) {
//      if (status !== "error")
//      {
//          $("#include").html(response);
//      }
//  });
}
