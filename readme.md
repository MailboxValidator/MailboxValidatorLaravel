# MailboxValidator Laravel Email Validation Package

MailboxValidator Laravel Email Validation Package provides an easy way to call the MailboxValidator API which validates if an email address is valid.



## Installation

The installation can be easily done by using the following command:

`composer require MailboxValidatorLaravel`



## Dependencies

An API key is required for this module to function.

Go to https://www.mailboxvalidator.com/plans#api to sign up for FREE API plan and you'll be given an API key.



## Usage

To use this package to validate the email coming from form submission, you will just need to include `'|disposable'`in Validator function in app\Http\Controllers\Auth\RegisterController.php . A step by step tutorial is included here. 

To print the validation result on single email, you will first need to include this line on top of your file: `use MailboxValidatorLaravel\Validation\ValidateEmail;` . Then, initialite the ValidateEmail class by using this line: `$validate = new ValidateEmail();`. Lastly, just call `$validate->GetValidateDisposable('email_tobe_validate','your_api_key');`  into a variable and print out the variable.

## Result Fields 

##### email_address

The input email address.

##### is_disposable

Whether the email address is a temporary one from a disposable email provider.

Return values: True, False.

##### credits_available

The number of credits left to call the API.

##### error_code

The error code if there is any error. See error table below.

##### error_message

The error message if there is any error. See error table below.



## Errors

| error_code | error_message         |
| ---------- | --------------------- |
| 100        | Missing parameter.    |
| 101        | API key not found.    |
| 102        | API key disabled.     |
| 103        | API key expired.      |
| 104        | Insufficient credits. |
| 105        | Unknown error.        |



## Copyright

Copyright (C) 2018 by MailboxValidator.com, support@mailboxvalidator.com