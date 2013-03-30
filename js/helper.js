$(document).ready(function () {

    // here we use an interactive layer with the mapbox.layer shortcut, which
    // requires us to use a callback for when the layer is loaded, and then
    // to refresh the map's interactivity

    // If you're creating a new interactive layer, follow the tooltips docs:
    // http://mapbox.com/tilemill/docs/crashcourse/tooltips/
    var map = mapbox.map('map');
    map.zoom(4).center({ lat: -13.32, lon: -51.15 });
    map.addLayer(mapbox.layer().id('acaoeducativa.mapadosplanos', function() {
        // this function runs after the layer examples.map-8ced9urs is loaded
        // from MapBox and we know what interactive features are supported.
        map.interaction.auto();
    }));

    // Attribute map
    map.ui.attribution.add()
        .content('<a href="http://mapbox.com/about/maps">Terms &amp; Feedback</a>');

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
				$("#autocomplete a").hover(function() {
				    map.setView([this.dataset.lat, this.dataset.lng], 6);
				});
				
				$("#autocomplete ul").hover(null, function() {
				    map.setView(brasil, 4);
				});
				
			}
		});
    }
    //autosearchbox end

});
