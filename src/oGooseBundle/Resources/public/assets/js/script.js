jQuery(document).ready(function() {

	$('.fieldlabels').on('click', function(){
		var fieldid = $(this).data('id');
		$('#fieldid').val(fieldid);
	});


});
