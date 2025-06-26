# MailboxValidator Laravel Email Validation Package

MailboxValidator Laravel Email Validation Package enables user to easily validate if an email address is a type of disposable email or not.

This module can be useful in many types of projects, for example

 - to validate an user's email during sign up
 - to clean your mailing list prior to email sending
 - to perform fraud check
 - and so on

*Note: This extension works in Laravel 5, Laravel 6, Laravel 7, Laravel 8, Laravel 9, Laravel 10, Laravel 11 and Laravel 12.*

## Installation

Open the terminal, locate to your project root and run the following command :

```console
composer require mailboxvalidator-laravel/validation
```



For Laravel versions below 5.5, you might need the additional step to make Laravel 
discover the service provider. Open the `config/app.php` and add the 
service provider manually into the providers section: 

``MailboxValidatorLaravel\Validation\ValidationServiceProvider::class,``

In the terminal, type the following command to publish the modified config file:

```console
php artisan vendor:publish --provider=MailboxValidatorLaravel\Validation\ValidationServiceProvider --force
```



## Dependencies

An API key is required for this module to function.

Go to https://www.mailboxvalidator.com/plans#api to sign up for FREE API plan and you'll be given an API key.

After that, please save your API key in your web application environement file like this:

```
MBV_API_KEY = 'PASTE_YOUR_API_KEY_HERE'
```

## Functions

### GetValidateDisposable (email_address)

Check if the supplied email address is from a disposable email provider.

#### Return Fields

| Field Name        | Description                                                  |
| ----------------- | ------------------------------------------------------------ |
| email_address     | The input email address.                                     |
| is_disposable     | Whether the email address is a temporary one from a disposable email provider. Return values: True, False |
| credits_available | The number of credits left to perform validations.           |
| error_code        | The error code if there is any error. See error table in the below section. |
| error_message     | The error message if there is any error. See error table in the below section. |

### ValidateDisposable

Check the email address from the form and validate it whether is a disposable email or not.

## Usage

To use this package to validate the email coming from form submission, you will just need to include `'|disposable'`in Validator function in `app\Http\Controllers\Auth\RegisterController.php` . A step by step tutorial is included [here](https://www.mailboxvalidator.com/resources/articles/how-to-use-mailboxvalidator-laravel-email-validation-package-to-validate-email-during-registration/). 

To print the validation result on single email, you will first need to include this line on top of your file: `use MailboxValidatorLaravel\Validation\ValidateEmail;` . Then, initialite the ValidateEmail class by using this line: `$validate = new ValidateEmail();`. Lastly, just call `$validate->GetValidateDisposable('email_tobe_validate','your_api_key');`  into a variable and print out the variable. For example, your controller file might be looks like this:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailboxValidatorLaravel\Validation\ValidateEmail;

class ViewValidateResultController extends Controller
{
	public function print_result(){
		$validate = new ValidateEmail();
		$validate_result = $validate->GetValidateDisposable('email_tobe_validate','your_api_key');
		var_dump($validate_result);
	}
}


```

## Errors

| error_code   | error_message         |
| ----------   | --------------------- |
| 10000        | Missing parameter.    |
| 10001        | API key not found.    |
| 10002        | API key disabled.     |
| 10003        | API key expired.      |
| 10004        | Insufficient credits. |
| 10005        | Unknown error.        |
| 10006        | Invalid email syntax. |



## Copyright

Copyright (C) 2018-2025 by MailboxValidator.com, support@mailboxvalidator.com