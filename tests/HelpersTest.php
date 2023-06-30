<?php

namespace Neography7\EasyResponse\Tests;

use Neography7\EasyResponse\Tests\TestCase;

class HelpersTest extends TestCase
{

    /** 
     * @test
     * 
     * @dataProvider \Neography7\EasyResponse\Tests\SuccessDataProvider::successData()
     */
    public function it_checks_helper_success_callback ($successTestData): void
    {

        $responseEasy = easySuccess(message: $successTestData["message"]);
        
        $responseJson = response()->json([
            "message" => $successTestData["message"],
            "success" => true,
        ], 200);

        $this->assertEquals($responseJson, $responseEasy);

    }

    /** 
     * @test
     * 
     * @dataProvider \Neography7\EasyResponse\Tests\ErrorDataProvider::errorData()
     */
    public function it_checks_helper_error_callback ($errorTestData): void
    {

        $responseEasy = easyError(
            title: $errorTestData["title"],
            message: $errorTestData["message"],
            data: $errorTestData["data"]
        );
        
        $responseJson = response()->json([
            "title" => $errorTestData["title"],
            "message" => $errorTestData["message"],
            "success" => $errorTestData["success"],
            "data" => $errorTestData["data"],
        ], 200);

        $this->assertEquals($responseJson, $responseEasy);

    }

}