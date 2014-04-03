
	//this clears form fields when focused 	
				$(document).ready(function () {
					$('.clearme').one("focus", function() {
					 $(this).val("");
					});
				});
	
