<?php
namespace MailboxValidatorLaravel\Validation\Test;
use Validation;
class ValidationFunctionTest extends TestCase
{
    /**
     * Check if the function get the correct result or not
     * @return void
     */
    public function testvalidateemail()
    {
		$results = $validate->GetValidateDisposable('ooikaiwen@qq.com','TSGVXN7PLAU30SNAYAT4');
        $this->assertSame($results['is_disposable'], true);
		$results1 = $validate->GetValidateDisposable('ooikaiwen@mailinator.com','TSGVXN7PLAU30SNAYAT4');
        $this->assertSame($results1['is_disposable'], true);
    }
}