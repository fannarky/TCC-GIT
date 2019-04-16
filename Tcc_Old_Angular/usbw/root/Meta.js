$(document).ready(function() {
		$('#create').click(function(){
		var seila = Math.floor((Math.random() * 500) + 1);
		$('#valr').val(seila);
	});
});