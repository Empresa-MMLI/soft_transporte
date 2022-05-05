function initMap() {
  // Definição do ponte de inicialização do mapa
  var myLatLng = new google.maps.LatLng(	-8.838333, 	13.234444);

  // Definição das configurações visuais do mapa
  var mapOptions = {
      zoom: 15,
      center: myLatLng,
      styles: [
          { 
              featureType: 'road',
              elementType: 'all',
              stylers:[{visibility: 'off'}]
          },
          {
              featureType: 'water',
              elementType: 'all',
              stylers:[{color: '#ffffff'}]
          },
          {
              featureType: 'landscape',
              elementType: 'all',
              stylers:[{color: '#ffffff'}]
          }
      ]
  }

  // Instanciando o mapa com as configurações defidas dentro de uma div cujo id está especificado na instrução
  var map = new google.maps.Map(document.getElementById('map'),mapOptions);   
  var geocoder = new google.maps.Geocoder;
}