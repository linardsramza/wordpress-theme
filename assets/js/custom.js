jQuery(document).ready(function($) {
    /*-------------------------------------------------*/
    /* = Homepage slider
    /*-------------------------------------------------*/
    $('.slider').bxSlider({
        mode: 'fade',
        controls: false,
        touchEnabled: false,
        pager: ($(".slider>.slider-item").length > 1) ? true: false,
    });

    /*-------------------------------------------------*/
    /* = Map markers
    /*-------------------------------------------------*/
    var locations = [
        ['Rīga', 56.95686025038631, 24.1098496750836, 4],
        ['Liepāja', 56.51403956859775, 21.012929956256695, 5]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: new google.maps.LatLng(56.95686025038631, 24.1098496750836),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

    jQuery('#location-1').click(function (e) {
        e.preventDefault();
        map.setCenter(new google.maps.LatLng(56.95686025038631, 24.1098496750836));
    });

    jQuery('#location-2').click(function (e) {
        e.preventDefault();
        map.setCenter(new google.maps.LatLng(56.51403956859775, 21.012929956256695));
    });
});
