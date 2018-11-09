$(document).ready( function() {

	$(document).on('change', '.btn-file :file', function() {
	var input = $(this),
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
	});

	$('#commant-text').keypress(function(e){
		var message = $("#commant-text").val();
		if (e.keyCode == 87) {
			if(message == ""){
				alert("Enter Some Text In Textarea");
				$("#commant-text").val('');
			}else{
				$('#commant-form').submit();
			}
		}
	});

	$('#save-form-web').hide();

	$('#upload-pin').on('click',function(){
		$('#save-form-web').hide();
		$('#upload-pin-form').show();
	});
	$('#save-web').on('click',function(){
		$('#save-form-web').show();
		$('#upload-pin-form').hide();
	});

	$('.btn-file :file').on('fileselect', function(event, label) {
		
		var input = $(this).parents('.input-group').find(':text'),
			log = label;
		
		if( input.length ) {
			input.val(log);
		} else {
			if( log ) alert(log);
		}
	
	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				$('#img-upload').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function(){
		readURL(this);
	}); 	
});