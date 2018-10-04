<?php
namespace MailboxValidatorLaravel\Validation;
use Illuminate\Support\Facades\Facade;
class validation extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ValidateEmail';
    }
}