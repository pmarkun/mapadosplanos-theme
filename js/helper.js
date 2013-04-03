$(document).ready(function () {

    // here we use an interactive layer with the mapbox.layer shortcut, which
    // requires us to use a callback for when the layer is loaded, and then
    // to refresh the map's interactivity

    // If you're creating a new interactive layer, follow the tooltips docs:
    // http://mapbox.com/tilemill/docs/crashcourse/tooltips/
    mapbox.load(['acaoeducativa.mapadosplanos', 'acaoeducativa.mapadosplanos-estados'], function(data) {

        map = mapbox.map('map');
        var layers = document.getElementById('map-ui').getElementsByTagName('a');

        map.zoom(4).center({ lat: -13.32, lon: -51.15 });
        map.setZoomRange(4, 10);
        map.setPanLimits([{ lat: -34.1618, lon: -75.0146 }, { lat:6.0532 , lon: -31.8603 }]);
        map.addLayer(data[0].layer);

        map.addLayer(data[1].layer);
        map.interaction.auto();

        for (var i = 0; i < layers.length; i++) {
          layer = layers[i];
          if (layer.className != 'active') {
              map.getLayer(layer.id).disable();
          }
          
          layer.onclick = function(e) {
              e.preventDefault();
              e.stopPropagation();
              // If the layer that has been clicked on is not already enabled,
              // enable it and also disable any other active layers in the layerswitcher
              if (!(map.getLayer(this.id).enabled)) {
                  for (var i = 0; i < layers.length; i++) {
                      if (map.getLayer(layers[i].id).enabled) {
                          map.getLayer(layers[i].id).disable();
                          layers[i].className = '';
                      }
                  }
                  map.getLayer(this.id).enable();
                  this.className = 'active';
                  map.interaction.refresh();
                }
            };
        }


        // Attribute map
        map.ui.attribution.add()
            .content('<a href="http://mapbox.com/about/maps">Terms &amp; Feedback</a>');
    
        //Place markers
        var markerLayer = mapbox.markers.layer();
        mapbox.markers.interaction(markerLayer).remove()
        map.addLayer(markerLayer);
        for (var i = 0; i < markers.length; i++) {
            var m = markers[i];
            var color;
            if (m.qs_etapa01=='Sim') {
                color='#7eed0d';
            }
            else if (m.qs_etapa01=='Elaboração') {
                color='#0d7eed';
            }
            else if (m.qs_etapa01=='Não') {
                color='#ed0d7e';
            }
            var p = {
                geometry: {
                    coordinates: [m.lng, m.lat]
                },
                properties: {
                    'marker-color': color,
                    'marker-size': 'small',
                    'marker-symbol': 'library'
                }
            };
            markerLayer.add_feature(p);
        }
    });

    //autosearchbox start
    $('#s').keyup(function(e) {
        clearTimeout($.data(this, 'timer'));
        if (e.keyCode == 13)
          search(true);
        else
          $(this).data('timer', setTimeout(search, 500));
    });
    
    function search(force) {
        var existingString = $("#s").val();
        if (!force && existingString.length < 3) return; //wasn't enter, not > 2 char
        $.ajax({
			url:"wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=ae_search&s='+existingString,
			success:function(results) {
				$("#autocomplete").html(results);
				$("#autocomplete a").hover(null, function() {
                    map.ease.location({ lat: this.dataset.lat, lon: this.dataset.lng }).zoom(6).optimal();
                    return false;
				});
				
				$("#autocomplete ul").hover(null, function() {
				    map.ease.location({ lat: -13.32, lon: -51.15 }).zoom(4).optimal();
                    return false;
				});
                $('#autocomplete').mouseleave(function() {
                    $("#autocomplete").html('');
                });
				
			}
		});
    }
    //autosearchbox end

});
