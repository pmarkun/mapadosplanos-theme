$(document).ready(function () {
	
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
                console.log(results);
				$("#autocomplete").html(results);
			}
		});
    }
    //autosearchbox end
    
    //mapbox start
    var municipios = L.tileLayer('http://b.tiles.mapbox.com/v3/acaoeducativa.mapadosplanos/{z}/{x}/{y}.png', {
    });
    var estados = L.tileLayer('http://b.tiles.mapbox.com/v3/acaoeducativa.mapadosplanos-estados/{z}/{x}/{y}.png', {
    });
    
    var map = L.map('map', {
	center: new L.LatLng(-13.3255, -51.1523),
	zoom: 4,
	maxZoom: 7,
	minZoom: 4,
	//maxBounds: [[-78.3105,-38.0654], [-26.8945,7.3625]],
	layers: [estados, municipios]
       });
    
    var baseMaps = {
    "Munícipios": municipios,
    "Estados": estados
    };

    L.control.layers(baseMaps).addTo(map);
    municipios.bringToFront()
    
    //mapbox end

});
