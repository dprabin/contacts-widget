jQuery(document).ready(function(){
//wordpress works in no conflict mode so we cannot use $(document).
//instead we use jQuery(document). Other are same

	//Get Form by id
	var form  = jQuery('#ajax-contact');

	//get <div> element for Form Messages
	var formMessages = jQuery('#form-message');

	//Form event handler
	jQuery(form).submit(function(event){
		//stop browser from submitting form, because we want to grab it in javascript
		event.preventDefault();
		console.log('Contact Form Submitted');

		//Serialize data
		var formData = jQuery(form).serialize();

		//submit with ajax
		jQuery.ajax({
			type: 'POST',
			url: jQuery(form).attr('action'),
			data: formData
		}).done(function(response){
			//Make sure message is success
			jQuery(formMessages).removeClass('error');
			jQuery(formMessages).addClass('success');

			//set message text
			jQuery(formMessages).text(response);

			//Clear form fields
			jQuery('#name').val('');
			jQuery('#email').val('');
			jQuery('#message').val('');
		}).fail(function(data){
			//Make sure message is success
			jQuery(formMessages).removeClass('success');
			jQuery(formMessages).addClass('error');

			//set message text
			if(data.responseText != ''){
				jQuery(formMessages).text(data.responseText)
			} else {
				jQuery(formMessages).text('An error occured')
			}
		});
	});
}) ;