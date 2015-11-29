$(document).ready(function() {
	$("div.btn-group").on('submit', '.delete-broadcast-form', function() {
		var confirmed = confirm("Sure to delete?");
		if(confirmed)
			return true;
		else
			return false;		
	});
});