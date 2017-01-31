$(document).ready(function() {

    $('#example1').bind('click', function(e) {
        e.preventDefault();
        $.Zebra_Dialog('<strong>OOPS!</strong>, We were not able to place your post', {
            'buttons':  false,
			'overlay_close': false,
			'show_close_button': false,
			'type': 'warning',
			'auto_close': 4000
        });
    });
	
	$('#example2').bind('click', function(e) {
        e.preventDefault();
        $.Zebra_Dialog('<strong>Choose your board</strong>', {
			'overlay_close': true,
			'show_close_button': false,
			'type': 'question',
			'buttons':  ['Pin It!']
		});
    });
});
