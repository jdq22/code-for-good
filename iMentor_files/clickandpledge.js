Drupal.behaviors.clickandpledge = function(context) {

	// Validate the Click & Play form when submitted
	$('#donation_1').submit(function(event) {
		var fields = '';
		var error_email_format = '';
		
		if (!$("input[name='UnitPrice']:checked").val()) {
			 fields = "\n- Donation Amount";
		}

		if (!validateEmail($("input[name='FieldValue2']").val())) {
			fields+= "\n- Please make sure the honoree email address is valid.";
		}
		
		if ($("input[name='BillingFirstName']").val() == '') {
			fields+= "\n- First Name";
		}

		if ($("input[name='BillingLastName']").val() == '') {
			fields+= "\n- Last Name";
		}

		if ($("input[name='BillingPhone']").val() == '') {
			fields+= "\n- Phone Number";
		}

		if ($("input[name='BillingEmail']").val() == '') {
			fields+= "\n- Email Address";
		} else if (!validateEmail($("input[name='BillingEmail']").val())) {
			fields+= "\n- Please make sure your email address is valid.";
		}

		if ($("input[name='BillingAddress1']").val() == '') {
			fields+= "\n- Address 1";
		}

		if ($("input[name='BillingCity']").val() == '') {
			fields+= "\n- City";
		}

		if ($("select[name='BillingStateProvince']").attr('selectedIndex') === 0) {
			fields+= "\n- State";
		}

		if ($("input[name='BillingPostalCode']").val() == '') {
			fields+= "\n- ZIP Code";
		}

		if ($("select[name='BillingCountryCode']").attr('selectedIndex') === 0) {
			fields+= "\n- State";
		}

		if ($("input[name='NameOnCard']").val() == '') {
			fields+= "\n- Name on Credit Card";
		}

		if ($("input[name='CardNumber']").val() == '') {
			fields+= "\n- Credit Card Number";
		}

		if ($("input[name='Cvv2']").val() == '') {
			fields+= "\n- CV2";
		}

		if ($("select[name='ExpirationMonth']").attr('selectedIndex') === 0) {
			fields+= "\n- Expiration Month";
		}

		if ($("select[name='ExpirationYear']").attr('selectedIndex') === 0) {
			fields+= "\n- Expiration Year";
		}

		if (fields != '') {
			alert("The following fields are required:\n" + fields + error_email_format);
			event.preventDefault();
		}
	});
	
	// Validate the Click & Play form when submitted
	$('#donation_2').submit(function(event) {
		var fields = '';
		var error_email_format = '';
		
		if (!$("input[name='UnitPrice']:checked").val()) {
			 fields = "\n- Donation Amount";
		}

		if ($("input[name='BillingFirstName']").val() == '') {
			fields+= "\n- First Name";
		}

		if ($("input[name='BillingLastName']").val() == '') {
			fields+= "\n- Last Name";
		}

		if ($("input[name='BillingPhone']").val() == '') {
			fields+= "\n- Phone Number";
		}

		if ($("input[name='BillingEmail']").val() == '') {
			fields+= "\n- Email Address";
		} else if (!validateEmail($("input[name='BillingEmail']").val())) {
			fields+= "\n- Please make sure your email address is valid.";
		}

		if ($("input[name='BillingAddress1']").val() == '') {
			fields+= "\n- Address 1";
		}

		if ($("input[name='BillingCity']").val() == '') {
			fields+= "\n- City";
		}

		if ($("select[name='BillingStateProvince']").attr('selectedIndex') === 0) {
			fields+= "\n- State";
		}

		if ($("input[name='BillingPostalCode']").val() == '') {
			fields+= "\n- ZIP Code";
		}

		if ($("select[name='BillingCountryCode']").attr('selectedIndex') === 0) {
			fields+= "\n- State";
		}

		if ($("input[name='NameOnCard']").val() == '') {
			fields+= "\n- Name on Credit Card";
		}

		if ($("input[name='CardNumber']").val() == '') {
			fields+= "\n- Credit Card Number";
		}

		if ($("input[name='Cvv2']").val() == '') {
			fields+= "\n- CV2";
		}

		if ($("select[name='ExpirationMonth']").attr('selectedIndex') === 0) {
			fields+= "\n- Expiration Month";
		}

		if ($("select[name='ExpirationYear']").attr('selectedIndex') === 0) {
			fields+= "\n- Expiration Year";
		}

		if (fields != '') {
			alert("The following fields are required:\n" + fields + error_email_format);
			event.preventDefault();
		}
	});
	

	function validateEmail(email) { 
		if (email != '') {
			var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
		return true;
	}
}