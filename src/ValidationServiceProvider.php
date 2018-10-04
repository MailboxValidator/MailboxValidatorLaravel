<?php
namespace MailboxValidatorLaravel\Validation;

use Illuminate\Support\ServiceProvider;
// use Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
		$this->app->bind('disposable', ValidateEmail::class);
		// $this->validate($request, [
			// 'email' => 'required|email|disposable',
		// ]);
		$this->app['validator']->extend('disposable', ValidateEmail::class.'@ValidateDisposable', ValidateEmail::$errorMessage);
		// $this->validator = Validator::make($app->request->all(), $request->ValidateDisposable(), $request->messages());
		// Validator::extend('disposable',  ValidateDisposable::class);
		// Validator::extend('disposable', 'ValidateDisposable@validate');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}

