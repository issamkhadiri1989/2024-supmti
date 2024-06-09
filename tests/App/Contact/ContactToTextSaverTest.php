<?php

declare(strict_types=1);

namespace App\Tests\App\Contact;

use App\Contact\ContactToTextSaver;
use PHPUnit\Framework\TestCase;

class ContactToTextSaverTest extends TestCase
{
    /**
     * @dataProvider contactDataProvider
     *
     * @return void
     */
    public function testSaveContactOk(string $name, string $phone, string $expectedResult): void
    {
        $instance = new ContactToTextSaver();

        $result = $instance->save($name, $phone);

        $this->assertEquals($expectedResult, $result);
    }

    public function contactDataProvider(): array
    {
        return [
            ['Issam', '0672049753', '[Issam] 0672049753'],
            ['Issam', '0672049753', '[Issam] 0672049753'],
            ['Issam', '0672049753', '[Issam] 0672049753'],
            ['Issam', '0672049753', '[Issam] 0672049753'],
            ['Issam', '0672049753', '[Issam] 0672049753'],
        ];
    }
}
