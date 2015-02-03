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
	});
}) ;