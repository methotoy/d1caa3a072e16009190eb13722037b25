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
