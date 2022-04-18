//var importantes
var map, marker, infoWindow;
var $lat = [], $lng = [];
var locations = [];
var markers = [];
$(document).ready(function(){
$.ajax({
   url: $('#url_googleMap').attr('href'),
   type: 'GET',
   dataType: 'json',
   success: function(response){
     if(response.lat.length <= 0){
       //informe a falta de conexao
       $('#map').html('<div class="container-fluid"><h6 class="text-info"><i class="fa fa-info-circle text-danger"></i>  Nenhum veículo foi localizado no mapa!</h6></div>');
     }
     else{
      //carrega o map
       $('#map').empty();
       $('#carrega_map').modal('show');
      loadMap(response.lat,response.lng, response.motoristas);
      }
     
   }
});
});

function loadMap($lat, $lng, $motoristas){
    var principal = {lat: Number($lat[0]), lng: Number($lng[0])};
    
    //infoWindow = new google.maps.InfoWindow();
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: principal,
        mapTypeId: 'satellite'
    });

    /*var marker2 = new google.maps.Marker({
        position: principal,
        map:map
    });*/
    for( i = 0; i < $lat.length; i++){
        var infoMessage =   '<div id="content">' +
        '<div id="siteNotice">' +
        "</div>" +
        '<h4 id="mapTitle" class="firstHeading text-dark" >Veículo '+$motoristas[i].marca+'</h4>' +
        '<div id="bodyContent">' +
        "<p class='text-dark'><b>Matrícula:</b> " +$motoristas[i].n_placa+"</p>"+
        "<p class='text-dark'><b>Modelo:</b> " +$motoristas[i].modelo+"</p>"+
        "<p class='text-dark'><b>Tipo:</b> " +$motoristas[i].tipo+"</p>"+
        "<p class='text-dark'><b>Cor:</b> " +$motoristas[i].cor+"</p>"+
        "</div>" +
        "</div>";
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng( Number($lat[i]), Number($lng[i])),
            icon: window.location.href+'../../../img/icons/icon_map.png',
            title: 'Detalhes da localização do Motorista "'+$motoristas[i].nome+'"',
            map: map
        });
        markers.push(marker);
        const infowindow = new google.maps.InfoWindow({
          content: infoMessage,
        });

        marker.addListener('click', function(){
          infowindow.open(map, marker);
        });
    }
    
    $('#carrega_map').modal('hide');
}
    //agrupando os markers
    // var markerCluster = new google.maps.MarkerClusterer(map, markers);
   
function initMap(){
 /* var luanda = {lat: -8.830440, lng: 13.293490};
  infoWindow = new google.maps.InfoWindow();
  map  = new google.maps.Map(document.getElementById('map'), {
    center: luanda,
    zoom: 15,
    mapTypeId: 'satellite'
  });*/
}