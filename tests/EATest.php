<?php

namespace Neography7\EasyResponse\Tests;

use Neography7\EasyResponse\EA;
use Neography7\EasyResponse\EasyResponse;
use Neography7\EasyResponse\Tests\TestCase;

class EATest extends TestCase
{

    /** 
     * @test
     * 
     * @dataProvider \Neography7\EasyResponse\Tests\SuccessDataProvider::successData()
     */
    public function it_checks_success_callback ($successTestData): void
    {

        $easyResponse = EA::success($successTestData["message"]);
        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertEquals(true, $array["success"]);
        $this->assertEquals($successTestData["message"], $array["message"]);

    }

    /** 
     * @test
     * 
     * @dataProvider \Neography7\EasyResponse\Tests\ErrorDataProvider::errorData()
     */
    public function it_checks_error_callback_and_title ($errorTestData): void
    {

        $easyResponse = EA::error($errorTestData["message"], $errorTestData["title"]);
        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertEquals(false, $array["success"]);
        $this->assertEquals($errorTestData["message"], $array["message"]);
        $this->assertEquals($errorTestData["title"], $array["title"]);

    }
}