<?php

namespace Neography7\EasyResponse\Tests;

use Neography7\EasyResponse\EasyResponse;
use Neography7\EasyResponse\Tests\TestCase;

class EasyResponseTest extends TestCase
{

    /** 
     * @test
     */
    public function it_check_success (): void
    {

        $easyResponse = new EasyResponse;
        $easyResponse->success(true);
        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertEquals(true, $array["success"]);

    }

    /** 
     * @test
     * 
     * @dataProvider fakeData 
     */
    public function it_adding_message (array $fakeData): void
    {

        $easyResponse = new EasyResponse;
        $easyResponse->message($fakeData["message"]);
        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertEquals($fakeData["message"], $array["message"]);

    }

    /** 
     * @test
     * 
     * @dataProvider fakeData 
     */
    public function it_adding_title (array $fakeData): void
    {

        $easyResponse = new EasyResponse;
        $easyResponse->title($fakeData["title"]);
        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertEquals($fakeData["title"], $array["title"]);

    }

    /** 
     * @test
     * 
     * @dataProvider fakeData 
     */
    public function it_adding_code (array $fakeData): void
    {
        
        $easyResponse = new EasyResponse;
        $easyResponse->code($fakeData["code"]);
        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertEquals($fakeData["code"], $array["code"]);

    }

    /** 
     * @test
     * 
     * @dataProvider fakeData 
     */
    public function it_adding_data (array $fakeData): void
    {

        $data = $fakeData["data"];

        $easyResponse = new EasyResponse;
        $easyResponse->data($data);
        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertEquals($fakeData["data"], $array["data"]);

    }

    /** 
     * @test
     * 
     * @dataProvider customKeyData 
     */
    public function it_adding_custom_key (array $customKeyData): void
    {

        $easyResponse = new EasyResponse;
        $easyResponse->addKey($customKeyData["key"], $customKeyData["value"]);
        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertEquals($customKeyData["value"], $array[$customKeyData["key"]]);

    }
    
    /** 
     * @test
     * 
     * @dataProvider customKeyData 
     */
    public function it_removing_custom_key (array $customKeyData): void
    {

        $easyResponse = new EasyResponse;
        $easyResponse->addKey($customKeyData["key"], $customKeyData["value"]);
        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertArrayHasKey($customKeyData["key"], $array);

        $easyResponse->removeKey($customKeyData["key"]);
        $array = $easyResponse->toArray();

        $this->assertArrayNotHasKey($customKeyData["key"], $array);

    }

    /** 
     * @test
     * 
     * @dataProvider fakeData 
     */
    public function it_adding_full_data (array $fakeData): void
    {

        $easyResponse = new EasyResponse;

        $easyResponse->title($fakeData["title"]);
        $easyResponse->message($fakeData["message"]);
        $easyResponse->code($fakeData["code"]);
        $easyResponse->success($fakeData["success"]);
        $easyResponse->data($fakeData["data"]);


        $array = $easyResponse->toArray();

        $this->assertIsArray($array, "Array control");
        $this->assertEquals($fakeData, $array);

    }

    /** 
     * @test
     * 
     * @dataProvider fakeData 
     */
    public function it_checks_response (array $fakeData): void
    {

        $easyResponse = new EasyResponse;

        $easyResponse->title($fakeData["title"]);
        $easyResponse->message($fakeData["message"]);
        $easyResponse->success($fakeData["success"]);
        $easyResponse->code($fakeData["code"]);
        $easyResponse->data($fakeData["data"]);

        $response = $easyResponse->response();

        $this->assertEquals(
            response()->json($fakeData, ($fakeData["code"] ?? 200)), 
            $response
        );

    }


    public static function fakeData (): array
    {
        return [
            [
                [
                    "title" => "Test Title",
                    "message" => "Test",
                    "success" => true,
                    "code" => 200,
                    "data" => [
                        "data1" => 1,
                        "data2" => "test",
                        "data3" => ["test"],
                    ]
                ]
            ]
        ];
    }

    public static function customKeyData (): array 
    {
        return [
            [
                [
                    "key" => "customKey",
                    "value" => "Test key"
                ]
            ]
        ];
    }

}