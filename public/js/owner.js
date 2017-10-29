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

function createRoom(data){
	var roomElement = $(`
		<div class="col-md-6 room" id="room-${data.id}">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">
						${ucwords(data.name)}
						<i class="fa fa-trash pull-right drag-filter" aria-hidden="true" data-id="${data.id}"></i>
						<i class="fa fa-arrows pull-right drag-handle" aria-hidden="true" data-id="${data.id}"></i>
						<i class="fa fa-pencil pull-right drag-edit" aria-hidden="true" data-id="${data.id}"></i>
						<i class="fa fa-eye pull-right drag-view" aria-hidden="true" data-id="${data.id}"></i>
					</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						<h4>Information</h4>
						<p class="wrap">${(data.information.length < 198)? data.information : data.information.substring(0,198)+'...'}</p>
					</div>
					<div class="col-md-12">
						<h4>Price Range (per night)</h4>
						<p>₱ ${data.price}</p>
					</div>
					<div class="col-md-12">
						<h4>Capacity</h4>
						<p><i class="fa fa-male"></i> x ${data.capacity}</p>
					</div>
					<div class="col-md-12">
						<h4>Facilities</h4>
						<div class="row">
							<div class="col-sm-12">
							${createIcon(data.facilities)}
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<h4>Image(s)</h4>
						<div class="row">
							<div class="room-image col-md-6 col-sm-12">
								<img src="/img/hotel.jpg" />
							</div>
							<div class="room-image col-md-6 col-sm-12">
								<img src="/img/hotel2.jpg" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>`);

	if(data.hasOwnProperty('id')) {
		$('#room-'+data.id).replaceWith(roomElement);
	} else if ($('.room').length) {
		$('.room').last().after(roomElement);
	} else {
		$('#drag').append(roomElement);
	}
}

function deleteRoom(id){
	if(id){
		$('.room').each(function(index, object){
			if($(this).find('.drag-filter')[0].dataset.id == id) {
				$(this).remove();
			}
		});
	}
}

function createIcon(data){
	let returnString = '';

	if(data){
		data = JSON.parse(data);

		for(let _key in data){
			returnString += `
				<span class="tag-icon">
					<img src="${data[_key].icon_path}" class="tips">
				</span>
			`;
		}
	}

	return returnString;
}

function getCsrfToken(){
	if($('input[name="_token"]').length) {
		return $('input[name="_token"]').val();
	}

	return false;
}

$.fn.extend({
  check: function() {
    return this.each(function() {
      this.checked = true;
    });
  },
  uncheck: function() {
    return this.each(function() {
      this.checked = false;
    });
  }
});

function ucwords(string) {
    str = string.toLowerCase();
    return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g,
        function($1){
            return $1.toUpperCase();
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

$('#room_form').submit(function(event){
	event.preventDefault();

	let buttonText = $(this).find('button[type="submit"]')[0].innerText;

	$.ajax({
		type: "POST",
		url: baseUrl + '/owner/rooms/' + buttonText.toLowerCase(),
		data: $(this).serialize(),
		success: function(data) {
			let response = data.responseMessage;

			if(response.status === 'success'){
				createRoom(response.data);
			}

			$('#addRoomModal').modal('hide');
			notify(
				response.status,
				response.status == 'success'? '<strong>Success!</strong>' : '<strong>Error!</strong>',
				response.status == 'success'? 'Room Information Successfully '+response.method+'d!' : 'There was an error on updating your personal information! Please contact us about this problem!',
				response.status == 'success'? 'fa fa-thumbs-up' : 'fa fa-exclamation-circle'
			);
		},
		error: function(data) {
			notify(
				'danger',
				'<strong>Error!</strong>',
				'There was an error on updating your room information! Please contact us about this problem!',
				'fa fa-exclamation-circle'
			);
		}
	});
});

$('.btn-add').click(function(){
	$('#room_form')[0].reset();
	$('#room_form').find('input[type="checkbox"]').uncheck();
	$('#room_form #id').removeAttr('name')
});

$('#drag').on("click", ".drag-filter", function(){
	let id = $(this)[0].dataset.id;

	if(confirm("Are you sure you want to delete this room?")) {
		$.ajax({
			type: "DELETE",
			url: baseUrl + '/owner/rooms/delete',
			data: { id: id, _token: getCsrfToken()},
			success: function(data) {
				let response = data.responseMessage;
				if(response.status === 'success') {
					deleteRoom(response.id);
				}
				notify(
					response.status,
					response.status == 'success'? '<strong>Success!</strong>' : '<strong>Error!</strong>',
					response.status == 'success'? 'Room Information Successfully '+response.method+'d!' : 'There was an error on updating your personal information! Please contact us about this problem!',
					response.status == 'success'? 'fa fa-thumbs-up' : 'fa fa-exclamation-circle'
				);
			},
			error: function(data) {
				notify(
					'danger',
					'<strong>Error!</strong>',
					'There was an error on deleting your room information! Please contact us about this problem!',
					'fa fa-exclamation-circle'
				);
			}
		});
	}
});

$('#drag').on("click", ".drag-edit", function(){
	let id = $(this)[0].dataset.id;
	$('#room_form')[0].reset();
	$('#room_form #id').attr('name','id');

	$.ajax({
		type: "POST",
		url: baseUrl + '/owner/rooms/get/information',
		data: { id: id, _token: getCsrfToken() },
		success: function(data) {
			let response = data.responseMessage;

			if(response.hasOwnProperty('data') && ! $.isEmptyObject(response.data)) {
				let data = response.data;
				response.data.facilities = response.data.facilities.split(",");

				for(let _key in data){
					if(data[_key] instanceof Array){
						$("#room_form").find('input[type="checkbox"]').each(function(){
							console.log($.inArray($(this).val(), data[_key]) > -1);
							if($.inArray($(this).val(), data[_key]) > -1){
								$(this).attr('checked', 'checked');
							} else {
								$(this).removeAttr('checked');
							}
						});
					} else {
						$("#room_form").find('input[name="'+_key+'"]').val(data[_key]);
						$('#room_form').find('textarea[name="'+_key+'"]').val(data[_key]);
					}
				}

				$('#room_form').find('button[type="submit"]').html('Update');
				$("#addRoomModal").modal({
					backdrop: 'static',
				    keyboard: false
				});
			}
		},
		error: function() {
			notify(
				'danger',
				'<strong>Error!</strong>',
				'There was an error on getting your room information! Please contact us about this problem!',
				'fa fa-exclamation-circle'
			);
		}
	});
})