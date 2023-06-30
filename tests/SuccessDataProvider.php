<?php

namespace Neography7\EasyResponse\Tests;

final class SuccessDataProvider
{
    public static function successData(): array
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
}