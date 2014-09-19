function initialize() {
            var mapCanvas = document.getElementById('map_canvas');
            var posResidence = new google.maps.LatLng(-20.8737076,55.452196);
            var infos = "21, Rue du Moulin à vent – Saint-Denis";
            var mapOptions = {
                  center: posResidence,
                  zoom: 17,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                };
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var iconBase = 'img/icone_spag.png';
            var infoWindow = new google.maps.InfoWindow({
                content: infos
            });
            var marker = new google.maps.Marker({
              position: posResidence,
              map: map,
              icon: iconBase
            });

            google.maps.event.addListener(marker, 'click', function() {
              infoWindow.open(map,marker);
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
$(document).ready(function() {
       $(document).bind('keyup', function(e) {
              if(e.which == 39){
                  $('#carousel-main').carousel('next');
              }
              else if(e.which == 37){
                  $('#carousel-main').carousel('prev');
              }
          });

       $('.contact').h5Validate({
      errorClass:'error-form'
    });
        });