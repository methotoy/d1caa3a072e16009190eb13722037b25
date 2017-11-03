if ( $('.panel-heading').length ) {

    $('.panel-heading').on('click',function(e){
        if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
            e.preventDefault();
            e.stopPropagation();
        }
    });
}

if( $('#signOutButton').length ) {

	$('#signOutButton').on('click',function(e){
		$('#signOutForm').submit();
	});
}

if( $('#hotel-details #map-details').length ) {

	$('#hotel-details #map-details').locationpicker({
		location: {
			latitude: $('#hotel-details #map_lat').val(),
			longitude: $('#hotel-details #map_lng').val()
		},
		radius: 1,
		enableAutocomplete: true,
		enableAutocompleteBlur: true,
		markerDraggable: false
	});
}