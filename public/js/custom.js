baseUrl = window.location.origin;

function notify(type,title,message,icon = null) {
	$.notify({
		title: title,
		message: message,
		icon: icon
	},{
		type: type,
		z_index: 10000,
		placement: {
			from: 'bottom',
			align: 'right'
		},
		animate: {
			enter: 'animated fadeInUp',
			exit: 'animated fadeOutUp'
		},
		delay: 5000,
		mouse_over: 'pause'
	});
}

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

$('.btn-sign-up').on('click', function(e){
	$("#signUpModal").modal({
		backdrop: 'static',
		keyboard: false,
		show: true
	});
});

$('#signInForm').on('submit', function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: baseUrl + '/signin/information',
		data: $(this).serialize(),
		success: function(response){

			if(response == 'success') {
				notify(
					'success',
					'<strong>Success!</strong>',
					'You log in successfully! The page will refresh!',
					'fa fa-thumbs-up'
				);

				$("#signUpModal").modal('hide');

				setTimeout(function(){
					location.reload();
				}, 1500);
			} else {
				notify(
					'danger',
					'<strong>Error!</strong>',
					'There was an error on signing in! Please contact us about this problem!',
					'fa fa-exclamation-circle'
				);
			}
		},
		error: function(data){
			let error = '';

			if(data.responseJSON.hasOwnProperty('errors')) {
				error = data.responseJSON.errors.email[0];
			}

			notify(
				'danger',
				'<strong>Error!</strong>',
				error? error : 'There was an error on signing in! Please contact us about this problem!',
				'fa fa-exclamation-circle'
			);
		}
	});
});

$('.btn-book').on('click', function(e){
	$("#bookModal").modal({
		backdrop: 'static',
		keyboard: false,
		show: true
	});
});