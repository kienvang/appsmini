$(function(){
	//$('.answer tr:last td:last').html($('#add_more'));
    $('#add_more').show();
	
	$('#add_more').click(function(){
		$.get($(this).attr('href'), function(data) {
			$('.answer table').append(data);
            //$('.answer tr:last td:last').html($('#add_more'));
		});
		return false;
	});
});