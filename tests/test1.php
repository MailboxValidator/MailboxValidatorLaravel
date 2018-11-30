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
		$results = $validate->GetValidateDisposable('test@example.com','PASTE_YOUR_API_KEY_HERE');
        $this->assertSame($results['is_disposable'], true);
		$results1 = $validate->GetValidateDisposable('test@example.com','PASTE_YOUR_API_KEY_HERE');
        $this->assertSame($results1['is_disposable'], true);
    }
}