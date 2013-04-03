$(document).ready(function () {

    // here we use an interactive layer with the mapbox.layer shortcut, which
    // requires us to use a callback for when the layer is loaded, and then
    // to refresh the map's interactivity

    // If you're creating a new interactive layer, follow the tooltips docs:
    // http://mapbox.com/tilemill/docs/crashcourse/tooltips/
    mapbox.load(['acaoeducativa.mapadosplanos-estados', 'acaoeducativa.mapadosplanos'], function(data) {

        map = mapbox.map('map');

        map.zoom(4).center({ lat: -13.32, lon: -51.15 });
        map.setZoomRange(4, 10);
        map.setPanLimits([{ lat: -34.1618, lon: -75.0146 }, { lat:6.0532 , lon: -31.8603 }]);
        map.addLayer(data[1].layer);
        map.getLayer(data[1].id).disable();
        map.addLayer(data[0].layer);
        map.getLayer(data[0].id).disable();
        map.getLayer(data[1].id).enable();
        map.interaction.auto();

        //Layer Switcher
        $.each($("#map-ui a"), function(index, layer) {
          $(layer).click(function (e) {
            e.preventDefault();
            if (!map.getLayer(layer.id).enabled) {
              $.each($("#map-ui a"), function(i, l) {
                if (map.getLayer(l.id).enabled) {
                  map.getLayer(l.id).disable();
                  $(l).removeClass("active");    
                };
              });
              map.getLayer(layer.id).enable();
              $(layer).addClass("active");
            }
            console.log(layer.id);
            if (layer.id === "acaoeducativa.mapadosplanos-estados") {
              map.zoom(4, true);
              map.interaction.refresh();
            }
            map.interaction.refresh();
          });
        });



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
