<?php
namespace MailboxValidatorLaravel\Validation;

class ValidateEmail{
	public static $errorMessage = 'This is a disposable email and should not been used to register.';
	public $api_key;
	
	function GetValidateDisposable($email,$api_key) {
		if ($api_key == '') {
			$api_key = env('MBV_API_KEY');
		}
		$source = 'laravel';
		try {
			// Now we need to send the data to MBV API Key and return back the result.
			$results = file_get_contents('https://api.mailboxvalidator.com/v1/email/disposable?key=' . $api_key . '&email=' .$email. '&source=' .$source );
			
			if ($results == false) {
				return 'Unknown error encounter. Please try again later.';
			} else {
				// Decode the return json results and return the data as an array.
				$data = json_decode($results,true);
				
				return $data;
			}
		} catch (Exception $e) {
			// If execption occur, return the exception
			return $e;
		}
	}
	

	// $value holds the email address from the form.
	function ValidateDisposable($attribute, $value, $parameters, $validator) {
		if (!isset($api_key)) {
			$api_key = env('MBV_API_KEY');
		}
		$source = 'laravel';
		try {
			// Now we need to send the data to MBV API Key and return back the result.
			$results = file_get_contents('https://api.mailboxvalidator.com/v1/email/disposable?key=' . $api_key . '&email=' .$value. '&source=' .$source );
			
			// Decode the return json results and return the data as an array.
			$data = json_decode($results,true);
			
			// Called a function to return message for form validation
			if (trim ($data['error_code']) == '' ) {
				if ( $data['is_disposable'] == true ) {
					$errorMessage = 'The email '.$value.' is disposable email and should not been used to register.';
					return false;
				} else {
					return true;
				}
			} else {
				return $data['error_code'] . $data['error_message'];
			}

		} catch (Exception $e) {
			// If execption occur, return the exception
			return $e;
		}
	}
	
	
}


?>