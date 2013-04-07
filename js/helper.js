$(document).ready(function () {

    // here we use an interactive layer with the mapbox.layer shortcut, which
    // requires us to use a callback for when the layer is loaded, and then
    // to refresh the map's interactivity

    // If you're creating a new interactive layer, follow the tooltips docs:
    // http://mapbox.com/tilemill/docs/crashcourse/tooltips/
    mapbox.load(['acaoeducativa.mapadosplanos-estados', 'acaoeducativa.mapadosplanos'], function(data) {

        map = mapbox.map('map');

        // add static baselayer
        map.addLayer(mapbox.layer().id('world-blank-light', function() {
            map.interaction.auto(); 
        }));

        map.zoom(4).center({ lat: -13.32, lon: -54.15 });
        map.setZoomRange(4, 10);
        map.setPanLimits([{ lat: -34.1618, lon: -75.0146 }, { lat:6.0532 , lon: -31.8603 }]);
        map.addLayer(data[1].layer, function() {
            map.interaction.auto();
        });
        map.addLayer(data[0].layer, function () {
            map.interaction.auto();
        });
        map.getLayer(data[0].id).disable();
        map.getLayer(data[1].id).enable();

        //Layer Switcher
        $.each($("#map-ui a"), function(index, layer) {
          $(layer).click(function (e) {
            e.preventDefault();
            e.stopPropagation();
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
            map.interaction.refresh();
            map.draw();
          });
        });

        // Zoomer
        map.ui.zoomer.add();

        // Attribute map
        map.ui.attribution.add()
            .content('<a href="http://mapbox.com/about/maps">Terms &amp; Feedback</a>');
    
        //Place markers
        var markerLayer = mapbox.markers.layer();
        mapbox.markers.interaction(markerLayer).add();
        map.addLayer(markerLayer);
        for (var i = 0; i < markers.length; i++) {
            var m = markers[i];
            console.log(m);
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
                    'marker-symbol': 'library', 
                    'href': './?ibge=' + m.ibge
                }
            };
            markerLayer.add_feature(p);
        }
    });

    //autosearchbox start
    $('#s-munic').keyup(function(e) {
        clearTimeout($.data(this, 'timer'));
        if (e.keyCode == 13)
          search(true);
        else
          $(this).data('timer', setTimeout(search, 500));
    });
    
    function search(force) {
        var existingString = $("#s-munic").val();
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

    //abrir munic no link certo
    var hash = location.hash
    , hashPieces = hash.split('?')
    , activeTab = $('[href=' + hashPieces[0] + ']');
    activeTab && activeTab.tab('show');

});
