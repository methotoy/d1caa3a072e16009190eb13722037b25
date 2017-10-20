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

if( $('#account #map').length ) {

	$('#account #map').locationpicker({
		location: {
			latitude: 10.3098611200678,
			longitude: 123.89315813194662
		},
		radius: 1,
		inputBinding: {
			latitudeInput: $('#account #map-lat'),
			longitudeInput: $('#account #map-lng'),
			locationNameInput: $('#account #address')
		},
		enableAutocomplete: true,
		enableAutocompleteBlur: true
	});

}
