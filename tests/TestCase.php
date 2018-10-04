<?php
namespace MailboxValidatorLaravel\Validation\Test;
use MailboxValidatorLaravel\Validation\MyPackageFacade;
use MailboxValidatorLaravel\Validation\ValidationServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
class TestCase extends OrchestraTestCase
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return MailboxValidatorLaravel\Validation\ValidationServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [ValidationServiceProvider::class];
    }
    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Validation' => ValidationFacade::class,
        ];
    }
}