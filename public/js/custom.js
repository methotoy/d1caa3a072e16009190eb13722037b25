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

$.fn.disable = function() {
    return this.each(function() {
        if (typeof this.disabled != "undefined") this.disabled = true;
    });
}

$.fn.enable = function() {
    return this.each(function() {
        if (typeof this.disabled != "undefined") this.disabled = false;
    });
}

if( $('#account #map').length ) {

	$('#account #map').locationpicker({
		location: {
			latitude: $('#account #map-lat').val(),
			longitude: $('#account #map-lng').val()
		},
		radius: 1,
		inputBinding: {
			latitudeInput: $('#account #map-lat'),
			longitudeInput: $('#account #map-lng'),
			locationNameInput: $('#account #address')
		},
		enableAutocomplete: true,
		enableAutocompleteBlur: true,
		markerDraggable: $('#account #map-lat').val()? false : true
	});

	$('#account #map-hidden').locationpicker({
		location: {
			latitude: $('#account #map-lat').val(),
			longitude: $('#account #map-lng').val()
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


if( $('#rooms #drag').length ) {
	Sortable.create(document.getElementById('drag'),{
		group: 'room',
		animation: 150,
		draggable: '.room',
		handle: '.drag-handle'
	});
}

$('#form_company').submit(function(event){
	event.preventDefault();
	let buttonText = $(this).find('button[type="submit"]')[0].innerText;

	if(buttonText === 'Save' || buttonText === 'Update') {
		$.ajax({
			type: "POST",
			url: baseUrl + '/owner/account/company',
			data: $(this).serialize(),
			success: function(data) {
				$('#form_company').find('button[type="submit"]')[0].innerText = "Edit";
				$('#form_company').find(':input').prop('disabled', true);
				$('#form_company').find('button[type="submit"]').prop('disabled', false);

				$('#account #map').locationpicker({
					location: {
						latitude: $('#account #map-lat').val(),
						longitude: $('#account #map-lng').val()
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

				$('#account #map-hidden').locationpicker({
					location: {
						latitude: $('#account #map-lat').val(),
						longitude: $('#account #map-lng').val()
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

				$('#account #map').css('z-index', '100');
				$('#account #map-hidden').css('z-index', '99');

				notify(
					data.status,
					data.status == 'success'? '<strong>Success!</strong>' : '<strong>Error!</strong>',
					data.status == 'success'? 'Company Information Successfully '+data.method+'d!' : 'There was an error on updating your personal information! Please contact us about this problem!',
					data.status == 'success'? 'fa fa-thumbs-up' : 'fa fa-exclamation-circle'
				);
			},
			error: function(data) {

				response = data.responseJSON;

				$('#form_company').find('.has-error').each(function(i) {
					$(this).removeClass('has-error has-feedback');
				});

				if(response && response.hasOwnProperty('errors')) {
					for(let element_id in response.errors) {
						$('#'+element_id).parent().addClass('has-error has-feedback');
						notify(
							'danger',
							'<strong>Attention!</strong>',
							response.errors[element_id],
							'fa fa-exclamation-circle'
						);
					}
				}

				$('#form_company').find(':input').each(function(i) {
					if($(this).parent().hasClass('has-error')){
						$(this).focus();
						return false;
					}
				});
			}
		});
	} else {
		$(this).find('button[type="submit"]')[0].innerText = "Update";
		$(this).find(':input').prop('disabled', false);
		$(this).find('#map').css('z-index', '99');
		$(this).find('#map-hidden').css('z-index', '100');
	}
});

$('#form_personal').submit(function(event){
	event.preventDefault();

	let buttonText = $(this).find('button[type="submit"]')[0].innerText;

	if(buttonText === 'Update') {
		$.ajax({
			type: "POST",
			url: baseUrl + '/owner/account/personal',
			data: $(this).serialize(),
			success: function(data) {
				notify(
					data.status,
					data.status == 'success'? '<strong>Success!</strong>' : '<strong>Error!</strong>',
					data.status == 'success'? 'Personal Information Successfully '+data.method+'d!' : 'There was an error on updating your personal information! Please contact us about this problem!',
					data.status == 'success'? 'fa fa-thumbs-up' : 'fa fa-exclamation-circle'
				);

				$('#form_personal').find('button[type="submit"]')[0].innerText = "Edit";
				$('#form_personal').find(':input').prop('disabled', true);
				$('#form_personal').find('button[type="submit"]').prop('disabled', false);
			},
			error: function(data) {
				notify(
					'danger',
					'<strong>Error!</strong>',
					'There was an error on updating your personal information! Please contact us about this problem!',
					'fa fa-exclamation-circle'
				);
			}
		});
	} else {
		$(this).find('button[type="submit"]')[0].innerText = "Update";
		$(this).find(':input').prop('disabled', false);
	}
});